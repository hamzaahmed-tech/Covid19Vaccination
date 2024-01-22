<?php
session_start();
require 'conn.php';
if(!$_SESSION['name'] && $_SESSION['name'] !=true ){
    header('location:login.php');
}

$download_user_card_id = $_GET['download_user_card_id'];



$fetch_approved_pateint_status_selectQ = "SELECT * FROM `accept_patient` WHERE `pateint_id`= $download_user_card_id"; 
$fetch_approved_pateint_status_select = mysqli_query($conn,$fetch_approved_pateint_status_selectQ);

$fetch_approved_pateint_status_data = mysqli_fetch_assoc($fetch_approved_pateint_status_select);








?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pateint repot</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="node_modules/jspdf/dist/jspdf.umd.js"></script>
<script src="node_modules/html2canvas/dist/html2canvas.min.js"></script>
<?php require '.\repot_card\style_css.php'?>
<style>
    .report_container{
        border-radius: 1rem;
    }
   .repot_bb {
        color: #000 !important;
    }
    tbody td{
        color: #000;
    }
</style>
</head>
<body>
    <nav class="report_nav">
        <div class="download_btn">
            <button onclick="htmlToPdf()">download</button>
        </div>
    </nav>
<div class="report_container " id="dowload_pdf">
    <div class="report_top_section">
<div class="repot_top_head">
    <div class="head_left"><h3>HS Vaccine Card</h3></div>
    <div class="head_right"><h3>Vaccine Pateint id : <?=$fetch_approved_pateint_status_data['pateint_id']?></h3></div>
</div>
<div class="mid_repot_content">
    <div class="repot_top_head">
        <div class="head_left"><h3>immunization certificate for covid-19</h3></div>
    </div>
    <div class="pateint_img_and_detail">
        <div class="pat_img"><img src="./repot_card/img/blank-profile-picture-973460_640.webp"></div>
        <div class="pateint_detail">
           <div class="detail_row">
          <div class="detailleft">  <h3>name: <span> <?=$fetch_approved_pateint_status_data['patient_name']?></span></h3></div>
          <div class="detaillright">  <h3>Email: <span> <?=$fetch_approved_pateint_status_data['patient_email']?></span></h3></div>
           </div>
           <div class="detail_row">
            <div class="detailleft">  <h3>cnic no: <span> <?=$fetch_approved_pateint_status_data['patient_cnic']?></span></h3></div>
            <div class="detaillright">  <h3>age: <span> <?=$fetch_approved_pateint_status_data['patient_age']?></span></h3></div>
             </div>
             <div class="detail_row">
                <div class="detailleft">  <h3>gender: <span> <?=$fetch_approved_pateint_status_data['patient_gender']?></span></h3></div>
                <div class="detaillright">  <h3>Vaccine: <span> <?=$fetch_approved_pateint_status_data['patient_vacc']?></span></h3></div>
                 </div>
        </div>
    </div>
</div>
    </div>
    <!-- ////// -->
    <div class="report_bottom_section">
        <table class="repot_table" >
<thead >
    <tr>
        <td class="repot_bb repot_br">vaccine dos</td>
        <td class="repot_bb repot_br">date</td>
        <td class="repot_bb repot_br">name of hospital</td>
        <td class="repot_bb">name of vaccine</td>
    </tr>
</thead>
<tbody>
    <?php
    
    // while($fetch_approved_pateint_status_data){
        // if($pateint_repotrData['pateint_dos_1'] == 'vaccinated'){
            echo '<tr>
            <td class=" repot_br">'.$fetch_approved_pateint_status_data['pateint_dos_1'].'</td>
            <td class=" repot_br">'.$fetch_approved_pateint_status_data['pateint_dos_1_date'].'</td>
            <td class=" repot_br">'.$fetch_approved_pateint_status_data['patient_select_hos'].'</td>
            <td >'.$fetch_approved_pateint_status_data['patient_vacc'].'</td>
        </tr>';
        // }
        if($fetch_approved_pateint_status_data['pateint_dos_2'] == "vaccinated"){
            echo '<tr>
            <td class=" repot_br">'.$fetch_approved_pateint_status_data['pateint_dos_2'].'</td>
            <td class=" repot_br">'.$fetch_approved_pateint_status_data['pateint_dos_2_date'].'</td>
            <td class=" repot_br">'.$fetch_approved_pateint_status_data['patient_select_hos'].'</td>
            <td >'.$fetch_approved_pateint_status_data['patient_vacc'].'</td>
        </tr>';
        }
        
    // }
    
    
    
    
    ?>
    
    
</tbody>
        </table>
    </div>
</div>


</body>
<!-- <script src="app.js"></script> -->

<script>
            window.jsPDF = window.jspdf.jsPDF;

            const htmlToPdf = ()=>{
              let doc = new jsPDF();
              let file = document.querySelector('#dowload_pdf');
              doc.html(file,{
                callback:function(doc){
                  doc.save('covid.pdf')

                },
                margin:[10,10,10,10],
                autoPaging:'text',
                x:0,
                y:0,
                width:160,
                windowWidth:675,
              })
            }


          </script>
          <script type="text/javascript" src="vanilla-tile.js"></script>
          <script>
            VanillaTilt.init(document.querySelector(".report_container"), {
		max: 25,
		speed: 400
	});
          </script>
</html>
