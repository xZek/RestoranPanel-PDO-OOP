<?php
// Database connection
session_start();



require  '../Class/Db.php';
$db = DB();

// ======== CLASS ======== //

require  '../Class/User.php';
require  '../Class/Urun.php';
$User = new User();
$Urun = new Urun();

// ======== CLASS ======== //



$user = $User->UserDetails($_SESSION['user_id']); // get user details



if(!isset($_SESSION["user_id"]))
{
header("location:/index.php");
}
if( $user->adm >= 1)
{

}else{
  echo "   <div class='card shadow mb-4'>
            <div class='card-header py-3'>
              <h1 class='m-0 font-weight-bold text-primary'>YETERSİZ YETKI</h1></div></div>
              <div class='card shadow mb-4'>
                <div class='card-header py-3'>
              <h1 class='m-0 font-weight-bold text-primary'>YETERSİZ YETKI</h1></div></div>
                <div class='card shadow mb-4'>
                <div class='card-header py-3'>
              <h1 class='m-0 font-weight-bold text-primary'>YETERSİZ YETKI</h1></div></div>
                   <div class='card shadow mb-4'>
                <div class='card-header py-3'>
              <h1 class='m-0 font-weight-bold text-primary'>YETERSİZ YETKI</h1></div></div>";
exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PANEL</title>
 <!-- Custom fonts for this template-->
  <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">
   <script src="/assets/js/jquery-3.4.1.js"></script>
   <script type="text/javascript" src="/assets/js/sweetalert2.js"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
        <img src="/assets/img/logo-white.png" height="70" width="70">
        </div>
        <div class="sidebar-brand-text mx-2"></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($page=='dashboard') {echo 'active';} ?>">
        <a class="nav-link" href="/panel/dashboard">
        <i class="fas fa-home"></i>
          <span>Anasayfa</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Ürün İşlemleri
      </div>

     <?php if ($user->adm == 2)
     {


      echo "<li class='nav-item ";
       if($page=="icerik_ekle") {
        echo "active";
        } echo "'>
        <a class='nav-link' href='/panel/icerik_ekle.php'>
         <i class='fas fa-plus-circle'></i>
      <span>İçerik Girişi Yap</span>
        </a>
      </li>";

      echo "<li class='nav-item ";
       if($page=="urun_kontrol") {
        echo "active";
        } echo "'>
        <a class='nav-link' href='/panel/urun_kontrol.php'>
         <i class='fas fa-balance-scale'></i>
      <span>Stok Kontrolu Yap</span>
        </a>
      </li>";

      echo "<li class='nav-item ";
       if($page=="urun_sil") {
        echo "active";
        } echo "'>
        <a class='nav-link' href='/panel/urun_sil.php'>
         <i class='fas fa-minus-circle'></i>
      <span>Manuel Ürün Çıkışı Yap</span>
        </a>
      </li>";
     }
     else{

     } ?>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->

      <?php if ($user->adm == 2)
      {
       echo "
       <div class='sidebar-heading'>
         Raporlar
       </div>";

           echo "<li class='nav-item ";
        if($page=="create_admin") {
         echo "active";
         } echo "'>
         <a class='nav-link' href='/panel/create_admin.php'>
       <i class='fas fa-user-plus'></i>
           <span>Satış Raporları</span>
         </a>
       </li>";

     }
     ?>
     <!-- Divider -->
     <hr class="sidebar-divider">
     <!-- Heading -->

     <?php if ($user->adm == 2)
     {
      echo "
      <!-- Heading -->
      <div class='sidebar-heading'>
      Siparişler
      </div>";

      echo "<li class='nav-item ";
     if($page=="siparisler") {
      echo "active";
      } echo "'>
      <a class='nav-link' href='/panel/siparisler'>
     <i class='fas fa-users-cog'></i>
        <span>Siparişleri Görüntüle</span>
      </a>
    </li>";


    echo "<li class='nav-item ";
   if($page=="siparis_ekle") {
    echo "active";
    } echo "'>
    <a class='nav-link' href='/panel/siparis_ekle.php'>
   <i class='fas fa-users-cog'></i>
      <span>Sipariş Ekle</span>
    </a>
  </li>";

  echo "<li class='nav-item ";
 if($page=="siparis_duzenle") {
  echo "active";
  } echo "'>
  <a class='nav-link' href='/panel/siparis_ekle.php'>
 <i class='fas fa-users-cog'></i>
    <span>Sipariş Düzenle</span>
  </a>
</li>";

  }
  ?>


       <!-- Divider -->
       <hr class="sidebar-divider">
       <!-- Heading -->
     <?php if ($user->adm == 2)
     {
      echo "
      <!-- Heading -->
      <div class='sidebar-heading'>
       Kullanıcı Düzenle
      </div>";
/*
          echo "<li class='nav-item ";
       if($page=="create_admin") {
        echo "active";
        } echo "'>
        <a class='nav-link' href='/panel/create_admin.php'>
      <i class='fas fa-user-plus'></i>
          <span>Yönetici Ekle</span>
        </a>
      </li>";*/
        echo "<li class='nav-item ";
       if($page=="kullanici_duzenle") {
        echo "active";
        } echo "'>
        <a class='nav-link' href='/panel/kullanici_duzenle'>
       <i class='fas fa-users-cog'></i>
          <span>Kullanıcı Düzenle / Sil</span>
        </a>
      </li>";
    }
    ?>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class='text-center d-none d-md-inline'>
        <button class='rounded-circle border-0' id='sidebarToggle'></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id='content-wrapper' class='d-flex flex-column'>

      <!-- Main Content -->
      <div id='content'>

        <!-- Topbar -->
        <nav class='navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow'>

          <!-- Sidebar Toggle (Topbar) -->
          <button id='sidebarToggleTop' class='btn btn-link d-md-none rounded-circle mr-3'>
            <i class='fa fa-bars'></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class='navbar-nav ml-auto'>



            </li>






            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user->username ?></span>
                <img class="img-profile rounded-circle" src="/assets/img/admin-png.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php if ($user->adm == 2)
                 {
                 echo "
                <a class='dropdown-item' href='log.php'>
                  <i class='fas fa-list fa-sm fa-fw mr-2 text-gray-400'></i>
                 Loglar
                </a>
                 <div class='dropdown-divider'></div>";
              } ?>

                <a class="dropdown-item" href=" /panel/cikis">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Çıkış Yap
                </a>
              </div>
            </li>

          </ul>

        </nav> <div class="container-fluid">
