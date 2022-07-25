<?php
include 'header.php';
include 'yanmenu.php';
?>
<?php

$sql=$db->prepare ('select * from causes where id=:id and is_deleted=0');
$sql->execute(['id'=>$_GET['id']]);
$causes=$sql->fetchAll();

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
        $sql=$db->prepare('update causes set title=:title,picture=:resim ,raised_amount=:raised_amount,goal_amount=:goal_amount,is_deleted=:is_deleted,text=:text where id=:id');
        $sql->execute(['title'=>$_POST['title'],'resim'=>$resim,'raised_amount'=>$_POST['raised_amount'],'goal_amount'=>$_POST['goal_amount'],'is_deleted'=>0,'id'=>$_GET['id'],'text'=>$_POST['text']]);

    }
    else
    {
        $sql=$db->prepare('update causes set title=:title,raised_amount=:raised_amount,goal_amount=:goal_amount,is_deleted=:is_deleted,text=:text where id=:id');
        $sql->execute(['title'=>$_POST['title'],'raised_amount'=>$_POST['raised_amount'],'goal_amount'=>$_POST['goal_amount'],'id'=>$_GET['id'],'is_deleted'=>0,'text'=>$_POST['text']]);
    }

?>
    <meta http-equiv="refresh" content="0; url=causes.php" />
<?php

}
?>
  <div class="content-wrapper">


      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Yeni Hakinda Ekleme</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form method="post" enctype="multipart/form-data">
              <input type="hidden" value="1" name="isGuncelle">
              <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">title</label>
                      <input type="text" class="form-control" name="title" value="<?=$causes[0]['title']?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">raised amount</label>
                      <input type="text" class="form-control" name="raised_amount" value="<?=$causes[0]['raised_amount']?>">
                  </div>


                  <div class="form-group">
                      <label for="exampleInputEmail1">goal amount </label>
                      <input type="text" class="form-control" name="goal_amount" value="<?=$causes[0]['goal_amount']?>">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">text</label>
                      <input type="text" class="form-control" name="text" value="<?=$causes[0]['text']?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputFile">Resim</label>
                      <input type="file" id="fotograf" name="fotograf">
                      <img src="../images/<?=$causes[0]['picture']?>" width="100px">
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
