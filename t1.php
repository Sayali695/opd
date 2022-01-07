<script type="text/javascript">
    var username = "Rishabh@1212";

    var res = '<?php echo uvalid(<script type="text/javascript"> username </script>); ?>';
    console.log(res);
    
</script>
<?php
    function uvalid($username){
        // echo ($username);
        require ("function.php");
        $con = dbConnect();
        // if($con){
        //   echo ("true123");
        // }else{
        //     echo ("false123");
        // }
        $result = mysqli_query($con, "SELECT * FROM doctor_info ") or die("Failed to query dtabase".mysqli_error($con));
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_array($result)){
                    $demo = $row['d_uname'];
                    echo ($demo);
                    if($demo == $username){ 
                      return true;
                    }
            }
            return "false";
        }           
    }
 ?>

