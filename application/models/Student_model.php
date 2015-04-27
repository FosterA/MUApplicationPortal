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
		$lower = strtolower($user);
		$data[0]=$lower;

		$sql = "SELECT * FROM app WHERE student_id = ?";
		$sqlAgree = "SELECT * FROM agree WHERE student_id = ?";
		$sqlDisagree = "SELECT * FROM disagree WHERE student_id = ?";
		
		$valid = $this->db->query($sql,$data);
		$agree = $this->db->query($sqlAgree,$data);
		$disagree = $this->db->query($sqlDisagree,$data);

		if($valid->num_rows()==0 && $agree->num_rows()==0 && $disagree->num_rows()==0){
			return false;
		}
		else{
			return true;
		}
	}

	public function checkAppStatus($user){
		$sql = "SELECT * FROM app WHERE student_id = ?";
		$sqlAgree = "SELECT courseName FROM agree WHERE student_id = ?";
		$sqlDisagree = "SELECT * FROM disagree WHERE student_id = ?";
	
		$lower = strtolower($user);
		$data[0]=$lower;

		$submitted = $this->db->query($sql,$data);
		$agree = $this->db->query($sqlAgree,$data);
		$disagree = $this->db->query($sqlDisagree,$data);

		if ($submitted->num_rows()==1){
			return "Your application has been received and has yet to be reviewed.";
		}
		else if ($agree->num_rows()==1){
			$result = $agree->row();		
			$status = "Congratulations, you have been accepted as a TA or PLA for " . strval($result->courseName);
			return $status;
		}
		else if ($disagree->num_rows()==1){
			$status = "Sorry, you were not accepted as a TA or PLA";
			return $status;
		}
		else{
			return "Sorry, your application cannot be found, please contact your advisor";
		}
	}
}
?>	