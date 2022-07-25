<?php
include 'header.php';
include 'yanmenu.php';
?>
<?php

$sql=$db->prepare ('select * from about_counter where id=:id');
$sql->execute(['id'=>$_GET['id']]);
$about_counters=$sql->fetchAll();

if (@$_POST['isGuncelle'])
{
    $sql=$db->prepare('update about_counter set complete=:complete,title=:title where id=:id');
    $sql->execute(['title'=>$_POST['title'],'id'=>$_GET['id'],'complete'=>$_POST['complete']]);
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
                      <input type="text" class="form-control" name="title" value="<?=$about_counters[0]['title']?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">google maps</label>
                      <input type="text" class="form-control" name="complete" value="<?=$about_counters[0]['complete']?>">
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
