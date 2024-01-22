<?php
session_start();
require 'conn.php';
if(!$_SESSION['admin_name'] &&  $_SESSION['admin_name'] !=true ){
    header('location:login.php');
}
$fetch_app_PatientQ = "SELECT * FROM `accept_patient` WHERE `pateint_dos_1`='not vaccinated' AND `patient_app_day` = '$day' AND `pateint_dos_2`='not vaccinated' AND `patient_app_day` = '$day' OR `pateint_dos_1`='vaccinated' AND `patient_app_day` = '$day' AND `pateint_dos_2`='not vaccinated' AND `patient_app_day` = '$day' ";
$fetch_app_Patient = mysqli_query($conn,$fetch_app_PatientQ);
$total_app_Patient = mysqli_num_rows($fetch_app_Patient);
?>
 
 <style>
  .text-center input{
  background-color: #4154f1 !important;
  border-radius: .3rem !important;
  color: white;
}
.text-center input:hover{
  background-color: #4153f1d8;
color: white;
}
input,select{
  box-shadow:none !important;
}
input:focus,select:focus{
  border: 1px solid #4153f19c !important;

}
.text-center input{
  background-color: #4154f1;
  border-radius: .3rem !important;
  color: white;
}
.text-center input:hover{
  background-color: #4153f1d8;
color: white;
}
.col-lg-4:hover{
color: #4154f1 !important;
}
.col-lg-4:hover .icon{
  box-shadow: 0 0 1rem #4153f169 !important;
}
.bg-success{
  background-color:  rgb(11, 156, 156) !important;
}
.bg-danger{
  background-color:  rgb(175, 17, 51) !important;
}
.num_today_app {
  background-color:  #4154f1;
  padding: 0 .2rem;
  border-radius: 50%;
  font-size: .6rem;
  color: white;
}
 </style>
 <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="admin-index.php" class="logo d-flex align-items-center">
        <img src="assets_admin_admin/img/logo.png" alt="">
        <span class="d-none d-lg-block">HS centre</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets_admin/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$_SESSION['admin_name']?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?=$_SESSION['admin_name']?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="admin-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="admin-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.php">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="admin-logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="admin-index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="fa-solid fa-users"></i></i><span>User Details</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="admin_user_detail.php">
            <i class="bi bi-circle"></i><span>users</span>
            </a>
          </li>
          <li>
            <a href="admin_add_user.php">
            <i style="font-size:.8rem;" class="fa-regular fa-square-plus"></i><span>Add user </span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#pat-nav" data-bs-toggle="collapse" href="#">
        <i class="fa-solid fa-bed-pulse"></i></i><span>Patient Details</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pat-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="admin_pat_detail.php">
            <i class="bi bi-circle"></i><span>Patients</span>
            </a>
          </li>
          <li>
            <a href="admin_app_pat.php">
            <i class="bi bi-circle"></i><span>Approved And Vaccinated Patient </span>
            </a>
          </li>
          <li>
            <a href="admin_rej_pat.php">
            <i class="bi bi-circle"></i><span>Reject Patients</span>
            </a>
          </li>
          <li>
            <a href="admin_pending_pat.php">
            <i class="bi bi-circle"></i><span>Pending Patients</span>
            </a>
          </li>
          <li>
            <a href="admin_vaccinated_pat.php">
            <i class="bi bi-circle"></i><span>Fully vaccinated Patients</span>
            </a>
          </li>
          <li>
            <a href="admin_add_pat.php">
            <i style="font-size:.8rem;" class="fa-regular fa-square-plus"></i><span>Add Patients</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#hos-nav" data-bs-toggle="collapse" href="#">
        <i class="fa-solid fa-hospital"></i></i><span>Hospital Details</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="hos-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="admin_hos_detail.php">
            <i class="bi bi-circle"></i><span>Hospital</span>
            </a>
          </li>
          <li>
            <a href="admin_app_hos.php">
            <i class="bi bi-circle"></i><span>Approved Hospital </span>
            </a>
          </li>
          <li>
            <a href="admin_rej_hos.php">
            <i class="bi bi-circle"></i><span>Reject  Hospital </span>
            </a>
          </li>
          <li>
            <a href="admin_pending_hos.php">
            <i class="bi bi-circle"></i><span>Pending  Hospital </span>
            </a>
          </li>
          <li>
            <a href="admin_verified_hos.php">
            <i class="bi bi-circle"></i><span>verified  Hospital </span>
            </a>
          </li>
          <li>
            <a href="admin_add_hos.php">
            <i style="font-size:.8rem;" class="fa-regular fa-square-plus"></i><span>Add  Hospital </span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#vaccine-nav" data-bs-toggle="collapse" href="#">
        <i class="fa-solid fa-vial-circle-check"></i></i><span>Vaccine Details</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="vaccine-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="admin_vaccine_detail.php">
            <i class="bi bi-circle"></i><span>Vaccine</span>
            </a>
          </li>
          <li>
            <a href="admin_add_vaccine.php">
            <i style="font-size:.8rem;" class="fa-regular fa-square-plus"></i><span>Add Vaccine </span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="admin-today_pat.php">
        <i class="fa-solid fa-calendar-week"></i>
          <span>Today Appointment</span> <span class="num_today_app  ms-auto"><?=$total_app_Patient?></span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="admin-profile.php">
        <i class="fa-solid fa-user"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="admin-profile.php">
        <i class="fa-solid fa-right-from-bracket"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->