<!DOCTYPE html>
<html lang="en">
<head>
<style>
	body {
		 background-image:url(<?=base_url('images/Missouri.jpg')?>);
		 background-size: cover;
		 background-repeat: no-repeat;

	 }
	.form-wrapper{
		border: 2px solid black;
		border-radius: 20px;
		background-color: white;
		padding: 5px;
		font-size: 16px;
		color: black;
	
	}
	#submit {
		background: white;
		width: 120px;
		height: 30px;
		border-radius: 6px;
		font-size: 14px;
	}
</style>
</head>
<body>
		<div id="page" class="container">
			<div id="content">
				<div>
					<h2>Welcome <?php echo $user?></h2>
				</div>
				<?php echo validation_errors(); ?>
				<div class="form-wrapper">
				<div class="windows">
					<h3>Current Application Windows</h3>
					<br>
					<div id='results'>
						<?php echo $this->table->generate($windows); ?>
					</div>
					<h3>Set Application Windows</h3>
					<br>
					<p>Select Semester</P>
					<form action="<?=base_url('admin/setwindows')?>" method="post" name="setwindows" id="setwindows">	
						<select name='season' id="season">
		          			<option value="Fall">Fall</option>
		         			<option value="Spring">Spring</option>
		         		</select>

	            		<select name='year' id="year">
	          				<?php
	          					echo '<option value="'.date('Y').'"'.'>'.date('Y').'</option>'."\n";
	          					echo '<option value="'.(date('Y') + 1).'"'.'>'.(date('Y') + 1).'</option>'."\n";
	          					echo '<option value="'.(date('Y') + 2).'"'.'>'.(date('Y') + 2).'</option>'."\n";
	          				?>
	            		</select>
	            		<br>
	            		<br>
						<p>Set Application Submittal Window</p>
						<label for="appfrom">From</label>
						<input type="text" id="appfrom" name="appfrom">
						<label for="appto">to</label>
						<input type="text" id="appto" name="appto">
						<br>
						<br>
						<p>Set Application Comment Window</p>
						<label for="commentfrom">From</label>
						<input type="text" id="commentfrom" name="commentfrom">
						<label for="commentto">to</label>
						<input type="text" id="commentto" name="commentto">
						<br>
						<br>
						<button id="submit" type="submit">Set Dates</button>
					</form>
				</div>
			</div>
		</div>
		<br>
		<br>
	
	</div>
	</div>
</div>
</body>
<script>

$(function() {
    $( "#appfrom" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      minDate: 0,
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#appto" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#appto" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      minDate: 0,
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#appfrom" ).datepicker( "option", "maxDate", selectedDate );
      }
    });

    $( "#commentfrom" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      minDate: 0,
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#commentto" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#commentto" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      minDate: 0,
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#commentfrom" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
});
<?php if(isset($error)){?>
	alert("<?=$error?>");
<?php } ?>
<?php if(isset($confirm)){?>
	alert("<?=$confirm?>");
<?php } ?>
</script>
</html>