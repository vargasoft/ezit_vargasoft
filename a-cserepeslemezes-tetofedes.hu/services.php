<?php 
session_start();

include('config/connect.php');
require_once('config/functions.php');

$fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$server = "https://a-cserepeslemezes-tetofedes.hu/";
$telefon = "+36-30-652-1565";

$owner = "Varga Ferenc";
$address = "4251 Hajdúsámson, Sarjú utca 1.";
$email = "info@a-cserepeslemezes-tetofedes.hu";

if (EMPTY($_GET['service_id']) && EMPTY($_GET['service_name']) && EMPTY($_GET['service_city'])){

	$alt = 'Cserepeslemezes tetőfedés, Tetőfedés cserepes lemezzel, Lemeztető készítés';
	$title = "Szolgáltatások: cserepeslemezes tetőfedés, tetőfelújítás cserepeslemezzel, lemeztető készítés";
	$description = "Minőségi cserepeslemez tetőfedés és tető felújítás cserepeslemezzel. Lemeztető készítés és lemeztető felrakása. Tapasztalt csapatunk gondoskodik a professzionális szerelésről.";
}

if (ISSET($_GET['service_id']) && EMPTY($_GET['service_name']) && EMPTY($_GET['service_city'])){
	
	if ($_GET['service_id']=='cserepeslemezes-tetofedes'){
		$alt = 'Cserepeslemezes tetőfedés';
		$title = "Cserepeslemezes tetőfedés";
		$description = "A cserepeslemezes tetőfedés szolgáltatásunk tartós és esztétikus megoldást kínál az épületek számára. Klasszikus stílusa és praktikus jellege révén ideális választás mindenféle épület tetőfedéséhez.";
	}
	
	if ($_GET['service_id']=='tetofelujitas-cserepeslemezzel'){
		$alt = 'Tetőfelújítás cserepeslemezzel';
		$title = "Tetőfelújítás cserepeslemezzel";
		$description = "A tetőfelújítás cserepeslemezzel szolgáltatásunk tartós és esztétikus megoldást nyújt az épületek számára. Klasszikus stílusa és praktikus jellege révén ideális választás mindenféle tetőfedéshez.";
	}
	
	if ($_GET['service_id']=='lemezteto-keszites'){
		$alt = 'Lemeztető készítés';
		$title = "Lemeztető készítés, lemeztető felrakása";
		$description = "Lemeztető készítés szolgáltatásunkat képzett, profi munkatársaink végzik el a legmodernebb technikákat és eszközöket alkalmazva, biztosítva a ügyfeleink elégedettségét.";
	}
	
	if ($_GET['service_id']=='lemezteto-felrakasa'){
		$alt = 'Lemeztető felrakása';
		$title = "Lemeztető felrakása, lemeztető készítés";
		$description = "Lemeztető készítés szolgáltatásunkat képzett, profi munkatársaink végzik el a legmodernebb technikákat és eszközöket alkalmazva, biztosítva a ügyfeleink elégedettségét.";
	}
	
	if ($_GET['service_id']=='korcolt-lemezes-tetofedes'){
		$alt = 'Korcolt lemezes tetőfedés';
		$title = "Korcolt lemezes tetőfedés";
		$description = "Korcolt lemezes tetőfedésünk időtlen eleganciával és megbízhatósággal szolgálja az épületek védelmét és esztétikáját, biztosítva a hosszú távú minőséget és tartósságot.";
	}
	
	if ($_GET['service_id']=='trapezlemezes-tetofedes'){
		$alt = 'Trapézlemezes tetőfedés';
		$title = "Trapézlemezes tetőfedés";
		$description = "A trapézlemezes tetőfedés könnyű, mégis erős megoldás, amely hatékony védelmet nyújt az időjárás viszontagságaival szemben. Rugalmas kialakítása sokféle tervezési lehetőséget kínál.";
	}
}

if (ISSET($_GET['service_id']) && ISSET($_GET['service_name']) && ISSET($_GET['service_city'])){
	
	if ($_GET['service_id']=='cserepeslemezes-tetofedes'){
		
		$get_all_city_by_city_name = get_all_city_by_city_name($_GET['service_city']);
		foreach($get_all_city_by_city_name as $cityname) {
			$get_megye_by_megye_ex = get_megye_by_megye_ex(str_replace('-megye', '', $_GET['service_name']));
			foreach($get_megye_by_megye_ex as $megye) {
			
				$title = 'Cserepeslemezes tetőfedés '.$cityname['varos'].' településen | Cserepeslemezes tetőfedés '.$megye['megye'].'-megyében';
				$description = 'A cserepeslemezes tetőfedés szolgáltatásunk tartós és esztétikus megoldást kínál az épületek számára. Klasszikus stílusa és praktikus jellege révén ideális választás mindenféle épület tetőfedéséhez.';
				$alt = $title;  
			}
		}
	}
	
	if ($_GET['service_id']=='tetofelujitas-cserepeslemezzel'){
		
		$get_all_city_by_city_name = get_all_city_by_city_name($_GET['service_city']);
		foreach($get_all_city_by_city_name as $cityname) {
			$get_megye_by_megye_ex = get_megye_by_megye_ex(str_replace('-megye', '', $_GET['service_name']));
			foreach($get_megye_by_megye_ex as $megye) {
			
				$title = 'Tetőfelújítás cserepeslemezzel '.$cityname['varos'].' településen | Cserepeslemezes tetőfedés '.$megye['megye'].'-megyében';
				$description = $title.' | A tetőfelújítás cserepeslemezzel szolgáltatásunk tartós és esztétikus megoldást nyújt az épületek számára. Klasszikus stílusa és praktikus jellege révén ideális választás mindenféle tetőfedéshez.';
				$alt = $title;
			}
		}
		
		
	}
	
	if ($_GET['service_id']=='lemezteto-keszites'){
		$get_all_city_by_city_name = get_all_city_by_city_name($_GET['service_city']);
		foreach($get_all_city_by_city_name as $cityname) {
			$get_megye_by_megye_ex = get_megye_by_megye_ex(str_replace('-megye', '', $_GET['service_name']));
			foreach($get_megye_by_megye_ex as $megye) {
			
				$title = 'Lemeztető készítés '.$cityname['varos'].' településen | Lemeztető készítés '.$megye['megye'].'-megyében';
				$description = $title.' | Lemeztető készítés szolgáltatásunkat képzett, profi munkatársaink végzik el a legmodernebb technikákat és eszközöket alkalmazva, biztosítva a ügyfeleink elégedettségét.';
				$alt = $title;
			}
		}
	}
	
	if ($_GET['service_id']=='lemezteto-felrakasa'){
		$get_all_city_by_city_name = get_all_city_by_city_name($_GET['service_city']);
		foreach($get_all_city_by_city_name as $cityname) {
			$get_megye_by_megye_ex = get_megye_by_megye_ex(str_replace('-megye', '', $_GET['service_name']));
			foreach($get_megye_by_megye_ex as $megye) {
			
				$title = 'Lemeztető felrakása '.$cityname['varos'].' településen | Lemeztető felrakása '.$megye['megye'].'-megyében';
				$description = $title.' | Lemeztető felrakása szolgáltatásunkat képzett, profi munkatársaink végzik el a legmodernebb technikákat és eszközöket alkalmazva, biztosítva a ügyfeleink elégedettségét.';
				$alt = $title;
			}
		}
	}
	
	if ($_GET['service_id']=='korcolt-lemezes-tetofedes'){
		$get_all_city_by_city_name = get_all_city_by_city_name($_GET['service_city']);
		foreach($get_all_city_by_city_name as $cityname) {
			$get_megye_by_megye_ex = get_megye_by_megye_ex(str_replace('-megye', '', $_GET['service_name']));
			foreach($get_megye_by_megye_ex as $megye) {
			
				$title = 'Korcolt lemezes tetőfedés '.$cityname['varos'].' településen | Korcolt lemezes tetőfedés '.$megye['megye'].'-megyében';
				$description = $title.' | Korcolt lemezes tetőfedésünk időtlen eleganciával és megbízhatósággal szolgálja az épületek védelmét és esztétikáját, biztosítva a hosszú távú minőséget és tartósságot.';
				$alt = $title;
			}
		}
	}
	
	if ($_GET['service_id']=='trapezlemezes-tetofedes'){
		$get_all_city_by_city_name = get_all_city_by_city_name($_GET['service_city']);
		foreach($get_all_city_by_city_name as $cityname) {
			$get_megye_by_megye_ex = get_megye_by_megye_ex(str_replace('-megye', '', $_GET['service_name']));
			foreach($get_megye_by_megye_ex as $megye) {
			
				$title = 'Trapézlemezes tetőfedés '.$cityname['varos'].' településen | Trapézlemezes tetőfedés '.$megye['megye'].'-megyében';
				$description = $title.' | A trapézlemezes tetőfedés könnyű, mégis erős megoldás, amely hatékony védelmet nyújt az időjárás viszontagságaival szemben. Rugalmas kialakítása sokféle tervezési lehetőséget kínál.';
				$alt = $title;
			}
		}
	}
	
}


if (isset($_POST["offer"])) {
	// Telefonszám beérkezett, hozzunk létre egy Bootstrap modal ablakot
	
	$to  = 'info@a-cserepeslemezes-tetofedes.hu';
	$subject = 'Árajánlatkérés érkezett ('.$_SERVER['SERVER_NAME'].')';
	$message = '
	
		<p>Kedves domain név tulajdonos!</p>
		<br />
		Weboldaláról árajánlatkérés érkezett az alábbi részletekkel:
		<br /><br /><b>Domain:</b>'.$_SERVER['SERVER_NAME'].'<br>
		<b>Név:</b><a href="tel:'.$_POST['name'].'">'.$_POST['name'].'</a><br />
		<b>Telefonszám:</b><a href="tel:'.$_POST['phone'].'">'.$_POST['phone'].'</a><br />
		<b>Email cím:</b><a href="tel:'.$_POST['email'].'">'.$_POST['email'].'</a><br />
		<b>Szolgáltatás:</b><a href="tel:'.$_POST['service'].'">'.$_POST['service'].'</a><br />
		<b>Pontos cím:</b><a href="tel:'.$_POST['address'].'">'.$_POST['address'].'</a><br />
		<b>Üzenet:</b><br />'.$_POST['message'].'<br />
		
		<br /><br />
	
	';
	
	// To send HTML mail, the Content-type header must be set
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= 'To: Feri <'.$to.'>' . "\r\n";
	$headers .= 'From: ' . $_SERVER['SERVER_NAME'] . ' <no-reply@vargasoft.hu>' . "\r\n";
	
	if (mail($to, $subject, $message, $headers)) {
		echo '
		<script type="text/javascript">
			document.addEventListener("DOMContentLoaded", function () {
			  var myModal = new bootstrap.Modal(document.getElementById("successModal"));
			  myModal.show();
			});
		</script>
	';
	} else {
		// Sikertelen e-mail küldés esetén
		echo '
		<div class="ttm-topbar-content" style="text-align:center;">
			<h3 style="background-color: #f31717; color: white; padding: 10px;text-aign:center">Valami hiba történt.</h3>
		</div>
	';
		exit;
	}

}

//levélküldés (Visszahívás)
if (isset($_POST["call"])) {
    // Telefonszám beérkezett, hozzunk létre egy Bootstrap modal ablakot
    
    $to  = 'info@a-cserepeslemezes-tetofedes.hu';
    $subject = 'Visszahívást kértek ('.$_SERVER['SERVER_NAME'].')';
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
    $headers .= 'To: Feri <'.$to.'>' . "\r\n";
    $headers .= 'From: ' . $_SERVER['SERVER_NAME'] . ' <no-reply@vargasoft.hu>' . "\r\n";
    
    if (mail($to, $subject, $message, $headers)) {
    	echo '
    	<script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function () {
              var myModal = new bootstrap.Modal(document.getElementById("successModal"));
              myModal.show();
            });
		</script>
    ';
    } else {
    	// Sikertelen e-mail küldés esetén
    	echo '
    	<div class="ttm-topbar-content" style="text-align:center;">
    		<h3 style="background-color: #f31717; color: white; padding: 10px;text-aign:center">Valami hiba történt.</h3>
    	</div>
    ';
    	exit;
    }
    
}


function isMobileDevice() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
?>

