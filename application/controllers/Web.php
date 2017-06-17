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
			redirect(base_url());
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
			'accountType' => $accountType,
			'registrationLevel' => '1'
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

	public function submitAnswers()
	{
		$skill_id = $this->session->userdata('skill_data')['skillID'];
        $answer = json_decode($_COOKIE['data']);
        $i = 0;
        foreach ($answer as $key) {
        	$ans[$i++] = json_decode(json_encode($key), true);
        }
				$score = $this->home_lib->checkAnswers($ans);
        $test_settings = $this->session->userdata('test_settings');
        $userID = $_SESSION['userData']['userID'];
        $num_ques = $test_settings[0]['numberQuestions'];
        switch ($this->home_lib->addSkill($score, $userID, $skill_id, $num_ques)) {
        	case 0: $msg = ['error', "You marked $score% of the answers correct and were unable to clear the skill test. Better luck next time."];
        		break;
        	case 1: $msg = ['success', "Congratulations you marked $score% of the answers correct and skill was successfully added to your profile."];
        		break;
        	default: $msg = ['error', "Some Error Occured"];
        		break;
        }
        $this->session->set_flashdata('message', array('content' => $msg[1], 'class' => $msg[0]));
        $this->session->unset_userdata('test_settings');
        $_COOKIE['data'] = null;
        $this->session->unset_userdata('skill_data');
        redirect(base_url('skills'));
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

	public function forgotPassword(){
		$email = '';
		if($x = $this->input->get('email')){
			$email = $x;
		}
		if(!$this->home_lib->checkEMailExist($email)){
			$this->session->set_flashdata('message', array('content'=>'The entered E-Mail Address is not registered with us, try creating a New Account.','class'=>'error'));
			redirect(base_url());
		}
		$this->resetPasswordEMail('vrmanikhil@gmail.com');
	}

	private function resetPasswordEMail($email=''){
		date_default_timezone_set("Asia/Kolkata");
		$checkToken = $this->home_lib->checkToken($email, '2');
		$currentTime = strtotime(date("d M Y H:i:s"));
		if($checkToken){
			$expiry = $checkToken[0]['expiry'];
			$timeDifference = $expiry-$currentTime;
			if($timeDifference>0 && $timeDifference<7200){
				$emailData['token'] = $checkToken[0]['token'];
				$emailData['email'] = $email;
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
			$emailData['email'] = $email;
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

	public function addEducationalDetails(){
		$collegeID = '';
		$courseID = '';
		$batch = '';
		if($x = $this->input->post('collegeID')){
			$collegeID = $x;
		}
		if($x = $this->input->post('courseID')){
			$courseID = $x;
		}
		if($x = $this->input->post('batch')){
			$batch = $x;
		}
		$userID = $_SESSION['userData']['userID'];
		$data = array(
			'collegeID' => $collegeID,
			'courseID' => $courseID,
			'batch' => $batch,
			'userID' => $userID
		);
		if($collegeID == '' || $courseID == '' || $batch == ''){
			$this->session->set_flashdata('message', array('content'=>'Something Went Wrong, Please Try Again.','class'=>'error'));
			redirect(base_url('education-details'));
		}
		$result = $this->home_lib->addEducationalDetails($data);
		if($result){
			$CI =& get_instance();
			$CI->session->set_userdata('registrationLevel', '2');
			$this->home_lib->updateRegistrationLevel($userID, '2');
			$this->session->set_flashdata('message', array('content'=>'Details Successfully Updated.','class'=>'success'));
			redirect(base_url());
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Something Went Wrong, Please Try Again.','class'=>'error'));
			redirect(base_url('education-details'));
		}
	}

	public function addEmployerDetails(){
		$companyName = '';
		$position = '';
		$userID = $_SESSION['userData']['userID'];
		if($x = $this->input->post('companyName')){
			$companyName = $x;
		}
		if($x = $this->input->post('position')){
			$position = $x;
		}
		if($companyName == '' || $position == ''){
			$this->session->set_flashdata('message', array('content'=>'Something Went Wrong, Please Try Again.','class'=>'error'));
			redirect(base_url('employer-details'));
		}
		$data = array(
			'companyName' => $companyName,
			'position'=> $position,
			'userID' => $userID
		);
		$result = $this->home_lib->addEmployerDetails($data);
		if($result){
			$CI =& get_instance();
			$CI->session->set_userdata('registrationLevel', '2');
			$this->home_lib->updateRegistrationLevel($userID, '2');
			$this->session->set_flashdata('message', array('content'=>'Details Successfully Updated.','class'=>'success'));
			redirect(base_url());
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Something Went Wrong, Please Try Again.','class'=>'error'));
			redirect(base_url('employer-details'));
		}
	}

	public function contactUs(){
		$name = '';
		$email = '';
		$mobile = '';
		$message = '';
		if($x = $this->input->post('name')){
			$name = $x;
		}
		if($x = $this->input->post('email')){
			$email = $x;
		}
		if($x = $this->input->post('mobile')){
			$mobile = $x;
		}
		if($x = $this->input->post('message')){
			$message = $x;
		}
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again.','class'=>'error'));
			redirect(base_url('contact-us'));
		}
		if(strlen($mobile)!=10 || !ctype_digit($mobile)) {
			$this->session->set_flashdata('message', array('content'=>'Mobile Number has to only of 10 digits. Please Try Again.','class'=>'error'));
			redirect(base_url('contact-us'));
		}
		if($name == '' || $email == '' || $mobile == '' || $message == ''){
			$this->session->set_flashdata('message', array('content'=>'Something Went Wrong. Please Try Again.','class'=>'error'));
			redirect(base_url('contact-us'));
		}
		$data = array(
			'name' => $name,
			'email' => $email,
			'mobile' => $mobile,
			'message' => $message
		);
		$result = $this->home_lib->contactUs($data);
		if($result){
			$this->session->set_flashdata('message', array('content'=>'Message Received. Our Team will get back to you shortly.','class'=>'success'));
			redirect(base_url('contact-us'));
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Something Went Wrong. Please Try Again.','class'=>'error'));
			redirect(base_url('contact-us'));
		}
	}



	public function resetPassword(){
		$newPassword = '';
		$confirmNewPassword = '';
		$email = '';
		$token = '';
		if($x = $this->input->post('newPassword')){
			$newPassword = $x;
		}
		if($x = $this->input->post('confirmNewPassword')){
			$confirmNewPassword = $x;
		}
		if($x = $this->input->post('email')){
			$email = $x;
		}
		if($x = $this->input->post('token')){
			$token = $x;
		}
		if($newPassword != $confirmNewPassword){
			$this->session->set_flashdata('message', array('content'=>'Your New and Confirm New Password do not Match. Please Try Again.','class'=>'error'));
			redirect(base_url('home/resetPassword?email='.$email.'&token='.$token));
		}
		$checkToken = $this->home_lib->checkToken($email, '2');
		$currentTime = strtotime(date("d M Y H:i:s"));
		if($checkToken){
			$expiry = $checkToken[0]['expiry'];
			$timeDifference = $expiry-$currentTime;
			if($timeDifference>0 && $timeDifference<7200){
				$newPassword = md5($newPassword);
				$result = $this->home_lib->changePassword($email, $newPassword);
				if($result){
					$this->home_lib->deactivateToken($email, '2');
					$this->session->set_flashdata('message', array('content'=>'Your Password Reset Process is Successful.','class'=>'success'));
					redirect(base_url());
				}
				else{
					$this->session->set_flashdata('message', array('content'=>'Something Went Wrong. Please Try Again.','class'=>'error'));
					redirect(base_url('home/resetPassword?email='.$email.'&token='.$token));
				}
			}
			else{
				$this->session->set_flashdata('message', array('content'=>'Your Password Reset Link has expired. Please requrest a New One.','class'=>'error'));
				redirect(base_url());
			}
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'The Password Reset Link is Not Valid.','class'=>'error'));
			redirect(base_url());
		}
	}

	public function hello(){
		$time = strtotime(date("d M Y H:i:s"));
		echo $time;
	}

}
