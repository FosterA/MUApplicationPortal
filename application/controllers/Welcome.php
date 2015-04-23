<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()
	{
		redirect('welcome/home');
	}

	public function home(){
		if (!isset($_SESSION['logged_in'])){
			$this->load->view('register');
		}			

		$page_data = array(
			'title' => ucfirst($this->session->userdata('profession') . ' ' . 'Home'),
			'user' => ucfirst($this->session->userdata('user'))
		);

		if ($this->session->userdata('profession') == 'student'){
			$this->load->model('register_model');
			$page_data['existingApp'] = $this->register_model->checkForApp($page_data['user']);
			$this->load->view('templates/header', $page_data);
			$this->load->view('student_home', $page_data);
			$this->load->view('templates/footer');
		}
		else if ($this->session->userdata('profession') == 'instructor'){
			$this->load->view('templates/header', $page_data);
			$this->load->view('instructor_home', $page_data);
			$this->load->view('templates/footer');
		}
		else if ($this->session->userdata('profession') == 'admin'){
			redirect('admin');
		}
		else{
			show_404();
		}
	}
}
