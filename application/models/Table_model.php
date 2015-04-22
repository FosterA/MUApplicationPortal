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
			$sql="select nation,degree from status where student_id=?";
			$data['student_id']=$id;
			$res=$this->db->query($sql,$id);
			$array=$res->result_array();
			$nation=$array[0]['nation'];
			$degree=$array[0]['degree'];
			if($nation=='international'){
				if($degree=='undergraduate'){
					$sql="select * from interunder where student_id=?";
					$res=$this->db->query($sql,$id);
					$data['res']=$res->result_array();
				}else{
					$sql="select * from intergra where student_id=?";
					$res=$this->db->query($sql,$id);
					$data['res']=$res->result_array();
				}
			}else{
				if($degree=='undergraduate'){
					$sql="select * from nativeunder where student_id=?";
					$res=$this->db->query($sql,$id);
					$data['res']=$res->result_array();
				}else{
					$sql="select * from nativegra where student_id=?";
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
	}
?>