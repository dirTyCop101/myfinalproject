<?php include 'db_connection.php'; ?>

<!-- Load Chatbot -->
<?php include 'chatbot.html'; ?>
<link rel="stylesheet" href="assets/css/chatbot.css">
<script src="assets/js/chatbot.js"></script>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
                            <div class="hm-form_area">
                               <form action="shop-grid-fullwidth.php" method="GET" class="hm-searchbox">
                                    <input type="text" name="query" placeholder="Enter your search key ...">
                                    <button class="header-search_btn" type="submit">
                                        <i class="ion-ios-search-strong"><span>Search</span></i>
                                    </button>
                                </form>
                                
                            </div>
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
                                        <span>Shop </span>
                                        <span>NOW!!!</span>
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
                    <h2>Autocity AutoParts</h2>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->

        <!-- Begin Uren's Shop Grid Fullwidth  Area -->
        <div class="container py-5">
                            <?php if (!empty($_GET['query']) || (isset($_GET['category']) && $_GET['category'] != "0")): ?>
                    <div class="d-flex justify-content-end mb-3">
                        <a href="shop-grid-fullwidth.php" class="btn btn-outline-light btn-sm">
                            <i class="fa fa-times-circle"></i> Clear Filter
                        </a>
                    </div>
                <?php endif; ?>
            <div class="row">
                <?php
                $limit = 9; // products per page
                $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
                $offset = ($page - 1) * $limit;

                $searchTerm = isset($_GET['query']) ? trim($_GET['query']) : '';
                $categoryId = isset($_GET['category']) && $_GET['category'] != "0" ? intval($_GET['category']) : 0;
                $searchSQL = "";

                if (!empty($searchTerm)) {
                    $safeTerm = $conn->real_escape_string($searchTerm);
                    $searchSQL .= " AND (name LIKE '%$safeTerm%' OR description LIKE '%$safeTerm%')";
                }

                if ($categoryId > 0) {
                    $searchSQL .= " AND category_id = $categoryId";
                }

                $countSQL = "SELECT COUNT(*) as total FROM products WHERE status = 'pending' $searchSQL";
                $countResult = $conn->query($countSQL);
                $totalRows = $countResult->fetch_assoc()['total'];
                $totalPages = ceil($totalRows / $limit);

                $sql = "SELECT * FROM products WHERE status = 'pending' $searchSQL ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
                $result = $conn->query($sql);

                if (!empty($searchTerm) || $categoryId > 0) {
                    echo "<div class='col-12 mb-3'><h5>Showing results";
                    if (!empty($searchTerm)) echo " for: <strong>" . htmlspecialchars($searchTerm) . "</strong>";
                    echo "</h5></div>";
                }

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $image = explode(',', $row['product_images'])[0];
                        $name = htmlspecialchars($row['name']);
                        $price = number_format($row['price'], 2);
                        $id = $row['id'];

                        echo <<<HTML
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 border-0 shadow-sm rounded-3 product-card">
                                <div class="position-relative">
                                    <a href="javascript:void(0)" class="quick-view-btn" data-id="$id" data-toggle="modal" data-target="#productModal">
                                        <img src="$image" class="card-img-top rounded-top" alt="$name" style="height: 300px; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-semibold mb-1">$name</h5>
                                    <div class="product-rating mb-2">★★★★☆</div>
                                    <div class="price-box mb-3"><span class='fw-bold text-dark'>GH₵$price</span></div>
                                    <button class="btn btn-outline-primary btn-sm quick-view-btn" data-id="$id" data-toggle="modal" data-target="#productModal">View More</button>
                                </div>
                            </div>
                        </div>
HTML;
                    }
                } else {
                    echo "<div class='col-12 text-center'><p class='text-muted'>No products found matching your criteria.</p></div>";
                }
                ?>
            </div>

            <!-- Pagination -->
            <div class="row">
                <div class="col-12 d-flex justify-content-center mt-4">
                    <nav>
                        <ul class="pagination">
                            <?php
                            for ($i = 1; $i <= $totalPages; $i++) {
                                $isActive = $i == $page ? 'active' : '';
                                $queryParams = http_build_query(array_merge($_GET, ['page' => $i]));
                                echo "<li class='page-item $isActive'><a class='page-link' href='?{$queryParams}'>$i</a></li>";
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content bg-dark text-white rounded-4 shadow-lg">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="productModalLabel">Product Details</h5>
                        <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-content-area" style="padding: 2rem;">
                        <!-- Content populated by AJAX -->
                        <div class="text-center text-muted">Loading...</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
        <!-- Uren's Shop Grid Fullwidth  Area End Here -->

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

    <script>
    $(document).ready(function() {
        $('.quick-view-btn').on('click', function() {
            var productId = $(this).data('id');
            $.ajax({
                url: 'get-product.php',
                method: 'GET',
                data: { id: productId },
                success: function(response) {
                    $('#modal-content-area').html(response);
                    $('#productModal').modal('show');
                }
            });
        });
    });
    </script>


<style>
    .product-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 0.75rem;
    background-color: #fff;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
}

.card-img-top {
    height: 300px;
    object-fit: cover;
}

.badge-sale {
    background-color: #ffc107;
    color: #000;
    font-size: 0.75rem;
    padding: 0.4em 0.7em;
    border-radius: 0.5rem;
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 1;
}

.product-rating {
    color: #f5c518;
    font-size: 0.85rem;

}

.btn-outline-light {
    border-radius: 0.4rem;
    font-weight: 500;
}

.modal-content {
    background-color: #1c1c1e;
    color: #f5f5f5;
    border-radius: 1rem;
}

.modal-header {
    border-bottom: 1px solid #333;
}

 .btn-close-white {
            filter: invert(1);
            background: none;
            border: none;
            font-size: 1.25rem;
        }


</style>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>


</html>