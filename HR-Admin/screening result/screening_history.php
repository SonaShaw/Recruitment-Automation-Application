

<?php

	include("../class/user.php");
	$submit = new user;
	
	
	


if(isset($_POST['apply_filter'])){
	extract($_POST);
	echo $from_date;
	echo $to_date;
	echo $candidate_name;
	echo $department;
	echo $profile;
	echo $screening_result;
	echo $interview_result;
	echo $source;
	echo $subsource;
	
	echo $consultancy;
	echo $othersource;
	if($from_date == "" && $to_date == "" && $candidate_name == "" && $department == "" && 
		$profile == "" && $screening_result == "" && $interview_result == "" && $source == "" && $subsource == "" && $consultancy == "" && $othersource == ""){
			
		$query = "select * from candidate natural join final_score, final_interview, hired_candidate
			where candidate.cnum = final_score.cnum and candidate.cnum = final_interview.cnum";
		$submit->apply_filter($query);
		foreach($submit->candidate as $candi){
																				
			echo $candi['register_date']." - ".$candi['name']." - ".$candi['department']." - ".$candi['profile']." - ".$candi['screening_status'].
				" - ".$candi['hod_recomendation']." - ".$candi['source']." - ".$candi['ctc']." - ".$candi['date_of_joining'] ."<br>"; 
											
		}  
	}
}



					
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Screening History</title>
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
				width : 220px;
				height : 25px;
			}
	</style>
  
   
</head>

<body onload = "changeFont('from_date');changeFont('to_date');changeFont('candidate_name');changeFont('department');changeFont('profile');
	changeFont('screening_result');changeFont('interview_result');changeFont('source');changeFont('subsource');changeFont('consultancy')">
<br>

<div id="container" align="center" >
    <img src="img/cis.jpg" alt=""  width = "160" height = "75" />
</div>

<div class="container">
	<div class="row">
	
	<!--- This div is hidden in order to make the form at center-->
	<div class = "col-sm-2" style = "visibility:hidden">
	</div>
	<!----->
	
	<div class = "col-sm-8">
		<div align = "right">
			<span style = "float:left">
				<a type="submit" name = "logout" href = "../hr_home.php" style="width: 100px; height: 45px;"><font face = "Times New Roman" size="4" color = "01a0c7"><b>Home</b></font></a>
			</span>
			<a type="submit" name = "logout" href = "../logout.php" style="width: 100px; height: 45px;"><font face = "Times New Roman" size="4" color = "01a0c7"><b>Logout</b></font></a>
		</div>
		<div class="">
			<div class="panel-heading" align = "center" style="background-color:#030456;"><font face = "Times New Roman" color = "white"><h3><b>Screening History</b></h3></font>
				
			</div>
			<div class = "">
			
			<form action = "#" method = "post">
				<table>
					<col width="400">
					<col width="600">
					<tr>
						<div class="">
							<td>				
								
								<label class="name"><font face = "Times New Roman" size = "4"><b>Date: </b></font></label>		
							</td>
							</div>
							<div class="">
							<td>
								<label class="name"><font face = "Times New Roman" size = "4"><b>From: </b></font></label>
								<input type = "date" id = "from_date" name="from_date">&nbsp &nbsp
								<label class="name"><font face = "Times New Roman" size = "4"><b>To: </b></font></label>
								<input type = "date" id = "to_date" name="to_date">
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td>
								
								<label class="name"><font face = "Times New Roman" size = "4"><b>Candidate Name: </b></font></label>	
							</td>
						</div>
						<div>
							<td>					
								<INPUT id = "candidate_name" TYPE = "TEXT" NAME = "candidate_name" size = "40"  AUTOFOCUS >	
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td>
								
								<label class="name"><font face = "Times New Roman" size = "4"><b>Department</b></font></label>				
							</td>
						</div>
						<div>
							<td>						
								<select ID = "department" name = "department" onchange="populate('department','profile')">
									<OPTION value = ""></option>
									<OPTION value = "Accounting">Accounting</option>
									<OPTION value = "Admin">Admin</option>
									<OPTION value = "HR">HR</option>
									<OPTION value = "Tech">Tech</option>
									
								</select>	
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td>	
								
								<label class="name"><font face = "Times New Roman" size = "4"><b>Profile</b></font></label>
							</td>
						</div>
						<div>
							<td>					
								<select ID = "profile" name = "profile">
									<option value = ""></option>
								</select>	&nbsp &nbsp &nbsp
								
							</td>
						</div>	
					</tr>
					<tr>
						<div class="">
							<td>				
								
								<label class="name"><font face = "Times New Roman" size = "4"><b>Screening Result: </b></font></label>		
							</td>
						</div>
						<div class="">
							<td>
								<select ID = "screening_result" name = "screening_result">
									<OPTION value = ""></option> 
									<OPTION VALUE = "pass">Pass</option>
									<OPTION VALUE = "consider">Consider</option>
									<OPTION VALUE = "fail">Fail</option>
								</select>
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td>				
								
								<label class="name"><font face = "Times New Roman" size = "4"><b>Interview Result: </b></font></label>		
							</td>
						</div>
						<div class="">
							<td>
								<select ID = "interview_result" name = "interview_result">
									<OPTION value = ""></option> 
									<OPTION VALUE = "hire">Hired</option>
									<OPTION VALUE = "proceed">On hold</option>
									<OPTION VALUE = "reject">Rejected</option>
								</select>
							</td>
						</div>
					</tr>
					<tr>
					<div class="">
						<td>	
							
							<label class="name"><font face = "Times New Roman" size = "4"><b>Source</b></font></label>					
						</td>
					</div>
					<div class="">
						<td>			
							<select ID = "source" name = "source" onchange="populate(this.id,'subsource');
							showSpanForSource('source','subsource','consultancy','textbox');changeFont(this.id)">
								<OPTION value = ""></option>
								<OPTION VALUE = "Online">Online</option>
								<OPTION VALUE = "Consultancy">Consultancy</option>
								<OPTION VALUE = "Reference">Reference</option>
								<OPTION VALUE = "Other">Other</option>
							</select>	
							<span id ="selectbox" >
								<select ID = "subsource" name = "subsource" style = "visibility:hidden; display:none"  onchange = "populate('subsource','consultancy');
								showSpanForSubsource('subsource','consultancy','textbox');changeFont(this.id)">
									<option value = ""></option>
								</select>	
							</span>
							<span>
								<select id = "consultancy" name = "consultancy" style = "visibility:hidden; display:none" onchange = "changeFont(this.id)">
									<option value = ""></option>
								</select>
							</span>
							<span id = "textbox" name = "othersrc" style = "visibility:hidden; display:none">
								<input id = "othersource" type = "text" name = "othersource" size="26" oninput="changeFont(this.id)">
							</span>
						</td>
							
					</div>
				</tr>
					
				</table>
				<br>
				<div style="text-align:center">  
					<button type="submit" class="btn btn-default" name ="apply_filter" style="width: 150px; height: 45px;"><font face = "Times New Roman" size="4"><b>APPLY FILTER</b></font></button>
				</div> 
				
			</form>
			</div>
			
		</div>
		
	</div>
	</div>
	
	<table>
		<tr>
			<th>Date</th>
			<th>Name</th>
			<th>Department</th>
			<th>Profile</th>
			<th>Screening Result</th>
			<th>interview Result</th>
			<th>Score</th>
			<th>Salary Offered</th>
			<th>Date of Joining</th>
		</tr>
	
	</table>
</div>	


<script src = "../js/main1.js" type = "text/javascript"> </script>
</body>
</html>