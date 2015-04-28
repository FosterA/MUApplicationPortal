<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {
	
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
	public function __construct(){
		parent::__construct();
		if (!isset($_SESSION['logged_in'])||$this->session->userdata('profession')!='instructor'){
			redirect('register');
		}
	}

	public function home(){
		if (!isset($_SESSION['logged_in'])||$this->session->userdata('profession')!='instructor'){
			redirect('register');
		}
		//Get the teacher's profession and username
		$data['title'] = ucfirst($this->session->userdata('profession') . ' ' . 'Home');
		$data['user'] = ucfirst($this->session->userdata('user'));

		$this->load->model('teacher_model');
		$data['window'] = $this->teacher_model->checkWindow();
		$data['message'] = $this->teacher_model->getWindowStatus();


		$this->load->view('templates/header_instructor', $data);
		$this->load->view('instructor_home', $data);
		$this->load->view('templates/footer');
	}
	

	public function index($result=NULL)
	{
		$this->load->model('teacher_model');
		$check=$this->teacher_model->checkWindow();

		if($check){

			if(isset($result)){
				$data['result']=$result;
			}
			$this->load->library(array('table','pagination'));
			$this->load->model('table_model');
			$this->load->helper('url');
			$id=$this->session->userdata('user');
			$url=base_url('images/user.gif');
			$tmpl = array (
	                    'table_open'          => '<table id="myTable">',

	                    'heading_row_start'   => '<tr><th type="string">image</th>',
	                    'heading_row_end'     => '<th>View comment</th><th>Write comment</th></tr>',
	                    'heading_cell_start'  => '<th type="string"><span>',
	                    'heading_cell_end'    => '</span></th>',

	                    'row_start'           => "<tr><td><image src='$url'></td>",
	                    'row_end'             => '<td><button class="view" type="button">view</button></td><td><button class="write" type="button">write</button></td></tr>',
	                    'cell_start'          => '<td>',
	                    'cell_end'            => '</td>',

	                    'row_alt_start'       => "<tr><td><image src='$url'></td>",
	                    'row_alt_end'         => '<td><button class="view" type="button">view</button></td><td><button class="write" type="button">write</button></tr>',
	                    'cell_alt_start'      => '<td>',
	                    'cell_alt_end'        => '</td>',

	                    'table_close'         => '</table>'
	              );
			$this->table->set_template($tmpl);
			$data['table']=$this->table->generate($this->table_model->getAllStudent());
			$this->load->view('teacher',$data);
		}
		else{
			redirect('teacher/home');
		}
	}

	
	
	
	
	public function general(){
	$this->load->library(array('table','pagination'));
		$this->load->model('table_model');
		$this->load->helper('url');
		$url=base_url('images/user.gif');
		$tmpl = array (
                    'table_open'          => '<table id="myTable">',

                    'heading_row_start'   => '<tr><th type="string">image</th>',
                    'heading_row_end'     => '<th>Details</th><th>Comment</th></tr>',
                    'heading_cell_start'  => '<th type="string"><span>',
                    'heading_cell_end'    => '</span></th>',

                    'row_start'           => "<tr><td><image src='$url'></td>",
                    'row_end'             => '<td><button class="detail" type="button">detail</button></td><td><button class="comment" type="button">comment</button></td></tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => "<tr><td><image src='$url'></td>",
                    'row_alt_end'         => '<td><button class="detail" type="button">detail</button></td><td><button class="comment" type="button">comment</button></tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );
		$this->table->set_template($tmpl);
		$data['table']=$this->table->generate($this->table_model->getStatus());
		$json=json_encode($data);
		echo $json;
	}
	
	public function avgScore(){
		
		$this->load->library('table');
		$this->load->model('table_model');
		$this->load->helper('url');
		$url=base_url('images/user.gif');
		$result=$this->table_model->avgScore();
		$tmpl = array (
                    'table_open'          => '<table id="myTable">',

                    'heading_row_start'   => '<tr><th type="string">image</th>',
                    'heading_row_end'     => '<th type="string">Details</th></tr>',
                    'heading_cell_start'  => '<th type="string"><span>',
                    'heading_cell_end'    => '</span></th>',

                    'row_start'           => "<tr><td><image src='$url'></td>",
                    'row_end'             => '<td><button class="detail" type="button">detail</button></td></tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => "<tr><td><image src='$url'></td>",
                    'row_alt_end'         => '<td><button class="detail" type="button">detail</button></td></tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );
		$this->table->set_template($tmpl);
		$data['table']=$this->table->generate($result);
		$json=json_encode($data);
		echo $json;
	}
	public function allScore(){
		$this->load->library('table');
		$this->load->model('table_model');
		$this->load->helper('url');
		$url=base_url('images/user.gif');
		$result=$this->table_model->allScore();
		$tmpl = array (
                    'table_open'          => '<table id="myTable">',

                    'heading_row_start'   => '<tr><th type="string">image</th>',
                    'heading_row_end'     => '<th type="string">Details</th></tr>',
                    'heading_cell_start'  => '<th type="string"><span>',
                    'heading_cell_end'    => '</span></th>',

                    'row_start'           => "<tr><td><image src='$url'></td>",
                    'row_end'             => '<td><button class="detail" type="button">detail</button></td></tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => "<tr><td><image src='$url'></td>",
                    'row_alt_end'         => '<td><button class="detail" type="button">detail</button></td></tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );
		$this->table->set_template($tmpl);
		$data['table']=$this->table->generate($result);
		$json=json_encode($data);
		echo $json;
	}
	public function Accept(){
		$this->load->library('table');
		$this->load->model('table_model');
		$this->load->helper('url');
		$url=base_url('images/user.gif');
		$result=$this->table_model->Accept();
		$tmpl = array (
                    'table_open'          => '<table id="myTable">',

                    'heading_row_start'   => '<tr><th type="string">image</th>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th><span>',
                    'heading_cell_end'    => '</span></th>',

                    'row_start'           => "<tr><td><image src='$url'></td>",
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => "<tr><td><image src='$url'></td>",
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );
		$this->table->set_template($tmpl);
		$data['table']=$this->table->generate($result);
		$json=json_encode($data);
		echo $json;
	}
	public function Deny(){
		$this->load->library('table');
		$this->load->model('table_model');
		$this->load->helper('url');
		$url=base_url('images/user.gif');
		$result=$this->table_model->Deny();
		$tmpl = array (
                    'table_open'          => '<table id="myTable">',

                    'heading_row_start'   => '<tr><th type="string">image</th>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th><span>',
                    'heading_cell_end'    => '</span></th>',

                    'row_start'           => "<tr><td><image src='$url'></td>",
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => "<tr><td><image src='$url'></td>",
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );
		$this->table->set_template($tmpl);
		$data['table']=$this->table->generate($result);
		$json=json_encode($data);
		echo $json;
	}
	
	public function view(){
		$this->load->library('table');
		$this->load->model("table_model");
		$data[0]=$this->uri->segment('3');
		$data[1]=$this->session->userdata('user');
		$bool=$this->table_model->getCommentRow1($data);
		if($bool){
		$result=$this->table_model->getComment1($data);
		$tmpl = array (
                    'table_open'          => '<table id="myTable">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<td>',
                    'heading_cell_end'    => '</td>',

                    'row_start'           => "<tr>",
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => "<tr>",
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

		$this->table->set_template($tmpl);
		$app=$this->table->generate($result);
		//$app="<div id='comment'>".$app."</div>";
		echo $app;
	}else{
		echo "<div id='noComment'>There isn't any comment about this student.<div>";
	}
}
	public function create(){
	 	$id=$this->uri->segment('3');
	 	$this->load->helper('url');
	 	$url=base_url('index.php/teacher/write')."/".$id;
	 	echo "<form method='post' action='$url'>
	 	<textarea id='textComment' name='comment'></textarea>
	 	<button id='sumbit' type='submit'>submit</button>
	 	</form>";
	}
	public function write(){
		$data[0]=$this->uri->segment('3');
		$data[1]=$this->session->userdata('user');
		$data[3]=$this->input->post('comment');
		$this->load->model('table_model');
		$this->load->helper('url');
		$bool=$this->table_model->write($data);
		$result['status']=$bool;
		$result['student_id']=$data[0];
		$this->index($result);
	}
}