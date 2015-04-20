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
	public function index()
	{
		$this->load->database();
		$this->load->library(array('table','pagination'));
		$this->load->model('table_model');
		$this->load->helper('url');
		$config['per_page']=4;
		$config['total_rows']=$this->table_model->getStatusRow();
		$config['base_url']=base_url('index.php/table/index');
		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
		$offset=intval($this->uri->segment(3));
		$url=base_url('images/user.gif');
		$tmpl = array (
                    'table_open'          => '<table id="keywords">',

                    'heading_row_start'   => '<tr><th>image</th>',
                    'heading_row_end'     => '<th>Details</th></tr>',
                    'heading_cell_start'  => '<th><span>',
                    'heading_cell_end'    => '</span></th>',

                    'row_start'           => "<tr><td><image src='$url'></td>",
                    'row_end'             => '<td><a class="first" href="#">detail</a></td></tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => "<tr><td><image src='$url'></td>",
                    'row_alt_end'         => '<td><a class="first" href="#">detail</a></td></tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

		$this->table->set_template($tmpl);
		$data['table']=$this->table->generate($this->table_model->getStatus($offset,$config['per_page']));
		$this->load->view('table',$data);
	}

	
}
