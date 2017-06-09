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
			$this->data['footer'] = $this->load->view('commonCode/footer', $this->data, true);
			$this->data['activeUser'] = $this->load->view('commonCode/activeUser', $this->data, true);
			$this->data['userNavigation'] = $this->load->view('commonCode/userNavigation', $this->data, true);
			$this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','class'=>'');
	}

	private function redirection(){
			if(!$this->home_lib->auth()){
				redirect(base_url());
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

	public function home(){
		$this->redirection();
		$this->load->view('home', $this->data);
	}

	public function educationDetails(){
		$this->redirection();
		$this->data['colleges'] = $this->home_lib->getColleges();
		$this->data['courses'] = $this->home_lib->getCourses();
		$this->load->view('educationDetails', $this->data);
	}

	public function employerDetails(){
		$this->redirection();
		$this->load->view('employerDetails', $this->data);
	}

	//Job Offers- Normal Users

	public function relevantJobs(){
		$this->redirection();
		$this->load->view('relevantJobs', $this->data);
	}

	public function jobOffers(){
		$this->redirection();
		$relevant = 0;
		$this->data['jobOffers'] = $this->home_lib->getJobOffers($relevant);
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
		$this->load->view('aboutUs', $this->data);
	}

	public function termsAndConditions(){
		$this->load->view('termsAndConditions', $this->data);
	}

	public function privacyPolicy(){
		$this->load->view('privacyPolicy', $this->data);
	}

	public function coat(){
		$this->load->view('coat', $this->data);
	}

	public function contactUs(){
		$this->load->view('contactUs', $this->data);
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

	public function messages(){
		$this->redirection();
		$this->load->view('messages', $this->data);
	}

	public function skills(){
		$this->redirection();
		$this->data['skills'] = $this->home_lib->getSkills();
		$this->load->view('skills', $this->data);
	}

	public function skillTest()
	{
		if($this->home_lib->is_in_test()){
			$this->session->unset_userdata('skill_data');
			$this->session->unset_userdata('test_settings');
			$this->session->set_userdata('in_test', false);
			$this->session->set_flashdata('error', 'Do not reload the page during the test.');
			redirect(base_url('skills'));
        }
        $this->session->set_userdata('in_test', true);
        $skill_data = $this->session->userdata('skill_data');
        $test_settings = $this->session->userdata('test_settings');
        $this->data['questions'] = $this->home_lib->get_questions($test_settings['numberQuestions'], $skill_data['skillID']);

        // var_dump(json_encode($this->data['questions']));die;
        $this->data['question_string'] = base64_encode(json_encode($this->data['questions']));
        $this->data['test_settings'] = $test_settings;
        $this->data['skill_data'] = $skill_data;
        // print_r($test_settings);die();
        $this->load->view('skillTest', $this->data);
	}

	public function getskillTestGuidelines($get_id = NULL){
		if(!empty($get_id)) {
			$flag = 0;
			$skills = $this->home_lib->getUserSkills($this->session->userdata('userID'));
			foreach ($skills as $skill) {
				if($skill === $get_id){
					$flag = 1;
					break;
				}
			}
			if($flag !== 1){
				$skill_data = $this->home_lib->fetch_skill_data($get_id);
				$this->session->set_userdata(['skill_data'=> $skill_data]);
				$this->session->set_userdata('in_test', false);				
				$this->session->set_flashdata(['skill_id'=> $get_id]);
				redirect(base_url('skills/skill-test-guidelines'));
			}else{
				$this->data['message'] = ['content' => 'No skill Selected', 'class' => 'error'];
				redirect(base_url('skills'));
			}
			}elseif (empty($get_id)) {
				redirect(base_url('skills'));
		}	
		
	}

	public function skillTestGuidelines(){
		$test_settings = $this->home_lib->get_test_settings();
		$this->session->set_userdata(['test_settings' => $test_settings]);
		$this->data['timeAllowed'] = $test_settings['timeAllowed']/60;
		$this->data['numberQuestion'] = $test_settings['numberQuestions'];
		$skill_data = $this->session->userdata('skill_data');
		$this->data['skill_name'] = $skill_data['skill_name'];
		$this->data['title'] = 'Skill Test Guidelines';
		$this->load->view('skillTestGuidelines', $this->data);
	}

	public function connections(){
		$this->redirection();
		$userID = '1';
		$this->data['connections'] = $this->home_lib->getConnections($userID);
		var_dump($this->data['connections']);die;
	}

	public function generateVerifyEMail(){


		date_default_timezone_set("Asia/Kolkata");
		// $email = $_SESSION['userData']['email'];
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
		}}
		else{
			$token = "Quickbrownfoxjumpedoveralazydog0123456789".md5($email);
			$token = str_shuffle($token);
			$token = substr($token, 0,8);
			$expiry = $currentTime + 7200;
			$tokenData = array(
				'token' => $token,
				'email' => $email,
				'tokenType' => '1',
				'generatedAt' => $currentTime,
				'expiry' => $expiry
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

}
