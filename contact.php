<?php
include "header.php";

$send='';
$sql = $db->query('select * from contactinfo');
$contactinfo=$sql->fetchAll();

if (@$_POST['isSave']) {
    $sql = $db->prepare('insert into mesajlar set isim=:isim, email=:email, mesaj=:mesaj');
    $sql->execute([
        'isim' => $_POST['isim'],
        'email' => $_POST['email'],
        'mesaj' => $_POST['mesaj']
    ]);

    $send=1;

    ?>
    <meta http-equiv="refresh" content="3; url=contact.php">
    <?php

}
$sql=$db->prepare("select * from social_media where is_deleted=:isd");
$sql->execute(
    [
        'isd'=>0
    ]
);
$socials = $sql->fetchAll();
?>

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('images/background/contactus.jpg')"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <h1>İletişime geçin</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.php">Anasayfa</a></li>
                <li class="active">İletişim</li>
            </ul>
            <?php
            if (@$send) {
                ?>
                <div class="alert alert-success" role="alert">
                    Mesajınız başarılı bir şekilde gönderilmiştir.
                </div>
                <?php
            }
            ?>
        </div>

    </section>
    <!--End Banner Section -->
    <!--Contact Info Section-->
    <section class="contact-info-section">
        <div class="auto-container">

            <div class="sec-title centered">
                <div class="sub-title">İletişim</div>
                <h2>İletişimde kalmak</h2>
            </div>

        	<div class="info-boxes">
                <div class="row clearfix">
                    <!--Info Box-->
                    <div class="info-box col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
							<div class="image-layer lazy-image" data-bg="url('images/resource/contact-image-1.jpg')"></div>
                            <div class="icon-box"><span class="flaticon-home-location-marker"></span></div>
                            <h4>Adres</h4>
                            <ul>
                            	<li><?=$contactinfo[0]['address']?></li>
                            </ul>
                        </div>
                    </div>
                    <!--Info Box-->
                    <div class="info-box col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="300ms">
                            <div class="image-layer lazy-image" data-bg="url('images/resource/contact-image-2.jpg')"></div>
                            <div class="icon-box"><span class="flaticon-phone-call"></span></div>
                            <h4>Telefon</h4>
                            <ul>
                            	<li><a href="tel:(+55)654-545-5418"><?=$contactinfo[0]['phone']?></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--Info Box-->
                    <div class="info-box col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="600ms">
                            <div class="image-layer lazy-image" data-bg="url('images/resource/contact-image-3.jpg')"></div>
                            <div class="icon-box"><span class="flaticon-email"></span></div>
                            <h4>Email </h4>
                            <ul>
                                <li><a href="mailto:<?=$contactinfo[0]['email']?>"><?=$contactinfo[0]['email']?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        	</div>

        </div>
    </section>


    <!--Contact Section-->
    <section class="contact-section">
        <div class="outer-container clearfix">

        	<div class="form-column clearfix">
                <div class="inner clearfix">

                    <div class="sec-title centered">
                        <div class="sub-title">Mesaj</div>
                        <h2>Lütfen mesaj bırakın</h2>
                    </div>

                    <!-- Contact Form-->
                    <div class="contact-form">
                        <form method="post" id="contact-form">
                            <input type="hidden" name="isSave" value="1">
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-12 form-group">
                                    <input type="text" name="isim" placeholder="İsim" required="">
                                </div>

                                <div class="col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="Email" required="">
                                </div>

                                <div class="col-md-12 col-sm-12 form-group">
                                    <textarea name="mesaj" placeholder="Mesajınız"></textarea>
                                </div>

                                <div class="col-md-12 col-sm-12 form-group text-center">
                                    <button class="theme-btn btn-style-one"
                                            data-sitekey="6LeG3N0ZAAAAAC7JH0vTwO0s5gqWia_TPtLbGc3L" data-callback='onSubmit'  type="submit" name="submit-form"><span class="btn-title">Gönder</span></button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
        	</div>

            <div class="map-column clearfix">
                    <?=$contactinfo[0]['googlemaps']?>
            </div>

        </div>
    </section>







