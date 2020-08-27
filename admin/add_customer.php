<?php 
session_start();
include 'conn.php';

if(isset($_POST['addCustomer'])){

    $sponserId = $_POST['sponserId'];
    $name = $_POST['name'];
    $fatherName = $_POST['fatherName'];
    $mobileNumber = $_POST['mobileNumber'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $doj = $_POST['doj'];
    $permanentAddress = $_POST['permanentAddress'];
    $temporaryAddress = $_POST['temporaryAddress'];  
    $adharCard = $_POST['adharCard'];
    $pancard = $_POST['pancard'];
    $businessPlan = $_POST['businessPlan'];
    $hvmCard = $_POST['hvmCard'];    
    $bankName = $_POST['bankName'];
    $accountNumber = $_POST['accountNumber'];
    $ifscCode = $_POST['ifscCode'];
    $minPurchase = $_POST['minPurchase'];
    $panCardImage = $_FILES['panCardImage']['name'];
    $idProof = $_FILES['idProof']['name'];

    $query=mysqli_query($conn,"select max(id) as pid FROM customers");
    $result=mysqli_fetch_array($query);
    $productid=$result['pid']+1;
    $dir="idproofImages/$productid";
        if(!is_dir($dir)){
            mkdir("idproofImages/".$productid);
        }        
        move_uploaded_file($_FILES["panCardImage"]["tmp_name"],"idproofImages/$productid/".$_FILES["panCardImage"]["name"]);
        move_uploaded_file($_FILES["idProof"]["tmp_name"],"idproofImages/$productid/".$_FILES["idProof"]["name"]);



        $sql = "SELECT MAX(id) FROM customers";
        $res = mysqli_query($conn,$sql);
        $row2 = mysqli_fetch_array($res);
        $max_id = $row2['MAX(id)'];

        $next_id = $max_id+1;

        $cus_id = 'HVMCUST-'.$next_id;

    $sql = "insert INTO customers (customer_id, sponser_id, name, father_name, mobile, email, dob, doj, address_permanent, address_temp, adhar, pan, business_type, hvmcard, pan_file, id_file, bank, account_number, ifsc_code, min_purchase_status) VALUES('$cus_id', '$sponserId','$name','$fatherName','$mobileNumber','$email',' $dob','$doj','$permanentAddress','$temporaryAddress','$adharCard','$pancard','$businessPlan','$hvmCard','$panCardImage','$idProof','$bankName','$accountNumber',' $ifscCode','$minPurchase')";
    // echo $sql;
   
    $result2 = mysqli_query($conn, $sql);
    // print_r($sql);exit();
    


    $name2 = $_POST['name2'];
    $fatherName2 = $_POST['fatherName2'];
    $mobilenumber2 = $_POST['mobilenumber2'];
    $email2 = $_POST['email2'];
    $dob2 = $_POST['dob2'];
    $relation = $_POST['relation'];
    $permanentAddress2 = $_POST['permanentAddress2'];
    $temporaryAddress2 = $_POST['temporaryAddress2'];

    $sql2 = "insert INTO nominee (name,father_name,mobile,email,dob,relation,address_permanent,address_temp) VALUES(' $name2','$fatherName2','$mobilenumber2','$email2','$dob2','$relation','$permanentAddress2','$temporaryAddress2 ')";
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
                                    </div>

                                    <div class="card-body" style="margin-left: 205px">                                        
                                        <div><h2 class="text-center py-3" style="margin-left: -20%; color: #000">Customer Details</h2></div>
                                        <div class="form-group row text">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-8 ">
                                                <input class="form-control" type="text"  name="name" placeholder="Name" pattern="[A-Za-z]+" required> 
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Father's Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="fatherName" placeholder="Father's Name" pattern="[A-Za-z]+" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Mobile Number</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="mobileNumber" placeholder="Mobile Number" pattern="[789][0-9]{9}" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>     
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Email </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="email"  name="email" placeholder="Email "  required>
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
                                                <input class="form-control" type="date"  name="doj" placeholder="dd-mm-yyyy " pattern="(?:(?:0[1-9]|1[0-2])[\/\\-. ]?(?:0[1-9]|[12][0-9])|(?:(?:0[13-9]|1[0-2])[\/\\-. ]?30)|(?:(?:0[13578]|1[02])[\/\\-. ]?31))[\/\\-. ]?(?:19|20)[0-9]{2}" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Temprory Address</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="temporaryAddress" placeholder="Temprory Address" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Permanent Address</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="permanentAddress" placeholder="Permanent Address" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>                                        

                                        <div><h2 class="py-2 text-center" style="margin-left: -20%; color: #000">Nominee Details</h2></div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Name </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="name2" placeholder="Name " required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Father's Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="fatherName2" placeholder="Father's Name" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Mobile Number</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="mobilenumber2" placeholder="Mobile Number" pattern="[789][0-9]{9}" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Email </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="email2" placeholder="Email " required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">DOB </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="date"  name="dob2" placeholder="DOB" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Relation </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="relation" placeholder="Relation " required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Temprory Address</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="temporaryAddress2" placeholder="Temprory Address" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Permanent Address</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="permanentAddress2" placeholder="Permanent Address" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div><h2 class="py-2 text-center" style="margin-left: -20%; color: #000">Additional Information</h2></div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Adhar Card Number </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="adharCard" placeholder="Adhar Card Number " minilength="12" maxlength="12" pattern="[0-9]{4}[0-9]{4}[0-9]{4}" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">PAN Number</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="pancard" placeholder="PAN Number"  pattern="[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Business Plan</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="businessPlan" required>
                                                    <option value="">Select Plan</option>
                                                    <option  value="DP">DP</option>
                                                    <option  value="OTP">OTP</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">HVM Card Number </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="hvmCard" placeholder="HVM Card Number ">
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
                                            <label for="example-search-input" class="col-sm-2 col-form-label">ID Proof </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="file"  name="idProof">
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>

                                        <div><h2 class="py-2 text-center" style="margin-left: -20%; color: #000">Bank Details</h2></div>
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
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Min Purchase Restriction</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="minPurchase">
                                                    <option value="">Select</option>
                                                    <option  value="YES">YES</option>
                                                    <option  value="NO">NO</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->                            
                        </div> <!-- end row -->    
                        <button style="background-color:#17a085; margin-left:560px;" class="btn btn-primary btn-lg waves-effect waves-light" name="addCustomer">Add Customer</button>                    
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