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



$hospital_ID = $_GET['hospital_ID'];
$page_url = $_GET['pageUrl'];
$approvedQ= "UPDATE `reg_hospital` SET `hospital_status` = 'approved' WHERE `reg_hospital`.`hospital_id` = $hospital_ID";
$approved = mysqli_query($conn,$approvedQ);
$select_hos_dataQ = "SELECT * FROM `reg_hospital` WHERE `hospital_id`= $hospital_ID"; 
$select_hos_data = mysqli_query($conn,$select_hos_dataQ);
$fetch_select_hos_data = mysqli_fetch_assoc($select_hos_data); 

 $hospital_name   =  $fetch_select_hos_data['hospital_name'];
 $hospital_manager_name   =  $fetch_select_hos_data['hospital_manager_name'];
 $hospital_email   =  $fetch_select_hos_data['hospital_email'];
 $hospital_contact   =  $fetch_select_hos_data['hospital_contact'];
 $hospital_location   =  $fetch_select_hos_data['hospital_location'];
 $hospital_manager_cnic   =  $fetch_select_hos_data['hospital_manager_cnic'];
 $hospital_open_time   =  $fetch_select_hos_data['hospital_open_time'];
 $hospital_close_time   =  $fetch_select_hos_data['hospital_close_time'];

$insert_acc_tableQ  = "INSERT INTO `accept_hospital`(`reg_hos_id`, `hospital_name`, `hospital_manager_name`, `hospital_email`, `hospital_contact`, `hospital_location`, `hospital_manager_cnic`, `hospital_open_time`, `hospital_close_time`,`hospital_verified`)
 VALUES 
 ('$hospital_ID','$hospital_name','$hospital_manager_name','$hospital_email','$hospital_contact',' $hospital_location','$hospital_manager_cnic','$hospital_open_time','$hospital_close_time','not verified')";


$insert_acc_table  = mysqli_query($conn,$insert_acc_tableQ);

$delete_hospital_From_reject_patQ = "DELETE FROM `reject_hospital` WHERE `reg_hos_id` = $hospital_ID"; 
$delete_hospital_From_reject_pat = mysqli_query($conn,$delete_hospital_From_reject_patQ );
// $fetch_rejct_pat_data = mysqli_fetch_assoc($delete_pateint_From_reject_pat);



// if($fetch_select_pat_data[''])
$mail->Subject = 'Hospital Approved Welcome to Our HS Centre!';
$mail->Body = '
<h2>Dear '.$hospital_manager_name.'</h2> 
Congratulations! We are thrilled to inform you that your hospitals application has been approved. We look forward to a successful partnership in providing quality healthcare services.
<ul>
<li>Manager Name:'.$hospital_manager_name.';</li>
<li>Email:"'. $hospital_email.'";</li>
<li>Hospital Name:'.$hospital_name.';</li>
<li>Cnic:'.$hospital_manager_cnic.';</li>
<li>Phone:'.$hospital_contact .';</li>
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