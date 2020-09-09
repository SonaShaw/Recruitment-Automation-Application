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
  <script>
var timeLeft = 20;
function timeOut(){
	
	var min_t = Math.floor(timeLeft/60);
	
	var sec_t = timeLeft%60;
	var min = check(min_t);
	var sec = check(sec_t);
	var leftTime = min + ":" + sec;
	if(timeLeft==10){
		alert("time left:  " + leftTime);
		
	}if(timeLeft<=0){
		clearTimeout(tm);
		document.getElementById("submit-test").submit();
		
	}else{
			
		document.getElementById("demo").innerHTML = leftTime;
	}
	timeLeft--;
	var tm = setTimeout(function(){timeOut()},1000);
}
function check(t){
	if(t<10){
		t = "0"+t;
	}
	return t;
}

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
		<br>
		<p>A script on this page starts a timer:</p>

		<p id="demo">kih</p>
		<form action="accounting_answer.php" method="POST" id = "submit-test">
		<div class="panel panel-primary" >
			
			<?php
				$mcq = new user;
				$catagory_id = 1;
				$mcq->set_session_for_catagory($catagory_id);
				$mcq->fetch_basic_question_set();
				$i=1;				
				foreach($mcq->question as $q)
				{
			?>	
				<div class = "panel-heading"  style="background-color:#081450;"><font color="white" face = "Times New Roman"><b><h2>Question: <?php echo  $i; ?></h2></b></font>
				</div>	
				<div class = "panel-body">
					
					<h4><?php echo nl2br($q["statement"]); ?></h4>
					<?php if(isset($q["answer1"])){ ?>
					<input type="radio" name="<?php echo $q["qid"] ?>" value="1"/><?php echo nl2br($q["answer1"]); ?><br/>
					<?php } ?>
					<?php if(isset($q["answer1"])){ ?>
					<input type="radio" name="<?php echo $q["qid"] ?>" value="2"/><?php echo nl2br($q["answer2"]); ?><br/>
					<?php } ?>
					<?php if(isset($q["answer1"])){ ?>
					<input type="radio" name="<?php echo $q["qid"] ?>" value="3"/><?php echo nl2br($q["answer3"]); ?><br/>
					<?php } ?>
					<?php if(isset($q["answer1"])){ ?>
					<input type="radio" name="<?php echo $q["qid"] ?>" value="4"/><?php echo nl2br($q["answer4"]); ?>
					<?php } ?>
					<input type="radio" checked = "checked" style = "visibility:hidden" name="<?php echo $q["qid"] ?>" value="not attemt"/>
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




</body>
</html>
