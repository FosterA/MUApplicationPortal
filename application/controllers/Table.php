<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!isset($_SESSION['logged_in'])||$this->session->userdata('profession')!='admin'){
			redirect('register');
		}
	}
	
	public function index($result=NULL){

		if(isset($result)){
			$data['result']=$result;
		}

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
		$this->load->view('templates/header_admin');
		$this->load->view('table',$data);
	}

	public function test(){
		$this->load->library('table');
		$this->load->model("table_model");
		$id=$this->uri->segment('3');
		$bool=$this->table_model->getRow($id);
		if($bool){
		$info=$this->table_model->getInfor($id);
		$i=0;
		//print_r($info);
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
		}else{
		$allInform="<p id='noResult'>Currently, we can not find this student's application information. There are three kinds of situation</p>
					<ul>
  						<li>This student didn't apply to TA/PLA</li>
  						<li>You have already accepted this student's application, if that you can go to Accept table to find this student</li>
  						<li>You have already denied this student's application, if that you can go to Deny table to find this student</li>
					</ul><div id='divClose'><button type='button' id='close'>close</button></div>";
		echo $allInform;
		}
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
	
	public function comment(){
		$this->load->library('table');
		$this->load->model("table_model");
		$id=$this->uri->segment('3');
		$bool=$this->table_model->getCommentRow($id);
		if($bool){
			$result=$this->table_model->getComment($id);
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
		}
		else{
			echo "<div id='noComment'>There are no comments about this student.<div>";
		}
	}

	public function course($result=NULL){
		//print_r($result);
		$this->load->library('table');
		$this->load->model("table_model");
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
		$res111=$this->table_model->showcourse();
		$data['list']=$this->table->generate($res111);
		$this->load->view('templates/header_admin');
		$data['result']=$result;
		$this->load->view('course',$data);
	}
	public function addcourse(){
		$this->load->helper('url');
		$url=base_url('index.php/table/add');
			echo "</div id='courselist'><form action='$url' method='post'><select name='dept' tabindex='52' size='1' style='width:194px; '>
			<option value='' selected='selected'>&nbsp; </option>
			<option value='ACCTCY'>Accountancy</option>
			<option value='AERO'>Aerospace Studies</option>
			<option value='AFNR'>Ag, Food and Natural Resources</option>
			<option value='AG_EC'>Agricultural Economics</option>
			<option value='AG_ED_LD'>Agricultural Ed &amp; Leadership</option>
			<option value='AG_S_M'>Agricultural Systems Managemen</option>
			<option value='ANESTH'>Anesthesiology</option>
			<option value='AN_SCI'>Animal Science</option>
			<option value='ANTHRO'>Anthropology</option>
			<option value='ARABIC'>Arabic</option>
			<option value='ARCHST'>Architectural Studies</option>
			<option value='AR_H_A'>Art History And Archaeology</option>
			<option value='ART_CERM'>Art-Ceramics</option>
			<option value='ART_DRAW'>Art-Drawing</option>
			<option value='ART_FIBR'>Art-Fibers</option>
			<option value='ART_GNRL'>Art-General</option>
			<option value='ART_GRDN'>Art-Graphic Design</option>
			<option value='ART_PNT'>Art-Painting</option>
			<option value='ART_PHOT'>Art-Photography</option>
			<option value='ART_PRNT'>Art-Printmaking</option>
			<option value='ART_SCUL'>Art-Sculpture</option>
			<option value='ASTRON'>Astronomy</option>
			<option value='ATHTRN'>Athletic Training</option>
			<option value='ATM_SC'>Atmospheric Science</option>
			<option value='BIOCHM'>Biochemistry</option>
			<option value='BIOL_EN'>Biological Engineering</option>
			<option value='BIO_SC'>Biological Sciences</option>
			<option value='BIOMED'>Biomedical Sciences</option>
			<option value='BL_STU'>Black Studies</option>
			<option value='BUS_AD'>Business Administration</option>
			<option value='CH_ENG'>Chemical Engineering</option>
			<option value='CHEM'>Chemistry</option>
			<option value='CH_HTH'>Child Health</option>
			<option value='CHINSE'>Chinese</option>
			<option value='CV_ENG'>Civil Engineering</option>
			<option value='CL_HUM'>Classical Humanities</option>
			<option value='CLASS'>Classics</option>
			<option value='CDS'>Clinical &amp; Diagnostic Sciences</option>
			<option value='CL_L_S'>Clinical Laboratory Sciences</option>
			<option value='COMMUN'>Communication</option>
			<option value='C_S_D'>Communication Science/Disorder</option>
			<option value='CMP_SC'>Computer Science</option>
			<option value='DERM'>Dermatology</option>
			<option value='DMU'>Diagnostic Medical Ultrasound</option>
			<option value='ECONOM'>Economics</option>
			<option value='ED_LPA'>Ed Ldrshp and Policy Analysis</option>
			<option value='ESC_PS'>Ed, School and Counseling Psy</option>
			<option value='EDUC_H'>Education Honors</option>
			<option value='ECE'>Electrical And Computer Engine</option>
			<option value='EMR_ME'>Emergency Medicine</option>
			<option value='ENGINR'>Engineering</option>
			<option value='ENGLSH'>English</option>
			<option value='ELSP'>English Language Support Prgrm</option>
			<option value='ENV_SC'>Environmental Science</option>
			<option value='ENV_ST'>Environmental Studies</option>
			<option value='F_C_MD'>Family And Community Medicine</option>
			<option value='FILM_S'>Film Studies</option>
			<option value='FINANC'>Finance</option>
			<option value='F_W'>Fisheries And Wildlife</option>
			<option value='F_S'>Food Science</option>
			<option value='FOREST'>Forestry</option>
			<option value='FRENCH'>French</option>
			<option value='G_STDY'>General Studies</option>
			<option value='GEOG'>Geography</option>
			<option value='GEOL'>Geology</option>
			<option value='GERMAN'>German</option>
			<option value='MRKTNG'>Marketing</option>
			<option value='MATH'>Mathematics</option>
			<option value='MAE'>Mechanical And Aerospace Engin</option>
			<option value='MPP'>Medical Pharmacology &amp; Physiol</option>
			<option value='MED_ID'>Medicine-Interdisciplinary</option>
			<option value='MICROB'>Microbiology</option>
			<option value='MIL_SC'>Military Science</option>
			<option value='MISC'>Miscellaneous</option>
			<option value='MUS_APMS'>Music-Applied Music</option>
			<option value='MUSIC_NM'>Music-Courses for Non-Majors</option>
			<option value='MUS_ENS'>Music-Ensemble Courses</option>
			<option value='MUS_GENL'>Music-General</option>
			<option value='MUS_I_VR'>Music-Instrumental And Vocal R</option>
			<option value='MUS_I_VT'>Music-Instrumental And Vocal T</option>
			<option value='MUS_H_LI'>Music-Music History And Litera</option>
			<option value='MUS_THRY'>Music-Music Theory</option>
			<option value='NAT_R'>Natural Resources</option>
			<option value='NAVY'>Naval Science</option>
			<option value='NEUROL'>Neurology</option>
			<option value='NU_ENG'>Nuclear Engineering</option>
			<option value='NUCMED'>Nuclear Medicine</option>
			<option value='NURSE'>Nursing</option>
			<option value='NUTR_S'>Nutritional Sciences</option>
			<option value='OB_GYN'>Obstetrics And Gynecology</option>
			<option value='OC_THR'>Occupational Therapy</option>
			<option value='OPHTH'>Ophthalmology</option>
			<option value='P_R_TR'>Parks, Recreation And Tourism</option>
			<option value='PTH_AS'>Pathology &amp; Anatomical Science</option>
			<option value='PEA_ST'>Peace Studies</option>
			<option value='FINPLN'>Personal Financial Planning</option>
			<option value='PHIL'>Philosophy</option>
			<option value='PM_REH'>Physical Medicine And Rehabili</option>
			<option value='PH_THR'>Physical Therapy</option>
			<option value='PHYSCS'>Physics</option>
			<option value='PLNT_S'>Plant Science</option>
			<option value='POL_SC'>Political Science</option>
			<option value='PORT'>Portuguese</option>
			<option value='PSCHTY'>Psychiatry</option>
			<option value='PSYCH'>Psychology</option>
			<option value='PUB_AF'>Public Affairs</option>
			<option value='P_HLTH'>Public Health</option>
			<option value='RA_SCI'>Radiologic Sciences</option>
			<option value='RADIOL'>Radiology</option>
			<option value='REL_ST'>Religious Studies</option>
			<option value='RS_THR'>Respiratory Therapy</option>
			<option value='RM_LAN'>Romance Languages</option>
			<option value='RU_SOC'>Rural Sociology</option>
			<option value='RUSS'>Russian</option>
			<option value='SCI_AG_J'>Science &amp; Agricultural Journ</option>
			<option value='SOC_WK'>Social Work</option>
			<option value='SOCIOL'>Sociology</option>
			<option value='SOIL'>Soil Science</option>
			<option value='S_A_ST'>South Asia Studies</option>
			<option value='SPAN'>Spanish</option>
			<option value='SPC_ED'>Special Education</option>
			<option value='STAT'>Statistics</option>
			<option value='SSC'>Student Success Center</option>
			<option value='ST_ABRD'>Study Abroad</option>
			<option value='SURGRY'>Surgery</option>
			<option value='T_A_M'>Textile And Apparel Management</option>
			<option value='THEATR'>Theatre</option>
			<option value='V_BSCI'>Veterinary Biomedical Science</option>
			<option value='V_M_S'>Veterinary Medicine &amp; Surgery</option>
			<option value='VMED_I'>Veterinary Medicine - Interdis</option>
			<option value='V_PBIO'>Veterinary Pathobiology</option>
			<option value='WGST'>Women's &amp; Gender Studies</option>
		</select>
		&nbsp;<input type='text' name='course' placeholder=' Course Name'><button type='submit' id='addCourse'>Add Course</button></form></div>	";
	}

	public function showcourse(){
		$this->load->library('table');
		$this->load->model("table_model");
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
			$result=$this->table_model->showcourse();
			echo $this->table->generate($result);
	}

	public function add(){
		$this->load->model("table_model");
		$array['status']=$this->table_model->addCourse();
		$array['course']=$this->input->post('course');
		$array['dept']=$this->input->post('dept');
		$this->course($array);
	}
}