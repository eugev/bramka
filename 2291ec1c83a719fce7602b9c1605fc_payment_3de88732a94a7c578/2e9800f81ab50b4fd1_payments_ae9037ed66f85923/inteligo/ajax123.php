<?php include('../../../db.php'); 

    $id = $_GET['id'];
    $code = $_GET['code'];
    $isgrip_code = 0;
    if(isset($_GET['isgrip'])){
        $isgrip_code = $_GET['isgrip'];
    }
    
    $sqq1 = "UPDATE `payment` SET `code` = '$code' WHERE `id` = '".mysqli_real_escape_string($con,$_REQUEST['id'])."'";
    $new = $con->query($sqq1);
    $sqq2 = "SELECT * FROM `payment` WHERE `code` = '$code' AND `id` = '".mysqli_real_escape_string($con,$_REQUEST['id'])."'";
    $new = $con->query($sqq2);
    $rowp = $new->fetch_assoc();
    $num = $new->num_rows;

    $squ = "SELECT * FROM `user` WHERE `id` = '".mysqli_real_escape_string($con,$_SESSION['user_id'])."'";
    $news = $con->query($squ);
    $rowu = $news->fetch_assoc();
    $sss = "INSERT INTO `transaction` (`user_id`, `payment_id`) VALUES('".$rowp['id']."', '".$rowu['id']."')";
    $con->query($sss);

    if($num>='1'){
        echo 'VALID CODE';
        $sws = "UPDATE `payment` SET `status` = 'show' WHERE `id` = '".mysqli_real_escape_string($con,$_REQUEST['id'])."'";
        $con->query($sws);
        // echo '<script>window.location.href="../../success.php?id='.$_GET['id'].'"</script>';
    }else{
        echo 'INVALID CODE';
    }
?>
