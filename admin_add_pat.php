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
if(!$_SESSION['admin_name'] &&  $_SESSION['admin_name'] !=true ){
    header('location:login.php');
}




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

  $check_patQ ="SELECT * FROM `reg_patient` WHERE `patient_email` = '$pat_email'";
  $check_pat = mysqli_query($conn,$check_patQ);
  $fetch_check_pat = mysqli_fetch_assoc($check_pat);
  if( $fetch_check_pat['patient_email'] != $pat_email){
    if($pat_name != '' && $pat_email != '' && $pat_phone != '' && $pat_age != '' && $pat_cnic != '' && $pat_gender != '' && $pat_day_name != '' && $pat_hospital_name != '' && $pat_vaccine_name != ''){

      $pat_insertQ = "INSERT INTO `reg_patient`(`patient_name`, `patient_email`, `patient_phone`, `patient_cnic`, `patient_age`, `patient_select_hos`, `patient_gender`, `patient_vacc`, `patient_app_day`) VALUES ('$pat_name','$pat_email','$pat_phone','$pat_cnic','$pat_age','$pat_hospital_name','$pat_gender','$pat_vaccine_name','$pat_day_name')";
  
      $pat_insert = mysqli_query($conn ,$pat_insertQ);
       
      if($pat_insert){
        $mail->Body = '
        <h2>Dear '.$pat_name.'</h2> 
        Your request has been sent successfully you inform in 12 hours. Thank you! 
        <ul>
        <li>Name:'.$pat_name.';</li>
        <li>Email:"'. $pat_email.'";</li>
        <li>Hospital:'.$pat_hospital_name.';</li>
        <li>Day:'.$pat_day_name.';</li>
        <li>Gender:'.$pat_gender.';</li>
        <li>Cnic:'.$pat_cnic.';</li>
        <li>Phone:'.$pat_phone.';</li>
        <li>Vaccine:'. $pat_vaccine_name.';</li>
        </ul>
    
        ';
        $pat_register= true;
        $pat_register_error = false;
       
      }
      if(!$pat_insert){
        $pat_register= false;
        $pat_register_error = true;
      }
  
  
    }
  }
if($fetch_check_pat['patient_email'] == $pat_email){
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



$fetch_hospitalQ = "SELECT * FROM `reg_hospital` ";
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
            
            if($pat_register){
              echo '<div class="sent-message bg-success">Patient added</div>';
            }
            if($already_pat_reg){
              echo '<div class="sent-message bg-success">Patient already Register </div>';
            }
            if($fill_error){
              echo '<div class="error-message bg-danger">Please fill out All feilds . try again!</div>';

            }
            if($pat_register_error){
              echo '<div style="color:white;" class="error-message bg-danger">Patient not Added try again!</div>';
            }
            ?>
            
            
          </div>
          <br><br>
        <form  action="admin_add_pat.php" method="post"  class="php-email-form">
        
          <div class="row">
            <div class="col-md-4 form-group">
            <label for="yourName" class="form-label">Patient Name</label>
              <input type="text" name="pat_name" class="form-control" id="name" placeholder="Patient Name"  >
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
            <label for="yourName" class="form-label">Patient Email</label>
              <input type="email" class="form-control" name="pat_email" id="email" placeholder="Patient Email" >
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
            <label for="yourName" class="form-label">Patient Phone</label>
              <input   mask="0000-000000000" type="number" class="form-control" name="pat_phone" id="phone" placeholder="Patient Phone" >
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-4 form-group">
            <label for="yourName" class="form-label">Patient Cnic</label>
              <input  minlength="13" maxlength="13" type="number" name="pat_cnic" class="form-control" id="name" placeholder="Patient Cnic"  >
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
            <label for="yourName" class="form-label">Patient Age</label>
              <input type="number" class="form-control" name="pat_age" id="email" placeholder="Patient Age" >
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
            <label for="yourName" class="form-label">Patient Gender</label>
            <select name="pat_gender" id="pat_gender" class="form-select">
                <option value="">Select Patient Gender</option>
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
      

      
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php require './component/_admin_footer.php'?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php require './component/_admin_script.php'?>
<?php require 'html2pdf.php'?>

</body>

</html>