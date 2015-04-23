<?php $this->load->library('session');?>
<html>
<head>
<title>Application Form</title>
<link href="<?=base_url();?>css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
<link href="<?=base_url('jquery-ui-1.11.2/jquery-ui.css')?>" rel="stylesheet">
<script src="<?=base_url('jquery-ui-1.11.2/external/jquery/jquery.js')?>"></script>
<script src="<?=base_url('jquery-ui-1.11.2/jquery-ui.js')?>"></script>
<style>
	body {
 background-image:url(<?=base_url('images/old_paper_background-wallpaper-1280x800.jpg')?>);
 background-size: cover;
 }
 	.ms-container{
  		background: transparent url(<?=base_url('images/switch.png')?>) no-repeat 50% 50%;
  		width: 370px;
	}
	
	.chosen-select:hover{
  		height:200px;
  	}

  

  	.form-body{
  		color: black;
  		width: auto;
  		font-size: 14px;
  	}

	.container{
	margin-top: 15px;
	width: 800px;
	border: 2px solid black;
	border-radius: 20px;
	background-color: white;
	margin-left: auto;
	margin-right: auto;
	padding: 5px;

	font-size: 16px;
	color: black;
	}
	.btn_wrapper{
		width: 300px; 
	  	margin: 0 auto;
	}
	.btn{
	  	cursor: pointer;
		width: 300px;
		height: 44px;
		margin-top: 20px
		padding: 0;
		background: #ef4300;
		-moz-border-radius: 6px;
		-webkit-border-radius: 6px;
		border-radius: 6px;
	 	border: 1px solid #ff730e;
	 	-moz-box-shadow: 0 15px 30px 0 rgba(255,255,255,.25) inset, 0 2px 7px 0 rgba(0,0,0,.2);
		-webkit-box-shadow: 0 15px 30px 0 rgba(255,255,255,.25) inset, 0 2px 7px 0 rgba(0,0,0,.2);
		box-shadow: 0 15px 30px 0 rgba(255,255,255,.25) inset, 0 2px 7px 0 rgba(0,0,0,.2);
		font-size: 14px;
		font-weight: 700;
		color: #fff;
		text-shadow: 0 1px 2px rgba(0,0,0,.1);
		-o-transition: all .2s;
		-moz-transition: all .2s;
		-webkit-transition: all .2s;
		-ms-transition: all .2s;

}
#score input {
            width: 270px;
            height: 42px;
            margin-top: 25px;
            padding: 0 15px;
            background: rgba(45,45,45);
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            border: 1px solid rgba(255,255,255,.15);
            -moz-box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
            -webkit-box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
            box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
            font-size: 14px;
            color: #040105;
            text-shadow: 0 1px 2px rgba(0,0,0,.1);
            -o-transition: all .2s;
            -moz-transition: all .2s;
            -webkit-transition: all .2s;
            -ms-transition: all .2s;
        }
#score input.score{
		width: 100px;
        height: 30px;
        margin:2px;
	}
	div#score {
  	position: absolute;
  	top: 138%;
  	left: 55%;
 	 z-index: 100;
 	 background:rgba(66, 147, 33, 0.58);
 	 color: #000;
 	 border: 5px outset rgb(49, 140, 85);
 	 border-radius: 5px;
 	 box-shadow: 0px 0px 50px 5px black;
  	font-size: 12px;
  	overflow:scroll;
  	width:200px;
  	height:230px;
	}
