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
 	color:white;
     
    -webkit-border-radius: 50px;
    -khtml-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
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
					<h2 style="font-family: Fantasy"><?php echo $user?> Application Status</h2>
					<!--Add display application status here-->	
					<h2><strong><?php echo $status?></strong></h2>
				</div>
			</div>
		</div>
		
	</div>
</div>
</body>
</head>
</html>