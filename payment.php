
<?php 
include('header.php'); 
include('YH0uW3ecaRHG16ld4waY.php');
if($_REQUEST['payment_id']){
  // $payment_id = mysqli_real_escape_string($_REQUEST['payment_id']);
  $payment_id = $_REQUEST['payment_id'];
}

$sqsp = "SELECT * FROM `payment` WHERE `id` = '$payment_id'";
$newsp = $con->query($sqsp);
$rowsp = $newsp->fetch_assoc();

$sqsp1 = "SELECT * FROM `payment` WHERE `company_email` = '$session_email'";
$newsp1 = $con->query($sqsp1);
$rowsp11 = $newsp1->fetch_assoc();



if(isset($_POST['edit_payment'])){
$name = $_POST['name'];

$account_number = $_POST['account_number1'].$_POST['account_number2'].$_POST['account_number3'].$_POST['account_number4'].$_POST['account_number5'].$_POST['account_number6'].$_POST['account_number7'];

$address = $_POST['address'];
$email = $_POST['email'];
$payment = $_POST['payment'];
$title = $_POST['title'];
$sqlup = "UPDATE `payment` SET `account_name` = '$name', `payment` = '$payment', `account_number` = '$account_number', `title` = '$title', `address` = '$address', `email` = '$email' WHERE `id` = '$payment_id'";
$con -> query($sqlup);
echo "<script>window.location.href='';</script>";
}

if(isset($_POST['save_payment'])){
$name = $_POST['name'];

$account_number = $_POST['account_number1'].$_POST['account_number2'].$_POST['account_number3'].$_POST['account_number4'].$_POST['account_number5'].$_POST['account_number6'].$_POST['account_number7'];

$address = $_POST['address'];
$email = $_POST['email'];
$payment = $_POST['payment'];
$title = $_POST['title'];
$sql = "INSERT INTO `payment` (`account_name`, `payment`, `account_number`, `title`, `address`, `email`, `block_status`, `break`, `last_login`, `company_email`) VALUES('$name', '$payment', '$account_number', '$title', '$address', '$email', 'unblocked', 'off', '150', '$session_email')";
$nw = $con -> query($sql);
$last_id = $con->insert_id;

$code = 'ABS'.$last_id;
$squp = "UPDATE `payment` set `code` = '$code' WHERE `id` = '$last_id'";
$con -> query($squp);
echo "<script>window.location.href='index.php';</script>";
}

if($_GET['delete']=='else'){
    if(isset($_POST['delete'])){
 $cnt=array();
 $cnt=count($_POST['checkbox']);

        for($i=0;$i<$cnt;$i++){
            $del_id=$_POST['checkbox'][$i];
        
        $sqldel = "DELETE FROM payment WHERE id='$del_id'";
        $con->query($sqldel);
//        echo '<script>window.location.href="payment.php?payment_id="'.$payment_id.'";</script>';
            
        }        
    }
        echo '<script>window.location.href="index.php";</script>';
}
?>


<!--<body onload="playAudio();">-->
    <div id="dp-container" class="column content-column">

      <div class="col-md-12" style="padding: 0px 0px 0px 0px !important">
        <div class="col-md-7" style="overflow-y: scroll; height: 90vh;">
          <div class="list-header  fill"   style="border-right: 1px solid #e4e4e4;height: 1000px">
            <div class="list-filter clearfix">

<form action="payment.php?delete=else&payment_id=<?php echo $payment_id; ?>" method="post">
<div class="pull-right">
                <div class="btn-group list-sorter">
                      <a id="ember1171" class="btn btn-primary popovercontainer ember-view" data-original-title="" title="" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-plus"></i>&nbsp;New
                      </a>

                      <button class="btn btn-danger popovercontainer ember-view" type="submit" name="delete"> 
                        <i class="fa fa-trash"></i>&nbsp;Delete
                      </button>
<?php
if($session_role=='admin'){
$sqsp1 = "SELECT * FROM `payment` WHERE `block_status` = 'unblocked'";
$newsp1 = $con->query($sqsp1);
}else{
$sqsp11 = "SELECT * FROM `payment` WHERE `block_status` = 'unblocked' AND `company_email` = '$session_email'";
$newsp1 = $con->query($sqsp11);
}
$rowsp1 = $newsp1->fetch_assoc();
$num1 = $newsp1->num_rows;

