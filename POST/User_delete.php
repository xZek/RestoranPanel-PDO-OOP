<?php
if(isset($_POST["delete"])) {
    $result = $User->delete($_GET["ID"], $user->username);
    $basariBTN_Timer = true;
    $message = "Hesap Silinmiştir";
    echo '<script>
setTimeout(function(){
window.location.assign("http://'.$URL.'/panel/kullanici_duzenle");
//2 saniye sonra yönlenecek
}, 2000);
</script>
';
}

?>
