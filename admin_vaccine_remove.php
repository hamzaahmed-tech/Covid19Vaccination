
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
        $mail->addAddress('bhanakop@gmail.com', 'User');       //Set email format to HTML
        $mail->addReplyTo('bhanakop@gmail.com', 'Information');
     

?>

<?php
session_start();
require 'conn.php';
if(!$_SESSION['admin_name'] &&  $_SESSION['admin_name'] !=true ){
    header('location:login.php');
}




$vaccine_ID = $_GET['vaccine_ID'];
$pageUrl = $_GET['pageUrl'];
$vaccine_name = $_GET['vaccine_name'];


$DeleVccQ = "DELETE FROM `vaccine` WHERE `vaccine_id`= $vaccine_ID"; 
$DeleVcc = mysqli_query($conn,$DeleVccQ);

 $mail->Subject = 'Removal of Vaccine from Database '.$vaccine_name.'';
        $mail->Body = '
        <h2>Dear Admin</h2> 
        I hope this email finds you well. I regret to inform you that we need to proceed with the removal of a vaccine from our database. This action is essential to ensure the accuracy and relevance of our records.
        <br> ';
$mail->send();
} 
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

if($DeleVcc)
{
    echo "<script>
    window.location.assign('admin_vaccine_detail.php')
</script>";
}
?>
