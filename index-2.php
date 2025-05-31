
<?php
require_once 'admin/includes/db.php';

//RECENT BLOGS
$recentBlogs = $conn->query("SELECT id, title, image, content, created_at FROM blog_posts ORDER BY created_at DESC LIMIT 6");

// HOT DEALS
$hotDealsResult = $conn->query("SELECT * FROM products WHERE is_deal = 1 ORDER BY deal_expires ASC");

// BANNERS
$banners = [];
$query = "SELECT * FROM home_content ORDER BY created_at DESC";
$bannerResult = mysqli_query($conn, $query);

if ($bannerResult) {
    while ($row = mysqli_fetch_assoc($bannerResult)) {
        $banners[] = $row;
    }
}
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
                                        <span>Welcome to</span>
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

        <div class="uren-slider_area uren-slider_area-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="main-slider slider-navigation_style-2">
                            <?php foreach ($banners as $banner) : ?>
                                <!-- Begin Single Slide Area -->
                                <div class="single-slide animation-style-01 bg-3">
                                    <div class="slider-content">
                                  
                                        <h3><?= htmlspecialchars($banner['title']) ?></h3>
                                        <h4><?= htmlspecialchars($banner['description']) ?></h4>
                                        <div class="uren-btn-ps_left slide-btn">
                                            <a class="uren-btn" href="shop-grid-fullwidth.php">Go To Shop</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Slide Area End Here -->
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="row banner-wrap">
                            <?php foreach ($banners as $banner) : ?>
                                <div class="col-lg-12 col-md-6">
                                    <div class="slider-banner banner-item img-hover_effect">
                                        <a href="shop-grid-fullwidth.php">
                                            <img class="img-full" src="admin/uploads/<?= htmlspecialchars($banner['image']) ?>" alt="Banner Image">
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Begin Uren's Shipping Area -->
        <div class="uren-shipping_area">
            <div class="container-fluid">
                <div class="shipping-nav">
                    <div class="row no-gutters">
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-paperplane-outline"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>Free Delivery</h6>
                                    <p>Selected dealers offer free nationwide delivery across Ghana.</p>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-help-outline"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>Chatbot Support</h6>
                                    <p>Need help? Chat with Wrenchy, our AI-powered assistant for support.</p>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-refresh-empty"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>100% Money Back</h6>
                                    <p>Secure transactions and warranty-backed products you can trust.</p>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-undo-outline"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>Days Return</h6>
                                    <p>Selected dealers offer a return policy for added peace of mind.</p>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-locked-outline"></i>
                                </div>
                                <div class="shipping-content last-child">
                                    <h6>Payment Secure</h6>
                                    <p>Make payments directly to the dealer—no middleman.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Shipping Area End Here -->

