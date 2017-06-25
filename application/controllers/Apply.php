<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->helper(array('url'));
			$this->load->library(array('Home_lib', 'session'));
			$this->data = array();
			$this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','class'=>'');
	}

	public function apply(){
		$jobID = '';
		$internshipID = '';
		$jobID = $this->input->get('jobID');
		$internshipID= $this->input->get('internshipID');
		if($jobID==''){
			$this->applyForOffer($_SESSION['userData']['userID'], '2', $internshipID);
		}
		else{
			$this->applyForOffer($_SESSION['userData']['userID'], '1', $jobID);
		}
	}

	public function applyForOffer($userID, $offerType, $offerID){
		if($offerType=='1'){
			$jobData = $this->home_lib->getJobData($offerID);
			$jobData = $jobData[0];
			$jobSkillsRequired = $jobData['skillIDsRequired'];
			$jobSkillsRequired = explode(',', $jobSkillsRequired);
			$jobskill = 0 ;
			foreach ($jobSkillsRequired as $key => $value) {
				$jobskill ++ ;
			}
			if($jobData['applicants']=='1' || $jobData['applicants']=='2'){
				$checkSkillMatch = $this->checkSkillMatch($offerType, $offerID);
				if($checkSkillMatch){
						if($jobData['applicants']=='1' && $checkSkillMatch==$jobskill){
							$apply = $this->home_lib->apply($offerType, $offerID, $userID);
							if($apply){
								$this->session->set_flashdata('message', array('content'=>'You have successfully Applied.','class'=>'success'));
								redirect(base_url('jobs/job-offers'));
							}
							else{
								$this->session->set_flashdata('message', array('content'=>'Something Went Wrong. Please Try Again.','class'=>'error'));
								redirect(base_url('jobs/job-offers'));
							}
						}
						if($jobData['applicants']=='2'){
							$apply = $this->home_lib->apply($offerType, $offerID, $userID);
							if($apply){
								$this->session->set_flashdata('message', array('content'=>'You have successfully Applied.','class'=>'success'));
								redirect(base_url('jobs/job-offers'));
							}
							else{
								$this->session->set_flashdata('message', array('content'=>'Something Went Wrong. Please Try Again.','class'=>'error'));
								redirect(base_url('jobs/job-offers'));
							}
						}
						else{
							$this->session->set_flashdata('message', array('content'=>'Something Went Wrong. Please Try Again.','class'=>'error'));
							redirect(base_url('jobs/job-offers'));
						}
				}
				else{
					$this->session->set_flashdata('message', array('content'=>'Something Went Wrong. Please Try Again.','class'=>'error'));
					redirect(base_url('internships/internship-offers'));
				}
			}
			else{
				$apply = $this->home_lib->apply($offerType, $offerID, $userID);
				if($apply){
					$this->session->set_flashdata('message', array('content'=>'You have successfully Applied.','class'=>'success'));
					redirect(base_url('jobs/job-offers'));
				}
				else{
					$this->session->set_flashdata('message', array('content'=>'Something Went Wrong. Please Try Again.','class'=>'error'));
					redirect(base_url('jobs/job-offers'));
				}
			}
		}
		if($offerType=='2'){
			$internshipData = $this->home_lib->getInternshipData($offerID);
			$internshipData = $internshipData[0];
			$internshipSkillsRequired = $internshipData['skillIDsRequired'];
			$internshipSkillsRequired = explode(',', $internshipSkillsRequired);
			$internshipskill = 0 ;
			foreach ($internshipSkillsRequired as $key => $value) {
				$internshipskill ++ ;
			}
			if($internshipData['applicants']=='1' || $internshipData['applicants']=='2'){
				$checkSkillMatch = $this->checkSkillMatch($offerType, $offerID);
				if($checkSkillMatch){
						if($internshipData['applicants']=='1' && $checkSkillMatch==$jobskill){
							$apply = $this->home_lib->apply($offerType, $offerID, $userID);
							if($apply){
								$this->session->set_flashdata('message', array('content'=>'You have successfully Applied.','class'=>'success'));
								redirect(base_url('internships/internship-offers'));
							}
							else{
								$this->session->set_flashdata('message', array('content'=>'Something Went Wrong. Please Try Again.','class'=>'error'));
								redirect(base_url('internships/internship-offers'));
							}
						}
						if($internshipData['applicants']=='2'){
							$apply = $this->home_lib->apply($offerType, $offerID, $userID);
							if($apply){
								$this->session->set_flashdata('message', array('content'=>'You have successfully Applied.','class'=>'success'));
								redirect(base_url('internships/internship-offers'));
							}
							else{
								$this->session->set_flashdata('message', array('content'=>'Something Went Wrong. Please Try Again.','class'=>'error'));
								redirect(base_url('internships/internship-offers'));
							}
						}
						else{
							$this->session->set_flashdata('message', array('content'=>'Something Went Wrong. Please Try Again.','class'=>'error'));
							redirect(base_url('internships/internship-offers'));
						}
				}
				else{
					$this->session->set_flashdata('message', array('content'=>'Something Went Wrong. Please Try Again.','class'=>'error'));
					redirect(base_url('internships/internship-offers'));
				}
			}
			else{
				$apply = $this->home_lib->apply($offerType, $offerID, $userID);
				if($apply){
					$this->session->set_flashdata('message', array('content'=>'You have successfully Applied.','class'=>'success'));
					redirect(base_url('internships/internship-offers'));
				}
				else{
					$this->session->set_flashdata('message', array('content'=>'Something Went Wrong. Please Try Again.','class'=>'error'));
					redirect(base_url('internships/internship-offers'));
				}
			}
		}
	}

	public function checkSkillMatch($offerType, $offerID){
		$userID = $_SESSION['userData']['userID'];
		if($offerType=='1'){
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
		return ($skillCount);
		}
		if($offerType=='2'){
			$internshipData = $this->home_lib->getInternshipData($offerID);
			$internshipData = $internshipData[0];
			$internshipSkillsRequired = $internshipData['skillIDsRequired'];
			$internshipSkillsRequired = explode(',', $internshipSkillsRequired);
			$userSkills = $this->home_lib->getUserSkills($userID);
			$skillCount = 0;
			foreach ($userSkills as $key => $value) {
				if(in_array($value['skillID'], $internshipSkillsRequired)){
					$skillCount++;
				}
			}
		return ($skillCount);
		}
	}


}
