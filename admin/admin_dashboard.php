
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
    <a class="navbar-brand" href="#">SHS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">
            <?php

            session_start();

            if(isset($_SESSION["admin_name"]) && $_SESSION["admin_name"]!=""){
              echo ("Hii ".$_SESSION["admin_name"]);
            } else {
              
              header ("Location: admin_login.php");  
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
      
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" style="margin-left: 10px;"><i class="fas fa-plus"></i> Add Doctor</button>

      <form action="logout.php" class="form-inline">
      <button type="submit" class="btn btn-primary"  style="margin-left: 10px;">LogOut <i class="fas fa-sign-out-alt"></i></button>
      </form>

    </div>
  </div>
</nav>


<!-- modal form -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter doctor's details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id = "myModal" class="form-val" action="new_doctor_action.php"  method="post" name="myform" onsubmit="return validateForm()">

          <div class="mb-3" id="name">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control"  name="d_name" id="d_name">
            <b style="color: red"><span class ="formerror"></span></b>
          </div>


          <div id="gender">
            <div class="form-check" >
              <input class="form-check-input" type="radio"  id="flexRadioDefault1" name="d_gender" value="male" id="gender">
              <label class="form-check-label" for="flexRadioDefault1">
                Male
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="d_gender" id="flexRadioDefault2" value = "female" id="gender">
              <label class="form-check-label" for="flexRadioDefault2">
                Female
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="d_gender" id="flexRadioDefault2" value="others" id="gender" >
              <label class="form-check-label" for="flexRadioDefault2">
                others
              </label>
            </div>
            <b style="color: red"><span class ="formerror"></span></b>
          </div>


          <div class="mb-3" id="dob">
            <label for="recipient-name" class="col-form-label">Date of Birth</label>
            <div class="input-group date" data-provide="datepicker">
                <input type="date" class="form-control" name="d_dob" >
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
            <b style="color: red"><span class ="formerror"></span></b>
          </div>

         
          <div class="mb-3" id="email">
            <label for="recipient-name" class="col-form-label">Email</label>
            <input type="text" class="form-control" id="d_emial" name="d_email" >
            <b style="color: red"><span class ="formerror"></span></b>
          </div>


          <div class="mb-3" id = "contact">
            <label for="recipient-name" class="col-form-label">Contact</label>
            <input type="text" class="form-control" id="recipient-name" name="d_contact" id="d_contact">
            <b style="color: red"><span class ="formerror"></span></b>
          </div>

          <div class="mb-3" id = "address">
            <label for="message-text" class="col-form-label">Address</label>
            <textarea class="form-control" id="message-text" name="d_address" id="d_address" ></textarea>
            <b style="color: red"><span class ="formerror"></span></b>
          </div>

          <div class="mb-3" id = "specialization">
            <label for="message-text" class="col-form-label">Specialization</label>
            <input class="form-control" id="message-text" name="d_specialization" id="d_specialization">
            <b style="color: red"><span class ="formerror"></span></b>
          </div>

          <div class="mb-3" id = "hospital">
            <label for="message-text" class="col-form-label">Hospital </label>
            <input class="form-control" id="message-text" name="d_hospital" id="d_hospital">
            <b style="color: red"><span class ="formerror"></span></b>
          </div>

          <div class="mb-3" id = "username">
            <label for="recipient-name" class="col-form-label">Set username</label>
            <input type="text" class="form-control" id="recipient-name" name="d_username" id="d_username">
            <b style="color: red"><span class ="formerror"></span></b>
          </div>

          <div class="mb-3" id = "password">
            <label for="recipient-name" class="col-form-label">Set password</label>
            <input type="password" class="form-control" id="recipient-name" name="d_password" id="d_password">
            <b style="color: red"><span class ="formerror"></span></b>
          </div>

          <div class="mb-3" id = "cpassword">
            <label for="recipient-name" class="col-form-label">Confirm password</label>
            <input type="text" class="form-control" id="recipient-name" name="d_cpassword" id="d_cpassword">
            <b style="color: red"><span class ="formerror"></span></b>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="submit" class="btn btn-primary"value = "submit">
      </div>
      </form>
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
    <script>
      
    
    </script>
    <script type="text/javascript" >

      // function openModal() {
      //   $('#exampleModal').modal('show')
      // };
      $('#exampleModal').on('hidden.bs.modal', function() {
        this.modal('show');
      });

      // function seterror(id,error){
      //   element = document.getElementById(id);
      //   console.log(id);
      //   console.log(error);
      //   console.log(element);
      //   element.getElementsByClassName('formerror')[0].innerHTML = error;
      // };

      // function validateform(){
      //   var returnval = true;
      //   var name = document.forms['myform']["d_name"].value;
      //   console.log(name);
      //   if(name.length < 3){
      //     console.log("true");
      //     seterror("d_name" ,"*name is too short");
          
      //     returnval = false;
      //   }

      //   return false;
      // }
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

function validateForm(){
    var returnval = true;
    clearErrors();

    //perform validation and if validation fails, set the value of returnval to false
    var name = document.forms['myform']["d_name"].value;
    if (name.length == 0){
        seterror("name", "*Name Cannot be Blank.");
        returnval = false;
    }
    else if (name.length<3){
        seterror("name", "*Name is too short");
        returnval = false;
    }

    var gender = document.forms['myform']["d_gender"].value;
    if (gender.length == 0){
        seterror("gender", "*Gender Cannot be Blank.");
        returnval = false;
    }

    var dob = document.forms['myform']["d_dob"].value;
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
      
    

    var email = document.forms['myform']["d_email"].value;

    if (email.length == 0){
        seterror("email", "*Email Cannot be Blank.");
        returnval = false;
    }
    else {
      var x = email;
      var atposition=x.indexOf("@");  
      var dotposition=x.lastIndexOf(".");  
      if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
        seterror("email","*Invalid email.") ;
        returnval = false;
        } 

    }
    
    // if (email.length>15){
    //     seterror("email", "*Email length is too long");
    //     returnval = false;
    // }

    var contact = document.forms['myform']["d_contact"].value;
    if (contact.length!=10 || isNaN(contact)){
        seterror("contact", "*Invalid Contact");
        returnval = false;
    }

    var address = document.forms['myform']["d_address"].value;
    if (address.length == 0){
        seterror("address", "*Address Cannot be Blank.");
        returnval = false;
    }
    else if (address.length<=3){
        seterror("address", "*Address is too short");
        returnval = false;
    }

    var specialization = document.forms['myform']["d_specialization"].value;
    if (specialization.length==0){
        seterror("specialization", "*Specialization cannot be Blank.");
        returnval = false;
    }

    var hospital = document.forms['myform']["d_hospital"].value;
    if (hospital.length==0){
        seterror("hospital", "*Hospital name cannot be Blank.");
        returnval = false;
    }

    var username = document.forms['myform']["d_username"].value;
    

    if (username.length<=3){
        seterror("username", "*Username is too short.");
        returnval = false;
    }
    else if (username.length>=15){
        seterror("username", "*Username is too long.");
        returnval = false;
    }
   //  $('document').ready(function(){
   // var username_state = false;
   
   // $('#username').on('blur', function(){
    
   //  if (username == '') {
   //    username_state = false;
   //    return;
   //  }
   //  $.ajax({
   //    url: 'process.php',
   //    type: 'post',
   //    data: {
   //      'username_check' : 1,
   //      'username' : username,
   //    },
   //    success: function(response){
   //      if (response == 'taken' ) {
   //        username_state = false;
   //        $('#username').parent().removeClass();
   //        $('#username').parent().addClass("form_error");
   //        $('#username').siblings("span").text('Sorry... Username already taken');
   //      }else if (response == 'not_taken') {
   //        username_state = true;
   //        $('#username').parent().removeClass();
   //        $('#username').parent().addClass("form_success");
   //        $('#username').siblings("span").text('Username available');
   //      }
   //    }
   //  });
   // });  

    var password = document.forms['myform']["d_password"].value;
    if (!(password.match(/[a-z]/g) && password.match(
                    /[A-Z]/g) && password.match(
                    /[0-9]/g) && password.match(
                    /[^a-zA-Z\d]/g) && password.length >= 8)){
      seterror("password", "*Invalid password.")

    }

    var cpassword = document.forms['myform']["d_cpassword"].value;
    if (cpassword != password){
        seterror("cpassword", "*Confirm password must be same.");
        returnval = false;
    }




    return returnval;
}


    </script>
    
    
  </body>
</html>