if($session_role=='admin'){
$sqsp2 = "SELECT * FROM `payment` WHERE  `block_status` = 'unblocked' AND `company_email` = '$session_email'";
$newsp2 = $con->query($sqsp2);
}else{
$sqsp22 = "SELECT * FROM `payment` WHERE  `block_status` = 'unblocked' AND `block_session` = '$session_email'";
$newsp2 = $con->query($sqsp22);
}
$rowsp2 = $newsp2->fetch_assoc();
$num2 = $newsp2->num_rows;

if($num1!=$num2 && $session_role!='admin' && $rowsp11['break']=='off'){
?>
                      <a href="block_unblock.php?session_emails=<?php echo $session_email; ?>&status=blocked&page_name=payment.php" class="btn btn-danger"> 
                        <i class="fa fa-lock"></i>&nbsp;block All
                      </a>
<?php }elseif($num1!=$num2 && $session_role=='admin'){ ?>
                      <a href="block_unblock.php?session_emails=<?php echo $session_email; ?>&status=blocked&page_name=payment.php" class="btn btn-danger"> 
                        <i class="fa fa-lock"></i>&nbsp;block All
                      </a>
<?php }elseif($num1==$num2 && $session_role=='admin'){ ?>
                      <a href="block_unblock.php?session_emails=<?php echo $session_email; ?>&status=unblocked&page_name=payment.php" class="btn btn-success"> 
                        <i class="fa fa-unlock"></i>&nbsp;Unblock All
                      </a>
<?php }elseif($rowsp11['break']=='off' && $session_role!='admin'){ ?>
                      <a href="block_unblock.php?session_emails=<?php echo $session_email; ?>&status=unblocked&page_name=payment.php" class="btn btn-success"> 
                        <i class="fa fa-unlock"></i>&nbsp;Unblock All
                      </a>
<?php } 

if($session_role != 'admin' && $rowsp1['break']=='on'){ ?>
                      <a onclick="window.location.href='break_time.php?session_emails=<?php echo $session_email; ?>&status=off&page_name=payment.php'"  class="btn btn-success"> 
                        <input type="checkbox" style="cursor:pointer" checked> Break Off
                      </a>
<?php }elseif($session_role != 'admin' && $rowsp11['block_status'] == 'unblocked'){ ?>
                      <a  onclick="window.location.href='break_time.php?session_emails=<?php echo $session_email; ?>&status=on&page_name=payment.php'"  class="btn btn-success"> 
                        <input type="checkbox"  style="cursor:pointer"> Break On
                      </a>
<?php } ?>

                      <a  onClick="selectall()" class="btn btn-primary" id="checkAll"> 
                         Check All
                      </a>
                      <a  onClick="unselectall()" class="btn btn-primary" id="checkAll"> 
                         Uncheck All
                      </a>


              </div>
            </div> 

          </div> 
<table style="width:100%" id="payment_table">
  <thead>
    <tr>
      <th style="font-size:14px" id="ember1925" class="sortable text-left ember-view">
        <div title="Name" class="pull-left over-flow"> Trans. Id</div>
      </th>
      <th style="font-size:14px" id="ember1925" class="sortable text-left ember-view">
        <div title="Name" class="pull-left over-flow"> Middle Man &nbsp;</div>
      </th>
      <th style="font-size:14px" id="ember1925" class="sortable text-left ember-view">
        <div title="Name" class="pull-left over-flow"> Amount &nbsp;</div>
      </th>
      <th style="font-size:14px" id="ember1925" class="sortable text-left ember-view">
        <div title="Name" class="pull-left over-flow"> Title</div>
      </th>
    </tr>
  </thead>    
