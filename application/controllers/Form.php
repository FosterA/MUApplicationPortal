<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nation', 'nation', 'required');
		$this->form_validation->set_rules('degree', 'degree', 'required');
	if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header.php');
   			$this->load->view('application/status');
   			$this->load->view('templates/footer.php');
		}
  		else
		{
   			$data['nation']=$this->input->post('nation');
   			$data['degree']=$this->input->post('degree');
   			$this->load->model("test_model","test");
			$data['course']=$this->test->showDept();
			foreach($data['course'] as $value){
				$dept=$value['deptment'];
				$data[$dept]=$this->test->showCourse($dept);
			}
			$this->load->view('templates/header.php');
			$this->load->view('application/form',$data);
			$this->load->view('templates/footer.php');
		}
	}
	
	public function interUnder(){
		
		$this->load->model('form_model','form');
		$this->form->interUnder();
		//Redirect to Welcome.php controller and home method
			redirect('welcome/home');
	}
	public function interGra(){
		$this->load->model('form_model','form');
		$this->form->interGra();
		//Redirect to Welcome.php controller and home method
			redirect('welcome/home');
	}
	public function natUnder(){
		$this->load->model('form_model','form');
		$this->form->natUnder();
		//Redirect to Welcome.php controller and home method
			redirect('welcome/home');
	}
	public function natGra(){
		$this->load->model('form_model','form');
		$this->form->natGra();
		//Redirect to Welcome.php controller and home method
			redirect('welcome/home');
	}
}
