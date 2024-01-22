
<?php

session_start();
require 'conn.php';
if(!$_SESSION['name'] && $_SESSION['name'] !=true ){
    header('location:login.php');
}



// =============
// =============
// =============


$status_email = $_POST['status_email'];
$status_submit = $_POST['status_submit'];

if(isset($status_submit)){
  if($status_email !=''){
$acc_pat_selectQ = "SELECT * FROM `accept_patient` WHERE `patient_email` = '$status_email'";
$acc_pat_select = mysqli_query($conn,$acc_pat_selectQ);
$acc_pat_select_data = mysqli_fetch_assoc($acc_pat_select);
$totalAcc = mysqli_num_rows($acc_pat_select);
$reject_pat_selectQ = "SELECT * FROM `reject_patient` WHERE `patient_email` = '$status_email'";
$reject_pat_select = mysqli_query($conn,$reject_pat_selectQ);
$totalreject = mysqli_num_rows($reject_pat_select);
$pending_pat_selectQ = "SELECT * FROM `reg_patient` WHERE `patient_email` = '$status_email'";
$pending_pat_select = mysqli_query($conn,$pending_pat_selectQ);
$totalpending = mysqli_num_rows($pending_pat_select);
if($totalAcc == 1){
  $pat_status_approved = true;
  $totalpending = 0;
}
if($totalreject == 1){
  $pat_status_reject = true;
}
if($totalpending == 1){
  $pat_status_pending = true;
  
}
if($totalAcc ==0 && $totalreject == 0 && $totalpending == 0){
  $pat_not_reg = true;
}
  }
  if($status_email == ''){
    $fill_error = true;
  }
}


?>




<!DOCTYPE html>


<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>check the status</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php require './component/_links.php';?>

<style>
    .status_container{
        width: 30vw;
    }
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
  @media only screen and (max-width:61.5em)  {
    .status_container
    {
        width: 80vw;
    }
  }
  .approved_message{
    background-color: rgb(11, 156, 156) !important;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: .5rem 1rem;
  }
  .approved_message_a a{
    background: rgb(14, 180, 180);
  color: #fff;
  border-radius: 4px;
  white-space: nowrap;
  transition: 0.3s;
  font-size: .7rem;
  display: inline-block;
  margin-right: 0.3rem;
  }
  .approved_message_a a:hover {
  background: #097381;
  color: #fff;
}
</style>
</head>

<body>
<?php require './component/_nav.php';?>


<br><br><br><br><br>
  <!-- ======= Appointment Section ======= -->
  <section id="appointment" class="appointment section-bg ">
      <div class="container status_container" >

        <div class="section-title">
          <h2>Status Check for Patients</h2>
        </div>
        <div class="text-center ">
          
        <?php
            
            if($pat_status_approved){
              echo '<div class="sent-message bg-success approved_message">
             Approved 
             <div class="row justify-content-center approved_message_a">
             <a class="btn  w-100 " target="_blank" href="download_user_card.php?download_user_card_id='.$acc_pat_select_data['pateint_id'].'">Check repot card</a>
             </div>
              </div> ';
            }
         
            if($pat_status_reject ){
              echo '<div style="color:white;" class="error-message bg-danger">
              Rejected !
              </div>';
           
            }
            if($pat_not_reg  ){
              echo '<div style="color:white;" class="error-message bg-danger">
              Patient not Register
              </div>';
           
            }
            if($pat_status_pending){
              echo '<div style="color:white;" class="error-message bg-warning">
              Pending !
              </div>';
            }
            if($fill_error ){
              echo '<div style="color:white;" class="error-message bg-danger">
              please fill out this feild
              </div>';
           
            }
            ?>
            
          </div>
         
          <br><br>
          <form action="patient_status.php" method="POST" class=" row g-3  "  >
          
                  <div class="col-12">
                      <label for="yourEmail" class="form-label"><b>Your Email</b></label>
                      <input type="text" name="status_email" class="form-control" id="yourEmail" value="">
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12 row justify-content-center mt-2">
                    <input class="btn appointment-btn  w-100" name="status_submit" type="submit" value="Check the status">
                    </div>
                  </form>
      </div>
    </section><!-- End Appointment Section -->




  

    <?php require './component/_footer.php';?>
<!-- ======================== -->
  <!-- Vendor JS Files -->
  <?php require './component/_user_script.php';?>
    </body>
    
</html>