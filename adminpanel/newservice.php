<?php
include 'header.php';
include 'yanmenu.php';
?>
<?php

if ($_GET['islem']=='guncelle' and @$_GET['id'])
{

    $sql=$db->query('select * from services where is_deleted=0 and id="'.$_GET['id'].'"');
    $sonuclar=$sql->fetchAll();

    $title=$sonuclar[0]['title'];
    $text=$sonuclar[0]['text'];
    $icon=$sonuclar[0]['icon'];

}

if (@$_POST['isKaydet'])
{
    if(@$_POST['id'])
    {


            $sql=$db->prepare('update services set title=:alan_adi, text=:yili , icon=:suresi  where id=:id');
            $sql->execute([
                'alan_adi'=>$_POST['title'],
                'yili'=>$_POST['text'],
                'suresi'=>$_POST['icon'],
                'id'=>$_GET['id']
            ]);

        }

    else
        {

                $sql=$db->prepare('insert into services(title,text,icon) values(?,?,?)');
                $sql->execute([
                    $_POST['title'],
                    $_POST['text'],
                    $_POST['icon']
                ]);

        }

    ?>
    <meta http-equiv="refresh" content="0; url=service.php" />
    <?php

}
?>

  <div class="content-wrapper">


      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Add New Service</h3>
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
                      <label for="exampleInputEmail1">Text</label>
                      <input type="text" class="form-control" name="text" value="<?=$text?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Icon</label>
                      <input type="text" class="form-control" name="icon" value="<?=$icon?>">
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