/*.calender{ width:319px;margin:50px auto;top:0;left:0;border:4px #D6D6D6 solid;background:#EBEBEB;position:absolute;display:none;z-index:999;}
.calendertb{width:100%;}
.calendertb td{width:35px;height:35px;border:1px #CCCCCC solid;text-align:center;vertical-align:middle;cursor:pointer;font-size:14px;font-weight:bold;}
.calendertb td.hover,.calendertb td.weekendhover{background:#D6D6D6;}
.calendertb th{width:35px;height:30px;border:1px #CCCCCC solid;text-align:center;vertical-align:middle;cursor:pointer;color:#979797;}
.tdtoday{ background:#0080FF;color:#fff;width:35px;height:35px;border:1px #CCCCCC solid;text-align:center;vertical-align:middle;cursor:pointer;font-size:14px;font-weight:bold;}
.getyear{ height:35px;line-height:35px;width:100%;text-align:center;}
.preMonth{ font-size:14px;font-weight:bold;cursor:pointer;margin-right:18px;color:#0080FF;}
.nextMonth{ font-size:14px;font-weight:bold;cursor:pointer;margin-left:18px;color:#0080FF;}
.mh_date{width:319px;height:30px;line-height:20px;padding:5px;cursor:pointer;background:white url("<?=base_url('images/dateIco.png')?>") no-repeat right center;}
.zhezhao{width:100%;height:100%;position:fixed;z-index:998;background:#fff;filter:alpha(opacity=10);opacity:0.1;display:none;}*/



</style>


<link rel="stylesheet" href="<?=base_url('docsupport/prism.css')?>">

