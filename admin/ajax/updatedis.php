<?php
include '../connection.php';

$purchase_id = $_POST['purchase_id'];
$nsd_dis = $_POST['nsd_dis'];
$nsd_sp = $_POST['nsd_sp'];
$nsd_bv = $_POST['nsd_bv'];
$nmd_qty = $_POST['nmd_qty'];
$nmd_dis = $_POST['nmd_dis'];
$nmd_sp = $_POST['nmd_sp'];
$nmd_bv = $_POST['nmd_bv'];
$rsd_dis = $_POST['rsd_dis'];
$rsd_sp = $_POST['rsd_sp'];
$rsd_cb = $_POST['rsd_cb'];
$rsd_bv = $_POST['rsd_bv'];
$rmd_qty = $_POST['rmd_qty'];
$rmd_dis = $_POST['rmd_dis'];
$rmd_sp = $_POST['rmd_sp'];
$rmd_cb = $_POST['rmd_cb'];
$rmd_bv = $_POST['rmd_bv'];
$pbp = $_POST['pbp'];
$pcut = $_POST['pcut'];


$sql = "UPDATE purchase SET discount='$nsd_dis',sale_price='$nsd_sp',business_volume='$nsd_bv',nmd_qty='$nmd_qty',nmd_dis='$nmd_dis',nmd_sp='$nmd_sp',nmd_bv='$nmd_bv',rsd_dis='$rsd_dis',rsd_sp='$rsd_sp',rsd_cb='$rsd_cb',rsd_bv='$rsd_bv',rmd_qty='$rmd_qty',rmd_dis='$rmd_dis',rmd_sp='$rmd_sp',rmd_cb='$rmd_cb',rmd_bv='$rmd_bv',profit_for_bp='$pbp',profit_cut='$pcut' WHERE id='$purchase_id'";

$res = mysqli_query($con,$sql);

echo "Data Updated";

?>