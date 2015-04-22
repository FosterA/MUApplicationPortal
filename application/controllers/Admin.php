<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function setwindows(){

		$this->load->library('form_validation');

		//Validation rules
		$this->form_validation->set_rules('season', 'Season', 'trim|required');
		$this->form_validation->set_rules('year', 'Year', 'trim|required');
		$this->form_validation->set_rules('appfrom', 'Application Submittal Start Date', 'trim|required');
		$this->form_validation->set_rules('appto', 'Applicaiton Submittal End Date', 'trim|required');
		$this->form_validation->set_rules('commentfrom', 'Comments Start Date', 'trim|required');
		$this->form_validation->set_rules('commentto', 'Comments End Date', 'trim|required');

		if($this->form_validation->run() == FALSE)
		{
 	   		$data['user'] = ucfirst($this->session->userdata('user'));
			$this->load->view('templates/header');
			$this->load->view('admin_home', $data);
			$this->load->view('templates/footer');
		}

		else
		{

			$this->load->model('administration_model');

			$checkSemester=$this->administration_model->checkSet($_POST);

			if ($checkSemester)
			{
				$bol=$this->administration_model->updateDates($_POST);
				if($bol){
					$data['confirm'] = "The action window dates have been updated.";		
				}
			}	
			else
			{
	   			$bol=$this->administration_model->insert($_POST);
	   			if($bol){
	   				$data['confirm'] = "The action window dates have been set.";
	   			}	
	   		}

			if($bol)
			{
				$data['user'] = ucfirst($this->session->userdata('user'));
				$this->load->view('templates/header');
				$this->load->view('admin_home',$data);
				$this->load->view('templates/footer');
			}
			else
			{
				$data['user'] = ucfirst($this->session->userdata('user'));
				$data['error'] = "Unable to set window dates.";
				$this->load->view('templates/header');
				$this->load->view('admin_home',$data);
				$this->load->view('templates/footer');
			}

		}
	}
}
?>