<?php 
session_start();

include('config/connect.php');
require_once('config/functions.php');

$server = "https://miskolc-ablak.hu/";
$telefon = "+36 (30) 103-1740";
$email = "info@miskolc-ablak.hu";
$owner = "Mata Oszkár";
$address = "Miskolc, Bársony János utca";

if (isset($_POST["phone"])) {
// Telefonszám beérkezett, hozzunk létre egy Bootstrap modal ablakot

$to  = 'info@miskolc-ablak.hu';
$subject = 'Visszahívást kértek ('.$_SERVER['SERVER_NAME'].')';
$message = '

	<p>Kedves domain név tulajdonos!</p>
	<br />
	Visszahívást kértek a weboldalról. 
	<br /><br /><b>Domain:</b>'.$_SERVER['SERVER_NAME'].'<br>
	<b>Telefonszám:</b><a href="tel:'.$_POST['phone'].'">'.$_POST['phone'].'</a><br /><br /><br />

';

// To send HTML mail, the Content-type header must be set
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'To: Oszi <info@miskolc-ablak.hu>' . "\r\n";
$headers .= 'From: ' . $_SERVER['SERVER_NAME'] . ' <no-reply@vargasoft.hu>' . "\r\n";

if (mail($to, $subject, $message, $headers)) {
	echo '
	<div class="ttm-topbar-content" style="text-align:center;">
		<h3 style="background-color: #f31717; color: white; padding: 10px;text-aign:center">Köszönjük! Kollégánk hamarosan felkeresi Önt a megadott telefonszámon!</h3>
		<h2><a href="https://miskolc-ablak.hu">Vissza a weboldalra</a></h2>
	</div>
';
	exit;
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

if (isset($_POST["name"])) {
// Telefonszám beérkezett, hozzunk létre egy Bootstrap modal ablakot

$to  = 'info@miskolc-ablak.hu';
$subject = 'Árajánlatkérés érkezett ('.$_SERVER['SERVER_NAME'].')';
$message = '

	<p>Kedves domain név tulajdonos!</p>
	<br />
	Weboldaláról árajánlatkérés érkezett az alábbi részletekkel:
	<br /><br /><b>Domain:</b>'.$_SERVER['SERVER_NAME'].'<br>
	<b>Név:</b><a href="tel:'.$_POST['name'].'">'.$_POST['name'].'</a><br />
	<b>Telefonszám:</b><a href="tel:'.$_POST['phone_number'].'">'.$_POST['phone_number'].'</a><br />
	<b>Email cím:</b><a href="tel:'.$_POST['email'].'">'.$_POST['email'].'</a><br />
	<b>Pontos cím:</b><a href="tel:'.$_POST['address'].'">'.$_POST['address'].'</a><br />
	<b>Kiválasztott szolgáltatás:</b><a href="tel:'.$_POST['service'].'">'.$_POST['service'].'</a><br />
	<b>Üzenet:</b><br />'.$_POST['message'].'<br />
	
	<br /><br />

';

// To send HTML mail, the Content-type header must be set
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'To: Oszi <info@miskolc-ablak.hu>' . "\r\n";
$headers .= 'From: ' . $_SERVER['SERVER_NAME'] . ' <no-reply@vargasoft.hu>' . "\r\n";

if (mail($to, $subject, $message, $headers)) {
	echo '
	<div class="ttm-topbar-content" style="text-align:center;">
		<h3 style="background-color: #f31717; color: white; padding: 10px;text-aign:center">Kedves '.$_POST['name'].'! Köszönjük bizalmát. Üzenetét hamarosan feldolgozzuk és kollégánk keresni fogja Önt.</h3>
		<h2><a href="https://miskolc-ablak.hu">Vissza a weboldalra</a></h2>
	</div>
';
	exit;
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
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
		<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-D9T9GSLTC9"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'G-D9T9GSLTC9');
		</script>
		<script type="text/javascript">
			(function(c,l,a,r,i,t,y){
				c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
				t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
				y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
			})(window, document, "clarity", "script", "kslk75d920");
		</script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		
        <title>Miskolc Ablak | Műanyag ablak beépítés Miskolcon | Ablakbeszerelés Miskolc</title>
        <meta name="keywords" content="műanyag ablak, ablakok, beépítés, cserélés, műanyag nyílászárók, Miskolc, ajtók, nyílászáró, energiahatékony ablakok, Miskolc ablak">
		<meta name="description" content="Akár néhány műanyag ablakra, akár egy teljes háznyi új ablakra van szüksége, képzett szakembereink állnak rendelkezésére. Cégünk elsősorban Miskolcon és környékén végzi műanyag ablakcsere szolgáltatását hatékonyan javítva az ingatlan értékét és az ablakok hőszigetelő képességét. Kérjen most ingyenes ajánlatot">
		<meta name="author" content="VargaSoft" />
		
		<meta property="og:title" content="Miskolc Ablak, Miskolc és környékén minőségi műanyag ablakok széles választékban">
		<meta property="og:description" content="Akár néhány műanyag ablakra, akár egy teljes háznyi új ablakra van szüksége, képzett szakembereink állnak rendelkezésére. Cégünk elsősorban Miskolcon és környékén végzi műanyag ablakcsere szolgáltatását hatékonyan javítva az ingatlan értékét és az ablakok hőszigetelő képességét. Kérjen most ingyenes ajánlatot.">
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://miskolc-ablak.hu">
		<meta property="og:image" content="https://miskolc-ablak.hu/images/fb_logo.png">
		<meta property="og:site_name" content="VargaSoft">
		<meta property="og:locale" content="hu_HU">
		<meta property="og:keywords" content="Akár néhány műanyag ablakra, akár egy teljes háznyi új ablakra van szüksége, képzett szakembereink állnak rendelkezésére. Cégünk elsősorban Miskolcon és környékén végzi műanyag ablakcsere szolgáltatását hatékonyan javítva az ingatlan értékét és az ablakok hőszigetelő képességét. Kérjen most ingyenes ajánlatot">
		<meta property="fb:app_id" content="100093287431136">
		
		<meta name="DC.title" content="Miskolc és környékén minőségi műanyag ablakok széles választékban">
		<meta name="DC.description" content="Profi beépítés és szaktanácsadás a legmegbízhatóbb megoldásokért. Kérjen most ingyenes ajánlatot!">
		<meta name="DC.publisher" content="VargaSoft">
		<meta name="DC.date" content="2023-12-11">
		<meta name="DC.language" content="hu">
		<meta name="DC.subject" content="műanyag ablak, ablakok, beépítés, cserélés, műanyag nyílászárók, Miskolc, ajtók, nyílászáró, energiahatékony ablakok, Miskolc ablak">
		
		<meta property="article:published_time" content="2023-11-18T07:55:54+01:00">
        <meta property="article:modified_time" content="2024-01-22T14:22:20+01:00">
		
		<script type="application/ld+json">
		{
		  "@context": "http://schema.org",
		  "@type": "LocalBusiness",
		  "name": "Miskolc Ablak",
		  "description": "Miskolc és környékén minőségi műanyag ablakok széles választékban. Profi beépítés és szaktanácsadás a legmegbízhatóbb megoldásokért.",
		  "telephone": "+36 (30) 103-1740",
		  "sameAs": ["https://www.ajto-ablak-miskolc.hu/"],
		  "priceRange": "$$$",
		  "url": "https://miskolc-ablak.hu",
		  "logo": "https://miskolc-ablak.hu/images/miskolc-ablak.jpg",
		  "image": "https://miskolc-ablak.hu/images/miskolc-ablak.jpg",
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
				"@type": "Rating",,
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
					  "item": "https://miskolc-ablak.hu/szolgaltatasok/<?php echo $services['id'].'/'.$services['link'].'/';?>"
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
			  "url": "https://miskolc-ablak.hu/blog-bejegyzesek/",
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
				  "image": "https://miskolc-ablak.hu/images/blog/<?php echo $blog['blog_images']; ?>",
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
				{
				  "@type": "Question",
				  "name": "Hogyan tudok árajánlatot kérni műanyag ablak beépítésre?",
				  "acceptedAnswer": {
					"@type": "Answer",
					"text": "Weboldalunkon több helyen is megjelenik az a lehetőség, hogy \"Árajánlatkérés\". Önnek elég rákattintania és a kért adatokat megadnia. Fontos, hogy a megjegyzés rovatba a lehető legrészletesebben írja le elképzelését, kívánságát. Kollégáink előzetesen ezek alapján tudnak megközelítő árat mondani a műanyag ablak beszerelésére. Fontos tudni, hogy az árajánlatkérés önmagában nem minősül részünkről árajánlattételnek. Teljesen pontos árat csakis helyszíni kiszállást követően áll módunkban adni, amelyet szerződésbe is foglalunk."
				  }
				},
				{
				  "@type": "Question",
				  "name": "Csak Miskolcon vehetem igénybe a szolgáltatásokat?",
				  "acceptedAnswer": {
					"@type": "Answer",
					"text": "Örömmel jelentjük, hogy most már nem csak Miskolcon, de miskolc vonzáskörzetében is igénybe vehetik az alábbi szolgáltatásainkat: műanyag ablak beépítése, beltéri ajtók beépítése, bejárati ajtók beépítése, szúnyogháló készítés és beépítés, redőny beépítés és erkélyfelújítás."
				  }
				},
				{
				  "@type": "Question",
				  "name": "Mi a szolgáltatás megrendelésének menete? ",
				  "acceptedAnswer": {
					"@type": "Answer",
					"text": "Önnek lehetősége van az alábbi csatornákon megrendelést rögzíteni: telefonon, email-ben és a weboldalunkon keresztül. A weboldalunkon lehetősége van ingyenes visszahívás kérésére vagy akár árajánlat kérésére is. Miután a üzenetét feldolgoztuk, kollégánk a megadott elérhetőségén (telefon) keresni fogja. Időpontot egyeztetünk személyes megbeszélésre és a részleteket egyeztetjük."
				  }
				},
				{
				  "@type": "Question",
				  "name": "Mennyi idő kell a műanyag ablak beépítésére?",
				  "acceptedAnswer": {
					"@type": "Answer",
					"text": "Általános érvényű választ erre nem tudunk adni. Ez több tényezőtől is függ. (Nyílászáró típusa, mérete, darabszám, a beszerelés helye, stb.) De általában elmondható, hogy egy műanyag ablak beszerelését a bontási munkákkal együtt nagyjából 2-4 óra alatt elvégezzük. Előfordulhatnak azonban esetek, amikor egy-egy munka akár 4-6 órát is igénybe vehet."
				  }
				},
				{
				  "@type": "Question",
				  "name": "Mikor tudjál elvállalni a nyílásszáró beépítését?",
				  "acceptedAnswer": {
					"@type": "Answer",
					"text": "Mindenekelőtt tudnia kell, hogy mi egyéni vállalkozóként végezzük a nyílászárók beépítését, ezért kapacitásunk behatárolt. Ugyanakkor minden beérkező kérésre a lehető leghamarabb (legkésőbb 1-2 munkanap) A beszerlés ideje attól is függ, hogy milyen nyílászárót kell beépíteni (típus, méret, darabszám stb.) hiszen azt még le kell gyártatnunk. Az esetek többségében pár héten (2-4 hét) elvégezzük a nyílászáró cseréjét."
				  }
				},
				{
				  "@type": "Question",
				  "name": "Lehetőség van ablakbeszerelésre csak alkatrészt rendelni Önöktől?",
				  "acceptedAnswer": {
					"@type": "Answer",
					"text": "Cégünk nem értékesít alkatrészeket. Sem szúnyogháló, sem redőny javítására szerelésére nem áll módunkban alkatrészeket értékesíteni."
				  }
				},
				{
				  "@type": "Question",
				  "name": "Hogyan tudom a garanciát érvényesíteni?",
				  "acceptedAnswer": {
					"@type": "Answer",
					"text": "Az általunk végzett munkákra minden esetben írásos garanciát adunk. Ez azt jelenti, hogy a szerződésben is foglalt vállalásunknak eleget teszünk. Ha valamely általunk beépítésre került elem (műanyag ablak, párkány, redőny, szúnyogháló, bejárati ajtó vagy beltéri ajtó) meghibásodott ill. az nem rendeltetésszerűen működik vegye fel velünk a kapcsolatot minél hamarabb. Kollégánk keresni fogja Önt. Ez általában hamar meg szokott történni."
				  }
				},
				{
				  "@type": "Question",
				  "name": "Mi történik a törmelékekkel amelyek a szerelés, beépítés során keletkeztek?",
				  "acceptedAnswer": {
					"@type": "Answer",
					"text": "Kollégáink minden esetben gondoskodnak a keletkezett hulladékok elszállításáról. Önnek ezzel nem kell foglalkoznia. Az ablakbeépítés, ajtó beépítés, redőny és szúnyogháló készítés során felmerülő anyagok újrahasznosítása is fontos szempont lehet. Például a használt ablakokat és ajtókat, amennyiben alkalmasak a további felhasználásra, lehetőség szerint újrahasznosítjuk vagy újrahasznosító létesítményekbe szállítjuk.\n\nEmellett a munkavégzés során ügyelünk arra is, hogy minimálisra csökkentsük az anyagveszteséget és a környezeti terhelést.Például a megrendelt munkadarabokat pontosan méretezzük és alakítjuk ki, hogy csökkentsük az esetleges felesleges anyaghasználatot.\n\nÖsszességében tehát a hulladékkezelés és az anyagok megfelelő újrahasznosítása fontos része a szerelési és beépítési folyamatainknak, amely hozzájárul a környezetvédelemhez és a fenntarthatósághoz."
				  }
				}
			  ]
			}
		</script>



		
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes" />
		
       
		
        <!-- favicon icon -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $server;?>/images/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $server;?>/images/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $server;?>/images/favicon/favicon-16x16.png">
		<link rel="manifest" href="<?php echo $server;?>/images/favicon/site.webmanifest">

        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/bootstrap.min.css"/>
        <!-- animate -->
        <link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/animate.css"/>
        <!-- owl-carousel -->
        <link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/owl.carousel.css">
        <!-- fontawesome -->
        <link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/font-awesome.css"/>
        <!-- themify -->
        <link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/themify-icons.css"/>
        <!-- flaticon -->
        <link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/flaticon.css"/>
        <!-- REVOLUTION LAYERS STYLES -->
        <link rel="stylesheet" type="text/css" href="<?php echo $server;?>revolution/css/layers.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $server;?>revolution/css/settings.css">
        <!-- prettyphoto -->
        <link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/prettyPhoto.css">
        <!-- shortcodes -->
        <link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/shortcodes.css"/>
        <!-- main -->
        <link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/main.css"/>
        <!--Color Switcher Mockup-->
        <link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/color-switcher.css" >
        <!--Color Themes-->
        <link id="switcher-color" href="<?php echo $server;?>css/colors/default-color.css" rel="stylesheet">
        <!-- responsive -->
        <link rel="stylesheet" type="text/css" href="<?php echo $server;?>css/responsive.css"/>
		<style>
		.prt_floting_customsett {
			display: none;
		}
		</style>
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
			"href": "/p/cookies-policy.html"
		  }
		});
		}                                           );                                       
		//]]>
		</script>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

		<!-- Popper.js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

		<!-- Bootstrap JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

		

    </head>
    <body>
	
	<!-- Modal -->
	<!-- Modal -->
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
									Az akció kiterjed műanyag ablak beépítésére, redőny készítésre és beépítésére, valamint szúnyogháló készítésére és beépítésére is. 
									Weboldalunkon kattintson az árajánlatkérés gombra!
								</p>
								<small>
									A kedvezmény mértéke minimum 20% és az csak korlátozottan elérhető. A kedvezmény csak egy szolgáltatás igénybevételére vonatkozik, 
									és azt ugyanabban az ingatlanban csak egyszer lehet igénybe venni. Az ajánlat igénybevételével Ön automatikusan elfogadja az adatkezelési irányelveinket.
								</small>
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
					<!-- Ide helyezze el a modális ablak tartalmát -->
				</div>
			</div>
		</div>
	</div>
	<!--back-to-top end-->
		<!-- Adatkezelés -->
	<div class="modal fade" id="privacyPolicyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLabel">Adatkezelési tájékoztató</h3>
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

					<p>Tevékenységeinket egyéni vállalkozóként Lipták Gábor végzi.</p>
					<p>A vállalkozásunk székhelye: 3572 Sajólád, Móra Ferenc utca 5.</p>
					<p>A vállalkozásunk telephelye: 3572 Sajólád, Móra Ferenc utca 5.</p>
					<p>A vállalkozás ügyintézéseivel megbízott személy: Mata Oszkár</p>
					<p>A vállalkozásunk honlapja: www.miskolc-ablak.hu</p>
					<p>Kapcsolattartás: email, telefon</p>
					<p>Postacímünk: 3572 Sajólád, Móra Ferenc utca 5.</p>
					<p>Telefonszámunk: 06-30-103-1740</p>
					<p>E-mail címünk: info@miskolc-ablak.hu</p>
					<p>Adószámunk: 43337668-1-25</p>

					<p>Vállalkozásunk a GDPR 37. cikke alapján nem köteles adatvédelmi tisztviselő kinevezésére.</p>
					<p>Vállalkozásunk tárhely szolgáltatójának neve, címe és elérhetősége: Websupport Magyarország Kft., info@ezit.hu</p>
					
					<br />
					<p>A weboldalunk látogatóinktól csak akkor kérjük személyes adataikat, ha érdeklődni szeretnénk az oldalon. </p>
					<p>Az adatkezeléssel kapcsolatos kérdéseivel Ön az info@miskolc-ablak.hu e-mail, illetve postacímen kérhet további tájékoztatást, válaszunkat késedelem nélkül, 20 napon belül (legfeljebb azonban 1 hónapon belül) megküldjük Önnek az Ön által megadott elérhetőségre. </p>   
					  
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
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
							Jelen Általános Szerződési Feltételek (a továbbiakban: ÁSZF) szabályozzák <strong>Lipták Gábor</strong> egyéni vállalkozó (székhely: <i>3572 Sajólád, Móra Ferenc utca 5.</i>, adószám: <i>43337668-1-25</i>, megbízott: <strong>Mata Oszkár</strong>), mint 
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
        <!--page start-->
        <div class="page">
            <!-- preloader start -->
            <div id="preloader">
                <div id="status">&nbsp;</div>
            </div>
            <!-- preloader end -->
            <!--header start-->
            <header id="masthead" class="header ttm-header-style-classic">
                <!-- ttm-topbar-wrapper -->
                <div class="ttm-topbar-wrapper ttm-bgcolor-darkgrey ttm-textcolor-white clearfix">
                    <div class="container">
                        <div class="ttm-topbar-content">
                            <ul class="top-contact ttm-highlight-left text-left">
                                <li><i class="fa fa-phone"></i><strong>Telefonszámunk:</strong> <span class="tel-no"><a href="tel:<?php echo $telefon;?>" style="color: white; text-decoration: none;"><?php echo $telefon;?></a></span></li>
                            </ul>
                            <div class="topbar-right text-right">
                                <ul class="top-contact">
                                    <li><i class="fa fa-envelope-o"></i><strong>Email: </strong><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ttm-topbar-wrapper end -->
                <!-- ttm-header-wrap -->
                <div class="ttm-header-wrap">
                    <!-- ttm-stickable-header-w -->
                    <div id="ttm-stickable-header-w" class="ttm-stickable-header-w clearfix">
                        <div id="site-header-menu" class="site-header-menu">
                            <div class="site-header-menu-inner ttm-stickable-header">
                                <div class="container">
                                    <!-- site-branding -->
                                    <div class="site-branding">
                                        <a class="home-link" href="<?php echo $server;?>" title="Miskolc Ablak" rel="home">
                                        <img id="logo-img" class="img-center" src="<?php echo $server;?>images/logo-img.png" alt="Miskolc Ablak">
                                        </a>
                                    </div>
                                    <!-- site-branding end -->
                                    <!--site-navigation -->
                                    <div id="site-navigation" class="site-navigation">
                                        <div class="header-btn">
                                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-black" href="#arajanlatkeres" style="text-transform: uppercase;background-color:#fe5d15;color:white">Ájánlatkérés</a>
                                        </div>
                                        
                                        <!-- header-icons end -->
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
                                                <li class="active">
                                                    <a href="<?php echo $server;?>">Kezdőlap</a>
                                                </li>
                                                <li>
                                                    <a href="#services">Szolgáltatásaink</a>
                                                   
                                                </li>
                                                <li>
                                                    <a href="#referencia_munkaink">Referencia munkáink</a>
                                                   
                                                </li>
                                                <li>
                                                    <a href="#blog">Blog bejegyzések</a>
                                                   
                                                </li>
                                               
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- site-navigation end-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ttm-stickable-header-w end-->
                </div>
                <!--ttm-header-wrap end -->
            </header>
            <!--header end-->
            <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container slide-overlay" data-alias="classic4export" data-source="gallery">
                <!-- START REVOLUTION SLIDER 5.4.8 auto mode -->
                <div id="rev_slider_4_1" class="rev_slider fullwidthabanner" data-version="5.4.8.1">
                    <ul>
                        <li data-index="rs-3" data-transition="slotslide-horizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <img src="<?php echo $server?>images/img01.jpg" alt="Miskolc Ablak / Ablakcsere / Műanyag Ablak Miskolc" title="slider-mainbg-001" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                            <div class="tp-caption tp-resizeme" id="slide-3-layer-1" data-x="['left','left','center','center']" data-hoffset="['50','40','0','0']" data-y="['top','top','middle','middle']" data-voffset="['169','179','-136','-86']"
                                data-fontsize="['18','18','15','12']"
                                data-lineheight="['20','20','20','15']"
                                data-fontweight="['200','200','200','200']"
                                data-color="['rgb(242, 244, 248)','rgb(242, 244, 248)','rgb(242, 244, 248)','rgb(242, 244, 248)']"
                                data-letterspacing="['3','3','3','3']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-type="text"
                                data-responsive_offset="on"
                                data-frames='[{"delay":130,"speed":400,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power0.easeIn"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]" > Üdvözlöm weboldalunkon! </div>
                            <div class="tp-caption tp-resizeme" id="slide-3-layer-2" data-x="['left','left','center','center']" data-hoffset="['49','39','0','0']" data-y="['top','top','middle','middle']" data-voffset="['189','199','-83','-44']"
                                data-fontsize="['75','75','60','40']"
                                data-lineheight="['100','100','80','50']"
                                data-fontweight="['600','600','600','600']"
                                data-color="['rgb(242, 244, 248)','rgb(242, 244, 248)','rgb(242, 244, 248)','rgb(242, 244, 248)']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-type="text"
                                data-responsive_offset="on"
                                data-frames='[{"delay":350,"speed":800,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power0.easeIn"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]" >Műanyag ablakok, <strong class="ttm-textcolor-skincolor">időtálló </strong> </div>
                            <div class="tp-caption tp-resizeme" id="slide-3-layer-3" data-x="['left','left','center','center']" data-hoffset="['50','40','0','0']" data-y="['top','top','top','top']" data-voffset="['271','281','170','156']"
                                data-fontsize="['75','75','60','40']"
                                data-lineheight="['100','100','80','50']"
                                data-fontweight="['600','600','600','600']"
                                data-color="['rgb(242, 244, 248)','rgb(242, 244, 248)','rgb(242, 244, 248)','rgb(242, 244, 248)']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-type="text"
                                data-responsive_offset="on"
                                data-frames='[{"delay":840,"speed":800,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power0.easeIn"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]">minőség otthonában </div>
                            
                            <a class="tp-caption skin-flat-button tp-resizeme" href="#referencia_munkaink" target="_self" id="slide-3-layer-9" data-x="['left','left','center','center']" data-hoffset="['50','40','0','0']" data-y="['top','top','middle','middle']" data-voffset="['452','462','121','69']"
                                data-fontsize="['13','13','12','11']"
                                data-lineheight="['13','13','12','11']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-type="text"
                                data-actions=''
                                data-responsive_offset="on"
                                data-frames='[{"delay":1970,"speed":500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power0.easeIn"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[20,20,15,12]"
                                data-paddingright="[30,30,25,20]"
                                data-paddingbottom="[20,20,15,12]"
                                data-paddingleft="[30,30,25,20]">Tekintse meg munkáinkat 
							</a>
							
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END REVOLUTION SLIDER -->
            <!--site-main start-->
            <div class="site-main">
                <!--row-top-section-->
                <section class="ttm-row row-top-section clearfix">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mt_40 mlr-30 res-767-mt-0">
                                    <div class="row row-equal-height ttm-bgcolor-white box-shadow2">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <!-- featured-icon-box -->
                                            <div class="featured-icon-box style1 top-icon text-center">
                                                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-background-color-skincolor ttm-icon_element-size-md ttm-icon_element-style-square">
                                                    <i class="ti ti-settings"></i>
                                                </div>
                                                <div class="featured-content">
                                                    <div class="featured-title">
                                                        <h5>Teljeskörű és profi szolgáltatások</h5>
                                                    </div>
                                                    <div class="featured-desc">
                                                        <p>Miskolc ablak specialista: széles választék és profi szolgáltatások.</p>
                                                        <a class="ttm-btn ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor btn-inline mb-15" href="#referencia_munkaink">Munkáink megtekintése<i class="ti ti-angle-double-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- featured-icon-box end-->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 box-shadow2">
                                            <!-- featured-icon-box -->
                                            <div class="featured-icon-box style1 top-icon text-center">
                                                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-background-color-skincolor ttm-icon_element-size-md ttm-icon_element-style-square">
                                                    <i class="ti ti-user"></i>
                                                </div>
                                                <div class="featured-content">
                                                    <div class="featured-title">
                                                        <h5>10+ év tapasztalat</h5>
                                                    </div>
                                                    <div class="featured-desc">
                                                        <p>Több mint egy évtizede foglalkozunk nyílászáról beépítésével és javításával Miskolcon és környékén</p>
                                                        <a class="ttm-btn ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor btn-inline mb-15" href="#referencia_munkaink">Munkáink megtekintése<i class="ti ti-angle-double-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- featured-icon-box end-->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <!-- featured-icon-box -->
                                            <div class="featured-icon-box style1 top-icon text-center">
                                                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-background-color-skincolor ttm-icon_element-size-md ttm-icon_element-style-square">
                                                    <i class="ti ti-thumb-up"></i>
                                                </div>
                                                <div class="featured-content">
                                                    <div class="featured-title">
                                                        <h5>98%-os ügyfélelégedettség</h5>
                                                    </div>
                                                    <div class="featured-desc">
                                                        <p>Nagyon nagy hangsúly fektetünk arra, hogy minden ügyfelünk elégedett legyen az általunk elvégzett munkával. </p>
                                                        <a class="ttm-btn ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor btn-inline mb-15" href="#referencia_munkaink">Munkáink megtekintése<i class="ti ti-angle-double-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- featured-icon-box end-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- row end -->
                    </div>
                </section>
                <!-- row-top-section end -->
                <!--about-section-->
                <section class="ttm-row about-section ttm-bgcolor-white bg-img1 break-991-colum clearfix">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 col-sm-12">
                                <!-- ttm_single_image-wrapper -->
                                <div class="ttm_single_image-wrapper mb-35">
                                    <img class="img-fluid" src="<?php echo $server;?>images/bg1.jpg" alt="Miskolc Ablak">
                                    <img class="img-fluid" src="<?php echo $server;?>images/bg2.jpg" alt="Miskolc Ablak">
                                </div>
                                <!-- ttm_single_image-wrapper end -->
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <div class="pr-10 res-991-plr-0">
                                    <!-- section title -->
                                    <div class="section-title clearfix">
                                        <div class="title-header">
                                            <h5>Miskolc műanyag ablak cseréje, műanyag ablak beépítés</h5>
                                            <h1 class="title">Miskolc Ablak</h1>
                                        </div>
                                    </div>
                                    <!-- section title end -->
                                    <p><strong>Szolgáltatásainkat az otthonok kényelmének biztosítására fejlesztettük ki, és mindig arra törekszünk, hogy a legjobb és leggyorsabb segítséget nyújtsuk tisztességes áron. </strong></p>
                                    <p class="pt-10 pb-10">
										Az 1970-es évek végén való megjelenésüktől kezdve a műanyag ablakok alacsony karbantartást igénylő, megfizethető megoldást nyújtanak a háztulajdonosoknak, 
										akik szeretnék otthonuk stílusát, értékét és energiahatékonyságát növelni. A Miskolc Ablak egy olyan ablakos cég, amely kifejezetten tartós, lakossági műanyag ablakokra 
										specializálódott. Akár néhány műanyag ablakra, akár egy teljes háznyi új ablakra van szüksége, képzett szakembereink állnak rendelkezésére. Cégünk elsősorban Miskolcon és 
										környékén nyújt ablakok beépítési szolgáltatását, hatékonyan javítva az ingatlan értékét, az esztétikát és az ablakok hőszigetelő képességét. Ha régi, hatékonyságát vesztett 
										ablakait szeretné korszerűbb termékekre cserélni, amelyek kizárják a huzatot és csökkentik az energia számláját, szívesen segítünk ebben.
                                    </p>
                                    <a class="ttm-btn ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor btn-inline mb-30" href="#arajanlatkeres">Árajánlatkérés<i class="ti ti-angle-double-right"></i></a>
                                    <div class="separator">
                                        <div class="sep-line mt_5 mb-35"></div>
                                    </div>
                                    <!-- row-->
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <!--featured-icon-box-->
                                            <div class="featured-icon-box style2 left-icon">
                                                <div class="ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-md"> 
                                                    <i class="ti ti-timer"></i>
                                                </div>
                                                <div class="featured-content">
                                                    <div class="featured-title">
                                                        <h5>Időben teljesítés</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- featured-icon-box end-->
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <!--featured-icon-box-->
                                            <div class="featured-icon-box style2 left-icon">
                                                <div class="ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-md"> 
                                                    <i class="ti ti-wand"></i>
                                                </div>
                                                <div class="featured-content">
                                                    <div class="featured-title">
                                                        <h5>Egyedi kivitelezés</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- featured-icon-box end-->
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <!--featured-icon-box-->
                                            <div class="featured-icon-box style2 left-icon">
                                                <div class="ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-md"> 
                                                    <i class="ti ti-medall"></i>
                                                </div>
                                                <div class="featured-content">
                                                    <div class="featured-title">
                                                        <h5>Képzett szakemberek</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- featured-icon-box end-->
                                        </div>
                                    </div>
                                    <!-- row end-->
                                </div>
                            </div>
                        </div>
                        <!-- row end -->
                    </div>
                </section>
                <!--about-section end-->
				
				<!--services-section-->
                <section class="ttm-row services-section bg-layer bg-layer-equal-height break-991-colum res-991-mt-0 clearfix" id="services">
                    <div class="container">
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-10 col-md-10">
                                <!-- about-content -->
                                <div class="about-content ttm-bg ttm-col-bgcolor-yes ttm-left-span ttm-bgcolor-darkgrey spacing-3">
                                    <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                    <div class="layer-content">
                                        <!-- section title -->
                                        <div class="section-title with-desc clearfix">
                                            <div class="title-header">
                                                <h5>Miskolc műanyag ablakok beépítése, Műanyag ablakok cseréje</h5>
                                                <h2 class="title">Szolgáltatásaink</h2>
                                            </div>
                                            <div class="title-desc">
												A Miskolc Ablak csapata valóban széles lehetőséget kínál ha műanyag ablakok cseréjéről, beépítéséről illetve egyéb műanyag nyilászárók cseréjéről, beépítéséről van szó.
											</div>
                                        </div>
                                        <!-- section title end -->
                                        <div class="separator clearfix">
                                            <div class="sep-line mt-10 mb-20"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
												<div class="ttm-tabs ttm-tab-style-horizontal clearfix">
													<!-- tabs -->
													<ul class="tabs clearfix">
														<li class="tab active"><a href="#">Miskolc Ablak</a></li>
														<li class="tab"><a href="#"></i>Miskolc Ajtó</a></li>
														<li class="tab"><a href="#">Miskolc Szúnyogháló</a></li>
														<li class="tab"><a href="#">Miskolc Redőny</a></li>
													</ul>
													<div class="content-tab" style="margin-top: 5px;">
														<div class="content-inner active" style="display: block;">
															<div class="row">
																<div class="col-lg-3">
																	<img class="img-fluid" src="<?php echo  $server.'images/miskolc_ablak.png'?>" alt="Miskolc Ablak">
																</div>
																<div class="col-lg-9">
																	<p class="pt-5">
																		Miskolcon és környékén elérhető szolgáltatásunk. Csapatunk műanyag ablakok megrendelését, beépítését kínálja egyedi méretben. 
																		Vegye igénybe szakértelmünket, ha műanyag ablak beépítését, műanyag ablakok cseréjét tervezi. Kollégáink szakképzett és valóban profi szakemberek, 
																		akik számos referencia munkával és kimagasló ügyfélelégedettséggel rendelkeznek.<br />
																		<strong>Ne feledje: írásos garanciát adunk Önnek, és ingyenesen kérhet helyszíni felmérést!</strong>
																	</p>
																	<a class="ttm-btn ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor btn-inline mb-30" href="#referencia_munkaink">Referencia munkáink<i class="ti ti-angle-double-right"></i></a>
																	<a class="ttm-btn ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor btn-inline mb-30" href="#arajanlatkeres">Árajánlatkérés<i class="ti ti-angle-double-right"></i></a>
																	<a class="ttm-btn ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor btn-inline mb-30" href="#blog">Blog bejegyzéseink<i class="ti ti-angle-double-right"></i></a>
																</div>
															</div>
														</div>
														<div class="content-inner" style="display: none;">
															<div class="row">
																<div class="col-lg-3">
																	<img class="img-fluid" src="<?php echo  $server.'images/miskolc_ajto.png'?>" alt="Miskolc Ajtó">
																</div>
																<div class="col-lg-9">
																	<p class="pt-5">
																		Miskolcon és környékén elérhető szolgáltatásunk. Csapatunk műanyag ajtók és egyéb nyílászárók megrendelését, beépítését kínálja egyedi méretben. 
																		Vegye igénybe szakértelmünket, ha műanyag ajtó beépítését, műanyag ajtók cseréjét tervezi. Kollégáink szakképzett és valóban profi szakemberek 
																		számos referencia munkával és kimagasló ügyfélelégedettséggel.
																		<p><strong>Ne feledje: írásos garanciát adunk Önnek, és ingyenesen kérhet helyszíni felmérést!</strong></p>

																	</p>
																	<a class="ttm-btn ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor btn-inline mb-30" href="#referencia_munkaink">Referencia munkáink<i class="ti ti-angle-double-right"></i></a>
																	<a class="ttm-btn ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor btn-inline mb-30" href="#arajanlatkeres">Árajánlatkérés<i class="ti ti-angle-double-right"></i></a>
																	<a class="ttm-btn ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor btn-inline mb-30" href="#">Ugrás a weboldalra<i class="ti ti-angle-double-right"></i></a>
																</div>
															</div>
														</div>
														<div class="content-inner" style="display: none;">
															<div class="row">
																<div class="col-lg-3">
																	<img class="img-fluid" src="<?php echo  $server.'images/miskolc_szunyoghalo.png'?>" alt="Miskolc Szúnyogháló">
																</div>
																<div class="col-lg-9">
																	<p class="pt-5">
																		Miskolcon és környékén elérhető szolgáltatásunk. Óriási választékkal kínáljuk szúnyoghálókészítés szolgáltatásunkat. Legyen szó fix szúnyoghálóról, rolós szúnyoghálóról, redőny szúnyoghálóról, 
																		pliszé szúnyoghálóról, szúnyoghálós ajtóról vagy ablakról, aluminium vagy műanyagkeretes szúnyoghálóról, kimagaslóan magas ügyfélelégedettséggel várjuk Önt is ügyfeleink között.
																		Rendelje minél hamarabb meg szolgáltatásunkat. Ne várja meg a szúnyoginváziót!
																		<br />
																		<strong>Ne feledje: írásos garanciát adunk Önnek és ingyenesen kérhet helyszíni felmérést!</strong>
																	</p>
																	<a class="ttm-btn ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor btn-inline mb-30" href="#referencia_munkaink">Referencia munkáink<i class="ti ti-angle-double-right"></i></a>
																	<a class="ttm-btn ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor btn-inline mb-30" href="#arajanlatkeres">Árajánlatkérés<i class="ti ti-angle-double-right"></i></a>
																	<a class="ttm-btn ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor btn-inline mb-30" href="#">Ugrás a weboldalra<i class="ti ti-angle-double-right"></i></a>
																</div>
															</div>
														</div>
														<div class="content-inner" style="display: none;">
															<div class="row">
																<div class="col-lg-3">
																	<img class="img-fluid" src="<?php echo  $server.'images/miskolc_redony.png'?>" alt="Miskolc Redőny">
																</div>
																<div class="col-lg-9">
																	<p class="pt-5">
																		Miskolcon és környékén elérhető szolgáltatásunk. Óriási választékkal kínáljuk redőnykészítés, redőnybeépítés szolgáltatásunkat. Legyen szó külső tokos redőnyről,
																		vakolható tokos redőnyről, vakolható tokos ráépített redőnyről, műanyag vagy aluminium redőny beéptítéséről,  
																		kimagaslóan magas ügyfélelégedettséggel várjuk Önt is ügyfeleink között.
																		<br />
																		<strong>Ne feledje: írásos garanciát adunk Önnek és ingyenesen kérhet helyszíni felmérést!</strong>
																	</p>
																	<a class="ttm-btn ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor btn-inline mb-30" href="#referencia_munkaink">Referencia munkáink<i class="ti ti-angle-double-right"></i></a>
																	<a class="ttm-btn ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor btn-inline mb-30" href="#arajanlatkeres">Árajánlatkérés<i class="ti ti-angle-double-right"></i></a>
																	<a class="ttm-btn ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor btn-inline mb-30" href="#">Ugrás a weboldalra<i class="ti ti-angle-double-right"></i></a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- about-content end-->
                            </div>
                            <div class="col-lg-2 col-md-12">
                                <!-- col-img-img-two -->
                                <div class="col-bg-img-two ttm-col-bgimage-yes ttm-bg ttm-right-span">
                                    <div class="ttm-col-wrapper-bg-layer ttm-bg-layer ml_80">
                                        <div class="col-bg-img-thirteen"></div>
                                    </div>
                                    <div class="layer-content"></div>
                                </div>
                                <!-- col-img-bg-img-two end-->
                                <img src="<?php echo $server;?>images/bg-image/col-bgimage-2.jpg" class="ttm-equal-height-image" alt="Miskolc Ablak">
                            </div>
                        </div>
                        <!-- row end -->
                    </div>
                </section>
                <!--services-section end-->
				<!-- partners-section -->
				<section class="ttm-row home4-last-section partners-section bg-img11 clearfix">
					<div class="container">
						<div class="row">
							<div class="col-lg-5">
								<!-- ttm_single_image-wrapper -->
								<div class="ttm_single_image-wrapper mb-35">
									<img class="img-fluid" src="<?php echo $server;?>images/single-img-eight.png" alt="Miskolc Ablak / Ablakcsere / Műanyag Ablak Miskolc">
								</div><!-- ttm_single_image-wrapper end -->
							</div>
							<div class="col-lg-7">
								<div class="pt-70">
									<!-- section title -->
									<div class="section-title with-desc clearfix">
										<div class="title-header">
											<h5>Kiemelt Partnerünk</h5>
											<h2 class="title">Rehau</h2>
										</div>
										<div class="title-desc">
											Csúcstechnológia a legmagasabb szintű kényelemért, a mai és a holnapi életünk részeként. Ez a <a href="https://www.rehau.com/hu-hu" target="_blank">REHAU</a>. Legyen szó ablakról, erkély-, terasz- vagy tolóajtóról, 
											bejárati ajtóról, okosotthon-megoldásokról vagy okos tartozékokról: a <a href="https://www.rehau.com/hu-hu" target="_blank">REHAU</a> megkönnyíti az életünket. Minden szükséges kelléket partnerünktől rendelünk, 
											hogy valóban tökéletes eredményt nyújthassunk Önnek.
										</div>
									</div><!-- section title end -->
									<div class="ttm-box-view-separator-logo pt-10">
										<!-- row -->
										<div class="row">
											<div class="col-sm-6">
												<div class="client-box">
													<div class="ttm-client-logo-tooltip" data-tooltip="Minőségi Profilok a Rehua-tól">
														<div class="client">
															<img class="img-fluid" src="<?php echo $server;?>images/REHAU_Profile.jpg" alt="Minőségi Profilok a Rehua-tól">
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="client-box">
													<div class="ttm-client-logo-tooltip" data-tooltip="Minőségi Ablakok a Rehua-tól">
														<div class="client">
															<img class="img-fluid" src="<?php echo $server;?>images/REHAU_Windows.jpg" alt="Minőségi Profilok a Rehua-tól">
														</div>
													</div>
												</div>
											</div>
											
										</div><!-- row end -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- partners-section end -->
                    
                <!--blog-section-->
                <section class="ttm-row portfolio-section bg-img2 clearfix" id="referencia_munkaink">
                    <div class="container">
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ttm-tabs">
                                    <!-- section-title -->
                                    <div class="section-title width-36">
                                        <div class="title-header">
                                            <h5>Referencia munkáink</h5>
                                            <h2 class="title">Munkáink</h2>
                                        </div>
                                    </div>
                                    <!-- section-title end -->
                                    <ul class="tabs text-right width-64 mt-35 res-1199-mt-0 res-1199-mb-20" style="margin-top: 0px!important;">
                                        
                                        <li class="tab active"><a href="#">Ablak beépítés, Ablakcsere</a></li>
                                        <li class="tab"><a href="#">Ajtó beépítés, Ajtócsere</a></li>
                                        <li class="tab"><a href="#">Szúnyogháló készítés és beépítés</a></li>
                                        <li class="tab"><a href="#">Redőnyök készítése és beépítése</a></li>
										<li class="tab"><a href="#"> Összes </a></li>
                                    </ul>
                                    <!-- flat-tab end -->
                                    <div class="content-tab width-100">
										<!-- TAB 2 Ablak -->
                                        <div class="content-inner active">
                                            <div class="row multi-columns-row ttm-boxes-spacing-5px">
											<?php 
												$get_images_by_cat = get_images_by_cat('ablak');
												foreach($get_images_by_cat as $get_images_by_cat) {
													$labels = $get_images_by_cat['labels'];
													$labelArray = explode(';', $labels);
													
											?>
                                                <div class="ttm-box-col-wrapper col-lg-4 col-md-6 col-sm-12" style="max-height:280px">
                                                    <!-- featured-imagebox -->
                                                    <div class="featured-imagebox featured-imagebox-portfolio">
                                                        <!-- featured-thumbnail -->
                                                        <div class="featured-thumbnail">
                                                            <a href="#"> <img class="img-fluid" src="<?php echo $server .''.$get_images_by_cat['path']?>" alt="<?php echo $get_images_by_cat['title'];?>"></a>
                                                        </div>
                                                        <!-- featured-thumbnail end-->
                                                        <!-- ttm-box-view-overlay -->
                                                        <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay" style="max-height: auto;">
                                                            <div class="ttm-box-view-content-inner">
                                                                <div class="featured-content featured-content-portfolio">
                                                                    <?php 
																		echo '<span class="category">';
																		foreach ($labelArray as $label) {
																			$urlSafeLabel = str_replace('<br />', '', replace_spec_chars($label));
																			
																			echo '<a href="https://www.miskolc-ablak.hu/#' . strip_tags($urlSafeLabel) . '">' . $label . '</a>, ';
																		}
																		echo '</span>';
																	?>
																	<a href="https://www.miskolc-ablak.hu/#<?php echo str_replace('<br-/>', '-', replace_spec_chars($get_images_by_cat['title'])); ?>">
																		<h3 class="featured-title">
																			<?php echo $get_images_by_cat['title']; ?>
																		</h3>
																	</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- ttm-box-view-overlay end-->
                                                    </div>
                                                    <!-- featured-imagebox -->
                                                </div>
                                            <?php 
												}
											?>												
                                            </div>
                                        </div>
                                        
										
										<!-- TAB 3 Ajtó -->
                                        <div class="content-inner">
                                            <div class="row multi-columns-row ttm-boxes-spacing-5px">
											<?php 
												$get_images_by_cat = get_images_by_cat('ajto');
												foreach($get_images_by_cat as $get_images_by_cat) {
													$labels = $get_images_by_cat['labels'];
													$labelArray = explode(';', $labels);
													
											?>
                                                <div class="ttm-box-col-wrapper col-lg-4 col-md-6 col-sm-12" style="max-height:280px">
                                                    <!-- featured-imagebox -->
                                                    <div class="featured-imagebox featured-imagebox-portfolio">
                                                        <!-- featured-thumbnail -->
                                                        <div class="featured-thumbnail">
                                                            <a href="#"> <img class="img-fluid" src="<?php echo $server .''.$get_images_by_cat['path']?>" alt="<?php echo $get_images_by_cat['title'];?>"></a>
                                                        </div>
                                                        <!-- featured-thumbnail end-->
                                                        <!-- ttm-box-view-overlay -->
                                                        <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay" style="max-height: auto;">
                                                            <div class="ttm-box-view-content-inner">
                                                                <div class="featured-content featured-content-portfolio">
                                                                    <?php 
																		echo '<span class="category">';
																		foreach ($labelArray as $label) {
																			$urlSafeLabel = str_replace('<br />', '', replace_spec_chars($label));
																			
																			echo '<a href="https://www.miskolc-ablak.hu/#' . strip_tags($urlSafeLabel) . '">' . $label . '</a>, ';
																		}
																		echo '</span>';
																	?>
																	<a href="https://www.miskolc-ablak.hu/#<?php echo str_replace('<br-/>', '-', replace_spec_chars($get_images_by_cat['title'])); ?>">
																		<h3 class="featured-title">
																			<?php echo $get_images_by_cat['title']; ?>
																		</h3>
																	</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- ttm-box-view-overlay end-->
                                                    </div>
                                                    <!-- featured-imagebox -->
                                                </div>
                                            <?php 
												}
											?>												
                                            </div>
                                        </div>
										<!-- TAB 4 szúnyogháló -->
                                        <div class="content-inner">
                                            <div class="row multi-columns-row ttm-boxes-spacing-5px">
                                                <div class="ttm-box-col-wrapper col-lg-4 col-md-6 col-sm-12">
                                                    <!-- featured-imagebox -->
                                                    <div class="featured-imagebox featured-imagebox-portfolio">
                                                        <!-- featured-thumbnail -->
                                                        <div class="featured-thumbnail">
                                                            <a href="#"> Hamarosan</a>
                                                        </div>
                                                       
                                                    </div>
                                                    <!-- featured-imagebox -->
                                                </div>
                                                
                                            </div>
                                        </div>
										<!-- TAB 5 Redőnyok -->
                                        <div class="content-inner">
                                            <div class="row multi-columns-row ttm-boxes-spacing-5px">
											<?php 
												$get_images_by_cat = get_images_by_cat('redony');
												foreach($get_images_by_cat as $get_images_by_cat) {
													$labels = $get_images_by_cat['labels'];
													$labelArray = explode(';', $labels);
													
											?>
                                                <div class="ttm-box-col-wrapper col-lg-4 col-md-6 col-sm-12" style="">
                                                    <!-- featured-imagebox -->
                                                    <div class="featured-imagebox featured-imagebox-portfolio">
                                                        <!-- featured-thumbnail -->
                                                        <div class="featured-thumbnail">
                                                            <a href="#"> <img class="img-fluid" src="<?php echo $server .''.$get_images_by_cat['path']?>" alt="<?php echo $get_images_by_cat['title'];?>"></a>
                                                        </div>
                                                        <!-- featured-thumbnail end-->
                                                        <!-- ttm-box-view-overlay -->
                                                        <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay" style="max-height: auto;">
                                                            <div class="ttm-box-view-content-inner">
                                                               <div class="featured-content featured-content-portfolio">
                                                                    <?php 
																		echo '<span class="category">';
																		foreach ($labelArray as $label) {
																			$urlSafeLabel = str_replace('<br />', '', replace_spec_chars($label));
																			
																			echo '<a href="https://www.miskolc-ablak.hu/#' . strip_tags($urlSafeLabel) . '">' . $label . '</a>, ';
																		}
																		echo '</span>';
																	?>
																	<a href="https://www.miskolc-ablak.hu/#<?php echo str_replace('<br-/>', '-', replace_spec_chars($get_images_by_cat['title'])); ?>">
																		<h3 class="featured-title">
																			<?php echo $get_images_by_cat['title']; ?>
																		</h3>
																	</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- ttm-box-view-overlay end-->
                                                    </div>
                                                    <!-- featured-imagebox -->
                                                </div>
                                            <?php 
												}
											?>												
                                            </div>
                                        </div>
										<!-- content-inner Tab 1-->
                                        <div class="content-inner">
                                            <div class="row multi-columns-row ttm-boxes-spacing-10px">
											<?php 
												$get_images = get_images('ablak');
												foreach($get_images as $get_images) {
													$labels = $get_images['labels'];
													$labelArray = explode(';', $labels);
													
											?>
                                                <div class="ttm-box-col-wrapper col-lg-4 col-md-6 col-sm-12" style="">
                                                    <!-- featured-imagebox -->
                                                    <div class="featured-imagebox featured-imagebox-portfolio">
                                                        <!-- featured-thumbnail -->
                                                        <div class="featured-thumbnail">
                                                            <a href="#"> <img class="img-fluid" src="<?php echo $server .''.$get_images['path']?>" alt="<?php echo $get_images['title'];?>"></a>
                                                        </div>
                                                        <!-- featured-thumbnail end-->
                                                        <!-- ttm-box-view-overlay -->
                                                        <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay" style="max-height: auto;">
                                                            <div class="ttm-box-view-content-inner">
                                                                <div class="featured-content featured-content-portfolio">
                                                                    <?php 
																		echo '<span class="category">';
																		foreach ($labelArray as $label) {
																			$urlSafeLabel = str_replace('<br />', '', replace_spec_chars($label));
																			
																			echo '<a href="https://www.miskolc-ablak.hu/#' . strip_tags($urlSafeLabel) . '">' . $label . '</a>, ';
																		}
																		echo '</span>';
																	?>
																	<a href="https://www.miskolc-ablak.hu/#<?php echo str_replace('<br-/>', '-', replace_spec_chars($get_images_by_cat['title'])); ?>">
																		<h3 class="featured-title">
																			<?php echo $get_images_by_cat['title']; ?>
																		</h3>
																	</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- ttm-box-view-overlay end-->
                                                    </div>
                                                    <!-- featured-imagebox -->
                                                </div>
                                            <?php 
												}
											?>												
                                            </div>
                                            <!-- row end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- row end-->
                    </div>
                </section>
                
				<!--contact-section-->
				<section class="ttm-row blog-section bg-img3 clearfix" style="padding: 200px 0 136px;" id="arajanlatkeres">
					<div class="container">
						<div class="row mt_100 box-shadow2 res-991-mt-20">
							<div class="col-lg-7">
								<div class="spacing-5 ttm-bgcolor-white">
									<!-- section title -->
									<div class="section-title clearfix">
										<div class="title-header">
											<h5>Ingyenes árajánlatkérés</h5>
											<h2 class="title">Kérjen árajánlatot most!</h2>
										</div>
									</div><!-- section title end -->
									<form id="ttm-quote-form" class="ttm-quote-form wrap-form clearfix" method="post" action="#">
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
										<label>
											<span class="text-input">
												<select id="service" name="service" required>
													<option value="">Válasszon szolgáltatást</option>
													<option value="Műanyag ablak">Műanyag ablak</option>
													<option value="Egyéb ablak">Egyéb ablak</option>
													<option value="Műanyag ajtó">Műanyag ajtó</option>
													<option value="Bejárati ajtó">Bejárati ajtó</option>
													<option value="Beltéri ajtó">Beltéri ajtó</option>
													<option value="Szúnyogháló">Szúnyogháló</option>
													<option value="Redőny">Redőny</option>
												</select>
											</span>
										</label>
										<label>
											<span class="text-input">
												<textarea name="message" rows="4" placeholder="Kérem írja le milyen munkával is szeretne bennünket megbízni." required="required"></textarea>
											</span>
										</label>
										<label>
											<div class="text-input d-flex align-items-center">
												<input class="form-check-input form-check-input-lg" style="height: 1em;width:1em" type="checkbox" name="accept_terms" id="accept_terms" required="required">
												<label class="form-check-label" for="accept_terms" style="">
													Megismertem és elfogadom az <a href="#" data-toggle="modal" data-target="#open_aszf">Általános Szerződési Feltételekben</a> leírtakat
												</label>
											</div>
										</label>
										<input name="submit" type="submit" id="submit" class="submit" value="Küldés">
									</form>
								</div>
							</div>
							<div class="col-lg-5">
								<!-- col-bg-img-three -->
								<div class="col-bg-img-three ttm-bg ttm-col-bgimage-yes spacing-4">
									<div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
									<div class="layer-content">
										<div class="row-title">
											<!-- section title -->
											<div class="section-title ttm-textcolor-white clearfix">
												<h2 class="title ttm-textcolor" style="font-size:25px">Miskolc és környékén</h2>
												<h2 class="title ttm-textcolor-skincolor">Ablak</h2>
												<h2 class="title">Ajtó</h2>
												<h2 class="title ttm-textcolor-skincolor">Szúnyogháló</h2>
												<h2 class="title">Redőny</h2>
											</div><!-- section title end -->
											
										</div>
									</div>
								</div><!-- col-bg-img-three end -->
							</div>
							
						</div>
						<!-- google reviews -->
						<div class="taggbox" style="width:100%;height:100%" data-widget-id="149059" data-tags="false" ></div><script src="https://widget.taggbox.com/embed-lite.min.js" type="text/javascript"></script>
					</div>
				</section>
				<!--contact-section end-->
				<!--blog-section-->
				<section class="ttm-row blog-section bg-layer clearfix" id="gyik">
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<!-- section-title -->
								<div class="section-title style2 clearfix">
									<div class="title-header">
										<h5>Miskolc műanyag ablak beépítés</h5>
										<h2 class="title">Gyakran ismételt kérdések</h2>
									</div>
									<div class="title-desc">
										Ebben a részben próbáljuk azokat a műanyag ablakcsere, műanyag ablak beépítés szolgáltatásunkkal kapcsolatos leggyakrabban előforduló
										kérdéseket összeszedni, amelyekre választ is adunk Önnek.
									</div>
								</div><!-- section-title end -->
							</div>
							
						</div><!-- row end -->
						<!-- row -->
						
						<div class="row">
							
							<div class="col-lg-12">
								<!-- acadion -->
								<div class="accordion">
									<!-- toggle -->
									<div class="toggle ttm-style-classic ttm-toggle-title-border">
										<div class="toggle-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" >Milyen ablak típusok léteznek és melyik fajtát érdemes választani?</a></div>
										<div class="toggle-content">
											<p>
												Az ablak típusának megválasztása komoly döntés, legyen szó lakásfelújításról vagy új ingatlan építéséről. Egy ilyen hosszú távú lépésnél rengeteg 
												kérdés vetődhet fel, és érdemes alaposan fontolóra venni a lehetőségeket, hogy ne hozzunk elhamarkodott döntést.
												Az egyik legfontosabb szempont az, hogy milyen ablaktípusok közül választhatunk. A kínálat sokszor meglehetősen zavarba ejtő lehet, mivel számos 
												szempont alapján különböztethetők meg az ablakok:
												<ul>
												  <li>A profil anyaga és színe</li>
												  <li>Nyílászáró mérete</li>
												  <li>Üvegezés típusa</li>
												  <li>Ablak működtetése</li>
												  <li>A profilban található légkamrák száma</li>
												  <li>Az ablakhoz választható kiegészítők</li>
												</ul>
												<p>
													További részleteket ebben a blog bejegyzésünkben olvashat:<br />
													<a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline mt-15" href="https://www.miskolc-ablak.hu/blog-bejegyzesek/69/Milyen+ablak+t%c3%adpusok+l%c3%a9teznek+%c3%a9s+melyik+fajt%c3%a1t+%c3%a9rdemes+v%c3%a1lasztani">Milyen ablak típusok léteznek és melyik fajtát érdemes választani?</a>	
												</p>
											</p>
										</div>
									</div><!-- toggle end -->
									<!-- toggle -->
									<div class="toggle ttm-style-classic ttm-toggle-title-border">
										<div class="toggle-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" >Mennyire hatékonyak a műanyag ablakok hőszigetelés terén?</a></div>
										<div class="toggle-content">
											<p>
												A műanyag ablakok rendkívül hatékonyak hőszigetelés terén. Ennek oka elsősorban az anyagok és az ablakok kialakításában rejlik. A műanyag ablakok 
												profiljai általában többkamrás kialakítással rendelkeznek, ami azt jelenti, hogy belső részeikben elhelyezett légkamrák segítik a hő átvitelének 
												csökkentését.
												<br /><br />
												Ezek a légkamrák hatékonyan meggátolják a hő áramlását az ablakon keresztül, ami hozzájárul az épület hőmegtartásához télen és hűvösebb környezet 
												kialakításához nyáron. A profilok közötti szigetelés is kiemelkedően fontos, hiszen a pontosan illeszkedő tömítések szintén csökkentik a hőveszteséget.
											</p>
											<p>
												További részleteket ebben a blog bejegyzésünkben olvashat:<br />
												<a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline mt-15" href="https://www.miskolc-ablak.hu/blog-bejegyzesek/71/Mennyire+hat%c3%a9konyak+a+m%c5%b1anyag+ablakok+h%c5%91szigetel%c3%a9s+ter%c3%a9n">Mennyire hatékonyak a műanyag ablakok hőszigetelés terén?</a>	
											</p>
										</div>
									</div><!-- toggle end -->
									<!-- toggle -->
									<div class="toggle ttm-style-classic ttm-toggle-title-border">
										<div class="toggle-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" >Mennyire csökkentik a zajt a műanyag ablakok az előző ablakokhoz képest?</a></div>
										<div class="toggle-content">
											<p>
												A műanyag ablakok jelentős mértékben képesek csökkenteni a zajt az előző ablakokhoz képest. Ennek oka az ablakok szerkezetében és anyagában keresendő. 
												A műanyag ablakok általában többrétegűek, és ezek a rétegek hatékonyan képesek elnyelni és csökkenteni a külső zajt.
												<br /><br />
												Az ablakok közötti légrészek és a tömítések kialakítása is hozzájárul a zaj csökkentéséhez. Ezek a részletek segítenek megakadályozni, hogy a 
												külső zaj behatoljon az épületbe, így a belső tér nyugodtabb és csendesebb lesz.
											</p>
											<p>
												További részleteket ebben a blog bejegyzésünkben olvashat:<br />
												<a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline mt-15" href="https://www.miskolc-ablak.hu/blog-bejegyzesek/72/Mennyire+cs%c3%b6kkentik+a+zajt+a+m%c5%b1anyag+ablakok+az+el%c5%91z%c5%91+ablakokhoz+k%c3%a9pest">Mennyire csökkentik a zajt a műanyag ablakok az előző ablakokhoz képest?</a>	
											</p>
										</div>
									</div><!-- toggle end -->
									<!-- toggle -->
									<div class="toggle ttm-style-classic ttm-toggle-title-border">
										<div class="toggle-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" >Milyen karbantartást igényelnek a műanyag ablakok és milyen gyakran?</a></div>
										<div class="toggle-content">
											<p>
												A műanyag ablakok általában viszonylag alacsony karbantartást igényelnek, ami hozzájárul a könnyű kezelésükhöz és hosszú élettartamukhoz. 
												A rendszeres tisztítás az egyik fontos feladat, melyet javasolt elvégezni. Ablaktisztító szer és puha rongy segítségével egyszerűen eltávolíthatók a szennyeződések.
												<br /><br />
												A tömítések ellenőrzése is fontos része a karbantartásnak. Időről időre érdemes megvizsgálni és tisztítani ezeket, hogy megakadályozzuk a kopást vagy 
												az elhasználódást, ami csökkentheti az ablakok hatékonyságát.
											</p>
											<p>
												További részleteket ebben a blog bejegyzésünkben olvashat:<br />
												<a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline mt-15" href="#">Milyen karbantartást igényelnek a műanyag ablakok és milyen gyakran?</a>	
											</p>
										</div>
									</div><!-- toggle end -->
									<!-- toggle -->
									<div class="toggle ttm-style-classic ttm-toggle-title-border">
										<div class="toggle-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" >Milyen lehetőségek vannak a műanyag ablakok megjelenését illetően?</a></div>
										<div class="toggle-content">
											<p>
												A műanyag ablakok terén számos lehetőség áll rendelkezésre a megjelenés tekintetében. Elsődlegesen a színválaszték széles skáláját kínálják, így könnyen 
												illeszthetők az épület stílusához és az enteriőr kialakításához.
												<br /><br />
												A profilok és keretek formatervezése is változatos. Klasszikus, letisztult vagy akár modern stílusban is elérhetőek, így megfelelnek az egyedi igényeknek.
											</p>
											<p>
												További részleteket ebben a blog bejegyzésünkben olvashat:<br />
												<a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline mt-15" href="#">Milyen lehetőségek vannak a műanyag ablakok megjelenését illetően?</a>	
											</p>
										</div>
									</div><!-- toggle end -->
									<!-- toggle -->
									<div class="toggle ttm-style-classic ttm-toggle-title-border">
										<div class="toggle-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" >Mennyire költséghatékonyak a műanyag ablakok hosszú távon?</a></div>
										<div class="toggle-content">
											<p>
												A műanyag ablakok hosszú távon igen költséghatékonyak lehetnek számos szempontból. Az alapvető beruházási költségek általában kedvezőbbek más 
												ablaktípusokhoz képest, ami már kezdetben is csökkentett költségeket jelent.
												<br /><br />
												Hosszú távon azonban még nagyobb megtakarítások érhetőek el. A műanyag ablakok kiváló hőszigetelő tulajdonságokkal rendelkeznek, 
												így csökkentik a fűtési és hűtési költségeket azáltal, hogy segítenek a helyiség hőmérsékletének stabilizálásában.
											</p>
											<p>
												További részleteket ebben a blog bejegyzésünkben olvashat:<br />
												<a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline mt-15" href="#">Mennyire költséghatékonyak a műanyag ablakok hosszú távon?</a>	
											</p>
										</div>
									</div><!-- toggle end -->
									<div class="toggle ttm-style-classic ttm-toggle-title-border">
										<div class="toggle-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" >Csak Miskolcon elérhető szolgáltatásunk?</a></div>
										<div class="toggle-content">
											<p>
												Műanyag ablakcsere, műanyag ablak beépítés szolgáltatásaink nem csupán Miskolcon de Borsod-Abaúj-Zemplén megye teljes területén elérhetőek.
											</p>
											<p>
												Az alábbi listában megtekintheto, hogy mely településeken veheti igénybe műanyag ablakcsere, műanyag ablak beépítés szolgáltatásainkat:
												<div class="tagcloud">
													<?php 
														$get_all_city_in_borsod = get_all_city_in_borsod(0,400);
														foreach($get_all_city_in_borsod as $get_all_city_in_borsod) {
															
															echo '<a href="https://www.miskolc-ablak.hu/#'.replace_spec_chars($get_all_city_in_borsod['varos']).'-ablakbeepítes-'.replace_spec_chars($get_all_city_in_borsod['varos']).'-ablakcsere" class="tag-cloud-link">'.$get_all_city_in_borsod['varos'].' műanyag ablak beépítés</a>';
															echo '&#149;';
														}
													?>
													
												</div>
											</p>
										</div>
									</div><!-- toggle end -->
								</div><!-- acadion end-->
							</div>
						</div>
					</div>
				</section>
				<!--blog-section end-->
                <!--blog-section-->
				<section class="ttm-row blog-section bg-img3 clearfix" id="blog">
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<!-- section-title -->
								<div class="section-title style2 clearfix">
									<div class="title-header">
										<h5>Miskolc Ablak</h5>
										<h2 class="title">Blog bejegyzéseink</h2>
									</div>
									<div class="title-desc">
										Blog bejegyzéseinkben igyekszünk olyan valóban hasznos információkat leírni a műanyag ablakcserével, műanyag ablakok beépítésével kapcsolatban, 
										amely minden érdeklődő számára hasznos lehet.
									</div>
								</div><!-- section-title end -->
							</div>
							
						</div><!-- row end -->
						<!-- row -->
						<div class="row">
							<!-- post-slide -->
							<div class="post-slide owl-carousel owl-theme owl-loaded" data-item="3" data-nav="false" data-dots="false" data-auto="false">
								<!-- featured-imagebox-post -->
								<?php 
									$get_1_3_blog = get_1_3_blog();
									foreach($get_1_3_blog as $get_1_3_blog) {
										
								?>
								<div class="featured-imagebox featured-imagebox-post">
									<div class="featured-thumbnail">
										<a href="<?php echo $server.'blog-bejegyzesek/'.$get_1_3_blog['id'].'/'.urlencode($get_1_3_blog['blog_title'])?>"><img class="img-fluid" src="<?php echo $server;?>images/blog/<?php echo $get_1_3_blog['blog_images'];?>" alt="<?php echo $get_1_3_blog['blog_title'];?>"></a>
									</div>
									<div class="featured-content featured-content-post">
										<div class="post-meta">
											<span class="ttm-meta-line"><i class="fa fa-calendar"></i><a href="<?php echo $server.'blog-bejegyzesek/'.$get_1_3_blog['id']?>"><?php echo $get_1_3_blog['blog_date'];?></a></span>
										</div>
										<div class="post-title featured-title">
											<h5><a href="<?php echo $server.'blog-bejegyzesek/'.$get_1_3_blog['id'].'/'.urlencode($get_1_3_blog['blog_title'])?>"><?php echo $get_1_3_blog['blog_title'];?></a></h5>
										</div>
									</div>
								</div><!-- featured-imagebox-post end -->
								<?php } ?>
							</div>
						</div><!-- row end-->
					</div>
				</section>
				<!--blog-section end-->
                <!--blog-section end-->
            </div>
            <!--site-main end-->
            <!--footer start-->
            <footer class="footer widget-footer clearfix">
                <div class="first-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ttm-footer-cta-wrapper ttm-textcolor-dark ttm-bgcolor-white">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 widget-area">
                                            <div class="featured-icon-box iconalign-before-heading ttm-icon_element-size-lg">
                                                <div class="featured-content">
                                                    <div class="featured-icon">
                                                        <div class="ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-lg"> 
                                                            <i class="ti ti-headphone"></i>
                                                        </div>
                                                    </div>
                                                    <div class="featured-title">
                                                        <h5>Visszahívás</h5>
                                                        <h6>Megadhatja telefonszámát és kollégánk felkeresi Önt.</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 widget-area">
                                            <form id="subscribe-form" class="newsletter-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" data-mailchimp="true">
												<div class="mailchimp-inputbox clearfix" id="subscribe-contents">
													<p><input type="text" name="phone" id="phone" placeholder="Adja meg telefonszámát" required></p>
													<p><input type="submit" value="Küldés" style="height: 42px;"></p>
												</div>
												<div id="subscribe-msg"></div>
											</form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="second-footer ttm-textcolor-white">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                                <div class="widget clearfix">
                                    <div class="footer-logo">
                                        <img id="footer-logo-img" class="img-center" src="<?php echo $server;?>images/logo_white.png" alt="Miskolc Ablak">
                                    </div>
                                    <p>Szolgáltatásainkat az otthonok kényelmének biztosítására fejlesztettük ki, és mindig arra törekszünk, hogy a legjobb és leggyorsabb segítséget nyújtsuk tisztességes áron.</p>
                                </div>
                                
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                                <div class="widget widget_nav_menu clearfix">
                                    <h3 class="widget-title">További szolgáltatásaink</h3>
                                    <ul id="menu-footer-services">
                                        <li style="width: calc(100% - 2px);"><a href="https://miskolc-ajto.hu" target="_blank">Miskolc Ajtó</a></li>
                                        <li style="width: calc(100% - 2px);"><a href="https://miskolc-redony.hu" target="_blank">Miskolc Redőny</a></li>
                                        <li style="width: calc(100% - 2px);"><a href="https://miskolc-szunyoghalo.hu" target="_blank">Miskolc Szúnyogháló</a></li>
                                        <li style="width: calc(100% - 2px);"><a href="https://ajto-ablak-miskolc.hu" target="_blank">Miskolc Ajtó Ablak</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 widget-area">
                                <div class="widget widget_text clearfix">
                                    <h3 class="widget-title">Elérhetőségünk</h3>
                                    <div class="textwidget widget-text">
										<h4 class="ttm-textcolor-skincolor" style="font-size: 20px;line-height: 15px;">Lipták Gábor e.V.</h4>
										<h4 class="ttm-textcolor-skincolor" style="font-size: 20px;line-height: 15px;">Megbízott személy: Mata Oszkár</h4>
										<a href="tel:<?php echo $telefon;?>">
											<h4 class="ttm-textcolor-skincolor" style="font-size: 20px;line-height: 15px;"><?php echo $telefon;?></h4>
										</a>
                                        <h4 class="ttm-textcolor-skincolor" style="font-size: 20px;line-height: 15px;"><?php echo $email;?></h4>
                                        <h4 class="ttm-textcolor-skincolor" style="font-size: 20px;line-height: 15px;">3572 Sajólád, Móra Ferenc utca 5.</h4>
                                        <h4 class="ttm-textcolor-skincolor" style="font-size: 20px;line-height: 15px;">Adószám: 43337668-1-25</h4>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="bottom-footer-text ttm-textcolor-white">
                    <div class="container">
                        <div class="row copyright">
                            <div class="col-md-8 ttm-footer2-left">
                                <span>Copyright © <?php echo date('Y')?>&nbsp;<a href="#">Mata Oszkár </a>Minden jog fenntartva.</span>
                            </div>
                            <div class="col-md-4 ttm-footer2-right">
								<span>
									<a href="#" data-toggle="modal" data-target="#open_aszf">Általános Szerződési Feltételek (ÁSZF)</a>
								</span>
								<br />
								<span>
									<a href="#" data-toggle="modal" data-target="#privacyPolicyModal">Adatkezelési tájékoztató</a>
								</span>
                            </div>
                        </div>
                    </div>
                </div>
				
            </footer>
            <!--footer end-->
            <!--back-to-top start-->
            <a id="totop" href="#top">
            <i class="fa fa-angle-up"></i>
            </a>
			
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
            
        </div>
        <!-- page end -->
        <!-- Javascript -->
        <script src="<?php echo $server;?>js/jquery.min.js"></script>
        <script src="<?php echo $server;?>js/tether.min.js"></script>
        <script src="<?php echo $server;?>js/bootstrap.min.js"></script>
        <script src="<?php echo $server;?>js/jquery.easing.js"></script>    
        <script src="<?php echo $server;?>js/jquery-waypoints.js"></script>    
        <script src="<?php echo $server;?>js/jquery-validate.js"></script> 
        <script src="<?php echo $server;?>js/owl.carousel.js"></script>
        <script src="<?php echo $server;?>js/jquery.prettyPhoto.js"></script>
        <script src="<?php echo $server;?>js/numinate.min6959.js?ver=4.9.3"></script>
        <script src="<?php echo $server;?>js/main.js"></script>
        <!-- Revolution Slider -->
        <script src="<?php echo $server;?>revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="<?php echo $server;?>revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="<?php echo $server;?>revolution/js/slider.js"></script>
        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->    
        <script src="<?php echo $server;?>revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="<?php echo $server;?>revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script src="<?php echo $server;?>revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script src="<?php echo $server;?>revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="<?php echo $server;?>revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script src="<?php echo $server;?>revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="<?php echo $server;?>revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script src="<?php echo $server;?>revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <!-- Javascript end-->
    </body>

</html>