<tbody>
<?php 
if($session_role=='admin'){
$sqpl = "SELECT * FROM `payment` WHERE `block_status` = 'unblocked'";
$newpl = $con->query($sqpl);
}else{
$sqpl1 = "SELECT * FROM `payment` WHERE `block_status` = 'unblocked' AND `break` = 'off' AND `company_email` = '$session_email'";
$newpl = $con->query($sqpl1);
}
while($rowpl = $newpl->fetch_assoc()){
?>
    <tr>
      <div class="list-header" style="<?php if($payment_id == $rowpl['id']){ echo 'background: #f7f5f5'; }else{ echo 'background: #fff'; } ?>">

        <td>
          <a href="payment.php?payment_id=<?php echo $rowpl['id']; ?>">
                <?php echo $rowpl['account_name']; ?><span style="float: left"><?php echo $rowpl['email']; ?></span>
          </a>
        </td>

        <td>
          <a href="payment.php?payment_id=<?php echo $rowpl['id']; ?>">
                <?php echo $session_row['name']; ?>
          </a>
        </td>
        
        <td>
          <a href="payment.php?payment_id=<?php echo $rowpl['id']; ?>">
                <?php echo $rowpl['payment']; ?>
          </a>
        </td>

        <td>
          <a href="payment.php?payment_id=<?php echo $rowpl['id']; ?>">
                <?php echo $rowpl['title']; ?>
          </a>
        </td>

        <td>
          <span  style="float: right; margin-top:0px;text-align: center;">
            <input type="text" id="id<?php echo $rowpl['id']; ?>" name="" value="<?php echo "https://".$_SERVER['SERVER_NAME']."/".URL_directory1; ?>index.php?id=<?php echo $rowpl['id']; ?>" style="width: 30%;"><?php $ids=$rowpl['id']; ?>
            <a onclick="copy('#id<?php echo $ids; ?>');" class="btn btn-primary popovercontainer ember-view">copy</a>
            <a href="pay_delete.php?id=<?php echo $rowpl['id']; ?>" class="btn btn-primary popovercontainer ember-view" style="background:red;" >delete</a>

               &nbsp; <input  class="checkSingle" name="checkbox[]" type="checkbox" value="<?php echo $rowpl['id']; ?>" style="cursor:pointer">
 
               &nbsp; <input name="" type="number" value="1" style="cursor:pointer;width:40px" id="copies<?php echo $rowpl['id']; ?>" id="check_all">
               
               &nbsp;<button type="button" class="btn btn-primary" style="" onclick="copies_more(<?php echo $rowpl['id']; ?>)">Generate</button>;
          </span>
        </td>


      </div>
    </tr>  
<?php } ?>
</tbody>
</table>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<script>
function selectall() { 
  checkboxes = document.getElementsByClassName('checkSingle');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = true;
  }
}
function unselectall() { 
  checkboxes = document.getElementsByClassName('checkSingle');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = false;
  }
}
</script>
<script>
/************************************* CHECKALL ************************************/

function check_full(email,role) {
  document.getElementById("checked").checked = true;
    if (email == "") {
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               //$("#payment_table").load(location.href + " #payment_table");
            }
        };
        xmlhttp.open("GET","check_all_ajax.php?email="+ email + "&role=" + role,true);
        xmlhttp.send();
    }
}
/************************************* CHECKALL ************************************/ 


/************************************* COPIES ************************************/

function copies_more(str) {
var number =  document.getElementById("copies"+str).value;
    if (str == "") {
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               $("#payment_table").load(location.href + " #payment_table");
            }
        };
        xmlhttp.open("GET","pay_copy.php?id="+ str + "&number=" + number,true);
        xmlhttp.send();
    }
}
/************************************* COPIES ************************************/        
</script>
</form>
    </div>
        </div>

        <div class="col-md-5"  style="padding: 0px 0px 0px 0px !important;overflow-y: scroll;height: 630px">

          <div class="header-small">
            <div class="cust-name pull-left">
              <span>infotech</span>
            </div>
            <div class="btn-toolbar pull-right">
              <button class="btn btn-default" data-toggle="modal" data-target="#myModals">Edit</button>
              <a href="product_add_plans.php?payment_id=<?php echo $payment_id; ?>" style="display: none;"><button id="ember1282" class="btn btn-primary ember-view"> Add Plan</button></a>
              <a href="product_add_addon.php" style="display: none;"><button class="btn btn-default" >Add Addon</button></a>

            </div>
          </div>
<script type="text/javascript">
function selectElementContents() 
{
document.querySelector('#input').select();
document.execCommand('copy');
//alert('copid to clipboard');
} // end function selectElementContents(el) 

function copy(id) 
{
document.querySelector(id).select();
document.execCommand('copy');
//alert('copid to clipboard');
} // end function selectElementContents(el) 


</script>

<!-- -------------------------------------OLD TABLE FOR IP------------------------------------------- -->
<?php


