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
					echo "email verification pending hai";
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
		if($_SESSION['userData']['accountType']=='2'){
			redirect(base_url());
		}
		$this->data['relevantJobs'] = $this->home_lib->getJobOffers('1');
		$this->load->view('relevantJobs', $this->data);
	}

	public function resetPassword(){
		$this->load->view('resetPassword', $this->data);
	}
	public function dbconnect(){
		 $this->load->model('Home_model');
		  $this->Home_model->dbconnect();
		 
	}

	public function jobOffers(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='2'){
			redirect(base_url());
		}
		$relevant = 0;
		$this->data['jobOffers'] = $this->home_lib->getJobOffers($relevant);
		$this->load->view('jobOffers', $this->data);
	}

	public function appliedJobOffers(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='2'){
			redirect(base_url());
		}
		$this->load->model('Home_model');
		$this->data['job']= $this->Home_model->appliedjob();
		$this->load->view('appliedJobOffers', $this->data);
	}

	//Internship Offers- Normal Users

	public function relevantInternships(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='2'){
			redirect(base_url());
		}
		$this->load->view('relevantInternships', $this->data);
	}

	public function internshipOffers(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='2'){
			redirect(base_url());
		}
		$this->load->view('internshipOffers', $this->data);
	}

	public function appliedInternshipOffers(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='2'){
			redirect(base_url());
		}
		$this->load->model('Home_model');
		$this->data['intern']= $this->Home_model->appliedinternship();

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
		//var_dump($this->data['about']);die;
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

	public function addJobOffer(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='1'){
			redirect(base_url());
		}
		$this->data['locations'] = $this->home_lib->getLocations();
		$this->data['skills'] = $this->home_lib->getSkills();
		$this->load->view('addJobOffer', $this->data);
	}

	public function addedJobOffers(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='1'){
			redirect(base_url());
		}
		$this->data['addedJobOffers'] = $this->home_lib->getAddedJobOffers();
		$this->load->view('addedJobOffers', $this->data);
	}
	

	public function hi(){
		$jobID = $this->input->get('jobID');
		$internID= $this->input->get('internID');
		if($jobID)
		{$this->apply_job(2,$jobID);}
	 else 
		{$this->apply_intern(2,$internID);}
	}

	public function apply_job($offerType='', $offerID=''){
		if($offerType=='2'){
			$jobData = $this->home_lib->getJobData($offerID);
			$jobData = $jobData[0]; 
			$jobSkillsRequired = $jobData['skillIDsRequired'];
			$jobSkillsRequired = explode(',', $jobSkillsRequired);
			$jobskill = 0 ;
			foreach ($jobSkillsRequired as $key => $value) {
				$jobskill ++ ;
			} 
			
			$userID = $_SESSION['userData']['userID'];
			

						
						  if($jobData['applicants']=='1' || $jobData['applicants']=='2'){ 
							$checkSkillMatch = $this->checkJobSkillMatch($offerType, $offerID); 
							//var_dump($checkSkillMatch);die;
							if($checkSkillMatch){ 
								if($jobData['applicants']=='1' && $checkSkillMatch==$jobskill){ 
							
									$apply = $this->home_lib->apply_job($offerType, $offerID, $userID);
									echo "applied successfully";
							} 

							else 
								if($jobData['applicants']=='2'){
									$apply = $this->home_lib->apply_job($offerType, $offerID, $userID);
									echo"applied successfully!! partial";
								}
							
								else { echo "unsuccessful attempt!!" ; }
							}
							
						   }
						
						    else{
							$apply = $this->home_lib->apply_job($offerType, $offerID, $userID);
						    }
					  }  
			            
	}
    
   public function apply_intern($offerType='', $offerID=''){
		if($offerType=='2'){
			$internData = $this->home_lib->getInternshipData($offerID);
			$internData = $internData[0]; 
			$internSkillsRequired = $internData['skillIDsRequired'];
			$internSkillsRequired = explode(',', $internSkillsRequired);
			$internskill = 0 ;
			foreach ($internSkillsRequired as $key => $value) {
				$internskill ++ ;
			} 
			
			$userID = $_SESSION['userData']['userID'];
			

						
						  if($internData['applicants']=='1' || $internData['applicants']=='2'){ 
							$checkSkillMatch = $this->checkInternSkillMatch($offerType, $offerID); 
							//var_dump($checkSkillMatch);die;
							if($checkSkillMatch){ 
								if($internData['applicants']=='1' && $checkSkillMatch==$internskill){ 
							
									$apply = $this->home_lib->apply_intern($offerType, $offerID, $userID);
									echo "applied successfully";
							} 

							else 
								if($internData['applicants']=='2'){
									$apply = $this->home_lib->apply_intern($offerType, $offerID, $userID);
									echo"applied successfully!! partial";
								}
							
								else { echo "unsuccessful attempt!!" ; }
							}
							
						   }
						
						    else{
							$apply = $this->home_lib->apply_intern($offerType, $offerID, $userID);
						    }
					  }  
			            
	}

	public function checkJobSkillMatch($offerType, $offerID){
		$userID = $_SESSION['userData']['userID'];
		if($offerType=='2'){
			//job match skills
			$jobData = $this->home_lib->getJobData($offerID);
			$jobData = $jobData[0];
			$jobSkillsRequired = $jobData['skillIDsRequired'];
			$jobSkillsRequired = explode(',', $jobSkillsRequired);
			
			$userSkills = $this->home_lib->getUserSkills($userID);
			
			$skillCount = 0;
			
			foreach ($userSkills as $key => $value) {
				if(in_array($value['skillID'], $jobSkillsRequired)){
					$skillCount++;
				}
			} 
		}
		
		return ($skillCount);

	}

	
