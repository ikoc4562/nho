<?php
session_start();
include '../ayarlar.php';
?>

<?php

   if (@$_FILES['file']<>'')
{

    $hedef = "../images/";
    $kaynak1 = $_FILES['file']["tmp_name"];
    $resim = $_FILES['file']["name"];
    @move_uploaded_file($kaynak1, $hedef . '/' . $resim);

    $belge_kayit = $db->prepare("INSERT INTO fotolarim SET resim=:resim,aktifmi=:aktifmi");
    $belge_kayit->execute(['resim'=>$resim,'aktifmi'=>1]);

}



?>


