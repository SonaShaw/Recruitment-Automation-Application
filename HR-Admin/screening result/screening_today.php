<?php
	include("../class/user.php");
	
	$userObj = new user;
	$info = "Select Candidate";
	$complete_source = "";
	$cnum;
	
	if(isset($_POST['show_result'])){
	
		$info = $_POST['candidate_details'];
		
		if($info == ""){
			$message = "Please select candidate to continue. Candidate starts from 2nd row";
			echo "<script>
				alert('$message'); 
				window.location.href='screening_today.php'; 
			</script>";
		}

		$dept = explode(" - ",$info);
		$cnum = $dept[0];
		$marks = $userObj -> get_accounting_marks($cnum);
		$accounting_marks = $marks['marks'];
		$marks = $userObj -> get_english_marks($cnum);
		$english_marks = $marks['marks'];
		$marks = $userObj -> get_aptitude_marks($cnum);
		$aptitude_marks = $marks['marks'];
		$source = $userObj->get_source($cnum);
		$userObj->set_session($cnum,$dept[1],$dept[2],$dept[3]);
		if($source['subsource'] == ""){$subsource = "";}else{$subsource = " - ".$source['subsource'];}
		if($source['consultancy'] == ""){$consultancy = "";}else{$consultancy = " - ".$source['consultancy'];}
		if($source['other_source'] == ""){$other_src = "";}else{$other_src = " - ".$source['other_source'];}
		$complete_source = $source['source'].$subsource.$consultancy.$other_src;
	}
	if(isset($_POST['view_result'])){
		
		$info = $_POST['hidden_info'];
		//print_r($info);
		
		if($info == ""){
			$message = "Please select candidate to continue. Candidate starts from 2nd row";
			echo "<script>
				alert('$message'); 
				window.location.href='screening_today.php'; 
			</script>";
		}else{

			$dept = explode(" - ",$info);
			$cnum = $dept[0];
			$check_query = "select * from final_score where cnum = '$cnum'";
			if($userObj->check_entry($check_query) == 0){
				$message = "Candidate hasn't completed the screening";
				echo "<script>
					alert('$message'); 
					window.location.href='screening_today.php'; 
				</script>";
				
			}else{
				$userObj->set_session($cnum,$dept[1],$dept[2],$dept[3]);
				$userObj->url("screening_result.php");
			}
			
		}
	}
	if(isset($_POST['view_detailed_result'])){
		
		$info = $_POST['hidden_info'];
		//print_r($info);
		
		if($info == ""){
			$message = "Please select candidate to continue. Candidate starts from 2nd row";
			echo "<script>
				alert('$message'); 
				window.location.href='screening_today.php'; 
			</script>";
		}else{

			$dept = explode(" - ",$info);
			$cnum = $dept[0];
			$check_query = "select * from result where cnum = '$cnum'";
			if($userObj->check_entry($check_query) == 1){
				$userObj->set_session($cnum,$dept[1],$dept[2],$dept[3]);
				$userObj->url("detailed_screening_result.php");
			}else{
				$message = "Candidate hasn't completed the screening";
				echo "<script>
					alert('$message'); 
					window.location.href='screening_today.php'; 
				</script>";
			}
			
			
		}
	}
	
	if(isset($_POST['goToHRHome'])){
		extract($_POST);
		//echo "hello";
		$cnum = $_SESSION['cnum'];
		//echo $_SESSION['candi_name'];
		//echo $_SESSION['candi_department'];
		//echo $_SESSION['candi_profile'];
		$check_query = "select * from final_score where cnum = '$cnum'";
		$query = "insert into final_score values ('$cnum','$accounting_marks','$excel_marks','$sum',$max,'$min','$average','$filter','$vlookup',
			'$cellref','$concatenate','$find_n_replace','$pivot_table','$english_marks','$aptitude_marks','$typing_marks',$accuracy,'$screening_status','$interview','$reason')";
		if($userObj->check_entry($check_query) == 0){
			if($userObj->register($query)){
				$userObj->url("../hr_home.php");
			}
		}else{
			$message = "Candidate Score is already stored";
			echo "<script>
				alert('$message'); 
				window.location.href='screening_today.php'; 
			</script>";
		}
	}
	


