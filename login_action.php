<?php
$uname = $_POST["uname"];
$pwd = $_POST["password"];

require ("function.php");
$con = dbConnect();

$result = mysqli_query($con, "SELECT * FROM doctor_info WHERE d_uname = '$uname' and d_password = '$pwd'") or die("Failed to query dtabase".mysqli_error($con));

$row = mysqli_fetch_array($result);

	if($row['d_uname'] == $uname && $row['d_password'] == $pwd){
		
		session_start();
		
		$_SESSION['user_name'] = $row['d_name'];
		$_SESSION['d_id'] = $row['d_id'];

		
		header ("Location: dashboard.php");
		
	} else {
		
		header ("Location: doctor_login.php?msg=*Username or password is incorrect");
	}

?>