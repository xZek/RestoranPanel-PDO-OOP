<?php
$page = 'kullanici_duzenle';
require_once "../Site/header.php";
?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->



              <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">KULLANICILARI DUZENLE</h6>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>SIRA</th>
                          <th>KULLANICI ADI</th>
                          <th>YETKI</th>
                          <th>İŞLEM</th>
                        </tr>
                      </thead>
                      <tbody>

                          <?php  echo $User->ListMakeUser(); ?>

                  </tbody></table></div></div></div></div>




   <?php

include "../Site/footer.php";

?>
