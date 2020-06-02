<?php
$page = 'icerik_ekle';
require_once "../Site/header.php";
require "../POST/Urun_IcerikEkle.php";
?>
<style>
     select {
 width: 50%;
 padding: 12px;
 border: 1px solid #ccc;
 border-radius: 4px;
 resize: vertical;
}
</style>
<form method='post'>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">İÇERİK EKLE</h6>
            </div>

            <div class="card-body">

          <?php require "../ajax/error/errormsg.php"; ?>
<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'>İçerik Adı : </span>
</div>
<input type='text' name='icerik_adi' class='form-control'  placeholder='İçerik Adı'maxlength='25'>
</div>
<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'>İçerik Fiyatı :  ₺</span>
</div>
<input type='text' name='icerik_fiyati' class='form-control' placeholder='Fiyat' maxlength='20'>
</div>


 <center> <label for="kategori">Kategori : </label>

          <center>
            <select name="urunKategoriID">
              <option value="">Seciniz</option>
                <?php  echo $Urun->Get_Category(); ?>
            </select>
          </div>
        <button class='btn btn-success'  name='icerik_ekle' type='submit'><i class='fas fa-save'></i> İÇERİK EKLE</button>
     </form>
  <br>
     </div></div>
     <?php

include "../Site/footer.php";

?>