<div class="special-product_slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area"
    data-slick-options='{
        "slidesToShow": 2,
        "arrows" : true
    }'
    data-slick-responsive='[{"breakpoint":768, "settings": {"slidesToShow": 1}}]'>

    <?php if ($hotDealsResult && $hotDealsResult->num_rows > 0): ?>
        <?php while ($row = $hotDealsResult->fetch_assoc()): ?>
            <?php
               // If product_images contains multiple images (e.g., comma-separated), take the first one
               $imageFile = trim(explode(',', $row['product_images'])[0]);  // Get the first image
               $imagePath = $imageFile; 
               $price = floatval($row['price']);
               $dealPrice = floatval($row['deal_price']);
               $discount = ($price > 0) ? (($price - $dealPrice) / $price) * 100 : 0;
            ?>
            <div class="slide-item">
                <div class="inner-slide">
                    <div class="single-product">
                        <div class="product-img">
                            <a href="single-product.php?id=<?= $row['id'] ?>">
                                <!-- Updated Image Paths -->
                                <img class="primary-img" src="<?= $imagePath ?>" alt="<?= htmlspecialchars($row['name']) ?>" onerror="this.onerror=null;this.src='/assets/img/default.jpg';">
                                <img class="secondary-img" src="<?= $imagePath ?>" alt="<?= htmlspecialchars($row['name']) ?>" onerror="this.onerror=null;this.src='/uren/assets/img/default.jpg';">
                            </a>
                            <div class="sticker-area-2">
                                <span class="sticker-2"><?= number_format($discount) ?>%</span>
                                <span class="sticker">New</span>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="product-desc_info">
                                <div class="uren-countdown_area">
                                    <span class="product-offer">Hurry up! Offer ends in:</span>
                                    <div class="countdown-wrap">
                                        <div class="countdown item-4" data-countdown="<?= $row['deal_expires'] ?>" data-format="short">
                                            <div class="countdown__item"><span class="countdown__time daysLeft"></span><span class="countdown__text daysText"></span></div>
                                            <div class="countdown__item"><span class="countdown__time hoursLeft"></span><span class="countdown__text hoursText"></span></div>
                                            <div class="countdown__item"><span class="countdown__time minsLeft"></span><span class="countdown__text minsText"></span></div>
                                            <div class="countdown__item"><span class="countdown__time secsLeft"></span><span class="countdown__text secsText"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rating-box">
                                    <ul>
                                        <li><i class="ion-android-star"></i></li>
                                        <li><i class="ion-android-star"></i></li>
                                        <li><i class="ion-android-star"></i></li>
                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                    </ul>
                                </div>
                                <h6 class="product-name"><a href="single-product.php?id=<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></a></h6>
                                <div class="price-box">
                                    <span class="new-price new-price-2">₵<?= number_format($dealPrice, 2) ?></span>
                                    <span class="old-price">₵<?= number_format($price, 2) ?></span>
                                </div>
                                <div class="add-actions">
                                    <ul>
                                        <li>
                                            <a class="uren-add_cart" href="javascript:void(0);"
                                                data-toggle="modal"
                                                data-target="#productModal<?= $row['id'] ?>">
                                                <i class="ion-bag"></i>View Now
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No hot deals available at the moment.</p>
    <?php endif; ?>
</div>



                <!-- Start: Modals for all products  -->
                <?php
                $hotDealsResult->data_seek(0); // reset pointer to loop again
                while ($row = $hotDealsResult->fetch_assoc()):
                ?>
                <div class="modal fade" id="productModal<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="productModalLabel<?= $row['id'] ?>" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color: #ffc400; color: #000;">
                        <h5 class="modal-title" id="productModalLabel<?= $row['id'] ?>">
                          <?= htmlspecialchars($row['name']) ?> - Vendor Info
                        </h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p><strong>Phone:</strong> <?= htmlspecialchars($row['contact_phone']) ?: 'Not provided' ?></p>
                        <p><strong>Email:</strong> <?= htmlspecialchars($row['contact_email']) ?: 'Not provided' ?></p>
                        <hr>
                        <p><strong>Description:</strong><br><?= nl2br(htmlspecialchars($row['description'])) ?: 'No description available.' ?></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endwhile; ?>
                <!-- End: Modals -->
            </div>
        </div>
    </div>
