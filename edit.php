<?php

require 'conn.php';
$id = $_GET['id'];
// $notification = $_GET[false];
// $trueNotif = $_GET[true];
$selectQ = "SELECT * FROM `user` WHERE id=$id";
$select = mysqli_query($conn,$selectQ);
$GetOldData = mysqli_fetch_array($select);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

    <?php require './component/_links.php'?>
    
  <style>
    * {
      box-shadow: none !important;

    }

    .notification {
      background-color: rgb(251, 251, 252);
      max-width: 70vw;
      width: 100%;
      min-height: 2rem;
      border-radius: .6rem;
      padding: .6rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 0.5rem;
    }

    .cross_icon i {
      font-size: 1rem;
      color: grey;
      cursor: pointer;
    }

    .message h2 {
      font-size: 1rem;
      text-transform: lowercase;

    }

    .success h2 {
      color: rgb(31, 190, 84);
    }

    .danger h2 {
      color: rgb(223, 47, 24);
    }

    .message p {
      font-weight: 500;
      letter-spacing: .01rem;
      font-size: .7rem;
      color: rgb(85, 85, 85);
      text-transform: capitalize !important;
    }
  </style>
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">
                  <span style="font-size: 2rem; margin-left: 0.5rem;" class="d-none d-lg-block"><b>Update the
                      profile</b></span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 style="font-size: 1rem !important;" class="card-title text-center pb-0 fs-4">Update Your Account
                    </h5>
                  </div>

                  <form class="row g-3 needs-validation" novalidate action="update.php" method="GET">
                    <?php
    if(!$conn){
        echo "<div class='notification'>
        <div class='message danger'>
          <h2>connection failed!</h2>
          <p>Your connection problem please try again.</p>
        </div>
        <div class='cross_icon'>
          <i class='fa-solid fa-xmark'></i>
        </div>
      </div>";
    }

  //   if($notification){
  //     echo "<div class='notification'>
  //     <div class='message danger'>
  //       <h2>failed!</h2>
  //       <p>Please fill out all feilds</p>
  //     </div>
  //     <div class='cross_icon'>
  //       <i class='fa-solid fa-xmark'></i>
  //     </div>
  //   </div>";
  // }
    ?>
     <div class="col-12">
                      
                      <input minlength="5" maxlength="30" type="number" name="idedit" class="form-control" id="yourEmail"
                        value=<?=$GetOldData['id']?> required hidden>
                    </div>
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Edit your name</label>
                      <input minlength="5" maxlength="30" type="text" name="nameedit" class="form-control" id="yourEmail"
                        value=<?=$GetOldData['name']?> required >
                    </div>
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Edit your Email</label>
                      <input type="email" name="emailedit" class="form-control" id="yourEmail" value=<?=$GetOldData['email']?>  required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Edit your cnic</label>
                      <input type="number" name="cnicedit" class="form-control" id="yourEmail" value=<?=$GetOldData['cnic']?> required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>




                    <div class="col-12">
                      <input class="btn btn-primary w-100" name="submit" type="submit" value="update the profile">
                    </div>
                    <div class="col-12" style="display: flex; justify-content: center;">
                      <p class="small mb-0  ">Back to <a href="welcome.php">Home</a></p>
                    </div>
                  </form>

                </div>
              </div>



            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

      <?php require './component/_user_script.php';?>

</body>

</html>