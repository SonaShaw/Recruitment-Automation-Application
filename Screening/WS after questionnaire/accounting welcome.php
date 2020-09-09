
<?php

	include("../class/user.php");
	$next_page = new user;
	
	


if(isset($_POST['nextButton'])){

	if($_SESSION["qset"] == "Basic")
		$next_page->url("../quiz/basic/basic_screening_test_start.php");
	else if($_SESSION["qset"] == "Intermediate")
		$next_page->url("../quiz/intermediate/intermediate_screening_test_start.php");
	else if($_SESSION["qset"] == "Advanced")
		$next_page->url("../quiz/advanced/advance_screening_test_start.php");
	else if($_SESSION["qset"] == "Professional")
		$next_page->url("../quiz/professional/professional_screening_test_start.php");
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
		<img src="../img/cis.jpg" alt=""  width = "160" height = "75" />
	</div>
	<br>
	
	<div class="container">
	<div class="row">
		<div class = "col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading" align = "center" style="background-color:#081450;">
					<font face = "Times New Roman">
						<h3>Get set for the screening test!</h3>
					</font>
				</div>	
			</div>	
		</div>
	</div>
	</div>	<br>
	
	<div class="container">
	<div class="row">
		<div class = "col-sm-12">
		
			
			<span><p id ="name" ><font face = "times new roman"> Thank you    <?php  echo $_SESSION['name'] ?>  for filling out the questionnaire. Now, to ensure your fit with our company,
			we will take a screening test to evaluate you on the core skills that you have gained since you embarked on your career. If you clear
			the screening test, we will take your first round of interview.
			</font></p></span>
			
			<br>
			<div>
				<table class = "outer">
					<col width="550">
					<col width="450">
					<tr class = "row1">
						<div>
						<td class = "col1">
							<p><font face = "times new roman"><u>Instructions for the screening test:</u></font></p>
							<p><font face = "times new roman">
							<ul>
								<li>You have to solve Multiple Choice Questions for Accounting, English & Math.</li>
								<li>In the Excel test, you have to use formulae or functions to solve the cases given.</li>
								<li>You have to type a passage that is given in the Typing Test.</li>
							</ul> 
							</font></p>
							
							<p><font face = "times new roman">The table in the right shows the questions breakup in the test.</font></p>
							<p><font face = "times new roman">All the very best for the test.</font></p>
							
							<div class = "hr">
								<li><font face = "times new roman">Regards,</font></li>
								<li><font face = "times new roman">HR-Head,</font></li>
								<li><font face = "times new roman">Cloud Infosolutions Pvt Ltd.</font></li>
							</div>
							
							<br>
						</td>
						<td class = "col2">
							<table class = "inner" style = " border: 1px solid black;text-align:center;" >
							<col width = "100">
							<col width = "100">
							<col width = "100">
							<col width = "100">
							<col width = "100">
								<tr style = " border: 1px solid black" >
									<td style = " border: 1px solid black" >
										<font face = "times new roman"><b>Order of Questions <b></font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman"><b>Number of Questions<b></font>
									</td style = " border: 1px solid black">
									<td style = " border: 1px solid black">
										<font face = "times new roman"><b>Total Marks<b></font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman"><b>Cut-off<b></font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman"><b>Time (HH:MM)<b></font>
									</td>
								</tr>
								<tr style = " border: 1px solid black">
									<td style = " border: 1px solid black;text-align:left;">
										<font face = "times new roman">Accounting </font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">20 </font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">20</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">11</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">00:20</font>
									</td>
								</tr>
								<tr style = " border: 1px solid black">
									<td style = " border: 1px solid black;text-align:left;">
										<font face = "times new roman">English</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">10</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">10</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">6</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">00:10</font>
									</td>
								</tr>
								<tr style = " border: 1px solid black">
									<td style = " border: 1px solid black;text-align:left;">
										<font face = "times new roman">Aptitude</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">10</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">10</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">5</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">00:10</font>
									</td>
								</tr>
								<tr style = " border: 1px solid black">
									<td style = " border: 1px solid black;text-align:left;">
										<font face = "times new roman">Excel </font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">7</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">40</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">20</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">00:20</font>
									</td>
								</tr>
								<tr style = " border: 1px solid black">
									<td style = " border: 1px solid black;text-align:left;">
										<font face = "times new roman">Typing</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">-</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">-</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">22</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">00:10</font>
									</td>
								</tr>
								<tr style = " border: 1px solid black">
									<td style = " border: 1px solid black;text-align:right;" colspan = "4">
										<font face = "times new roman">Total</font>
									</td>
									<td style = " border: 1px solid black">
										<font face = "times new roman">01:10</font>
									</td>
									
								</tr>
							</table>
							
						</td>
						</div>
					</tr>
					
				</table>
				
				
				<br>
				
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