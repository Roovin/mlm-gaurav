<?php 
session_start();
error_reporting(0);

if(empty($_SESSION['admin'])){
    header("location : index.php");
}else{
    include ('conn.php');
    // 

if (isset($_POST['insertProduct'])) {

   
    $sku = $_POST['sku'];
    $category = $_POST['category'];
    $subCategory = $_POST['product_sub_category'];
    $productName = $_POST['productName'];
    $unit = $_POST['unit'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $sale = $_POST['sale'];
    $discount = $_POST['discount_price'];

    $productDescription = $_POST['productDescription'];    
    $productimage1 = $_FILES['productImage1']['name'];
    
    // $productimage1 = 'http://'.$productimage1;

    //for getting product id
    $query=mysqli_query($conn,"select max(id) as pid FROM products");
    $result=mysqli_fetch_array($query);
    $productid=$result['pid']+1;
    $dir="productimages/$productid";
    
        if(!is_dir($dir)){
            mkdir("productimages/".$productid);
        }
        
        move_uploaded_file($_FILES["productImage1"]["tmp_name"],"productimages/$productid/".$_FILES["productImage1"]["name"]);        
        
        $sql = "INSERT INTO products(sku, category, subcat, name, unit, quantity, price, sale_price, discount_price, descr, image) VALUES('$sku', '$category', '$subCategory', '$productName', '$unit', '$quantity', '$price', '$sale', '$discount','$productDescription', '$productimage1')";
        // print_r($sql);
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert'Product Inserted !!'</script>";
            // $success = true;
        }else{
            echo "<script>alert'Product Not Inserted !!'</script>";
        }
        
}
?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Insert Product | Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php include 'top-header.php';?>
            
            <!-- ========== Left Sidebar Start ========== -->
            <?php include 'sidebar.php';?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="page-title-box">
                                    <h4 class="font-size-18">Insert Products</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">MLM</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product &amp Packages</a></li>
                                        <li class="breadcrumb-item active">Insert Products</li>
                                    </ol>
                                </div>
                            </div>

                            <!-- <div class="col-sm-6">
                                <div class="float-right d-none d-md-block">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-settings mr-2"></i> Settings
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>     
                        <!-- end page title -->
                    <form method="post" name="insertProduct" enctype="multipart/form-data" action="">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <!-- <h4 class="card-title">Textual inputs</h4>
                                        <p class="card-title-desc">Here are examples of <code
                                                class="highlighter-rouge">.form-control</code> applied to each
                                            textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code
                                                    class="highlighter-rouge">type</code>.</p> -->
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">SKU</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text"  name="sku" placeholder="SKU">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Product Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text"  name="productName" placeholder="Product Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Category</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="category">
                                                    <option value="">Select Category</option>
                                                    <?php $query=mysqli_query($conn,"select * from product_category");
                                                        while($row=mysqli_fetch_array($query))
                                                        {?>

                                                        <option value="<?php echo $row['category'];?>"><?php echo $row['category'];?></option>
                                                        <?php } ?>                                                  
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Sub Category</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="product_sub_category">
                                                    <option value="">Select Category</option>
                                                    <?php $query=mysqli_query($conn,"select * from product_sub_category");
                                                        while($row=mysqli_fetch_array($query))
                                                        {?>

                                                        <option value="<?php echo $row['sub_category'];?>"><?php echo $row['sub_category'];?></option>
                                                        <?php } ?>                                                  
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Unit</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="unit">
                                                    <option value="">Select Unit</option>
                                                    <option value="kg">KG</option>
                                                    <option value="g">G</option>
                                                    <option value="Pcs">Pcs</option>
                                                    <option value="Ltr">Ltr</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-sm-2 col-form-label">Quantity</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="number"  name="quantity" placeholder="Quantity">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-url-input" class="col-sm-2 col-form-label">Price</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="price" name="price" placeholder="Price">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-url-input" class="col-sm-2 col-form-label">sale Price</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="sale_price" name="sale" placeholder="Sale Price">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-url-input" class="col-sm-2 col-form-label">Discount Price</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="discount_price" name="discount_price" placeholder="Discount Price">
                                            </div>
                                        </div>                                        
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label">Product Description</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" type="text"  name="productDescription" placeholder="Product Description"></textarea>
                                            </div>
                                        </div>                                        
                                        <div class="form-group row">
                                            <label for="example-date-input" class="col-sm-2 col-form-label">Product Images 1</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" name="productImage1" value="">
                                            </div>
                                        </div>                                                                                
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <button type="submit" style="background-color:#17a085; margin-left:560px;" class="btn btn-primary btn-lg waves-effect waves-light" name="insertProduct">Insert Product</button>
                        </div> <!-- end row -->
                    </form>
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                <!-- <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                © <script>document.write(new Date().getFullYear())</script> Veltrix<span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
                            </div>
                        </div>
                    </div>
                </footer> -->

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

       

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
    <?php }?>