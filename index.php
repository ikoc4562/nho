
<?php
include "header.php";

?>
    <!-- Banner Section -->
    <section class="banner-section">
		<div class="banner-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>
			<!-- Slide Item -->


            <?php
            $sql = $db->query('select * from slider where is_deleted=0');
            $sliders = $sql->fetchAll();
            foreach ($sliders as $slider){
                ?>

			<div class="slide-item">
				<div class="image-layer lazy-image" data-bg="url('images/<?=$slider['picture']?>')"></div>
				<div class="auto-container">
					<div class="content-box">
						<h2><?=$slider['title']?></h2>
						<div class="text"><?=$slider['text']?></div>
					</div>
				</div>
			</div>

                <?php
            }
            ?>

		</div>
    </section>
    <!--End Banner Section -->

	<!--About Section-->
    <section class="about-section">
    	<div class="top-rotten-curve"></div>
        <div class="bottom-rotten-curve"></div>
        <div class="circle-one"></div>
        <div class="circle-two"></div>


        <div class="auto-container">
        	<div class="row clearfix">
            	<!--Left Column-->
                <div class="left-column col-lg-6 col-md-12 col-sm-12">
                	<div class="inner">
                    	<div class="sec-title">
                        	<div class="sub-title">Hakkımızda</div>
                            <h2><?=$about[0]['title']?></h2>
                            <div class="text"><?=$about[0]['contents']?></div>
							<div class="link-box clearfix"><a href="about" class="theme-btn btn-style-one"><span class="btn-title">Daha fazla</span></a></div>
                        </div>
                    </div>
                </div>
                <!--Right Column-->
                <div class="right-column col-lg-6 col-md-12 col-sm-12">
                	<div class="inner">
                    	<div class="row clearfix">
                        	<!--About Feature-->
                            <div class="about-feature col-md-6 col-sm-12">
                            	<div class="inner-box wow fadeInUp">
                                	<div class="icon-box"><span class="flaticon-user"></span></div>
                                    <h4>Özveri</h4>
                                    <a href="/contact" class="over-link"></a>
                                </div>
                            </div>
                            <!--About Feature-->
                            <div class="about-feature col-md-6 col-sm-12">
                            	<div class="inner-box wow fadeInUp" data-wow-delay="300ms">
                                	<div class="icon-box"><span class="flaticon-heart-2"></span></div>
                                    <h4>Çalışmak</h4>
                                    <a href="/contact" class="over-link"></a>
                                </div>
                            </div>
                            <!--About Feature-->
                            <div class="about-feature col-md-6 col-sm-12">
                            	<div class="inner-box wow fadeInUp">
                                	<div class="icon-box"><span class="flaticon-support-1"></span></div>
                                    <h4>Ekip</h4>
                                    <a href="/contact" class="over-link"></a>
                                </div>
                            </div>
                            <!--About Feature-->
                            <div class="about-feature col-md-6 col-sm-12">
                            	<div class="inner-box wow fadeInUp" data-wow-delay="300ms">
                                	<div class="icon-box"><span class="flaticon-care"></span></div>
                                    <h4>Azim</h4>
                                    <a href="/contact" class="over-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Video Section-->
    <section class="video-section">
    	<div class="circle-one"></div>
        <div class="circle-two"></div>
        <div class="top-rotten-curve"></div>
        <div class="bottom-rotten-curve"></div>


