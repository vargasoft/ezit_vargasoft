<?php 
session_start();
function minify_output($buffer) {
    $search = array(
        '/\>[^\S ]+/s',     // Távolítsa el a szóközöket a tagok között
        '/[^\S ]+\</s',     // Távolítsa el a szóközöket a tagok előtt
        '/(\s)+/s'         // Több szóköz egy szóközre cserélése
    );
    $replace = array(
        '>',
        '<',
        '\\1'
    );
    $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}

ob_start('minify_output');

include('config/connect.php');
require_once('config/functions.php');

$fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$server = "http://localhost/miskolc-lakasfelujitas-miskolc.hu/";
$telefon = "+36 (30) 103-1740";

$owner = "Lipták Gábor";
$address = "3572, Sajólád, Móra Ferenc utca 5. ";
$adoszam = "43337668-1-25";

$facebook = 'https://www.facebook.com/KarpittisztitasMiskolcOn';

$alt = 'Lakásfelújítás Miskolc és környékén, konyha felújítás, fürdőszoba felújítás, nappali felújítás, hálószoba felújítás';
$title = "Lakásfelújítás Miskolc és környéke | Konyha, Fürdőszoba, Nappali és Hálószoba Felújítás";
$description = "Professzionális lakásfelújítás Miskolc és környékén. Szolgáltatásaink közé tartozik a konyha felújítása, fürdőszoba modernizálása, nappali átalakítása, valamint hálószoba felújítása. Gyors és hatékony megoldások, minőségi anyagok felhasználásával.";
$keywords = "lakásfelújítás, lakásfelújítás Miskolc, konyha felújítás, fürdőszoba felújítás, nappali felújítás, hálószoba felújítás, professzionális lakásfelújítás, gyors lakásfelújítás, lakásfelújító szolgáltatás, Miskolc és környéke, lakásfelújítás árak, minőségi lakásfelújítás, környezetbarát lakásfelújítás";

$small_logo = $server."assets/images/logo.png";
$medium_logo = $server."assets/images/medium_logo.png";
$big_logo = $server."assets/images/big_logo.png";

$short_title = "Kárpittisztítás Miskolcon és környékén";

$ip = $_SERVER['REMOTE_ADDR'];
list($zip_code, $city_name) = getZipCodeAndCity($ip);

if ($zip_code !== null && $city_name !== null) {
    $_SESSION['zip_code'] = $zip_code;
    $_SESSION['city_name'] = $city_name;
}

// Kezeld az operációs rendszert és a böngészőt
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$os = getOS($user_agent);
$browser_info = getBrowser();

// Mentsd el az adatokat a $_SESSION változókba
$_SESSION['os'] = $os;
$_SESSION['browser_name'] = $browser_info['name'];

// Egyéb adatok, amelyeket szeretnél $_SESSION-ba menteni
$_SESSION['ip'] = $ip;
$_SESSION['full_url'] = $fullUrl;

// Kiírd az adatokat
//echo $_SESSION['ip'] . ", " . $_SESSION['os'] . ", " . $_SESSION['city_name'] . ", " . $_SESSION['browser_name'] . ", " . $_SESSION['full_url'];



//print_r($_SESSION);
if($_SESSION['browser_name']!='Unknown'){
	write_log();
}

$email = "info@karpittisztitas-miskolc.hu";

// Az URL-ben lévő paraméterek kiolvasása
if (isset($_GET['gad_source'])) {
    $adwords = ' (Hirdetés)';
    // Hozzáadjuk az 'adwords' változót a session-höz
    $_SESSION['adwords'] = $adwords;
} else {
    $adwords = '';
    // Töröljük az 'adwords' változót a session-ből, ha nincs értéke
    unset($_SESSION['adwords']);
}

function generateOfferID() {
    // Az előtag
    $prefix = "#KAMI";
    
    // Dátum
    $date = date("Ymd");
    
    // Véletlenszerű 5 karakter hosszú rész létrehozása
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomPart = '';
    for ($i = 0; $i < 5; $i++) {
        $randomPart .= $characters[mt_rand(0, strlen($characters) - 1)];
    }
    
    // Az egyedi azonosító összeállítása
    $uniqueId = $prefix . "-" . $date . "-" . $randomPart;
    
    return $uniqueId;
}

$offerid = generateOfferID();

if (isset($_POST["call"])) {
    // Telefonszám beérkezett, hozzunk létre egy Bootstrap modal ablakot

    $to  = 'info@karpittisztitas-miskolc.hu';
    $subject = 'Visszahívást kértek ('.$_SERVER['SERVER_NAME'].')'.$adwords.'';
    $message = '

        <div class="raw-html-embed">
			<div data-template-type="html" class="ui-sortable">
				<center>
					<table data-group="Top Bars" data-module="Top Bar 1" data-thumbnail="https://editor.maool.com/images/starto/thumbnails/topBar-1.png" border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
						<tbody>
							<tr>
								<td data-bgcolor="Outer Bgcolor" align="center" valign="middle" bgcolor="#F1F1F1" style="background-color:#F1F1F1;">
									<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="row" style="width:600px;max-width:600px;">
										<tbody>
											<tr>
												<td data-bgcolor="Inner Bgcolor" align="center" bgcolor="#F1F1F1" style="background-color: #F1F1F1;">
													<table border="0" width="520" align="center" cellpadding="0" cellspacing="0" class="row" style="width:520px;max-width:520px;">
														<tbody>
															<tr>
																<td align="center" class="container-padding">
																	<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%; max-width:100%;">
																		<tbody>
																			<tr>
																				<td data-resizable-height="" style="font-size:10px;height:10px;line-height:10px;">&nbsp;</td>
																			</tr>
																			<tr>
																				<td data-text="Pre header Link" data-font="Secondary" align="right" valign="middle" class="center-text" style="font-size:12px;line-height:22px;font-weight:400;font-style:normal;color:#999999;text-decoration:none;letter-spacing:0;"=""="" contenteditable="true" data-gramm="false"></td>
																			</tr>
																			<tr>
																				<td data-resizable-height="" style="font-size:10px;height:10px;line-height:10px;">&nbsp;</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table data-group="Navigations" data-module="Navigation 1" data-thumbnail="" border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
						<tbody>
							<tr>
								<td data-bgcolor="Outer Bgcolor" align="center" valign="middle" bgcolor="#F1F1F1" style="background-color: #F1F1F1;">
									<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="row" style="width:600px;max-width:600px;">
										<tbody>
											<tr>
												<td data-bgcolor="Inner Bgcolor" align="center" bgcolor="#4B7BEC" style="background-color: #4B7BEC;">
													<table border="0" width="520" align="center" cellpadding="0" cellspacing="0" class="row" style="width:520px;max-width:520px;">
														<tbody>
															<tr>
																<td align="center" class="container-padding">
																	<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%; max-width:100%;">
																		<tbody>
																			<tr>
																				<td data-resizable-height="" style="font-size:60px;height:60px;line-height:60px;" class="spacer-first ui-resizable">
																					&nbsp;
																					<div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
																				</td>
																			</tr>
																			<tr>
																				<td height="90" align="center" valign="middle" class="autoheight">
																					<a href="https://www.karpittisztitas-miskolc.hu/" style="text-decoration:none;border:0px;">
																						<img data-image="Logo Img" src="https://karpittisztitas-miskolc.hu/assets/images/logo_feher.png" width="100%" border="0" alt="logo" style="width:450px;border:0px;display:inline-block!important;"></a>
																				</td>
																			</tr>
																			<tr>
																				<td data-resizable-height="" style="font-size:30px;height:30px;line-height:30px;" class="ui-resizable">
																					&nbsp;
																					<div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table data-group="Titles" data-module="Title 1" data-thumbnail="https://editor.maool.com/images/starto/thumbnails/title-1.png" border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;" class="">
						<tbody>
							<tr>
								<td data-bgcolor="Outer Bgcolor" align="center" valign="middle" bgcolor="#F1F1F1" style="background-color:#F1F1F1;">
									<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="row" style="width:600px;max-width:600px;">
										<tbody>
											<tr>
												<td data-bgcolor="Inner Bgcolor" align="center" bgcolor="#4B7BEC" style="background-color: #4B7BEC;">
													<table border="0" width="520" align="center" cellpadding="0" cellspacing="0" class="row" style="width:520px;max-width:520px;">
														<tbody>
															<tr>
																<td align="center" class="container-padding">
																	<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%;max-width:100%;">
																		<tbody>
																			<tr>
																				<td data-resizable-height="" style="font-size:30px;height:30px;line-height:30px;" class="spacer-first ui-resizable">
																					&nbsp;
																					<div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
																				</td>
																			</tr>
																			<tr>
																				<td data-text="Header Subtitle" data-font="Primary" align="left" valign="middle" style="color:#ffffff;font-size:22px;line-height:26px;font-weight:600;letter-spacing:0.5px;padding:0;padding-bottom:5px;"=""="" contenteditable="true" data-gramm="false">
																					Tisztelt Mata Oszkár!
																				</td>
																			</tr>
																			<tr>
																				<td data-text="Header Title" data-font="Primary" align="left" valign="middle" class="br-mobile-none" style="color:#ffffff;font-size:16px;line-height:25px;font-weight:300;letter-spacing:0px;padding:0px;padding-bottom:10px;"=""="" contenteditable="true" data-gramm="false" data-lm-text="true">
																					Weboldaláról visszahívási kérelem érkezett!<br>
																					Név: '.$_POST['name'].'<br>
																					Telefonszám: '.$_POST['phone'].'<br>
																				</td>
																				
																			</tr>
																			<tr>
																				<td align="left" valign="middle">
																					<table border="0" align="left" cellpadding="0" cellspacing="0">
																						<tbody>
																							<tr>
																								<td data-btn="Header Button" align="left" style="">
																									<p data-font="Primary" href="https://www.karpittisztitas-miskolc.hu/" style="color:#fff;font-size:16px;font-weight:600;letter-spacing:0.5px;line-height:24px;display:block;text-decoration:none;white-space:nowrap;"=""="">
																										<br>
																										Üdvözlettel,<br>
																										VargaSoft
																									</p>
																									<p data-font="Primary" href="https://www.karpittisztitas-miskolc.hu/" style="color:#fff;font-size:16px;font-weight:400;letter-spacing:0.5px;line-height:24px;display:block;text-decoration:none;white-space:nowrap;"=""="">
																										Varga Richárd<br>
																										Tel.: <a href="tel:+36 (30) 985-4281" style="color:#fff">+36 (30) 985-4281</a><br>
																										Email: <a href="mailto:info@vargasoft.hu" style="color:#fff">info@vargasoft.hu</a>
																									</p>
																								</td>
																							</tr>
																						</tbody>
																					</table>
																				</td>
																			</tr>
																			<tr>
																				<td data-resizable-height="" style="font-size:15px;height:15px;line-height:15px;" class="ui-resizable">
																					&nbsp;
																					<div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table data-group="Headers" data-module="Header 1" data-thumbnail="https://editor.maool.com/images/starto/thumbnails/header-1.png" border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;" class="selected-table">
						<tbody>
							<tr>
								<td data-bgcolor="Outer Bgcolor" align="center" valign="middle" bgcolor="#F1F1F1" style="background-color:#F1F1F1;">
									<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="row" style="width:600px;max-width:600px;">
										<tbody>
											<tr>
												<td data-bgcolor="Inner Bgcolor" align="center" bgcolor="#4B7BEC" style="background-color: #4B7BEC;">
													<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%; max-width:100%;">
														<tbody>
															<tr>
																<td align="center">
																	<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%;max-width:100%;">
																		<tbody>
																			<tr>
																				<td align="center" valign="middle" class="img-responsive"><img data-image="Hero Img" src="https://editor.maool.com/images/starto/hero@subscription-confirmation.png" border="0" width="600" alt="Header" style="display:inline-block!important;border:0;width:600px;max-width:600px;" data-lm-image="true"></td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					
					
				</center>
			</div>
		</div>

    ';

    // HTML e-mail küldés beállítása
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'To: Oszi <'.$to.'>' . "\r\n";
    $headers .= 'From: ' . $_SERVER['SERVER_NAME'] . ' <info@karpittisztitas-miskolc.hu>' . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo '
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("success").style.display = "block";
            });
        </script>
        ';

        // SMS küldés az adminnak
        $url = 'https://l3edpw.api.infobip.com/sms/2/text/advanced';
        $api_key = '06819aac6db852b2e297cfc2ed9d6a7f-1a07ebe0-929c-4c2b-9b1f-556d123bf112';
        $data = array(
            'messages' => array(
                array(
                    'destinations' => array(
                        array('to' => '36301031740')
                    ),
                    'from' => 'ServiceSMS',
                    'text' => 'Kedves Weboldal tulajdonos! Új visszahívás kérés érkezett weboldaláról.  ('.$_POST['phone'].')'
                )
            )
        );
        $payload = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: App ' . $api_key,
            'Content-Type: application/json',
            'Accept: application/json'
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // SMS küldés az ügyfélnek
        $dataCustomer = array(
            'messages' => array(
                array(
                    'destinations' => array(
                        array('to' => $_POST['phone'])
                    ),
                    'from' => 'ServiceSMS',
                    'text' => 'Kedves '.$_POST['name'].'! Köszönjük, hogy visszahívást kért a weboldalunkon. Hamarosan felkeressük Önt.'
                )
            )
        );
        $payloadCustomer = json_encode($dataCustomer);
        $chCustomer = curl_init($url);
        curl_setopt($chCustomer, CURLOPT_HTTPHEADER, array(
            'Authorization: App ' . $api_key,
            'Content-Type: application/json',
            'Accept: application/json'
        ));
        curl_setopt($chCustomer, CURLOPT_POST, 1);
        curl_setopt($chCustomer, CURLOPT_POSTFIELDS, $payloadCustomer);
        curl_setopt($chCustomer, CURLOPT_RETURNTRANSFER, true);
        $responseCustomer = curl_exec($chCustomer);
        curl_close($chCustomer);

    } else {
        // Sikertelen e-mail küldés esetén
        echo '
        <div class="ttm-topbar-content" style="text-align:center;">
            <h3 style="background-color: #f31717; color: white; padding: 10px;text-align:center">Valami hiba történt.</h3>
        </div>
        ';
        exit;
    }

    echo '

    <script type="text/javascript">
    ttq.track("ClickButton", {
    "contents": [
        {
            "content_id": "'.$_POST['phone'].'", // string. ID of the product. Example: "1077218".
            "content_type": "Visszahivas kerese", // string. Either product or product_group.
            "content_name": "'.$_POST['name'].'" // string. The name of the page or product. Example: "shirt".
        }
    ],
    "value": "<content_value>", // number. Value of the order or items sold. Example: 100.
    "currency": "<content_currency>" // string. The 4217 currency code. Example: "USD".
    });
    </script>';

    record_visszahivas($conn, $_POST['name'], $_POST['phone']);

    unset($_POST);
    header('Location: '.$server.'');
    exit();
}
    
