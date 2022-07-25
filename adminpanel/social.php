<?php
include 'header.php';
include 'yanmenu.php';
?>

<?php

if ($_GET['islem']=='sil' and @$_GET['id'])
{
    // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update social_media set is_deleted=1 where id=:id');
    $sql->execute(['id'=>$_GET['id']]);


}
$sql=$db->query('select * from social_media where  is_deleted=0');
$socials=$sql->fetchAll();
?>
<div class="content-wrapper">


    <div class="box">
        <div class="box-header" style="float: right">
            <a href="socialupdate.php" class="btn btn-success btn-xm">Add New</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Icon</th>
                    <th>Link</th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($socials as $social) {
                    ?>
                    <tr>

                        <td><?= $social['title'] ?></td>

                        <td><?= $social['link'] ?>
                        <td>
                            <a href="social.php?islem=sil&id=<?= $social['id'] ?>" class="btn btn-danger btn-xs">Delete</a>

                            <a href="socialupdate.php?islem=guncelle&id=<?= $social['id'] ?>"
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
