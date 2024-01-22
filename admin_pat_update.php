

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



$patient_ID = $_GET['patient_ID'];


$select_pat_dataQ = "SELECT * FROM `accept_patient` WHERE `pateint_id` = $patient_ID";

$select_pat_data = mysqli_query($conn,$select_pat_dataQ);

$fetch_pat_data = mysqli_fetch_assoc($select_pat_data);

$patient_vacc =$fetch_pat_data['patient_vacc'] ;

$pateint_dos_1 = $_POST['pateint_dos_1'];
$pateint_dos_1_date = $_POST['pateint_dos_1_date'];
$pateint_dos_2 = $_POST['pateint_dos_2'];
$pateint_dos_2_date = $_POST['pateint_dos_2_date'];
$admin_update_submit = $_POST['admin_update_submit'];







$get_old_dos_1 = $fetch_pat_data['pateint_dos_1'];
$get_old_dos_1_date = $fetch_pat_data['pateint_dos_1_date'];
$get_old_dos_2 = $fetch_pat_data['pateint_dos_2'];
$get_old_dos_2_date = $fetch_pat_data['pateint_dos_2_date'];

if(isset($admin_update_submit)){




  $fetch_vaccineQ = "SELECT * FROM `vaccine` WHERE `vaccine_name` = '$patient_vacc'" ;
  $fetch_vaccine = mysqli_query($conn,$fetch_vaccineQ);
  $totalvaccine = mysqli_num_rows($fetch_vaccine);
  $vacc_data = mysqli_fetch_assoc($fetch_vaccine);
  
  if( $totalvaccine > 0){
    $sum_vacc = $vacc_data['vaccine_qunt'];
    if( $sum_vacc == 0){
      $sum_vacc =0;
      $vacc_not_avail = true;
    }
    if($sum_vacc != 0){

      $sum_vacc-=1;
   $vacc_qunt_updateQ = "UPDATE `vaccine` SET `vaccine_qunt`='$sum_vacc' WHERE `vaccine_name` = '$patient_vacc'";
   $vacc_qunt_update = mysqli_query($conn,$vacc_qunt_updateQ);
    }
    
  }

if(!$vacc_not_avail){
  if($pateint_dos_1 !='' && $pateint_dos_1_date !=''){
    $update_patQ = "UPDATE `accept_patient` SET `pateint_dos_1`='$pateint_dos_1',`pateint_dos_1_date`= '$pateint_dos_1_date'  WHERE `pateint_id` = $patient_ID";
    $update_pat = mysqli_query($conn,$update_patQ);
    if($update_pat){
      $mail->Body = '
      <h2>Dear '.$fetch_pat_data['patient_name'].'</h2> 

      Congrats on finishing your first dose of Covid-19 vaccine. Reach out for any queries. Keep up the good work!
';
        header('location:admin_app_pat.php');
    }
    if(!$update_pat){
        $pat_updated_error = true;
    }
}
if($pateint_dos_2 !='' && $pateint_dos_2_date !=''){
  $update_patQ = "UPDATE `accept_patient` SET `pateint_dos_2`='$pateint_dos_2',`pateint_dos_2_date`= '$pateint_dos_2_date'  WHERE `pateint_id` = $patient_ID";
  $update_pat = mysqli_query($conn,$update_patQ);
  if($update_pat){
    $mail->Body = '
    <h2>Dear '.$fetch_pat_data['patient_name'].'</h2> 
    Great news! You ve completed your vaccination doses. You are now fully vaccinated for . For any post-vaccination advice, contact us.

    Stay healthy,
    '.$fetch_pat_data['patient_name'].'
';
      header('location:admin_app_pat.php');
  }
  if(!$update_pat){
      $pat_updated_error = true;
  }
}
if($pateint_dos_1 =='' && $pateint_dos_1_date =='' || $pateint_dos_2 =='' && $pateint_dos_2_date ==''){
  $pat_updated_error = false;
  $fill_error = true;
}
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
   .bg-danger{
    padding: 1rem;
    color: white !important;
    margin: 1rem;
    margin-left:0;
    border-radius: .4rem;
    width: 80% !important;
   }
  .message_error{
    display: flex;
    justify-content: center;
  }
  </style>
</head>

<body>

<?php require './component/_admin_nav.php';?>



  <main id="main" class="main " >

    <div class="pagetitle ">
      <h1>Update the Patient</h1>
      <nav>
        <ol class="breadcrumb">
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard ">
      <div class="row from_div">
        <div class="message_error">
      <?php
            
            if($pat_updated_error ){
              echo '<div class="error-message bg-danger">Data not updated try again </div>';
            }
            if($fill_error){
              echo '<div class="error-message bg-danger">Please fill out All feilds</div>';

            }
            if($vacc_not_avail){
              echo '<div class="error-message bg-danger">Vaccine not Available</div>';
            }
          
            ?>
          </div>
       <form class="row g-3 needs-validation" method="POST" action="" >
                    <!-- row -->
                
                    <div class="d-flex justify-content-center  from_row_input" >
                        <div class="w-100 m-3 mt-0"><label for="yourName" class="form-label">Patient ID</label>
                          <input type="text" name="name" class="form-control" id="yourName"  minlength="5" maxlength="30" value="<?=$fetch_pat_data['pateint_id'] ?>" readonly>
                      </div>
                        <div class="w-100  m-3 mt-0">
                          <label for="yourName" class="form-label">Patient Name</label>
                          <input type="text" name="name" class="form-control " id="yourName"  minlength="5" maxlength="30" value="<?=$fetch_pat_data['patient_name'] ?>" readonly>
                      </div>
                      </div>
                    <!-- row -->
 <!-- row -->
 <div class="d-flex justify-content-center  from_row_input" >
    <div class="w-100 m-3 mt-0"><label for="yourName" class="form-label">Patient Email</label>
      <input type="text" name="name" class="form-control" id="yourName"  minlength="5" maxlength="30" value="<?=$fetch_pat_data['patient_email'] ?>" readonly>
  </div>
    <div class="w-100  m-3 mt-0">
      <label for="yourName" class="form-label">Patient Phone</label>
      <input type="text" name="name" class="form-control " id="yourName"  minlength="5" maxlength="30"  value="<?=$fetch_pat_data['patient_phone'] ?>" readonly>
  </div>
  </div>
<!-- row -->
 <!-- row -->
 <div class="d-flex justify-content-center  from_row_input" >
    <div class="w-100 m-3 mt-0"><label for="yourName" class="form-label">Patient cnic</label>
      <input type="text" name="name" class="form-control" id="yourName"  minlength="5" maxlength="30"  value="<?=$fetch_pat_data['patient_cnic'] ?>" readonly>
  </div>
    <div class="w-100  m-3 mt-0">
      <label for="yourName" class="form-label">Patient age</label>
      <input type="text" name="name" class="form-control " id="yourName"  minlength="5" maxlength="30"  value="<?=$fetch_pat_data['patient_age'] ?>" readonly>
  </div>
  </div>
<!-- row -->
 <!-- row -->
 <div class="d-flex justify-content-center  from_row_input" >
    <div class="w-100 m-3 mt-0"><label for="yourName" class="form-label">Hospital Name</label>
      <input type="text" name="name" class="form-control" id="yourName"  minlength="5" maxlength="30"  value="<?=$fetch_pat_data['patient_select_hos'] ?>" readonly>
  </div>
    <div class="w-100  m-3 mt-0">
      <label for="yourName" class="form-label">Patient gender</label>
      <input type="text" name="name" class="form-control " id="yourName"  minlength="5" maxlength="30"  value="<?=$fetch_pat_data['patient_gender'] ?>" readonly>
  </div>
  </div>
<!-- row -->
 <!-- row -->
 <div class="d-flex justify-content-center  from_row_input" >
    <div class="w-100 m-3 mt-0"><label for="yourName" class="form-label">Hospital vaccine</label>
      <input type="text" name="name" class="form-control" id="yourName"  minlength="5" maxlength="30"  value="<?=$fetch_pat_data['patient_vacc'] ?>" readonly>
  </div>
    <div class="w-100  m-3 mt-0">
      <label for="yourName" class="form-label">Appointment Day</label>
      <input type="text" name="name" class="form-control " id="yourName"  minlength="5" maxlength="30"  value="<?=$fetch_pat_data['patient_app_day'] ?>" readonly>
  </div>
  </div>
<!-- row -->
<?php


if($fetch_pat_data['pateint_dos_1'] == 'not vaccinated'){
    echo '<div class="d-flex justify-content-center  from_row_input" >
    <div class="w-100 m-3 mt-0"><label for="yourName" class="form-label">Dos 1</label>
        <select name="pateint_dos_1" id="pat_gender" class="form-select">
            <option value="not vaccinated" >not vaccinated</option>
            <option value="vaccinated" > vaccinated</option>
          </select>
  </div>
    <div class="w-100  m-3 mt-0">
      <label for="yourName" class="form-label">Dos 1 - date</label>
      <input type="date"  class="form-control " name="pateint_dos_1_date">
  </div>
  </div>';
}
if($fetch_pat_data['pateint_dos_1'] == 'vaccinated'){
    echo '<div class="d-flex justify-content-center  from_row_input" >
    <div class="w-100 m-3 mt-0"><label for="yourName" class="form-label">Dos 1</label>
    <input  name="pateint_dos_1" type="text"  class="form-control " readonly value="'.$fetch_pat_data['pateint_dos_1'].'">
  </div>
    <div class="w-100  m-3 mt-0">
      <label for="yourName" class="form-label">Dos 1 - date</label>
      <input type="text"  class="form-control " name="pateint_dos_1_date" value="'.$fetch_pat_data['pateint_dos_1_date'].'" readonly>
  </div>
  </div>';
}

if($fetch_pat_data['pateint_dos_2'] == 'not vaccinated' && $fetch_pat_data['pateint_dos_1'] == 'vaccinated'){
    echo '<div class="d-flex justify-content-center  from_row_input" >
    <div class="w-100 m-3 mt-0"><label for="yourName" class="form-label">Dos 2</label>
        <select  name="pateint_dos_2"id="pat_gender" class="form-select">
            <option value="not vaccinated" >not vaccinated</option>
            <option value="vaccinated" > vaccinated</option>
          </select>
  </div>
    <div class="w-100  m-3 mt-0">
      <label for="yourName" class="form-label">Dos 2 - date</label>
      <input  name="pateint_dos_2_date" type="date"  class="form-control ">
  </div>
  </div>';
}


?>
 <!-- row -->
 
<!-- row -->
                   
<div class="text-center mb-3"><input class="btn w-100" name="admin_update_submit" type="submit" value="Submit"></div>
                 <br><br>
            
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