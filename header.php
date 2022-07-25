<?php
    include 'ayarlar.php';

    $sql = $db->query("select * from about");
    $about = $sql->fetchAll();

    ?>
<!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="utf-8">
            <title><?=$about[0]['title']?></title>
            <!-- Stylesheets -->
            <link href="css/bootstrap.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet">
            <!-- Responsive File -->
            <link href="css/responsive.css" rel="stylesheet">
            <!-- Color File -->
            <link href="css/color.css" rel="stylesheet">

            <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
            <link rel="icon" href="images/favicon.png" type="image/x-icon">

            <!-- Responsive -->
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
            <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
            <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
        </head>

        <body>

        <div class="page-wrapper">
            <!-- Preloader -->
            <div class="preloader"><div class="icon"></div></div>

            <!-- Main Header -->
            <header class="main-header">
                <!-- Header Top -->
                <div class="header-top">
                    <div class="auto-container">
                        <div class="inner clearfix">
                            <div class="top-left">
                                <ul class="social-links clearfix">
                                    <li class="social-title">Follow Us:</li>
                                <?php
                                $sql=$db->prepare("select * from social_media where is_deleted=:isd");
                                $sql->execute(
                                    [
                                        'isd'=>0
                                    ]
                                );
                                $socials = $sql->fetchAll();
                                foreach ($socials as $social){
                                    ?>
                                    <li><a href="<?=$social['link']?>"><span class="fab fa-<?=$social['title']?>"></span></a></li>

                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <?php
                        $sql = $db->query("select * from contactinfo");

                        $contactinfo = $sql->fetchAll();
                        ?>

                        </div>

                        <div class="top-right">
                            <ul class="info clearfix">
                                <li><a href="tel:<?=$contactinfo[0]['phone']?>"><span class="icon fa fa-phone-alt"></span> Call: &nbsp;<?=$contactinfo[0]['phone']?></a></li>
                                <li><a href="mailto:<?=$contactinfo[0]['email']?>"><span class="icon fa fa-envelope"></span> Email: &nbsp;<?=$contactinfo[0]['email']?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Upper -->
            <div class="header-upper">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        <!--Logo-->
                        <div class="logo-box">
                        </div>

                        <!--Nav Box-->
                        <div class="nav-outer clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><span class="icon flaticon-menu-1"></span></div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">

                                        <li class="current"><a href="home">Home</a></li>

                                        <li class=""><a href="causes">Causes</a></li>
                                        <li><a href="events">Events</a></li>

                                        <li class="dropdown"><a href="">Pages</a>
                                            <ul>
                                                <li><a href="portfolio">Portfolio</a></li>
                                                <li><a href="videos">Videos</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a>About</a>
                                            <ul>
                                                <li><a href="about">About Us</a></li>
                                                <li><a href="services">Our Services</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact">Contact</a></li>

                                    </ul>

                                </div>

                            </nav>

                            <!-- Main Menu End-->
                            <div class="link-box clearfix" style="padding-top: 45px">

                                <!-- GTranslate: https://gtranslate.io/ -->
                                <a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="glink nturl notranslate"><img src="//www.suomiconnect.fi/wp-content/plugins/gtranslate/flags/16/en.png" height="16" width="16" alt="English" /></a><a href="#" onclick="doGTranslate('en|fr');return false;" title="French" class="glink nturl notranslate"><img src="//www.suomiconnect.fi/wp-content/plugins/gtranslate/flags/16/fr.png" height="16" width="16" alt="French" /></a><a href="#" onclick="doGTranslate('en|de');return false;" title="German" class="glink nturl notranslate"><img src="//www.suomiconnect.fi/wp-content/plugins/gtranslate/flags/16/de.png" height="16" width="16" alt="German" /></a><a href="#" onclick="doGTranslate('en|tr');return false;" title="Turkish" class="glink nturl notranslate"><img src="//www.suomiconnect.fi/wp-content/plugins/gtranslate/flags/16/tr.png" height="16" width="16" alt="Turkish" /></a><style>#goog-gt-tt{display:none!important;}.goog-te-banner-frame{display:none!important;}.goog-te-menu-value:hover{text-decoration:none!important;}.goog-text-highlight{background-color:transparent!important;box-shadow:none!important;}body{top:0!important;}#google_translate_element2{display:none!important;}</style>
                                <div id="google_translate_element2"></div>
                                <script>function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}if(!window.gt_translate_script){window.gt_translate_script=document.createElement('script');gt_translate_script.src='https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2';document.body.appendChild(gt_translate_script);}</script>

                                <script>
                                    function GTranslateGetCurrentLang() {var keyValue = document['cookie'].match('(^|;) ?googtrans=([^;]*)(;|$)');return keyValue ? keyValue[2].split('/')[2] : null;}
                                    function GTranslateFireEvent(element,event){try{if(document.createEventObject){var evt=document.createEventObject();element.fireEvent('on'+event,evt)}else{var evt=document.createEvent('HTMLEvents');evt.initEvent(event,true,true);element.dispatchEvent(evt)}}catch(e){}}
                                    function doGTranslate(lang_pair){if(lang_pair.value)lang_pair=lang_pair.value;if(lang_pair=='')return;var lang=lang_pair.split('|')[1];if(GTranslateGetCurrentLang() == null && lang == lang_pair.split('|')[0])return;if(typeof ga=='function'){ga('send', 'event', 'GTranslate', lang, location.hostname+location.pathname+location.search);}var teCombo;var sel=document.getElementsByTagName('select');for(var i=0;i<sel.length;i++)if(sel[i].className.indexOf('goog-te-combo')!=-1){teCombo=sel[i];break;}if(document.getElementById('google_translate_element2')==null||document.getElementById('google_translate_element2').innerHTML.length==0||teCombo.length==0||teCombo.innerHTML.length==0){setTimeout(function(){doGTranslate(lang_pair)},500)}else{teCombo.value=lang;GTranslateFireEvent(teCombo,'change');GTranslateFireEvent(teCombo,'change')}}
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->

            <!-- Sticky Header  -->
            <div class="sticky-header">
                <div class="auto-container clearfix">
                    <!--Logo-->
                    <div class="logo pull-left">
                        <a href="index.php" title=""><img src="images/<?=$about[0]['logo']?>" alt="" title="" width="150px"></a>
                    </div>
                    <!--Right Col-->
                    <div class="pull-right">
                        <!-- Main Menu -->
                        <nav class="main-menu clearfix">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav><!-- Main Menu End-->
                    </div>
                </div>
            </div><!-- End Sticky Menu -->

            <!-- Mobile Menu  -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>
                <div class="close-btn"><span class="icon flaticon-cancel"></span></div>

                <nav class="menu-box">
                    <div class="nav-logo"><a href="index.html"><img src="images/logo.png" alt="" title=""></a></div>
                    <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                    <!--Social Links-->
                    <div class="social-links">
                        <ul class="clearfix">
                            <?php
                            $sql = $db->prepare("select * from social_media where is_deleted=:isd");
                            $sql->execute(
                                [
                                    'isd' => 0
                                ]
                            );
                            $socials = $sql->fetchAll();
                            foreach ($socials as $social){
                                ?>
                                <li><a href="<?=$social['link']?>"><span class="fab fa-<?=$social['title']?>"></span></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </nav>
            </div><!-- End Mobile Menu -->
        </body>
        <!-- End Main Header -->

        <!--Search Popup-->
        <div id="search-popup" class="search-popup">
            <div class="close-search theme-btn"><span class="flaticon-cancel"></span></div>
            <div class="popup-inner">
                <div class="overlay-layer"></div>
                <div class="search-form">
                    <form method="post" action="index.html">
                        <div class="form-group">
                            <fieldset>
                                <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required >
                                <input type="submit" value="Search Now!" class="theme-btn">
                            </fieldset>
                        </div>
                    </form>

                    <br>
                    <h3>Recent Search Keywords</h3>
                    <ul class="recent-searches">
                        <li><a href="#">Finance</a></li>
                        <li><a href="#">Idea</a></li>
                        <li><a href="#">Service</a></li>
                        <li><a href="#">Growth</a></li>
                        <li><a href="#">Plan</a></li>
                    </ul>

                </div>

            </div>
        </div>

        <!-- Banner Section -->
