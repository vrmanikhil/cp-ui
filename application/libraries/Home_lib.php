<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_lib {

	public function getLocations(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getLocations();
	}

}
