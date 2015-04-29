
		<br>
		<br>
<style>
	body {
		 background-image:url(<?=base_url('images/jesse3.jpg')?>);
		 background-size: cover;
		 background-repeat: no-repeat;

	 }


	 #submit {
		background: black;
		width: 300px;
		height: 30px;
		border-radius: 6px;
		font-size: 22px;
	}
</style>

		<div id="page" class="container">
			<div id="content">
				<div>
					<h2>Welcome <?php echo $user?></h2>
	
					<?php
					if($window){?>
						<p><a href="<?=base_url('teacher/index')?>" id="submit" class="button1">Comment On Applicants</a></p>
					<?php }?>

					<h2><font color="red"><?php echo $message?></font></h2>
				</div>
			</div>
		</div>
		<div id="content" class="container">
		
		</div>

	</div>
</div>