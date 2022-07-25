<?php
include 'header.php';
include 'yanmenu.php';
?>
<?php

if ($_GET['islem']=='guncelle' and @$_GET['id'])
{

    $sql=$db->query('select * from portfolio where is_deleted=0 and id="'.$_GET['id'].'"');
    $sonuclar=$sql->fetchAll();

    $title=$sonuclar[0]['title'];
    $group_type=$sonuclar[0]['group_type'];


}

if (@$_POST['isKaydet'])
{


            $sql=$db->prepare('update portfolio set title=:title,group_type=:group_type where id=:id');
            $sql->execute([
                'title'=>$_POST['title'],
                'group_type'=>$_POST['group_type'],
                'id'=>$_POST['id']
            ]);




    ?>
    <meta http-equiv="refresh" content="0; url=resimgoster.php" />
    <?php

}
?>

  <div class="content-wrapper">


      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Update Photo</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form method="post" enctype="multipart/form-data">
              <input type="hidden" value="1" name="isKaydet">
              <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" name="title" value="<?=$title?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Group_type</label>
                      <input type="text" class="form-control" name="group_type" value="<?=$group_type?>">
                  </div>


              </div>
              <!-- /.box-body -->
               <input type="hidden" name="id" value="<?=$_GET['id']?>">
              <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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
