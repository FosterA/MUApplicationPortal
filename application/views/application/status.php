<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>

<style>
body {
 background-image:url(<?=base_url('images/old_paper_background-wallpaper-1280x800.jpg')?>);
 background-size: cover;
 }

.form-wrapper{
	border: 2px solid black;
	border-radius: 20px;
	background-color: white;
	margin-left: 22%;
	margin-right: 22%;
	margin-top: 10%;
	margin-bottom:11%;
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


</style>

</head>
<body>
	<?php echo validation_errors(); ?>
	<div class='form-wrapper' >
		<?php echo form_open('index.php/form/index'); ?>

		<br><h1 align="center">Student Information</h1><br>

		<!--  <p>form1</p>  -->
		<div id="f1" align="center">
			<p>&nbsp;Please indicate whether you are are a native or international student to the University of Missouri:</p>
			&nbsp;<input type='radio' name='nation' id='native' value='native'> 
			<label for="native">Native</label>
			&nbsp;
			<input type='radio' name='nation' id='international' value='international'>
			<label for="international">International</label>
		</div>
		<br>
		<!--  <p>form2</p>  -->

		<br>
		<div align="center">
		<p>Please inidicate whether you are an undergraduate or graduate student: </p>
		&nbsp;<input type='radio' name='degree' id='undergraduate' value='undergraduate'> 
		<label for="undergraduate">Undergraduate</label>
		
		&nbsp;<input type='radio' name='degree' id='graduate' value='graduate'>
		<label for="graduate">Graduate</label>
		<br> <br><br>&nbsp;
		</div>
		<div class="btn_wrapper">
			<input class="btn" type="submit" value="Next">
		</div>
		</form>

	</div>
</body>
</html>