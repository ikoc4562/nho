<?php
include 'header.php';
include 'yanmenu.php';
?>

<?php
if ($_GET['islem']=='sil' and @$_GET['id'])
{
   // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update kullanicilar set aktifmi=1 where id=:id');
    $sql->execute(['id'=>$_GET['id']]);
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <div class="box">
          <div class="box-header" style="float: right">
              <a href="newusers.php" class="btn btn-success btn-xm">Add New</a>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Picture</th>
                      <th>Email</th>
                      <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sql=$db->query('select * from kullanicilar where aktifmi=0 and id>3');
                  $sliders=$sql->fetchAll();
                  foreach ($sliders as $slider)
                  {

                      ?>
                      <tr>
                          <td><img src="../images/<?= $slider['resim'] ?>" width="100px"></td>
                          <td><?=$slider['email']?></td>
                          <td>
                              <?php if($slider['id']>7){?>
                              <a href="users.php?islem=sil&id=<?=$slider['id'] ?>" class="btn btn-danger btn-xs">Delete</a>
                              <?php } ?>
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
