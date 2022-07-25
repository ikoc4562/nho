<?php
include 'header.php';
include 'yanmenu.php';

if ($_GET['islem']=='sil' and @$_GET['id'])
{
    // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update donations set is_deleted=1 where id=:id');
    $sql->execute(['id'=>$_GET['id']]);


}

if ($_GET['islem']=='pay' and @$_GET['id'])
{
    // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update donations set is_paid=1 where id=:id');
    $sql->execute(['id'=>$_GET['id']]);

}
?>
<?php
$cas=array();
$sql=$db->query('select * from causes where is_deleted=0');
$causes=$sql->fetchAll();
foreach ($causes as $cause) {
    $cas[$cause[0]]=$cause[1];

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
                      <th>Cause</th>
                      <th>Amaount</th>
                      <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sql=$db->query('select * from donations where is_deleted=0');
                  $sonuc2=$sql->fetchAll();
                  foreach ($sonuc2 as $sonuc)
                  {

                      ?>
                      <tr <?php if($sonuc['is_paid']==1) echo 'style="background-color: lightgreen"';?>>
                          <td>
                              <?=$sonuc['dname']?>
                          </td>
                          <td>
                              <?=$sonuc['email']?>
                          </td>
                          <td>
                              <?=$cas[$sonuc['cause_id']]?>

                          </td>
                          <td><?=$sonuc['amount']?></td>
                          <td>
                              <a href="donation.php?islem=sil&id=<?= $sonuc['id'] ?>" class="btn btn-danger btn-xs">Delete</a>
                              <?php
                              if($sonuc['is_paid']==0) {
                                  ?>
                                  |
                                  <a href="donation.php?islem=pay&id=<?= $sonuc['id'] ?>"
                                     class="btn btn-primary btn-xs">Paid?</a>
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
