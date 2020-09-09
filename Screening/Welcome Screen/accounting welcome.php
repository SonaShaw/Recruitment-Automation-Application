<?php

	include("../class/user.php");
	$next_page = new user;
	
	


if(isset($_POST['nextButton'])){
	/*	
	if($_SESSION["qset"] == "Basic")
		$next_page->url("../quiz/basic/basic_screening_test_start.php");
	else if($_SESSION["qset"] == "Intermediate")
		$next_page->url("../quiz/intermediate/intermediate_screening_test_start.php");
	else if($_SESSION["qset"] == "Advanced")
		$next_page->url("../quiz/advanced/advance_screening_test_start.php");
	else if($_SESSION["qset"] == "Professional")
		$next_page->url("../quiz/professional/professional_screening_test_start.php");
	*/
	$next_page->url("../quiz/recruitment_questionnaire/recruitment_questionnaire.php");
}



					
?>

<!doctype html>
<html>
	<head>
		<title>page3</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<style>
		table, th, td{
 
  border-collapse: collapse;
 
  padding-left : 10px;
  padding-right: 10px;
  padding-top : 10px;
  padding-bottom : 10px;
  border-spacing: 30px;
   
}





table{
width : 100%;
}

.hr
{
    list-style-type: none;
    /*margin: 0;
    padding: 0;*/
}

body {
font-weight: bold;
font-size:15px;;
}

		</style>
		
		
	
		
		
	</head>
	<body>
	<br>

	<div id="container" align="center" >
		<img src="img/cis.jpg" alt=""  width = "160" height = "75" />
	</div>
	<br>
	
	<div class="container">
	<div class="row">
		<div class = "col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading" align = "center" style="background-color:#081450;">
					<font face = "Times New Roman">
						<h3>Welcome to Cloud Infosolutions</h3>
					</font>
				</div>	
			</div>	
		</div>
	</div>
	</div>	<br>
	
	<div class="container">
	<div class="row">
		<div class = "col-sm-12">
		
			
			<span><p id ="name" ><font face = "times new roman"> Dear   <?php  echo $_SESSION['name'].","//.$_SESSION['qset']."  ".$_SESSION['department']."  ".$_SESSION['profile']; ?>
			</font></p></span>
			<p><font face = "times new roman">It is a pleasure to have you interview with us!</font></p>
			<p><font face = "times new roman">In the next screen, you will have a questionnaire asking you to fill certain personal and professional
			details. Please ensure that you fill out the form carefully.</font></p>
			<p><font face = "times new roman">We look forward to reading your answered questionnaire to get to know you better.</font></p>
			
			<br>
			<div>
					
				<div class = "hr">
					<li><font face = "times new roman">Regards,</font></li>
					<li><font face = "times new roman">HR-Head,</font></li>
					<li><font face = "times new roman">Cloud Infosolutions Pvt Ltd.</font></li>
				</div>
					
				
			</div>
			<form method="post" action="#">
			<div align = "center">
					<button type="submit" name = "nextButton" class="btn btn-default"  style="width: 100px; height: 45px;""><font face = "Times New Roman" size="4"><b>NEXT</b></font></button>
				</div>
			</form>
		</div>
	</div>
	</div>	
	
	
	
	
	</body>
</html>