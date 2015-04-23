<!DOCTYPE html>
<html lang="en">

<head>	
<style>
	body {
	 background-image:url(<?=base_url('images/mizzoufall.jpg')?>);
	 background-size: 100% 120%;
	 background-repeat: no-repeat;
	 }
	 
	.button1 {
	/*
	background: -webkit-linear-gradient(top, #FF9900, #FF9900);
    background: -moz-linear-gradient(top, #FF9900,#FF9900);
    background: -o-linear-gradient(top,#FF9900,#FF9900);
    background: -ms-linear-gradient(top,#FF9900,#FF9900);
    background: linear-gradient(top, #FF9900,#FF9900);
 */
 	color:white;
     
    -webkit-border-radius: 50px;
    -khtml-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
     /*
    -webkit-box-shadow: 0 8px 0 #FF9933;
    -moz-box-shadow: 0 8px 0 #FF9933;
    box-shadow: 0 8px 0 #FF9933;
     */
    text-shadow: 0 2px 2px rgba(255, 255, 255, 0.2);
	}
	
	a.button1:hover {
    background: #3d7a80;
    background: -webkit-linear-gradient(top, #FF6633, #FF6633);
    background: -moz-linear-gradient(top, #FF6633, #FF6633);
    background: -o-linear-gradient(top, #FF6633, #FF6633);
    background: -ms-linear-gradient(top, #FF6633, #FF6633);
    background: linear-gradient(top, #FF6633, #FF6633);
}
</style>

<body>
		<div id="page" class="container">
			<div id="content">
				<div>
					<h2 style="font-family: Fantasy">Welcome <?php echo $user?></h2>
					<?php 
						if($existingApp){?>
							<p><a href="#" class="button1" style="font-family: Fantasy; color: black">Application Status</a></p>
					<?php } ?>
					<?php
						if(!$existingApp){?>
							<p><a href="<?=base_url('index.php/form/index')?>" class="button1" style="font-family: Fantasy; color:black">Begin Application</a></p>
					<?php } ?>		
				</div>
			</div>
		</div>
		
	</div>
</div>
</body>
</head>
</html>