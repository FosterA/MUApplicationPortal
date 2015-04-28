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
				<?php echo validation_errors(); ?>
				<div class="form-wrapper">
				<div class="windows">
					<h3>Add A New User</h3><br>
					<p>Select Type:</p>
					<form action="<?=base_url('admin/add_User')?>" method="post" name="submit">
						<select name='profession' id="profession" onchange="identity()">
           					<option value="instructor">instructor</option>
     		     			<option value="admin">admin</option>
           			 	</select>
           			<br><br> 	
					Username:&nbsp;
					<input type="text" name="username" class="username" placeholder="Username">&nbsp;<br>
					Password:&nbsp;&nbsp;&nbsp;
          			<input type="password" name="password" class="password" placeholder="Password">&nbsp;<br>
          			&nbsp;Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          			<input type="text" name="email" class="email" placeholder="Email Address">&nbsp;
					<br>
					<br>
					<button id="submit" type="submit">Submit</button>
					<br>
					<br>
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


<?php if(isset($error)){?>
	alert("<?=$error?>");
<?php } ?>
<?php if(isset($confirm)){?>
	alert("<?=$confirm?>");
<?php } ?>
</script>