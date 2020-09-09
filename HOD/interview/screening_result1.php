<?php
	include("../class/user.php");
	
	$userObj = new user;
	$source = $userObj->get_source($_SESSION['cnum']);
	$complete_source = $source['source']." - ".$source['subsource']." - ".$source['consultancy']." - ".$source['other_source'];
	$result = $userObj->get_result($_SESSION['cnum']);
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Screening Result Today</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
			table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
				padding-left : 30px;
				padding-right: 30px;
				padding-top : 10px;
				padding-bottom : 10px;
				border-spacing: 30px;
  
				}
			table{
			margin : 0 auto;
			width : 100%;
			}
			select{
				width : 500px;
				height : 25px;
			}
	</style>
  

  
</head>
<body onload = "changeFont('completesource');changeFont('candidate_details')" 	>

<br>
<div id="container" align="center" >
    <img src="../img/cis.jpg"  width = "160" height = "75" />
</div>
<br>
<div class="container">
	<div class="row">
	
	<div class = "col-sm-3" style = "visibility:hidden">
		<br>
		<div class="panel panel-primary" >
			
		</div>
	</div>
	<div class = "col-sm-6">
		<div class="">
			
			<div class = "panel-heading" align = "center" style="background-color:#081450;"><font face = "Times New Roman" color = "white">
				<h3><b>Screening Result</b></h3></font>
			</div>
			<div class = "">
				
				
					<table>
						<col width="420">
						<col width="500">
						<tr>
							<div class="">
							<td>				
								
								<label class="name"><font face = "Times New Roman" size = "4"><b>Candidate Details: </b></font></label>		
							</td>
							</div>
							
							<div class="">
								<td>
									<p><?php echo $result['cnum']; ?></p>
									
								</td>
							</div>
							
						</tr>
						
						<tr>
							<div class="">
								<td>
							
									<label class="name"><font face = "Times New Roman" size = "4"><b>Source of candidate: </b></font></label>	
								</td>
							</div>
							<div>
								<td>					
									<p><?php echo $complete_source; ?></p>
								</td>
							</div>
						</tr>
						
						<tr>
							<div class="">
								<td>	
								
									<label><font face = "Times New Roman" size = "4"><b>Accounting</b></font></label>	
								</td>
							</div>
							<div class="">
								<td>	
									<p><?php echo $result['accounting_marks']; ?></p>
								</td>
							</div>
						</tr>
						
						<div class="">
							<td>	
								
								<label><font face = "Times New Roman" size = "4"><b>Excel</b></font></label>	
							</td>
						</div>
						<div class="">
							<td>	
								<p><?php echo $result['excel_marks']; ?></p>
							</td>
						</div>
						</tr>
						<tr>
							<div class="">
								<td>	
								
									<label><font face = "Times New Roman" size = "4"><b>English</b></font></label>	
								</td>
							</div>
							<div class="">
								<td>	
									<p><?php echo $result['english_marks']; ?></p>
								</td>
							</div>
						</tr>
						<tr>
							<div class="">
								<td>	
									
									<label><font face = "Times New Roman" size = "4"><b>Aptitude</b></font></label>	
								</td>
							</div>
							<div class="">
								<td>	
									<p><?php echo $result['aptitude_marks']; ?></p>
								</td>
							</div>
						</tr>
						<tr>
							<div class="">
								<td>	
								
									<label><font face = "Times New Roman" size = "4"><b>Typing</b></font></label>	
								</td>
							</div>
							<div class="">
								<td>	
									<p><?php echo $result['typing_marks']; ?></p>
								</td>
							</div>
						</tr>
						<tr>
							<div class="">
								<td>				
								
									<label class="name"><font face = "Times New Roman" size = "4"><b>Screening Result:</b></font></label>		
								</td>
							</div>
							<div class="">
								<td>
									
									<p><?php echo $result['screening_status']; ?></p>
								</td>
							</div>
						</tr>
						<tr>
							<div class="">
								<td>				
								
									<label class="name"><font face = "Times New Roman" size = "4"><b>Take Interview: </b></font></label>		
								</td>
							</div>
							<div class="">
								<td>
									<p><?php echo $result['is_interviewed']. "&nbsp &nbsp". $result['reason'];  ?></p>	
								</td>
							</div>
						</tr>
						
						
					
					</table>
					
					
					
				
				
				
			
			</div>
			
			
		</div>
		
	</div>
	</div>
</div>	

<script src = "../js/main1.js" type = "text/javascript"> </script>

</body>
</html>
