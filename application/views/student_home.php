	
		<div id="page" class="container">
			<div id="content">
				<div>
					<?php if (!isset($_SESSION['logged_in'])){
						$this->load->view('register');
					}?>
					<h2>Welcome <?php echo $user?></h2>
					<?php
					$this->load->database();
					$this->db->query("use applicationportal");
					$sql = "SELECT * FROM app WHERE student_id = ?";
					$lower = strtolower($user);
					$data[0]=$lower;
					$valid = $this->db->query($sql,$data);

					if($valid->num_rows()==0){?>
						<p><a href="<?=base_url('index.php/form/index')?>" class="button1">Begin Application</a></p>
					<?php } ?>
					<p><a href="#" class="button1">Appication Status</a></p>
				</div>
			</div>
		</div>
		<div id="content" class="container">
		<img src="<?=base_url('images/mizzou.jpg')?>" width="1000" height="500" alt="" />
		</div>
	</div>
</div>