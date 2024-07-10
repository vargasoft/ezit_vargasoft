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


$title = "Miskolc Ablak - Kapcsolat";
$description = "Kérdése, esetleg észrevétele van szolgáltatásainkkal kapcsolatban? Küljön üzenetet nekünk.";


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

<meta property="article:published_time" content="2023-11-18T07:55:54+01:00">
<meta property="article:modified_time" content="2024-04-05T14:22:20+01:00">

<link href="<?php echo $fullUrl;?>" rel="canonical"/>

<script async src="https://shown.io/metrics/mn8jVz6a8w" type="text/javascript"></script>

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
		height:50px;
		bottom: 0;
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
							<option value="Pergola építés">Pergola építés</option>
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
					<input name="close" type="button" id="close" class="ttm-btn ttm-btn-size-sm ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-dark" value="Ablak bezárása" data-bs-dismiss="offcanvas" aria-label="Close" style="font-size: 16px;">
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
                                            <li class=""><a href="<?php echo $server.'szolgaltatasok/';?>">További szolgáltatások</a>
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
											<li class=""><a href="<?php echo $server.'munkaink/';?>">Munkáink</a></li>
                                            <li class=""><a href="<?php echo $server.'blog-bejegyzesek/';?>">Blog</a></li>
											<li class="active"><a href="<?php echo $server.'kapcsolat/';?>">Kapcsolat</a></li>
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
								<span>Kapcsolat</span>
							</div>
						</div>
					</div>
				</div>
			</div>                    
		</div>

		<div class="site-main">

			<section class="ttm-row zero_padding-section clearfix">
				<div id="google_map" class="google_map">
					<div class="map_container">
						<div id="map">
							<iframe src="https://www.google.com/maps/d/embed?mid=1ptYtz9xH6chimGyfLB9LRkKqj7KU1Ec&ll=48.03766906786932%2C20.6449324&z=11"></iframe>
						</div>
					</div>
				</div>
			</section>
			
			<section class="ttm-row clearfix">
				<div class="container">
					<div class="row">
						<div class="col-md-7">
							<div class="pr-50">
								<div class="section-title">
									<div class="title-header">
										<h3>Lépjen velünk kapcsolatba</h3>
										<h2><?php echo $title;?></h2>
									</div>
									<div class="title-desc">
										<p>
											Örömünkre szolgál, hogy kérdésével, észrevételével hozzánk fordul. Kérem adja meg adatait és küldjön üzenetet nekünk. Az üzenetét kollégáaink a lehető leghamarabb megválaszolják.
											Amennyiben árajánlatot szeretne kérni, kérjük kattintson <a data-bs-toggle="offcanvas" data-bs-target="#offer" aria-controls="offcanvasBottom"><strong><u>ide</u></strong></a>.
										</p>
									</div>
								</div>
								<form id="contact_form" class="contact_form form-style-2 wrap-form clearfix" method="post" action="#">
									<div class="row">
										<div class="col-lg-6">
											<label>
												<span class="text-input">
													<i class="ttm-textcolor-skincolor ti-user"></i>
													<input name="name" type="text" id="name" placeholder="Adja meg teljes nevét" required="required">
												</span>
											</label>
										</div>
										<div class="col-lg-6">
											<label>
												<span class="text-input">
													<i class="ttm-textcolor-skincolor ti-mobile"></i>
													<input name="phone" type="text" id="phone" placeholder="Adja meg telefonszámát" required="required">
												</span>
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<label>
												<span class="text-input">
													<i class="ttm-textcolor-skincolor fa fa-envelope-o"></i>
													<input name="email" id="email" type="email" placeholder="Adja meg email címét" required="required">
												</span>
											</label>
										</div>
										<div class="col-lg-6">
											<label>
												<span class="text-input">
													<i class="ttm-textcolor-skincolor ti-location-pin"></i>
													<input name="address" id="address" type="text" placeholder="Adja meg címét" required="required">
												</span>
											</label>
										</div>
									</div>
									<label>
										<span class="text-input">
											<i class="ttm-textcolor-skincolor ti-comment"></i>
											<textarea name="message" id="message" cols="40" placeholder="Ide írja üzenetét" required="required"></textarea>
										</span>
									</label>
									<p>
										Amennyiben az adatkezeléssel kapcsolatban további információra van szüksége <a href="#" data-bs-toggle="modal" data-bs-target="#privacyPolicyModal"><strong><u>ide</u></strong></a> kattintva elolvashatja az érvényes Adatkezelési Tájékoztatónkat.
									</p>
									<div class="section-title-btn">
										<button class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-dark mt-15 style-3 dark" type="submit" name="offer" id="offer">Üzenet elküldése</button>
									</div>
									
								</form>
							</div>
						</div>
						<div class="col-md-5 res-767-pt-50">
							<div class="ttm-rounded-shadow-box p-50 box-shadow">
								<div class="contact-us1-heading">
									<h4>Elérhetőségeink</h4>
								</div>
								<ul class="ttm_contact_widget_wrapper">
									<li><i class="fa fa-map-marker" aria-hidden="true"></i>Vállalkozás bejelentett székhelye:<br />3531 Miskolc, Kis-Hunyad út 28.</li>
									<li><i class="fa fa-mobile" aria-hidden="true"></i><?php echo $telefon;?></li>
									<li><i class="ttm-textcolor-skincolor ti-comment" aria-hidden="true"></i><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></li>
									<li><i class="fa fa-dribbble" aria-hidden="true"></i><a href="<?php echo $server;?>"><?php echo $server;?></a></li>
								</ul>
								<div class="ttm-social-links-wrapper ttm_contact_social_wrapper style-1 pt-20">
									<ul class="social-icons circle">
										<li class="social-facebook"><a class="tooltip-top" target="_blank" href="#" data-tooltip="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a class="tooltip-top" target="_blank" href="#" data-tooltip="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										<li><a class=" tooltip-top" target="_blank" href="#" data-tooltip="Google+"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
										<li><a class=" tooltip-top" target="_blank" href="#" data-tooltip="LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>


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