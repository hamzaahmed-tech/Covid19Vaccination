<?php
session_start();
require 'conn.php';
if(!$_SESSION['admin_name'] &&  $_SESSION['admin_name'] !=true ){
    header('location:login.php');
}



// ==============



// ==============
$fetch_app_PatientQ = "SELECT * FROM `reject_patient`";
$fetch_app_Patient = mysqli_query($conn,$fetch_app_PatientQ);
$total_app_Patient = mysqli_num_rows($fetch_app_Patient);
// ==============
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
    table{
        width: 100vw !important;
        overflow-x: scroll !important;
    }
    table th{
        white-space: nowrap;
      
    }
    table td{
        border-bottom: 1px solid #e4e4e4 !important;
    }
  </style>
</head>

<body>

<?php require './component/_admin_nav.php';?>



  <main id="main" class="main " >

    <div class="pagetitle ">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin-index.php">Home</a></li>
          <li class="breadcrumb-item active">User detail</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard ">
      <div class="row ">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row ">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6  w-100">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Reject Patient</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$total_app_Patient?></h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

 <!-- Recent Sales -->
 <div class="col-12" >
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>option</h6>
                    </li>

                    <li><button class="dropdown-item" href="#" onclick="htmlToPdf()">Download Pdf</button></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Reject Patient</h5>

                  <table class="table table-borderless datatable" id="dowload_pdf">
                    <thead>
                      <tr>
                        <th scope="col">s.no</th>
                        <th scope="col">patient id</th>
                        <th scope="col">patient name</th>
                        <th scope="col">patient email</th>
                        <th scope="col">patient phone</th>
                        <th scope="col">patient cnic</th>
                        <th scope="col">patient age</th>
                        <th scope="col">patient gender</th>
                        <th scope="col">patient vaccine</th>
                        <th scope="col">day</th>
                        <th scope="col">hospital name</th>
                     
                       
             
                      </tr>
                    </thead>
                    <tbody>

                    
                    <?php

                    if($total_app_Patient  > 0){
                      while($app_patient_data = mysqli_fetch_assoc($fetch_app_Patient)){ 
                        $j+=1;

  echo '<tr>
  <td scope="row"><a href="#">'.$j.'</a></td>
  <td scope="row"><a href="#">'.$app_patient_data['reg_pateint_id'].'</a></td>
  <td>'.$app_patient_data['patient_name'].'</td>
  <td><a  class="text-primary">'.$app_patient_data['patient_email'].'</a></td>
  <td>'.$app_patient_data['patient_phone'].'</td>
  <td>'.$app_patient_data['patient_cnic'].'</td>
  <td>'.$app_patient_data['patient_age'].'</td>
  <td>'.$app_patient_data['patient_gender'].'</td>
  <td>'.$app_patient_data['patient_vacc'].'</td>
  <td>'.$app_patient_data['patient_app_day'].'</td>
  <td>'.$app_patient_data['patient_select_hos'].'</td>

  <td><a  href="admin_accept_pateint.php?patient_ID='.$app_patient_data['reg_pateint_id'].'&pageUrl=admin_rej_pat.php" class="badge bg-success ">approved</a></td>
</tr>';

}
                          
                        
                    }
                    ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
             <!-- Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

      

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