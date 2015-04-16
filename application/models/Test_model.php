<?php
	class Test_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
			//$this->db->query("use test");
		}
		public function insert($array){
			$sql="insert into user values(?,?,?,?)";
			$data[0]=$array['username'];
			$data[1]=md5($array['password']);
			$data[2]=$array['email'];
			$data[3]=$array['nation'];
			$bol=$this->db->query($sql,$data);
			if($bol)
				echo "successs";
		}
		public function showDept(){
			$sql="select distinct deptment from course";
			$res=$this->db->query($sql);
			$array=$res->result_array();
			return $array;
		}
		public function showCourse($dept){
			$sql="select courseName from course where deptment=?";
			$data[0]=$dept;
			$res=$this->db->query($sql,$data);
			$array=$res->result_array();
			return $array;
		}
		public function ajxCheck($id){
			$sql="select * from user where student_id=?";
			$data[0]=$id;
			$res=$this->db->query($sql,$data);
			return $res->num_rows();
		}
	}
?>