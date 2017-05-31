<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employers extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->helper(array('url'));
			$this->load->library(array('Employer_lib', 'session'));
			$this->data = array();
			// $this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','color'=>'');
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
		if($applicants == '1' || $applicants == '2')){
			$selected_skills = '';
			$selected_skills = ($this->input->post('selected_skills')!='')?$this->input->post('selected_skills'):'';
		}
		if($internshipType == '2')){
			$selected_locations = '';
			$selected_locations = ($this->input->post('selected_locations')!='')?$this->input->post('selected_locations'):'';
		}
		$data = array(
			'internshipOfferTitle' => $internshipOfferTitle,
			'internshipOfferDescription' => $internshipOfferDescription,
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
		var_dump("ab");
		die;
	}

}
