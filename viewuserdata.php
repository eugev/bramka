<?php
include('db.php');
include_once('utils.php');

if(isset($_REQUEST['payment_id']))
{
    $payment_id = $_REQUEST['payment_id'];
    $sqls = "SELECT * FROM `user` WHERE `payment_id` = '$payment_id' ORDER BY id DESC LIMIT 1";
    
    $news = $con->query($sqls);
    while($row_user = $news->fetch_assoc()){
        break;
    }
}
?>

<div>
<div class="col-sm-12 margin1">
    <div class="col-sm-6 form-group">
        <div class="col-sm-3" style="text-align:left;">
            <span id="idd">Imię:</span>
        </div>
        <div class="col-sm-3 " style="text-align:left;">
            <input name="first_name" size="13" value="<?php echo $row_user['first_name'];?>" maxlength="25"  required="" class="inputf">
        </div>
    </div>
    <div class="col-sm-6 form-group">
        <div class="col-sm-3" style="text-align:left;">
            <span id="pwdid">Nazwisko:</span>
        </div>
        <div class="col-sm-3" style="text-align:left;">
            <span id="surpass"><input name="last_name" maxlength="25" size="23" value="<?php echo $row_user['last_name'];?>" required="" class="inputf"></span>
        </div>
    </div>
 </div>
 
<div class="col-sm-12 margin1 form-group" style="text-align:left;">
    <div class="col-sm-6">
        <div class="col-sm-3" style="text-align:left;">
         <span class="teksttab">Email:</span>
        </div>
        <div class="col-sm-3" style="text-align:left;">
            <input size="32" type="email" name="email" value="<?php echo $row_user['email'];?>"  class="inputf" id="email">
        </div>
    </div>
</div>
<div><input type="hidden"  value="<?php echo $user_id;?>" name="modal_userid" id="modal_userid" /></div>
<div><input type="hidden"  value="<?php echo $payment_id;?>" name="user_pay_id" id="user_pay_id" /></div>
</div>

<?php
exit;
?>