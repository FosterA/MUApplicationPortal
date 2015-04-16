<?php
class Register extends CI_Controller {
 
	public function index()
	{
		//Load registration/signin page
		$this->load->view('register');
	}

	public function validate_credentials(){
		$this->load->model('register_model');
		$query = $this->register_model->validate();

		if ($query){
			$data = array(
				'username' => $this->input->post('username'),
				'profession' => $this->input->post('profession'),
				'logged_in' => TRUE
			);	
			$this->session->set_userdata($data);
			$this->load->view('homepage');
		}
		else{
			$data['error']="sorry you username or password is wrong";
			$this->load->view('register',$data);
		}
	}

	public function add_student()
	{
		$this->load->library('form_validation');

		//Validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[128]|callback_username_check');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[128]|matches[passconf]|callback_password_check');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	
		if($this->form_validation->run() == FALSE)
		{
 	   		$this->load->view('register');
		}
  	
  		else
		{
   			$this->load->model('register_model');
   			$user=$this->input->post('username');
   			$bol=$this->register_model->insert($_POST);
   			
   			if($bol){
   				$this->load->library('session');
 				$this->session->set_userdata('user',$user);
 				$this->session->set_userdata('profession','student');
 				$this->load->view('registersuccess');
			}
		}
	}
public function username_check($str)
{
	if (0)
	{
		$this->form_validation->set_message('username_check', 'The %s field can not be ...');
		return FALSE;
	}
	else
	{
	return TRUE;
	}
}
public function password_check($str)
	{
	if (0)
	{
		$this->form_validation->set_message('username_check', 'The %s field can not be ...');
		return FALSE;
	}
	else
	{
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