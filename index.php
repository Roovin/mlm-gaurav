<?php 
session_start();
include 'conn.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Boyka - Fashion eCommerce Bootstrap 4 HTML5 Template</title>
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
                                    <li  class="active"><a href="index.php">Home</i></a>                                        
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
                        <!-- main-menu-area End -->
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
                                                <!-- <li class="mini-cart-item">
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
                                                </li> -->
                                                <!-- Mini-Cart-item end -->
                                                
                                                <!-- Mini-Cart-item start -->
                                                <!-- <li class="mini-cart-item">
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
                                                </li> -->
                                                <!-- Mini-Cart-item end -->
                                                
                                                <!-- <li> -->
                                                    <!-- shopping-cart-total start -->
                                                    <!-- <div class="shopping-cart-total">
                                                        <h4>Sub-Total : <span>$127.42</span></h4>
                                                        <h4>Total : <span>$127.42</span></h4>
                                                    </div> -->
                                                    <!-- shopping-cart-total end -->
                                                <!-- </li> -->
                                                
                                                <!-- <li>    -->
                                                    <!-- shopping-cart-btn start -->
                                                    <!-- <div class="shopping-cart-btn">
                                                        <a href="checkout.html">Checkout</a> -->
                                                    <!-- </div> -->
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
    
    <!-- Hero Slider start -->
    <div class="hero-slider hero-slider-one">
        <div class="single-slide" style="background-image: url(assets/images/slider/food.jpg)">
            <!-- Hero Content One Start -->
            <div class="hero-content-one container">
                <div class="row">
                    <div class="col"> 
                        <div class="slider-text-info">
                            <h1 style="color:white;">Classic Chicken Pot </h1>
                            <!-- <h1 style="color:white;">Amazing For </h1> -->
                            <p style="color:ghostwhite;">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat</p>
                            <a href="shop.html" class="btn slider-btn uppercase"><span><i class="fa fa-plus"></i> Shop Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero Content One End -->
        </div>
        <div class="single-slide" style="background-image: url(assets/images/slider/cook.jpg)">
            <!-- Hero Content One Start -->
            <div class="hero-content-one container">
                <div class="row">
                    <div class="col"> 
                        <div class="slider-text-info">
                            <h1 style="color:white;">Spring pots</h1>
                            <!-- <h1>Amazing Men's</h1> -->
                            <p style="color:white;">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat</p>
                            <a href="shop.html" class="btn slider-btn uppercase"><span><i class="fa fa-plus"></i> SHOP NOW</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero Content One End -->
        </div>
    </div>
    <!-- Hero Slider end -->
    
    <!-- Banner area start -->
    <div class="banner-area mb--30">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <!-- single-banner start -->
                    <div class="single-banner mt--30">
                        <a href="shop.html"><img src="assets/images/banner/1.jpg" alt=""></a>
                    </div>
                    <!-- single-banner end -->
                </div>
                <div class="col-lg-4 col-md-4">
                    <!-- single-banner start -->
                    <div class="single-banner mt--30">
                        <a href="shop.html"><img src="assets/images/banner/2.jpg" alt=""></a>
                    </div>
                    <!-- single-banner end -->
                </div>
                <div class="col-lg-4 col-md-4">
                    <!-- single-banner start -->
                    <div class="single-banner mt--30">
                        <a href="shop.html"><img src="assets/images/banner/3.jpg" alt=""></a>
                    </div>
                    <!-- single-banner end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Banner area end -->
    
    <!-- Daily Deals area start -->
    <div class="daily-deals-area daily-deals-bg section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="row">
                        <div class="col">
                            <div class="daily-deals-title">
                                <h2>Daily Deals</h2>
                                <p>Deals 30% for all Jackets Products</p>
                            </div>
                        </div>
                    </div>
                    <div class="row deals-product-active">
                        <div class="col-12">
                            <div class="daily-deals-wrap">
                                <!-- countdown start -->
                                <div class="countdown-deals" data-countdown="2020/06/01"></div>
                                <!-- countdown end -->
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="product-details.html"><img src="assets/images/product/1.jpg" alt=""></a>
                                        <span class="label-product label-new">new</span>
                                        <span class="label-product label-sale">-7%</span>
                                        <div class="quick_view">
                                            <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">Printed Summer Dress</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$51.27</span>
                                            <span class="old-price">$54.49</span>
                                        </div>
                                        <div class="product-action">
                                            <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                            <div class="star_content">
                                                <ul class="d-flex">
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="daily-deals-wrap">
                                <!-- countdown start -->
                                <div class="countdown-deals" data-countdown="2021/03/01"></div>
                                <!-- countdown end -->
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="product-details.html"><img src="assets/images/product/2.jpg" alt=""></a>
                                        <span class="label-product label-new">new</span>
                                        <span class="label-product label-sale">-20%</span>
                                        <div class="quick_view">
                                            <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">Printed Dress1</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$72.10</span>
                                            <span class="old-price">$67.27</span>
                                        </div>
                                        <div class="product-action">
                                            <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                            <div class="star_content">
                                                <ul class="d-flex">
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="daily-deals-wrap">
                                <!-- countdown start -->
                                <div class="countdown-deals" data-countdown="2020/03/01"></div>
                                <!-- countdown end -->
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="product-details.html"><img src="assets/images/product/3.jpg" alt=""></a>
                                        <span class="label-product label-new">new</span>
                                        <span class="label-product label-sale">-9%</span>
                                        <div class="quick_view">
                                            <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">New Look Material</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$51.27</span>
                                            <span class="old-price">$54.49</span>
                                        </div>
                                        <div class="product-action">
                                            <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                            <div class="star_content">
                                                <ul class="d-flex">
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Daily Deals area end -->
    
    <!-- Product Area Start -->
    <div class="product-area section-pt section-pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- section-title start -->
                    <div class="section-title">
                        <h2>New Arrivals </h2>
                        <p>Most Trendy 2018 Clother</p>
                    </div>
                    <!-- section-title end -->
                </div>
            </div>
            <!-- product-wrapper start -->
            <div class="product-wrapper">
                <div class="row product-slider">
                <?php 
                    $query = "SELECT products.id as pid, products.name as pname, products.category as pcat, products.image as pimage, products.subcat as pscat, stocks.product_id as spid, purchase.total as ptotal, purchase.net_purchase_price as totalPrice FROM products JOIN stocks ON products.id=stocks.product_id JOIN purchase ON stocks.product_id=purchase.product_id LIMIT 4";
                    $result = mysqli_query($conn, $query);
                    while($r = mysqli_fetch_array($result)){
                ?>
                    <div class="col-12">
                        <!-- single-product-wrap start -->                        
                        <div class="single-product-wrap">                            
                            <div class="product-image">
                                <a href="product_details.php?pid=<?= $r['pid'];?>"><img src="admin/productimages/<?php echo htmlentities($r['pid']);?>/<?php echo htmlentities($r['pimage']);?>" data-echo="admin/productimages/<?php echo htmlentities($r['pid']);?>/<?php echo htmlentities($r['pimage']);?>" data-src="admin/productimages/<?php echo htmlentities($r['pid']);?>/<?php echo htmlentities($r['pimage']);?>" data-echo="admin/productimages/<?php echo htmlentities($r['pid']);?>/<?php echo htmlentities($r['pimage']);?>"></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-7%</span>
                                <!-- <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div> -->
                            </div>
                            <div class="product-content">
                                <h3><a href="product_details.php?pid=<?= $r['pid'];?>"><?php echo $r['pname']?></a></h3>
                                <div class="price-box">
                                    <span class="new-price"><?php echo $r['totalPrice'];?></span>
                                    <span class="old-price"><?php echo $r['ptotal'];?></span>
                                </div>
                                <div class="product-action">
                                    <!-- <a href="#" class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</a> -->
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>                                
                        </div>
                    </div>
                    <?php }?>
                    <!-- <div class="col-12">
                        <!-- single-product-wrap start -->
                        <!-- <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="product-details.html"><img src="assets/images/product/2.jpg" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-7%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">New Mix Material</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$76.00</span>
                                    <span class="old-price">$70.00</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- single-product-wrap end -->
                        <!-- single-product-wrap start -->
                        <!-- <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="product-details.html"><img src="assets/images/product/6.jpg" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-9%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Faded Short T-shirt</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$31.27</span>
                                    <span class="old-price">$24.49</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- single-product-wrap end -->
                    <!-- </div> -->
                    <!-- <div class="col-12"> -->
                        <!-- single-product-wrap start -->
                        <!-- <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="product-details.html"><img src="assets/images/product/4.jpg" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-7%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html"> Summer Dress</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$51.27</span>
                                    <span class="old-price">$54.49</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- single-product-wrap end -->
                        <!-- single-product-wrap start -->
                        <!-- <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="product-details.html"><img src="assets/images/product/7.jpg" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-7%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Mushroom Burger</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$51.27</span>
                                    <span class="old-price">$54.49</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- single-product-wrap end -->
                    <!-- </div> -->
                    <!-- <div class="col-12"> -->
                        <!-- single-product-wrap start -->
                        <!-- <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="product-details.html"><img src="assets/images/product/1.jpg" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-4%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Printed Summer Dress</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$81.27</span>
                                    <span class="old-price">$80.49</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- single-product-wrap end -->
                        <!-- single-product-wrap start -->
                        <!-- <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="product-details.html"><img src="assets/images/product/8.jpg" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-7%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Dress Printed Summer</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$51.27</span>
                                    <span class="old-price">$54.49</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- single-product-wrap end -->
                    <!-- </div> -->
                    <!-- <div class="col-12"> -->
                        <!-- single-product-wrap start -->
                        <!-- <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="product-details.html"><img src="assets/images/product/6.jpg" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-7%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Printed Summer Dress</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$51.27</span>
                                    <span class="old-price">$54.49</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- single-product-wrap end -->
                        <!-- single-product-wrap start -->
                        <!-- <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="product-details.html"><img src="assets/images/product/9.jpg" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-7%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Printed Summer Dress</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$51.27</span>
                                    <span class="old-price">$54.49</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- single-product-wrap end -->
                    <!-- </div> -->
                </div>
            </div>
            <!-- product-wrapper end -->
        </div>
    </div>
    <!-- Product Area End -->
    
    <!-- Banner area start -->
    <div class="banner-area-two">
        <div class="container-fluid plr-40">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <!-- single-banner start -->
                    <div class="single-banner-two mt--30">
                        <a href="shop.php"><img src="assets/images/banner/kichen6.jpg" alt=""></a>
                    </div>
                    <!-- single-banner end -->
                </div>
                <div class="col-lg-6 col-md-6">
                    <!-- single-banner start -->
                    <div class="single-banner-two mt--30">
                        <a href="shop.php"><img src="assets/images/banner/kichen8.jpg" alt=""></a>
                    </div>
                    <!-- single-banner end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Banner area end -->
    
    <!-- Product Area Start -->
    <div class="product-area section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- section-title start -->
                    <div class="section-title section-bg-2">
                        <h2>Bestseller Products</h2>
                        <p>Most Trendy 2018 Clother</p>
                    </div>
                    <!-- section-title end -->
                </div>
            </div>
            <!-- product-wrapper start -->
            <div class="product-wrapper">
                <div class="row product-slider">
                    <div class="col-12">
                        <!-- single-product-wrap start -->
                        <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="product-details.html"><img src="assets/images/product/kichen3.jpg" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-9%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Fusce nec facilisi</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$53.27</span>
                                    <span class="old-price">$58.49</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-wrap end -->
                    </div>
                    <div class="col-12">
                        <!-- single-product-wrap start -->
                        <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="product_details.php"><img src="assets/images/product/kichen1.jpg" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-7%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product_details.php">Sprite Yoga Straps1</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$57.27</span>
                                    <span class="old-price">$52.49</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-wrap end -->
                    </div>
                    <div class="col-12">
                        <!-- single-product-wrap start -->
                        <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="product_details.php"><img src="assets/images/product/kichen2.jpg" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-7%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product_details.php">Wrinted Summer Dress</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$51.27</span>
                                    <span class="old-price">$54.49</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-wrap end -->
                    </div>
                    <div class="col-12">
                        <!-- single-product-wrap start -->
                        <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="product-details.html"><img src="assets/images/product/kichen4.jpg" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-4%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Printed Dress</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$91.27</span>
                                    <span class="old-price">$84.49</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-wrap end -->
                    </div>
                    <div class="col-12">
                        <!-- single-product-wrap start -->
                        <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="product-details.html"><img src="assets/images/product/kichen5.jpg" alt=""></a>
                                <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-7%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Printed Summer Dress</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$51.27</span>
                                    <span class="old-price">$54.49</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-wrap end -->
                    </div>
                </div>
            </div>
            <!-- product-wrapper end -->
        </div>
    </div>
    <!-- Product Area End -->
    
    <!-- Our Brand Area Start -->
    <div class="our-brand-area">
        <div class="container">
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
    <!-- Our Brand Area End -->
    
    <!-- Latest Blog Posts Area start -->
    <!-- <div class="latest-blog-post-area section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- section-title start -->
                    <!--<div class="section-title section-bg-3">
                        <h2>Latest Blog Posts </h2>
                        <p>There are latest blog posts</p>
                    </div>
                    <!-- section-title end -->
               <!-- </div>
            </div>
            <div class="row latest-blog-slider">
                <div class="col-lg-4">
                    <!-- single-latest-blog start -->
                    <!--<div class="single-latest-blog mt--30">
                        <div class="latest-blog-image">
                            <a href="blog-details.html">
                                <img src="assets/images/blog/1.jpg" alt="">
                            </a>
                        </div>
                        <div class="latest-blog-content">
                            <h4><a href="blog-details.html">Work with customizer</a></h4>
                            <div class="post_meta">
                                <span class="meta_date"><span> <i class="fa fa-calendar"></i></span>Mar 05, 2018</span>
                                <span class="meta_author"><span></span>Demo Name</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the ...</p>
                        </div>
                    </div>
                    <!-- single-latest-blog end -->
                <!--</div>
                <div class="col-lg-4">
                   <!-- single-latest-blog start -->
                    <!--<div class="single-latest-blog mt--30">
                        <div class="latest-blog-image">
                            <a href="blog-details.html">
                                <img src="assets/images/blog/2.jpg" alt="">
                            </a>
                        </div>
                        <div class="latest-blog-content">
                            <h4><a href="blog-details.html">Go to New Horizonts</a></h4>
                            <div class="post_meta">
                                <span class="meta_date"><span> <i class="fa fa-calendar"></i></span>may 17, 2018</span>
                                <span class="meta_author"><span></span>Demo Name</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the ...</p>
                        </div>
                    </div>
                    <!-- single-latest-blog end -->
                <!--</div>
                <div class="col-lg-4">
                   <!-- single-latest-blog start -->
                    <!--<div class="single-latest-blog mt--30">
                        <div class="latest-blog-image">
                            <a href="blog-details.html">
                                <img src="assets/images/blog/3.jpg" alt="">
                            </a>
                        </div>
                        <div class="latest-blog-content">
                            <h4><a href="blog-details.html">What is Bootstrap?</a></h4>
                            <div class="post_meta">
                                <span class="meta_date"><span> <i class="fa fa-calendar"></i></span>june 11, 2018</span>
                                <span class="meta_author"><span></span>Demo Name</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the ...</p>
                        </div>
                    </div>
                    <!-- single-latest-blog end -->
                <!--</div>
                <div class="col-lg-4">
                    <!-- single-latest-blog start -->
                    <!--<div class="single-latest-blog mt--30">
                        <div class="latest-blog-image">
                            <a href="blog-details.html">
                                <img src="assets/images/blog/4.jpg" alt="">
                            </a>
                        </div>
                        <div class="latest-blog-content">
                            <h4><a href="blog-details.html">Try comfort work </a></h4>
                            <div class="post_meta">
                                <span class="meta_date"><span> <i class="fa fa-calendar"></i></span>Mar 13, 2018</span>
                                <span class="meta_author"><span></span>Demo Name</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the ...</p>
                        </div>
                    </div>
                    <!-- single-latest-blog end -->
               <!-- </div>
            </div>
        </div>
    </div> -->
    <!-- Latest Blog Posts Area End -->
    
    <!-- Client Testimonials Area Start -->
    <div class="client-testimonials-area testimonials-bg section-ptb">
        <div class="container">
           <div class="row">
                <div class="col-lg-12">
                    <!-- section-title start -->
                    <div class="section-title section-bg-2">
                        <h2>Client Testimonials</h2>
                        <p>What they say</p>
                    </div>
                    <!-- section-title end -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 ml-auto mr-auto">
                    <div class="testimonial-slider">
                        <!-- testimonial-content start -->
                        <div class="testimonial-content text-center">
                            <p class="des_testimonial">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram.</p>
                            <div class="content_author">
                                <div class="author-image">
                                    <img src="assets/images/comment/com-author.png" alt="">
                                </div>
                            </div>
                            <p class="des_namepost">orando BLoom</p>
                        </div>
                        <!-- testimonial-content end -->
                        <!-- testimonial-content start -->
                        <div class="testimonial-content text-center">
                            <p class="des_testimonial">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram.</p>
                            <div class="content_author">
                                <div class="author-image">
                                    <img src="assets/images/comment/com-author.png" alt="">
                                </div>
                            </div>
                            <p class="des_namepost">orando BLoom</p>
                        </div>
                        <!-- testimonial-content end -->
                        <!-- testimonial-content start -->
                        <div class="testimonial-content text-center">
                            <p class="des_testimonial">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram.</p>
                            <div class="content_author">
                                <div class="author-image">
                                    <img src="assets/images/comment/com-author.png" alt="">
                                </div>
                            </div>
                            <p class="des_namepost">orando BLoom</p>
                        </div>
                        <!-- testimonial-content start -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Client Testimonials Area End -->
    
    <!-- Categories List Post area start-->
    <div class="poslistcategories-area section-ptb">
        <div class="container-fluid plr-30">
            <div class="row product-categproes-active">
                <div class="col-lg-3">
                    <!-- categories-list-post-item start -->
                    <div class="categories-list-post-item">
                       <img src="assets/images/category/1.jpg" alt="">
                       <a href="#" class="category-inner">Earrings</a>
                    </div>
                    <!-- categories-list-post-item end -->
                </div>
                <div class="col-lg-3">
                    <!-- categories-list-post-item start -->
                    <div class="categories-list-post-item">
                       <img src="assets/images/category/2.jpg" alt="">
                       <a href="#" class="category-inner">Necklaces</a>
                    </div>
                    <!-- categories-list-post-item end -->
                </div>
                <div class="col-lg-3">
                    <!-- categories-list-post-item start -->
                    <div class="categories-list-post-item">
                       <img src="assets/images/category/3.jpg" alt="">
                       <a href="#" class="category-inner">Bracelets</a>
                    </div>
                    <!-- categories-list-post-item end -->
                </div>
                <div class="col-lg-3">
                    <!-- categories-list-post-item start -->
                    <div class="categories-list-post-item">
                       <img src="assets/images/category/4.jpg" alt="">
                       <a href="#" class="category-inner">Portfolio</a>
                    </div>
                    <!-- categories-list-post-item end -->
                </div>
                <div class="col-lg-3">
                    <!-- categories-list-post-item start -->
                    <div class="categories-list-post-item">
                       <img src="assets/images/category/1.jpg" alt="">
                       <a href="#" class="category-inner">Popovers</a>
                    </div>
                    <!-- categories-list-post-item end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Categories List Post area -->
    
    <!-- Our Services Area Start -->
    <div class="our-services-area section-pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!-- single-service-item start -->
                    <div class="single-service-item">
                        <div class="our-service-icon">
                            <i class="fa fa-truck"></i>
                        </div>
                        <div class="our-service-info">
                            <h3>Free Shipping</h3>
                            <p>Free shipping on all US order or order above $200</p>
                        </div>
                    </div>
                    <!-- single-service-item end -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- single-service-item start -->
                    <div class="single-service-item">
                        <div class="our-service-icon">
                            <i class="fa fa-support"></i>
                        </div>
                        <div class="our-service-info">
                            <h3>Support 24/7</h3>
                            <p>Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                    <!-- single-service-item end -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- single-service-item start -->
                    <div class="single-service-item">
                        <div class="our-service-icon">
                            <i class="fa fa-undo"></i>
                        </div>
                        <div class="our-service-info">
                            <h3>30 Days Return</h3>
                            <p>Simply return it within 30 days for an exchange</p>
                        </div>
                    </div>
                    <!-- single-service-item end -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- single-service-item start -->
                    <div class="single-service-item">
                        <div class="our-service-icon">
                            <i class="fa fa-credit-card"></i>
                        </div>
                        <div class="our-service-info">
                            <h3>100% Payment Secure</h3>
                            <p>We ensure secure payment with PEV</p>
                        </div>
                    </div>
                    <!-- single-service-item end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services Area End -->
    
    <?php include 'footer.php';?>
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
</html>