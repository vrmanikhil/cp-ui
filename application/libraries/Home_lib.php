<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_lib {

	public function login($email,$password)
	{
		$CI =& get_instance();
		$CI->load->model('home_model','homeModel');
		$result = $CI->homeModel->login($email,$password);
		$userData = $CI->homeModel->getUserDetailsFromEMail($email);
		$userData = $userData[0];
		$registrationLevel = $userData['registrationLevel'];
		if ($result) {
			$data = array(
				'loggedIn' => true,
				'email' => $email,
				'name' => $userData['name'],
				'userID' => $userData['userID'],
				'accountType' => $userData['accountType'],
				);
			if($userData['accountType']=='1'){
				$CI->session->set_userdata('collegeLogo', $userData['logo']);
				$CI->session->set_userdata('collegeName', $userData['college']);
			}
			if($userData['accountType']=='2'){
				$CI->session->set_userdata('companyLogo', $userData['companyLogo']);
				$CI->session->set_userdata('companyName', $userData['companyName']);
			}
			$CI->session->set_userdata('userData', $data);
			$profileImage = $userData['profileImage'];
			$coverImage = $userData['coverImage'];
			$CI->session->set_userdata('profileImage', $profileImage);
			$CI->session->set_userdata('coverImage', $coverImage);
			$CI->session->set_userdata('registrationLevel', $registrationLevel);
			return 1;
		}
		return 0;
	}

	public function auth(){
		$CI = & get_instance();
		$CI->load->library('session');
		$data = $CI->session->userdata('userData');
		if (isset($data['loggedIn']) && $data['loggedIn']) {
			return 1;
		}
		return 0;
	}

	public function getAddedJobOffers(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getAddedJobOffers();
	}


	public function getJobOffersSkillFilters($skills){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getJobOffersSkillFilters($skills);
	}
	public function getinternshipOffersLocationFilters($location){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getinternshipOffersLocationFilters($location);
	}
	public function getinternshipOffersSkillFilters($skills){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getinternshipOffersSkillFilters($skills);
	}
	public function getJobOffersLocationFilters($location){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getJobOffersLocationFilters($location);
	}

	public function getAddedInternshipOffers(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getAddedInternshipOffers();

	}

	public function getLocations(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getLocations();
	}

	public function getRelevantLocations($job){
		$CI = &get_instance();
		$CI->load->model('Home_model','homemodel');
		return $CI->homemodel->getRelevantLocations($job);
	}

	public function getRelevantSkills($job = 0){
		$CI = &get_instance();
		$CI->load->model('Home_model','homemodel');
		return $CI->homemodel->getRelevantSkills($job);
	}

	public function getSkills(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getSkills();
	}

	public function getConnections($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getConnections($userID);
	}

	public function checkConnection($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return !empty($CI->homeModel->checkConnections($userID));
	}

	public function countConnections($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		$count = $CI->homeModel->countConnections($userID);
		return $count[0]['count(*)'];
	}

	public function checkConnectionWithStatus($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->checkConnectionWithStatus($userID);
	}

	public function getConnectionUsernames($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		$connection = $CI->homeModel->getConnectionUsernames($userID);
		return $connection;
	}

	public function getConnectionRequests($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getConnectionRequests($userID);
	}

	public function getJobOffers(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getJobOffers();
	}


	public function getJobDetails($jobID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getJobDetails($jobID);
	}

	public function getInternshipDetails($internshipID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getInternshipDetails($internshipID);
	}

	public function getInternshipOffers(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getInternshipOffers();
	}

	public function addInternship($data){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->addInternship($data);
	}

	public function register($data){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->register($data);
	}

	public function addJob($data){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->addJob($data);
	}

	public function checkToken($email, $tokenType){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->checkToken($email, $tokenType);
	}

	public function insertPasswordToken($data){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->insertPasswordToken($data);
	}

	public function deleteInternship($internshipID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->deleteInternship($internshipID);
	}

	public function addWorkEx($data){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->addWorkEx($data);
	}

	public function addProject($data){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->addProject($data);
	}

	public function delete($id, $table, $name){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->delete($id, $table, $name);
	}

	public function addEducation($data){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->addEducation($data);
	}

	public function updateRegistrationLevel($userID, $registrationLevel){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->updateRegistrationLevel($userID, $registrationLevel);
	}

	public function addAchievement($data){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->addAchievement($data);
	}

	public function getUserDetails($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getUserDetails($userID);
	}

	public function checkAnswers($ans)
	{
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		$ques_ids = array_column($ans, 'ques_id');
		$actual_ans = $CI->homemodel->getAnswers($ques_ids);
		$ans_given =array_column($ans, 'ans');
		return $this->getScore($actual_ans, $ans_given);
	}

	public function getScore($actual_ans, $ans_given)
	{
		$CI = &get_instance();
		$score = 0;
		for ($i = 0; $i < count($actual_ans); $i++) {
			if($actual_ans[$i] == ($ans_given[$i]))
				$score++;
		}
		$test_settings = $CI->session->userdata('test_settings');
		$percent = $score/$test_settings[0]['numberQuestions'] * 100;
		return $percent;
	}

	public function addSkill($score, $userID, $skill_id, $num_ques)
	{
		$response = 0;
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		if($this->passedTest($score)){
			date_default_timezone_set('Asia/Kolkata');
			$time = time();
			$date = date("d-m-Y", $time);
			$datestamp = strtotime($date);
			if($CI->homemodel->addSkillToUser($skill_id, $userID, $score, $datestamp)){
				$response = 1;
			}else{
				$response = 2;
			}
		}
		return $response;
	}

	public function passedTest($score)
	{
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		$test_settings = $CI->session->userdata('test_settings');
		return ($score >= $test_settings[0]['passingCriteria']);
	}

	/*	Chats	*/

	public function fetchLatestChats($offset = 0, $limit = 5)
	{
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		$chats = $CI->homemodel->fetchChats($_SESSION['userData']['userID'], $offset, $limit);
		$this->fixTimestamp($chats, 'timestamp', 'd M Y  g:i A');
		$this->injectUserNames($chats);
		return $chats;
	}

	public function fixTimestamp(&$data, $timestamp, $format)
	{
		date_default_timezone_set("Asia/Kolkata");
		for($i =0; $i < count($data); $i++){
			$data[$i][$timestamp] = date($format, strtotime($data[$i][$timestamp]));
		}
	}

	public function injectUserNames(&$data)
	{
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		$names = [];
		$current_user = $_SESSION['userData']['userID'];
		foreach ($data as $index=> $message) {
			$sender = $message['sender'];
			$receiver = $message['receiver'];
			if(!isset($names[$sender])){
				$names[$sender] = $this->fetchFormedUserName($sender);
			}
			if(!isset($names[$receiver])){
				$names[$receiver] = $this->fetchFormedUserName($receiver);
			}
			if($sender != $current_user){
				$data[$index]['chatter'] = $names[$sender];
				$data[$index]['profile_image'] = $CI->homemodel->getUserDetails($sender)[0]['profileImage'];
				$data[$index]['chatter_id'] = $sender;
			}else{
				$data[$index]['chatter'] = $names[$receiver];
				$data[$index]['profile_image'] = $CI->homemodel->getUserDetails($receiver)[0]['profileImage'];
				$data[$index]['chatter_id'] = $receiver;
			}
		}
	}

	public function fetchFormedUserName($user_id = null)
	{
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		$user_id = (empty($user_id)) ? $_SESSION['userData']['userID'] : $user_id;
		$name = $CI->homemodel->getUserDetails($user_id);
		return $name[0]['name'];
	}


	public function fetchConversation($user_id, $offset = 0, $limit = 5)
	{
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		$res = $CI->homemodel->fetchMessages($_SESSION['userData']['userID'], $user_id, $offset, $limit);
		$this->fixTimestamp($res, 'timestamp', 'd M Y  g:i A');
		$this->injectClassName($res);
		return $res;
	}
	public function loadMoreMessages($user_id, $offset = 0, $limit = 5)
	{
		$CI = &get_instance();
		$CI->load->model('Home_model');
		$res = $CI->Home_model->fetchMessages($user_id, $_SESSION['userData']['userID'], $offset, $limit);
		// var_dump($res); die();
		return !empty($res);
	}

	public function markAsRead($chatter_id)
	{
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		$CI->homemodel->markMessagesAsRead($chatter_id, $_SESSION['userData']['userID']);
	}

	public function moreChats($offset = 0, $limit = 5)
	{
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		$res = $CI->homemodel->fetchChats($_SESSION['userData']['userID'], $offset, $limit);
		return !empty($res);
	}

public function injectClassName(&$data)
	{
		foreach($data as $index => $value){
			$data[$index]['class'] = 'receiver';
			if($value['sender'] == $_SESSION['userData']['userID'])
				$data[$index]['class'] = 'sender';
		}
	}

	public function sendMessage($receiver, $message)
	{
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		$success = $CI->homemodel->sendMessage($_SESSION['userData']['userID'], $receiver, $message);
		return ['success'=> $success['success'],
				'time'=> date('d M Y  g:i A', time()),
				'insert_id'=> $success['insert_id']];
	}

	public function checkForNewMessages($chatter, $lastid)
	{
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		 $success = $CI->homemodel->checkForNewMessages($_SESSION['userData']['userID'], $chatter, $lastid);
		if($success){
			$this->fixTimestamp($success, 'timestamp', 'd M Y  g:i A');
			$this->injectClassName($success);
		}
		return $success;
	}


	public function getUserSkills($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getUserSkills($userID);
	}

	public function fetchSkillData($skill_id)
	{
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		return $CI->homemodel->getSkillData($skill_id)[0];
	}

	public function isInTest()
	{
		$CI = &get_instance();
		$CI->load->library('session');
		return $CI->session->userdata('in_test');
	}

	public function getTestSettings($skill_id)
	{
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		$setting = $CI->homemodel->fetchTestSettings($skill_id);
		return $setting;
	}

	public function getTestQuestions($skill_id)
	{
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		$setting = $CI->homemodel->fetchQuestionNumber($skill_id);
		return $setting;
	}

	public function getQuestions($num_ques, $skill_id)
	{
		// var_dump($num_ques, $skill_id);die;
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		return $CI->homemodel->fetchQuestions($num_ques, $skill_id);
	}



	public function getColleges(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getColleges();
	}

	public function getCourses(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getCourses();
	}

	public function checkEMailExist($email){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel-> checkEMailExist($email);
	}

	public function checkMobileExist($mobile){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel-> checkMobileExist($mobile);
	}

	public function checkPasswordMatch($email, $password){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->checkPasswordMatch($email, $password);
	}

	public function changePassword($email, $password){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->changePassword($email, $password);
	}

	public function getJobData($jobID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getJobData($jobID);
	}

	public function getInternshipData($internshipID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getInternshipData($internshipID);
	}

	public function addEducationalDetails($data){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->addEducationalDetails($data);
	}

	public function addEmployerDetails($data){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->addEmployerDetails($data);
	}

	public function contactUs($data){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->contactUs($data);
	}

	public function deactivateToken($email, $tokenType){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->deactivateToken($email, $tokenType);
	}

	public function getConnectionProfiles($connections){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getConnectionProfiles($connections);
	}

	public function getAppliedJobOffers(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getAppliedJobOffers();
	}

	public function getAppliedInternshipOffers(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getAppliedInternshipOffers();
	}

	public function getOfferData($offerType, $offerID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getOfferData($offerType, $offerID);
	}

	public function getApplicants($offerType, $offerID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getApplicants($offerType, $offerID);
	}

	public function getSearchResults($query){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getSearchResults($query);
	}

	public function getFeeds(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getFeeds();
	}

	public function checkConnectionExist($user1, $user2){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->checkConnectionExist($user1, $user2);
	}

	public function removeConnection($user1, $user2){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->removeConnection($user1, $user2);
	}

	public function requestConnection($data){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->requestConnection($data);
	}

	public function cancelConnectionRequest($user1, $user2){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->cancelConnectionRequest($user1, $user2);
	}

	public function acceptConnectionRequest($user1, $user2){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->acceptConnectionRequest($user1, $user2);
	}

	public function triggerNotification($concernedUser, $notificationType, $triggeredBy){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->triggerNotification($concernedUser, $notificationType, $triggeredBy);
	}

	public function getNotifications($offset = 0, $limit = 5){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getNotifications($offset, $limit);
	}

	public function moreNotifications($offset = 0, $limit = 5){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		$res = $CI->homeModel->getNotifications($offset, $limit);
		if(!empty($res))
			return true;
		else
			return false;
	}

	public function apply($offerType, $offerID, $userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->apply($offerType, $offerID, $userID);
	}

	public function getAchievements($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getAchievements($userID);
	}

	public function getProjects($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getProjects($userID);
	}

	public function getWorkExperiences($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getWorkExperiences($userID);
	}

	public function getEducationalDetails($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getEducationalDetails($userID);
	}

	public function getEmployerDetails($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getEmployerDetails($userID);
	}


}
