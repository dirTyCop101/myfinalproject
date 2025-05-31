<?php
require_once 'admin/includes/db.php';

$query = "SELECT * FROM contact_info LIMIT 1";
$result = mysqli_query($conn, $query);
$contact = mysqli_fetch_assoc($result);
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
                                        <span>Come</span>
                                        <span>Talk With Us</span>
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
                    <h2>Contact Us</h2>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->
<!-- Begin Contact Main Page Area -->
<div class="contact-main-page">
    <div class="container-fluid">
        <!-- Google Map Section -->
        <div id="google-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1984.9142357463742!2d-0.17990538445733255!3d5.591530395935536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf9a7f45e46291%3A0xf8163e1f20b1bd1a!2sAirport%20Residential%20Area%2C%20Accra%2C%20Ghana!5e0!3m2!1sen!2sgh!4v1714105588734!5m2!1sen!2sgh" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
            <div class="contact-page-side-content">
                <h3 class="contact-page-title">Contact Us</h3>
                <p class="contact-page-message">
                    Need help finding the right spare part? Have a question? We’re here to assist you. Reach out to us through any of our contact channels and we’ll get back to you promptly.
                </p>
                
                <div class="single-contact-block">
                    <h4><i class="fa fa-fax"></i> Address</h4>
                    <p><?= htmlspecialchars($contact['address']) ?></p>
                </div>

                <div class="single-contact-block">
                    <h4><i class="fa fa-phone"></i> Phone</h4>
                    <p>Mobile: <?= htmlspecialchars($contact['phone_1']) ?></p>
                    <p>Hotline: <?= htmlspecialchars($contact['phone_2']) ?></p>
                </div>

                <div class="single-contact-block last-child">
                    <h4><i class="fa fa-envelope-o"></i> Email</h4>
                    <p><?= htmlspecialchars($contact['email_1']) ?></p>
                    <p><?= htmlspecialchars($contact['email_2']) ?></p>
                </div>
            </div>
        </div>

            <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                <div class="contact-form-content">
                    <h3 class="contact-page-title">Tell Us Your Message</h3>
                    <div class="contact-form">
                        <form id="contact-form" action="save_message.php" method="post">
                            <div class="form-group">
                                <label>Your Name <span class="required">*</span></label>
                                <input type="text" name="con_name" id="con_name" required>
                            </div>

                            <div class="form-group">
                                <label>Your Email <span class="required">*</span></label>
                                <input type="email" name="con_email" id="con_email" required>
                            </div>

                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="con_subject" id="con_subject">
                            </div>

                            <div class="form-group form-group-2">
                                <label>Your Message</label>
                                <textarea name="con_message" id="con_message"></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" value="submit" id="submit" class="uren-contact-form_btn" name="submit">Send</button>
                            </div>
                        </form>
                    </div>
                    <p class="form-message"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Main Page Area End Here -->

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


    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <!-- Begin Uren's Google Map Area -->
    <script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyChs2QWiAhnzz0a4OEhzqCXwx_qA9ST_lE"></script>

  
    <!-- Uren's Google Map Area End Here -->

</body>


</html>