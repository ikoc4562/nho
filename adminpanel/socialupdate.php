<?php
include 'header.php';
include 'yanmenu.php';

$socials=[
        'instagram',
        'facebook',
        'twitter',
        'pinterest',
        'google-plus',
        'linkedin',
        'snapchat-ghost',
        'skype',
        'android',
        'dribbble',
        'vimeo',
        'tumblr',
        'vine',
        'foursquare',
        'stumbleupon',
        'flickr',
        'yahoo',
        'reddit',
        'rss'
];
?>
<?php

if ($_GET['islem']=='guncelle' and @$_GET['id'])
{

    $sql=$db->query('select * from social_media where is_deleted=0 and id="'.$_GET['id'].'"');
    $social=$sql->fetchAll();

    $title=$social[0]['title'];
    $link=$social[0]['link'];

}

if (@$_POST['isKaydet'])
{
    if(@$_POST['id'])
    {


        $sql=$db->prepare('update social_media set title=:title, link=:link  where id=:id');
        $sql->execute([
            'title'=>$_POST['title'],
            'link'=>$_POST['link'],
            'id'=>$_GET['id']
        ]);
    }
    else
    {

        $sql=$db->prepare('insert into social_media(title,link) values(?,?)');
        $sql->execute([
            $_POST['title'],
            $_POST['link']
        ]);
    }
    ?>
    <meta http-equiv="refresh" content="0; url=social.php" />
    <?php

}
?>

<div class="content-wrapper">


    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add New Social Media</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" value="1" name="isKaydet">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Icon</label>
                    <select class="form-group" name="title">
                        <?php
                        foreach ($socials as $social) {
                            ?>
                            <option value="<?=$social?>" <?php if($social==$title){ echo 'selected';}?>><?=$social?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Link</label>
                    <input type="text" class="form-control" name="link" value="<?=$link?>">
                </div>

            </div>
            <!-- /.box-body -->
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>



</div>
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
</script>
<?php
include 'footer.php';
?>
