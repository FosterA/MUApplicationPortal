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
  background-image:url(<?=base_url('images/Missouri.jpg')?>);
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

#curTeach {
  position: absolute;
  top: 2%;
  left: 51%;
  width: 320px;
  height: 110px;
  overflow: scroll;
}
#preTeach {
  position: absolute;
  top: 26%;
  left: 51%;
  width: 320px;
  height: 110px;
  overflow: scroll;
}
#likeTeach {
  position: absolute;
  top: 51%;
  left: 51%;
  width: 320px;
  height: 110px;
  overflow: scroll;
}
#divClose {
  position: absolute;
  top: 77%;
  left: 40%;
}
p,ul{
	margin:2px;
}
#specialBox p{
	margin:20px 10px;
}
#specialBox ul{
	margin:20px;
}
#infomation{
  padding: 10px;
	font-size:18px;
	width:800px;
	height:70px;
	margin :10px auto 0px;
  color: black;
}
#goback{
	font-size:20px;
}
#specialBox .close{
margin : 10px 270px
}
#noComment{
margin :100px 270px;
}
</style>
<link href="https://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?=base_url('jquery-ui-1.11.2/jquery-ui.css')?>" rel="stylesheet">

<script src="<?=base_url('jquery-ui-1.11.2/external/jquery/jquery.js')?>"></script>
<script src="<?=base_url('jquery-ui-1.11.2/jquery-ui.js')?>"></script>
<script src="https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>
 <script>
 	<?php
 		if(isset($result)){
 		$student_id=$result['student_id'];
 		if($result['type']=='add'){
 			
 			if($result['status']){
 				echo "alert('You have already accepted $student_id 's application')";
 			}else{
 				echo "alert('You FAILED TO accept $student_id 's application')";
 			}
 			}else{
 			
 			if($result['status']){
 				echo "alert('You have already denied $student_id 's application')";
 			}else{
 				echo "alert('You FAILED TO deny $student_id 's application')";
 			}
 			
 			}
 			
 		}
 	?>
 </script>
</head>
<body>
	<div id="overlay"></div>
	<div id='infomation'>    On this page, you can assign applicants as TA/PLA's and you can view each students grade for each course this applicant has previous taken.
	Additionally, you can view the applicants who have already be assigned as TA/PLA's and who have already be denied. </div>
	<center>
  <select id="type">
		<option value="general">All Applicants</option>
		<option value="avgScore">Avg Score</option>
		<option value="allScore">All Scores</option>
		<option value="Accept">Accept</option>
		<option value="Deny">Deny</option>
	</select>
</center>
	<div id="content">
  <div style="display:table-cell;">
  <div style="margin-left:auto;margin-right:auto;"></div>
	<?=$table?>
  </div>
	</div>
<script>
$(document).ready(function(){
	 $('#myTable').DataTable();
    
    
    $("body").on('click','button.detail',function(value){
    	var str=$(this).parent().parent().children().eq(1).text();
    	var href="<?=base_url('index.php/table/test')?>"+'/'+str;
    	var xmlhttp = new XMLHttpRequest();
   		var overlay = document.getElementById('overlay');
   		overlay.style.display = "block";
   		overlay.style.opacity = .8;
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            	var ele=$("<div id='specialBox'></div>");
            	$('body').prepend(ele);
                ele.html(xmlhttp.responseText);
            }
        }
        xmlhttp.open("post",href,true);
 		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 		xmlhttp.send();
   });
    
    
   
   
   $("body").on('click','button.comment',function(value){
   		var str=$(this).parent().parent().children().eq(1).text();
    	var href="<?=base_url('index.php/table/comment')?>"+'/'+str;
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
	 
	 $("select#type").change(function(){
	 	var sel=$("select#type  option:selected");
	 	var url="<?=base_url('index.php/table')?>/"+sel.prop('value');
	 	//console.log(url);
	 	var xmlhttp = new XMLHttpRequest();
	 	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var json=xmlhttp.responseText;
                var obj = JSON.parse(json);
                console.log(obj.table);
                $("div#content").html(obj.table);
                $('#myTable').DataTable();
            }
        }
        xmlhttp.open("post",url,true);
 		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 		xmlhttp.send();
	 });
	 
});





</script>

</body>
</html>