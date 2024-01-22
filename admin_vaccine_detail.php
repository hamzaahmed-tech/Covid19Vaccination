<?php
session_start();
require 'conn.php';
if(!$_SESSION['admin_name'] &&  $_SESSION['admin_name'] !=true ){
    header('location:login.php');
}



// ==============

$fetch_vaccineQ = "SELECT * FROM `vaccine`";
$fetch_vaccine = mysqli_query($conn,$fetch_vaccineQ);
$totalvaccine = mysqli_num_rows($fetch_vaccine);

// ==============
$fetch_app_PatientQ = "SELECT * FROM `accept_patient` WHERE `pateint_dos_1`='not vaccinated' AND `pateint_dos_2`='not vaccinated' OR `pateint_dos_1`='vaccinated' AND `pateint_dos_2`='not vaccinated'";
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
        max-width: 100vw !important;
        overflow-x: scroll !important;
    }
    table th{
        white-space: nowrap;
      
    }
    table td{
        border-bottom: 1px solid #e4e4e4 !important;
    }
    .vaccine_action{
        background-color: red !important;
        width: 5rem !important;
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

           
            <div class="col-xxl-4 col-xl-12 w-100">

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
    <h5 class="card-title">Vaccines Categoreis </h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
      <i class="fa-solid fa-vial-circle-check"></i>
      </div>
      <div class="ps-3">
        <h6><?=$totalvaccine?></h6>
        <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

      </div>
    </div>

  </div>
</div>

</div><!-- End Customers Card -->
 <!-- Recent Sales -->

             <!-- Recent Sales -->
<!-- Top Selling -->
<div class="col-12 ">
              <div class="card top-selling overflow-auto">

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

                <div class="card-body pb-0">
                  <h5 class="card-title">vaccines <span>| Total</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">s.no</th>
                        <th scope="col">Vaccine ID</th>
                        <th scope="col">Vaccine Name</th>
                        <th scope="col">Vaccine Quntities</th>
                        <th scope="col ">Action</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if($totalvaccine > 0){
                        while($vaccine_data = mysqli_fetch_assoc($fetch_vaccine)){
                          $k+=1;
                          echo ' <tr>
                          <td>'.$k.'</td>
                          <td><a href="#" class="text-primary fw-bold">'.$vaccine_data['vaccine_id'].'</a></td>
                          <td>'.$vaccine_data['vaccine_name'].'</td>
                          <td class="fw-bold">'.$vaccine_data['vaccine_qunt'].'</td>
                          
                          <td><a  href="admin_vaccine_update.php?vaccine_ID='.$vaccine_data['vaccine_id'].'&pageUrl=admin_vaccine_detail.php" class="badge bg-success ">Update</a>
                          <a  href="admin_vaccine_remove.php?vaccine_ID='.$vaccine_data['vaccine_id'].'&pageUrl=admin_vaccine_detail.php&vaccine_name='.$vaccine_data['vaccine_name'].'" class="badge bg-danger vaccine_remove_confirm">Remove</a></td>
                         
                       
                        </tr>';
                        }
                      }
                      
                      ?>
                     
                    
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->
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
<script>
  let vaccine_remove_confirm = document.querySelectorAll('.vaccine_remove_confirm');

  vaccine_remove_confirm.forEach(crr =>{
    crr.addEventListener('click',()=>{
    if(confirm('delete this vaccine')){
    crr.href
  }
  else{
    crr.href = ''
  }
  })
  })
  
 
</script>
</html>