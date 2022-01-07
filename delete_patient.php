<?php
//$id = $_GET['id'];
$id = $_POST["p_id"];
 echo $id;
require ("function.php");
$con = dbConnect();
$con = dbConnect();
if ($con) {
	echo "sucess";
}
$query = "DELETE FROM `Patient_info` WHERE `p_id` = '$id'" ;
$query_run = mysqli_query($con,$query);

header ("Location: dashboard.php");
?>