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

     //Kullanıcı Düzenleme Ekranındaki Kullanıcıları getirir

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
