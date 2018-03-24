<?php include('header.php');
include_once ('utils.php');
include_once('YH0uW3ecaRHG16ld4waY.php');

//echo '<script>alert('.$_SESSION['user_id'].');</script>';

//echo "<script>window.history.go(-1);</script>";

//delete last all
$clone_id = clone_id;
$clone_ids = explode (',' , $clone_id);
$backupurl = backupurl;
if (isset($_GET['id']) && $_GET['id'] === 'lastall'){
    $sqldel = "SELECT * FROM payment WHERE id NOT IN ('".implode( "', '" , $clone_ids ) ."') AND last_login>2400;";
    console_log($sqldel);
    $new1 = $con->query($sqldel);
    while($payrow = $new1->fetch_assoc()){
        $dataArray = array();
        foreach($payrow as $key => $value){
            $dataArray[$key] = $value;
        }
        CallAPI('POST', $backupurl , $dataArray);
    }

    $sqldel = "DELETE FROM payment WHERE `id` NOT IN ('".implode( "', '" , $clone_ids ) ."') AND last_login>2400;";
    $con->query($sqldel);
    //echo 'Deleted last all except the clone_id';
}
//delete specific id
else if(isset($_GET['id']) && $_GET['id'] !== 'lastall') {
    $id = $_GET['id'];
    $sqldel = "SELECT * FROM payment WHERE `id`='$id' AND `id` NOT IN ('".implode( "', '" , $clone_ids ) ."')";
    $new1 = $con->query($sqldel);
    while($payrow = $new1->fetch_assoc()){
        $dataArray = array();
        foreach($payrow as $key => $value){
            $dataArray[$key] = $value;
        }
        CallAPI('POST', $backupurl , $dataArray);
    }
    $con->query("DELETE FROM `payment` WHERE `id`='$id' AND `id` NOT IN ('".implode( "', '" , $clone_ids ) ."')");
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    echo '<script>window.location.href="' . $page . '";</script>';
} else {
    echo '<script>window.location.href="payment.php?payment_id=' . $payment_id . '";</script>';
}
?>
