<?php
include 'header.php';
include 'yanmenu.php';
?>
<?php

if ($_GET['islem']=='guncelle' and @$_GET['id'])
{

    $sql=$db->query('select * from dil_tablosu where aktifmi=1 and id="'.$_GET['id'].'"');
    $sonuclar=$sql->fetchAll();

    $dil=$sonuclar[0]['dil'];
    $okuma=$sonuclar[0]['okuma'];
    $yazma=$sonuclar[0]['yazma'];
    $konusma=$sonuclar[0]['konusma'];

}

if (@$_POST['isKaydet'])
{
    if(@$_POST['id'])
    {


            $sql=$db->prepare('update dil_tablosu set dil=:dil, okuma=:okuma , yazma=:yazma , konusma=:konusma  where id=:id');
            $sql->execute([
                'dil'=>$_POST['dil'],
                'okuma'=>$_POST['okuma'],
                'yazma'=>$_POST['yazma'],
                'konusma'=>$_POST['konusma'],
                'id'=>$_GET['id']
            ]);

        }

    else
        {

                $sql=$db->prepare('insert into dil_tablosu(dil,okuma,yazma,konusma) values(?,?,?,?)');
                $sql->execute([
                    $_POST['dil'],
                    $_POST['okuma'],
                    $_POST['yazma'],
                    $_POST['konusma']
                ]);

        }

    ?>
    <meta http-equiv="refresh" content="0; url=dil.php" />
    <?php

}
?>

  <div class="content-wrapper">


      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Yeni Dil Ekleme</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form method="post" enctype="multipart/form-data">
              <input type="hidden" value="1" name="isKaydet">
              <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Dil</label>
                      <input type="text" class="form-control" name="dil" value="<?=$dil?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Okuma</label>
                      <input type="text" class="form-control" name="okuma" value="<?=$okuma?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Yazma</label>
                      <input type="text" class="form-control" name="yazma" value="<?=$yazma?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Konusma</label>
                      <input type="text" class="form-control" name="konusma" value="<?=$konusma?>">
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
