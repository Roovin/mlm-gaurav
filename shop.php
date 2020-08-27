<?php 
session_start();
include 'conn.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shop </title>
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
                            <a href="index.html"><img src="assets/images/logo/logo.png" style="width: 75px; margin-top: -16px;" alt=""></a>
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
                                    <li class="active"><a href="shop.php">Shop </a>                                        
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
                        <li class="breadcrumb-item active">Shop</li>
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
                <div class="col-lg-3 order-2 order-lg-1">
                    <!--sidebar-categores-box start  -->
                    <div class="sidebar-categores-box">
                        <div class="sidebar-title">
                            <h2>For men</h2>
                        </div>
                        <!-- category-sub-menu start -->
                        <div class="category-sub-menu">
                            <ul>
                                <li class="has-sub"><a href="# ">Jackets</a>
                                    <ul>
                                        <li><a href="#">Florals</a></li>
                                        <li><a href="#">Shirts</a></li>
                                        <li><a href="#">Shorts</a></li>
                                        <li><a href="#">Stripes</a></li>
                                    </ul>
                                </li>
                                <li class="has-sub"><a href="#">Jeans</a>
                                    <ul>
                                        <li><a href="#">Hoodies</a></li>
                                        <li><a href="#">Sweaters</a></li>
                                        <li><a href="#">Vests</a></li>
                                        <li><a href="#">Wedges</a></li>
                                    </ul>
                                </li>
                                <li class="has-sub"><a href="#">Men</a>
                                    <ul>
                                        <li><a href="#">Crochet</a></li>
                                        <li><a href="#">Dresses</a></li>
                                        <li><a href="#"> Jeans</a></li>
                                        <li><a href="#">Trousers</a></li>
                                    </ul>
                                </li>
                                <li class="has-sub"><a href="#">Women</a>
                                    <ul>
                                        <li><a href="#">Casual</a></li>
                                        <li><a href="#">Chinos</a></li>
                                        <li><a href="#">Joggers</a></li>
                                        <li><a href="#">Tailored</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- category-sub-menu end -->
                    </div>
                    <!--sidebar-categores-box end  -->
                    <!--sidebar-categores-box start  -->
                    <div class="sidebar-categores-box">
                        <div class="sidebar-title">
                            <h2>Filter By</h2>
                        </div>
                        <!-- btn-clear-all start -->
                        <button class="btn-clear-all">Clear all</button>
                        <!-- btn-clear-all end -->
                        <!-- filter-sub-area start -->
                        <div class="filter-sub-area">
                            <h5 class="filter-sub-titel">Price</h5>
                            <div class="price-checkbox">
                                <form action="#">
                                    <ul> 
                                        <li><input type="radio" name="price-filter" checked="checked"><a href="#">$10.00 - $11.00 (1)</a></li>
                                        <li><input type="radio" name="price-filter"><a href="#">$14.00 - $15.00 (2)</a></li>
                                        <li><input type="radio" name="price-filter"><a href="#">$16.00 - $17.00 (2)</a></li>
                                        <li><input type="radio" name="price-filter"><a href="#">$18.00 - $19.00 (1)</a></li>
                                        <li><input type="radio" name="price-filter"><a href="#"> $24.00 - $28.00 (5)</a></li>
                                        <li><input type="radio" name="price-filter"><a href="#"> $30.00 - $32.00 (1)</a></li>
                                        <li><input type="radio" name="price-filter"><a href="#"> $50.00 - $53.00 (2) </a></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <!-- filter-sub-area end -->
                        <!-- filter-sub-area start -->
                        <!-- <div class="filter-sub-area">
                            <h5 class="filter-sub-titel">Size</h5>
                            <div class="size-checkbox">
                                <form action="#">
                                    <ul>
                                        <li><input type="checkbox" checked="checked" name="product-size"><a href="#">S (1)</a></li>
                                        <li><input type="checkbox" name="product-size"><a href="#">M (4)</a></li>
                                        <li><input type="checkbox" name="product-size"><a href="#">L (2)</a></li>
                                    </ul>
                                </form>
                            </div>
                        </div> -->
                        <!-- filter-sub-area end -->
                        <!-- filter-sub-area start -->
                        <!-- <div class="filter-sub-area">
                            <h5 class="filter-sub-titel">Color</h5>
                            <div class="color-categoriy">
                                <form action="#">
                                    <ul>
                                        <li><span class="white"></span><a href="#">White (1)</a></li>
                                        <li><span class="black"></span><a href="#">Black (1)</a></li>
                                        <li><span class="Orange"></span><a href="#">Orange (3) </a></li>
                                        <li><span class="Blue"></span><a href="#">Blue  (2) </a></li>
                                    </ul>
                                </form>
                            </div>
                        </div> -->
                        <!-- filter-sub-area end -->
                        <!-- filter-sub-area start -->
                        <!-- <div class="filter-sub-area">
                            <h5 class="filter-sub-titel">Compositions</h5>
                            <div class="categori-checkbox">
                                <form action="#">
                                    <ul>
                                        <li><input type="checkbox" checked="checked" name="product-categori"><a href="#">Cotton (5)</a></li>
                                        <li><input type="checkbox" name="product-categori"><a href="#">Polyester (4)</a></li>
                                        <li><input type="checkbox" name="product-categori"><a href="#">Viscose (4)</a></li>
                                    </ul>
                                </form>
                            </div>
                         </div> -->
                        <!-- filter-sub-area end -->
                    </div>
                    <!--sidebar-categores-box end  -->

                    <!-- shop-banner start -->
                    <div class="shop-banner">
                        <div class="single-banner">
                            <a href="#"><img src="assets/images/banner/advertising-s1.jpg" alt=""></a>
                        </div>
                    </div>
                    <!-- shop-banner end -->
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <!-- shop-top-bar start -->
                    <div class="shop-top-bar mt-95">
                        <div class="shop-bar-inner">
                            <div class="product-view-mode">
                                <!-- shop-item-filter-list start -->
                                <ul class="nav shop-item-filter-list" role="tablist">
                                    <li class="active"><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                    <li><a data-toggle="tab"  href="#list-view"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                                <!-- shop-item-filter-list end -->
                            </div>
                            <div class="toolbar-amount">
                                <span>Showing 1 to 9 of 15</span>
                            </div>
                        </div>
                        <!-- product-select-box start -->
                        <!-- <div class="product-select-box">
                            <div class="product-short">
                                <p>Sort By:</p>
                                <select class="nice-select">
                                    <option value="trending">Relevance</option>
                                    <option value="sales">Name (A - Z)</option>
                                    <option value="sales">Name (Z - A)</option>
                                    <option value="rating">Price (Low &gt; High)</option>
                                    <option value="date">Rating (Lowest)</option>
                                    <option value="price-asc">Model (A - Z)</option>
                                    <option value="price-asc">Model (Z - A)</option>
                                </select>
                            </div>
                        </div> -->
                        <!-- product-select-box end -->
                    </div>
                    <!-- shop-top-bar end -->
                    
                    <!-- shop-products-wrapper start -->
                    <div class="shop-products-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane active">
                                <div class="shop-product-area">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="product-details.html"><img src="assets/images/product/3.jpg" alt=""></a>
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
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="product-details.html"><img src="assets/images/product/5.jpg" alt=""></a>
                                                    <span class="label-product label-new">new</span>
                                                    <div class="quick_view">
                                                        <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-details.html">Monki Teddy Bear </a></h3>
                                                    <div class="price-box">
                                                        <span class="new-price">$71.27</span>
                                                        <span class="old-price">$64.49</span>
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
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
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
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
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
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
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
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
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
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
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
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
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
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
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
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="product-details.html"><img src="assets/images/product/10.jpg" alt=""></a>
                                                    <span class="label-product label-new">new</span>
                                                    <span class="label-product label-sale">-4%</span>
                                                    <div class="quick_view">
                                                        <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-details.html">Printed Summer</a></h3>
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
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="product-details.html"><img src="assets/images/product/3.jpg" alt=""></a>
                                                    <span class="label-product label-new">new</span>
                                                    <span class="label-product label-sale">-7%</span>
                                                    <div class="quick_view">
                                                        <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-details.html">Hot Printed Summer</a></h3>
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
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="product-details.html"><img src="assets/images/product/4.jpg" alt=""></a>
                                                    <span class="label-product label-new">new</span>
                                                    <span class="label-product label-sale">-7%</span>
                                                    <div class="quick_view">
                                                        <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-details.html">New Printed Summer</a></h3>
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
                            <div id="list-view" class="tab-pane">
                                <div class="row">
                                    <div class="col">
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="product-details.html"><img src="assets/images/product/5.jpg" alt=""></a>
                                                        <span class="label-product label-new">new</span>
                                                        <span class="label-product label-sale">-7%</span>
                                                        <div class="quick_view">
                                                            <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="product_desc">
                                                    <!-- single-product-wrap start -->
                                                    <div class="product-content-list">
                                                        <h3><a href="product-details.html">New Printed Summer</a></h3>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">$55.27</span>
                                                            <span class="old-price">$58.49</span>
                                                        </div>
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="product-details.html"><img src="assets/images/product/4.jpg" alt=""></a>
                                                        <span class="label-product label-new">new</span>
                                                        <span class="label-product label-sale">-7%</span>
                                                        <div class="quick_view">
                                                            <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="product_desc">
                                                    <!-- single-product-wrap start -->
                                                    <div class="product-content-list">
                                                        <h3><a href="product-details.html">Summer Printed </a></h3>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">$51.27</span>
                                                            <span class="old-price">$54.49</span>
                                                        </div>
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="product-details.html"><img src="assets/images/product/8.jpg" alt=""></a>
                                                        <span class="label-product label-new">new</span>
                                                        <span class="label-product label-sale">-7%</span>
                                                        <div class="quick_view">
                                                            <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="product_desc">
                                                    <!-- single-product-wrap start -->
                                                    <div class="product-content-list">
                                                        <h3><a href="product-details.html">New product Summer</a></h3>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">$41.27</span>
                                                            <span class="old-price">$54.49</span>
                                                        </div>
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="product-details.html"><img src="assets/images/product/6.jpg" alt=""></a>
                                                        <span class="label-product label-new">new</span>
                                                        <span class="label-product label-sale">-7%</span>
                                                        <div class="quick_view">
                                                            <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="product_desc">
                                                    <!-- single-product-wrap start -->
                                                    <div class="product-content-list">
                                                        <h3><a href="product-details.html">Printed Summer</a></h3>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">$41.27</span>
                                                            <span class="old-price">$54.49</span>
                                                        </div>
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="product-details.html"><img src="assets/images/product/2.jpg" alt=""></a>
                                                        <span class="label-product label-new">new</span>
                                                        <span class="label-product label-sale">-7%</span>
                                                        <div class="quick_view">
                                                            <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="product_desc">
                                                    <!-- single-product-wrap start -->
                                                    <div class="product-content-list">
                                                        <h3><a href="product-details.html">Printed Summer</a></h3>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">$31.27</span>
                                                            <span class="old-price">$44.49</span>
                                                        </div>
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area start -->
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <p>Showing 1-12 of 13 item(s)</p>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul class="pagination-box">
                                            <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                                            </li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li>
                                              <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area end -->
                        </div>
                    </div>
                    <!-- shop-products-wrapper end -->
                </div>
            </div>
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
</html>