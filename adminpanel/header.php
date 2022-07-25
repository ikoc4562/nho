
<?php
session_start();
ob_start();
include "../ayarlar.php";

$sql=$db->prepare("SELECT * FROM kullanicilar WHERE token=:id");
$sql->execute(['id'=>$_SESSION['user_token']]);
$kullanicilar=$sql->fetchAll();
$varmi=$sql->rowCount();

if ($varmi<1)
{
    header('location:index.php');
}

$sql=$db->query('select * from mesajlar where aktifmi=1 and okundumu=0');
$say=$sql->rowCount();
$sonuclar=$sql->fetchAll();

$sql2=$db->query('select * from about');
$hakkinda=$sql2->fetchAll();

$sql = $db->prepare ('select * from kullanicilar where id=:id');
$sql->execute(
        [
               'id'=>$_SESSION['id']
        ]
);
$kullanicilar = $sql->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NHO | CMS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->

    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>M</b>T</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img src="../images/<?=$hakkinda[0]['logo']?>" height="40px"></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success"><?=$say?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have <?=$say?> messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <?php
                                    $sql=$db->query('select * from mesajlar where aktifmi=1 and okundumu=0');
                                    $sonuclar=$sql->fetchAll();
                                    foreach ($sonuclar as $sonuc) {
                                        ?>
                                        <li><!-- start message -->
                                            <a href="mesajlar.php?islem=guncelle&id=<?= $sonuc['id'] ?>">
                                                <div class="pull-left">
                                                    <img src="dist/img/avatar5.png" class="img-circle"
                                                         alt="User Image">
                                                </div>
                                                <h4>
                                                    <?=$sonuc['isim']?>
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p><?=$sonuc['mesaj']?></p>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <!-- end message -->
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <!-- Tasks: style can be found in dropdown.less -->
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../images/<?=$kullanicilar[0]['resim']?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?=$kullanicilar[0]['email']?>
</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="../images/<?=$kullanicilar[0]['resim']?>" class="img-circle" alt="User Image">

                                <p>
                                    <?=$kullanicilar[0]['email']?> - <?=$kullanicilar[0][2]?>
                                    <small>Administrator</small>
                                </p>
                            </li>

                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="profil.php?id=<?=$_SESSION['id']?>" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="logout.php?token=<?= $_SESSION['user_token'] ?>&id=<?=$_SESSION['id']?>" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
    </header>

