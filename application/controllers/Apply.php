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
		if($_SESSION['userData']['accountType']=='2'){
			redirect(base_url());
		}
		$checkAlreadyApplied = $this->home_lib->checkAlreadyApplied($userID, $offerType, $offerID);
		if($checkAlreadyApplied){
			$this->session->set_flashdata('message', array('content'=>'Sorry, you have Already Applied.','class'=>'error'));
			if($offerType=='1'){
			redirect(base_url('jobs/job-offers'));
			}
			if($offerType=='2'){
			redirect(base_url('internships/internship-offers'));
			}
		}
		else{
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
								$this->home_lib->triggerApplyNotification($jobData['addedBy'], $userID, $offerType, $offerID, $jobData['jobTitle']);
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
								$this->home_lib->triggerApplyNotification($jobData['addedBy'], $userID, $offerType, $offerID, $jobData['jobTitle']);
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
					$this->session->set_flashdata('message', array('content'=>'It seems you do not have enough skills to apply for the Job Offer.','class'=>'error'));
					redirect(base_url('internships/internship-offers'));
				}
			}
			else{
				$apply = $this->home_lib->apply($offerType, $offerID, $userID);
				if($apply){
					$this->home_lib->triggerApplyNotification($jobData['addedBy'], $userID, $offerType, $offerID, $jobData['jobTitle']);
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
								$this->home_lib->triggerApplyNotification($internshipData['addedBy'], $userID, $offerType, $offerID, $internshipData['internshipTitle']);
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
								$this->home_lib->triggerApplyNotification($internshipData['addedBy'], $userID, $offerType, $offerID, $internshipData['internshipTitle']);
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
					$this->session->set_flashdata('message', array('content'=>'It seems you do not have enough skills to apply for the Internship Offer.','class'=>'error'));
					redirect(base_url('internships/internship-offers'));
				}
			}
			else{
				$apply = $this->home_lib->apply($offerType, $offerID, $userID);
				if($apply){
					$this->home_lib->triggerApplyNotification($internshipData['addedBy'], $userID, $offerType, $offerID, $internshipData['internshipTitle']);
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

	public function changeApplicantStatus($applicantID, $offerType, $offerID, $status){
		$applicant = $this->home_lib->checkApplicant($applicantID, $offerType, $offerID);
		if(empty($applicant)){
			$this->session->set_flashdata('message', array('content'=>'Something Went Wrong. Please Try Again.','class'=>'error'));
			redirect(base_url('applicants/'.$offerType.'/'.$offerID));
		}
		else{
			$applicantStatus = $applicant[0]['status'];
			if($applicantStatus == $status){
				$this->session->set_flashdata('message', array('content'=>'Something Went Wrong. Please Try Again.','class'=>'error'));
				redirect(base_url('applicants/'.$offerType.'/'.$offerID));
			}
			if($applicantStatus == '2'){
				$this->session->set_flashdata('message', array('content'=>'Something Went Wrong. Please Try Again.','class'=>'error'));
				redirect(base_url('applicants/'.$offerType.'/'.$offerID));
			}
			if(($applicantStatus=='1'||$applicantStatus=='3') && ($status=='2' || $status == '4' || $status == '3')){
				$result = $this->home_lib->changeApplicantStatus($applicantID, $offerType, $offerID, $status);
				if($result){
					if($offerType=='1'){
						$notificationType = '3';
					}
					else{
						$notificationType = '4';
					}
					$this->home_lib->triggerNotification($applicantID, $notificationType, $_SESSION['userData']['userID']);
					$applicantEMail = $this->home_lib->getUserDetails($applicantID)[0]['email'];
					$this->statusChangeEMail($applicantEMail,$offerType, $offerID);
					$this->session->set_flashdata('message', array('content'=>'Applicant Status successfully Changed.','class'=>'success'));
					redirect(base_url('applicants/'.$offerType.'/'.$offerID));
				}
				else{
					$this->session->set_flashdata('message', array('content'=>'Something Went Wrong. Please Try Again.','class'=>'error'));
					redirect(base_url('applicants/'.$offerType.'/'.$offerID));
				}
			}
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
