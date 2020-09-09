<?php

	include("../class/user.php");
	$next_page = new user;
	
	
	


					
?>

<!doctype html>
<html>
	<head>
		<title>Welcome Admin</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<style>
		table, th, td {
  
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
* {
      font-family: times new roman;
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
						<h1>Welcome to Cloud Infosolutions</h1>
					</font>
				</div>	
			</div>	
		</div>
	</div>
	</div>	<br>
	
	<div class="container">
	<div class="row">
		<div class = "col-sm-12">
			
			<span><p id ="name" > Dear  <?php  echo $_SESSION['name'].$_SESSION['qset']."  ".$_SESSION['department']."  ".$_SESSION['profile']; ?></p></span>
			<p>It is a pleasure to have you interview with us. We would like to know a little bit more about you. Please fill out the questionnaire in the next screen. Further, to ensure your fit with our company, we need to take a screening test that will test you on the core skills that you have gained since you embarked on your career.</p>
			<br>
			<div>
				<table>
					<col width="650">
					<col width="350">
					<tr>
						<div>
						<td>
							<p><u>Instructions for the screening test:</u></p>
							<ul>
								<li>You have to solve 10 Multiple Choice Questions each for English & Math. Each section will have a time limit of 10 minutes, so make sure to pace yourself well.</li>
								<li>You have 20 minutes to complete the Excel Test. You need to solve the individual case studies using the formula or functions mentioned in the respective individual “Sheet Name”.</li>
								<li>You have 10 minutes to complete the Typing Test. Once you press any keystroke, the timer will start and you need to keep typing the test that will appear on your screen till the auto-timer turns off.</li>
								
							</ul> 
							
							
							<p>All the very best for the test.</p>
							<br>
							<p>Regards,</p>
							<p>Juhi Kothari, </p>
							<p>HR-Head, Cloud Infosolutions</p>
							<br>
						</td>
						
						</div>
					</tr>
					
				</table>
				
				<br>
				
			</div>
			<form method="post" action="">
			<div align = "right">
				<button type="submit" class="btn btn-default" name = "nextButton" style="width: 200px; height: 50px;"><font face = "Times New Roman" size="3"><b>NEXT</b></font></button>
			</div>
			</form>
		</div>
	</div>
	</div>	
	
	</body>
</html>