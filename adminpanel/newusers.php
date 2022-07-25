<?php
include 'header.php';
include 'yanmenu.php';
?>
<?php


if (@$_POST['isKaydet'])
{

    if (@$_FILES['picture']['name']<>'')
    {
        $hedef = "../images/";
        $kaynak2 = $_FILES["picture"]["tmp_name"];
        $resim2 = $_FILES["picture"]["name"];
        $rtipi2 = $_FILES["picture"]["type"];
        $rboyut2 = $_FILES["picture"]["size"];
        $ruzanti2 	= substr($resim2, -4);
        $yeniad2	= substr(uniqid(md5(rand())), 0,15);
        $resim2 = $yeniad2.$ruzanti2;

        @move_uploaded_file($kaynak2, $hedef . '/' . $resim2);
        $sql = $db->prepare('insert into kullanicilar(email,sifre,resim) values(?,?,?)');
        $sql->execute([
            $_POST['email'],
            $_POST['sifre'],
            $resim2
        ]);

    }

    ?>
    <meta http-equiv="refresh" content="0; url=users.php" />
    <?php

}
?>



  <div class="content-wrapper">


      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Update Slider Page</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form method="post" enctype="multipart/form-data">
              <input type="hidden" value="1" name="isKaydet">

              <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputFile">Picture</label>
                      <input type="file" name="picture">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" class="form-control" name="email">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Password</label>
                      <input type="text" class="form-control" name="sifre">
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
