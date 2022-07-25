<?php
session_start();
ob_start();

include '../ayarlar.php';

$sql=$db->prepare("update kullanicilar set token=:a1 where id=:id");
$sql->execute([
    'a1'=>null,
    "id"=>$_GET['id'],
]);
session_destroy();
setcookie("user_token", "", time() - 3600); //′Cookie_Isim′ isimli çerezi sil
header('Location: ../index.php');

?>

