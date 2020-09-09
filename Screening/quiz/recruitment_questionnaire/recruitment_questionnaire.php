<?php

	include("../../class/user.php");

	$next_page = new user;
	
	
	

if(isset($_POST['nextButton'])){
	
	echo extract($_POST);
	$cnum = $_SESSION["cnum"];
	
	$query = "insert into personal_details values ('$cnum','$salutation','$rescreen','$re_int_motive','$fathername',
	'$fatheroccupation','$mothername','$motheroccupation','$m_other_occupation','$siblings','$Maritalstatus','$spouse_name','$spouse_occupation',
	'$spouse_other_occupation','$child','$planning_for_child','$currentlocation','$locality','$time_estimated','$modeoftransport','$ca','$short_term_plans',
	'$long_term_plans','$issue','$physicalissue','$mentalissue','$medicalissue')";
	
	if($next_page->register($query)){
		echo "data successfully";
	}
	
	$query = "insert into professional_details values ('$cnum','$fresher','$course','$exam')";
	
	if($next_page->register($query)){
		echo "data successfully";
	}
	
	if($fresher == "no"){
		$query1 = "insert into no_fresher values ('$cnum','$working','$ledteam','$managed_client')";
		if($next_page->register($query1)){
		echo "data successfully";
		}
	}
	
	if($course == "yes"){
		$query1 = "insert into professional_course values ('$cnum','$ca','$cs','$costing','$other','$last_exam','$start','$leave')";
		if($next_page->register($query1)){
		echo "data successfully";
		}
	}

	
	if($exam == "yes"){
		$query1 = "insert into govt_exam values ('$cnum','$more_details','$share')";
		if($next_page->register($query1)){
		echo "data successfully";
		}
	}
	
	if($working == "yes"){
		$query1 = "insert into current_emp values ('$cnum','$name_of_org','$designation_at_org','$tenure','$present_salary','$reason_for_job','$notice_period','$expected_salary')";
		if($next_page->register($query1)){
		echo "data successfully";
		}
	}
	if($working == "no"){
		$query1 = "insert into last_emp values ('$cnum','$name_of_past_org','$designation_at_past_org','$tenure_past','$last_drawn_salary',
			'$reason_for_leaving_job','$notice_period_past','$present_salary_past')";
		if($next_page->register($query1)){
		echo "data successfully";
		}
	}
	
	if($ledteam == "yes"){
		$query1 = "insert into led_team values ('$cnum','$what_did_you_do_manage','$no_of_members','$what_capacity','$responsibilities','$an_instance')";
		if($next_page->register($query1)){
		echo "data successfully";
		}
	}
	
	if($managed_client == "yes"){
		$query1 = "insert into managed_client values ('$cnum','$what_did_you_do_manage_client','$no_of_members_client','$what_capacity_client',
		'$responsibilities_client','$an_instance_client','$a_big_instance_client','$an_urgent_client')";
		if($next_page->register($query1)){
		echo "data successfully";
		}
	}
	
	
	
	
	if($siblings == "yes"){
		//echo $brother1;
		//echo $brother2;
		//echo $brother_count;
		//echo $sister_count;
		for($i = 1; $i <= $brother_count; $i++){
			
			$str = "brother".$i;
			$value = $$str;
			//echo $$str."<br>";
			$query1 = "insert into siblings values ('$cnum','brother','$value')";
			if($next_page->register($query1)){
				echo "";
			}
			
		}
		for($i = 1; $i <= $sister_count; $i++){
			//$query1 = "insert into siblings values ()"
			$str = "sister".$i;
			$value = $$str;
			//echo $value."<br>";
			$query1 = "insert into siblings values ('$cnum','sister','$value')";
			if($next_page->register($query1)){
				echo "";
			}
			
		}
		//$query = "insert into siblings values ()"
	}
	if($child == "yes"){
		//echo $son1;
		//echo $daughter2;
		//echo $son_count;
		//echo $daughter_count;
		for($i = 1; $i <= $son_count; $i++){
			
			$str = "son".$i;
			$value = $$str;
			//echo $$str."<br>";
			$query1 = "insert into children values ('$cnum','son','$value')";
			if($next_page->register($query1)){
				echo "";
			}
			
		}
		for($i = 1; $i <= $daughter_count; $i++){
			//$query1 = "insert into siblings values ()"
			$str = "daughter".$i;
			$value = $$str;
			//echo $value."<br>";
			$query1 = "insert into children values ('$cnum','daughter','$value')";
			if($next_page->register($query1)){
				echo "";
			}
			
		}
	}
		
	if($ca == "yes"){
			//echo $familymember."<br>";
			//echo $family_member_ca_qualification."<br>";
			//echo $ca_count;
			
		$query1 = "insert into ca values ('$cnum','$familymember','$family_member_ca_qualification')";
			if($next_page->register($query1)){
				echo "";
			}
		for($i = 2; $i <= $ca_count; $i++){
			//$query1 = "insert into siblings values ()"
			$str = "familymember".$i;
			$member = $$str;
			$str = "family_member_ca_qualification".$i;
			$qualification = $$str;
				//echo $member."<br>";
				//echo $qualification."<br>";
			$query1 = "insert into ca values ('$cnum','$member','$qualification')";
			if($next_page->register($query1)){
				echo "";
			}
			
		}
	}
	
	/*
	if($_SESSION["qset"] == "Basic")
		$next_page->url("../basic/basic_screening_test_start.php");
	else if($_SESSION["qset"] == "Intermediate")
		$next_page->url("../intermediate/intermediate_screening_test_start.php");
	else if($_SESSION["qset"] == "Advanced")
		$next_page->url("../advanced/advance_screening_test_start.php");
	else if($_SESSION["qset"] == "Professional")
		$next_page->url("../professional/professional_screening_test_start.php");
	*/
	$next_page->url("../../WS after questionnaire/accounting welcome.php");
}



					
?>


