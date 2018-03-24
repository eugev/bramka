<?php include('header.php'); 
include_once('utils.php');
//echo '<script>alert('.$_SESSION['user_id'].');</script>';
$id = $_GET['id'];

if(isset($_GET['status'])){
    $status = $_GET['status'];
    if($status=='block'){
        $sql = "UPDATE `payment` SET `status` = 'block', `block_status` = 'block' WHERE `id`='$id'";
        $con->query($sql);
    }else{
        $sql = "UPDATE `payment` SET `status` = 'unblocked', `block_status` = 'unblocked' WHERE `id`='$id'";
        $con->query($sql);
    }
}
else if(isset($_GET['ban_ip'])){
    $ip = $_GET['ban_ip'];
    if($ip){

        if(isset($_GET['ban_id']) && $_GET['ban_id']>0){
            $sql = "UPDATE `banip_list` SET `blocked_ip` = concat(`blocked_ip` , '[$ip]') WHERE `payment_id`='$id'";
            $con->query($sql);
        }
        else{
            $sql = "INSERT INTO `banip_list` (`payment_id`, `blocked_ip`) VALUES('$id', '[$ip]')";
            $con->query($sql);
        }
    }
}
else if(isset($_GET['unban_ip'])){
    $ip = $_GET['unban_ip'];
    if($ip){
        if(isset($_GET['ban_id']) && $_GET['ban_id']>0) {
            $sql = "UPDATE `banip_list` SET `blocked_ip` = REPLACE(`blocked_ip` , '[$ip]', '') WHERE `payment_id`='$id' AND `blocked_ip` LIKE '[%{$ip}%]'";
            $con->query($sql);
        }
        else{
            $sql = "INSERT INTO `banip_list` (`payment_id`, `blocked_ip`) VALUES('$id', '')";
            $con->query($sql);
        }
    }
}
else if(isset($_GET['reset_banips'])){
    
    $isRestBannedIPs = $_GET['reset_banips'];
    if($isRestBannedIPs){
        if(isset($_GET['ban_id']) && $_GET['ban_id'] > 0) {
            $sql = "UPDATE `banip_list` SET `blocked_ip` = '' WHERE `payment_id`='$id'";
            $con->query($sql);
        }
        else{
            $sql = "INSERT INTO `banip_list` (`payment_id`, `blocked_ip`) VALUES('$id', '')";
            $con->query($sql);
        }
    }
}
//echo "<script>window.history.go(-1);</script>";
echo '<script>window.location.href="usrauth.php";</script>';
?>
