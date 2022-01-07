<!doctype html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <title>patient profile</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a href="dashboard.php" style="margin-right: 20px;"><button type="button" class="btn btn-primary"><i class="fas fa-arrow-left"></i></button></a>
    <a class="navbar-brand" href="#">My OPD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">
            <?php

            session_start();

            if(isset($_SESSION["user_name"]) && $_SESSION["user_name"]!=""){
              echo ("Dr ".$_SESSION["user_name"]);
              $d_id = $_SESSION["d_id"];
            } else {
              
              header ("Location: doctor_login.php");  
            }
            ?>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      

      <form action="logout.php" class="form-inline">
      <button type="submit" class="btn btn-primary"  style="margin-left: 10px;">LogOut <i class="fas fa-sign-out-alt"></i></button>
      </form>
    </div>
  </div>
</nav>

<?php
if(isset($_REQUEST["msg"]) && $_REQUEST["msg"]!=""){  
    echo $_REQUEST["msg"];   
}

$id = $_GET['id'];

require ("function.php");
$con = dbConnect();
$query = "SELECT * FROM Patient_info WHERE p_id = '$id'" ;
$query_run = mysqli_query($con,$query);
$row = mysqli_fetch_array($query_run);

?>
<div class="card" style="width: 80%; margin: auto;margin-top: 20px;" >
  <div style="margin : 10px;">
    <div class="row g-3">
      <div class="col-md-4">
        <h5><span>Name : <?php echo $row['p_name'];?></span></h5>
      </div>
      <div class="col-md-4">
        <h5 class="card-title">Age : <?php echo date("Y") - date('Y', strtotime($row['p_DOB']));?> (<?php echo $row['p_gender'];?>)</h5>
      </div>
      <div class="col-md-4">
        <h5><span>Blood Group : <?php echo $row['p_blood_group'];?></span></h5>
      </div>
    </div>
    <div class="row g-3">
      <div class="col-md-4">
        <h5><span>ID : <?php echo $row['p_id'];?></span></h5>
      </div>
      <div class="col-md-4">
        <h5><span>Contact : <?php echo $row['p_contact'];?></span></h5>
      </div>
      <div class="col-md-4">
        <h5><span>Occupation : <?php echo $row['p_occupation'];?></span></h5>
      </div>
    </div>
    <div class="row g-3">
      <div class="col-md-4">
        <h5><span>Address : <?php echo $row['p_address'];?></span></h5>
      </div>
      <div class="col-md-4">
        <h5>Last visit : </h5>
      </div>
    </div>
    <div class="row g-3">
      <div class="col-md-4">
        <span data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" style="margin-left: 10px;"><i class="fas fa-pencil-alt" style="font-size:25px;color:lightblue;text-shadow:2px 2px 4px #000000;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

        <span  data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash-alt" style="font-size:25px;color:red;text-shadow:2px 2px 4px #000000;"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></i></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      </div>
      <div  class="col-md-4">
        <form action="diagnose.html" method="post">
          <input type="hidden" name="p_id" value="<?php echo $row['p_id'];?>">
          <input type="hidden" name="d_id" value="<?php echo $d_id;?>">
          <button type="submit" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Diagnose"><i class="fas fa-stethoscope" ></i> Diagnose</button>
          </form>
      </div>
    </div>
  </div>
    
  </div>
</div>

<!--delete confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Do your confirm want to delete this record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php echo $row['p_name'];?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="delete_patient.php" method="post">
        <input type="hidden" name="p_id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-primary">Delete</button>
       </form>
      </div>
    </div>
  </div>
</div>


