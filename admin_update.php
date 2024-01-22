<?php

session_start();
session_unset();
session_destroy();
require 'conn.php';

$admin_old_email = $_GET['admin_old_email'];
$admin_id = $_GET['admin_id'];
$admin_name_edit = $_GET['admin_name_edit'];
$admin_cnic_edit = $_GET['admin_cnic_edit'];
$admin_email_edit = $_GET['admin_email_edit'];
$admin_phone_edit = $_GET['admin_phone_edit'];
$admin_edit_submit = $_GET['admin_edit_submit'];



// echo $admin_old_email . "<br>";
// echo $admin_id . "<br>";
// echo $admin_name_edit . "<br>";
// echo $admin_cnic_edit . "<br>";
// echo $admin_email_edit. "<br>";
// echo $admin_phone_edit . "<br>";
// echo $admin_edit_submit . "<br>";
    if(isset($admin_edit_submit)){
        
      if($admin_name_edit !='' && $admin_email_edit !='' &&  $admin_cnic_edit !='' && $admin_phone_edit !='' && $admin_id != ''){
        $admin_updateQ = "UPDATE `admin` SET `admin_id`='$admin_id',`admin_name`='$admin_name_edit',`admin_email`='$admin_email_edit',`admin_cnic`='$admin_cnic_edit',`admin_phone`='$admin_phone_edit' WHERE `admin_id`=$admin_id";
        $admin_update = mysqli_query($conn,$admin_updateQ);
      
        if($admin_update){
        session_start();
        $admin_selectQ = "SELECT * FROM `admin` WHERE `admin_id` = $admin_id";
        $admin_select = mysqli_query($conn,$admin_selectQ);
        $admin_data = mysqli_fetch_assoc($admin_select);
        $_SESSION['admin_id'] = $admin_data['admin_id'];
        $_SESSION['admin_name'] = $admin_data['admin_name'];
        $_SESSION['admin_cnic'] = $admin_data['admin_cnic'];
        $_SESSION['admin_email'] = $admin_data['admin_email'];
        $_SESSION['admin_phone'] = $admin_data['admin_phone'];
          header('location:admin-profile.php');
          echo "updated";
        }
        else{
            echo "not updated";
        }
      }
    }
   
?>
<!-- <script>
    window.location.assign('admin-profile.php')
</script> -->