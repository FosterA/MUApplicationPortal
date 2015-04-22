<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	/*public function index()
	{

	}*/

	public function setwindows(){
	

		$this->load->library('form_validation');

		//Validation rules
		$this->form_validation->set_rules('season', 'Season', 'required');
		$this->form_validation->set_rules('year', 'Year', 'required');
		$this->form_validation->set_rules('appfrom', 'Application Submittal Start Date', 'required');
		$this->form_validation->set_rules('appto', 'Applicaiton Submittal End Date', 'required');
		$this->form_validation->set_rules('commentfrom', 'Comments Start Date', 'required');
		$this->form_validation->set_rules('commentto', 'Comments End Date', 'required');

		if($this->form_validation->run() == FALSE)
		{
 	   		$data['user'] = ucfirst($this->session->userdata('user'));
			$this->load->view('templates/header');
			$this->load->view('admin_home', $data);
			$this->load->view('templates/footer');
		}

		else{
			$this->load->model('admin_model');
	   		$bol=$this->admin_model->insert($_POST);
	   			
			if($bol){
				$data['confirm'] = "The action window dates have been set.";
				$data['user'] = ucfirst($this->session->userdata('user'));
				$this->load->view('templates/header');
				$this->load->view('admin_home',$data);
				$this->load->view('templates/footer');
			}	
		}
	}
}
?>