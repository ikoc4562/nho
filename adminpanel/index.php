<?php
session_start();
ob_start();
include "../ayarlar.php";

if (@$_COOKIE['user_token']){
    //header('location:anasayfa.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<?php
if (@$_POST['islogin'])
{
    //if ($_POST['kullaniciadi']=='deniz@gmail.com' and  $_POST['sifre']=='1111')

    //$sql=$db->query("SELECT * FROM kullanicilar");
    $sql=$db->prepare("SELECT * FROM kullanicilar WHERE email=:a1 and sifre=:a2");
    $sql->execute(['a1'=>$_POST['kullaniciadi'],"a2"=>$_POST['sifre']]);
    $kullanicilar=$sql->fetchAll();
    $varmi=$sql->rowCount();


    if ($varmi>0)
    {
        //create a cryptographically secure token.
        $userToken = bin2hex(openssl_random_pseudo_bytes(24));

        $sql=$db->prepare("update kullanicilar set token=:a1 where id=:id");
        $sql->execute([
                'a1'=>$userToken,
                "id"=>$kullanicilar[0][0]
        ]);

        $_SESSION['user_token'] = $userToken;
        $_SESSION['id']= $kullanicilar[0][0];


        header('location:anasayfa.php');


    }
    else
    {
        $mesaj='Kullanici adi veya sifresi yanlis!';
    }
}

?>





<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="post" id="login-form">

        <input type="hidden" name="islogin" value="1">

      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="kullaniciadi">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="sifre">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" cclass="g-recaptcha"
                  data-sitekey="6LeG3N0ZAAAAAC7JH0vTwO0s5gqWia_TPtLbGc3L" data-callback='onSubmit'>Sign In</button>
        </div>
        <!-- /.col -->

      </div>
    </form>
<br>
      <?php
      if (@$_POST['islogin'])
      {

          ?>
      <div class="alert alert-danger" role="alert">
          <?=$mesaj?>
      </div>
      <?php
      }
      ?>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
    function onSubmit(token) {
        document.getElementById("login-form").submit();
    }
</script>
</body>
</html>