//Levélküldés (árajánlatkérés)
	
if (isset($_POST["offer"])) {
		$offerids = str_replace('#', '', $offerid); // Távolítsuk el a '#' karaktert

		$servers = '/home/vargasoft/public_html/karpittisztitas-miskolc.hu/assets/';
		$targetDir = $servers . "images/arajanlatok/" . $offerids . "/";

		// Ellenőrizzük, hogy a mappa létezik-e, ha nem, akkor létrehozzuk
		if (!file_exists($targetDir)) {
			mkdir($targetDir, 0777, true);
		}

		if (!empty($_FILES['images']['name'][0])) {
			$totalFiles = count($_FILES['images']['name']);
			for ($i = 0; $i < $totalFiles; $i++) {
				$extension = pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);
				$newFileName = sprintf('%02d', $i + 1) . '.' . $extension; // Pl. 01.jpg, 02.jpg, stb.
				$targetFilePath = $targetDir . $newFileName;

				// Fájl feltöltése
				if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $targetFilePath)) {
					$uploadedImages[] = "assets/images/arajanlatok/$offerids/$newFileName";
					//echo "A(z) " . $_FILES['images']['name'][$i] . " sikeresen feltöltve mint " . $newFileName . ".<br>";
				} else {
					//echo "Hiba történt a(z) " . $_FILES['images']['name'][$i] . " feltöltése során.<br>";
				}
			}
			
			if (!empty($uploadedImages)){
				// Index.html generálása
				$indexHtmlContent = '<!DOCTYPE html>
				<html lang="hu">
				<head>
					<meta charset="UTF-8">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<title>Feltöltött képek</title>
					<style>
						.image-gallery {
							display: flex;
							flex-wrap: wrap;
						}
						.image-gallery .image-item {
							width: 200px;
							margin: 10px;
						}
						.image-gallery .image-item img {
							max-width: 100%;
							height: auto;
						}
					</style>
				</head>
				<body>
					<h1>Feltöltött képek</h1>
					<div class="image-gallery">';

				foreach ($uploadedImages as $imagePath) {
					$indexHtmlContent .= '<div class="image-item">
						<img src="' . $server.''.$imagePath . '" alt="Feltöltött kép">
					</div>';
				}

				$indexHtmlContent .= '</div>
				</body>
				</html>';

				file_put_contents($targetDir . 'index.html', $indexHtmlContent);
			}
		}
		
		// SMTP2GO API kulcs
		$apiKey = 'api-5DAD36821BAE4DEA9EC0B2AE7C8E98E2';
		$sender = 'Karpittisztitas Miskolc';
		// Első e-mail küldése
		$toInfo = 'info@karpittisztitas-miskolc.hu';
		$subjectInfo = 'Árajánlatkérés érkezett '.$offerid.' ('.$_SERVER['SERVER_NAME'].')';
		$messageInfo = '
			<div class="raw-html-embed">
				<div data-template-type="html" class="ui-sortable">
					<center>
						<table data-group="Top Bars" data-module="Top Bar 1" data-thumbnail="https://editor.maool.com/images/starto/thumbnails/topBar-1.png" border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
							<tbody>
								<tr>
									<td data-bgcolor="Outer Bgcolor" align="center" valign="middle" bgcolor="#F1F1F1" style="background-color:#F1F1F1;">
										<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="row" style="width:600px;max-width:600px;">
											<tbody>
												<tr>
													<td data-bgcolor="Inner Bgcolor" align="center" bgcolor="#F1F1F1" style="background-color: #F1F1F1;">
														<table border="0" width="520" align="center" cellpadding="0" cellspacing="0" class="row" style="width:520px;max-width:520px;">
															<tbody>
																<tr>
																	<td align="center" class="container-padding">
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%; max-width:100%;">
																			<tbody>
																				<tr>
																					<td data-resizable-height="" style="font-size:10px;height:10px;line-height:10px;">&nbsp;</td>
																				</tr>
																				<tr>
																					<td data-text="Pre header Link" data-font="Secondary" align="right" valign="middle" class="center-text" style="font-size:12px;line-height:22px;font-weight:400;font-style:normal;color:#999999;text-decoration:none;letter-spacing:0;"="" contenteditable="true" data-gramm="false"></td>
																				</tr>
																				<tr>
																					<td data-resizable-height="" style="font-size:10px;height:10px;line-height:10px;">&nbsp;</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						<table data-group="Navigations" data-module="Navigation 1" data-thumbnail="" border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
							<tbody>
								<tr>
									<td data-bgcolor="Outer Bgcolor" align="center" valign="middle" bgcolor="#F1F1F1" style="background-color: #F1F1F1;">
										<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="row" style="width:600px;max-width:600px;">
											<tbody>
												<tr>
													<td data-bgcolor="Inner Bgcolor" align="center" bgcolor="#4B7BEC" style="background-color: #4B7BEC;">
														<table border="0" width="520" align="center" cellpadding="0" cellspacing="0" class="row" style="width:520px;max-width:520px;">
															<tbody>
																<tr>
																	<td align="center" class="container-padding">
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%; max-width:100%;">
																			<tbody>
																				<tr>
																					<td data-resizable-height="" style="font-size:60px;height:60px;line-height:60px;" class="spacer-first ui-resizable">
																						&nbsp;
																						<div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
																					</td>
																				</tr>
																				<tr>
																					<td height="90" align="center" valign="middle" class="autoheight">
																						<a href="https://www.karpittisztitas-miskolc.hu/" style="text-decoration:none;border:0px;">
																							<img data-image="Logo Img" src="https://karpittisztitas-miskolc.hu/assets/images/logo_feher.png" width="100%" border="0" alt="logo" style="width:450px;border:0px;display:inline-block!important;"></a></td>
																				</tr>
																				<tr>
																					<td data-resizable-height="" style="font-size:30px;height:30px;line-height:30px;" class="ui-resizable">
																						&nbsp;
																						<div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						<table data-group="Titles" data-module="Title 1" data-thumbnail="https://editor.maool.com/images/starto/thumbnails/title-1.png" border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;" class="">
							<tbody>
								<tr>
									<td data-bgcolor="Outer Bgcolor" align="center" valign="middle" bgcolor="#F1F1F1" style="background-color:#F1F1F1;">
										<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="row" style="width:600px;max-width:600px;">
											<tbody>
												<tr>
													<td data-bgcolor="Inner Bgcolor" align="center" bgcolor="#4B7BEC" style="background-color: #4B7BEC;">
														<table border="0" width="520" align="center" cellpadding="0" cellspacing="0" class="row" style="width:520px;max-width:520px;">
															<tbody>
																<tr>
																	<td align="center" class="container-padding">
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%;max-width:100%;">
																			<tbody>
																				<tr>
																					<td data-resizable-height="" style="font-size:30px;height:30px;line-height:30px;" class="spacer-first ui-resizable">
																						&nbsp;
																						<div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
																					</td>
																				</tr>
																				<tr>
																					<td data-text="Header Subtitle" data-font="Primary" align="left" valign="middle" style="color:#ffffff;font-size:22px;line-height:26px;font-weight:600;letter-spacing:0.5px;padding:0;padding-bottom:5px;"=""="" contenteditable="true" data-gramm="false">
																						Tisztelt Mata Oszkár!
																					</td>
																				</tr>
																				<tr>
																					<td data-text="Header Title" data-font="Primary" align="left" valign="middle" class="br-mobile-none" style="color:#ffffff;font-size:16px;line-height:25px;font-weight:300;letter-spacing:0px;padding:0px;padding-bottom:10px;"=""="" contenteditable="true" data-gramm="false" data-lm-text="true">
																						Weboldaláról új árajánlatkérés érkezett. Az árajánlatkérés azonosítója: <br />
																						<a style="color:#fff;font-size:22px;align:center">'.$offerid.'</a><br />
																						Az árajánlatkérés részleteit lentebb ovashatja. Amennyiben az érdeklődőnek választ ír, kérem a levelében erre az azonosítóra hivatkozzon: '.$offerid.'<br />
																						Az ügyfél szintén kapott egy másolatot az elküldött árajánlatról.
																					</td>
																					
																				</tr>
																				<tr>
																					<td align="left" valign="middle">
																						<table border="0" align="left" cellpadding="0" cellspacing="0">
																							<tbody>
																								<tr>
																									<td data-btn="Header Button" align="left" style="">
																										<p data-font="Primary" href="https://www.karpittisztitas-miskolc.hu/" style="color:#fff;font-size:16px;font-weight:600;letter-spacing:0.5px;line-height:24px;display:block;text-decoration:none;white-space:nowrap;"="">
																											<br />
																											Üdvözlettel,<br />
																											VargaSoft
																										</p>
																										<p data-font="Primary" href="https://www.karpittisztitas-miskolc.hu/" style="color:#fff;font-size:16px;font-weight:400;letter-spacing:0.5px;line-height:24px;display:block;text-decoration:none;white-space:nowrap;"="">
																											Varga Richárd<br />
																											Tel.: <a href="tel:+36 (30) 985-4281" style="color:#fff">+36 (30) 985-4281</a><br />
																											Email: <a href="mailto:info@vargasoft.hu" style="color:#fff">info@vargasoft.hu</a>
																										</p>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</td>
																				</tr>
																				<tr>
																					<td data-resizable-height="" style="font-size:15px;height:15px;line-height:15px;" class="ui-resizable">
																						&nbsp;
																						<div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						<table data-group="Headers" data-module="Header 1" data-thumbnail="https://editor.maool.com/images/starto/thumbnails/header-1.png" border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;" class="selected-table">
							<tbody>
								<tr>
									<td data-bgcolor="Outer Bgcolor" align="center" valign="middle" bgcolor="#F1F1F1" style="background-color:#F1F1F1;">
										<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="row" style="width:600px;max-width:600px;">
											<tbody>
												<tr>
													<td data-bgcolor="Inner Bgcolor" align="center" bgcolor="#4B7BEC" style="background-color: #4B7BEC;">
														<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%; max-width:100%;">
															<tbody>
																<tr>
																	<td align="center">
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%;max-width:100%;">
																			<tbody>
																				<tr>
																					<td align="center" valign="middle" class="img-responsive"><img data-image="Hero Img" src="https://editor.maool.com/images/starto/hero@subscription-confirmation.png" border="0" width="600" alt="Header" style="display:inline-block!important;border:0;width:600px;max-width:600px;" data-lm-image="true"></td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						
						
					   
						<table data-group="Buttons" data-module="Button 1" data-thumbnail="https://editor.maool.com/images/starto/thumbnails/button-1.png" border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
							<tbody>
								<tr>
									<td data-bgcolor="Outer Bgcolor" align="center" valign="middle" bgcolor="#F1F1F1" style="background-color: #F1F1F1;">
										<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="row" style="width:600px;max-width:600px;">
											<tbody>
												<tr>
													<td data-bgcolor="Inner Bgcolor" align="center" bgcolor="#FFFFFF" style="background-color:#FFFFFF;">
														<table border="0" width="520" align="center" cellpadding="0" cellspacing="0" class="row" style="width:520px;max-width:520px;">
															<tbody>
																<tr>
																	<td align="center" class="container-padding">
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%; max-width:100%;">
																			<tbody>
																				<tr>
																					<td data-resizable-height="" style="font-size:20px;height:20px;line-height:20px;">&nbsp;</td>
																				</tr>
																				<tr>
																					<td align="center" valign="middle">
																						<table border="0" align="center" cellpadding="0" cellspacing="0">
																							<tbody>
																								<tr>
																									<td data-btn="Button" align="center" style="">
																										<a data-font="Primary" href="https://www.karpittisztitas-miskolc.hu/" style="font-size:20px;font-weight:600;letter-spacing:0.5px;line-height:24px;display:block;padding:16px="" 60px="" 16px="" 60px;text-decoration:none;white-space:nowrap;"="">
																											Árajánlatkérés részletei
																										</a>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</td>
																				</tr>
																				<tr>
																					<td data-resizable-height="" style="font-size:30px;height:30px;line-height:30px;">&nbsp;</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					   
						<table data-group="Contents" data-module="Content 10" data-thumbnail="https://editor.maool.com/images/starto/thumbnails/content-10.png" border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
							<tbody>
								<tr>
									<td data-bgcolor="Outer Bgcolor" align="center" valign="middle" bgcolor="#F1F1F1" style="background-color: #F1F1F1;">
										<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="row" style="width:600px;max-width:600px;">
											<tbody>
												<tr>
													<td data-bgcolor="Inner Bgcolor" align="center" bgcolor="#FFFFFF" style="background-color:#FFFFFF;">
														<table border="0" width="520" align="center" cellpadding="0" cellspacing="0" class="row" style="width:520px;max-width:520px;">
															<tbody>
																<tr>
																	<td align="center" class="container-padding">
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%; max-width:100%;">
																			<tbody>
																				<tr>
																					<td data-resizable-height="" style="font-size:15px;height:15px;line-height:15px;">&nbsp;</td>
																				</tr>
																				<tr>
																					<td data-text="Description" data-font="Primary" align="left" valign="middle" class="center-text" style="color:#595959;font-size:16px;line-height:26px;font-weight:400;letter-spacing:0px;"="" contenteditable="true" data-gramm="false">
																						Azonosító: <a style="color:black;font-size:22px">'.$offerid.'</a><br />
																						Név: '.$_POST['name'].'<br />
																						Cím: '.$address.'<br />
																						Telefonszám: <a href="tel:'.$_POST['phone'].'" style="color:black">'.$_POST['phone'].'</a><br />
																						Email: <a href="mailto:'.$_POST['email'].'" style="color:black">'.$_POST['email'].'</a><br />
																						Kiválasztott szolgáltatás: '.$_POST['service'].'<br />
																						Üzenet: '.$_POST['message'].'<br />
																						<hr />
																						
																						<p style="color:black;font-size:22px">Feltöltött képek megtekintése:</p><br />
																						<a href="https://www.karpittisztitas-miskolc.hu/assets/images/arajanlatok/'.$offerids.'/" target="_blank">Képek</a>
																					</td>
																					
																				</tr>
																				
																				<tr>
																					<td data-resizable-height="" style="font-size:30px;height:30px;line-height:30px;">&nbsp;</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						
					</center>
				</div>
			</div>
		';
		
		$data = [
			"sender" => "Karpittisztitas Miskolc <info@karpittisztitas-miskolc.hu>",
			"to" => [$toInfo],
			"subject" => $subjectInfo,
			"html_body" => $messageInfo
		];

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://api.smtp2go.com/v3/email/send');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Content-Type: application/json',
			'X-Smtp2go-Api-Key: ' . $apiKey,
			'accept: application/json'
		]);

		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		} else {
			echo 'Message has been sent';
		}

		curl_close($ch);

		// Második e-mail küldése az ügyfélnek
		$toCustomer = $_POST['email'];
		$subjectCustomer = 'Árajánlatkérését megkaptuk ('.$offerid.')';
		$messageCustomer = '
		
			<div class="raw-html-embed">
				<div data-template-type="html" class="ui-sortable">
					<center>
						<table data-group="Top Bars" data-module="Top Bar 1" data-thumbnail="https://editor.maool.com/images/starto/thumbnails/topBar-1.png" border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
							<tbody>
								<tr>
									<td data-bgcolor="Outer Bgcolor" align="center" valign="middle" bgcolor="#F1F1F1" style="background-color:#F1F1F1;">
										<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="row" style="width:600px;max-width:600px;">
											<tbody>
												<tr>
													<td data-bgcolor="Inner Bgcolor" align="center" bgcolor="#F1F1F1" style="background-color: #F1F1F1;">
														<table border="0" width="520" align="center" cellpadding="0" cellspacing="0" class="row" style="width:520px;max-width:520px;">
															<tbody>
																<tr>
																	<td align="center" class="container-padding">
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%; max-width:100%;">
																			<tbody>
																				<tr>
																					<td data-resizable-height="" style="font-size:10px;height:10px;line-height:10px;">&nbsp;</td>
																				</tr>
																				<tr>
																					<td data-text="Pre header Link" data-font="Secondary" align="right" valign="middle" class="center-text" style="font-size:12px;line-height:22px;font-weight:400;font-style:normal;color:#999999;text-decoration:none;letter-spacing:0;"="" contenteditable="true" data-gramm="false"></td>
																				</tr>
																				<tr>
																					<td data-resizable-height="" style="font-size:10px;height:10px;line-height:10px;">&nbsp;</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						<table data-group="Navigations" data-module="Navigation 1" data-thumbnail="" border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
							<tbody>
								<tr>
									<td data-bgcolor="Outer Bgcolor" align="center" valign="middle" bgcolor="#F1F1F1" style="background-color: #F1F1F1;">
										<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="row" style="width:600px;max-width:600px;">
											<tbody>
												<tr>
													<td data-bgcolor="Inner Bgcolor" align="center" bgcolor="#4B7BEC" style="background-color: #4B7BEC;">
														<table border="0" width="520" align="center" cellpadding="0" cellspacing="0" class="row" style="width:520px;max-width:520px;">
															<tbody>
																<tr>
																	<td align="center" class="container-padding">
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%; max-width:100%;">
																			<tbody>
																				<tr>
																					<td data-resizable-height="" style="font-size:60px;height:60px;line-height:60px;" class="spacer-first ui-resizable">
																						&nbsp;
																						<div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
																					</td>
																				</tr>
																				<tr>
																					<td height="90" align="center" valign="middle" class="autoheight">
																						<a href="https://www.karpittisztitas-miskolc.hu/" style="text-decoration:none;border:0px;">
																							<img data-image="Logo Img" src="https://karpittisztitas-miskolc.hu/assets/images/logo_feher.png" width="100%" border="0" alt="logo" style="width:450px;border:0px;display:inline-block!important;"></a></td>
																				</tr>
																				<tr>
																					<td data-resizable-height="" style="font-size:30px;height:30px;line-height:30px;" class="ui-resizable">
																						&nbsp;
																						<div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						<table data-group="Titles" data-module="Title 1" data-thumbnail="https://editor.maool.com/images/starto/thumbnails/title-1.png" border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;" class="">
							<tbody>
								<tr>
									<td data-bgcolor="Outer Bgcolor" align="center" valign="middle" bgcolor="#F1F1F1" style="background-color:#F1F1F1;">
										<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="row" style="width:600px;max-width:600px;">
											<tbody>
												<tr>
													<td data-bgcolor="Inner Bgcolor" align="center" bgcolor="#4B7BEC" style="background-color: #4B7BEC;">
														<table border="0" width="520" align="center" cellpadding="0" cellspacing="0" class="row" style="width:520px;max-width:520px;">
															<tbody>
																<tr>
																	<td align="center" class="container-padding">
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%;max-width:100%;">
																			<tbody>
																				<tr>
																					<td data-resizable-height="" style="font-size:30px;height:30px;line-height:30px;" class="spacer-first ui-resizable">
																						&nbsp;
																						<div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
																					</td>
																				</tr>
																				<tr>
																					<td data-text="Header Subtitle" data-font="Primary" align="left" valign="middle" style="color:#ffffff;font-size:22px;line-height:26px;font-weight:600;letter-spacing:0.5px;padding:0;padding-bottom:5px;"=""="" contenteditable="true" data-gramm="false">
																						Kedves '.$_POST['name'].'!
																					</td>
																				</tr>
																				<tr>
																					<td data-text="Header Title" data-font="Primary" align="left" valign="middle" class="br-mobile-none" style="color:#ffffff;font-size:16px;line-height:25px;font-weight:300;letter-spacing:0px;padding:0px;padding-bottom:10px;"=""="" contenteditable="true" data-gramm="false" data-lm-text="true">
																						Árajánlatkérését megkaptuk. Kollégánk az árajánlatkérés feldolgozása után megadott elérhetősége egyikén keresni fogja.
																						Amennyiben kérdése vagy észrevétele van, kérem a levélben tüntesse fel <br />az árajánlat azonosítóját, amely: <a style="color:#fff;font-size:22px">'.$offerid.'</a>
																					</td>
																					
																				</tr>
																				<tr>
																					<td align="left" valign="middle">
																						<table border="0" align="left" cellpadding="0" cellspacing="0">
																							<tbody>
																								<tr>
																									<td data-btn="Header Button" align="left" style="">
																										<p data-font="Primary" href="https://www.karpittisztitas-miskolc.hu/" style="color:#fff;font-size:16px;font-weight:600;letter-spacing:0.5px;line-height:24px;display:block;text-decoration:none;white-space:nowrap;"="">
																											<br />
																											Üdvözlettel,<br />
																											Kárpittisztítás Miskolc
																										</p>
																										<p data-font="Primary" href="https://www.karpittisztitas-miskolc.hu/" style="color:#fff;font-size:16px;font-weight:400;letter-spacing:0.5px;line-height:24px;display:block;text-decoration:none;white-space:nowrap;"="">
																											Mata Oszkár<br />
																											Tel.: <a href="tel:+36 (30) 103-1740" style="color:#fff">+36 (30) 103-1740</a><br />
																											Email: <a href="mailto:info@karpittisztitas-miskolc.hu" style="color:#fff">info@karpittisztitas-miskolc.hu</a>
																										</p>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</td>
																				</tr>
																				<tr>
																					<td data-resizable-height="" style="font-size:15px;height:15px;line-height:15px;" class="ui-resizable">
																						&nbsp;
																						<div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						<table data-group="Headers" data-module="Header 1" data-thumbnail="https://editor.maool.com/images/starto/thumbnails/header-1.png" border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;" class="selected-table">
							<tbody>
								<tr>
									<td data-bgcolor="Outer Bgcolor" align="center" valign="middle" bgcolor="#F1F1F1" style="background-color:#F1F1F1;">
										<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="row" style="width:600px;max-width:600px;">
											<tbody>
												<tr>
													<td data-bgcolor="Inner Bgcolor" align="center" bgcolor="#4B7BEC" style="background-color: #4B7BEC;">
														<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%; max-width:100%;">
															<tbody>
																<tr>
																	<td align="center">
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%;max-width:100%;">
																			<tbody>
																				<tr>
																					<td align="center" valign="middle" class="img-responsive"><img data-image="Hero Img" src="https://editor.maool.com/images/starto/hero@subscription-confirmation.png" border="0" width="600" alt="Header" style="display:inline-block!important;border:0;width:600px;max-width:600px;" data-lm-image="true"></td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						
						
					   
						<table data-group="Buttons" data-module="Button 1" data-thumbnail="https://editor.maool.com/images/starto/thumbnails/button-1.png" border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
							<tbody>
								<tr>
									<td data-bgcolor="Outer Bgcolor" align="center" valign="middle" bgcolor="#F1F1F1" style="background-color: #F1F1F1;">
										<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="row" style="width:600px;max-width:600px;">
											<tbody>
												<tr>
													<td data-bgcolor="Inner Bgcolor" align="center" bgcolor="#FFFFFF" style="background-color:#FFFFFF;">
														<table border="0" width="520" align="center" cellpadding="0" cellspacing="0" class="row" style="width:520px;max-width:520px;">
															<tbody>
																<tr>
																	<td align="center" class="container-padding">
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%; max-width:100%;">
																			<tbody>
																				<tr>
																					<td data-resizable-height="" style="font-size:20px;height:20px;line-height:20px;">&nbsp;</td>
																				</tr>
																				<tr>
																					<td align="center" valign="middle">
																						<table border="0" align="center" cellpadding="0" cellspacing="0">
																							<tbody>
																								<tr>
																									<td data-btn="Button" align="center" style="">
																										<a data-font="Primary" href="https://www.karpittisztitas-miskolc.hu/" style="font-size:20px;font-weight:600;letter-spacing:0.5px;line-height:24px;display:block;padding:16px="" 60px="" 16px="" 60px;text-decoration:none;white-space:nowrap;"="">
																											Árajánlatkérés részletei
																										</a>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</td>
																				</tr>
																				<tr>
																					<td data-resizable-height="" style="font-size:30px;height:30px;line-height:30px;">&nbsp;</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					   
						<table data-group="Contents" data-module="Content 10" data-thumbnail="https://editor.maool.com/images/starto/thumbnails/content-10.png" border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
							<tbody>
								<tr>
									<td data-bgcolor="Outer Bgcolor" align="center" valign="middle" bgcolor="#F1F1F1" style="background-color: #F1F1F1;">
										<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="row" style="width:600px;max-width:600px;">
											<tbody>
												<tr>
													<td data-bgcolor="Inner Bgcolor" align="center" bgcolor="#FFFFFF" style="background-color:#FFFFFF;">
														<table border="0" width="520" align="center" cellpadding="0" cellspacing="0" class="row" style="width:520px;max-width:520px;">
															<tbody>
																<tr>
																	<td align="center" class="container-padding">
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="width:100%; max-width:100%;">
																			<tbody>
																				<tr>
																					<td data-resizable-height="" style="font-size:15px;height:15px;line-height:15px;">&nbsp;</td>
																				</tr>
																				<tr>
																					<td data-text="Description" data-font="Primary" align="left" valign="middle" class="center-text" style="color:#595959;font-size:16px;line-height:26px;font-weight:400;letter-spacing:0px;"="" contenteditable="true" data-gramm="false">
																						Azonosító: <a style="color:black;font-size:22px">'.$offerid.'</a><br />
																						Név: '.$_POST['name'].'<br />
																						Cím: '.$address.'<br />
																						Telefonszám: <a href="tel:'.$_POST['phone'].'" style="color:black">'.$_POST['phone'].'</a><br />
																						Email: <a href="mailto:'.$_POST['email'].'" style="color:black">'.$_POST['email'].'</a><br />
																						Kiválasztott szolgáltatás: '.$_POST['service'].'<br />
																						Üzenet: '.$_POST['message'].'<br />
																					</td>
																				</tr>
																				<tr>
																					<td data-resizable-height="" style="font-size:30px;height:30px;line-height:30px;">&nbsp;</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						
					</center>
				</div>
			</div>
		';

		$data = [
			"sender" => "Karpittisztitas Miskolc <info@karpittisztitas-miskolc.hu>",
			"to" => [$toCustomer],
			"subject" => $subjectCustomer,
			"html_body" => $messageCustomer
		];

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://api.smtp2go.com/v3/email/send');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Content-Type: application/json',
			'X-Smtp2go-Api-Key: ' . $apiKey,
			'accept: application/json'
		]);

		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		} else {
			echo '
				<script type="text/javascript">
					document.addEventListener("DOMContentLoaded", function () {
						document.getElementById("success").style.display = "block";
					});
				</script>
			';



			//SMS küldés
			// Infobip API végpont URL
			$url = 'https://l3edpw.api.infobip.com/sms/2/text/advanced';

			// Infobip API kulcsa
			$api_key = '06819aac6db852b2e297cfc2ed9d6a7f-1a07ebe0-929c-4c2b-9b1f-556d123bf112';

			// SMS üzenet adatai
			$data = array(
				'messages' => array(
					array(
						'destinations' => array(
							array('to' => '36301031740')
						),
						'from' => 'ServiceSMS',
						'text' => 'Kedves Weboldal tulajdonos! Új árajánlatkérés kérés érkezett weboldaláról (Azonosító: '.$offerid.') ('.$_SERVER['SERVER_NAME'].')'
					)
				)
			);

			// JSON formátumú adatok elküldése
			$payload = json_encode($data);

			// curl inicializálása
			$ch = curl_init($url);

			// curl beállítások
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Authorization: App ' . $api_key,
				'Content-Type: application/json',
				'Accept: application/json'
			));
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			// curl hívás végrehajtása
			$response = curl_exec($ch);

			// curl hívás eredményének kiírása
			//echo $response;

			// curl bezárása
			curl_close($ch);
		}

		curl_close($ch);
		
    
	record_ajanlatkeres($conn, $offerid, $typ, $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['service'], $_POST['message']);
	
	unset($_POST);
	header('Location: '.$server.'?result=success');
    exit();
}