<?php
$sql=$db->query('select * from videos where is_deleted=0 order by id desc limit 1');
$videos=$sql->fetchAll();


 ?>


        <?php
        $sql=$db->query('select * from portfolio where is_deleted=0 order by RAND() limit 1');
        $portfolio=$sql->fetchAll();

        ?>
    	<!--Image Layer-->
        <div class="image-layer wow slideInLeft" data-wow-delay="500ms"><div class="bg-image lazy-image" data-bg="url('images/background/video1.jpeg')"></div></div>
        <div class="auto-container">
        	<div class="row clearfix">
            	<!--Text Column-->
                <div class="text-column col-lg-6 col-md-12 col-sm-12">
                	<div class="inner">
                    	<div class="sec-title">
                        	<div class="sub-title">İzle</div>
                            <h2><?=$videos[0]['title']?></h2>
                            <div class="text"><?=$videos[0]['text']?></div>
							<div class="link-box clearfix"><a href="videos" class="theme-btn btn-style-three"><span class="btn-title">Tüm videolar</span></a></div>
                        </div>
                    </div>
                </div>
                <!--Image Column-->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                	<div class="inner wow fadeInLeft" data-wow-delay="0ms">
                    	<figure class="image-box">
                        	<img class="lazy-image" src="images/<?=$videos[0]['picture']?>" data-src="images/<?=$videos[0]['picture']?>" alt="">
                            <a href="<?=$videos[0]['link']?>" class="lightbox-image over-link"><span class="icon flaticon-play-button"></span></a>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--What We Do Section-->
    <section class="what-we-do">
        <div class="auto-container">

        	<div class="sec-title centered">
                <div class="sub-title">Faaliyetlerimiz</div>
                <h2>İsteklerinizi en iyi şekilde yapmak için buradayız.</h2>
            </div>

        	<div class="row clearfix">


<?php
$sql=$db->query('select * from services where is_deleted=0 order by RAND() limit 4');
$services=$sql->fetchAll();

foreach ($services as $service) {

    ?>
            	<!--Service Block-->
                <div class="service-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                	<div class="inner-box">
                    	<div class="icon-box"><span class="<?=$service['icon']?>"></span></div>
                        <h3><?=$service['title']?></h3>
                        <div class="text"><?=$service['text']?></div>
                    </div>
                </div>

                <?php
} ?>


            </div>

       <div class="image wow fadeInUp" data-wow-delay="0ms"><img class="lazy-image" src="images/background/wwd.png" data-src="images/background/wwd.png" alt=""></div>

        </div>
    </section>
</br>
<!-- Funfacts Section -->
<section class="facts-section">
    <div class="auto-container">
        <div class="inner-container">

            <!-- Fact Counter -->
            <div class="fact-counter">
                <div class="row clearfix">


                    <?php $sql = $db->query('select * from about_counter ');
                    $about_counts = $sql->fetchAll();
                    foreach ($about_counts as $about){

                        ?>

                        <!--Column-->
                        <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                            <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="content">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="3000" data-stop="<?=$about['complete']?>"></span>
                                    </div>
                                    <div class="counter-title"> <?=$about['title']?></div>
                                </div>
                            </div>
                        </div>

                        <?php
                    } ?>


                </div>
            </div>

        </div>
    </div>