<!doctype html>
<html class="no-js" lang="hu">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?echo $title;?></title>
        <meta name="description" content="<?php echo $description;?>">
		
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $server;?>images/fav/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $server;?>images/fav/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $server;?>images/fav/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $server;?>images/fav/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $server;?>images/fav/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $server;?>images/fav/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $server;?>images/fav/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $server;?>images/fav/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $server;?>images/fav/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $server;?>images/fav/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $server;?>images/fav/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $server;?>images/fav/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $server;?>images/fav/favicon-16x16.png">
		<link rel="manifest" href="<?php echo $server;?>images/fav/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo $server;?>images/fav/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
        <!-- Place favicon.ico in the root directory -->
        <!-- CSS here -->
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/animate.min.css">
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/fontello.css">
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/swiper-bundle.min.css">
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/default-icons.css">
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/default.css">
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/odometer.css">
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/aos.css">
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/tg-cursor.css">
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/main.css">
		
		<!-- SEO -->
		<meta property="og:title" content="<?php echo $title;?>">
		<meta property="og:description" content="<?php echo $description;?>">
		<meta property="og:type" content="website">
		<meta property="og:url" content="<?php echo $fullUrl;?>">
		<meta property="og:image" content="<?php echo $server;?>images/logo.png">
		<meta property="og:site_name" content="VargaSoft">
		<meta property="og:locale" content="hu_HU">
		<meta property="og:keywords" content="<?php echo $description;?>">
		<meta property="fb:app_id" content="100093287431136">

		<meta name="DC.title" content="<?php echo $title;?>">
		<meta name="DC.description" content="<?php echo $description;?>">
		<meta name="DC.publisher" content="VargaSoft">
		<meta name="DC.date" content="2024-03-11">
		<meta name="DC.language" content="hu">
		<meta name="DC.subject" content="<?php echo $description;?>">

		<meta name="sitemap" content="<?php echo $server;?>sitemap.xml">
		<meta name="robots" content="index, follow">

		<link href="<?php echo $fullUrl;?>" rel="canonical"/>

		<meta property="article:published_time" content="2024-03-05T07:55:54+01:00">
		<meta property="article:modified_time" content="2024-03-09T14:22:20+01:00">
		
		<style>
		.modal-backdrop {
		  z-index: 1055;
		}
		</style>
		
		<script type="application/ld+json">
			{
			  "@context": "http://schema.org",
			  "@type": "LocalBusiness",
			  "name": "<?php echo $title;?>",
			  "description": "<?php echo $description;?>",
			  "telephone": "<?php echo $telefon;?>",
			  "priceRange": "$$$",
			  "url": "<?php echo $server;?>",
			  "logo": "<?php echo $server;?>images/logo_01.png",
			  "image": "<?php echo $server;?>images/logo.png",
			  "founder": {
				"@type": "Person",
				"name": "Varga Ferenc"
			  },
			  "address": {
				"@type": "PostalAddress",
				"streetAddress": "Sarjú utca 1.",
				"addressLocality": "Hajdúsámson",
				"postalCode": "4251",
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
				"latitude": "47.6",
				"longitude": "21.76667"
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
				  "reviewBody": "A cég szakemberei nagyon profik voltak.",
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
				  "reviewBody": "A szigetelés során a csapat gyors és precíz munkát végzett. Nagyon elégedett vagyok az új ajtóval.",
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
				  "reviewBody": "Maximálisan elégedett vagyok a minőséggel és a szolgáltatással.",
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
				  "reviewBody": "A szigetelés során nagy segítség volt a szakértelmük.",
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
				  "reviewBody": "Gyorsak és megbízhatóak voltak, köszönöm!",
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
				  "reviewBody": "Kiváló minőségű munkát csináltak.",
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
				  "reviewBody": "Nagyon elégedett vagyok mindkét szolgáltatással.",
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
				  "reviewBody": "Köszönöm!",
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
				  "reviewBody": "Nagyon elégedett vagyok az eredménnyel.",
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
				  "reviewBody": "A cég nagyon rugalmas és a minőség kiváló.",
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
				  "reviewBody": "Nagyon elégedett vagyok a szolgáltatással és az írásos garanciával.",
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
				  "reviewBody": "A cég rugalmasan állt hozzá, és Miskolcon is elvégezték a helyszíni felmérést.",
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
				  "reviewBody": "A cég minden elvárásomat teljesítette.",
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
				  "reviewBody": "Az írásos garancia biztosíték a minőségre.",
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
				  "reviewBody": "A cég Miskolcon is elérhető.",
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
				  "reviewBody": "A csapat gyors és profi volt.",
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
				  "reviewBody": "Nagyon elégedett vagyok a végeredménnyel és a csapat munkájával.",
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
				  "reviewBody": "A csapat pontos és megbízható volt.",
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
				"reviewBody": "Az eredmény kiváló, és a csapat is nagyon profi volt.",
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
				"reviewBody": "Nagyon elégedett vagyok mind a minőséggel, mind pedig a csapat szolgáltatásával.",
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
						{
					  "@type": "ListItem",
					  "position": 1,
					  "name": "Cserepeslemezes tetőfedés",
					  "item": "<?php echo $server;?>"
					},	  				{
					  "@type": "ListItem",
					  "position": 2,
					  "name": "Cserepeslemezes tetőfedés",
					  "item": "<?php echo $server;?>szolgaltatasok/cserepeslemezes-tetofedes/"
					},	  				{
					  "@type": "ListItem",
					  "position": 3,
					  "name": "Tetőfelújítás cserepesemezzel",
					  "item": "<?php echo $server;?>szolgaltatasok/tetofelujitas-cserepeslemezzel/"
					},	  				{
					  "@type": "ListItem",
					  "position": 4,
					  "name": "Lemeztető készítés",
					  "item": "<?php echo $server;?>szolgaltatasok/lemezteto-keszites/"
					}
				]
			}
		</script>
		
		<script type="application/ld+json">
			{
			  "@context": "https://schema.org",
			  "@type": "FAQPage",
			  "mainEntity": [
						{
				  "@type": "Question",
				  "name": "Milyen típusú cserepeslemez a legmegfelelőbb a tetőmre?",
				  "acceptedAnswer": {
					"@type": "Answer",
					"text": "A megfelelő típusú cserepeslemez kiválasztása függ a tető dőlésszögétől, a helyi éghajlattól és az elvárásoktól. Például, a hagyományos kerámia cserepek tartósak és esztétikusak, míg a fém cserepek könnyebbek és könnyebben telepíthetők. További részletekért kérem tekintse meg cserepeslemezes tetőfedés szolgáltatásunkat vagy írjön üzenetet nekünk."
				  }
				}
				,		
				{
				  "@type": "Question",
				  "name": "Mennyire bonyolult a cserepeslemez tető felrakása?",
				  "acceptedAnswer": {
					"@type": "Answer",
					"text": "A cserepeslemez tetőfelrakása általában időigényes feladat, ami tapasztalatot és szakértelmet igényel. A pontos felmérés, a megfelelő előkészítés és a szakszerű szerelés kulcsfontosságú a tartósság és a vízzárás szempontjából. Kérjen online ingyenes árajánlatot és kollégánk garantáltan a lehető leghamarabb felkeresi Önt, hogy egyeztethessenek a részletekről."
				  }
				},
				{
				  "@type": "Question",
				  "name": "Mennyire tartósak és karbantarthatóak a cserepeslemezek?",
				  "acceptedAnswer": {
					"@type": "Answer",
					"text": "A cserepeslemezek általában tartósak és könnyen karbantarthatóak. A fémlemezek ellenállnak a korróziónak és könnyen tisztíthatóak, míg a kerámia cserepek hosszú élettartammal rendelkeznek és ellenállnak a környezeti hatásoknak. A cserepeslemezek karbantartása ugyanakkor szükséges, amivel kapcsolatban szintén igénybe veheti szolgáltatásunkat. A részletekért kérem írjon özenetet vagy kérjen visszahívést ingyenesen weboldalunkon."
				  }
				},
				{
				  "@type": "Question",
				  "name": "Mennyibe kerül a tetőfedés cserepeslemezzel?",
				  "acceptedAnswer": {
					"@type": "Answer",
					"text": "Az ár számos tényezőtől függ, beleértve a tető méretét és dőlésszögét, a kiválasztott cserepeslemez anyagát és típusát, valamint az anyagköltségeket. Ezenkívül az előkészítési munkák, például a régi tető eltávolítása és a szükséges javítások is befolyásolják az árat. Általánosságban elmondható, hogy a cserepeslemez felrakása esetenként ugyan drágább mint a hagyomásnyos zsindelytetőké, de hosszú távon a tartósság és az alacsonyabb karbantartási költségek miatt értékes befektetés lehet."
				  }
				}
				
			]
			}
		</script>
		
    </head>
    <body>
        <!--Preloader-->

        <!--Preloader-end -->
        <!-- Scroll-top -->
        <button class="scroll__top scroll-to-target" data-target="html">
        <i class="renova-up-arrow"></i>
        </button>
        <!-- Scroll-top-end-->
        <!-- header-area -->
		<!-- Modal for colors 92251e -->
		<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" data-bs-backdrop="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="successModalLabel">Köszönjük!</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						Köszönjük bizalmát! Kollégánk hamarosan felkeresi Önt a megadott elérhetőségén!
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>
					</div>
				</div>
			</div>
		</div>
	
		<div class="modal" id="offer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
			<div class="modal-dialog modal-xl modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel" style="text-transform:uppercase">Ingyenes árajánlatkérés</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						 <p>
							Kérem adja meg az alábbi adatokat ahhoz, hogy elkészíthessünk ingyenes árajánlatát.
							<hr />
						</p>
						
						<form method="post" action="#">
							<div class="row">
								<div class="form-group col-md-4">
									<label for="name">Adja meg nevét</label>
									<input type="text" class="form-control form-control-lg" id="name" name="name" required>
								</div>
								<div class="form-group col-md-4">
									<label for="phone">Adja meg telefonszámát</label>
									<input type="text" class="form-control form-control-lg" id="phone" name="phone" required>
								</div>
								<div class="form-group col-md-4">
									<label for="phone">Adja meg email címét</label>
									<input type="email" class="form-control form-control-lg" id="email" name="email" required>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="address">Adja meg pontos címét (Irányítószám, település neve, stb.)</label>
									<input type="text" class="form-control form-control-lg" id="address" name="address" minlength="20" required>
									
									
								</div>
								<div class="form-group col-md-6">
									<label for="address">Szolgáltatás</label>
									<select class="form-select form-select-lg mb-3" aria-label="Large select example" id="service" name="service" required>
									  <option selected>Válasszon!</option>
									  <option value="cserepeslemezes tetőfedés">Cserepeslemezes tetőfedés</option>
									  <option value="tetőfelújítás cserepeslemezzel">Tetőfelújítás cserepeslemezzel</option>
									  <option value="egyéb">Egyéb</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="message">Írja le miben lehetünk segítségére</label>
								<textarea class="form-control form-control-lg" id="message" name="message" rows="3" required></textarea>
							</div>
							<br />
							<button type="submit" id="offer" name="offer" class="btn btn-primary" style="min-width:100%">Árajánlatkérés elküldése</button>
							
						</form>
						
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal" id="call" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ingyenes visszahívás kérése</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>
							Kérem adja meg az alábbi adatokat ahhoz, hogy visszahívhassuk.
							<hr />
						</p>
						<form method="post" action="#">
							<div class="row">
								<div class="form-group col-md-6">
									<label for="name">Adja meg nevét</label>
									<input type="text" class="form-control form-control-lg" id="name" name="name" required>
								</div>
								<div class="form-group col-md-6">
									<label for="phone">Adja meg telefonszámát</label>
									<input type="text" class="form-control form-control-lg" id="phone" name="phone" required>
								</div>
							</div>
							<br />
							<button type="submit" id="call" name="call" class="btn btn-primary" style="min-width:100%">Kérés elküldése</button>
						</form>
					</div>
					
				</div>
			</div>
		</div>


        <header>
            <div class="tg-header__top">
                <div class="container custom-container">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="tg-header__top-menu">
                                <ul class="list-wrap">
                                    <li><a data-bs-toggle="modal" data-bs-target="#offer">Árajánlatkérés</a></li>
                                    <li><a data-bs-toggle="modal" data-bs-target="#call">Kérjen visszahívás</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="tg-header__top-delivery">
                                <p>Gyors válasz minden árajánlatkérésre</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="tg-header__top-social">
                                <ul class="list-wrap">
                                    <li><a href="<?php echo $server;?>szolgaltatasok/cserepeslemezes-tetofedes/" target="_blank">Cserepeslemezes tetőfedés</a></li>
                                    <li><a href="<?php echo $server;?>szolgaltatasok/tetofelujitas-cserepeslemezzel/" target="_blank">Tetőfelújítás cserepeslemezzel</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="header-fixed-height"></div>
            <div id="sticky-header" class="tg-header__area">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="tgmenu__wrap">
                                <nav class="tgmenu__nav">
                                    <div class="offCanvas-toggle">
                                        <a href="javascript:void(0)" class="menu-tigger">
                                        <img src="<?php echo $server;?>assets/img/icons/bar_icon.svg" alt="<?php echo $alt;?>" >
                                        </a>
                                    </div>
                                    <div class="logo">
                                        <a href="<?php echo $server;?>"><img src="<?php echo $server;?>images/logo.png" alt="<?php echo $alt;?>"></a>
                                    </div>
                                    <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                        <ul class="navigation">
                                            <li class="active menu-item">
                                                <a href="<?php echo $server;?>">Kezdőoldal</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="<?php echo $server;?>szolgaltatasok/">Szolgáltatások</a>
                                                <ul class="sub-menu">
                                                    <li><a href="<?php echo $server;?>szolgaltatasok/cserepeslemezes-tetofedes/">Cserepeslemezes tetőfedés</a></li>
                                                    <li><a href="<?php echo $server;?>szolgaltatasok/tetofelujitas-cserepeslemezzel/">Tetőfelújítás cserepeslemezzel</a></li>
                                                    <li><a href="<?php echo $server;?>szolgaltatasok/lemezteto-keszites/">Lemeztető készítés</a></li>
													<li><a href="<?php echo $server;?>szolgaltatasok/lemezteto-felrakasa/">Lemeztető felrakása</a></li>
                                                    <li><a href="<?php echo $server;?>szolgaltatasok/korcolt-lemezes-tetofedes/">Korcolt lemezes tetőfedés</a></li>
                                                    <li><a href="<?php echo $server;?>szolgaltatasok/trapezlemezes-tetofedes/">Trapézlemezes tetőfedés</a></li>
                                                </ul>
                                            </li>
                                            
                                            <li class="menu-item">
                                                <a href="<?php echo $server;?>#works">Munkáink</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="<?php echo $server;?>blog-bejegyzesek/">Blog</a>
                                            </li>
											<li class="menu-item">
                                                <a href="<?php echo $server;?>kapcsolat/">Kapcsolat</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tgmenu__action">
                                        <ul class="list-wrap">
                                            <li class="header-btn">
                                                <a data-bs-toggle="modal" data-bs-target="#offer" class="btn border-btn">Árajánlatkérés</a>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                    <div class="mobile-nav-toggler"><i class="tg-flaticon-menu-1"></i></div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu  -->
            <div class="tgmobile__menu">
                <nav class="tgmobile__menu-box">
                    <div class="close-btn"><i class="tg-flaticon-close-1"></i></div>
                    <div class="nav-logo">
                        <a href="<?php echo $server;?>"><img src="<?php echo $server;?>images/logo.png" alt="<?php echo $alt;?>"></a>
                    </div>
                   
                    <div class="tgmobile__menu-outer">
                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                    </div>
                </nav>
            </div>
            <div class="tgmobile__menu-backdrop"></div>
            <!-- End Mobile Menu -->
           
            <div class="search-popup-overlay"></div>
            <!-- header-search-end -->
            <!-- offCanvas-menu -->
            <div class="offCanvas__info">
                <div class="offCanvas__close-icon menu-close">
                    <button><i class="far fa-window-close"></i></button>
                </div>
                <div class="offCanvas__logo mb-30">
                    <a href="<?php echo $server;?>"><img src="<?php echo $server;?>images/logo.png" alt="<?php echo $alt;?>"></a>
                </div>
                <div class="offCanvas__side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Címünk</h4>
                        <p><?php echo $address;?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Telefonszámunk</h4>
                        <p><a href="tel:<?php echo $telefon;?>"><?php echo $telefon;?></a></p>
                        
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email címünk</h4>
                        <p><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></p>
                    </div>
                </div>
            </div>
            <div class="offCanvas__overly"></div>
            <!-- offCanvas-menu-end -->
        </header>
        <!-- header-area-end -->
        <!-- main-area -->
		
		
        <main class="main-area fix">
            <!-- breadcrumb-area -->
			<div class="breadcrumb__area breadcrumb__bg" data-background="<?php echo $server;?>images/services.jpg">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="breadcrumb__content">
								<?php 
									if (EMPTY($_GET['service_id']) && EMPTY($_GET['service_name']) && EMPTY($_GET['service_city'])){
								?>
								<h1 class="title"><?php echo $title;?></h1>
								<?php
									}
									if (ISSET($_GET['service_id'])){
								?>
								<h2 class="title"><?php echo $title;?></h2>
								
								<?php } ?>
								<nav class="breadcrumb">
									<span property="itemListElement" typeof="ListItem">
										<a href="<?php echo $server;?>">Kezdőoldal</a>
									</span>
									<span class="breadcrumb-separator">/</span>
									<span property="itemListElement" typeof="ListItem">Szolgáltatások</span>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- breadcrumb-area-end -->
			
			<?php 
				//szolgáltatás sima
				if (EMPTY($_GET['service_id']) && EMPTY($_GET['service_name']) && EMPTY($_GET['service_city'])){
			?>
			
			<!-- office-area -->
			<section class="office__area">
				<div class="container">
					<div class="row gutter-24 justify-content-center">
						<div class="col-lg-4 col-md-6">
						
								<div class="office__item">
									<h3 class="title">Cserepeslemezes tetőfedés</h3>
									<p>
										A cserepeslemezes tetőfedés szolgáltatásunk tartós és esztétikus megoldást kínál az épületek számára. Klasszikus stílusa és praktikus jellege révén ideális választás mindenféle épület tetőfedéséhez.
									</p>
									<span>
										<div class="container mt-5">
											<div class="accordion" id="accordionExample">
												<div class="accordion-item">
													<h2 class="accordion-header" id="headingOne">
														<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
														Cserepeslemezes tetőfedés országosan
														</button>
													</h2>
													<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
														<div class="accordion-body">
															<p>Örömmel tájékoztatunk minden meglévő és új ügyfelünket, hogy valamennyi szolgáltatásunkat mostmár országosan is igénybe veheti. Válassza ki a megyét és a települést, ahol igénybe szeretné venni a szolgáltatásunkat és kérjen ingyenes árajánlatot.</p>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<h2 class="accordion-header" id="nestedHeadingOne">
														<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapseOne" aria-expanded="false" aria-controls="nestedCollapseOne">
														Válassza ki melyik megyéből van?
														</button>
													</h2>
													<div id="nestedCollapseOne" class="accordion-collapse collapse" aria-labelledby="nestedHeadingOne" data-bs-parent="#accordionExample">
														<div class="accordion-body">
															<div class="accordion mt-3" id="nestedAccordionOne">
															<?php 
																$get_all_megye = get_all_megye();
																foreach($get_all_megye as $megye) {
																	$rnd = rand(10, 99);
															?>
																<div class="accordion-item">
																	<h2 class="accordion-header" id="nestedHeading_<?php echo $rnd;?>">
																		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapse_<?php echo $rnd;?>" aria-expanded="false" aria-controls="nestedCollapseTwo">
																			Cserepeslemezes tetőfedés <?php echo $megye['megye']?>-megye
																		</button>
																	</h2>
																	<div id="nestedCollapse_<?php echo $rnd;?>" class="accordion-collapse collapse" aria-labelledby="nestedHeading_<?php echo $rnd;?>" data-bs-parent="#nestedAccordionOne">
																		<div class="accordion-body">
																			<ul class="list-wrap">
																				<?php 
																					$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
																					$cities_count = count($get_all_city_by_megye);
																					$cities_per_column = ceil($cities_count / 2);
																					$city_counter = 0;
																					
																					// Első oszlop
																					echo '<div class="row">';
																					foreach($get_all_city_by_megye as $city) {
																						if ($city_counter == $cities_per_column) {
																							echo '</div><div class="col-lg-12"><div class="row">';
																						}
																				?>
																					<div class="col-lg-12">
																						<div class="tp-service-details-point d-flex align-items-center">
																							<ul class="list-wrap">
																								<li><i class="far fa-check-circle"></i>
																									<a href="<?php echo $server?>szolgaltatasok/cserepeslemezes-tetofedes/<?php echo replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos']);?>/">
																										Cserepeslemezes tetőfedés <?php echo $city['varos'];?> településen
																									</a>
																								</li>
																							</ul>
																						</div>
																					</div>
																				<?php 
																						$city_counter++;
																					}
																					echo '</div></div>'; // Utolsó oszlop lezárása
																				?>
																			</ul>
																		</div>
																		<!-- városok -->
																	</div>
																</div>
															<?php } ?>
															</div>
														</div>
														<!-- megyek -->
													</div>
												</div>
											</div>
										</div>
									</span>
									<a href="<?php echo $server?>szolgaltatasok/cserepeslemezes-tetofedes/" class="btn" style="min-width:100%">Ugrás a szolgáltatáshoz <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
								</div>
								
							</div>
							
							<div class="col-lg-4 col-md-6">
								<div class="office__item">
									<h3 class="title">Tetőfelújítás cserepeslemezzel</h3>
									<p>
										A tetőfelújítás cserepeslemezzel szolgáltatásunk tartós és esztétikus megoldást nyújt az épületek számára. Klasszikus stílusa és praktikus jellege révén ideális választás mindenféle tetőfedéshez.
									</p>
									<span>
										<div class="container mt-5">
											<div class="accordion" id="accordionExample2">
												<div class="accordion-item">
													<h2 class="accordion-header" id="headingOne">
														<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
														Tetőfelújítás cserepeslemezzel országosan
														</button>
													</h2>
													<div id="collapseOne2" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample2">
														<div class="accordion-body">
															<p>Örömmel tájékoztatunk minden meglévő és új ügyfelünket, hogy valamennyi szolgáltatásunkat mostmár országosan is igénybe veheti. Válassza ki a megyét és a települést, ahol igénybe szeretné venni a szolgáltatásunkat és kérjen ingyenes árajánlatot.</p>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<h2 class="accordion-header" id="nestedHeadingOne2">
														<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapseOne2" aria-expanded="false" aria-controls="nestedCollapseOne2">
														Válassza ki melyik megyéből van?
														</button>
													</h2>
													<div id="nestedCollapseOne2" class="accordion-collapse collapse" aria-labelledby="nestedHeadingOne2" data-bs-parent="#accordionExample2">
														<div class="accordion-body">
															<div class="accordion mt-3" id="nestedAccordionOne">
															<?php 
																$get_all_megye = get_all_megye();
																foreach($get_all_megye as $megye) {
																	$rnd = rand(10, 99);
															?>
																<div class="accordion-item">
																	<h2 class="accordion-header" id="nestedHeading_<?php echo $rnd;?>">
																		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapse_<?php echo $rnd;?>" aria-expanded="false" aria-controls="nestedCollapseTwo">
																			Tetőfelújítás cserepeslemezzel <?php echo $megye['megye']?>-megye
																		</button>
																	</h2>
																	<div id="nestedCollapse_<?php echo $rnd;?>" class="accordion-collapse collapse" aria-labelledby="nestedHeading_<?php echo $rnd;?>" data-bs-parent="#nestedAccordionOne">
																		<div class="accordion-body">
																			<ul class="list-wrap">
																				<?php 
																					$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
																					$cities_count = count($get_all_city_by_megye);
																					$cities_per_column = ceil($cities_count / 2);
																					$city_counter = 0;
																					
																					// Első oszlop
																					echo '<div class="row">';
																					foreach($get_all_city_by_megye as $city) {
																						if ($city_counter == $cities_per_column) {
																							echo '</div><div class="col-lg-12"><div class="row">';
																						}
																				?>
																					<div class="col-lg-12">
																						<div class="tp-service-details-point d-flex align-items-center">
																							<ul class="list-wrap">
																								<li><i class="far fa-check-circle"></i>
																									<a href="<?php echo $server?>szolgaltatasok/tetofelujitas-cserepeslemezzel/<?php echo replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos']);?>/">
																										Tetőfelújítás cserepeslemezzel <?php echo $city['varos'];?> településen
																									</a>
																								</li>
																							</ul>
																						</div>
																					</div>
																				<?php 
																						$city_counter++;
																					}
																					echo '</div></div>'; // Utolsó oszlop lezárása
																				?>
																			</ul>
																		</div>
																		<!-- városok -->
																	</div>
																</div>
															<?php } ?>
															</div>
														</div>
														<!-- megyek -->
													</div>
												</div>
											</div>
										</div>
									</span>
									<a href="<?php echo $server?>szolgaltatasok/tetofelujitas-cserepeslemezzel/" class="btn" style="min-width:100%">Ugrás a szolgáltatáshoz <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
								</div>
							</div>
							
							<div class="col-lg-4 col-md-6">
								<div class="office__item">
									<h3 class="title">Lemeztető készítés</h3>
									<p>
										Lemeztető készítés szolgáltatásunkat képzett, profi munkatársaink végzik el a legmodernebb technikákat és eszközöket alkalmazva, biztosítva a ügyfeleink elégedettségét.
									</p>
									<span>
										<div class="container mt-5">
											<div class="accordion" id="accordionExample3">
												<div class="accordion-item">
													<h2 class="accordion-header" id="headingOne2">
														<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3">
														Lemeztető készítés országosan<br /><br />
														</button>
													</h2>
													<div id="collapseOne3" class="accordion-collapse collapse show" aria-labelledby="headingOne2" data-bs-parent="#accordionExample3">
														<div class="accordion-body">
															<p>Örömmel tájékoztatunk minden meglévő és új ügyfelünket, hogy valamennyi szolgáltatásunkat mostmár országosan is igénybe veheti. Válassza ki a megyét és a települést, ahol igénybe szeretné venni a szolgáltatásunkat és kérjen ingyenes árajánlatot.</p>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<h2 class="accordion-header" id="nestedHeadingOne3">
														<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapseOne3" aria-expanded="false" aria-controls="nestedCollapseOne3">
														Válassza ki melyik megyéből van?
														</button>
													</h2>
													<div id="nestedCollapseOne3" class="accordion-collapse collapse" aria-labelledby="nestedHeadingOne3" data-bs-parent="#accordionExample3">
														<div class="accordion-body">
															<div class="accordion mt-3" id="nestedAccordionOne">
															<?php 
																$get_all_megye = get_all_megye();
																foreach($get_all_megye as $megye) {
																	$rnd = rand(10, 99);
															?>
																<div class="accordion-item">
																	<h2 class="accordion-header" id="nestedHeading_<?php echo $rnd;?>">
																		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapse_<?php echo $rnd;?>" aria-expanded="false" aria-controls="nestedCollapseTwo">
																			Lemeztető készítés <?php echo $megye['megye']?>-megye
																		</button>
																	</h2>
																	<div id="nestedCollapse_<?php echo $rnd;?>" class="accordion-collapse collapse" aria-labelledby="nestedHeading_<?php echo $rnd;?>" data-bs-parent="#nestedAccordionOne">
																		<div class="accordion-body">
																			<ul class="list-wrap">
																				<?php 
																					$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
																					$cities_count = count($get_all_city_by_megye);
																					$cities_per_column = ceil($cities_count / 2);
																					$city_counter = 0;
																					
																					// Első oszlop
																					echo '<div class="row">';
																					foreach($get_all_city_by_megye as $city) {
																						if ($city_counter == $cities_per_column) {
																							echo '</div><div class="col-lg-12"><div class="row">';
																						}
																				?>
																					<div class="col-lg-12">
																						<div class="tp-service-details-point d-flex align-items-center">
																							<ul class="list-wrap">
																								<li><i class="far fa-check-circle"></i>
																									<a href="<?php echo $server?>szolgaltatasok/lemezteto-keszites/<?php echo replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos']);?>/">
																										Lemeztető készítés <?php echo $city['varos'];?> településen
																									</a>
																								</li>
																							</ul>
																						</div>
																					</div>
																				<?php 
																						$city_counter++;
																					}
																					echo '</div></div>'; // Utolsó oszlop lezárása
																				?>
																			</ul>
																		</div>
																		<!-- városok -->
																	</div>
																</div>
															<?php } ?>
															</div>
														</div>
														<!-- megyek -->
													</div>
												</div>
											</div>
										</div>
									</span>
									<a href="<?php echo $server?>szolgaltatasok/lemezteto-keszites/" class="btn" style="min-width:100%">Ugrás a szolgáltatáshoz <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
								</div>
							</div>
							
							<div class="col-lg-4 col-md-6">
								<div class="office__item">
									<h3 class="title">Lemeztető felrakása</h3>
									<p>
										Lemeztető felrakása szolgáltatásunkat képzett, profi munkatársaink végzik el a legmodernebb technikákat és eszközöket alkalmazva, biztosítva a ügyfeleink elégedettségét.
									</p>
									<span>
										<div class="container mt-5">
											<div class="accordion" id="accordionExample4">
												<div class="accordion-item">
													<h2 class="accordion-header" id="headingOne4">
														<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne4" aria-expanded="true" aria-controls="collapseOne4">
														Lemeztető felrakása országosan<br /><br />
														</button>
													</h2>
													<div id="collapseOne4" class="accordion-collapse collapse show" aria-labelledby="headingOne4" data-bs-parent="#accordionExample4">
														<div class="accordion-body">
															<p>Örömmel tájékoztatunk minden meglévő és új ügyfelünket, hogy valamennyi szolgáltatásunkat mostmár országosan is igénybe veheti. Válassza ki a megyét és a települést, ahol igénybe szeretné venni a szolgáltatásunkat és kérjen ingyenes árajánlatot.</p>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<h2 class="accordion-header" id="nestedHeadingOne4">
														<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapseOne4" aria-expanded="false" aria-controls="nestedCollapseOne4">
														Válassza ki melyik megyéből van?
														</button>
													</h2>
													<div id="nestedCollapseOne4" class="accordion-collapse collapse" aria-labelledby="nestedHeadingOne4" data-bs-parent="#accordionExample4">
														<div class="accordion-body">
															<div class="accordion mt-3" id="nestedAccordionr">
															<?php 
																$get_all_megye = get_all_megye();
																foreach($get_all_megye as $megye) {
																	$rnd = rand(10, 99);
															?>
																<div class="accordion-item">
																	<h2 class="accordion-header" id="nestedHeading_<?php echo $rnd;?>">
																		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapse_<?php echo $rnd;?>" aria-expanded="false" aria-controls="nestedCollapseTwo">
																			Lemeztető felrakása <?php echo $megye['megye']?>-megye
																		</button>
																	</h2>
																	<div id="nestedCollapse_<?php echo $rnd;?>" class="accordion-collapse collapse" aria-labelledby="nestedHeading_<?php echo $rnd;?>" data-bs-parent="#nestedAccordionr">
																		<div class="accordion-body">
																			<ul class="list-wrap">
																				<?php 
																					$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
																					$cities_count = count($get_all_city_by_megye);
																					$cities_per_column = ceil($cities_count / 2);
																					$city_counter = 0;
																					
																					// Első oszlop
																					echo '<div class="row">';
																					foreach($get_all_city_by_megye as $city) {
																						if ($city_counter == $cities_per_column) {
																							echo '</div><div class="col-lg-12"><div class="row">';
																						}
																				?>
																					<div class="col-lg-12">
																						<div class="tp-service-details-point d-flex align-items-center">
																							<ul class="list-wrap">
																								<li><i class="far fa-check-circle"></i>
																									<a href="<?php echo $server?>szolgaltatasok/lemezteto-felrakasa/<?php echo replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos']);?>/">
																										Lemeztető felrakása <?php echo $city['varos'];?> településen
																									</a>
																								</li>
																							</ul>
																						</div>
																					</div>
																				<?php 
																						$city_counter++;
																					}
																					echo '</div></div>'; // Utolsó oszlop lezárása
																				?>
																			</ul>
																		</div>
																		<!-- városok -->
																	</div>
																</div>
															<?php } ?>
															</div>
														</div>
														<!-- megyek -->
													</div>
												</div>
											</div>
										</div>
									</span>
									<a href="<?php echo $server?>szolgaltatasok/lemezteto-felrakasa/" class="btn" style="min-width:100%">Ugrás a szolgáltatáshoz <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
								</div>
							</div>
							
							<div class="col-lg-4 col-md-6">
								<div class="office__item">
									<h3 class="title">Korcolt lemezes tetőfedés</h3>
									<p>
										Korcolt lemezes tetőfedésünk időtlen eleganciával és megbízhatósággal szolgálja az épületek védelmét és esztétikáját, biztosítva a hosszú távú minőséget és tartósságot.
									</p>
									<span>
										<div class="container mt-5">
											<div class="accordion" id="accordionExample5">
												<div class="accordion-item">
													<h2 class="accordion-header" id="headingOne5">
														<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne5" aria-expanded="true" aria-controls="collapseOne5">
														Korcolt lemezes tetőfedés országosan<br /><br />
														</button>
													</h2>
													<div id="collapseOne5" class="accordion-collapse collapse show" aria-labelledby="headingOne5" data-bs-parent="#accordionExample5">
														<div class="accordion-body">
															<p>Örömmel tájékoztatunk minden meglévő és új ügyfelünket, hogy valamennyi szolgáltatásunkat mostmár országosan is igénybe veheti. Válassza ki a megyét és a települést, ahol igénybe szeretné venni a szolgáltatásunkat és kérjen ingyenes árajánlatot.</p>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<h2 class="accordion-header" id="nestedHeadingOne5">
														<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapseOne5" aria-expanded="false" aria-controls="nestedCollapseOne5">
														Válassza ki melyik megyéből van?
														</button>
													</h2>
													<div id="nestedCollapseOne5" class="accordion-collapse collapse" aria-labelledby="nestedHeadingOne5" data-bs-parent="#accordionExample5">
														<div class="accordion-body">
															<div class="accordion mt-3" id="nestedAccordionr">
															<?php 
																$get_all_megye = get_all_megye();
																foreach($get_all_megye as $megye) {
																	$rnd = rand(10, 99);
															?>
																<div class="accordion-item">
																	<h2 class="accordion-header" id="nestedHeading_<?php echo $rnd;?>">
																		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapse_<?php echo $rnd;?>" aria-expanded="false" aria-controls="nestedCollapseTwo">
																			Korcolt lemezes tetőfedés <?php echo $megye['megye']?>-megye
																		</button>
																	</h2>
																	<div id="nestedCollapse_<?php echo $rnd;?>" class="accordion-collapse collapse" aria-labelledby="nestedHeading_<?php echo $rnd;?>" data-bs-parent="#nestedAccordionr">
																		<div class="accordion-body">
																			<ul class="list-wrap">
																				<?php 
																					$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
																					$cities_count = count($get_all_city_by_megye);
																					$cities_per_column = ceil($cities_count / 2);
																					$city_counter = 0;
																					
																					// Első oszlop
																					echo '<div class="row">';
																					foreach($get_all_city_by_megye as $city) {
																						if ($city_counter == $cities_per_column) {
																							echo '</div><div class="col-lg-12"><div class="row">';
																						}
																				?>
																					<div class="col-lg-12">
																						<div class="tp-service-details-point d-flex align-items-center">
																							<ul class="list-wrap">
																								<li><i class="far fa-check-circle"></i>
																									<a href="<?php echo $server?>szolgaltatasok/korcolt-lemezes-tetofedes/<?php echo replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos']);?>/">
																										Korcolt lemezes tetőfedés <?php echo $city['varos'];?> településen
																									</a>
																								</li>
																							</ul>
																						</div>
																					</div>
																				<?php 
																						$city_counter++;
																					}
																					echo '</div></div>'; // Utolsó oszlop lezárása
																				?>
																			</ul>
																		</div>
																		<!-- városok -->
																	</div>
																</div>
															<?php } ?>
															</div>
														</div>
														<!-- megyek -->
													</div>
												</div>
											</div>
										</div>
									</span>
									<a href="<?php echo $server?>szolgaltatasok/korcolt-lemezes-tetofedes/" class="btn" style="min-width:100%">Ugrás a szolgáltatáshoz <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
								</div>
							</div>
							
							<div class="col-lg-4 col-md-6">
								<div class="office__item">
									<h3 class="title">Trapézlemezes tetőfedés</h3>
									<p>
										A trapézlemezes tetőfedés könnyű, mégis erős megoldás, amely hatékony védelmet nyújt az időjárás viszontagságaival szemben. Rugalmas kialakítása sokféle tervezési lehetőséget kínál.
									</p>
									<span>
										<div class="container mt-5">
											<div class="accordion" id="accordionExample6">
												<div class="accordion-item">
													<h2 class="accordion-header" id="headingOne5">
														<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne6" aria-expanded="true" aria-controls="collapseOne6">
														Trapézlemezes tetőfedés országosan<br /><br />
														</button>
													</h2>
													<div id="collapseOne6" class="accordion-collapse collapse show" aria-labelledby="headingOne5" data-bs-parent="#accordionExample6">
														<div class="accordion-body">
															<p>Örömmel tájékoztatunk minden meglévő és új ügyfelünket, hogy valamennyi szolgáltatásunkat mostmár országosan is igénybe veheti. Válassza ki a megyét és a települést, ahol igénybe szeretné venni a szolgáltatásunkat és kérjen ingyenes árajánlatot.</p>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<h2 class="accordion-header" id="nestedHeadingOne6">
														<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapseOne6" aria-expanded="false" aria-controls="nestedCollapseOne6">
														Válassza ki melyik megyéből van?
														</button>
													</h2>
													<div id="nestedCollapseOne6" class="accordion-collapse collapse" aria-labelledby="nestedHeadingOne6" data-bs-parent="#accordionExample6">
														<div class="accordion-body">
															<div class="accordion mt-3" id="nestedAccordionr">
															<?php 
																$get_all_megye = get_all_megye();
																foreach($get_all_megye as $megye) {
																	$rnd = rand(10, 99);
															?>
																<div class="accordion-item">
																	<h2 class="accordion-header" id="nestedHeading_<?php echo $rnd;?>">
																		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapse_<?php echo $rnd;?>" aria-expanded="false" aria-controls="nestedCollapseTwo">
																			Trapézlemezes tetőfedés <?php echo $megye['megye']?>-megye
																		</button>
																	</h2>
																	<div id="nestedCollapse_<?php echo $rnd;?>" class="accordion-collapse collapse" aria-labelledby="nestedHeading_<?php echo $rnd;?>" data-bs-parent="#nestedAccordionr">
																		<div class="accordion-body">
																			<ul class="list-wrap">
																				<?php 
																					$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
																					$cities_count = count($get_all_city_by_megye);
																					$cities_per_column = ceil($cities_count / 2);
																					$city_counter = 0;
																					
																					// Első oszlop
																					echo '<div class="row">';
																					foreach($get_all_city_by_megye as $city) {
																						if ($city_counter == $cities_per_column) {
																							echo '</div><div class="col-lg-12"><div class="row">';
																						}
																				?>
																					<div class="col-lg-12">
																						<div class="tp-service-details-point d-flex align-items-center">
																							<ul class="list-wrap">
																								<li><i class="far fa-check-circle"></i>
																									<a href="<?php echo $server?>szolgaltatasok/trapezlemezes-tetofedes/<?php echo replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos']);?>/">
																										Trapézlemezes tetőfedés <?php echo $city['varos'];?> településen
																									</a>
																								</li>
																							</ul>
																						</div>
																					</div>
																				<?php 
																						$city_counter++;
																					}
																					echo '</div></div>'; // Utolsó oszlop lezárása
																				?>
																			</ul>
																		</div>
																		<!-- városok -->
																	</div>
																</div>
															<?php } ?>
															</div>
														</div>
														<!-- megyek -->
													</div>
												</div>
											</div>
										</div>
									</span>
									<a href="<?php echo $server?>szolgaltatasok/trapezlemezes-tetofedes/" class="btn" style="min-width:100%">Ugrás a szolgáltatáshoz <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
								</div>
							</div>
							
						</div>
						
					</div>
				</div>
			</section>
			<!-- office-area-end -->
			<?php 
				} 
				if (ISSET($_GET['service_id'])){
					
			?>
			
			<?php 
				if ($_GET['service_id']=='cserepeslemezes-tetofedes'){
			?>
				<!-- project-details-area -->
				<section class="project__details-area section-py-120">
					<div class="container">
						<div class="row gutter-24 justify-content-center">
							<div class="col-xl-7 col-lg-6 col-md-8">
								<div class="services__thumb-three">
									<img src="<?php echo $server;?>images/cs01.jpg" alt="<?php echo $alt;?>" class="wow img-custom-anim-left  animated" data-wow-duration="1.5s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: img-anim-left;">
								</div>
								<div class="row">
									<div class="col-lg-9">
								
										<div class="office__item">
											<h3 class="title">Cserepeslemezes tetőfedés  <?php if (!EMPTY($megye['megye'])){ echo 'nem csak '.$megye['megye'].' megyében';}else{ echo 'országosan';}?></h3>
											<p>
												A cserepeslemezes tetőfedés szolgáltatásunk tartós és esztétikus megoldást kínál az épületek számára. Klasszikus stílusa és praktikus jellege révén ideális választás mindenféle épület tetőfedéséhez.
											</p>
											<span>
												<div class="container mt-5">
													<div class="accordion" id="accordionExample">
														<div class="accordion-item">
															<h2 class="accordion-header" id="headingOne">
																<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
																Cserepeslemezes tetőfedés országosan
																</button>
															</h2>
															<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
																<div class="accordion-body">
																	<p>Örömmel tájékoztatunk minden meglévő és új ügyfelünket, hogy valamennyi szolgáltatásunkat mostmár országosan is igénybe veheti. Válassza ki a megyét és a települést, ahol igénybe szeretné venni a szolgáltatásunkat és kérjen ingyenes árajánlatot.</p>
																</div>
															</div>
														</div>
														<div class="accordion-item">
															<h2 class="accordion-header" id="nestedHeadingOne">
																<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapseOne" aria-expanded="false" aria-controls="nestedCollapseOne">
																Válassza ki melyik megyéből van?
																</button>
															</h2>
															<div id="nestedCollapseOne" class="accordion-collapse collapse" aria-labelledby="nestedHeadingOne" data-bs-parent="#accordionExample">
																<div class="accordion-body">
																	<div class="accordion mt-3" id="nestedAccordionOne">
																	<?php 
																		$get_all_megye = get_all_megye();
																		foreach($get_all_megye as $megye) {
																			$rnd = rand(10, 99);
																	?>
																		<div class="accordion-item">
																			<h2 class="accordion-header" id="nestedHeading_<?php echo $rnd;?>">
																				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapse_<?php echo $rnd;?>" aria-expanded="false" aria-controls="nestedCollapseTwo">
																					Cserepeslemezes tetőfedés <?php echo $megye['megye']?>-megye
																				</button>
																			</h2>
																			<div id="nestedCollapse_<?php echo $rnd;?>" class="accordion-collapse collapse" aria-labelledby="nestedHeading_<?php echo $rnd;?>" data-bs-parent="#nestedAccordionOne">
																				<div class="accordion-body">
																					<ul class="list-wrap">
																						<?php 
																							$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
																							$cities_count = count($get_all_city_by_megye);
																							$cities_per_column = ceil($cities_count / 2);
																							$city_counter = 0;
																							
																							// Első oszlop
																							echo '<div class="row">';
																							foreach($get_all_city_by_megye as $city) {
																								if ($city_counter == $cities_per_column) {
																									echo '</div><div class="col-lg-12"><div class="row">';
																								}
																						?>
																							<div class="col-lg-12">
																								<div class="tp-service-details-point d-flex align-items-center">
																									<ul class="list-wrap">
																										<li><i class="far fa-check-circle"></i>
																											<a href="<?php echo $server?>szolgaltatasok/cserepeslemezes-tetofedes/<?php echo replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos']);?>/">
																												Cserepeslemezes tetőfedés <?php echo $city['varos'];?> településen
																											</a>
																										</li>
																									</ul>
																								</div>
																							</div>
																						<?php 
																								$city_counter++;
																							}
																							echo '</div></div>'; // Utolsó oszlop lezárása
																						?>
																					</ul>
																				</div>
																				<!-- városok -->
																			</div>
																		</div>
																	<?php } ?>
																	</div>
																</div>
																<!-- megyek -->
															</div>
														</div>
													</div>
												</div>
											</span>
											<a href="<?php echo $server?>szolgaltatasok/cserepeslemezes-tetofedes/" class="btn" style="min-width:100%">Ugrás a szolgáltatáshoz <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-xl-5 col-lg-6">
								<div class="services__content-three">
									<h1 class="title"><?php echo $title;?></h1>
									<p>
										Alig van más házrész, amely annyira ki lenne téve az időjárásnak és külső hatásoknak, mint a tető. A tetőfedő anyagok különböző változatai léteznek: agyagból, fémekből, 
										rostcementből vagy bitumenből. Ezek túlnyomó többsége évtizedekig kell, hogy megbízhatóan védje a tetőt a szél és az időjárás viszontagságai ellen. 
										Cserepeslemezes tetőfedéssel azonban nem csupán időjárásálló megoldást kínálunk. A cserepeslemezes tetőfedéssel esztétikus, fenntartható és garantáltan tartós 
										hosszú élettartamű megoldást kaphat. Cserepeslemezes tetőfedés szolgáltatásunk az ország egész területén igénybevehető, így bárhol is legyen otthona, számíthat 
										ránk a tetőszerkezet megújításában. Több mint 20 éves tapasztalattal rendelkezünk a cserepeslemezes tetőfedés területén, így biztos lehet abban, hogy szakértelmünk 
										és tudásunk garanciát jelent a minőségi munkavégzésre és kivitelezésre. Az ingyenes árajánlatkérés lehetősége minden érdeklődő számára elérhető. Kalkuláljon most, 
										tervezze már most meg tetőszerkezetének felújítási költségeit.
										
										
									</p>
									<div class="shop__list-wrap services__list-wrap">
										<h3>A cserepeslemezes tetőfedés előnyei</h3>
										<ul class="list-wrap">
											<li><i class="far fa-check-circle"></i>Tartósság: A cserepeslemezek hosszú élettartammal rendelkeznek, és ellenállnak az időjárási viszonyoknak, beleértve az esőt, havat, szélt és UV-sugárzást.</li>
											<li><i class="far fa-check-circle"></i>Esztétikai érték: A cserepeslemezek különféle színekben és mintázatokban érhetőek el, lehetővé téve a ház stílusának és környezetének harmonizálását.</li>
											<li><i class="far fa-check-circle"></i>Rugalmasság: Rugalmasan alkalmazkodnak különböző tetőszerkezetekhez és formákhoz, így szinte bármilyen épülettípushoz használhatók.</li>
											<li><i class="far fa-check-circle"></i>Könnyű telepítés: A cserepeslemezek viszonylag könnyűek ezért más tetőfedési anyagokhoz képest egyszerűbben telepíthetők, csökkentve a munkaerő- és időköltséget.</li>
										</ul>
										<p>A cserepeslemezes tetőfedés további előnyei megtekintéséhez kattintson <a href="#cserep_elony">ide</a></p>
									</div>
									<div class="services__item-wrap">
										<div class="row">
											<div class="col-md-6">
												<div class="services__item-four">
													<div class="services__icon-four">
														<i class="renova-unity"></i>
													</div>
													<div class="services__content-four">
														<span>Első lépés</span>
														<h2 class="title">Ingyenes árajánlatkérés</h2>
														<p>Kérjen elköteleződés nélkül ingyenes árajánlatot weboldalunkon keresztül cserepeslemezes tetőfedésre</p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="services__item-four">
													<div class="services__icon-four">
														<i class="renova-idea"></i>
													</div>
													<div class="services__content-four">
														<span>Második lépés</span>
														<h2 class="title">Helyszíni felmérés</h2>
														<p>Telefonos egyeztetést követően kollégánk a helyszíni felmérést követően pontos költségeket számol Önnek</p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="services__item-four">
													<div class="services__icon-four">
														<i class="renova-brick"></i>
													</div>
													<div class="services__content-four">
														<span>Harmadik lépés</span>
														<h2 class="title">Kivitelezés</h2>
														<p>Tapasztalt kollégáink a helyszínen az Ön igényei figyelembevételével elvégzik a cserepeslemezes tetőfedést.</p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="services__item-four">
													<div class="services__icon-four">
														<i class="renova-progress"></i>
													</div>
													<div class="services__content-four">
														<span>Negyedik lépés</span>
														<h2 class="title">A munka átadása</h2>
														<p>A kivitelezést akkor tekintjük befejezettnek, ha az ügyfél az elvégzett munkát átvette és elégedett.</p>
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
				<!-- project-details-area-end -->
			<?php 
				} 
				if ($_GET['service_id']=='tetofelujitas-cserepeslemezzel'){
			?>
			
				<!-- project-details-area -->
				<section class="project__details-area section-py-120">
					<div class="container">
						<div class="row gutter-24 justify-content-center">
							<div class="col-xl-7 col-lg-6 col-md-8">
								<div class="services__thumb-three">
									<img src="<?php echo $server;?>images/cs01.jpg" alt="<?php echo $alt;?>" class="wow img-custom-anim-left  animated" data-wow-duration="1.5s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: img-anim-left;">
								</div>
								<div class="row">
									<div class="col-lg-9">
								
										<div class="office__item">
											<h3 class="title">Tetőfelújítás cserepeslemezzel <?php if (!EMPTY($megye['megye'])){ echo 'nem csak '.$megye['megye'].' megyében';}else{ echo 'országosan';}?></h3>
											<p>
												A tetőfelújítás cserepeslemezzel szolgáltatásunk tartós és esztétikus megoldást nyújt az épületek számára. Klasszikus stílusa és praktikus jellege révén ideális választás mindenféle tetőfedéshez.
											</p>
											<span>
												<div class="container mt-5">
													<div class="accordion" id="accordionExample2">
														<div class="accordion-item">
															<h2 class="accordion-header" id="headingOne">
																<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
																Tetőfelújítás cserepeslemezzel országosan
																</button>
															</h2>
															<div id="collapseOne2" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample2">
																<div class="accordion-body">
																	<p>Örömmel tájékoztatunk minden meglévő és új ügyfelünket, hogy valamennyi szolgáltatásunkat mostmár országosan is igénybe veheti. Válassza ki a megyét és a települést, ahol igénybe szeretné venni a szolgáltatásunkat és kérjen ingyenes árajánlatot.</p>
																</div>
															</div>
														</div>
														<div class="accordion-item">
															<h2 class="accordion-header" id="nestedHeadingOne2">
																<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapseOne2" aria-expanded="false" aria-controls="nestedCollapseOne2">
																Válassza ki melyik megyéből van?
																</button>
															</h2>
															<div id="nestedCollapseOne2" class="accordion-collapse collapse" aria-labelledby="nestedHeadingOne2" data-bs-parent="#accordionExample2">
																<div class="accordion-body">
																	<div class="accordion mt-3" id="nestedAccordionOne">
																	<?php 
																		$get_all_megye = get_all_megye();
																		foreach($get_all_megye as $megye) {
																			$rnd = rand(10, 99);
																	?>
																		<div class="accordion-item">
																			<h2 class="accordion-header" id="nestedHeading_<?php echo $rnd;?>">
																				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapse_<?php echo $rnd;?>" aria-expanded="false" aria-controls="nestedCollapseTwo">
																					Tetőfelújítás cserepeslemezzel <?php echo $megye['megye']?>-megye
																				</button>
																			</h2>
																			<div id="nestedCollapse_<?php echo $rnd;?>" class="accordion-collapse collapse" aria-labelledby="nestedHeading_<?php echo $rnd;?>" data-bs-parent="#nestedAccordionOne">
																				<div class="accordion-body">
																					<ul class="list-wrap">
																						<?php 
																							$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
																							$cities_count = count($get_all_city_by_megye);
																							$cities_per_column = ceil($cities_count / 2);
																							$city_counter = 0;
																							
																							// Első oszlop
																							echo '<div class="row">';
																							foreach($get_all_city_by_megye as $city) {
																								if ($city_counter == $cities_per_column) {
																									echo '</div><div class="col-lg-12"><div class="row">';
																								}
																						?>
																							<div class="col-lg-12">
																								<div class="tp-service-details-point d-flex align-items-center">
																									<ul class="list-wrap">
																										<li><i class="far fa-check-circle"></i>
																											<a href="<?php echo $server?>szolgaltatasok/tetofelujitas-cserepeslemezzel/<?php echo replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos']);?>/">
																												Tetőfelújítás cserepeslemezzel <?php echo $city['varos'];?> településen
																											</a>
																										</li>
																									</ul>
																								</div>
																							</div>
																						<?php 
																								$city_counter++;
																							}
																							echo '</div></div>'; // Utolsó oszlop lezárása
																						?>
																					</ul>
																				</div>
																				<!-- városok -->
																			</div>
																		</div>
																	<?php } ?>
																	</div>
																</div>
																<!-- megyek -->
															</div>
														</div>
													</div>
												</div>
											</span>
											<a href="<?php echo $server?>szolgaltatasok/tetofelujitas-cserepeslemezzel/" class="btn" style="min-width:100%">Ugrás a szolgáltatáshoz <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-xl-5 col-lg-6">
								<div class="services__content-three">
									<h1 class="title"><?php echo $title;?></h1>
									<p>
										Alig van más házrész, amely annyira ki lenne téve az időjárásnak és külső hatásoknak, mint a tető. A tetőfedő anyagok különböző változatai léteznek: agyagból, fémekből, 
										rostcementből vagy bitumenből. Ezek túlnyomó többsége évtizedekig kell, hogy megbízhatóan védje a tetőt a szél és az időjárás viszontagságai ellen. 
										Cserepeslemezes tetőfedéssel azonban nem csupán időjárásálló megoldást kínálunk. A tetőfelújítás cserepeslemezzel nem csak esztétikus, fenntartható és garantáltan tartós 
										hosszú élettartamű megoldást kaphat. A tetőfelújítás cserepeslemezzel szolgáltatásunk az ország egész területén igénybevehető, így bárhol is legyen otthona, számíthat 
										ránk a tetőszerkezet megújításában. Több mint 20 éves tapasztalattal rendelkezünk a tetőfelújítás területén, így biztos lehet abban, hogy szakértelmünk 
										és tudásunk garanciát jelent a minőségi munkavégzésre és kivitelezésre. Az ingyenes árajánlatkérés lehetősége minden érdeklődő számára elérhető. Kalkuláljon most, 
										tervezze már most meg tetőszerkezetének felújítási költségeit.
										
										
									</p>
									<div class="shop__list-wrap services__list-wrap">
										<h3>Milyen előnyei vannak a tetőfelújításnak cserepeslemezzel? </h3>
										<ul class="list-wrap">
											<li><i class="far fa-check-circle"></i>Tartósság: A cserepeslemezek hosszú élettartammal rendelkeznek, és ellenállnak az időjárási viszonyoknak, beleértve az esőt, havat, szélt és UV-sugárzást.</li>
											<li><i class="far fa-check-circle"></i>Esztétikai érték: A cserepeslemezek különféle színekben és mintázatokban érhetőek el, lehetővé téve a ház stílusának és környezetének harmonizálását.</li>
											<li><i class="far fa-check-circle"></i>Rugalmasság: Rugalmasan alkalmazkodnak különböző tetőszerkezetekhez és formákhoz, így szinte bármilyen épülettípushoz használhatók.</li>
											<li><i class="far fa-check-circle"></i>Könnyű telepítés: A cserepeslemezek viszonylag könnyűek ezért más tetőfedési anyagokhoz képest egyszerűbben telepíthetők, csökkentve a munkaerő- és időköltséget.</li>
										</ul>
										<p>A tetőfelújítás cserepeslemezzel szolgáltatás további előnyei megtekintéséhez kattintson <a href="#cserep_elony">ide</a></p>
									</div>
									<div class="services__item-wrap">
										<div class="row">
											<div class="col-md-6">
												<div class="services__item-four">
													<div class="services__icon-four">
														<i class="renova-unity"></i>
													</div>
													<div class="services__content-four">
														<span>Első lépés</span>
														<h2 class="title">Ingyenes árajánlatkérés</h2>
														<p>Kérjen elköteleződés nélkül ingyenes árajánlatot weboldalunkon keresztül cserepeslemezes tetőfedésre</p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="services__item-four">
													<div class="services__icon-four">
														<i class="renova-idea"></i>
													</div>
													<div class="services__content-four">
														<span>Második lépés</span>
														<h2 class="title">Helyszíni felmérés</h2>
														<p>Telefonos egyeztetést követően kollégánk a helyszíni felmérést követően pontos költségeket számol Önnek</p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="services__item-four">
													<div class="services__icon-four">
														<i class="renova-brick"></i>
													</div>
													<div class="services__content-four">
														<span>Harmadik lépés</span>
														<h2 class="title">Kivitelezés</h2>
														<p>Tapasztalt kollégáink a helyszínen az Ön igényei figyelembevételével elvégzik a cserepeslemezes tetőfedést.</p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="services__item-four">
													<div class="services__icon-four">
														<i class="renova-progress"></i>
													</div>
													<div class="services__content-four">
														<span>Negyedik lépés</span>
														<h2 class="title">A munka átadása</h2>
														<p>A kivitelezést akkor tekintjük befejezettnek, ha az ügyfél az elvégzett munkát átvette és elégedett.</p>
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
				<!-- project-details-area-end -->
				
				<?php 
					}
					if ($_GET['service_id']=='lemezteto-keszites'){
				?>
					<!-- project-details-area -->
				<section class="project__details-area section-py-120">
					<div class="container">
						<div class="row gutter-24 justify-content-center">
							<div class="col-xl-7 col-lg-6 col-md-8">
								<div class="services__thumb-three">
									<img src="<?php echo $server;?>images/lemez01.jpg" alt="<?php echo $alt;?>" class="wow img-custom-anim-left  animated" data-wow-duration="1.5s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: img-anim-left;">
								</div>
								<div class="row">
									<div class="col-lg-9">
								
										<div class="office__item">
											<h3 class="title">Lemeztető készítés <?php if (!EMPTY($megye['megye'])){ echo 'nem csak '.$megye['megye'].' megyében';}else{ echo 'országosan';}?></h3>
											<p>
												Lemeztető készítés szolgáltatásunkat képzett, profi munkatársaink végzik el a legmodernebb technikákat és eszközöket alkalmazva, biztosítva a ügyfeleink elégedettségét.
											</p>
											<span>
												<div class="container mt-5">
													<div class="accordion" id="accordionExample3">
														<div class="accordion-item">
															<h2 class="accordion-header" id="headingOne2">
																<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3">
																Lemeztető készítés országosan<br /><br />
																</button>
															</h2>
															<div id="collapseOne3" class="accordion-collapse collapse" aria-labelledby="headingOne2" data-bs-parent="#accordionExample3">
																<div class="accordion-body">
																	<p>Örömmel tájékoztatunk minden meglévő és új ügyfelünket, hogy valamennyi szolgáltatásunkat mostmár országosan is igénybe veheti. Válassza ki a megyét és a települést, ahol igénybe szeretné venni a szolgáltatásunkat és kérjen ingyenes árajánlatot.</p>
																</div>
															</div>
														</div>
														<div class="accordion-item">
															<h2 class="accordion-header" id="nestedHeadingOne3">
																<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapseOne3" aria-expanded="false" aria-controls="nestedCollapseOne3">
																Válassza ki melyik megyéből van?
																</button>
															</h2>
															<div id="nestedCollapseOne3" class="accordion-collapse collapse" aria-labelledby="nestedHeadingOne3" data-bs-parent="#accordionExample3">
																<div class="accordion-body">
																	<div class="accordion mt-3" id="nestedAccordionOne">
																	<?php 
																		$get_all_megye = get_all_megye();
																		foreach($get_all_megye as $megye) {
																			$rnd = rand(10, 99);
																	?>
																		<div class="accordion-item">
																			<h2 class="accordion-header" id="nestedHeading_<?php echo $rnd;?>">
																				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapse_<?php echo $rnd;?>" aria-expanded="false" aria-controls="nestedCollapseTwo">
																					Lemeztető készítés <?php echo $megye['megye']?>-megye
																				</button>
																			</h2>
																			<div id="nestedCollapse_<?php echo $rnd;?>" class="accordion-collapse collapse" aria-labelledby="nestedHeading_<?php echo $rnd;?>" data-bs-parent="#nestedAccordionOne">
																				<div class="accordion-body">
																					<ul class="list-wrap">
																						<?php 
																							$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
																							$cities_count = count($get_all_city_by_megye);
																							$cities_per_column = ceil($cities_count / 2);
																							$city_counter = 0;
																							
																							// Első oszlop
																							echo '<div class="row">';
																							foreach($get_all_city_by_megye as $city) {
																								if ($city_counter == $cities_per_column) {
																									echo '</div><div class="col-lg-12"><div class="row">';
																								}
																						?>
																							<div class="col-lg-12">
																								<div class="tp-service-details-point d-flex align-items-center">
																									<ul class="list-wrap">
																										<li><i class="far fa-check-circle"></i>
																											<a href="<?php echo $server?>szolgaltatasok/lemezteto-keszites/<?php echo replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos']);?>/">
																												Lemeztető készítés <?php echo $city['varos'];?> településen
																											</a>
																										</li>
																									</ul>
																								</div>
																							</div>
																						<?php 
																								$city_counter++;
																							}
																							echo '</div></div>'; // Utolsó oszlop lezárása
																						?>
																					</ul>
																				</div>
																				<!-- városok -->
																			</div>
																		</div>
																	<?php } ?>
																	</div>
																</div>
																<!-- megyek -->
															</div>
														</div>
													</div>
												</div>
											</span>
											<a href="<?php echo $server?>szolgaltatasok/lemezteto-keszites/" class="btn" style="min-width:100%">Ugrás a szolgáltatáshoz <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-xl-5 col-lg-6">
								<div class="services__content-three">
									<h1 class="title"><?php echo $title;?></h1>
									<p>
										Lemeztető készítés és felrakás szolgáltatásunk teljes körű megoldást nyújt az ügyfeleknek, amikor új tetőt szeretnének építeni vagy meglévő tetőt szeretnének felújítani. 
										Az első lépés az, hogy szakértőink alaposan felmérik az épületet és megtervezik a megfelelő lemeztető rendszert, figyelembe véve az épület stílusát, méretét és slhelyezkedését.
										A legmagasabb minőségű alapanyagok felhasználásával, valamint a legfejlettebb gyártási technológiák alkalmazásával biztosítjuk, hogy a lemezek tartósak és ellenállóak legyenek az 
										időjárás viszontagságaival szemben.<br />
										A lemeztető felrakás folyamata során tapasztalt csapatunk gondoskodik arról, hogy a lemeztető elemei pontosan és biztonságosan legyenek rögzítve a tető szerkezetére. 
										Figyelünk a részletekre és gondosan ellenőrizzük minden lépés során a munkát, hogy biztosítsuk a kiváló minőséget és tartósságot.<br />
										Fontos számunkra az ügyfelek elégedettsége, ezért szorosan együttműködünk velük az egész folyamat során. Nyitottak vagyunk az egyedi igényekre és kérésekre, és mindent megteszünk 
										annak érdekében, hogy az ügyfelek elvárásait teljes mértékben kielégítsük.
										Ha lemeztető készítés és felrakás szolgáltatásunkat választja, biztos lehet benne, hogy a legjobb minőséget és szakértelmet kapja. Kérjen ingyenes árajánlatot lemeztető készíts szolgáltatásunkra még ma.
									</p>
									<div class="shop__list-wrap services__list-wrap">
										<h3>A lemeztető előnyei </h3>
										<ul class="list-wrap">
											<li><i class="far fa-check-circle"></i>Tartósság: A lemeztetők hosszú élettartammal rendelkeznek, és ellenállnak az időjárási viszonyoknak, beleértve az esőt, havat, szélt és UV-sugárzást.</li>
											<li><i class="far fa-check-circle"></i>Esztétikai érték: A lemeztetők különféle színekben és mintázatokban érhetőek el, lehetővé téve a ház stílusának és környezetének harmonizálását.</li>
											<li><i class="far fa-check-circle"></i>Rugalmasság: Rugalmasan alkalmazkodnak különböző tetőszerkezetekhez és formákhoz, így szinte bármilyen épülettípushoz használhatók.</li>
											<li><i class="far fa-check-circle"></i>Könnyű telepítés: A lemeztető elemei viszonylag könnyűek ezért más tetőfedési anyagokhoz képest egyszerűbben telepíthetők, csökkentve a munkaerő- és időköltséget.</li>
										</ul>
										<p>A lemeztető további előnyei megtekintéséhez kattintson <a href="#cserep_elony">ide</a></p>
									</div>
									<div class="services__item-wrap">
										<div class="row">
											<div class="col-md-6">
												<div class="services__item-four">
													<div class="services__icon-four">
														<i class="renova-unity"></i>
													</div>
													<div class="services__content-four">
														<span>Első lépés</span>
														<h2 class="title">Ingyenes árajánlatkérés</h2>
														<p>Kérjen elköteleződés nélkül ingyenes árajánlatot weboldalunkon keresztül lemeztető készítés, lemeztető felrakásra.</p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="services__item-four">
													<div class="services__icon-four">
														<i class="renova-idea"></i>
													</div>
													<div class="services__content-four">
														<span>Második lépés</span>
														<h2 class="title">Helyszíni felmérés</h2>
														<p>Telefonos egyeztetést követően kollégánk a helyszíni felmérést követően pontos költségeket számol Önnek.</p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="services__item-four">
													<div class="services__icon-four">
														<i class="renova-brick"></i>
													</div>
													<div class="services__content-four">
														<span>Harmadik lépés</span>
														<h2 class="title">Kivitelezés</h2>
														<p>Tapasztalt kollégáink a helyszínen az Ön igényei figyelembevételével elvégzik a lemeztetők telepítését, felrakását.</p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="services__item-four">
													<div class="services__icon-four">
														<i class="renova-progress"></i>
													</div>
													<div class="services__content-four">
														<span>Negyedik lépés</span>
														<h2 class="title">A munka átadása</h2>
														<p>A kivitelezést akkor tekintjük befejezettnek, ha az ügyfél az elvégzett munkát átvette és elégedett.</p>
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
				<!-- project-details-area-end -->
				
				<?php 
					}
					if ($_GET['service_id']=='lemezteto-felrakasa'){
				?>
					
					<section class="project__details-area section-py-120">
						<div class="container">
							<div class="row gutter-24 justify-content-center">
								<div class="col-xl-7 col-lg-6 col-md-8">
									<div class="services__thumb-three">
										<img src="<?php echo $server;?>images/lemez01.jpg" alt="<?php echo $alt;?>" class="wow img-custom-anim-left  animated" data-wow-duration="1.5s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: img-anim-left;">
									</div>
									<div class="row">
										<div class="col-lg-9">
									
											<div class="office__item">
												<h3 class="title">Lemeztető felrakása <?php if (!EMPTY($megye['megye'])){ echo 'nem csak '.$megye['megye'].' megyében';}else{ echo 'országosan';}?></h3>
												<p>
													Lemeztető felrakása szolgáltatásunkat képzett, profi munkatársaink végzik el a legmodernebb technikákat és eszközöket alkalmazva, biztosítva a ügyfeleink elégedettségét.
												</p>
												<span>
													<div class="container mt-5">
														<div class="accordion" id="accordionExample3">
															<div class="accordion-item">
																<h2 class="accordion-header" id="headingOne2">
																	<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3">
																	Lemeztető felrakása országosan<br /><br />
																	</button>
																</h2>
																<div id="collapseOne3" class="accordion-collapse collapse" aria-labelledby="headingOne2" data-bs-parent="#accordionExample3">
																	<div class="accordion-body">
																		<p>Örömmel tájékoztatunk minden meglévő és új ügyfelünket, hogy valamennyi szolgáltatásunkat mostmár országosan is igénybe veheti. Válassza ki a megyét és a települést, ahol igénybe szeretné venni a szolgáltatásunkat és kérjen ingyenes árajánlatot.</p>
																	</div>
																</div>
															</div>
															<div class="accordion-item">
																<h2 class="accordion-header" id="nestedHeadingOne3">
																	<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapseOne3" aria-expanded="false" aria-controls="nestedCollapseOne3">
																	Válassza ki melyik megyéből van?
																	</button>
																</h2>
																<div id="nestedCollapseOne3" class="accordion-collapse collapse" aria-labelledby="nestedHeadingOne3" data-bs-parent="#accordionExample3">
																	<div class="accordion-body">
																		<div class="accordion mt-3" id="nestedAccordionOne">
																		<?php 
																			$get_all_megye = get_all_megye();
																			foreach($get_all_megye as $megye) {
																				$rnd = rand(10, 99);
																		?>
																			<div class="accordion-item">
																				<h2 class="accordion-header" id="nestedHeading_<?php echo $rnd;?>">
																					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapse_<?php echo $rnd;?>" aria-expanded="false" aria-controls="nestedCollapseTwo">
																						Lemeztető felrakása <?php echo $megye['megye']?>-megye
																					</button>
																				</h2>
																				<div id="nestedCollapse_<?php echo $rnd;?>" class="accordion-collapse collapse" aria-labelledby="nestedHeading_<?php echo $rnd;?>" data-bs-parent="#nestedAccordionOne">
																					<div class="accordion-body">
																						<ul class="list-wrap">
																							<?php 
																								$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
																								$cities_count = count($get_all_city_by_megye);
																								$cities_per_column = ceil($cities_count / 2);
																								$city_counter = 0;
																								
																								// Első oszlop
																								echo '<div class="row">';
																								foreach($get_all_city_by_megye as $city) {
																									if ($city_counter == $cities_per_column) {
																										echo '</div><div class="col-lg-12"><div class="row">';
																									}
																							?>
																								<div class="col-lg-12">
																									<div class="tp-service-details-point d-flex align-items-center">
																										<ul class="list-wrap">
																											<li><i class="far fa-check-circle"></i>
																												<a href="<?php echo $server?>szolgaltatasok/lemezteto-felrakasa/<?php echo replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos']);?>/">
																													Lemeztető felrakása <?php echo $city['varos'];?> településen
																												</a>
																											</li>
																										</ul>
																									</div>
																								</div>
																							<?php 
																									$city_counter++;
																								}
																								echo '</div></div>'; // Utolsó oszlop lezárása
																							?>
																						</ul>
																					</div>
																					<!-- városok -->
																				</div>
																			</div>
																		<?php } ?>
																		</div>
																	</div>
																	<!-- megyek -->
																</div>
															</div>
														</div>
													</div>
												</span>
												<a href="<?php echo $server?>szolgaltatasok/lemezteto-felrakasa/" class="btn" style="min-width:100%">Ugrás a szolgáltatáshoz <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-xl-5 col-lg-6">
									<div class="services__content-three">
										<h1 class="title"><?php echo $title;?></h1>
										<p>
											Lemeztető készítés és felrakás szolgáltatásunk teljes körű megoldást nyújt az ügyfeleknek, amikor új tetőt szeretnének építeni vagy meglévő tetőt szeretnének felújítani. 
											Az első lépés az, hogy szakértőink alaposan felmérik az épületet és megtervezik a megfelelő lemeztető rendszert, figyelembe véve az épület stílusát, méretét és slhelyezkedését.
											A legmagasabb minőségű alapanyagok felhasználásával, valamint a legfejlettebb gyártási technológiák alkalmazásával biztosítjuk, hogy a lemezek tartósak és ellenállóak legyenek az 
											időjárás viszontagságaival szemben.<br />
											A lemeztető felrakás folyamata során tapasztalt csapatunk gondoskodik arról, hogy a lemeztető elemei pontosan és biztonságosan legyenek rögzítve a tető szerkezetére. 
											Figyelünk a részletekre és gondosan ellenőrizzük minden lépés során a munkát, hogy biztosítsuk a kiváló minőséget és tartósságot.<br />
											Fontos számunkra az ügyfelek elégedettsége, ezért szorosan együttműködünk velük az egész folyamat során. Nyitottak vagyunk az egyedi igényekre és kérésekre, és mindent megteszünk 
											annak érdekében, hogy az ügyfelek elvárásait teljes mértékben kielégítsük.
											Ha lemeztető készítés és felrakás szolgáltatásunkat választja, biztos lehet benne, hogy a legjobb minőséget és szakértelmet kapja. Kérjen ingyenes árajánlatot lemeztető készíts szolgáltatásunkra még ma.
										</p>
										<div class="shop__list-wrap services__list-wrap">
											<h3>A lemeztető előnyei </h3>
											<ul class="list-wrap">
												<li><i class="far fa-check-circle"></i>Tartósság: A lemeztetők hosszú élettartammal rendelkeznek, és ellenállnak az időjárási viszonyoknak, beleértve az esőt, havat, szélt és UV-sugárzást.</li>
												<li><i class="far fa-check-circle"></i>Esztétikai érték: A lemeztetők különféle színekben és mintázatokban érhetőek el, lehetővé téve a ház stílusának és környezetének harmonizálását.</li>
												<li><i class="far fa-check-circle"></i>Rugalmasság: Rugalmasan alkalmazkodnak különböző tetőszerkezetekhez és formákhoz, így szinte bármilyen épülettípushoz használhatók.</li>
												<li><i class="far fa-check-circle"></i>Könnyű telepítés: A lemeztető elemei viszonylag könnyűek ezért más tetőfedési anyagokhoz képest egyszerűbben telepíthetők, csökkentve a munkaerő- és időköltséget.</li>
											</ul>
											<p>A lemeztető további előnyei megtekintéséhez kattintson <a href="#cserep_elony">ide</a></p>
										</div>
										<div class="services__item-wrap">
											<div class="row">
												<div class="col-md-6">
													<div class="services__item-four">
														<div class="services__icon-four">
															<i class="renova-unity"></i>
														</div>
														<div class="services__content-four">
															<span>Első lépés</span>
															<h2 class="title">Ingyenes árajánlatkérés</h2>
															<p>Kérjen elköteleződés nélkül ingyenes árajánlatot weboldalunkon keresztül lemeztető készítés, lemeztető felrakásra.</p>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="services__item-four">
														<div class="services__icon-four">
															<i class="renova-idea"></i>
														</div>
														<div class="services__content-four">
															<span>Második lépés</span>
															<h2 class="title">Helyszíni felmérés</h2>
															<p>Telefonos egyeztetést követően kollégánk a helyszíni felmérést követően pontos költségeket számol Önnek.</p>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="services__item-four">
														<div class="services__icon-four">
															<i class="renova-brick"></i>
														</div>
														<div class="services__content-four">
															<span>Harmadik lépés</span>
															<h2 class="title">Kivitelezés</h2>
															<p>Tapasztalt kollégáink a helyszínen az Ön igényei figyelembevételével elvégzik a lemeztetők telepítését, felrakását.</p>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="services__item-four">
														<div class="services__icon-four">
															<i class="renova-progress"></i>
														</div>
														<div class="services__content-four">
															<span>Negyedik lépés</span>
															<h2 class="title">A munka átadása</h2>
															<p>A kivitelezést akkor tekintjük befejezettnek, ha az ügyfél az elvégzett munkát átvette és elégedett.</p>
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
					
				<?php 
					}
					if ($_GET['service_id']=='korcolt-lemezes-tetofedes'){
				?>
					
					<section class="project__details-area section-py-120">
						<div class="container">
							<div class="row gutter-24 justify-content-center">
								<div class="col-xl-7 col-lg-6 col-md-8">
									<div class="services__thumb-three">
										<img src="<?php echo $server;?>images/korcolt01.jpg" alt="<?php echo $alt;?>" class="wow img-custom-anim-left  animated" data-wow-duration="1.5s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: img-anim-left;">
									</div>
									<div class="row">
										<div class="col-lg-9">
									
											<div class="office__item">
												<h3 class="title">Korcolt lemezes tetőfedés <?php if (!EMPTY($megye['megye'])){ echo 'nem csak '.$megye['megye'].' megyében';}else{ echo 'országosan';}?></h3>
												<p>
													Korcolt lemezes tetőfedésünk időtlen eleganciával és megbízhatósággal szolgálja az épületek védelmét és esztétikáját, biztosítva a hosszú távú minőséget és tartósságot.
												</p>
												<span>
													<div class="container mt-5">
														<div class="accordion" id="accordionExample5">
															<div class="accordion-item">
																<h2 class="accordion-header" id="headingOne5">
																	<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne5" aria-expanded="true" aria-controls="collapseOne5">
																	Korcolt lemezes tetőfedés országosan<br /><br />
																	</button>
																</h2>
																<div id="collapseOne5" class="accordion-collapse collapse show" aria-labelledby="headingOne5" data-bs-parent="#accordionExample5">
																	<div class="accordion-body">
																		<p>Örömmel tájékoztatunk minden meglévő és új ügyfelünket, hogy valamennyi szolgáltatásunkat mostmár országosan is igénybe veheti. Válassza ki a megyét és a települést, ahol igénybe szeretné venni a szolgáltatásunkat és kérjen ingyenes árajánlatot.</p>
																	</div>
																</div>
															</div>
															<div class="accordion-item">
																<h2 class="accordion-header" id="nestedHeadingOne5">
																	<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapseOne5" aria-expanded="false" aria-controls="nestedCollapseOne5">
																	Válassza ki melyik megyéből van?
																	</button>
																</h2>
																<div id="nestedCollapseOne5" class="accordion-collapse collapse" aria-labelledby="nestedHeadingOne5" data-bs-parent="#accordionExample5">
																	<div class="accordion-body">
																		<div class="accordion mt-3" id="nestedAccordionr">
																		<?php 
																			$get_all_megye = get_all_megye();
																			foreach($get_all_megye as $megye) {
																				$rnd = rand(10, 99);
																		?>
																			<div class="accordion-item">
																				<h2 class="accordion-header" id="nestedHeading_<?php echo $rnd;?>">
																					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapse_<?php echo $rnd;?>" aria-expanded="false" aria-controls="nestedCollapseTwo">
																						Korcolt lemezes tetőfedés <?php echo $megye['megye']?>-megye
																					</button>
																				</h2>
																				<div id="nestedCollapse_<?php echo $rnd;?>" class="accordion-collapse collapse" aria-labelledby="nestedHeading_<?php echo $rnd;?>" data-bs-parent="#nestedAccordionr">
																					<div class="accordion-body">
																						<ul class="list-wrap">
																							<?php 
																								$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
																								$cities_count = count($get_all_city_by_megye);
																								$cities_per_column = ceil($cities_count / 2);
																								$city_counter = 0;
																								
																								// Első oszlop
																								echo '<div class="row">';
																								foreach($get_all_city_by_megye as $city) {
																									if ($city_counter == $cities_per_column) {
																										echo '</div><div class="col-lg-12"><div class="row">';
																									}
																							?>
																								<div class="col-lg-12">
																									<div class="tp-service-details-point d-flex align-items-center">
																										<ul class="list-wrap">
																											<li><i class="far fa-check-circle"></i>
																												<a href="<?php echo $server?>szolgaltatasok/korcolt-lemezes-tetofedes/<?php echo replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos']);?>/">
																													Korcolt lemezes tetőfedés <?php echo $city['varos'];?> településen
																												</a>
																											</li>
																										</ul>
																									</div>
																								</div>
																							<?php 
																									$city_counter++;
																								}
																								echo '</div></div>'; // Utolsó oszlop lezárása
																							?>
																						</ul>
																					</div>
																					<!-- városok -->
																				</div>
																			</div>
																		<?php } ?>
																		</div>
																	</div>
																	<!-- megyek -->
																</div>
															</div>
														</div>
													</div>
												</span>
												<a href="<?php echo $server?>szolgaltatasok/korcolt-lemezes-tetofedes/" class="btn" style="min-width:100%">Ugrás a szolgáltatáshoz <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-xl-5 col-lg-6">
									<div class="services__content-three">
										<h1 class="title"><?php echo $title;?></h1>
										<p>
											A korcolt lemezes tetőfedés ideális választás lehet azoknak, akik tartós és időtálló tetőfedést keresnek, mivel a rozsdamentes acél vagy alumínium alapanyagok ellenállnak az időjárás viszontagságainak.
											A felületkezelésnek köszönhetően a korcolt lemezek nemcsak esztétikailag vonzóak, hanem kiváló tapadást és kopásállóságot biztosítanak is.
											Telepítésük gyors és egyszerű, így akár nagyobb felületeket is könnyedén be lehet velük fedni.
											A korcolt lemezek jól működnek a vízelvezetés terén, mivel enyhén dőlnek, megakadályozva a pangó vizet és így hozzájárulnak az épület hosszú távú védelméhez.
											Bár az anyagok ára magasabb lehet, a hosszú távú tartósság és alacsony karbantartási igény miatt a korcolt lemezes tetőfedés befektetésnek számít, amely megtérül az idők során.
											Az egyedi tervezési lehetőségeknek köszönhetően mindenki megtalálhatja a számára megfelelő stílust és megjelenést, ami harmonizál az épület környezetével és stílusával.
											A speciális bevonatokkal rendelkező modern korcolt lemezek segítenek csökkenteni a tető alatti hőmérsékletet, ami hozzájárulhat az energiamegtakarításhoz.
											A fémlemezek újrahasznosíthatósága révén a korcolt lemezes tetőfedés környezetbarát megoldást jelent azoknak, akik fenntartható építészetet kívánnak megvalósítani.<br /><br />
											Ha a korcolt lemezes tetőfedés szolgáltatásunkat választja, biztos lehet benne, hogy a legjobb minőséget és szakértelmet kapja. Kérjen ingyenes árajánlatotkorcolt lemezes tetőfedés szolgáltatásunkra még ma.
										</p>
										<div class="shop__list-wrap services__list-wrap">
											<h3>A korcolt lemezes tetőfedés előnyei </h3>
											<ul class="list-wrap">
												<li><i class="far fa-check-circle"></i>Anyagok: A korcolt lemezes tetőfedés általában rozsdamentes acélból, alumíniumból vagy más fémekből készül. Ezek az anyagok rendkívül tartósak és ellenállnak az időjárási viszonyoknak.</li>
												<li><i class="far fa-check-circle"></i>Felületi kezelés: A lemezek általában egy korcolt vagy strukturált felületkezelést kapnak, ami nemcsak esztétikailag vonzóvá teszi őket, hanem javítja a tapadást és növeli a kopásállóságot is.</li>
												<li><i class="far fa-check-circle"></i>Telepítés: A korcolt lemezes tetőfedés telepítése általában viszonylag gyors és egyszerű. A lemezek könnyűek és könnyen kezelhetők, így gyakran alkalmazzák őket nagyobb területeken is.</li>
												<li><i class="far fa-check-circle"></i>Vízelvezetés: A korcolt lemezes tetőfedés jól működik a vízelvezetés terén. A lemezek általában enyhén dőlnek, hogy a víz könnyen lefolyjon róluk, és megakadályozzák a pangó vizet.</li>
												<li><i class="far fa-check-circle"></i>Tartósság és karbantarthatóság: Ezek a tetőfedések általában nagyon tartósak és alig igényelnek karbantartást. A fém anyagok ellenállnak a korróziónak és a károsodásnak, és hosszú élettartammal rendelkeznek.</li>
												<li><i class="far fa-check-circle"></i>Költségek: A korcolt lemezes tetőfedés általában közepes vagy magasabb árkategóriába tartozik. Bár az anyagok általában drágábbak lehetnek, a hosszú távú tartósság és alacsony karbantartási igény sok esetben kifizetődővé teszi a befektetést.</li>
												<li><i class="far fa-check-circle"></i>Tervezési lehetőségek: A korcolt lemezes tetőfedés számos tervezési lehetőséget kínál. Különböző színű és mintázatú lemezek állnak rendelkezésre, így lehetőség van egyedi megjelenés létrehozására, ami illeszkedik az adott épület stílusához és környezetéhez.</li>
												<li><i class="far fa-check-circle"></i>Energiamegtakarítás: Egyes modern korcolt lemezes tetőfedések speciális bevonatokkal rendelkeznek, amelyek csökkentik a hőmérsékletet a tető alatt. Ez segíthet az energiamegtakarításban a klímaberendezések használatával összefüggésben.</li>
												<li><i class="far fa-check-circle"></i>Környezetbarát lehetőség: A fémlemezek nagy része újrahasznosítható, így a korcolt lemezes tetőfedés környezetbarát megoldást jelenthet azoknak, akik fontosnak tartják a fenntarthatóságot.</li>
											</ul>
										</div>
										<div class="services__item-wrap">
											<div class="row">
												<div class="col-md-6">
													<div class="services__item-four">
														<div class="services__icon-four">
															<i class="renova-unity"></i>
														</div>
														<div class="services__content-four">
															<span>Első lépés</span>
															<h2 class="title">Ingyenes árajánlatkérés</h2>
															<p>Kérjen elköteleződés nélkül ingyenes árajánlatot weboldalunkon keresztül korcolt lemezes tetőfedésre</p>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="services__item-four">
														<div class="services__icon-four">
															<i class="renova-idea"></i>
														</div>
														<div class="services__content-four">
															<span>Második lépés</span>
															<h2 class="title">Helyszíni felmérés</h2>
															<p>Telefonos egyeztetést követően kollégánk a helyszíni felmérést követően pontos költségeket számol Önnek.</p>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="services__item-four">
														<div class="services__icon-four">
															<i class="renova-brick"></i>
														</div>
														<div class="services__content-four">
															<span>Harmadik lépés</span>
															<h2 class="title">Kivitelezés</h2>
															<p>Tapasztalt kollégáink a helyszínen az Ön igényei figyelembevételével elvégzik a tetőfedést korcolt lemezekkel.</p>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="services__item-four">
														<div class="services__icon-four">
															<i class="renova-progress"></i>
														</div>
														<div class="services__content-four">
															<span>Negyedik lépés</span>
															<h2 class="title">A munka átadása</h2>
															<p>A kivitelezést akkor tekintjük befejezettnek, ha az ügyfél az elvégzett munkát átvette és elégedett.</p>
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
					
				<?php 
					}
					if ($_GET['service_id']=='trapezlemezes-tetofedes'){
				?>
					<section class="project__details-area section-py-120">
						<div class="container">
							<div class="row gutter-24 justify-content-center">
								<div class="col-xl-7 col-lg-6 col-md-8">
									<div class="services__thumb-three">
										<img src="<?php echo $server;?>images/trapez01.jpg" alt="<?php echo $alt;?>" class="wow img-custom-anim-left  animated" data-wow-duration="1.5s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: img-anim-left;">
									</div>
									<div class="row">
										<div class="col-lg-9">
									
											<div class="office__item">
												<h3 class="title">Trapézlemezes tetőfedés <?php if (!EMPTY($megye['megye'])){ echo 'nem csak '.$megye['megye'].' megyében';}else{ echo 'országosan';}?></h3>
												<p>
													A trapézlemezes tetőfedés könnyű, mégis erős megoldás, amely hatékony védelmet nyújt az időjárás viszontagságaival szemben. Rugalmas kialakítása sokféle tervezési lehetőséget kínál.
												</p>
												<span>
													<div class="container mt-5">
														<div class="accordion" id="accordionExample6">
															<div class="accordion-item">
																<h2 class="accordion-header" id="headingOne5">
																	<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne6" aria-expanded="true" aria-controls="collapseOne6">
																	Trapézlemezes tetőfedés országosan<br /><br />
																	</button>
																</h2>
																<div id="collapseOne6" class="accordion-collapse collapse show" aria-labelledby="headingOne5" data-bs-parent="#accordionExample6">
																	<div class="accordion-body">
																		<p>Örömmel tájékoztatunk minden meglévő és új ügyfelünket, hogy valamennyi szolgáltatásunkat mostmár országosan is igénybe veheti. Válassza ki a megyét és a települést, ahol igénybe szeretné venni a szolgáltatásunkat és kérjen ingyenes árajánlatot.</p>
																	</div>
																</div>
															</div>
															<div class="accordion-item">
																<h2 class="accordion-header" id="nestedHeadingOne6">
																	<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapseOne6" aria-expanded="false" aria-controls="nestedCollapseOne6">
																	Válassza ki melyik megyéből van?
																	</button>
																</h2>
																<div id="nestedCollapseOne6" class="accordion-collapse collapse" aria-labelledby="nestedHeadingOne6" data-bs-parent="#accordionExample6">
																	<div class="accordion-body">
																		<div class="accordion mt-3" id="nestedAccordionr">
																		<?php 
																			$get_all_megye = get_all_megye();
																			foreach($get_all_megye as $megye) {
																				$rnd = rand(10, 99);
																		?>
																			<div class="accordion-item">
																				<h2 class="accordion-header" id="nestedHeading_<?php echo $rnd;?>">
																					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapse_<?php echo $rnd;?>" aria-expanded="false" aria-controls="nestedCollapseTwo">
																						Trapézlemezes tetőfedés <?php echo $megye['megye']?>-megye
																					</button>
																				</h2>
																				<div id="nestedCollapse_<?php echo $rnd;?>" class="accordion-collapse collapse" aria-labelledby="nestedHeading_<?php echo $rnd;?>" data-bs-parent="#nestedAccordionr">
																					<div class="accordion-body">
																						<ul class="list-wrap">
																							<?php 
																								$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
																								$cities_count = count($get_all_city_by_megye);
																								$cities_per_column = ceil($cities_count / 2);
																								$city_counter = 0;
																								
																								// Első oszlop
																								echo '<div class="row">';
																								foreach($get_all_city_by_megye as $city) {
																									if ($city_counter == $cities_per_column) {
																										echo '</div><div class="col-lg-12"><div class="row">';
																									}
																							?>
																								<div class="col-lg-12">
																									<div class="tp-service-details-point d-flex align-items-center">
																										<ul class="list-wrap">
																											<li><i class="far fa-check-circle"></i>
																												<a href="<?php echo $server?>szolgaltatasok/trapezlemezes-tetofedes/<?php echo replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos']);?>/">
																													Trapézlemezes tetőfedés <?php echo $city['varos'];?> településen
																												</a>
																											</li>
																										</ul>
																									</div>
																								</div>
																							<?php 
																									$city_counter++;
																								}
																								echo '</div></div>'; // Utolsó oszlop lezárása
																							?>
																						</ul>
																					</div>
																					<!-- városok -->
																				</div>
																			</div>
																		<?php } ?>
																		</div>
																	</div>
																	<!-- megyek -->
																</div>
															</div>
														</div>
													</div>
												</span>
												<a href="<?php echo $server?>szolgaltatasok/trapezlemezes-tetofedes/" class="btn" style="min-width:100%">Ugrás a szolgáltatáshoz <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-xl-5 col-lg-6">
									<div class="services__content-three">
										<h1 class="title"><?php echo $title;?></h1>
										<p>
											
										A trapézlemezes tetőfedés egy népszerű és praktikus megoldás a tetők burkolására, különösen ipari és mezőgazdasági épületek esetében. Ezek a lemezek általában acélból, alumíniumból vagy más könnyűfémekből készülnek, és számos előnyt kínálnak az építési projektek számára.
										<br />Először is, a trapézlemezek könnyűek és tartósak. Az acélból vagy alumíniumból készült lemezek könnyűsúlyúak, ami megkönnyíti a szállítást és az építést. Emellett ellenállnak a korróziónak és az időjárás viszontagságainak, ami hosszú élettartamot biztosít az épület számára.
										<br />Másodszor, a trapézlemezes tetőfedés gyorsan és viszonylag egyszerűen telepíthető. Az egyes lemezek könnyen illeszthetők egymáshoz, ami csökkenti az építési időt és a munkaerő költségeit. Emellett a lemezek széles méretválasztéka lehetővé teszi, hogy könnyen alkalmazkodjanak az épület méretéhez és formájához.
										<br />Harmadszor, a trapézlemezek sokféle színben és bevonatban elérhetők, így lehetővé teszik az épület esztétikus megjelenését és az építészeti igényeknek való megfelelést. Ezenkívül a trapézlemezek könnyen kombinálhatók más anyagokkal, például üveggel vagy faelemekkel, hogy egyedi megjelenést biztosítsanak az épületnek.
										<br />Negyedszer, a trapézlemezes tetőfedés jó hőszigetelő tulajdonságokkal rendelkezik. Az anyagok, amelyekből készülnek, általában kiváló hőszigetelést biztosítanak, ami segít csökkenteni a fűtési és hűtési költségeket az épületben.
										<br />Végül, a trapézlemezes tetőfedés könnyen karbantartható és javítható. A lemezek egyszerűen tisztíthatók és festhetők, és ha szükséges, könnyen cserélhetők is, ami hosszú távon csökkenti a karbantartási költségeket.
										Összességében a trapézlemezes tetőfedés egy sokoldalú és gazdaságos megoldás, amely számos előnnyel jár az építési projektek számára. Könnyűsúlya, tartóssága, könnyű telepítése és karbantartása mellett esztétikus megjelenést és jó hőszigetelést biztosít az épületek számára.
											<br /><br />
											Ha a trapézlemezes tetőfedés szolgáltatásunkat választja, biztos lehet benne, hogy a legjobb minőséget és szakértelmet kapja. Kérjen ingyenes árajánlatot trapézlemezes tetőfedés szolgáltatásunkra még ma.
										</p>
										
										<div class="services__item-wrap">
											<div class="row">
												<div class="col-md-6">
													<div class="services__item-four">
														<div class="services__icon-four">
															<i class="renova-unity"></i>
														</div>
														<div class="services__content-four">
															<span>Első lépés</span>
															<h2 class="title">Ingyenes árajánlatkérés</h2>
															<p>Kérjen elköteleződés nélkül ingyenes árajánlatot weboldalunkon keresztül trapézlemezes tetőfedésre</p>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="services__item-four">
														<div class="services__icon-four">
															<i class="renova-idea"></i>
														</div>
														<div class="services__content-four">
															<span>Második lépés</span>
															<h2 class="title">Helyszíni felmérés</h2>
															<p>Telefonos egyeztetést követően kollégánk a helyszíni felmérést követően pontos költségeket számol Önnek.</p>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="services__item-four">
														<div class="services__icon-four">
															<i class="renova-brick"></i>
														</div>
														<div class="services__content-four">
															<span>Harmadik lépés</span>
															<h2 class="title">Kivitelezés</h2>
															<p>Tapasztalt kollégáink a helyszínen az Ön igényei figyelembevételével elvégzik a tetőfedést trapézlemezekkel.</p>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="services__item-four">
														<div class="services__icon-four">
															<i class="renova-progress"></i>
														</div>
														<div class="services__content-four">
															<span>Negyedik lépés</span>
															<h2 class="title">A munka átadása</h2>
															<p>A kivitelezést akkor tekintjük befejezettnek, ha az ügyfél az elvégzett munkát átvette és elégedett.</p>
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
				<?php 
					}
				?>
			
			<?php 
			
				}
			?>
			
			
			
			
			
			
            <!-- features-area -->
            <section class="features__area section-pt-120 section-pb-90">
                <div class="container">
                    <div class="row justify-content-center gutter-24">
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="features__item">
                                <div class="features__icon">
                                    <i class="renova-rocket"></i>
                                </div>
                                <div class="features__content">
                                    <h3 class="title">Cserepeslemezes tetőfedés országosan</h3>
                                    <p>Szolgáltatásainkat az ország bármely ponrjáról igénybe veheti!</p>
                                    <a data-bs-toggle="modal" data-bs-target="#offer" class="btn">Árajánlatkrés most! <img src="<?php echo $server;?>assets/img/icons/right_arrow.svg" alt="<?php echo $alt;?>" ></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="features__item">
                                <div class="features__icon">
                                    <i class="renova-flag"></i>
                                </div>
                                <div class="features__content">
                                    <h3 class="title">Cserepeslemezes tetőfedés garanciával</h3>
                                    <p>Ha a cserepeslemezes tetőfedést velünk készíteti el, írásos garanciát adunk!</p>
                                    <a href="<?php echo $server;?>szolgaltatasok/" class="btn">Szolgáltatások <img src="<?php echo $server;?>assets/img/icons/right_arrow.svg" alt="<?php echo $alt;?>" ></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                            <div class="features__item">
                                <div class="features__icon">
                                    <i class="renova-book"></i>
                                </div>
                                <div class="features__content">
                                    <h3 class="title">Magas, 99%-os ügyfélelégedettség</h3>
                                    <p>Minden munkánkat úgy végezzük el, hogy az ügyfele biztosan elégedettek legyenek!</p>
                                    <a href="<?php echo $server;?>#works" class="btn">Munkáink <img src="<?php echo $server;?>assets/img/icons/right_arrow.svg" alt="<?php echo $alt;?>" ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- features-area-end -->
            <!-- about-area -->
            <section class="about__area section-pb-120">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        
                        <div class="col-lg-6" id="cserep_elony">
                            <div class="about__content">
                                <div class="section__title mb-20">
                                    <h2 class="title">Cserepeslemezes tetőfedés</h2>
                                    <h4 class="number">01</h4>
                                </div>
                                <p>
									Alig van más házrész, amely annyira ki lenne téve az időjárásnak és külső hatásoknak, mint a tető. A tetőfedő anyagok különböző változatai léteznek: agyagból, fémekből, 
									rostcementből vagy bitumenből. Ezek túlnyomó többsége évtizedekig kell, hogy megbízhatóan védje a tetőt a szél és az időjárás viszontagságai ellen. Cserepeslemezes tetőfedéssel
									azonban nem csupán időjárásálló megoldást kínálunk. A cserepeslemezes tetőfedéssel esztétikus, fenntartható és garantáltan tartós hosszú élettartamű megoldást kaphat.
									Cserepeslemezes tetőfedés szolgáltatásunk az ország egész területén igénybevehető, így bárhol is legyen otthona, számíthat ránk a tetőszerkezet megújításában. 
									Több mint 20 éves tapasztalattal rendelkezünk a cserepeslemezes tetőfedés területén, így biztos lehet abban, hogy szakértelmünk és tudásunk garanciát jelent a minőségi munkavégzésre és kivitelezésre. 
									Az <a data-bs-toggle="modal" data-bs-target="#offer">ingyenes árajánlatkérés</a> lehetősége minden érdeklődő számára elérhető. Kalkuláljon most, tervezze már most meg tetőszerkezetének felújítási költségeit.
									
								</p>
								<div class="services__content-three">
									<h2 class="title">A cserepeslemezes tetőfedés előnyei</h2>
									<p>
										A cserepeslemezes tetőfedés számos olyan előnnyel rendelkezik, amellyel más típusú tetők nem. Az alábbi pontokban próbáltuk összeszedni a teljesség igényei nélkül 
										a cserepeslemezes tetőfedés legfontosabb előnyeit.
									</p>
									<div class="shop__list-wrap services__list-wrap">
										<ul class="list-wrap">
											<li><i class="far fa-check-circle"></i>Tartósság: A cserepeslemezek hosszú élettartammal rendelkeznek, és ellenállnak az időjárási viszonyoknak, beleértve az esőt, havat, szélt és UV-sugárzást.</li>
											<li><i class="far fa-check-circle"></i>Esztétikai érték: A cserepeslemezek különféle színekben és mintázatokban érhetőek el, lehetővé téve a ház stílusának és környezetének harmonizálását.</li>
											<li><i class="far fa-check-circle"></i>Rugalmasság: Rugalmasan alkalmazkodnak különböző tetőszerkezetekhez és formákhoz, így szinte bármilyen épülettípushoz használhatók.</li>
											<li><i class="far fa-check-circle"></i>Könnyű telepítés: A cserepeslemezek viszonylag könnyűek ezért más tetőfedési anyagokhoz képest egyszerűbben telepíthetők, csökkentve a munkaerő- és időköltséget.</li>
											<li><i class="far fa-check-circle"></i>Időtállóság: A cserepeslemezek ellenállnak a rothadásnak, penészedésnek és rovaroknak, ami hosszú távú védelmet biztosít a tetőnek.</li>
											<li><i class="far fa-check-circle"></i>Karbantartás, tisztítás: A cserepeslemezek kevés karbantartást igényelnek, és könnyen tisztíthatók, ami további költségmegtakarítást eredményez.</li>
											<li><i class="far fa-check-circle"></i>Fenntartható, környezetbarát: A cserepeslemezek nagy része újrahasznosítható anyagokból készül, így környezetbarát megoldást jelentenek.</li>
											<li><i class="far fa-check-circle"></i>Hő- és hangszigetelés:  cserepeslemezek természetes hő- és hangszigetelő tulajdonságokkal rendelkeznek, ami segít fenntartani a helyiségek optimális hőmérsékletét, és csökkentik a kivülről érkező zajokat.</li>
											<li><i class="far fa-check-circle"></i>Tűzállóság:  A cserepeslemezek tűzálló tulajdonságokkal rendelkeznek (A1), ami segít megvédeni az épületet a tűzveszélytől és biztosítja a lakók biztonságát.</li>
											<li><i class="far fa-check-circle"></i>Szellőzés: A cserepeslemezek lehetővé teszik a tető alatti szellőzést, ami fontos a pára és nedvesség eltávolításában, ezzel megakadályozva a penészesedés kialakulását.</li>
										</ul>
									</div>
									
								</div>
                                
                            </div>
                        </div>
						
						<div class="col-lg-6" id="lemez_elony">
                            <div class="about__content">
                                <div class="section__title mb-20" style="padding-top: 20px;">
                                    <h2 class="title" style="font-size: 48px;">Lemeztető készítés</h2>
                                    <h4 class="number">02</h4>
                                </div>
                                <p>
									A lemeztető az egyik leggazdaságosabb megoldást kínálja. Ellenáll a szélnek, a jégverésnek és a napsugárzásnak, amelyek mind károsíthatják a hagyományos tetőburkolatokat. 
									A lemeztető tisztítása és karbantartása sokkal kevésbé költséges, mint a hagyományos cseréptetőknél vagy egyéb tetőknél. Az egyik legnagyobb előnye a lemezetetőknek, hogy A1-es 
									tűzvédelmi osztályba sorolandó, ami azt jelenti, hogy a tűz semmilyen fázisában, még teljesen kifejlett tűz esetén sem segíti elő a tűz terjedését és nem növeli a tűzterhelést. 
									A lemeztetők számos színbenelérhetőek, néhányuk rendelkezik fakulásálló tulajdonságokkal és kiváló UV-reflexiós tulajdonságokkal bír. 
									A lemeztető készítés és lemeztető felrakás szolgáltatásunk szintén orszgosan igénybe vehető. Erre a szolgáltatásunkra is, csakúgy mint a cserepeslemezes tetőfedés szolgáltatásunkra is 
									írásos garanciát vállalunk, így ha valami káresemény történik, Önnek nem kell aggódnia, hiszen a sérült, roncsolódott részek cseréjét a lehető leghamarabb elvégezzük. <a data-bs-toggle="modal" data-bs-target="#offer">Kérjen most árajánlatot</a>
									weboldalunkon vagy kérjen ingyenes visszahívást!
									
								</p>
                                <div class="services__content-three">
									<h2 class="title">A lemeztető készítés előnyei</h2>
									<p>
										 A lemeztető akárcsak a cserpeslemezes tetőfedés megbízható, gazdaságos és esztétikus megoldást jelent a tetőfedés terén. Gyakorlatilag ugyanazokkal a tulajdonságokkal bír mint a cserepeslemezes tetőedés.
									</p>
									<div class="shop__list-wrap services__list-wrap">
										<ul class="list-wrap">
											<li><i class="far fa-check-circle"></i>Tartósság: A lemeztetők hosszú élettartammal rendelkeznek, és ellenállnak az időjárási viszonyoknak, beleértve az esőt, havat, szélt és UV-sugárzást.</li>
											<li><i class="far fa-check-circle"></i>Esztétikai érték: A lemeztetők különféle színekben és mintázatokban érhetőek el, lehetővé téve a ház stílusának és környezetének harmonizálását.</li>
											<li><i class="far fa-check-circle"></i>Rugalmasság: Rugalmasan alkalmazkodnak különböző tetőszerkezetekhez és formákhoz, így szinte bármilyen épülettípushoz használhatók.</li>
											<li><i class="far fa-check-circle"></i>Könnyű telepítés: A lemeztetők moduljai viszonylag könnyűek ezért más tetőfedési anyagokhoz képest egyszerűbben telepíthetők, csökkentve a munkaerő- és időköltséget.</li>
											<li><i class="far fa-check-circle"></i>Időtállóság: A lemeztetők ellenállnak a rothadásnak, penészedésnek és rovaroknak, ami hosszú távú védelmet biztosít a tetőnek.</li>
											<li><i class="far fa-check-circle"></i>Karbantartás, tisztítás: A lemeztetők kevés karbantartást igényelnek, és könnyen tisztíthatók, ami további költségmegtakarítást eredményez.</li>
											<li><i class="far fa-check-circle"></i>Fenntartható, környezetbarát: A lemeztetők nagy része újrahasznosítható anyagokból készül, így környezetbarát megoldást jelentenek.</li>
											<li><i class="far fa-check-circle"></i>Hő- és hangszigetelés:  lemeztetők természetes hő- és hangszigetelő tulajdonságokkal rendelkeznek, ami segít fenntartani a helyiségek optimális hőmérsékletét, és csökkentik a kivülről érkező zajokat.</li>
											<li><i class="far fa-check-circle"></i>Tűzállóság:  A lemeztetők tűzálló tulajdonságokkal rendelkeznek (A1), ami segít megvédeni az épületet a tűzveszélytől és biztosítja a lakók biztonságát.</li>
											<li><i class="far fa-check-circle"></i>Szellőzés: A lemeztetők lehetővé teszik a tető alatti szellőzést, ami fontos a pára és nedvesség eltávolításában, ezzel megakadályozva a penészesedés kialakulását.</li>
										</ul>
									</div>
									
								</div>
                                
                            </div>
                        </div>
						<div class="col-lg-12">
							<div class="about__list-box-wrap">
								<div class="about__list-box" data-aos="fade-up" data-aos-delay="100">
									<a data-bs-toggle="modal" data-bs-target="#offer" class="btn border-btn" style="background: #3e464f;color:white">Árajánlatkérés</a>
								</div>
								<div class="about__list-box" data-aos="fade-up" data-aos-delay="100">
									<a href="<?php echo $server;?>szolgaltatasok/cserepeslemezes-tetofedes/" class="btn border-btn">Cserepeslemezes tetőfedés</a>
								</div>
								<div class="about__list-box" data-aos="fade-up" data-aos-delay="100">
									<a href="<?php echo $server;?>szolgaltatasok/lemezteto-keszites/" class="btn border-btn">Lemeztető készítés</a>
								</div>
								<div class="about__list-box" data-aos="fade-up" data-aos-delay="100">
									<a href="<?php echo $server;?>#works" class="btn border-btn">Munkáink megtekintése</a>
								</div>
								<div class="about__list-box" data-aos="fade-up" data-aos-delay="100">
									<a href="<?php echo $server;?>blog-bejegyzesek/" class="btn border-btn">Blog bejegyzések</a>
								</div>
								
							</div>
						</div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->
			 <!-- cta-area -->
            <section class="cta__area fix">
                <div class="cta__bg" data-background="<?php echo $server;?>images/bg_03.webp"></div>
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="cta__content">
                                <h2 class="title">Felkeltettük érdeklődését?</h2>
                                <div class="cta__btn">
                                    <a data-bs-toggle="modal" data-bs-target="#offer" class="btn btn-two">Kérjen ingyenes árajánlatot most! <img src="<?php echo $server;?>assets/img/icons/right_arrow.svg" alt="<?php echo $alt;?>" ></a>
                                    <a data-bs-toggle="modal" data-bs-target="#call" class="btn transparent-btn">Kérjen visszahívást! <img src="<?php echo $server;?>assets/img/icons/right_arrow.svg" alt="<?php echo $alt;?>" ></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cta__content-right" data-aos="fade-up" data-aos-delay="600">
                                <h4 class="title">További kérdése van? Lépjen <a href="<?php echo $server;?>kapcsolat/">kapcsolatba</a> velünk!</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cta__shape">
                    <img src="<?php echo $server;?>assets/img/images/cta_shape.png" alt="shape" data-aos="fade-down-left" data-aos-delay="400">
                </div>
            </section>
            <!-- cta-area-end -->
            <!-- services-area -->
            <section class="services__area section-pt-120 section-pb-90">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__title mb-60">
                                <h2 class="title">Stílusok a tetőfedésben</h2>
                                <h4 class="number">03</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row-custom">
                        <div class="col-custom active">
                            <div class="services__item">
                                <div class="services__arrow">
                                    <i class="renova-top-right"></i>
                                </div>
                                <div class="services__content">
                                    <h4 class="title">Cserepeslemezes tetőfedés</h4>
                                    <div class="services__icon">
                                        <i class="renova-construction"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="services__item-hidden">
                                <div class="services__thumb">
                                    <a href="<?php echo $server;?>szolgaltatasok/cserepeslemezes-tetofedes/">
										<img src="<?php echo $server;?>images/cserepeslemezes01.jpg" alt="<?php echo $alt;?>">
									</a>
                                </div>
                                <div class="services__content-hidden">
                                    <h2 class="title"><a href="<?php echo $server;?>szolgaltatasok/cserepeslemezes-tetofedes/">Stílusos cserepeslemezes tetőfedés</a></h2>
                                    <p>
										Ahogyan azt már olvashatta a cserpeslemezes tetőfedés szolgáltatásunkat igénybe véve, több profil (standard és matt bevonatok) és számos szín közül válogathat.
									</p>
                                    <div class="services__btn">
                                        <a class="btn" data-bs-toggle="offcanvas" data-bs-target="#cserepeslemez_color" aria-controls="cserepeslemez_color">Tekintse meg kínálatunkat <img src="<?php echo $server;?>assets/img/icons/right_arrow.svg" alt="<?php echo $alt;?>"  ></a>
                                        <a class="btn" data-bs-toggle="modal" data-bs-target="#offer">Árajánlatkérés <img src="<?php echo $server;?>assets/img/icons/right_arrow.svg" alt="<?php echo $alt;?>"  ></a>
                                    </div>
                                </div>
								<!--offcanvas-->
								<div class="offcanvas offcanvas-bottom" tabindex="-1" id="cserepeslemez_color" aria-labelledby="offcanvasBottomLabel" style="min-height: 80%;">
									<div class="offcanvas-header">
										<h5 class="offcanvas-title" id="offcanvasBottomLabel">Elérhető színek cserepeslemezes tetőfedéshez</h5>
										<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
									</div>
									<div class="offcanvas-body small">
										<div class="product-desc-wrap" style="margin-top: 10px;">
											<ul class="nav nav-tabs" id="myTab2" role="tablist">
												<li class="nav-item" role="presentation">
													<button class="nav-link active" id="standard-tab" data-bs-toggle="tab" data-bs-target="#standard-tab-pane" type="button" role="tab" aria-controls="standard-tab-pane" aria-selected="true">Standard bevonatok</button>
												</li>
												<li class="nav-item" role="presentation">
													<button class="nav-link" id="matt-tab" data-bs-toggle="tab" data-bs-target="#matt-tab-pane" type="button" role="tab" aria-controls="matt-tab-pane" aria-selected="false" tabindex="-1">Matt bevonatok</button>
												</li>
											</ul>
											<div class="tab-content" id="myTabContent2">
												<div class="tab-pane fade active show" id="standard-tab-pane" role="tabpanel" aria-labelledby="standard-tab" tabindex="0">
													<p>
														Válassza ki a tető színét és nézze meg, hogyan is nézne ki a a tető az adott színnel.
													</p>
													<br />
													<br />
													<div class="row">
														<div class="col-md-4">
															<div class="row">
																<div class="col-md-3">
																	<div id="01" class="services__item-four" style="background: #bd9e6e;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span>Gabona sárga cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="02" class="services__item-four" style="background: #d2c59b;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span>Bézs cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="03" class="services__item-four" style="background: #92251e;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Tűzpiros cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="04" class="services__item-four" style="background: #651e1e;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Téglavörös cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="05" class="services__item-four" style="background: #751e2a;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Meggy piros cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="06" class="services__item-four" style="background: #033d78;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Kék cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="07" class="services__item-four" style="background: #4c6b4f;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Világos zöld cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="08" class="services__item-four" style="background: #283b2b;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Katona zöld cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="09" class="services__item-four" style="background: #252f37;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Antracit szürke cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="10" class="services__item-four" style="background: #b2bebc;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="">Világos szürke cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="11" class="services__item-four" style="background: #7a4528;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Világos barna cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="12" class="services__item-four" style="background: #362422;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Sötét barna cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="13" class="services__item-four" style="background: #deddca;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="">Tört fehér cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="14" class="services__item-four" style="background: #8c8a8c;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Ezüst metál cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="15" class="services__item-four" style="background: #858586;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Grafit metál cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="16" class="services__item-four" style="background: #fffff4;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="">Tiszta fehér cserepeslemez</span>
																		</div>
																	</div>
																</div>
															</div>
															
														</div>
														<div class="col-md-8">
															<div class="row"  id="content-display">
																
															</div>
														</div>
														
													</div>
												</div>
												<script>
													document.addEventListener('DOMContentLoaded', function() {
														// Minden services__item-four osztályú elemre hozzáadunk egy kattintásfigyelőt
														var items = document.querySelectorAll('.services__item-four');
														items.forEach(function(item) {
															item.addEventListener('click', function() {
																// Az adott elem id-jának megszerzése
																var itemId = this.getAttribute('id');
																// Az új tartalom beállítása a jobb oldali col-md-6-ba
																var imageUrl = '<?php echo $server;?>images/cserepeslemez_color/' + itemId + '.jpg';
																var imgElement = document.createElement('img');
																imgElement.src = imageUrl;
																imgElement.alt = 'Kép megjelenítve az id alapján';
																imgElement.style.maxHeight = '400px'; // maximalizáljuk a magasságot 400px-re
																document.getElementById('content-display').innerHTML = '';
																document.getElementById('content-display').appendChild(imgElement);
															});
														});
													});

												</script>
												<div class="tab-pane fade" id="matt-tab-pane" role="tabpanel" aria-labelledby="matt-tab" tabindex="0">
													<p>
														Válassza ki a kívánt cserepeslemez színét és nézze meg, hogyan is nézne ki a a tető az adott színnel.
													</p>
													<br />
													<br />
													<div class="row">
														<div class="col-md-4">
															<div class="row">
																<div class="col-md-3">
																	<div id="m1" class="services__item-four" style="background: #6b2020;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Téglavörös cserepeslemez</span>
																		</div>
																	</div>
																</div>
																
																<div class="col-md-3">
																	<div id="m2" class="services__item-four" style="background: #252f37;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Antracit szürke cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="m3" class="services__item-four" style="background: #7a4528;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Világos barna cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="m4" class="services__item-four" style="background: #362422;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Sötét barna cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="m5" class="services__item-four" style="background: #081a1b;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Fekete cserepeslemez</span>
																		</div>
																	</div>
																</div>
																
															</div>
															
														</div>
														<div class="col-md-8">
															<div class="row"  id="content-display_m">
																
															</div>
														</div>
														<script>
															document.addEventListener('DOMContentLoaded', function() {
																// Minden services__item-four osztályú elemre hozzáadunk egy kattintásfigyelőt
																var items = document.querySelectorAll('.services__item-four');
																items.forEach(function(item) {
																	item.addEventListener('click', function() {
																		// Az adott elem id-jának megszerzése
																		var itemId = this.getAttribute('id');
																		// Az új tartalom beállítása a jobb oldali col-md-6-ba
																		var imageUrl = '<?php echo $server;?>images/cserepeslemez_color/' + itemId + '.jpg';
																		var imgElement = document.createElement('img');
																		imgElement.src = imageUrl;
																		imgElement.alt = 'Kép megjelenítve az id alapján';
																		imgElement.style.maxHeight = '400px'; // maximalizáljuk a magasságot 400px-re
																		document.getElementById('content-display_m').innerHTML = '';
																		document.getElementById('content-display_m').appendChild(imgElement);
																	});
																});
															});

														</script>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
                            </div>
							

                        </div>
                        <div class="col-custom">
                            <div class="services__item">
                                <div class="services__arrow">
                                    <i class="renova-top-right"></i>
                                </div>
                                <div class="services__content">
								
                                    <h4 class="title">Lemeztető készítés</h4>
                                    
                                    <div class="services__icon">
                                        <i class="renova-idea"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="services__item-hidden">
                                <div class="services__thumb">
                                    <a href="<?php echo $server;?>szolgaltatasok/lemezteto-keszites/">
										<img src="<?php echo $server;?>images/lemezteto01.jpeg" alt="<?php echo $alt;?>">
									</a>
                                </div>
                                <div class="services__content-hidden">
                                    <h2 class="title"><a href="<?php echo $server;?>szolgaltatasok/lemezteto-keszites/">Lemeztető készítés</a></h2>
									<h3 style="font-weight:400;font-size: 1.3rem;">(Korcolt lemezes tetőfedés, Trapézlemezes tetőfedés)</h3>
                                    <p>
										A lemezes tetőfedés szintén kitűnő választás és ennél a szolgáltatásunknál is lehetősége van több színből választania.
									</p>
                                    <div class="services__btn">
                                        <a class="btn" data-bs-toggle="offcanvas" data-bs-target="#lemez_color">Tekintse meg kínálatunkat <img src="<?php echo $server;?>assets/img/icons/right_arrow.svg" alt="<?php echo $alt;?>"></a>
                                        <a class="btn" data-bs-toggle="modal" data-bs-target="#offer">Árajánlatkérés <img src="<?php echo $server;?>assets/img/icons/right_arrow.svg" alt="<?php echo $alt;?>"></a>
                                    </div>
                                </div>
								<!--offcanvas-->
								<div class="offcanvas offcanvas-bottom" tabindex="-1" id="lemez_color" aria-labelledby="offcanvasBottomLabel" style="min-height: 80%;">
									<div class="offcanvas-header">
										<h5 class="offcanvas-title" id="offcanvasBottomLabel">Elérhető színek lemezes tetőfedéshez</h5>
										<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
									</div>
									<div class="offcanvas-body small">
										<div class="product-desc-wrap" style="margin-top: 10px;">
											<ul class="nav nav-tabs" id="myTab2" role="tablist">
												<li class="nav-item" role="presentation">
													<button class="nav-link active" id="standard-tab" data-bs-toggle="tab" data-bs-target="#standard-tab-pane" type="button" role="tab" aria-controls="standard-tab-pane" aria-selected="true">Standard bevonatok</button>
												</li>
											</ul>
											<div class="tab-content" id="myTabContent2">
												<div class="tab-pane fade active show" id="standard-tab-pane" role="tabpanel" aria-labelledby="standard-tab" tabindex="0">
													<p>
														Válassza ki a tető színét és nézze meg, hogyan is nézne ki a a tető az adott színnel.
													</p>
													<br />
													<br />
													<div class="row">
														<div class="col-md-4">
															<div class="row">
																<div class="col-md-3">
																	<div id="01" class="services__item-four" style="background: #bd9e6e;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span>Gabona sárga cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="02" class="services__item-four" style="background: #d2c59b;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span>Bézs cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="03" class="services__item-four" style="background: #92251e;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Tűzpiros cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="04" class="services__item-four" style="background: #651e1e;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Téglavörös cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="05" class="services__item-four" style="background: #751e2a;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Meggy piros cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="06" class="services__item-four" style="background: #033d78;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Kék cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="07" class="services__item-four" style="background: #4c6b4f;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Világos zöld cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="08" class="services__item-four" style="background: #283b2b;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Katona zöld cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="09" class="services__item-four" style="background: #252f37;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Antracit szürke cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="10" class="services__item-four" style="background: #b2bebc;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="">Világos szürke cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="11" class="services__item-four" style="background: #7a4528;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Világos barna cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="12" class="services__item-four" style="background: #362422;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Sötét barna cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="13" class="services__item-four" style="background: #deddca;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="">Tört fehér cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="14" class="services__item-four" style="background: #8c8a8c;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Ezüst metál cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="15" class="services__item-four" style="background: #858586;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="color:#fff">Grafit metál cserepeslemez</span>
																		</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div id="16" class="services__item-four" style="background: #fffff4;padding:25px 20px 30px">
																		<div class="services__content-four">
																			<span style="">Tiszta fehér cserepeslemez</span>
																		</div>
																	</div>
																</div>
															</div>
															
														</div>
														<div class="col-md-8">
															<div class="row"  id="content-display_lemez">
																
															</div>
														</div>
														
													</div>
												</div>
												<script>
													document.addEventListener('DOMContentLoaded', function() {
														// Minden services__item-four osztályú elemre hozzáadunk egy kattintásfigyelőt
														var items = document.querySelectorAll('.services__item-four');
														items.forEach(function(item) {
															item.addEventListener('click', function() {
																// Az adott elem id-jának megszerzése
																var itemId = this.getAttribute('id');
																// Az új tartalom beállítása a jobb oldali col-md-6-ba
																var imageUrl = '<?php echo $server;?>images/lemez_color/' + itemId + '.jpg';
																var imgElement = document.createElement('img');
																imgElement.src = imageUrl;
																imgElement.alt = 'Kép megjelenítve az id alapján';
																imgElement.style.maxHeight = '400px'; // maximalizáljuk a magasságot 400px-re
																document.getElementById('content-display_lemez').innerHTML = '';
																document.getElementById('content-display_lemez').appendChild(imgElement);
															});
														});
													});

												</script>
											</div>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </section>
            <!-- services-area-end -->
           
            <!-- project-area -->
            <section class="project__area project__bg" data-background="<?php echo $server;?>assets/img/bg/project__bg.jpg" id="works">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-5 col-lg-6 col-md-8">
                            <div class="section__title white-title mb-70">
                                <h2 class="title">Munkáink</h2>
                                <h4 class="number">04</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4">
                            <div class="project__nav">
                                <button class="project-button-prev"><i class="renova-left-arrow"></i></button>
                                <button class="project-button-next"><i class="renova-right-arrow"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="swiper project-active">
                        <div class="swiper-wrapper">
						
                            <div class="swiper-slide">
                                <div class="project__item">
                                    <div class="project__thumb">
										<img src="<?php echo $server;?>images/works/w01.jpg" alt="<?php echo $alt;?>">
                                    </div>
                                    <div class="project__content">
                                        <div class="content">
                                            <h2 class="title">
												<?php echo $title;?>
											</h2>
                                            <span>Cserepeslemezes tetőfedés, lemeztető készítés, lemeztető felrakása</span>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
							<div class="swiper-slide">
                                <div class="project__item">
                                    <div class="project__thumb">
										<img src="<?php echo $server;?>images/works/w02.jpg" alt="<?php echo $alt;?>">
                                    </div>
                                    <div class="project__content">
                                        <div class="content">
                                            <h2 class="title">
												<?php echo $title;?>
											</h2>
                                            <span>Cserepeslemezes tetőfedés, lemeztető készítés, lemeztető felrakása</span>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
							<div class="swiper-slide">
                                <div class="project__item">
                                    <div class="project__thumb">
										<img src="<?php echo $server;?>images/works/w03.jpg" alt="<?php echo $alt;?>">
                                    </div>
                                    <div class="project__content">
                                        <div class="content">
                                            <h2 class="title">
												<?php echo $title;?>
											</h2>
                                            <span>Cserepeslemezes tetőfedés, lemeztető készítés, lemeztető felrakása</span>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
							<div class="swiper-slide">
                                <div class="project__item">
                                    <div class="project__thumb">
										<img src="<?php echo $server;?>images/works/w04.jpg" alt="<?php echo $alt;?>">
                                    </div>
                                    <div class="project__content">
                                        <div class="content">
                                            <h2 class="title">
												<?php echo $title;?>
											</h2>
                                            <span>Cserepeslemezes tetőfedés, lemeztető készítés, lemeztető felrakása</span>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
							<div class="swiper-slide">
                                <div class="project__item">
                                    <div class="project__thumb">
										<img src="<?php echo $server;?>images/works/w05.jpg" alt="<?php echo $alt;?>">
                                    </div>
                                    <div class="project__content">
                                        <div class="content">
                                            <h2 class="title">
												<?php echo $title;?>
											</h2>
                                            <span>Cserepeslemezes tetőfedés, lemeztető készítés, lemeztető felrakása</span>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- project-area-end -->
            <!-- faq-area -->
            <section class="faq__area section-py-120">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7">
                            <div class="section__title mb-70">
                                <h2 class="title">Gyakori kérdések</h2>
                                <h4 class="number">05</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-6 col-md-10">
                            <div class="faq__img wow img-custom-anim-left animated"  data-wow-duration="1.5s" data-wow-delay="0.1s">
                                <img src="<?php echo $server;?>images/faq.webp" alt="<?php echo $alt;?>">
                                <div class="faq__img-content">
                                    <h5 class="title">Minden kérdés esetén állunk rendelkezésre!</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="faq__wrap">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Milyen típusú cserepeslemez a legmegfelelőbb a tetőmre?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
													A megfelelő típusú cserepeslemez kiválasztása függ a tető dőlésszögétől, a helyi éghajlattól és az elvárásoktól. Például, a hagyományos kerámia cserepek 
													tartósak és esztétikusak, míg a fém cserepek könnyebbek és könnyebben telepíthetők. További részletekért kérem tekintse meg cserepeslemezes tetőfedés szolgáltatásunkat
													vagy írjön üzenetet nekünk.
												</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												Mennyire bonyolult a cserepeslemez tető felrakása?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
													A cserepeslemez tetőfelrakása általában időigényes feladat, ami tapasztalatot és szakértelmet igényel. A pontos felmérés, a megfelelő előkészítés és a szakszerű 
													szerelés kulcsfontosságú a tartósság és a vízzárás szempontjából. Kérjen online ingyenes árajánlatot és kollégánk garantáltan a lehető leghamarabb felkeresi Önt, hogy 
													egyeztethessenek a részletekről.
												</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
												Mennyire tartósak és karbantarthatóak a cserepeslemezek?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
													A cserepeslemezek általában tartósak és könnyen karbantarthatóak. A fémlemezek ellenállnak a korróziónak és könnyen tisztíthatóak, míg a 
													kerámia cserepek hosszú élettartammal rendelkeznek és ellenállnak a környezeti hatásoknak. A cserepeslemezek karbantartása ugyanakkor szükséges, amivel 
													kapcsolatban szintén igénybe veheti szolgáltatásunkat. A részletekért kérem írjon özenetet vagy kérjen visszahívést ingyenesen weboldalunkon.
												</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
												Mennyibe kerül a tetőfedés cserepeslemezzel?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
													Az ár számos tényezőtől függ, beleértve a tető méretét és dőlésszögét, a kiválasztott cserepeslemez anyagát és típusát, valamint az anyagköltségeket. 
													Ezenkívül az előkészítési munkák, például a régi tető eltávolítása és a szükséges javítások is befolyásolják az árat. Általánosságban elmondható, hogy a cserepeslemez 
													felrakása esetenként ugyan drágább mint a hagyomásnyos zsindelytetőké, de hosszú távon a tartósság és az alacsonyabb karbantartási költségek miatt értékes befektetés lehet.
												</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- faq-area-end -->
            <!-- work-area -->
            <section class="work__area tg-motion-effects">
                <div class="container">
                    <div class="work__wrapper">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="work__content">
                                    <h2 class="title">Készen áll, hogy együtt dolgozhassunk?</h2>
                                    <div class="work__btn">
                                        <a href="<?php echo $server;?>kapcsolat/" class="btn btn-two">Írjon üzenetet <img src="<?php echo $server;?>assets/img/icons/right_arrow.svg" alt="<?php echo $alt;?>" ></a>
                                        <a data-bs-toggle="modal" data-bs-target="#offer" class="btn btn-three">Kérjen árajánlatot <img src="<?php echo $server;?>assets/img/icons/right_arrow.svg" alt="<?php echo $alt;?>" ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="work__img-wrap">
                            <ul class="list-wrap">
                                <li data-aos="zoom-in" data-aos-delay="200">
                                    <img src="<?php echo $server;?>assets/img/images/work_img01.png" alt="<?php echo $alt;?>" class="tg-motion-effects2">
                                </li>
                                <li data-aos="zoom-in" data-aos-delay="300">
                                    <img src="<?php echo $server;?>assets/img/images/work_img02.png" alt="<?php echo $alt;?>" class="tg-motion-effects3">
                                </li>
                                <li data-aos="zoom-in" data-aos-delay="400">
                                    <img src="<?php echo $server;?>assets/img/images/work_img03.png" alt="<?php echo $alt;?>" class="tg-motion-effects3">
                                </li>
                                <li data-aos="zoom-in" data-aos-delay="200">
                                    <img src="<?php echo $server;?>assets/img/images/work_img04.png" alt="<?php echo $alt;?>" class="tg-motion-effects2">
                                </li>
                                <li data-aos="zoom-in" data-aos-delay="300">
                                    <img src="<?php echo $server;?>assets/img/images/work_img05.png" alt="<?php echo $alt;?>" class="tg-motion-effects3">
                                </li>
                                <li data-aos="zoom-in" data-aos-delay="400">
                                    <img src="<?php echo $server;?>assets/img/images/work_img06.png" alt="<?php echo $alt;?>" class="tg-motion-effects3">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- work-area-end -->
            <!-- blog-post-area -->
            <section class="blog__post-area section-pt-120 section-pb-90">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section__title mb-70">
                                <h2 class="title">Blog bejegyzéseink</h2>
                                <h4 class="number">06</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center gutter-24">
					<?php 
						$get_all_blog = get_all_blog();
						$counter = 0;
						$honapok = array(
							'January' => 'január',
							'February' => 'február',
							'March' => 'március',
							'April' => 'április',
							'May' => 'május',
							'June' => 'június',
							'July' => 'július',
							'August' => 'augusztus',
							'September' => 'szeptember',
							'October' => 'október',
							'November' => 'november',
							'December' => 'december'
						);

						foreach($get_all_blog as $blog) {
							if ($counter >= 3) {
								break; // Kilép a ciklusból, ha már 3 blogbejegyzést megjelenítettünk
							}
					?>
                        <div class="col-lg-4 col-md-6">
                            <div class="blog__post-item shine__animate-item">
                                <div class="blog__post-thumb">
                                    <a href="<?php echo $server.'blog-bejegyzesek/'.$blog['id'].'/'.urlencode($blog['blog_title'])?>" class="shine__animate-link">
                                    <img src="<?php echo $server;?>images/blog/<?php echo $blog['blog_images'];?>" alt="<?php echo $blog['blog_title'];?>">
                                    </a>
                                </div>
                                <div class="blog__post-content">
                                    <div class="blog__post-meta">
                                        <ul class="list-wrap">
                                            <li>Szerző: <a href="<?php echo $server.'blog-bejegyzesek/'.$blog['id'].'/'.urlencode($blog['blog_title'])?>">Varga Ferenc</a></li>
                                            <li><?php $datum = strtotime($blog['blog_date']); echo date('Y. ', $datum) . $honapok[date('F', $datum)] . date(' j.', $datum); ?></li>
                                        </ul>
                                    </div>
                                    <h4 class="title">
										<div style="color: white; font-size: 22px; transition: color 0.3s, font-size 0.5s;">
											<a href="<?php echo $server.'blog-bejegyzesek/'.$blog['id'].'/'.urlencode($blog['blog_title'])?>" onmouseover="this.style.color='#888'; this.style.fontSize='25px';" onmouseout="this.style.color='white'; this.style.fontSize='22px';">
												<?php echo $blog['blog_title'];?>
											</a>
										</div>

                                    </h4>
                                    <a href="<?php echo $server.'blog-bejegyzesek/'.$blog['id'].'/'.urlencode($blog['blog_title'])?>" class="btn">Elolvasom a blog bejegyzést</a>
                                </div>
                            </div>
                        </div>
                    <?php 
					$counter++;
					}
					?>			
						<div class="container-fluid">
							<div class="row">
								<div class="col d-flex justify-content-center">
									<a href="<?php echo $server;?>blog-bejegyzesek/">
										<button class="btn btn btn-three" style="width: 100%; font-size: 20px; display: inline-flex; align-items: center;">
											Az összes blog bejegyzés megtekintése
										</button>
									</a>
								</div>
							</div>
						</div>

                    </div>
					



                </div>
            </section>
            <!-- blog-post-area-end -->
            <!-- brand-area -->
            <div class="brand__area section-pb-120">
				<h3 style="text-align:center;font-weight:400">Legkedveltebb színek a cserepeslemezes tetőfedésnél</h3>
				<br />
                <div class="container">
                    <div class="swiper brand-active">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="brand__item" style="background-color:#252f37">
                                    <p style="margin-top: 10px;color:#ffff">Antracit szürke</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand__item" style="background-color:#8c8a8c">
                                    <p style="margin-top: 10px;color:#ffff">Ezüs metál</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand__item" style="background-color:#033d78">
                                    <p style="margin-top: 10px;color:#ffff">Kék</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand__item" style="background-color:#751e2a">
                                    <p style="margin-top: 10px;color:#ffff">Meggy piros</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand__item" style="background-color:#4c6b4f">
                                    <p style="margin-top: 10px;color:#ffff">Világos zöld</p>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->
        </main>
        <!-- main-area-end -->
        <!-- footer-area -->
        <footer class="footer__area">
            <div class="container">
                <div class="footer__features">
                    <a href="<?php echo $server;?>szolgaltatasok/cserepeslemezes-tetofedes/">Cserepeslemezes tetőfedés</a>
                    <a href="<?php echo $server;?>szolgaltatasok/tetofelujitas-cserepeslemezzel/">Tetőfelújítás cserepeslemezzel</a>
                    <a href="<?php echo $server;?>szolgaltatasok/lemezteto-keszites/">Lemeztető készítés </a>
                    <a href="<?php echo $server;?>szolgaltatasok/korcolt-lemezes-tetofedes/">Korcolt- és trapézlemezes tetőfedés</a>
                </div>
                <div class="footer__top">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="footer__widget">
                                <div class="footer__logo">
                                    <a href="<?php echo $server;?>"><img src="<?php echo $server;?>images/logo.png" alt="<?php echo $alt;?>"></a>
                                </div>
                                <div class="footer__content">
                                    <p>
										Mindenünk a tető! Legyen szó cserepeslemezes tetőfedésről, vagy cserepeslemezes tetőfelújításról vagy akár trapézlemezes esetleg korcolt lemezes tetőfedésről,
										állunk rendelezésére. Cégünk több mint 20 éves tapasztalattal rendelkezik a tetőfelújítás, tetőszigetelés terülén.
									</p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4">
                            <div class="footer__widget">
                                <h4 class="footer__widget-title">Oldalaink</h4>
                                <div class="footer__widget-link">
                                    <ul class="list-wrap">
                                        <li>
                                            <a href="<?php echo $server;?>"><i class="renova-right-arrow"></i><span>Kezdőoldal</span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $server;?>szolgaltatasok/cserepeslemezes-tetofedes/"><i class="renova-right-arrow"></i><span>Cserepeslemezes tetőfedés</span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $server;?>szolgaltatasok/tetofelujitas-cserepeslemezzel/"><i class="renova-right-arrow"></i><span>Tetőfelújítás cserepeslemezzel</span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $server;?>szolgaltatasok/lemezteto-keszites/"><i class="renova-right-arrow"></i><span>Lemeztető készítés</span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $server;?>szolgaltatasok/korcolt-lemezes-tetofedes/"><i class="renova-right-arrow"></i><span>Korcolt lemezes tetőfedés </span></a>
                                        </li>
										<li>
                                            <a href="<?php echo $server;?>szolgaltatasok/trapezlemezes-tetofedes/"><i class="renova-right-arrow"></i><span>Trapézlemezes tetőfedés </span></a>
                                        </li>
										<li>
                                            <a href="<?php echo $server;?>blog-bejegyzesek/"><i class="renova-right-arrow"></i><span>Blog bejegyzések </span></a>
                                        </li>
										<li>
                                            <a href="<?php echo $server;?>kapcsolat/"><i class="renova-right-arrow"></i><span>Kapcsolat</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                            <div class="footer__widget">
                                <h4 class="footer__widget-title">Hasznos lehet</h4>
                                <div class="footer__widget-link">
                                    <ul class="list-wrap">
										<li>
                                            <a href="#" target="_blank"><i class="renova-right-arrow"></i><span>Lapostető felújítása</span></a>
                                        </li>
										<li>
                                            <a href="#" target="_blank"><i class="renova-right-arrow"></i><span>Palatető szigetelése</span></a>
                                        </li>
                                        <li>
                                            <a href="https://teto-festes.hu/" target="_blank"><i class="renova-right-arrow"></i><span>Tető festés</span></a>
                                        </li>
                                        <li>
                                            <a href="https://tetofestese.hu/" target="_blank"><i class="renova-right-arrow"></i><span>Tető tisztítás</span></a>
                                        </li>
                                        <li>
                                            <a href="https://miskolc-ablak.hu" target="_blank"><i class="renova-right-arrow"></i><span>Nyílászárók beépítése</span></a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-8">
                            <div class="footer__widget">
                                <h4 class="footer__widget-title">Visszahívás</h4>
                                <div class="footer__newsletter">
                                    <p>Adja meg telefonszámát és kollégánk felkeresi Önt!</p>
                                    <form action="#" method="POST" class="footer__newsletter-form">
                                        <input type="text" id="phone" name="phone" placeholder="Telefonszáma">
                                        <button type="submit" id="call" name="call" class="btn btn-two">Kérés elküldése</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer__bottom">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="copyright-text">
                                <p>© <?php echo date('Y');?> <?php echo $_SERVER[HTTP_HOST];?> | Tetőfelújítás cserepeslemezzel | Cserepeslemezes Tetőfedés | Lemeztető Készítés</p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="footer__bottom-menu">
                                <ul class="list-wrap">
                                    <li><a href="#">Általános Szerződési Feltételek</a></li>
                                    <li><a href="#">Adatvédelmi Tájékoztató</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-area-end -->
        <!-- JS here -->
        <script src="<?php echo $server;?>assets/js/vendor/jquery-3.6.0.min.js"></script>
        <script src="<?php echo $server;?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo $server;?>assets/js/isotope.pkgd.min.js"></script>
        <script src="<?php echo $server;?>assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="<?php echo $server;?>assets/js/jquery.magnific-popup.min.js"></script>
        <script src="<?php echo $server;?>assets/js/jquery.odometer.min.js"></script>
        <script src="<?php echo $server;?>assets/js/jquery.appear.js"></script>
        <script src="<?php echo $server;?>assets/js/swiper-bundle.min.js"></script>
        <script src="<?php echo $server;?>assets/js/jquery.marquee.min.js"></script>
        <script src="<?php echo $server;?>assets/js/tg-cursor.min.js"></script>
        <script src="<?php echo $server;?>assets/js/ajax-form.js"></script>
        <script src="<?php echo $server;?>assets/js/jquery-ui.min.js"></script>
        <script src="<?php echo $server;?>assets/js/svg-inject.min.js"></script>
        <script src="<?php echo $server;?>assets/js/tween-max.min.js"></script>
        <script src="<?php echo $server;?>assets/js/wow.min.js"></script>
        <script src="<?php echo $server;?>assets/js/aos.js"></script>
        <script src="<?php echo $server;?>assets/js/main.js"></script>
    </body>

</html>