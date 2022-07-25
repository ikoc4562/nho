<?php
include 'header.php';
include 'yanmenu.php';
?>

<?php

if ($_GET['islem']=='sil' and @$_GET['id'])
{
    // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update services set is_deleted=1 where id=:id');
    $sql->execute(['id'=>$_GET['id']]);


}
$sql=$db->query('select * from services where  is_deleted=0');
$services=$sql->fetchAll();
?>
<div class="content-wrapper">


    <div class="box">
        <div class="box-header" style="float: right">
            <a href="newservice.php" class="btn btn-success btn-xm">Add New</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Text</th>
                    <th>Icon</th>

                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($services as $service) {
                    ?>
                    <tr>

                        <td><?= $service['title'] ?>
                        <td><?= $service['text'] ?>
                        <td><?= $service['icon'] ?>
                        <td>
                            <a href="service.php?islem=sil&id=<?= $service['id'] ?>" class="btn btn-danger btn-xs">Delete</a>

                            <a href="newservice.php?islem=guncelle&id=<?= $service['id'] ?>"
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