<!--Edit modal form -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Patient Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="edit_patient_action.php" onsubmit="return validateform()" method="post" name="myform" >
          <input type="hidden" name="p_id" value="<?php echo $id; ?>">


          <div class="mb-3" id = "name">
            <label for="recipient-name" class="col-form-label">Patient Name</label>
            <input type="text" class="form-control" name="p_name" id="p_name" value="<?php echo $row['p_name'];?>">
            <b style="color: red"><span class ="formerror"></span></b>
          </div>
        <div id = "gender">
          <div class="form-check">
              <input class="form-check-input" type="radio"  id="flexRadioDefault1" name="gender" value="male" id="gender" <?php echo ($row['p_gender'] =='male')? 'checked':'' ?> >
              <label class="form-check-label" for="flexRadioDefault1">
                Male
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value = "female" id="gender" <?php echo ($row['p_gender'] =='female')? 'checked':'' ?> >
              <label class="form-check-label" for="flexRadioDefault2">
                Female
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="others" id="gender"<?php echo ($row['p_gender'] =='others')? 'checked':'' ?>>
              <label class="form-check-label" for="flexRadioDefault2">
                others
              </label>
            </div>
          </div>

          <div class="mb-3" id = "dob">
            <label for="recipient-name" class="col-form-label">DOB</label>
            <div class="input-group date" data-provide="datepicker">
                <input type="date" class="form-control" name="p_dob" id = "p_dob" value="<?php echo $row['p_DOB'];?>">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                  
                </div>
            </div>
            <b style="color: red"><span class ="formerror"></span></b>
          </div>

          <div class="mb-3" id = "contact">
            <label for="recipient-name" class="col-form-label">Contact</label>
            <input type="text" class="form-control" id="recipient-name" name="p_contact" id="p_contact" value="<?php echo $row['p_contact'];?>">
            <b style="color: red"><span class ="formerror"></span></b>
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Blood Group</label>
              <select class="form-control" name="p_blood_group">
                <option value="<?php echo $row['p_blood_group'];?>" name="p_blood group"><?php echo $row['p_blood_group'];?></option>
                <option value="A+VE" >A+VE</option>
                <option value="A-VE" >A-VE</option>
                <option value="B+VE">B+VE</option>
                <option value="B-VE">B-VE</option>
                <option value="O+VE">O+VE</option>
                <option value="O-VE">O-VE</option>
                <option value="AB+VE">AB+VE</option>
                <option value="AB-VE">AB-VE</option>
              </select>
          </div>

          <div class="mb-3" id = "occupation">
            <label for="recipient-name" class="col-form-label">Occupation</label>
            <input type="text" class="form-control" id="recipient-name" name="p_occupation" id="p_occuption" value="<?php echo $row['p_occupation'];?>">
            <b style="color: red"><span class ="formerror"></span></b>
          </div>

          

          <div class="mb-3" id = "address">
            <label for="message-text" class="col-form-label">Address</label>
            <input class="form-control" id="message-text" name="p_address" id="p_address" value="<?php echo $row['p_address'];?>"></input>
            <b style="color: red"><span class ="formerror"></span></b>
          </div>

            

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script type="text/javascript" >

      
      $('#exampleModal').on('hidden.bs.modal', function() {
        this.modal('show');
      });


      function clearErrors(){

      errors = document.getElementsByClassName('formerror');
      for(let item of errors)
      {
          item.innerHTML = "";
      }


      }
      function seterror(id, error){
          //sets error inside tag of id 
          element = document.getElementById(id);
          console.log(id);
          console.log(error);
          console.log(element);
          element.getElementsByClassName('formerror')[0].innerHTML = error;

      }

      function validateform(){
      var returnval = true;
      clearErrors();

      var name = document.forms['myform']['p_name'].value;
      if(name.length == 0){
        seterror("name", "*Name Cannot be blank.");
        returnval = false;
      }
      else if (name.length<3){
        seterror("name", "*Name is too short");
        returnval = false;
      }

    
      var dob = document.forms['myform']["p_dob"].value;
      var myDate = new Date(dob);
      var today = new Date();
      if (dob.length == 0){
          seterror("dob", "*Date of Birth Cannot be Blank.");
          returnval = false;
      }
      else if ( myDate > today ) { 
              seterror("dob", "*Invalid Date of Birth");
              returnval = false;
      }
      


      var contact = document.forms['myform']["p_contact"].value;
      if (contact.length!=10 || isNaN(contact)){
          seterror("contact", "*Invalid Contact");
          returnval = false;
      }

      var occupation = document.forms['myform']["p_occupation"].value;
      if (occupation.length==0){
          seterror("occupation", "*Occupation cannot be Blank.");
          returnval = false;
      }
      


      var address = document.forms['myform']["p_address"].value;
      if (address.length == 0){
          seterror("address", "*Address Cannot be Blank.");
          returnval = false;
      }
      else if (address.length<=3){
          seterror("address", "*Address is too short");
          returnval = false;
      }



       return returnval;
    }
    </script>

  </body>
</html>