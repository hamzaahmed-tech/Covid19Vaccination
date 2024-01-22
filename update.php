<?php
session_start();
require 'conn.php';

$id = $_GET['idedit'];
$name = $_GET['nameedit'];
$email = $_GET['emailedit'];
$cnic = $_GET['cnicedit'];
$submit = $_GET['submit'];
if(isset($submit)){

  


if($name != '' && $email != '' && $cnic !=''){
  session_unset();
  session_destroy();

    $insertQuery = "UPDATE `user` SET `id`='$id',`name`='$name',`cnic`='$cnic',`email`='$email' WHERE id=$id";
    $result = mysqli_query($conn,$insertQuery);

    if($result){
      session_start();
      $selectQ =  "SELECT * FROM `user` WHERE  id = $id";
      $select = mysqli_query($conn,$selectQ);
      $result = mysqli_fetch_assoc($select);
      
       $_SESSION['id'] = $result['id'];
       $_SESSION['name'] = $result['name'];
       $_SESSION['email'] = $result['email'];
       $_SESSION['cnic'] = $result['cnic'];
       header('location:welcome.php');
       
      }

}

}

?>
