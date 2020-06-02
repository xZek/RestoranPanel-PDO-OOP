<?php
class Urun
{
  public function IcerikEkle($urunAdi, $urunFiyat,$urunKategoriID,$whoAdd)
     {
         try {
             $db = DB();
             $query = $db->prepare("INSERT INTO icerikler(urun_adi,urun_fiyati, urun_categoryID) VALUES (:urun_adi, :urun_fiyati, :urun_categoryID)");
             $query->bindParam("urun_adi", $urunAdi, PDO::PARAM_STR);
             $query->bindParam("urun_fiyati", $urunFiyat, PDO::PARAM_STR);
             $query->bindParam("urun_categoryID", $urunKategoriID, PDO::PARAM_STR);
             $query->execute();
             return $db->lastInsertId();
         }
          catch (PDOException $e) {
             exit($e->getMessage());
         }
     }



}
