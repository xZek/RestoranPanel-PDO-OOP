<?php
$page = 'icerikler';
require_once "../Site/header.php";
?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->



      <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">İÇERİKLER</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>SIRA</th>
                  <th>İÇERİK ADI</th>
                  <th>FİYAT</th>
                  <th>KATEGORI</th>
                  <th>ISLEM</th>
                </tr>
              </thead>
              <tbody>

                  <?php  echo $Urun->List_Content(); ?>

          </tbody></table></div></div></div></div>




<?php

include "../Site/footer.php";

?>