</div>
<!-- Special Product Area End Here -->



        <!-- Begin Uren's Banner Area -->
        <div class="uren-banner_area @@bgColor">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="banner-item img-hover_effect">
                            <div class="banner-img-1"></div>
                            <div class="banner-content">
                                <span class="offer">Get 20% off your order</span>
                                <h4>Car and Truck</h4>
                                <h3>Mercedes Benz</h3>
                                <p>Explore and immerse in exciting 360 content with
                                    Fulldive’s all-in-one virtual reality platform</p>
                                <div class="uren-btn-ps_left">
                                    <a class="uren-btn" href="shop-grid-fullwidth.php">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner-item img-hover_effect">
                            <div class="banner-img-1 banner-img-2"> </div>
                            <div class="banner-content">
                                <span class="offer">Save 10% when you buy</span>
                                <h4>Rotiform SFO </h4>
                                <h3>Custom Forged</h3>
                                <p>Buy your custom wheels from the most trusted and authentic rim dealer
                                     in all of Ghana</p>
                                <div class="uren-btn-ps_left">
                                    <a class="uren-btn" href="shop-grid-fullwidth.php">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Banner Area End Here -->

     

        <!-- Begin Uren's Banner Two Area -->
        <div class="uren-banner_area uren-banner_area-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-grid-fullwidth.php">
                                <img class="img-full" src="assets/images/banner/1-3.jpg" alt="Uren's Banner">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-grid-fullwidth.php">
                                <img class="img-full" src="assets/images/banner/1-4.jpg" alt="Uren's Banner">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-grid-fullwidth.php">
                                <img class="img-full" src="assets/images/banner/1-5.jpg" alt="Uren's Banner">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Banner Two Area End Here -->

 

        <!-- Begin Featured Categories Area -->
        <div class="featured-categories_area">
            <div class="container-fluid">
                <div class="section-title_area">
                    <span>Top Featured Collections</span>
                    <h3>Featured Categories</h3>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="featured-categories_slider uren-slick-slider slider-navigation_style-1" data-slick-options='{
                        "slidesToShow": 4,
                        "spaceBetween": 30,
                        "arrows" : true
                       }' data-slick-responsive='[
                                             {"breakpoint":1599, "settings": {"slidesToShow": 3}},
                                             {"breakpoint":1200, "settings": {"slidesToShow": 2}},
                                             {"breakpoint":768, "settings": {"slidesToShow": 1}}
                                         ]'>
                           <div class="slide-item">
                                <div class="slide-inner">
                                    <div class="slide-image_area">
                                        <img src="assets/images/featured-categories/1.png" alt="Uren's Featured Categories">
                                    </div>
                                    <div class="slide-content_area">
                                        <h3>Engine & Performance</h3>
                                        <span></span>
                                        <ul class="product-item">
                                            <li><i class="fa fa-arrow-right"></i> Turbos & Superchargers</li>
                                            <li><i class="fa fa-arrow-right"></i> Fuel Systems</li>
                                            <li><i class="fa fa-arrow-right"></i> Exhuast Systems</li>
                                            <li><i class="fa fa-arrow-right"></i> Air Intake Systems</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="slide-inner">
                                    <div class="slide-image_area">
                                        <img src="assets/images/featured-categories/2.png" alt="Uren's Featured Categories">
                                    </div>
                                    <div class="slide-content_area">
                                        <h3>Interior</h3>
                                        <span></span>
                                        <ul class="product-item">
                                            <li><i class="fa fa-arrow-right"></i> Dash Vinyls</li>
                                            <li><i class="fa fa-arrow-right"></i> Floor Mats</li>
                                            <li><i class="fa fa-arrow-right"></i> Seat Covers</li>
                                            <li><i class="fa fa-arrow-right"></i> Steering Wheels</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="slide-inner">
                                    <div class="slide-image_area">
                                        <img src="assets/images/featured-categories/3.png" alt="Uren's Featured Categories">
                                    </div>
                                    <div class="slide-content_area">
                                        <h3>Lighting & Electrical</h3>
                                        <span></span>
                                        <ul class="product-item">
                                            <li><i class="fa fa-arrow-right"></i> Altenators & Starters</li>
                                            <li><i class="fa fa-arrow-right"></i> Battries</li>
                                            <li><i class="fa fa-arrow-right"></i> Wirirng Harness</li>
                                            <li><i class="fa fa-arrow-right"></i> Sensors</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="slide-inner">
                                    <div class="slide-image_area">
                                        <img src="assets/images/featured-categories/4.png" alt="Uren's Featured Categories">
                                    </div>
                                    <div class="slide-content_area">
                                        <h3>Body & Exterior</h3>
                                        <span></span>
                                        <ul class="product-item">
                                            <li><i class="fa fa-arrow-right"></i> Bumpers & Fenders</li>
                                            <li><i class="fa fa-arrow-right"></i> Mirrors</li>
                                            <li><i class="fa fa-arrow-right"></i> Hoods & grilles</li>
                                            <li><i class="fa fa-arrow-right"></i> Windshield wipers</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="slide-inner">
                                    <div class="slide-image_area">
                                        <img src="assets/images/featured-categories/5.png" alt="Uren's Featured Categories">
                                    </div>
                                    <div class="slide-content_area">
                                        <h3>Suspension Systems</h3>
                                        <span></span>
                                        <ul class="product-item">
                                            <li><i class="fa fa-arrow-right"></i> Shock absorber</li>
                                            <li><i class="fa fa-arrow-right"></i> Struts & coilovers</li>
                                            <li><i class="fa fa-arrow-right"></i> Control arms</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="slide-inner">
                                    <div class="slide-image_area">
                                        <img src="assets/images/featured-categories/6.png" alt="Uren's Featured Categories">
                                    </div>
                                    <div class="slide-content_area">
                                        <h3>Wheels & Tires</h3>
                                        <span></span>
                                        <ul class="product-item">
                                            <li><i class="fa fa-arrow-right"></i> Rims</li>
                                            <li><i class="fa fa-arrow-right"></i> Tires</li>
                                            <li><i class="fa fa-arrow-right"></i> Wheel Nuts</li>
                                            <li><i class="fa fa-arrow-right"></i> Hubcaps</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featured Categories Area End Here -->

        <!-- Begin Uren's Brand Area -->
        <div class="uren-brand_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title_area">
                            <span>Top Quality Partner</span>
                            <h3>Shop By Brands</h3>
                        </div>
                        <div class="brand-slider uren-slick-slider img-hover-effect_area" data-slick-options='{
                        "slidesToShow": 6
                        }' data-slick-responsive='[
                                                {"breakpoint":1200, "settings": {"slidesToShow": 5}},
                                                {"breakpoint":992, "settings": {"slidesToShow": 3}},
                                                {"breakpoint":767, "settings": {"slidesToShow": 3}},
                                                {"breakpoint":577, "settings": {"slidesToShow": 2}},
                                                {"breakpoint":321, "settings": {"slidesToShow": 1}}
                                            ]'>
                          <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <img src="assets/images/brand/1650100564459.png" alt="Uren's Brand Image">
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <img src="assets/images/brand/AMG_logo.svg.png" alt="Uren's Brand Image">
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <img src="assets/images/brand/Brembo_logo.svg.png" alt="Uren's Brand Image">
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <img src="assets/images/brand/Dodge-Hellcat-Emblem.png" alt="Uren's Brand Image">
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <img src="assets/images/brand/Hennessey_logo.png" alt="Uren's Brand Image">
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <img src="assets/images/brand/petronas-logo.png" alt="Uren's Brand Image">
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <img src="assets/images/brand/1.jpg" alt="Uren's Brand Image">
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <img src="assets/images/brand/7.jpg" alt="Uren's Brand Image">
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <img src="assets/images/brand/2.jpg" alt="Uren's Brand Image">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Brand Area End Here -->

        <!-- Begin Uren's Blog Area -->
        <div class="uren-blog_area bg--white_smoke">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title_area">
                            <span>Our Recent Posts</span>
                            <h3>From Our Blogs</h3>
                        </div>
                          <div class="blog-slider uren-slick-slider slider-navigation_style-1" data-slick-options='{
                            "slidesToShow": 4,
                            "spaceBetween": 30,
                            "arrows" : true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 3}},
                            {"breakpoint":992, "settings": {"slidesToShow": 2}},
                            {"breakpoint":768, "settings": {"slidesToShow": 2}},
                            {"breakpoint":576, "settings": {"slidesToShow": 1}}
                        ]'>
                            <?php if ($recentBlogs && $recentBlogs->num_rows > 0): ?>
                                <?php while ($blog = $recentBlogs->fetch_assoc()): ?>
                                    <div class="slide-item">
                                        <div class="inner-slide">
                                            <div class="blog-img img-hover_effect">
                                                <a href="blog-list-fullwidth.php?id=<?= $blog['id'] ?>">
                                                    <img src="admin/blog_uploads/<?= $blog['image'] ?>" alt="<?= htmlspecialchars($blog['title']) ?>" style="height:200px; object-fit:cover; width:100%;">
                                                </a>
                                                <span class="post-date"><?= date("d-m-y", strtotime($blog['created_at'])) ?></span>
                                            </div>
                                            <div class="blog-content">
                                                <h3><a href="blog-list-fullwidth.php?id=<?= $blog['id'] ?>"><?= htmlspecialchars($blog['title']) ?></a></h3>
                                                <p><?= substr(strip_tags($blog['content']), 0, 150) ?>...</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <p>No blog posts found.</p>
                            <?php endif; ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Blog Area End Here -->

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
                                                <input id="mc-email" class="newsletter-input" type="email" autocomplete="on" placeholder="Enter your email" />
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
                                                <li><a href="contact.php">Contact Us</a></li>
                                                <li><a href="#">Wrenchy</a></li>
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

    <script src="assets/js/chatbot.js"></script>

   


</body>


</html>