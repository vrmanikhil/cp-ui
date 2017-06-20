<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->library(array('Home_lib', 'session'));
		$this->data = array();
		// $this->data['csrf_token_name'] = $this->security->get_csrf_token_name();
		// $this->data['csrf_token'] = $this->security->get_csrf_hash();
		$this->data['header'] = $this->load->view('commonCode/header', $this->data, true);
		$this->data['headerLogin'] = $this->load->view('commonCode/headerLogin', $this->data, true);
		$this->data['footer'] = $this->load->view('commonCode/footer', $this->data, true);
		$this->data['activeUser'] = $this->load->view('commonCode/activeUser', $this->data, true);
		$this->data['userNavigation'] = $this->load->view('commonCode/userNavigation', $this->data, true);
		$this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','class'=>'');
	}

	private function redirection(){
		if(!$this->home_lib->auth()){
			redirect(base_url());
		}
		else{
			if($_SESSION['registrationLevel']=='1'){
				if($_SESSION['userData']['accountType']=='1'){
					redirect(base_url('education-details'));
				}
				if($_SESSION['userData']['accountType']=='2'){
					redirect(base_url('employer-details'));
				}
			}
			if($_SESSION['registrationLevel']=='2'){
				redirect(base_url('verify-email'));
			}
		}
	}

	public function index(){
		if($this->home_lib->auth()){
			redirect(base_url('home'));
		}
		else{
			$this->load->view('main', $this->data);
		}
	}

	public function error404(){
		$this->load->view('404', $this->data);
	}

	public function home(){
		$this->redirection();
		$this->load->view('home', $this->data);
	}

	public function educationDetails(){
		$this->data['colleges'] = $this->home_lib->getColleges();
		$this->data['courses'] = $this->home_lib->getCourses();
		$this->load->view('educationDetails', $this->data);
	}

	public function employerDetails(){
		$this->load->view('employerDetails', $this->data);
	}

	public function verifyEMail(){
		$this->generateVerifyEMail();
		$this->load->view('verifyEMail', $this->data);
	}

	public function verifyMobileNumber()
	{
		$this->load->view('verifyMobileNumber', $this->data);
	}

	public function uploadUdentityDoc()
	{
		$this->load->view('uploadIdentityDoc', $this->data);
	}

	public function userProfile()
	{
		$this->load->view('userProfile', $this->data);
	}

	public function chatNew()
	{
		$this->redirection();
		$this->load->view('chat-new', $this->data);
	}

	//Job Offers- Normal Users
	public function relevantJobs(){
		$this->redirection();
		$relevant = 1;
		$this->data['jobOffers'] = $this->home_lib->getJobOffers($relevant);
		// var_dump($this->data['jobOffers']);die;
		$this->load->view('relevantJobs', $this->data);
	}

	public function jobOffers(){
		$this->redirection();
		$relevant = 0;
		$this->data['jobOffers'] = $this->home_lib->getJobOffers($relevant);
		// var_dump($this->data['jobOffers']);die;
		$this->load->view('jobOffers', $this->data);
	}

	public function appliedJobOffers(){
		$this->redirection();
		$this->load->view('appliedJobOffers', $this->data);
	}

	//Internship Offers- Normal Users

	public function relevantInternships(){
		$this->redirection();
		$this->load->view('relevantInternships', $this->data);
	}

	public function internshipOffers(){
		$this->redirection();
		$this->load->view('internshipOffers', $this->data);
	}

	public function appliedInternshipOffers(){
		$this->redirection();
		$this->load->view('appliedInternshipOffers', $this->data);
	}

	//

	public function changePassword(){
		$this->redirection();
		$this->load->view('changePassword', $this->data);
	}

	public function aboutUs(){
		$this->load->model('Home_model');
		$this->data['about']= $this->Home_model->content();
		$this->load->view('aboutUs', $this->data);
	}

	public function termsAndConditions(){
		$this->load->model('Home_model');
		$this->data['terms']= $this->Home_model->content();
		$this->load->view('termsAndConditions', $this->data);
	}

	public function privacyPolicy(){
		$this->load->model('Home_model');
		$this->data['privacypolicy']= $this->Home_model->content();
		$this->load->view('privacyPolicy', $this->data);
	}

	public function coat(){
		$this->load->model('Home_model');
		$this->data['coat']= $this->Home_model->content();
		$this->load->view('coat', $this->data);
	}

	public function contactUs(){
		$this->load->view('contactUs', $this->data);
	}

	public function search(){
		$this->load->view('search', $this->data);
	}

	public function addJobOffer(){
		$this->redirection();
		$this->data['locations'] = $this->home_lib->getLocations();
		$this->data['skills'] = $this->home_lib->getSkills();
		$this->load->view('addJobOffer', $this->data);
	}

	public function addedJobOffers(){
		$this->redirection();
		$this->data['addedJobOffers'] = $this->home_lib->getAddedJobOffers();
		$this->load->view('addedJobOffers', $this->data);
	}

	public function addInternshipOffer(){
		$this->redirection();
		$this->data['skills'] = $this->home_lib->getSkills();
		$this->data['locations'] = $this->home_lib->getLocations();
		$this->load->view('addInternshipOffer', $this->data);
	}

	public function addedInternshipOffers(){
		$this->redirection();
		$this->load->view('addedInternshipOffers', $this->data);
	}

	public function notifications(){
		$this->redirection();
		$this->load->view('notifications', $this->data);
	}

	/*	SKILLS 	*/

	public function skills(){
		$this->redirection();
		$this->data['userSkills'] = $this->home_lib->getUserSkills($_SESSION['userData']['userID']);
		$this->data['skills'] = $this->home_lib->getSkills();
		$this->load->view('skills', $this->data);
	}



	public function skillTest()
	{
		if($this->home_lib->isInTest()){
			$this->session->unset_userdata('skill_data');
			$this->session->unset_userdata('test_settings');
			$this->session->set_userdata('in_test', false);
			$this->session->set_flashdata('message', array('content' => 'Page Reload not Allowed during test.', 'class' => 'error'));
			redirect(base_url('skills'));
		}
		$this->session->set_userdata('in_test', true);
		$skill_data = $this->session->userdata('skill_data');
		$test_settings = $this->session->userdata('test_settings');
		$this->data['questions'] = $this->home_lib->getQuestions($test_settings[0]['numberQuestions'], $skill_data['skillID']);
		$this->data['question_string'] = base64_encode(json_encode($this->data['questions']));
		$this->data['test_settings'] = $test_settings;
		$this->data['skill_data'] = $skill_data;
		$this->load->view('skillTest', $this->data);
	}

	public function getskillTestGuidelines($get_id = NULL){
		if(!empty($get_id)) {
			$flag = 0;
			$skills = $this->home_lib->getUserSkills($_SESSION['userData']['userID']);

			foreach ($skills as $skill) {
				if($skill['skillID'] === $get_id){
					$flag = 1;
					break;
				}
			}
			if($flag !== 1){
				$skill_data = $this->home_lib->fetchSkillData($get_id);
				$this->session->set_userdata(['skill_data'=> $skill_data]);
				$this->session->set_userdata('in_test', false);
				$this->session->set_flashdata(['skill_id'=> $get_id]);
				redirect(base_url('skills/skill-test-guidelines'));
			}else{
				$this->session->set_flashdata('message', array('content' => 'You have already added the above skill. Please choose another skill to continue.', 'class' => 'error'));
				redirect(base_url('skills'));
			}
		}elseif (empty($get_id)) {
			redirect(base_url('skills'));
		}
	}

	public function skillTestGuidelines(){
		$test_settings = $this->home_lib->getTestSettings($this->session->userdata('skill_id'));
		$test_questions = $this->home_lib->getTestQuestions($this->session->userdata('skill_id'));

		if(!empty($test_settings[0]['skillID'])) {
			if($test_settings[0]['numberQuestions'] <= $test_questions[0]['count(question_id)']){
				$this->session->set_userdata(['test_settings' => $test_settings]);
				$this->data['timeAllowed'] = $test_settings[0]['timeAllowed']/60;
				$this->data['numberQuestion'] = $test_settings[0]['numberQuestions'];
				$skill_data = $this->session->userdata('skill_data');
				$this->data['skill_name'] = $skill_data['skill_name'];
				$this->data['title'] = 'Skill Test Guidelines';
				$this->load->view('skillTestGuidelines', $this->data);
			}else{
				$this->session->set_flashdata('message', array('content' => 'The Skill you have selected is not available for the Time Being. Thank You for your Co-operation.', 'class' => 'error'));
				redirect(base_url('skills'));
			}
		}else{
			$this->session->set_flashdata('message', array('content' => 'The Skill you have selected is not available for the Time Being. Thank You for your Co-operation.', 'class' => 'error'));
			redirect(base_url('skills'));
		}
	}

	/*	 CHATS 	*/


	public function composeMessage()
	{
		$connections = $this->home_lib->getConnectionUsernames($_SESSION['userData']['userID']);
		return $connections;
	}

	public function sendComposedMessage(){
		$message = $this->input->post('message');
		$recipient = $this->input->post('data');
		$receiver = $recipient['userID'];
		// $receiver = $this->home_lib->getUserId($recipient);
		// var_dump($receiver); die();
		if(!empty($receiver)){
			$response = $this->home_lib->sendMessage($receiver[0]['userID'], $message);
			redirect(base_url('messages/chats/'.$receiver[0]['userID']));
		}
	}

	public function messages()
	{
		if($_SESSION['userData']['loggedIn']){
			$number = $this->session->userdata('chats');
			$this->data['latest_chats'] = $this->home_lib->fetchLatestChats();
			$this->data['user_id'] = $this->session->userdata('userID');
			$this->data['more'] = $this->home_lib->moreChats(5);
			$this->data['title'] = 'Messages';
			$this->data['connections'] = $this->composeMessage();
			$this->load->view('messages', $this->data);
		}else{
			redirect(base_url());
		}
	}

	public function loadMoreChats($offset){
		$number = $this->session->userdata('chats');
		$dat['number'] = $number;
		$dat['latest_chats'] = $this->home_lib->fetchLatestChats($offset);
		$dat['more'] = $this->home_lib->moreChats(5 + $offset);
		echo json_encode($dat);
	}

	public function chat($chatter_id)
	{
		$this->home_lib->markAsRead($chatter_id);
		$messages = $this->home_lib->fetchConversation($chatter_id);
		$this->data['usr'] = $chatter_id;
		$chatter = $this->home_lib->getUserDetails($chatter_id);
		$this->data['profileImage'] = $chatter[0]['profileImage'];
		$this->data['user_name'] = $chatter[0]['name'];
		$more = $this->home_lib->loadMoreMessages($chatter_id, 5);
		$this->data['more'] = $more;
		$this->data['title'] = $this->data['user_name'];
		$connection = $this->home_lib->checkConnection($chatter_id);
		if(empty($connection)){
			$this->session->set_flashdata('message', array('content' => 'You need to be connected to this person to start a chat.', 'class' => 'error'));
			redirect(base_url('messages'));
		}
		$this->data['messages'] = $messages;
		$this->load->view('chat-new', $this->data);
	}

	public function loadMoreMessages($user, $offset)
	{
		$messages = $this->home_lib->fetchConversation($user, $offset);
		echo json_encode(['content'=> $messages, 'more'=> $this->home_lib->loadMoreMessages($user, $offset+5)]);
		die;
	}

	public function sendMessage()
	{
		$message = $this->input->post('message');
		$receiver = $this->input->post('to');
		$response = $this->home_lib->sendMessage($receiver, $message);
		echo json_encode($response);
	}

	public function checkForNewMessages()
	{
		$last_id = $_GET['last_id'];
		$user = $_GET['from'];
		$new_msgs = $this->home_lib->checkForNewMessages($user, $last_id);
		if(!$new_msgs)
			echo 'false';
		else
			echo json_encode($new_msgs);	
		die;
	}

	public function connections(){
		$this->redirection();
		$userID = $_SESSION['userData']['userID'];
		$this->data['connections'] = $this->home_lib->getConnections($userID);
		$connections = array();
		foreach ($this->data['connections'] as $key => $value) {
			if($value['active']==$userID){
				array_push($connections,$value['passive']);
			}
			if($value['passive']==$userID){
				array_push($connections,$value['active']);
			}
		}
		$this->data['connections'] = $this->home_lib->getConnectionProfiles($connections);
		$this->data['connectionRequests'] = $this->home_lib->getConnectionRequests($userID);
		echo "Connection Requests";
		echo "<br>";
		var_dump($this->data['connectionRequests']);
		echo "<br>";
		echo "My Connections";
		echo "<br>";
		var_dump($this->data['connections']);die;
	}

	public function generateVerifyEMail(){
		date_default_timezone_set("Asia/Kolkata");
		$email = $_SESSION['userData']['email'];
		$checkToken = $this->home_lib->checkToken($email, '1');
		$currentTime = strtotime(date("d M Y H:i:s"));
		if($checkToken){
			$expiry = $checkToken[0]['expiry'];
			$timeDifference = $expiry-$currentTime;
			if($timeDifference>0 && $timeDifference<7200){
				$emailData['token'] = $checkToken[0]['token'];
				$this->load->helper('mail_helper');
				$message =  $this->load->view('emailers/verifyE-Mail', $emailData, true);
				$data = array(
					'sendToEmail' => $email,
					'fromName' => 'CampusPuppy Private Limited',
					'fromEmail' => 'no-reply@campuspuppy.com',
					'subject' => 'Verify E-Mail|CampusPuppy Private Limited',
					'message' => $message,
					'using' =>'pepipost'
				);
				sendEmail($data);
			}
		}
		else {
			$token = "Quickbrownfoxjumpedoveralazydog0123456789".md5($email);
			$token = str_shuffle($token);
			$token = substr($token, 0,8);
			$expiry = $currentTime + 7200;
			$tokenData = array(
				'token' => $token,
				'email' => $email,
				'tokenType' => '1',
				'generatedAt' => $currentTime,
				'expiry' => $expiry,
				'active' => '1'
			);
			$this->home_lib->insertPasswordToken($tokenData);
			$emailData['token'] = $token;
			$this->load->helper('mail_helper');
			$message =  $this->load->view('emailers/verifyE-Mail', $emailData, true);
			$data = array(
				'sendToEmail' => $email,
				'fromName' => 'CampusPuppy Private Limited',
				'fromEmail' => 'no-reply@campuspuppy.com',
				'subject' => 'Verify E-Mail|CampusPuppy Private Limited',
				'message' => $message,
				'using' =>'pepipost'
			);
			sendEmail($data);
		}
	}

	// public function sendEMail(){
	// 	$this->load->helper('mail_helper');
	// 	$email = 'vrmanikhil@gmail.com';
	// 	$message =  $this->load->view('emailers/potential-interns', $data, true);
	// 	$data = array(
	// 			'sendToEmail' => $email,
	// 			'fromName' => 'CampusPuppy Private Limited',
	// 			'fromEmail' => 'nikhilverma@campuspuppy.com',
	// 			'subject' => 'Potential Interns|Graphic Designer Intern',
	// 			'message' => $message,
	// 			'using' =>'pepipost'
	// 			);
	// 	sendEmail($data);
	// }

	public function user($username=''){
		$this->data['userDetails'] = $this->home_lib->getUserDetails($username);
		$this->data['userDetails'] = $this->data['userDetails'][0];
		$userID = $this->data['userDetails']['userID'];
		$this->data['userProjects'] = $this->home_lib->getUserProjects($userID);
		$this->data['userWorkEx'] = $this->home_lib->getUserWorkEx($userID);
		$this->data['userAchievements'] = $this->home_lib->getUserAchievements($userID);
		$this->data['userSkills'] = $this->home_lib->getUserSkills($userID);
		var_dump($this->data['userAchievements']);die;
		var_dump($this->data['userDetails']);die;
	}

	public function resetPassword()
	{
		$this->session->sess_destroy();
		$this->load->view('resetPassword', $this->data);
	}

	public function getJobData($jobID){
		return $this->home_lib->getJobData($jobID);
	}

}
