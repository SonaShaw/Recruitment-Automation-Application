<?php

include("../class/user.php");
$ans = new user;

$age = array($_POST);

$correct = 0;
$wrong = 0;
$no_ans = 0;
foreach($age as $product){
    foreach($product as $key => $val){
		$answer_status = false;
		if($val == "not attemt"){
			$no_ans++;
		}else if($ans->check_answer($key,$val)){
			$answer_status = true;
			$correct++;
		}else{
			$answer_status = false;
			$wrong++;
		}
		echo $key.":  ". $val."  ". $answer_status."<br>";
		
    }
}

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
</head>


<body>

<br>
<div id="container" align="center" >
    <img src="img/cis.jpg" alt=""  width = "160" height = "75" />
</div>



<div class="container" >
	<div class="row">
	<div class = "col-sm-3" style = "visibility:hidden">
		<br>
		<div class="panel panel-primary" >
			
		</div>
	</div>
	
	<div class = "col-sm-6">
		<br>
		<div class="panel panel-primary" >
			<div class = "panel-heading" align = "center" style="background-color:#081450;"><font face = "Times New Roman"><h3><b>Accounting Result</b></h3></font>
			</div>
			<div class = "panel-body">
						
			<form action="" method = "post">
				<?php
				echo "Correct answer: ".$correct."<br>";
				echo "Wrong answer: ".$wrong."<br>";
				echo "Not Attemted answer: ".$no_ans."<br>";
				echo "Score: ".$correct."<br>";
				echo $_SESSION['cnum']."<br>";
				echo $_SESSION['name']."<br>";
				echo $_SESSION['qset'];


				?>
				
				<div align = "center">
				<button type="submit" class="btn btn-default" style="width: 200px; height: 45px;"><font face = "Times New Roman" size="4"><b>Start Aptiude Test</b></font></button>
				</div>
			</form>
			</div>
		</div>
	</div>
	</div>
</div>
<script src = "js/recruitment.js" type = "text/javascript"></script>
</body>
</html>


