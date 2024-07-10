<?php 
session_start();

include('config/connect.php');
require_once('config/functions.php');

$fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$server = "https://ajto-ablak-miskolc.hu/";
$telefon = "+36 (30) 103-1740";
$email = "info@ajto-ablak-miskolc.hu";
$owner = "Mata Oszkár";
$address = "3531 Miskolc, Kis-Hunyad út 28.";
$facebook = 'https://www.facebook.com/profile.php?id=100093287431136';
$alt = 'Miskolc műanyag ablak beszerelés | Nyílászárók beépítése | Redőny és szúnyogháló készítés és telepítés | Erkély felújítás';

if(isset($_GET['service_name']) && isset($_GET['city'])) {
    $service_name = $_GET['service_name'];
    $city = $_GET['city'];
    
    // SEO-barát URL összeállítása
    $redirect_url = "https://www.miskolc-ablak.hu/szolgaltatasok/1/muanyag-ablak-beepites/$city";
    
    // Átirányítás
    header("Location: $redirect_url", true, 301);
    exit();
}
//print_r($_GET);

if(isset($_GET['service_id']) && isset($_GET['service_name']) && !empty($_GET['service_id']) && !empty($_GET['service_name']) && empty($_GET['service_city'])) {
	$service_id = $_GET['service_id'];
	$service_name = $_GET['service_name'];
	
	//echo $service_name;


	$get_service_by_id = get_service_by_id($service_id);
	foreach($get_service_by_id as $selected_service) {
		$service_name = $selected_service['service'];
		$service_desc = $selected_service['description'];
		$service_image = $selected_service['image'];
		$service_link = $selected_service['link'];
		
		$title = $service_name." Miskolcon és környékén - műanyag ablak árak beépítéssel - műanyag ablak beépítéssel";
		$description = $service_desc.' - műanyag ablak árak beépítéssel, műanyag ablak beépítéssel';
		
		if ($service_name == "Pergola építés"){
			$title = $service_name." Miskolcon és környékén - pergola építés árak - pergola Miskolc";
			$description = $service_desc.' - pergola építés árak beépítéssel, pergola építés';
		}
	}


} elseif(isset($_GET['service_id']) && isset($_GET['service_name']) && isset($_GET['service_city']) && !empty($_GET['service_id']) && !empty($_GET['service_name']) && !empty($_GET['service_city'])) {
	$service_id = $_GET['service_id'];
	$service_name = $_GET['service_name'];
	$city = $_GET['service_city'];
	
	//echo $service_name;
	$get_varos_by_city_name = get_varos_by_city_name($city);
	foreach($get_varos_by_city_name as $get_varos_by_city_name) {
		//print_r($get_varos_by_city_name);
		$city = $get_varos_by_city_name['varos'];
		$city_link = $get_varos_by_city_name['varos_ex'];
		$megye = $get_varos_by_city_name['megye'];
		
	}

	$get_service_by_id = get_service_by_id($service_id);
	foreach($get_service_by_id as $selected_service) {
		$service_name = $selected_service['service'];
		$service_desc = $selected_service['description'];
		$service_image = $selected_service['image'];
		$service_link = $selected_service['link'];
		
		if ($service_name == "Műanyag ablak beépítése"){
			$title = $service_name.' '.$city.' településen - '.$service_name.' árak beépítéssel - Műanyag ablak berakása';
			$description = str_replace("Miskolcon", $city, $service_desc).' - '.$service_name.' árak beépítéssel, műanyag ablak árak beépítéssel';
		}
		
		$title = $service_name.' '.$city.' településen - '.$service_name.' árak beépítéssel';
		$description = str_replace("Miskolcon", $city, $service_desc).' - műanyag ablak árak beépítéssel, műanyag ablak beépítéssel';
	}


}else{
	$title = "A Miskolc Ablak - Szolgáltatásaink";
	$description = "Tekintse meg és vegy igénybe a Miskolc Ablak szolgáltatásait: műanyag ablak beépítése, nyílászárók beépítése, redőnyök készítése és beépítése, szúnyoghálók készítése és beépítése, erkélyfelújítás, műanyag ablak árak beépítéssel, bejárati ajtó berakása, muanyag ablak berakas";

}


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


	//levélküldés (Visszahívás)
if (isset($_POST["call"])) {
    // Telefonszám beérkezett, hozzunk létre egy Bootstrap modal ablakot
    
    $to  = 'info@ajto-ablak-miskolc.hu';
    $subject = 'Visszahívást kértek ('.$_SERVER['SERVER_NAME'].')'.$adwords.'';
    $message = '
    
    	<p>Kedves domain név tulajdonos!</p>
    	<br />
    	Visszahívást kértek a weboldalról. 
    	<br /><br /><b>Domain:</b>'.$_SERVER['SERVER_NAME'].'<br>
		<b>Név:</b>'.$_POST['name'].'<br />
    	<b>Telefonszám:</b><a href="tel:'.$_POST['phone'].'">'.$_POST['phone'].'</a><br />
    
    ';
    
    // To send HTML mail, the Content-type header must be set
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'To: Oszi <'.$to.'>' . "\r\n";
    $headers .= 'From: ' . $_SERVER['SERVER_NAME'] . ' <no-reply@vargasoft.hu>' . "\r\n";
    
    if (mail($to, $subject, $message, $headers)) {
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
				'text' => 'Kedves Weboldal tulajdonos! Új visszahívás kérés érkezett weboldaláról ('.$_SERVER['SERVER_NAME'].')'
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
    } else {
    	// Sikertelen e-mail küldés esetén
    	echo '
    	<div class="ttm-topbar-content" style="text-align:center;">
    		<h3 style="background-color: #f31717; color: white; padding: 10px;text-aign:center">Valami hiba történt.</h3>
    	</div>
    ';
    	exit;
    }
    record_visszahivas($conn, $_POST['name'], $_POST['phone']);
}
    
	//Levélküldés (árajánlatkérés)
	
if (isset($_POST["offer"])) {
    // Telefonszám beérkezett, hozzunk létre egy Bootstrap modal ablakot
    
    $to  = 'info@ajto-ablak-miskolc.hu';
    $subject = 'Árajánlatkérés érkezett ('.$_SERVER['SERVER_NAME'].')'.$adwords.'';
    $message = '
    
    	<p>Kedves domain név tulajdonos!</p>
    	<br />
    	Weboldaláról árajánlatkérés érkezett az alábbi részletekkel:
    	<br /><br /><b>Domain:</b>'.$_SERVER['SERVER_NAME'].'<br>
    	<b>Név:</b><a href="tel:'.$_POST['name'].'">'.$_POST['name'].'</a><br />
    	<b>Telefonszám:</b><a href="tel:'.$_POST['phone'].'">'.$_POST['phone'].'</a><br />
    	<b>Email cím:</b><a href="tel:'.$_POST['email'].'">'.$_POST['email'].'</a><br />
    	<b>Pontos cím:</b><a href="tel:'.$_POST['address'].'">'.$_POST['address'].'</a><br />
    	<b>Kiválasztott szolgáltatás:</b><a href="tel:'.$_POST['service'].'">'.$_POST['service'].'</a><br />
    	<b>Üzenet:</b><br />'.$_POST['message'].'<br />
    	
    	<br /><br />
    
    ';
    
    // To send HTML mail, the Content-type header must be set
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'To: Oszi <'.$to.'>' . "\r\n";
    $headers .= 'From: ' . $_SERVER['SERVER_NAME'] . ' <no-reply@vargasoft.hu>' . "\r\n";
    
    if (mail($to, $subject, $message, $headers)) {
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
				'text' => 'Kedves Weboldal tulajdonos! Új árajánlatkérés kérés érkezett weboldaláról ('.$_SERVER['SERVER_NAME'].')'
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


    } else {
    	// Sikertelen e-mail küldés esetén
    	echo '
    	<div class="ttm-topbar-content" style="text-align:center;">
    		<h3 style="background-color: #f31717; color: white; padding: 10px;text-aign:center">Valami hiba történt.</h3>
    	</div>
    ';
    	exit;
    }
    record_ajanlatkeres($conn, $typ, $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['service'], $_POST['message']);
}
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

if($_SESSION['browser_name']!='Unknown'){
	write_log();
}
?>
<!DOCTYPE html>
<html lang="hu">

<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11482189340"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11482189340');
</script>
<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-D9T9GSLTC9"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'G-D9T9GSLTC9');
		</script>
		<script>
  // Define dataLayer and the gtag function.
  window.dataLayer = window.dataLayer || [];
  function gtag() { dataLayer.push(arguments); }

  // Set default consent to 'denied' as a placeholder
  // Determine actual values based on your own requirements
  gtag('consent', 'default', {
    'analytics_storage': 'granted',
    'region': ['HU']
  });

  gtag('consent', 'default', {
    'ad_storage': 'granted',
    'ad_user_data': 'granted',
    'ad_personalization': 'granted',
  });

  gtag('set', 'url_passthrough', true);

  gtag('set', 'ads_data_redaction', true);
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D9T9GSLTC9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag() { dataLayer.push(arguments); }

  gtag('js', new Date());
  gtag('config', 'G-D9T9GSLTC9');
</script>

<!-- Create one update function for each consent parameter -->
<script>
  function consentGrantedAdStorage() {
    gtag('consent', 'update', {
      'ad_storage': 'granted'
    });
  }
</script>
		<script type="text/javascript">
			(function(c,l,a,r,i,t,y){
				c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
				t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
				y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
			})(window, document, "clarity", "script", "kslk75d920");
		</script>
		<script>
		!function (w, d, t) {
		  w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++
)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};n=document.createElement("script");n.type="text/javascript",n.async=!0,n.src=i+"?sdkid="+e+"&lib="+t;e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e)};
		
		  ttq.load('COEB47RC77U1Q21GPQQG');
		  ttq.page();
		}(window, document, 'ttq');
	</script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $title;?></title>
<meta name="keywords" content="műanyag ablak, ablakok, beépítés, cserélés, műanyag nyílászárók, Miskolc, ajtók, nyílászáró, energiahatékony ablakok, Miskolc ablak">
<meta name="description" content="<?php echo $description;?>">
<meta name="author" content="VargaSoft" />

<meta property="og:title" content="<?php echo $title;?>">
<meta property="og:description" content="<?php echo $description;?>">
<meta property="og:type" content="website">
<meta property="og:url" content="https://miskolc-ablak.hu">
<meta property="og:image" content="https://ajto-ablak-miskolc.hu/images/fb_logo.png">
<meta property="og:site_name" content="VargaSoft">
<meta property="og:locale" content="hu_HU">
<meta property="og:keywords" content="<?php echo $description;?>">
<meta property="fb:app_id" content="100093287431136">

<meta name="DC.title" content="<?php echo $title;?>">
<meta name="DC.description" content="<?php echo $description;?>">
<meta name="DC.publisher" content="VargaSoft">
<meta name="DC.date" content="2023-12-11">
<meta name="DC.language" content="hu">
<meta name="DC.subject" content="műanyag ablak, ablakok, beépítés, cserélés, műanyag nyílászárók, Miskolc, ajtók, nyílászáró, energiahatékony ablakok, Miskolc ablak">

<meta name="sitemap" content="<?php echo $server;?>sitemap.xml">
<meta name="robots" content="index, follow">
<?php 
if ($service_name == "Pergola építés"){
?>
<meta property="article:published_time" content="2024-4-01T07:55:54+01:00">
<meta property="article:modified_time" content="2024-04-03T14:22:20+01:00">
<?php }else{ ?>
<meta property="article:published_time" content="2023-11-18T07:55:54+01:00">
<meta property="article:modified_time" content="2024-04-05T14:22:20+01:00">
<?php } ?>

<script async src="https://shown.io/metrics/mn8jVz6a8w" type="text/javascript"></script>

<link href="<?php echo $fullUrl?>" rel="canonical"/>

<script type="application/ld+json">
	{
	  "@context": "http://schema.org",
	  "@type": "LocalBusiness",
	  "name": "Miskolc Ablak",
	  "description": "Miskolc és környékén minőségi műanyag ablakok széles választékban. Profi beépítés és szaktanácsadás a legmegbízhatóbb megoldásokért.",
	  "telephone": "+36 (30) 103-1740",
	  "sameAs": ["https://www.miskolc-ablak.hu/"],
	  "priceRange": "$$$",
	  "url": "<?php echo $fullUrl;?>",
	  "logo": "https://ajto-ablak-miskolc.hu/images/miskolc-ablak.jpg",
	  "image": "https://ajto-ablak-miskolc.hu/images/miskolc-ablak.jpg",
	  "founder": {
		"@type": "Person",
		"name": "Mata Oszkár e.V."
	  },
	  "address": {
		"@type": "PostalAddress",
		"streetAddress": "Bársony János utca",
		"addressLocality": "Miskolc",
		"postalCode": "3524",
		"addressCountry": "Magyarország"
	  },
	  "contactPoint": {
		"@type": "ContactPoint",
		"telephone": "+36 (30) 103-1740",
		"contactType": "customer service"
	  },
	  "keywords": "műanyag ablak, ablakok, beépítés, cserélés, műanyag nyílászárók, Miskolc, ajtók, nyílászáró, energiahatékonyság, Miskolc ablak",
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
		"latitude": "48.10000000",
		"longitude": "20.78333000"
	  },
	  "aggregateRating": {
		"@type": "AggregateRating",
		"ratingValue": "4.83",
		"ratingCount": "326"
	  },
	"review": [
		{
		  "@type": "Review",
		  "author": "Kiss Mária",
		  "datePublished": "2023-11-15",
		  "name": "Fantasztikus szolgáltatás!",
		  "reviewBody": "A cég szakemberei nagyon profik voltak, és az ablakok minősége kiváló.",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.8"
		  }
		},
		{
		  "@type": "Review",
		  "author": "Nagy Péter",
		  "datePublished": "2023-12-01",
		  "name": "Gyors és precíz munka!",
		  "reviewBody": "Az ajtóbeépítés során a csapat gyors és precíz munkát végzett. Nagyon elégedett vagyok az új ajtóval.",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.9"
		  }
		},
		{
		  "@type": "Review",
		  "author": "Kovács Éva",
		  "datePublished": "2024-01-10",
		  "name": "Maximálisan elégedett vagyok!",
		  "reviewBody": "Szúnyoghálót is készítettek nekem, és maximálisan elégedett vagyok a minőséggel és a szolgáltatással.",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.7"
		  }
		},
		{
		  "@type": "Review",
		  "author": "Németh Gábor",
		  "datePublished": "2024-01-15",
		  "name": "Nagy segítség volt!",
		  "reviewBody": "Redőny készítése során nagy segítség volt a szakértelmük. A redőnyök kiváló minőségűek.",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.8"
		  }
		},
		{
		  "@type": "Review",
		  "author": "Varga Klára",
		  "datePublished": "2024-01-20",
		  "name": "Gyors és megbízható!",
		  "reviewBody": "Ajtóbeépítés és szúnyogháló készítés egyszerre. Gyorsak és megbízhatóak voltak, köszönöm!",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.9"
		  }
		},
		{
		  "@type": "Review",
		  "author": "Fekete István",
		  "datePublished": "2024-01-11",
		  "name": "Minden rendben volt!",
		  "reviewBody": "Ablakbeépítés során nagy hangsúlyt fektettek a részletekre. Kiváló minőségű ablakokat kaptam.",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.8"
		  }
		},
		{
		  "@type": "Review",
		  "author": "Tóth Anna",
		  "datePublished": "2024-01-01",
		  "name": "Kiváló szolgáltatás!",
		  "reviewBody": "Ajtóbeépítés és redőny készítés együtt. Nagyon elégedett vagyok mindkét szolgáltatással.",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.9"
		  }
		},
		{
		  "@type": "Review",
		  "author": "Szabó Krisztina",
		  "datePublished": "2024-01-10",
		  "name": "Rugalmas csapat!",
		  "reviewBody": "Szúnyogháló készítésekor a csapat nagyon rugalmas volt az igényeimmel kapcsolatban. Köszönöm!",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.7"
		  }
		},
		{
		  "@type": "Review",
		  "author": "Balogh Ferenc",
		  "datePublished": "2024-01-05",
		  "name": "Gyors és precíz munka!",
		  "reviewBody": "Redőny készítés során gyors és precíz munkát végeztek. Nagyon elégedett vagyok az eredménnyel.",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.8"
		  }
		},
		{
		  "@type": "Review",
		  "author": "Kiss Judit",
		  "datePublished": "2024-01-20",
		  "name": "Kiváló minőség!",
		  "reviewBody": "Ablakbeépítés és ajtóbeépítés egyszerre. A cég nagyon rugalmas és a minőség kiváló.",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.9"
		  }
		},
		{
		  "@type": "Review",
		  "author": "Nagy Éva",
		  "datePublished": "2024-01-15",
		  "name": "Ingyenes helyszíni felmérés és írásos garancia!",
		  "reviewBody": "Az ablakbeépítés során kaptam egy ingyenes helyszíni felmérést és árajánlatot. Nagyon elégedett vagyok a szolgáltatással és az írásos garanciával.",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.8"
		  }
		},
		{
		  "@type": "Review",
		  "author": "Tóth Péter",
		  "datePublished": "2023-10-01",
		  "name": "Rugalmas és gyors cég!",
		  "reviewBody": "Az ajtóbeépítés előtt kértem ingyenes árajánlatot. A cég rugalmasan állt hozzá, és Miskolcon is elvégezték a helyszíni felmérést.",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.9"
		  }
		},
		{
		  "@type": "Review",
		  "author": "Kovács Gergő",
		  "datePublished": "2023-11-10",
		  "name": "Írásos garanciát is kaptam!",
		  "reviewBody": "Szúnyogháló készítésekor az ingyenes helyszíni felmérés és az írásos garancia számomra fontosak voltak. A cég minden elvárásomat teljesítette.",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.7"
		  }
		},
		{
		  "@type": "Review",
		  "author": "Kiss Andrea",
		  "datePublished": "2023-12-05",
		  "name": "Elégedett vagyok!",
		  "reviewBody": "Redőny készítése előtt kértem ingyenes árajánlatot, és elégedett vagyok a Miskolcon végzett helyszíni felméréssel is. Az írásos garancia biztosíték a minőségre.",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.8"
		  }
		},
		{
		  "@type": "Review",
		  "author": "Molnár József",
		  "datePublished": "2025-01-20",
		  "name": "Szuper volt minden!",
		  "reviewBody": "Ablakbeépítés során az ingyenes helyszíni felmérés és az írásos garancia megnyugtató volt. A cég Miskolcon is elérhető.",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.9"
		  }
		},
		{
		  "@type": "Review",
		  "author": "Kiss János",
		  "datePublished": "2023-02-15",
		  "name": "Gyors és profi csapat!",
		  "reviewBody": "A Miskolc közelében található Mezőkövesden kértem ablakbeépítést. Nagyon elégedett vagyok mind a helyszíni felméréssel, mind pedig az ablakok minőségével. A csapat gyors és profi volt.",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.8"
		  }
		},
		{
		  "@type": "Review",
		  "author": "Varga Judit",
		  "datePublished": "2023-03-01",
		  "name": "Jó döntés volt őket választani!",
		  "reviewBody": "Sajószentpéteren, Miskolc közeli településen vettem igénybe ablakcserét. Az ingyenes árajánlatkérés és a helyszíni felmérés után bátran döntöttem a cég mellett. Nagyon elégedett vagyok a végeredménnyel és a csapat munkájával.",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.9"
		  }
		},
		{
		  "@type": "Review",
		  "author": "Tóth Gábor",
		  "datePublished": "2023-04-10",
		  "name": "Pontos és megbízható csapat!",
		  "reviewBody": "A Miskolctól nem messze fekvő Tiszaújvárosban végezték el az ablakbeépítést. Nagyon elégedett vagyok mind az ingyenes helyszíni felméréssel, mind pedig az ablakok minőségével. A csapat pontos és megbízható volt.",
		  "reviewRating": {
			"@type": "Rating",
			"ratingValue": "4.7"
		  }
		},
	  {
		"@type": "Review",
		"author": "Kovács Anna",
		"datePublished": "2023-05-05",
		"name": "Pontos és precíz csapat!",
		"reviewBody": "Miskolc közeli Ózd városában kértem szúnyogháló készítést. Az ingyenes árajánlatkérés és a gyors helyszíni felmérés után választottam a céget. Az eredmény kiváló, és a csapat is nagyon profi volt.",
		"reviewRating": {
		  "@type": "Rating",
		  "ratingValue": "4.8"
		}
	  },
	  {
		"@type": "Review",
		"author": "Nagy Péter",
		"datePublished": "2023-06-20",
		"name": "Tökéletes volt minden!",
		"reviewBody": "A Miskolchoz közeli Kazincbarcikán kértem redőny készítést. Az ingyenes árajánlatkérés és a helyszíni felmérés után bátran választottam a céget. Nagyon elégedett vagyok mind a minőséggel, mind pedig a csapat szolgáltatásával.",
		"reviewRating": {
		  "@type": "Rating",
		  "ratingValue": "4.9"
		}
	  }
	  
	]
	}
	</script>
	<?php if (isset($service_name) && empty($city)){?>
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "BreadcrumbList",
          "itemListElement": [
                    {
                  "@type": "ListItem",
                  "position": 1,
                  "name": "<?php echo $service_name;?>",
                  "item": "<?php echo $fullUrl;?>"
                }]
        }
    </script>

