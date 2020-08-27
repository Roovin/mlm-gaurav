<?php 
session_start();
include 'conn.php';
$total = $_SESSION['total'];  
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My Account || Boyka - Fashion eCommerce Bootstrap 4 HTML5 Template</title>
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
    
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">My Account</li>
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
                <div class="col-12">
                    <div class="account-dashboard">
                        <div class="dashboard-upper-info">
                           <div class="row align-items-center no-gutters">
                               <div class="col-lg-3 col-md-12">
                                   <div class="d-single-info">
                                       <?php 
                                       $sql=mysqli_query($conn, "SELECT * FROM users WHERE id='".$_SESSION['id']."'");                                       
                                       while($row=mysqli_fetch_array($sql)){
                                       ?>
                                       <p class="user-name">Hello <span><?php echo $row['username']?></span></p>
                                       <?php }?>
                                       <p>(not yourmail@info? <a href="logout.php">Log Out</a>)</p>
                                   </div>
                               </div>
                               <div class="col-lg-4 col-md-12">
                                   <div class="d-single-info">
                                       <p>Need Assistance? Customer service at.</p>
                                       <p>admin@devitems.com.</p>
                                   </div>
                               </div>
                               <div class="col-lg-3 col-md-12">
                                   <div class="d-single-info">
                                       <p>E-mail them at </p>
                                       <p>support@yoursite.com</p>
                                   </div>
                               </div>
                               <div class="col-lg-2 col-md-12">
                                   <!-- <div class="d-single-info text-lg-center">
                                       <a href="cart.html" class="view-cart"><i class="fa fa-cart-plus"></i>view cart</a>
                                   </div> -->
                               </div>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-2">
                                <!-- Nav tabs -->
                                <ul role="tablist" class="nav flex-column dashboard-list">
                                    <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a></li>
                                    <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                                    <!-- <li><a href="#downloads" data-toggle="tab" class="nav-link">Downloads</a></li> -->
                                    <li><a href="#address" data-toggle="tab" class="nav-link">Addresses</a></li>
                                    <!-- <li><a href="#account-details" data-toggle="tab" class="nav-link">Account details</a></li> -->
                                    <!-- <li><a href="#account-details" data-toggle="tab" class="nav-link">Account details</a></li> -->
                                    <li><a href="logout.php" class="nav-link">logout</a></li>
                                </ul>
                            </div>
                            <div class="col-md-12 col-lg-10">
                                <!-- Tab panes -->
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane active" id="dashboard">
                                        <h3>Dashboard </h3>
                                        <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                    </div>
                                    <div class="tab-pane fade" id="orders">
                                        <h3>Orders</h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Quantity</th>	                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $sql2 = "SELECT products.name as pname, orders.paymentMethod as omethod, orders.quantity as qty, purchase.net_purchase_price as totalPrice FROM products JOIN orders ON orders.productId = products.id JOIN purchase ON purchase.product_id=orders.productId WHERE orders.userId='".$_SESSION['id']."'";
                                                        $cnt=1;
                                                        $query2=mysqli_query($conn,$sql2);
                                                        while($row=mysqli_fetch_array($query2)){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $cnt?></td>
                                                        <td><?php echo $row['pname']; ?></td>
                                                        <td><?php echo $row['omethod']; ?></td>
                                                        <td><?php echo $total; ?> </td>
                                                        <td><?php echo $row['qty']; ?></td>
                                                        <?php $cnt=$cnt+1; }?>
                                                    </tr>                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- <div class="tab-pane fade" id="downloads">
                                        <h3>Downloads</h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Downloads</th>
                                                        <th>Expires</th>
                                                        <th>Download</th>	 	 	 	
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Haven - Free Real Estate PSD Template</td>
                                                        <td>May 10, 2018</td>
                                                        <td>never</td>
                                                        <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nevara - ecommerce html template</td>
                                                        <td>Sep 11, 2018</td>
                                                        <td>never</td>
                                                        <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> -->
                                    <div class="tab-pane" id="address">
                                       <p>The following addresses will be used on the checkout page by default.</p>
                                        <h4 class="billing-address">Billing address</h4>
                                        <!-- <a href="#" class="view">edit</a> -->
                                        <?php 
                                            $bill = "SELECT * FROM users WHERE id='".$_SESSION['id']."'";
                                            $add = mysqli_query($conn, $bill);
                                            while($ress=mysqli_fetch_array($add)){
                                        ?>
                                        <p class="biller-name">Name: <?php echo $ress['username']?> <br> Email: <?php echo $ress['email']?><br> Phone No: <?php echo $ress['contact']?> <br> Address: <?php echo $ress['address']?><br>City: <?php echo $ress['city']?> <br> State: <?php echo $ress['state']?><br> Pincode: <?php echo $ress['pincode']?> </p> 
                                            <?php }?>                                         
                                    </div>
                                    <!-- <div class="tab-pane fade" id="account-details">
                                        <h3>Account details </h3>
                                        <div class="login">
                                            <div class="login-form-container">
                                                <div class="account-login-form">
                                                    <form action="#">
                                                        <p>Already have an account? <a href="#">Log in instead!</a></p>
                                                        <label>Social title</label>
                                                        <div class="input-radio">
                                                            <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mr.</span>
                                                            <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mrs.</span>
                                                        </div>
                                                        <div class="account-input-box">
                                                            <label>First Name</label>
                                                            <input type="text" name="first-name">
                                                            <label>Last Name</label>
                                                            <input type="text" name="last-name">
                                                            <label>Email</label>
                                                            <input type="text" name="email-name">
                                                            <label>Password</label>
                                                            <input type="password" name="user-password">
                                                            <label>Birthdate</label>
                                                            <input type="text" placeholder="MM/DD/YYYY" value="" name="birthday">
                                                        </div>
                                                        <div class="example">
                                                          (E.g.: 05/31/1970)
                                                        </div>
                                                        <div class="custom-checkbox">
                                                            <input type="checkbox" value="1" name="optin">
                                                            <label>Receive offers from our partners</label>
                                                        </div>
                                                        <div class="custom-checkbox">
                                                            <input type="checkbox" value="1" name="newsletter">
                                                            <label>Sign up for our newsletter<br><em>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</em></label>
                                                        </div>
                                                        <div class="button-box">
                                                            <button class="btn default-btn" type="submit">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
    
    
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


<!-- Mirrored from demo.hasthemes.com/boyka-preview/boyka/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Jul 2020 09:03:30 GMT -->
</html>