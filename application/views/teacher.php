<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  
<style>


html { overflow-y: scroll; }
button {
    cursor: pointer;
    width: 77px;
    height: 30px;
    margin-top: 2px;
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
body { 
  /*background: #eee url('http://i.imgur.com/eeQeRmk.png'); *//* http://subtlepatterns.com/weave/ */
  background-image:url(<?=base_url('images/jesse3.jpg')?>);
  background-size: cover;
  line-height: 1;
  color: #585858;
  padding: 0px;
  padding-bottom: 55px;
}


br { display: block; line-height: 1.6em; } 




strong, b { font-weight: bold; } 

table,tr { border-collapse: collapse; border-spacing: 0; border:2px inset #24A198; }

/** page structure **/
#myTable{
	text-align:center;
  background-color: white;
}
#app table {
	background: #f5f5f5;
	border-collapse: separate;
	box-shadow: inset 0 1px 0 #fff;
	font-size: 16px;
	line-height: 24px;
	margin: 5px 20px;
	text-align: left;
	width: 200px;
}	

#app th {
	background: url(http://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#777, #444);
	border-left: 1px solid #555;
	border-right: 1px solid #777;
	border-top: 1px solid #555;
	border-bottom: 1px solid #333;
	box-shadow: inset 0 1px 0 #999;
	color: #fff;
  font-weight: bold;
	padding: 5px 10px;
	position: relative;
	text-shadow: 0 1px 0 #000;	
}

#app th:after {
	background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
	content: '';
	display: block;
	height: 25%;
	left: 0;
	margin: 1px 0 0 0;
	position: absolute;
	top: 25%;
	width: 100%;
}

#app th:first-child {
	border-left: 1px solid #777;	
	box-shadow: inset 1px 1px 0 #999;
}

#app th:last-child {
	box-shadow: inset -1px 1px 0 #999;
}

#app td {
	border-right: 1px solid #fff;
	border-left: 1px solid #e8e8e8;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #e8e8e8;
	padding: 1px 6px;
	position: relative;
	transition: all 300ms;
}

#app td:first-child {
	box-shadow: inset 1px 0 0 #fff;
}	

#app td:last-child {
	border-right: 1px solid #e8e8e8;
	box-shadow: inset -1px 0 0 #fff;
}	

#app tr {
	background: url(http://jackrugile.com/images/misc/noise-diagonal.png);	
}

#app tr:nth-child(odd) td {
	background: #f1f1f1 url(http://jackrugile.com/images/misc/noise-diagonal.png);	
}

#app tr:last-of-type td {
	box-shadow: inset 0 -1px 0 #fff; 
}

#app tr:last-of-type td:first-child {
	box-shadow: inset 1px -1px 0 #fff;
}	

#app tr:last-of-type td:last-child {
	box-shadow: inset -1px -1px 0 #fff;
}	

#app tbody:hover td {
	color: transparent;
	text-shadow: 0 0 3px #aaa;
}

#app tbody:hover tr:hover td {
	color: #444;
	text-shadow: 0 1px 0 #fff;
}

div#overlay {
	display: none;
	z-index: 2;
	background-color:rgba(55, 58, 71, 0.9);
	position: fixed;
	width: 100%;
	height: 100%;
	top: 0px;
	left: 0px;
	text-align: center;
}
div#specialBox {
  display: block;
  position: absolute;
  z-index: 3;
  left: 20%;
  top: 15%;
  width: 640px;
  height: 450px;
  overflow:scroll;
  background: #FFF;
  color: #000;
  border: 5px outset rgb(49, 140, 85);
  border-radius: 5px;
  box-shadow: 0px 0px 50px 5px black;
  font-size: 16px;
}


#divClose {
  position: absolute;
  top: 77%;
  left: 40%;
}
p,ul{
	margin:2px;
}


#goback{
	font-size:20px;
}
#specialBox .close{
position: absolute;
  top: 389px;
  left: 400px;
}
#specialBox #sumbit{
position: absolute;
  top: 389px;
  left: 130px;
  z-index: 999;
}
#noComment{
margin :100px 270px;
}
#textComment{
margin: 13px 19px;
  width: 598px;
  height: 361px;
  font-size:20px;
}
#infomation{
	font-size:16px;
	width:800px;
	height:100px;
	margin :10px auto 0px;
}

</style>
<link href="https://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?=base_url('jquery-ui-1.11.2/jquery-ui.css')?>" rel="stylesheet">

<script src="<?=base_url('jquery-ui-1.11.2/external/jquery/jquery.js')?>"></script>
<script src="<?=base_url('jquery-ui-1.11.2/jquery-ui.js')?>"></script>
<script src="https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>
</head>
<script>
<?php
 		if(isset($result)){
 		$student_id=$result['student_id'];
 		$status=$result['status'];
 			if($status){
 				echo "alert('You have already added successfully comment to $student_id !')";
 			}else{
 				echo "alert('You FAILED TO add comment to $student_id !')";
 			}
 			
 		}
 	?>
</script>
<body>

	<div id="overlay"></div>
	<div id='infomation'><br><center>
    <font color="red">On this page, you can make and view comments on each student. </font></center>
  </div>
	<div id="content">
	<?=$table?>
	</div>
<script>
$(document).ready(function(){
	 $('#myTable').DataTable();
    
    $("body").on('click','button.write',function(value){
    	var str=$(this).parent().parent().children().eq(1).text();
    	var href="<?=base_url('index.php/teacher/create')?>"+'/'+str;
    	var xmlhttp = new XMLHttpRequest();
   		var overlay = document.getElementById('overlay');
   		overlay.style.display = "block";
   		overlay.style.opacity = .8;
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            	var ele=$("<div id='specialBox'></div>");
            	$('body').prepend(ele);
                ele.html(xmlhttp.responseText);
                ele.append('<button type="button" class="close" id="close">close</button>');
            }
        }
        xmlhttp.open("post",href,true);
 		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 		xmlhttp.send();
   });
    
    
   
   
   $("body").on('click','button.view',function(value){
   		var str=$(this).parent().parent().children().eq(1).text();
    	var href="<?=base_url('index.php/teacher/view')?>"+'/'+str;
   		var xmlhttp = new XMLHttpRequest();
   		var overlay = document.getElementById('overlay');
   		overlay.style.display = "block";
   		overlay.style.opacity = .8;
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            	var ele=$("<div id='specialBox'></div>");
            	$('body').prepend(ele);
                ele.html(xmlhttp.responseText);
                ele.append('<button type="button" class="close" id="close">close</button>');
            }
        }
        xmlhttp.open("post",href,true);
 		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 		xmlhttp.send();
   }); 
   
   
   
   
   
	 $('body').delegate('#close','click',function(){
	 	$('#specialBox').remove();
	 	$('#overlay').css('display','none');
	 });
	
	$('body').delegate('#agreeButton','click',function(){
	 	$("form").attr('action',"<?=base_url('index.php/table/addStudent')?>");
	 });
	$('body').delegate('#disagreeButton','click',function(){
	 	$("form").attr('action',"<?=base_url('index.php/table/denyStudent')?>");
	 });
	 
	
});





</script>

</body>
</html>