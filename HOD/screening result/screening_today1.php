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
	if(isset($_POST['goToHRHome'])){
		extract($_POST);
		//echo "hello";
		$cnum = $_SESSION['cnum'];
		//echo $_SESSION['candi_name'];
		//echo $_SESSION['candi_department'];
		//echo $_SESSION['candi_profile'];
		$check_query = "select * from final_score where cnum = '$cnum'";
		$query = "insert into final_score values ('$cnum','$accounting_marks','$excel_marks','$english_marks','$aptitude_marks',
		'$typing_marks',$accuracy,'$screening_status','$interview','$reason')";
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
    <img src="img/cis.jpg"  width = "160" height = "75" />
</div>
<br>
<div class="container">
	<div class="row">
	<div class = "col-sm-12">
	
		<div align = "right">
			<span style = "float:left">
				<a type="submit" name = "logout" href = "../hod_home.php" style="width: 100px; height: 45px;"><font face = "Times New Roman" size="4" color = "01a0c7"><b>Home</b></font></a>
			</span>
			<a type="submit" name = "logout" href = "../logout.php" style="width: 100px; height: 45px;"><font face = "Times New Roman" size="4" color = "01a0c7"><b>Logout</b></font></a>
		</div>
		<div class="">
			
			<div class = "panel-heading" align = "center" style="background-color:#081450;"><font face = "Times New Roman" color = "white">
				<h3><b>Screening Result Today</b></h3></font>
			</div>
			<div class = "">
				
				
					<table>
						<col width="100">
						<col width="500">
						<tr>
							<div class="">
							<td>				
								
								<label class="name"><font face = "Times New Roman" size = "4"><b>Candidate Details </b></font></label>		
							</td>
							</div>
							<form action = "#" method = "post">
								<div class="">
								<td>
									
										<select ID = "candidate_details" name = "candidate_details" oninput = "changeFont(this.id)">
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
									
									<label class="name"><font face = "Times New Roman" size = "4"><b>Source of candidate </b></font></label>	
								</td>
							</div>
							<div>
								<td>					
									<INPUT id = "completesource" TYPE = "TEXT" NAME = "salutation" size = "40" value = "<?php echo $complete_source; ?>"
									oninput = "changeFont(this.id)" AUTOFOCUS  placeholder= "this will auto populate" readonly>	
								</td>
							</div>
						</tr>
						<tr style="background-color:#081450;">
							<div class="">
								<td colspan = "2" align="left">	
									<label class="name" ><font face = "Times New Roman"color = "white"><h4><b>Marks </b></h4></font></label>			
								</td>
							</div>
						</tr>
						
						<form action = "#" method = "post">
						
						<tr>
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
								<INPUT id ="excelmarks" TYPE = "number" NAME = "excel_marks" style="width: 50px;" 
								oninput ="evaluateResult('passed','considered','failed','accountingmarks','excelmarks','englishmarks','aptitudemarks','typingmarks')"
								AUTOFOCUS required>
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
								<INPUT id ="englishmarks" TYPE = "number" NAME = "english_marks" style="width: 50px;" value = "<?php echo $english_marks; ?>" 
								oninput ="evaluateResult('passed','considered','failed','accountingmarks','excelmarks','englishmarks','aptitudemarks','typingmarks')" 
								AUTOFOCUS readonly required>
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
								<INPUT id ="aptitudemarks" TYPE = "number" NAME = "aptitude_marks" style="width: 50px;" value = "<?php echo $aptitude_marks; ?>" 
								oninput ="evaluateResult('passed','considered','failed','accountingmarks','excelmarks','englishmarks','aptitudemarks','typingmarks')"
								AUTOFOCUS readonly required>
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
									<INPUT id ="typingmarks" TYPE = "number" NAME = "typing_marks" style="width: 50px;"
									oninput ="evaluateResult('passed','considered','failed','accountingmarks','excelmarks','englishmarks','aptitudemarks','typingmarks')"
									AUTOFOCUS required>&nbsp &nbsp &nbsp
									<label><font face = "Times New Roman" size = "4"><b>Accuracy </b></font></label>&nbsp &nbsp
									<INPUT id ="accuracy" TYPE = "number" NAME = "accuracy" style="width: 50px;"
									oninput ="evaluateResult('passed','considered','failed','accountingmarks','excelmarks','englishmarks','aptitudemarks','typingmarks')"
									AUTOFOCUS required> %
								</td>
							</div>
						</tr>
						<tr>
							<div class="">
							<td>				
							
								<label class="name"><font face = "Times New Roman" size = "4"><b>Screening Result</b></font></label>		
							</td>
							</div>
							<div class="">
							<td>
								<span><input id ="passed" type="radio" name="screening_status" value="pass" 
										onchange ="evaluateResult('passed','considered','failed','accountingmarks','excelmarks','englishmarks','aptitudemarks','typingmarks')" required> 
										<font face = "Times New Roman" size = "3"> Pass </font></span>&nbsp
								<span><input id = "considered" type="radio" name="screening_status" value="consider"
										onchange ="evaluateResult('passed','considered','failed','accountingmarks','excelmarks','englishmarks','aptitudemarks','typingmarks')" required>
										<font face = "Times New Roman" size = "3">Consider</font></span> &nbsp
								<span><input id = "failed" type="radio" name="screening_status" value="fail" 
										onchange ="evaluateResult('passed','considered','failed','accountingmarks','excelmarks','englishmarks','aptitudemarks','typingmarks')" required> 
										<font face = "Times New Roman" size = "3"></font>Fail</font></span> &nbsp  
								
							</td>
							</div>
						</tr>
						<tr>
							<div class="">
							<td>				
							
								<label class="name"><font face = "Times New Roman" size = "4"><b>Take Interview </b></font></label>		
							</td>
							</div>
							<div class="">
							<td>
								<span><input id ="yesinterview"type="radio" name="interview" value="yes" onchange = "reasonForInterview('passed','failed','yesinterview','nointerview','reason')" required> </span>  Yes
								<span><input id ="nointerview" type="radio" name="interview" value="no" onchange = "reasonForInterview('passed','failed','yesinterview','nointerview','reason')" required></span>  No	
								<span><input id ="callforreinterview" type="radio" name="interview" value="Callforrei" onchange = "reasonForInterview('passed','failed','yesinterview','nointerview','reason')">  Call for re-screening</span>
								<span id = "reason" style = "visibility:hidden;">
										&nbsp &nbsp	<input type = "text" id= "reason" name = "reason" size = "25" AUTOFOCUS  placeholder = "Enter reason">
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

<script src = "../js/main1.js" type = "text/javascript"> </script>

</body>
</html>
