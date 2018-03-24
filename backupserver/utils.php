<?php
	function console_log( $data ){
		echo '<script>';
		echo 'console.log('. json_encode( $data ) .')';
		echo '</script>';
		error_log($data."\n", 3, __DIR__."\phperror.log");
	}
	function console_dump($val) {
		$log = print_r($val, TRUE); //
		echo '<script>';
		echo 'console.log('. $log .')';
		echo '</script>';
		error_log($log."\n", 3, __DIR__."\phperror.log");
	}

	function getUserIP()
	{
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];

		if(filter_var($client, FILTER_VALIDATE_IP))
		{
			$ip = $client;
		}
		elseif(filter_var($forward, FILTER_VALIDATE_IP))
		{
			$ip = $forward;
		}
		else
		{
			$ip = $remote;
		}

		return $ip;
	}
	// Function to get the client ip address
	function get_client_ip_env() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
			$ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';

		return $ipaddress;
	}

	// Function to get the client ip address
	function get_client_ip_server() {
		$ipaddress = '';
		if ($_SERVER['HTTP_CLIENT_IP'])
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if($_SERVER['HTTP_X_FORWARDED_FOR'])
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if($_SERVER['HTTP_X_FORWARDED'])
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if($_SERVER['HTTP_FORWARDED_FOR'])
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if($_SERVER['HTTP_FORWARDED'])
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if($_SERVER['REMOTE_ADDR'])
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
	
		return $ipaddress;
	}


	function log_2file($val , $filename='log_reports.log' , $isConsoleOutput=false) {
		
		if($isConsoleOutput) {
			echo '<script>';
			echo 'console.log('. json_encode($val) .')';
			echo '</script>';
		}
		
		error_log($val."\n", 3, $filename);
	}

	function getBaseUrl(){
		return sprintf(
		  "%s://%s",
		  isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		  $_SERVER['SERVER_NAME']
		);
	  }

	function checkBannedIP($conn, $ip , $id=null){
		$sqls = '';
		if($id == null)
		{
			$sqls = "SELECT * FROM `banip_list` WHERE `blocked_ip` LIKE '[%{$ip}%]'";
		}
		else{
			$sqls = "SELECT * FROM `banip_list` WHERE `payment_id` = '$id' AND `blocked_ip` LIKE '[%{$ip}%]'";
		}
		
		//if($con != null) 
		{
			$result_query = $conn->query($sqls);
			while($result_query && $_row = $result_query->fetch_assoc())
			{
				return true;
			}
		}
		return false;
	}
	function CallAPI($method, $url, $data = false)
	{
		$curl = curl_init();
	
		switch ($method)
		{
			case "POST":
				curl_setopt($curl, CURLOPT_POST, 1);
	
				if ($data)
					curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
				break;
			case "PUT":
				curl_setopt($curl, CURLOPT_PUT, 1);
				break;
			default:
				if ($data)
					$url = sprintf("%s?%s", $url, http_build_query($data));
		}
	
		// Optional Authentication:
		//curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		//curl_setopt($curl, CURLOPT_USERPWD, "username:password");
	
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	
		$result = curl_exec($curl);
	
		curl_close($curl);
	
		return $result;
	}
	
?>