public function checkInternSkillMatch($offerType, $offerID){
		$userID = $_SESSION['userData']['userID'];
		if($offerType=='2'){
			//job match skills
			$internData = $this->home_lib->getInternshipData($offerID);
			$internData = $internData[0];
			$internSkillsRequired = $internData['skillIDsRequired'];
			$internSkillsRequired = explode(',', $internSkillsRequired);
			
			$userSkills = $this->home_lib->getUserSkills($userID);
			
			$skillCount = 0;
			
			foreach ($userSkills as $key => $value) {
				if(in_array($value['skillID'], $internSkillsRequired)){
					$skillCount++;
				}
			} 
		}
		
		return ($skillCount);

	}


	public function addInternshipOffer(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='1'){
			redirect(base_url());
		}
		$this->data['skills'] = $this->home_lib->getSkills();
		$this->data['locations'] = $this->home_lib->getLocations();
		$this->load->view('addInternshipOffer', $this->data);
	}

	public function addedInternshipOffers(){
		$this->redirection();
		if($_SESSION['userData']['accountType']=='1'){
			redirect(base_url());
		}
		$this->load->view('addedInternshipOffers', $this->data);
	}

	public function notifications(){
		$this->redirection();
		$this->load->view('notifications', $this->data);
	}

	public function messages(){
		$this->redirection();
		// $this->load->model('Home_model');
		// $this->data=$this->Home_model->message();
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
			$this->session->set_flashdata('message', array('content' => 'Page Reload not Allowed during test.', 'class' => 'error'));
			redirect(base_url('skills'));
        }
        $this->session->set_userdata('in_test', true);
        $skill_data = $this->session->userdata('skill_data');
        $test_settings = $this->session->userdata('test_settings');
        $this->data['questions'] = $this->home_lib->get_questions($test_settings[0]['numberQuestions'], $skill_data['skillID']);
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
				$skill_data = $this->home_lib->fetch_skill_data($get_id);
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
		$test_settings = $this->home_lib->get_test_settings($this->session->userdata('skill_id'));
		if(!empty($test_settings[0]['skillID'])) {
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


