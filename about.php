<?php 
session_start();
include 'conn.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>About Us</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    
    <!-- CSS 
    ========================= -->
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Font CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

<!-- Main Wrapper Start -->
<div class="main-wrapper">
    <!-- header-area start -->
    <div class="header-area">
        <!-- header-top start -->
        <?php include 'top-header.php';?>
        <!-- Header-top end -->
        <!-- Header-bottom start -->
        <div class="header-bottom-area header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-4">
                        <!-- logo start -->
                        <div class="logo">
                            <a href="index.php"><img src="assets/images/logo/logo.png" style="width: 75px; margin-top: -16px;" alt=""></a>
                        </div>
                        <!-- logo end -->
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <!-- main-menu-area start -->
                        <div class="main-menu-area">
                            <nav class="main-navigation">
                                <ul>
                                    <li><a href="index.php">Home</i></a>                                        
                                    </li>
                                    <li><a href="shop.php">Shop </a>                                        
                                    </li>
                                    <li><a href="about.php">About</i></a>                                        
                                    </li>
                                    <li><a href="contact.php">Contact Us</a>                                        
                                    </li>                                    
                                </ul>
                            </nav>
                        </div>
                        <!-- main-menu-area start -->
                    </div>
                    <div class="col-lg-3 col-8">
                        <div class="header-bottom-right">
                            <div class="block-search">
                                <div class="trigger-search"><i class="fa fa-search"></i> <span>Search</span></div>
                                <div class="search-box main-search-active">
                                    <form action="#" class="search-box-inner">
                                        <input type="text" placeholder="Search our catalog">
                                        <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="shoping-cart">
                                <div class="btn-group">
                                    <!-- Mini Cart Button start -->
                                    <!-- <button class="dropdown-toggle"><i class="fa fa-shopping-cart"></i> Cart (2)</button> -->
                                    <!-- Mini Cart button end -->
                                    
                                    <!-- Mini Cart wrap start -->
                                    <!-- <div class="dropdown-menu mini-cart-wrap">
                                        <div class="shopping-cart-content">
                                            <ul class="mini-cart-content">
                                                <!-- Mini-Cart-item start -->
                                                <!--<li class="mini-cart-item">
                                                    <div class="mini-cart-product-img">
                                                        <a href="#"><img src="assets/images/cart/1.jpg" alt=""></a>
                                                        <span class="product-quantity">1x</span>
                                                    </div>
                                                    <div class="mini-cart-product-desc">
                                                        <h3><a href="#">Printed Summer Dress</a></h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$55.21</span>
                                                        </div>
                                                        <div class="size">
                                                            Size: S
                                                        </div>
                                                    </div>
                                                    <div class="remove-from-cart">
                                                        <a href="#" title="Remove"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </li>
                                                <!-- Mini-Cart-item end -->
                                                
                                                <!-- Mini-Cart-item start -->
                                                <!--<li class="mini-cart-item">
                                                    <div class="mini-cart-product-img">
                                                        <a href="#"><img src="assets/images/cart/3.jpg" alt=""></a>
                                                        <span class="product-quantity">1x</span>
                                                    </div>
                                                    <div class="mini-cart-product-desc">
                                                        <h3><a href="#">Faded Sleeves T-shirt</a></h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$72.21</span>
                                                        </div>
                                                        <div class="size">
                                                            Size: M
                                                        </div>
                                                    </div>
                                                    <div class="remove-from-cart">
                                                        <a href="#" title="Remove"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </li>
                                                <!-- Mini-Cart-item end -->
                                                
                                                <!--<li>
                                                    <!-- shopping-cart-total start -->
                                                    <!--<div class="shopping-cart-total">
                                                        <h4>Sub-Total : <span>$127.42</span></h4>
                                                        <h4>Total : <span>$127.42</span></h4>
                                                    </div>
                                                    <!-- shopping-cart-total end -->
                                                <!-- </li> -->
                                                
                                                <!-- <li>    -->
                                                    <!-- shopping-cart-btn start -->
                                                    <!-- <div class="shopping-cart-btn">
                                                        <a href="checkout.html">Checkout</a>
                                                    </div> -->
                                                    <!-- shopping-cart-btn end -->
                                                <!-- </li>
                                            </ul>
                                        </div>
                                    </div> -->
                                    <!-- Mini Cart wrap End -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- mobile-menu start -->
                        <div class="mobile-menu d-block d-lg-none"></div>
                        <!-- mobile-menu end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Header-bottom end -->
    </div>
    <!-- Header-area end -->
    
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    
    
    <!-- content-wraper start -->
    <div class="content-wraper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-us-img">
                        <img src="assets/images/about/about.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-info-wrapper">
                        <h2>Our company</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum ullam repellat mollitia odio aliquid, assumenda, quis, reprehenderit, fugit hic optio sit! Vitae id quisquam aperiam sint amet perspiciatis, praesentium quasi!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum ullam repellat mollitia odio aliquid, assumenda, quis, reprehenderit, fugit hic optio sit! Vitae.</p>
                        <div class="read-more-btn">
                            <a href="#">read more</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Our Team Aare Start -->
            <div class="our-team-area section-ptb">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section-title start -->
                        <div class="section-title">
                            <h2>Team Members</h2>
                            <p>Most Trendy 2018 Clother</p>
                        </div>
                        <!-- section-title end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="single-team mt--30">
                            <div class="team-imgae">
                                <img src="assets/images/about/01.jpg" alt="">
                                <div class="social-link">
                                    <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                                    <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                                    <a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a>
                                    <a class="vimeo" href="#"><i class="fa fa-vimeo"></i></a>
                                </div>
                            </div>
                            <div class="team-info">
                                <h3>Oscar Oldman</h3>
                                <p>programmer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-team mt--30">
                            <div class="team-imgae">
                                <img src="assets/images/about/02.jpg" alt="">
                                <div class="social-link">
                                    <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                                    <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                                    <a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a>
                                    <a class="vimeo" href="#"><i class="fa fa-vimeo"></i></a>
                                </div>
                            </div>
                            <div class="team-info">
                                <h3>Nicole Williams</h3>
                                <p>Designer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-team mt--30">
                            <div class="team-imgae">
                                <img src="assets/images/about/03.jpg" alt="">
                                <div class="social-link">
                                    <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                                    <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                                    <a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a>
                                    <a class="vimeo" href="#"><i class="fa fa-vimeo"></i></a>
                                </div>
                            </div>
                            <div class="team-info">
                                <h3>Gary Harris</h3>
                                <p>Director</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-team mt--30">
                            <div class="team-imgae">
                                <img src="assets/images/about/04.jpg" alt="">
                                <div class="social-link">
                                    <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                                    <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                                    <a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a>
                                    <a class="vimeo" href="#"><i class="fa fa-vimeo"></i></a>
                                </div>
                            </div>
                            <div class="team-info">
                                <h3>Jessica Watson</h3>
                                <p>programmer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Our Team Aare End -->
            
            <!-- Our Brand Area Start -->
            <div class="our-brand-area">
                <div class="row">
                    <div class="col">
                        <div class="section-pt border-t-one"></div>
                        <div class="row our-brand-active text-center">
                            <div class="col-12">
                                <div class="single-brand">
                                    <a href="#"><img src="assets/images/brand/1.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-brand">
                                    <a href="#"><img src="assets/images/brand/2.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-brand">
                                    <a href="#"><img src="assets/images/brand/3.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-brand">
                                    <a href="#"><img src="assets/images/brand/4.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-brand">
                                    <a href="#"><img src="assets/images/brand/5.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-brand">
                                    <a href="#"><img src="assets/images/brand/6.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Our Brand Area End -->
        </div>
    </div>
    <!-- content-wraper end -->
    
    
    <!-- Footer Aare Start -->
    <?php include 'footer.php';?>
    <!-- Footer Aare End -->
    
    <!-- Modal Algemeen Uitgelicht start -->
    <div class="modal fade modal-wrapper" id="exampleModalCenter" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-inner-area row">
                        <div class="col-lg-5 col-md-6 col-sm-6">
                           <!-- Product Details Left -->
                            <div class="product-details-left">
                                <div class="product-details-images slider-navigation-1">
                                    <div class="lg-image">
                                        <img src="assets/images/product/1.jpg" alt="product image">
                                    </div>
                                    <div class="lg-image">
                                        <img src="assets/images/product/2.jpg" alt="product image">
                                    </div>
                                    <div class="lg-image">
                                        <img src="assets/images/product/3.jpg" alt="product image">
                                    </div>
                                    <div class="lg-image">
                                        <img src="assets/images/product/5.jpg" alt="product image">
                                    </div>
                                </div>
                                <div class="product-details-thumbs slider-thumbs-1">										
                                    <div class="sm-image"><img src="assets/images/product/1.jpg" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="assets/images/product/2.jpg" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="assets/images/product/3.jpg" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="assets/images/product/4.jpg" alt="product image thumb"></div>
                                </div>
                            </div>
                            <!--// Product Details Left -->
                        </div>

                        <div class="col-lg-7 col-md-6 col-sm-6">
                            <div class="product-details-view-content">
                                <div class="product-info">
                                    <h2>Healthy Melt</h2>
                                    <div class="price-box">
                                        <span class="old-price">$70.00</span>
                                        <span class="new-price">$76.00</span>
                                        <span class="discount discount-percentage">Save 5%</span>
                                    </div>
                                    <p>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom. Lorem ipsum dolor sit amet, consectetur adipisicing elit. quibusdam corporis, earum facilis et nostrum dolorum accusamus similique eveniet quia pariatur.</p>
                                    <div class="product-variants">
                                        <div class="produt-variants-size">
                                            <label>Size</label>
                                            <select class="form-control-select" >
                                                <option value="1" title="S" selected="selected">S</option>
                                                <option value="2" title="M">M</option>
                                                <option value="3" title="L">L</option>
                                            </select>
                                        </div>
                                        <div class="produt-variants-color">
                                            <label>Color</label>
                                            <ul class="color-list">
                                                <li><a href="#" class="orange-color active"></a></li>
                                                <li><a href="#" class="paste-color"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="single-add-to-cart">
                                        <form action="#" class="cart-quantity">
                                            <div class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="1" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </div>
                                            <button class="add-to-cart" type="submit">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <!-- Modal Algemeen Uitgelicht end -->
    
</div>
<!-- Main Wrapper End -->

<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<!-- Popper JS -->
<script src="assets/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="assets/js/plugins.js"></script>
<!-- Ajax Mail -->
<script src="assets/js/ajax-mail.js"></script>
<!-- Main JS -->
<script src="assets/js/main.js"></script>


</body>


<!-- Mirrored from demo.hasthemes.com/boyka-preview/boyka/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Jul 2020 09:04:43 GMT -->
</html>