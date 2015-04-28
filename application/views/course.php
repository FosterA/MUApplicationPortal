<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="https://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Arvo:400,700" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>css/hp.css">
	<link rel="apple-touch-icon" sizes="57x57" href="<?=base_url();?>images/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?=base_url();?>images/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?=base_url();?>images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url();?>images/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?=base_url();?>images/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?=base_url();?>images/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?=base_url();?>images/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?=base_url();?>images/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url();?>images/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="<?=base_url();?>images/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?=base_url();?>images/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="<?=base_url();?>images/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?=base_url();?>images/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="<?=base_url();?>images/manifest.json">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="<?=base_url();?>images/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<script src="<?=base_url('jquery-ui-1.11.2/external/jquery/jquery.js')?>"></script>
    <script src="<?=base_url('jquery-ui-1.11.2/jquery-ui.js')?>"></script>
    <link rel="stylesheet" href="<?=base_url('jquery-ui-1.11.2/jquery-ui.css')?>">
<style>
	#mulogo:hover{
		text-indent: -9999em;
		font-size: .5em;
		background: url(<?=base_url('images/mu_bw_line.png')?>) no-repeat left top;
	}

	td {
    	white-space: nowrap;
	}
	#courseType{
		margin: 10px -126px;
  		text-align: left;
	}
	input {
    width: 270px;
    height: 42px;
    margin-top: 25px;
    padding: 0 15px;
    background: rgba(45,45,45,.15);
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    border: 1px solid rgba(255,255,255,.15);
    -moz-box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
    -webkit-box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
    box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
    font-size: 14px;
    color: #07F;
    text-shadow: 0 1px 2px rgba(0,0,0,.1);
    -o-transition: all .2s;
    -moz-transition: all .2s;
    -webkit-transition: all .2s;
    -ms-transition: all .2s;
}
button {
    cursor: pointer;
    width: 200px;
    height: 44px;
    margin-top: 25px;
    padding: 0;
    background: #ef4300;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    border: 1px solid #ff730e;
    -moz-box-shadow:
        0 15px 30px 0 rgba(255,255,255,.25) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
    -webkit-box-shadow:
        0 15px 30px 0 rgba(255,255,255,.25) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
    box-shadow:
        0 15px 30px 0 rgba(255,255,255,.25) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
    font-size: 14px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 1px 2px rgba(0,0,0,.1);
    -o-transition: all .2s;
    -moz-transition: all .2s;
    -webkit-transition: all .2s;
    -ms-transition: all .2s;
}

button:hover {
    -moz-box-shadow:
        0 15px 30px 0 rgba(255,255,255,.15) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
    -webkit-box-shadow:
        0 15px 30px 0 rgba(255,255,255,.15) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
    box-shadow:
        0 15px 30px 0 rgba(255,255,255,.15) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
}

button:active {
    -moz-box-shadow:
        0 15px 30px 0 rgba(255,255,255,.15) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
    -webkit-box-shadow:
        0 15px 30px 0 rgba(255,255,255,.15) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
    box-shadow:        
        0 5px 8px 0 rgba(0,0,0,.1) inset,
        0 1px 4px 0 rgba(0,0,0,.1);

    border: 0px solid #ef4300;
}
</style>
</head>
<script>
 <?php
 		if(isset($result)){
 		$course=$result['course'];
 		$dept=$result['dept'];
 		if($result['status']){
 			echo "alert('You have already add $course in $dept department')";
 		}else{
 			echo "alert('You failed to add $course in $dept department')";
 		}}
 	?>
 </script>
<body>
<div id="wrapper">
	<div id="wrapper-bgtop">
		<div id="header-wrapper">
			<div id="header">

				<div id="logo">

					<a href="<?=base_url();?>" id="mulogo">

  						<img src="<?=base_url();?>images/mu_color_line.png" alt="MU Logo">

					</a>
					<h1 style="color: white; padding: 20px 5px 20px 5px; width: 600px; letter-spacing: 4px;">TA / PLA Application Portal</h1>
				</div>
				<div id="menu">
					<ul>
						<li class="active"><a href="<?=base_url('welcome/home')?>" accesskey="1" title="">Home</a></li>
						<li class="active"><a href="<?=base_url('table/index')?>" accesskey="1" title="">Review Applications</a></li>
						<li class="active"><a href="<?=base_url('table/course')?>" accesskey="4" title="">Add course</a></li>
						<li class="active"><a href="<?=base_url('register/logout')?>" accesskey="5" title="">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
<div id='page' class='container'>
	<div id='content'>
		<div id='courseType'>
			<select id="type">
				<option value="showcourse">Show Course</option>
				<option value="addcourse">Add course</option>
			</select>
		</div>
		<div id='show'>
			<?=$list?>
		</div>
	</div>
</div>
<script src="https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function(){
	
	$('#myTable').DataTable();
	 $("select#type").change(function(){
	 	var sel=$("select#type  option:selected");
	 	var url="<?=base_url('index.php/table')?>/"+sel.prop('value');
	 	//console.log(url);
	 	var xmlhttp = new XMLHttpRequest();
	 	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var res=xmlhttp.responseText;
                //var obj = JSON.parse(json);
                //console.log(obj.table);
                $("div#show").html(res);
                $('#myTable').DataTable();
            }
        }
        xmlhttp.open("post",url,true);
 		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 		xmlhttp.send();
	 });
});
</script>
