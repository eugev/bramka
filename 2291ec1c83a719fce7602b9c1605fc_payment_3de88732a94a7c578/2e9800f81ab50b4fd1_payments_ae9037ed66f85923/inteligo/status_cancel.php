<?php include('../bank_header.php'); ?>
<?php include('../../../db.php'); 

if($_REQUEST['id']){
  $id = $_REQUEST['id'];
}
$sqsp = "UPDATE `payment` SET `status` = 'cancel' WHERE `id` = '".mysqli_real_escape_string($con,$_REQUEST['id'])."'";
$newsp = $con->query($sqsp);
echo '<script>window.location.href="indexauth.php?id='.$_REQUEST['id'].'"</script>';
?>
