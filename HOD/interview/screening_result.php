<?php
	include("../class/user.php");
	
	$userObj = new user;
	$source = $userObj->get_source($_SESSION['cnum']);
	//$complete_source = $source['source']." - ".$source['subsource']." - ".$source['consultancy']." - ".$source['other_source'];
	if($source['subsource'] == ""){$subsource = "";}else{$subsource = " - ".$source['subsource'];}
	if($source['consultancy'] == ""){$consultancy = "";}else{$consultancy = " - ".$source['consultancy'];}
	if($source['other_source'] == ""){$other_src = "";}else{$other_src = " - ".$source['other_source'];}
	$complete_source = $source['source'].$subsource.$consultancy.$other_src;
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
			*{
				font-family : times new roman;
				font-weight : bold;
			}
			.cut-off{
				float:right;
				width:80px;	
			}
			.excel-module{
				float:left;
				width:100px;
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
			<div id = "summary">
				
				
					<table>
						<col width="500">
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
								
								<label class="name"><font face = "Times New Roman" size = "4"><b>Candidate Details: </b></font></label>		
							</td>
							</div>
							
							<div class="">
								<td>
									<p><?php echo $_SESSION['candi_name']; ?></p>
									
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
									<p><?php echo $result['accounting_marks']; ?>
										<span class = "cut-off">/ 20</span>
									</p>
									
								</td>
							</div>
						</tr>
						<tr>
							<div class="">
								<td>	
								
									<label><font face = "Times New Roman" size = "4"><b>Excel Modules</b></font></label>	
								</td>
							</div>
							<div class="">
								<td>	
									<p>
										<span class = "excel-module">Autosum</span>
										<?php echo $result['exsum']+$result['exmax']+$result['exmin']+$result['exavg']; ?>
										<span class = "cut-off">/ 10</span>
									</p>
									<p>
										<span class = "excel-module">Filter</span>
										<?php echo $result['filter']; ?>
										<span class = "cut-off">/ 5</span>
									</p>
									<p>
										<span class = "excel-module">VLOOKUP</span>
										<?php echo $result['vlookup']; ?>
										<span class = "cut-off">/ 5</span>
									</p>
									<p>
										<span class = "excel-module">Cell Ref.</span>
										<?php echo $result['cellref']; ?>
										<span class = "cut-off">/ 5</span>
									</p>
									<p>
										<span class = "excel-module">Concatenate</span>
										<?php echo $result['vlookup']; ?>
										<span class = "cut-off">/ 5</span>
									</p>
									<p>
										<span class = "excel-module">Find & Replace</span>
										<?php echo $result['vlookup']; ?>
										<span class = "cut-off">/ 5</span>
									</p>
									<p>
										<span class = "excel-module">Pivot Table</span>
										<?php echo $result['vlookup']; ?>
										<span class = "cut-off">/ 5</span>
									</p>
								</td>
							</div>
						</tr>
						<tr>
							<div class="">
								<td>	
								
									<label><font face = "Times New Roman" size = "4"><b>Excel</b></font></label>	
								</td>
							</div>
							<div class="">
								<td>	
									<p><?php echo $result['excel_marks']; ?>
										<span class = "cut-off">/ 40</span>
									</p>
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
									<p><?php echo $result['english_marks']; ?>
										<span class = "cut-off">/ 10</span>
									</p>
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
									<p><?php echo $result['aptitude_marks']; ?>
										<span class = "cut-off">/ 10</span>
									</p>
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
									<p><?php echo $result['typing_marks']; ?> 
										<span class = "cut-off">(Cut-off: 22)</span>
									</p>
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
			<br>
			<div align = "center">
				<button name = "" onclick = "printPage('summary')" class="btn btn-default" style="width: 100px; height: 45px;""><font face = "Times New Roman" size="4"><b>PRINT</b></font></button>
			</div>
			
		
		</div>
		
	</div>
	</div>
</div>	

<script src = "../js/main1.js" type = "text/javascript"> </script>
<br><br>
</body>
</html>
