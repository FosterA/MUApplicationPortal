<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Student_model extends CI_Model{

	//Establlish database connection
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db->query("use applicationportal");
	}

	public function checkForApp($user){
		$sql = "SELECT * FROM app WHERE student_id = ?";
		$lower = strtolower($user);
		$data[0]=$lower;
		$valid = $this->db->query($sql,$data);

		if($valid->num_rows()==0){
			return false;
		}
		else{
			return true;
		}
	}
}
?>	