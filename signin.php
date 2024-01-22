<?php

require 'conn.php';

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
        header('location:login.php');
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
    <!-- notification -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>welcome to HS contre registeration</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php require './component/_links.php'?>
  <style>
    *{
      box-shadow: none !important;
      
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

  <main>
    <div class="container">
  
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span style="font-size: 2rem; margin-left: 0.5rem;" class="d-none d-lg-block">HS centre</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>
      <?php
       if($result){
        echo "<div class='notification'>
        <div class='message success'>
          <h2>Success!</h2>
          <p>Your registeration has submitted</p>
        </div>
        <div class='cross_icon'>
          <i class='fa-solid fa-xmark'></i>
        </div>
      </div>";
    }
    if($fillError){
      echo "<div class='notification'>
      <div class='message danger'>
        <h2>Failed!</h2>
        <p>Your registeration not submitted or please fill out this fields</p>
      </div>
      <div class='cross_icon'>
        <i class='fa-solid fa-xmark'></i>
      </div>
    </div>";
  }
  if($email_exist){
    echo "<div class='notification'>
    <div class='message danger'>
      <h2>Failed!</h2>
      <p>Please fill out the currect email</p>
    </div>
    <div class='cross_icon'>
      <i class='fa-solid fa-xmark'></i>
    </div>
  </div>";
}
    if($passNotComfirm){
      echo "<div class='notification'>
      <div class='message danger'>
        <h2>Failed!</h2>
        <p>password does not match </p>
      </div>
      <div class='cross_icon'>
        <i class='fa-solid fa-xmark'></i>
      </div>
    </div>";
  }

      
      ?>
                  <form class="row g-3 needs-validation" method="POST" action="signin.php"  novalidate>
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
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

       

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php require './component/_user_script.php';?>

</body>

</html>