</head>
<body>
<div class="container">
	<div class="form-body">
	<form method="POST" name="application">
		<br>
		<input type="hidden" name="id" value="<?=$this->session->userdata('user')?>">
		&nbsp;First Name: &nbsp;
		<input type="text" name="fname">
		&nbsp; &nbsp;
		
		Last Name: &nbsp;
		<input type="text" name="lname">
		<br> <br>
		&nbsp;Phone Number: &nbsp;
		<input type="text" name="phone">
		&nbsp; &nbsp;
		GPA: &nbsp;
		<input type="text" name="gpa">
		<br>
		<br>

		&nbsp;Mizzou email address: &nbsp;
		<input type="text" name="email">
		<br><br>

		<?php if($degree=='undergraduate'){?>
		&nbsp;Degree Program:&nbsp;
		<input type="text" name="program">
		&nbsp;Level:&nbsp;
		<select name='level'>
  			<option value="freshmen">freshmen</option>
 			<option value="sophomore">sophomore</option>
			<option value="junior">junior</option>
			<option value="senior">senior</option>
		</select>
		<br>
		<?php }else{?>
		&nbsp;Degree Type:
		<input type='radio' name='position' id='MS' value='MS'> 
		<label for="MS">MS</label>
		
		<input type='radio' name='position' id='PhD' value='PhD'>
		<label for="PhD">PhD</label>
		&nbsp;&nbsp;
		Advisor's Name:
		<input type="text" name="advisor">
		<br>
		<?php }?>
		
		<br><!--&nbsp;Anticipated graduation date:&nbsp;
 		<input type="text" class="mh_date" name='gradDate' id='date'>-->
 			<p>Anticipated Graduation Date: <input type="text" id="gradDate"></p>
		<br>

		<br>&nbsp;Course(s) You Are Currently Teaching: <br>&nbsp;(Select multiple by holding command)<br>
		&nbsp;
		
		<select name="teaching[]" style="width:350px;" id="teaching" class="chosen-select" multiple tabindex="6">  
          	<?php foreach($course as $val):?>
        		<?php $dept=$val['deptment'];?>
        		<optgroup label="<?=$dept?>">
        		 	<?php foreach($$dept as $name):?>
        		 		<option><?=$name['courseName']?></option>
        		 	<?php endforeach;?>
        		 </optgroup>
          	<?php endforeach;?>
        </select>

		<br>&nbsp;Course(s) You Have Previously Taught: <br>&nbsp;(Select multiple by holding command)<br>
		&nbsp;
		<select name="taught[]" style="width:350px;" class="chosen-select" id='taught' multiple tabindex="6">
        	<?php foreach($course as $val):?>
        		<?php $dept=$val['deptment'];?>
        		 <optgroup label="<?=$dept?>">
        		 	<?php foreach($$dept as $name):?>
        		 		<option><?=$name['courseName']?></option>
        		 	<?php endforeach;?>
        		 </optgroup>
          	<?php endforeach;?>
          </select>
		<br>&nbsp;Course(s) You Would Like to Teach: <br>&nbsp;(Select multiple by holding command)<br>
		&nbsp;



		<select name="teach[]" style="width:350px;" class="chosen-select" id='teach' class="select" multiple tabindex="6">
        	<?php foreach($course as $val):?>
        		<?php $dept=$val['deptment'];?>
        		 <optgroup label="<?=$dept?>">
        		 	<?php foreach($$dept as $name):?>
        		 		<option><?=$name['courseName']?></option>
        		 	<?php endforeach;?>
        		 </optgroup>
          	<?php endforeach;?>
          </select>
		<br>
		








		<br>&nbsp;Other Places You Work:&nbsp;
		<input type="text" name="work">
		<br>
		
		<?php if($nation=='international'){?>
		<br>&nbsp;SPEAK/OPT score:&nbsp;
		<input type="text" name="score">
		<br>
		
		&nbsp;Semester of last test:&nbsp;
		<input type="text" name="test">
		<br>
		<?php }?>
		<br>
		&nbsp;&nbsp;&nbsp;<button class="btn" type="button" onclick="sub()">Submit Application</button><br><br>
	</form>
	</div>
	</div>
	
	<script src="<?=base_url('js/jquery.multi-select.js');?>" type="text/javascript"></script>
    <script type="text/javascript">

   	$(document).ready(function(){
   		$("#ms-teach").click(function(){
   			var sel=$("#teach  option:selected");
   			$('#score').remove();
   			var newele=$("<div id='score'><p>Please input scores: </p></div>");
   			$('form').append(newele);
   			for(var i=0;i<sel.length;i++){
   				var data=sel.eq(i).text();
  				var label=$("<label for="+data+">"+data+" : </label>");
  				var input=$("<input class='score' name="+data+" id="+data+" type='text'><br>");
   				newele.append(label);
   				newele.append(input);
   			}
   		});
   	
   	});

   	function sub(){
   		var form=document.forms['application'];
   		var x=form['fname'].value;
   		if (x == null || x == "") {
        	alert("FirstName must be filled out");
        	return false;
    	}
    	var x=form['lname'].value;
   		if (x == null || x == "") {
        	alert("LastName must be filled out");
        	return false;
    	}
    	var x=form['phone'].value;
   		if (x == null || x == "" || !(/^[0-9]*$/.test(x))) {
        	alert("Phone must be filled out and can only contain number");
        	return false;
    	}
    	
    	var x=form['gpa'].value;
   		if (x == null || x == "" || !(/^[0-9]*\.[0-9]*$/.test(x)) || x>5) {
        	alert("gpa must be filled out and can only contain number and must less that 5");
        	return false;
    	}
    	
    	var obj=document.getElementById('taught');
   		if(obj.selectedIndex ==-1){
   			alert('you must select at least one course you Would Like to Teach');
   			return false;
   		}
    	
   		<?php if($nation=='international'){
   			if($degree=='undergraduate'){
   		?>
   		
   		
			form.action="<?=base_url('index.php/form/interUnder')?>";
		<?php }else{?>
		
		
			form.action="<?=base_url('index.php/form/interGra')?>";
		<?php }}else{
			if($degree=='undergraduate'){
		?>	
		
		
			form.action="<?=base_url('index.php/form/natUnder')?>";
		<?php }else{?>
		
		
			form.action="<?=base_url('index.php/form/natGra')?>";
		<?php }}?>
		form.submit();
		}
	
	//JavaScript function for choosing gradDate from calandar	
	$(function() {
    	$( "#gradDate" ).datepicker({
    		minDate: 0,
      		dateFormat: "yy-mm-dd",
    	});
	});

	//JavaScript function for courses the applicant is currently teaching multiselect box
	$('#teaching').multiSelect()

	//JavaScript function for courses the applicant has taught multiselect box
	$('#taught').multiSelect()

	//JavaScript function for courses the applicant has taught multiselect box
	$('#teach').multiSelect()	

/*$(document).ready(function(){
    $("input.mh_date").manhuaDate({					       
		Event : "click",//可选				       
		Left : 0,//弹出时间停靠的左边位置
		Top : -16,//弹出时间停靠的顶部边位置
		fuhao : "-",//日期连接符默认为-
		isTime : false,//是否开启时间值默认为false
		beginY : 1949,//年份的开始默认为1949
		endY :2100//年份的结束默认为2049
	});
});*/
  </script>
</body>
</html>