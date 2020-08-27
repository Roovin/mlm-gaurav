<?php 
session_start();
error_reporting(0);
include 'conn.php';
include("member_mail.php");

if(isset($_POST['add_member'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sponserId = $_POST['sponserId'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $cPassword = $_POST['cpassword'];
    $non_aproved = "No Approved";
    $is_member_active = 0;
    $date = date("y-m-d");
    // echo date(" jS \of F Y h:i:s A") . "<br>";

    // echo $date;EXIT;
    if($password == $cPassword){

        $sql = "SELECT MAX(id) as max_id FROM customers";
        $res = mysqli_query($conn,$sql);
        $row2 = mysqli_fetch_array($res);
        $max_id = $row2['max_id'];

        $next_id = $max_id + 1;
        if($next_id >= 1 && $next_id < 10){
            $digit = 'SIM0000000'.$next_id; 
        }
        elseif($next_id >= 10 && $next_id < 100){
            $digit = 'SIM000000'.$next_id;
        }
        elseif($next_id >= 100 && $next_id < 1000){
            $digit = 'SIM00000'.$next_id;
        }
        elseif($next_id >= 1000 && $next_id < 10000){
            $digit ='SIM0000'.$next_id;
        }
        elseif($next_id >= 10000 && $next_id < 100000){
            $digit ='SIM000'.$next_id;
        }
        elseif($next_id >= 100000 && $next_id < 1000000){
            $digit ='SIM00'.$next_id;
        }
        elseif($next_id >= 1000000 && $next_id < 10000000){
            $digit ='SIM0'.$next_id;
        }
        elseif($next_id >= 10000000 && $next_id < 100000000){
            $digit ='SIM'.$next_id;
        }
        
        $sql = "INSERT into customers(customer_id, name, email, sponser_id, mobile, status, password, is_member_active, created_date) VALUES('$digit', '$name','$email','$sponserId','$contact', '$non_aproved', '$password', '$is_member_active', '$date')";
        $res = mysqli_query($conn, $sql);
        // if($res){
        //     $sql1 = mysqli_query($conn, "SELECT sponser_id, account_balance, level_income FROM customers WHERE customer_id='$sponserId'");
        //     $result=mysqli_fetch_array($sql1);
        //     $member=$result['sponser_id'];
        //     $new_account_balance=$result['account_balance']+100;            
        //     $sql=mysqli_query($conn, "UPDATE customers SET account_balance='$new_account_balance' WHERE customer_id='$sponserId'");

        //     if($member){
        //         $sql1 = mysqli_query($conn, "SELECT sponser_id, level_income FROM customers WHERE customer_id='$member'");
        //         $result=mysqli_fetch_array($sql1);
        //         $sponser_id1=$result['sponser_id'];
        //         $new_account_balance=$result['level_income']+50;
        //         $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member'");

        //         if($sponser_id1){                    
        //             $sql=mysqli_query($conn,"SELECT sponser_id, level_income FROM customers WHERE customer_id='$sponser_id1'");
        //             $result=mysqli_fetch_array($sql);
        //             $member=$result['sponser_id'];                    
        //             $new_account_balance=$result['level_income']+25;
        //             $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$sponser_id1'");
                   
        //             if($member){
                       
        //                 $sql=mysqli_query($conn,"SELECT sponser_id, level_income FROM customers WHERE customer_id='$member'");
        //                 $result=mysqli_fetch_array($sql);
        //                 $member1=$result['sponser_id'];
        //                 echo $result['level_income'];
        //                 $new_account_balance=$result['level_income']+20;
        //                 // echo $x;exit;
        //                 $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member'");
                        
        //                 if($member1){
        //                     // echo $sponser_id1;
        //                     $sql=mysqli_query($conn,"SELECT sponser_id, level_income FROM customers WHERE customer_id='$member1'");
        //                     $result=mysqli_fetch_array($sql);
        //                     $member2=$result['sponser_id'];
        //                     // echo $result['level_income'];
        //                     $new_account_balance=$result['level_income']+12;
        //                     $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member1'");
                        
        //                     if($member2){
        //                         // echo $sponser_id1;
        //                         $sql=mysqli_query($conn,"SELECT sponser_id, level_income FROM customers WHERE customer_id='$member2'");
        //                         $result=mysqli_fetch_array($sql);
        //                         $member3=$result['sponser_id'];
        //                         // echo $result['level_income'];
        //                         $new_account_balance=$result['level_income']+8;
        //                         $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member2'");
                                
        //                         if($member3){
        //                             // echo $sponser_id1;
        //                             $sql=mysqli_query($conn,"SELECT sponser_id, level_income FROM customers WHERE customer_id='$member3'");
        //                             $result=mysqli_fetch_array($sql);
        //                             $member4=$result['sponser_id'];
        //                             // echo $result['level_income'];
        //                             $new_account_balance=$result['level_income']+5;
        //                             $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member3'");
                                
        //                             if($member4){
        //                                 // echo $sponser_id1;
        //                                 $sql=mysqli_query($conn,"SELECT sponser_id, level_income FROM customers WHERE customer_id='$member4'");
        //                                 $result=mysqli_fetch_array($sql);
        //                                 $member5=$result['sponser_id'];
        //                                 // echo $result['level_income'];
        //                                 $new_account_balance=$result['level_income']+4;
        //                                 $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member4'");
                                    
        //                                 if($member5){
        //                                     // echo $sponser_id1;
        //                                     $sql=mysqli_query($conn,"SELECT sponser_id, level_income FROM customers WHERE customer_id='$member5'");
        //                                     $result=mysqli_fetch_array($sql);
        //                                     $member6=$result['sponser_id'];
        //                                     $new_account_balance=$result['level_income']+3;
        //                                     $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member5'");
                                        
        //                                     if($member6){
        //                                         // echo $sponser_id1;
        //                                         $sql=mysqli_query($conn,"SELECT sponser_id, level_income FROM customers WHERE customer_id='$member6'");
        //                                         $result=mysqli_fetch_array($sql);
        //                                         $member7=$result['sponser_id'];
        //                                         // echo $result['level_income'];
        //                                         $new_account_balance=$result['level_income']+2;
        //                                         $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member6'");
                                            
        //                                         if($member7){
        //                                             // echo $sponser_id1;
        //                                             $sql=mysqli_query($conn,"SELECT sponser_id, level_income FROM customers WHERE customer_id='$member7'");
        //                                             $result=mysqli_fetch_array($sql);
        //                                             $member8=$result['sponser_id'];
        //                                             // echo $result['level_income'];
        //                                             $new_account_balance=$result['level_income']+1;
        //                                             $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member7'");
        //                                         }
        //                                     }
        //                                 }
        //                             }
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     }

            $mail_status = sentOTP($email, $name, $contact, $password, $digit);
           
            if($mail_status){
                echo "<script>alert('Email: $email, Customer Id: $digit, Password: $password');
                window.location.href='admin/customers/index.php';
                </script>";
            }
        }
    }else{
        echo "<script>alert('Your Password And Confirm Password Did Not Match');</script>";
    }
    
// }
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add Member</title>
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
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Member</li>
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
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <!-- login-register-tab-list start -->
                        <div class="login-register-tab-list nav">
                            <a class="active" data-toggle="tab">
                                <h4> Add As Member </h4>
                            </a>                            
                        </div>
                        <!-- login-register-tab-list end -->
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form method="post">
                                            <div class="login-input-box">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="text" name="sponserId" id="sponser_id" placeholder="Sponser ID" onkeyup="myfunction()" style="width: 210px;">
                                                    </div>
                                                <div class="col-lg-6">
                                                    <div id="sponser" style="color:red; font-size:18px"></div>
                                                </div>
                                            </div>
                                                <input type="text" name="name" placeholder="Name">
                                                <input type="email" name="email" onkeyup="mail()" id="mail_id" placeholder="Email">
                                                <div id="email_id" style="color:red;"></div>
                                                <input type="number" name="contact" pattern="[0-9]{5}[-][0-9]{7}[-][0-9]{1}" placeholder="Mobile No.">
                                                <input type="password" name="password" placeholder="Password">
                                                <input type="password" name="cpassword" placeholder="Confirm Password">
                                            </div>
                                            <div class="button-box">
                                                <!-- <div class="login-toggle-btn">
                                                    <input type="checkbox">
                                                    <label>Remember me</label>
                                                    <a href="#">Forgot Password?</a>
                                                </div> -->
                                                <div class="button-box">
                                                    <button class="login-btn btn" name="add_member" id="add_member"><span>Add As Member</span></button>
                                                </div>
                                            </div>
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
<script>
   function myfunction(){
        var sponser_name=document.getElementById("sponser_id").value;
       $.ajax({
           url:"admin/customers/ajax/sponser_name.php",
           data:{sponser_name},
           type:"post",
           success:function(data){
            $("#sponser").html(data)
           }
       });
   }

function mail(){
       var mail=document.getElementById("mail_id").value;
    //    console.log(mail);
       $.ajax({
           url:"admin/customers/ajax/mail.php",
           data:{mail},
           type:"post",
           success:function(data){
               $("#email_id").html(data);
               console.log(data);
           }
       })
   }
</script>

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