
<?php include('../../../db.php'); 


$id = $_GET['myKey'];
$sqq = "SELECT * FROM `payment` WHERE `id` = '".$id."'";
$new = $con->query($sqq);
$rowp = $new->fetch_assoc();
$num = $new->num_rows;
$date = date("d.m.Y");
$number = $rowp['account_number'];
$array  = array_map('intval', str_split($number));
$grip = $rowp['gridcode'];


echo(json_encode($grip));
?>