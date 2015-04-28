<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Teacher_model extends CI_Model{

	//Establish database connection
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db->query("use applicationportal");
	}

	public function checkWindow(){
		$sql = "SELECT * FROM windows WHERE commentOpen <= now() AND commentClose >= now()";
		$result = $this->db->query($sql);

		if($result->num_rows() == 0){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	public function getWindowStatus(){
		$window = $this->checkWindow();
		if ($window){
			$sql = "SELECT * FROM windows WHERE commentOpen <= now() AND commentClose >= now()";
			$result = $this->db->query($sql);
			$row = $result->row();

			$message = "The comment period for " . strval($row->semester) . " is open until " . strval($row->appClose);
			return $message;
		}
		
		else{
			return "The comment period is not open yet. Check back soon.";
		}
	}
}
?>