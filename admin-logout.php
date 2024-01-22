
<?php
session_start();


    unset($_SESSION['admin_name']);
    // session_destroy();

?>

<script>
    window.location.assign('login.php');
</script>