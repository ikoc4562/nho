<?php
include 'header.php';
include 'yanmenu.php';
?>

<?php

if ($_GET['islem']=='sil' and @$_GET['id'])
{
   // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update about set is_deleted=0 where id=:id');
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
                      <th>Logo</th>
                      <th>Title</th>
                      <th>Mission</th>
                      <th>Vision</th>
                      <th>Values</th>
                      <th>Swift</th>
                      <th>Account Number</th>
                      <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sql=$db->query('select * from about');
                  $sonuclar=$sql->fetchAll();
                  foreach ($sonuclar as $sonuc) {
                      ?>
                      <tr>
                          <td><img src="../images/<?= $sonuc['logo'] ?>" width="100px"></td>
                          <td><?= $sonuc['title'] ?>
                          <td><?= $sonuc['mission'] ?></td>
                          <td> <?= $sonuc['vision'] ?></td>
                          <td> <?= $sonuc['values2'] ?></td>
                          <td> <?= $sonuc['bank'] ?></td>
                          <td> <?= $sonuc['iban'] ?></td>

                          <td>
                              <!--<a href="hakkinda.php?islem=sil&id=<?= $sonuc['id'] ?>" class="btn btn-danger btn-xs">Delete</a> -->

                              <a href="newhakkinda.php?islem=guncelle&id=<?= $sonuc['id'] ?>"
                                 class="btn btn-primary btn-xs">Update</a>
                              |
                              <a href="cokluresimekleme.php"
                                 class="btn btn-warning btn-xs">Add more images</a>
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
