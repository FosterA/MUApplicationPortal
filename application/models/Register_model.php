<?php
	class Register_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
			$this->db->query("use test");
		}

		public function validate(){
			$profession = $this->input->post('profession');

			if ($profession == 'admin'){
				$this->db->where('admin_id', $this->input->post('username'));
				$this->db->where('password', md5($this->input->post('password')));
				$query = $this->db->get('admin');
			}
			else if ($profession == 'instructor'){
				$this->db->where('instructor_id', $this->input->post('username'));
				$this->db->where('password', md5($this->input->post('password')));
				$query = $this->db->get('instructor');	
			}
			else{
				$this->db->where('student_id', $this->input->post('username'));
				$this->db->where('password', md5($this->input->post('password')));
				$query = $this->db->get('student');
			}

			if ($query->num_rows() == 1){
				return true;
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