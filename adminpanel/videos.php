<?php
include 'header.php';
include 'yanmenu.php';
?>

<?php

if ($_GET['islem']=='sil' and @$_GET['id'])
{
   // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update videos set is_deleted=1 where id=:id');
    $sql->execute(['id'=>$_GET['id']]);


}

?>
  <div class="content-wrapper">


      <div class="box">
          <div class="box-header" style="float: right">
              <a href="videos_new.php" class="btn btn-success btn-xm">Add New</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Title</th>
                      <th>Picture</th>
                      <th></th>


                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sql=$db->query('select * from videos where  is_deleted=0');
                  $videos=$sql->fetchAll();
                  foreach ($videos as $video) {
                      ?>
                      <tr>

                          <td><?= $video['title'] ?>
                          <td><img src="../images/<?= $video['picture'] ?>" width="100px"></td>

                          <td>
                             <a href="videos.php?islem=sil&id=<?= $video['id'] ?>" class="btn btn-danger btn-xs">Delete</a>

                              <a href="videos_update.php?islem=guncelle&id=<?= $video['id'] ?>"
                                 class="btn btn-primary btn-xs">Update</a>


                          </td>
                      </tr>
                      <?php
                  }
                  ?>
                  </tbody>
              </table>
          </div>
          <!-- /.box-body -->
      </div>


  </div>
<?php
include 'footer.php';
?>
