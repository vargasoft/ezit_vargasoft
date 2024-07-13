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

$server = "https://www.karpittisztitas-miskolc.hu/";
$telefon = "+36 (30) 103-1740";

$owner = "Mata Oszkár";
$address = "3531 Miskolc, Kis-Hunyad út 28.";
$facebook = 'https://www.facebook.com/KarpittisztitasMiskolcOn';
$alt = 'Kárpittisztítás Miskolc és környékén, autó kárpittisztítás, bútor Kárpittisztítás, szőnyeg tisztítás';
$title = "Kárpittisztítás Miskolc és környéke | Kárpittisztítás, Autókáprit tisztítás";
$description = "Professzionális kárpittisztítás Miskolc és környékén. Szolgáltatásaink közé tartozik az autó kárpittisztítás, bútorkárpit tisztítás, matractisztítás és szőnyegtisztítás. Gyors és hatékony megoldások allergénmentesítéssel és folteltávolítással.";
$keywords = "kárpittisztítás, kárpittisztítás Miskolc, autó kárpittisztítás, bútorkárpit tisztítás, matractisztítás, szőnyegtisztítás, allergénmentesítés, folteltávolítás, professzionális kárpittisztítás, gyors kárpittisztítás, kárpittisztító szolgáltatás, Miskolc és környéke, kárpittisztítás árak, környezetbarát kárpittisztítás";

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
	<title>Intenax - HTML Template | Homepage Three</title>

	<!--seo-->


	<!-- Stylesheets -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="plugins/revolution/css/settings.css" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
	<link href="plugins/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
	<link href="plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->

	<link href="css/style.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

	<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
	<link rel="icon" href="images/favicon.png" type="image/x-icon">

	<!-- Responsive -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


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
                        <li><a href="#"><span>Address:</span> 63 Nelson Base, Florida</a></li>
                        <li><a href="tel:+12345018607"><span>Phone:</span> +1 (234) 501 8607</a></li>
						<li><a href="mailto:info@intenax.net"><span>Email:</span> info@intenax.net</a></li>
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
                    	<div class="logo"><a href="index.html"><img src="images/logo-3.png" alt="" title=""></a></div>
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
									<li class="current dropdown"><a href="index.html">Home</a>
										<ul>
											<li><a href="index.html">Home Page 01</a></li>
											<li><a href="index-2.html">Home Page 02</a></li>
											<li><a href="index-3.html">Home Page 03</a></li><li><a href="index-4.html">Home Page 04</a></li>
											<li class="dropdown"><a href="index.html">Header Styles</a>
												<ul>
													<li><a href="index.html">Header Style 01</a></li>
													<li><a href="index-2.html">Header Style 02</a></li>
													<li><a href="index-3.html">Header Style 03</a></li>
													<li><a href="index-4.html">Header Style 04</a></li>
												</ul>
											</li>
										</ul>
									</li>
									<li><a href="about.html">About Us</a></li>
									<li class="dropdown"><a href="services.html">Services</a>
										<ul>
											<li><a href="services.html">Services Type 01</a></li>
											<li><a href="services-2.html">Services Type 02</a></li>
											<li><a href="service-interior.html">Interior Design</a></li>
											<li><a href="service-architecture.html">Architecture</a></li>
											<li><a href="service-plans.html">Floor Plans</a></li>
											<li><a href="service-lighting.html">Lighting Decor</a></li>
										</ul>
									</li>
									<li class="dropdown"><a href="team.html">Pages</a>
										<ul>
											<li><a href="team.html">Meet Our Team</a></li>
											<li><a href="about-me.html">Know About Me</a></li>
											<li><a href="price.html">Our Price Plans</a></li>
                                            <li><a href="contact-2.html">Contact Style 02</a></li>
										</ul>
									</li>
									<li class="dropdown"><a href="blog.html">News</a>
										<ul>
											<li><a href="blog.html">News 03 Columns</a></li>
											<li><a href="blog-classic.html">News Fullwidth</a></li>
											<li><a href="blog-sidebar.html">News With Sidebar</a></li>
											<li><a href="blog-single.html">News Details</a></li>
										</ul>
									</li>
									<li><a href="contact.html">Contact Us</a></li>
								</ul>
							</div>
							
						</nav>
						<!-- Main Menu End-->
						
						<!-- Outer Box -->
						<div class="outer-box">
							<div class="search-box-btn"><span class="icon icon-magnifier"></span></div>
						</div>
						
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
                	<a href="index.html" class="img-responsive"><img src="images/logo-small.png" alt="" title=""></a>
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
            	<div class="nav-logo"><a href="index.html"><img src="images/nav-logo.png" alt="" title=""></a></div>
                
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
                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="images/main-slider/5.jpg">
                    
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
                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="images/main-slider/6.jpg">
                    
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
                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="images/main-slider/7.jpg">
                    
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
								<img src="images/resource/about-1.jpg" alt="" />
							</div>
						</div>
						<!-- Image Column -->
						<div class="image-column col-lg-6 col-md-6 col-sm-12">
							<div class="image wow fadeInDown" data-wow-delay="300ms" data-wow-duration="1500ms">
								<img src="images/resource/about-2.jpg" alt="" />
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
										<img src="images/resource/about-3.jpg" alt="" />
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
									<a href="#"><img src="images/resource/counter-4.jpg" alt="" /></a>
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
									<a href="#"><img src="images/resource/counter-5.jpg" alt="" /></a>
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
									<a href="#"><img src="images/resource/counter-6.jpg" alt="" /></a>
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
							<img src="images/gallery/18.jpg" alt="" />
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
							<img src="images/gallery/19.jpg" alt="" />
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
							<img src="images/gallery/20.jpg" alt="" />
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
							<img src="images/gallery/21.jpg" alt="" />
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
							<img src="images/gallery/18.jpg" alt="" />
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
							<img src="images/gallery/19.jpg" alt="" />
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
							<img src="images/gallery/20.jpg" alt="" />
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
							<img src="images/gallery/21.jpg" alt="" />
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
										<img src="images/resource/brand-1.jpg" alt="" />
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
										<img src="images/resource/brand-2.jpg" alt="" />
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
                            <figure class="thumb-box"><img src="images/resource/author-3.jpg" alt=""></figure>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="images/resource/author-4.jpg" alt=""></figure>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="images/resource/author-5.jpg" alt=""></figure>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="images/resource/author-3.jpg" alt=""></figure>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="images/resource/author-4.jpg" alt=""></figure>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="images/resource/author-5.jpg" alt=""></figure>
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
                	<img src="images/resource/image-1.jpg" alt="">
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
							<a href="#"><img src="images/clients/11.jpg" alt=""></a>
						</div>
					</div>
					<!-- Column -->
					<div class="column col-lg-3 col-md-6 col-sm-12">
						<div class="image">
							<a href="#"><img src="images/clients/12.jpg" alt=""></a>
						</div>
					</div>
					<!-- Column -->
					<div class="column col-lg-3 col-md-6 col-sm-12">
						<div class="image">
							<a href="#"><img src="images/clients/13.jpg" alt=""></a>
						</div>
					</div>
					<!-- Column -->
					<div class="column col-lg-3 col-md-6 col-sm-12">
						<div class="image">
							<a href="#"><img src="images/clients/14.jpg" alt=""></a>
						</div>
					</div>
					<!-- Column -->
					<div class="column col-lg-3 col-md-6 col-sm-12">
						<div class="image">
							<a href="#"><img src="images/clients/15.jpg" alt=""></a>
						</div>
					</div>
					<!-- Column -->
					<div class="column col-lg-3 col-md-6 col-sm-12">
						<div class="image">
							<a href="#"><img src="images/clients/16.jpg" alt=""></a>
						</div>
					</div>
					<!-- Column -->
					<div class="column col-lg-3 col-md-6 col-sm-12">
						<div class="image">
							<a href="#"><img src="images/clients/17.jpg" alt=""></a>
						</div>
					</div>
					<!-- Column -->
					<div class="column col-lg-3 col-md-6 col-sm-12">
						<div class="image">
							<a href="#"><img src="images/clients/18.jpg" alt=""></a>
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
				<img src="images/background/4.jpg" alt="" />
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

<!-- Mirrored from t.commonsupport.xyz/intenax/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2024 21:03:10 GMT -->
</html>