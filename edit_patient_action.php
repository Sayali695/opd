<?php
$id = $_POST["p_id"];
$name = $_POST["p_name"];
$dob = $_POST["p_dob"];
$bloodgroup = $_POST["p_blood_group"];
$occupation = $_POST["p_occupation"];
$contact = $_POST["p_contact"];
$address = $_POST["p_address"];
$gender = $_POST["gender"];

echo $id;
echo $name;
echo $age;
echo $gender;
print_r($_REQUEST) ;

require ("function.php");
$con = dbConnect();
// if ($con) {
// 	echo "sucess";
// }

$sql = "UPDATE `patient_info` SET `p_name` = '$name', `p_DOB` = '$dob', `p_blood_group` = '$bloodgroup', `p_occupation` = '$occupation', `p_contact`= '$contact', `p_address` = '$address', `p_gender` = '$gender' WHERE `p_id` = '$id'";


if(mysqli_query($con,$sql)){
	echo "success";
}else{
	echo " fail";
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;

?>