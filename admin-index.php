<?php
session_start();
require 'conn.php';
if(!$_SESSION['admin_name'] &&  $_SESSION['admin_name'] !=true ){
    header('location:login.php');
}


$fetch_userQ = "SELECT * FROM `user`";
$fetch_user = mysqli_query($conn,$fetch_userQ);
$totalUser = mysqli_num_rows($fetch_user);
// ==============

$fetch_HospitalQ = "SELECT * FROM `reg_hospital`";
$fetch_Hospital = mysqli_query($conn,$fetch_HospitalQ);
$totalHospital = mysqli_num_rows($fetch_Hospital);
// ==============

$fetch_PatientQ = "SELECT * FROM `reg_patient`";
$fetch_Patient = mysqli_query($conn,$fetch_PatientQ);

$totalPatient = mysqli_num_rows($fetch_Patient);
// ==============

$fetch_vaccineQ = "SELECT * FROM `vaccine`";
$fetch_vaccine = mysqli_query($conn,$fetch_vaccineQ);
$totalvaccine = mysqli_num_rows($fetch_vaccine);

$fetch_hospitalQ = "SELECT * FROM `reg_hospital`";
$fetch_hospital = mysqli_query($conn,$fetch_hospitalQ);
$totalhospital = mysqli_num_rows($fetch_hospital);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HS Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <?php require './component/_admin_link.php'?>

  
</head>

<body>

<?php require './component/_admin_nav.php';?>



  <main id="main" class="main " >

    <div class="pagetitle ">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin-index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard ">
      <div class="row ">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row ">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6  w-50">
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
                  <h5 class="card-title">Total User</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$totalUser?></h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6  w-50">
              <div class="card info-card revenue-card">

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
                  <h5 class="card-title">Hospitals<span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-regular fa-hospital"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$totalHospital?></h6>
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->


<!-- Customers Card -->
<div class="col-xxl-4 col-xl-12 w-50">

<div class="card info-card customers-card">

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
    <h5 class="card-title">Patients </h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
      <i class="fa-solid fa-hospital-user"></i>
      </div>
      <div class="ps-3">
        <h6><?=$totalPatient?></h6>
        <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

      </div>
    </div>

  </div>
</div>

</div><!-- End Customers Card -->
<div class="col-xxl-4 col-xl-12 w-50">

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
        <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

      </div>
    </div>

  </div>
</div>

