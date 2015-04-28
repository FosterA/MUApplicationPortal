<?php
class Register extends CI_Controller {
 
	public function index(){
		//Load registration/signin page
		$this->load->view('templates/header_main');
		$this->load->view('register');
	}

	//Method to call the function to validate login credentials and set session data
	public function validate_credentials(){
		$this->load->model('register_model');
		$query = $this->register_model->validate();

		if ($query){
			$profession = null;
            $sql = 'SELECT * FROM student WHERE student_id=? AND password=md5(?)';
            $data[0]=$this->input->post('username');
            $data[1]=$this->input->post('password');
            $res=$this->db->query($sql,$data);
           if($res->num_rows()==1){
              $profession='student';
           }
           else {
              $sql = 'SELECT * FROM instructor WHERE faculty_id=? AND password=md5(?)';
              $res2=$this->db->query($sql,$data);
              if($res2->num_rows()==1){
                $profession='instructor';
              }
              else{
                $sql = 'SELECT * FROM admin WHERE admin_id=? AND password=md5(?)';
                $res3 = $this->db->query($sql,$data);
                if($res3->num_rows()==1){
                   $profession='admin';
                }
          	   }
          	}
			$data = array(
				'user' => $this->input->post('username'),
				'profession' => $this->input->post('profession'),
				'logged_in' => TRUE
			);

			$this->session->set_userdata($data);

			$page_data = array(
				'title' => ucfirst($this->session->userdata('profession') . ' ' . 'Home'),
				'user' => ucfirst($this->session->userdata('user'))
			);
			

			//Redirect to Welcome.php controller and home method
			redirect('welcome/home');
		}

		else{
			//echo "asdffasdfsdfad";
			$data['error']="Sorry, your username or password is incorrect.";
			$this->load->view('templates/header');
			$this->load->view('register',$data);
		}
	}

	public function add_student(){
		$this->load->library('form_validation');

		//Validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[128]|callback_username_check');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[128]|matches[passconf]|callback_password_check');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header_main');
 	   		$this->load->view('register');
		}
  	
  		else
		{
   			$this->load->model('register_model');
   			$user=$this->input->post('username');
   			$bol=$this->register_model->insert($_POST);
   			
   			if($bol){
   				$this->session->set_userdata('logged_in', TRUE);
 				$this->session->set_userdata('user',$user);
 				$this->session->set_userdata('profession','student');
 				$data['confirm']="Registration sucessful, Please login.";
 				$this->load->view('templates/header_main');
				$this->load->view('register',$data);
				
			}
		}
	}

	public function logout(){
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('profession');
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		$this->index();
	}

	public function username_check($str){
		if (0){
			$this->form_validation->set_message('username_check', 'The %s field can not be ...');
			return FALSE;
		}

		else{
			return TRUE;
		}
	}

	public function password_check($str){
		if (0){
			$this->form_validation->set_message('username_check', 'The %s field can not be ...');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	public function checkUnique(){
	 	$username=$this->input->post('username');
	 	$this->load->model('register_model');
	 	echo $this->register_model->ajxCheck($username);
	 }

 	public function student(){
 		$this->validate_credentials();
 	}

 	public function instructor(){
 		$this->validate_credentials();
 	}

 	public function admin(){
 		$this->validate_credentials();
 	}

}
?>