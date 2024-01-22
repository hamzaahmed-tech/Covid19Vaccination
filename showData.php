<?php
require 'conn.php';
$selectQuery = "SELECT * FROM `user`";
$result = mysqli_query($conn,$selectQuery);
$row = mysqli_num_rows($result);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All data</title>
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css  ">
    <style>

.table{
  padding: .5rem;
}

    </style>
  </head>
  <body>
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
    
    ?>
    <div class="container">
        <header>
            <h2><span>A</span>ll <span>Da</span>ta</h2>
        </header>   
    <table class="table" >
        <thead >
          <tr >
            <th scope="col">s.no</th>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Contact</th>
            <th scope="col">email</th>
            <th scope="col">password</th>
            <th class="adtionth" scope="col">action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($row > 0){
            while($data = mysqli_fetch_assoc($result)){
              $i+=1;
              echo '<tr>
              <td>'.$i.'</td>
              <td>'.$data['id'].'</td>
              <td>'.$data['name'].'</td>
              <td>'.$data['contact'].'</td>
              <td>'.$data['email'].'</td>
              <td>'.$data['password'].'</td>
              <td class="ac_btn">
         <a style=" text-decoration: none !important; color:white;" class="Submit_btn" href="edit.php?id='.$data['id'].'" target="_blank"><i class="fa-solid fa-pencil"></i>edit</a>
              <a style=" text-decoration: none !important; color:white;" class="Submit_btn" name="deleteBtn" href="remove.php?id='.$data['id'].'"><i class="fa-solid fa-trash"></i>delete</a>
               </td>
            </tr>';
            }
          }
          ?>
         
        </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>