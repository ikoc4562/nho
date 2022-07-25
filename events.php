<?php
include "header.php";
$sql=$db->prepare('select * from events where is_deleted=:isd order by date desc');
$sql->execute(
    [
        'isd'=>0
    ]
);
?>

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('images/background/events.jpg')"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <h1>Faaliyetlerimiz</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.php">Anasayfa</a></li>
                <li class="active">Faaliyetler</li>
            </ul>
        </div>

    </section>
    <!--End Banner Section -->

    <!--Events Section-->
    <section class="events-section">
        <div class="auto-container">

        	<div class="row clearfix">

                <?php

                $events=$sql->fetchAll();
                foreach ($events as $event)
                {

                    $date = new DateTime($event['date']);

                ?>
                <!--Event Block-->
                <div class="event-block-three col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
                        <div class="image-box">
                            <figure class="image"><a href="event-detail-<?=$event['id']?>"><img class="lazy-image" src="images/<?=$event['picture']?>" data-src="images/<?=$event['picture']?>" alt=""></a></figure>
                            <div class="date"><?=$date->format('d')?><span class="month"><?=$date->format('F')?></span>
                                <span class="year"><?=$date->format('Y')?></span>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="event-detail-<?=$event['id']?>"><?=$event['title']?></a></h3>
                            <ul class="info clearfix">
                            	<li><span class="icon far fa-clock"></span><?=$date->format('H:i')?></li>
                                <li><span class="icon fa fa-map-marker-alt"></span> <?=$event['address']?></li>
                            </ul>
                            <div class="link-box"><a href="event-detail-<?=$event['id']?>" class="theme-btn btn-style-two"><span class="btn-title">Daha fazla</span></a></div>
                        </div>
                    </div>
                </div>

                <?php
                }
                ?>



            </div>

        </div>
    </section>


<?php
include "footer.php";
?>
