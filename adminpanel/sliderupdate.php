<?php
include 'header.php';
include 'yanmenu.php';
?>
<?php

if ($_GET['islem']=='guncelle' and @$_GET['id'])
{

    $sql=$db->query('select * from slider where is_deleted=0 and id="'.$_GET['id'].'"');
    $slider=$sql->fetchAll();

    $picture=$slider[0]['picture'];
    $title=$slider[0]['title'];
    $text=$slider[0]['text'];
}

if (@$_POST['isKaydet'])
{

    if(@$_POST['id'])
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

            $sql=$db->prepare('update slider set picture=:logo where id=:id');
            $sql->execute([
                'logo'=>$resim2,
                'id'=>$_GET['id']
            ]);
        }
        $sql=$db->prepare('update slider set title=:title, text=:text where id=:id');
        $sql->execute([
            'title'=>$_POST['title'],
            'text'=>$_POST['text'],
            'id'=>$_GET['id']
        ]);
    }


    else
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
        $sql = $db->prepare('insert into slider(title,text,picture,is_deleted) values(?,?,?,?)');
        $sql->execute([
            $_POST['title'],
            $_POST['text'],
            $resim2,
            0
        ]);

    }

    ?>
    <meta http-equiv="refresh" content="0; url=slider.php" />
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
                      <?php
                      if (@$_GET['id']) {

                          ?>
                          <img src="../images/<?= $picture ?>" width="100px">
                          <?php
                      }
                      ?>
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" name="title" value="<?=$title?>">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Text</label>
                      <input type="text" class="form-control" name="text" value="<?=$text?>">
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
