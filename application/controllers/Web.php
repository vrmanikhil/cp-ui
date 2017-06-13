<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->helper(array('url'));
			$this->load->library(array('Home_lib', 'session'));
			$this->data = array();
			$this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','class'=>'');
	}

	private function login($email, $password){
		$result = $this->home_lib->login($email,$password);
		if ($result){
			redirect(base_url('home'));
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again.','class'=>'error'));
			redirect(base_url());
		}
	}

	public function doLogin(){
		$email = '';
		$password = '';
		if($x = $this->input->post('email')){
			$email = $x;
		}
		if($x = $this->input->post('password')){
			$password = $x;
			$password = md5($password);
		}
		if($email == '' || $password == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again.','class'=>'error'));
			redirect(base_url());
		}
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again.','class'=>'error'));
			redirect(base_url());
		}
		if(!$this->home_lib->checkEMailExist($email)){
			$this->session->set_flashdata('message', array('content'=>'The entered E-Mail Address is not registered with us, try creating a New Account.','class'=>'error'));
			redirect(base_url());
		}
		else{
			if($this->home_lib->checkPasswordMatch($email, $password)){
				$this->login($email, $password);
			}
			else{
				$this->session->set_flashdata('message', array('content'=>'Password does not matches the one in our database, please Try Again.','class'=>'error'));
				redirect(base_url());
			}
		}
	}

	public function register(){
		$name = '';
		$email = '';
		$mobile = '';
		$password = '';
		$accountType = '';
		if($x = $this->input->post('name')){
			$name = $x;
		}
		if($x = $this->input->post('email')){
			$email = $x;
		}
		if($x = $this->input->post('mobile')){
			$mobile = $x;
		}
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again.','class'=>'error'));
			redirect(base_url());
		}
		if(strlen($mobile)!=10 || !ctype_digit($mobile)) {
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again.','class'=>'error'));
			redirect(base_url());
		}
		if($this->home_lib->checkEMailExist($email)){
			$this->session->set_flashdata('message', array('content'=>'E-Mail Address already registered, try registering using another e-mail Address.','class'=>'error'));
			redirect(base_url());
		}
		if($this->home_lib->checkMobileExist($mobile)){
			$this->session->set_flashdata('message', array('content'=>'Mobile Number already registered, try registering using another mobile number.','class'=>'error'));
			redirect(base_url());
		}
		if($x = $this->input->post('password')){
			$password = $x;
		}
		$password = md5($password);
		if($x = $this->input->post('accountType')){
			$accountType = $x;
		}
		if($name == '' || $email == '' || $mobile == '' || $password == '' || $accountType == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again.','class'=>'error'));
			redirect(base_url());
		}
		$data = array(
			'name' => $name,
			'email' => $email,
			'mobile' => $mobile,
			'password' => $password,
			'accountType' => $accountType
		);
		$result = $this->home_lib->register($data);
		if($result){
			$this->login($email, $password);
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again.','class'=>'error'));
			redirect(base_url());
		}
	}

	public function logout(){
		$this->session->set_userdata('userData', false);
		$this->session->set_userdata('userData', []);
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function changePassword(){
		$currentPassword = '';
		$newPassword = '';
		$confirmNewPassword = '';

		if($x = $this->input->post('currentPassword')){
			$currentPassword = $x;
		}
		if($x = $this->input->post('newPassword')){
			$newPassword = $x;
		}
		if($x = $this->input->post('confirmNewPassword')){
			$confirmNewPassword = $x;
		}
		$currentPassword = md5($currentPassword);
		$newPassword = md5($newPassword);
		$confirmNewPassword = md5($confirmNewPassword);
		if($newPassword === $confirmNewPassword){
			$email = $_SESSION['userData']['email'];
			if($this->home_lib->checkPasswordMatch($email, $currentPassword)){
				$result = $this->home_lib->changePassword($email, $newPassword);
				if($result){
					$this->session->set_flashdata('message', array('content'=>'Password Successfully Changed','class'=>'success'));
					redirect(base_url('change-password'));
				}
				else{
					$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again.','class'=>'error'));
					redirect(base_url('change-password'));
				}
			}
			else{
				$this->session->set_flashdata('message', array('content'=>'The Current Password, does not match with the one in our database, Please Try Again.','class'=>'error'));
				redirect(base_url('change-password'));
			}
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Your New Password, does not matches with Confirm New Password, Please Try Again.','class'=>'error'));
			redirect(base_url('change-password'));
		}
	}

	public function addWorkEx(){
		$companyName = '';
		$position = '';
		$description = '';
		$startMonth = '';
		$startYear = '';
		$endMonth = '';
		$endYear = '';
		$userID = '';
		if($x = $this->input->post('companyName')){
			$companyName = $x;
		}
		if($x = $this->input->post('position')){
			$position = $x;
		}
		if($x = $this->input->post('description')){
			$description = $x;
		}
		if($x = $this->input->post('startMonth')){
			$startMonth = $x;
		}
		if($x = $this->input->post('startYear')){
			$startYear = $x;
		}
		if($x = $this->input->post('endMonth')){
			$endMonth = $x;
		}
		if($x = $this->input->post('endYear')){
			$endYear = $x;
		}
		$data = array(
			'companyName' => $companyName,
			'position' => $position,
			'description' => $description,
			'startMonth' => $startMonth,
			'startYear' => $startYear,
			'endMonth' => $endMonth,
			'endYear' => $endYear,
			'userID' =>$userID
		);
		if($companyName==''||$position==''||$description==''||$startMonth==''||$startYear==''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url());
		}
		else{
			$result = $this->home_lib->addWorkEx($data);
			if($result){
				$this->session->set_flashdata('message', array('content'=>'Work Experience successfully Added.','class'=>'success'));
				redirect(base_url());
			}
			else{
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url());
			}
		}
	}

	public function submit_answers()
	{
		echo "submit ho gya";
		// $skill_id = $this->session->userdata('skill_data')['skill_id'];
  //       $ans = $this->input->post('answers');
  //       $score = $this->data_lib->check_answers($ans);
  //       $test_settings = $this->data_lib->get_test_settings();
  //       $num_ques = $test_settings['questions'];
  //       switch ($this->data_lib->add_skill($score, $skill_id, $num_ques)) {
  //       	case 0: $msg = ['error', "You scored $score out of $num_ques and were unable to clear the skill test. Better luck next time. Try Again"];
  //       		break;
  //       	case 1: $msg = ['success', "Congratulations you scored $score out of $num_ques and skill was successfully added to your profile."];
  //       		break;
  //       	default: $msg = ['error', "Some Error Occured"];
  //       		break;
  //       }
  //       $this->data_lib->set_flashdata($msg[0], $msg[1]);
        die;
	}


	public function addAchievement(){
		$achievementTitle = '';
		$achievementDescription = '';
		$userID = '';
		if($x = $this->input->post('achievementTitle')){
			$achievementTitle = $x;
		}
		if($x = $this->input->post('achievementDescription')){
			$achievementDescription = $x;
		}
		$data = array(
			'achievementTitle' => $achievementTitle,
			'achievementDescription' => $achievementDescription,
			'userID' =>$userID
		);
		if($achievementTitle==''||$achievementDescription==''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url());
		}
		else{
			$result = $this->home_lib->addAchievement($data);
			if($result){
				$this->session->set_flashdata('message', array('content'=>'Achievement successfully Added.','class'=>'success'));
				redirect(base_url());
			}
			else{
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url());
			}
		}
	}

	public function addProject(){
		$projectTitle = '';
		$projectLink = '';
		$projectDescription = '';
		$userID = '';
		if($x = $this->input->post('projectTitle')){
			$projectTitle = $x;
		}
		if($x = $this->input->post('projectLink')){
			$projectLink = $x;
		}
		if($x = $this->input->post('projectDescription')){
			$projectDescription = $x;
		}
		$data = array(
			'projectTitle' => $projectTitle,
			'projectLink' => $projectLink,
			'projectDescription' => $projectDescription,
			'userID' =>$userID
		);
		if($projectTitle==''||$projectDescription==''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url());
		}
		else{
			$result = $this->home_lib->addProject($data);
			if($result){
				$this->session->set_flashdata('message', array('content'=>'Achievement successfully Added.','class'=>'success'));
				redirect(base_url());
			}
			else{
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url());
			}
		}
	}

	public function test(){
		// $this->statusChangeEMail('v.nikhil323@gmail.com', '1', '1');
		$this->resetPasswordEMail('v.nikhil323@gmail.com');
	}

	private function resetPasswordEMail($email=''){
		date_default_timezone_set("Asia/Kolkata");
		if(!$this->home_lib->checkEMailExist($email)){
			$this->session->set_flashdata('message', array('content'=>'The entered E-Mail Address is not registered with us, try creating a New Account.','class'=>'error'));
			redirect(base_url());
		}
		$checkToken = $this->home_lib->checkToken($email, '2');
		$currentTime = strtotime(date("d M Y H:i:s"));
		if($checkToken){
			$expiry = $checkToken[0]['expiry'];
			$timeDifference = $expiry-$currentTime;
			if($timeDifference>0 && $timeDifference<7200){
				$emailData['token'] = $checkToken[0]['token'];
				$this->load->helper('mail_helper');
				$message =  $this->load->view('emailers/forgotPassword', $emailData, true);
				$data = array(
					'sendToEmail' => $email,
					'fromName' => 'CampusPuppy Private Limited',
					'fromEmail' => 'no-reply@campuspuppy.com',
					'subject' => 'Forgot Password|CampusPuppy Private Limited',
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
				'tokenType' => '2',
				'generatedAt' => $currentTime,
				'expiry' => $expiry
			);
			$this->home_lib->insertPasswordToken($tokenData);
			$emailData['token'] = $token;
			$this->load->helper('mail_helper');
			$message =  $this->load->view('emailers/forgotPassword', $emailData, true);
			$data = array(
				'sendToEmail' => $email,
				'fromName' => 'CampusPuppy Private Limited',
				'fromEmail' => 'no-reply@campuspuppy.com',
				'subject' => 'Forgot Password|CampusPuppy Private Limited',
				'message' => $message,
				'using' =>'pepipost'
			);
			sendEmail($data);
		}
	}

	private function statusChangeEMail($email='', $offerType='', $offerID=''){
		$emailData['offerType'] = $offerType;
		if($offerType=='1'){
			$offerData = $this->home_lib->getJobData($offerID);
			$emailData['offerTitle'] = $offerData[0]['jobTitle'];
			$emailData['company'] = $offerData[0]['companyName'];
		}
		if($offerType=='2'){
			$offerData = $this->home_lib->getInternshipData($offerID);
			$emailData['offerTitle'] = $offerData[0]['internshipTitle'];
			$emailData['company'] = $offerData[0]['companyName'];
		}
		$this->load->helper('mail_helper');
		$message =  $this->load->view('emailers/status-change', $emailData, true);
		$data = array(
			'sendToEmail' => $email,
			'fromName' => 'CampusPuppy Private Limited',
			'fromEmail' => 'no-reply@campuspuppy.com',
			'subject' => 'Status Change for Applied Offer|CampusPuppy Private Limited',
			'message' => $message,
			'using' =>'pepipost'
		);
		sendEmail($data);
	}

}
