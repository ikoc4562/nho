<?php
include "header.php";
?>

  <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('images/background/causes.jpg')"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <h1>Single Causes</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.php">Home</a></li>
                <li class="active">Single Causes</li>
            </ul>
        </div>

    </section>
    <!--End Banner Section -->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side / Blog Sidebar-->
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
                    <!--Cause Details-->
                    <div class="cause-details">
                        <div class="inner-box">
                            <div class="image-box">
                                <?php
                                $sql = $db->prepare('select * from causes where id=:id  ');
                                $sql->execute([
                                        'id'=>$_GET['id'],
                                        ]);
                                $causes = $sql->fetchAll();


                                ?>
                                <figure class="image"><img class="lazy-image" src="images/resource/image-spacer-for-validation.png" data-src="images/<?=$causes[0][5]?>" alt=""></figure>
                            </div>
                            <div class="donate-info">
                                <div class="progress-box">
                                    <div class="bar">
                                        <div class="bar-inner count-bar" data-percent="<?= round(($causes[0][3]*100)/$causes[0][4])?>%"><div class="count-text"><?= round(($causes[0][3]*100)/$causes[0][4])?>%</div></div>
                                    </div>
                                </div>
                                <div class="donation-count clearfix"><span class="raised"><strong>Raised:</strong> $<?=$causes[0][3]?></span> <span class="goal"><strong>Goal:</strong> $<?=$causes[0][4]?></span></div>
                            </div>
                            <div class="lower-content">
                                <div class="text-content">
                                	<h2><?=$causes[0][1]?></h2>
                                    <p><?=$causes[0][2]?></p>
                                    <br>

                                </div>
                                <div class="link-box"><a href="https://www.paybills.ug/index.php/Nile-humanitarian-development-agency-limited" class="theme-btn btn-style-one"><span class="btn-title">Donate Now</span></a></div>
                            </div>
                        </div>
                    </div>

                </div>

               </div>
        </div>
    </div>
    <!-- End Sidebar Page Container -->

<?php
include "footer.php";

?>
