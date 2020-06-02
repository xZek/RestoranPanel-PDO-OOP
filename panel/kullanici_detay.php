<?php
$page = "kullanici_detay";
require_once "../Site/header.php";
require "../POST/User_update.php";
require "../POST/User_delete.php";
$ID = $_GET["ID"];
?>

<style>
textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
   select {
  width: 100%;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
</style>


<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">KULLANICI DUZENLE</h6>
            </div>

            <div class="card-body">
<?php
   require "../ajax/error/errormsg.php";
$query = $db->query("SELECT * FROM users WHERE user_id=$ID", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
foreach( $query as $row ){



        echo "<form method='post'>
        <input type='hidden' name='id' value='".$ID."'>
        <div class='input-group mb-3'>
             <div class='input-group-prepend'>
             <span class='input-group-text' id='basic-addon1'> @ Kullanici Adi : </span>
             </div>
             <input type='text' name='username' class='form-control' value='".$row['username']."'>
             </div>";
        echo  "   <div class='input-group mb-3'>
         <div class='input-group-prepend'>
         <span class='input-group-text' id='basic-addon1'>@ Şifre Giriniz : </span>
         </div>
         <input type='password' name='password' class='form-control' placeholder='*************'>
         </div>
         <h6>*Eğerki boş olarak bırakılırsa eski şifre ile devam edicektir</h6>";
           }
         }
?>

     <center>

              <td><button class='btn btn-success' name="edit" type='submit'><i class='fas fa-save'></i> KAYDET</button></td>
              <td><button class='btn btn-danger' name="delete" type='submit'><i class='fas fa-user-slash'> </i>KULLANICIYI SİL</button></td>
            </div>
          </form>
        </div>


             <?php

           include "../Site/footer.php";

           ?>
