<?php
include 'header.php';
include 'yanmenu.php';
?>
<?php

if ($_GET['islem']=='guncelle' and @$_GET['id'])
{

    $sql=$db->query('select * from contactinfo where id="'.$_GET['id'].'"');
    $contactinfo=$sql->fetchAll();

    $email=$contactinfo[0]['email'];
    $phone=$contactinfo[0]['phone'];
    $googlemaps=$contactinfo[0]['googlemaps'];
    $address=$contactinfo[0]['address'];
}

$sql=$db->prepare ('select * from contactinfo where id=:id');
$sql->execute(['id'=>$_GET['id']]);


if (@$_POST['isGuncelle'])
{
    $sql=$db->prepare('update contactinfo set email=:email,phone=:phone,address=:address where id=:id');
    $sql->execute(['email'=>$_POST['email'],'phone'=>$_POST['phone'],'address'=>$_POST['address'],'id'=>$_GET['id']]);
    ?>
    <meta http-equiv="refresh" content="0; url=contactinfo.php" />
    <?php

}
?>

<div class="content-wrapper">


    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Update Contact info Page</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" value="1" name="isGuncelle">
            <div class="box-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="text" class="form-control" name="email" value="<?=$email?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?=$phone?>">
                </div>

               <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Maps</label>
                    <textarea id="editor1">
                        <?//$googlemaps?>
                    </textarea>
                </div> -->


                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" name="address" value="<?=$address?>">
                </div>



            </div>
            <!-- /.box-body -->

            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>



</div>
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
</script>
<?php
include 'footer.php';
?>
