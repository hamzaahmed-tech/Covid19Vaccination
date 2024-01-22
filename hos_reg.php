<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                    
    $mail->isSMTP();                                          
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                 
    $mail->Username   = 'bhanakop@gmail.com';                 
    $mail->Password   = 'cbdqqregogtawone';                   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
    $mail->Port       = 465;                                  
    //Content
    $mail->isHTML(true);    
        $mail->setFrom('bhanakop@gmail.com', 'HS centre');
        $mail->addAddress('hassanee087@gmail.com', 'User');       //Set email format to HTML
        $mail->addReplyTo('bhanakop@gmail.com', 'Information');
        $mail->Subject = 'Dear User From HS centre';

?>
<?php

session_start();
require 'conn.php';
if(!$_SESSION['name'] && $_SESSION['name'] !=true ){
    header('location:login.php');
}
$user_email = $_SESSION['email'];
$hospital_name = $_POST['hospital_name'];
$user_id = $_POST['user_id'];
$hospital_Manager_name = $_POST['hospital_Manager_name'];
$hospital_email = $_POST['hospital_email'];
$hospital_phone = $_POST['hospital_phone'];
$hospital_location = $_POST['hospital_location'];
$hopital_Manager_cnic = $_POST['hopital_Manager_cnic'];
$hopital_open_time = $_POST['hopital_open_time'];
$hopital_close_time = $_POST['hopital_close_time'];
$hopital_submit = $_POST['hopital_submit'];

if(isset($hopital_submit)){

  $check_hosQ ="SELECT * FROM `reg_hospital` WHERE `hospital_email` = '$user_email' OR `hospital_email` = '$hospital_email'";
  $check_hos = mysqli_query($conn,$check_hosQ);
  $fetch_check_hos = mysqli_fetch_assoc($check_hos);
  if( $fetch_check_hos['hospital_email'] != $user_email && $fetch_check_hos['hospital_email'] != $hospital_email ){
  if($hospital_name != '' && $hospital_Manager_name != '' && $hospital_email  != '' && $hospital_phone != '' && $hospital_location != '' && $hopital_Manager_cnic != '' && $hopital_open_time != '' && $hopital_close_time !=''){

    $hospital_insertQ = "INSERT INTO `reg_hospital`( `hospital_name`, `hospital_manager_name`, `hospital_email`, `hospital_contact`, `hospital_location`, `hospital_manager_cnic`, `hospital_open_time`, `hospital_close_time`, `user_id`)
     VALUES ('$hospital_name','$hospital_Manager_name','$hospital_email','$hospital_phone','$hospital_location','$hopital_Manager_cnic','$hopital_open_time ','$hopital_close_time','$user_id')";

    $hospital_insert = mysqli_query($conn ,$hospital_insertQ);
     
    if($hospital_insert){
      $mail->Body = '
      <h2>Dear '.$hospital_Manager_name.'</h2> 
      Your request for Hospital has been sent successfully you inform in 24 hours. Thank you! 
      <ul>
      <li>Manager Name:'.$hospital_Manager_name.';</li>
      <li>Email:"'. $user_email.'";</li>
      <li>Hospital Name:'.$hospital_name.';</li>
      <li>Cnic:'.$hopital_Manager_cnic.';</li>
      <li>Phone:'.$hospital_phone.';</li>
      </ul>
  
      ';
      $hospital_register= true;
      $hospital_register_error = false;
      $already_hos_reg = false;
     
    }
    if(!$hospital_insert){
      $hospital_register= false;
      $hospital_register_error = true;
    }
  

  }
}
if( $fetch_check_hos['hospital_email'] != $user_email || $fetch_check_hos['hospital_email'] != $hospital_email ){
  $already_hos_reg = true;

}

  if($hospital_name == '' || $hospital_Manager_name == ''|| $hospital_email == '' || $hospital_phone == '' || $hospital_location == '' || $hopital_Manager_cnic == '' || $hopital_open_time == '' || $hopital_close_time == '' ){
    $fill_error = true;
    $pat_register_error = false;
    $pat_register = false; 
    $already_hos_reg = false;
  }


}



