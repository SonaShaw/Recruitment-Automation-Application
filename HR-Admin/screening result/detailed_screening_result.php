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
	$per_det = $userObj->get_personal_details($_SESSION['cnum']);
	//$pro_det = $userObj->ger_professional_details($_SESSION['cnum']);
	
	$sibling = $userObj->get_siblings($_SESSION['cnum']);
	$child = $userObj->get_children($_SESSION['cnum']);
	$chattered = $userObj->get_ca($_SESSION['cnum']);
	$pro_det = $userObj->get_professional_details($_SESSION['cnum']);
	$no_fresher = $userObj->get_no_fresher($_SESSION['cnum']);
	$salary = "";
	if($no_fresher['is_working_anywhere'] == "yes"){
		$working_anywhere = $userObj->get_current_employment($_SESSION['cnum']);
		$salary = $working_anywhere['current_salary'];
	}else{
		$working_anywhere = $userObj->get_last_employment($_SESSION['cnum']);
		$salary = $working_anywhere['last_salary'];
	}
	$led_team = $userObj->get_led_team($_SESSION['cnum']);
	$managed_client = $userObj->get_managed_client($_SESSION['cnum']);
	$pro_course = $userObj->get_professional_course($_SESSION['cnum']);
	$govt_exam = $userObj->get_govt_exam($_SESSION['cnum']);
?>
	
	
	
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Receptionist</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  
  <script>
			window.location.hash="no-back-button";
			window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
			window.onhashchange=function(){window.location.hash="no-back-button";}
	</script>

