<?php

	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	$con = new mysqli("localhost", "dotpay","55cykablyat","dotpay_fr_dotpay" );
	//$con = new mysqli("localhost", "root","root","bramka_backup" );
	//$con = new mysqli("localhost", "root","","dotpay_fr_dotpay" );
		
	if ($con->connect_error){
		die("connection failed: " . $con->connect_error);  
	}
	error_reporting(1);

	// $sqls = "SELECT * FROM `payment` WHERE `banned_ips` LIKE '[%{$ip}%]'";
	// $result_query = $con->query($sqls);
	// while($_row = $result_query->fetch_assoc()){
	// 	echo '<script>window.location.href="'.getBaseUrl().'/error2/index.php";</script>';
	// 	break;	
	// }

?>
