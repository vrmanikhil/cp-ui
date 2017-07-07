<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employers extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->helper(array('url'));
			$this->load->library(array('Home_lib', 'session'));
			$this->data = array();
			$this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','class'=>'');
	}

	public function addInternshipOffer(){
		$internshipOfferTitle = '';
		$internshipOfferDescription = '';
		$openings = '';
		$partTime = '';
		$startDate = '';
		$applicationDeadline = '';
		$durationType = '';
		$duration = '';
		$stipendType = '';
		$minimumStipend = '';
		$maximumStipend = '';
		$stipend = '';
		$applicants = '';
		$internshipType = '';
		$addedBy = $_SESSION['userData']['userID'];

		if($x = $this->input->post('internshipOfferTitle')){
			$internshipOfferTitle = $x;
		}
		if($x = $this->input->post('internshipOfferDescription')){
			$internshipOfferDescription = $x;
		}
		if($x = $this->input->post('openings')){
			$openings = $x;
		}
		if($x = $this->input->post('partTime')){
			$partTime = $x;
		}
		if($x = $this->input->post('startDate')){
			$startDate = $x;
		}
		if($x = $this->input->post('applicationDeadline')){
			$applicationDeadline = $x;
		}
		if($x = $this->input->post('durationType')){
			$durationType = $x;
		}
		if($durationType == '1'){
				if($x = $this->input->post('duration')){
					$duration = $x;
				}
		}
		if($x = $this->input->post('stipendType')){
			$stipendType = $x;
		}
		if($stipendType == '3'){
				if($x = $this->input->post('minimumStipend')){
					$minimumStipend = $x;
				}
				if($x = $this->input->post('maximumStipend')){
					$maximumStipend = $x;
				}
		}
		if($stipendType == '4'){
				if($x = $this->input->post('stipend')){
					$stipend = $x;
				}
		}
		if($x = $this->input->post('applicants')){
			$applicants = $x;
		}
		if($x = $this->input->post('internshipType')){
			$internshipType = $x;
		}
		if($applicants == '1' || $applicants == '2'){
			$selected_skills = '';
			$selected_skills = ($this->input->post('selected_skills')!='')?$this->input->post('selected_skills'):'';
		}
		if($internshipType == '2'){
			$selected_locations = '';
			$selected_locations = ($this->input->post('selected_locations')!='')?$this->input->post('selected_locations'):'';
		}

		date_default_timezone_set("Asia/Kolkata");
		$today = date('Y-m-d');
		$d1 = DateTime::createFromFormat('Y-m-d', $startDate);
		$d2 = DateTime::createFromFormat('Y-m-d', $applicationDeadline);
		$data = array(
			'internshipTitle' => $internshipOfferTitle,
			'internshipDescription' => $internshipOfferDescription,
			'openings' => $openings,
			'partTime' => $partTime,
			'startDate' => $startDate,
			'applicationDeadline' => $applicationDeadline,
			'durationType' => $durationType,
			'duration' => $duration,
			'stipendType' => $stipendType,
			'minimumStipend' => $minimumStipend,
			'maximumStipend' => $maximumStipend,
			'stipend' => $stipend,
			'applicants' => $applicants,
			'internshipType' => $internshipType,
			'addedBy' => $addedBy
		);

		if($internshipOfferTitle == '' || $internshipOfferDescription == '' || $openings == '' || $partTime == '' || $startDate == '' || $applicationDeadline == '' || $durationType == '' || $stipendType == '' || $applicants == '' || $internshipType == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('internships/add-internship-offer'));
		}
		if($durationType == '1' && $duration == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('internships/add-internship-offer'));
		}
		if($stipendType == '3' && $minimumStipend == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('internships/add-internship-offer'));
		}
		if($stipendType == '3' && $maximumStipend == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('internships/add-internship-offer'));
		}
		if($stipendType == '3'){
			if($maximumStipend<$minimumStipend){
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url('internships/add-internship-offer'));
			}
		}
		if($stipendType == '3' && $stipend == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('internships/add-internship-offer'));
		}
		if($applicants == '1' || $applicants == '2'){
			if($selected_skills == ''){
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url('internships/add-internship-offer'));
			}
		}
		if($internshipType == '2'){
			if($selected_locations == ''){
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url('internships/add-internship-offer'));
			}
		}
		if (!($d1 && $d1->format('Y-m-d') === $startDate)){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('internships/add-internship-offer'));
		}
		if ($startDate < $today){
			$this->session->set_flashdata('message', array('content'=>'Internship Start Date has already passed. Please Try Again','class'=>'error'));
			redirect(base_url());
		}
		if (!($d2 && $d2->format('Y-m-d') === $applicationDeadline)){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('internships/add-internship-offer'));
		}
		if ($applicationDeadline < $today){
			$this->session->set_flashdata('message', array('content'=>'Internship Application Date has already passed. Please Try Again','class'=>'error'));
			redirect(base_url('internships/add-internship-offer'));
		}
		if ($applicationDeadline > $startDate){
			$this->session->set_flashdata('message', array('content'=>'Internship Start Date cannot be before the Internship Application Deadline. Please Try Again','class'=>'error'));
			redirect(base_url('internships/add-internship-offer'));
		}

		if($internshipID = $this->home_lib->addInternship($data)){
			if ($selected_skills!=''){
				$skillIDs = [];
				$i=0;
				$selected_skills = json_decode($selected_skills,true);
				foreach ($selected_skills as $key => $value) {
					array_push($skillIDs,['skillID'=>$value,'internshipID'=>$internshipID]);
				}
				$try=[];
				foreach ($skillIDs as $key => $value){
					array_push($try,['skillID'=>$value['skillID']['skillID'],'internshipID'=>$internshipID]);}
					$this->load->model('home_model','homeModel');
					if (!$this->homeModel->map_intern_skills($try)){
						$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
						redirect(base_url('internships/add-internship-offer'));
					}
				}
				if ($selected_locations!=''){
					$locationIDs = [];
					$i=0;
					$selected_locations = json_decode($selected_locations,true);
					foreach ($selected_locations as $key => $value){
					array_push($locationIDs,['cityID'=>$value,'internshipID'=>$internshipID]);
					}
					$try=[];
					foreach ($locationIDs as $key => $value){
						array_push($try,['cityID'=>$value['cityID']['location_id'],'internshipID'=>$internshipID]);}
						$this->load->model('home_model','homeModel');
						if (!$this->homeModel->map_intern_locations($try)){
							$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
							redirect(base_url('internships/add-internship-offer'));
						}
					}
			$this->session->set_flashdata('message', array('content'=>'Internship Offer Successfully Added.','class'=>'success'));
			redirect(base_url('internships/add-internship-offer'));
			}
	}

	public function editInternshipOffer(){
		$internshipOfferTitle = '';
		$internshipOfferDescription = '';
		$openings = '';
		$partTime = '';
		$startDate = '';
		$applicationDeadline = '';
		$durationType = '';
		$duration = '';
		$stipendType = '';
		$minimumStipend = '';
		$maximumStipend = '';
		$stipend = '';
		$applicants = '';
		$internshipType = '';
		$addedBy = $_SESSION['userData']['userID'];
		if($x = $this->input->post('internshipOfferTitle')){
			$internshipOfferTitle = $x;
		}
		if($x = $this->input->post('internshipOfferDescription')){
			$internshipOfferDescription = $x;
		}
		if($x = $this->input->post('openings')){
			$openings = $x;
		}
		if($x = $this->input->post('partTime')){
			$partTime = $x;
		}
		if($x = $this->input->post('startDate')){
			$startDate = $x;
		}
		if($x = $this->input->post('applicationDeadline')){
			$applicationDeadline = $x;
		}
		if($x = $this->input->post('durationType')){
			$durationType = $x;
		}
		if($durationType == '1'){
				if($x = $this->input->post('duration')){
					$duration = $x;
				}
		}
		if($x = $this->input->post('stipendType')){
			$stipendType = $x;
		}
		if($stipendType == '3'){
				if($x = $this->input->post('minimumStipend')){
					$minimumStipend = $x;
				}
				if($x = $this->input->post('maximumStipend')){
					$maximumStipend = $x;
				}
		}
		if($stipendType == '4'){
				if($x = $this->input->post('stipend')){
					$stipend = $x;
				}
		}
		if($x = $this->input->post('applicants')){
			$applicants = $x;
		}
		if($x = $this->input->post('internshipType')){
			$internshipType = $x;
		}
		if($applicants == '1' || $applicants == '2'){
			$selected_skills = '';
			$selected_skills = ($this->input->post('selected_skills')!='')?$this->input->post('selected_skills'):'';
		}
		if($internshipType == '2'){
			$selected_locations = '';
			$selected_locations = ($this->input->post('selected_locations')!='')?$this->input->post('selected_locations'):'';
		}

		date_default_timezone_set("Asia/Kolkata");
		$today = date('Y-m-d');
		$d1 = DateTime::createFromFormat('Y-m-d', $startDate);
		$d2 = DateTime::createFromFormat('Y-m-d', $applicationDeadline);
		$data = array(
			'internshipTitle' => $internshipOfferTitle,
			'internshipDescription' => $internshipOfferDescription,
			'openings' => $openings,
			'partTime' => $partTime,
			'startDate' => $startDate,
			'applicationDeadline' => $applicationDeadline,
			'durationType' => $durationType,
			'duration' => $duration,
			'stipendType' => $stipendType,
			'minimumStipend' => $minimumStipend,
			'maximumStipend' => $maximumStipend,
			'stipend' => $stipend,
			'applicants' => $applicants,
			'internshipType' => $internshipType,
			'addedBy' => $addedBy
		);

		if($internshipOfferTitle == '' || $internshipOfferDescription == '' || $openings == '' || $partTime == '' || $startDate == '' || $applicationDeadline == '' || $durationType == '' || $stipendType == '' || $applicants == '' || $internshipType == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('internships/edit-internship-offer/'.$internshipID));
		}
		if($durationType == '1' && $duration == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('internships/edit-internship-offer/'.$internshipID));
		}
		if($stipendType == '3' && $minimumStipend == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('internships/edit-internship-offer/'.$internshipID));
		}
		if($stipendType == '3' && $maximumStipend == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('internships/edit-internship-offer/'.$internshipID));
		}
		if($stipendType == '4' && $stipend == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('internships/edit-internship-offer/'.$internshipID));
		}
		if($applicants == '1' || $applicants == '2'){
			if($selected_skills == ''){
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url('internships/edit-internship-offer/'.$internshipID));
			}
		}
		if($internshipType == '2'){
			if($selected_locations == ''){
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url('internships/edit-internship-offer/'.$internshipID));
			}
		}
		if (!($d1 && $d1->format('Y-m-d') === $startDate)){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('internships/edit-internship-offer/'.$internshipID));
		}
		if ($startDate < $today){
			$this->session->set_flashdata('message', array('content'=>'Internship Start Date has already passed. Please Try Again','class'=>'error'));
			redirect(base_url('internships/edit-internship-offer/'.$internshipID));
		}
		if (!($d2 && $d2->format('Y-m-d') === $applicationDeadline)){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('internships/edit-internship-offer/'.$internshipID));
		}
		if ($applicationDeadline < $today){
			$this->session->set_flashdata('message', array('content'=>'Internship Application Date has already passed. Please Try Again','class'=>'error'));
			redirect(base_url('internships/edit-internship-offer/'.$internshipID));
		}
		if ($applicationDeadline > $startDate){
			$this->session->set_flashdata('message', array('content'=>'Internship Start Date cannot be before the Internship Application Deadline. Please Try Again','class'=>'error'));
			redirect(base_url('internships/edit-internship-offer/'.$internshipID));
		}
		$internshipID = $_SESSION['userData']['editInternshipId'] ;
		if($this->home_lib->editInternship($data, $internshipID)){
			if ($selected_skills!=''){
				$skillIDs = [];
				$i=0;
				$selected_skills = json_decode($selected_skills,true);
				foreach ($selected_skills as $key => $value) {
					if($value != Null)
					array_push($skillIDs,['skillID'=>$value,'internshipID'=>$internshipID]);
				}
				$try=[];
				foreach ($skillIDs as $key => $value){
					array_push($try,['skillID'=>$value['skillID']['skillID'],'internshipID'=>$internshipID]);}
					$this->load->model('home_model','homeModel');
					if (!$this->homeModel->editInternSkills($try, $internshipID)){
						$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
						redirect(base_url('internships/edit-internship-offer/'.$internshipID));
					}
				}
				if ($selected_locations!=''){
					$locationIDs = [];
					$i=0;
					$selected_locations = json_decode($selected_locations,true);
					foreach ($selected_locations as $key => $value){
					array_push($locationIDs,['cityID'=>$value,'internshipID'=>$internshipID]);
					}
					$try=[];
					foreach ($locationIDs as $key => $value){
						if($value != Null)
						array_push($try,['cityID'=>$value['cityID']['location_id'],'internshipID'=>$internshipID]);}
						$this->load->model('home_model','homeModel');
						if (!$this->homeModel->editInternLocations($try, $internshipID)){
							$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
							redirect(base_url('internships/edit-internship-offer/'.$internshipID));
						}
					}
			$_SESSION['userData']['editInternshipId'] = NULL;
			$_SESSION['userData']['current'] = NULL;
			$this->session->set_flashdata('message', array('content'=>'Internship Offer Successfully Edited.','class'=>'success'));
			redirect(base_url('internships/internship-offers'));
			}
	}

	public function editJobOffer(){
		$jobOfferTitle = '';
		$jobOfferDescription = '';
		$openings = '';
		$partTime = '';
		$startDate = '';
		$applicationDeadline = '';
		$salaryType = '';
		$minimumOffer = '';
		$maximumOffer = '';
		$salary = '';
		$applicants = '';
		$jobType = '';
		$addedBy = $_SESSION['userData']['userID'];

		if($x = $this->input->post('jobOfferTitle')){
			$jobOfferTitle = $x;
		}
		if($x = $this->input->post('jobOfferDescription')){
			$jobOfferDescription = $x;
		}
		if($x = $this->input->post('openings')){
			$openings = $x;
		}
		if($x = $this->input->post('partTime')){
			$partTime = $x;
		}
		if($x = $this->input->post('startDate')){
			$startDate = $x;
		}
		if($x = $this->input->post('applicationDeadline')){
			$applicationDeadline = $x;
		}
		if($x = $this->input->post('salaryType')){
			$salaryType = $x;
		}
		if($salaryType == '1'){
				if($x = $this->input->post('minimumOffer')){
					$minimumOffer = $x;
				}
				if($x = $this->input->post('maximumOffer')){
					$maximumOffer = $x;
				}
		}
		if($salaryType == '2'){
				if($x = $this->input->post('salary')){
					$salary = $x;
				}
		}
		if($x = $this->input->post('applicants')){
			$applicants = $x;
		}
		if($x = $this->input->post('jobType')){
			$jobType = $x;
		}
		if($applicants == '1' || $applicants == '2'){
			$selected_skills = '';
			$selected_skills = ($this->input->post('selected_skills')!='')?$this->input->post('selected_skills'):'';
		}
		if($jobType == '2'){
			$selected_locations = '';
			$selected_locations = ($this->input->post('selected_locations')!='')?$this->input->post('selected_locations'):'';
		}

		date_default_timezone_set("Asia/Kolkata");
		$today = date('Y-m-d');
		$d1 = DateTime::createFromFormat('Y-m-d', $startDate);
		$d2 = DateTime::createFromFormat('Y-m-d', $applicationDeadline);
		$data = array(
			'jobTitle' => $jobOfferTitle,
			'jobDescription' => $jobOfferDescription,
			'openings' => $openings,
			'partTime' => $partTime,
			'startDate' => $startDate,
			'applicationDeadline' => $applicationDeadline,
			'offerType' => $salaryType,
			'minimumOffer' => $minimumOffer,
			'maximumOffer' => $maximumOffer,
			'offer' => $salary,
			'applicants' => $applicants,
			'jobType' => $jobType,
			'addedBy' => $addedBy
		);
		date_default_timezone_set("Asia/Kolkata");
		$today = date('Y-m-d');
		if($jobOfferTitle == '' || $jobOfferDescription == '' || $openings == '' || $partTime == '' || $startDate == '' || $applicationDeadline == '' || $salaryType == '' || $applicants == '' || $jobType == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('jobs/edit-job-offer/'.$jobID));
		}
		if($salaryType == '1' && $minimumOffer == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('jobs/edit-job-offer/'.$jobID));
		}
		if($salaryType == '1' && $maximumOffer == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('jobs/edit-job-offer/'.$jobID));
		}
		if($salaryType == '1'){
			if($minimumOffer>$maximumOffer){
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url('jobs/edit-job-offer/'.$jobID));
			}
		}
		if($salaryType == '2' && $salary == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('jobs/edit-job-offer/'.$jobID));
		}
		if($applicants == '1' || $applicants == '2'){
			if($selected_skills == ''){
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url('jobs/edit-job-offer/'.$jobID));
			}
		}
		if($jobType == '2'){
			if($selected_locations == ''){
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url('jobs/edit-job-offer/'.$jobID));
			}
		}
		if (!($d1 && $d1->format('Y-m-d') === $startDate)){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('jobs/edit-job-offer/'.$jobID));
		}
		if ($startDate < $today){
			$this->session->set_flashdata('message', array('content'=>'Job Start Date has already passed. Please Try Again','class'=>'error'));
			redirect(base_url('jobs/edit-job-offer/'.$jobID));
		}
		if (!($d2 && $d2->format('Y-m-d') === $applicationDeadline)){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('jobs/edit-job-offer/'.$jobID));
		}
		if ($applicationDeadline < $today){
			$this->session->set_flashdata('message', array('content'=>'Job Application Date has already passed. Please Try Again','class'=>'error'));
			redirect(base_url('jobs/edit-job-offer/'.$jobID));
		}
		if ($applicationDeadline > $startDate){
			$this->session->set_flashdata('message', array('content'=>'Job Start Date cannot be before the Internship Application Deadline. Please Try Again','class'=>'error'));
			redirect(base_url('jobs/edit-job-offer/'.$jobID));
		}
		$jobID = $_SESSION['userData']['editJobId'] ;
		if($this->home_lib->editJob($data, $jobID)){
			if ($selected_skills!=''){
				$skillIDs = [];
				$i=0;
				$selected_skills = json_decode($selected_skills,true);
				foreach ($selected_skills as $key => $value) {
					array_push($skillIDs,['skillID'=>$value,'jobID'=>$jobID]);
				}
				$try=[];
				foreach ($skillIDs as $key => $value){
					array_push($try,['skillID'=>$value['skillID']['skillID'],'jobID'=>$jobID]);}
					$this->load->model('home_model','homeModel');
					if (!$this->homeModel->editJobSkills($try, $jobID)){
						$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
						redirect(base_url('jobs/edit-job-offer/'.$jobID));
					}
				}
				if ($selected_locations!=''){
					$locationIDs = [];
					$i=0;
					$selected_locations = json_decode($selected_locations,true);
					foreach ($selected_locations as $key => $value){
					array_push($locationIDs,['cityID'=>$value,'jobID'=>$jobID]);
					}
					$try=[];
					foreach ($locationIDs as $key => $value){
						array_push($try,['cityID'=>$value['cityID']['location_id'],'jobID'=>$jobID]);}
						$this->load->model('home_model','homeModel');
						if (!$this->homeModel->editJobLocations($try,$jobID)){
							$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
							redirect(base_url('jobs/edit-job-offer/'.$jobID));
						}
					}
					$_SESSION['userData']['editJobId'] = NULL;
			$_SESSION['userData']['current'] = NULL;
			$this->session->set_flashdata('message', array('content'=>'Job Offer Successfully Edited.','class'=>'success'));
			redirect(base_url('jobs/job-offers'));
			}
	}

	public function addJobOffer(){
		$jobOfferTitle = '';
		$jobOfferDescription = '';
		$openings = '';
		$partTime = '';
		$startDate = '';
		$applicationDeadline = '';
		$salaryType = '';
		$minimumOffer = '';
		$maximumOffer = '';
		$salary = '';
		$applicants = '';
		$jobType = '';
		$addedBy = $_SESSION['userData']['userID'];

		if($x = $this->input->post('jobOfferTitle')){
			$jobOfferTitle = $x;
		}
		if($x = $this->input->post('jobOfferDescription')){
			$jobOfferDescription = $x;
		}
		if($x = $this->input->post('openings')){
			$openings = $x;
		}
		if($x = $this->input->post('partTime')){
			$partTime = $x;
		}
		if($x = $this->input->post('startDate')){
			$startDate = $x;
		}
		if($x = $this->input->post('applicationDeadline')){
			$applicationDeadline = $x;
		}
		if($x = $this->input->post('salaryType')){
			$salaryType = $x;
		}
		if($salaryType == '1'){
				if($x = $this->input->post('minimumOffer')){
					$minimumOffer = $x;
				}
				if($x = $this->input->post('maximumOffer')){
					$maximumOffer = $x;
				}
		}
		if($salaryType == '2'){
				if($x = $this->input->post('salary')){
					$salary = $x;
				}
		}
		if($x = $this->input->post('applicants')){
			$applicants = $x;
		}
		if($x = $this->input->post('jobType')){
			$jobType = $x;
		}
		if($applicants == '1' || $applicants == '2'){
			$selected_skills = '';
			$selected_skills = ($this->input->post('selected_skills')!='')?$this->input->post('selected_skills'):'';
		}
		if($jobType == '2'){
			$selected_locations = '';
			$selected_locations = ($this->input->post('selected_locations')!='')?$this->input->post('selected_locations'):'';
		}

		date_default_timezone_set("Asia/Kolkata");
		$today = date('Y-m-d');
		$d1 = DateTime::createFromFormat('Y-m-d', $startDate);
		$d2 = DateTime::createFromFormat('Y-m-d', $applicationDeadline);
		$data = array(
			'jobTitle' => $jobOfferTitle,
			'jobDescription' => $jobOfferDescription,
			'openings' => $openings,
			'partTime' => $partTime,
			'startDate' => $startDate,
			'applicationDeadline' => $applicationDeadline,
			'offerType' => $salaryType,
			'minimumOffer' => $minimumOffer,
			'maximumOffer' => $maximumOffer,
			'offer' => $salary,
			'applicants' => $applicants,
			'jobType' => $jobType,
			'addedBy' => $addedBy
		);
		date_default_timezone_set("Asia/Kolkata");
		$today = date('Y-m-d');
		if($jobOfferTitle == '' || $jobOfferDescription == '' || $openings == '' || $partTime == '' || $startDate == '' || $applicationDeadline == '' || $salaryType == '' || $applicants == '' || $jobType == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again1','class'=>'error'));
			redirect(base_url('jobs/add-job-offer'));
		}
		if($salaryType == '1' && $minimumOffer == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again2','class'=>'error'));
			redirect(base_url('jobs/add-job-offer'));
		}
		if($salaryType == '1' && $maximumOffer == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again3','class'=>'error'));
			redirect(base_url('jobs/add-job-offer'));
		}
		if($salaryType=='1'){
			if($minimumOffer>$maximumOffer){
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again3','class'=>'error'));
				redirect(base_url('jobs/add-job-offer'));
			}
		}
		if($salaryType == '2' && $salary == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again4','class'=>'error'));
			redirect(base_url('jobs/add-job-offer'));
		}
		if($applicants == '1' || $applicants == '2'){
			if($selected_skills == ''){
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again5','class'=>'error'));
				redirect(base_url('jobs/add-job-offer'));
			}
		}
		if($jobType == '2'){
			if($selected_locations == ''){
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again6','class'=>'error'));
				redirect(base_url('jobs/add-job-offer'));
			}
		}
		if (!($d1 && $d1->format('Y-m-d') === $startDate)){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again7','class'=>'error'));
			redirect(base_url('jobs/add-job-offer'));
		}
		if ($startDate < $today){
			$this->session->set_flashdata('message', array('content'=>'Job Start Date has already passed. Please Try Again','class'=>'error'));
			redirect(base_url('jobs/add-job-offer'));
		}
		if (!($d2 && $d2->format('Y-m-d') === $applicationDeadline)){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again8','class'=>'error'));
			redirect(base_url('jobs/add-job-offer'));
		}
		if ($applicationDeadline < $today){
			$this->session->set_flashdata('message', array('content'=>'Job Application Date has already passed. Please Try Again','class'=>'error'));
			redirect(base_url('jobs/add-job-offer'));
		}
		if ($applicationDeadline > $startDate){
			$this->session->set_flashdata('message', array('content'=>'Job Start Date cannot be before the Internship Application Deadline. Please Try Again','class'=>'error'));
			redirect(base_url('jobs/add-job-offer'));
		}

		if($jobID = $this->home_lib->addJob($data)){
			if ($selected_skills!=''){
				$skillIDs = [];
				$i=0;
				$selected_skills = json_decode($selected_skills,true);
				foreach ($selected_skills as $key => $value) {
					array_push($skillIDs,['skillID'=>$value,'jobID'=>$jobID]);
				}
				$try=[];
				foreach ($skillIDs as $key => $value){
					array_push($try,['skillID'=>$value['skillID']['skillID'],'jobID'=>$jobID]);}
					$this->load->model('home_model','homeModel');
					if (!$this->homeModel->map_job_skills($try)){
						$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again9','class'=>'error'));
						redirect(base_url('jobs/add-job-offer'));
					}
				}
				if ($selected_locations!=''){
					$locationIDs = [];
					$i=0;
					$selected_locations = json_decode($selected_locations,true);
					foreach ($selected_locations as $key => $value){
					array_push($locationIDs,['cityID'=>$value,'jobID'=>$jobID]);
					}
					$try=[];
					foreach ($locationIDs as $key => $value){
						array_push($try,['cityID'=>$value['cityID']['location_id'],'jobID'=>$jobID]);}
						$this->load->model('home_model','homeModel');
						if (!$this->homeModel->map_job_locations($try)){
							$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again10','class'=>'error'));
							redirect(base_url('jobs/add-job-offer'));
						}
					}
			$this->session->set_flashdata('message', array('content'=>'Job Offer Successfully Added.','class'=>'success'));
			redirect(base_url('jobs/add-job-offer'));
			}
	}

}
