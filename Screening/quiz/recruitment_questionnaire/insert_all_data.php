<?php

	include("../../class/user.php");
	$userObj = new user;
	
	echo extract($_POST);
	echo $salutation;
	echo $name;
	echo $cnum = $_SESSION["cnum"]."<br>";
	echo $re_int_motive."<br>";
	echo $fathername."<br>";
	echo $fatheroccupation."<br>";
	echo $mothername."<br>";
	echo $motheroccupation."<br>";
	echo $m_other_occupation."<br>"."  ";
	echo $siblings."<br>";
	echo $Maritalstatus."<br>";
	
	echo $spouse_name."<br>";
	echo $spouse_occupation."<br>";
	echo $spouse_other_occupation."<br>  ";
	echo $child."<br>";
	echo $planning_for_child."<br>";
	echo $currentlocation."<br>";
	echo $locality."<br>";
	echo $time_estimated."<br>";
	echo $modeoftransport."<br>";
	echo $ca."<br>";
	echo $short_term_plans."<br>";
	echo $long_term_plans."<br>";
	echo $issue."<br>";
	echo $physicalissue."<br>";
	echo $mentalissue."<br>";
	echo $medicalissue."<br>yu";
	
	$query = "insert into personal_details values ('$cnum','$salutation','$rescreen','$re_int_motive','$fathername',
	'$fatheroccupation','$mothername','$motheroccupation','$m_other_occupation','$siblings','$Maritalstatus','$spouse_name','$spouse_occupation',
	'$spouse_other_occupation','$child','$planning_for_child','$currentlocation','$locality','$time_estimated','$modeoftransport','$ca','$short_term_plans',
	'$long_term_plans','$issue','$physicalissue','$mentalissue','$medicalissue')";
	
	if($userObj->register($query)){
		echo "data successfully";
	}
	
	

	
	if($_SESSION["qset"] == "Basic")
		$next_page->url("../basic/basic_screening_test_start.php");
	else if($_SESSION["qset"] == "Intermediate")
		$next_page->url("../intermediate/intermediate_screening_test_start.php");
	else if($_SESSION["qset"] == "Advanced")
		$next_page->url("../advanced/advance_screening_test_start.php");
	else if($_SESSION["qset"] == "Professional")
		$next_page->url("../professional/professional_screening_test_start.php");
	




					
?>