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
 p {
 	font-family: Fantasy;
 	}
</style>

</head>
<body>
	<?php echo validation_errors(); ?>
	<div>
		<?php echo form_open('index.php/form/index'); ?>
		<br><div align="center"><b><font size="6" ><p>TA/PLA Application Form</p></font></b></div><br>
		<!--  <p>form1</p>  -->
		<div id="f1" align="center">
			<p>&nbsp;<b><font size="5">Please indicate whether you are are a native or international student to the University of Missouri:</font></b> </p>
			&nbsp;<input type='radio' name='nation' id='native' value='native'> 
			<label for="native">Native</label>
			&nbsp;
			<input type='radio' name='nation' id='international' value='international'>
			<label for="international">International</label>
		</div>
		<br>
		<!--  <p>form2</p>  -->
		<div id="f2" align="center">
			<p><b><font size="5">Please inidicate whether you are an undergraduate or graduate student:</font></b> </p>
			&nbsp;<input type='radio' name='degree' id='undergraduate' value='undergraduate'> 
			<label for="undergraduate">Undergraduate</label>
		
			&nbsp;<input type='radio' name='degree' id='graduate' value='graduate'>
			<label for="graduate">Graduate</label>
		
			<br> <br><br>&nbsp;
			<input type="submit" value="submit">
			</form>
		</div>
	</div>
</body>
</html>