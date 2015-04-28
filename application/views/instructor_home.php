
		<br>
		<br>


		<div id="page" class="container">
			<div id="content">
				<div>
					<h2>Welcome <?php echo $user?></h2>
	
					<?php
					if($window){?>
						<p><a href="<?=base_url('teacher/index')?>" class="button1">Comment On Applicants</a></p>
					<?php }?>
				</div>
			</div>
		
		
							<h2><?php echo $message?></h2>
						
				</div>
			</div>
		</div>

		<div id="content" class="container">
		<img src="<?=base_url('images/mizzou.jpg')?>" width="1000" height="500" alt="" />
		</div>

	</div>
</div>