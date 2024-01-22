<?php
require 'conn.php';
$id = $_GET['id'];
$deleteQuery = "DELETE FROM `user` WHERE id= $id";
mysqli_query($conn,$deleteQuery);
?>
<script>
    window.location.assign('showData.php');
</script>