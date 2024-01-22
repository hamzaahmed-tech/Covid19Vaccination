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
$pat_name = $_POST['pat_name'];
$pat_email = $_POST['pat_email'];
$pat_phone = $_POST['pat_phone'];
$pat_age = $_POST['pat_age'];
$pat_cnic = $_POST['pat_cnic'];
$pat_gender = $_POST['pat_gender'];
$pat_day_name = $_POST['pat_day_name'];
$pat_hospital_name = $_POST['pat_hospital_name'];
$pat_vaccine_name = $_POST['pat_vaccine_name'];
$pat_submit = $_POST['pat_submit'];

if(isset($pat_submit)){

  $check_patQ ="SELECT * FROM `reg_patient` WHERE `patient_email` = '$user_email'";
  $check_pat = mysqli_query($conn,$check_patQ);
  $fetch_check_pat = mysqli_fetch_assoc($check_pat);
  if( $fetch_check_pat['patient_email'] != $user_email){
    if($pat_name != '' && $pat_email != '' && $pat_phone != '' && $pat_age != '' && $pat_cnic != '' && $pat_gender != '' && $pat_day_name != '' && $pat_hospital_name != '' && $pat_vaccine_name != ''){

      $pat_insertQ = "INSERT INTO `reg_patient`(`patient_name`, `patient_email`, `patient_phone`, `patient_cnic`, `patient_age`, `patient_select_hos`, `patient_gender`, `patient_vacc`, `patient_app_day`) VALUES ('$pat_name','$pat_email','$pat_phone','$pat_cnic','$pat_age','$pat_hospital_name','$pat_gender','$pat_vaccine_name','$pat_day_name')";
  
      $pat_insert = mysqli_query($conn ,$pat_insertQ);

      $mail->Body = '
      <h2>Dear '.$pat_name.'</h2> 
      Your request has been sent successfully you inform in 12 hours. Thank you! 
      <ul>
      <li>Name:'.$pat_name.';</li>
      <li>Email:"'. $user_email.'";</li>
      <li>Hospital:'.$pat_hospital_name.';</li>
      <li>Day:'.$pat_day_name.';</li>
      <li>Gender:'.$pat_gender.';</li>
      <li>Cnic:'.$pat_cnic.';</li>
      <li>Phone:'.$pat_phone.';</li>
      <li>Vaccine:'. $pat_vaccine_name.';</li>
      </ul>
  
      ';
      if($pat_insert){
       
        $pat_register= true;
        $pat_register_error = false;
       
      }
      if(!$pat_insert){
        $pat_register= false;
        $pat_register_error = true;
      }
  
  
    }
  }
if($fetch_check_pat['patient_email'] == $user_email){
  $already_pat_reg = true;
}




 
  
  if($pat_name == '' || $pat_email == ''|| $pat_phone == '' || $pat_age == '' || $pat_cnic == '' || $pat_gender == '' || $pat_day_name == '' || $pat_hospital_name == '' || $pat_vaccine_name == ''){
    $fill_error = true;
    $pat_register_error = false;
    $pat_register = false; 
    $already_pat_reg = false;
  }


}

$fetch_hospitalQ = "SELECT * FROM `reg_hospital` ";

$fetch_hospital = mysqli_query($conn,$fetch_hospitalQ);



