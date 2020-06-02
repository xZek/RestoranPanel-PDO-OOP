<?php
class User
{

//Giriş yapma işlemi
   public function Login($username, $password)
   {
       try {
           $db = DB();
           $query = $db->prepare("SELECT user_id FROM users WHERE (username=:username) AND password=:password AND adm>=1");
           $query->bindParam("username", $username, PDO::PARAM_STR);
           $enc_password = hash('sha256', $password);
           $query->bindParam("password", $enc_password, PDO::PARAM_STR);
           $query->execute();
           if ($query->rowCount() > 0) {
               $result = $query->fetch(PDO::FETCH_OBJ);
               return $result->user_id;
           } else {
               return false;
           }
       } catch (PDOException $e) {
           exit($e->getMessage());
       }
   }

//Giriş yapan kullanıcı bilgilerini getirir
public function UserDetails($user_id)
{
    try {
        $db = DB();
        $query = $db->prepare("SELECT user_id, username, adm FROM users WHERE user_id=:user_id");
        $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            return $query->fetch(PDO::FETCH_OBJ);
        }
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}

//Çalışan Sayısını Getirir
public function Worker()
{
 try {
     $db = DB();
     $query = $db->prepare("SELECT count(*) FROM users WHERE adm = 0");
     $query->execute();
     $number_of_rows = $query->fetchColumn();
      echo $number_of_rows;

     if ($query->rowCount() > 0) {
         return $query->fetch(PDO::FETCH_OBJ);
     }
 } catch (PDOException $e) {
     exit($e->getMessage());
 }
}


//Kullanıcı Düzenleme Ekranındaki Kullanıcıları getirir
public function ListMakeUser()
{
     $db = DB();
     $i = 0;
     $admin_name = "";
     $query = $db->query("SELECT * FROM users", PDO::FETCH_ASSOC);
 if ( $query->rowCount() ){
    foreach( $query as $row ){
           $i +=1 ;
           $ID = $row["user_id"];
           if($row["adm"] == 1)
           {
              $admin_name  = "Yetkili";
           }
           else if($row["adm"] == 2){

              $admin_name = "Yönetici";
           }
          echo '<tr>';
          echo '<td>'.$i.'</td>';
          echo '<td>'.$row["username"].'</td>';
          echo '<td>'.$admin_name.'</td>';
          echo '<td><a href="kullanici_detay?ID='.$row["user_id"].'"><button class="btn btn-success"><i class="fas fa-edit"> DÜZENLE</button></i></td>';
          echo '</tr>';
        }
      }
}
/* Düzenlenen kullanıcı ismini update eder */
   public function ChangeUsername($userID, $username, $ownID, $ownName)
   {

     $db =  DB();




      $update = "UPDATE users SET username = '" . $username . "'  WHERE user_id=" . $userID;
      $done =  $db->query($update);
      if($done)
      {
        // OTOMATIK LOG INPUTU
        $Proccess =  'ID : '. $userID .  ' - Ad : '. $username.' -  Kullanıcının  ad  değişikliği';

                  //BURADA LOG EKLIYORUZ
                $query = $db->prepare("INSERT INTO activity_log(userID,procces, who_didthis) VALUES (:userID, :procces, :who_didthis)");
                $query->bindParam("userID", $ownID, PDO::PARAM_STR);
                $query->bindParam("procces", $Proccess, PDO::PARAM_STR);
                $query->bindParam("who_didthis", $ownName , PDO::PARAM_STR);
                $query->execute();
         }
         else{
              echo "Sitede Bir Sorun oluştu destek ekiple iletişime geçiniz";
              exit();
         }

   }

   /* Düzenlenen kullanıcı adı ve şifre girili ise update eder */
      public function ChangeAll($userID, $username, $password, $ownID, $ownName)
      {

        $db =  DB();

          $enc_password = hash('sha256', $password);




         $update = "UPDATE users SET username = '" . $username . "' , password='" . $enc_password . "' WHERE user_id=" . $userID;
         $done =  $db->query($update);
         if($done)
         {
           // OTOMATIK LOG INPUTU
           $Proccess =  'ID : '. $userID .  ' - Ad : '. $username.' -  Kullanıcının  ad ve şifre değişikliği';

                     //BURADA LOG EKLIYORUZ
                   $query = $db->prepare("INSERT INTO activity_log(userID,procces, who_didthis) VALUES (:userID, :procces, :who_didthis)");
                   $query->bindParam("userID", $ownID, PDO::PARAM_STR);
                   $query->bindParam("procces", $Proccess, PDO::PARAM_STR);
                   $query->bindParam("who_didthis", $ownName , PDO::PARAM_STR);
                   $query->execute();
         }
         else{
               echo "Sitede Bir Sorun oluştu destek ekiple iletişime geçiniz";
               exit();
         }

      }

      //Kullanıcı Silme İşlemi
      public function delete($myID,$whoDid)
    {

           $db =  DB();
           $Proccess = "Hesap Silme";

           //BURADA LOG EKLIYORUZ
     $query = $db->prepare("INSERT INTO activity_log(userID,procces, who_didthis) VALUES (:userID, :procces, :who_didthis)");
     $query->bindParam("userID", $myID, PDO::PARAM_STR);
     $query->bindParam("procces", $Proccess, PDO::PARAM_STR);
     $query->bindParam("who_didthis", $whoDid , PDO::PARAM_STR);
     $query->execute();


        $delete = "DELETE FROM `users` where user_id='$myID'";

        $db->query($delete);

    }






 }






  ?>
