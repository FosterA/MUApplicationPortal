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

		if (!$query){
			$data['error']="Sorry, your username or password is incorrect.";
			$this->load->view('templates/header_main');
			$this->load->view('register',$data);
		}
		else{
			$data = array(
				'user' => $this->input->post('username'),
				'profession' => $query,
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
   			if($this->register_model->ajxCheck($user)==0){
   				$bol=$this->register_model->insert($_POST);
   			}
   			else{
				$bol=FALSE;
   			}
   			
   			if($bol){
   				$this->session->set_userdata('logged_in', TRUE);
 				$this->session->set_userdata('user',$user);
 				$this->session->set_userdata('profession','student');
 				$data['confirm']="Registration sucessful, Please login.";
 				$this->load->view('templates/header_main');
				$this->load->view('register',$data);
				
			}
			else{
				$data['error']="Registration failed. Please try again.";
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
	 	$chk = $this->register_model->ajxCheck($username);
	 	if($this->register_model->ajxCheck($username) !=0){
	 		echo "Username is already in use.";
	 	}
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