?>

<style>
* {
      font-family: times new roman;
    }

</style>


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
				padding-left : 25px;
				padding-right: 25px;
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
    <img src="img/cis.jpg"  width = "160" height = "75" />
</div>

<div class="container">
	<div class="row">
	<div class = "col-sm-12">
		<div align = "right">
			<span style = "float:left">
				<a type="submit" name = "logout" href = "../hr_home.php" style="width: 100px; height: 45px;"><font face = "Times New Roman" size="4" color = "01a0c7"><b>Home</b></font></a>
			</span>
			<a type="submit" name = "logout" href = "../logout.php" style="width: 100px; height: 45px;"><font face = "Times New Roman" size="4" color = "01a0c7"><b>Logout</b></font></a>
		</div>
		<div class="">
			
			<div class = "panel-heading" align = "center" style="background-color:#081450;"><font face = "Times New Roman" color = "white">
				<h3><b>Screening Result Today</b></h3></font>
			</div>
			<div class = "">
				
				
					<table>
						<col width="200">
						<col width="800">
						<tr>
							<div class="">
							<td>				
								
								<label class="name"><font face = "Times New Roman" size = "4"><b>Candidate Details</b></font></label>		
							</td>
							</div>
							<form action = "#" method = "post">
								<div class="">
								<td>
									
										<select ID = "candidate_details" name = "candidate_details" onchange = "changeFont(this.id);transferAllValue(this.id,'hidden_info')">
										
											<OPTION value = ""><?php  echo $info; ?></option> 
											<?php
							
												$candidate_info = new user;
												$candidate_info->show_candidate();
												
												foreach($candidate_info->candidate as $candi)
												{
												?>
											 
											
												<OPTION ><?php echo $candi['cnum']." - ".$candi['name']." - ".$candi['department']." - ".$candi['profile'].
												" - ".$candi['register_time']; ?></option>
											
											<?php   }  ?> 
											
										</select>
											<span style = "float:right;">
											<button type="" name = "show_result" class="btn btn-default" style="width: 150px; height: 35px;"">
											<font face = "Times New Roman" size="3"><b>Show Result</b></font></button>
										</span>
											
									
								</td>
								</div>
							</form>
						</tr>
						
						<tr>
							<div class="">
								<td>
								
									<label class="name"><font face = "Times New Roman" size = "4"><b>Source of candidate</b></font></label>	
								</td>
							</div>
							<form action = "#" method = "post">
							<div>
								<td>					
									
									
									<INPUT id = "completesource" TYPE = "TEXT" NAME = "salutation" size = "40" value = "<?php echo $complete_source; ?>"
										oninput = "changeFont(this.id)" AUTOFOCUS  placeholder= "this will auto populate" readonly>
										<span style = "float:right">
											<input type = "text" name = "hidden_info" id = "hidden_info" style = "visibility:hidden;display:none">
											<label class="name"><font face = "Times New Roman" size = "4"><b>Print:</b></font></label>&nbsp &nbsp &nbsp
											<button type="submit" name = "view_result" class="btn btn-default" style="width: 100px; height: 35px;""><font face = "Times New Roman" size="3"><b>Summary</b></font></button>
											<button type="submit" name = "view_detailed_result" class="btn btn-default" style="width: 100px; height: 35px;""><font face = "Times New Roman" size="3"><b>Detailed</b></font></button>
										<span>
									
								</td>
							</div>
							</form>
						</tr>
						<tr style="background-color:#081450;">
							<div class="">
								<td colspan = "2" align="left">	
									<label class="name" ><font face = "Times New Roman"color = "white"><h4><b>Marks </></h4></font></label>			
								</td>
							</div>
						</tr>
					</table>
					<form action = "#" method = "post">
					<table>
						<col width = "200">
						<col width = "300">
						<col width = "200">
						<col width = "300">
						
						<tr>
							<div class="">
								<td>	
									
									<label><font face = "Times New Roman" size = "4"><b>Autosum</b></font></label>	
								</td>
							</div>
							<div class="">
								<td>	
									
									<select id="sum" name="sum" style = "width:auto" onchange="changeFont(this.id);total('sum','max','min','average',
										'filter','vlookup','cellref','concatenate','find_n_replace','pivot_table','excelmarks')" >
										<option value = "">SUM</option>
										<option value="0">0</option>
										<option value="2.5">2.5</option>				
									</select>
									<select id="max" name="max" style = "width:auto" onchange="changeFont(this.id);total('sum','max','min','average',
										'filter','vlookup','cellref','concatenate','find_n_replace','pivot_table','excelmarks')" >
										<option value = "">MAX</option>
										<option value="0">0</option>
										<option value="2.5">2.5</option>				
									</select>	
									<select id="min" name="min" style = "width:auto" onchange="changeFont(this.id);total('sum','max','min','average',
										'filter','vlookup','cellref','concatenate','find_n_replace','pivot_table','excelmarks')" >
										<option value = "">MIN</option>
										<option value="0">0</option>
										<option value="2.5">2.5</option>				
									</select>
									<select id="average" name="average" style = "width:auto" onchange="changeFont(this.id);total('sum','max','min','average',
										'filter','vlookup','cellref','concatenate','find_n_replace','pivot_table','excelmarks')" >
										<option value = "">AVERAGE</option>
										<option value="0">0</option>
										<option value="2.5">2.5</option>				
									</select>
								</td>
							</div>
							<div class="">
								<td>	
									
									<label><font face = "Times New Roman" size = "4"><b>Accounting</b></font></label>	
								</td>
							</div>
							<div class="">
								<td>	
									<INPUT id ="accountingmarks" TYPE = "number" NAME = "accounting_marks" style="width: 50px;" value = "<?php echo $accounting_marks; ?>"
									 oninput ="evaluateResult('passed','considered','failed','accountingmarks','excelmarks','englishmarks','aptitudemarks','typingmarks')"
									 AUTOFOCUS readonly required>
									 <INPUT id ="accountingmarks" TYPE = "number" NAME = "" style="width: 50px;display:none" value = "<?php echo $accounting_marks; ?>"
									 AUTOFOCUS required>
								</td>
							</div>
							
							
						</tr>
						<tr>
							<div class="">
								<td>	
									
									<label><font face = "Times New Roman" size = "4"><b>Filter</b></font></label>	
								</td>
							</div><div class="">
								<td>	
									<select id="filter" name="filter" style = "width:150px" onchange="changeFont(this.id);total('sum','max','min','average',
										'filter','vlookup','cellref','concatenate','find_n_replace','pivot_table','excelmarks')" >
										<option value = "">Filter</option>
										<option value="0">0</option>
										<option value="5">5</option>				
									</select>	
								</td>
							</div>
							<div class="">
								<td>	
									
									<label><font face = "Times New Roman" size = "4"><b>Excel</b></font></label>	
								</td>
							</div>
							<div class="">
								<td>	
									<INPUT id ="excelmarks" TYPE = "number" NAME = "excel_marks" style="width: 50px;" 
									oninput ="evaluateResult('passed','considered','failed','accountingmarks','excelmarks','englishmarks','aptitudemarks','typingmarks')"
									AUTOFOCUS required readonly> 
								</td>
							</div>
						</tr>
						<tr>
							<div class="">
								<td>	
									
									<label><font face = "Times New Roman" size = "4"><b>VLOOKUP</b></font></label>	
								</td>
							</div>
							<div class="">
								<td>	
									<select id="vlookup" name="vlookup" style = "width:150px" onchange="changeFont(this.id);total('sum','max','min','average',
										'filter','vlookup','cellref','concatenate','find_n_replace','pivot_table','excelmarks')" >
										<option value = "">VLOOKUP</option>
										<option value="0">0</option>
										<option value="5">5</option>				
									</select>	
								</td>
							</div>
							<div class="">
								<td>	
									
									<label><font face = "Times New Roman" size = "4"><b>English</b></font></label>	
								</td>
							</div>
							<div class="">
								<td>	
									<INPUT id ="englishmarks" TYPE = "number" NAME = "english_marks" style="width: 50px;" value = "<?php echo $english_marks; ?>" 
									oninput ="evaluateResult('passed','considered','failed','accountingmarks','excelmarks','englishmarks','aptitudemarks','typingmarks')" 
									AUTOFOCUS readonly required>
									<INPUT id ="englishmarks" TYPE = "number" NAME = "" style="width: 50px;display:none" value = "<?php echo $english_marks; ?>"  
									AUTOFOCUS required>
								</td>
							</div>
						</tr>
						<tr>
							<div class="">
								<td>	
									
									<label><font face = "Times New Roman" size = "4"><b>Cell Ref.</b></font></label>	
								</td>
							</div>
							<div class="">
								<td>	
									<select id="cellref" name="cellref" style = "width:150px" onchange="changeFont(this.id);total('sum','max','min','average',
										'filter','vlookup','cellref','concatenate','find_n_replace','pivot_table','excelmarks')" >
										<option value = "">Cell Ref.</option>
										<option value="0">0</option>
										<option value="5">5</option>				
									</select>	
								</td>
							</div>
							<div class="">
								<td>	
								
									<label><font face = "Times New Roman" size = "4"><b>Aptitude</b></font></label>	
								</td>
							</div>
							<div class="">
								<td>	
									<INPUT id ="aptitudemarks" TYPE = "number" NAME = "aptitude_marks" style="width: 50px;" value = "<?php echo $aptitude_marks; ?>" 
									oninput ="evaluateResult('passed','considered','failed','accountingmarks','excelmarks','englishmarks','aptitudemarks','typingmarks')"
									AUTOFOCUS readonly required>
									<INPUT id ="aptitudemarks" TYPE = "number" NAME = "" style="width: 50px;display:none" value = "<?php echo $aptitude_marks; ?>" 
									AUTOFOCUS required>
								</td>
							</div>
						</tr>
						<tr>
							<div class="">
								<td>	
									
									<label><font face = "Times New Roman" size = "4"><b>Concatenate</b></font></label>	
								</td>
							</div>
							<div class="">
								<td>	
									<select id="concatenate" name="concatenate" style = "width:150px" onchange="changeFont(this.id);total('sum','max','min','average',
										'filter','vlookup','cellref','concatenate','find_n_replace','pivot_table','excelmarks')" >
										<option value = "">Concatenate</option>
										<option value="0">0</option>
										<option value="5">5</option>				
									</select>	
								</td>
							</div>
							<div class="">
								<td>	
								
									<label><font face = "Times New Roman" size = "4"><b>Typing</b></font></label>	
								</td>
							</div>
							<div class="">
								<td>	
									<INPUT id ="typingmarks" TYPE = "number" NAME = "typing_marks" style="width: 50px;"
									oninput ="evaluateResult('passed','considered','failed','accountingmarks','excelmarks','englishmarks','aptitudemarks','typingmarks')"
									AUTOFOCUS required>&nbsp &nbsp &nbsp
									<label><font face = "Times New Roman" size = "4"><b>Accuracy  </b></font></label>&nbsp &nbsp
									<INPUT id ="accuracy" TYPE = "number" NAME = "accuracy" style="width: 50px;"
									oninput ="evaluateResult('passed','considered','failed','accountingmarks','excelmarks','englishmarks','aptitudemarks','typingmarks')"
									AUTOFOCUS required> %
								</td>
							</div>
						</tr>
						<tr>
							<div class="">
								<td>	
									
									<label><font face = "Times New Roman" size = "4"><b>Find & Replace</b></font></label>	
								</td>
							</div>
							<div class="">
								<td>	
									<select id="find_n_replace" name="find_n_replace" style = "width:150px" onchange="changeFont(this.id);total('sum','max','min','average',
										'filter','vlookup','cellref','concatenate','find_n_replace','pivot_table','excelmarks')" >
										<option value = "">Find & Replace</option>
										<option value="0">0</option>
										<option value="5">5</option>				
									</select>
								</td>
							</div>
							<div class="">
							<td>				
						
								<label class="name"><font face = "Times New Roman" size = "4"><b>Screening Result</b></font></label>		
							</td>
							</div>
							<div class="">
							<td>
								<span><input id ="passed" type="radio" name="screening_status" value="pass" 
										onchange ="evaluateResult('passed','considered','failed','accountingmarks','excelmarks','englishmarks','aptitudemarks','typingmarks')" required> 
										<font face = "Times New Roman" size = "3"><b> Pass </b></font></span>&nbsp
								<span><input id = "considered" type="radio" name="screening_status" value="consider"
										onchange ="evaluateResult('passed','considered','failed','accountingmarks','excelmarks','englishmarks','aptitudemarks','typingmarks')" required>
										<font face = "Times New Roman" size = "3"><b>Consider </b></font></span> &nbsp
								<span><input id = "failed" type="radio" name="screening_status" value="fail" 
										onchange ="evaluateResult('passed','considered','failed','accountingmarks','excelmarks','englishmarks','aptitudemarks','typingmarks')" required> 
										<font face = "Times New Roman" size = "3"></font><b>Fail</b></font></span> &nbsp  
								
							</td>
							</div>
						</tr>
						<tr>
							<div class="">
								<td>	
									
									<label><font face = "Times New Roman" size = "4"><b>Pivot Table</b></font></label>	
								</td>
							</div>
							<div class="">
								<td>	
									<select id="pivot_table" name="pivot_table" style = "width:150px" onchange="changeFont(this.id);total('sum','max','min','average',
										'filter','vlookup','cellref','concatenate','find_n_replace','pivot_table','excelmarks')" >
										<option value = "">Pivot Table</option>
										<option value="0">0</option>
										<option value="5">5</option>				
									</select>	
								</td>
							</div>
							<div class="">
							<td>				
								
								<label class="name"><font face = "Times New Roman" size = "4"><b>Take Interview</b></font></label>		
							</td>
							</div>
							<div class="">
							<td>
								<span><input id ="yesinterview"type="radio" name="interview" value="yes" onchange = "reasonForInterview('passed','failed','yesinterview','nointerview','reason')" required> </span> <b> Yes</b>&nbsp
								<span><input id ="nointerview" type="radio" name="interview" value="no" onchange = "reasonForInterview('passed','failed','yesinterview','nointerview','reason')" required></span> <b> No</b>&nbsp
								<span><input id ="callforreinterview" type="radio" name="interview" value="Callforrei" onchange = "reasonForInterview('passed','failed','yesinterview','nointerview','reason')"> <b> Call for re-screening</b></span>
								<span id = "reason" style = "visibility:hidden;display:none">
										&nbsp &nbsp	<input type = "text" id= "" name = "reason" size = "25" AUTOFOCUS  placeholder = "Enter reason">
								</span>
							</td>
							</div>
						</tr>
						
						
					
					</table>
					<br>
						<div align = "center">
							<button type="submit" name = "goToHRHome" class="btn btn-default" style="width: 100px; height: 45px;""><font face = "Times New Roman" size="4"><b>NEXT</b></font></button>
						</div>
					<br>
					</form>	
			
			</div>
			
			
		</div>
		
	</div>
	</div>
</div>	

<script src = "../js/main2.js" type = "text/javascript"> </script>

</body>
</html>
