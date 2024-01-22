<?php

require 'conn.php';




$email = $_POST['email'];
$pass = $_POST['pass'];
$submit = $_POST['submit'];


session_start();
if(isset($_SESSION['name'])){
    header('location:welcome.php');
}
if(isset($_SESSION['admin_name'])){
  header('location:admin-index.php');
}


if(isset($submit)){
  

  if($email != '' && $pass !=''){

    $user_selectQ = "SELECT * FROM `user` WHERE `email` = '$email'";
    $user_select = mysqli_query($conn,$user_selectQ);
    $user_data = mysqli_fetch_assoc($user_select);
    $user_Get_email = $user_data['email'];
    $user_Get_pass = $user_data['password'];
    $user_varifyPass = password_verify($pass,$user_Get_pass);

    // ===========================================================
    $admin_selectQ = "SELECT * FROM `admin` WHERE admin_email = '$email'";
    $admin_select = mysqli_query($conn,$admin_selectQ);
    $admin_data = mysqli_fetch_assoc($admin_select);
    $admin_Get_email = $admin_data['admin_email'];
    $admin_Get_pass = $admin_data['admin_password'];
    $admin_varifyPass = password_verify($pass,$admin_Get_pass);


    
    // echo var_dump($varifyPass);
    if($email === $user_Get_email && $user_varifyPass == 1){
      session_start();
      $_SESSION['id'] = $user_data['id'];
      $_SESSION['name'] = $user_data['name'];
      $_SESSION['cnic'] = $user_data['cnic'];
      $_SESSION['email'] = $user_data['email'];
      header('location:welcome.php');
    }
    if($email === $admin_Get_email && $admin_varifyPass == 1){
      session_start();
      $_SESSION['admin_id'] = $admin_data['admin_id'];
      $_SESSION['admin_name'] = $admin_data['admin_name'];
      $_SESSION['admin_cnic'] = $admin_data['admin_cnic'];
      $_SESSION['admin_email'] = $admin_data['admin_email'];
      $_SESSION['admin_phone'] = $admin_data['admin_phone'];
      header('location:admin-index.php');
    }

  }
  

if($email == ''  && $pass == '')
{
  $notification = true;
}
if($email !== $admin_Get_email &&  $admin_varifyPass != 1 ){
  $loginError = true;

}

if($notification){
  $loginError = false;
}
if($loginError){
  $notification = false;
}







}






?>
    <!-- notification -->




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
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
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate action="login.php" method="POST">
                  <?php
    if(!$conn){
        echo "<div class='notification'>
        <div class='message danger'>
          <h2>connection failed!</h2>
          <p>Your connection problem please try again.</p>
        </div>
        <div class='cross_icon'>
          <i class='fa-solid fa-xmark'></i>
        </div>
      </div>";
    }

    if($loginError){
        echo "<div class='notification'>
        <div class='message danger'>
          <h2>failed!</h2>
          <p>Login failed incorrect email or password </p>
        </div>
        <div class='cross_icon'>
          <i class='fa-solid fa-xmark'></i>
        </div>
      </div>";
    }
    if($notification){
      echo "<div class='notification'>
      <div class='message danger'>
        <h2>failed!</h2>
        <p>Please fill out all feilds</p>
      </div>
      <div class='cross_icon'>
        <i class='fa-solid fa-xmark'></i>
      </div>
    </div>";
  }
    ?>
                  <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" >
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="pass" class="form-control" id="yourPassword" >
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                
                    <div class="col-12">
                    <input class="btn btn-primary w-100" name="submit" type="submit" value="Login">
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="signin.php">Create an account</a></p>
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





