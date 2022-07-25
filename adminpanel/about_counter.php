<?php
include 'header.php';
include 'yanmenu.php';
?>

<?php

if ($_GET['islem']=='sil' and @$_GET['id'])
{
   // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update about_counter set is_deleted=1 where id=:id');
    $sql->execute(['id'=>$_GET['id']]);


}

?>
  <div class="content-wrapper">


      <div class="box">

          <!-- /.box-header -->
          <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Complete</th>
                      <th>Title</th>
                      <th></th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sql=$db->query('select * from about_counter ');
                  $about_counters=$sql->fetchAll();
                  foreach ($about_counters as $about_counter) {
                      ?>
                      <tr>

                          <td><?= $about_counter['complete'] ?></td>
                          <td><?= $about_counter['title'] ?></td>
                          <td>


                              <a href="about_counter_update.php?islem=guncelle&id=<?= $about_counter['id'] ?>"
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
