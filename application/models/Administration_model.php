<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Administration_model extends CI_Model{

	//Establlish database connection
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db->query("use applicationportal");
	}

	//Method to check if the window dates have already been set for a semester
	public function checkSet($array){
		$sql="select * from windows where semester=?";
		$data[0]=$array['season'] . ' ' . $array['year'];
		$res=$this->db->query($sql,$data);

		if ($res->num_rows() >= 1){
			return true;
		}else{
			return false;
		}
	}

	//Method to update window dates in the windows table for a given semester if they have already been set
	public function updateDates($array){
		$sql="UPDATE windows SET appOpen=?, appClose=?, commentOpen=?, commentClose=? WHERE semester=?";
		$data[0]=$array['appfrom'];
		$data[1]=$array['appto'];
		$data[2]=$array['commentfrom'];
		$data[3]=$array['commentto'];
		$data[4]=$array['season'] . ' ' . $array['year'];
		$bol=$this->db->query($sql,$data);
		if($bol)
			return true;
	}			

	//Method to insert window dates into the windows table for a given semester
	public function insert($array){
		$sql="INSERT into windows values(?,?,?,?,?)";
		$data[0]=$array['season'] . ' ' . $array['year'];
		$data[1]=$array['appfrom'];
		$data[2]=$array['appto'];
		$data[3]=$array['commentfrom'];
		$data[4]=$array['commentto'];
		$bol=$this->db->query($sql,$data);
		if($bol)
			return true;
	}

	public function addnew($array){
		//$profession = $this->input->post('profession');
		$profession = $array['profession'];
		$bol=null;
		if($profession=='instructor'){
			$sql="INSERT INTO instructor VALUES(?,?,?)";
			$data[0]=$array['username'];
			$data[1]=md5($array['password']);
			$data[2]=$array['email'];
			$bol=$this->db->query($sql,$data);
			if($bol){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			$sql="INSERT INTO admin VALUES(?,?,?)";
			$data[0]=$array['username'];
			$data[1]=md5($array['password']);
			$data[2]=$array['email'];
			$bol=$this->db->query($sql,$data);
			if($bol){
				return true;
			}
			else{
					return false;
			}
		}
	}

	public function sendEmail($user,$subject,$message){
					$this->load->helper('url');
					$this->load->helper('email');
					$this->load->library('email');
		$config['protocol']='smtp';
		$config['smtp_host']='ssl://smtp.gmail.com';
		$config['smtp_port']='465';
		$config['smtp_timeout']='7';
		$config['smtp_user']='taappSWE15@gmail.com';
		$config['smtp_pass']='taappSWE';
		$config['charset']='utf-8';
		$config['newline']="\r\n";
		$config['mailtype'] = 'text';
		$config['validation']=TRUE;
		$this->email->initialize($config);
					$sql = 'SELECT email FROM student WHERE student_id=?';
					$data[0] = $user;
					$emailQuery = $this->db->query($sql,$data);
					$email=null;
					foreach($emailQuery->result() as $row){
						$email = $row->email;
					}
					$this->email->from('taappswe15@gmail.com');
					$this->email->to($email);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					$this->email->print_debugger();
	}
}
?>	