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
			$sql = "SELECT * FROM windows";
			$result = $this->db->query($sql);
			$row = $result->row();
				$semester = $row->semester;
				$appOpen = $row->appOpen;
				$appClose = $row->appClose;
				$commentOpen = $row->commentOpen;
				$commentClose = $row->commentClose;
			$message = "The comment period is not open yet.";
			$nowQuery = ($this->db->query("SELECT curdate() as now"));
			$nowrow= $nowQuery->row();
			$now = $nowrow->now;
			if($appOpen>$now){
				$message = $message.nl2br("\r\n");
				$message = $message.nl2br("\nThe application period will open on ".strval($appOpen)." and close on ".$appClose.".");
			}
			else if($appClose>$now){
				$message = $message.nl2br("\r\n");
				$message = $message.nl2br("\nThe application period will close on ".strval($appClose).".");
			}

			if($commentOpen>$now){
				$message = $message.nl2br("\r\n");
				$message = $message.nl2br("\nThe comment period will open on ".strval($commentOpen)." and close on ".$commentClose.".");
			}
			else if($commentClose>$now){
				$message = $message.nl2br("\r\n");
				$message = $message.nl2br("\nThe comment period will close on ".strval($commentClose).".");
			}
			return $message;
		}
	}
}
?>