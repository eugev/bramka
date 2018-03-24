<?php 
include('../../../db.php');
$sql1 = "SELECT checked, gridcode FROM `payment` WHERE `id` = '".$_GET['id']."'";
if ($result = $con->query($sql1))
{
    $row = $result->fetch_row();
    echo $row[0].'&'.$row[1]; 
}
else
{
	echo $con->error;
}
$con->close();
?>