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
			$this->db->select('users.userID,users.username,users.name,users.email,users.mobile,users.profileImage,users.accountType,users.cityID,users.emailVerified, users.mobileVerified, users.registrationLevel, users.active, generalUsers.collegeID, generalUsers.courseID, generalUsers.batch, colleges.college, colleges.logo');
			$query = $this->db->get_where('users', array('email' => $email));
			return $query->result_array();
		}
		else{
			$this->db->select('users.userID,users.username,users.name,users.email,users.mobile,users.profileImage,users.accountType,users.cityID,users.emailVerified, users.mobileVerified, users.registrationLevel, users.active, employerUsers.companyName, employerUsers.companyLogo');
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

	public function getUserId($username){
		$result = $this->db->get_where('users', array('username' => $username));
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
//
	public function fetchChatIds($user){
		$query = "SELECT MAX(`messageID`) AS `messageID` FROM `messages` WHERE `receiver` = '1' OR `sender` = '1' GROUP BY receiver+sender";
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
		$this->db->where('mesaageID >', $lastid);
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
		$result = $this->db->get('connections');
		return $result->result_array();
	}

	public function getConnectionUsernames($userID){
		$this->db->where('active', $userID);
		$this->db->where('status', '1');
		$this->db->or_where('passive', $userID);
		$result = $this->db->get('connections');
		$connections = $result->result_array();
		return $connections;
	}

	public function getConnectionRequests($userID){
		$result = $this->db->get_where('connections', array('passive'=>$userID, 'status'=> '0'));
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
		$this->db->join('jobSkills', 'jobOffers.jobID = jobSkills.jobID');
		$this->db->join('skills', 'jobSkills.skillID = skills.skillID');
		$this->db->join('employerUsers', 'jobOffers.addedBy = employerUsers.userID');
		$this->db->select('jobOffers.jobTitle, jobOffers.addedBy, jobOffers. jobID, GROUP_CONCAT(jobSkills.skillID) as skillIDsRequired, GROUP_CONCAT(skills.skill_name) as skillsRequired, employerUsers.companyLogo, employerUsers.companyName');
		$this->db->group_by('jobOffers.jobID');
		$this->db->order_by('jobOffers.jobID', 'DESC');
		$result = $this->db->get_where('jobOffers', array('addedBy' => $addedBy));
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

}
