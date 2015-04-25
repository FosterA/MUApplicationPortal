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
}
?>	