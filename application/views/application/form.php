<?php $this->load->library('session');?>
<html>
<head>
<title>Application Form</title>
<style>
	
	.chosen-select:hover{
  		height:200px;
  	}
  	#show{
  		border:2px solid red;
  		width:300px;
  		height:200px;
  		margin:-100px 407px;
  	}
</style>
<link rel="stylesheet" href="<?=base_url('docsupport/style.css')?>">;
<link rel="stylesheet" href="<?=base_url('docsupport/prism.css')?>">
<link rel="stylesheet" href="<?=base_url('chosen.css')?>">
</head>
<body>
	<form action="#" method="POST" name="application">
		<input type="hidden" name="id" value="<?=$this->session->userdata('user')?>">
		First Name: <br>
		<input type="text" name="fname">
		<br>
		
		Last Name: <br>
		<input type="text" name="lname">
		<br>
		
		GPA:<br>
		<input type="text" name="gpa">
		<br>
		<?php if($degree=='undergraduate'){?>
		If undergraduate, indicate program and level:<br>
		<input type="text" name="program">
		<select name='level'>
  			<option value="freshmen">freshmen</option>
 			<option value="sophomore">sophomore</option>
			<option value="junior">junior</option>
			<option value="senior">senior</option>
		</select>
		<br>
		<?php }else{?>
		If graduate: <br>
		<input type='radio' name='position' id='MS' value='MS'> 
		<label for="MS">MS</label>
		<br>
		<input type='radio' name='position' id='PhD' value='PhD'>
		<label for="PhD">PhD</label>
		<br>
		Advisor's Name:
		<input type="text" name="advisor">
		<br>
		<?php }?>
		Phone Number:<br>
		<input type="text" name="phone">
		<br>
		
		Mizzou email address:<br>
		<input type="text" name="email">
		

		<br>Anticipated graduation date:<br>
		<input type="text" name="grad date">

		<br>Course(s) You Are Currently Teaching:<br>

		<select name="teaching[]" style="width:350px;" class="chosen-select" multiple tabindex="6">
        	<?php foreach($course as $val):?>
        		<?php $dept=$val['deptment'];?>
        		 <optgroup label="<?=$dept?>">
        		 	<?php foreach($$dept as $name):?>
        		 		<option><?=$name['courseName']?></option>
        		 	<?php endforeach;?>
        		 </optgroup>
          	<?php endforeach;?>
          </select>

		<br>Course(s) You Have Previously Taught:<br>
		<select name="taught[]" style="width:350px;" class="chosen-select" multiple tabindex="6">
        	<?php foreach($course as $val):?>
        		<?php $dept=$val['deptment'];?>
        		 <optgroup label="<?=$dept?>">
        		 	<?php foreach($$dept as $name):?>
        		 		<option><?=$name['courseName']?></option>
        		 	<?php endforeach;?>
        		 </optgroup>
          	<?php endforeach;?>
          </select>
		<br>Course(s) You Would Like to Teach:<br>
		<select name="teach[]" style="width:350px;" class="chosen-select" onchange="fun()" id='taught' class="select" multiple tabindex="6">
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
		<div id="show"></div>
		Other Places You Work:<br>
		<input type="text" name="work">
		<br>
		
		<?php if($nation=='international'){?>
		SPEAK/OPT score, if applicable:<br>
		<input type="text" name="score">
		<br>
		
		Semester of last test:<br>
		<input type="text" name="test">
		<br>
		<?php }?>
		<br>
		<button type="button" onclick="sub()">submit</button>
	</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
   	function fun(){
   		var content=document.getElementById('show');
   		content.innerHTML="";
   		var obj=document.getElementById('taught');
   		var choose=new Array();
   		for(var i=0;i<obj.length;i++){
   			if(obj[i].selected){
   				choose[choose.length]=obj[i].value;
   			}
   		}
   
   		for(var i=0;i<choose.length;i++){
   			var node=document.createElement("input");
   			var label=document.createElement("label");
			var br=document.createElement("br");
   			node.type='text';
   			node.name=choose[i];
   			node.id=choose[i];
   			node.class="course";
   			label.for=choose[i];
   			label.innerHTML=choose[i]+" score:";
   			content.appendChild(label);
   			content.appendChild(node);
   			content.appendChild(br);
   		}
   	} 
   	function sub(){
   		var form=document.forms['application'];
   		<?php if($nation=='international'){
   			if($degree=='undergraduate'){
   		?>
			form.action="<?=base_url('index.php/form/interUnder')?>";
		<?php }else{?>
			form.action="<?=base_url('index.php/form/interGra')?>";
		<?php }}else{
			if($degree='undergraduate'){
		?>	
			form.action="<?=base_url('index.php/form/natUnder')?>";
		<?php }else{?>
		
		form.action="<?=base_url('index.php/form/natGra')?>";
		<?php }}?>
		form.submit();
		}
		
  </script>
</body>
</html>