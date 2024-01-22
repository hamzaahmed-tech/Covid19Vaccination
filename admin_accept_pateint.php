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
// require 'php_email.php';
if(!$_SESSION['admin_name'] &&  $_SESSION['admin_name'] !=true ){
    header('location:login.php');
}



$patient_ID = $_GET['patient_ID'];
$page_url = $_GET['pageUrl'];
$approvedQ= "UPDATE `reg_patient` SET `patient_status` = 'approved' WHERE `reg_patient`.`patient_id` = $patient_ID";
$approved = mysqli_query($conn,$approvedQ);
$select_pat_dataQ = "SELECT * FROM `reg_patient` WHERE `patient_id`= $patient_ID"; 
$select_pat_data = mysqli_query($conn,$select_pat_dataQ);
$fetch_select_pat_data = mysqli_fetch_assoc($select_pat_data);

 $patient_name   =  $fetch_select_pat_data['patient_name'];
 $patient_email   =  $fetch_select_pat_data['patient_email'];
 $patient_phone   =  $fetch_select_pat_data['patient_phone'];
 $patient_cnic   =  $fetch_select_pat_data['patient_cnic'];
 $patient_age   =  $fetch_select_pat_data['patient_age'];
 $patient_select_hos   =  $fetch_select_pat_data['patient_select_hos'];
 $patient_gender   =  $fetch_select_pat_data['patient_gender'];
 $patient_vacc   =  $fetch_select_pat_data['patient_vacc'];
 $patient_app_day   =  $fetch_select_pat_data['patient_app_day'];
 $patient_status   =  $fetch_select_pat_data['patient_status'];

$insert_acc_tableQ  = "INSERT INTO `accept_patient`(`reg_pateint_id`, `patient_name`, `patient_email`, `patient_phone`, `patient_cnic`, `patient_age`, `patient_select_hos`, `patient_gender`, `patient_vacc`, `patient_app_day`, `pateint_dos_1`, `pateint_dos_2`, `pateint_dos_1_date`, `pateint_dos_2_date`)
 VALUES
 ('$patient_ID',' $patient_name','$patient_email','$patient_phone','$patient_cnic',' $patient_age','$patient_select_hos','$patient_gender','$patient_vacc','$patient_app_day', 'not vaccinated', 'not vaccinated', '00-00-00', '00-00-00')";


$insert_acc_table  = mysqli_query($conn,$insert_acc_tableQ);

$delete_pateint_From_reject_patQ = "DELETE FROM `reject_patient` WHERE `reg_pateint_id` = $patient_ID"; 
$delete_pateint_From_reject_pat = mysqli_query($conn,$delete_pateint_From_reject_patQ );
// $fetch_rejct_pat_data = mysqli_fetch_assoc($delete_pateint_From_reject_pat);



// if($fetch_select_pat_data[''])

        $mail->Body = '
       <h2>Dear '.$patient_name.'</h2> 

Congratulations! You have been "'. $patient_status.'" for the COVID-19 vaccine. Please schedule your vaccination appointment at your earliest convenience.

<ul>
    <li>Admin:"HS Centre"</li>
    <li>Name:'.$patient_name.';</li>
    <li>Email:"'. $patient_email.'";</li>
    <li>Hospital:'.$patient_select_hos.';</li>
    <li>Day:'.$patient_app_day.';</li>
    <li>Gender:'.$patient_gender.';</li>
    <li>Cnic:'.$patient_cnic.';</li>
    <li>Phone:'.$patient_phone.';</li>
    <li>Status:'. $patient_status.';</li>
  </ul>
';

$mail->send();
} 
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
if($insert_acc_table){
    
    header('location:'.$page_url .'');
}

?>