<!-- Main Footer -->
<footer class="main-footer">
    <div class="auto-container">
        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row clearfix">


                <?php
                $sql = $db->query('select * from about ');
                $about = $sql->fetchAll();


                $sql2 = $db->query('select * from contactinfo');
                $contactinfo = $sql2->fetchAll();
                ?>

                <!--Column-->
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget logo-widget">
                        <div class="widget-content">
                            <div class="footer-logo">
                                <a href="index.php"><img class="lazy-image" src="images/<?=$about[0]['logo']?>" data-src="images/<?=$about[0]['logo']?>" alt="" width="150px" /></a>
                            </div>
                            <div class="text"><?=$about[0]['mission']?></div>
                            <ul class="social-links clearfix">
                                <?php

                                foreach ($socials as $social){
                                    ?>
                                    <li><a href="<?=$social['link']?>"><span class="fab fa-<?=$social['title']?>"></span></a></li>
                                    <?php
                                }?>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget links-widget">
                        <div class="widget-content">
                            <h3>Hizmetler</h3>
                            <ul>
                                <li><a href="#">Hava Fotoğrafı Çekimi ve Ortofoto Üretimi</a></li>
                                <li><a href="#">Sayısal Yüzey Modeli Üretimi</a></li>
                                <li><a href="#">Nokta Bulutu Üretimi</a></li>
                                <li><a href="#">3D Mesh Üretimi</a></li>

                            </ul>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget info-widget">
                        <div class="widget-content">
                            <h3>İletişim</h3>
                            <ul class="contact-info">
                                <li><?=$contactinfo[0]['address']?></li>
                                <li><a href="tel:<?=$contactinfo[0]['phone']?>"><?=$contactinfo[0]['phone']?></a></li>
                                <li><a href="mailto:<?=$contactinfo[0]['email']?>"><?=$contactinfo[0]['email']?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget news-widget">
                        <div class="widget-content">
                            <h3>Galeri</h3>



                            <?php
                            $sql=$db->query('select * from portfolio where is_deleted=0 order by RAND() limit 2');
                            $portfolios=$sql->fetchAll();
                            foreach ($portfolios as $portfolio) {
                                ?>

                                <!--News Post-->
                                <div class="news-post">

                                    <div class="post-thumb"><a href="#"><img class="lazy-image" src="images/<?=$portfolio['picture']?>" data-src="images/<?=$portfolio['picture']?>" alt=""></a></div>
                                </div>


                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>

            </div>

            <div class="nav-box clearfix">
                <div class="inner clearfix">
                    <ul class="footer-nav clearfix">
                        <li><a href="#">Anasayfa</a></li>
                        <li><a href="about.php">Hakkımızda</a></li>
                        <li><a href="services.php">Hizmetler</a></li>
                        <li><a href="events.php">Faaliyetler</a></li>
                    </ul>

                    <div class="donate-link"><a href="contact.php" class="theme-btn btn-style-one"><span class="btn-title">İletişim</span></a></div>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="auto-container">

            <!--Scroll to top-->
            <div class="clearfix">
                <div class="copyright"><?=$about[0]['title']?>  &copy;  <?=date('Y')?> tüm hakkı saklıdır.</div>
                <ul class="bottom-links">
                    <li><a href="#">Kullanım kılavuzu</a></li>
                    <li><a href="#">Gizlilik bildirimi</a></li>
                </ul>
            </div>
        </div>
    </div>

</footer>

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-up-arrow"></span></div>

<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/mixitup.js"></script>
<script src="js/owl.js"></script>
<script src="js/appear.js"></script>
<script src="js/wow.js"></script>
<script src="js/lazyload.js"></script>
<script src="js/scrollbar.js"></script>
<script src="js/validate.js"></script>
<script src="js/script.js"></script>


<!--Google Map APi Key-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcaOOcFcQ0hoTqANKZYz-0ii-J0aUoHjk"></script>
<script src="js/map-script.js"></script>
<!--End Google Map APi-->
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
    function onSubmit(token) {
        document.getElementById("contact-form").submit();
    }
</script>
</body>
</html>
