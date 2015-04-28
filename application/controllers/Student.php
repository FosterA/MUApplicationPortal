<?php
class Student extends CI_Controller {

	public function index(){
		if (!isset($_SESSION['logged_in'])){
			redirect('register');
		}
		//Get the student's profession and username
		$data['title'] = ucfirst($this->session->userdata('profession') . ' ' . 'Home');
		$data['user'] = ucfirst($this->session->userdata('user'));

		$this->load->model('student_model');
		$data['existingApp'] = $this->student_model->checkForApp($data['user']);
		$data['window'] = $this->student_model->checkWindow();

		$data['windowStatus'] = $this->student_model->getWindowStatus();


		$this->load->view('templates/header', $data);
		$this->load->view('student_home', $data);
		$this->load->view('templates/footer');
	}

	public function appStatus(){
		if (!isset($_SESSION['logged_in'])){
			redirect('register');
		}
		$data['user'] = ucfirst($this->session->userdata('user'));

		$this->load->model('student_model');
		$data['status'] = $this->student_model->checkAppStatus($data['user']);
		$this->load->view('templates/header');
		$this->load->view('application_status', $data);
		$this->load->view('templates/footer');	
	
	}
	
}
?>