<?php
require_once 'admin/includes/db.php'; // assumes $conn is initialized here

$query = "SELECT * FROM about_us ORDER BY created_at DESC LIMIT 1";
$statsQuery = "SELECT * FROM site_stats ORDER BY id ASC";
$statsResult = mysqli_query($conn, $statsQuery);
$result = mysqli_query($conn, $query);
$about = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AutoCity Car Parts & Accessories</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.css">
    <!-- Fontawesome Star -->
    <link rel="stylesheet" href="assets/css/vendor/fontawesome-stars.css">
    <!-- Ion Icon -->
    <link rel="stylesheet" href="assets/css/vendor/ion-fonts.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="assets/css/plugins/slick.css">
    <!-- Animation -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <!-- Lightgallery -->
    <link rel="stylesheet" href="assets/css/plugins/lightgallery.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">

 
    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/chatbot.css">
    <!--<link rel="stylesheet" href="assets/css/style.min.css">-->

</head>

<body class="template-color-1">

    <div class="main-wrapper">

                <!-- Begin Loading Area -->
                <div class="loading">
                    <div class="text-center middle">
                        <div class="lds-ellipsis">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <!-- Loading Area End Here -->

         <!-- Begin Uren's Header Main Area -->
         <header class="header-main_area header-main_area-2 bg--black">
            <div class="header-middle_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-2 col-md-3 col-sm-5">
                            <div class="header-logo_area">
                                <a href="index-2.php">
                                    <img src="assets/images/menu/logo/lg2.png" alt="Uren's Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                           <div class="hm-form_area" style="height: 60px;"></div>

                        </div>
                        <div class="col-lg-4 col-md-9 col-sm-7">
                            <div class="header-right_area">
                                <ul>
                                    <li class="mobile-menu_wrap d-flex d-lg-none">
                                        <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                            <i class="ion-navicon"></i>
                                        </a>
                                    </li>
                                   
                                    <li class="contact-us_wrap">
                                        <a href="tel://+123123321345"><i class="ion-android-call"></i>+233 123 4567</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-top_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="custom-category_col col-12">
                            <div class="category-menu category-menu-hidden">
                                <div class="category-heading">
                                    <h2 class="categories-toggle">
                                        <span>About</span>
                                        <span>AutoCity</span>
                                    </h2>
                                </div>
                                
                            </div>
                        </div>
                        <div class="custom-menu_col col-12 d-none d-lg-block">
                            <div class="main-menu_area position-relative">
                                <nav class="main-nav">
                                    <ul>
                                        <li class=""><a href="index-2.php">Home</a></li>
                                        <li class=""><a href="shop-grid-fullwidth.php">Shop</a></li>
                                       
                                         </li>
                                        <li class=""><a href="about-us.php">About Us</a></li>
                                        <li class=""><a href="contact.php">Contact</a></li>
                                        <li class=""><a href="blog-list-fullwidth.php">Blog </a> </li>
                                        <li class=""><a href="faq.php">FAQ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="custom-setting_col col-12 d-none d-lg-block">
                            <div class="ht-right_area">
                                <div class="ht-menu">
                                    <ul>
                                        <li><a href="javascript:void(0)"><span>$</span> <span>Currency</span><i class="fa fa-chevron-down"></i></a>
                                            <ul class="ht-dropdown ht-currency">
                                              
                                                <li class="active"><a href="javascript:void(0)">GH₵ Ghana Cedi</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0)"><span><img src="assets/images/menu/icon/1.jpg" alt=""></span> <span>Language</span> <i class="fa fa-chevron-down"></i></a>
                                            <ul class="ht-dropdown">
                                                <li class="active"><a href="javascript:void(0)"><img src="assets/images/menu/icon/1.jpg" alt="JB's Language Icon">English</a></li>
                                                
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="login-register.php"><span class="fa fa-user"></span> <span>Vendor</span></a>  </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                  
        </header>
        <!-- Uren's Header Main Area End Here -->


        <!-- Begin Uren's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Who Are We?</h2>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">About Us</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->
   <!-- Begin Uren's About Us Area -->
<div class="about-us-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-5">
                <div class="overview-img text-center img-hover_effect">
                    <a href="#">
                        <img class="img-full" src="assets/images/<?= htmlspecialchars($about['image']) ?>" alt="About Us Image">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-7 d-flex align-items-center">
                <div class="overview-content">
                    <h2><?= htmlspecialchars($about['title']) ?></h2>
                    <p class="short_desc"><?= nl2br(htmlspecialchars($about['description'])) ?></p>
                    <div class="uren-about-us_btn-area">
                        <a class="about-us_btn" href="shop-left-sidebar.html">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Uren's About Us Area End Here -->

 <!-- Begin Uren's Project Countdown Area -->
