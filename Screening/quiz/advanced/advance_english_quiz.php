<?php
	include("../../class/user.php");
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

<!---------Timer Style----------->
<style>

.timer{
	width:150px;
	height:44px;
	float:right;
	text-align:center; 
	border:4px solid #081450;
	border-radius:10px
	
}
tr,td{
	padding:5px;
}
</style>

<script>
	window.location.hash="no-back-button";
	window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
	window.onhashchange=function(){window.location.hash="no-back-button";}
</script>
  
  
</head>


<body onload = "timeOut()">

<br>
<div id="container" align="center" >
    <img src="img/cis.jpg" alt=""  width = "160" height = "75" />
</div>



<div class="container" >
	<div class="row">
	<div class = "col-sm-12">
	<!----------Timer Class-------------->
		<div>
			<span class = "timer" >
				<td><font size = "5"><b><p id="demo"></p><b></font></td>
			</span>
		</div>
	</div>
	
	
	<div class = "col-sm-12">
		<br>
		
		<form action="advance_english_answer.php" method="POST" id = "submit-test">
		<div class="panel panel-primary" >
			<!----------------------fetch questions and set session variables---------------------------------->
			<?php
				$mcq = new user;
				$catagory_id = 3;
				$level_id = 2;
				$mcq->set_session_for_catagory_and_level($catagory_id,$level_id);
				$mcq->fetch_basic_question_set();
				$i=1;			// for question number.	
				foreach($mcq->question as $q)
				{
			?>	
				<div class = "panel-heading"  style="background-color:#081450;">
				<table>
				<table>
				<col width="100">
				<col width="900">
					<tr valign = "top">
						<td align = "top">
							<font color="white" face = "Times New Roman" size = "3"><b>Question <?php echo  $i; ?>:</b></font>
						</td>
						<!----------display question statement------------->
						<td>
							<strong><font color="white" face = "Times New Roman" size = "3"><?php echo nl2br($q["statement"]); ?></font></strong>
						</td>
					</tr>
				
				
				</table>
				</div>	
				<!-----------------display options and answer is hidden---------------------------->
				<div class = "panel-body">
					<table>
					<col width="40">
					<col width="960">
						
						<tr valign = "top">
							<td>
								<input type="radio" name="<?php echo $q["qid"] ?>" value="1"/>
							</td>
							<td>
								<strong><font face = "Times New Roman" size = "3"> <?php echo nl2br($q["answer1"]); ?></font></strong>
							</td>
						</tr>
						<tr valign = "top">
							<td>
								<input type="radio" name="<?php echo $q["qid"] ?>" value="2"/>
							</td >
							<td>
								<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer2"]); ?></font></strong>
							</td>
						</tr>
						<tr valign = "top">
							<td>
								<input type="radio" name="<?php echo $q["qid"] ?>" value="3"/>
							</td>
							<td>
								<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer3"]); ?></font></strong>
							</td>
						</tr>						
						<tr valign = "top">
							<td>
								<input type="radio" name="<?php echo $q["qid"] ?>" value="4"/>
							</td>
							<td>
								<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer4"]); ?></font></strong>
								<input type="radio" checked = "checked" style = "visibility:hidden" name="<?php echo $q["qid"] ?>" value="0"/>
							</td>
						</tr>
						
					
					</table>
					
				</div>
				
				<?php  

					$i++;
				}  ?> 
	
		</div>
		<div align = "center">
				<button type="submit"  class="btn btn-default" style="width: 100px; height: 45px;"><font face = "Times New Roman" size="4"><b>SUBMIT</b></font></button>
		</div>
		</form>
		<br><br>
	</div>
	</div>
</div>


<script src = "../js/quiz.js" type = "text/javascript"></script>

</body>
</html>
