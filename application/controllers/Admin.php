<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function index(){
		if (!isset($_SESSION['logged_in'])){
			$this->load->view('register');
		}

		$data=$this->pageData();
		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin_home', $data);
		$this->load->view('templates/footer');
	}

	public function pageData(){
		//Load tables library
		$this->load->library('table');

		// Query the database and get results
		$data['windows'] = $this->db->get('windows');
		
		// Create custom headers
		$header = array('Semester', 'Begin Accepting Applications', 'End Accepting Applications', 'Open Comment Period', 'Close Comment Period');
		
		// Set the headings
		$this->table->set_heading($header);

		//Get the admin's profession and username
		$data['title'] = ucfirst($this->session->userdata('profession') . ' ' . 'Home');
		$data['user'] = ucfirst($this->session->userdata('user'));

		return $data;
	}

	//Controller method for handling submissions to change windows table
	public function setwindows(){

		$this->load->library('form_validation');
		
		//Validation rules, all fields must be filled
		$this->form_validation->set_rules('season', 'Season', 'trim|required');
		$this->form_validation->set_rules('year', 'Year', 'trim|required');
		$this->form_validation->set_rules('appfrom', 'Application Submittal Start Date', 'trim|required');
		$this->form_validation->set_rules('appto', 'Applicaiton Submittal End Date', 'trim|required');
		$this->form_validation->set_rules('commentfrom', 'Comments Start Date', 'trim|required');
		$this->form_validation->set_rules('commentto', 'Comments End Date', 'trim|required');

		//Check to see if form was completed properly, and return to page if not
		if($this->form_validation->run() == FALSE)
		{
			$data=$this->pageData();
			$this->load->view('templates/header', $data);
			$this->load->view('admin_home', $data);
			$this->load->view('templates/footer');
		}

		//If form was completed properly
		else
		{

			$this->load->model('administration_model');

			//Check to see if dates have already been set for the selected semester
			$checkSemester=$this->administration_model->checkSet($_POST);

			//If dates were already set, update the dates in the windows table and assign feedback
			if ($checkSemester)
			{
				$bol=$this->administration_model->updateDates($_POST);
				if($bol){
					$data=$this->pageData();
					$data['confirm'] = "The action window dates have been updated.";		
				}
			}	

			//If dates have not been set yet, insert data into windows table and assign feedback
			else
			{
	   			$bol=$this->administration_model->insert($_POST);
	   			if($bol){
	   				$data=$this->pageData();
	   				$data['confirm'] = "The action window dates have been set.";
	   			}	
	   		}

	   		//If table was changed properly, display confirmation feedback
			if($bol)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('admin_home', $data);
				$this->load->view('templates/footer');
			}

			//If table was not successfully changed, display error message
			else
			{
				$data=$this->pageData();
				$data['error'] = "Unable to set window dates.";
				$this->load->view('templates/header', $data);
				$this->load->view('admin_home', $data);
				$this->load->view('templates/footer');
			}

		}
	}
}
?>