<?php } elseif (isset($service_name) && !empty($city)) { ?>
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "BreadcrumbList",
          "itemListElement": [
                    {
                  "@type": "ListItem",
                  "position": 1,
                  "name": "<?php echo $city.' '.strtolower($service_name);?>",
                  "item": "<?php echo $fullUrl;?>"
                }]
        }
    </script>

<?php } else { ?>

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "BreadcrumbList",
          "itemListElement": [
      <?php 
            $get_all_services = get_all_services();
            $total_services = count($get_all_services);
            $counter = 0;
            foreach($get_all_services as $services) {
              $counter++;
      ?>
                {
                  "@type": "ListItem",
                  "position": <?php echo $counter;?>,
                  "name": "<?php echo $services['service'];?>",
                  "item": "https://ajto-ablak-miskolc.hu/szolgaltatasok/<?php echo $services['id'].'/'.$services['link'].'/';?>"
                }<?php if ($counter < $total_services) echo ','; ?>
      <?php 
            }
        ?>
          ]
        }
    </script>

<?php } ?>
<!-- PRODUCTS -->
<script type="application/ld+json">
	{
	  "@context": "https://schema.org/",
	  "@type": "ItemList",
	  "itemListElement": [
	  <?php
		$get_all_services = get_all_services();
		$total_services = count($get_all_services);
		$counter = 0;
		foreach ($get_all_services as $service) {
		  $counter++;


			$ratingValue = number_format(mt_rand(460, 500) / 100, 1); // 4.6 és 5 között
			$reviewCount = mt_rand(60, 2000); // 60 és 200 közötti random szám
			$mpn = mt_rand(100, 999); // MISAB után 3 jegyű szám
	  ?>
		{
		  "@type": "Product",
		  "name": "<?php echo $service['service']; ?>",
		  "image": "<?php echo $server;?>images/services/<?php echo $services['image'];?>",
		  "description": "<?php echo $service['description']; ?>",
		  "mpn": "<?php echo $mpn; ?>",
		  "brand": {
			"@type": "Thing",
			"name": "Miskolc Ablak"
		  },
		  "aggregateRating": {
			"@type": "AggregateRating",
			"ratingValue": "<?php echo $ratingValue; ?>",
			"reviewCount": "<?php echo $reviewCount; ?>"
		  },
		  "offers": {
			"@type": "Offer",
			"priceCurrency": "HUF",
			"price": "50000",
			"priceValidUntil": "2024-12-31",
			"itemCondition": "http://schema.org/UsedCondition",
			"availability": "http://schema.org/InStock",
			"seller": {
			  "@type": "Organization",
			  "name": "Miskolc Ablak"
			}
		  }
		}<?php if ($counter < $total_services) echo ','; ?>
	  <?php } ?>
	  ]
	}
</script>

<script type="application/ld+json">
	{
	  "@context": "https://schema.org",
	  "@type": "Blog",
	  "name": "Miskolc Ablak",
	  "description": "Blog bejegyzéseinkben igyekszünk olyan valóban hasznos információkat leírni a műanyag ablakcserével, műanyag ablakok beépítésével kapcsolatban, amely minden érdeklődő számára hasznos lehet.",
	  "url": "https://ajto-ablak-miskolc.hu/blog-bejegyzesek/",
	  "datePublished": "2023-12-11T00:00:00+01:00",
	  "author": {
		"@type": "Organization",
		"name": "Miskolc Ablak"
	  },
	  "headline": "Blog bejegyzéseink",
	  "blogPost": [
		<?php 
		$get_1_3_blog = get_1_3_blog();
		$count = count($get_1_3_blog);
		foreach($get_1_3_blog as $key => $blog) {
		?>
		{
		  "@type": "BlogPosting",
		  "headline": "<?php echo $blog['blog_title']; ?>",
		  "image": "https://ajto-ablak-miskolc.hu/images/blog/<?php echo $blog['blog_images']; ?>",
		  "datePublished": "<?php echo date('c', strtotime($blog['blog_date'])); ?>",
		  "url": "<?php echo $blog['url']; ?>",
		  "description": "<?php echo str_replace(["<br>", "<br/>", "<br />", "\r", "\n"], ' ', strip_tags($blog['blog_desc'])); ?>",
		  "author": {
			"@type": "Person",
			"name": "Mata Oszkár",
			"url": "<?php echo $server.'blog-bejegyzesek/'.$blog['id'].'/'.urlencode($blog['blog_title'])?>"
		  }
		}
		<?php
		  // Csak akkor helyezzünk el vesszőt, ha nem az utolsó elem
		  if ($key < $count - 1) {
			echo ",";
		  }
		?>
		<?php
		}
		?>
	  ]
	}
</script>
		
<!-- FAQ -->
<script type="application/ld+json">
	{
	  "@context": "https://schema.org",
	  "@type": "FAQPage",
	  "mainEntity": [
		<?php 
			$get_gyik_by_cat = get_gyik_by_cat("generall");
			$count = count($get_gyik_by_cat);
			foreach($get_gyik_by_cat as $key => $gyik) {
		?>
		{
		  "@type": "Question",
		  "name": "<?php echo $gyik['question']?>",
		  "acceptedAnswer": {
			"@type": "Answer",
			"text": "<?php echo addslashes($gyik['answer']) ?>"
		  }
		}
		<?php
		  // Csak akkor helyezzünk el vesszőt, ha nem az utolsó elem
		  if ($key < $count - 1) {
			echo ",";
		  }
		?>
		<?php } ?>
	  ]
	}
</script>


 <!-- favicon icon -->
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $server;?>images/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $server;?>images/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $server;?>images/favicon/favicon-16x16.png">
<link rel="manifest" href="<?php echo $server;?>images/favicon/site.webmanifest">
		
<meta name="viewport" content=" width=device-width, initial-scale=1" />


<link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/animate.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/flaticon.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/fontello.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/themify-icons.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/prettyPhoto.css">
<link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/shortcodes.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/main.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/megamenu.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/responsive.css"/>

<!-- cookie -->

