<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()
	{
		$this->home();
	}

	public function home(){
		if (!isset($_SESSION['logged_in'])){
			$this->index();
		}			

		$page_data = array(
			'title' => ucfirst($this->session->userdata('profession') . ' ' . 'Home'),
			'user' => ucfirst($this->session->userdata('user'))
		);

		$this->load->view('templates/header', $page_data);

		if ($this->session->userdata('profession') == 'student'){
			$this->load->view('student_home', $page_data);
		}
		else if ($this->session->userdata('profession') == 'instructor'){
			$this->load->view('instructor_home', $page_data);
		}
		else if ($this->session->userdata('profession') == 'admin'){
			$this->load->view('admin_home', $page_data);
		}
		else{
			show_404();
		}
		
		$this->load->view('templates/footer');
	}
}
