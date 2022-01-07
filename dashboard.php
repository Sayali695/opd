
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- <?php  
             if(isset($_REQUEST["msg2"]) && $_REQUEST["msg2"]!=""){ 
               echo '<script>alert("patient details added to database")</script>'; 
               $_REQUEST["msg2"] = "";
           }
    ?>  -->

    <title>dashboard</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
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
      
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" style="margin-left: 10px;"><i class="fas fa-plus"></i> Add patient</button>

      <form action="logout.php" class="form-inline">
      <button type="submit" class="btn btn-primary"  style="margin-left: 10px;">LogOut <i class="fas fa-sign-out-alt"></i></button>
      </form>

    </div>
  </div>
</nav>


<!-- modal form -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Patient Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  onsubmit="return validateform()" method="post" name="myform" >
          
          <div class="mb-3" id = "name">
            <label for="recipient-name" class="col-form-label">Patient Name</label>
            <input type="text" class="form-control" name="p_name" id="p_name">
            <b style="color: red"><span class ="formerror"></span></b>
          </div>


          <div id = "gender">
              <div class="form-check">
                <input class="form-check-input" type="radio"  id="flexRadioDefault1" name="p_gender" value="male" id="gender">
                <label class="form-check-label" for="flexRadioDefault1">
                  Male
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="p_gender" id="flexRadioDefault2" value = "female" id="gender">
                <label class="form-check-label" for="flexRadioDefault2">
                  Female
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="p_gender" id="flexRadioDefault2" value="others" id="gender">
                <label class="form-check-label" for="flexRadioDefault2">
                  others
                </label>
              </div>
              <b style="color: red"><span class ="formerror"></span></b>
          </div>
        
          <div class="mb-3" id = 'dob'>
            <label for="recipient-name" class="col-form-label">DOB</label>
            <div class="input-group date" data-provide="datepicker">
                <input type="date" class="form-control" name="p_dob">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
            <b style="color: red"><span class ="formerror"></span></b>
          </div>

          <div class="mb-3" id = 'contact'>
            <label for="recipient-name" class="col-form-label">Contact</label>
            <input type="text" class="form-control"  name="p_contact" id="p_contact">
            <b style="color: red"><span class ="formerror"></span></b>
          </div>

          <div class="mb-3" id = "p_blood_group">
            <label for="recipient-name" class="col-form-label">Blood Group</label>
              <select class="form-control" name="p_blood_group" id = "p_blood_group">
                <option value="" name="p_blood group" id = "p_blood_group">Select Blood Group</option>
                <option value="A+VE" >A+VE</option>
                <option value="A-VE" >A-VE</option>
                <option value="B+VE">B+VE</option>
                <option value="B-VE">B-VE</option>
                <option value="O+VE">O+VE</option>
                <option value="O-VE">O-VE</option>
                <option value="AB+VE">AB+VE</option>
                <option value="AB-VE">AB-VE</option>
              </select>
            <b style="color: red"><span class ="formerror"></span></b>
          </div>

          <div class="mb-3" id = 'occupation'>
            <label for="recipient-name" class="col-form-label">Occupation</label>
            <input type="text" class="form-control"  name="p_occupation" id="p_occuption">
            <b style="color: red"><span class ="formerror"></span></b>
          </div>

          

          <div class="mb-3" id = 'address'>
            <label for="message-text" class="col-form-label">Address</label>
            <textarea class="form-control" id="message-text" name="p_address" id="p_address"></textarea>
            <b style="color: red"><span class ="formerror"></span></b>
          </div>

            

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="submit" class="btn btn-primary" value = "Submit">
      </div>
      </form>
    </div>
  </div>
</div>

<!-- search bar -->
<!-- fetch data from db -->
<div class="container">
  <div class="row">
    <div class="col-md-12 mt-4">
      <div class="card">
        <div class="card-header">
          <h4>search for patient</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <form class="d-flex" action="" method="post">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="get_name" placeholder="Enter name" >
                <button class="btn btn-outline-success" type="submit" name="search_by_name"><i class="fas fa-search"></i></button>
              </form>
            </div>
          </div>
         

          <div class="table-responsive">
            <table class="table table-bodererd">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Age/Sex</th>
                  <th scope="col">contact</th>
                  <th scope="col">view</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require ("function.php");
                $con = dbConnect();
                if(isset($_POST['search_by_name']))
                {
                    $name = strtolower($_POST['get_name']);
                    $query = "SELECT * FROM Patient_info WHERE p_name LIKE '$name%' ";
                    $query_run = mysqli_query($con,$query);

                if(mysqli_num_rows($query_run) > 0){
                 while ($row = mysqli_fetch_array($query_run)){
                 $id = $row['p_id'];
                ?>
                <tr>
                  <td><?php echo $row['p_name'] ?></td>
                  <td><?php echo (date("Y") - date_format( date_create($row['p_DOB']),"Y")); ?> (<?php echo $row['p_gender'] ?>)</td>
                  <td><?php echo $row['p_contact'] ?></td>
                  <td><a href="patient profile.php?id=<?php echo $id; ?>"><i class="fas fa-eye" style="font-size:20px;color:DodgerBlue;text-shadow:2px 2px 4px #000000;"></i></a></td>
                </tr>
                <?php
                  }

                }else{
                ?>
                  <tr>
                    <td colspan="6">
                      No data Available
                    </td>
                  </tr>
                <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
       
        </div>
      </div>
    </div>
  </div>
</div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    <!-- modal script -->

    

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

      var gender = document.forms['myform']["p_gender"].value;
      if (gender.length == 0){
          seterror("gender", "*Gender Cannot be Blank.");
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
