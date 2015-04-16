<?php
	class Page_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
			//$this->db->query("use test");
		}
		public function getRows(){
			$sql='select * from test';
			$res=$this->db->query($sql);
			return $res->num_rows();
		}
		public function getField(){
			$sql="desc test";
			$res=$this->db->query($sql);
			$arr=$res->result_array();
			$i=0;
			foreach($arr as $data){
				$field[$i++]=$data['Field'];
			}
			return $field;
		}
		public function getContent($offset,$per_page){
			$sql="select * from test limit ?,?";
			$data[0]=$offset;
			$data[1]=$per_page;
			$res=$this->db->query($sql,$data);
			return $res->result_array();
		}
	}
?>