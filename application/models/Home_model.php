<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function login($email,$password)
	{
		$result = $this->db->get_where('users', array('email' => $email,'password' => $password), 1, 0);
		if ($result->num_rows()>0) {
			return true;
		}
		return false;
	}

	public function getUserDetailsFromEMail($email){

		$result = $this->db->get_where('users', array('email' => $email));
		$data = $result->result_array();
		$accountType = $data[0]['accountType'];
		if($accountType=='1'){
			$this->db->join('generalUsers', 'users.userID = generalUsers.userID');
			$this->db->join('colleges', 'generalUsers.collegeID = colleges.college_id');
			$query = $this->db->get_where('users', array('email' => $email));
			return $query->result_array();
		}
		else{
			$this->db->join('employerUsers', 'users.userID = employerUsers.userID');
			$query = $this->db->get_where('users', array('email' => $email));
			return $query->result_array();
		}
	}
	public function checkToken($email, $tokenType){
		$result = $this->db->get_where('passwordToken', array('tokenType' => $tokenType, 'email' => $email));
		return $result->result_array();
	}

	public function getLocations(){
		$result = $this->db->get('indianCities');
		return $result->result_array();
	}

	public function getSkills(){
		$result = $this->db->get_where('skills', array('active' => '1'));
		return $result->result_array();
	}

	public function get_skill_data($skill_id)
	{
		$this->db->select('*');
		$this->db->where('skillID', $skill_id);
		return $this->db->get('skills')->result_array();
	}

	public function fetch_test_settings()
	{
		$this->db->select('*');
		$result = $this->db->get_where('testSettings');
		return $result->result_array()[0];
	}

	public function fetch_questions($num_ques, $skill_id)
	{
		$this->db->select('question_id, question, option1, option2, option3, option4');
		$this->db->order_by('question_id', 'RANDOM');
		$this->db->limit($num_ques);
		$result = $this->db->get_where('questions', ['skillID'=> $skill_id, 'active'=> '1']);
		return $result->result_array();
	}

	public function getConnections($userID){
		$result = $this->db->get_where('connections', array('active' => $userID));
		// $this->db->join('comments', 'comments.id = blogs.id');
		return $result->result_array();
	}

	public function addInternship($data){
		$this->db->insert('internshipOffers', $data);
		return ($this->db->affected_rows()>0)?$this->db->insert_id():0;
	}

	public function insertPasswordToken($data){
		return $this->db->insert('passwordToken', $data);
	}

	public function map_intern_locations($data){
		return $this->db->insert_batch('internshipLocations', $data);
	}

	public function map_intern_skills($data){
		return $this->db->insert_batch('internshipSkills', $data);
	}

	public function getAddedJobOffers(){
		$addedBy = $_SESSION['userData']['userID'];
		$this->db->join('jobSkills', 'jobOffers.jobID = jobSkills.jobID');
		$this->db->join('skills', 'jobSkills.skillID = skills.skillID');
		$this->db->select('jobOffers.jobTitle, jobOffers.addedBy, jobOffers. jobID, GROUP_CONCAT(jobSkills.skillID) as skillIDsRequired, GROUP_CONCAT(skills.skill_name) as skillsRequired');
		$this->db->group_by('jobOffers.jobID');
		$this->db->order_by('jobOffers.jobID', 'DESC');
		$result = $this->db->get_where('jobOffers', array('addedBy' => $addedBy));
		return $result->result_array();
	}

	public function addJob($data){
		$this->db->insert('jobOffers', $data);
		return ($this->db->affected_rows()>0)?$this->db->insert_id():0;
	}

	public function map_job_locations($data){
		return $this->db->insert_batch('jobLocations', $data);
	}

	public function map_job_skills($data){
		return $this->db->insert_batch('jobSkills', $data);
	}

	public function deleteInternship($internshipID){
		return $this->db->delete('internshipOffers', array('internshipID' => $internshipID));
	}

	public function getJobOffers($relevant){
		if($relevant == 0){
			$result = $this->db->get('jobOffers');
			return $result->result_array();
		}
		else{
			echo "its 1";
		}
	}

	public function addWorkEx($data){
		return $this->db->insert('workExperience', $data);
	}

	public function addProject($data){
		return $this->db->insert('projects', $data);
	}

	public function register($data){
		return $this->db->insert('users', $data);
	}

	public function addAchievement($data){
		return $this->db->insert('achievements', $data);
	}

	public function getUserDetails($username){
		$result = $this->db->get_where('users', array('username' => $username), '1');
		return $result->result_array();
	}

	public function getUserProjects($userID){
		$result = $this->db->get_where('projects', array('userID' => $userID));
		return $result->result_array();
	}

	public function getUserWorkEx($userID){
		$result = $this->db->get_where('workExperience', array('userID' => $userID));
		return $result->result_array();
	}

	public function getUserAchievements($userID){
		$result = $this->db->get_where('achievements', array('userID' => $userID));
		return $result->result_array();
	}

	public function getUserSkills($userID){
		$result = $this->db->get_where('userSkills', array('userID' => $userID));
		return $result->result_array();
	}

	public function getColleges(){
		$result = $this->db->get_where('colleges', array('active' => '1'));
		return $result->result_array();
	}

	public function getCourses(){
		$result = $this->db->get_where('courses', array('active' => '1'));
		return $result->result_array();
	}

	public function checkEMailExist($email){
		$this->db->where('email', $email);
		$result = $this->db->get('users');
		if ($result->num_rows() > 0) {
			return 1;
		}
		else{
			return 0;
		}
	}

	public function checkMobileExist($mobile){
		$this->db->where('mobile', $mobile);
		$result = $this->db->get('users');
		if ($result->num_rows() > 0) {
			return 1;
		}
		else{
			return 0;
		}
	}

	public function checkPasswordMatch($email, $password){
		$result = $this->db->get_where('users', array('email' => $email,'password' => $password), 1, 0);
		if ($result->num_rows()>0) {
			return true;
		}
		return false;
	}

	public function changePassword($email, $password){
		$query = "UPDATE users SET password='$password' WHERE email='$email'";
		return $this->db->query($query);
	}

	public function getJobData($jobID){
		$this->db->join('employerUsers', 'jobOffers.addedBy = employerUsers.userID');
		$result = $this->db->get_where('jobOffers', array('jobID' => $jobID));
		return $result->result_array();
	}

	public function getInternshipData($internshipID){
		$this->db->join('employerUsers', 'internshipOffers.addedBy = employerUsers.userID');
		$result = $this->db->get_where('internshipOffers', array('internshipID' => $internshipID));
		return $result->result_array();
	}

}
