<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_lib {

	public function login($email,$password)
	{
		$CI =& get_instance();
		$CI->load->model('home_model','homeModel');
		$result = $CI->homeModel->login($email,$password);
		$userData = $CI->homeModel->getUserDetailsFromEMail($email);
		$userData = $userData[0];
		$registraionLevel = $userData['registrationLevel'];
		if ($result) {
			if($userData['accountType']=='1'){
				$data = array(
					'loggedIn' => true,
					'email' => $email,
					'name' => $userData['name'],
					'userID' => $userData['userID'],
					'accountType' => $userData['accountType'],
					'accountApproved' => $userData['accountApproved'],
					'collegeLogo' => $userData['logo'],
					'collegeName' => $userData['college']
					);
			}
			if($userData['accountType']=='2'){
				$data = array(
					'loggedIn' => true,
					'email' => $email,
					'name' => $userData['name'],
					'userID' => $userData['userID'],
					'accountType' => $userData['accountType'],
					'accountApproved' => $userData['accountApproved'],
					'companyLogo' => $userData['companyLogo'],
					'companyName' => $userData['companyName']
					);
			}
			$CI->session->set_userdata('userData', $data);
			$profileImage = $userData['profileImage'];
			$CI->session->set_userdata('profileImage', $profileImage);
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

	public function getLocations(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getLocations();
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

	public function getJobOffers($relevant){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getJobOffers($relevant);
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

	public function addAchievement($data){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->addAchievement($data);
	}

	public function getUserDetails($username){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getUserDetails($username);
	}

	public function getUserProjects($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getUserProjects($userID);
	}

	public function check_answers($ans)
	{
		// $CI = &get_instance();
		// $CI->load->model('Data_model', 'datamodel');
		// $ques_ids = array_column($ans, 'ques_id');
		// $actual_ans = $CI->datamodel->get_answers($ques_ids);
		// $actual_ans = array_column($actual_ans, 'answer');
		// $ans_given =array_column($ans, 'ans');
		return $this->get_score($actual_ans, $ans_given);
	}

	public function get_score($actual_ans, $ans_given)
	{
		$score = 0;
		// for ($i = 0; $i < count($actual_ans); $i++) {
		// 	if($actual_ans[$i] == ($ans_given[$i]-1))
		// 		$score++;
		// }
		return $score;
	}

	public function add_skill($score, $skill_id, $num_ques)
	{
		$response = 0;
		// $CI = &get_instance();
		// $CI->load->model('Data_model', 'datamodel');
		// if($this->passed_test($score)){
		// 	if($CI->datamodel->add_skill_to_user($skill_id, $this->get_user_id(), $score, $num_ques)){
		// 		$response = 1;
		// 	}else{
		// 		$response = 2;
		// 	}
		// }
		return $response;
	}

	public function passed_test($score)
	{
		// $CI = &get_instance();
		// $CI->load->model('Data_model', 'datamodel');
		// $num_ques = $CI->datamodel->fetch_test_settings()['questions'];
		// return $score >= (0.6 * $num_ques);
	}



	public function getUserWorkEx($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getUserWorkEx($userID);
	}

	public function getUserAchievements($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getUserAchievements($userID);
	}

	public function getUserSkills($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getUserSkills($userID);
	}

	public function fetch_skill_data($skill_id)
	{
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		return $CI->homemodel->get_skill_data($skill_id)[0];
	}

	public function is_in_test()
	{
		$CI = &get_instance();
		$CI->load->library('session');
		return $CI->session->userdata('in_test');
	}

	public function get_test_settings($skill_id)
	{
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		$setting = $CI->homemodel->fetch_test_settings($skill_id);
		return $setting;
	}

	public function get_questions($num_ques, $skill_id)
	{
		// var_dump($num_ques, $skill_id);die;
		$CI = &get_instance();
		$CI->load->model('Home_model', 'homemodel');
		return $CI->homemodel->fetch_questions($num_ques, $skill_id);
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

}
