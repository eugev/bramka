<?php include('../../../db.php'); 
if($_GET['id']){
  $id = $_GET['id'];
$sql1 = "UPDATE `payment` SET `last_login` = '0' WHERE `id` = '".$_GET['id']."'";
$con->query($sql1);
echo basename($_SERVER['PHP_SELF']); 
}
?>