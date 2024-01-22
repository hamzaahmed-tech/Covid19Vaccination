<?php
session_start();
require 'conn.php';
if(!$_SESSION['admin_name'] &&  $_SESSION['admin_name'] !=true ){
    header('location:login.php');
}



$vaccine_ID = $_GET['vaccine_ID'];
$pageUrl = $_GET['pageUrl'];



$select_vaccineQ = "SELECT * FROM `vaccine` WHERE `vaccine_id`= $vaccine_ID ";
$select_vaccine = mysqli_query($conn,$select_vaccineQ);
$fecth_vaccine_data = mysqli_fetch_assoc($select_vaccine);

$vacc_already_quantity = $fecth_vaccine_data['vaccine_qunt'] ;
$vaccine_name = $_POST['vaccine_name'];
$vaccine_quantity = $_POST['vaccine_quantity'];
$admin_update_vaccine = $_POST['admin_update_vaccine'];

if(isset($admin_update_vaccine)){
    if($vaccine_name !='' && $vaccine_quantity ==''){
        $vacc_update_nameQ = "UPDATE `vaccine` SET `vaccine_name`='$vaccine_name' WHERE `vaccine_id`= $vaccine_ID";
        $vacc_update_name = mysqli_query($conn,$vacc_update_nameQ);
    }
    if($vaccine_name !='' && $vaccine_quantity !=''){
        $add_vaccine_oper = $vaccine_quantity + $vacc_already_quantity;
        $vacc_updateQ = "UPDATE `vaccine` SET `vaccine_name`='$vaccine_name',`vaccine_qunt`='$add_vaccine_oper' WHERE `vaccine_id`= $vaccine_ID";
        $vacc_update = mysqli_query($conn,$vacc_updateQ);
    }
    if($vacc_update_name || $vacc_update){
        header('location:'.$pageUrl.'');
    }
    if(!$vacc_update_name || !$vacc_update){
        $not_update = true;
    }
    if($vaccine_name =='' || $vaccine_quantity ==''){
        $fill_error = true;
    }
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
      <h1>Vaccine update</h1>
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
                          <input type="text" name="vaccine_name" class="form-control" id="yourName"  minlength="5" maxlength="30" value="<?=$fecth_vaccine_data['vaccine_name'] ?>" >
                      </div>
                        <div class="w-100  m-3 mt-0">
                          <label for="yourName" class="form-label">Add Vaccine Quantity (optioanal)</label>
                          <input type="number" name="vaccine_quantity" class="form-control " id="yourName" placeholder="<?=$fecth_vaccine_data['vaccine_qunt'] ?> Already Available Quantity in database">
                      </div>
                      </div>
                    <!-- row -->
<!-- row -->
                   
<div class="text-center mb-3"><input class="btn w-100" name="admin_update_vaccine" type="submit" value="Save"></div>
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