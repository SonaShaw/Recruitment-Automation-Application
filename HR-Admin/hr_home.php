<?php
	include("class/user.php");
	$userObj = new user;
	
	//echo $_SESSION['name'];
	//echo $_SESSION['email'];
	//echo $_SESSION['password'];
	//echo $_SESSION['designation'];
	//$hr = $userObj->show_hr( $_SESSION['email'],$_SESSION['password']);
	//print_r($hr);
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>HR-Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
	.dropdown-submenu {
	position: relative;
	}

	.dropdown-submenu .dropdown-menu {
	top: 0;
	left: 100%;
	margin-top: -1px;
	}
	
	nav.navbar li a{
		
		color = white;
	}
	
	
	.dropbtn {
  background-color: #030456;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #01a0c7;}
	
	</style>
	<script>
		$(document).ready(function(){
			$('.dropdown-submenu a.test').on("click", function(e){
				$(this).next('ul').toggle();
				e.stopPropagation();
				e.preventDefault();
			});
		});
	</script>
  
  
</head>
<body>
<br>
<div id="container" align ="center" >
	<img src="img/cis.jpg" alt=""  width = "160" height = "75" />
</div>
<div class="container">
	<div class="row">
	<div class = "col-sm-12">
		<div>
			<div class = "panel-heading" style="background-color:white">
				<span style="float:left">
		
					<div id = "hrname"><font face = "Times New Roman" color = "black"><font face = "Times New Roman" color = "black"><h4><label>Welcome,  <?php echo $_SESSION['hr_name']  ?> !
					</label></h4></font></div>
					<div id = "hrrole"><font face = "Times New Roman" color = "black"><h4><font face = "Times New Roman" color = "black"><label> Designation:  
					<?php echo $_SESSION['hr_designation']  ?></font></h4></div>
				</span>
				
				<span style=" float:right">
					<?php
						if(function_exists('date_default_timezone_set')) {
							date_default_timezone_set("Asia/Kolkata");
						}
						$date = date("d-m-Y");
						$time = date("G:i:s ");
					?>
		
					<div align = "right"><p id = "currenttime"><font face = "Times New Roman" color = "black" ><h4><b><?php  echo $time  ?></b></h4></font></p></div>
					<div align = "right"><p id = "currentdate"><font face = "Times New Roman" color = "black" ><h4><b><?php  echo $date  ?></b></h4></font></p></div>
				</span>
			</div>	
		</div>
			
	</div>
		
	
	
	
	<div class = "col-sm-12">
		<div align = "right">
			<a type="submit" name = "logout" href = "logout.php" style="width: 100px; height: 45px;"><font face = "Times New Roman" size="4" color = "#01a0c7"><b>Logout</b></font></a>
		</div>
		<div class="panel panel-primary">
			<div class = "panel-heading" style="background-color:#030456;">
				<div class="collapse navbar-collapse" id="menu" >
                    <ul class="nav navbar-nav navbar-center" >
                        <li>
							<div class="dropdown">
							  <button class="dropbtn">Screening Status</button>
							  <div class="dropdown-content">
								<a href="#">Screening Status</a>
							  </div>
							</div>
						</li>
						<li>
							<div class="dropdown">
							  <button class="dropbtn">Screening Result</button>
							  <div class="dropdown-content">
								<a href="screening result/screening_today.php">Today</a>
								<a href="screening result/screening_history.php">Screening History</a>
								
							  </div>
							</div>
						</li>
						
                        
						<li>
							<div class="dropdown">
							  <button class="dropbtn">Interviews</button>
							  <div class="dropdown-content">
								<a href="interview/interview.php">Interviews</a>
							  </div>
							</div>
						</li>
                        <li>
							<div class="dropdown">
							  <button class="dropbtn">Screening Analytics</button>
							  <div class="dropdown-content">
								<a href="">Screening Analytics</a>
							  </div>
							</div>
						</li>
                        <li class="dropdown-submenu">
							<div class="dropdown">
							  <button class="dropbtn">Recruitment Channel</button>
							  <div class="dropdown-content">
								<a href="">Analytics</a>
								<a href="">Add Channel</a>
								
							  </div>
							</div>
						</li>
                       
						<li class="dropdown-submenu">
							<div class="dropdown">
							  <button class="dropbtn">On-boarding hires</button>
							  <div class="dropdown-content">
								<a href="#">CV</a>
								<a href="#">Document Checklist</a>
								<a href="#">Induction Checklist</a>
								
							  </div>
							</div>
						</li>
                       
						<li class="dropdown-submenu">
							<div class="dropdown">
							  <button class="dropbtn">Downloads</button>
							  <div class="dropdown-content">
								<a href="#">Complete Application</a>
								<a href="#">Job Description</a>
							  </div>
							</div>
						</li>
						
						
						
                    </ul>
                </div>
				
			</div>
			<div class = "panel-body">
				<div align = "center"> 
					<p>Screening Status as of today</p>
				</div>
				<div>
					Ongoing screenings:  <label> (Number)</label>
				</div>
				<div>
					No. of screenings done:  <label>(Number)</label>
				</div>
				<div>
					No. of cleared screenings:  <label>(Number)</label>
				</div>
				<div>
					No. of failed screenings:  <label>(Number)</label>
				</div>
				<div>
					No. of interviews taken:   <label>(Number)</label>
				</div>
				<div>
					No. of candidates rejected in the interview:  <label>(Number)</label>
				</div>
				
			</div>
		</div>
	</div>
	</div>
</div>


<script src= "js/hrJS.js" type="text/javascript"></script>
</body>
</html>
