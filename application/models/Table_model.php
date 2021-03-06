<?php
	class Table_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
			$this->db->query("use applicationportal");
		}
		public function getStatusRow(){
			$sql="select * from status";
			$res=$this->db->query($sql);
			return $res->num_rows();
		}
		public function getStatus(){
			$sql='select * from statusname';
			$res=$this->db->query($sql);
			return $res;
		}
		public function getRow($id){
			$sql='select * from app where student_id=?';
			$data[0]=$id;
			$res=$this->db->query($sql,$data);
			return $res->num_rows();
		}
		//
		public function getCommentRow($id){
			$sql='select * from comment where student_id=?';
			$data[0]=$id;
			$res=$this->db->query($sql,$data);
			return $res->num_rows();
		}
		
		public function getComment($id){
			$sql='select faculty_id,comment from comment where student_id=?';
			$data[0]=$id;
			$res=$this->db->query($sql,$data);
			return $res;
		}
		
		public function getInfor($id){
			$sql="select nation,Degrees from status where student_id=?";
			$data['student_id']=$id;
			$res=$this->db->query($sql,$id);
			$array=$res->result_array();
			$nation=$array[0]['nation'];
			$degree=$array[0]['Degrees'];
			if($nation=='international'){
				if($degree=='undergraduate'){
					$sql="select student_id AS 'Student ID', nation AS 'Nation Status', Degrees AS 'Student Type', firstName AS 'First Name', lastName AS 'Last Name', gpa, phoneNumber AS 'Phone Number', email, graduateDate AS 'Graduation Date', workPlace AS 'Other Workplace', program AS 'Field', level AS 'Year', semester AS 'SPEAK Semester', score AS 'SPEAK Score' from interUnder where student_id=?";
					$res=$this->db->query($sql,$id);
					$data['res']=$res->result_array();
				}else{
					$sql="select student_id AS 'Student ID', nation AS 'Nation Status', Degrees AS 'Student Type', firstName AS 'First Name', lastName AS 'Last Name', gpa, phoneNumber AS 'Phone Number', email, graduateDate AS 'Graduation Date', workPlace AS 'Other Workplace', degree AS 'Degree', advisename AS 'Advisor Name', semester AS 'SPEAK Semester', score AS 'SPEAK Score' from interGra where student_id=?";
					$res=$this->db->query($sql,$id);
					$data['res']=$res->result_array();
				}
			}else{
				if($degree=='undergraduate'){
					$sql="select student_id AS 'Student ID', nation AS 'Nation Status', Degrees AS 'Student Type', firstName AS 'First Name', lastName AS 'Last Name', gpa, phoneNumber AS 'Phone Number', email, graduateDate AS 'Graduation Date', workPlace AS 'Other Workplace', program AS 'Field', level AS 'Year' from nativeUnder where student_id=?";
					$res=$this->db->query($sql,$id);
					$data['res']=$res->result_array();
				}else{
					$sql="select student_id AS 'Student ID', nation AS 'Nation Status', Degrees AS 'Student Type', firstName AS 'First Name', lastName AS 'Last Name', gpa, phoneNumber AS 'Phone Number', email, graduateDate AS 'Graduation Date', workPlace AS 'Other Workplace', degree AS 'Degree Type', advisename AS 'Advisor Name' from nativeGra where student_id=?";
					$res=$this->db->query($sql,$id);
					$data['res']=$res->result_array();
				}
			}
			$sql="select * from curTeach where student_id=?";
			$res=$this->db->query($sql,$id);
			$data['curTeach']=$res->result_array();
			$sql="select * from preTeach where student_id=?";
			$res=$this->db->query($sql,$id);
			$data['preTeach']=$res->result_array();
			$sql="select * from likeTeach where student_id=?";
			$res=$this->db->query($sql,$id);
			$data['likeTeach']=$res->result_array();
			return $data;
		}
		
		public function addStudent(){
			$data[0]=$this->input->post('student_id');
			$data[1]=$this->input->post('likeTeach');
			$sql1="delete from app where student_id='$data[0]'";
			$sql2="insert into agree values(?,?)";
			$this->db->trans_start();
			$b1=$this->db->query($sql1);
			$b2=$this->db->query($sql2,$data);
			$this->db->trans_complete();
			return $b1&&$b2;
		}
		
		public function denyStudent(){
			$data[0]=$this->input->post('student_id');
			$sql1="delete from app where student_id='$data[0]'";
			$sql2="insert into disagree values(?)";
			$this->db->trans_start();
			$b1=$this->db->query($sql1);
			$b2=$this->db->query($sql2,$data);
			$this->db->trans_complete();
			return $b1&&$b2;
		}
		public function allScore(){
			$sql="select TA_id,student_id,courseName,score from evaluation";
			return $this->db->query($sql);
		}
		public function avgScore(){
			$sql="select TA_id,courseName,avg(score) as avg_score from evaluation group by TA_id,courseName";
			return $this->db->query($sql);
		}
		public function Accept(){
			$sql="select student_id,courseName as TeachCourse,firstName,lastName from agree natural join preapp";
			return $this->db->query($sql);
		}
		public function Deny(){
			$sql="select student_id,firstName,lastName from disagree natural join preapp";
			return $this->db->query($sql);
		}
		public function getAllStudent(){
			$sql="select student_id,firstName,lastName from allapp";
			$res=$this->db->query($sql);
			return $res;
		}
		public function write($data){
			$sql="insert into comment values(?,?,now(),?)";
			$bool=$this->db->query($sql,$data);
			return $sql;
		}
		
		public function getCommentRow1($data){
			$sql='select * from comment where student_id=? and faculty_id=?';
			$res=$this->db->query($sql,$data);
			return $res->num_rows();
		}
		
		public function getComment1($data){
			$sql='select time,comment from comment where student_id=? and faculty_id=?';
			$res=$this->db->query($sql,$data);
			return $res;
		}
		public function showcourse(){
			$sql='select deptment as department,courseName from course';
			$res=$this->db->query($sql);
			return $res;
		}
		public function addCourse(){
		$data[0]=$this->input->post('course');
		$data[1]=$this->input->post('dept');
		$sql="insert into course values(?,?)";
		return $this->db->query($sql,$data);
		}

		public function rankScore($id,$admin){
			$sql="select score from ranking where admin_id=? and student_id=?";
			$data[0]=$admin;
			$data[1]=$id;
			$res=$this->db->query($sql,$data);
			if($res->num_rows()>0){
				$arr=$res->row_array();
				return $arr['score'];
			}else{
				return 0;
			}
		}
		public function putScore($data){
			$sql="insert into ranking values(?,?,?)";
			return $this->db->query($sql,$data);
		}
		public function rankScore1(){
			$sql="select * from ranking";
			return $this->db->query($sql);
		}
	}
?>