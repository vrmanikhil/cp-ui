<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->helper(array('url'));
			$this->load->library(array('Home_lib', 'session'));
			$this->data = array();
			// $this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','color'=>'');
	}

	public function changePassword(){
		$currentPassword = '';
		$newPassword = '';
		$confirmNewPassword = '';

		if($x = $this->input->post('currentPassword')){
			$currentPassword = $x;
		}
		if($x = $this->input->post('newPassword')){
			$newPassword = $x;
		}
		if($x = $this->input->post('confirmNewPassword')){
			$confirmNewPassword = $x;
		}
		if($newPassword === $confirmNewPassword){
			echo "yahan sab karenge";
		}
	}

	public function addWorkEx(){
		$companyName = '';
		$position = '';
		$description = '';
		$startMonth = '';
		$startYear = '';
		$endMonth = '';
		$endYear = '';
		$userID = '';
		if($x = $this->input->post('companyName')){
			$companyName = $x;
		}
		if($x = $this->input->post('position')){
			$position = $x;
		}
		if($x = $this->input->post('description')){
			$description = $x;
		}
		if($x = $this->input->post('startMonth')){
			$startMonth = $x;
		}
		if($x = $this->input->post('startYear')){
			$startYear = $x;
		}
		if($x = $this->input->post('endMonth')){
			$endMonth = $x;
		}
		if($x = $this->input->post('endYear')){
			$endYear = $x;
		}
		$data = array(
			'companyName' => $companyName,
			'position' => $position,
			'description' => $description,
			'startMonth' => $startMonth,
			'startYear' => $startYear,
			'endMonth' => $endMonth,
			'endYear' => $endYear,
			'userID' =>$userID
		);
		if($companyName==''||$position==''||$description==''||$startMonth==''||$startYear==''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url());
		}
		else{
			$result = $this->home_lib->addWorkEx($data);
			if($result){
				$this->session->set_flashdata('message', array('content'=>'Work Experience successfully Added.','class'=>'success'));
				redirect(base_url());
			}
			else{
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url());
			}
		}
	}

	public function addAchievement(){
		$achievementTitle = '';
		$achievementDescription = '';
		$userID = '';
		if($x = $this->input->post('achievementTitle')){
			$achievementTitle = $x;
		}
		if($x = $this->input->post('achievementDescription')){
			$achievementDescription = $x;
		}
		$data = array(
			'achievementTitle' => $achievementTitle,
			'achievementDescription' => $achievementDescription,
			'userID' =>$userID
		);
		if($achievementTitle==''||$achievementDescription==''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url());
		}
		else{
			$result = $this->home_lib->addAchievement($data);
			if($result){
				$this->session->set_flashdata('message', array('content'=>'Achievement successfully Added.','class'=>'success'));
				redirect(base_url());
			}
			else{
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url());
			}
		}
	}

	public function addProject(){
		$projectTitle = '';
		$projectLink = '';
		$projectDescription = '';
		$userID = '';
		if($x = $this->input->post('projectTitle')){
			$projectTitle = $x;
		}
		if($x = $this->input->post('projectLink')){
			$projectLink = $x;
		}
		if($x = $this->input->post('projectDescription')){
			$projectDescription = $x;
		}
		$data = array(
			'projectTitle' => $projectTitle,
			'projectLink' => $projectLink,
			'projectDescription' => $projectDescription,
			'userID' =>$userID
		);
		if($projectTitle==''||$projectDescription==''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url());
		}
		else{
			$result = $this->home_lib->addProject($data);
			if($result){
				$this->session->set_flashdata('message', array('content'=>'Achievement successfully Added.','class'=>'success'));
				redirect(base_url());
			}
			else{
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url());
			}
		}
	}

}