<style>
	*{
		
		font-family : times new roman;
	}
</style>

<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>recruitment Questionaries</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
  
  

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
			.subtable{
				border:none;
				
			}
			select{
				width : 200px;
			}
			.multiselect {
				width: 200px;
			}
select{
	width : 160px;
	height : 25px;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: block;
}

#checkboxes label:hover {
  background-color: #1e90ff;
}
			</style>
			
			
		<script>
			window.location.hash="no-back-button";
			window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
			window.onhashchange=function(){window.location.hash="no-back-button";}
		</script> 
	
		
	</head>
	<body onload = "changeFont('salutation');changeFont('name');changeFont('motheroccupation');changeFont('Maritalstatus');changeFont('spouse_occupation');
		changeFont('currentlocation'),changeFont('modeoftransport');changeFont('familymember'),changeFont('family_member_ca_qualification');
		changeFont('last_exam');changeFont('start')">
	<br>

	<div id="container" align="center" >
		<img src="../img/cis.jpg" alt=""  width = "160" height = "75" />
	</div>
	<br>
	
	
	<div class="container">
	<div class="row">
		<div class = "col-sm-12">
			<div class="">
					
			<div >
		
			<form action="#" method = "post">
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
								
								<label class="name"><font face = "Times New Roman" size = "3"><b>Salutation</b></font></label>		
							</td>
						</div>
						<div class="">
							<td>
								<select ID = "salutation" name = "salutation" onchange ="changeFont(this.id)" required>
									<OPTION value = ""></option>
									<OPTION VALUE = "Mr.">Mr.</option>
									<OPTION VALUE = "Ms.">Ms.</option>
									<OPTION VALUE = "Mrs.">Mrs.</option>
								</select>
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
								<INPUT id = "name" TYPE = "TEXT" NAME = "name" size = "40" oninput = "changeFont(this.id)"
								value = "<?php echo $_SESSION["name"] ?>"	AUTOFOCUS REQUIRED placeholder= "this will auto filled" readonly>	
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
								<input id = "yesrescreen" type="radio" name="rescreen" value = "yes" onchange = "showHiddenRow('motivation')"> 
								<font face = "Times New Roman" size = "3"><b>Yes</b> </font>&nbsp &nbsp 
								<input id = "norescreen" type="radio" name="rescreen" value = "NO" onchange = "hideDisplayedRow('motivation')"> 
								<font face = "Times New Roman" size = "3"><b>No</b></font>	 &nbsp
								
								
							</td>
						</div>
					</tr>
					<tr id = "motivation" style = "display:none">
						<div class="">
							<td>	
							
								<label class="name"><font face = "Times New Roman" size = "3"><b>What is your motivation to re-interview with us?</b></font></label>						
							</td>
						</div>
						<div class="">
							<td colspan = "2">
								
								<textarea style = "width:323px" id = "re_int_motive" name = "re_int_motive"  maxlength = "1000"
								oninput = "changeFont(this.id)"></textarea>
								<script src='https://cdnjs.cloudflare.com/ajax/libs/autosize.js/3.0.15/autosize.min.js'></script>
								<script>
									autosize(document.querySelectorAll('textarea'));
								</script>	
							</td>
						</div>	
					</tr>
					<tr>
					<tr>
						<div class="">
							<td>	
							
								<label class="name"><font face = "Times New Roman" size = "3"><b>Father's Name</b></font></label>						
							</td>
						</div>
						<div>
							<td>					
								<INPUT id = "fathername" TYPE = "TEXT" NAME = "fathername" size = "40" oninput = "changeFont(this.id)" AUTOFOCUS REQUIRED>
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
								<INPUT TYPE = "text" ID = "fatheroccupation" NAME = "fatheroccupation" size = "40" oninput="changeFont(this.id)" AUTOFOCUS REQUIRED>	
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
								<input id="mothername" name = "mothername" size = "40" oninput="changeFont(this.id)" autofocus required>	
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
								<select ID = "motheroccupation" name = "motheroccupation" onchange = "showtxtbox('motheroccupation','motheroccupationtxtbox');changeFont(this.id)">
									<OPTION value = ""></option>
									<OPTION VALUE = "Home-Maker">Home-Maker</option>
									<OPTION VALUE = "Others">Other</option>	
								</select> &nbsp &nbsp &nbsp
								<span id = "motheroccupationtxtbox" style = "visibility:hidden; display:none" oninput="changeFont(this.id)">
									<input type = "text" id = "m_other_occupation" name = "m_other_occupation" size = "40">
								</span>
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
								<input id = "yessibling" type="radio" name="siblings" value = "yes" onchange = "showsiblings('yessibling','nosibling','brother','sister')">
								<font face = "Times New Roman" size = "3"><b>Yes</b> </font> &nbsp &nbsp 
								<input id = "nosibling" type="radio" name="siblings" value = "no" onchange = "showsiblings('yessibling','nosibling','brother','sister');
								makeInputAndDivEmpty('numberofbrothers','numberofsisters','no_of_bros','no_of_sis')">
								<font face = "Times New Roman" size = "3"><b>No</b></font>	
								<span id = "brother" style = "visibility:hidden; display:none">
									No. of Brother(s) &nbsp <INPUT TYPE = "number" id= "numberofbrothers" NAME = "numberofbrothers" style="width: 40px;"
									oninput="changeFont(this.id); display('no_of_bros',this.id,'brother');isPositive(this.id);isMaxLimit(this.id)" AUTOFOCUS>	
									
									<div id = "no_of_bros" name = "no_of_bros"></div>
									<br>
								</span>
								<span id = "sister" style = "visibility:hidden; display:none">
									No. of Sister(s) &nbsp &nbsp <INPUT TYPE = "number" id = "numberofsisters" NAME = "numberofsisters" style="width: 40px;"
									oninput="changeFont(this.id); display('no_of_sis',this.id,'sister');isPositive(this.id);isMaxLimit(this.id)" AUTOFOCUS >	
									
									<div id = "no_of_sis" name = "no_of_sis"></div>
								</span>
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
								<select ID = "Maritalstatus" name = "Maritalstatus"  onchange = "showSpouseDetails('Maritalstatus','spousename','spouseoccupation');
								changeFont(this.id);showAndHideRowOnOption(this.id,'children')">
									<OPTION value = ""></option>
									<OPTION VALUE = "Single">Single</option>
									<OPTION VALUE = "Engaged">Engaged</option>
									<OPTION VALUE = "Married">Married</option>
									<OPTION VALUE = "Separated">Separated</option>
									<OPTION VALUE = "Divorced">Divorced</option>
									<OPTION VALUE = "Widowed">Widowed</option>
								</select> &nbsp &nbsp &nbsp
								<span id = "spousename" style = "visibility:hidden; display:none">
									<input type = "text" id = "spouse_name" name="spouse_name" size = "40" AUTOFOCUS placeholder = "Enter Spouse's Name" oninput="changeFont(this.id)">
								</span>
								<span id = "spouseoccupation" style = "visibility:hidden; display:none">
									 
									<select ID = "spouse_occupation" name = "spouse_occupation"  onchange = "showtxtbox(this.id,'spouseotheroccupation');changeFont(this.id)">
									<OPTION value = ""></option>
									<OPTION VALUE = "Home-Maker">Home-Maker</option>
									<OPTION VALUE = "Others">Other</option>
									</select>
									<span id = "spouseotheroccupation" style = "visibility:hidden; display:none">
											<input id= "spouse_other_occupation" name = "spouse_other_occupation" type = "text" size = "40" AUTOFOCUS placeholder = "Enter Occupation" oninput="changeFont(this.id)">
									</span>
								</span>
							</td>
						</div>
					</tr>
					<tr id = "children" style = "visibility:hidden; display:none">
						<div class="">
							<td>	
							
								<label class="name"><font face = "Times New Roman" size = "3"><b>Do you have child(ren)?</b></font></label>					
							</td>
						</div>
						<div class="">
							<td>
								<input id = "yeschild" type="radio" name="child" value = "yes" onchange = "showChild('yeschild','nochild','son','daughter','planing')">
								<font face = "Times New Roman" size = "3"><b>Yes</b> </font>&nbsp &nbsp 
								<input id = "nochild" type="radio" name="child" value = "no" onchange = "showChild('yeschild','nochild','son','daughter','planing');
								makeInputAndDivEmpty('number_of_son','number_of_daughter','no_of_son','no_of_daughter')">
								<font face = "Times New Roman" size = "3"><b>No</b> </font>
								<input  type="radio" name="child" value = "no" style = "display:none" checked>
								<span id = "son" style = "visibility:hidden; display:none">
									No. of Sons('s) &nbsp &nbsp &nbsp &nbsp <INPUT TYPE = "number" NAME = "numberofson" id="number_of_son"
									oninput="changeFont(this.id); displayNoOfChildren('no_of_son',this.id,'son')" style="width: 50px;"  AUTOFOCUS>	
									 
									 <div id = "no_of_son"></div>
									 <br>
								</span>
								<span id = "daughter" style = "visibility:hidden; display:none">
									 No. of Daughter('s) &nbsp <INPUT TYPE = "number" NAME = "numberofdaughter" style="width: 50px;" id="number_of_daughter"
									oninput="changeFont(this.id); displayNoOfChildren('no_of_daughter',this.id,'daughter')" AUTOFOCUS>	
									 
									 <div id = "no_of_daughter"></div>
								</span>
								<span id = "planing" style = "visibility:hidden; display:none">
									 
									 <INPUT TYPE = "text" id = "planning_for_child" NAME = "planning_for_child" size = "30" placeholder="When are you planning to have kids?" AUTOFOCUS>
								</span>
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
								<select ID = "currentlocation" name = "currentlocation" onchange="changeFont(this.id)">
									<OPTION value = ""></option>
									<OPTION VALUE = "North Kolkata">North Kolkata</option>
									<OPTION VALUE = "South Kolkata">South Kolkata</option>
									<OPTION VALUE = "Central Kolkata">Central Kolkata</option>
									<OPTION VALUE = "Howrah">Howrah</option>
									<OPTION VALUE = "North 24 Parganas">North 24 Parganas</option>
									<OPTION VALUE = "South 24 Parganas">South 24 Parganas</option>
								</select>
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
								<input type = "text" id="locality" name = "locality" size = "40" oninput="changeFont(this.id)" autofocus required>	
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
								<INPUT TYPE = "number" id = "time_estimated" NAME = "time_estimated" style="width: 50px;" 
								oninput="changeFont(this.id);isPositive(this.id)" AUTOFOCUS REQUIRED>	&nbsp &nbsp minutes
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
								<select ID = "modeoftransport" name = "modeoftransport" onchange = "changeFont(this.id)">
									<OPTION value = ""></option>
									<OPTION VALUE = "Metro">Metro</option>
									<OPTION VALUE = "Auto">Auto</option>
									<OPTION VALUE = "Bus">Bus</option>
									<OPTION VALUE = "Train">Train</option>
									<OPTION VALUE = "Two-wheeler">Two-wheeler</option>
									<OPTION VALUE = "Four-wheeler">Four-wheeler</option>
									<OPTION VALUE = "Break Journey">Break Journey</option>
								</select>
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
								<input id = "yesca" type="radio" name="ca" value = "yes" onchange = "showSpanOnRadio(this.id,'noca','family')"> 
								<font face = "Times New Roman" size = "3"><b>Yes</b> </font>&nbsp &nbsp 
								<input id = "noca" type="radio" name="ca" value = "no" onchange = "showSpanOnRadio('yesca','noca','family');makeDivEmpty('ca_container')">
								<font face = "Times New Roman" size = "3"><b>No</b></font>&nbsp
								<span id = "family" style = "visibility:hidden; display:none">
									<select ID = "familymember" name = "familymember" onchange="changeFont(this.id)">
										<OPTION value = ""></option>
										<OPTION VALUE = "Father">Father</option>
										<OPTION VALUE = "Mother">Mother</option>
										<OPTION VALUE = "Brother">Brother</option>
										<OPTION VALUE = "Sister">Sister</option>
										<OPTION VALUE = "Spouse">Spouse</option>
										<OPTION VALUE = "Others">Other</option>
									</select>
									<select ID = "family_member_ca_qualification" name = "family_member_ca_qualification" onchange="changeFont(this.id)">
										<OPTION value = ""></option>
										<OPTION VALUE = "CA">CA</option>
										<OPTION VALUE = "MBA">MBA</option>
										
									</select>
									
									<INPUT TYPE = "button" ID = "add_ca" NAME = "add_ca" value = "ADD" onclick = ""  AUTOFOCUS>
									<div id = "ca_container"></div>
								</span>
								
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
								
								<textarea style = "width:323px" id="short_term_plans" name="short_term_plans" oninput="changeFont(this.id)" maxlength="1000"
								REQUIRED></textarea>
								<script src='https://cdnjs.cloudflare.com/ajax/libs/autosize.js/3.0.15/autosize.min.js'></script>
								<script>
									autosize(document.querySelectorAll('textarea'));
								</script>	
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
								
								<textarea style = "width:323px" id="long_term_plans" name="long_term_plans" oninput="changeFont(this.id)" maxlength = "1000"
								REQUIRED></textarea>
								<script src='https://cdnjs.cloudflare.com/ajax/libs/autosize.js/3.0.15/autosize.min.js'></script>
								<script>
									autosize(document.querySelectorAll('textarea'));
								</script>	
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
								<input id = "yesissue" type="radio" name="issue" value = "yes" onchange = "showSpanOnRadio(this.id,'noissue','medicalissue')"> 
								<font face = "Times New Roman" size = "3"><b>Yes</b> </font>&nbsp &nbsp 
								<input id = "noissue" type="radio" name="issue" value = "no" onchange = "showSpanOnRadio('yesissue','noissue','medicalissue')">
								<font face = "Times New Roman" size = "3"><b>No</b></font> &nbsp
								<span id = "medicalissue" style = "visibility:hidden; display:none">
									<input type="checkbox" name="physicalissue" value="yes"> <font face = "Times New Roman" size = "3">Physical </font>&nbsp &nbsp
									<input type="checkbox" name="physicalissue" value="no" style = "display:none" checked> 
									<input type="checkbox" name="mentalissue" value="Mental"> <font face = "Times New Roman" size = "3">Mental</font>
									<input type="checkbox" name="mentalissue" value="no" style = "display:none" checked>
									<INPUT TYPE = "text" id = "medicalissue" NAME = "medicalissue" size = "40" oninput="changeFont(this.id)" placeholder="Enter issue" AUTOFOCUS>
								</span>
								
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
								<input id = "yesfresher" type="radio" name="fresher" value = "yes" 
								onchange = "showSpanOnRadio('nofresher',this.id,'working_anywhere');
								hideDisplayedRow('not_working_elsewhere');hideDisplayedRow('working_elsewhere');
								hideDisplayedRow('led_team');hideDisplayedRow('yes_led_team');
								hideDisplayedRow('managed_client');hideDisplayedRow('yes_managed_client')"><font face = "Times New Roman" size = "3"><b> Yes</b> </font> &nbsp &nbsp 
								<input id = "nofresher" type="radio" name="fresher" value = "no" onchange = "showHiddenRow('working_anywhere');
								showHiddenRow('led_team');showHiddenRow('managed_client')"><font face = "Times New Roman" size = "3"><b> No</b></font>&nbsp &nbsp &nbsp
								
							</td>
						</div>
					</tr>
					<tr id = "working_anywhere" style = "visibility:hidden; display:none" >
						<div class="">
							<td>	
								
								<label class="name"><font face = "Times New Roman" size = "3"><b>Are you working anywhere presently? </b></font></label>					
							</td>
						</div>
						<div class="">
							<td>
								<input id = "yesworking" type="radio" name="working" value = "yes" onchange = "showHiddenRow('working_elsewhere');hideDisplayedRow('not_working_elsewhere')"> 
								<font face = "Times New Roman" size = "3"><b>Yes</b> </font> &nbsp &nbsp 
								<input id = "noworking" type="radio" name="working" value = "no" onchange = "hideDisplayedRow('working_elsewhere');showHiddenRow('not_working_elsewhere')">
								<font face = "Times New Roman" size = "3"><b>No</b> </font> &nbsp &nbsp &nbsp
								
							</td>
						</div>
					</tr>
					<tr  id = "working_elsewhere" style = "visibility:hidden;display:none">
						<div class="">
							<td colspan = "2">
							<table style = "border:none">
								<col width = "500">
								<col width = "500">
									<tr>
										<div>
											<td class = "subtable">
										
												<label class="name"><font face = "Times New Roman" size = "3"><b>Name of organization</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<input type = "text" id="name_of_org" name = "name_of_org" size = "40" oninput="changeFont(this.id)" autofocus>
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
											
												<label class="name"><font face = "Times New Roman" size = "3"><b>Designation</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<input type = "text" id="designation_at_org" name = "designation_at_org" size = "40" oninput="changeFont(this.id)" autofocus>
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
											<td class = "subtable">
												<INPUT TYPE = "number" id = "tenure" NAME = "tenure" style = "width:50px" oninput = "isPositive(this.id);changeFont(this.id)" AUTOFOCUS>	
												<label><font face = "Times New Roman" size = "3">months</font></label>
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
												
												<label class="name"><font face = "Times New Roman" size = "3"><b>Present monthly salary</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<label><font face = "Times New Roman" size = "3">&#x20b9;</font></label>
												<INPUT TYPE = "number" id = "present_salary" NAME = "present_salary" style = "width:50px" oninput = "isPositive(this.id);
												changeFont(this.id)" AUTOFOCUS>
												
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
												<input type = "text" id="reason_for_job" name = "reason_for_job" size = "40" oninput="changeFont(this.id)" autofocus>
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
												<INPUT TYPE = "number" id = "notice_period" NAME = "notice_period" style = "width:50px" oninput = "isPositive(this.id);
												changeFont(this.id)" AUTOFOCUS>	
												<label><font face = "Times New Roman" size = "3">days</font></label>
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
												<label><font face = "Times New Roman" size = "3">&#x20b9;</font></label>
												<INPUT TYPE = "number" id = "expected_salary" NAME = "expected_salary" style = "width:50px" oninput = "isPositive(this.id);
												changeFont(this.id)" AUTOFOCUS>
												
											</td>
										</div>
									</tr>
							</table>
							</td>	
						</div>
					</tr>
					<tr id = "not_working_elsewhere" style = "visibility:hidden; display:none">
						
						<div class="">
							<td colspan = "2">
							<p align = center><font face = "Times New Roman" size = "3"><b> Enter details of last employment</b></font></p>
							<table style = "border:none">
								<col width = "500">
								<col width = "500">
									<tr>
										<div>
											<td class = "subtable">
											
												<label class="name"><font face = "Times New Roman" size = "3"><b>Name of organization</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<input type = "text" id="name_of_past_org" name = "name_of_past_org" size = "40" oninput="changeFont(this.id)" autofocus>
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
												
												<label class="name"><font face = "Times New Roman" size = "3"><b>Designation</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<input type = "text" id="designation_at_past_org" name = "designation_at_past_org" size = "40" oninput="changeFont(this.id)" autofocus>
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
											<td class = "subtable">
												<INPUT TYPE = "number" id = "tenure_past" NAME = "tenure_past" style = "width:50px" oninput = "isPositive(this.id);
												changeFont(this.id)" AUTOFOCUS>	
												<label><font face = "Times New Roman" size = "3">months</font></label>
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
												
												<label class="name"><font face = "Times New Roman" size = "3"><b>Last drawn monthly salary</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<label><font face = "Times New Roman" size = "3">&#x20b9;</font></label>
												<INPUT TYPE = "number" id = "last_drawn_salary" NAME = "last_drawn_salary" style = "width:50px" oninput = "isPositive(this.id);
												changeFont(this.id)" AUTOFOCUS>
												
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
												
												<label class="name"><font face = "Times New Roman" size = "3"><b>Reason for leaving this job</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<input type = "text" id="reason_for_leaving_job" name = "reason_for_leaving_job" size = "40" oninput="changeFont(this.id)" autofocus>
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
												<INPUT TYPE = "number" id = "notice_period_past" NAME = "notice_period_past" style = "width:50px" oninput = "isPositive(this.id);
												changeFont(this.id)" AUTOFOCUS>	
												<label><font face = "Times New Roman" size = "3">days</font></label>
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
												<label><font face = "Times New Roman" size = "3">&#x20b9;</font></label>
												<INPUT TYPE = "number" id = "present_salary_past" NAME = "present_salary_past" style = "width:50px" oninput = "isPositive(this.id);
												changeFont(this.id)" AUTOFOCUS>
												
											</td>
										</div>
									</tr>
							</table>
							</td>	
						</div>
					</tr>
					<tr id = "led_team" style = "visibility:hidden; display:none">
						<div class="">
							<td>	
								
								<label class="name"><font face = "Times New Roman" size = "3"><b>Have you ever managed/ led a team?</b></font></label>					
							</td>
						</div>
						<div class="">
							<td>
								<input id = "yesled" type="radio" name="ledteam" value = "yes" onchange = "showHiddenRow('yes_led_team')" >
								<font face = "Times New Roman" size = "3"><b>Yes</b> </font>&nbsp &nbsp 
								<input id = "noled" type="radio" name="ledteam" value = "no" onchange = "hideDisplayedRow('yes_led_team')">
								<font face = "Times New Roman" size = "3"><b>No</b></font>&nbsp &nbsp &nbsp
								
							</td>
						</div>
					</tr>
					
					<tr id = "yes_led_team" style = "visibility:hidden; display:none">
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
												<input type = "checkbox" id="what_did_you_do_manage" name = "what_did_you_do_manage" size = "40" value = "manage" autofocus >
												<font face = "Times New Roman" size = "3">Manage</font>&nbsp &nbsp 
												<input type = "checkbox" id="what_did_you_do_lead" name = "what_did_you_do_lead" size = "40" value = "lead" autofocus>
												<font face = "Times New Roman" size = "3">Lead</font>
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
												<INPUT TYPE = "number" id = "no_of_members" NAME = "no_of_members" style = "width:50px" oninput = "isPositive(this.id);
												changeFont(this.id)" AUTOFOCUS>
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
												<input type = "text" id="what_capacity" name = "what_capacity" size = "40" oninput="changeFont(this.id)" autofocus>
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
												<input type = "text" id="responsibilities" name = "responsibilities" size = "40" oninput="changeFont(this.id)" autofocus>
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
												<input type = "text" id="an_instance" name = "an_instance" size = "40" oninput="changeFont(this.id)" autofocus>
											</td>
										</div>
									</tr>
									
							</table>
							</td>	
						</div>
					</tr>
					<tr id = "managed_client" style = "visibility:hidden; display:none">
						<div class="">
							<td>	
								
								<label class="name"><font face = "Times New Roman" size = "3"><b>Have you ever managed/ intereacted with your client(s)?</b></font></label>					
							</td>
						</div>
						<div class="">
							<td>
								<input id = "yesclient" type="radio" name="managed_client" value = "yes" onchange = "showHiddenRow('yes_managed_client')" >
								<font face = "Times New Roman" size = "3"><b>Yes</b> </font>&nbsp &nbsp 
								<input id = "noclient" type="radio" name="managed_client" value = "no" onchange = "hideDisplayedRow('yes_managed_client')"> 
								<font face = "Times New Roman" size = "3"><b>No</b></font>&nbsp &nbsp &nbsp
								
							</td>
						</div>
					</tr>
					<tr id = "yes_managed_client" style = "visibility:hidden; display:none">
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
												<input type = "checkbox" id="what_did_you_do_manage_client" name = "what_did_you_do_manage_client" size = "40" value="manage" autofocus>
												<font face = "Times New Roman" size = "3">Manage</font>
												<input type = "checkbox" id="what_did_you_do_lead_client" name = "what_did_you_do_lead_client" size = "40" value="lead" autofocus>
												<font face = "Times New Roman" size = "3">Lead</font>
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
												<INPUT TYPE = "number" id = "no_of_members_client" NAME = "no_of_members_client" style = "width:50px" 
												oninput = "isPositive(this.id);changeFont(this.id)" AUTOFOCUS>
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
												<input type = "text" id="what_capacity_client" name = "what_capacity_client" size = "40" oninput="changeFont(this.id)" autofocus>
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
												<input type = "text" id="responsibilities_client" name = "responsibilities_client" size = "40" oninput="changeFont(this.id)" autofocus>
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
												<input type = "text" id="an_instance_client" name = "an_instance_client" size = "40" oninput="changeFont(this.id)" autofocus>
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
												<input type = "text" id="a_big_instance_client" name = "a_big_instance_client" size = "40" oninput="changeFont(this.id)" autofocus>
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
												<input type = "text" id="an_urgent_client" name = "an_urgent_client" size = "40" oninput="changeFont(this.id)" autofocus>
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
								<input id = "yescourse" type="radio" name="course" value = "yes" onchange = "showHiddenRow('professionalcourse')"> 
								<font face = "Times New Roman" size = "3"><b>Yes</b> </font>&nbsp &nbsp 
								<input id = "nocourse" type="radio" name="course" value = "no" onchange = "hideDisplayedRow('professionalcourse')">
								<font face = "Times New Roman" size = "3"><b>No</b></font>&nbsp &nbsp &nbsp
								
							</td>
						</div>
					</tr>
					
					<tr id = "professionalcourse" style = "visibility:hidden; display:none">
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
												<div class="multiselect">
													<div class="selectBox" onclick="showCheckboxes()">
														<select>
															<option><font face = "times new roman"> Select one or more option</font></option>
														</select>
														<div class="overSelect"></div>
													</div>
													<div id="checkboxes" style = "font-family:times new roman">
														<label for="CA"><input type="checkbox" id="one" name="ca" value = "CA"/>CA</label>
														<label for="CS"><input type="checkbox" id="two" name = "cs"value = "CS" />CS</label>
														<label for="Costing"><input type="checkbox" id="three" name = "costing"value = "Costing" />Costing</label>
														<label for="Other"><input type="checkbox" id="four" name = "other" value = "Other" onclick = "show(this.id,'other_txt')" />Other</label>
														<div id = "other_txt" style = "visibility:hidden; display:none">
															<input type = "text" id="other_course" name = "other_course" size = "40" oninput="changeFont(this.id)" autofocus>
														</div>
													</div>
												</div>
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
												<select id="last_exam" name="last_exam" onchange="changeFont(this.id)" >
													<option value = "">Select option</option>
													<option value="Foundation">Foundation</option>
													<option value="Intermediate">Intermediate</option>
													<option value="Final">Final</option>
													
												</select>
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
												<input type="month" id="start" name="start" min="2019-07" value = "2019-07" oninput = "changeFont(this.id)">
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
												<INPUT TYPE = "number" id = "leave" NAME = "leave" style = "width:50px" oninput = "isPositive(this.id);changeFont(this.id)" AUTOFOCUS>	
												<label><font face = "Times New Roman" size = "3">days</font></label>
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
								<input id = "yesexam" type="radio" name="exam" value = "yes" onchange = "showHiddenRow('govt_exam')">
								<font face = "Times New Roman" size = "3"><b>Yes</b> </font> &nbsp &nbsp 
								<input id = "noexam" type="radio" name="exam" value = "no" onchange = "hideDisplayedRow('govt_exam')"> 
								<font face = "Times New Roman" size = "3"><b>No</b> </font> &nbsp &nbsp &nbsp
								
							</td>
						</div>
					</tr>
					<tr id = "govt_exam" style = "visibility:hidden; display:none">
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
												<input type = "text" id="more_details" name = "more_details" size = "40" oninput="changeFont(this.id)" autofocus>
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
												<input type = "text" id="share" name = "share" size = "40" oninput="changeFont(this.id)" autofocus>
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
								autofocus required><font face = "Times New Roman" size ="3"><b> I hereby agree to the above terms.</b></font></span>
							</div>
						</td>
					</tr>
					
				</table>
				<br>
				<div align = "center">
					<button type="submit" name = "nextButton" class="btn btn-default"  style="width: 100px; height: 45px;""><font face = "Times New Roman" size="4"><b>NEXT</b></font></button>
				</div>
			</form> 
			

			</div>	
		
			</div>	
		</div>
	</div>
	</div>
	
	
	
	<script src = "js/candidate.js" type = "text/javascript"></script>
	<br><br>
	</body>
</html>



<script>
var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}


</script>