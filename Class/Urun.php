<?php
class Urun
{

  //ICERIK EKLER
  public function IcerikEkle($urunAdi, $urunFiyat, $new_name, $urunKategoriID,$whoAdd)
     {
         try {
             $db = DB();
             $query = $db->prepare("INSERT INTO icerikler(urun_adi,urun_fiyati, urun_img1, urun_categoryID) VALUES (:urun_adi, :urun_fiyati, :urun_img1 , :urun_categoryID)");
             $query->bindParam("urun_adi", $urunAdi, PDO::PARAM_STR);
             $query->bindParam("urun_fiyati", $urunFiyat, PDO::PARAM_STR);
             $query->bindParam("urun_img1", $new_name, PDO::PARAM_STR);
             $query->bindParam("urun_categoryID", $urunKategoriID, PDO::PARAM_STR);
             $query->execute();
             return $db->lastInsertId();
         }
          catch (PDOException $e) {
             exit($e->getMessage());
         }
     }
        //İçerik Düzenleme Fonksyonu (Kullanıcı Bilgileri'de getiriliyor Log tutulabilmesi için)
     public function IcerikDuzenle($userID, $username, $icerik_ID,$icerik_adi,$icerik_fiyati,$urunKategoriID)
      {
          $db = DB();
        $update = "UPDATE icerikler SET urun_adi = '" . $icerik_adi . "', urun_fiyati = '" . $icerik_fiyati . "',  urun_categoryID = '" . $urunKategoriID . "'  WHERE urun_id=" . $icerik_ID;
        $done =  $db->query($update);
        if($done)
        {
        // OTOMATIK LOG INPUTU
          $Proccess = 'Urun Bilgisi Güncelledi - Güncellenen Ürün ID : '.$icerik_ID.' ';

                    //BURADA LOG EKLIYORUZ
                  $query = $db->prepare("INSERT INTO activity_log(userID,procces, who_didthis) VALUES (:userID, :procces, :who_didthis)");
                  $query->bindParam("userID", $userID, PDO::PARAM_STR);
                  $query->bindParam("procces", $Proccess, PDO::PARAM_STR);
                  $query->bindParam("who_didthis", $username , PDO::PARAM_STR);
                  $query->execute();
           }
           else{
                echo "Sitede Bir Sorun oluştu destek ekiple iletişime geçiniz";
                exit();
           }

     }







     // KATEGORILERI LISTELER
     public function Get_Category()
     {
       $db = DB();
       $query = $db->query("SELECT * FROM icerik_category", PDO::FETCH_ASSOC);
   if ( $query->rowCount() ){
      foreach( $query as $row ){

            echo '<option value="'.$row["id"].'">'.$row["category_ad"].'</option>';
          }
        }
     }

     //ICERIKLERI LİSTELER
     public function List_Content()
     {
          $db = DB();
          $i = 0;
          $CategoryID = "";
          $query = $db->query("select * from icerikler INNER JOIN icerik_category ON icerik_category.id = icerikler.urun_categoryID ", PDO::FETCH_ASSOC);
              if ( $query->rowCount() ){
         foreach( $query as $row ){
                $i +=1 ;

               echo '<tr>';
               echo '<td>'.$i.'</td>';
               echo '<td>'.$row["urun_adi"].'</td>';
               echo '<td>'.$row["urun_fiyati"].'</td>';
               echo '<td>'.$row["category_ad"].'</td>';
               echo '<td><a href="icerik_duzenle?ID='.$row["urun_id"].'"><button class="btn btn-success"><i class="fas fa-edit"> DÜZENLE</button></i></td>';
               echo '</tr>';
             }
           }
     }



}