$fetch_hospitalQ = "SELECT * FROM `accept_hospital` ";
$fetch_hospital = mysqli_query($conn,$fetch_hospitalQ);
$hospital_row = mysqli_num_rows($fetch_hospital);
// =============
// =============
// =============
$fetch_vaccineQ = "SELECT * FROM `vaccine` ";
$fetch_vaccine = mysqli_query($conn,$fetch_vaccineQ);
$vaccine_row = mysqli_num_rows($fetch_vaccine);


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

  <?php require './component/_links.php';?>

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
          <h2>Registeration for Patients</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>
        <div class="text-center">
            <?php
            
            if($pat_register){
              echo '<div class="sent-message bg-success">Your appointment request has been sent successfully you inform in 12 hours. Thank you! </div>';
            }
            if($already_pat_reg){
              echo '<div class="sent-message bg-success">You already Register you inform in 12 hours. Thank you! </div>';
            }
            if($fill_error){
              echo '<div class="error-message bg-danger">Please fill out All feilds . try again!</div>';

            }
            if($pat_register_error){
              echo '<div style="color:white;" class="error-message bg-danger">Your appointment request has not been sent . try again!</div>';
            }
            ?>
            
            
          </div>
          <br><br>
        <form  action="pat_reg.php" method="post"  class="php-email-form">
        
          <div class="row">
            <div class="col-md-4 form-group">
            <label for="yourName" class="form-label">Your Name</label>
              <input readonly type="text" name="pat_name" class="form-control" id="name" placeholder="Your Name"  value="<?=$_SESSION['name']?>">
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
            <label for="yourName" class="form-label">Your Email</label>
              <input readonly type="email" class="form-control" name="pat_email" id="email" placeholder="Your Email"  value="<?=$_SESSION['email']?>">
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
            <label for="yourName" class="form-label">Your Phone</label>
              <input   mask="0000-000000000" type="number" class="form-control" name="pat_phone" id="phone" placeholder="Your Phone" >
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-4 form-group">
            <label for="yourName" class="form-label">Your Cnic</label>
              <input readonly minlength="13" maxlength="13" type="number" name="pat_cnic" class="form-control" id="name" placeholder="Your Cnic"  value="<?=$_SESSION['cnic']?>">
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
            <label for="yourName" class="form-label">Your Age</label>
              <input type="number" class="form-control" name="pat_age" id="email" placeholder="Your Age" >
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
            <label for="yourName" class="form-label">Your Gender</label>
            <select name="pat_gender" id="pat_gender" class="form-select">
                <option value="">Select Your Gender</option>
                <option value="Male" >Male</option>
                <option value="Femail" >Female</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
            <label for="yourName" class="form-label">Appointment Day</label>
            <select name="pat_day_name" id="pat_day" class="form-select">
                <option value="">Select Day</option>
                <option  value="monday">monday</option>
                <option value="tuesday">tuesday</option>
                <option value="wednesday">wednesday</option>
                <option value="thusday">thusday</option>
                <option value="friday">friday</option>
                <option value="saturday">saturday</option>
              </select>            </div>
            <div class="col-md-4 form-group mt-3">
            <label for="yourName" class="form-label">Hospital</label>
              <select name="pat_hospital_name" id="department" class="form-select">
                <option value="">Select Hopital</option>
                <?php
                if($hospital_row > 0){
                  while($data = mysqli_fetch_assoc($fetch_hospital)){

                    ?>
                
               <option value="<?=$data['hospital_name']?>"><?=$data['hospital_name']?></option>
               <?php
                }
              }?>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
            <label for="yourName" class="form-label">Vaccine</label>
              <select name="pat_vaccine_name" id="doctor" class="form-select">
              <option value="Doctor 1">Select vaccine</option>
              <?php
                  $get_vaccine_name = $_GET['vaccine_name'];
                  if($get_vaccine_name != ''){
                    echo ' <option selected value="'.$get_vaccine_name .'">'.$get_vaccine_name .'</option>';
                  }
                if($hospital_row > 0){
                  while($vaccine = mysqli_fetch_assoc($fetch_vaccine)){
                    echo ' <option value="'.$vaccine['vaccine_name'].'">'.$vaccine['vaccine_name'].'</option>';
                  }
                }
               

                


              ?>
               
            
                <!-- <option value="Doctor 2">Doctor 2</option> -->
             
              </select>
            </div>
          </div>
          <br>
          <div class="text-center"><input class="btn w-100" name="pat_submit" type="submit" value="Regiter"></div>
          <!-- <button class="w-100" type="submit" value="Regiter">Regiter</button> -->
        </form>

      </div>
    </section><!-- End Appointment Section -->




  

    <?php require './component/_footer.php';?>
<!-- ======================== -->
  <!-- Vendor JS Files -->
  <?php require './component/_user_script.php';?>
    </body>
    
</html>