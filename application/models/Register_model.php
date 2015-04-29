<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Register_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
			$this->db->query("use applicationportal");
		}

		//Method to check if the entered login credentials exist in the database.
		public function validate(){
			//Checks through each user table to see if the user exists. If the user and password is correct, then the 
			//corresponding profession is returned. If the user and password are incorrect, then the function returns false.
			$profession = null;
            $sql = 'SELECT * FROM student WHERE student_id=? and password=md5(?)';
            $data[0]=$this->input->post('username');
            $data[1]=$this->input->post('password');
            $res=$this->db->query($sql,$data);
            //Checks for a student account with the given username and password. If so, it returns a student account.
           if($res->num_rows()==1){
              return 'student';
           }
           else if($res->num_rows()==0){
              $sql = 'SELECT * FROM instructor WHERE faculty_id=? and password=md5(?)';
              $res2=$this->db->query($sql,$data);
              //Checks for an instructor account. If so, returns an instructor account.
              if($res2->num_rows()==1){
              	return 'instructor';
              }
              else
                $sql = 'SELECT * FROM admin WHERE admin_id=? and password=md5(?)';
                $res3 = $this->db->query($sql,$data);
                //Checks for an admin account. If so, returns admin account.
                if($res3->num_rows()==1){
                  return 'admin';
                }
          	}
          	//If no results are returned from the student, instructor, or admin table, then no accounts were logged in.
          	else{
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
			$sql="SELECT * FROM student WHERE student_id=?";
			$data[0]=$id;
			$res=$this->db->query($sql,$data);
			//If the user exists in the student table, returns to indicate the username is used.
			if($res->num_rows()!=0){
				return $res->num_rows();
			}
			$sql="SELECT * FROM instructor WHERE faculty_id=?";
			$res2=$this->db->query($sql,$data);
			//If the user exists in the instructor table, returns to indicate the username is used.
			if($res2->num_rows()!=0){
				return $res2->num_rows();
			}
			$sql = "SELECT * from admin WHERE admin_id=?";
			$res3=$this->db->query($sql,$data);
			//If the user exists in the admin table, returns to indicate the username is used.
			if($res3->num_rows()!=0){
				return $res3->num_rows();
			}
			//If the user does not exist in any table, then zero is returned indicating that the username is unique.
			return 0;
		}	
	}
?>