if($_REQUEST['payment_id']){
  $payment_id = $_REQUEST['payment_id'];
  ?>
<style>
.fontss{
font-size:14px;font-weight:bolder;
}
.bord{
border-bottom:1px solid #ccc;
}
</style>

<div style="color: green; border: solid 1px green; width: 100%; height: 45px; padding-top: 5px; margin-bottom: 5px;">
  <span style="color: white; background-color: green; padding: 7px; margin-left:7px; margin-right:7px;">URL</span> 
  <input type="text" id="input" name="" value="<?php echo "https://".$_SERVER['SERVER_NAME']."/".URL_directory1; ?>index.php?id=<?php echo $payment_id; ?>" style="width: 350px;">
  <button class="btn btn-primary popovercontainer ember-view" onclick="selectElementContents();">copy</button>
</div>



<div id="ip_tab"></div>

<script>

//setInterval(function(){ $( "#ip_tab" ).load(window.location.href + " #ip_tab" ); }, 1000);

//setInterval(function(){ showUser(<?php echo $_REQUEST['payment_id']; ?>); }, 10000);


function showUser(str) {
    if (str == "") {
        // document.getElementById("txtHint").innerHTML = "";
        // return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
document.getElementById("ip").innerHTML = this.responseText;
               // alert(this.responseText);
            }
        };
        xmlhttp.open("GET","payment/index.php?ids="+ str + "&new=ness&session_role=<?php echo $session_role; ?>",true);
        xmlhttp.send();
    }
}
/*************************************IP AJAX************************************/
setInterval(function(){ show_ip(<?php echo $_REQUEST['payment_id']; ?>); }, 3000);
show_ip(<?php echo $_REQUEST['payment_id']; ?>);

function show_ip(str) {
    if (str == "") {
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
document.getElementById("ip_tab").innerHTML = this.responseText;
                //alert(this.responseText);
            }
        };
        xmlhttp.open("GET","ip3541_table.php?ids="+ str + "&new=ness&session_role=<?php echo $session_role; ?>",true);
        xmlhttp.send();
    }
}
/*************************************IP AJAX************************************/
</script>
<!-- ******************************* *************************** -->
<?php }else{ ?>
<!-- ******************************* *************************** -->
          <div class="large-tabbed-details" style="display: ">
            <div id="ember1304"><div class="intro_details">
              <h3>Give authority to 'Payment'!</h3>
                <p style="font-size:14px;" class="text-muted"></p>
                <div style="margin-top:25px;" class="norow">
                </div>
              </div>
            </div>
          </div>
<!-- ******************************* *************************** -->
<?php }  ?>

        </div>
      </div>
    </div>
<!-- --------------------- --- MODEL BOX --- -------------------- -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Open Modal</button>
<!-- ******************************** ADD MODEL *********************** -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Payment</h4>
      </div>
      <div class="modal-body">

        <form class="form-vertical" action="" method="post">
                  <div class="modal-body">
                      <div id="ember1437" class="ember-view"><!----></div>
                      <div style="padding:0px 15px;" class="row">
          <div class="form-group">
            <label class="mLbl">Name </label>
            <input type="text" id="ember1438" class="ember-text-field form-control ember-view"  name="name">
          </div>

          <div class="form-group">
            <label class="mLbl">Account Number </label>
<div class="bor">
    <input type="number" name="account_number1" class="def-txt-input inputs ember-text-field" data-maxlength="2" maxlength="2" style="width:30px">
    <input type="number" name="account_number2" class="def-txt-input inputs" data-maxlength="4" maxlength="4">
    <input type="number" name="account_number3" class="def-txt-input inputs" data-maxlength="4" maxlength="4">
    <input type="number" name="account_number4" class="def-txt-input inputs" data-maxlength="4" maxlength="4">
    <input type="number" name="account_number5" class="def-txt-input inputs" data-maxlength="4" maxlength="4">
    <input type="number" name="account_number6" class="def-txt-input inputs" data-maxlength="4" maxlength="4">
    <input type="number" name="account_number7" class="def-txt-input inputs" data-maxlength="4" maxlength="4">
</div>
          </div>
<style>
    .inputs::-webkit-inner-spin-button, 
.inputs::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
</style>          
<script>
    var $inputs = $(".def-txt-input");
var intRegex = /^\d+$/;

// Prevents user from manually entering non-digits.
$inputs.on("input.fromManual", function(){
    if(!intRegex.test($(this).val())){
        $(this).val("");
    }
});


