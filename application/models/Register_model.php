<?php
	class Register_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
			//$this->db->query("use test");
		}

		public function validate(){
			$profession = $this->input->post('profession');

			if ($profession == 'admin'){
				$sql='select * from admin where admin_id=? and password=md5(?)';
				$data[0]=$this->input->post('username');
				$data[1]=$this->input->post('password');
				$res=$this->db->query($sql,$data);
			}
			else if ($profession == 'instructor'){
				$sql='select * from instructor where faculty_id=? and password=md5(?)';
				$data[0]=$this->input->post('username');
				$data[1]=$this->input->post('password');
				$res=$this->db->query($sql,$data);
			}
			else{
				$sql='select * from student where student_id=? and password=md5(?)';
				$data[0]=$this->input->post('username');
				$data[1]=$this->input->post('password');
				$res=$this->db->query($sql,$data);
			}

			if ($res->num_rows() == 1){
				return true;
			}else{
				return false;
			}
		}

		public function insert($array){
			$sql="insert into student values(?,?,?)";
			$data[0]=$array['username'];
			$data[1]=md5($array['password']);
			$data[2]=$array['email'];
			$bol=$this->db->query($sql,$data);
			if($bol)
				return true;
		}

		public function showData(){
			$sql="selelct * from student";
			$res=$this->db->query($sql);
			$array=$res->result_array();
			return $array;
		}

		public function ajxCheck($id){
			$sql="select * from student where student_id=?";
			$data[0]=$id;
			$res=$this->db->query($sql,$data);
			return $res->num_rows();
		}
	}
?>