function isMobileDevice() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}



?>
<!DOCTYPE html>

<html lang="hu">

<head>
<meta charset="utf-8">
	<!--basic tags-->
	<title><?php echo $title;?></title>

	<!--seo-->
	<meta property="og:description" content="<?php echo $description;?>">
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?php echo $server;?>">
	<meta property="og:image" content="<?php echo $medium_logo;?>">
	<meta property="og:site_name" content="<?php echo $title;?>">
	<meta property="og:locale" content="hu_HU">
	<meta property="og:keywords" content="<?php echo $description;?>">
	<meta property="fb:app_id" content="1002396794255553">

	<meta name="DC.title" content="<?php echo $title;?>">
	<meta name="DC.description" content="<?php echo $description;?>">
	<meta name="DC.publisher" content="VargaSoft">
	<meta name="DC.date" content="2024-06-06">
	<meta name="DC.language" content="hu">
	<meta name="DC.subject" content="<?php echo $keywords;?>">

	<meta name="sitemap" content="<?php echo $server;?>sitemap.xml">
	<meta name="robots" content="index, follow">


	<meta property="article:published_time" content="2024-07-20T07:55:54+01:00">
	<meta property="article:modified_time" content="2024-07-21T14:22:20+01:00">

	<!-- Stylesheets -->
	<link href="<?php echo $server;?>css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $server;?>plugins/revolution/css/settings.css" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
	<link href="<?php echo $server;?>plugins/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
	<link href="<?php echo $server;?>plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->

	<link href="<?php echo $server;?>css/style.css" rel="stylesheet">
	<link href="<?php echo $server;?>css/responsive.css" rel="stylesheet">

	<!--favicon-->
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $server;?>images/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $server;?>images/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $server;?>images/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $server;?>images/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $server;?>images/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $server;?>images/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $server;?>images/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $server;?>images/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $server;?>images/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $server;?>images/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $server;?>images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $server;?>images/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $server;?>images/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo $server;?>images/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo $server;?>images/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<!-- Responsive -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<!--disable click-->
	

	<!-- structured data-->
	<script type="application/ld+json">
		{
		"@context": "http://schema.org",
		"@type": "LocalBusiness",
		"name": "Lakásfelújítás Miskolc és környéke",
		"description": "<?php echo $description;?>",
		"telephone": "<?php echo $telefon;?>",
		"sameAs": ["<?php echo $server;?>"],
		"priceRange": "$$$",
		"url": "<?php echo $server;?>",
		"logo": "<?php echo $medium_logo;?>",
		"image": "<?php echo $medium_logo;?>",
		"founder": {
			"@type": "Person",
			"name": "Mata Oszkár e.V."
		},
		"address": {
			"@type": "PostalAddress",
			"streetAddress": "Móra Ferenc utca 5.",
			"addressLocality": "Sajólád",
			"postalCode": "3572",
			"addressCountry": "Magyarország"
		},
		"contactPoint": {
			"@type": "ContactPoint",
			"telephone": "<?php echo $telefon;?>",
			"contactType": "customer service"
		},
		"keywords": "<?php echo $keywords;?>",
		"openingHoursSpecification": [
			{
			"@type": "OpeningHoursSpecification",
			"dayOfWeek": [
				"Monday",
				"Tuesday",
				"Wednesday",
				"Thursday",
				"Friday"
			],
			"opens": "07:00",
			"closes": "17:00"
			},
			{
			"@type": "OpeningHoursSpecification",
			"dayOfWeek": [
				"Saturday",
				"Sunday"
			],
			"opens": "09:00",
			"closes": "14:00"
			}
		],
		"geo": {
			"@type": "GeoCoordinates",
			"latitude": "48.035540",
			"longitude": "20.902110"
		},
		"aggregateRating": {
			"@type": "AggregateRating",
			"ratingValue": "4.93",
			"ratingCount": "710"
		},
		"review": [
			{
			"@type": "Review",
			"author": "Kiss Mária",
			"datePublished": "2024-04-17",
			"name": "Kiváló konyhafelújítás!",
			"reviewBody": "A konyhafelújítás gyorsan és profi módon zajlott le, az eredmény fantasztikus!",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.8"
			}
			},
			{
			"@type": "Review",
			"author": "Nagy Péter",
			"datePublished": "2024-04-20",
			"name": "Gyors és megbízható",
			"reviewBody": "Nagyon gyorsan és precízen dolgoztak a fürdőszoba felújításán, maximálisan elégedett vagyok.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.9"
			}
			},
			{
			"@type": "Review",
			"author": "Szabó János",
			"datePublished": "2024-05-02",
			"name": "Kiváló minőség",
			"reviewBody": "A nappali felújítása során minden részletre odafigyeltek, az eredmény kiváló.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "5.0"
			}
			},
			{
			"@type": "Review",
			"author": "Kovács Anna",
			"datePublished": "2024-05-05",
			"name": "Professzionális munka",
			"reviewBody": "Nagyon alapos munkát végeztek a hálószoba felújításán, minden részlet tökéletes lett.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.7"
			}
			},
			{
			"@type": "Review",
			"author": "Tóth Gábor",
			"datePublished": "2024-05-08",
			"name": "Megbízható szolgáltatás",
			"reviewBody": "Ajánlom mindenkinek, aki minőségi lakásfelújítást keres.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.6"
			}
			},
			{
			"@type": "Review",
			"author": "Molnár István",
			"datePublished": "2024-05-11",
			"name": "Tökéletes eredmény",
			"reviewBody": "Nagyon elégedett vagyok a nappali felújításának végeredményével, minden ragyogó.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.8"
			}
			},
			{
			"@type": "Review",
			"author": "Horváth Éva",
			"datePublished": "2024-05-14",
			"name": "Kitűnő szolgáltatás",
			"reviewBody": "Gyorsan reagáltak és precízen dolgoztak a konyhafelújítás során.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.9"
			}
			},
			{
			"@type": "Review",
			"author": "Fekete Péter",
			"datePublished": "2024-05-17",
			"name": "Csodálatos munka",
			"reviewBody": "Nagyon profi csapat, a fürdőszoba felújítása lenyűgöző lett.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.7"
			}
			},
			{
			"@type": "Review",
			"author": "Kissné Szilvia",
			"datePublished": "2024-05-20",
			"name": "Tökéletes kiszolgálás",
			"reviewBody": "Kedves és segítőkész személyzet, a hálószoba felújítása kiváló lett.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.9"
			}
			},
			{
			"@type": "Review",
			"author": "Simon András",
			"datePublished": "2024-05-23",
			"name": "Nagyszerű tapasztalat",
			"reviewBody": "A konyha felújítása után minden olyan, mintha új lenne. Köszönöm!",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.8"
			}
			},
			{
			"@type": "Review",
			"author": "Kisné Júlia",
			"datePublished": "2024-05-26",
			"name": "Kiemelkedő munka",
			"reviewBody": "Nagyon elégedett vagyok, és biztosan újra igénybe fogom venni a szolgáltatásukat a nappali felújítására.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.9"
			}
			},
			{
			"@type": "Review",
			"author": "Nagy Gergő",
			"datePublished": "2024-05-29",
			"name": "Gyors és hatékony",
			"reviewBody": "Nagyon profi csapat, és a hálószoba felújítása is kiváló lett.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.7"
			}
			},
			{
			"@type": "Review",
			"author": "Király Dóra",
			"datePublished": "2024-06-01",
			"name": "Kiváló szolgáltatás",
			"reviewBody": "Nagyon elégedett vagyok a fürdőszoba felújításának végeredményével.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.8"
			}
			},
			{
			"@type": "Review",
			"author": "Mészáros Péter",
			"datePublished": "2024-06-04",
			"name": "Nagyon elégedett vagyok",
			"reviewBody": "Profik és a hálószoba felújítás végeredménye is kitűnő.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.9"
			}
			},
			{
			"@type": "Review",
			"author": "Balogh Katalin",
			"datePublished": "2024-06-07",
			"name": "Rendkívül elégedett vagyok",
			"reviewBody": "A szolgáltatás kiváló, és a konyhafelújítás eredménye még annál is jobb!",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.8"
			}
			},
			{
			"@type": "Review",
			"author": "Török Béla",
			"datePublished": "2024-06-10",
			"name": "Nagyon jó szolgáltatás",
			"reviewBody": "Gyorsan és hatékonyan dolgoztak a nappali felújításán, most újnak néz ki.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.7"
			}
			},
			{
			"@type": "Review",
			"author": "Varga Zsolt",
			"datePublished": "2024-06-13",
			"name": "Fantasztikus eredmény",
			"reviewBody": "A fürdőszoba most olyan, mintha épp most hoztuk volna haza az új berendezéseket.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.9"
			}
			},
			{
			"@type": "Review",
			"author": "Kovácsné Ilona",
			"datePublished": "2024-06-16",
			"name": "Kiemelkedő teljesítmény",
			"reviewBody": "Nagyon elégedett vagyok a szolgáltatással, és a hálószoba felújítás minőségével.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.8"
			}
			},
			{
			"@type": "Review",
			"author": "Budai István",
			"datePublished": "2024-06-19",
			"name": "Tökéletes felújítás",
			"reviewBody": "Minden részlet tökéletes lett, a nappali most újnak néz ki.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.7"
			}
			},
			{
			"@type": "Review",
			"author": "Kissné Emese",
			"datePublished": "2024-06-22",
			"name": "Nagyon elégedett vagyok",
			"reviewBody": "A konyhafelújítás eredménye tökéletes, és a szolgáltatás kiváló.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.9"
			}
			},
			{
			"@type": "Review",
			"author": "Nagy László",
			"datePublished": "2024-06-25",
			"name": "Fantasztikus munka",
			"reviewBody": "A hálószoba most olyan, mintha új lenne.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.8"
			}
			},
			{
			"@type": "Review",
			"author": "Kovács Júlia",
			"datePublished": "2024-06-28",
			"name": "Kitűnő szolgáltatás",
			"reviewBody": "Profik voltak és a végeredmény is fantasztikus, a fürdőszoba most gyönyörű.",
			"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.9"
			}
			}
		]
		}
		</script>
		<style>
			@keyframes blink {
				0% {
					color: #e9c37a;
				}
				50% {
					color: white;
				}
				100% {
					color: #e9c37a;
				}
			}

			#offers {
				font-weight: 600 !important;
				text-transform: uppercase;
				animation: blink 1s infinite;
				color: #e9c37a !important; /* Egyéb stílusbeállítások */
				}

		</style>
		
