<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function login($email,$password)
	{
		$result = $this->db->get_where('users', array('email' => $email,'password' => $password), 1, 0);
		if ($result->num_rows()>0) {
			return true;
		}
		return false;
	}

	public function getUserDetailsFromEMail($email){
		$result = $this->db->get_where('users', array('email' => $email));
		$data = $result->result_array();
		$accountType = $data[0]['accountType'];
		if($accountType=='1'){
			$this->db->join('generalUsers', 'users.userID = generalUsers.userID', 'left');
			$this->db->join('colleges', 'generalUsers.collegeID = colleges.college_id', 'left');
			$this->db->select('users.userID,users.name,users.email,users.mobile,users.coverImage,users.profileImage,users.accountType,users.cityID,users.emailVerified, users.mobileVerified, users.registrationLevel, users.active, generalUsers.collegeID, generalUsers.courseID, generalUsers.batch, colleges.college, colleges.logo');
			$query = $this->db->get_where('users', array('email' => $email));
			return $query->result_array();
		}
		else{
			$this->db->select('users.userID,users.name,users.email,users.mobile,users.profileImage,users.coverImage, users.accountType,users.cityID,users.emailVerified, users.mobileVerified, users.registrationLevel, users.active, employerUsers.companyName, employerUsers.companyLogo');
			$this->db->join('employerUsers', 'users.userID = employerUsers.userID', 'left');
			$query = $this->db->get_where('users', array('email' => $email));
			return $query->result_array();
		}
	}

	public function checkToken($email, $tokenType){
		$result = $this->db->get_where('passwordToken', array('tokenType' => $tokenType, 'email' => $email, 'active'=>'1'));
		return $result->result_array();
	}

	public function updateRegistrationLevel($userID, $registrationLevel){
		$data = array(
               'registrationLevel' => $registrationLevel
            );
		$this->db->where('userID', $userID);
		$this->db->update('users', $data);
	}

	public function getLocations(){
		$result = $this->db->get('indianCities');
		return $result->result_array();
	}

	public function getSkills(){
		$result = $this->db->get_where('skills', array('active' => '1'));
		return $result->result_array();
	}

	public function getSkillData($skill_id)
	{
		$this->db->select('*');
		$this->db->where('skillID', $skill_id);
		return $this->db->get('skills')->result_array();
	}

	public function fetchTestSettings($skill_id)
	{
		$this->db->select('*');
		$result = $this->db->get_where('testSettings', ['skillID' => $skill_id]);
		// var_dump($this->db->last_query());
		if ($result->result_array() !== NULL)
			return $result->result_array();
	}

	public function fetchQuestionNumber($skill_id)
	{
		$this->db->select('count(question_id)');
		$result = $this->db->get_where('questions', ['skillID' => $skill_id]);
		// var_dump($this->db->last_query());
		// var_dump($result->result_array()); die();
			return $result->result_array();
	}

	public function fetchQuestions($num_ques, $skill_id)
	{
		$this->db->select('question_id, question, option1, option2, option3, option4');
		$this->db->order_by('question_id', 'RANDOM');
		$this->db->limit($num_ques);
		$result = $this->db->get_where('questions', ['skillID'=> $skill_id, 'active'=> '1']);
		return $result->result_array();
	}

	public function getAnswers($ques_ids)
	{
		$i = 0;
		foreach ($ques_ids as $key => $ques_id) {
			$this->db->select('answer');
			$result = $this->db->get_where('questions', array('question_id' => $ques_id));
			$answers[$i++] = $result->result_array()[0]['answer'];
		}
		return $answers;
	}

	public function addSkilltoUser($skill_id, $user_id, $score, $date)
	{
		$data = ['skillID'=> $skill_id, 'userID'=> $user_id, 'score'=> $score, 'testDate'=> $date, 'skillType'=> '1'];
		$this->db->insert('userSkills', $data);
		return (bool)$this->db->affected_rows();
	}
	/*		SKILL END 		*/
	/*		CHATS		*/


	public function fetchChatIds($user){
		$query = "SELECT MAX(`messageID`) AS `messageID` FROM `messages` WHERE `receiver` = '$user' OR `sender` = '$user' GROUP BY receiver+sender";
		$result = $this->db->query($query);
		$result = $result->result_array();
		return array_column($result, 'messageID');
	}

	public function fetchChats($user, $offset = 0, $limit = 5){
		$this->db->select('*');
		$recent = $this->fetchChatIds($user, $offset, $limit);
		if(empty($recent))
			return $recent;
		$this->db->where_in('messageID', $recent);
		$this->db->order_by('messageID', 'DESC');
		$this->db->limit($limit, $offset);
		return $this->db->get('messages')->result_array();
	}

	public function fetchMessages($sender, $receiver, $offset = 0, $limit = 10){
		$this->db->select('*');
		$this->db->where(['sender'=> $sender, 'receiver'=> $receiver]);
		$this->db->or_where(['sender'=> $receiver]);
		$this->db->where(['receiver'=> $sender]);
		$this->db->order_by('messageID', 'DESC');
		$this->db->limit($limit, $offset);
		$res = $this->db->get('messages')->result_array();
		return $res;
	}

	public function markMessagesAsRead($sender_id, $receiver_id){
		$this->db->set('read', '1');
		$this->db->where(['sender'=> $sender_id, 'receiver'=> $receiver_id]);
		$this->db->update('messages');
	}

	public function sendMessage($sender, $receiver, $message){
		$data['sender'] = $sender;
		$data['receiver'] = $receiver;
		$data['message'] = $message;
		$data['read'] = 0;
		$success = $this->db->insert('messages', $data);
		$insert_id = $this->db->insert_id();
		return ['success'=> $success, 'insert_id'=> $insert_id];
	}

	public function readMessage($id){
		$this->db->set('read', '1');
		$this->db->where('messageID', $id);
		return $this->db->update('messages');
	}

	public function checkForNewMessages($sender, $receiver, $lastid){
		$this->db->select('*');
		$this->db->where('messageID >', $lastid);
		$this->db->where("((sender = $sender AND receiver = $receiver) OR
			(sender = $receiver AND receiver = $sender))", null, false);
		$res = $this->db->get_where('messages');
		$res = $res->result_array();
		return (empty($res)) ? false : $res;
	}

	public function hasUnreadMessages($user_id){
		$this->db->select('*');
		$this->db->where('receiver', $user_id);
		$res = $this->db->get_where('messages', ['read'=> 0])->result_array();
		return count($res);
	}



	public function getConnections($userID){
		$this->db->where('active', $userID);
		$this->db->where('status', '1');
		$this->db->or_where('passive', $userID);
		$this->db->where('status', '1');
		$result = $this->db->get('connections');
		return $result->result_array();
	}

	public function getConnectionUsernames($userID){
		$query = "SELECT users.name, users.userID from connections join users on connections.passive = users.userID where connections.active = 2 AND status = 1 UNION SELECT users.name, users.userID from connections join users on connections.active = users.userID where connections.passive = 2 AND status = 1";
		$result = $this->db->query($query);
		$connections = $result->result_array();
		return $connections;
	}

	public function getConnectionRequests($userID){
		$result = $this->db->get_where('connections', array('passive'=>$userID, 'status'=> '0'));
		return $result->result_array();
	}

	public function checkConnections($userID){
		$user = $_SESSION['userData']['userID'];
		$this->db->select('*');
		$this->db->where('status', '1');
		$this->db->where("((active = $userID AND passive = $user) OR
			(passive = $userID AND active = $user))");
		$result = $this->db->get('connections');
		return $result->result_array();
	}

	public function checkConnectionWithStatus($userID){
		$user = $_SESSION['userData']['userID'];
		$this->db->select('*');
		$this->db->where("((active = $userID AND passive = $user) OR
			(passive = $userID AND active = $user))");
		$result = $this->db->get('connections');
		return $result->result_array();
	}

	public function addInternship($data){
		$this->db->insert('internshipOffers', $data);
		return ($this->db->affected_rows()>0)?$this->db->insert_id():0;
	}

	public function insertPasswordToken($data){
		return $this->db->insert('passwordToken', $data);
	}

	public function map_intern_locations($data){
		return $this->db->insert_batch('internshipLocations', $data);
	}

	public function map_intern_skills($data){
		return $this->db->insert_batch('internshipSkills', $data);
	}

	public function getAddedJobOffers(){
		$addedBy = $_SESSION['userData']['userID'];
		$this->db->join('jobSkills', 'jobOffers.jobID = jobSkills.jobID', 'left outer');
		$this->db->join('skills', 'jobSkills.skillID = skills.skillID', 'left outer');
		$this->db->join('employerUsers', 'jobOffers.addedBy = employerUsers.userID');
		$this->db->select('jobOffers.jobTitle, jobOffers.addedBy, jobOffers. jobID, GROUP_CONCAT(jobSkills.skillID) as skillIDsRequired, GROUP_CONCAT(skills.skill_name) as skillsRequired, employerUsers.companyLogo, employerUsers.companyName');
		$this->db->group_by('jobOffers.jobID');
		$this->db->order_by('jobOffers.jobID', 'DESC');
		$result = $this->db->get_where('jobOffers', array('addedBy' => $addedBy));
		return $result->result_array();
	}

	public function getAddedInternshipOffers(){
	  $addedBy = $_SESSION['userData']['userID'];
	  $this->db->join('internshipSkills', 'internshipOffers.internshipID = internshipSkills.internshipID', 'left outer');
	  $this->db->join('skills', 'internshipSkills.skillID = skills.skillID', 'left outer');
	  $this->db->join('employerUsers', 'internshipOffers.addedBy = employerUsers.userID');
	  $this->db->select('internshipOffers.internshipTitle, internshipOffers.addedBy, internshipOffers. internshipID, GROUP_CONCAT(internshipSkills.skillID) as skillIDsRequired, GROUP_CONCAT(skills.skill_name) as skillsRequired, employerUsers.companyLogo, employerUsers.companyName');
	  $this->db->group_by('internshipOffers.internshipID');
	  $this->db->order_by('internshipOffers.internshipID', 'DESC');
	  $result = $this->db->get_where('internshipOffers', array('addedBy' => $addedBy));
	  return $result->result_array();
	}

	public function addJob($data){
		$this->db->insert('jobOffers', $data);
		return ($this->db->affected_rows()>0)?$this->db->insert_id():0;
	}

	public function map_job_locations($data){
		return $this->db->insert_batch('jobLocations', $data);
	}

	public function map_job_skills($data){
		return $this->db->insert_batch('jobSkills', $data);
	}

	public function deleteInternship($internshipID){
		return $this->db->delete('internshipOffers', array('internshipID' => $internshipID));
	}

	public function getJobOffers(){
			$this->db->join('jobLocations', 'jobOffers.jobID = jobLocations.jobID', 'left outer');
			$this->db->join('indianCities', 'jobLocations.cityID = indianCities.cityID', 'left outer');
			$this->db->join('employerUsers', 'jobOffers.addedBy=employerUsers.userID');
			$this->db->join('jobSkills', 'jobOffers.jobID = jobSkills.jobID', 'left outer');
			$this->db->join('skills', 'jobSkills.skillID = skills.skillID', 'left outer');
			$this->db->select('jobOffers.jobTitle, jobOffers.addedBy, jobOffers. jobID, jobOffers.applicants, GROUP_CONCAT(DISTINCT jobSkills.skillID) as skillIDsRequired, GROUP_CONCAT(DISTINCT skills.skill_name) as skillsRequired, GROUP_CONCAT(DISTINCT jobLocations.cityID) as cityIDs,GROUP_CONCAT(DISTINCT indianCities.city) as cities, employerUsers.companyName, employerUsers.companyLogo');
			$this->db->group_by('jobOffers.jobID');
			$this->db->order_by('jobOffers.jobID', 'DESC');
			$result = $this->db->get('jobOffers');
			return $result->result_array();
	}

	public function getJobDetails($jobID){
		$this->db->select('jobOffers.jobID, jobOffers.jobTitle, jobOffers.jobtype, jobOffers.jobDescription, jobOffers.startDate, jobOffers.applicationDeadline, jobOffers.offerType, jobOffers.offer, jobOffers.minimumOffer, jobOffers.maximumOffer, jobOffers.partTime, jobOffers.openings, jobOffers.addedBy, employerUsers.companyName, GROUP_CONCAT(DISTINCT jobSkills.skillID) as skillIDsRequired, GROUP_CONCAT(DISTINCT skills.skill_name) as skillsRequired, GROUP_CONCAT(DISTINCT jobLocations.cityID) as cityIDs,GROUP_CONCAT(DISTINCT indianCities.city) as cities, employerUsers.companyWebsite, employerUsers.companyDescription');
		$this->db->join('jobLocations', 'jobOffers.jobID = jobLocations.jobID', 'left outer');
		$this->db->join('indianCities', 'jobLocations.cityID = indianCities.cityID', 'left outer');
		$this->db->join('employerUsers','employerUsers.userID = jobOffers.addedBy');
		$this->db->join('jobSkills', 'jobOffers.jobID = jobSkills.jobID');
		$this->db->join('skills', 'jobSkills.skillID = skills.skillID', 'left outer');
		$result = $this->db->get_where('jobOffers', array('jobOffers.jobID' => $jobID));
		return $result->result_array();
	}

	public function getInternshipDetails($internshipID){
		$this->db->select('internshipOffers.internshipID, internshipOffers.internshipTitle, internshipOffers.internshiptype, internshipOffers.internshipDescription, internshipOffers.startDate, internshipOffers.applicationDeadline, internshipOffers.stipendType, internshipOffers.stipend, internshipOffers.minimumStipend, internshipOffers.maximumStipend, internshipOffers.partTime, internshipOffers.openings, internshipOffers.addedBy, employerUsers.companyName, GROUP_CONCAT(DISTINCT internshipSkills.skillID) as skillIDsRequired, GROUP_CONCAT(DISTINCT skills.skill_name) as skillsRequired, GROUP_CONCAT(DISTINCT internshipLocations.cityID) as cityIDs,GROUP_CONCAT(DISTINCT indianCities.city) as cities, employerUsers.companyWebsite, employerUsers.companyDescription');
		$this->db->join('internshipLocations', 'internshipOffers.internshipID = internshipLocations.internshipID', 'left outer');
		$this->db->join('indianCities', 'internshipLocations.cityID = indianCities.cityID', 'left outer');
		$this->db->join('employerUsers','employerUsers.userID = internshipOffers.addedBy');
		$this->db->join('internshipSkills', 'internshipOffers.internshipID = internshipSkills.internshipID');
		$this->db->join('skills', 'internshipSkills.skillID = skills.skillID', 'left outer');
		$result = $this->db->get_where('internshipOffers', array('internshipOffers.internshipID' => $internshipID));
		// var_dump($this->db->last_query()); die();
		return $result->result_array();
	}


	public function getRelevantLocations($job){
		if($job == 1)
			$table = "jobLocations";
		else
			$table  = "internshipLocations";
		$this->db->DISTINCT($table . '.cityID');
		$this->db->select($table . '.cityID, indianCities.city, indianCities.state');
		$this->db->join('indianCities',$table.'.cityID = indianCities.cityID');
		$result = $this->db->get($table);
		return $result->result_array();
	}
	public function getJobOffersSkillFilters($skills){
		if($skills != NULL){
			$this->db->select('DISTINCT(jobID)');
			$this->db->where_in('skillID', $skills);
			return $this->db->get('jobSkills')->result_array();
		}else{
			return null;
		}
	}

	public function getJobOffersLocationFilters($locations){
		if($locations != NULL){
			$this->db->select('DISTINCT(jobID)');
			$this->db->where_in('cityID', $locations);
			return $this->db->get('jobLocations')->result_array();
		}else{
			return null;
		}
	}

	public function getinternshipOffersSkillFilters($skills){
		if($skills != NULL){
			$this->db->select('DISTINCT(internshipID)');
			$this->db->where_in('skillID', $skills);
			return $this->db->get('internshipSkills')->result_array();
		}else{
			return null;
		}
	}

	public function getinternshipOffersLocationFilters($locations){
		if($locations != NULL){
			$this->db->select('DISTINCT(internshipID)');
			$this->db->where_in('cityID', $locations);
			return $this->db->get('internshipLocations')->result_array();
		}else{
			return null;
		}
	}

	public function getRelevantSkills($job = 0){
		if($job == 1)
			$table = "jobSkills";
		else
			$table  = "internshipSkills";
		$this->db->DISTINCT($table . '.skillID');
		$this->db->select($table . '.skillID, skills.skill_name');
		$this->db->join('skills',$table.'.skillID = skills.skillID');
		$result = $this->db->get_where($table, array('skills.active' => 1 ));
		return $result->result_array();

	}

	public function getInternshipOffers(){
	    $this->db->join('internshipLocations', 'internshipOffers.internshipID = internshipLocations.internshipID', 'left outer');
	    $this->db->join('indianCities', 'internshipLocations.cityID = indianCities.cityID', 'left outer');
	    $this->db->join('employerUsers', 'internshipOffers.addedBy=employerUsers.userID');
	    $this->db->join('internshipSkills', 'internshipOffers.internshipID = internshipSkills.internshipID', 'left outer');
	    $this->db->join('skills', 'internshipSkills.skillID = skills.skillID', 'left outer');
	    $this->db->select('internshipOffers.internshipTitle, internshipOffers.addedBy, internshipOffers. internshipID, internshipOffers.applicants, GROUP_CONCAT(DISTINCT internshipSkills.skillID) as skillIDsRequired, GROUP_CONCAT(DISTINCT skills.skill_name) as skillsRequired, GROUP_CONCAT(DISTINCT internshipLocations.cityID) as cityIDs,GROUP_CONCAT(DISTINCT indianCities.city) as cities, employerUsers.companyName, employerUsers.companyLogo');
	    $this->db->group_by('internshipOffers.internshipID');
	    $this->db->order_by('internshipOffers.internshipID', 'DESC');
	    $result = $this->db->get('internshipOffers');
	    return $result->result_array();
	}

	public function addWorkEx($data){
		return $this->db->insert('workExperience', $data);
	}

	public function addProject($data){
		return $this->db->insert('projects', $data);
	}

	public function register($data){
		return $this->db->insert('users', $data);
	}

	public function addAchievement($data){
		return $this->db->insert('achievements', $data);
	}

	public function getUserDetails($userId){
		$result = $this->db->get_where('users', array('userID' => $userId), '1');
		return $result->result_array();
	}

	public function getUserProjects($userID){
		$result = $this->db->get_where('projects', array('userID' => $userID));
		return $result->result_array();
	}

	public function getUserWorkEx($userID){
		$result = $this->db->get_where('workExperience', array('userID' => $userID));
		return $result->result_array();
	}

	public function getUserAchievements($userID){
		$result = $this->db->get_where('achievements', array('userID' => $userID));
		return $result->result_array();
	}

	public function getUserSkills($userID){
		$this->db->join('skills', 'userSkills.skillID = skills.skillID');
		$result = $this->db->get_where('userSkills', array('userID' => $userID));
		return $result->result_array();
	}

	public function getColleges(){
		$result = $this->db->get_where('colleges', array('active' => '1'));
		return $result->result_array();
	}

	public function getCourses(){
		$result = $this->db->get_where('courses', array('active' => '1'));
		return $result->result_array();
	}

	public function checkEMailExist($email){
		$this->db->where('email', $email);
		$result = $this->db->get('users');
		if ($result->num_rows() > 0) {
			return 1;
		}
		else{
			return 0;
		}
	}

	public function checkMobileExist($mobile){
		$this->db->where('mobile', $mobile);
		$result = $this->db->get('users');
		if ($result->num_rows() > 0) {
			return 1;
		}
		else{
			return 0;
		}
	}

	public function checkPasswordMatch($email, $password){
		$result = $this->db->get_where('users', array('email' => $email,'password' => $password), 1, 0);
		if ($result->num_rows()>0) {
			return true;
		}
		return false;
	}

	public function changePassword($email, $password){
		$query = "UPDATE users SET password='$password' WHERE email='$email'";
		return $this->db->query($query);
	}

	public function getJobData($jobID){
		$this->db->join('employerUsers', 'jobOffers.addedBy = employerUsers.userID');
		$result = $this->db->get_where('jobOffers', array('jobID' => $jobID));
		return $result->result_array();
	}

	public function getInternshipData($internshipID){
		$this->db->join('employerUsers', 'internshipOffers.addedBy = employerUsers.userID');
		$result = $this->db->get_where('internshipOffers', array('internshipID' => $internshipID));
		return $result->result_array();
	}

	public function content(){
		$result = $this->db->get('content');
		return $result->result_array();
	}

	public function addEducationalDetails($data){
		return $this->db->insert('generalUsers', $data);
	}

	public function addEmployerDetails($data){
		return $this->db->insert('employerUsers', $data);
	}

	public function contactUs($data){
		return $this->db->insert('contactMessages', $data);
	}

	public function deactivateToken($email, $tokenType){
		$data = array(
			'active' => '0'
		);
		$this->db->where('email', $email);
		$this->db->where('tokenType', $tokenType);
		return $this->db->update('passwordToken', $data);
	}

	public function getConnectionProfiles($connections){
		$this->db->where_in('userID', $connections);
		$this->db->select('userID, name, profileImage');
		$result = $this->db->get('users');
		return $result->result_array();
	}

	public function getAppliedJobOffers(){
		$userID = $_SESSION['userData']['userID'];
		$this->db->join('jobOffers', 'jobApplicants.jobID = jobOffers.jobID');
		$this->db->join('employerUsers', 'jobOffers.addedBy = employerUsers.userID');
		$this->db->select('jobOffers.jobTitle, jobOffers.jobID, employerUsers.companyName, employerUsers.companyLogo, jobApplicants.status');
		$result = $this->db->get_where('jobApplicants', array('jobApplicants.userID'=>$userID));
		return $result->result_array();
	}

	public function getAppliedInternshipOffers(){
		$userID = $_SESSION['userData']['userID'];
		$this->db->join('internshipOffers', 'internshipApplicants.internshipID = internshipOffers.internshipID');
		$this->db->join('employerUsers', 'internshipOffers.addedBy = employerUsers.userID');
		$this->db->select('internshipOffers.internshipTitle, internshipOffers.internshipID, employerUsers.companyName, employerUsers.companyLogo, internshipApplicants.status');
		$result = $this->db->get_where('internshipApplicants', array('internshipApplicants.userID'=>$userID));
		return $result->result_array();
	}

	public function getOfferData($offerType, $offerID){
		if($offerType=='1'){
			$this->db->select('jobTitle,addedBy');
			$result = $this->db->get_where('jobOffers', array('jobID'=> $offerID));
			return $result->result_array()[0];
		}
		if($offerType=='2'){
			$this->db->select('internshipTitle,addedBy');
			$result=  $this->db->get_where('internshipOffers', array('internshipID'=> $offerID));
			return $result->result_array()[0];
		}
	}

	public function getApplicants($offerType, $offerID){
		$this->db->select('users.userID, users.name, colleges.college, courses.course, generalUsers.batch, timestamp, GROUP_CONCAT(DISTINCT userSkills.skillID) AS userSkillIDs,GROUP_CONCAT(DISTINCT skills.skillID) AS userSkills');
		$this->db->join('users', 'jobApplicants.userID = users.userID');
		$this->db->join('generalUsers', 'users.userID = generalUsers.userID');
		$this->db->join('colleges', 'generalUsers.collegeID = colleges.college_id');
		$this->db->join('courses', 'generalUsers.courseID = courses.course_id');
		$this->db->join('userSkills', 'generalUsers.userID = userSkills.userID', 'left outer');
		$this->db->join('skills', 'userSkills.skillID = skills.skillID', 'left outer');
		$this->db->group_by('users.userID');
		$this->db->group_by('colleges.college_id');
		$this->db->group_by('generalUsers.batch');
		$this->db->group_by('courses.course_id');
		if($offerType=='1'){
			$this->db->group_by('jobApplicants.timestamp');
			$result = $this->db->get_where('jobApplicants', array('jobID'=> $offerID));}
		if($offerType=='2'){
			$this->db->group_by('internshipApplicants.timestamp');
			$result=  $this->db->get_where('internshipApplicants', array('internshipID'=> $offerID));}
		return $result->result_array();
	}

	public function getSearchResults($query){
		$term = $this->db->escape($query);
		$term = str_replace("'", "", $query);
		$query = "(select userID, name, 'users' as tbl from users where name like '%$term%') union (select internshipID,internshipTitle, 'internships' as tbl from internshipOffers where internshipTitle like '%$term%') union (select jobID,jobTitle, 'jobs' as tbl from jobOffers where jobTitle like '%$term%')";
		return $this->db->query($query)->result_array();
	}

	public function getFeeds(){
		$query = "SELECT `jobOffers`.`jobTitle` AS `title`, `jobOffers`.`jobID` AS `offerID`, 'Job' AS `offerType`, `jobOffers`.`addedBy` AS `addedBy`, `users`.`name`, `users`.`profileImage`, `jobOffers`.`timestamp` from `jobOffers` JOIN `users` ON `jobOffers`.`addedBy`=`users`.`userID` UNION SELECT `internshipOffers`.`internshipTitle` AS `title`, `internshipOffers`.`internshipID` AS `offerID`, 'Internship' AS `offerType`, `internshipOffers`.`addedBy`, `users`.`name`, `users`.`profileImage` AS `addedBy`, `internshipOffers`.`timestamp` from `internshipOffers` JOIN `users` ON `internshipOffers`.`addedBy`=`users`.`userID`";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function checkConnectionExist($user1,$user2){
		$query = "SELECT COUNT(*) AS count from connections WHERE ((`active`='$user2' AND `passive`='$user1') OR (`active`='$user1' AND `passive`='$user2')) AND `status`='1'";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function removeConnection($user1,$user2){
		$query = "DELETE from connections WHERE ((`active`='$user2' AND `passive`='$user1') OR (`active`='$user1' AND `passive`='$user2')) AND `status`='1'";
		return $this->db->query($query);
	}

	public function requestConnection($data){
		return $this->db->insert('connections', $data);
	}

	public function cancelConnectionRequest($user1,$user2){
		$query = "DELETE from connections WHERE ((`active`='$user2' AND `passive`='$user1') OR (`active`='$user1' AND `passive`='$user2')) AND `status`='0'";
		return $this->db->query($query);
	}

	public function acceptConnectionRequest($user1,$user2){
		$query = "UPDATE connections SET `status`='1' WHERE `active`='$user1' AND `passive`=$user2";
		return $this->db->query($query);
	}

}
