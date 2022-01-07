<?php
$name = $_POST["p_name"];
$dob = $_POST["p_dob"];
$bloodgroup = $_POST["p_blood_group"];
$occupation = $_POST["p_occupation"];
$contact = $_POST["p_contact"];
$address = $_POST["p_address"];
$gender = $_POST["gender"];

// echo $name;
// echo $age;
// echo $gender;
// print_r($_REQUEST) ;

require ("function.php");
$con = dbConnect();
// if ($con) {
// 	echo "sucess";
// }
$sql = "INSERT INTO `patient_info` ( `p_name`, `p_DOB`, `p_blood_group`, `p_occupation`, `p_contact`, `p_address`, `p_gender` ) VALUES (  '$name', '$dob', '$bloodgroup', '$occupation', '$contact', '$address', '$gender')";


if(mysqli_query($con,$sql)){
	echo "success";
}else{
	echo " fail";
}

header ("Location: dashboard.php? msg2=success ");

?>