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
			// $this->data['foot'] = $this->load->view('backoffice/common/foot', $this->data, true);
			// $this->data['navigation'] = $this->load->view('backoffice/common/navigation', $this->data, true);
			// $this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','color'=>'');
			// $this->data['navigation'] =  $this->load->view('common/navigation',$this->data,true);
	}

	public function index()
	{
		$this->load->view('home', $this->data);
	}

	//Job Offers- Normal Users

	public function relevantJobs(){
		$this->load->view('relevantJobs', $this->data);
	}

	public function jobOffers(){
		$this->load->view('jobOffers', $this->data);
	}

	public function appliedJobOffers(){
		$this->load->view('appliedJobOffers', $this->data);
	}

	//Internship Offers- Normal Users

	public function relevantInternships(){
		$this->load->view('relevantInternships', $this->data);
	}

	public function internshipOffers(){
		$this->load->view('internshipOffers', $this->data);
	}

	public function appliedInternshipOffers(){
		$this->load->view('appliedInternshipOffers', $this->data);
	}

	//

	public function changePassword(){
		$this->load->view('changePassword', $this->data);
	}

	public function aboutUs(){
		$this->load->view('aboutUs', $this->data);
	}

	public function termsAndConditions(){
		$this->load->view('termsAndConditions', $this->data);
	}

	public function privacyPolicy(){
		$this->load->view('privacyPolicy', $this->data);
	}

	public function coat(){
		$this->load->view('coat', $this->data);
	}

	public function contactUs(){
		$this->load->view('contactUs', $this->data);
	}

	public function addJobOffer(){
		$this->data['locations'] = $this->home_lib->getLocations();
		$this->load->view('addJobOffer', $this->data);
	}

	public function addedJobOffers(){
		$this->load->view('addedJobOffers', $this->data);
	}

	public function addInternshipOffer(){
		$this->data['locations'] = $this->home_lib->getLocations();
		$this->load->view('addInternshipOffer', $this->data);
	}

	public function addedInternshipOffers(){
		$this->load->view('addedInternshipOffers', $this->data);
	}

	public function notifications(){
		$this->load->view('notifications', $this->data);
	}

	public function messages(){
		$this->load->view('messages', $this->data);
	}

	public function skillTest(){
		$this->load->view('skillTest', $this->data);
	}

	public function skillTestGuidelines(){
		$this->load->view('skillTestGuidelines', $this->data);
	}

	// public function sendEMail(){
	// 	$this->load->helper('mail_helper');
	// 	$email = 'itishrisingh@campuspuppy.com';
	// 	$message =  $this->load->view('emailers/forgotPassword',$data,true);
	// 	$data = array(
	// 			'sendToEmail' => $email,
	// 			'fromName' => 'CampusPuppy Private Limited',
	// 			'fromEmail' => 'no-reply@campuspuppy.com',
	// 			'subject' => 'Welcome to CampusPuppy.com',
	// 			'message' => $message,
	// 			'using' =>'pepipost'
	// 			);
	// 	sendEmail($data);
	// }


}
