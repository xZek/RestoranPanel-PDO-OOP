<?php
if(isset($_POST["edit"])) {

     $username = $_POST["username"];
     $password = $_POST["password"];

   if(empty($username))
   {
     $hataBTN = true;
     $message = "Kullanıcı adı boş bırakılamaz";
   }else if(empty($password)){

     $result = $User->ChangeUsername($user->user_id, $user->username);
     $basariBTN_Timer = true;
     $message = "Başarıyla Kaydedildi";
     echo '<script>
   setTimeout(function(){
       window.location.assign("http://'.$URL.'/panel/kullanici_duzenle");
       //2 saniye sonra yönlenecek
     }, 2000);
 </script>
 ';
   }else{

          $result = $User->ChangeAll($user->user_id, $user->username);
          $basariBTN_Timer = true;
          $message = "Başarıyla Kaydedildi";
          echo '<script>
  setTimeout(function(){
      window.location.assign("http://'.$URL.'/panel/kullanici_duzenle");
      //2 saniye sonra yönlenecek
    }, 2000);
</script>
';
   }



}
?>
