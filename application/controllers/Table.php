<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends CI_Controller {

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
	public function index($result=NULL)
	{	if(isset($result)){
			$data['result']=$result;
		}
		$this->load->library(array('table','pagination'));
		$this->load->model('table_model');
		$this->load->helper('url');
		
		$url=base_url('images/user.gif');
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
		$data['table']=$this->table->generate($this->table_model->getStatus());
		$this->load->view('table',$data);
	}

	public function test(){
		$this->load->library('table');
		$this->load->model("table_model");
		$id=$this->uri->segment('3');
		$info=$this->table_model->getInfor($id);
		$i=0;
		
		foreach($info['res'][0] as $key=>$value){
			$data[$i][0]=$key;
			$data[$i++][1]=$value;
		}
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
		$app=$this->table->generate($data);
		$app="<div id='app'>".$app."</div>";
		
		$curTeach="<ul>";
		unset($value);
		foreach($info['curTeach'] as $value){
			$curTeach=$curTeach."<li>".$value['courseName']."</li>";
		}
		$curTeach=$curTeach."</ul>";
		$curTeach="<div id='curTeach'><p>Course(s) This Applicant Are Currently Teaching:</p>".$curTeach."</div>";
		
		$preTeach="<ul>";
		foreach($info['preTeach'] as $value){
			$preTeach=$preTeach."<li>".$value['courseName']."</li>";
		}
		$preTeach=$preTeach."</ul>";
		$preTeach="<div id='preTeach'><p>Course(s) This Applicant Have Previously Taught:</p>".$preTeach."</div>";
		
		$likeTeach="<select name='likeTeach'>";
		foreach($info['likeTeach'] as $value){
			$likeTeach=$likeTeach."<option value=".$value['courseName']."> course's name:".$value['courseName']." score:".$value['score']."</option>"; 
		}
		$likeTeach=$likeTeach."</select>";
		$likeTeach="<form method='post'><input type='hidden' name='student_id' value=$id >".$likeTeach."<br><button id='agreeButton' type='submit'>agree</button>&nbsp&nbsp<button id='disagreeButton' type='submit'>disagree</button></form>";
		$likeTeach="<div id='likeTeach'><p>Course(s) This Applicant Would Like to Teach and please choose one:</p>".$likeTeach."</div>";
		
		$allInform=$app.$curTeach.$preTeach.$likeTeach."<div id='divClose'><button type='button' id='close'>close</button></div>";
		
		echo $allInform;
		
	}
	
	public function addStudent(){
		$this->load->model("table_model");
		$result['type']='add';
		$result['status']=$this->table_model->addStudent();
		$result['student_id']=$this->input->post('student_id');
		$this->index($result);
	}
	
	public function denyStudent(){
		$this->load->model("table_model");
		$result['type']='deny';
		$result['status']=$this->table_model->denyStudent();
		$result['student_id']=$this->input->post('student_id');
		$this->index($result);
	}
	
	public function general(){
	$this->load->library(array('table','pagination'));
		$this->load->model('table_model');
		$this->load->helper('url');
		$url=base_url('images/user.gif');
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
}