// Prevents pasting non-digits and if value is 6 characters long will parse each character into an individual box.
$inputs.on("paste", function() {
    var $this = $(this);
    var originalValue = $this.val();
    
    $this.val("");

    $this.one("input.fromPaste", function(){
        $currentInputBox = $(this);
        
        var pastedValue = $currentInputBox.val();
//alert(pastedValue);
        
//        if (pastedValue.length == 8 && intRegex.test(pastedValue)) {
            pasteValues(pastedValue);
//        }
//        else {
//            $this.val(originalValue);
//        }

        $inputs.attr("maxlength", 4);
    });
    
    $inputs.attr("maxlength", 32);
});


// Parses the individual digits into the individual boxes.
function pasteValues(element) {
    var values = element.split("");
        var $inputBox = $('.def-txt-input[name="account_number1"]');
        $inputBox.val(values[0]+values[1]);

        var $inputBox = $('.def-txt-input[name="account_number2"]');
        $inputBox.val(values[2]+values[3]+values[4]+values[5]);

        var $inputBox = $('.def-txt-input[name="account_number3"]');
        $inputBox.val(values[6]+values[7]+values[8]+values[9]);

        var $inputBox = $('.def-txt-input[name="account_number4"]');
        $inputBox.val(values[10]+values[11]+values[12]+values[13]);

        var $inputBox = $('.def-txt-input[name="account_number5"]');
        $inputBox.val(values[14]+values[15]+values[16]+values[17]);

        var $inputBox = $('.def-txt-input[name="account_number6"]');
        $inputBox.val(values[18]+values[19]+values[20]+values[21]);

        var $inputBox = $('.def-txt-input[name="account_number7"]');
        $inputBox.val(values[22]+values[23]+values[24]+values[25]);

/*    $(values).each(function(index) {
        var $inputBox = $('.def-txt-input[name="account_number' + (index + 1) + '"]');
        $inputBox.val(values[index])
    });
*/    
};
</script>



          <div class="form-group">
            <label class="mLbl">Payment </label>
            <input type="number" id="ember1438" class="ember-text-field form-control ember-view" value="" name="payment">
          </div>

          <div class="form-group" style="width: 100%;">
            <label>Title </label>
            <input type="text" class="ember-text-area form-control ember-view" name="title" value="">
          </div>

          <div class="form-group" style="width: 100%;">
            <label>Address </label>
            <textarea rows="3" id="ember1439" class="ember-text-area form-control ember-view"  name="address" style="width: 500px; height: 120px;"></textarea>
          </div>

          <div class="form-group">
            <label style="margin-bottom:0">Notification Mail Address </label>
            <div class="inlinehlptxt">The email address to which notifications related to this payment need to be sent. (Use commas to separate multiple email addresses)</div>
            <input type="email" id="ember1440" class="ember-text-field form-control ember-view"  name="email">
          </div>

        </div>

                  </div>

              <div class="modal-footer">  
    <button type="submit" id="ember1442" class="btn btn-primary ember-view" name="save_payment">    Save
</button>
      <button type="button" id="ember1443" class="btn btn-default ember-view" data-dismiss="modal">    Cancel
</button>
</div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ******************************** ADD MODEL *********************** -->



<!-- ******************************** ADD MODEL *********************** -->
<div id="myModals" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Payment</h4>
      </div>
      <div class="modal-body">
        <form class="form-vertical" action="" method="post">
                  <div class="modal-body">
                      <div id="ember1437" class="ember-view"><!----></div>
                      <div style="padding:0px 15px;" class="row">
          <div class="form-group">
            <label class="mLbl">Name </label>
            <input type="text" id="ember1438" class="ember-text-field form-control ember-view" value="<?php echo $rowsp['account_name']; ?>" name="name">
          </div>

          <div class="form-group">
            <label class="mLbl">Account Number </label>
<div class="bor">
    <input type="text" name="account_number1" class="inputs ember-text-field" data-maxlength="2" maxlength="2" style="width:30px" value="<?php echo substr($rowsp['account_number'],0,2); ?>">
    <input type="text" name="account_number2" class="inputs" data-maxlength="4" maxlength="4"  value="<?php echo substr($rowsp['account_number'],2,4); ?>">
    <input type="text" name="account_number3" class="inputs" data-maxlength="4" maxlength="4"  value="<?php echo substr($rowsp['account_number'],6,4); ?>">
    <input type="text" name="account_number4" class="inputs" data-maxlength="4" maxlength="4" value="<?php echo substr($rowsp['account_number'],10,4); ?>">
    <input type="text" name="account_number5" class="def-txt-input inputs" data-maxlength="4" maxlength="4" value="<?php echo substr($rowsp['account_number'],14,4); ?>">
    <input type="text" name="account_number6" class="def-txt-input inputs" data-maxlength="4" maxlength="4" value="<?php echo substr($rowsp['account_number'],18,4); ?>">
    <input type="text" name="account_number7" class="def-txt-input inputs" data-maxlength="4" maxlength="4" value="<?php echo substr($rowsp['account_number'],22,4); ?>">