</head>

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    <!-- Main Header / Header Style Three-->
    <header class="main-header header-style-three">
    	
		<!--Header Top-->
        <div class="header-top">
            <div class="auto-container clearfix">
			
				<!-- Top Left -->
                <div class="top-left clearfix">
                    <!-- Info List -->
					<ul class="info-list clearfix">
						<li><a href="#"><span>Vállalkozó:</span> <?php echo $owner;?> e.v.</a></li>
                        <li><a href="#"><span>Szolgáltatási terület:</span> Miskolc és környéke</a></li>
                        <li><a href="tel:<?php echo $telefon;?>"><span>Phone:</span> <?php echo $telefon;?></a></li>
						<li><a href="mailto:<?php echo $email;?>"><span>Email:</span> <?php echo $email;?></a></li>
                    </ul>
                </div>
				
				<!-- Top Right -->
                <div class="top-right clearfix">
				
					<!-- Social Links -->
					<ul class="social-links">
						<li><a href="#"><span class="fa fa-twitter"></span></a></li>
						<li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
						<li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
						<li><a href="#"><span class="fa fa-instagram"></span></a></li>
					</ul>
					
                </div>
            </div>
        </div>
        <!-- End Header Top -->
		
    	<!--Header-Upper-->
        <div class="header-upper">
        	<div class="auto-container">
            	<div class="inner-container clearfix">
                	
                	<div class="pull-left logo-box">
                    	<div class="logo"><a href="index.html"><img src="images/logo-s.png" alt="<?php echo $alt;?>" title=""></a></div>
                    </div>
                   	
					<div class="nav-outer clearfix">
                    
						<!--Mobile Navigation Toggler For Mobile-->
                        <div class="mobile-nav-toggler"><span class="icon flaticon-menu-4"></span></div>

						<!-- Main Menu -->
						<nav class="main-menu navbar-expand-md">
							<div class="navbar-header">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>

							<div class="navbar-collapse collapse scroll-nav clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
									<li class="current dropdown"><a href="index.html">Lakásfelújítás Miskolcon</a>
										<ul>
											<li class="dropdown"><a href="index.html">Konyha felújítás Miskolc</a></li>
											<li class="dropdown"><a href="index.html">Fürdőszoba felújítás Miskolc</a></li>
											<li class="dropdown"><a href="index.html">Halószoba felújítás Miskolc</a></li>
											<li class="dropdown"><a href="index.html">Nappali felújítás Miskolc</a></li>
											<li class="dropdown"><a href="index.html">Erkély felújítás Miskolc</a></li>
										</ul>
									</li>
									<li class="dropdown"><a href="services.html">Szolgáltatások</a>
										<ul>
											<li><a href="services.html">Burkolás Miskolc</a></li>
											<li><a href="services-2.html">Lakásfestés Miskolc</a></li>
											<li><a href="service-interior.html">Gipszkarton szerelés Miskolc</a></li>
											<li><a href="service-architecture.html">Nyílászárók beépítése</a></li>
											<li><a href="service-plans.html">Vízvezeték szerelés Miskolc</a></li>
											<li><a href="service-lighting.html">Hőszigetelés MIskolc</a></li>
										</ul>
									</li>
									<li class=""><a href="team.html">Munkáink</a></li>
									
									<li><a id="offers" href="contact.html" style="font-weight:700 !important;">Kapcsolat / Árajánlatkérés</a></li>
									
								</ul>
							</div>
							
						</nav>
						<!-- Main Menu End-->
						
						
					</div>
					
                </div>
            </div>
        </div>
        <!--End Header Upper-->
        
		<!--Sticky Header-->
        <div class="sticky-header">
        	<div class="auto-container clearfix">
            	<!--Logo-->
            	<div class="logo pull-left">
                	<a href="index.html" class="img-responsive"><img src="images/logo-small.png" alt="<?php echo $alt;?>" title=""></a>
                </div>
                
                <!--Right Col-->
                <div class="right-col pull-right">
					<!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                            <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
                
            </div>
        </div>
        <!--End Sticky Header-->
		
    <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>
            
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            <nav class="menu-box">
            	<div class="nav-logo"><a href="index.html"><img src="images/nav-logo.png" alt="<?php echo $alt;?>" title=""></a></div>
                
                <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
            </nav>
        </div><!-- End Mobile Menu -->

    </header>
    <!-- End Main Header -->

	<!--Main Slider-->
    <section class="main-slider home-three">
        
        <div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_two_wrapper" data-source="gallery">
            <div class="rev_slider fullwidthabanner" id="rev_slider_two" data-version="5.4.1">
                <ul>
                    
                    <li data-transition="slidingoverlayvertical" data-description="Slide Description"  data-index="rs-1688" data-slotamount="default" data-thumb="images/main-slider/5.jpg" data-title="Slide Title">
                    <img alt="<?php echo $alt;?>" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="images/main-slider/5.jpg">
                    
					<div class="tp-caption" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['650','650','650','450']"
                    data-whitespace="normal"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['-70','-120','-110','-80']"
                    data-x="['center','center','center','center']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"delay":500,"speed":500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                        <div class="title text-center">Luxury Interior Designing</div>
                    </div>
					
                    <div class="tp-caption "
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['880','700','650','450']"
                    data-whitespace="normal"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['50','-10','5','10']"
                    data-x="['center','center','center','center']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                        <h2 class="text-center">Creating Meaningful And <br> Functional Solutions</h2>
                    </div>
					
					<div class="tp-caption tp-resizeme" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-whitespace="normal"
                    data-width="['600','650','650','450']"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['190','110','130','110']"
                    data-x="['center','center','center','center']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"delay":1500,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
						<!-- Link Box -->
                        <div class="link-box text-center">
                            <a href="services.html" class="theme-btn btn-style-one">learn more</a>
                        </div>
                    </div>
					
					</li>
                    
                    <li data-transition="slidingoverlayvertical" data-description="Slide Description"  data-index="rs-1689" data-slotamount="default" data-thumb="images/main-slider/6.jpg" data-title="Slide Title">
                    <img alt="<?php echo $alt;?>" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="images/main-slider/6.jpg">
                    
                    <div class="tp-caption" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['650','650','650','450']"
                    data-whitespace="normal"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['-70','-120','-110','-80']"
                    data-x="['center','center','center','center']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"delay":500,"speed":500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                        <div class="title text-center">Luxury Interior Designing</div>
                    </div>
					
                    <div class="tp-caption "
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['880','700','650','450']"
                    data-whitespace="normal"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['50','-10','5','10']"
                    data-x="['center','center','center','center']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                        <h2 class="text-center">Creating Meaningful And <br> Functional Solutions</h2>
                    </div>
					
					<div class="tp-caption tp-resizeme" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-whitespace="normal"
                    data-width="['600','650','650','450']"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['190','110','130','110']"
                    data-x="['center','center','center','center']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"delay":1500,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
						<!-- Link Box -->
                        <div class="link-box text-center">
                            <a href="services.html" class="theme-btn btn-style-one">learn more</a>
                        </div>
                    </div>
					
					</li>
					
					<li data-transition="slidingoverlayvertical" data-description="Slide Description"  data-index="rs-1690" data-slotamount="default" data-thumb="images/main-slider/7.jpg" data-title="Slide Title">
                    <img alt="<?php echo $alt;?>" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="images/main-slider/7.jpg">
                    
                    <div class="tp-caption" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['650','650','650','450']"
                    data-whitespace="normal"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['-70','-120','-110','-80']"
                    data-x="['center','center','center','center']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"delay":500,"speed":500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                        <div class="title text-center">Luxury Interior Designing</div>
                    </div>
					
                    <div class="tp-caption "
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['880','700','650','450']"
                    data-whitespace="normal"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['50','-10','5','10']"
                    data-x="['center','center','center','center']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                        <h2 class="text-center">Creating Meaningful And <br> Functional Solutions</h2>
                    </div>
					
					<div class="tp-caption tp-resizeme" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-whitespace="normal"
                    data-width="['600','650','650','450']"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['190','110','130','110']"
                    data-x="['center','center','center','center']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"delay":1500,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
						<!-- Link Box -->
                        <div class="link-box text-center">
                            <a href="services.html" class="theme-btn btn-style-one">learn more</a>
                        </div>
                    </div>
					
					</li>
					
                </ul>
            </div>
        </div>
		
    </section>
    <!--End Main Slider-->
	
	<!-- About Section Two -->
	<section class="about-section-two">
		<div class="pattern-layer" style="background-image:url(images/background/pattern-14.png)"></div>
		<div class="outer-container">
			<div class="clearfix">
				
				<!-- Left Column -->
				<div class="left-column">
					<div class="row clearfix">
						
						<!-- Image Column -->
						<div class="image-column col-lg-6 col-md-6 col-sm-12">
							<div class="image wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
								<img src="images/resource/about-1.jpg" alt="<?php echo $alt;?>" />
							</div>
						</div>
						<!-- Image Column -->
						<div class="image-column col-lg-6 col-md-6 col-sm-12">
							<div class="image wow fadeInDown" data-wow-delay="300ms" data-wow-duration="1500ms">
								<img src="images/resource/about-2.jpg" alt="<?php echo $alt;?>" />
							</div>
						</div>
						
					</div>
				</div>
				
				<!-- Right Column -->
				<div class="right-column">
					<div class="inner-column">
						<div class="row clearfix">
							
							<!-- Content Column -->
							<div class="content-column col-lg-8 col-md-12 col-sm-12">
								<div class="column-inner">
									<!-- Sec Title -->
									<div class="sec-title">
										<div class="inner-title">
											<div class="title">about Intenax</div>
											<h2>We are passionate and always produce better results for interiors.</h2>
										</div>
									</div>
									<div class="bold-text">Sit eit malis civibus kase iuvaret blandit no nec, ipsum volumus indis referrentur vix euno utamur vivendo interpretaris.</div>
									<div class="text">Beyond more stoic this along goodness hey this this wow manatee mongoose one far flustered impressive manifest far crud opened inside owing punitively around for after wasteful telling sprang coldly and spoke less clients. Squid hesitantly preparat gibbered some tyran nically talkative jeepers crud.</div>
								</div>
							</div>
							
							<!-- Image Column -->
							<div class="image-column col-lg-4 col-md-12 col-sm-12">
								<div class="column-inner">
									<div class="image wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
										<img src="images/resource/about-3.jpg" alt="<?php echo $alt;?>" />
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End About Section Two -->
	
	<!-- Services Section Four -->
	<section class="services-section-four">
		<!-- Title Box -->
		<div class="title-box" style="background-image:url(images/background/13.jpg)">
			<div class="auto-container">
				<div class="sec-title light">
					<div class="clearfix">
						<div class="pull-left">
							<div class="title">Branded Services</div>
							<h2>Comprehensive range <br> of interior design services </h2>
						</div>
						<div class="pull-right">
							<div class="text">Along goodness hey this sed ipsum dui manatee for the one asfers since far flustered <br> impressive your longtails opened inside owing ipsum epunitively. Nehil moderatius <br> vimpot dish euitas iuvaret reformid.</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Lower Content -->
		<div class="lower-content">
			<div class="pattern-layer" style="background-image:url(images/background/pattern-15.png)"></div>
			<div class="auto-container">
				<div class="row clearfix">
					
					<!-- Services Block Six -->
					<div class="services-block-six col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        	<div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <div class="icon-box">
                                            <span class="icon flaticon-plan-1"></span>
                                        </div>
                                        <h3>Floor Plans</h3>
                                    </div>
                                    
                                    <div class="back">
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <div class="content">
                                                    <span class="icon flaticon-plan-1"></span>
                                                    <h4><a href="services.html">Floor Plans</a></h4>
                                                    <div class="text">Bonvenire gubergren exv habeo facete prie utent maluisset intellegam vixm vim prompta facilisi inter kesy set tean denique praesent proe ipsu.</div>
                                                    <a href="services.html" class="read-more">read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
					
					<!-- Services Block Six -->
					<div class="services-block-six col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInDown" data-wow-delay="0ms" data-wow-duration="1500ms">
                        	<div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <div class="icon-box">
                                            <span class="icon flaticon-home-2"></span>
                                        </div>
                                        <h3>Interior Design</h3>
                                    </div>
                                    <div class="back">
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <div class="content">
                                                    <span class="icon flaticon-home-2"></span>
                                                    <h4><a href="services.html">Interior Design</a></h4>
                                                    <div class="text">Bonvenire gubergren exv habeo facete prie utent maluisset intellegam vixm vim prompta facilisi inter kesy set tean denique praesent proe ipsu.</div>
                                                    <a href="services.html" class="read-more">read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
					
					<!-- Services Block Six -->
					<div class="services-block-six col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        	<div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <div class="icon-box">
                                            <span class="icon flaticon-building"></span>
                                        </div>
                                        <h3>Architectures</h3>
                                    </div>
                                    <div class="back">
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <div class="content">
                                                    <span class="icon flaticon-building"></span>
                                                    <h4><a href="services.html">Architectures</a></h4>
                                                    <div class="text">Bonvenire gubergren exv habeo facete prie utent maluisset intellegam vixm vim prompta facilisi inter kesy set tean denique praesent proe ipsu.</div>
                                                    <a href="services.html" class="read-more">read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
					
					<!-- Services Block Six -->
					<div class="services-block-six col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        	<div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <div class="icon-box">
                                            <span class="icon flaticon-metering"></span>
                                        </div>
                                        <h3>Home Decoration</h3>
                                    </div>
                                    <div class="back">
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <div class="content">
                                                    <span class="icon flaticon-metering"></span>
                                                    <h4><a href="services.html">Home Decoration</a></h4>
                                                    <div class="text">Bonvenire gubergren exv habeo facete prie utent maluisset intellegam vixm vim prompta facilisi inter kesy set tean denique praesent proe ipsu.</div>
                                                    <a href="services.html" class="read-more">read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
					
					<!-- Services Block Six -->
					<div class="services-block-six col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        	<div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <div class="icon-box">
                                            <span class="icon flaticon-sketch-3"></span>
                                        </div>
                                        <h3>Landscapes</h3>
                                    </div>
                                    <div class="back">
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <div class="content">
                                                    <span class="icon flaticon-sketch-3"></span>
                                                    <h4><a href="services.html">Landscapes</a></h4>
                                                    <div class="text">Bonvenire gubergren exv habeo facete prie utent maluisset intellegam vixm vim prompta facilisi inter kesy set tean denique praesent proe ipsu.</div>
                                                    <a href="services.html" class="read-more">read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
					
					<!-- Services Block Six -->
					<div class="services-block-six col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        	<div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <div class="icon-box">
                                            <span class="icon flaticon-bathtub-1"></span>
                                        </div>
                                        <h3>Lighting Styles</h3>
                                    </div>
                                    <div class="back">
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <div class="content">
                                                    <span class="icon flaticon-bathtub-1"></span>
                                                    <h4><a href="services.html">Lighting Styles</a></h4>
                                                    <div class="text">Bonvenire gubergren exv habeo facete prie utent maluisset intellegam vixm vim prompta facilisi inter kesy set tean denique praesent proe ipsu.</div>
                                                    <a href="services.html" class="read-more">read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!-- End Services Section Four -->
	
	<!-- Counter Section Two -->
	<section class="counter-section-two">
		<div class="outer-container">
			<div class="row clearfix">
			
				<!-- Counter Block -->
				<div class="counter-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="clearfix">
							<!-- Image Column -->
							<div class="image-column col-lg-6 col-md-6 col-sm-12">
								<div class="image">
									<a href="#"><img src="images/resource/counter-4.jpg" alt="<?php echo $alt;?>" /></a>
								</div>
							</div>
							<!-- Content Column -->
							<div class="content-column col-lg-6 col-md-6 col-sm-12">
								<div class="inner-column">
									<div class="content">
										<div class="count-box">
											<span class="count-text" data-speed="3500" data-stop="310">0</span>
										</div>
										<div class="text">projects completed</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Counter Block -->
				<div class="counter-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="clearfix">
							<!-- Image Column -->
							<div class="image-column col-lg-6 col-md-6 col-sm-12">
								<div class="image">
									<a href="#"><img src="images/resource/counter-5.jpg" alt="<?php echo $alt;?>" /></a>
								</div>
							</div>
							<!-- Content Column -->
							<div class="content-column col-lg-6 col-md-6 col-sm-12">
								<div class="inner-column">
									<div class="content">
										<div class="count-box">
											<span class="count-text" data-speed="2000" data-stop="16">0</span>
										</div>
										<div class="text">Crazy thinkers</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Counter Block -->
				<div class="counter-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="clearfix">
							<!-- Image Column -->
							<div class="image-column col-lg-6 col-md-6 col-sm-12">
								<div class="image">
									<a href="#"><img src="images/resource/counter-6.jpg" alt="<?php echo $alt;?>" /></a>
								</div>
							</div>
							<!-- Content Column -->
							<div class="content-column col-lg-6 col-md-6 col-sm-12">
								<div class="inner-column">
									<div class="content">
										<div class="count-box">
											<span class="count-text" data-speed="3000" data-stop="25">0</span>
										</div>
										<div class="text">years of expertise</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Counter Section Two -->
	
	<!-- Projects Section Two -->
	<section class="project-section-two">
		<div class="pattern-layer" style="background-image:url(images/background/pattern-16.png)"></div>
		<div class="outer-container">
			<div class="four-item-carousel owl-carousel owl-theme">
				
				<!-- Project Block Two -->
				<div class="project-block-two">
					<div class="inner-box">
						<div class="image">
							<img src="images/gallery/18.jpg" alt="<?php echo $alt;?>" />
							<!-- Overlay Box -->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="overlay-content">
										<a class="plus" href="images/gallery/18.jpg" data-fancybox="gallery-1" data-caption=""><span class="flaticon-full-screen"></span></a>
										<h3><a href="team.html">Portion Interior</a></h3>
										<div class="category">Home Design</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Project Block Two -->
				<div class="project-block-two">
					<div class="inner-box">
						<div class="image">
							<img src="images/gallery/19.jpg" alt="<?php echo $alt;?>" />
							<!-- Overlay Box -->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="overlay-content">
										<a class="plus" href="images/gallery/19.jpg" data-fancybox="gallery-1" data-caption=""><span class="flaticon-full-screen"></span></a>
										<h3><a href="team.html">Portion Interior</a></h3>
										<div class="category">Home Design</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Project Block Two -->
				<div class="project-block-two">
					<div class="inner-box">
						<div class="image">
							<img src="images/gallery/20.jpg" alt="<?php echo $alt;?>" />
							<!-- Overlay Box -->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="overlay-content">
										<a class="plus" href="images/gallery/20.jpg" data-fancybox="gallery-1" data-caption=""><span class="flaticon-full-screen"></span></a>
										<h3><a href="team.html">Portion Interior</a></h3>
										<div class="category">Home Design</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Project Block Two -->
				<div class="project-block-two">
					<div class="inner-box">
						<div class="image">
							<img src="images/gallery/21.jpg" alt="<?php echo $alt;?>" />
							<!-- Overlay Box -->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="overlay-content">
										<a class="plus" href="images/gallery/21.jpg" data-fancybox="gallery-1" data-caption=""><span class="flaticon-full-screen"></span></a>
										<h3><a href="team.html">Portion Interior</a></h3>
										<div class="category">Home Design</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>
				
				<!-- Project Block Two -->
				<div class="project-block-two">
					<div class="inner-box">
						<div class="image">
							<img src="images/gallery/18.jpg" alt="<?php echo $alt;?>" />
							<!-- Overlay Box -->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="overlay-content">
										<a class="plus" href="images/gallery/18.jpg" data-fancybox="gallery-1" data-caption=""><span class="flaticon-full-screen"></span></a>
										<h3><a href="team.html">Portion Interior</a></h3>
										<div class="category">Home Design</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Project Block Two -->
				<div class="project-block-two">
					<div class="inner-box">
						<div class="image">
							<img src="images/gallery/19.jpg" alt="<?php echo $alt;?>" />
							<!-- Overlay Box -->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="overlay-content">
										<a class="plus" href="images/gallery/19.jpg" data-fancybox="gallery-1" data-caption=""><span class="flaticon-full-screen"></span></a>
										<h3><a href="team.html">Portion Interior</a></h3>
										<div class="category">Home Design</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Project Block Two -->
				<div class="project-block-two">
					<div class="inner-box">
						<div class="image">
							<img src="images/gallery/20.jpg" alt="<?php echo $alt;?>" />
							<!-- Overlay Box -->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="overlay-content">
										<a class="plus" href="images/gallery/20.jpg" data-fancybox="gallery-1" data-caption=""><span class="flaticon-full-screen"></span></a>
										<h3><a href="team.html">Portion Interior</a></h3>
										<div class="category">Home Design</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Project Block Two -->
				<div class="project-block-two">
					<div class="inner-box">
						<div class="image">
							<img src="images/gallery/21.jpg" alt="<?php echo $alt;?>" />
							<!-- Overlay Box -->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="overlay-content">
										<a class="plus" href="images/gallery/21.jpg" data-fancybox="gallery-1" data-caption=""><span class="flaticon-full-screen"></span></a>
										<h3><a href="team.html">Portion Interior</a></h3>
										<div class="category">Home Design</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>
				
			</div>
		
			<!-- Button Box -->
			<div class="btn-box text-center">
				<a href="services.html" class="theme-btn btn-style-two wow rubberBand" data-wow-delay="0ms" data-wow-duration="1500ms">view more projects</a>
			</div>
		
		</div>
	</section>
	<!-- End Projects Section Two -->
	
	<!-- Branded Section -->
	<section class="branded-section" style="background-image:url(images/background/14.jpg)">
		<div class="auto-container">
			<!-- Title Box -->
			<div class="title-box">
				<div class="sec-title light">
					<div class="clearfix">
						<div class="pull-left">
							<div class="title">Branded Services</div>
							<h2>Approach to enhance <br> the branding experience .</h2>
						</div>
						<div class="pull-right">
							<div class="text">Along goodness hey this sed ipsum dui manatee for the one asfers since far flustered <br> impressive your longtails opened inside owing ipsum epunitively. Nehil moderatius <br> vimpot dish euitas iuvaret reformid.</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Lower Section -->
			<div class="lower-section">
				<div class="row clearfix">
					
					<!-- Brand Block -->
					<div class="brand-block col-lg-6 col-md-12 col-sm-12">
						<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="upper-box">
								<h3>Emphasize the use of natural resources, opportunities for use .</h3>
							</div>
							<div class="lower-box">
								<div class="box-inner">
									<div class="image">
										<img src="images/resource/brand-1.jpg" alt="<?php echo $alt;?>" />
									</div>
									<div class="text">Fustered impressive manifest crud ipsum opens forewent and after wasteful telling prang squid hesitantly preparatory gibbered som decore rec sed ipsum teque philosophia.</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Brand Block -->
					<div class="brand-block col-lg-6 col-md-12 col-sm-12">
						<div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="upper-box">
								<h3>Works carefully with clients requirments and perfect execution .</h3>
							</div>
							<div class="lower-box">
								<div class="box-inner">
									<div class="image">
										<img src="images/resource/brand-2.jpg" alt="<?php echo $alt;?>" />
									</div>
									<div class="text">Fustered impressive manifest crud ipsum opens forewent and after wasteful telling prang squid hesitantly preparatory gibbered som decore rec sed ipsum teque philosophia.</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
		</div>
	</section>
	<!-- End Branded Section -->
	
	<!-- Testimonial Section Two -->
    <section class="testimonial-section-two">
    	<div class="auto-container">
        	<div class="testimonial-outer">
            
            	<!--Client Testimonial Carousel-->
                <div class="client-testimonial-carousel owl-carousel owl-theme">
                
                    <!--Testimonial Block Three-->
                    <div class="testimonial-block-three">
                        <div class="inner-box">
							<div class="quote-icon flaticon-left-quote"></div>
							<h3>INTENAX</h3>
                            <div class="text">Habeo facete pri ei. Putent maluisset intellegam vixte vim prompta facilisi interesset te. An denique pro torquatos adipiscing pro, pro no odio modus. Mea malis summo ut. Ex ipsum dolore assueverit nec, facer imperdiet postea laoreet vulputate has. Beyond more stoic this along goodness hey this this wow manatee mongoose one as since flustered impressive manifest far crud opened inside owing punitively around</div>
                            <div class="author-name">thomas henry</div>
							<div class="designation">Interior Design Customer</div>
                        </div>
                    </div>
                    
                    <!--Testimonial Block Three-->
                    <div class="testimonial-block-three">
                        <div class="inner-box">
							<div class="quote-icon flaticon-left-quote"></div>
							<h3>INTENAX</h3>
                            <div class="text">Habeo facete pri ei. Putent maluisset intellegam vixte vim prompta facilisi interesset te. An denique pro torquatos adipiscing pro, pro no odio modus. Mea malis summo ut. Ex ipsum dolore assueverit nec, facer imperdiet postea laoreet vulputate has. Beyond more stoic this along goodness hey this this wow manatee mongoose one as since flustered impressive manifest far crud opened inside owing punitively around</div>
                            <div class="author-name">thomas henry</div>
							<div class="designation">Interior Design Customer</div>
                        </div>
                    </div>
                    
                    <!--Testimonial Block Three-->
                    <div class="testimonial-block-three">
                        <div class="inner-box">
							<div class="quote-icon flaticon-left-quote"></div>
							<h3>INTENAX</h3>
                            <div class="text">Habeo facete pri ei. Putent maluisset intellegam vixte vim prompta facilisi interesset te. An denique pro torquatos adipiscing pro, pro no odio modus. Mea malis summo ut. Ex ipsum dolore assueverit nec, facer imperdiet postea laoreet vulputate has. Beyond more stoic this along goodness hey this this wow manatee mongoose one as since flustered impressive manifest far crud opened inside owing punitively around</div>
                            <div class="author-name">thomas henry</div>
							<div class="designation">Interior Design Customer</div>
                        </div>
                    </div>
                    
                    <!--Testimonial Block Three-->
                    <div class="testimonial-block-three">
                        <div class="inner-box">
							<div class="quote-icon flaticon-left-quote"></div>
							<h3>INTENAX</h3>
                            <div class="text">Habeo facete pri ei. Putent maluisset intellegam vixte vim prompta facilisi interesset te. An denique pro torquatos adipiscing pro, pro no odio modus. Mea malis summo ut. Ex ipsum dolore assueverit nec, facer imperdiet postea laoreet vulputate has. Beyond more stoic this along goodness hey this this wow manatee mongoose one as since flustered impressive manifest far crud opened inside owing punitively around</div>
                            <div class="author-name">thomas henry</div>
							<div class="designation">Interior Design Customer</div>
                        </div>
                    </div>
                    
                    <!--Testimonial Block Three-->
                    <div class="testimonial-block-three">
                        <div class="inner-box">
							<div class="quote-icon flaticon-left-quote"></div>
							<h3>INTENAX</h3>
                            <div class="text">Habeo facete pri ei. Putent maluisset intellegam vixte vim prompta facilisi interesset te. An denique pro torquatos adipiscing pro, pro no odio modus. Mea malis summo ut. Ex ipsum dolore assueverit nec, facer imperdiet postea laoreet vulputate has. Beyond more stoic this along goodness hey this this wow manatee mongoose one as since flustered impressive manifest far crud opened inside owing punitively around</div>
                            <div class="author-name">thomas henry</div>
							<div class="designation">Interior Design Customer</div>
                        </div>
                    </div>
                    
                    <!--Testimonial Block Three-->
                    <div class="testimonial-block-three">
                        <div class="inner-box">
							<div class="quote-icon flaticon-left-quote"></div>
							<h3>INTENAX</h3>
                            <div class="text">Habeo facete pri ei. Putent maluisset intellegam vixte vim prompta facilisi interesset te. An denique pro torquatos adipiscing pro, pro no odio modus. Mea malis summo ut. Ex ipsum dolore assueverit nec, facer imperdiet postea laoreet vulputate has. Beyond more stoic this along goodness hey this this wow manatee mongoose one as since flustered impressive manifest far crud opened inside owing punitively around</div>
                            <div class="author-name">thomas henry</div>
							<div class="designation">Interior Design Customer</div>
                        </div>
                    </div>
                    
                </div>
				
				
				<!--Product Thumbs Carousel-->
                <div class="client-thumb-outer">
                    <div class="client-thumbs-carousel owl-carousel owl-theme">
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="images/resource/author-3.jpg" alt="<?php echo $alt;?>"></figure>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="images/resource/author-4.jpg" alt="<?php echo $alt;?>"></figure>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="images/resource/author-5.jpg" alt="<?php echo $alt;?>"></figure>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="images/resource/author-3.jpg" alt="<?php echo $alt;?>"></figure>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="images/resource/author-4.jpg" alt="<?php echo $alt;?>"></figure>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="images/resource/author-5.jpg" alt="<?php echo $alt;?>"></figure>
                        </div>
                    </div>
                </div>
				
                
            </div>
        </div>
    </section>
    <!-- End Testimonial Section Two -->
	
	<!-- Fluid Section One -->
    <section class="fluid-section-one">
    	<div class="outer-box clearfix">
        	
           <!--Image Column-->
        	<div class="image-column" style="background-image: url(images/resource/image-1.jpg)">
            	<div class="image">
                	<img src="images/resource/image-1.jpg" alt="<?php echo $alt;?>">
                </div>
                <a href="https://www.youtube.com/watch?v=SXZXtD60t2g" class="overlay-link lightbox-image">
                	<div class="icon-box">
                		<span class="icon flaticon-play-button"></span>
					</div>
                </a>
            </div>
            <!--End Image Column-->
           
            <!--Content Column-->
            <div class="content-column">
            	<div class="content-box">
					<!-- Sec Title -->
					<div class="sec-title">
						<div class="inner-title">
							<div class="title">story of Intenax</div>
							<h2>Strength of Planning .</h2>
						</div>
					</div>
					<div class="content wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="text">Convenire gubergren ex vix. Habeo facete pri ei. Putent maluisset intellegam vix tevim prompta facilisi interesset te. An denique praesent pro, in torquatos <span>adipisc king pro, pro no odio modus.</span> Mea malis summo ut. Ex ipsum dolore assueverit ne facer imperdiet et duo, cu postea laoreet vulputate has.</div>
						<div class="row clearfix">
							
							<!-- Feature Icon -->
							<div class="column col-lg-4 col-md-4 col-sm-12">
								<div class="feature-box">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon flaticon-sketch-1"></span>
										</div>
										<h3>Consistent Design</h3>
									</div>
								</div>
							</div>
							
							<!-- Feature Icon -->
							<div class="column col-lg-4 col-md-4 col-sm-12">
								<div class="feature-box">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon flaticon-blueprint-2"></span>
										</div>
										<h3>Ideal Approach</h3>
									</div>
								</div>
							</div>
							
							<!-- Feature Icon -->
							<div class="column col-lg-4 col-md-4 col-sm-12">
								<div class="feature-box">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon flaticon-sketch-1"></span>
										</div>
										<h3>Fresh Expressions</h3>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>	
			
		</div>
	</section>
	<!-- End Fluid Section One -->
	
	<!-- Sponsors Section Three -->
	<section class="sponsors-section-three">
		<div class="auto-container">
			<div class="inner-container">
				<div class="clearfix">
					<!-- Column -->
					<div class="column col-lg-3 col-md-6 col-sm-12">
						<div class="image">
							<a href="#"><img src="images/clients/11.jpg" alt="<?php echo $alt;?>"></a>
						</div>
					</div>
					<!-- Column -->
					<div class="column col-lg-3 col-md-6 col-sm-12">
						<div class="image">
							<a href="#"><img src="images/clients/12.jpg" alt="<?php echo $alt;?>"></a>
						</div>
					</div>
					<!-- Column -->
					<div class="column col-lg-3 col-md-6 col-sm-12">
						<div class="image">
							<a href="#"><img src="images/clients/13.jpg" alt="<?php echo $alt;?>"></a>
						</div>
					</div>
					<!-- Column -->
					<div class="column col-lg-3 col-md-6 col-sm-12">
						<div class="image">
							<a href="#"><img src="images/clients/14.jpg" alt="<?php echo $alt;?>"></a>
						</div>
					</div>
					<!-- Column -->
					<div class="column col-lg-3 col-md-6 col-sm-12">
						<div class="image">
							<a href="#"><img src="images/clients/15.jpg" alt="<?php echo $alt;?>"></a>
						</div>
					</div>
					<!-- Column -->
					<div class="column col-lg-3 col-md-6 col-sm-12">
						<div class="image">
							<a href="#"><img src="images/clients/16.jpg" alt="<?php echo $alt;?>"></a>
						</div>
					</div>
					<!-- Column -->
					<div class="column col-lg-3 col-md-6 col-sm-12">
						<div class="image">
							<a href="#"><img src="images/clients/17.jpg" alt="<?php echo $alt;?>"></a>
						</div>
					</div>
					<!-- Column -->
					<div class="column col-lg-3 col-md-6 col-sm-12">
						<div class="image">
							<a href="#"><img src="images/clients/18.jpg" alt="<?php echo $alt;?>"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Sponsors Section Three -->
	
	<!-- Project Form Section -->
	<section class="project-form-section">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<div class="inner-title">
								<div class="title">get in touch</div>
								<h2>Let’s Discuss Your <br> Next Project</h2>
								<div class="text">Convenire gubergren vix. Habeo facete pri putent malu intellegam vixt vim prompta facil teresed denique praes ent pro in torqu malis summo exeas.</div>
							</div>
						</div>
						<ul>
							<li><span>Address: </span>63 Nelson Base, Florida 26025 USA</li>
							<li><span>Phone: </span>(234) 501 8607  -  (234) 620 7129</li>
							<li><span>Email: </span>inquiry@intenax.net</li>
						</ul>
					</div>
				</div>
				
				<!-- Form Column -->
				<div class="form-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Project Form -->
						<div class="project-form">
								
							<!--Project Form-->
							<form method="post" action="https://t.commonsupport.xyz/intenax/contact.html">
								
								<div class="form-group">
									<input type="text" name="username" placeholder="Name" required>
								</div>
								
								<div class="form-group">
									<input type="text" name="email" placeholder="Email" required>
								</div>
								
								<div class="form-group">
									<input type="text" name="phone" placeholder="Subject" required>
								</div>
								
								<div class="form-group">
									<textarea name="message" placeholder="Message"></textarea>
								</div>
								
								<div class="form-group text-center">
									<button class="theme-btn btn-style-one" type="submit" name="submit-form">send message</button>
								</div>
								
							</form>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Project Form Section -->
	
	<!--Map Section-->
    <section class="map-section">
    	<!--Map Outer-->
        <div class="map-outer">
            <div class="google-map"
                id="contact-google-map" 
                data-map-lat="44.231172" 
                data-map-lng="-76.485954" 
                data-icon-path="images/icons/map-marker.png" 
                data-map-title="Alabama, USA" 
                data-map-zoom="12" 
                data-markers='{
                    "marker-1": [44.231172, -76.485954, "<h4>Branch Office</h4><p>4/99 Alabama, USA</p>"],
                    "marker-2": [40.880550, -78.393705, "<h4>Branch Office</h4><p>4/99 Pennsylvania, USA</p>"]
                }'>

    		</div>
        </div>
    </section>
	<!--End Map Section-->
	
	<!-- Main Footer -->
    <footer class="main-footer">
    	<div class="auto-container">
        	<!--Widgets Section-->
            <div class="widgets-section">
            	<div class="row clearfix">
                	
                    <!--Column-->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
						<div class="row clearfix">
						
                        	<!--Footer Column-->
                            <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                                <div class="footer-widget about-widget">
									<ul class="social-links">
										<li><a href="#"><span class="fa fa-twitter"></span></a></li>
										<li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
										<li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
										<li><a href="#"><span class="fa fa-instagram"></span></a></li>
										<li><a href="#"><span class="fa fa-linkedin"></span></a></li>
									</ul>
									<div class="text">Sit eit malis civibus kase iuvaret bandit no kec, ipsum volumus indis aissentias referrentur vix euno utamur.</div>
									<div class="copyright"><span>INTENAX</span> - Design & Architect <br> &copy; All rights reserved.</div>
								</div>
							</div>
							
							<!--Footer Column-->
                            <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
									<h2>What we do</h2>
									<ul class="footer-list">
										<li><a href="#">Architecture</a></li>
										<li><a href="#">Home Lighting</a></li>
										<li><a href="#">Landscape Design</a></li>
										<li><a href="#">Floor Planning</a></li>
										<li><a href="#">Interior Design</a></li>
										<li><a href="#">Exterior Works</a></li>
									</ul>
								</div>
							</div>
							
						</div>
					</div>
					
					<!--Column-->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
						<div class="row clearfix">
							
							<!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
									<h2>Sitemap</h2>
									<ul class="footer-list">
										<li><a href="#">Home</a></li>
										<li><a href="#">About</a></li>
										<li><a href="#">Services</a></li>
										<li><a href="#">Our Projects</a></li>
										<li><a href="#">Latest News</a></li>
										<li><a href="#">Contact us</a></li>
									</ul>
								</div>
							</div>
							
                        	<!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget contact-widget">
									<h2>Contact</h2>
									<ul class="contact-list">
										<li>Adress: <span>63 Nelson Base, Florida</span></li>
										<li>Phone: <span><a href="tel:+12345018607">+1 (234) 501 8607</a></span></li>
										<li>Email: <span><a href="mailto:info@intenax.net">info@intenax.net</a></span></li>
									</ul>
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<!-- Footer Bottom Image -->
		<div class="footer-bottom-image">
			<div class="image">
				<img src="images/background/4.jpg" alt="<?php echo $alt;?>" />
			</div>
		</div>
		
	</footer>
	
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

