<?php
ob_start();
 require_once "./Class/Db.php";
 require  './Class/User.php';
$User = new User();
$db = DB();
 $message = '';
 if (!empty($_POST['login'])) {

     $username = trim($_POST['username']);
     $password = trim($_POST['password']);

     if ($username == "") {
        $hataBTN  = true;
      $message = 'Kullanıcı Adı Boş Olamaz!';
     } else if ($password == "") {
        $hataBTN  = true;
         $message = 'Şifre Boş Olamaz!';
     } else {
         $user_id = $User->Login($username, $password); // check user login
         if($user_id > 0)
         {
           $basariBTN_Timer = true;
           $message = "Giriş Başarılı";
             $_SESSION['user_id'] = $user_id; // Set Session
               header("Refresh:3; url=/panel/dashboard");
         }
         else
         {
           $hataBTN  = true;
            $message = 'Kullanici Adı veya şifre yanlış';
         }
     }
 }
ob_end_flush();
?>
