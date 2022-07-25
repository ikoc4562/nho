<?php
include 'header.php';
include 'yanmenu.php';
?>
<?php

if ($_GET['islem']=='guncelle' and @$_GET['id'])
{

    $sql=$db->query('select * from about where id="'.$_GET['id'].'"');
    $sonuclar=$sql->fetchAll();

    $logo=$sonuclar[0]['logo'];
    $title=$sonuclar[0]['title'];
    $contents=$sonuclar[0]['contents'];
    $mission=$sonuclar[0]['mission'];
    $vision=$sonuclar[0]['vision'];
    $values2=$sonuclar[0]['values2'];
    $bank=$sonuclar[0]['bank'];
    $iban=$sonuclar[0]['iban'];
    /*
    $facebook=$sonuclar[0]['facebook'];
    $twitter=$sonuclar[0]['twitter'];
    $instagram=$sonuclar[0]['instagram'];
    $google=$sonuclar[0]['google'];
    $linkedin=$sonuclar[0]['linkedin'];
    */
}

if (@$_POST['isKaydet'])
{
    if(@$_POST['id'])
    {

        if (@$_FILES['logo']['name']<>'')
        {
            echo 'logo';
            $hedef = "../images/";
            $kaynak2 = $_FILES["logo"]["tmp_name"];
            $resim2 = $_FILES["logo"]["name"];
            $rtipi2 = $_FILES["logo"]["type"];
            $rboyut2 = $_FILES["logo"]["size"];
            $ruzanti2 	= substr($resim2, -4);
            $yeniad2	= substr(uniqid(md5(rand())), 0,15);
            $resim2 = $yeniad2.$ruzanti2;

            @move_uploaded_file($kaynak2, $hedef . '/' . $resim2);

            $sql=$db->prepare('update about set logo=:logo where id=:id');
            $sql->execute([
                'logo'=>$resim2,
                'id'=>$_GET['id']
            ]);

        }

            $sql=$db->prepare('update about set title=:title, contents=:contents,
mission=:mission,vision=:vision, values2=:values2, bank=:bank, iban=:iban where id=:id');
            $sql->execute([
                'title'=>$_POST['title'],
                'contents'=>$_POST['contents'],
                'vision'=>$_POST['vision'],
                'mission'=>$_POST['mission'],
                'values2'=>$_POST['values2'],
                'bank'=> $_POST['bank'],
                'iban'=>$_POST['iban'],
                'id'=>$_GET['id']
            ]);
            /*


                'google'=>$_POST['google'],
                'linkedin'=>$_POST['linkedin'],
                'telefon'=>$_POST['telefon'],
                'adres'=>$_POST['adres'],
                'id'=>$_GET['id']
             */

        }

    ?>
    <meta http-equiv="refresh" content="0; url=hakkinda.php" />
<?php

}
?>

  <div class="content-wrapper">


      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Update About page</h3>
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
                      <label for="exampleInputEmail1">Contents</label>
                      <textarea id="editor1" name="contents" rows="10" cols="80" >
                        <?=$contents?>
                    </textarea>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Mission</label>
                      <input type="text" class="form-control" name="mission" value="<?=$mission?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Vision</label>
                      <input type="text" class="form-control" name="vision" value="<?=$vision?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Values</label>
                      <input type="text" class="form-control" name="values2" value="<?=$values2?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Swift</label>
                      <input type="text" class="form-control" name="bank" value="<?=$bank?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Account Number</label>
                      <input type="text" class="form-control" name="iban" value="<?=$iban?>">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputFile">Logo</label>
                      <input type="file" id="logo" name="logo">
                      <img src="../images/<?=$logo?>" width="100px">

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
