<?php
$uname = $_POST["uname"];
$pwd = $_POST["password"];


	if($uname == "admin" && $pwd == "admin"){
		
		session_start();
		
		$_SESSION['admin_name'] = "admin";

		
		header ("Location: admin_dashboard.php");
		
	} else {
		
		header ("Location: admin_login.php?msg=*Username or password is incorrect");
	}

?>