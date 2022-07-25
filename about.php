<?php
include "header.php";

$sql = $db->query('select * from about');
$about = $sql->fetchAll();

$sql = $db->query('select * from about_counter');
$about_counts = $sql->fetchAll();

$sql = $db->query('select * from causes where is_deleted=0');
$causes = $sql->fetchAll();


$sql = $db->query('select * from services where is_deleted=0 limit 4');
$services = $sql->fetchAll();

?>

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('images/background/aboutus.jpg')"></div>
        <div class="bottom-rotten-curve alternate"></div>

        <div class="auto-container">
            <h1>Hakkımızda</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.php">Anasayfa</a></li>
                <li class="active">Hakkında</li>
            </ul>
        </div>

    </section>
    <!--End Banner Section -->

	<!--About Section-->
    <section class="about-section style-two alternate">
        <div class="circle-one"></div>
        <div class="circle-two"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <!--Left Column-->
                <div class="left-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <div class="sub-title">Hakkımızda</div>
                            <h2><?=$about[0][1]?></h2>

                            <div class="text"><?=$about[0][2]?></div>
                        </div>
                    </div>
                </div>
                <!--Right Column-->
                <div class="right-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="images clearfix">
                            <?php
                            $sql = $db->query('select * from portfolio where is_deleted=0  limit 2');
                            $picture_portfolios = $sql->fetchAll();
                                foreach ($picture_portfolios as $picture_portfolio){

?>
                                <figure class="image wow fadeInRight" data-wow-delay="300ms"><img class="lazy-image" src="images/<?=$picture_portfolio[2]?>" data-src="images/<?=$picture_portfolio[2]?>" alt=""></figure>
                            <?php
                                }
                            ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="text-blocks">
                <div class="row clearfix">
                    <!--Text Block-->
                    <div class="default-text-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner">
                            <h3>Misyoumuz</h3>
                            <div class="text"><?=$about[0][4]?></div>
                        </div>
                    </div>
                    <!--Text Block-->
                    <div class="default-text-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner">
                            <h3>Vizyonumuz</h3>
                            <div class="text"><?=$about[0][5]?></div>
                        </div>
                    </div>
                    <!--Text Block-->
                    <div class="default-text-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner">
                            <h3>Değerlerimiz</h3>
                            <div class="text"><?=$about[0][6]?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


<!--What We Do Section / Style Two-->
<section class="what-we-do style-two">
    <div class="image-layer lazy-image" data-bg="url('images/background/wwd.png')"></div>
    <div class="top-rotten-curve"></div>
    <div class="bottom-rotten-curve"></div>

    <div class="auto-container">
        <div class="row clearfix">
            <div class="title-column col-xl-6 col-lg-12 col-sm-12">
                <div class="inner">
                    <div class="sec-title">
                        <div class="sub-title">Neler yapıyoruz?</div>
                        <h2>Kalite ve Güven merkezi</h2>
                        <div class="text"></div>
                    </div>
                </div>
            </div>

            <div class="content-column col-xl-6 col-lg-12 col-sm-12">
                <div class="row clearfix">

                    <!--Service Block-->
                    <?php
                    foreach ($services as $service){
                        ?>

                        <div class="service-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="<?=$service['icon']?>"></span></div>
                                <h3><?=$service['title']?></h3>
                                <div class="text"><?=$service['text']?></div>
                            </div>
                        </div>



                        <?php
                    }



                    ?>

                    <!--Service Block-->

                </div>
            </div>
        </div>

    </div>
</section>
    <!--Causes Section-->


</br>


<?php
include "footer.php";
?>
