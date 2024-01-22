<?php
require 'conn.php';
$userDelId = $_GET['DelId'];


$DelQ = "DELETE FROM `user` WHERE `id`=$userDelId";
$Del = mysqli_query($conn,$DelQ);

$DelFromAppQ= "DELETE FROM `accept_patient` WHERE `reg_pateint_id`=$userDelId";
$DelFromrejectQ= "DELETE FROM `reject_patient` WHERE `reg_pateint_id`=$userDelId";

$DelFromApp =  mysqli_query($conn,$DelFromAppQ);
$DelFromreject =  mysqli_query($conn,$DelFromrejectQ);
?>
<script>
    window.location.assign('admin_user_detail.php')
</script>