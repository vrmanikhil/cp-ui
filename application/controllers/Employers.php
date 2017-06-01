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
			'internshipType' => $internshipType
		);

		if($internshipOfferTitle == '' || $internshipOfferDescription == '' || $openings == '' || $partTime == '' || $startDate == '' || $applicationDeadline == '' $durationType == '' || $stipendType == '' || $applicants == '' || $internshipType == ''){
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
		if (!($d && $d->format('Y-m-d') === $startDate)){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('internships/add-internship-offer'));
		}
		if ($startDate < $today){
			$this->session->set_flashdata('message', array('content'=>'Internship Start Date has already passed. Please Try Again','class'=>'error'));
			redirect(base_url());
		}
		if (!($d && $d->format('Y-m-d') === $applicationDeadline)){
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
			$this->session->set_flashdata('message', array('content'=>'Internship Successfully Added.','class'=>'success'));
			redirect(base_url('internships/add-internship-offer'));
			}
	}

}
