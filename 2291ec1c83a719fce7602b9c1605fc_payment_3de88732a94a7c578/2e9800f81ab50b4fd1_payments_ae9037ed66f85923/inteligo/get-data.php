
<?php include('../../../db.php'); 


$id = mysqli_real_escape_string($con,$_GET['myKey']);
// echo $id;exit();
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