<div class="project-count-area">
    <div class="container-fluid">
        <div class="row">
            <?php while ($stat = mysqli_fetch_assoc($statsResult)) : ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count text-center">
                        <div class="count-icon">
                            <span class="<?= htmlspecialchars($stat['icon_class']) ?>"></span>
                        </div>
                        <div class="count-title">
                            <h2 class="count"><?= htmlspecialchars($stat['value']) ?></h2>
                            <span><?= htmlspecialchars($stat['label']) ?></span>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<!-- Uren's Project Countdown Area End Here -->

        <!-- Begin Uren's Team Area -->
        <div class="team-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title-2">
                            <h3>Featured Manufacturers</h3>
                        </div>
                    </div>
                </div> <!-- section title end -->
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-member">
                            <div class="team-thumb img-hover_effect">
                                <a href="#">
                                    <img src="assets/images/about-us/team/bmw.png" alt="bmw">
                                </a>
                            </div>
                            
                        </div>
                    </div> <!-- end single team member -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-member">
                            <div class="team-thumb img-hover_effect">
                                <a href="#">
                                    <img src="assets/images/about-us/team/mercedes.png" alt="mercedes">
                                </a>
                            </div>
                           
                        </div>
                    </div> <!-- end single team member -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-member">
                            <div class="team-thumb img-hover_effect">
                                <a href="#">
                                    <img src="assets/images/about-us/team/toyota.png" alt="toyota">
                                </a>
                            </div>
                           
                        </div>
                    </div> <!-- end single team member -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-member">
                            <div class="team-thumb img-hover_effect">
                                <a href="#">
                                    <img src="assets/images/about-us/team/Honda.png" alt="Honda">
                                </a>
                            </div>
                           
                        </div>
                    </div> <!-- end single team member -->
                </div>
            </div>
        </div>
        <!-- Uren's Team Area End Here -->

        <!-- Begin Uren's Footer Area -->
        <div class="uren-footer_area">
            <div class="footer-top_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="newsletter-area">
                                <h3 class="title">Join Our Newsletter Now</h3>
                                <p class="short-desc">Get E-mail updates about our latest shop and special offers.</p>
                                <div class="newsletter-form_wrap">
                                    <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="newsletters-form validate" target="_blank" novalidate>
                                        <div id="mc_embed_signup_scroll">
                                            <div id="mc-form" class="mc-form subscribe-form">
                                                <input id="mc-email" class="newsletter-input" type="email" autocomplete="off" placeholder="Enter your email" />
                                                <button class="newsletter-btn" id="mc-submit">Subscribe</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-middle_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="footer-widgets_info">
                                <div class="footer-widgets_logo">
                                    <a href="#">
                                        <img src="assets/images/menu/logo/lg2.png" alt="Uren's Footer Logo">
                                    </a>
                                </div>
                                <div class="widget-short_desc">
                                    <p>We believe getting the right spare parts should be easy, fast, and stress-free. 
                                        We connect you to trusted dealers across Ghana, 
                                        giving you the power to find what you need with just a few clicks.
                                         Quality parts. Real connections. Zero hassle.
                                    </p>
                                </div>
                                <div class="widgets-essential_stuff">
                                    <ul>
                                        <li class="uren-address"><span>Address:</span> No. 23 Liberation Road, Airport Residential Area, Accra, Ghana    </li>
                                        <li class="uren-phone"><span>Call
                                        Us:</span> <a href="tel://+123123321345">+233 55 123 4567</a>
                                        </li>
                                        <li class="uren-email"><span>Email:</span> <a href="mailto://info@yourdomain.com">support@autocitypartsghana.com</a></li>
                                    </ul>
                                </div>
                                <div class="uren-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                                <i class="fab fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="footer-widgets_area">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="footer-widgets_title">
                                            <h3>Information</h3>
                                        </div>
                                        <div class="footer-widgets">
                                            <ul>
                                                <li><a href="javascript:void(0)">About Us</a></li>
                                               
                                                <li><a href="javascript:void(0)">Privacy Policy</a></li>
                                                <li><a href="javascript:void(0)">Terms & Conditions</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="footer-widgets_title">
                                            <h3>Customer Service</h3>
                                        </div>
                                        <div class="footer-widgets">
                                            <ul>
                                                <li><a href="contact.html">Contact Us</a></li>
                                                <li><a href="wrenchy.html">Wrenchy</a></li>
                                                <li><a href="https://www.google.com/maps/place/Airport+Residential+Area,+Accra,+Ghana/@5.5915,-0.1777,17z">Site Map</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-3 col-md-6">
                                        <div class="footer-widgets_title">
                                            <h3>My Account</h3>
                                        </div>
                                        <div class="footer-widgets">
                                            <ul>
                                                <li><a href="login-register.php">My Account</a></li>
                                            
                                                <li><a href="javascript:void(0)">Newsletter</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div id="chatbot-loader"></div>
            <script>
                fetch('chatbot.html')
                  .then(res => res.text())
                  .then(html => {
                    document.getElementById('chatbot-loader').innerHTML = html;
                  })
                  .then(() => {
                    const script = document.createElement("script");
                    script.src = "assets/js/chatbot.js";
                    document.body.appendChild(script);
                  });
              </script>


        </div>
        <!-- Uren's Footer Area End Here -->

    </div>

    <!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/vendor/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Barrating JS -->
    <script src="assets/js/plugins/jquery.barrating.min.js"></script>
    <!-- Counterup JS -->
    <script src="assets/js/plugins/jquery.counterup.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/js/plugins/jquery.nice-select.js"></script>
    <!-- Sticky Sidebar JS -->
    <script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Jquery-ui JS -->
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/plugins/jquery.ui.touch-punch.min.js"></script>
    <!-- Lightgallery JS -->
    <script src="assets/js/plugins/lightgallery.min.js"></script>
    <!-- Scroll Top JS -->
    <script src="assets/js/plugins/scroll-top.js"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="assets/js/plugins/theia-sticky-sidebar.min.js"></script>
    <!-- Waypoints JS -->
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <!-- jQuery Zoom JS -->
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>

    <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
    <!--
<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>
-->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>


</html>