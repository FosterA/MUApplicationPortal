		<div id="page" class="container">
			<div id="content">
				<?php echo validation_errors(); ?>
				<div id="windows">
					<h3>Add A New User</h3>
					<br>
					<form action="<?=base_url('admin/add_User')?>" method="post" name="submit" id="submit">
					<select name='profession' id="profession" onchange="identity()">
           				<option value="instructor">instructor</option>
     		     		<option value="admin">admin</option>
           			 </select>
					<h3>Select Type:</h3>
					<br>
					<input type="text" name="username" class="username" placeholder="Username">
          			<input type="password" name="password" class="password" placeholder="Password">
          			<input type="text" name="email" class="email" placeholder="Email Address">
						<br>
						<br>
						<button id="submit" type="submit">Submit</button>
					</form>
				</div>
			</div>
		</div>
		<br>
		<br>
		<div id="content" class="container">
			<img src="<?=base_url('images/mizzou.jpg')?>" width="1000" height="500" alt="" />
		</div>

		
	</div>

<script>


<?php if(isset($error)){?>
	alert("<?=$error?>");
<?php } ?>
<?php if(isset($confirm)){?>
	alert("<?=$confirm?>");
<?php } ?>
</script>