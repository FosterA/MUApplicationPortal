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
			$sql='select * from status limit ?,?';
			$res=$this->db->query($sql,$data);
			return $res;
		}
	}
?>