<?php 
 $db = mysqli_connect('localhost', 'root', '', 'taken');
  if (isset($_POST['username_check'])) {
    $username = $_POST['username'];
    $sql = "SELECT * FROM doctor_info WHERE d_uname ='$username'";
    $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) > 0) {
      echo "taken"; 
    }else{
      echo 'not_taken';
    }
    exit();
  }
?>