</div><!-- End Customers Card -->
            <!-- Reports -->
            <div class="col-12 ">
              <div class="card">

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
                  <h5 class="card-title">Reports <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Sales',
                          data: [31, 10, 28, 51, 42, 82, 56],
                        }, {
                          name: 'Revenue',
                          data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                          name: 'Customers',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->
            <div class="col-12" >
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>option</h6>
                    </li>

                    <li><button class="dropdown-item" href="#" onclick="htmlToPdf ()">Download Pdf</button></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Users</h5>

                  <table class="table table-borderless datatable" id="dowload_pdf">
                    <thead>
                      <tr>
                        <th scope="col">s.no</th>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">User Email</th>
                        <th scope="col">User Create Acc time</th>
                     
                      </tr>
                    </thead>
                    <tbody>

                    <?php

                    if($totalUser > 0){
                      while($User_data = mysqli_fetch_assoc($fetch_user)){ 
                        $i+=1;
                      
                          echo '<tr>
                          <th scope="row"><a href="#">'.$i.'</a></th>
                          <th scope="row"><a href="#">'.$User_data['id'].'</a></th>
                          <td>'.$User_data['name'].'</td>
                          <td>'.$User_data['email'].'</td>
                          <td><a href="#" class="text-primary">'.$User_data['time'].'</a></td>
                       
                        </tr>';
                        
                        
                        }
                    }
                    ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
<!-- =============================================== -->
            <!-- Recent Sales -->
            <div class="col-12" >
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>option</h6>
                    </li>

                    <li><button class="dropdown-item" href="#" onclick="htmlToPdf ()">Download Pdf</button></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Patients </h5>

                  <table class="table table-borderless datatable" id="dowload_pdf">
                    <thead>
                      <tr>
                        <th scope="col">s.no</th>
                        <th scope="col">#</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Pateint Hospital</th>
                        <th scope="col">Patient Vaccine</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php

                    if($totalPatient > 0){
                      while($patient_data = mysqli_fetch_assoc($fetch_Patient)){ 
                        $i+=1;
                        if($patient_data['patient_status'] == 'Approved' || $patient_data['patient_status'] == 'approved'){
                          echo '<tr>
                          <th scope="row"><a href="#">'.$i.'</a></th>
                          <th scope="row"><a href="#">'.$patient_data['patient_id'].'</a></th>
                          <td>'.$patient_data['patient_name'].'</td>
                          <td>'.$patient_data['patient_select_hos'].'</td>
                          <td><a href="#" class="text-primary">'.$patient_data['patient_vacc'].'</a></td>
                          <td><span class="badge bg-success">'.$patient_data['patient_status'].'</span></td>
                        </tr>';
                        }
                        if($patient_data['patient_status'] == 'Reject' || $patient_data['patient_status'] == 'reject'){
                          echo '<tr>
                          <th scope="row"><a href="#">'.$i.'</a></th>
                          <th scope="row"><a href="#">'.$patient_data['patient_id'].'</a></th>
                          <td>'.$patient_data['patient_name'].'</td>
                          <td>'.$patient_data['patient_select_hos'].'</td>
                          <td><a href="#" class="text-primary">'.$patient_data['patient_vacc'].'</a></td>
                          <td><span class="badge bg-danger">'.$patient_data['patient_status'].'</span></td>
                        </tr>';
                        }
                        if($patient_data['patient_status'] == ''){
                          echo '<tr>
                          <th scope="row"><a href="#">'.$i.'</a></th>
                          <th scope="row"><a href="#">'.$patient_data['patient_id'].'</a></th>
                          <td>'.$patient_data['patient_name'].'</td>
                          <td>'.$patient_data['patient_select_hos'].'</td>
                          <td><a href="#" class="text-primary">'.$patient_data['patient_vacc'].'</a></td>
                          <td><span class="badge bg-warning">pending</span></td>
                        </tr>';
                        }
                        }
                    }
                    ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
            <div class="col-12" >
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>option</h6>
                    </li>

                    <li><button class="dropdown-item" href="#" onclick="htmlToPdf ()">Download Pdf</button></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Hospitals</h5>

                  <table class="table table-borderless datatable" id="dowload_pdf">
                    <thead>
                      <tr>
                      <th scope="col">s.no</th>
                        <th scope="col">user_id</th>
                        <th scope="col">hospital_id </th>
                        <th scope="col">hospital_name</th>
                        <th scope="col">hospital_email</th>
                        <th scope="col">hospital_manager_name</th>
                        <th scope="col">hospital_contact</th>
                        <th scope="col">hospital_location</th>
                        <th scope="col">hospital_manager_cnic</th>
                        <th scope="col">hospital_open_time</th>
                        <th scope="col">hospital_close_time</th>
                        <th scope="col">hospital_status</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php

                    if($totalhospital  > 0){
                      while($hospital_data = mysqli_fetch_assoc($fetch_hospital)){ 
                        $i+=1;

                          if($hospital_data['hospital_status'] !=''){
                            echo '<tr>
                          <td scope="row"><a href="#">'.$i.'</a></td>
                          <td scope="row"><a href="#">'.$hospital_data['user_id'].'</a></td>
                          <td scope="row"><a href="#">'.$hospital_data['hospital_id'].'</a></td>
                          <td>'.$hospital_data['hospital_name'].'</td>
                          <td><a  class="text-primary">'.$hospital_data['hospital_email'].'</a></td>
                          <td>'.$hospital_data['hospital_manager_name'].'</td>
                          <td>'.$hospital_data['hospital_contact'].'</td>
                          <td>'.$hospital_data['hospital_location'].'</td>
                          <td>'.$hospital_data['hospital_manager_cnic'].'</td>
                          <td>'.$hospital_data['hospital_open_time'].'</td>
                          <td>'.$hospital_data['hospital_close_time'].'</td>
                          <td>'.$hospital_data['hospital_status'].'</td>
                          
                        </tr>';
                          }
                          if($hospital_data['hospital_status'] ==''){
                            echo '<tr>
                            <td scope="row"><a href="#">'.$i.'</a></td>
                            <td scope="row"><a href="#">'.$hospital_data['user_id'].'</a></td>
                            <td scope="row"><a href="#">'.$hospital_data['hospital_id'].'</a></td>
                            <td>'.$hospital_data['hospital_name'].'</td>
                            <td><a  class="text-primary">'.$hospital_data['hospital_email'].'</a></td>
                            <td>'.$hospital_data['hospital_manager_name'].'</td>
                            <td>'.$hospital_data['hospital_contact'].'</td>
                            <td>'.$hospital_data['hospital_location'].'</td>
                            <td>'.$hospital_data['hospital_manager_cnic'].'</td>
                            <td>'.$hospital_data['hospital_open_time'].'</td>
                          <td>'.$hospital_data['hospital_close_time'].'</td>
                         
                            <td>pending</td>
                            
                          </tr>';
                          }
                        }
                        
                    }
                    ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
<!-- ==================================================== -->
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

</html>