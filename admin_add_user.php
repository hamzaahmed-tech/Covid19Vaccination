


<?php

session_start();
require 'conn.php';
if(!$_SESSION['admin_name'] &&  $_SESSION['admin_name'] !=true ){
    header('location:login.php');
}




$name = $_POST['name'];
$cnic = $_POST['cnic'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$confirmPass = $_POST['cpass'];
$submit = $_POST['submit'];
$str_pass = password_hash($pass,PASSWORD_BCRYPT);
$fillError = false;
$passNotComfirm = false;

if(isset($submit)){
  $checkEmailExistQ = "SELECT * FROM `user` WHERE `email`='$email'";
  $checkEmailExist = mysqli_query($conn,$checkEmailExistQ );
  $checkEmail_row = mysqli_num_rows($checkEmailExist);
  if($checkEmail_row == 0){
    if($name != '' && $cnic != '' && $email != '' && $pass != '' && $confirmPass != '' && $pass === $confirmPass){
      $insertQ = "INSERT INTO `user`(`name`, `email`, `cnic`, `password`, `time`) VALUES ('$name','$email','$cnic','$str_pass',	current_timestamp())";
      $insert= mysqli_query($conn,$insertQ);
    
      if($insert){
        $result = true;
      }
    }
  }
if($checkEmail_row > 0){
  $email_exist = true;
}

if($name == '' && $cnic == '' && $email == '' && $pass == '' && $confirmPass == '' && $pass == $confirmPass)
$fillError = true;
$passNotComfirm = false;
}
if($pass !== $confirmPass){
  $passNotComfirm = true;
  $fillError = false;
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HS Admin </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <?php require './component/_admin_link.php'?>

  <style>
    .from_div{
        margin: 2rem;
        background-color: rgb(255, 255, 255);
        border-radius: .5rem;
        
    }
    .pagetitle{
        margin-left: 2rem;
        margin-top: 2rem;
    }
   form .col-12{
padding: 0 2rem;
   }
   form label{
    font-weight: 600; 
    color: #2b37a0;
   }
   .from_btn{
    margin-bottom: 2rem;
   }
   .mt-0{
    margin-top: -1rem !important;
   }
  .name_field{
    margin-right: 10rem !important;
  }
  .sent-message,.error-message{
   padding: .5rem;
   border-radius: .3rem;
   color: white;
  }

  .container form{
    margin:2rem !important;
  }

    .notification{
    background-color: rgb(251, 251, 252);
    max-width:70vw;
    width: 100%;
    min-height: 2rem;
    border-radius: .6rem;
    padding: .6rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
}
.cross_icon i{
    font-size: 1rem;
    color: grey;
    cursor: pointer;
}
.message h2{
font-size: 1rem;
text-transform: lowercase;

}
.success h2{
    color: rgb(31, 190, 84) ;
}
.danger h2{
    color: rgb(223, 47, 24) ;
}
.message p{
    font-weight: 500;
    letter-spacing: .01rem;
    font-size: .7rem;
    color: rgb(85, 85, 85);
    text-transform: capitalize !important;
}
  </style>
</head>
<body>

<?php require './component/_admin_nav.php';?>



  <main id="main" class="main " >

    <div class="pagetitle ">
      <h1>Add Patient</h1>
      <nav>
        <ol class="breadcrumb">
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard ">
    <div class="container" >

        <div class="text-center">
            <?php
            
            if($result){
              echo '<div class="sent-message bg-success">User added</div>';
            }
            if($email_exist){
              echo '<div class="sent-message bg-success">User already Register </div>';
            }
         
            if( $fillError){
              echo '<div class="error-message bg-danger">Please fill out All feilds . try again!</div>';

            }
           
            ?>
            
            
          </div>
          <br>
         
   
          <form class="row g-3 needs-validation" method="POST" action="admin_add_user.php" >
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName"  minlength="5" maxlength="30">
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" minlength="5" maxlength="30">
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">CNIC</label>
                      <input  type="number" name="cnic" class="form-control"   maxlength="13">
                      <div class="invalid-feedback">Please, enter your cnic</div>
                    </div>
                    

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="pass" class="form-control" id="yourPassword" minlength="4">
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">confirm Password</label>
                      <input type="password" name="cpass" class="form-control" id="yourPassword" >
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <input class="btn btn-primary w-100" name="submit" type="submit" value="Create Account">
                    </div>
                
                  </form>

      </div>
      

      
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php require './component/_admin_footer.php'?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php require './component/_admin_script.php'?>
<?php require 'html2pdf.php'?>

</body>

</html>