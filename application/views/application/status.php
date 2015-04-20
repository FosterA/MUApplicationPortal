<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  

<style>


</style>

</head>
<body>
	<?php echo validation_errors(); ?>
	<div>
		<?php echo form_open('index.php/form/index'); ?>
		<br><div align="center">TA/PLA Application Form</div><br>
		<!--  <p>form1</p>  -->
		<p>&nbsp;Please indicate whether you are are a native or international student to the University of Missouri: </p>
		&nbsp;<input type='radio' name='nation' id='native' value='native'> 
		<label for="native">Native</label>
		&nbsp;
		<input type='radio' name='nation' id='international' value='international'>
		<label for="international">International</label>
		<br>
		<!--  <p>form2</p>  -->
		<p>Please inidicate whether you are an undergraduate or graduate student: </p>
		&nbsp;<input type='radio' name='degree' id='undergraduate' value='undergraduate'> 
		<label for="undergraduate">Undergraduate</label>
		
		&nbsp;<input type='radio' name='degree' id='graduate' value='graduate'>
		<label for="graduate">Graduate</label>
		<br> <br><br>&nbsp;
		<input type="submit" value="submit">
		</form>
	</div>
</body>
</html>