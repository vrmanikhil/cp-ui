<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connections extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->helper(array('url'));
			$this->load->library(array('Home_lib', 'session'));
			$this->data = array();
			$this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','class'=>'');
	}

	public function removeConnection($user1, $user2){
		if($user1==$user2){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('user-profile/').$user1);
		}
		if($this->checkConnectionExist($user1, $user2)){
			$result = $this->home_lib->removeConnection($user1, $user2);
			if($result){
				$this->session->set_flashdata('message', array('content'=>'Connection Successfully Removed.','class'=>'success'));
				redirect(base_url('user-profile/').$user1);
			}
			else{
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url('user-profile/').$user1);
			}
			}
		else{
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('user-profile/').$user1);
		}
	}

	public function requestConnection($user1, $user2){
		if($user1==$user2){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('user-profile/').$user1);
		}
		if($this->checkConnectionExist($user1, $user2)){
			$this->session->set_flashdata('message', array('content'=>'You are Already Connected.','class'=>'error'));
			redirect(base_url('user-profile/').$user1);
		}
		else{
			$data = array(
				'active' => $user2,
				'passive' => $user1,
				'status' => '0'
			);
			$result = $this->home_lib->requestConnection($data);
			if($result){
				$this->home_lib->triggerNotification($user1,"1",$user2);
				$this->session->set_flashdata('message', array('content'=>'Connection Request Successfully Sent.','class'=>'success'));
				redirect(base_url('user-profile/').$user1);
			}
			else{
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url('user-profile/').$user1);
			}
		}
	}

	public function cancelConnectionRequest($user1, $user2){
		if($user1==$user2){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('user-profile/').$user1);
		}
		if(!$this->checkConnectionExist($user1, $user2)){
			$result = $this->home_lib->cancelConnectionRequest($user1, $user2);
			if($result){
				$this->session->set_flashdata('message', array('content'=>'Connection Request Successfully Cancelled.','class'=>'success'));
				redirect(base_url('user-profile/').$user1);
			}
			else{
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url('user-profile/').$user1);
			}
			}
		else{
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('user-profile/').$user1);
		}
	}

	public function acceptConnectionRequest($user1, $user2){
		if($user1==$user2){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
			redirect(base_url('user-profile/').$user1);
		}
		if($this->checkConnectionExist($user1, $user2)){
			$this->session->set_flashdata('message', array('content'=>'You are Already Connected.','class'=>'error'));
			redirect(base_url('user-profile/').$user1);
		}
		else{
			$result = $this->home_lib->acceptConnectionRequest($user1, $user2);
			if($result){
				$this->home_lib->triggerNotification($user1,"2",$user2);
				$this->session->set_flashdata('message', array('content'=>'Connection Request Successfully Sent.','class'=>'success'));
				redirect(base_url('user-profile/').$user1);
			}
			else{
				$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again','class'=>'error'));
				redirect(base_url('user-profile/').$user1);
			}
		}
	}

	public function checkConnectionExist($user1, $user2){
		$result = $this->home_lib->checkConnectionExist($user1,$user2);
		$result = $result[0]['count'];
		if($result=='1'){
			return true;
		}
		else{
			return false;
		}
	}

}
