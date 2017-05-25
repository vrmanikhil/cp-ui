<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getLocations(){
		$result = $this->db->get('indianCities');
		return $result->result_array();
	}

	public function getSkills(){
		$result = $this->db->get_where('skills', array('active' => '1'));
		return $result->result_array();
	}

	public function getConnections($userID){
		$result = $this->db->get_where('connections', array('active' => $userID));
		// $this->db->join('comments', 'comments.id = blogs.id');
		return $result->result_array();
	}

}
