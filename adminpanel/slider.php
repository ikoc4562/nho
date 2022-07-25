<?php
include 'header.php';
include 'yanmenu.php';
?>

<?php
if ($_GET['islem']=='sil' and @$_GET['id'])
{
   // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update slider set is_deleted=1 where id=:id');
    $sql->execute(['id'=>$_GET['id']]);
}
$sql=$db->query('select * from slider where is_deleted=0');
$sliders=$sql->fetchAll();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <div class="box">
          <div class="box-header" style="float: right">
              <a href="sliderupdate.php" class="btn btn-success btn-xm">Add New</a>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Picture</th>
                      <th>Title</th>
                      <th>Text</th>
                      <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php

                  foreach ($sliders as $slider)
                  {

                      ?>
                      <tr>
                          <td><img src="../images/<?= $slider['picture'] ?>" width="100px"></td>
                          <td><?=$slider['title']?></td>
                          <td><?=$slider['text']?></td>
                          <td><a href="slider.php?islem=sil&id=<?=$slider['id'] ?>" class="btn btn-danger btn-xs">Delete</a>
                              |
                              <a href="sliderupdate.php?islem=guncelle&id=<?=$slider['id'] ?>"
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
