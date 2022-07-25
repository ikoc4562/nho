<?php
include 'header.php';
include 'yanmenu.php';

if ($_GET['islem']=='sil' and @$_GET['id'])
{
    // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update mesajlar set aktifmi=0 where id=:id');
    $sql->execute(['id'=>$_GET['id']]);


}

if ($_GET['islem']=='guncelle' and @$_GET['id']) {

    // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update mesajlar set okundumu=1 where id=:id');
    $sql->execute(['id'=>$_GET['id']]);


}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Message</th>
                      <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sql=$db->query('select * from mesajlar where aktifmi=1');
                  $sonuc2=$sql->fetchAll();
                  foreach ($sonuc2 as $sonuc)
                  {

                      ?>
                      <tr>
                          <td>
                              <?=$sonuc['isim']?>
                          </td>
                          <td>
                              <?=$sonuc['email']?>
                          </td>

                          <td><?=$sonuc['mesaj']?></td>
                          <td>
                              <a href="mesajlar.php?islem=sil&id=<?= $sonuc['id'] ?>" class="btn btn-danger btn-xs">Delete</a>
                              |
                              <?php if($sonuc['okundumu']==0) { ?>
                                  <a href="mesajlar.php?islem=guncelle&id=<?= $sonuc['id'] ?>"
                                     class="btn btn-primary btn-xs">is Read?</a>
                                  <?php
                              } else
                                  {
                                      ?>
                                  <a href="mesajlar.php?islem=guncelle&id=<?= $sonuc['id'] ?>"
                                     class="btn btn-warning btn-xs">Read</a>
                              <?php
                              }
                              ?>

                          </td>
                      </tr>
                      <?php
                  }?>
                  </tbody>
              </table>
          </div>
          <!-- /.box-body -->
      </div>

  </div>
  <!-- /.content-wrapper -->


<?php
include 'footer.php';
?>
