<?php
if(isset($_POST["edit"])) {

     $username = $_POST["username"];
     $password = $_POST["password"];
     $user_id = $_POST['id'];
   if(empty($username))
   {
     $hataBTN = true;
     $message = "Kullanıcı adı boş bırakılamaz";
   }else if(empty($password)){

     $result = $User->ChangeUsername($user_id,$username, $user->user_id, $user->username);
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

          $result = $User->ChangeAll($user_id,$username, $password, $user->user_id, $user->username);
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
