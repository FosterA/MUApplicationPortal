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
.calender{ width:319px;margin:50px auto;top:0;left:0;border:4px #D6D6D6 solid;background:#EBEBEB;position:absolute;display:none;z-index:999;}
.calendertb{width:100%;}
.calendertb td{width:35px;height:35px;border:1px #CCCCCC solid;text-align:center;vertical-align:middle;cursor:pointer;font-size:14px;font-weight:bold;}
.calendertb td.hover,.calendertb td.weekendhover{background:#D6D6D6;}
.calendertb th{width:35px;height:30px;border:1px #CCCCCC solid;text-align:center;vertical-align:middle;cursor:pointer;color:#979797;}
.tdtoday{ background:#0080FF;color:#fff;width:35px;height:35px;border:1px #CCCCCC solid;text-align:center;vertical-align:middle;cursor:pointer;font-size:14px;font-weight:bold;}
.getyear{ height:35px;line-height:35px;width:100%;text-align:center;}
.preMonth{ font-size:14px;font-weight:bold;cursor:pointer;margin-right:18px;color:#0080FF;}
.nextMonth{ font-size:14px;font-weight:bold;cursor:pointer;margin-left:18px;color:#0080FF;}
.mh_date{width:319px;height:30px;line-height:20px;padding:5px;cursor:pointer;background:white url("<?=base_url('images/dateIco.png')?>") no-repeat right center;}
.zhezhao{width:100%;height:100%;position:fixed;z-index:998;background:#fff;filter:alpha(opacity=10);opacity:0.1;display:none;}



</style>

<link rel="stylesheet" href="<?=base_url('docsupport/style.css')?>">
<link rel="stylesheet" href="<?=base_url('docsupport/prism.css')?>">
<script  src="<?=base_url('jquery-ui-1.11.2/js/jquery-1.7.2.min.js')?>"></script>
<script src="<?=base_url('jquery-ui-1.11.2/js/manhuaDate.1.0.js')?>"></script>
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
 		<input type="text" class="mh_date" name='gradDate' id='date'>
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
		


$(document).ready(function(){
    $("input.mh_date").manhuaDate({					       
		Event : "click",//可选				       
		Left : 0,//弹出时间停靠的左边位置
		Top : -16,//弹出时间停靠的顶部边位置
		fuhao : "-",//日期连接符默认为-
		isTime : false,//是否开启时间值默认为false
		beginY : 1949,//年份的开始默认为1949
		endY :2100//年份的结束默认为2049
	});
});
  </script>
</body>
</html>