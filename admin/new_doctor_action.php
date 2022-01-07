<?php
$name = $_POST["d_name"];
$gender = $_POST["gender"];
$dob = $_POST["d_dob"];
$email = $_POST["d_email"];
$contact = $_POST["d_contact"];
$address = $_POST["d_address"];
$specialization = $_POST["d_specialization"];
$hospital = $_POST["d_hospital"];
$username = $_POST["d_username"];
$password = $_POST["d_password"];

echo $name;

echo $gender;
print_r($_REQUEST) ;

require ("admin_function.php");
$con = dbConnect();
if ($con) {
	echo "sucess";
}
$sql = "INSERT INTO `doctor_info` ( `d_name`, `d_dob`, `d_gender`, `d_contact`, `d_email`, `d_address`, `d_specialization`, `d_hospital_name`, `d_uname`, `d_password`) VALUES (  '$name', '$dob', '$gender', '$contact', '$email', '$address', '$specialization', '$hospital', '$username', '$password')";


if(mysqli_query($con,$sql)){
	echo "success";
}else{
	echo " fail";
}

header ("Location: admin_dashboard.php? msg2=success ");

?>