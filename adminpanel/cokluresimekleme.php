<?php
include 'header.php';
include 'yanmenu.php';
include '../ayarlar.php';


if (@$_FILES['file']<>'')
{

    $hedef = "../images/";
    $kaynak1 = $_FILES['file']["tmp_name"];
    $resim = $_FILES['file']["name"];
    @move_uploaded_file($kaynak1, $hedef . '/' . $resim);

    $belge_kayit = $db->prepare("INSERT INTO portfolio SET picture=:resim,is_deleted=:aktifmi");
    $belge_kayit->execute(['resim'=>$resim,'aktifmi'=>0]);

}

?>

    <link rel="stylesheet" type="text/css" href="dropzone.css">
    <script src="dropzone.js" type="text/javascript"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="box">
        <div class="box-header" style="float: left">
            <a href="" class="btn btn-success btn-xm">Add photos to portfolio</a>

        </div>

    <form action="#" method="post" enctype="multipart/form-data" class="dropzone">
        <input type="hidden" name="isKaydet" value="1">
    </form>


    </div>
</div>


    <?php
    include 'footer.php';
    ?>