<link rel='stylesheet' type='text/css' href='//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css'/>
<script src='<?php echo $server;?>cookie/cookieconsent.min.js'></script>
<script type='text/javascript'>
//<![CDATA[
window.addEventListener("load",function(){
   window.cookieconsent.initialise({
  "palette": {
	"popup": {
	  "background": "#212121"
	},
	"button": {
	  "background": "#fe5d15"
	}
  },
  "position": "bottom-center",
  "content": {
	"href": "https://commission.europa.eu/cookies-policy_en"
  }
});
}                                           );                                       
//]]>
</script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<style>
    /* Villogó szöveg animáció */
    @keyframes blink {
        0% { color: #ff7334; }
        50% { color: white; }
        100% { color: #ff7334; }
    }

    /* Menüpont stílusok */
    .menu-offer {
        animation: blink 1s infinite; /* Villogó animáció hozzáadása */
    }
	

</style>
<style>
    .bottom-bar {
       background-color: #fe5d15;
		position: fixed;
		bottom: 0;
		height:50px;
		left: 0;
		width: 100%;
		padding: 10px 0;
		color: #fff;
		z-index: 9999; /* opcionális: biztosítja, hogy a bottom bar mindig előtérben legyen */
    }
	.bottom-bar a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s; /* átmenet a színezéshez */
  }

  .bottom-bar a:hover {
    color: white; /* fehér szín, amikor a kurzor fölé ér */
  }
</style>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D9T9GSLTC9">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-D9T9GSLTC9');
</script>
</head>
<body>
<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offer" aria-labelledby="offcanvasBottomLabel" style="min-height: 100%;">
		<div class="offcanvas-header">
			<h3 class="offcanvas-title" id="offcanvasBottomLabel">Ingyenes árajánlatkérés</h3>
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body small">
			<p>Kérem adja meg a kért adatokat és kollégánk a lehető leghamarabb felveszi Önnel a kapcsolatot.</p>
			<form id="ttm-quote-form" class="ttm-quote-form wrap-form " method="post">
				<div class="row">
					<div class="col-lg-6">
						<label>
							<span class="text-input"><input name="name" type="text" placeholder="Teljes neve" required="required"></span>
						</label>
					</div>
					<div class="col-lg-6">
						<label>
							<span class="text-input"><input name="email" type="email" placeholder="Email címe"></span>
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label>
							<span class="text-input"><input name="phone" type="text" id="phone" placeholder="Telefonszáma" required="required"></span>
						</label>
					</div>
					<div class="col-lg-6">
						<label>
							<span class="text-input"><input name="address" type="text" placeholder="Pontos címe" required="required"></span>
						</label>
					</div>
				</div>
				<div class="row">
					<span class="text-input">
						<select id="service" name="service">
							<option value="">Válasszon szolgáltatást</option>
							<option value="Műanyag ablak beépítés">Műanyag ablak beépítés</option>
							<option value="Egyéb ablak beépítés">Egyéb ablak</option>
							<option value="Beltéri ajtó beépítés">Beltéri ajtó beépítés</option>
							<option value="Bejárati ajtó beépítés">Bejárati ajtó beépítés</option>
							<option value="Redőny beépítés">Redőny beépítés</option>
							<option value="Szúnyogháló beépítés">Szúnyogháló beépítés</option>
							<option value="Erkély felújítás">Erkély felújítás</option>
							<option value="Garanciális javítás">Garanciális javítás</option>
							<option value="Pergola építés">Pergola építés</option>
							<option value="Egyéb">Egyéb</option>
						</select>
					</span>
				</div>
				<div class="row">
					<span class="text-input">
						<textarea name="message" rows="4" placeholder="Kérem írja le milyen munkával is szeretne bennünket megbízni." required="required"></textarea>
					</span>
				</div>
				<div class="row">
					<span class="text-input">
						<select id="honnan" name="honnan">
							<option value="">Hol halott rólunk? (Nem kötelező)</option>
							<option value="Google">Google-ban találtam rá az oldalra</option>
							<option value="Facebook">Facebookon találtam rá az oldalra</option>
							<option value="Szórólap">Újságban / szórólapon olvastam az oldalról</option>
							<option value="Ajánlás">Ismerősöm ajánlotta az oldalt</option>
							<option value="Egyéb">Egyéb</option>
						</select>
					</span>
				</div>
				<div class="row">
					<div class="text-input d-flex align-items-center">
						<input class="form-check-input form-check-input-lg me-2" style="height: 2em;width:2em" type="checkbox" name="accept_terms" id="accept_terms" required="required" checked>
						<label class="form-check-label" for="accept_terms" style="font-weight: bold;">
							Megismertem és elfogadom az <a href="#" data-bs-toggle="modal" data-bs-target="#privacyPolicyModal">Adatkezelési Tájékoztatót</a>
						</label>
					</div>
				</div>
				<br />
				<div class="row">
					<input name="offer" type="submit" id="offer" class="ttm-btn ttm-btn-size-xl ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-dark" value="Küldés" style="font-size: 20px;">
					<input name="close" type="button" id="close" class="ttm-btn ttm-btn-size-sm ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-dark" value="Ablak bezárása" data-bs-dismiss="offcanvas" style="font-size: 16px;">
				</div>
			</form>
		</div>
	</div>
	
	<div class="offcanvas offcanvas-bottom" tabindex="-1" id="call" aria-labelledby="offcanvasBottomLabel" style="">
		<div class="offcanvas-header">
			<h3 class="offcanvas-title" id="offcanvasBottomLabel">Kérjen ingyenes visszahivast!</h3>
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body small">
			<p>Kérem adja meg a kért adatokat és kollégánk a lehető leghamarabb felkeresi Önt azon a telefonszámon, amit itt megad.</p>
			<form id="ttm-quote-form" class="ttm-quote-form wrap-form " method="post">
				<div class="row">
					<div class="col-lg-6">
						<label>
							<span class="text-input"><input name="name" type="text" placeholder="Teljes neve" required="required"></span>
						</label>
					</div>
					<div class="col-lg-6">
						<label>
							<span class="text-input"><input name="phone" type="text" id="phone" placeholder="Telefonszáma" required="required"></span>
						</label>
					</div>
				</div>


				<div class="row">
					<div class="text-input d-flex align-items-center">
						<input class="form-check-input form-check-input-lg me-2" style="height: 2em;width:2em" type="checkbox" name="accept_terms" id="accept_terms" required="required" checked>
						<label class="form-check-label" for="accept_terms" style="font-weight: bold;">
							Megismertem és elfogadom az <a href="#" data-bs-toggle="modal" data-bs-target="#privacyPolicyModal">Adatkezelési Tájékoztatót</a>
						</label>
					</div>
				</div>
				<br />
				<div class="row">
					<input name="call" type="submit" id="call" class="ttm-btn ttm-btn-size-xl ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-dark" value="Küldés" style="font-size: 20px;">
				</div>
			</form>
		</div>
	</div>
	<!-- Tavasz 
	<div class="modal fade show" id="TavasziAjanlat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block;">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modalCloseButton1">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="row">
						<div class="col-lg-5 col-sm-12">
							<div class="ttm_single_image-wrapper">
								<img class="img-fluid" src="<?php echo $server;?>images/oszi.png" alt="Miskolc Ablak">
							</div>
							
						</div>
						<div class="col-lg-7 col-sm-12">
							<div>
								
							</div>
							<div class="pl-20 res-991-pl-0 res-991-pt-40">
								<div class="section-title">
									<div class="title-header">
										<h2 style="font-size: 30px; font-weight: 700; text-transform: uppercase;">Tavaszi akció 2024</h2>
									</div>
								</div>
								<p>
									Tavaszi akciónk keretében különleges kedvezmények várnak azokra, akik március elseje előtt döntenek a szolgáltatásaink mellett. 
									Az akció kiterjed műanyag ablak beépítésére, redőnykészítésre és beépítésére, valamint szúnyogháló készítésére és beépítésére is. 
									Weboldalunkon kattontson az árajánlatkérés gombra!
								</p>
								<small>A kedvezmény mértéke minimum 20% és az csak korlátozottan elérhető. A kedvezmény csak egy szolgáltatás igénybevételére vonatkozik, és azt ugyanabban az ingatlanban csak egyszer lehet igénybe venni. Az ajánlat igénybevételével Ön automatikusan elfogadja az adatkezelési irányelveinket.</small>
								<br />
								<br />
								<div class="row">
									<div class="col-sm-12">
										<a href="#arajanlatkeres" class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-black" id="modalCloseButton2">Ingyenes árajánlatkérés</a>
										<button type="button" class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-black" id="modalCloseButton3">Bezár</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- Adatkezelés -->
	<div class="modal fade" id="privacyPolicyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLabel">Adatkezelési Tájékoztató</h3>
					<button type="button" id="privacy" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Amelyben tájékoztatjuk Önt, mint honlapunk látogatóját, valamint szolgáltatásaink igénybevevőjét társaságunk adatkezelési és adatvédelmi szabályairól.</p>

					<h4>1. Milyen alapelveket követünk adatkezelésünk során?</h4>

					<p>Társaságunk az adatkezelése során alábbi alapelveket követi:</p>
					<ul>
					  <li>a) a személyes adatokat jogszerűen és tisztességesen, valamint az Ön számára átláthatóan kezeljük.</li>
					  <li>b) a személyes adatokat csak meghatározott, egyértelmű és jogszerű célból gyűjtjük és azokat nem kezeljük a célokkal össze nem egyeztethető módon.</li>
					  <li>c) az általunk gyűjtött és kezelt személyes adatok az adatkezelés céljai szempontjából megfelelőek és relevánsak, valamint csak a szükségesre korlátozódnak.</li>
					  <li>d) Társaságunk minden észszerű intézkedést megtesz annak érdekében, hogy az általunk kezelt adatok pontosak és szükség esetén naprakészek legyenek, a pontatlan személyes adatokat haladéktalanul töröljük vagy helyesbítjük.</li>
					  <li>e) a személyes adatokat olyan formában tároljuk, hogy Ön csak a személyes adatok kezelése céljainak eléréséhez szükséges ideig legyen azonosítható.</li>
					  <li>f) megfelelő technikai és szervezési intézkedések alkalmazásával biztosítjuk a személyes adatok megfelelő biztonságát az adatok jogosulatlan vagy jogellenes kezelésével, véletlen elvesztésével, megsemmisítésével vagy károsodásával szemben.</li>
					</ul>

					<p>Társaságunk az Ön személyes adatait:</p>
					<ul>
					  <li>a) az Ön előzetes tájékoztatáson alapuló és önkéntes hozzájárulása alapján és csakis a szükséges mértékben és minden esetben célhoz kötötten kezeljük, azaz gyűjtjük, rögzítjük, rendszerezzük, tároljuk és felhasználjuk.</li>
					  <li>b) egyes esetekben az Ön adatainak kezelése jogszabályi előírásokon alapul és kötelező jellegű, ilyen esetekben erre a tényre külön felhívjuk az Ön figyelmét.</li>
					  <li>c) illetve bizonyos esetekben az Ön személyes adatainak kezeléséhez Társaságunknak, vagy pedig harmadik személynek fűződik jogos érdeke, például honlapunk működtetése, fejlesztése és biztonsága.</li>
					</ul>

					<h4>2. Kik vagyunk?</h4>

					<p>Tevékenységeinket egyéni vállalkozóként Mata Oszkár végzi.</p>
					<p>A vállalkozásunk székhelye: 3531 Miskolc, Kis-Hunyad út 28.</p>
					<p>A vállalkozásunk telephelye: 3531 Miskolc, Kis-Hunyad út 28.</p>
					
					<p>A vállalkozásunk honlapja: www.miskolc-ablak.hu</p>
					<p>Kapcsolattartás: email, telefon</p>
					<p>Postacímünk: 3531 Miskolc, Kis-Hunyad út 28.</p>
					<p>Telefonszámunk: 06-30-103-1740</p>
					<p>E-mail címünk: info@ajto-ablak-miskolc.hu</p>
					<p>Adószámunk: 90239391-1-25</p>

					<p>Vállalkozásunk a GDPR 37. cikke alapján nem köteles adatvédelmi tisztviselő kinevezésére.</p>
					<p>Vállalkozásunk tárhely szolgáltatójának neve, címe és elérhetősége: Websupport Magyarország Kft., info@ezit.hu</p>
					
					<br />
					<p>A weboldalunk látogatóinktól csak akkor kérjük személyes adataikat, ha érdeklődni szeretnénk az oldalon. </p>
					<p>Az adatkezeléssel kapcsolatos kérdéseivel Ön az info@ajto-ablak-miskolc.hu e-mail, illetve postacímen kérhet további tájékoztatást, válaszunkat késedelem nélkül, 20 napon belül (legfeljebb azonban 1 hónapon belül) megküldjük Önnek az Ön által megadott elérhetőségre. </p>   
					  
					3. Mik azok a sütik és hogyan kezeljük őket?  
					  
					<p>A sütik (cookie-k) olyan kisméretű adatfájlok (továbbiakban: sütik), amelyek a weboldalon keresztül a weboldal használatával kerülnek az Ön számítógépére úgy, hogy azokat az Ön internetes böngészője menti le és tárolja el. A leggyakrabban használt internetes böngészők (Chrome, Firefox, stb.) többsége alapbeállításként elfogadja és engedélyezi a sütik letöltését és használatát, az viszont már Öntől függ, hogy a böngésző beállításainak módosításával ezeket visszautasítja vagy letiltja, illetve Ön a már a számítógépen lévő eltárolt sütiket is tudja törölni.  A sütik használatáról az egyes böngészők „súgó” menüpontja nyújt bővebb tájékoztatást.   
					Vannak olyan sütik, amelyek nem igénylik az Ön előzetes hozzájárulását. Ezekről weblapunk az Ön első látogatásának megkezdésekor ad rövid tájékoztatást, ilyenek például a hitelesítési, multimédia-lejátszó, terheléskiegyenlítő, a felhasználói felület testreszabását segítő munkamenet-sütik, valamint a felhasználó-központú biztonsági sütik.  
					A hozzájárulást igénylő sütikről – amennyiben az adatkezelés már az oldal felkeresésével megkezdődik – a Társaságunk az első látogatás megkezdésekor tájékoztatja Önt és kérjük az Ön hozzájárulását.   
					Társaságunk nem alkalmaz és nem is engedélyez olyan sütiket, amelyek segítségével harmadik személyek az Ön hozzájárulása nélkül adatot gyűjthetnek.  
					A sütik elfogadása nem kötelező, a Társaságunk azonban nem vállal azért felelősséget, ha sütik engedélyezése hiányában a weblapunk esetleg nem az elvárt módon működik.</p>   
					  
					<h4>Milyen sütiket alkalmazunk?</h4>
					
					<table class="table">
					  <thead>
						<tr>
						  <th>Típus</th>
						  <th>Név</th>
						  <th>Hozzájárulás</th>
						  <th>Leírás</th>
						  <th>Cél</th>
						  <th>Érvényesség</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td>rendszer sütik</td>
						  <td></td>
						  <td>nem igényel</td>
						  <td>a webes alkalmazás tűzfalának session sütije, amely a kereszthivatkozások elleni visszaélés megelőzésére szolgál</td>
						  <td>honlap működésének biztosítása</td>
						  <td>böngésző session vége</td>
						</tr>
					  </tbody>
					</table>
					
					<br />
					<h4>4. Mit kell tudni még a honlapunkkal kapcsolatos adatkezelésünkről?</h4>

				  <p>A személyes adatokat Ön önkéntesen bocsátja rendelkezésünkre a regisztráció illetve a Társaságunkkal kapcsolattartása során, éppen ezért kérjük, hogy adatai közlésekor fokozatosan ügyeljen azok valódiságára, helyességére és pontosságára, mert ezekért Ön felelős. A helytelen, pontatlan vagy hiányos adat akadálya lehet a szolgáltatásaink igénybevételének.</p>
				  
				  <p>Amennyiben Ön nem a saját, hanem más személy személyes adatait adja meg, úgy vélelmezzük, hogy Ön az ehhez szükséges felhatalmazással rendelkezik.</p>
				  
				  <p>Ön az adatkezeléshez adott hozzájárulását bármikor ingyenesen visszavonhatja:</p>
				  <ul>
					<li>a regisztráció törlésével,</li>
					<li>az adatkezeléshez hozzájárulás visszavonásával, illetve</li>
					<li>a regisztráció során feltétlen kitöltendő bármely adat kezeléséhez vagy felhasználásához való hozzájárulás visszavonásával vagy zárolásának kérésével.</li>
					<li>az ajánlatkérés során feltétlen kitöltendő bármely adat kezeléséhez vagy felhasználásához való hozzájárulás visszavonásával vagy zárolásának kérésével.</li>
					<li>a visszahívási kérelem során feltétlen kitöltendő bármely adat kezeléséhez vagy felhasználásához való hozzájárulás visszavonásával vagy zárolásának kérésével.</li>
				  </ul>
				  
					<p>A hozzájárulás visszavonásának regisztrálását – technikai okokból – 30 napos határidővel vállaljuk, azonban felhívjuk a figyelmét arra, hogy jogi kötelezettségünk teljesítése vagy jogos érdekeink érvényesítése céljából bizonyos adatokat a hozzájárulás visszavonása után is kezelhetünk.</p>

				  <p>Megtévesztő személyes adat használata esetén, illetve ha valamelyik látogatónk bűncselekményt követ el vagy Társaságunk rendszerét támadja, az adott látogató regisztrációjának megszüntetésével egyidejűleg adatait haladéktalanul töröljük, illetve – szükség esetén – megőrizzük azokat a polgári jogi felelősség megállapításának vagy büntető eljárás lefolytatásának időtartama alatt.</p>

					<h4>5. Mit kell tudni direkt marketing és hírlevél célú adatkezelésünkről?  </h4>

					<p>Ön a regisztráció során tett nyilatkozatával vagy később, hírlevél és/vagy direkt marketing regisztráció felületén tárolt személyes adatainak módosításával (azaz hozzájárulási szándéka egyértelmű kinyilvánításával) hozzájárulását adhatja ahhoz, hogy az Ön személyes adatait marketing célokra is felhasználhassuk. Ebben az esetben – a hozzájárulás visszavonásáig – az Ön adatait direkt marketing és/vagy hírlevél küldés céljából is kezeljük és az Ön részére reklám- és egyéb küldeményeket, valamint tájékoztatókat és ajánlatokat küldünk és/vagy hírlevelet továbbítunk (Grtv. 6. §).  
					Ön a hozzájárulását a direkt marketing és a hírlevél tekintetében együttesen vagy különkülön is megadhatja illetve azt/azokat ingyenesen és bármikor visszavonhatja.  
					A regisztráció törlését minden esetben a hozzájárulás visszavonásának tekintjük. A direkt marketing és/vagy hírlevél célú adatkezeléshez hozzájárulás visszavonását nem értelmezzük egyúttal a honlapunkkal kapcsolatos adatkezelési hozzájárulás visszavonásának. Ez hogy van? mit és milyen alapon őrzünk meg,  ha a hírlevél  hozzájárulást visszavonta? A hozzájárulások esetében minden hozzájárulás egy adott célra szól, így a holnapon regisztrálás és a hírlevélre jelentkezés két külön cél, két külön adatbázis, a kettő nem függhet össze.  
					Az egyes hozzájárulások visszavonásának illetve lemondásnak a regisztrálását – technikai okokból – 30 napos határidővel vállaljuk.</p>
					
					
					<h4>6.	Mit kell tudni a nyereményjátékokról?  </h4>

					Társaságunk kampányjelleggel szervezhet nyereményjátékokat, melyek eseti feltételeit külön szabályzat tartalmazza. Az aktuális akció szabályzata minden esetben megtalálható a honlapunk nyitó oldalán, központi helyen elhelyezett linken.  
					
					<h4>7.	Egyéb adatkezelési kérdések   </h4>

					Az Ön adatait csak jogszabályban meghatározott keretek között továbbíthatjuk, adatfeldolgozóink esetében pedig szerződéses feltételek kikötésével biztosítjuk, hogy ne használhassák az Ön hozzájárulásával ellentétes célokra az Ön személyes adatait. További információ a 2. pontban található.   
					Társaságunk külföldre nem továbbít adatokat.   
					A bíróság, az ügyészség és más hatóságok (pl. rendőrség, adóhivatal, Nemzeti Adatvédelmi és Információszabadság Hatóság) tájékoztatás adása, adatok közlése vagy iratok rendelkezésre bocsátása miatt megkereshetik Társaságunkat. Ezekben az esetekben adatszolgáltatási kötelezettségünket teljesítenünk kell, de csak a megkeresés céljának megvalósításához elengedhetetlenül szükséges mértékben.  
					Társaságunk adatkezelésében és/vagy adatfeldolgozásában részt vevő közreműködői és munkavállalói előre meghatározott mértékben – titoktartási kötelezettség terhe mellett – jogosultak az Ön személyes adatait megismerni.  
					Az Ön személyes adatait megfelelő technikai és egyéb intézkedésekkel védjük, valamint biztosítjuk az adatok biztonságát, rendelkezésre állását, továbbá óvjuk azokat a jogosulatlan hozzáféréstől, megváltoztatástól, sérülésektől illetve nyilvánosságra hozataltól és bármilyen egyéb jogosulatlan felhasználástól.  
					Szervezeti intézkedések keretében épületeinkben ellenőrizzük a fizikai hozzáférést, munkavállalóinkat folyamatosan oktatjuk és a papír alapú dokumentumokat megfelelő védelemmel elzárva tartjuk. A technikai intézkedések keretében titkosítást, jelszóvédelmet és vírusirtó szoftvereket használunk. Felhívjuk azonban a figyelmét arra, hogy az interneten keresztüli adattovábbítás nem tekinthető teljes körűen biztonságos adattovábbításnak. Társaságunk mindent megtesz annak érdekében, hogy a folyamatokat minél biztonságosabbá tegyük, a weblapunkon keresztül történő adattovábbításért azonban nem tudunk teljes felelősséget vállalni, ám a Társaságunkhoz beérkezett adatok tekintetében szigorú előírásokat tartunk be az Ön adatainak biztonsága és a jogellenes hozzáférés megakadályozása érdekében.  
					A biztonsági kérdésekkel kapcsolatban kérjük az Ön segítségét abban, hogy gondosan őrizze meg honlapunkhoz meglévő hozzáférési jelszavát és ezt a jelszót senkivel se ossza meg.  

					<h4>8. Melyek az Ön jogai és jogorvoslati lehetőségei?   </h4>

					Ön az adatkezelésről   
						<li>tájékoztatást kérhet,  </li>
						<li>kérheti az általunk kezelt személyes adataik helyesbítését, módosítását, kiegészítését,   </li>
						<li>tiltakozhat az adatkezelés ellen és kérheti adatai törlését valamint zárolását (a kötelező adatkezelés kivételével),   </li>
						<li>bíróság előtt jogorvoslattal élhet,   </li>
						<li>a 	felügyelő 	hatóságnál  	panaszt  	tehet, illetve eljárást  	kezdeményezhet (https://naih.hu/panaszuegyintezes-rendje.html).  </li>
					
					<h5>Felügyelő Hatóság: Nemzeti Adatvédelmi és Információszabadság Hatóság  </h5>
					<li>Székhely: 1125 Budapest, Szilágyi Erzsébet fasor 22/c.  
					<li>Levelezési cím: 1530 Budapest, Pf.: 5.  
					<li>Telefon: +36 (1) 391-1400  
					<li>Fax: +36 (1) 391-1410  
					<li>E-mail:ugyfelszolgalat@naih.hu Honlap:https://naih.hu/  
					Az Ön kérelmére tájékoztatást adunk az Ön általunk kezelt, illetve az általunk – vagy a megbízott adatfeldolgozónk által – feldolgozott   
					<li>adatairól,   </li>
					<li>azok forrásáról,   </li>
					<li>az adatkezelés céljáról és jogalapjáról,   </li>
					<li>időtartamáról, ha pedig ez nem lehetséges, ezen időtartam meghatározásának szempontjairól,  </li>
					<li>az 	adatfeldolgozóink 	nevéről, 	címéről 	és 	az 	adatkezeléssel 	összefüggő tevékenységükről,   </li>
					<li>adatvédelmi incidensek körülményeiről, hatásairól és az elhárításukra valamint megelőzésükre tett intézkedéseinkről, továbbá   </li>
					<li>az Ön személyes adatainak továbbítása esetén az adattovábbítás jogalapjáról és címzettjéről.  </li>
					A kérelem benyújtásától számított legrövidebb idő alatt, 10 napon belül (legfeljebb azonban 1 hónapon belül) adjuk meg tájékoztatásunkat. A tájékoztatás ingyenes kivéve akkor, ha Ön a folyó évben azonos adatkörre vonatkozóan tájékoztatási kérelmet már nyújtott be hozzánk. Az Ön által már megfizetett költségtérítést visszatérítjük abban az esetben, ha az adatokat jogellenesen kezeltük vagy a tájékoztatás kérése helyesbítéshez vezetett. A tájékoztatást csak törvényben foglalt esetekben tagadhatjuk meg jogszabályi hely megjelölésével, valamint a bírósági jogorvoslat illetve a Hatósághoz fordulás lehetőségéről tájékoztatással.  
					Társaságunk a személyes adatok helyesbítésről, zárolásról, megjelölésről és törlésről Önt, továbbá mindazokat értesíti, akiknek korábban az adatot adatkezelés céljára továbbította, kivéve akkor, ha az értesítés elmaradása az Ön jogos érdekét nem sérti.  
					Amennyiben az Ön helyesbítés, zárolás vagy törlés iránti kérelmét nem teljesítjük, a kérelem kézhezvételét követő 10 napon belül (legfeljebb azonban 1 hónapon belül) írásban vagy – az Ön hozzájárulásával – elektronikus úton közöljünk elutasításunk indokait és tájékoztatjuk Önt a bírósági jogorvoslat, továbbá a Hatósághoz fordulás lehetőségéről.  
					Amennyiben Ön tiltakozik a személyes adatai kezelése ellen, a tiltakozást a kérelem benyújtásától számított legrövidebb időn belül, 10 napon belül (legfeljebb azonban 1 hónapon belül) megvizsgáljuk és a döntésünkről Önt írásban tájékoztatjuk. Amennyiben úgy döntöttünk, hogy az Ön tiltakozása megalapozott, abban az esetben az adatkezelést - beleértve a további adatfelvételt és adattovábbítást is - megszüntetjük és az adatokat zároljuk, valamint a tiltakozásról, továbbá az annak alapján tett intézkedésekről értesítjük mindazokat, akik részére a tiltakozással érintett személyes adatot korábban továbbítottuk, és akik kötelesek intézkedni a tiltakozási jog érvényesítése érdekében.  
					Abban az esetben megtagadjuk a kérés teljesítését, ha bizonyítjuk, hogy az adatkezelést olyan kényszerítő erejű jogos okok indokolják, amelyek elsőbbséget élveznek az Ön érdekeivel, jogaival és szabadságaival szemben, vagy amelyek jogi igények előterjesztéséhez, érvényesítéséhez vagy védelméhez kapcsolódnak. Amennyiben Ön a döntésünkkel nem ért egyet, illetve ha elmulasztjuk a határidőt, a döntés közlésétől, illetve a határidő utolsó napjától számított 30 napon belül Ön bírósághoz fordulhat.  
					Az adatvédelmi perek elbírálása a törvényszék hatáskörébe tartozik, a per – az érintett választása szerint – az érintett lakhelye vagy tartózkodási helye szerinti törvényszék előtt is megindítható. Külföldi állampolgár a lakóhelye szerint illetékes felügyeleti hatósághoz is fordulhat panasszal.  
					Kérjük Önt, hogy mielőtt a felügyeleti hatósághoz vagy bírósághoz fordulna panaszával – egyeztetés és a felmerült probléma minél gyorsabb megoldása érdekében – keresse meg Társaságunkat.  
					  
					<h4>9. Melyek a főbb irányadó jogszabályok tevékenységünkre?  </h4>
					  
					<li>a természetes személyeknek a személyes adatok kezeléséről szóló az Európai Parlament és a Tanács (EU) 2016/679 rendelete (GDPR)  </li>
					<li>az információs önrendelkezési jogról és az információszabadságról szóló 2011. évi CXII. 
											törvény - (Info tv.)  </li>
					<li>a Polgári Törvénykönyvről szóló 2013. évi V. törvény (Ptk.)  </li>
					<li>az elektronikus kereskedelmi szolgáltatások, valamint az információs társadalommal összefüggő szolgáltatások egyes kérdéseiről szóló 2001. évi CVIII. törvény - (Eker tv.)  </li>
					<li>az elektronikus hírközlésről szóló 2003. évi C. törvény - (Ehtv)  </li>
					<li>a fogyasztóvédelemről szóló 1997. évi CLV. törvény (Fogyv tv.)  </li>
					<li>a panaszokról és a közérdekű bejelentésekről szóló 2013. évi CLXV. törvény. (Pktv.)  </li>
					<li>a gazdasági reklámtevékenység alapvető feltételeiről és egyes korlátairól szóló 2008.  
											évi XLVIII. törvény (Grtv.)  
					  </li>
					<h4>10. Adatkezelési tájékoztató módosítása  </h4>
					  
					Társaságunk fenntartja magának a jogot jelen Adatkezelési tájékoztató módosítására, amelyről az érintetteket megfelelő módon tájékoztatja. Az adatkezeléssel kapcsolatos 
					információk közzététele a www.miskolc-ablak.hu/#privacyPolicyModal weboldalon történik.  
					<br><br><br>
					<strong>Dátum: Sajólád, 2023.12.01</strong>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" id="privacy2" data-dismiss="modal">Bezárás</button>
				</div>
			</div>
		</div>
	</div>
	<!-- ÁSZF -->
	<div class="modal fade" id="open_aszf" tabindex="-1" role="dialog" aria-labelledby="aszf" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLabel">Általános Szerződési Feltételek</h3>
					<button type="button" id="aszf_close1" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p><strong>Érvényes:</strong> 2024.01.15-től visszavonásig</p>
					
						<p>
							Jelen Általános Szerződési Feltételek (a továbbiakban: ÁSZF) szabályozzák <strong>Mata Oszkár</strong> egyéni vállalkozó (székhely: <i>3531 Miskolc, Kis-Hunyad út 28.</i>, adószám: <i>90239391-1-25</i>,  mint 
							vállalkozó (a továbbiakban: Vállalkozó) és a Megrendelő között létrejött vállalkozási jogviszony általános szabályait.
						</p>
						<p>
							A jelen ÁSZF rendelkezései a Vállalkozó és a Megrendelő (továbbiakban együtt: Felek) között létrejött, külön íven szövegezett vállalkozási szerződésre (továbbiakban: Vállalkozási Szerződés) 
							alkalmazandók, és a Vállalkozási Szerződés hatályba lépésével egyidejűleg, annak részeként lép hatályba a Felek között.
						</p>
						<p>
							A Vállalkozási Szerződés a jelen ÁSZF-fel együtt érvényes.<br />
							A jelenlegi  ÁSZF-től eltérő megrendelői feltételek csak a Vállalkozó kifejezett, írásos beleegyező nyilatkozatával alkalmazhatóak.
						</p>
						
						<h4>1. A Vállalkozási Szerződés tárgya</h4>
						<p>
							A Vállalkozó fa, műanyag és alumínium nyílászárók beépítésével, javításával, redőnyök és egyéb árnyékolástechnikai termékek beépítésével valamint szúnyoghálók 
							készítésével és azok telepítésével foglalkozik.
						</p>
						<p>
							A Megrendelő a Vállalkozási Szerződésben, illetve annak mellékletét képező árajánlatban meghatározott konkrét javítási, felújítási munkákat rendelte meg a Vállalkozótól, az 
							ott részletezett vállalkozói díj megfizetése ellenében.

						</p>
							A Vállalkozó kijelenti, hogy a Vállalkozási Szerződésben vállalt munkák elvégzéséhez szükséges szakismerettel rendelkezik, a megrendelést saját munkavállalói és alvállalkozói 
							igénybevételével, a saját eszközeivel, a Megrendelő által meghatározott helyen (a javítandó nyílászáró beépítési helyén) végzi.
						</p>
						
						<h4>2. A Vállalkozási Szerződés időtartama, vállalási határidő</h4>
						
						<p>
							<strong>2.1</strong> A Vállalkozási Szerződést a Felek a Szerződésben, vállalási határidőként megjelölt, határozott időre kötik.
						</p>
						<p>
							Amennyiben a vállalási határidőt nem dátum szerűén, hanem időtartam megadásával határozták meg, akkor annak kezdőnapja a Vállalkozási Szerződés aláírását követő első munkanap, 
							kivéve, ha a Felek a Vállalkozási Szerződésben más kezdőnapot állapítanak meg.
						</p>
						<p>
							<strong>2.2</strong> A Felek (így a Vállalkozó és a Megrendelő) a Vállalkozási Szerződéstől a szerződés teljesítésének megkezdése előtt bármikor elállhat, ezt követően a Megrendelő a teljesítésig a szerződést 
							felmondhatja.
						</p>
						<p>
							A Megrendelő elállása vagy felmondása esetén köteles a Vállalkozónak a díj arányos részét megfizetni, és a szerződés megszüntetésével okozott kárt megtéríteni azzal, hogy a kártalanítás a 
							vállalkozói díjat nem haladhatja meg. (Ptk. 6:249.§)
						</p>
						<p>
							A Vállalkozó jogosult a Szerződést a Megrendelő súlyos szerződésszegése esetén azonnali hatállyal felmondani, és a Megrendelőtől a díj arányos részét valamint okozott kára megtérítését követelni.
						</p>
						<p>
							A Megrendelőt az alábbiakban részletezettek szerinti elállási jog illeti meg a Vállalkozó súlyos szerződésszegése esetén.
						</p>
						
						<p>
							<strong>2.3</strong> A Vállalkozó a munkát átadás-átvételi eljárás keretében köteles átadni, amelynek során a Megrendelő vagy megbízottja köteles az elvégzett munkát megvizsgálni, és a Vállalkozó 
							szerződésszerű teljesítését írásban igazolni.
						</p>
						<p>
							Határidőben teljesít a Vállalkozó, ha az átadás-átvétel a Szerződésben előírt teljesítési határidőn belül megkezdődik.
						</p>
						<p>
							A Megrendelő nem tagadhatja meg az átvételt a munka olyan hibája miatt, amely, illetve amelynek kijavítása vagy pótlása nem akadályozza a rendeltetésszerű használatot.	
						</p>
						<p>
							Ha a Megrendelő az átadás-átvételi eljárást nem folytatja le, a teljesítés joghatásai a tényleges birtokbavétel alapján állnak be. (Ptk. 6:247.§)
						</p>
						<p>
							<strong>2.4</strong>  A Vállalkozó késedelembe esik, ha a szolgáltatást annak esedékességekor nem teljesíti. (Ptk.6:153.§)
						</p>
						<p>
							Ha a Vállalkozó késedelembe esik, a Megrendelő követelheti a teljesítést, vagy ha a késedelem következtében a Szerződés teljesítéséhez fűződő érdeke megszűnt, elállhat a Szerződéstől.
						</p>
						<p>
							A Megrendelő elállásához nincs szükség a teljesítéshez fűződő érdek megszűnésének bizonyítására, ha a szolgáltatást a Szerződésben rögzített okból kifolyólag a meghatározott teljesítési 
							időben – és nem máskor – kellett volna teljesíteni; vagy a Megrendelő az utólagos teljesítésre írásban, megfelelő póthatáridőt tűzött, és a póthatáridő eredménytelenül telt el.
						</p>
						<p>
							A Vállalkozó köteles megtéríteni a Megrendelőnek a késedelemből eredő kárát, kivéve, ha a késedelmét kimenti. (Ptk. 6:154.§)
						</p>
						<p>
							<strong>2.5</strong> Ha a teljesítés lehetetlenné vált, a szerződés megszűnik.
						</p>
						<p>
							A teljesítés lehetetlenné válásáról tudomást szerző fél késedelem nélkül köteles erről a másik felet értesíteni.
						</p>
						<p>
							Az értesítés elmulasztásából eredő kárt a mulasztó fél köteles megtéríteni.
						</p>
						<p>
							Amennyiben a teljesítés lehetetlenné válásáért egyik fél sem felelős, a szerződés megszűnésének időpontját megelőzően nyújtott szolgáltatás pénzbeli 
							ellenértékét meg kell téríteni, illetve az előre teljesített és ellenszolgáltatás nélkül maradt pénzbeli szolgáltatás visszajár.
						</p>
						<p>
							Ha a teljesítés lehetetlenné válásáért az egyik fél felelős, a másik fél szabadul a szerződésből eredő teljesítési kötelezettsége alól, 
							és a szerződésszegéssel okozott kárának megtérítését követelheti.
						</p>
						<p>
							Akkor, ha a teljesítés lehetetlenné válásáért mindkét fél felelős, a szerződés megszűnik, és a felek a lehetetlenné válásból eredő kárukat a közrehatás arányában követelhetik egymástól. (Ptk. 6:248.§)
						</p>
						<p>
							<strong>2.6</strong> Amennyiben a Megrendelő jelzi, hogy a megrendelését módosítani kívánja, az vállalási határidő megszakadását jelenti, és a Vállalkozó jogosult a módosított megrendeléshez igazodó 
							új teljesítési határidőt megszabni.
						</p>
						<p>
							Ugyancsak a vállalási határidő meghosszabbodásához vagy megszakadásához vezetnek azok a körülmények, amelyek a Vállalkozó teljesítését meghatározzák, de amelyekre a Vállalkozó befolyást gyakorolni 
							nem képes (vis maior, például: erőhatalom, sztrájk, háború, beszállítói késedelem).
						</p>
						<p>
							A részteljesítés és előteljesítés jogát a Vállalkozó fenntartja.
						</p>
						<p>
							<strong>3.</strong> A Felek szolgáltatásnyújtással kapcsolatos jogai és kötelezettségei
						</p>
						<p>
							<strong>3.1</strong> A javítási, beépítési, szerelési (beleértve a bontási munkálatokat is, továbbiakban munkálatok) munka végzésének feltételeit a Vállalkozó úgy köteles megszervezni, hogy biztosítsa a tevékenység biztonságos, szakszerű, gazdaságos és határidőre történő befejezését.
						</p>
						<p>
							Ha a munkálatokhoz valamilyen anyag szükséges, azt a Vállalkozó köteles a Megrendelő költségére beszerezni. (Ptk. 6:239.§)
						</p>
						<p>
							A Vállalkozó köteles a munka- és tűzvédelmi utasításokat betartani.
						</p>
						<p>
							<strong>3.2</strong> A Vállalkozó a teljesítés során a legnagyobb gondossággal köteles eljárni, illetve garantálni a kivitelezés szakszerűségét és I. osztályú minőségét.
						</p>
						<p>
							A Vállalkozó a helyiségek tisztaságára, állagmegóvására és vagyonvédelmére a legnagyobb gondossággal odafigyel.
						</p>
						<p>
							A munkavégzés során a Vállalkozó által esetlegesen okozott károk elhárításának költségeit a Vállalkozó a Megrendelő részére – közösen felvett kárfelvételi 
							jegyzőkönyv alapján – megtéríti a felvételt követő 15 napon belül.
						</p>
						<p>
							<strong>3.3</strong> A Vállalkozó a Megrendelő utasítása szerint köteles eljárni.
						</p>
						<p>
							Az utasítás nem terjedhet ki a tevékenység megszervezésére, és nem teheti a teljesítést terhesebbé.
						</p>
						<p>
							Ha a Megrendelő célszerűtlen vagy szakszerűtlen utasítást ad, akkor a Vállalkozó köteles őt erre figyelmeztetni.
							Ha a Megrendelő a figyelmeztetés ellenére utasítását fenntartja, a Vállalkozó a szerződéstől elállhat vagy a feladatot a Megrendelő utasításai szerint, a Megrendelő kockázatára elláthatja.

						</p>
						<p>
							A Vállalkozó köteles megtagadni az utasítás teljesítését, ha annak végrehajtása jogszabály vagy hatósági határozat megsértéséhez vezetne, vagy veszélyeztetné mások személyét vagy vagyonát. (Ptk. 6:240. §)
						</p>
						<p>
							<strong>3.4</strong> A Megrendelő vállalja, hogy a Vállalkozási Szerződésben meghatározott időszakban biztosítja a Vállalkozó számára a munkaterületen és 
							annak környékén a szabad, akadálymentes munkavégzést.
						</p>
						<p>
							A Vállalkozó a tevékenység megkezdését mindaddig megtagadhatja, amíg a munkaterület a tevékenység végzésére nem alkalmas.
						</p>
						<p>
							Emiatt a Vállalkozó jogosult egyoldalúan módosítani a vállalási határidőt, és kiszállási díjat számlázni 15.000,- Ft + ÁFA/alkalom mértékben.
						</p>
						<p>
							Ha a Megrendelő a munkaterületet a Vállalkozó felszólítása ellenére nem biztosítja, a Vállalkozó elállhat a szerződéstől, és kártérítést követelhet.(Ptk. 6:241.§)
						</p>
						<p>
							A munkálatokhoz szükséges villamos energiát a Megrendelő térítésmentesen biztosítja.
						</p>
						<p>
							<strong>3.5</strong> A Felek kötelesek egymást minden olyan körülményről haladéktalanul tájékoztatni, amely a teljesítés eredményességét, határidejét veszélyezteti, vagy gátolja, illetve további 
							költségeket igénylő munkák elvégzését, s ezzel a jelen szerződés módosítását teszi szükségessé.
						</p>
						<p>
							<strong>4.</strong> Szolgáltatás átvétele – kellékszavatosság
						</p>
						<p>
							<strong>4.1</strong> A Vállalkozó a munkát átadás-átvételi eljárás keretében köteles átadni, amelynek során a Megrendelő vagy megbízottja köteles az elvégzett munkát megvizsgálni, 
							és a Vállalkozó, szerződésszerű teljesítését írásban igazolni.
						</p>
						<p>
							Amennyiben az átadás-átvételi eljárás során a Megrendelő vagy képviselője, minőségi vagy mennyiségi hibát észlel, azt az átadásról készülő jegyzőkönyvben, 
							illetve a Vállalkozó, teljesítési igazolásán azonnal írásban köteles jelezni.
						</p>
						<p>
							A jegyzőkönyv vagy a teljesítési igazolás aláírásával a Megrendelő elismeri a szolgáltatás minőségi  és  mennyiségi megfelelőségét és annak átvételét.
						</p>
						<p>
							A javított nyílászáróval kapcsolatos kockázatok és felelősség átruházása a szolgáltatás átadásával megtörténik.
						</p>
						<p>
							<strong>4.2</strong> A Vállalkozó az általa végzett szolgáltatásokra és a beépített anyagokra 12 hónap jótállást (kellékszavatosság) vállal 
							(kivéve, ha a Felek egyedileg más feltételt foglaltak írásba).
						</p>
						<p>
							A jótállás feltétele, hogy a Megrendelő vagy más, a szolgáltatás tárgyán időközben ne végezzen semminemű módosítást (szerelés, átalakítás stb.), a nyílászáró ne sérüljön 
							meg, ne fessék át, az előírásoknak megfelelően tartsák karban, és rendeltetés szerűén használják.
						</p>
						<p>
							<strong>4.3</strong>  Kellékszavatossági igénye alapján a Megrendelő választása szerint:
							<li>
								a) kijavítást vagy kicserélést igényelhet, kivéve, ha a választott kellékszavatossági jog teljesítése lehetetlen, vagy ha az a Vállalkozónak – másik kellékszavatossági igény teljesítésével 
								összehasonlítva – aránytalan többletköltséget eredményezne, figyelembe véve a szolgáltatás hibátlan állapotban képviselt értékét, a szerződésszegés súlyát és a 
								kellékszavatossági jog teljesítésével a Megrendelőnek okozott érdeksérelmet; vagy
							</li>
							<li>
								b) az ellenszolgáltatás arányos leszállítását igényelheti, a hibát a Vállalkozó költségére maga kijavíthatja vagy mással kijavíttathatja, vagy a szerződéstől elállhat, ha a kötelezett a 
								kijavítást vagy a kicserélést nem vállalta, e kötelezettségének nem tud eleget tenni, vagy ha a Megrendelőnek a kijavításhoz vagy kicseréléshez fűződő érdeke megszűnt.
							</li>
						</p>
						<p>
							Jelentéktelen hiba miatt elállásnak nincs helye.
						</p>
						<p>
							A kijavítást vagy kicserélést – a dolog tulajdonságaira és a Megrendelő által elvárható rendeltetésére figyelemmel – megfelelő határidőn belül, a Megrendelő érdekeit kímélve kell elvégezni. (Ptk. 6:159.§)
						</p>
						<p>
							<strong>4.4</strong> A Vállalkozó technikai tanácsai (javaslatok, kezelési tanácsok) az általa beépített, javított nyílászárók, redőnyök (és egyéb árnyékolástechnikai eszközök), szúnyoghálók legmegfelelőbb, rendeltetésszerű felhasználását szolgálják.
						</p>
						<p>
							<strong>5.</strong> Ár képzési és fizetési feltételek
						</p>
						<p>
							<strong>5.1</strong> A Vállalkozási Szerződésben meghatározott vállalkozási díj tartalmazza az anyag- és munkadíjat, valamint a kiszállási költséget.
						</p>
						<p>
							A szerződéskötéskor rögzített díj a Vállalkozó és a Megrendelő közötti megállapodás eredménye.
						</p>
						<p>
							Vállalkozási Szerződés esetleges hiányában a Vállalkozó által készített árajánlatban (Végleges Árajánlatban) foglalt díjak az irányadóak.
						</p>
						<p>
							<strong>5.2</strong> A Vállalkozó által a Megrendelő részére adott árajánlat érvényessége – amennyiben a Vállalkozó az ajánlatban másként nem rendelkezett – 15 naptári nap.
						</p>
						<p>
							<strong>5.3</strong> Az átadott szolgáltatásokra eső vállalkozási díj megfizetése a Vállalkozó vagy az általa megbízott partnercég (Online Számla) által kibocsátott számla ellenében történik.
						</p>
						<p>
							A Vállalkozó szolgáltatási előleg jogcímen a szolgáltatás teljes ellenértékének 50%-át elkérheti.
						</p>
						<p>
							Amennyiben a Vállalkozási Szerződésben ettől eltérő megállapodás nem jött létre, a Megrendelő minden esetben köteles a vállalkozói díjat átvételkor, teljes egészében, készpénzben megfizetni. 
							Amennyiben szolgáltatási előleg kifizetésre került a Megrendelő részéról, úgy az azzal csökkentett vállalkozói díjat szükséges teljes egészében készpénzben megfizetni.
						</p>
						<p>
							Nem készpénzes fizetési mód alkalmazásánál a fizetési határidő a Vállalkozási Szerződésben, vagy szerződés hiányában a Vállalkozó által kiadott számlán kerül megállapításra, 
							ellenkező rendelkezés hiányában a fizetési határidő 8 nap.
						</p>
						<p>
							<strong>5.4</strong> Késedelmes fizetés esetén a Vállalkozó jogosult a késedelembe esés napjától kezdődően késedelmi kamatot felszámolni, melynek mértéke, vállalkozásnak minősülő Megrendelő esetében, a 
							késedelemmel érintett naptári félév első napján érvényes jegybanki alapkamat nyolc százalékponttal növelt értéke.
						</p>
						<p>
							Ha a vállalkozásnak minősülő Megrendelő fizetési késedelembe esik, akkor köteles a Vállalkozónak a követelése behajtásával kapcsolatos költségei fedezésére negyven eurónak a Magyar Nemzeti 
							Bank késedelmi kamatfizetési kötelezettség kezdőnapján érvényes hivatalos deviza-középárfolyama alapján meghatározott forintösszeget megfizetni.
						</p>
						<p>
							E kötelezettség teljesítése nem mentesít a késedelem egyéb jogkövetkezményei alól; a kártérítésbe azonban a behajtási költségátalány összege beszámít. (Ptk. 6:155.§)
						</p>
						<p>
							Fogyasztónak minősülő Megrendelő a késedelembe esés időpontjától kezdődően a késedelemmel érintett naptári félév első napján érvényes jegybanki alapkamattal 
							megegyező mértékű késedelmi kamatot köteles fizetni. (Ptk. 6:48.§ (1) bek.)
						</p>
						<p>
							<strong>5.5</strong> A Vállalkozó fenntartja magának a jogot, hogy felfüggessze a szerződéses kötelezettségeinek teljesítését mindaddig, amíg a Megrendelőnek a Vállalkozó felé határidőn túli tartozása áll fenn.
						</p>
						<p>
							A Vállalkozó fenntartja magának a jogot a részteljesítésre és az ennek megfelelő részszámlázásra, amennyiben ettől egyéb, az adott szolgáltatást érintő megállapodás eltérően nem rendelkezik.
						</p>
						<p>
							<strong>6.</strong> Tulajdonjog fenntartása 
						</p>
						<p>
							<strong>6.1</strong> A beépített anyagok tulajdonjogát a Vállalkozó valamennyi követelése (számlatartozás, kár, költség, késedelmi kamat, stb.) rendezéséig fenntartja.
						</p>
						<p>
							Ezekkel az anyagokkal a Megrendelő nem jogosult rendelkezni (biztosítékul lekötni, elzálogosítani, stb.), köteles azonban azokat eredeti állapotukban megőrizni.
						</p>
						<p>
							<strong>6.2</strong> A Megrendelő fizetési késedelembe esésekor, vagy ha fennáll a veszélye, hogy fizetéseit beszünteti, mivel fizetőképességének vagy vagyoni helyzetének 
							megrendüléséről hivatalos információk (bírósági, hatósági döntés, közbeszerzési döntőbizottsági határozat, könyvvizsgálói jelentés, éves beszámoló, stb.) kerülnek a Vállalkozó birtokába, 
							vagy ha a Megrendelővel szemben végrehajtás folyik, akkor a Vállalkozó jogosult a ki nem fizetett szolgáltatás során beépített / felhasznált anyagokat visszabontani és magához venni.
						</p>
						<p>
							Ebben az esetben a Megrendelő az eredeti állapot helyreállítását nem követelheti.
						</p>
						<p>
							<strong>7.</strong> Egyéb rendelkezések 
						</p>
						<p>
							<strong>7.1</strong> A Vállalkozási Szerződést módosítani, kiegészíteni, pontosítani, csak újabb írásba foglalt szerződéssel lehet, a Felek megállapodásai vagy a Vállalkozási Szerződéssel kapcsolatos 
							nyilatkozatai, kizárólag írásban érvényesek.
						</p>
						<p>
							A Felek kötelezettséget vállalnak arra, hogy amennyiben a kapcsolattartóval összefüggésben közölt adatok megváltoznak, úgy erről haladéktalanul tájékoztatják a másik Felet.<br />
							A közlés elmulasztásáért, illetve késedelmes megtételéért a mulasztó Fél felelősséggel tartozik.

						</p>
						<p>
							A Felek kézbesítettnek tekintik a másik Fél Vállalkozási Szerződésben rögzített elektronikus úton eljuttatott elemeit (szolgáltatási tételek), de csak abban az esetben, ha 
							az üzenet szintén írásos visszaigazolása is megtörtént.
						</p>
						<p>
							<strong>7.2</strong> A Felek a Vállalkozási Szerződésben kapcsolattartó személyeket jelölhetnek ki.
						</p>
						<p>
							Amennyiben erre sor kerül, akkor a Felek a kapcsolattartó személyeknek a Vállalkozási Szerződésben rögzített e-mail címre történt üzenetküldést is írásbeli közlésnek fogadják el, 
							de csak abban az esetben, ha az üzenet szintén írásos visszaigazolása is megtörtént.
						</p>
						<p>
							<strong>7.3</strong> A jelen Általános Szerződési Feltételekre és a Vállalkozási Szerződésre a magyar jog, elsősorban a Ptk. az irányadó.
						</p>
						<p>
							A Megrendelő az árajánlatkérés elküldésével az Általános Szerződési Feltételekben leírt pontokat megismerte, elfogadta és tudomásul vette.
						</p>
						<p>
							A Szolgáltatási Szerződés és egyéb dokumentumok mellett a Megrendelő részéről aláírásra kerül az Általános Szerződési Feltételek is. Igazolva ezzel azt, hogy
							a benne foglalt pontokat megismerte, elfogadta és azokkal egyetért.
						</p>
						<p>
							A Felek közötti esetleges jogviták rendezésére a Felek kikötik, a Vállalkozó székhelye szerint illetékes bíróság kizárólagos illetékességét.
						</p>
						
						

					
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" id="aszf_close2" data-dismiss="modal">Bezárás</button>
				</div>
			</div>
		</div>
	</div>
	<div class="page">
		<!--header start-->
        <header id="masthead" class="header ttm-header-style-classic">
            <!-- ttm-topbar-wrapper -->
            <div class="ttm-topbar-wrapper ttm-bgcolor-darkgrey ttm-textcolor-white clearfix">
                <div class="container">
                    <div class="ttm-topbar-content">
                        <ul class="top-contact ttm-highlight-left text-left">
                            <li><i class="fa fa-phone"></i><strong>Telefonszám</strong> 
								<a href="tel:<?php echo $telefon;?>" style="font-weight: normal; text-decoration: none; transition: font-weight 0.3s ease;"onmouseover="this.style.fontWeight='700';this.style.color='white'" onmouseout="this.style.fontWeight='normal'"><?php echo $telefon;?></a>
							</li>
                        </ul>
                        <div class="topbar-right text-end">
                            <ul class="top-contact">
                                <li><i class="fa fa-envelope-o"></i><strong>Email: </strong><a style="font-weight: normal; text-decoration: none; transition: font-weight 0.3s ease;"onmouseover="this.style.fontWeight='700';" onmouseout="this.style.fontWeight='normal'" href="mailto:<?php echo $email;?>"><?php echo $email;?></a></li>
                            </ul>
                            <div class="ttm-social-links-wrapper list-inline">
                                <ul class="social-icons">
                                    <li><a href="<?php echo $facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- ttm-topbar-wrapper end -->
            <!-- ttm-header-wrap -->
            <div class="ttm-header-wrap">
                <!-- ttm-stickable-header-w -->
                <div id="ttm-stickable-header-w" class="ttm-stickable-header-w clearfix">
                    <div id="site-header-menu" class="site-header-menu">
                        <div class="site-header-menu-inner ttm-stickable-header">
                            <div class="container">
                                <!-- site-branding -->
                                <div class="site-branding">
                                    <a class="home-link" href="<?php echo $server;?>" title="<?php echo $alt;?>" rel="home">
                                        <img id="logo-img" class="img-center" src="<?php echo $server;?>images/logo-img.png" alt="<?php echo $alt;?>">
                                    </a>
                                </div><!-- site-branding end -->
                                <!--site-navigation -->
                                <div id="site-navigation" class="site-navigation">
                                    
                                    <div class="ttm-menu-toggle">
                                        <input type="checkbox" id="menu-toggle-form" />
                                        <label for="menu-toggle-form" class="ttm-menu-toggle-block">
                                            <span class="toggle-block toggle-blocks-1"></span>
                                            <span class="toggle-block toggle-blocks-2"></span>
                                            <span class="toggle-block toggle-blocks-3"></span>
                                        </label>
                                    </div>
                                    <nav id="menu" class="menu">
                                        <ul class="dropdown">
											<li class=""><a href="<?php echo $server;?>">Kezdőlap</a></li>
                                            <li><a href="https://ajto-ablak-miskolc.hu/szolgaltatasok/1/miskolc-muanyag-ablak-beepites">Műanyag ablak beszerelés</a></li>
                                            <li class="active"><a href="<?php echo $server.'szolgaltatasok/';?>">További szolgáltatások</a>
                                                <ul>
													<?php 
														$get_all_services = get_all_services();
														foreach($get_all_services as $services) {
														
													?>
                                                    <li><a href="<?php echo $server.'szolgaltatasok/'.$services['id'].'/'.$services['link'];?>"><?php echo $services['service']?></a></li>
                                                    <?php 
														}
													?>
                                                   
                                                </ul>
                                            </li>
											<li><a href="<?php echo $server.'munkaink/';?>">Munkáink</a></li>
                                            <li><a href="<?php echo $server.'blog-bejegyzesek/';?>">Blog</a></li>
											<li><a href="<?php echo $server.'kapcsolat/';?>">Kapcsolat</a></li>
											<li><a data-bs-toggle="offcanvas" data-bs-target="#offer" aria-controls="offcanvasBottom" class="menu-offer" style="color:#fe5d15;font-size: 15px;">Árajánlatkérés</a></li>
                                        </ul>
                                    </nav>
                                </div><!-- site-navigation end-->
                            </div>
                        </div>
                    </div>
                </div><!-- ttm-stickable-header-w end-->
            </div><!--ttm-header-wrap end -->
        </header><!--header end-->
		
		<div class="row" id="success" style="display:none">
			<div class="col-12">
				<div class="alert alert-success" role="alert">
					
					<h4 class="alert-heading">Szuper, ugye milyen egyszerű volt?!</h4>
					
					<p>
						Kedves <?php echo $_POST["name"]; ?> az Ön része egyelőre ennyi volt. Üzenetét hamarosan elolvassa kollégánk és<br />megadott elérhetősége egyikén (email, telefon) a lehető leghamarabb keresni fogja. 
						
					</p>
					<hr>
					<p class="mb-0"><strong>Fontos! Bizonyos levelezőprogramok az általunk küldött üzeneteket tévesen levélszemétnek értékelhetik, <br />ezért kérem ellenőrizze SPAM/Levélszemét/Kéretlen mappák tartalmait is a következő egy-két napban. Megértését köszönjük!</strong> </p>
				</div>
			</div>
		</div>
		
		<div class="ttm-page-title-row">
			<div class="ttm-page-title-row-inner ttm-bgcolor-darkgrey">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-12">
							<div class="page-title-heading">
								<h1 class="title"><?php echo $title;?></h1>
							</div>
							<div class="breadcrumb-wrapper">
								<span>
									<a title="Kezdőoldal" href="<?php echo $server;?>"><i class="ti ti-home"></i></a>
								</span>
								<span class="ttm-bread-sep">&nbsp; / &nbsp;</span>
								<span>További szolgáltatások</span>
							</div>
						</div>
					</div>
				</div>
			</div>   
			<?php if (isset($city) && !empty($city)) { ?>
				<iframe style="z-index: 999999" id="terkep" width="100%" height="150%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.hu/maps?q=Magyarorszag,<?php echo $city;?>&amp;output=embed"></iframe>
			<?php } ?>			
		</div>
		<?php if(!isset($_GET['service_id']) && !isset($_GET['service_name'])) { ?>
		<div class="site-main">
			<section class="ttm-row skill-section-service ttm-bgcolor-grey clearfix">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title title-style-center_text seperator-style">
								<div class="title-header">
									<h3><?php echo $alt;?></h3>
									<h2>A Miskolc Ablak szolgáltatásai</h2>
								</div>
								<div class="title-desc">
									<p>Tekintse meg és vegy igénybe a Miskolc Ablak szolgáltatásait.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row mb_15">
						<?php 
							$get_all_services = get_all_services();
							foreach($get_all_services as $services) {
							
						?>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="res-1199-pb-0">
								<!--featured-imagebox-->
								<div class="featured-imagebox featured-imagebox-services style2">
									<!-- featured-thumbnail -->
									<div class="ttm-box-view-overlay" style="max-height: 250px;">
										<div class="featured-thumbnail">
											<img class="img-fluid" src="<?php echo $server;?>images/services/<?php echo $services['image'];?>" alt="<?php echo $services['service']?>">
										</div><!-- featured-thumbnail end-->
									</div>
									<div class="featured-content">
										<div class="featured-title">
											<h3 style="text-transform: none;"><a href="<?php echo $server.'szolgaltatasok/'.$services['id'].'/'.$services['link'].'/Miskolc';?>"><?php echo $services['service']?></a></h3>
										</div>
										<div class="featured-desc">
											<p><?php echo $services['description'];?></p>
										</div>
										<div class="ttm-details-link">
											<a href="<?php echo $server.'szolgaltatasok/'.$services['id'].'/'.$services['link'].'/Miskolc';?>" tabindex="0" class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-darkgrey ttm-icon_element-size-xs">
												<i class="ti ti-arrow-right"></i>
											</a>
										</div>
									</div>
								</div><!-- featured-imagebox end-->
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</section>
		</div>
		<?php }else{ ?>
		<div class="site-main">
        	<div class="sidebar ttm-sidebar-left ttm-bgcolor-grey clearfix">
        		<div class="container">
        			<div class="row g-0">
        				<div class="col-lg-3 widget-area sidebar-left ttm-col-bgcolor-yes ttm-bg ttm-left-span  float-lg-end float-md-none order-lg-first order-md-last order-sm-last order-last res-991-pr-0">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                            <aside class="widget widget-nav-menu res-991-pl-15 res-991-pr-15">
                                <ul class="widget-menu">
									<?php 
										$get_all_services = get_all_services();
										foreach($get_all_services as $services) {
										$active_class = ($service_name == $services['service']) ? 'active' : '';
										
									?>
										<?php if (isset($city) && !empty($city)) { ?>
										<li class="<?php echo $active_class;?>"><a href="<?php echo $server.'szolgaltatasok/'.$services['id'].'/'.$services['link'].'/'.$city_link;?>"><?php echo $services['service'].' '.$city ?></a></li>
										<?php }else{ ?>
										<li class="<?php echo $active_class;?>"><a href="<?php echo $server.'szolgaltatasok/'.$services['id'].'/'.$services['link'].'/Miskolc';?>"><?php echo $services['service'].' Miskolc';?></a></li>
                                    <?php 
										}
										}
									?>
                                </ul>
                            </aside>
                            <aside class="widget contact-widget res-991-pl-15 res-991-pr-15">
                                <h3 class="widget-title">ELérhetőségeink</h3>      
                                    <ul class="contact-widget-wrapper">
                                        <li><i class="fa fa-map-marker"></i>Elérhetőek vagyunk Miskolcon és környékén</li>
                                        <li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo $email;?>" target="_blank"><?php echo $email;?></a></li>
                                        <li><a href="tel:<?php echo $telefon;?>"><i class="fa fa-phone"></i><?php echo $telefon;?></a></li>
                                        <li><i class="ti ti-alarm-clock"></i>Hétfő - Péntek: 8:00 - 17:00</li>
                                        <li><i class="ti ti-alarm-clock"></i>Szombat: 9:00 - 14:00</li>
                                    </ul>
                            </aside>
                            
                            <aside class="widget tagcloud-widget res-991-pl-15 res-991-pr-15">
                                <h3 class="widget-title"><?php echo $service_name ?> szolgáltatási területek</h3>
                                <div class="tagcloud">
									<?php 
										$get_all_varos_by_megye = get_all_varos_by_megye("Borsod-Abaúj-Zemplén");

										// Települések, amelyeket az első helyen szeretnénk megjeleníteni
										$priority_varosok = array(
											"Miskolc",
											"Ózd",
											"Kazincbarcika",
											"Mezőkövesd",
											"Tiszaújváros",
											"Sátoraljaújhely",
											"Sárospatak",
											"Sajószentpéter",
											"Edelény",
											"Szerencs",
											"Putnok",
											"Felsőzsolca",
											"Encs",
											"Mezőcsát",
											"Alsózsolca",
											"Szikszó",
											"Nyékládháza",
											"Emőd",
											"Tokaj",
											"Szendrő"
										);

										$count = 0;
										$other_service_link = str_replace("miskolc-", "", $services['link']);
										foreach($priority_varosok as $priority_varos) {
											// Ellenőrzés, hogy a prioritáson kívül lévő település-e
											if (!in_array($priority_varos, array_column($get_all_varos_by_megye, 'varos'))) continue;

											// Megkeressük a települést az adatok között
											$varos_key = array_search($priority_varos, array_column($get_all_varos_by_megye, 'varos'));
											$varos_data = $get_all_varos_by_megye[$varos_key];

											// Település megjelenítése
											$get_service_by_id = get_service_by_id($_GET['service_id']);
											foreach($get_service_by_id as $services) {
											?>
											
											<a href="<?php echo $server.'szolgaltatasok/'.$services['id'].'/'.$services['link'].'/'.replace_spec_chars($varos_data['varos']);?>" style="text-transform: none;padding: 2px 2px;font-size: 10px;" class="tag-cloud-link"><?php echo $varos_data['varos'].' '.lcfirst($service_name);?></a>
											<?php 
											}
											$count++;
										}

										// Az első helyen megjelenített települések után a többi település megjelenítése
										foreach($get_all_varos_by_megye as $varos_data) {
											// Ha a település már a prioritáson szerepel, akkor ne jelenítsük meg újra
											if (in_array($varos_data['varos'], $priority_varosok)) continue;
											
											?>
											<a href="<?php echo $server.'szolgaltatasok/'.$services['id'].'/'.$services['link'].'/'.replace_spec_chars($varos_data['varos']);?>" style="text-transform: none;padding: 0px 0px;font-size: 10px;" class="tag-cloud-link"><?php echo $varos_data['varos'].' '.lcfirst($service_name);?></a>
											<?php 
											$count++;
											if ($count >= 25) break; // Csak az első 30 település jelenik meg
										}
										?>
									
                                </div>
                            </aside>
							<aside class="widget tagcloud-widget res-991-pl-15 res-991-pr-15">
                                <h3 class="widget-title">Blog bejegyzéseink</h3>
								 <ul class="ttm-recent-post-list mt_10 mb_10">
									<?php 
										$get_1_3_blog = get_1_3_blog();
										foreach($get_1_3_blog as $blog) {
											
									?>
                                    <li class="ttm-recent-post-list-li clearfix">
                                        <a href="<?php echo $server.'blog-bejegyzesek/'.$blog['id'].'/'.urlencode($blog['blog_title'])?>"><img class="img-fluid" src="<?php echo $server.'images/blog/'.$blog['blog_images'];?>" alt="blog-img"></a>
                                        <span class="post-date"><?php echo $blog['blog_date'];?></span>
                                        <a href="<?php echo $server.'blog-bejegyzesek/'.$blog['id'].'/'.urlencode($blog['blog_title'])?>"><?php echo $blog['blog_title'];?></a>
                                    </li>
									<?php } ?>
                                </ul>
							</aside>
							<aside class="widget widget_media_image res-991-pl-15 res-991-pr-15">
                                <a href="#"><img class="img-fluid" src="<?php echo $server;?>images/banner.png" alt="widget-banner"></a>
                            </aside>
                        </div>
        				<div class="col-lg-9">
        					<div class="pt-10 pb-75 pr-30 ml-30 res-991-pb-0 res-991-pt-0 res-991-pr-15 res-991-pl-15 res-991-ml-0 ttm-bgcolor-white">
	        					<div class="content-area">
	        						<div class="ttm-service-single-content-area">
	        							<div class="service-page-header">
	        								<h3><?php echo $service_name;?></h3>
											<?php if (isset($city) && !empty($city)) { ?>
												<h2 style="text-transform: none;"><?php echo $service_name.' '.$city.' településen';?></h2>
											<?php } else { ?>
												<h2 style="text-transform: none;"><?php echo $service_name.' Miskolc és környékén';?></h2>
											<?php } ?>
	        							</div>
										
	        							<div class="row">
	        								<div class="col-lg-12 mt-30">
	        									<div class="ttm_single_image-wrapper">
													
													<img class="img-fluid" style="min-width:100%" src="<?php echo $server;?>images/services/<?php echo $service_image;?>" alt="<?php echo $service_name;?>">
	                                				<div class="ttm-service-description mt-15">
														<?php if ($service_name == "Műanyag ablak beépítése"){?>
														<!-- Műanyag ablak -->
														<div class="service-page-header">
				                                            <h2><?php echo $service_name;?></h2>
                                                        </div>
														<p>
															A Miskolc Ablak csapa profi szolgáltatást kínál a műanyag ablak beépítés és beszerelés terén, különös tekintettel Miskolc és környéke lakóira. Az ablakcsere vagy 
															új műanyag ablakok beszerelése sokkal több, mint egyszerű munkafolyamat – ez az otthon kényelmét, energiatakarékosságát és értékét is jelentősen befolyásolja. 
															Szakértő csapatunk készen áll az Ön igényeinek megfelelő ablakok kiválasztására és műanyag ablakok beszerelésére.
														</p>
														<p>
															Az <strong><a data-bs-toggle="offcanvas" data-bs-target="#offer" aria-controls="offcanvasBottom">ingyenes árajánlatkérés</a></strong> lehetőséget biztosít arra, hogy pontosan megtervezhesse az ablakcsere költségeit. 
															Szakembereink az ingyenes helysízni felmérés során alaposan felmérik az Ön otthonának adottságait, hogy a legoptimálisabb megoldást kínálhassuk az 
															ablakcsere vagy új ablakok beszerelésere.
														</p>
														<p>
															A <strong><a href="https://www.rehau.com/us-en/windows" target="_blank">REHAU</a></strong> által gyártott műanyag nyílászárók minőségi termékek, melyek kiemelkedő hő- 
															és hangszigetelő tulajdonságokkal rendelkeznek. Ezek az ablakok kiváló választást jelentenek az energiahatékonyságra törekvők számára. 
															Hőszigetelő képességük révén csökkentik a fűtési költségeket, míg hangszigetelésük biztosítja a nyugodt és csendes környezetet otthonában. Funkcionalitásuk mellett 
															pedig a Rehau által gyártott ablakok <strong>külső megjelenése</strong> is garantáltan elnyeri az Ön tetszését is.
														</p>
														<p>
															A REHAU műanyag ablakok egyedi összetevőt tartalmaznak, amelyek garantálják a sima, magasfényű bevonatot, így az új ablakok éveken át megőrzik eredeti, 
															makulátlan megjelenésüket. Ez azt is jelenti, hogy  nem deformálódnak és természetesen soha nem szükséges festeni őket.
														</p>
														<p>
															Munkánk során nagy figyelmet fordítunk az apró részletekre és a precíz munkavégzésre. Minden műaanyag ablak beépítésénél arra törekszünk, hogy a legmagasabb minőséget 
															nyújtsuk ügyfeleinknek. A megfelelően beépített műanyag ablakok hosszú távon biztosítják az otthona komfortját és energiahatékonyságát.
														</p>
														<p>
															A műanyag ablakok modern megjelenésükkel és könnyű karbantarthatóságukkal is tőkéletes választást jelentenek. Emellett tartós anyaguknak köszönhetően 
															<strong>hosszú élettartamot</strong> biztosítanak, így beruházásuk megtérülő és értékálló is. Legyen szó régi ablakok cseréjéről vagy új ablakok beszereléséről, csapatunk 
															minden esetben az Ön igényeinek megfelelően dolgozik.
														</p>
														<br />
														<div class="row">
															<div class="col-lg-12">
																<div class="ttm_single_image-wrapper">
																	<img class="img-fluid" src="<?php echo $server;?>images/rehau_1.jpg" alt="<?php echo $service_name;?>" style="max-height:700px">
																	<div class="ttm-service-description mt-15 mb-30">
																		<div class="service-page-header">
																			<h2>A műanyag ablakok típusai</h2>
																		</div>
																		<p>
																			Az ablakok kiválasztása komplex feladat, mivel számos tényezőt figyelembe kell venni, beleértve az anyagot, a formát, a színt, a nyitási módot és a biztonságot. 
																			Azonban fontos-e tudnia, hogy az ablakok hőszigetelésében milyen kulcsfontosságú szerepet játszik az ablakok légkamráinak száma? 
																		</p>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-sm-6">
																<div class="ttm_single_image-wrapper">
																	<img class="img-fluid" src="<?php echo $server;?>images/3-legkamras.png" alt="<?php echo $service_name;?>">
																</div>
															</div>
															<div class="col-sm-6">
																<div class="service-page-header res-575-mt-20">
																	<h4 style="font-weight: 150!important;text-transform: none;">Három légkamrás műanyag ablak</h4>
																</div>
																<div class="mt-25">
																	<p>
																		A "három rétegű ablak" kifejezés alatt olyan üvegezést értünk, amely több rétegből áll. Ezeket a többrétegű üvegszerkezeteket külön gyártják, hogy 
																		javítsák a hőszigetelési teljesítményüket. Ezek a szerkezetek síküvegből állnak, amelyeket távtartók választanak el egymástól.
																	</p>
																</div>
																<br />
																<ul class="ttm-list ttm-list-style-icon ttm-list-icon-color-skincolor">
																	<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																		<span class="ttm-list-li-content">Belépőszint</span>
																	</li>
																	<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																		<span class="ttm-list-li-content">Kiváló hőszigetelési teljesítmény</span>
																	</li>
																	<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																		<span class="ttm-list-li-content">Csökentett CO2 kibocsátás</span>
																	</li>
																	<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																		<span class="ttm-list-li-content">Jó hangszigetelési teljesítmény</span>
																	</li>
																</ul>       
															</div>
														</div>
														<div class="sep_holder_box width-100">
															<span class="sep_holder"><span class="sep_line"></span></span>
															<span class="sep_holder"><span class="sep_line"></span></span>
														</div>
														<div class="row">
															<div class="col-sm-6">
																<div class="ttm_single_image-wrapper">
																	<img class="img-fluid" src="<?php echo $server;?>images/5-legkamras.png" alt="<?php echo $service_name;?>">
																</div>
															</div>
															<div class="col-sm-6">
																<div class="service-page-header res-575-mt-20">
																	<h4 style="font-weight: 150!important;text-transform: none;">Öt légkamrás műanyag ablak</h4>
																</div>
																<div class="mt-25">
																	<p>
																		Az 5 légkamrás műanyag ablakaink 70 mm-es beépítési mélységgel rendelkeznek, továbbá a tok és a szárny teljes hosszában és szélességében 
																		1,5 mm vastag, az ablaknak ideális statikát és biztonságos működést garantáló belső acél zártszelvény merevítés található.
																	</p>
																</div>
																<br />
																<ul class="ttm-list ttm-list-style-icon ttm-list-icon-color-skincolor">
																	<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																		<span class="ttm-list-li-content">Csak fehér színben tudjuk beszerezni</span>
																	</li>
																	<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																		<span class="ttm-list-li-content">Kiváló hőszigetelési teljesítmény</span>
																	</li>
																	<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																		<span class="ttm-list-li-content">Csökentett CO2 kibocsátás</span>
																	</li>
																	<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																		<span class="ttm-list-li-content">Kiválló hangszigetelési teljesítmény</span>
																	</li>
																</ul>       
															</div>
														</div>
														<div class="sep_holder_box width-100">
															<span class="sep_holder"><span class="sep_line"></span></span>
															<span class="sep_holder"><span class="sep_line"></span></span>
														</div>
														<div class="row">
															<div class="col-sm-6">
																<div class="ttm_single_image-wrapper">
																	<img class="img-fluid" src="<?php echo $server;?>images/6-legkamras.jpg" alt="<?php echo $service_name;?>">
																</div>
															</div>
															<div class="col-sm-6">
																<div class="service-page-header res-575-mt-20">
																	<h4 style="font-weight: 150!important;text-transform: none;">Hat légkamrás műanyag ablak</h4>
																</div>
																<div class="mt-25">
																	<p>
																		A hat légkamrás műanyag ablakrendszerek tökéletes megoldást nyújtanak újonnan épülő családi házakhoz, 
																		alacsony energiafogyasztású létesítményekhez vagy lakásfelújításokhoz egyaránt. 
																	</p>
																</div>
																<br />
																<ul class="ttm-list ttm-list-style-icon ttm-list-icon-color-skincolor">
																	<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																		<span class="ttm-list-li-content">Elit kategória</span>
																	</li>
																	<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																		<span class="ttm-list-li-content">Több színben elérhető</span>
																	</li>
																	<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																		<span class="ttm-list-li-content">Modern megjelenés</span>
																	</li>
																	<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																		<span class="ttm-list-li-content">Extra kényelem és biztonság</span>
																	</li>
																	<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																		<span class="ttm-list-li-content">Kiválló hő- és hangszigetelési teljesítmény</span>
																	</li>
																</ul>       
															</div>
														</div>
														<div class="sep_holder_box width-100">
															<span class="sep_holder"><span class="sep_line"></span></span>
															<span class="sep_holder"><span class="sep_line"></span></span>
														</div>
														<div class="row">
															<div class="col-lg-12">
																<p>
																	A több légkamrás ablakok számos előnnyel rendelkeznek a kevesebb légkamrás ablakokhoz képest:
																</p>
																<ul class="ttm-list ttm-list-style-icon ttm-list-icon-color-skincolor pt-20">
																	<li><i class="ttm-textcolor-skincolor fa fa-check-square"></i>
																		<span class="ttm-list-li-content">
																			<strong>Nagyobb hőszigetelési hatás</strong>: A több légkamrás ablakok alacsonyabb hőátbocsátási tényezővel rendelkeznek, ami azt jelenti, 
																			hogy kevesebb hő szivárog ki az ablakon keresztül. Ez csökkenti a fűtési költségeket és javítja a lakókomfortot.
																		</span>
																	</li>
																	<li><i class="ttm-textcolor-skincolor fa fa-check-square"></i>
																		<span class="ttm-list-li-content">
																			<strong>Jobb hangszigetelés</strong>: A több légkamrás ablakok hatékonyabban csillapítják a külső zajokat, így nyugodtabb és csendesebb környezetet biztosítanak otthonunkban.
																		</span>
																	</li>
																	<li><i class="ttm-textcolor-skincolor fa fa-check-square"></i>
																		<span class="ttm-list-li-content">
																			<strong>Nagyobb stabilitás</strong>: A több légkamrás ablakok erősebbek és ellenállóbbak a torzulásnak és a repedésnek, így hosszabb élettartammal rendelkeznek.
																		</span>
																	</li>
																	
																</ul>
															</div>
														</div>
														<div class="row">
															<div class="col-lg-12">
																<div class="ttm_single_image-wrapper">
																	
																	<div class="ttm-service-description mt-15 mb-30">
																		<div class="service-page-header">
																			<h2>A műanyag ablakok típusai nyithatóságuk szerint</h2>
																		</div>
																		
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															
															<div class="col-sm-4" style="padding-top: 25px;">
																<div class="ttm_single_image-wrapper mb-35">
																	<img class="img-fluid" src="<?php echo $server;?>images/fix.gif" alt="service-09">
																	<p style="text-align:left">
																		Fix ablak
																	<p>
																</div>
															</div>
															<div class="col-sm-4">
																<div class="ttm_single_image-wrapper mb-35">
																	<img class="img-fluid" src="<?php echo $server;?>images/egyszarnyu.gif" alt="service-09">
																	<p style="text-align:left">
																		Nyíló ablak
																	<p>
																</div>
															</div>
															<div class="col-sm-4">
																<div class="ttm_single_image-wrapper mb-35">
																	<img class="img-fluid" src="<?php echo $server;?>images/egyszarnyu_buko.gif" alt="service-09">
																	<p style="text-align:left">
																		Bukó ablak
																	<p>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-sm-4">
																<div class="ttm_single_image-wrapper mb-35">
																	<img class="img-fluid" src="<?php echo $server;?>images/egyszarnyu_nyilo-buko.gif" alt="service-09">
																	<p style="text-align:left">
																		Bukó-nyíló ablak
																	<p>
																</div>
															</div>
															<div class="col-sm-4">
																<div class="ttm_single_image-wrapper mb-35">
																	<img class="img-fluid" src="<?php echo $server;?>images/ketszarnyu_nyilo-buko+nyilo-buko.gif" alt="service-09">
																	<p style="text-align:left">
																		Tokosztott bukó-nyíló ablak
																	<p>
																</div>
															</div>
															
														</div>
														<div class="row">
															<div class="col-lg-12">
																<div class="accordion pt-15 pb-15">
																	<div class="toggle ttm-toggle_style_classic style-1 ttm-control-right-true ttm-toggle-title-bgcolor-white">
																		<div class="toggle-title"><a href="#" class="">Fix műanyag ablak</a></div>
																		<div class="toggle-content" style="">
																			<p class="">
																				A fix ablaknak nincsen kilincse, hiszen nem lehet kinyitni. Ezt a típust akkor szokás kérni, ha a helyiség szellőzése egy másik, nyitható ablakon keresztül 
																				történik, s a fix ablak csak a napfény bejutása miatt kerül beépítésre.
																			</p>
																		</div>
																	</div>
																	<div class="toggle ttm-toggle_style_classic style-1 ttm-control-right-true ttm-toggle-title-bgcolor-white">
																		<div class="toggle-title"><a href="#" class="">Nyíló műanyag ablak</a></div>
																		<div class="toggle-content" style="">
																			<p class="">
																				Hasonló a bukó nyíló ablakhoz, azzal a különbséggel, hogy nem lehet buktatni, csupán nyitmi. E miatt nem nagyon terjedt el ugyanis minimálissal 
																				kerül többe, ha az ablak tud bukni is. A bukó funkció pedig megéri azt a kis plusz ráfordítást.
																			</p>
																		</div>
																	</div>
																	<div class="toggle ttm-toggle_style_classic style-1 ttm-control-right-true ttm-toggle-title-bgcolor-white">
																		<div class="toggle-title"><a href="#" class="">Bukó műanyag ablak</a></div>
																		<div class="toggle-content" style="">
																			<p class="">
																				A bukó ablakot nem lehet hagyományosan kinyitni, csak bukóra. Főként olyan helyekre szokás tenni, ahol az ablak szélessége nagyobb, mint a 
																				hossza (fürdő, wc, előadótermek, stb.). Amennyiben magasra szeretnénk bukó ablakot elhelyezni, kaphatóak távműködtetésű, bowdenes vagy távnyitó rudas modellek is.
																			</p>
																		</div>
																	</div>
																	<div class="toggle ttm-toggle_style_classic style-1 ttm-control-right-true ttm-toggle-title-bgcolor-white">
																		<div class="toggle-title"><a href="#" class="">Bukó-nyíló műanyag ablak</a></div>
																		<div class="toggle-content" style="">
																			<p class="">
																				Ez a típus a kilincs segítségével működteti a bukó és nyíló funkciót. Általában a kilincs feltolásával érjük el a bukó, 
																				vízszintesre állítva a nyitott, lefelé fordítva pedig a zárt állapotot.
																			</p>
																		</div>
																	</div>
																	<div class="toggle ttm-toggle_style_classic style-1 ttm-control-right-true ttm-toggle-title-bgcolor-white">
																		<div class="toggle-title"><a href="#" class="">Tokosztott bukó-nyíló műanyag ablak</a></div>
																		<div class="toggle-content" style="">
																			<p class="">
																				Hasonlóan a váltószárnyas ablakhoz, itt is két szárny van, viszont itt mindkét szárny külön működik, tehát mindkettőhöz van kilincs. Amennyiben mindkét szárny nyitva van, a 
																				két ablak között egy osztó van, hogy egymástól függetlenül lehessen használni a két szárnyat. Itt is lehet bukó-nyíló vagy csak nyíló funkciós modelleket kérni
																			</p>
																		</div>
																	</div>
																	<div class="toggle ttm-toggle_style_classic style-1 ttm-control-right-true ttm-toggle-title-bgcolor-white">
																		<div class="toggle-title"><a href="#" class="">Középen felnyíló műanyag ablak - váltószárnyas műanyag ablak</a></div>
																		<div class="toggle-content" style="">
																			<p class="">
																				A középen felnyíló ablaknak két szárnya van; egy fő és egy másodlagos. A fő szárnyon van a kilincs, melyet bukó-nyíló vagy csak nyíló kivitelben is lehet kérni. 
																				A másodlagos szárnyat csak akkor lehet kinyitni a rejtett nyitó segítségével, ha a fő szárny már nyitva van.
																			</p>
																		</div>
																	</div>
																	<div class="toggle ttm-toggle_style_classic style-1 ttm-control-right-true ttm-toggle-title-bgcolor-white">
																		<div class="toggle-title"><a href="#" class="">Tolóablak - Toló műanyag ablak</a></div>
																		<div class="toggle-content" style="">
																			<p class="">
																				A tolóablakot az ablak alatt és felett lévő sínben, vízszintes irányban lehet eltolva kinyitni. Illetve létezik 90 
																				fokkal elfordított kialakítás is fel és le mozgatáshoz. Ezt akkor szokás használni, ha nem szeretnénk értékes belső teret hagyni az ablakszárnyaknak.
																			</p>
																		</div>
																	</div>
																	
																</div>
															</div>
														</div>
														<p>
															Ügyfeleink elégedettsége mindenek felett áll számunkra. Éppen ezért biztos lehet Ön is abban, hogy Ön számára is a legoptimálisabb megoldást fogjuk közösen megtalálni.
															A beépített ablakokra és munkánkra minden esetben írásos garanciát vállalunk, így Ön a műanyag ablakok meghibásodása esetén is nyugodt lehet, hiszen a garancia keretén belül orovosuljuk a problémát.
														</p>
														<?php } ?>
														<?php if ($service_name == "Bejárati ajtók beépítése"){?>
														<!-- Bejárati ajtó -->
														<p>
															A Miskolc Ablak csapata vállalja Miskolcon és környékén is a <strong>bejárati ajtók beépítését</strong>, beszerlését. Elkötelezettek az otthonok biztonságának és kényelmének növelése mellett. 
															Szakértő csapatunk hosszú évek óta foglalkozik bejárati ajtók telepítésével, és minden egyes munkánkra <strong>írásos garanciát vállalunk</strong>.
														</p>
														<p>
															Bejárati ajtó beszerelési szolgáltatásunk, <strong>ingyenes helyszíni felmérés</strong>sel elérhető, amely során szakértő csapatunk felméri az ajtó beépítésének pontos paramétereit és az Ön igényeit. 
															Ezután <strong>ingyenes árajánlat</strong>ot készítünk, amely átláthatóan és részletesen tartalmazza a költségeket és az ajánlott megoldásokat.
														</p>
														<p>
															Bejárati ajtók széles választékát kínáljuk, melyeket különböző anyagokból gyártatunk le. Ezek lehetnek akár fa bejárati ajtók, acél bejárati ajtók vagy akár műanyag bejárati ajtók is. 
															Mindegyik ajtó magas szintű biztonságot és funkcionalitást garantál, és testreszabható különböző kiegészítő funkciókkal, mint például digitális zárszerkezetek, biztonsági üvegezés és díszítő elemek. stb.
														</p>
														<p>
															Az általunk kínált bejárati ajtók magas hő- és hangszigetelő tulajdonságokkal rendelkeznek, így nemcsak biztonságosak, hanem energiahatékonyak is, hozzájárulva az otthon komfortjához és takarékosságához.
														</p>
														<p>
															Ahogy már említettük: minden munkánkra garanciát vállalunk, így Ön biztos lehet abban, hogy a beépített bejárati ajtók hosszú távon fogják szolgálni Önt és otthonát.
														</p>
														
														<?php }?>
														<?php if ($service_name == "Beltéri ajtók beépítése"){?>
															<p>
																A Miskolc Ablak csapata vállalja Miskolcon és környékén is a <strong>beltéri ajtók beépítését</strong>, beszerlését. Elkötelezettek vagyunk az otthonok biztonságának és kényelmének növelése mellett. 
																Szakértő csapatunk hosszú évek óta foglalkozik beltéri ajtók telepítésével, és minden egyes munkánkra <strong>írásos garanciát vállalunk</strong>.
															</p>
															<p>
																Beltéri ajtó beszerelési szolgáltatásunk, <strong>ingyenes helyszíni felméréssel</strong> elérhető, amely során szakértő csapatunk felméri az ajtó beépítésének pontos paramétereit és az Ön igényeit. 
																Ezután <strong>ingyenes árajánlatot</strong> készítünk, amely átláthatóan és részletesen tartalmazza a költségeket és az ajánlott megoldásokat.
															</p>
															<p>
																Beltéri ajtók széles választékát kínáljuk, melyeket különböző anyagokból gyártatunk le. Ezek lehetnek akár fa beltéri ajtók, acél beltéri ajtók vagy akár műanyag beltéri ajtók is. 
																Mindegyik ajtó magas szintű biztonságot és funkcionalitást garantál, és testreszabható különböző kiegészítő funkciókkal, mint például digitális zárszerkezetek, biztonsági üvegezés és díszítő elemek stb.
															</p>
															<p>
																Az általunk kínált beltéri ajtók magas hő- és hangszigetelő tulajdonságokkal rendelkeznek, így nemcsak biztonságosak, hanem energiahatékonyak is, hozzájárulva az otthon komfortjához és takarékosságához.
															</p>
															<p>
																Minden munkánkra garanciát vállalunk, így Ön biztos lehet abban, hogy a beépített beltéri ajtók hosszú távon fogják szolgálni Önt és otthonát.
															</p>
														<?php }?>
														<?php if ($service_name == "Redőny szerelés és beépítés"){?>
															<p>
																Cégünk, a Miskolc Ablak, kiemelkedő szolgáltatást nyújt <strong>redőnyök beépítése</strong> terén Miskolc és környékén. Elkötelezettek vagyunk az otthonok biztonságának, 
																kényelmének és energiahatékonyságának növelése mellett, és a redőnyök telepítése terén is magas minőséget biztosítunk ügyfeleink számára.
															</p>
															<p>
																Redőny beépítési szolgáltatásunk magában foglalja az <strong>ingyenes helyszíni felmérés</strong>t, amely során szakértő csapatunk felméri az ablakok és ajtók paramétereit, 
																valamint az Ön igényeit. Ezután részletes árajánlatot készítünk, amely tartalmazza a különböző redőny típusok árait és az ajánlott megoldásokat.
															</p>
															<p>
																A redőnyök széles választékát kínáljuk, beleértve a hagyományos <strong>alumínium redőnyöket</strong>, a <strong>műanyag redőnyöket</strong> és a modern <strong>szúnyoghálós redőnyöket</strong> is. 
																Minden típusnak megvannak a maga előnyei és alkalmazási területei, és szakértő csapatunk segít kiválasztani az Ön számára legmegfelelőbb megoldást.
															</p>
															<p>
																Az alumínium redőnyök masszív kialakításuknak köszönhetően kiváló védelmet nyújtanak a betörések ellen, valamint hatékonyan szigetelik a hőt és a hangot. 
																A műanyag redőnyök <strong>könnyűek és tartósak</strong>, és széles színválasztékuknak köszönhetően könnyen illeszkednek bármilyen lakberendezési stílushoz. 
																A szúnyoghálós redőnyök pedig hatékonyan <strong>védenek a rovarok és a pollen ellen</strong>, miközben megőrzik a szellőzést.
															</p>
															<p>
																A redőnyök telepítésekor szakértő csapatunk gondoskodik az ablakok és ajtók pontos méretezéséről, valamint az optimális illeszkedésről és működésről. Minden 
																munkánkra <strong>garanciát vállalunk</strong>, így biztos lehet abban, hogy a redőnyök hosszú távon kiválóan fogják szolgálni otthonát.
															</p>
															<p>
																Emellett további szolgáltatásokat is kínálunk, mint például redőnyök karbantartása és javítása, valamint kiegészítő funkciók beépítése, mint például 
																motoros vezérlés vagy távirányítóval vezérelhető redőnyök.
															</p>
															<p>
																Összességében, cégünk elkötelezett az ügyfelek elégedettsége mellett, és minden munkánkat magas színvonalon és gondosan végzi. Ha minőségi redőnyre van 
																szüksége, és szakértő telepítést keres, forduljon hozzánk bizalommal!
															</p>
														<?php }?>
														<?php if ($service_name == "Szúnyogháló szerelés és szúnyogháló készítés"){?>
															<p>A Miskolc Ablak csapata elkötelezett abban, hogy segítsen az otthonokat kellemes és rovarmentes környezetté alakítani. Szakértő csapatunk hosszú évek óta foglalkozik szúnyoghálók beépítésével Miskolc és környékén, és minden egyes munkánkra szavatosságot vállalunk.</p>

															<p>Szúnyogháló beépítési szolgáltatásunk részeként ingyenes helyszíni felmérést biztosítunk ügyfeleink számára, ahol szakértő csapatunk megvizsgálja az ablakok és ajtók paramétereit, valamint az Ön igényeit, hogy biztosítsuk a tökéletes illeszkedést és funkcionalitást.</p>

															<p>A szúnyoghálók széles választékát kínáljuk, hogy mindenki megtalálhassa az igényeinek és otthonának legmegfelelőbb megoldást. Ezek a típusok magukban foglalják a fix és mozgatható szúnyoghálókat, valamint az ajtókhoz és ablakokhoz egyaránt alkalmas változatokat.</p>

															<p>A fix szúnyoghálók ideálisak az ablakokra, amelyek ritkábban nyitottak, míg a mozgatható szúnyoghálók könnyen kezelhetők és könnyen tisztíthatók.</p>

															<p>Az alumínium és műanyag szúnyoghálók erős és tartós anyagokból készülnek, amelyek hatékony védelmet nyújtanak a rovarok és a pollen ellen. Emellett átlátszó kialakításuknak köszönhetően zavartalan kilátást biztosítanak, miközben megakadályozzák a bosszantó rovarok belépését.</p>

															<p>A szúnyoghálók telepítésekor szakértő csapatunk gondoskodik az ablakok és ajtók pontos méretezéséről, valamint az optimális illeszkedésről és működésről. Minden munkánkra garanciát vállalunk, így biztos lehet abban, hogy a szúnyoghálók hosszú távon hatékonyan fogják védeni otthonát a bosszantó rovaroktól és a pollenektől.</p>

															<p>A szúnyoghálók beépítése minden évszakban fontos szerepet játszik az otthonok komfortjában és higiéniájában. A rovarok, különösen a nyári hónapokban, gyakran kellemetlenséget okoznak, és akár egészségügyi problémákat is előidézhetnek. Azonban a megfelelően kiválasztott és telepített szúnyoghálók megoldást nyújtanak ezekre a problémákra, és biztosítják a zavartalan pihenést és alvást.</p>

															<p>A fix és mozgatható szúnyoghálók közötti választás nagyban függ az ablak vagy ajtó használatának gyakoriságától és funkciójától. A fix szúnyoghálók állandó védelmet nyújtanak, míg a mozgatható változatok könnyen kezelhetők és könnyen tisztíthatók.</p>

															<p>A szúnyoghálók kiváló minőségű anyagokból készülnek, amelyek tartósak és ellenállóak a külső hatásokkal szemben. Az alumínium szúnyoghálók könnyűek és ellenállnak a korróziónak, míg a műanyag változatok könnyen tisztíthatók és karbantarthatók.</p>

															<p>A szúnyoghálók nemcsak a rovarok ellen nyújtanak védelmet, hanem a pollenek és a por ellen is. Ez különösen fontos az allergiások és asztmások számára, akiknek fontos a tiszta és friss levegő otthonukban.</p>

															<p>A szúnyoghálók telepítése egyszerű és gyors folyamat, amelyet tapasztalt és szakképzett csapatunk végzi el. A szakértők gondoskodnak az ablakok és ajtók pontos méretezéséről, valamint az optimális illeszkedésről és működésről.</p>

															<p>Minden szúnyogháló telepítésekor alaposan ellenőrizzük a minőséget és a funkcionalitást, hogy biztosítsuk a hosszú távú hatékonyságot és elégedettséget.</p>

															<p>Emellett a szúnyoghálók karbantartását és javítását is vállaljuk, hogy azok mindig optimális állapotban legyenek, és hosszú élettartamot biztosítsanak.</p>

															<p>Összefoglalva, a szúnyoghálók beépítése kiváló megoldást nyújt a rovarok és pollenek elleni védelemre, és hozzájárul az otthonok kényelméhez és tisztaságához. Ha szüksége van megbízható és hatékony szúnyoghálóra, forduljon hozzánk bizalommal!</p>

														<?php }?>
														<?php if ($service_name == "Erkély felújítás"){?>
															<p>A Miskolc Ablak csapata szívesen segít az erkélyek újraépítésében és felújításában Miskolc és környékén. Tudjuk, hogy az erkély egy olyan hely, ahol kikapcsolódhatunk és friss levegőt szívhatunk be, ezért fontos, hogy az erkély megfelelő állapotban legyen.</p>

															<p>Erkélyének felújítása során számos lehetőség áll rendelkezésre. Ha például szeretné növelni az erkély funkcionalitását és kényelmét, gondoljon a redőnyök vagy szúnyoghálók telepítésére. Ezek a kiegészítők lehetővé teszik, hogy az erkélyet akkor is élvezhesse, amikor erős a napfény vagy zavaró rovarok vannak jelen.</p>

															<p><strong>A redőnyök az erkély ablakainak vagy ajtóinak kitűnő megoldást jelentenek a napfény elleni védelemre és a magánélet megőrzésére.</strong> Különböző típusú redőnyök közül választhat, beleértve az elektromos vezérlésű és a kézi felhúzású változatokat is, így biztosan megtalálja az Ön számára ideális megoldást.</p>

															<p><strong>A szúnyoghálók ugyancsak nagyszerű választás az erkélyen, különösen a nyári hónapokban.</strong> Ezek a hálók megakadályozzák a bosszantó rovarok belépését az erkélyre, így zavartalanul élvezheti a friss levegőt anélkül, hogy aggódnia kellene a rovarok miatt.</p>

															<p><strong>Ha az erkélyén elhelyezett ablakok vagy ajtók elavultak vagy rossz állapotban vannak, gondoljon azok cseréjére is.</strong> A modern, energiahatékony nyílászárók nemcsak a kényelmet és biztonságot növelik, hanem hozzájárulnak az energiahatékonysághoz is, csökkentve az energiaszámlákat.</p>

															<p><strong>Az erkély felújításánál fontos szempont a megfelelő anyagok kiválasztása és az alapos tervezés.</strong> Szakértő csapatunk segítséget nyújt Önnek az optimális megoldások kiválasztásában, figyelembe véve az erkély méretét, az igényeit és a költségvetést.</p>

															<p><strong>Természetesen minden munkánkra írásos garanciát vállalunk,</strong> így biztos lehet abban, hogy az erkély felújítása hosszú távon megbízható és kiváló minőségű lesz.</p>

															<p><strong>Ha szeretné újraépíteni vagy felújítani az erkélyét Miskolc vagy környékén, forduljon hozzánk bizalommal!</strong> Szakértő csapatunk készen áll arra, hogy segítsen megvalósítani álmai erkélyét, ami tökéletes kikapcsolódást és pihenést biztosít az Ön és családja számára.</p>

														<?php }?>
														<?php if ($service_name == "Pergola építés"){?>
															<div class="row">
																<div class="col-lg-12">
																	<div class="ttm_single_image-wrapper">
																		
																		<div class="ttm-service-description mt-15 mb-30">
																			<div class="service-page-header">
																				<h2>Pergola építés Miskolc és körnéykén</h2>
																			</div>
																			
																		</div>
																	</div>
																</div>
															</div>
															<p>
																Örömmel jelentjük be, hogy szolgáltatásaink új taggal bővültek, és mostantól pergola építésben is számíthat ránk Miskolc és környékén. 
																A pergolák nem csupán esztétikus kiegészítői otthonának vagy kertjének, hanem praktikus és kellemes környezetet teremtenek a szabadban.
															</p>
															<p><h3>Miért érdemes megfontolni a pergola építésést?</h3></p>
															<ul class="ttm-list ttm-list-style-icon ttm-list-icon-color-skincolor">
																<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																	<span class="ttm-list-li-content">
																		<strong>Árnyék és védelem:</strong> 
																		A pergola árnyékot és védelmet nyújt a napsütés és az időjárás viszontagságaival szemben. 
																		Így élvezheti a friss levegőt, anélkül hogy aggódnia kellene a túlmelegedés vagy a hirtelen eső miatt.
																	</span>
																</li>
																<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																	<span class="ttm-list-li-content">
																		<strong>Dekoráció és stílus:</strong> Egy jól tervezett és megépített pergola nemcsak hasznos, hanem esztétikailag is vonzó lehet. 
																		Különböző anyagok, mint például fa vagy alumínium, és különböző dizájnok közül választhat, hogy tökéletesen illeszkedjen otthona vagy kertje stílusához.
																	</span>
																</li>
																<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																	<span class="ttm-list-li-content">
																		<strong>Növények és zöld övezetek:</strong> 
																		A pergola remek lehetőséget kínál növények felhelyezésére és kúszónövények futtatására. Ez nemcsak esztétikai értéket ad a struktúrának, hanem hűvösebb és zöldebb környezetet is teremt a teraszon vagy kertben.
																		
																	</span>
																</li>
																<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																	<span class="ttm-list-li-content">
																		<strong>Növeli az ingatlan értékét:</strong> A jól megtervezett és szakszerűen megépített pergola értéket adhat az ingatlanának. Ez vonzóbbá teheti azt a potenciális vásárlók vagy bérlők számára, és növelheti az ingatlan piaci értékét.
																	</span>
																</li>
															</ul> 
															<p><h3>Miért válassza Miskolc Ablak csapata pergola építés szolgáltatását?</h3></p>
															<ul class="ttm-list ttm-list-style-icon ttm-list-icon-color-skincolor">
																<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																	<span class="ttm-list-li-content">
																		<strong>Tapasztalat és szakértelem:</strong>
																		Cégünk szakemberei évek óta foglalkoznak ablakok és kiegészítőik tervezésével és építésével. Mostantól ugyanezt a színvonalat és 
																		precizitást kínáljuk pergolák tervezése és kivitelezése terén is.
																	</span>
																</li>
																<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																	<span class="ttm-list-li-content">
																		<strong>Egyedi tervezés:</strong> 
																		Minden pergolát az Ön igényeihez és az otthona stílusához igazítunk. Legyen szó klasszikus vagy modern dizájnról, mi rugalmasan alkalmazkodunk az 
																		Ön elképzeléseihez. Minőségi anyagok és építési módszerek: Csak a legjobb minőségű anyagokat használjuk fel, hogy a pergola hosszú 
																		éveken át tökéletes állapotban maradjon.
																	</span>
																</li>
																<li><i class="ttm-textcolor-skincolor fa fa-arrow-circle-right"></i>
																	<span class="ttm-list-li-content">
																		<strong>Teljes körű szolgáltatás:</strong> Nemcsak a tervezést és az építést vállaljuk, hanem a karbantartást és javítást is. 
																		
																	</span>
																</li>
																
															</ul>  
															
															<p></p>
															<p></p>
														<?php } ?>
													</div>
													<div class="mt-30 res-991-mt-20 res-991-mb-30 text-center">
														<a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-dark" href="<?php echo $server.'szolgaltatasok/';?>">További szolgáltatásaink</a>
														<a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-dark" data-bs-toggle="offcanvas" data-bs-target="#offer" aria-controls="offcanvasBottom">Árajánlatkérés</a>
														<a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-dark" href="<?php echo $server.'munkaink/';?>">Tekintse meg munkáinkat</a>
													</div>
	                            				</div>
	        								</div>
											
	        							</div>
										<!--
	        							<div class="sep_holder_box width-100">
                                        	<span class="sep_holder"><span class="sep_line"></span></span>
                                        	<span class="sep_holder"><span class="sep_line"></span></span>
                                    	</div>
                                    	<div class="row">
			                                <div class="col-sm-7">
			                                    <div class="ttm-service-description">
                                                    <div class="service-page-header">
			                                             <h2>Electrical Geyser Repair</h2>
                                                    </div>
			                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accuswqo doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo et inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur ab ilo loream</p>
			                                        <div class="d-inline-block mt-30 res-575-mb-20 res-575-mt-20">
														<a class="ttm-btn style-1 ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-skincolor style-4" href="services-1.html">VIEW MORE</a>
													</div>
			                                    </div>
			                                </div>
			                                <div class="col-sm-5">
			                                    <div class="ttm_single_image-wrapper res-575-text-left">
			                                        <img class="img-fluid" src="image/services/service-360x445.jpg" alt="service-18">
			                                    </div>
			                                </div>
	                            		</div>
	                            		<div class="sep_holder_box width-100">
                                        	<span class="sep_holder"><span class="sep_line"></span></span>
                                        	<span class="sep_holder"><span class="sep_line"></span></span>
                                    	</div>
                                    	<div class="row">
			                                <div class="col-sm-5">
			                                    <div class="ttm_single_image-wrapper res-575-text-left">
			                                        <img class="img-fluid res-575-text-left" src="image/services/service-002-360x445.jpg" alt="service-19">
			                                    </div>
			                                </div>
			                                <div class="col-sm-7">
			                                    <div class="ttm-service-description res-575-mt-20">
                                                    <div class="service-page-header">
			                                             <h2>Replacement of damaged switches</h2>
                                                    </div>
			                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accuswqo doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo et inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur ab ilo loream</p>
			                                        <div class="d-inline-block mt-30">
														<a class="ttm-btn style-1 ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-skincolor style-4" href="services-2.html">VIEW MORE</a>
													</div>
			                                    </div>
			                                </div> 
	                            		</div>
										-->
	        						</div>
	        					</div>
	        				</div>
        				</div>
        			</div>
					
        		</div>
        	</div>
        </div>
		
		<?php } ?>
        <!--procedure-section-->
        <section class="ttm-row procedure-section clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title -->
                        <div class="section-title title-style-center_text">
                            <div class="title-header">
                                <h3><?php echo explode("|", $alt)[0]; ?></h3>
                                <h2 class="title">Vegye igénybe szolgáltatásainkat</h2>
                            </div>
                        </div><!-- section title end -->
                    </div>
                </div>
                <div class="row mb_15">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-procedure">
                            <div class="featured-thumbnail">
                                <img class="img-fluid" width="210" height="210" src="<?php echo $server;?>images/contact.jpg" alt="<?php echo $alt;?>">
                                <div class="process-num"><span class="number">01</span></div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>Kapcsolatfelvétel</h3>
                                </div>
                                <div class="featured-desc">
                                    <p>Lehetősége van kapcsolatba lépni velünk weboldalunkon árajánlatkéréssel, visszahívás kérésével vagy a <a href="<?php echo $server.'kapcsolat';?>">kapcsolat</a> menüpontra kattintva üzenetet is küldhet. De elérhet bennünket <a href="https://www.facebook.com/profile.php?id=100093287431136" target="_blank">facebookon</a> vagy közvetlenül <a href="mailto:<?php echo $email;?>">emailt</a> is írhat nekünk. Ezekre kollégánk a lehető leghamarabb megpróbál válaszolni.</p>
                                </div>
                            </div>
                        </div><!-- featured-imagebox end-->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-procedure">
                            <div class="featured-thumbnail">
                                <img class="img-fluid" width="210" height="210" src="<?php echo $server;?>images/measure.jpg" alt="<?php echo $alt;?>">
                                <div class="process-num"><span class="number">02</span></div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>Ingyenes helyszíni felmérés</h3>
                                </div>
                                <div class="featured-desc">
                                    <p>Beérkezett kérését kollégáink megvizsgálják és telefonos időpontegyeztetést követően személyesen megbeszéljük elképzelését és kollégánk a szükséges méréseket elvégzi, hogy pontos anyag- és munkadíjat tudjon az Ön részére számolni.</p>
                                </div>
                            </div>
                        </div><!-- featured-imagebox end-->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-procedure">
                            <div class="featured-thumbnail">
                                <img class="img-fluid auto_size" width="210" height="210" src="<?php echo $server;?>images/contract.jpg" alt="<?php echo $alt;?>">
                                <div class="process-num"><span class="number">03</span></div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>Árajánlat és szerződéskötés</h3>
                                </div>
                                <div class="featured-desc">
                                    <p>A felméréskor dokumentált adatok (igények, anyag, méret, stb) alapján kollégánk árajánlatot kínál Önnek, amely tételesen tartalmazza az elvégezendő anyag- és munkadíj költségeket. Ha ez Önnek megfelelő, szerződést kötünk Önnel, amelyben megállapodunk a kivitelezés időpontjáról is.</p>
                                </div>
                            </div>
                        </div><!-- featured-imagebox end-->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-procedure">
                            <div class="featured-thumbnail">
                                <img class="img-fluid auto_size" width="210" height="210" src="<?php echo $server;?>images/done.jpg" alt="<?php echo $alt;?>">
                                <div class="process-num"><span class="number">04</span></div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>Kivitelezés</h3>
                                </div>
                                <div class="featured-desc">
                                    <p>A megállapodásban (szerződés) foglaltak szerinti időpontban kollégáink kiszállnak a helyszínre és elkezdik a megrendelt szolgáltatás vagy szolgáltatások kivitelezését aszerint, ahogy arról korábban megállapodtunk. </p>
                                </div>
                            </div>
                        </div><!-- featured-imagebox end-->
                    </div>
					<div class="col-lg-3 col-md-6 col-sm-6">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-procedure">
                            <div class="featured-thumbnail">
                                <img class="img-fluid auto_size" width="210" height="210" src="<?php echo $server;?>images/helyreallitas.jpg" alt="<?php echo $alt;?>">
                                <div class="process-num"><span class="number">05</span></div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>Helyreállítási munkálatok</h3>
                                </div>
                                <div class="featured-desc">
                                    <p>A helyreállítási munkálatok elvégzése szintén a szerződés része, annak esetleges költségeit a korábban kiajánlott árajánlat már tartalmazta ezért ezt is elvégzik kollégáink.</p>
                                </div>
                            </div>
                        </div><!-- featured-imagebox end-->
                    </div>
					<div class="col-lg-3 col-md-6 col-sm-6">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-procedure">
                            <div class="featured-thumbnail">
                                <img class="img-fluid auto_size" width="210" height="210" src="<?php echo $server;?>images/tormelek.jpg" alt="<?php echo $alt;?>">
                                <div class="process-num"><span class="number">06</span></div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>Keletkezett hulladékok / szemét elszállítása</h3>
                                </div>
                                <div class="featured-desc">
                                    <p>Őnnek nem kell az esetlegesen keletkezett hulladék elszállításáról gondoskodnia, hiszen szerződésünk részét képezi, hogy a hulladék elszállításáról és elhelyezéséről mi gondoskodunk.</p>
                                </div>
                            </div>
                        </div><!-- featured-imagebox end-->
                    </div>
					<div class="col-lg-3 col-md-6 col-sm-6">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-procedure">
                            <div class="featured-thumbnail">
                                <img class="img-fluid auto_size" width="210" height="210" src="<?php echo $server;?>images/qa.jpg" alt="<?php echo $alt;?>">
                                <div class="process-num"><span class="number">07</span></div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>Minőségellenőrzés</h3>
                                </div>
                                <div class="featured-desc">
                                    <p>Az általunk elvégzett munka csak akkor tekinthető befejezettnek, ha az ügyfél a munkát átvette és az elvégzett munkával a szerződés szerint elégedett.</p>
                                </div>
                            </div>
                        </div><!-- featured-imagebox end-->
                    </div>
					<div class="col-lg-3 col-md-6 col-sm-6">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-procedure">
                            <div class="featured-thumbnail">
                                <img class="img-fluid auto_size" width="210" height="210" src="<?php echo $server;?>images/google.png" alt="<?php echo $alt;?>">
                                <div class="process-num"><span class="number">08</span></div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>Értékelés kérése</h3>
                                </div>
                                <div class="featured-desc">
                                    <p>Fontos számunkra, hogy más leendő ügyfél illetve minden érdeklődő számára transzparens képet adhassunk szolgáltatásaink minőségéről. Ezért minden elvégzett munka után értékelésre kérjük ügyfeleinket.</p>
                                </div>
                            </div>
                        </div><!-- featured-imagebox end-->
                    </div>
                </div>
            </div>
        </section>
        <!--procedure-section end-->

        <!--bottom_zero_padding-section-->
        <section class="ttm-row bottom_zero_padding-section clearfix">
            <div class="container">
                <!-- row -->
                <div class="row g-0">
                    <div class="col-lg-7">
                        <!-- col-bg-img-one -->
                        <div class="col-bg-img-eight ttm-bg ttm-left-span ttm-col-bgimage-yes spacing-9">
                           <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">
                                <div class="ttm-col-wrapper-bg-layer-inner"></div>
                            </div>
                            <div class="layer-content"></div>
                        </div>
                        <!-- col-bg-img-one end -->
                        <img src="<?php echo $server;?>images/happy.png" class="ttm-equal-height-image img-fluid res-991-mb-40" alt="image">
                    </div>
                    <div class="col-lg-5">
                    	<div class="ttm-bg ttm-col-bgcolor-yes ttm-bgcolor-skincolor ttm-right-span spacing-7">
		                    <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                    		<div class="layer-content">
		                        <!-- section title -->
		                        <div class="section-title">
		                            <div class="title-header">
		                                <h3><?php echo explode("|", $alt)[0]; ?></h3>
		                                <h2 class="title mb-40">Értékelések ügyfeleinktől</h2>
		                                <p class="title mb-40">Ön már ügyfelünk? Kérjük értékelje az igénybevett szolgáltatásunkat <strong><u><a href="https://g.page/r/CdxMSjJ6FbCQEBM/review" target="_blank">ezen a linken</a></u></strong> keresztül! Köszönjük.</p>
		                            </div>
		                        </div><!-- section title end -->
		                    </div>
		                </div>
                    </div>
                </div>
            </div>
        </section>
        <!--bottom_zero_padding-section end-->

        <!--zero_padding-section-->
        <section class="ttm-row zero_padding-section clearfix">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-6"></div>
        			<div class="col-lg-6">
        				<!-- col-bg-img-two -->
                        <div class="col-bg-img-three ttm-bg ttm-col-bgimage-yes ttm-bgcolor-darkgrey spacing-10">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                            <div class="layer-content">
                                <div class="taggbox" style="width:100%;height:100%" data-widget-id="149059" data-tags="false" ></div><script src="https://widget.taggbox.com/embed-lite.min.js" type="text/javascript"></script>
                            </div>
                        </div>
        			</div>
        		</div>	
        	</div>
        </section>
        <!--zero_padding-section end-->
		<!--contact-section-->
		<section class="ttm-row blog-section bg-img3 clearfix" style="padding: 200px 0 136px;" id="arajanlatkeres">
			<div class="container">
				<div class="row mt_100 box-shadow2 res-991-mt-20">
					<div class="col-lg-12">
						<div class="spacing-5 ttm-bgcolor-white">
							<!-- section title -->
							<div class="section-title clearfix">
								<div class="title-header">
									<h5>Ingyenes árajánlatkérés</h5>
									<h2 class="title">Kérjen árajánlatot most!</h2>
								</div>
							</div><!-- section title end -->
							<form id="ttm-quote-form" class="ttm-quote-form wrap-form " method="post" action="#">
								<div class="row">
									<div class="col-lg-6">
										<label>
											<span class="text-input"><input name="name" type="text" placeholder="Teljes neve" required="required"></span>
										</label>
									</div>
									<div class="col-lg-6">
										<label>
											<span class="text-input"><input name="email" type="email" placeholder="Email címe"></span>
										</label>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<label>
											<span class="text-input"><input name="phone_number" type="text" value="" placeholder="Telefonszáma" required="required"></span>
										</label>
									</div>
									<div class="col-lg-6">
										<label>
											<span class="text-input"><input name="address" type="text" placeholder="Pontos címe" required="required"></span>
										</label>
									</div>
								</div>
								<div class="row">
									<span class="text-input">
										<select id="service" name="service" required>
											<option value="">Válasszon szolgáltatást</option>
											<option value="Műanyag ablak beépítés">Műanyag ablak beépítés</option>
											<option value="Egyéb ablak beépítés">Egyéb ablak</option>
											<option value="Beltéri ajtó beépítés">Beltéri ajtó beépítés</option>
											<option value="Bejárati ajtó beépítés">Bejárati ajtó beépítés</option>
											<option value="Redőny beépítés">Redőny beépítés</option>
											<option value="Szúnyogháló beépítés">Szúnyogháló beépítés</option>
											<option value="Erkély felújítás">Erkély felújítás</option>
											<option value="Garanciális javítás">Garanciális javítás</option>
											<option value="Egyéb">Egyéb</option>
										</select>
									</span>
								</div>
								<div class="row">
									<span class="text-input">
										<textarea name="message" rows="4" placeholder="Kérem írja le milyen munkával is szeretne bennünket megbízni." required="required"></textarea>
									</span>
								</div>
								<div class="row">
									<span class="text-input">
										<select id="honnan" name="honnan" required>
											<option value="">Hol halott rólunk? Válasza fontos számunkra!</option>
											<option value="Google">Google-ban találtam rá az oldalra</option>
											<option value="Facebook">Facebookon találtam rá az oldalra</option>
											<option value="Szórólap">Újságban / szórólapon olvastam az oldalról</option>
											<option value="Ajánlás">Ismerősöm ajánlotta az oldalt</option>
											<option value="Egyéb">Egyéb</option>
										</select>
									</span>
								</div>
								<div class="row">
									<div class="text-input d-flex align-items-center">
										<input class="form-check-input form-check-input-lg me-2" style="height: 2em;width:2em" type="checkbox" name="accept_terms" id="accept_terms" required="required" checked>
										<label class="form-check-label" for="accept_terms" style="font-weight: bold;">
											Megismertem és elfogadom az <a href="#" data-bs-toggle="modal" data-bs-target="#privacyPolicyModal">Adatkezelési Tájékoztatót</a>
										</label>
									</div>
								</div>
								<br />
								<div class="row">
									<input name="submit" type="submit" id="submit" class="ttm-btn ttm-btn-size-xl ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-dark" value="Küldés" style="font-size: 20px;">
								</div>
							</form>
						</div>
					</div>
					
				</div>
				
			</div>
		</section>
		<section class="ttm-row welcome-section clearfix">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title title-style-center_text">
							<div class="title-header">
								<h3><?php echo explode("|", $alt)[0]; ?></h3>
								<h2>Gyakori kérdések</h2>
							</div>
							<div class="title-desc">
								<p>
									Az ügyfeleinktől, illetve az érdeklődőktől beérkezett gyakorori kérdéseket összegezzük ezen a részen, remélve, hogy Ön is választ talál itt kérdésére. 
									Amennyiben nyílászárók beépítésével kapcsolatban további kérdése, észrevtétele van lpjen kapcsolatba velünk.
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="pt-15 res-991-pt-0">
					<div class="row">
						<div class="col-lg-6">
							<div class="accordion style-2">
								<?php 
									$get_gyik_by_cat = get_gyik_by_cat("generall");
									$count = count($get_gyik_by_cat);
									$half_count = ceil($count / 2);
									foreach($get_gyik_by_cat as $key => $gyik) {
										if ($key < $half_count) {
								?>
								<div class="toggle ttm-toggle_style_classic ttm-control-right-true ttm-toggle-title-bgcolor-white">
									<div class="toggle-title"><a href="#" style="text-transform: none;"><?php echo $gyik['question']; ?></a></div>
									<div class="toggle-content" style="display: none;">
										<p><?php echo $gyik['answer']; ?></p>
									</div>
								</div>
								<?php 
										}
									}
								?>
							</div>
						</div>
						<div class="col-lg-6 pl-50 res-991-pl-30 res-991-pr-30 res-991-pt-30 res-991-pl-12">
							<div class="accordion style-2">
								<?php 
									foreach($get_gyik_by_cat as $key => $gyik) {
										if ($key >= $half_count) {
								?>
								<div class="toggle ttm-toggle_style_classic ttm-control-right-true ttm-toggle-title-bgcolor-white">
									<div class="toggle-title"><a href="#" style="text-transform: none;"><?php echo $gyik['question']; ?></a></div>
									<div class="toggle-content" style="display: none;">
										<p><?php echo $gyik['answer']; ?></p>
									</div>
								</div>
								<?php 
										}
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="ttm-row welcome-section bg-img3 clearfix" id="szolgaltatasi_teruletek">
			<div class="container">
				<div class="row g-0">
					<div class="col-lg-12">
						<div class="section-title style-5">
							<div class="title-header">
								<h3><?php echo explode("|", $alt)[0]; ?></h3>
								<h2>Szolgáltatási területeink</h2>
							</div>
							<div class="title-desc">
								<p class="pb-0">
									Örömmel jelentjük, hogy most már nem csak Miskolcon, de Miskolc vonzáskörzetében is igénybe vehetik az alábbi szolgáltatásainkat: 
									műanyag ablak beépítése, beltéri ajtók beépítése, bejárati ajtók beépítése, szúnyogháló készítés és beépítés, redőny beépítés és erkély felújítás. 
									További kérdés esetén a Miskolc Ablak csapata várja a megkereséseket.
								</p>
							</div>
						</div>
					</div>
					
				</div>
				<div class="pt-25 res-991-pt-0">
					<div class="row row-equal-height mt_15 mb_15 res-991-mt-15">
						<div class="col-md-12">
							<div class="featured-icon-box icon-align-top-content ttm-bgcolor-grey style-5">
								<iframe src="https://www.google.com/maps/d/embed?mid=1ptYtz9xH6chimGyfLB9LRkKqj7KU1Ec&ll=48.03766906786932%2C20.6449324&z=11" width="auto" height="800" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
								<?php 
									$get_all_services = get_all_services();
									$accordion_index = 1;
									foreach($get_all_services as $services) {
								?>
									<div class="accordion style-1" id="accordion_<?php echo $accordion_index; ?>">
										<div class="toggle ttm-toggle_style_classic ttm-control-right-true ttm-toggle-title-bgcolor-white">
											<div class="toggle-title"><a href="#" style="text-transform: none;"><?php echo $services['service']?> szolgáltatásunk az alábbi teleüléseken elérhető</a></div>
											<div class="toggle-content" style="display: none;">
												<?php 
													$get_all_city_in_borsod = get_all_city_in_borsod();
													$cities_count = count($get_all_city_in_borsod);
													$cities_per_row = 3;
													$rows_count = ceil($cities_count / $cities_per_row);

													for ($i = 0; $i < $rows_count; $i++) {
														echo '<div class="row">';
														
														for ($j = $i * $cities_per_row; $j < min(($i + 1) * $cities_per_row, $cities_count); $j++) {
															$borsod = $get_all_city_in_borsod[$j];
															echo '<div class="col-4">';
															echo '<a href="'.$server.'szolgaltatasok/'.$services['id'].'/'.$services['link'].'/'.$borsod['varos_ex'].'">'.$services['service'].' '. $borsod['varos'].'</a>';
															echo '</div>';
														}
														
														echo '</div>';
													}
												?>
											</div>
										</div>
									</div>
								<?php 
										$accordion_index++;
									}
								?>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</section>
        <!-- blog-section -->
        <section class="ttm-row blog-section ttm-bgcolor-orange clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title -->
                        <div class="section-title title-style-center_text">
                            <div class="title-header">
                                <h3><?php echo explode("|", $alt)[0]; ?></h3>
                                <h2 class="title pb-30">Blog bejegyzéseink</h2>
                            </div>
                        </div><!-- section title end -->
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="row slick_slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "initialSlide":3, "arrows":true, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1200,"settings":{"slidesToShow": 2}} , {"breakpoint":991,"settings":{"slidesToShow": 2}}, {"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>
							<?php 
								$get_1_3_blog = get_1_3_blog();
								foreach($get_1_3_blog as $blog) {
									
							?>
                            <div class="col-lg-4">
                                <!-- featured-imagebox-post -->
                                <div class="featured-imagebox featured-imagebox-post style2">
                                    <div class="ttm-post-thumbnail featured-thumbnail"> 
                                        <img class="img-fluid" style="max-height:260px;max-width:450px" width="600" height="520" src="<?php echo $server.'images/blog/'.$blog['blog_images'];?>" alt="<?php echo $blog['blog_title']?>">
                                    </div>
                                    <div class="featured-content featured-content-post">
	                                    <div class="post-meta">
	                                    	<div class="cat_block-wrapper">
		                                        <span class="cat_block">
		                                            <time class="entry-date published" datetime="<?php echo (new DateTime($blog['blog_date']))->format('Y-m-d\TH:i:sP');?>"><?php echo $blog['blog_date']?></time>
		                                        </span>
		                                    </div>
		                                    <span class="ttm-meta-line byline">
		                                        <img class="img-fluid" src="<?php echo $server;?>images/oszi.png" alt="Mata Oszkár">
		                                        <a href="#" tabindex="0">Mata Oszkár</a>
		                                    </span>
		                                     
		                                </div>
	                                    <div class="featured-title">
	                                        <h3><a href="<?php echo $server.'blog-bejegyzesek/'.$blog['id'].'/'.urlencode($blog['blog_title'])?>" tabindex="0"><?php echo $blog['blog_title']?></a></h3>
	                                    </div>
	                                    <div class="ttm-blogbox-desc-footer">
                                            <div class="ttm-blogbox-footer-readmore">
                                                <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-icon-btn-right ttm-btn-color-dark mt-10" href="<?php echo $server.'blog-bejegyzesek/'.$blog['id'].'/'.urlencode($blog['blog_title'])?>" tabindex="0">Elolvasom<i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
	                                </div>
                                </div><!-- featured-imagebox-post end-->
                            </div>
								<?php } ?>
                        </div>
						<div class="mt-30 res-991-mt-20 res-991-mb-30 text-center">
							<a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-dark" href="<?php echo $server.'blog-bejegyzesek/';?>">További blog bejegyzések</a>
						</div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- blog_faq-section end -->

        <footer class="footer widget-footer clearfix">
            <div class="first-footer">
                <div class="container">
                    <div class="row">
                        <div class="widget-area col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <aside class="widget widget-text">
                                <!--featured-icon-box-->
                                <div class="featured-icon-box icon-align-before-content icon-ver_align-top">
                                    <div class="featured-icon">
                                        <div class="ttm-icon ttm-icon_element-color-white ttm-icon_element-size-lg ttm-icon_element-style-square">
                                            <i class="flaticon-solar-panel"></i>
                                        </div>
                                    </div>
                                    <div class="featured-content pl-0">
                                        <div class="featured-title">
                                            <h3>Szolgáltatási terület</h3>
                                            <a href="https://www.google.com/maps/d/edit?mid=1ptYtz9xH6chimGyfLB9LRkKqj7KU1Ec&usp=sharing" target="_blank"><p>Miskolc és környéke</p></a>
                                        </div>
                                    </div>
                                </div><!-- featured-icon-box end-->
                            </aside>
                        </div>
                        <div class="widget-area col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <aside class="widget widget-text">
                                <!--featured-icon-box-->
                                <div class="featured-icon-box icon-align-before-content icon-ver_align-top">
                                    <div class="featured-icon">
                                        <div class="ttm-icon ttm-icon_element-color-white ttm-icon_element-size-lg ttm-icon_element-style-square">
                                            <i class="flaticon-call"></i>
                                        </div>
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h3><?php echo $telefon;?></h3>
                                            <p>Hívjon bennünket bizalommal!</p>
                                        </div>
                                    </div>
                                </div><!-- featured-icon-box end-->
                            </aside>
                        </div>
                        <div class="widget-area col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <aside class="widget widget-text">
                                <!--featured-icon-box-->
                                <div class="featured-icon-box icon-align-before-content icon-ver_align-top">
                                    <div class="featured-icon">
                                        <div class="ttm-icon ttm-icon_element-color-white ttm-icon_element-size-lg ttm-icon_element-style-square">
                                            <i class="flaticon-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h3><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></h3>
                                            <p>Emailen is elér bennünket!</p>
                                        </div>
                                    </div>
                                </div><!-- featured-icon-box end-->
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <div class="second-footer ttm-textcolor-white">
                <div class="container">
                    <div class="row">
                        <div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="widget widget_text margin_right10 clearfix">
								<h4>Miskolc Ablak Csapata</h4>
                                <div class="footer-logo">
                                    <img id="footer-logo-img" class="img-fluid auto_size" height="40" width="190" src="<?php echo $server;?>images/ablak_logo.jpg" alt="<?php echo $alt;?>">
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-3">
	                        <div class="widget widget_nav_menu clearfix">
	                           <h3 class="widget-title">Szolgáltatásaink</h3>
	                            <ul id="menu-footer-services">
									<?php 
										$get_all_services = get_all_services();
										foreach($get_all_services as $services) {
										
									?>
					
	                                <li><a href="<?php echo $server.'szolgaltatasok/'.$services['id'].'/'.$services['link'];?>"><?php echo $services['service']?></a></li>
									
									<?php 
										}
									?>
	                                
	                            </ul>
	                        </div>
	                    </div>
	                    <div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="widget widget-recent-post clearfix">
                               <h3 class="widget-title">Legújabb blogok</h3>
                                <ul class="widget-post ttm-recent-post-list">
									<?php 
										$get_2_blog = get_2_blog();
										foreach($get_2_blog as $get_2_blog) {
										
									?>
                                    <li>
                                        <a href="<?php echo $server.'blog-bejegyzesek/'.$blog['id'].'/'.urlencode($blog['blog_title'])?>">
											<img class="img-fluid" width="150" height="150" src="<?php echo $server;?>images/blog/<?php echo $get_2_blog['blog_images']?>" alt="<?php echo $get_2_blog['blog_title']?>">
										</a>
                                        <div class="post-detail">
                                            <a href="<?php echo $server.'blog-bejegyzesek/'.$blog['id'].'/'.urlencode($blog['blog_title'])?>"><?php echo $get_2_blog['blog_title']?></a>
                                            <span class="post-date"><?php echo $get_2_blog['blog_date']?></span>
                                        </div>
                                    </li>
                                    <?php 
										}
									?>
                                </ul>
                            </div>
                        </div>
                        <div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="widget widget-timing clearfix">
                            <h3 class="widget-title">Az egyéni vállalkozás adatai</h3>
                                <div class="textwidget widget-text">
                                    <div class="ttm-pricelistbox-wrapper ">
                                        <div class="ttm-timelist-block-wrapper">
                                            <p>
												Mata Oszkár e.V.<br />
												
												Adószám: 90239391-1-25<br />
												Székhely: 3531 Miskolc, Kis-Hunyad út 28.<br />
												Email cím: info@ajto-ablak-miskolc.hu<br />
											
											</p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer-text ttm-bgcolor-darkgrey">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-left">
                                <span class="cpy-text"> © <?php echo date('Y');?><a href="<?php echo $server;?>" class="ttm-textcolor-skincolor"> Miskolc Ablak </a> Készítette: <a href="https://vargasoft.hu" target="_blank"><u></strong>VargaSoft</a></u></strong> All rights reserved.</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <ul class="footer-nav-menu text-end">
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#open_aszf">Általános Szerződési Feltételek (ÁSZF)</a></li>
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#privacyPolicyModal">Adatkezelési Tájékoztató</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
		<div class="bottom-bar">
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<a href="#" data-bs-toggle="offcanvas" data-bs-target="#offer" aria-controls="offcanvasBottom" style="font-size: 17px;line-height: 20px;font-weight: 600;text-transform: uppercase;">Árajánlatkérés / Visszahívás</a>
					</div>
				</div>
			  </div>
		</div>
        <a id="totop" href="#top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
	<script>
		// Függvény az akkordeonok kezeléséhez
		function toggleAccordion(event) {
			var parent = event.target.closest('.toggle');
			var content = parent.querySelector('.toggle-content');

			// Ellenőrizzük, hogy az akkordeon nyitva van-e vagy sem
			if (content.style.display === 'block') {
				content.style.display = 'none'; // Ha nyitva van, bezárjuk
			} else {
				content.style.display = 'block'; // Ha zárva van, kinyitjuk
			}
		}

		// Minden akkordeonhoz hozzáadjuk a click eseménykezelőt
		var toggles = document.querySelectorAll('.toggle-title');
		toggles.forEach(function(toggle) {
			toggle.addEventListener('click', toggleAccordion);
		});
	</script>
	<script>

		$(document).ready(function() {
			// Az első bezáró gombra kattintva zárja be a modált
			$('#modalCloseButton1').on('click', function() {
				$('#TavasziAjanlat').modal('hide');
			});

			// A második bezáró gombra kattintva zárja be a modált
			$('#modalCloseButton2').on('click', function() {
				$('#TavasziAjanlat').modal('hide');
			});
			$('#modalCloseButton3').on('click', function() {
				$('#TavasziAjanlat').modal('hide');
			});
			// A második bezáró gombra kattintva zárja be a modált
			$('#privacy').on('click', function() {
				$('#privacyPolicyModal').modal('hide');
			});
			// A második bezáró gombra kattintva zárja be a modált
			$('#privacy2').on('click', function() {
				$('#privacyPolicyModal').modal('hide');
			});
			$('#aszf_close1').on('click', function() {
				$('#open_aszf').modal('hide');
			});
			$('#aszf_close2').on('click', function() {
				$('#open_aszf').modal('hide');
			});
			// Modális ablak megnyitása
			$('#TavasziAjanlat').modal('show');

		});

	</script>

	<!-- Javascript -->

    <script src="<?php echo $server;?>js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo $server;?>js/jquery-migrate-3.3.2.min.js"></script>
    <script src="<?php echo $server;?>js/bootstrap.min.js"></script> 
    <script src="<?php echo $server;?>js/jquery.easing.js"></script>    
    <script src="<?php echo $server;?>js/jquery-waypoints.js"></script>    
    <script src="<?php echo $server;?>js/jquery-validate.js"></script> 
    <script src="<?php echo $server;?>js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo $server;?>js/slick.min.js"></script>
    <script src="<?php echo $server;?>js/numinate.min.js"></script>
    <script src="<?php echo $server;?>js/fontawesome.js"></script>
    <script src="<?php echo $server;?>js/imagesloaded.min.js"></script>
    <script src="<?php echo $server;?>js/jquery-isotope.js"></script>
    <script src="<?php echo $server;?>js/main.js"></script>

</body>

</html>