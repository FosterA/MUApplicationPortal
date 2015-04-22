<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Admin_model extends CI_Model{
		
		public function __construct(){
			parent::__construct();
			$this->load->database();
			$this->db->query("use applicationportal");
		}

		public function insert($array){
			$sql="insert into windows values(?,?,?,?,?)";
			$data[0]=$array['season'] . ' ' . $array['year'];
			$data[1]=$array['appfrom'];
			$data[2]=$array['appto'];
			$data[3]=$array['commentfrom'];
			$data[4]=$array['commentto'];
			$bol=$this->db->query($sql,$data);
			if($bol)
				return true;
		}
		
	}
?>	