<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once BASEPATH.'../assets/dompdf/autoload.inc.php';
use Dompdf\Adapter\CPDF;
use Dompdf\Dompdf;
use Dompdf\Exception;
use Dompdf\Option;

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->library(array('Home_lib', 'session'));
		$this->data = array();
		if(isset($_SESSION['userData'])){
			$this->data['messages'] = $this->home_lib->fetchLatestChats(0,3);
			$this->data['notification'] = $this->home_lib->getNotifications(0,3);
			$this->data['connectionCount'] = $this->home_lib->countConnections($_SESSION['userData']['userID']);
		}
		$this->data['csrf_token_name'] = $this->security->get_csrf_token_name();
		$this->data['csrf_token'] = $this->security->get_csrf_hash();
		$this->data['header'] = $this->load->view('commonCode/header', $this->data, true);
		$this->data['headerLogin'] = $this->load->view('commonCode/headerLogin', $this->data, true);
		$this->data['footer'] = $this->load->view('commonCode/footer', $this->data, true);
		$this->data['activeUser'] = $this->load->view('commonCode/activeUser', $this->data, true);
		$this->data['userNavigation'] = $this->load->view('commonCode/userNavigation', $this->data, true);
		$this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','class'=>'');
		$maintainance = 0;
		if($maintainance=='1'){
			echo "<center><h1>Website is Under Maintainance</h1><h3>We will be back soon.</h3></center>";die;
		}
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
				redirect(base_url('verify-email/8800'));
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
		$this->data['feeds'] = $this->home_lib->getFeeds();
		$this->data['more'] = $this->home_lib->moreFeeds(6);
		$this->load->view('home', $this->data);
	}

	public function getMoreFeeds($offset){
		$data['offset'] = $offset;
		$data['feeds'] = $this->home_lib->getFeeds($offset);
		$data['more'] = $this->home_lib->moreFeeds($offset+6);
		echo json_encode($data);
	}

	public function educationDetails(){
		if($_SESSION['userData']['loggedIn'] && ($_SESSION['registrationLevel']=='1' && ($_SESSION['userData']['accountType']=='1'))){
			$this->data['colleges'] = $this->home_lib->getColleges();
			$this->data['courses'] = $this->home_lib->getCourses();
			$this->load->view('educationDetails', $this->data);
		}
		else{
			redirect(base_url());
		}

	}

	public function employerDetails(){
		if($_SESSION['userData']['loggedIn'] && ($_SESSION['registrationLevel']=='1' && ($_SESSION['userData']['accountType']=='2'))){
			$this->load->view('employerDetails', $this->data);
		}
		else{
			redirect(base_url());
		}
	}

	public function verifyEMail($redirection=''){
		if($_SESSION['userData']['loggedIn'] && ($_SESSION['registrationLevel']=='2')){
			if($redirection=='1'){
				$this->load->view('verifyEMail', $this->data);
			}
			else{
			$this->generateVerifyEMail();
			$this->load->view('verifyEMail', $this->data);
			}
		}
		else{
			redirect(base_url());
		}
	}

	public function verifyMobileNumber($redirection=''){
		$this->redirection();
		if($_SESSION['registrationLevel']=='3'){
			if($redirection=='1'){
				$this->load->view('verifyMobileNumber', $this->data);
			}
			else{
			$this->generateOTP();
			$this->load->view('verifyMobileNumber', $this->data);
			}
		}
		else{
			redirect(base_url('home'));
		}
	}

	private function generateOTP(){
		date_default_timezone_set("Asia/Kolkata");
		$mobile = $_SESSION['userData']['mobile'];
		$checkOTP = $this->home_lib->checkOTP($mobile);
		$currentTime = strtotime(date("d M Y H:i:s"));
		if($checkOTP){
			$expiry = $checkOTP[0]['expiry'];
			$timeDifference = $expiry-$currentTime;
			if($timeDifference>0 && $timeDifference<7200){
				$msg = "Your Mobile Number Verification Token is: ".$checkOTP[0]['otp'].". The token is valid for only next 2 hours.";
				$this->sendSMS($mobile, $msg);
			}
			else{
				$otp = rand(1000,9999);
				$expiry = $currentTime + 7200;
				$otpData = array(
					'otp' => $otp,
					'mobile' => $mobile,
					'generatedAt' => $currentTime,
					'expiry' => $expiry,
					'active' => '1'
				);
				$this->home_lib->insertOTP($otpData);
				$msg =  "Your Mobile Number Verification Token is: ".$otp.". The token is valid for only next 2 hours.";
				$this->sendSMS($mobile, $msg);
			}
		}
		else {
			$otp = rand(1000,9999);
			$expiry = $currentTime + 7200;
			$otpData = array(
				'otp' => $otp,
				'mobile' => $mobile,
				'generatedAt' => $currentTime,
				'expiry' => $expiry,
				'active' => '1'
			);
			$this->home_lib->insertOTP($otpData);
			$msg =  "Your Mobile Number Verification Token is: ".$otp.". The token is valid for only next 2 hours.";
			$this->sendSMS($mobile, $msg);
		}
	}

	public function uploadUdentityDoc(){
		$this->redirection();
		if($_SESSION['registrationLevel']=='4'){
			$this->load->view('uploadIdentityDoc', $this->data);
		}
		else{
			redirect(base_url('home'));
		}
	}

	public function userConnections(){
		$this->redirection();
		$this->load->view('connections', $this->data);
	}

	public function userProfile($userID){
		$this->redirection();
		$this->data['userID'] = $userID;
		$this->data['userDetails'] = $this->home_lib->getUserDetails($userID);
		$this->data['userDetails'] = $this->data['userDetails'][0];
		$accountType = $this->data['userDetails']['accountType'];
		$this->data['employerDetails'] = '';
		if($accountType=='2'){
			$this->data['employerDetails'] = $this->home_lib->getEmployerDetails($userID);
		}
		$this->data['checkConnection'] = $this->home_lib->checkConnectionWithStatus($userID);
		$this->data['locations'] = $this->home_lib->getLocations();
		$this->data['achievements'] = $this->home_lib->getAchievements($userID);
		$this->data['projects'] = $this->home_lib->getProjects($userID);
		$this->data['educationalDetails'] = $this->home_lib->getEducationalDetails($userID);
		$this->data['workExperiences'] = $this->home_lib->getWorkExperiences($userID);
		$this->data['skills'] = $this->home_lib->getUserSkills($userID);
		$resume['userDetails'] = $this->data['userDetails'];
		$resume['achievements'] = $this->data['achievements'];
		$resume['projects'] = $this->data['projects'];
		$resume['educationalDetails'] = $this->data['educationalDetails'];
		$resume['workExperiences'] = $this->data['workExperiences'];
		$resume['skills'] = $this->data['skills'];
		if(isset($_GET['download']) == 1){
				$resume['userDetails']['profileImage'] = file_get_contents($resume['userDetails']['profileImage']);
				$base64 = base64_encode($resume['userDetails']['profileImage']);
				$resume['userDetails']['profileImage'] = 'data:image/jpeg;base64,' . $base64;
				$resume['campusPuppy'] =file_get_contents("http://backoffice.campuspuppy.com/assets/images/logo.png");
				$base64 = base64_encode($resume['campusPuppy']);
				$resume['campusPuppy'] = 'data:image/jpeg;base64,' . $base64;
				$html = $this->load->view('resume', $resume, true);
				$dompdf = new Dompdf();
				$dompdf->loadHtml($html);
				$dompdf->setPaper('A4', 'landscape');
				$dompdf->render();
				$dompdf->stream(md5($resume['userDetails']['userID']).'.pdf');
				$this->session->set_flashdata('message', array('content' => 'Oops, Something went wrong.', 'class' => 'error'));
				redirect(base_url());
			}
		$this->load->view('userProfile', $this->data);
	}

	public function toggleMobilePrivacy($displayMobile, $userID){
		$this->redirection();
		if($this->home_lib->toggleMobilePrivacy($displayMobile, $userID))
			redirect(base_url('user-profile/'.$userID));
		else
			$this->session->set_flashdata('message', array('content' => 'Oops, Something went wrong.', 'class' => 'error'));
			redirect(base_url());
	}

	public function chatNew()
	{
		$this->redirection();
		$this->load->view('chat-new', $this->data);
	}
	//Job Offers- Normal Users
	public function relevantJobs(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='2'){
			redirect(base_url());
		}
		$userID = $_SESSION['userData']['userID'];
		$userSkills = array();
		foreach ($this->home_lib->getUserSkills($userID) as $key => $value) {
			array_push($userSkills, $value['skillID']);
		}
		// var_dump($userSkills);die;
		$jobOffers = array();
		$this->data['jobOffers'] = $this->home_lib->getJobOffers();
		foreach ($this->data['jobOffers'] as $key => $value) {
			if($value['applicants']=='3'){
				array_push($jobOffers, $value);
			}
			else{
				$jobSkills = explode(',', $value['skillIDsRequired']);
				if($value['applicants']=='1'){
					if(count(array_diff($jobSkills,$userSkills))=='0'){
						array_push($jobOffers, $value);
					}
				}
				if($value['applicants']=='2'){
					if(count($jobSkills)>count(array_diff($jobSkills,$userSkills))){
						array_push($jobOffers, $value);
					}
				}
			}
		}
		$this->data['jobOffers'] = $jobOffers;
		$this->data['filterskills'] = 'false';
		$this->data['filterlocations'] = 'false';
		if(isset($_POST))
		if($this->input->post('filter')  == 1){
			// var_dump($_POST); die;
			if(isset($_POST['skill'])){
				$skill = $_POST['skill'];
				$filteredSkillJobIDs =  array();
				$skillFilteredJobid = $this->home_lib->getJobOffersSkillFilters($skill);
				foreach ($skillFilteredJobid as $key => $value) {
					array_push($filteredSkillJobIDs, $value['jobID']);
				}
			}else{
				$filteredSkillJobIDs = [];
				$skill = [];
			}

			if(isset($_POST['location'])){
				$location = $_POST['location'];
				$filteredLocationJobIDs = array();
				$locationFilteredJobid = $this->home_lib->getJobOffersLocationFilters($location);
				foreach ($locationFilteredJobid as $key => $value) {
					array_push($filteredLocationJobIDs, $value['jobID']);
				}
			}else{
				$filteredLocationJobIDs = [];
				$location = [];
				}
				// var_dump(json_encode($skill));
				// var_dump(json_encode($location));
				// die();
			if(isset($skill))
				$this->data['filterskills'] =	json_encode($skill);
			if(isset($location))
				$this->data['filterlocations'] =json_encode($location);
			$filteredJobIDs = array_unique(array_merge($filteredLocationJobIDs, $filteredSkillJobIDs));
			$jobIDs = array();
			$i = 0;

				foreach ($this->data['jobOffers'] as $key => $value) {
					if(!in_array($value['jobID'], $filteredJobIDs)){
						unset($this->data['jobOffers'][$i]);
					}
					$i++;
				}
				$this->load->view('relevantJobs', $this->data);

		}else{
			$this->load->view('relevantJobs', $this->data);
		}
	}

	public function getLocationsSkills(){
		$this->redirection();
		$job = $_GET['job'];
		$data['locations'] = $this->home_lib->getRelevantLocations($job);
		$data['skills'] = $this->home_lib->getRelevantSkills($job);
		echo json_encode($data);
	}

	public function jobOffers(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='2'){
			redirect(base_url());
		}
		$this->data['jobOffers'] = $this->home_lib->getJobOffers();
		$this->data['filterskills'] = 'false';
		$this->data['filterlocations'] = 'false';
		if(isset($_POST))
		if($this->input->post('filter')  == 1){
			if(isset($_POST['skill'])){
				$skill = $_POST['skill'];
				$filteredSkillJobIDs =  array();
				$skillFilteredJobid = $this->home_lib->getJobOffersSkillFilters($skill);
				foreach ($skillFilteredJobid as $key => $value) {
					array_push($filteredSkillJobIDs, $value['jobID']);
				}
			}else{
				$filteredSkillJobIDs = [];
				$skill = [];
			}

			if(isset($_POST['location'])){
				$location = $_POST['location'];
				$filteredLocationJobIDs = array();
				$locationFilteredJobid = $this->home_lib->getJobOffersLocationFilters($location);
				foreach ($locationFilteredJobid as $key => $value) {
					array_push($filteredLocationJobIDs, $value['jobID']);
				}
			}else{
				$filteredLocationJobIDs = [];
				$location = [];
				}
				// var_dump(json_encode($skill));
				// var_dump(json_encode($location));
				// die();
			if(isset($skill))
				$this->data['filterskills'] =	json_encode($skill);
			if(isset($location))
				$this->data['filterlocations'] =json_encode($location);
			$filteredJobIDs = array_unique(array_merge($filteredLocationJobIDs, $filteredSkillJobIDs));

			$jobIDs = array();
			$i = 0;
				foreach ($this->data['jobOffers'] as $key => $value) {
					if(!in_array($value['jobID'], $filteredJobIDs)){
						unset($this->data['jobOffers'][$i]);
					}
					$i++;
				}
				$this->load->view('jobOffers', $this->data);

		}else{
			$this->load->view('jobOffers', $this->data);
		}
	}

	public function appliedJobOffers(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='2'){
			redirect(base_url());
		}
		$this->data['appliedJobOffers'] = $this->home_lib->getAppliedJobOffers();
		$this->load->view('appliedJobOffers', $this->data);
	}

	public function getJobDetails(){
		$this->redirection();
		$jobID = $this->input->get('jobid');
		$jobDetails = $this->home_lib->getJobDetails($jobID);
		$jobDetails['cities'] = "Some Random Cities";
		$jobDetails['skills'] = "Some Random Skills";
		echo json_encode($jobDetails);
	}

	public function getInternshipDetails(){
		$this->redirection();
		$internshipID = $this->input->get('internshipID');
		$internshipDetails = $this->home_lib->getInternshipDetails($internshipID);
		$internshipDetails['cities'] = "Some Random Cities";
		$internshipDetails['skills'] = "Some Random Skills";
		echo json_encode($internshipDetails);
	}

	//Internship Offers- Normal Users

	public function relevantInternships(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='2'){
			redirect(base_url());
		}
		$userID = $_SESSION['userData']['userID'];
		$userSkills = array();
		foreach ($this->home_lib->getUserSkills($userID) as $key => $value) {
			array_push($userSkills, $value['skillID']);
		}
		$internshipOffers = array();
		$this->data['internshipOffers'] = $this->home_lib->getInternshipOffers();
		foreach ($this->data['internshipOffers'] as $key => $value) {
			if($value['applicants']=='3'){
				array_push($internshipOffers, $value);
			}
			else{
				$internshipSkills = explode(',', $value['skillIDsRequired']);
				if($value['applicants']=='1'){
					if(count(array_diff($internshipSkills,$userSkills))=='0'){
						array_push($internshipOffers, $value);
					}
				}
				if($value['applicants']=='2'){
					if(count($internshipSkills)>count(array_diff($internshipSkills,$userSkills))){
						array_push($internshipOffers, $value);
					}
				}
			}
		}
		$this->data['internshipOffers'] = $internshipOffers;
		$this->data['filterskills'] = 'false';
		$this->data['filterlocations'] = 'false';
		if(isset($_POST))
		if($this->input->post('filter')  == 1){
			if(isset($_POST['skill'])){
				$skill = $_POST['skill'];
				$filteredSkillinternshipIDs =  array();
				$skillFilteredinternshipid = $this->home_lib->getinternshipOffersSkillFilters($skill);
				foreach ($skillFilteredinternshipid as $key => $value) {
					array_push($filteredSkillinternshipIDs, $value['internshipID']);
				}
			}else{
				$filteredSkillinternshipIDs = [];
				$skill = [];
			}

			if(isset($_POST['location'])){
				$location = $_POST['location'];
				$filteredLocationinternshipIDs = array();
				$locationFilteredinternshipid = $this->home_lib->getinternshipOffersLocationFilters($location);
				foreach ($locationFilteredinternshipid as $key => $value) {
					array_push($filteredLocationinternshipIDs, $value['internshipID']);
				}
			}else{
				$filteredLocationinternshipIDs = [];
				$location = [];
				}
				if(isset($skill))
				$this->data['filterskills'] =json_encode($skill);
			if(isset($location))
				$this->data['filterlocations'] =json_encode($location);
			$filteredinternshipIDs = array_unique(array_merge($filteredLocationinternshipIDs, $filteredSkillinternshipIDs));

			$internshipIDs = array();
			$i = 0;
				foreach ($this->data['internshipOffers'] as $key => $value) {
					if(!in_array($value['internshipID'], $filteredinternshipIDs)){
						unset($this->data['internshipOffers'][$i]);
					}
					$i++;
				}
				$this->load->view('relevantInternships', $this->data);

		}else{
			$this->load->view('relevantInternships', $this->data);
		}
	}

	public function internshipOffers(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='2'){
			redirect(base_url());
		}
		$this->data['internshipOffers'] = $this->home_lib->getInternshipOffers();
		$this->data['filterskills'] = 'false';
		$this->data['filterlocations'] = 'false';
		if(isset($_POST))
		if($this->input->post('filter')  == 1){
			if(isset($_POST['skill'])){
				$skill = $_POST['skill'];
				$filteredSkillinternshipIDs =  array();
				$skillFilteredinternshipid = $this->home_lib->getinternshipOffersSkillFilters($skill);
				foreach ($skillFilteredinternshipid as $key => $value) {
					array_push($filteredSkillinternshipIDs, $value['internshipID']);
				}
			}else{
				$filteredSkillinternshipIDs = [];
				$skill = [];
			}

			if(isset($_POST['location'])){
				$location = $_POST['location'];
				$filteredLocationinternshipIDs = array();
				$locationFilteredinternshipid = $this->home_lib->getinternshipOffersLocationFilters($location);
				foreach ($locationFilteredinternshipid as $key => $value) {
					array_push($filteredLocationinternshipIDs, $value['internshipID']);
				}
			}else{
				$filteredLocationinternshipIDs = [];
				$location = [];
				}
				$this->data['filterskills'] =	json_encode($skill);
			if(isset($location))
				$this->data['filterlocations'] =json_encode($location);
			$filteredinternshipIDs = array_unique(array_merge($filteredLocationinternshipIDs, $filteredSkillinternshipIDs));

			$internshipIDs = array();
			$i = 0;
				foreach ($this->data['internshipOffers'] as $key => $value) {
					if(!in_array($value['internshipID'], $filteredinternshipIDs)){
						unset($this->data['internshipOffers'][$i]);
					}
					$i++;
				}
				$this->load->view('internshipOffers', $this->data);
		}else{
			$this->load->view('internshipOffers', $this->data);
		}
	}

	public function appliedInternshipOffers(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='2'){
			redirect(base_url());
		}
		$this->data['appliedInternshipOffers'] = $this->home_lib->getAppliedInternshipOffers();
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
		$this->redirection();
		$query = '';
		if($x = $this->input->get('query')){
			$query = $x;
		}
		$this->data['searchResults'] = $this->home_lib->getSearchResults($query);
		// var_dump($this->data['searchResults']);die;
		$this->load->view('search', $this->data);
	}


	public function addJobOffer(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='1'){
			redirect(base_url());
		}
		if($_SESSION['userData']['accountType']=='2'){
			if(isset($_SESSION['presub']) && $_SESSION['presub']){
				$this->data['input'] = $_SESSION['data'];
				$_SESSION['presub'] = false;
				$_SESSION['data'] = NULL;
			}
			$this->data['locations'] = $this->home_lib->getLocations();
			$this->data['skills'] = $this->home_lib->getSkills();
			$this->load->view('addJobOffer', $this->data);
		}
		else{
			redirect(base_url('home'));
		}
	}

	public function addedJobOffers(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='1'){
			redirect(base_url());
		}
		if($_SESSION['userData']['accountType']=='2'){
			$this->data['addedJobOffers'] = $this->home_lib->getAddedJobOffers();
			$this->load->view('addedJobOffers', $this->data);
		}
		else{
			redirect(base_url('home'));
		}
	}

	public function addInternshipOffer(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='1'){
			redirect(base_url());
		}
		if($_SESSION['userData']['accountType']=='2'){
			if(isset($_SESSION['presub']) && $_SESSION['presub']){
				$this->data['input'] = $_SESSION['data'];
				$_SESSION['presub'] = false;
				$_SESSION['data'] = NULL;
			}
			$this->data['skills'] = $this->home_lib->getSkills();
			$this->data['locations'] = $this->home_lib->getLocations();
			$this->load->view('addInternshipOffer', $this->data);
		}
		else{
			redirect(base_url('home'));
		}
	}

	public function editInternshipOffer($internshipID){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='1'){
			redirect(base_url());
		}
		if($_SESSION['userData']['accountType']=='2'){
		$this->data['internshipDetails'] = $this->home_lib->getInternshipDetails($internshipID);
		$this->data['internshipDetails'] = $this->data['internshipDetails'][0];
		$_SESSION['userData']['current']['skillIDs'] = explode(',',$this->data['internshipDetails']['skillIDsRequired']);
		$_SESSION['userData']['current']['cityIDs'] = explode(',',$this->data['internshipDetails']['cityIDs']);
		$this->data['skills'] = $this->home_lib->getSkills();
		$this->data['locations'] = $this->home_lib->getLocations();
		$_SESSION['userData']['editInternshipId'] = $internshipID;
		if($_SESSION['userData']['userID'] == $this->data['internshipDetails']['addedBy'] && $this->data['internshipDetails']['status'] == 1){
			$this->load->view('editInternshipOffer', $this->data);
		}
		else{
			$this->session->set_flashdata('message', array('content' => 'Something Went Wrong, Please Try Again.', 'class' => 'error'));
			redirect(base_url('home'));
		}
    }
		else{
			die();
			redirect(base_url('home'));
		}
	}

	public function editJobOffer($jobID){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='1'){
			redirect(base_url());
		}
    if($_SESSION['userData']['accountType']=='2'){
		$this->data['jobDetails'] = $this->home_lib->getJobDetails($jobID);
		$this->data['jobDetails'] = $this->data['jobDetails'][0];
		$_SESSION['userData']['current']['skillIDs'] = explode(',',$this->data['jobDetails']['skillIDsRequired']);
		$_SESSION['userData']['current']['cityIDs'] = explode(',',$this->data['jobDetails']['cityIDs']);
		$this->data['skills'] = $this->home_lib->getSkills();
		$this->data['locations'] = $this->home_lib->getLocations();
		$_SESSION['userData']['editJobId'] = $jobID;
		if($_SESSION['userData']['userID'] == $this->data['jobDetails']['addedBy'] && $this->data['jobDetails']['status'] == 1){
			$this->load->view('editJobOffer', $this->data);
		}else{
			$this->session->set_flashdata('message', array('content' => 'Something Went Wrong, Please Try Again.', 'class' => 'error'));
			redirect(base_url('home'));
		}
    }
		else{
			redirect(base_url('home'));
		}
	}


	public function addedInternshipOffers(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='1'){
			redirect(base_url());
		}
		if($_SESSION['userData']['accountType']=='2'){
			$this->data['addedInternshipOffers'] = $this->home_lib->getAddedInternshipOffers();
			$this->load->view('addedInternshipOffers', $this->data);
		}
		else{
			redirect(base_url('home'));
		}
	}

	public function notifications($offset = 5){
		$this->redirection();
		$this->data['notifications'] = $this->home_lib->getNotifications();
		$this->data['more'] = $this->home_lib->moreNotifications($offset);
		$this->load->view('notifications', $this->data);
	}

	public function loadMoreNotifications($offset){
		$this->redirection();
		$data['notifications'] = $this->home_lib->getNotifications($offset);
		$data['more'] = $this->home_lib->moreNotifications($offset+5);
		echo json_encode($data);
	}

	/*	SKILLS 	*/

	public function skills(){
		$this->redirection();
		$this->data['reportGenerated'] = $this->home_lib->checkReportGenerated($_SESSION['userData']['userID']);
		$this->data['userSkills'] = $this->home_lib->getUserSkills($_SESSION['userData']['userID']);
		$this->data['skills'] = $this->home_lib->getSkills();
		$this->load->view('skills', $this->data);
	}



	public function skillTest()
	{
		$this->redirection();
		if($_SESSION['userData']['intest']){
			$_SESSION['questionData'] = NULL;
			$skill_id = $_SESSION['userData']['currentSkill'];
			$_SESSION['userData']['currentSkill'] = NULL;
			$_SESSION['userData']['currentSkillName'] = NULL;
			$_SESSION['userData'][$skill_id]['totalScore'] = NULL;
			$_SESSION['userData'][$skill_id]['skips'] = NULL;
			$_SESSION['userData'][$skill_id]['skipStatus'] = NULL;
			$_SESSION['userData'][$skill_id]['totalTime'] = NULL;
			$_SESSION['userData'][$skill_id]['level'] = NULL;
			$_SESSION['userData'][$skill_id]['responses'] = NULL;
			$_SESSION['userData']['intest'] = false;
			$this->session->set_flashdata('message', array('content'=>'Page Reload Not allowed During test.','class'=>'error'));
			redirect(base_url('skills'));
		}
		$_SESSION['userData']['intest'] = true;
		$this->data['skillData']['skillID'] = $_SESSION['userData']['currentSkill'];
		$this->data['skillData']['skillName'] = $_SESSION['userData']['currentSkillName'];
		$this->data['questionData'] = $_SESSION['questionData'];
		$totalTime = $_SESSION['userData'][$_SESSION['userData']['currentSkill']]['totalTime'];
		// var_dump($totalTime); die;
		$this->data['totalTime'] = $totalTime;
		// var_dump($this->data);die;
		// echo $this->data['totalTime'];die;
		$this->data['skips'] = $_SESSION['userData'][$_SESSION['userData']['currentSkill']]['skips'];
		$this->load->view('skillTest', $this->data);
	}

	public function getskillTestGuidelines($get_id = NULL){
		$this->redirection();
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
		$this->redirection();
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
				$this->data['skill_id'] = $test_settings[0]['skillID'];
				$this->load->view('skillTestGuidelines', $this->data);
			}else{
				$this->session->set_flashdata('message', array('content' => 'Something Went Wrong. Please Try Again.', 'class' => 'error'));
				redirect(base_url('skills'));
			}
		}else{
			$this->session->set_flashdata('message', array('content' => 'Something Went Wrong. Please Try Again.', 'class' => 'error'));
			redirect(base_url('skills'));
		}
	}

	/*	 CHATS 	*/


	public function composeMessage()
	{
		$this->redirection();
		$connections = $this->home_lib->getConnectionUsernames($_SESSION['userData']['userID']);
		return $connections;
	}

	public function sendComposedMessage(){
		$this->redirection();
		$message = $this->input->post('message');
		$recipient = $this->input->post('data');
		$receiver = $recipient['userID'];
		if($receiver ==  "data[userID]"){
			$this->session->set_flashdata('message', array('content' => 'Some Error Occured, Please Try Again.', 'class' => 'error'));
			redirect(base_url('messages'));
		}
		$connection = $this->home_lib->checkConnection($receiver);
		if($receiver == $_SESSION['userData']['userID']){
			$this->session->set_flashdata('message', array('content' => 'You Cannot Chat with Yourself.', 'class' => 'error'));
			redirect(base_url('messages'));
		}
		if(empty($connection)){
			$this->session->set_flashdata('message', array('content' => 'You need to be connected to this person to start a chat.', 'class' => 'error'));
			redirect(base_url('messages'));
		}
		if(!empty($receiver)){
			$response = $this->home_lib->sendMessage($receiver, $message);
			redirect(base_url('messages/chats/'.$receiver));
		}
	}

	public function messages()
	{
		$this->redirection();
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
		$this->redirection();
		$number = $this->session->userdata('chats');
		$dat['number'] = $number;
		$dat['latest_chats'] = $this->home_lib->fetchLatestChats($offset);
		$dat['more'] = $this->home_lib->moreChats(5 + $offset);
		echo json_encode($dat);
	}

	public function chat($chatter_id)
	{
		$this->redirection();
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
		$this->data['connection'] = $connection;
		if(empty($connection) && empty($messages)){
			$this->session->set_flashdata('message', array('content' => 'You need to be connected to this person to start a chat.', 'class' => 'error'));
			redirect(base_url('messages'));
		}
		$this->data['messages'] = $messages;
		$this->load->view('chat-new', $this->data);
	}

	public function loadMoreMessages($user, $offset)
	{
		$this->redirection();
		$messages = $this->home_lib->fetchConversation($user, $offset);
		echo json_encode(['content'=> $messages, 'more'=> $this->home_lib->loadMoreMessages($user, $offset+5)]);
		die;
	}

	public function sendMessage()
	{
		$this->redirection();
		$message = $this->input->post('message');
		$receiver = $this->input->post('to');
		$response = $this->home_lib->sendMessage($receiver, $message);
		echo json_encode($response);
	}

	public function checkForNewMessages()
	{
		$this->redirection();
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
		$this->data['connectionRequests'] = $this->home_lib->getConnectionRequests($userID);
		$this->data['connections'] = $this->home_lib->getConnections($userID);
		$connections = array();
		foreach ($this->data['connections'] as $key => $value){
			if($value['active']==$userID){
				array_push($connections,$value['passive']);
			}
			if($value['passive']==$userID){
				array_push($connections,$value['active']);
			}
		}
		if(!empty($connections)){
			$this->data['connections'] = $this->home_lib->getConnectionProfiles($connections);
			$this->load->view('connections', $this->data);
		}
		else{
		$this->load->view('connections', $this->data);
		}
	}

	private function generateVerifyEMail(){
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

	public function resetPassword()
	{
		$this->session->sess_destroy();
		$this->load->view('resetPassword', $this->data);
	}

	public function getJobData($jobID){
		$this->redirection();
		return $this->home_lib->getJobData($jobID);
	}

	public function applicants($offerType, $offerID){
		$this->redirection();
		$this->data['offerData'] = $this->home_lib->getOfferData($offerType, $offerID);
		$this->data['offerType'] = $offerType;
		$this->data['offerID'] = $offerID;
		// var_dump($this->data['offerData']);die;
		$filters = [];
		if($this->data['offerData']['addedBy']===$_SESSION['userData']['userID']){
			if (isset($_POST['applyfilter'])) {
				$filters = $_POST['filter'];
				$this->data['applicants'] = $this->home_lib->getFilteredApplicants($offerType, $offerID, $filters);
				$this->data['filter'] = json_encode($filters);
			}else{
				$this->data['filter'] = json_encode($filters);
				$this->data['applicants'] = $this->home_lib->getApplicants($offerType, $offerID);
			}
			$this->load->view('applicants', $this->data);
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again.','class'=>'error'));
			redirect(base_url());
		}
	}

	public function getProfileVerified(){
		$this->redirection();
		if($_SESSION['registrationLevel']=='3'){
			redirect(base_url('verify-mobile-number/8800'));
		}
		$identityDocumentStatus = $this->home_lib->getIdentityDocumentStatus();
		$identityDocumentStatus = $identityDocumentStatus[0]['identityDocumentStatus'];
		if(($_SESSION['registrationLevel']=='4') && ($identityDocumentStatus=='1')){
			redirect(base_url('upload-identity-document'));
		}
		if(($_SESSION['registrationLevel']=='4') && ($identityDocumentStatus=='2')){
			$this->session->set_flashdata('message', array('content'=>'Identity Document is Successfully Uploaded. Your account will be verified in next 24-48 hours','class'=>'success'));
			redirect(base_url('home'));
		}
		if(($_SESSION['registrationLevel']=='4') && ($identityDocumentStatus=='3')){
			$this->session->set_flashdata('message', array('content'=>'Identity Document Uploaded has been rejected during verification process. Please Try Again','class'=>'error'));
			redirect(base_url('upload-identity-document'));
		}
		if(($_SESSION['registrationLevel']=='4') && ($identityDocumentStatus=='4')){
			$this->home_lib->updateRegistrationLevel($_SESSION['userData']['userID'], '5');
			$CI = &get_instance();
			$CI->session->set_userdata('registrationLevel', '5');
			$this->session->set_flashdata('message', array('content'=>'Your Account is Verified Successfully','class'=>'success'));
			redirect(base_url('home'));
		}
		if($_SESSION['registrationLevel']=='5'){
			$this->session->set_flashdata('message', array('content'=>'Your Account is Already Verified.','class'=>'success'));
			redirect(base_url('home'));
		}
	}

	public function sendSMS($mobile, $msg){
		$authKey = "163538ADD0UybtU59590664";
		$mobileNumber = $mobile;
		$senderId = "CPUPPY";
		$message = urlencode($msg);
		$route = "4";
		$postData = array(
		    'authkey' => $authKey,
		    'mobiles' => $mobileNumber,
		    'message' => $message,
		    'sender' => $senderId,
		    'route' => $route
		);
		$url="http://api.msg91.com/api/sendhttp.php";
		$ch = curl_init();
		curl_setopt_array($ch, array(
		    CURLOPT_URL => $url,
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_POST => true,
		    CURLOPT_POSTFIELDS => $postData
		    //,CURLOPT_FOLLOWLOCATION => true
		));
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$output = curl_exec($ch);
		if(curl_errno($ch)){
	  // echo 'error:' . curl_error($ch);
		}
		curl_close($ch);
		// echo $output;
		}
		////////////////////////////////
		public function report(){
			$userID = $this->input->get('userID');
			if($userID!=$_SESSION['userData']['userID']){
				$this->session->set_flashdata('message', array('content'=>'Something Went Wrong.','class'=>'error'));
				redirect(base_url('skills'));
			}
			$coatID = $this->home_lib->getCOATUserID($userID);
			$userID = $coatID[0]['COATuserID'];
			$this->data['reportContent'] = $this->home_lib->getReportContent();
			$this->data['userDetails'] = $this->home_lib->getUserDetailsReport($userID);
			$this->data['userDetails'] = $this->data['userDetails'][0];
			$userSkills = $this->home_lib->getUserSkillsReport($userID);
			$this->data['skillsUser'] = array();
			foreach ($userSkills as $key => $value){
				$sum = 0;
				$attempts = 0;
				$correctAttempts = 0;
				$responses = $this->home_lib->getResponses($userID, $value['skillID']);
				$averageAttempts = $this->home_lib->getAverageAttempts($value['skillID']);
				$averageScore = $this->home_lib->getAverageScore($value['skillID']);
				$averageScore = $averageScore[0]['averageScore'];
				$averageAttempts = $averageAttempts[0]['avg'];
				$averageAttempts = floor($averageAttempts);
				$averageCorrectAttempts = $this->home_lib->getAverageCorrectAttempts($value['skillID']);
				$averageCorrectAttempts = $averageCorrectAttempts[0]['avg'];
				$averageCorrectAttempts = floor($averageCorrectAttempts);
				foreach ($responses as $key => $val) {
					$sum = $sum + $val['score'];
					$attempts++;
					if($val['correct']){
						$correctAttempts++;
					}
				}
				$sum = floor($sum);
				$averageScore = floor($averageScore);
				if($sum<10){
					$badge = "4";
				}
				if($sum>10 && $sum<35){
					$badge = "1";
				}
				if($sum>35 && $sum<60){
					$badge = "2";
				}
				if($sum>60){
					$badge = "3";
				}
				$userResponses = $this->home_lib->getResponseDL($value['skillID']);
				$userResponsesArray= array();
				foreach ($userResponses as $key => $value12) {
					array_push($userResponsesArray, $value12['number']);
				}
				$otherUserResponses = $this->home_lib->getResponseDLUser($value['skillID'], $userID);
				$otherUserResponsesArray = array();
				foreach ($otherUserResponses as $key => $value123) {
					array_push($otherUserResponsesArray, $value123['number']);
				}
				$userResponsesCorrect = $this->home_lib->getResponseDLCorrect($value['skillID']);
				$userResponsesArrayCorrect= array();
				foreach ($userResponsesCorrect as $key => $value1212) {
					array_push($userResponsesArrayCorrect, $value1212['number']);
				}
				$otherUserResponsesCorrect = $this->home_lib->getResponseDLUserCorrect($value['skillID'], $userID);
				$otherUserResponsesArrayCorrect = array();
				foreach ($otherUserResponsesCorrect as $key => $value123123) {
					array_push($otherUserResponsesArrayCorrect, $value123123['number']);
				}
				$skillDetails = array(
					'skillID' => $value['skillID'],
					'skill' => $value['skill'],
					'score' => $sum,
					'badge' => $badge,
					'averageScore' => $averageScore,
					'attempts' => $attempts,
					'averageAttempts' => $averageAttempts,
					'correctAttempts' => $correctAttempts,
					'averageCorrectAttempts' => $averageCorrectAttempts,
					'userResponsesArray' => $userResponsesArray,
					'otherUserResponsesArray' => $otherUserResponsesArray,
					'userResponsesArrayCorrect' => $userResponsesArrayCorrect,
					'otherUserResponsesArrayCorrect' => $otherUserResponsesArrayCorrect
				);
				array_push($this->data['skillsUser'], $skillDetails);
			}
			$this->load->view('report', $this->data);
		}

}
