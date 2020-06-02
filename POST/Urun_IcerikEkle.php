<?php
if(isset($_POST["icerik_ekle"])) {
  /*
        EKLENICEKLER

        * IMG KAYDI OLUCAKTIR
        * KATEGORILER CATEGORY TABLOSUNDAN CEKILMELIDIR
        * URUN FIYATI CEKILIRKEN INPUT'TA DUZENLEMELER YAPILMALIDIR.
        

  */
     $icerik_adi = $_POST["icerik_adi"];
     $icerik_fiyati = $_POST["icerik_fiyati"];
     $urunKategoriID = $_POST["urunKategoriID"];

   if(empty($icerik_adi))
   {
     $hataBTN = true;
     $message = "İçerik adı boş bırakılamaz";
   }else if(empty($icerik_fiyati)){


     $hataBTN = true;
     $message = "İçerik fiyati boş bırakılamaz";

   }
   else if(empty($urunKategoriID)){


     $hataBTN = true;
     $message = "Kategori boş bırakılamaz";

   }else{

          $result = $Urun->IcerikEkle($icerik_adi, $icerik_fiyati, $urunKategoriID, $user->username);
          $basariBTN_Timer = true;
          $message = "Başarıyla Eklenmiştir";
          echo '<script>
  setTimeout(function(){
      window.location.assign("http://'.$URL.'/panel/dashboard");
      //2 saniye sonra yönlenecek
    }, 2000);
</script>
';
   }



}
?>
