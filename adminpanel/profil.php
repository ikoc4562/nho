<?php
include 'header.php';
include 'yanmenu.php'
?>

<?php

if (@$_POST['password'])
{
    $sql=$db->query('update kullanicilar set sifre="'.$_POST['password'].'" where id="'.$_SESSION['id'].'"');
    if ($sql)
    {
        $mesaj='Updated.';

        ?>
        <meta http-equiv="refresh" content="3; url=users.php" />

<?php
    }
}

if (@$_FILES['fotograf']['name']<>'')
{

    $hedef = "../images/";
    $kaynak1 = $_FILES["fotograf"]["tmp_name"];
    $resim1 = $_FILES["fotograf"]["name"];
    $rtipi1 = $_FILES["fotograf"]["type"];
    $rboyut1 = $_FILES["fotograf"]["size"];
    $ruzanti1 	= substr($resim1, -4);
    $yeniad1	= substr(uniqid(md5(rand())), 0,15);
    $resim = $yeniad1.$ruzanti1;
    @move_uploaded_file($kaynak1, $hedef . '/' . $resim);

    $sql=$db->prepare('update kullanicilar set resim=:resim where id=:id');


    $sql->execute([
        'resim'=>$resim,
        'id'=>$_SESSION['id']
    ]);

    ?>
    <meta http-equiv="refresh" content="0; url=users.php" />

    <?php
}
?>

  <div class="content-wrapper">
      <?php
      if (@$_POST['password'])
      {
          ?>
          <div class="alert alert-success">
              <?=$mesaj?>
          </div>
      <?php
      }
?>
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Profile Update</h3>
          </div>

          <?php
          $sql=$db->query('select * from kullanicilar where aktifmi=0 and id="'.$_GET['id'].'"');
          $sonuc=$sql->fetchAll();
          ?>

          <form role="form" method="post" enctype="multipart/form-data">
              <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?=$sonuc[0]['email']?>" disabled>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputPassword1">Resim</label>
                      <?php
                        if ($sonuc[0]['resim']<>'')
                        {
                            $resim=$sonuc[0]['resim'];
                        }
                        else
                        {
                            $resim='resimyok.png';
                        }
                      ?>
                      <img src="../images/<?=$resim?>" width="50px">
                      <input type="file" id="fotograf" name="fotograf">

                  </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Guncelle</button>
                  <a href="users.php"><button type="button" class="btn btn-warning">Cancel</button></a>

              </div>
          </form>
      </div>

  </div>



<?php
include 'footer.php';
?>
