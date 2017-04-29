<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->helper(array('url'));
			// $this->load->library(array('Data_lib', 'session'));
			$this->data = array();
			// $this->data['csrf_token_name'] = $this->security->get_csrf_token_name();
			// $this->data['csrf_token'] = $this->security->get_csrf_hash();
			$this->data['header'] = $this->load->view('commonCode/header', $this->data, true);
			$this->data['footer'] = $this->load->view('commonCode/footer', $this->data, true);
			$this->data['activeUserLeft'] = $this->load->view('commonCode/activeUserLeft', $this->data, true);
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

	public function changePassword(){
		$this->load->view('changePassword', $this->data);
	}

	public function aboutUs(){
		$this->load->view('aboutUs', $this->data);
	}

	public function userProfile(){
		$this->load->view('userProfile', $this->data);
	}

	public function addJobOffer(){
		$this->load->view('addJobOffer', $this->data);
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