</div>
          </div>

          <div class="form-group">
            <label class="mLbl">Payment </label>
            <input type="number" id="ember1438" class="ember-text-field form-control ember-view" value="<?php echo $rowsp['payment']; ?>" name="payment">
          </div>

          <div class="form-group" style="width: 100%;">
            <label>Title </label>
            <input type="text" class="ember-text-area form-control ember-view" name="title" value="<?php echo $rowsp['title']; ?>">
          </div>

          <div class="form-group" style="width: 100%;">
            <label>Address </label>
            <textarea rows="3" id="ember1439" class="ember-text-area form-control ember-view" name="address" style="width: 500px; height: 120px;"><?php echo $rowsp['address']; ?></textarea>
          </div>

          <div class="form-group">
            <label style="margin-bottom:0">Notification Mail Address </label>
            <div class="inlinehlptxt">The email address to which notifications related to this payment need to be sent. (Use commas to separate multiple email addresses)</div>
            <input type="email" id="ember1440" class="ember-text-field form-control ember-view" value="<?php echo $rowsp['email']; ?>" name="email">
          </div>

        </div>

                  </div>

              <div class="modal-footer">  
    <button type="submit" id="ember1442" class="btn btn-primary ember-view" name="edit_payment">    Save
</button>
      <button type="button" id="ember1443" class="btn btn-default ember-view" data-dismiss="modal">    Cancel
</button>
</div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ******************************** ADD MODEL *********************** -->



<!-- --------------------- --- MODEL BOX --- -------------------- --></body>
</html>

<script type="text/javascript">
    function sh_drpdwn_td(){
      // var a = document.getElementById('drp_dwn').value;
      // alert(a);
      if(document.getElementById('drp_dwn').value == '1'){
      document.getElementById('drp_dwn').value = '0';
      document.getElementById('drpdwn_td').style.display = 'block';
    }else{
      document.getElementById('drpdwn_td').style.display = 'none';
      document.getElementById('drp_dwn').value = '1';
    }
    }
</script>

<!-- ******************************** AMARJEET *********************** -->


<script>
setInterval(function(){ show_sound(); }, 1000);
show_sound();
function show_sound() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;
//alert(this.responseText);
  if(this.responseText>='1'){
playAudio();
no_sound();
}
          }
        };
        xmlhttp.open("GET", "512user_so342und.php?session_email=<?php echo $session_email; ?>&session_role=<?php echo $session_role; ?>", true);
        xmlhttp.send();
}
</script>




<script>
function no_sound(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;
//alert(this.responseText);

          }
        };
        xmlhttp.open("GET", "12user_12nosound.php?session_email=<?php echo $session_email; ?>&session_role=<?php echo $session_role; ?>", true);
        xmlhttp.send();


}

</script>


<audio id="myAudio">
  <source src="bringding.mp3" type="audio/mpeg">
  <source src="bringding.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

<script>
var x = document.getElementById("myAudio"); 
function playAudio() { 
    x.play(); 
} 

function pauseAudio() { 
    x.pause(); 
} 
</script>


<!-- ******************************** ACCOUNT NUMBER *********************** -->
<style type="text/css">
	.inputs{
    border:none;
    width:40px;
    height: 34px;
    padding: 6px 0px 6px 6px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
	}
	.bor{
		border: 1px solid #ccc;
	}
</style>

    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <Script>
        $(document).ready(function(){
            $(".inputs").keyup(function () {
                $this=$(this);
                if ($this.val().length >=$this.data("maxlength")) {
                  if($this.val().length>$this.data("maxlength")){
                    $this.val($this.val().substring(0,4));
                  }
                  $this.next(".inputs").focus();
                }
             });
        });
    </Script>
<!-- ******************************** ACCOUNT NUMBER *********************** -->

<!-- ******************************** AMARJEET *********************** -->