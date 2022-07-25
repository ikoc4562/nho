<?php
include "header.php";

include 'ayarlar.php';
$sql = $db->query('select * from causes where is_deleted=0');
$causes = $sql->fetchAll();

?>
    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('images/background/causes.jpg')"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <h1>Our Causes</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.php">Home</a></li>
                <li class="active">Our Causes</li>
            </ul>
        </div>

    </section>
    <!--End Banner Section -->

    <!--Causes Section-->
    <section class="causes-section">
        <div class="auto-container">

        	<div class="row clearfix">
                <?php
                    $sql = $db->query('select * from causes where is_deleted=0');
                    $causes = $sql->fetchAll();
                    foreach ($causes as $cause){
                    ?>

                    <div class="cause-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
                            <div class="image-box">
                                <figure class="image"><a href="cause-detail-<?=$cause[0]?>"> <img class="lazy-image" src="images/<?=$cause[5]?>" data-src="" alt=""></a></figure>
                            </div>
                            <div class="donate-info">
                                <div class="progress-box">
                                    <div class="bar">
                                        <div class="bar-inner count-bar" data-percent="<?= round(($cause[3]*100)/$cause[4])?>%"><div class="count-text"><?= round(($cause[3]*100)/$cause[4])?>%</div></div>
                                    </div>
                                </div>
                                <div class="donation-count clearfix"><span class="raised"><strong>Raised:</strong> $<?=$cause[3]?></span> <span class="goal"><strong>Goal:</strong> $<?=$cause[4]?></span></div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="cause-detail-<?=$cause[0]?>"><?=$cause[1]?></a></h3>
                                <div class="link-box"><a href="/cause/<?=$cause[0]?>" class="theme-btn btn-style-two"><span class="btn-title">Read More</span></a></div>
                            </div>
                        </div>
                    </div>



                    <?php
                }



                ?>


            </div>

        </div>
    </section>



    <!-- Call To Action Section -->
    <!--End Gallery Section -->


<?php
include "footer.php";

?>
