<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()
	{
		redirect('welcome/home');
	}

	public function home(){
		if (!isset($_SESSION['logged_in'])){
			redirect('register');
		}			

		$page_data = array(
			'title' => ucfirst($this->session->userdata('profession') . ' ' . 'Home'),
			'user' => ucfirst($this->session->userdata('user'))
		);

		if ($this->session->userdata('profession') == 'student'){
			redirect('student');
		}
		else if ($this->session->userdata('profession') == 'instructor'){
			$this->load->view('templates/header_instructor', $page_data);
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
