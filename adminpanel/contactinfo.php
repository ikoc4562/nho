<?php
include 'header.php';
include 'yanmenu.php';
?>

<?php
if ($_GET['islem']=='sil' and @$_GET['id'])
{
    // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update contactinfo set where id=:id');
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
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Maps</th>
                    <th>Address</th>
                    <th></th>


                </tr>
                </thead>
                <tbody>
                <?php
                $sql=$db->query('select * from contactinfo');
                $contactinfo=$sql->fetchAll();
                foreach ($contactinfo as $info) {
                    ?>
                    <tr>

                        <td><?= $info['email'] ?></td>
                        <td><?= $info['phone'] ?></td>
                        <td><?= $info['googlemaps'] ?></td>
                        <td><?= $info['address'] ?></td>
                        <td>


                            <a href="contactinfoupdate.php?islem=guncelle&id=<?=$info['id'] ?>"
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
