<?php
	include("../class/user.php");
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
	<div class = "col-sm-12">
	
	
	</div>
	
	<div class = "col-sm-12">
		<br>
		
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
						<col width = "800">
						<col width = "200">
						<tr>
							<td>
								<table>
								<col width="60">
								<col width="940">
								
									<tr valign = "top">
										<td>
											A &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="1" <?php echo (($q['response'] == 1) ? "checked":""); ?> disabled>
										</td>
										<td>
											<strong><font face = "Times New Roman" size = "3"> <?php echo nl2br($q["answer1"]); ?></font></strong>
										</td>
									</tr>
									<tr valign = "top">
										<td>
											B &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="2" <?php echo (($q['response'] == 2) ? "checked":""); ?> disabled>
										</td >
										<td>
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer2"]); ?></font></strong>
										</td>
									</tr>
									<tr valign = "top">
										<td>
											C &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="3" <?php echo (($q['response'] == 3) ? "checked":""); ?> disabled>
										</td>
										<td>
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer3"]); ?></font></strong>
										</td>
									</tr>						
									<tr valign = "top">
										<td>
											D &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="4" <?php echo (($q['response'] == 4) ? "checked":""); ?> disabled>
										</td>
										<td>
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer4"]); ?></font></strong>
											
										</td>
									</tr>
						
								</table>
							</td>
							<td>
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
						<col width = "800">
						<col width = "200">
						<tr>
							<td>
								<table>
								<col width="60">
								<col width="940">
								
									<tr valign = "top">
										<td>
											A &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="1" <?php echo (($q['response'] == 1) ? "checked":""); ?> disabled>
										</td>
										<td>
											<strong><font face = "Times New Roman" size = "3"> <?php echo nl2br($q["answer1"]); ?></font></strong>
										</td>
									</tr>
									<tr valign = "top">
										<td>
											B &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="2" <?php echo (($q['response'] == 2) ? "checked":""); ?> disabled>
										</td >
										<td>
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer2"]); ?></font></strong>
										</td>
									</tr>
									<tr valign = "top">
										<td>
											C &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="3" <?php echo (($q['response'] == 3) ? "checked":""); ?> disabled>
										</td>
										<td>
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer3"]); ?></font></strong>
										</td>
									</tr>						
									<tr valign = "top">
										<td>
											D &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="4" <?php echo (($q['response'] == 4) ? "checked":""); ?> disabled>
										</td>
										<td>
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer4"]); ?></font></strong>
											
										</td>
									</tr>
						
								</table>
							</td>
							<td>
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
						<col width = "800">
						<col width = "200">
						<tr>
							<td>
								<table>
								<col width="60">
								<col width="940">
								
									<tr valign = "top">
										<td>
											A &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="1" <?php echo (($q['response'] == 1) ? "checked":""); ?> disabled>
										</td>
										<td>
											<strong><font face = "Times New Roman" size = "3"> <?php echo nl2br($q["answer1"]); ?></font></strong>
										</td>
									</tr>
									<tr valign = "top">
										<td>
											B &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="2" <?php echo (($q['response'] == 2) ? "checked":""); ?> disabled>
										</td >
										<td>
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer2"]); ?></font></strong>
										</td>
									</tr>
									<tr valign = "top">
										<td>
											C &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="3" <?php echo (($q['response'] == 3) ? "checked":""); ?> disabled>
										</td>
										<td>
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer3"]); ?></font></strong>
										</td>
									</tr>						
									<tr valign = "top">
										<td>
											D &nbsp<input type="radio" name="<?php echo $q["qid"] ?>" value="4" <?php echo (($q['response'] == 4) ? "checked":""); ?> disabled>
										</td>
										<td>
											<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer4"]); ?></font></strong>
											
										</td>
									</tr>
						
								</table>
							</td>
							<td>
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
