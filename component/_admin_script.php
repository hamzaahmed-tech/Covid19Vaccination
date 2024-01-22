  <!-- Vendor JS Files -->
  <script src="assets_admin/vendor/apexcharts/apexcharts.min.js"></script>
 <script src="assets_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="assets_admin/vendor/chart.js/chart.umd.js"></script>
 <script src="assets_admin/vendor/echarts/echarts.min.js"></script>
 <script src="assets_admin/vendor/quill/quill.min.js"></script>
 <script src="simple-datatables.js"></script>
 <script src="assets_admin/vendor/tinymce/tinymce.min.js"></script>
 <!-- <script src="assets_admin/vendor/php-email-form/validate.js"></script> -->

 <!-- Template Main JS File -->
 <script src="assets_admin/js/main.js"></script>


 <script>
  const user_delete = document.querySelectorAll('.user_delete');


user_delete.forEach(crr=>{
  crr.addEventListener('click',()=>{
    if(confirm('Delete this user')){
      crr.href
    }
    else{
      crr.href = '#';
    }
  })
})

  
 </script>