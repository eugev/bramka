<?php


	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	//$con = new mysqli("localhost", "dotpay","55cykablyat","dotpay_fr_dotpay" );
	$con = new mysqli("localhost", "root","root","bramka" );
	//$con = new mysqli("localhost", "root","","dotpay_fr_dotpay" );
		
	 if ($con->connect_error){
		 die("connection failed: " . $con->connect_error);  
	 }
	error_reporting(1);

	include_once('utils.php');

	if(checkBannedIP($con , get_client_ip_env()))
	{
		echo '<script>window.location.href="'.getBaseUrl().'/error2/index.php";</script>';
	}
	// $sqls = "SELECT * FROM `payment` WHERE `banned_ips` LIKE '[%{$ip}%]'";
	// $result_query = $con->query($sqls);
	// while($_row = $result_query->fetch_assoc()){
	// 	echo '<script>window.location.href="'.getBaseUrl().'/error2/index.php";</script>';
	// 	break;	
	// }

 	if(isset($_SESSION['company_email'])){
		$session_email = $_SESSION['company_email'];
		$session_role = $_SESSION['role'];
		$sql = "SELECT * FROM `admin` WHERE `email` = '$session_email'";
		$new=$con->query($sql);
		$session_row = $new->fetch_assoc();
	}
?>
