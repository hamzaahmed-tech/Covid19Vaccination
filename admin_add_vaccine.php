
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
$vaccine_name = $_POST['vaccine_name'];
$vaccine_quantity = $_POST['vaccine_quantity'];
$admin_update_vaccine = $_POST['admin_update_vaccine'];

if(isset($admin_update_vaccine)){
    if($vaccine_name !='' && $vaccine_quantity !=''){
        $inset_vaccQ = "INSERT INTO `vaccine`(`vaccine_name`, `vaccine_qunt`) VALUES ('$vaccine_name','$vaccine_quantity')";
        $inset_vacc = mysqli_query($conn,$inset_vaccQ);
    }
    if($inset_vacc){
        header('location:admin_vaccine_detail.php');
        $mail->Subject = 'New Vaccine Addition '.$vaccine_name.'';
        $mail->Body = '
        <h2>Dear Admin</h2> 
        I hope this email finds you well. I wanted to bring to your attention that a new vaccine has been successfully added to our database. This information is crucial for our records and data management.

        Here are the details of the new vaccine:
        <br>
        Vaccine Name: '.$vaccine_name.'  <br>
        Manufacturer: Pakistan <br>
        Quantity:  '.$vaccine_quantity.' 
 ';
    }
    if(!$inset_vacc){
        $not_update = true;
    }
    if($vaccine_name =='' || $vaccine_quantity ==''){
        $fill_error = true;
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
      <h1>Add Vaccine </h1>
      <nav>
        <ol class="breadcrumb">
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard ">
      <div class="row from_div">
        <div class="message_error">
      <?php
            
            if($not_update ){
              echo '<div class="error-message bg-danger">Data not updated try again </div>';
            }
            if($fill_error){
              echo '<div class="error-message bg-danger">Please fill out All feilds</div>';

            }
          
            ?>
          </div>
       <form class="row g-3 needs-validation" method="POST" action="" >
                    <!-- row -->
                
                    <div class="d-flex justify-content-center  from_row_input" >
                        <div class="w-100 m-3 mt-0"><label for="yourName" class="form-label">Vaccine Name</label>
                          <input type="text" name="vaccine_name" class="form-control" id="yourName"  minlength="5" maxlength="30"  >
                      </div>
                        <div class="w-100  m-3 mt-0">
                          <label for="yourName" class="form-label">Vaccine Quantity </label>
                          <input type="number" name="vaccine_quantity" class="form-control " id="yourName" >
                      </div>
                      </div>
                    <!-- row -->
<!-- row -->
                   
<div class="text-center mb-3"><input class="btn w-100" name="admin_update_vaccine" type="submit" value="Add vaccine"></div>
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