</section>
<!-- End Funfacts Section -->
	<!--Mission Vision Section-->
    <section class="mission-vision">
    	<div class="circle-one"></div>
        <div class="circle-two"></div>

        <div class="auto-container">
            <?php

            $sql = $db->query("select * from about");
            $about2 = $sql->fetchAll();
            ?>
        	<div class="mission">
            	<div class="row clearfix">
                	<div class="text-column col-lg-6 col-md-12 col-sm-12">
                    	<div class="inner">
                            <div class="sec-title">
                                <h2>Misyonumuz</h2>
                                <div class="text"><?=$about2[0][4]?></div>
                                <div class="link-box"><a href="/about" class="theme-btn btn-style-one"><span class="btn-title">Daha fazlası</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    	<div class="inner">
                            <div class="row clearfix">


        <?php
        $sql=$db->query('select * from portfolio where is_deleted=0 order by RAND() limit 2');
        $portfolio=$sql->fetchAll();
        foreach ($portfolio as $port) {


            ?>


                                <div class="image wow fadeInUp" data-wow-delay="0ms"><img class="lazy-image" src="images/<?=$port['picture']?>" data-src="images/<?=$port['picture']?>" alt=""></div>
            <?php
        }
        ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php

            $sql = $db->query("select * from about");
            $about3 = $sql->fetchAll();
            ?>
            <div class="vision">
                <div class="row clearfix">
                	<div class="text-column col-lg-6 col-md-12 col-sm-12">
                    	<div class="inner">
                            <div class="sec-title">
                                <h2>Vizyonumuz</h2>
                                <div class="text"><?=$about3[0][5]?></div>
                                <div class="link-box"><a href="/about" class="theme-btn btn-style-one"><span class="btn-title">Daha fazlası</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    	<div class="inner">
                            <?php
                            $sql=$db->query('select * from portfolio where is_deleted=0 order by RAND() limit 1');
                            $portfolio=$sql->fetchAll();


                            ?>
                            <div class="image wow fadeInUp" data-wow-delay="0ms"><img class="lazy-image" src="images/<?=$portfolio[0]['picture']?>" data-src="images/<?=$portfolio[0]['picture']?>" alt=""></div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!--Call To Action Section-->
    <section class="call-to-action">

    	<!--Image Layer-->
        <div class="image-layer lazy-image" data-bg="url('images/background/help.jpg')"></div>

        <div class="auto-container">
            <div class="inner">
                <div class="sec-title centered">
                    <h2>Sizin için ne yapabiliriz?</h2>
                    <div class="text">En iyi hizmeti en kaliteli şekilde almak için, lütfen bizimle iletişime geçiniz.</div>
                    <div class="link-box clearfix">
                        <a href="/contact" class="theme-btn btn-style-one"><span class="btn-title">Şimdi iletişime geçin</span></a></div>
                </div>
            </div>
        </div>
    </section>





    <!--Upcoming Events Section-->
    <section class="upcoming-events">
    	<div class="circle-one"></div>
        <div class="circle-two"></div>

        <div class="auto-container">

        	<div class="sec-title centered">
                <div class="sub-title">Yaklaşan Projeler</div>
                <h2>Projelerimiz</h2>
            </div>

            <div class="carousel-box">

            	<div class="single-item-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": false, "margin": 0, "autoHeight":false, "singleItem" : true, "autoplay": true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1024":{ "items" : "1" }}}'>




                <?php
                    $sql = $db->query('select * from events where is_deleted=0 limit 3');
                    $events = $sql->fetchAll();
                    foreach ($events as $event){
                        ?>




                    <!--Slide-->
                    <div class="slide-item">
                    	<div class="event-block">
                            <div class="inner-box clearfix">
                                <div class="image-column">
                                    <div class="image-box"><img class="lazy-image owl-lazy" src="images/<?=$event['picture']?>" data-src="images/<?=$event['picture']?>g" alt=""></div>
                                    <div class="bg-image-layer lazy-image" data-bg="url('images/<?=$event['picture']?>')"></div>
                                    <a href="event-detail-<?=$event['id']?>" class="over-link"></a>
                                </div>
                                <div class="text-column">
                                    <div class="inner">
                                        <h3><a href="event-detail-<?=$event['id']?>"><?=$event['title']?></a></h3>
                                        <ul class="info clearfix">
                                            <li><span class="icon far fa-clock"></span><?=$event['date']?></li>
                                            <li><span class="icon fa fa-map-marker-alt"></span><?=$event['address']?></li>
                                        </ul>
                                        <div class="link-box"><a href="event-detail-<?=$event['id']?>" class="theme-btn btn-style-one"><span class="btn-title">Detay</span></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                    } ?>




                </div>

            </div>

        </div>
    </section>



    <!-- Insta Gallery Section -->
    <section class="insta-gallery">
        <div class="insta-gallery-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 500, "responsive":{ "0" :{ "items": "1" },"600" :{ "items": "2" }, "768" :{ "items" : "3" }, "1024":{ "items" : "4" }, "1366":{ "items" : "4" }, "1500":{ "items" : "5" }, "1920":{ "items" : "6" }}}'>
            <!-- Gallery Item -->


<?php
$sql=$db->query('select * from portfolio where is_deleted=0 order by id desc limit 6');
$portfolios=$sql->fetchAll();
foreach ($portfolios as $portfolio) {
    ?>


    <div class="gallery-item">
                <div class="image-box">
                    <figure class="image"><img class="lazy-image owl-lazy" src="images/<?=$portfolio['picture']?>" data-src="images/<?=$portfolio['picture']?>" alt=""></figure>
                    <div class="overlay-box"><a href="images/<?=$portfolio['picture']?>" class="lightbox-image" data-fancybox="gallery"><span class="icon flaticon-instagram"></span></a></div>
                </div>
            </div>

    <?php
} ?>
        </div>

    </section>
    <!--End Gallery Section -->



<?php
include "footer.php";

?>
