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
		public function getStatus($offset,$per_page){
			$data[0]=$offset;
			$data[1]=$per_page;
			$sql='select * from statusname limit ?,?';
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
					$sql="select * from interUnder where student_id=?";
					$res=$this->db->query($sql,$id);
					$data['res']=$res->result_array();
				}else{
					$sql="select * from interGra where student_id=?";
					$res=$this->db->query($sql,$id);
					$data['res']=$res->result_array();
				}
			}else{
				if($degree=='undergraduate'){
					$sql="select * from nativeUnder where student_id=?";
					$res=$this->db->query($sql,$id);
					$data['res']=$res->result_array();
				}else{
					$sql="select * from nativeGra where student_id=?";
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
	}
?>