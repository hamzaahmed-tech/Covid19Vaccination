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
     

?>


<?php

session_start();
require 'conn.php';
if(!$_SESSION['admin_name'] &&  $_SESSION['admin_name'] !=true ){
    header('location:login.php');
}





$user_email = $_POST['user_emial'];

$hospital_name = $_POST['hospital_name'];
$hospital_Manager_name = $_POST['hospital_Manager_name'];
$hospital_email = $_POST['hospital_email'];
$hospital_phone = $_POST['hospital_phone'];
$hospital_location = $_POST['hospital_location'];
$hopital_Manager_cnic = $_POST['hopital_Manager_cnic'];
$hopital_open_time = $_POST['hopital_open_time'];
$hopital_close_time = $_POST['hopital_close_time'];
$hopital_submit = $_POST['hopital_submit'];




if(isset($hopital_submit)){

  $check_userQ = "SELECT * FROM `user` WHERE `email` ='$user_email'";
  $check_user = mysqli_query($conn,$check_userQ);
  $check_user_fetch = mysqli_fetch_assoc($check_user);

  $check_hosQ ="SELECT * FROM `reg_hospital` WHERE `hospital_email` = '$user_email' OR `hospital_email` = '$hospital_email'";
  $check_hos = mysqli_query($conn,$check_hosQ);
  $fetch_check_hos = mysqli_fetch_assoc($check_hos);

  $check_user_row = mysqli_num_rows($check_user);
  if($check_user_row == 0){
    $user_not_exist = true;
  }
  $user_id =  $check_user_fetch['id'];
  if($check_user_row == 1){
    if($fetch_check_hos['hospital_email'] != $user_email && $fetch_check_hos['hospital_email'] != $hospital_email){

      if($hospital_name != '' && $hospital_Manager_name != '' && $hospital_email  != '' && $hospital_phone != '' && $hospital_location != '' && $hopital_Manager_cnic != '' && $hopital_open_time != '' && $hopital_close_time !='' && $user_email !=''){
    
        $hospital_insertQ = "INSERT INTO `reg_hospital`( `hospital_name`, `hospital_manager_name`, `hospital_email`, `hospital_contact`, `hospital_location`, `hospital_manager_cnic`, `hospital_open_time`, `hospital_close_time`, `user_id`)
         VALUES ('$hospital_name','$hospital_Manager_name','$hospital_email','$hospital_phone','$hospital_location','$hopital_Manager_cnic','$hopital_open_time ','$hopital_close_time','$user_id')";
    
        $hospital_insert = mysqli_query($conn ,$hospital_insertQ);
         
        if($hospital_insert){
          $mail->Subject = 'Hospital Approved Welcome to Our HS Centre!';
          $mail->Body = '
          <h2>Dear '.$hospital_Manager_name.'</h2> 
          Your request for Hospital has been sent successfully you inform in 24 hours. Thank you! 
          <ul>
          <li>Manager Name:'.$hospital_Manager_name.';</li>
          <li>Email:"'. $hospital_email.'";</li>
          <li>Hospital Name:'.$hospital_name.';</li>
          <li>Cnic:'.$hopital_Manager_cnic.';</li>
          <li>Phone:'.$hospital_phone .';</li>
          </ul>
          
          ';
          $hospital_register= true;
          $hospital_register_error = false;
          $hospital_exist = false;
         
        }
        if(!$hospital_insert){
          $hospital_register= false;
          $hospital_register_error = true;
        }
      
    
      }
    }
  }

if( $fetch_check_hos['hospital_email'] != $user_email || $fetch_check_hos['hospital_email'] != $hospital_email){
  $already_hos_reg = true;
}

  if($hospital_name == '' || $hospital_Manager_name == ''|| $hospital_email == '' || $hospital_phone == '' || $hospital_location == '' || $hopital_Manager_cnic == '' || $hopital_open_time == '' || $hopital_close_time == '' && $user_email ==''){
    $fill_error = true;
    $pat_register_error = false;
    $pat_register = false; 
    $already_hos_reg = false;
    $user_not_exist = false;
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
  .hospital_imporant{
border: 1px solid #d4d4d4;
padding: 1rem;
border-radius: .4rem;
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
  }
  </style>
</head>
<body>

<?php require './component/_admin_nav.php';?>



  <main id="main" class="main " >

    <div class="pagetitle ">
      <h1>Add Hospital</h1>
      <nav>
        <ol class="breadcrumb">
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard ">
    <div class="container" >

        <div class="text-center">
            <?php
            
            if($hospital_register){
              echo '<div class="sent-message bg-success">Your appointment request has been sent successfully Thank you! </div>';
            }
            if($already_hos_reg){
              echo '<div class="sent-message bg-success">You already Register  </div>';
            }
            if($fill_error){
              echo '<div class="error-message bg-danger">Please fill out All feilds . try again!</div>';

            }
            if($hospital_exist){
              echo '<div class="error-message bg-danger">Hospital are already Exixt</div>';
            }
            if($hospital_register_error){
              echo '<div style="color:white;" class="error-message bg-danger">Your request has not been sent . try again!</div>';
            }
           
            if($user_not_exist ){
               echo '<div class="error-message bg-danger">User not Register</div>';
            
             }
            ?>
            
            
          </div>
          <br><br>
          <form  action="admin_add_hos.php" method="post"  class="php-email-form">
          <div class="row hospital_imporant">
        <input type="number" name="user_id" class="form-control" id="name" placeholder="user Name" hidden>
    
       
        <label for="yourName" class="form-label">user Email</label>
        <input type="email" name="user_emial" class="form-control" id="name" placeholder="user Name">
          </div>
          <br>
          <div class="row">
            <div class="col-md-4 form-group">
            <label for="yourName" class="form-label">Hospital Name</label>
              <input type="text" name="hospital_name" class="form-control" id="name" placeholder="Your Name"  >
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
            <label for="yourName" class="form-label"> Manager Name </label>
              <input   type="text" class="form-control" name="hospital_Manager_name" id="phone" placeholder="Your Phone" >
           
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
            <label for="yourName" class="form-label">Offical Email</label>
              <input type="email" class="form-control" name="hospital_email" id="email" placeholder="Your Email"  >
            
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
              <input  type="number"  class="form-control" name="hopital_Manager_cnic" id="phone" placeholder="Your Phone" >
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
      

      
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php require './component/_admin_footer.php'?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php require './component/_admin_script.php'?>
<?php require 'html2pdf.php'?>

</body>

</html>