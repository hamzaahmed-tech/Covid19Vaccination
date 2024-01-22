<?php
session_start();
unset($_SESSION['name']);
// session_destroy();

?>

<script>
    window.location.assign('login.php');
</script>