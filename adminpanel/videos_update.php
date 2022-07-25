<?php
include 'header.php';
include 'yanmenu.php';
?>
<?php

$sql=$db->prepare ('select * from videos where id=:id and is_deleted=0');
$sql->execute(['id'=>$_GET['id']]);
$videos=$sql->fetchAll();

if (@$_POST['isGuncelle'])
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
        $sql=$db->prepare('update videos set title=:title,link=:link,text=:text,picture=:resim ,is_deleted=:is_deleted where id=:id');
        $sql->execute(['title'=>$_POST['title'],'resim'=>$resim,'link'=>$_POST['link'],'text'=>$_POST['text'],'is_deleted'=>0,'id'=>$_GET['id']]);

    }
    else
    {
        $sql=$db->prepare('update videos set title=:title,link=:link,text=:text,is_deleted=:is_deleted where id=:id');
        $sql->execute(['title'=>$_POST['title'],'link'=>$_POST['link'],'text'=>$_POST['text'],'is_deleted'=>0,'id'=>$_GET['id']]);
    }
    header('location:causes.php');
}

?>

  <div class="content-wrapper">


      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Add New Video</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form method="post" enctype="multipart/form-data">
              <input type="hidden" value="1" name="isGuncelle">
              <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">title</label>
                      <input type="text" class="form-control" name="title" value="<?=$videos[0]['title']?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">raised amount</label>
                      <input type="text" class="form-control" name="link" value="<?=$videos[0]['link']?>">
                  </div>


                  <div class="form-group">
                      <label for="exampleInputEmail1">text</label>
                      <input type="text" class="form-control" name="text" value="<?=$videos[0]['text']?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputFile">Resim</label>
                      <input type="file" id="fotograf" name="fotograf">
                      <img src="../images/<?=$videos[0]['picture']?>" width="100px">
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
