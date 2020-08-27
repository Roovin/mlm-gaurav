<?php 
session_start();
error_reporting(0);
if(empty($_SESSION['admin'])){
    header("location : index.php");
}else{
    include ('conn.php');

$pid=intval($_GET['id']);
if (isset($_POST['updateProduct'])) {
    
    $productName = $_POST['productName'];
    $productCompany = $_POST['productCompany'];
    $beforeDiscount = $_POST['beforeDiscount'];
    $afterDiscount = $_POST['afterDiscount'];
    $metaDescription = $_POST['metaDescription'];
    $productDescription = $_POST['productDescription'];
    $quantity = $_POST['minimumQuantity'];
    $productAvailability = $_POST['productAvailability'];
    $productimage1 = $_FILES['productImage1']['name'];
    $productimage2 = $_FILES['productImage2']["name"];
    $productimage3 = $_FILES["productImage3"]["name"];

    //for getting product id
    $query=mysqli_query($conn,"select max(id) as pid FROM products");
    $result=mysqli_fetch_array($query);
    $productid=$result['pid']+1;
    $dir="productimages/$productid";
        if(!is_dir($dir)){
            mkdir("productimages/".$productid);
        }
        
        move_uploaded_file($_FILES["productImage1"]["tmp_name"],"productimages/$productid/".$_FILES["productImage1"]["name"]);
        move_uploaded_file($_FILES["productImage2"]["tmp_name"],"productimages/$productid/".$_FILES["productImage2"]["name"]);
        move_uploaded_file($_FILES["productImage3"]["tmp_name"],"productimages/$productid/".$_FILES["productImage3"]["name"]);
        
        $sql = "update products SET productName='$productName', productCompany='$productCompany', beforeDiscount='$beforeDiscount',afterDiscount='$afterDiscount', metaDescription='$metaDescription', productDescription='$productDescription', quantity='$quantity', productAvailability='$productAvailability', productimage1='$productimage1', productimage2='$productimage2',productimage3='$productimage3' WHERE id ='$pid'";
        $result = mysqli_query($conn, $sql);
        if($result){
            $success = true;            
        }else{
            echo "<script>alert'Product Not Updated !!'</script>";
        }
        
}
?>
<!doctype html>

<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Edit Product | Admin Dashboard</title>
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
                                    <h4 class="font-size-18">Edit Products</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">MLM</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product &amp Packages</a></li>
                                        <li class="breadcrumb-item active">Edits Products</li>
                                    </ol>
                                </div>
                            </div>                            
                        </div>     
                        <!-- end page title -->
                    <form method="post" name="insertProduct" enctype="multipart/form-data" action="">
                    <?php 
                        $query=mysqli_query($conn,"select * from products where products.id='$pid'");
                        $cnt=1;
                        while($row=mysqli_fetch_array($query))
                        {
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <!-- <h4 class="card-title">Textual inputs</h4>
                                        <p class="card-title-desc">Here are examples of <code
                                                class="highlighter-rouge">.form-control</code> applied to each
                                            textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code
                                                    class="highlighter-rouge">type</code>.</p> -->

                                        <!-- <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Product Availability</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="productAvailability">
                                                    <option value="">Select</option>
                                                    <option  value="In Stock">In Stock</option>
                                                    <option  value="Out Of Stock"> Out Of Stock</option>
                                                </select>
                                            </div>
                                        </div> -->                                                                

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Product Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text"  name="productName" value="<?php echo htmlentities($row['productName']);?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Product Company</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text"  name="productCompany" value="<?php echo htmlentities($row['productCompany']);?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-sm-2 col-form-label">Before Discount</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="number"  name="beforeDiscount" value="<?php echo htmlentities($row['beforeDiscount']);?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-url-input" class="col-sm-2 col-form-label">After Discount (Selling Price)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="number" name="afterDiscount" value="<?php echo htmlentities($row['afterDiscount']);?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Meta Description</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" type="text"  name="metaDescription"><?php echo htmlentities($row['metaDescription']);?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label">Product Description</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" type="text"  name="productDescription" ><?php echo htmlentities($row['productDescription']);?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-number-input" class="col-sm-2 col-form-label">Minimum Quantity</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="number"  name="minimumQuantity" value="<?php echo htmlentities($row['quantity']);?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Product Availability</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="productAvailability">
                                                    <option ><?php echo htmlentities($row['productAvailability']);?></option>
                                                    <option  value="In Stock">In Stock</option>
                                                    <option  value="Out Of Stock"> Out Of Stock</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-date-input" class="col-sm-2 col-form-label">Product Images 1</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" name="productImage1" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-month-input" class="col-sm-2 col-form-label">Product Images 2</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" name="productImage2">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-week-input" class="col-sm-2 col-form-label">Product Images 3</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" name="productImage3">
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <button type="submit" style="background-color:#17a085; margin-left:560px;" class="btn btn-primary btn-lg waves-effect waves-light" name="updateProduct">Update Product</button>
                        </div> <!-- end row -->
                        <?php } ?>
                    </form>
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                © <script>document.write(new Date().getFullYear())</script> Veltrix<span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
                            </div>
                        </div>
                    </div>
                </footer>

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