
<?php
	include("../class/user.php");
	
	$userObj = new user;
	if(isset($_POST['view_result'])){
		
		$info = $_POST['candidate'];
		print_r($info);
		
		if($info == ""){
			$message = "Please select candidate to continue. Candidate starts from 2nd row";
			echo "<script>
				alert('$message'); 
				window.location.href='interview.php'; 
			</script>";
		}else{

			$dept = explode(" - ",$info);
			echo $cnum = $dept[0];
			$userObj->set_session($cnum,$dept[1],$dept[2],$dept[3]);
			$userObj->url("screening_result.php");
		}
	}
	
	if(isset($_POST['view_detailed_result'])){
		
		$info = $_POST['candidate'];
		//print_r($info);
		
		if($info == ""){
			$message = "Please select candidate to continue. Candidate starts from 2nd row";
			echo "<script>
				alert('$message'); 
				window.location.href='interview.php'; 
			</script>";
		}else{

			$dept = explode(" - ",$info);
			echo $cnum = $dept[0];
			$userObj->set_session($cnum,$dept[1],$dept[2],$dept[3]);
			$userObj->url("detailed_screening_result.php");
		}
	}
		
	if(isset($_POST['submit_interview'])){
		extract($_POST);
		//echo "hello";
		//$cnum = $_SESSION['cnum'];
		//echo $_SESSION['candi_name'];
		//echo $_SESSION['candi_department'];
		//echo $_SESSION['candi_profile'];
		echo $hidden_cnum;
		$time_stamp = $userObj->get_receptionist_timestamp($hidden_cnum);
		
		$register_time = $time_stamp['register_time'];
		$check_query = "select * from final_interview where cnum = '$hidden_cnum'";
		$query = "insert into final_interview values ('$hidden_cnum','$hod_feedback','$hod_recomendation')";
		if($userObj->check_entry($check_query) == 0){
			if($userObj->register($query)){
				if($hod_recomendation == "hire"){
					$query1 = "insert into hired_candidate values('$hidden_cnum','$annual_ctc','$date_of_joining','$other_terms')";
					if($userObj->register($query1)){
						echo "";
					}
				}
				$userObj->url("../hod_home.php");
			}
		}else{
			$message = "Candidate data already Exits";
			echo "<script>
				alert('$message'); 
				window.location.href='../hod_home.php'; 
			</script>";
		}
		
		
			
	}
	
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Interview</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  
  <style>
			table, th, td {
				
				border-collapse: collapse;
				padding-left : 30px;
				padding-right: 30px;
				padding-top : 5px;
				padding-bottom : 5px;
				border-spacing: 30px;
  
				}
			table{
			margin : 0 auto;
			width : 100%;
			}
			select{
				width : 500px;
			}
			
			
	* {
      font-family: times new roman;
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
		<div align = "right">
			<span style = "float:left">
				<a type="submit" name = "logout" href = "../hod_home.php" style="width: 100px; height: 45px;"><font face = "Times New Roman" size="4" color = "01a0c7"><b>Home</b></font></a>
			</span>
			<a type="submit" name = "logout" href = "../logout.php" style="width: 100px; height: 45px;"><font face = "Times New Roman" size="4" color = "01a0c7"><b>Logout</b></font></a>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading" align = "center" style="background-color:#030456;"><font face = "Times New Roman"><h3><b>Interview</b></h3></font>
				
			</div>
			<div class = "panel-body">
			
				
				<table>
					<col width="300">
					<col width="700">
					<form action = "#" method = "post">
						<tr>
							<div class="">
								<td>
								
									<label class="name"><font face = "Times New Roman" size = "4"><b>Select Candidate</b></font></label>				
								</td>
							</div>
							<div>
								<td>						
									<select ID = "candidate" name = "candidate" onchange = "transferValue(this.id,'hidden_cnum')">
										<OPTION value = ""></option>
										<?php
								
													$candidate_info = new user;
													$candidate_info->show_qualified_candidate();
													
													foreach($candidate_info->candidate as $candi)
													{
													?>
												 
												
													<OPTION ><?php echo $candi['cnum']." - ".$candi['name']." - ".$candi['department']." - ".$candi['profile'].
													" - ".$candi['register_time']; ?></option>
												
										<?php   }  ?> 
										
									</select>	
								</td>
							</div>
						</tr>
						<tr>
							<div class="">
								<td>
						
									<label class="name"><font face = "Times New Roman" size = "4"><b>View Screening Result </b></font></label>	
								</td>
							</div>
							<div>
								<td>					
									<button type="submit" name = "view_result" class="btn btn-default" style="width: 100px; height: 40px;""><font face = "Times New Roman" size="3"><b>Summary</b></font></button>
									<button type="submit" name = "view_detailed_result" class="btn btn-default" style="width: 100px; height: 40px;""><font face = "Times New Roman" size="3"><b>Detailed</b></font></button>
								</td>
							</div>
						</tr>
					</form>
					
					
					<form action = "#" method = "post">
						
						<tr>
							<div class="">
								<td >
									<input id = "hidden_cnum" name = "hidden_cnum" type = "text" value = "" style = "display:none">
									<label ><font face = "Times New Roman" size = "4"><b>HOD/CEO,  <?php echo $_SESSION['hod_name']; ?>	's Feedback </b></font></label>
										
								</td>
							</div>
							<div class="">
								<td>
									<textarea style = "width:500px" name = "hod_feedback" required></textarea>
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
									
										<label class="name"><font face = "Times New Roman" size = "4"><b>Recomendation: </b></font></label>		
									</td>
									</div>
									<div class="">
									<td>
										<span><input id ="yesrecomended"type="radio" name="hod_recomendation" value="hire" \
											 onchange = "showHiddenRow('hired_candidate')" required> </span>  Hire
										<span><input id ="norecomended" type="radio" name="hod_recomendation" value="proceed"
											 onchange = "showHiddenRow('hired_candidate')" required></span>  Proceed with candidature
										<span><input id ="reject" type="radio" name="hod_recomendation" value="reject"
											 onchange = "hideDisplayedRow('hired_candidate')"	required></span>  Reject										
										
										
									</td>
								</div>
						</tr>
						<tr id = "hired_candidate" style = "visibility:hidden; display:none">
							<div class="">
							<td colspan = "2">
							<table style = "border:none">
								<col width = "500">
								<col width = "500">
									<tr>
										<div>
											<td class = "subtable">
										
												<label class="name"><font face = "Times New Roman" size = "3"><b>Gross Annual CTC offered</b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<input type = "number" id="annual_ctc" name = "annual_ctc"  oninput="changeFont(this.id)" autofocus>
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
													
												<label class="name"><font face = "Times New Roman" size = "3"><b>Date of Joining: </b></font></label>&nbsp &nbsp &nbsp &nbsp		
											</td>
										</div>
										<div>
											<td class = "subtable">
											<input type = "date" name="date_of_joining">
												
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<td class = "subtable">
	
												<label class="name"><font face = "Times New Roman" size = "3"><b>Other terms: </b></font></label>
											</td>
										</div>
										<div>
											<td class = "subtable">
												<input type = "text" id="other_terms" name = "other_terms" size = "40" oninput="changeFont(this.id)" autofocus>
											</td>
										</div>
									</tr>
										
							</table>
							</td>	
							</div>
							
						</tr>
					
					
					
					
				</table>
				
				<br>
					<div align = "center">
						<button type="submit" name = "submit_interview" class="btn btn-default" style="width: 100px; height: 45px;""><font face = "Times New Roman" size="4"><b>NEXT</b></font></button>
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