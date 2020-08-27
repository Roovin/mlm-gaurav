<?php 
session_start();
include '../conn.php';

$admin= $_SESSION['customer_id'];
$customer_name = $_SESSION['customer_name'];
if(isset($_POST['kyc'])){
   
    
    $fatherName = $_POST['fatherName'];
    $dob = $_POST['dob'];
    $doj = $_POST['doj'];
    $permanentAddress = $_POST['permanentAddress'];    
    $adharCard = $_POST['adharCard'];
    $pancard = $_POST['pancard']; 
    $accHolder =$_POST['holder'];
    $bankName = $_POST['bankName'];
    $accountNumber = $_POST['accountNumber'];
    $ifscCode = $_POST['ifscCode'];    
    $panCardImage = $_FILES['panCardImage']['name'];
    $idProof = $_FILES['adharCardImage']['name'];
    $passbook = $_FILES['passbook']['name'];

    $query=mysqli_query($conn,"select max(id) as pid FROM customers");
    $result=mysqli_fetch_array($query);
    $productid=$result['pid']+1;
    $dir="kycImages/$productid";
        if(!is_dir($dir)){
            mkdir("kycImages/".$productid);
        }        
        move_uploaded_file($_FILES["panCardImage"]["tmp_name"],"kycImages/$productid/".$_FILES["panCardImage"]["name"]);
        move_uploaded_file($_FILES["adharCardImage"]["tmp_name"],"kycImages/$productid/".$_FILES["adharCardImage"]["name"]);
        move_uploaded_file($_FILES["passbook"]["tmp_name"],"kycImages/$productid/".$_FILES["passbook"]["name"]);

        
        $sql ="SELECT customer_id FROM customers WHERE customer_id = '$cust_id'";
        if($sql){            
            $sql2 = "UPDATE customers SET father_name='$fatherName', dob ='$dob', doj ='$doj', address_permanent='$permanentAddress', adhar ='$adharCard', pan ='$pancard', pan_file='$panCardImage', id_file='$idProof', acc_holder ='$accHolder', bank='$bankName', account_number='$accountNumber', ifsc_code=' $ifscCode', pass_file='$passbook' ";
            $result2 = mysqli_query($conn, $sql2);
            // header("location: thankyou.php");
        }
    
    // print_r($sql);exit();
    


    $name2 = $_POST['name2'];
    $fatherName2 = $_POST['fatherName2'];
    $mobilenumber2 = $_POST['mobilenumber2'];
    $email2 = $_POST['email2'];
    $dob2 = $_POST['dob2'];
    $relation = $_POST['relation'];
    $permanentAddress2 = $_POST['permanentAddress2'];

    $sql2 = "insert INTO nominee (customer_id, name,father_name,mobile,email,dob,relation,address_permanent) VALUES('$' '$name2','$fatherName2','$mobilenumber2','$email2','$dob2','$relation','$permanentAddress2',)";
    $result3 = mysqli_query($conn, $sql2);

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
                                    <h4 class="font-size-18">Please Fill Your KYC</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">MLM</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">KYC</a></li>
                                        <!-- <li class="breadcrumb-item active">Add Customers</li> -->
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <form method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- <div class="card-body" style="margin-left: 205px">                                        
                                        <div><h2 class="py-2 text-center" style="margin-left: -20%; color: #000">Customer Application</h2></div>
                                        <div class="form-group row text">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Sponser ID</label>
                                            <div class="col-sm-8 ">
                                                <input class="form-control" type="text"  name="sponserId" id="appsponid" placeholder="Sponser ID"  required> 
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                             </div>
                                            </div>
                                        </div>                                                                               
                                    </div> -->

                                    <div class="card-body" style="margin-left: 205px">                                        
                                        <div><h2 class="text-center py-3" style="margin-left: -20%; color: #000">Your Details</h2></div>                                        
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Father's Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="fatherName" placeholder="Father's Name"  >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>                                                                                  
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">DOB</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="date"  name="dob" placeholder="dd-mm-yyyy" >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">DOJ </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="date"  name="doj" placeholder="dd-mm-yyyy " pattern="(?:(?:0[1-9]|1[0-2])[\/\\-. ]?(?:0[1-9]|[12][0-9])|(?:(?:0[13-9]|1[0-2])[\/\\-. ]?30)|(?:(?:0[13578]|1[02])[\/\\-. ]?31))[\/\\-. ]?(?:19|20)[0-9]{2}" >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>                                                                           
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Permanent Address</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="permanentAddress" placeholder="Permanent Address" >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>                                        

                                        <div><h2 class="py-2 text-center" style="margin-left: -20%; color: #000">Nominee Details</h2></div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Name </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="name2" placeholder="Name " >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Father's Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="fatherName2" placeholder="Father's Name" >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Mobile Number</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="mobilenumber2" placeholder="Mobile Number" pattern="[789][0-9]{9}" >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Email </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="email2" placeholder="Email " >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">DOB </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="date"  name="dob2" placeholder="DOB" >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Relation </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="relation" placeholder="Relation " >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Permanent Address</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="permanentAddress2" placeholder="Permanent Address" >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div><h2 class="py-2 text-center" style="margin-left: -20%; color: #000">Additional Information</h2></div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Adhar Card Number </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="adharCard" placeholder="Adhar Card Number " minilength="12" maxlength="12" pattern="[0-9]{4}[0-9]{4}[0-9]{4}" >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">PAN Card Number</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="pancard" placeholder="PAN Number"  >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>                                                                                
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">PAN Card</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="file"  name="panCardImage">
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Adhar Card </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="file"  name="adharCardImage">
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>

                                        <div><h2 class="py-2 text-center" style="margin-left: -20%; color: #000">Bank Details</h2></div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Account Holder Name </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="holder" placeholder="Account Holder Name ">
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Bank Name </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="bankName" placeholder="Bank Name ">
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Account Number</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="accountNumber" placeholder="Account Number">
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">IFSC Code</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="ifscCode" placeholder="IFSC Code">
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Passbook</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="file"  name="passbook" placeholder="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div> 
                                        <button style="background-color:#17a085; margin-left:300px;" class="btn btn-primary btn-lg waves-effect waves-light" name="kyc">Add KYC</button>                                                           
                                    </div>
                                </div>
                            </div> <!-- end col -->                            
                        </div> <!-- end row -->                            
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