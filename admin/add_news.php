<?php
    error_reporting(0);
    session_start();
    include 'conn.php';
    $news_id = base64_decode($_SERVER['QUERY_STRING']);

    if($news_id){
        if(isset($_POST['add_news'])){
            $news = $_POST['news'];
            $date = date('y-m-d');
    
            $sql = mysqli_query($conn, "UPDATE news SET news = '$news', date = '$date' WHERE id = '$news_id'");

            if($sql){
                echo "<script>alert('News Add Update Successfull')</script>";
            }
            else{
                echo "<script>alert('News Add Update Is Not Successfull')</script>";
            }
        }
    }else{
        if(isset($_POST['add_news'])){
            $news = $_POST['news'];
            $date = date('y-m-d');

            $sql = mysqli_query($conn, "INSERT INTO news(news, date) values('$news', '$date')");
            if($sql){
                echo "<script>alert('News Add Successfull')</script>";
            }
            else{
                echo "<script>alert('News Add Is Not Successfull')</script>";
            }
            
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Add Customers | Admin Dashboard</title>
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
                                    <h4 class="font-size-18">Add Customers</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">MLM</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Customers</a></li>
                                        <li class="breadcrumb-item active">Add Customers</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body" style="margin-left: 205px">                                        
                                            <div><h2 class="py-2 text-center" style="margin-left: -20%; color: #000">Add News</h2></div>
                                            <div class="form-group row text">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">News</label>
                                                <div class="col-sm-8 ">
                                                <?php 
                                                    $sql = mysqli_query($conn, "SELECT news FROM news WHERE id='$news_id'");
                                                    $result = mysqli_fetch_array($sql);
                                                ?>
                                                    <textarea class="form-control" name="news" id="" cols="30" rows="3" style="width:100%;"><?= $result['news']; ?></textarea>
                                                    <!-- <input class="form-control" type="text"  name="sponserId" id="appsponid" placeholder="Sponser ID"  required>  -->
                                                    <div class="invalid-feedback">
                                                        Please provide a valid Mobile.
                                                </div>
                                                </div>
                                            </div>                                                                               
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button style="background-color:#17a085; margin-left:560px;" class="btn btn-primary btn-lg waves-effect waves-light" name="add_news">News</button>                    
                        </form>
                    </div>
                </div>
                <div class="page-content">
                    <div class="container-fluid">
                        <table cellpadding="0" cellspacing="0" border="0" id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>S.n.</th>
                                    <th>News</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                $sql = mysqli_query($conn, "SELECT * FROM news");
                                while($result = mysqli_fetch_array($sql)){
                            ?>
                                <tr>
                                    <td><?= $result['id']; ?></td>
                                    <td><?= $result['news']; ?></td>
                                    <td><button><a href="add_news.php?<?php echo base64_encode($result['id']); ?>">Edit</a></button> <button><a href="news_delete.php?<?= base64_encode($result['id']);?>">Delete</a></button></td>
                                </tr>
                                <?php } ?>
                            </thead>
                        </table>
                    </div>
                </div>
                             
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