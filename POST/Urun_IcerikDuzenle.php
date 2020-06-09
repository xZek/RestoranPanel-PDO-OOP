<?php
if(isset($_POST["edit"])) {

     $icerik_ID = $_POST["id"];
     $icerik_adi = $_POST["icerik_adi"];
     $icerik_fiyati = $_POST["icerik_fiyati"];
     $urunKategoriID = $_POST["urunKategoriID"];

  //INPUT KONTROLU

   if(empty($icerik_adi))
   {
     $hataBTN = true;
     $message = "İçerik adı boş bırakılamaz";
   }else if(empty($icerik_fiyati))
   {
     $hataBTN = true;
     $message = "Fiyat Boş bırakılamaz";
   }else if(empty($urunKategoriID))
   {
     $hataBTN = true;
     $message = "Kategori Seçiniz";
   }else{

     $result = $Urun->IcerikDuzenle($user->user_id, $user->username, $icerik_ID,$icerik_adi,$icerik_fiyati,$urunKategoriID);

     $basariBTN_Timer = true;
     $message = "Başarıyla Kaydedilmiştir";
     echo '<script>
 setTimeout(function(){
 window.location.assign("http://'.$URL.'/panel/icerikler");
 //2 saniye sonra yönlenecek
 }, 2000);
 </script>
 ';
   }


}
