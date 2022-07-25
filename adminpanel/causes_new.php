<?php
include 'header.php';

include 'yanmenu.php';





if (@$_POST['isKaydet'])
{
    if (@$_FILES['fotograf']['name']<>'')
    {
        $hedef = "../images/";
        $kaynak1 = $_FILES["fotograf"]["tmp_name"];
        $resim1 = $_FILES["fotograf"]["name"];
        $rtipi1 = $_FILES["fotograf"]["type"];
        $rboyut1 = $_FILES["fotograf"]["size"];
        $ruzanti1 	= substr($resim1, -4);
        $yeniad1	= substr(uniqid(md5(rand())), 0,15);
        $resim = $yeniad1.'.'.$ruzanti1;
        @move_uploaded_file($kaynak1, $hedef . '/' . $resim);

        $sql=$db->prepare('insert into causes(title,text,raised_amount,goal_amount,picture,is_deleted) values(?,?,?,?,?,?)');
        $sql->execute([
            $_POST['title'],
            $_POST['text'],
            $_POST['raised_amount'],
            $_POST['goal_amount'],
            $resim,
            0

        ]);

    }

    ?>
    <meta http-equiv="refresh" content="0; url=causes.php" />
    <?php

}
?>

  <div class="content-wrapper">

      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">New Event</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form method="post" enctype="multipart/form-data">
              <input type="hidden" value="1" name="isKaydet">
              <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">title</label>
                      <input type="text" class="form-control" name="title">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">text</label>
                      <input type="text" class="form-control" name="text">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">raised_amount</label>
                      <input type="text" class="form-control" name="raised_amount">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">goal_amount</label>
                      <input type="text" class="form-control" name="goal_amount">
                  </div>


                  <div class="form-group">
                      <label for="exampleInputFile">picture</label>
                      <input type="file" id="fotograf" name="fotograf">

                  </div>

              </div>
              <!-- /.box-body -->

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
