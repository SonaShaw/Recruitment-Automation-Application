<?php

	include("class/user.php");
	$login = new user;
	extract($_POST);
	if($login->login($e,$p)){
		$login->url("hod_home.php");
	}else{
		$login->url("index.php?run=failed");
		
	}
?>