$mail->send();
} 
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



?>




<!DOCTYPE html>


<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medicio Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php require './component/_links.php'?>

<style>
  .error-message{
    border-radius: .4rem;
    padding: .5rem;
    color: white;
  }
  .sent-message{
    border-radius: .4rem;
    padding: .5rem;
    color: white;
  }
</style>
</head>

<body>
    <?php require './component/_nav.php';?>


<br><br><br><br><br>
  <!-- ======= Appointment Section ======= -->
  <section id="appointment" class="appointment section-bg">
      <div class="container" >

        <div class="section-title">
          <h2>Registeration for Hospital</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>
        <div class="text-center">
            <?php
            
            if($hospital_register){
              echo '<div class="sent-message bg-success">Your request has been sent successfully you inform in 24 hours. Thank you! </div>';
            }
            if($already_hos_reg){
              echo '<div class="sent-message bg-success">You already Register you inform in 24 hours. Thank you! </div>';
            }
            if($fill_error){
              echo '<div class="error-message bg-danger">Please fill out All feilds . try again!</div>';

            }
            if($hospital_exist){
              echo '<div class="error-message bg-danger">Hospital are already Exixt</div>';
            }
            if($hospital_register_error){
              echo '<div style="color:white;" class="error-message bg-danger">Your appointment request has not been sent . try again!</div>';
            }
            ?>
            
            
          </div>
          <br><br>
        <form  action="#" method="post"  class="php-email-form">
        <input type="text" name="user_id" class="form-control" id="name" value="<?=$_SESSION['id']?> " readonly hidden >
          <div class="row">
            <div class="col-md-4 form-group">
            <label for="yourName" class="form-label">Hospital Name</label>
              <input type="text" name="hospital_name" class="form-control" id="name" placeholder="Your Name"  >
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
            <label for="yourName" class="form-label"> Manager Name </label>
              <input readonly value="<?=$_SESSION['name']?>" type="text" class="form-control" name="hospital_Manager_name" id="phone" placeholder="Your Phone" >
           
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
            <label for="yourName" class="form-label">Offical Email</label>
              <input value="<?=$_SESSION['email']?>" type="email" class="form-control" name="hospital_email" id="email" placeholder="Your Email"  >
            
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-4 form-group">
            <label for="yourName" class="form-label">Contact</label>
              <input type="number" class="form-control" name="hospital_phone" id="phone" placeholder="Your Phone" >
           
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
            <label for="yourName" class="form-label">Hospital location</label>
              <input minlength="5"  type="text" name="hospital_location" class="form-control" id="name" placeholder="Your location">
                    </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <label for="yourName" class="form-label">Manager Cnic</label>
              <input readonly value="<?=$_SESSION['cnic']?>" type="number"  class="form-control" name="hopital_Manager_cnic" id="phone" placeholder="Your Phone" >
            </div>
          </div>
          <div class="row">
 
            <div class="col-md-4 form-group mt-3">
            <label for="yourName" class="form-label">Hospital Open Time</label>
              <input type="time" class="form-control" name="hopital_open_time" id="phone" placeholder="Your Phone" >
                      </div>
            <div class="col-md-4 form-group mt-3">
            <label for="yourName" class="form-label">Hospital Close Time</label>
              <input type="time" class="form-control" name="hopital_close_time" id="phone" placeholder="Your Phone" >
            </div>
          </div>
          <br>
          <div class="text-center"><input class="btn w-100" name="hopital_submit" type="submit" value="Regiter"></div>
          <!-- <button class="w-100" type="submit" value="Regiter">Regiter</button> -->
        </form>

      </div>
    </section><!-- End Appointment Section -->




  

    <?php require './component/_footer.php';?>
<!-- ======================== -->
<?php require './component/_user_script.php';?>
    </body>
    
</html>