<!--Search Popup-->
<div id="search-popup" class="search-popup">
	<div class="close-search theme-btn"><span class="flaticon-cancel-1"></span></div>
	<div class="popup-inner">
		<div class="overlay-layer"></div>
    	<div class="search-form">
        	<form method="post" action="https://t.commonsupport.xyz/intenax/index.html">
            	<div class="form-group">
                	<fieldset>
                        <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required >
                        <input type="submit" value="Search Now!" class="theme-btn">
                    </fieldset>
                </div>
            </form>
            
            <br>
            <h3>Recent Search Keywords</h3>
            <ul class="recent-searches">
                <li><a href="#">Business</a></li>
                <li><a href="#">Web Development</a></li>
                <li><a href="#">SEO</a></li>
                <li><a href="#">Logistics</a></li>
                <li><a href="#">Freedom</a></li>
            </ul>
        
        </div>
        
    </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!--Revolution Slider-->
<script src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="js/main-slider-script.js"></script>

<script src="js/jquery.scrollTo.js"></script>
<script src="js/appear.js"></script>
<script src="js/isotope.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/paroller.js"></script>
<script src="js/script.js"></script>
<!--Google Map APi Key-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcaOOcFcQ0hoTqANKZYz-0ii-J0aUoHjk"></script>
<script src="js/gmaps.js"></script>
<script src="js/map-script.js"></script>
<!--End Google Map APi-->
</body>

</html>

<?php
ob_end_flush();
?>