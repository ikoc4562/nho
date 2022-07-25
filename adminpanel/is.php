<?php
include 'header.php';
include 'yanmenu.php';

if ($_GET['islem']=='sil' and @$_GET['id'])
{
    // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update is_tablosu set aktifmi=0 where id=:id');
    $sql->execute(['id'=>$_GET['id']]);


}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <div class="box">
          <div class="box-header" style="float: right">
              <a href="newis.php" class="btn btn-success btn-xm">Add New</a>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Kurum</th>
                      <th>Statu</th>
                      <th>Yil</th>
                      <th>Islemler</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sql=$db->query('select * from is_tablosu where aktifmi=1');
                  $sonuc2=$sql->fetchAll();
                  foreach ($sonuc2 as $sonuc)
                  {

                      ?>
                      <tr>
                          <td>
                              <?=$sonuc['statu']?>
                          </td>
                          <td>
                              <?=$sonuc['kurum']?>
                          </td>
                          <td>
                              <?=$sonuc['yili']?>
                          </td>

                          <td>
                              <a href="is.php?islem=sil&id=<?= $sonuc['id'] ?>" class="btn btn-danger btn-xs">Delete</a>
                              |
                              <a href="newis.php?islem=guncelle&id=<?= $sonuc['id'] ?>"
                                 class="btn btn-primary btn-xs">Update</a>
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