<!---------Timer Style----------->
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
			.subtable{
				border:none;
				
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
tr,td{
	padding:10px;
}

*{
	font-family:times new roman;
}

</style>

 
</head>


<body>
	

<br>
<div id="container" align="center" >
    <img src="../img/cis.jpg" alt=""  width = "160" height = "75" />
</div>



<div class="container" >
	<div class="row">
	
	<div class = "col-sm-3" style = "visibility:hidden">
		<br>
		<div class="panel panel-primary" >
			
		</div>
	</div>
	<div class = "col-sm-6">
		<div class="">
			<div align = "right">
				<a type="submit" name = "logout" href = "screening_today.php" style="width: 100px; height: 45px;"><font face = "Times New Roman" size="4" color = "01a0c7"><b>Back</b></font></a>
			</div>
			<div id="summary">
			<div class = "panel-heading" align = "center" style="background-color:#081450;"><font face = "Times New Roman" color = "white">
				<h3><b>Screening Result</b></h3></font>
			</div>
			<div>
				
				
					<table>
						<col width="500">
						<col width="500">
						<tr>
							<div class="">
							<td>				
								
								<label class="name"><font face = "Times New Roman" size = "4"><b>Candidate Number: </b></font></label>		
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
								
								<label class="name"><font face = "Times New Roman" size = "4"><b>Candidate Name: </b></font></label>		
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
			</div>
			<br>
			<div align = "center">
				<button name = "" onclick = "printPage('summary')" class="btn btn-default" style="width: 200px; height: 45px;""><font face = "Times New Roman" size="4"><b>PRINT SUMMARY</b></font></button>
			</div>
			<br>
			
		</div>
		
		
	</div>
	</div>
	
	<!----recruitment questionnaire -->
	
	
	<div class="row">
	
	<div class = "col-sm-12">
		<div class="">
			<div id = "questionnaire">
			<div class = "panel-heading" align = "center" style="background-color:#081450;"><font face = "Times New Roman" color = "white">
				<h3><b>Recruitment Questionnaire</b></h3></font>
			</div>
			<br>
			<div>
				
				
				<table>
					<col width = "500">
					<col width = "500">
					<tr style="background-color:#081450;">
						<div class="">
							<td colspan = "2" align="center">	
								<label class="name" ><font face = "Times New Roman"color = "white"><h3>PERSONAL DETAILS	</h3></font></label>			
							</td>
						</div>
					</tr>
					
					<tr>
						<div class="">
							<td>
								
								<label class="name"><font face = "Times New Roman" size = "3"><b>Name</b></font></label>	
							</td>
						</div>
						<div>
							<td>					
								<p><?php  echo $per_det['salutation'] ."&nbsp " .$_SESSION['candi_name']; ?></p>	
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td>	
						
								<label class="name"><font face = "Times New Roman" size = "3"><b>Are you re-interviewing with us?</b></font></label>					
							</td>
						</div>
						<div class="">
							<td>
								<p><?php  echo $per_det['re_interview']." &nbsp &nbsp &nbsp &nbsp".$per_det['motivation']; ?></p>
								
							</td>
						</div>
					</tr>
					
					<tr>
						<div class="">
							<td>	
							
								<label class="name"><font face = "Times New Roman" size = "3"><b>Father's Name</b></font></label>						
							</td>
						</div>
						<div>
							<td>					
								<p><?php echo $per_det['father_name']  ?></p>
							</td>
						</div>	
					</tr>
					<tr>
						<div class="">
							<td>	
							
								<label class="name"><font face = "Times New Roman" size = "3"><b>Father's Occupation</b></font></label>					
							</td>
						</div>
						<div class="">
							<td>
								<p><?php echo $per_det['father_occupation'] ?></p>	
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td>	
							
								<label class="name"><font face = "Times New Roman" size = "3"><b>Mother's Name</b></font></label>	
							</td>
						</div>
						<div class="">
							<td>	
								<p><?php echo  $per_det['mother_name']?></p>	
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td>
							
								<label class="name"><font face = "Times New Roman" size = "3"><b>Mother's Occupation</b></font></label>								
							</td>
						</div>
						<div class="">
							<td>
								<p><?php echo $per_det['mother_occupation']. "&nbsp &nbsp". $per_det['m_other_occupation'];  ?></p>
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td>	
							
								<label class="name"><font face = "Times New Roman" size = "3"><b>Do you have siblings?</b></font></label>					
							</td>
						</div>
						<div class="">
							<td>
								<p><?php echo $per_det['is_sibling'] ?></p>
								<p><?php
								if($per_det['is_sibling'] == "yes"){
									?>
									<table>
									
										<col width = "500">
										<col width = "500">
										<tr>
											<th> Sibling </td>
											<th> Qualification</td>
										</tr>
										
									<?php
									foreach($sibling as $s){
									?>
										
											<tr>
												<td> <?php echo $s["sibling_type"]; ?> </td>
												<td> <?php echo $s["qualification"]; ?></td>
											</tr>
										
									<?php
									}
									?>
									</table>
									<?php
								}
								?>
								</p>
								
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td>	
							
								<label class="name"><font face = "Times New Roman" size = "3"><b>Marital Status</b></font></label>					
							</td>
						</div>
						<div class="">
							<td>
								<p><?php echo $per_det['marital_status']. "&nbsp &nbsp &nbsp". $per_det['spouse_name']."&nbsp &nbsp &nbsp".$per_det['spouse_occupation']."&nbsp &nbsp &nbsp".$per_det['sp_other_occupation'];  ?></p>
								<p><?php
								if($per_det['is_child'] == "yes"){
									?>
									<table>
									
										<col width = "500">
										<col width = "500">
										<tr>
											<th> Child </td>
											<th> Age</td>
										</tr>
										
									<?php
									foreach($child as $c){
									?>
										
											<tr>
												<td> <?php echo $c["child_type"]; ?> </td>
												<td> <?php echo $c["age"]; ?></td>
											</tr>
										
									<?php
									}
									?>
									</table>
									<?php
								}
								?>
								</p>
							</td>
						</div>
					</tr>
					
					<tr>
						<div class="">
							<td>
							
								<label class="name"><font face = "Times New Roman" size = "3"><b>Which part of Kolkata/ West Bengal do you stay in?</b></font></label>								
							</td>
						</div>
						<div class="">
							<td>
								<p><?php echo $per_det['residence'];  ?></p>
							</td>
						</div>
					</tr>
					<tr>
						<div class="locality">
							<td>	
								
								<label><font face = "Times New Roman" size = "3"><b>Locality of Residence</b></font></label>	
							</td>
						</div>
						<div class="">
							<td>	
								<p><?php echo $per_det['locality'];  ?></p>	
							</td>
						</div>
					</tr>
					<tr>
						<div class="timeestimated">
							<td>	
						
								<label><font face = "Times New Roman" size = "3"><b>Time estimated to reach our office daily</b></font></label>	
							</td>
						</div>
						<div class="">
							<td>	
								<p><?php echo $per_det['estimated_time'];  ?> &nbsp &nbsp minutes </p>	
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td>
							
								<label class="name"><font face = "Times New Roman" size = "3"><b>Mode of Transport availed</b></font></label>								
							</td>
						</div>
						<div class="">
							<td>
								<p><?php echo $per_det['transport'];  ?>  </p>	
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td>	
								
								<label class="name"><font face = "Times New Roman" size = "3"><b>Is anyone in your family a CA and/ or an MBA?</b></font></label>					
							</td>
						</div>
						<div class="">
							<td>
								<p><?php echo $per_det['is_family_member_ca'];  ?> </p>	
								<p><?php
								if($per_det['is_family_member_ca'] == "yes"){
									?>
									<table>
									
										<col width = "500">
										<col width = "500">
										<tr>
											<th> Family Member </td>
											<th> Qualification</td>
										</tr>
										
									<?php
									foreach($chattered as $ch){
									?>
										
											<tr>
												<td> <?php echo $ch["family_member_ca"]; ?> </td>
												<td> <?php echo $ch["qualification"]; ?></td>
											</tr>
										
									<?php
									}
									?>
									</table>
									<?php
								}
								?>
								</p>
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td>	
							
								<label><font face = "Times New Roman" size = "3"><b>What are your plans in the next 2 years? (Short-term plans)</b></font></label>	
							</td>
						</div>
						<div class="">
							<td colspan = "2">
								<p><?php echo $per_det['short_term_plans'];  ?></p>		
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td>	
							
								<label><font face = "Times New Roman" size = "3"><b>What are your plans in the next 5-10 years? (Long-term plans)</b></font></label>	
							</td>
						</div>
						<div class="">
							<td colspan = "2">
								<p><?php echo $per_det['long_term_plans'];  ?></p>		
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td>	
							
								<label class="name"><font face = "Times New Roman" size = "3"><b>Do you suffer from any medical issues - physical or mental?</b></font></label>					
							</td>
						</div>
						<div class="">
							<td>
								<?php if($per_det['is_med_issue'] == "yes"){
										$issue = "Physical: ".$per_det['is_phy_issue']."&nbsp &nbsp &nbsp Mental: ".$per_det['is_mental_issue']."<br>".$per_det['desc_issue'];
										}else{
											$issue = "";
										} 
								?>
								<p><?php echo $per_det['is_med_issue']."&nbsp &nbsp &nbsp".$issue;  ?> </p>	
								
							</td>
						</div>
					</tr>
					<tr style="background-color:#030456;">
						<div class="">
							<td colspan = "2" align="center">	
								<label class="name" ><font face = "Times New Roman"color = "white"><h3>PROFESSIONAL DETAILS		</h3></font></label>			
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td>	
								
								<label class="name"><font face = "Times New Roman" size = "3"><b>Are you a fresher? </b></font></label>					
							</td>
						</div>
						<div class="">
							<td>
								<p><?php echo $pro_det['is_fresher'];  ?></p>	
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td>	
								
								<label class="name"><font face = "Times New Roman" size = "3"><b>Are you working anywhere presently? </b></font></label>					
							</td>
						</div>
						<div class="">
							<td>
								<p><?php echo $no_fresher['is_working_anywhere']; ?> </p>	
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td colspan = "2">
							<table style = "border:none">
								<col width = "500">
								<col width = "500">
									<tr>
										<div>
											<td  class = "subtable">
										
												<label class="name"><font face = "Times New Roman" size = "3"><b>Name of organization</b></font></label>
											</td>
										</div>
										<div>
											<td  class = "subtable">
												<p><?php echo $working_anywhere['name_of_org'];  ?> </p>	
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td  class = "subtable">
											
												<label class="name"><font face = "Times New Roman" size = "3"><b>Designation</b></font></label>
											</td>
										</div>
										<div>
											<td  class = "subtable">
												<p><?php echo $working_anywhere['designation'];  ?></p>	
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
											
												<label class="name"><font face = "Times New Roman" size = "3"><b>Tenure </b></font></label>
											</td>
										</div>
										<div>
											<td  class = "subtable">
												<p><?php echo $working_anywhere['tenure'];  ?> </p>	
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td  class = "subtable">
												
												<label class="name"><font face = "Times New Roman" size = "3"><b>Present monthly salary</b></font></label>
											</td>
										</div>
										<div>
											<td  class = "subtable">
												<p><?php echo $salary;  ?></p>	
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
											
												<label class="name"><font face = "Times New Roman" size = "3"><b>Reason for seeking a job change</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $working_anywhere['reason'];  ?> </p>	
											</td>
										</div>
									</tr>
									<tr>
										<div> 
											<td class = "subtable">
											
												<label class="name"><font face = "Times New Roman" size = "3"><b>Notice period</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $working_anywhere['notice_period'];  ?></p>	
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
											
												<label class="name"><font face = "Times New Roman" size = "3"><b>Expected Monthly Salary</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $working_anywhere['exp_salary'];  ?></p>	
											</td>
										</div>
									</tr>
							</table>
							</td>	
						</div>
					</tr>
					
					<tr>
						<div class="">
							<td>	
								
								<label class="name"><font face = "Times New Roman" size = "3"><b>Have you ever managed/ led a team?</b></font></label>					
							</td>
						</div>
						<div class="">
							<td>
								<p><?php echo $no_fresher['is_led_team']; ?> </p>	
							</td>
						</div>
					</tr>
					
					<tr>
						<div class="">
							<td colspan = "2">
							
							<table style = "border:none">
								<col width = "500">
								<col width = "500">
									<tr>
										<div>
											<td class = "subtable">
											
												<label class="name"><font face = "Times New Roman" size = "3"><b>What did you do?</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $led_team['role'];  ?></p>	
											</td>	
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
												
												<label class="name"><font face = "Times New Roman" size = "3"><b>How many members?</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $led_team['num_of_mem'];  ?></p>	
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
												
												<label class="name"><font face = "Times New Roman" size = "3"><b>In what capacity? </b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<?php echo $led_team['capacity'];  ?>
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
												
												<label class="name"><font face = "Times New Roman" size = "3"><b>What were your responsibilities pertaining to your 
												team?</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<?php echo $led_team['responsibility'];  ?>
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
											
												<label class="name"><font face = "Times New Roman" size = "3"><b>Tell us about an instance when you convinved your 
												team to work on a holiday to meet client's delivery commitment.</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $led_team['instance'];  ?> </p>	
											</td>
										</div>
									</tr>
									
							</table>
							</td>	
						</div>
					</tr>
					<tr>
						<div class="">
							<td>	
								
								<label class="name"><font face = "Times New Roman" size = "3"><b>Have you ever managed/ intereacted with your client(s)?</b></font></label>					
							</td>
						</div>
						<div class="">
							<td>
								<p><?php echo $no_fresher['is_managed_client']; ?> </p>	
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td colspan = "2">
							
							<table style = "border:none">
								<col width = "500">
								<col width = "500">
									<tr>
										<div>
											<td class = "subtable">
												
												<label class="name"><font face = "Times New Roman" size = "3"><b>What did you do?</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $managed_client['role'];  ?> </p>	
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
												
												<label class="name"><font face = "Times New Roman" size = "3"><b>How many client(s)?</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $managed_client['num_of_client'];  ?> </p>	
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
												
												<label class="name"><font face = "Times New Roman" size = "3"><b>In what capacity? </b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $managed_client['capacity'];  ?> </p>	
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
												
												<label class="name"><font face = "Times New Roman" size = "3"><b>What were your responsibilities pertaining to 
												your client(s)?</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $managed_client['responsibility'];  ?></p>	
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
												
												<label class="name"><font face = "Times New Roman" size = "3"><b>Tell us about an instance when you went out of
												your way to meet a client's expectations.</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $managed_client['expectation'];  ?> </p>	
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
												
												<label class="name"><font face = "Times New Roman" size = "3"><b>Tell us about an instance about what you did when
												a client made a big issue by esclating the errors made by your team.</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $managed_client['big_issue'];  ?> </p>	
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
											
												<label class="name"><font face = "Times New Roman" size = "3"><b>Consider that both you and your team have two 
												separate urgent client deliveries. And either of you need the other's help to complete the task at hand. How will
												you mange this situation?</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $managed_client['delivery'];  ?></p>	
											</td>
										</div>
									</tr>
									
							</table>
							</td>	
						</div>
					</tr>
					<tr>
						<div class="">
							<td>	
								
								<label class="name"><font face = "Times New Roman" size = "3"><b>Are you pursuing any professional course(s)?</b></font></label>					
							</td>
						</div>
						<div class="">
							<td>
								<p><?php echo $pro_det['is_pro_course'];  ?></p>	
							</td>
						</div>
					</tr>
					
					<tr>
						<div class="">
							<td colspan = "2">
							
							<table style = "border:none">
								<col width = "500">
								<col width = "500">
									<tr>
										<div>
											<td class = "subtable">
												
												<label class="name"><font face = "Times New Roman" size = "3"><b>Which course(s)?</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<?php if($pro_det['is_pro_course'] == "yes"){
															$course = $pro_course['ca']."&nbsp &nbsp &nbsp".$pro_course['cs']."&nbsp &nbsp &nbsp".$pro_course['costing']."&nbsp &nbsp &nbsp".$pro_course['other'];
														}else{
															$course = "";
														} 
												?>
												<p><?php echo $course;  ?></p>	
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
											
												<label class="name"><font face = "Times New Roman" size = "3"><b>Last examination stage cleared</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $pro_course['last_exam'];  ?> </p>	
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
											
												<label class="name"><font face = "Times New Roman" size = "3"><b>When do you plan to take your next examination?</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $pro_course['next_exam'];  ?></p>	
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
											
												<label class="name"><font face = "Times New Roman" size = "3"><b>How many days leave will you need - study leave + exam leave?</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $pro_course['leave_for_exam'];  ?> &nbsp &nbsp days</p>	
											</td>
										</div>
									</tr>
							</table>
							</td>	
						</div>
					</tr>
					<tr>
						<div class="">
							<td>	
								
								<label class="name"><font face = "Times New Roman" size = "3"><b>Are you pursuing or will you pursue or have you taken any state government/ central government/ banking examination(s)?</b></font></label>					
							</td>
						</div>
						<div class="">
							<td>
								<p> <?php echo $pro_det['is_govt_exam'];  ?></p>	
							</td>
						</div>
					</tr>
					<tr>
						<div class="">
							<td colspan = "2">
							
							<table style = "border:none">
								<col width = "500">
								<col width = "500">
									<tr>
										<div>
											<td class = "subtable">
												
												<label class="name"><font face = "Times New Roman" size = "3"><b>Please give us more details about such examination(s).</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $govt_exam['more_details'];  ?></p>	
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
												
												<label class="name"><font face = "Times New Roman" size = "3"><b>Is there anything else that you'd want to share?</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<p><?php echo $govt_exam['anything_else'];  ?> </p>	
											</td>
										</div>
									</tr>
							</table>
							</td>	
						</div>
					</tr>
					<tr >
						
						<td colspan = "2" align="center">
							<div class="" align = "left">						
								<p class="name" ><font face = "Times New Roman" size ="3"><h4><b>I hereby confirm that all the information I have provided above is 
								accurate and to the best of my knowledge. I understand that my candidature will be considered on the information I have 
								provided. If hired, my employment may be terminated if I am found to conceal, misstate or misrepresent material information.</b></h4></font></label>			
							</div>
						
						
						
							<div class="">
								
								<span style = "float:right"><input type = "checkbox" id="what_did_you_do_client1" name = "what_did_you_do_client1" size = "40"
								autofocus required checked disabled><font face = "Times New Roman" size ="3"><b> I hereby agree to the above terms.</b></font></span>
							</div>
						</td>
					</tr>
					
				</table>
			
			</div>
			</div>
			<br>
			<div align = "center">
				<button name = "" onclick = "printPage('questionnaire')" class="btn btn-default" style="width: 250px; height: 45px;""><font face = "Times New Roman" size="4"><b>PRINT QUESTIONNAIRE</b></font></button>
			</div>
			<br>
			
		</div>
		
		
	</div>
	</div>

	<div class="row">
	<div class = "col-sm-12">
		
		
		
		<div class="panel panel-primary" id = "accounting_paper">
		
		
			<div class="panel-heading" align = "center" style="background-color:#030456;"><font face = "Times New Roman"><h3><b>Accounting Paper</b></h3></font>
				
			</div>
			<br>
			<!----------------------fetch questions and set session variables---------------------------------->
			<?php
			
			
				$mcq = new user;
				$catagory_id = 1;
				//$level_id = 1;
				//$mcq->set_session_for_catagory_and_level($catagory_id,$level_id);
				$mcq->fetch_accounting_question_response($_SESSION['cnum'],$catagory_id);
				$i=1;		// for question number.		
				foreach($mcq->question as $q)
				{
					
			?>	
			
				
				<div class = "panel-heading"  style="background-color:#081450;">
				
				<table style = "border:none" >
				<col width="100">
				<col width="900">
					<tr valign = "top">
						<td align = "top"  class = "subtable">
							<font color="white" face = "Times New Roman" size = "3"><b>Question <?php echo  $i; ?>:</b></font>
						</td>
						<!----------display question statement------------->
						<td  class = "subtable">
							
							<strong><font color="white" face = "Times New Roman" size = "3"><?php echo nl2br($q["statement"]); ?></font></strong>
						</td>
					</tr>
				
				
				</table>
				</div>	
				<!-----------------display options and answer is hidden---------------------------->
				<div class = "panel-body">
					<table style="border:none">
						<col width = "800">
						<col width = "200">
						<tr>
							<td  class = "subtable">
								<table style = "border:none">
								<col width="60">
								<col width="940">
								
									<tr valign = "top">
										<td  class = "subtable">
											A &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="1" <?php echo (($q['response'] == 1) ? "checked":""); ?> disabled>
										</td>
										<td  class = "subtable">
											<strong><font face = "Times New Roman" size = "3"> <?php echo nl2br($q["answer1"]); ?></font></strong>
										</td>
									</tr>
									<tr valign = "top">
										<td  class = "subtable">
											B &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="2" <?php echo (($q['response'] == 2) ? "checked":""); ?> disabled>
										</td >
										<td  class = "subtable">
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer2"]); ?></font></strong>
										</td>
									</tr>
									<tr valign = "top">
										<td  class = "subtable">
											C &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="3" <?php echo (($q['response'] == 3) ? "checked":""); ?> disabled>
										</td>
										<td class = "subtable">
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer3"]); ?></font></strong>
										</td>
									</tr>						
									<tr valign = "top">
										<td  class = "subtable">
											D &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="4" <?php echo (($q['response'] == 4) ? "checked":""); ?> disabled>
										</td>
										<td  class = "subtable">
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer4"]); ?></font></strong>
											
										</td>
									</tr>
						
								</table>
							</td>
							<td  class = "subtable">
								<img src="<?php echo (($q['response'] == $q['correctanswer'])?"../img/right.jpg":"../img/wrong.jpg"); ?>"
									alt=""  width = "100" height = "100" />
								<br>
								<?php
									if($q['correctanswer'] == 1)
										$res = "A";
									else if($q['correctanswer'] == 2)
										$res = "B";
									else if($q['correctanswer'] == 3)
										$res = "C";
									else if($q['correctanswer'] == 4)
										$res = "D";
								?>
								<p> Correct Answer : <?php echo $res ?></p>
							</td>
						</tr>
					</table>
					
					
				</div>
				
				<?php  

					$i++;
				}  ?> 
	
		</div>
		<div align = "center">
			<button name = "" onclick = "printPage('accounting_paper')" class="btn btn-default" style="width: 240px; height: 45px;""><font face = "Times New Roman" size="4"><b>PRINT Accounting Paper</b></font></button>
		</div>
		<br>
		<div class="panel panel-primary" id = "english_paper">
		
		
			<div class="panel-heading" align = "center" style="background-color:#030456;"><font face = "Times New Roman"><h3><b>English Paper</b></h3></font>
				
			</div>
			<br>
			<!----------------------fetch questions and set session variables---------------------------------->
			<?php
			
			
				$mcq = new user;
				$catagory_id = 3;
				//$level_id = 1;
				//$mcq->set_session_for_catagory_and_level($catagory_id,$level_id);
				$mcq->fetch_accounting_question_response($_SESSION['cnum'],$catagory_id);
				$i=1;		// for question number.		
				foreach($mcq->question as $q)
				{
					
			?>	
			
				
				<div class = "panel-heading"  style="background-color:#081450;">
				
				<table style = "border:none">
				<col width="100">
				<col width="900">
					<tr valign = "top">
						<td align = "top"  class = "subtable">
							<font color="white" face = "Times New Roman" size = "3"><b>Question <?php echo  $i; ?>:</b></font>
						</td>
						<!----------display question statement------------->
						<td  class = "subtable">
							
							<strong><font color="white" face = "Times New Roman" size = "3"><?php echo nl2br($q["statement"]); ?></font></strong>
						</td>
					</tr>
				
				
				</table>
				</div>	
				<!-----------------display options and answer is hidden---------------------------->
				<div class = "panel-body">
					<table style = "border:none">
						<col width = "800">
						<col width = "200">
						<tr>
							<td  class = "subtable">
								<table style = "border:none">
								<col width="60">
								<col width="940">
								
									<tr valign = "top">
										<td  class = "subtable">
											A &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="1" <?php echo (($q['response'] == 1) ? "checked":""); ?> disabled>
										</td>
										<td  class = "subtable">
											<strong><font face = "Times New Roman" size = "3"> <?php echo nl2br($q["answer1"]); ?></font></strong>
										</td>
									</tr>
									<tr valign = "top">
										<td  class = "subtable">
											B &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="2" <?php echo (($q['response'] == 2) ? "checked":""); ?> disabled>
										</td >
										<td  class = "subtable">
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer2"]); ?></font></strong>
										</td>
									</tr>
									<tr valign = "top">
										<td  class = "subtable">
											C &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="3" <?php echo (($q['response'] == 3) ? "checked":""); ?> disabled>
										</td>
										<td  class = "subtable">
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer3"]); ?></font></strong>
										</td>
									</tr>						
									<tr valign = "top">
										<td class = "subtable">
											D &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="4" <?php echo (($q['response'] == 4) ? "checked":""); ?> disabled>
										</td>
										<td  class = "subtable">
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer4"]); ?></font></strong>
											
										</td>
									</tr>
						
								</table>
							</td>
							<td  class = "subtable">
								<img src="<?php echo (($q['response'] == $q['correctanswer'])?"../img/right.jpg":"../img/wrong.jpg"); ?>"
									alt=""  width = "100" height = "100" />
								<?php
									if($q['correctanswer'] == 1)
										$res = "A";
									else if($q['correctanswer'] == 2)
										$res = "B";
									else if($q['correctanswer'] == 3)
										$res = "C";
									else if($q['correctanswer'] == 4)
										$res = "D";
								?>
								<p> Correct Answer : <?php echo $res ?></p>
							</td>
						</tr>
					</table>
					
					
				</div>
				
				<?php  

					$i++;
				}  ?> 
	
		</div>
		<div align = "center">
			<button name = "" onclick = "printPage('english_paper')" class="btn btn-default" style="width: 240px; height: 45px;""><font face = "Times New Roman" size="4"><b>PRINT English Paper</b></font></button>
		</div>
		<br>
		<div class="panel panel-primary" id = "aptitude_paper">
		
		
			<div class="panel-heading" align = "center" style="background-color:#030456;"><font face = "Times New Roman"><h3><b>Aptitude Paper</b></h3></font>
				
			</div>
			<br>
			<!----------------------fetch questions and set session variables---------------------------------->
			<?php
			
			
				$mcq = new user;
				$catagory_id = 2;
				//$level_id = 1;
				//$mcq->set_session_for_catagory_and_level($catagory_id,$level_id);
				$mcq->fetch_accounting_question_response($_SESSION['cnum'],$catagory_id);
				$i=1;		// for question number.		
				foreach($mcq->question as $q)
				{
					
			?>	
			
				
				<div class = "panel-heading"  style="background-color:#081450;">
				
				<table style = "border:none">
				<col width="100">
				<col width="900">
					<tr valign = "top">
						<td align = "top"  class = "subtable">
							<font color="white" face = "Times New Roman" size = "3"><b>Question <?php echo  $i; ?>:</b></font>
						</td>
						<!----------display question statement------------->
						<td class = "subtable">
						
							<strong><font color="white" face = "Times New Roman" size = "3"><?php echo nl2br($q["statement"]); ?></font></strong>
						</td>
					</tr>
				
				
				</table>
				</div>	
				<!-----------------display options and answer is hidden---------------------------->
				<div class = "panel-body">
					<table style = "border:none">
						<col width = "800">
						<col width = "200">
						<tr>
							<td  class = "subtable">
								<table style = "border:none">
								<col width="60">
								<col width="940">
								
									<tr valign = "top">
										<td  class = "subtable">
											A &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="1" <?php echo (($q['response'] == 1) ? "checked":""); ?> disabled>
										</td>
										<td class = "subtable">
											<strong><font face = "Times New Roman" size = "3"> <?php echo nl2br($q["answer1"]); ?></font></strong>
										</td>
									</tr>
									<tr valign = "top">
										<td  class = "subtable">
											B &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="2" <?php echo (($q['response'] == 2) ? "checked":""); ?> disabled>
										</td >
										<td class = "subtable">
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer2"]); ?></font></strong>
										</td>
									</tr>
									<tr valign = "top">
										<td  class = "subtable">
											C &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="3" <?php echo (($q['response'] == 3) ? "checked":""); ?> disabled>
										</td>
										<td  class = "subtable">
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer3"]); ?></font></strong>
										</td>
									</tr>						
									<tr valign = "top">
										<td  class = "subtable">
											D &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="4" <?php echo (($q['response'] == 4) ? "checked":""); ?> disabled>
										</td>
										<td class = "subtable">
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer4"]); ?></font></strong>
											
										</td>
									</tr>
						
								</table>
							</td>
							<td  class = "subtable">
								<img src="<?php echo (($q['response'] == $q['correctanswer'])?"../img/right.jpg":"../img/wrong.jpg"); ?>"
									alt=""  width = "100" height = "100" />
								<?php
									if($q['correctanswer'] == 1)
										$res = "A";
									else if($q['correctanswer'] == 2)
										$res = "B";
									else if($q['correctanswer'] == 3)
										$res = "C";
									else if($q['correctanswer'] == 4)
										$res = "D";
								?>
								<p> Correct Answer : <?php echo $res ?></p>
							</td>
						</tr>
					</table>
					
					
				</div>
				
				<?php  

					$i++;
				}  ?> 
	
		</div>
		<div align = "center">
			<button name = "" onclick = "printPage('aptitude_paper')" class="btn btn-default" style="width: 240px; height: 45px;""><font face = "Times New Roman" size="4"><b>PRINT Aptitude Paper</b></font></button>
		</div>
		
		<br><br>
	</div>
	</div>
</div>


<script src = "../js/main1.js" type = "text/javascript"></script>

</body>
</html>
