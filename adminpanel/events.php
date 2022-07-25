<?php
include 'header.php';
include 'yanmenu.php';
?>

<?php

if ($_GET['islem']=='sil' and @$_GET['id'])
{
   // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update events set is_deleted=1 where id=:id');
    $sql->execute(['id'=>$_GET['id']]);


}
$sql=$db->query('select * from events where is_deleted=0');
$events=$sql->fetchAll();
?>
  <div class="content-wrapper">


      <div class="box">
          <div class="box-header" style="float: right">
              <a href="events_new.php" class="btn btn-success btn-xm">Add New</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Title</th>
                      <th>Picture</th>
                      <th>Date</th>
                      <th>Address</th>
                      <th>Adddate</th>
                      <th>Iban</th>
                      <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php

                  foreach ($events as $event) {
                      ?>
                      <tr>

                          <td><?= $event['title'] ?></td>
                          <td><img src="../images/<?= $event['picture'] ?>" width="100px"></td>
                          <td><?= $event['date'] ?></td>
                          <td> <?= $event['address'] ?></td>
                          <td> <?= $event['adddate'] ?></td>
                          <td> <?= $event['iban'] ?></td>

                          <td>
                             <a href="events.php?islem=sil&id=<?= $event['id'] ?>" class="btn btn-danger btn-xs">Delete</a>

                              <a href="events_update.php?islem=guncelle&id=<?= $event['id'] ?>"
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
