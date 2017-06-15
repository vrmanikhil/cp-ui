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

	public function apply($offerType='', $offerID='', $userID=''){
		if($offerType=='1'){
			$offerData = $this->home_lib->getJobData($offerID);
			$offerData = $offerData[0];
			$skillsRequired = $offerData['skillIDsRequired'];
			$userSkills = $this->home_lib->getUserSkills($userID);
			$userSkills = $userSkills[0]['userSkillIDs'];
			$userSkillsArray = explode(",",$skillsRequired);

			if($offerData['active']=='1'){
				var_dump($offerData[0]);die;
			}
			else{
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url('jobs/job-offers'));
			}
		}
	}

	public function test(){
		$this->apply('1','3','1');
	}

}
