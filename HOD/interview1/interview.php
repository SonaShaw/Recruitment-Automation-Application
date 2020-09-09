
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
		$check_query = "select * from interview where cnum = '$hidden_cnum'";
		$query = "insert into interview values ('$hidden_cnum','$noticable_point','$hr_feedback','$recomendation','$register_time')";
		if($userObj->check_entry($check_query) == 0){
			if($userObj->register($query)){
				$userObj->url("../hod_home.php");
			}
		}else{
			$message = "Candidate data already Exits";
			echo "<script>
				alert('$message'); 
				window.location.href='../hr_home.php'; 
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
			width : 80%;
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
									<button type="submit" name = "view_result" class="btn btn-default" style="width: 100px; height: 40px;""><font face = "Times New Roman" size="3"><b>click here</b></font></button>
								</td>
							</div>
						</tr>
					</form>
					
					
					<form action = "#" method = "post">
						<tr>
							<div class="">
								<td colspan = "2">
									<input id = "hidden_cnum" name = "hidden_cnum" type = "text" value = "" style = "display:none">
									<label class="name"><font face = "Times New Roman" size = "4"><b>Points noted about the candidate during the interview:</b></font></label>	
								</td>
							</div>
							
						</tr>
						<tr>
							<div class="">
								<td colspan = "2">
									
									<textarea style = "width:500px" name = "noticable_point" required></textarea>
									<script src='https://cdnjs.cloudflare.com/ajax/libs/autosize.js/3.0.15/autosize.min.js'></script>
									<script>
										autosize(document.querySelectorAll('textarea'));
									</script>	
								</td>
							</div>
							
							
						</tr>
						<tr>
							<div class="">
								<td colspan = "2">
									HR-Head,  <label ><font face = "Times New Roman" size = "4"><b><?php echo $_SESSION['name']; ?>	</b></font></label>'s Feedback
										
								</td>
							</div>
							
							
						</tr>
						<tr>
							<div class="">
								<td colspan = "2">
									<textarea style = "width:500px" name = "hr_feedback" required></textarea>
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
										<span><input id ="yesrecomended"type="radio" name="recomendation" value="proceed" required> </span>  Proceed with candidature
										<span><input id ="norecomended" type="radio" name="recomendation" value="reject" required></span>  Reject	
										
										
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