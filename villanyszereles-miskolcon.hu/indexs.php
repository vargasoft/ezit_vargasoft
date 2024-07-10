<?php 
session_start();

include('config/connect.php');
require_once('config/functions.php');

$fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$server = "http://villanyszereles-miskolcon.hu/";
$telefon = "+36 (70)746-4034";

$owner1 = "Ónodi Gyula EV.";
$company = 'Villanyszerelés és lakásfelújítás';
$address = "Miskolc Klapka György utca 26.";
$facebook = 'https://www.facebook.com/';

$email = 'info@villanyszereles-miskolcon.hu';


$title = "Villanszerelés Miskolcon - Lakásfelújítás Miskolcon";
$description = 'Teljeskörű villanyszerelési szolgáltatások és teljeskörő lakásfelújítás Miskolcon és környékén';
$keywords = "villanyszerelés, lakásfelújítás, Miskolc, mérőóra áthelyezés, fürdőszoba felújítás, villanyvezeték cseréje, kapcsolók és konnektorok szerelése, világítástechnika kialakítása, elektromos hálózat kiépítése, fűtési rendszerek elektromos bekötése, villanyszerelési munkák, lakásátalakítás, konyhafelújítás, villanybojler telepítés, kábel TV és internet csatlakozások kialakítása, biztonsági rendszerek telepítése, LED világítás beépítése, kaputelefonok és kamerarendszerek szerelése, villanyóra beszerelés, villamos hálózat karbantartása, fali dugaszolók cseréje, lakberendezési munkák";

$img_tag = $title;

$active = 'style="color: #ffbd2b;text-transform: uppercase;"';

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



function isMobileDevice() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

?>
<!doctype html>
<html class="no-js" lang="hu">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $title;?></title>
        <meta name="author" content="VargaSoft">
        <meta name="description" content="<?php echo $description;?>">
        <meta name="keywords" content="<?php echo $keywords;?>" />
		
		<!-- EGYEB -->
		<meta property="og:title" content="<?php echo $title;?>">
		<meta property="og:description" content="<?php echo $description;?>">
		<meta property="og:type" content="website">
		<meta property="og:url" content="<?php echo $fullUrl;?>">
		<meta property="og:image" content="<?php echo $server;?>assets/images/logo_black.png">
		<meta property="og:site_name" content="VargaSoft">
		<meta property="og:locale" content="hu_HU">
		<meta property="og:keywords" content="<?php echo $description;?>">
		<meta property="fb:app_id" content="100093287431136">

		<meta name="DC.title" content="<?php echo $title;?>">
		<meta name="DC.description" content="<?php echo $description;?>">
		<meta name="DC.publisher" content="VargaSoft">
		<meta name="DC.date" content="2024-05-10">
		<meta name="DC.language" content="hu">
		<meta name="DC.subject" content="<?php echo $keywords;?>">

		<meta name="sitemap" content="<?php echo $server;?>sitemap.xml">
		<meta name="robots" content="index,follow">

		<link href="<?php echo $fullUrl;?>" rel="canonical"/>

		<meta property="article:published_time" content="2024-05-10T07:55:54+01:00">
		<meta property="article:modified_time" content="2024-05-13T14:22:20+01:00">
		
		
        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicons - Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $server;?>assets/images/favicon//apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $server;?>assets/images/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $server;?>assets/images/favicon//apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $server;?>assets/images/favicon//apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $server;?>assets/images/favicon//apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $server;?>assets/images/favicon//apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $server;?>assets/images/favicon//apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $server;?>assets/images/favicon//apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $server;?>assets/images/favicon//apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $server;?>assets/images/favicon//android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $server;?>assets/images/favicon//favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $server;?>assets/images/favicon//favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $server;?>assets/images/favicon//favicon-16x16.png">
		<link rel="manifest" href="<?php echo $server;?>assets/images/favicon//manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo $server;?>assets/images/favicon//ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
        <!--==============================
            Google Fonts
            ============================== -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@400;500;600;700;800&amp;family=Rubik:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
        <!--==============================
            All CSS File
            ============================== -->
        <!-- Bootstrap -->
        <!-- <link rel="stylesheet" href="<?php echo $server;?>assets/css/app.min.css"> -->
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/bootstrap.min.css">
        <!-- Fontawesome Icon -->
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/fontawesome.min.css">
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/magnific-popup.min.css">
        <!-- Slick Slider -->
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/slick.min.css">
        <!-- Select 2 -->
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/select2.min.css">
        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="<?php echo $server;?>assets/css/style.css">
		
		<!-- strukturalt adatok -->
		<script type="application/ld+json">
	{
	  "@context": "http://schema.org",
	  "@type": "LocalBusiness",
	  "name": "<?php echo $company;?>",
	  "description": "<?php echo $description;?>",
	  "telephone": "<?php echo $telefon;?>",
	  "sameAs": ["<?php echo $fullUrl;?>"],
	  "priceRange": "$$$",
	  "url": "<?php echo $fullUrl;?>",
	  "logo": "<?php echo $fullUrl;?>assets/images/logo_black.png",
	  "image": "<?php echo $fullUrl;?>assets/images/logo_black.png",
	  "founder": {
		"@type": "Person",
		"name": "<?php echo $owner;?>"
	  },
	  "address": {
		"@type": "PostalAddress",
		"streetAddress": "Klapka György utca 26.",
		"addressLocality": "Miskolc",
		"postalCode": "3524",
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
			  "author": "Nagy Gábor",
			  "datePublished": "2023-09-20",
			  "name": "Kiváló munka!",
			  "reviewBody": "Nagyon elégedett vagyok a cég munkájával. A fürdőszobafelújítás fantasztikus lett!",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.9"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Kiss Ádám",
			  "datePublished": "2023-10-05",
			  "name": "Megbízható szakemberek!",
			  "reviewBody": "Az elektromos hálózat felújítása során nagyon precízek és megbízhatóak voltak. Csak ajánlani tudom őket!",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.7"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Kovács Éva",
			  "datePublished": "2023-11-03",
			  "name": "Kitűnő kommunikáció!",
			  "reviewBody": "A munkájuk során folyamatosan tájékoztattak minket a fejleményekről. Nagyon elégedettek vagyunk!",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.8"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Tóth Péter",
			  "datePublished": "2023-12-10",
			  "name": "Professzionális szolgáltatás!",
			  "reviewBody": "A villanyszerelés során minden rendben ment. Gyorsan és precízen dolgoztak.",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.6"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Horváth Anikó",
			  "datePublished": "2024-01-05",
			  "name": "Rugalmas megoldások!",
			  "reviewBody": "Az ablakcsere során rugalmasan alkalmazkodtak az igényeinkhez. Nagyon hálásak vagyunk értük!",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.9"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Szabó János",
			  "datePublished": "2024-02-20",
			  "name": "Kiváló ár-érték arány!",
			  "reviewBody": "A lakásfelújítás árában is nagyon kedvezőek voltak, és a minőség is kiváló.",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.7"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Farkas Anna",
			  "datePublished": "2024-03-15",
			  "name": "Gyors és hatékony munka!",
			  "reviewBody": "Az elektromos hálózat felújítása rendkívül gyorsan zajlott, és a végeredmény kifogástalan lett.",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.8"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Molnár István",
			  "datePublished": "2024-04-02",
			  "name": "Szakértői tanácsadás!",
			  "reviewBody": "Az ablakcsere előtt kiváló tanácsokat kaptunk a megfelelő típus kiválasztásához. Nagyon köszönjük!",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.9"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Varga Krisztina",
			  "datePublished": "2024-05-10",
			  "name": "Professzionális munka, barátságos csapat!",
			  "reviewBody": "A cég munkatársai nagyon kedvesek és segítőkészek voltak. Mindig jókedvűen válaszoltak a kérdéseinkre.",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.8"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Papp Zoltán",
			  "datePublished": "2024-06-03",
			  "name": "Szuper végeredmény!",
			  "reviewBody": "A fürdőszoba és a konyha felújítása során elképesztő munkát végeztek. Minden részletre figyeltek.",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.9"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Kovácsné Judit",
			  "datePublished": "2024-07-18",
			  "name": "Gyors és precíz munka!",
			  "reviewBody": "A villanyszerelés során pontosan az elvégzendő feladatokat végezték el, és minden rendben működik.",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.7"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Nagy László",
			  "datePublished": "2024-08-09",
			  "name": "Kiváló minőségű szolgáltatás!",
			  "reviewBody": "Az ablakok és a kaputelefon kiváló minőségűek. Nagyon elégedettek vagyunk az eredménnyel.",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.8"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Fehér Eszter",
			  "datePublished": "2024-09-25",
			  "name": "Színvonalas munka!",
			  "reviewBody": "A lakásfelújítás során minden részletre odafigyeltek, és a végeredmény kifogástalan lett.",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.9"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Kiss Ferenc",
			  "datePublished": "2024-10-14",
			  "name": "Gyors és precíz szolgáltatás!",
			  "reviewBody": "A villanyszerelés nagyon gyorsan zajlott, és minden a tervek szerint alakult.",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.7"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Nagy Ilona",
			  "datePublished": "2024-11-07",
			  "name": "Korrekt árak és minőség!",
			  "reviewBody": "Az ablakcsere árai nagyon korrektek voltak, és a minőség is kiváló.",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.8"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Mészáros Péter",
			  "datePublished": "2024-12-01",
			  "name": "Szuper munka!",
			  "reviewBody": "A lakásfelújítás során minden a legnagyobb rendben zajlott. Csak ajánlani tudom őket!",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.9"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Takács Katalin",
			  "datePublished": "2025-01-20",
			  "name": "Elégedett ügyfél!",
			  "reviewBody": "A cég munkatársai nagyon szakszerűen dolgoztak, és az eredmény minden várakozásomat felülmúlta.",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.8"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Molnár József",
			  "datePublished": "2025-02-12",
			  "name": "Gyors és precíz szolgáltatás!",
			  "reviewBody": "Az ablakcsere nagyon gyorsan és precízen zajlott, és az eredmény kifogástalan lett.",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.7"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Pappné Éva",
			  "datePublished": "2025-03-08",
			  "name": "Kiváló minőségű munka!",
			  "reviewBody": "A villanyszerelés során kiváló minőségű anyagokat használtak, és a végeredmény tökéletes lett.",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.9"
			  }
			},
			{
			  "@type": "Review",
			  "author": "Kissné Anikó",
			  "datePublished": "2025-04-05",
			  "name": "Kiváló ár-érték arány!",
			  "reviewBody": "Az ablakcsere árai nagyon kedvezőek voltak, és a minőség is kiváló.",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "4.8"
			  }
			}
	  
	]
	}
	</script>
		
		
    </head>
    <body>
        <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        <!--********************************
            Code Start From Here 
            ******************************** -->
        <!--==============================
            Preloader
            ==============================-->
        <div class="preloader">
            <button class="vs-btn preloaderCls">Pillanat... </button>
            <div class="preloader-inner">
                <img src="<?php echo $server;?>assets/images/logo_color.png" alt="logo">
                <span class="loader"></span>
            </div>
        </div>
        <!--==============================
            Mobile Menu
            ============================== -->
        <div class="vs-menu-wrapper">
            <div class="vs-menu-area text-center">
                <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
                <div class="mobile-logo">
                    <a href="index.html"><img src="<?php echo $server;?>assets/images/logo_color.png" alt="Consik" class="logo"></a>
                </div>
                <div class="vs-mobile-menu">
                    <ul>
                        <li class="menu-item-has-children">
                            <a href="index.html">Home</a>
                            <ul class="sub-menu">
                                <li><a href="index.html">Home 1</a></li>
                                <li><a href="index-2.html">Home 2</a></li>
                                <li><a href="index-3.html">Home 3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="about.html">About Us</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="service.html">Services</a>
                            <ul class="sub-menu">
                                <li><a href="services.html">Service</a></li>
                                <li><a href="service-details.html">Service Details</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#none">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="index.html">Home 1</a></li>
                                <li><a href="index-2.html">Home 2</a></li>
                                <li><a href="index-3.html">Home 3</a></li>
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="shop-details.html">Shop Details</a></li>
                                <li><a href="faq.html">FAQ's</a></li>
                                <li><a href="blog.html">Blog List</a></li>
                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                <li><a href="blog-details.html">Blog Details</a>
                                </li>
                                <li><a href="services.html">Service</a></li>
                                <li><a href="service-details.html">Service
                                    Details</a>
                                </li>
                                <li><a href="team.html">Team</a></li>
                                <li><a href="team-details.html">Team Details</a>
                                </li>
                                <li><a href="project.html">Projects</a></li>
                                <li><a href="project-details.html">Projects
                                    Details</a>
                                </li>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="error.html">Error Page</a></li>
                                <li><a href="comming-soon.html">Comming Soon</a></li>
                                <li><a href="account.html">My Account</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="price.html">Pricing Plan</a></li>
                                <li><a href="element-typography.html">Elements
                                    Typography</a>
                                </li>
                                <li><a href="element-buttons.html">Button Elements</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="blog.html">News</a>
                            <ul class="sub-menu">
                                <li><a href="blog.html">Blog List</a></li>
                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="contact.html">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--==============================
            Sidemenu
            ============================== -->
        <div class="sidemenu-wrapper d-none d-lg-block">
            <div class="sidemenu-content">
                <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
                <div class="widget  ">
                    <div class="vs-widget-about">
                        <div class="footer-logo">
                            <a href="index.html"><img style="max-width: 90%;" src="<?php echo $server;?>assets/images/logo_black_text.png" alt="Consik" class="logo"></a>
                        </div>
                        <p>Villanyszerelés és teljeskörű lakásfelújítás Miskolc és környékén</p>
                        <div class="footer-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="widget  ">
                    <h4 class="widget_title">Gallery Posts</h4>
                    <div class="sidebar-gallery">
                        <div class="gallery-thumb">
                            <img src="<?php echo $server;?>assets/img/widget/gal-1-1.jpg" alt="Gallery Image" class="w-100">
                        </div>
                        <div class="gallery-thumb">
                            <img src="<?php echo $server;?>assets/img/widget/gal-1-2.jpg" alt="Gallery Image" class="w-100">
                        </div>
                        <div class="gallery-thumb">
                            <img src="<?php echo $server;?>assets/img/widget/gal-1-3.jpg" alt="Gallery Image" class="w-100">
                        </div>
                        <div class="gallery-thumb">
                            <img src="<?php echo $server;?>assets/img/widget/gal-1-4.jpg" alt="Gallery Image" class="w-100">
                        </div>
                        <div class="gallery-thumb">
                            <img src="<?php echo $server;?>assets/img/widget/gal-1-5.jpg" alt="Gallery Image" class="w-100">
                        </div>
                        <div class="gallery-thumb">
                            <img src="<?php echo $server;?>assets/img/widget/gal-1-6.jpg" alt="Gallery Image" class="w-100">
                        </div>
                    </div>
                </div>
                <div class="widget  ">
                    <h3 class="widget_title">Office Maps</h3>
                    <div class="footer-map">
                        <iframe title="office location map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d163720.11965853968!2d8.496481908353967!3d50.121347879150306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47bd096f477096c5%3A0x422435029b0c600!2sFrankfurt%2C%20Germany!5e0!3m2!1sen!2sbd!4v1651732317319!5m2!1sen!2sbd" width="200" height="180" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!--==============================
            Header Area
            ==============================-->
        <header class="vs-header header-layout3">
            <!-- Header Top -->
            <div class="header-topper position-relative">
                <div class="header-shape"></div>
                <div class="header-top">
                    <div class="container">
                        <div class="row align-items-center justify-content-between gy-1 text-center text-lg-start">
                            <div class="col-lg-auto d-none d-lg-block">
                                <p class="header-text"><span class="header-text__bullet"></span> Villanyszerelés és teljeskörű lakásfelújítás Miskolcon és környékén</p>
                            </div>
                            <div class="col-lg-auto">
                                <div class="header-social style-white">
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-main position-relative">
                    <div class="header-texures position-absolute end-0 top-0">
                        <img src="<?php echo $server;?>assets/img/textures/header-textures-1.svg" alt="texture">
                    </div>
                    <div class="container">
                        <div class="menu-top">
                            <div class="row justify-content-center justify-content-sm-between align-items-center gx-sm-0">
                                <div class="col-lg-3 col-md-4 col-auto">
                                    <div class="header-logo">
                                        <a href="index.html"><img src="<?php echo $server;?>assets/images/logo_white_text.png" alt="TechBiz" class="logo"></a>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-6 col-auto">
                                    <div class="header-infos">
                                        <div class="header-info">
                                            <div class="header-info_icon"><i><img src="<?php echo $server;?>assets/img/icons/phone.svg"
                                                alt="phone-icon"></i></div>
                                            <div class="media-body">
                                                <span class="header-info_label">Telefonszám</span>
                                                <div class="header-info_link"><a href="tel:+26921562148">+36 (70)746-4034</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="header-info d-none d-md-flex">
                                            <div class="header-info_icon"><i><img src="<?php echo $server;?>assets/img/icons/email.svg"
                                                alt="phone-icon"></i></div>
                                            <div class="media-body">
                                                <span class="header-info_label">Email cím</span>
                                                <div class="header-info_link"><a href="mailto:infomail@gmail.com">info@villanyszereles-miskolcon.hu</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Menu Area -->
            <div class="header-bottom sticky-wrapper">
                <div class="sticky-active">
                    <div class="container">
                        <div class="header-menu">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto">
                                    <nav class="main-menu d-none d-lg-block">
                                        <ul class="main-menu__list">
                                            <li class="menu-item-has-children" style="margin-left: -25px;">
                                                <a href="index.html">
                                                <span class="has-new-lable">
                                                <i class="has-new-lable__icon">
                                                <img src="<?php echo $server;?>assets/img/icons/house.svg" alt=""></i>
                                                Kezdőoldal
                                                </span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li><a href="index.html">Home 1</a></li>
                                                    <li><a href="index-2.html">Home 2</a></li>
                                                    <li><a href="index-3.html">Home 3</a></li>
                                                </ul>
                                            </li>
                                           <li class="menu-item-has-children mega-menu-wrap">
                                                <a href="about.html">Villanyszerelés</a>
                                            </li>
                                            
                                            <li class="menu-item-has-children mega-menu-wrap">
                                                <a href="#">Lakásfelújítás</a>
                                                <ul class="mega-menu">
                                                    <li>
                                                        <a href="#">Pagelist 1</a>
                                                        <ul>
                                                            <li><a href="index.html">Home 1</a></li>
                                                            <li><a href="index-2.html">Home 2</a></li>
                                                            <li><a href="index-3.html">Home 3</a></li>
                                                            <li><a href="shop.html">Shop</a></li>
                                                            <li><a href="shop-details.html">Shop Details</a></li>
                                                            <li><a href="faq.html">FAQ's</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="#">Pagelist 3</a>
                                                        <ul>
                                                            <li><a href="blog.html">Blog List</a></li>
                                                            <li><a href="blog-grid.html">Blog Grid</a></li>
                                                            <li><a href="blog-details.html">Blog Details</a>
                                                            </li>
                                                            <li><a href="services.html">Service</a></li>
                                                            <li><a href="service-details.html">Service
                                                                Details</a>
                                                            </li>
                                                            <li><a href="team.html">Team</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="#">Pagelist 4</a>
                                                        <ul>
                                                            <li><a href="team-details.html">Team Details</a>
                                                            </li>
                                                            <li><a href="project.html">Projects</a></li>
                                                            <li><a href="project-details.html">Projects
                                                                Details</a>
                                                            </li>
                                                            <li><a href="contact.html">Contact Us</a></li>
                                                            <li><a href="error.html">Error Page</a></li>
                                                            <li><a href="comming-soon.html">Comming Soon</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="#">Pagelist 5</a>
                                                        <ul>
                                                            <li><a href="account.html">My Account</a></li>
                                                            <li><a href="cart.html">Cart</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                            <li><a href="price.html">Pricing Plan</a></li>
                                                            <li><a href="element-typography.html">Elements
                                                                Typography</a>
                                                            </li>
                                                            <li><a href="element-buttons.html">Button Elements</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="blog.html">Blog bejegyzések</a>
                                            </li>
                                            <li>
                                                <a href="contact.html">Kapcsolat</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <button class="vs-menu-toggle d-inline-block d-lg-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="16.02" viewBox="0 0 38 16.02">
                                            <path d="M1268,206.78v-2h38v2Zm0-7.01v-2h38v2Zm0-7.01v-2h38v2Z" transform="translate(-1268 -190.76)" fill="currentColor" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="col-auto d-none d-vc-sm-block">
                                    <div class="header-btns">
                                        <button class="icon-btn style3 sideMenuToggler d-none d-lg-inline-block">
                                            <i>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="16.02"
                                                    viewBox="0 0 38 16.02">
                                                    <path d="M1268,206.78v-2h38v2Zm0-7.01v-2h38v2Zm0-7.01v-2h38v2Z"
                                                        transform="translate(-1268 -190.76)" fill="currentColor" />
                                                </svg>
                                            </i>
                                        </button>
                                        <a href="#" class="vs-btn d-none d-vc-sm-block">
                                        <span class="vs-btn__bar"></span>
                                        Árajánlatkérés
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--==============================
            Hero Area
            ==============================-->
        <section class="hero hero--layout3">
            <div class="vs-carousel vsslider1" data-slide-show="1" data-fade="true" data-arrows="false">
                <div>
                    <div class="hero-inner">
                        <div class="hero-bg3" data-bg-src="<?php echo $server;?>assets/img/hero/hero-3-1.jpg"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-9">
                                    <div class="hero-content3">
                                        <span class="hero-subtitle">AN EXTENSIVE RA NGE OF SERVICES</span>
                                        <h1 class="hero-title">Residential and commercial Solution</h1>
                                        <p class="hero-text">Consik is a construction and architecture most
                                            responsible for any kinds of themes.
                                        </p>
                                        <div class="hero-btns">
                                            <a href="about.html" class="vs-btn">
                                            <span class="vs-btn__bar"></span>
                                            START CONSULTING
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="hero-inner">
                        <div class="hero-bg" data-bg-src="<?php echo $server;?>assets/img/hero/hero-1-1.jpg"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="hero-content3">
                                        <span class="hero-subtitle">AN EXTENSIVE RA NGE OF SERVICES</span>
                                        <h1 class="hero-title">Residential and commercial Solution</h1>
                                        <p class="hero-text">Consik is a construction and architecture most
                                            responsible for any kinds of themes.
                                        </p>
                                        <div class="hero-btns">
                                            <a href="about.html" class="vs-btn">
                                            <span class="vs-btn__bar"></span>
                                            START CONSULTING
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-slider--buttons">
                <div class="container">
                    <div class="d-flex align-items-center">
                        <button class="icon-btn style7" data-slick-prev=".vsslider1"><i class="fal fa-angle-double-left"></i></button>
                        <button class="icon-btn style7" data-slick-next=".vsslider1"><i class="fal fa-angle-double-right"></i></button>
                    </div>
                </div>
            </div>
        </section>
        <!--==============================
            Category Area
            ==============================-->
        <div class="cate--layout1 space-top space-extra-bottom">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-4 col-auto">
                        <div class="cate-block--style">
                            <div class="cate-block__img">
                                <img src="<?php echo $server;?>assets/img/cate/cate-1-1.jpg" alt="cate">
                                <div class="cate-block__icon">
                                    <img src="<?php echo $server;?>assets/img/icons/cate-icon-1-1.svg" alt="cate icon">
                                </div>
                            </div>
                            <h3 class="cate-block__title"><a href="cate-details.html">Education</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-auto">
                        <div class="cate-block--style">
                            <div class="cate-block__img">
                                <img src="<?php echo $server;?>assets/img/cate/cate-1-2.jpg" alt="cate">
                                <div class="cate-block__icon">
                                    <img src="<?php echo $server;?>assets/img/icons/cate-icon-1-2.svg" alt="cate icon">
                                </div>
                            </div>
                            <h3 class="cate-block__title"><a href="cate-details.html">Commercial</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-auto">
                        <div class="cate-block--style">
                            <div class="cate-block__img">
                                <img src="<?php echo $server;?>assets/img/cate/cate-1-3.jpg" alt="cate">
                                <div class="cate-block__icon">
                                    <img src="<?php echo $server;?>assets/img/icons/cate-icon-1-3.svg" alt="cate icon">
                                </div>
                            </div>
                            <h3 class="cate-block__title"><a href="cate-details.html">Residental</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-auto">
                        <div class="cate-block--style">
                            <div class="cate-block__img">
                                <img src="<?php echo $server;?>assets/img/cate/cate-1-4.jpg" alt="cate">
                                <div class="cate-block__icon">
                                    <img src="<?php echo $server;?>assets/img/icons/cate-icon-1-4.svg" alt="cate icon">
                                </div>
                            </div>
                            <h3 class="cate-block__title"><a href="cate-details.html">Industrial</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--==============================
            About Area
            ==============================-->
        <section class="about--layout3 space-extra-bottom position-relative overflow-hidden">
            <div class="position-absolute end-0 bottom-0">
                <img src="<?php echo $server;?>assets/img/about/ab-3-3.png" alt="about">
            </div>
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-5">
                        <div class="title-area">
                            <span class="sec-subtitle">WELCOME TO OUR COMPANY</span>
                            <h2 class="sec-title">WE ARE QUALIFIED IN EVERY WORKING DEPARTMENTS</h2>
                        </div>
                        <div class="about-img--style3">
                            <img src="<?php echo $server;?>assets/img/about/ab-3-1.jpg" alt="about img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-img--style3">
                            <img src="<?php echo $server;?>assets/img/about/ab-3-2.jpg" alt="about img">
                            <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn2 popup-video" tabindex="0">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.875" height="36.156" viewBox="0 0 18.875 36.156">
                                        <g id="Triangle_1" data-name="Triangle 1" transform="translate(-753.451 -2955.813)" fill="rgba(0,0,0,0)"
                                            stroke-linejoin="round">
                                            <path
                                                d="M 755.951171875 2986.11279296875 L 755.951171875 2961.6689453125 L 768.7118530273438 2973.890869140625 L 755.951171875 2986.11279296875 Z"
                                                stroke="none"></path>
                                            <path
                                                d="M 758.451171875 2967.525146484375 L 758.451171875 2980.256591796875 L 765.0975952148438 2973.890869140625 L 758.451171875 2967.525146484375 M 753.451171875 2955.812744140625 L 772.326171875 2973.890869140625 L 753.451171875 2991.968994140625 L 753.451171875 2955.812744140625 Z"
                                                stroke="none" fill="currentColor"></path>
                                        </g>
                                    </svg>
                                </i>
                            </a>
                        </div>
                        <div class="about-widget">
                            <p class="about-text--style3">We successfully cope with tasks of varying complexity, provide long-term
                                guarantees and regularly master new technologies. Our portfolio includes dozens of successfully.
                            </p>
                            <a href="about.html" class="vs-btn style2" tabindex="0">
                            <span class="vs-btn__bar"></span>
                            MORE EXPLORE
                            </a>
                        </div>
                    </div>
                </div>
                <div class="space-extra-top">
                    <div class="brand--layout3 position-relative z-index-common">
                        <div class="vs-carousel vsslider2 brand-boxes" data-dots="false" data-slide-show="5" data-lg-slide-show="3" data-md-slide-show="3" data-sm-slide-show="2" data-xs-slide-show="1" data-center-mode="true" data-arrows="false">
                            <div>
                                <div class="brand-style">
                                    <img src="<?php echo $server;?>assets/img/brand/1.png" alt="brand">
                                </div>
                            </div>
                            <div>
                                <div class="brand-style">
                                    <img src="<?php echo $server;?>assets/img/brand/2.png" alt="brand">
                                </div>
                            </div>
                            <div>
                                <div class="brand-style">
                                    <img src="<?php echo $server;?>assets/img/brand/3.png" alt="brand">
                                </div>
                            </div>
                            <div>
                                <div class="brand-style">
                                    <img src="<?php echo $server;?>assets/img/brand/4.png" alt="brand">
                                </div>
                            </div>
                            <div>
                                <div class="brand-style">
                                    <img src="<?php echo $server;?>assets/img/brand/5.png" alt="brand">
                                </div>
                            </div>
                            <div>
                                <div class="brand-style">
                                    <img src="<?php echo $server;?>assets/img/brand/1.png" alt="brand">
                                </div>
                            </div>
                        </div>
                        <button class="icon-btn style8" data-slick-prev=".vsslider2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30.002" height="7.002" viewBox="0 0 30.002 7.002">
                                <path id="Rectangle_50_copy_7" data-name="Rectangle 50 copy 7" d="M407.723,7509.983q-1.86-1.736-3.724-3.472,1.874-1.759,3.751-3.515v2.884H434v1.24H407.749V7510A.181.181,0,0,1,407.723,7509.983Z" transform="translate(-403.999 -7502.996)" />
                            </svg>
                        </button>
                        <button class="icon-btn style8" data-slick-next=".vsslider2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30.004" height="7.002" viewBox="0 0 30.004 7.002">
                                <path id="Rectangle_50_copy_6" data-name="Rectangle 50 copy 6" d="M1506.25,7507.12H1480v-1.24h26.251V7503q1.877,1.756,3.753,3.515-1.866,1.736-3.726,3.472a.182.182,0,0,1-.026.015Z" transform="translate(-1480 -7502.996)" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!--==============================
            Projects Area
            ==============================-->
        <section class="project--layout3 z-index-common space-top space-extra-bottom overflow-hidden">
            <div class="start-0 bottom-0 position-absolute z-index-n1">
                <img src="<?php echo $server;?>assets/img/project/element-2.png" alt="Project">
            </div>
            <div class="end-0 bottom-0 position-absolute z-index-n1">
                <svg width="698.018" height="351.713" viewBox="0 0 698.018 351.713">
                    <g transform="translate(-1221.982 -2951.369)">
                        <path d="M1499.325,2951.369l175.95,114.074L1329.917,3227.5l-64.147,26.876Z" fill="#fc6601" />
                        <path d="M810,1086.805v336.276H111.982Z" transform="translate(1110 1880)" fill="#fc6601" />
                    </g>
                </svg>
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-9 mx-auto">
                        <div class="title-area text-center">
                            <span class="sec-icon">
                            <img src="<?php echo $server;?>assets/img/icons/logo-icon.png" alt="icon">
                            </span>
                            <span class="sec-subtitle2">OUR WORK SHOWCASE</span>
                            <h2 class="sec-title">EXPLORE RECENT PROJECTS</h2>
                        </div>
                    </div>
                </div>
                <div class="vs-carousel vsslider3" data-dots="true" data-slide-show="5" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2" data-xs-slide-show="1" data-center-mode="true" data-arrows="false">
                    <div>
                        <div class="project-block--style3">
                            <div class="project-block__media">
                                <a href="project-details.html">
                                <img class="project-block__img" src="<?php echo $server;?>assets/img/project/project-3-1.jpg" alt="project details">
                                </a>
                            </div>
                            <div class="project-block__content">
                                <div class="project-block__content__left">
                                    <h3 class="project-block__title h4">
                                        <a class="project-block__title__link" href="project-details.html">Superstructure Cardina Martime</a>
                                    </h3>
                                    <span class="project-block__location">LOCATION: United State</span>
                                </div>
                                <a class="project-block__arrow" href="project-details.html">
                                <i class="fal fa-angle-double-down"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="project-block--style3">
                            <div class="project-block__media">
                                <a href="project-details.html">
                                <img class="project-block__img" src="<?php echo $server;?>assets/img/project/project-3-2.jpg" alt="project details">
                                </a>
                            </div>
                            <div class="project-block__content">
                                <div class="project-block__content__left">
                                    <h3 class="project-block__title h4">
                                        <a class="project-block__title__link" href="project-details.html">Roof Reparation</a>
                                    </h3>
                                    <span class="project-block__location">LOCATION: United State</span>
                                </div>
                                <a class="project-block__arrow" href="project-details.html">
                                <i class="fal fa-angle-double-down"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="project-block--style3">
                            <div class="project-block__media">
                                <a href="project-details.html">
                                <img class="project-block__img" src="<?php echo $server;?>assets/img/project/project-3-3.jpg" alt="project details">
                                </a>
                            </div>
                            <div class="project-block__content">
                                <div class="project-block__content__left">
                                    <h3 class="project-block__title h4">
                                        <a class="project-block__title__link" href="project-details.html">Hull University
                                        VInci Construction</a>
                                    </h3>
                                    <span class="project-block__location">LOCATION: United State</span>
                                </div>
                                <a class="project-block__arrow" href="project-details.html">
                                <i class="fal fa-angle-double-down"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="project-block--style3">
                            <div class="project-block__media">
                                <a href="project-details.html">
                                <img class="project-block__img" src="<?php echo $server;?>assets/img/project/project-3-4.jpg" alt="project details">
                                </a>
                            </div>
                            <div class="project-block__content">
                                <div class="project-block__content__left">
                                    <h3 class="project-block__title h4">
                                        <a class="project-block__title__link" href="project-details.html">Steel and Glass</a>
                                    </h3>
                                    <span class="project-block__location">LOCATION: United State</span>
                                </div>
                                <a class="project-block__arrow" href="project-details.html">
                                <i class="fal fa-angle-double-down"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="project-block--style3">
                            <div class="project-block__media">
                                <a href="project-details.html">
                                <img class="project-block__img" src="<?php echo $server;?>assets/img/project/project-3-5.jpg" alt="project details">
                                </a>
                            </div>
                            <div class="project-block__content">
                                <div class="project-block__content__left">
                                    <h3 class="project-block__title h4">
                                        <a class="project-block__title__link" href="project-details.html">A large industrial
                                        manufacturing wtye</a>
                                    </h3>
                                    <span class="project-block__location">LOCATION: United State</span>
                                </div>
                                <a class="project-block__arrow" href="project-details.html">
                                <i class="fal fa-angle-double-down"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="project-block--style3">
                            <div class="project-block__media">
                                <a href="project-details.html">
                                <img class="project-block__img" src="<?php echo $server;?>assets/img/project/project-3-1.jpg" alt="project details">
                                </a>
                            </div>
                            <div class="project-block__content">
                                <div class="project-block__content__left">
                                    <h3 class="project-block__title h4">
                                        <a class="project-block__title__link" href="project-details.html">Superstructure Cardina Martime</a>
                                    </h3>
                                    <span class="project-block__location">LOCATION: United State</span>
                                </div>
                                <a class="project-block__arrow" href="project-details.html">
                                <i class="fal fa-angle-double-down"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==============================
            Team Area
            ==============================-->
        <section class="vsteam--layout1 space-top z-index-common overflow-hidden">
            <div class="end-0 bottom-0 position-absolute z-index-n1 opacity-10">
                <img src="<?php echo $server;?>assets/img/team/team-backlay-1.jpg" alt="Project">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="title-area text-center">
                            <span class="sec-icon">
                            <img src="<?php echo $server;?>assets/img/icons/logo-icon.png" alt="icon">
                            </span>
                            <span class="sec-subtitle2">OUR SKILLED TEAM</span>
                            <h2 class="sec-title">MEET THE EXPERT TEAM</h2>
                        </div>
                    </div>
                </div>
                <div class="row gx-50 justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="vsteam-block--style item">
                            <div class="vsteam-block__media">
                                <a href="team-details.html">
                                <img src="<?php echo $server;?>assets/img/team/team-member-3-1.jpg" alt="Team Member 3 1" class="team-block__member--img">
                                </a>
                            </div>
                            <div class="vsteam-block__content">
                                <h3 class="vsteam-block__title">
                                    <a class="vsteam-block__title__link" href="team-details.html">Harald Gindl</a>
                                </h3>
                                <span class="vsteam-block__designation">Head Railway Construction</span>
                            </div>
                            <div class="social-style">
                                <ul>
                                    <li>
                                        <a href="facebook.html"><i class="fab fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="facebook.html"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="facebook.html"><i class="fab fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="vsteam-block--style item">
                            <div class="vsteam-block__media">
                                <a href="team-details.html">
                                <img src="<?php echo $server;?>assets/img/team/team-member-3-2.jpg" alt="Team Member 3 1" class="team-block__member--img">
                                </a>
                            </div>
                            <div class="vsteam-block__content">
                                <h3 class="vsteam-block__title">
                                    <a class="vsteam-block__title__link" href="team-details.html">Thomas Walkar</a>
                                </h3>
                                <span class="vsteam-block__designation">Head Railway Construction</span>
                            </div>
                            <div class="social-style">
                                <ul>
                                    <li>
                                        <a href="facebook.html"><i class="fab fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="facebook.html"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="facebook.html"><i class="fab fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="vsteam-block--style item">
                            <div class="vsteam-block__media">
                                <a href="team-details.html">
                                <img src="<?php echo $server;?>assets/img/team/team-member-3-3.jpg" alt="Team Member 3 1" class="team-block__member--img">
                                </a>
                            </div>
                            <div class="vsteam-block__content">
                                <h3 class="vsteam-block__title">
                                    <a class="vsteam-block__title__link" href="team-details.html">Mehadi Hassan</a>
                                </h3>
                                <span class="vsteam-block__designation">Head Railway Construction</span>
                            </div>
                            <div class="social-style">
                                <ul>
                                    <li>
                                        <a href="facebook.html"><i class="fab fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="facebook.html"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="facebook.html"><i class="fab fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==============================
            Our Banner Widget
            ==============================-->
        <div class="space-extra-top space-extra-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="consik-widget--style" data-bg-src="<?php echo $server;?>assets/img/textures/widget-textures-1.svg">
                            <div class="consik-widget__img">
                                <img src="<?php echo $server;?>assets/img/widget/widget-3-1.png" alt="widget">
                            </div>
                            <div class="consik-widget__element">
                                <svg width="372.006" height="87" viewBox="0 0 372.006 87">
                                    <g transform="translate(-573.997 -4493.999)">
                                        <path d="M647.062,4516.9l50.349,19.889-98.826,28.253-18.356,4.686Z" fill="#fc6601" />
                                        <path d="M864.6,4494l81.4,86.333L631.178,4581,574,4579.7Z" fill="#fc6601" />
                                    </g>
                                </svg>
                            </div>
                            <div class="consik-widget__body">
                                <h4 class="consik-widget__title">Best Repair & Painting</h4>
                                <p class="consik-widget__text">Elementum nisi quis eleifend am adipis
                                    vitae proin. Iac elit ullamc urna.
                                </p>
                                <a href="about.html" class="vs-btn" tabindex="0">
                                <span class="vs-btn__bar"></span>
                                Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="consik-widget--style" data-bg-src="<?php echo $server;?>assets/img/textures/widget-textures-1.svg">
                            <div class="consik-widget__img">
                                <img src="<?php echo $server;?>assets/img/widget/widget-3-2.png" alt="widget">
                            </div>
                            <div class="consik-widget__element">
                                <svg width="372.006" height="87" viewBox="0 0 372.006 87">
                                    <g transform="translate(-573.997 -4493.999)">
                                        <path d="M647.062,4516.9l50.349,19.889-98.826,28.253-18.356,4.686Z" fill="#fc6601" />
                                        <path d="M864.6,4494l81.4,86.333L631.178,4581,574,4579.7Z" fill="#fc6601" />
                                    </g>
                                </svg>
                            </div>
                            <div class="consik-widget__body">
                                <h4 class="consik-widget__title">Civils Projects</h4>
                                <p class="consik-widget__text">Elementum nisi quis eleifend am adipis
                                    vitae proin. Iac elit ullamc urna.
                                </p>
                                <a href="about.html" class="vs-btn" tabindex="0">
                                <span class="vs-btn__bar"></span>
                                Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--==============================
            Our Sucess
            ==============================-->
        <section class="sucess--layout1 z-index-common space-top" data-bg-src="<?php echo $server;?>assets/img/bg/bg-2.jpg">
            <div class="sucess__overlay"></div>
            <div class="sucess__shape"></div>
            <div class="sucess__element1 position-absolute top-0 start-0 z-index-n1">
                <svg width="537.549" height="430.304" viewBox="0 0 537.549 430.304">
                    <g transform="translate(0 -4705)">
                        <path d="M310.6,5135.3,152.516,4998.368,462.806,4803.84l57.633-32.263Z" fill="#fc6601" />
                        <path d="M0,4705H537.549L0,5052.363Z" fill="#fc6601" />
                    </g>
                </svg>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-6 mx-auto">
                        <div class="title-area text-center">
                            <span class="sec-subtitle2 text-white">COVERING ARCHITECTURAL DESIGN</span>
                            <h2 class="sec-titlexh1 text-white">YOUR <span class="highlight">RENOVATION</span> STARTS HERE</h2>
                            <a href="about.html" class="vs-btn" tabindex="0">
                            <span class="vs-btn__bar"></span>
                            START CONSULTING
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row gx-0">
                    <div class="col-lg-4 col-md-6">
                        <div class="sucess-block--style1" data-bg-src="<?php echo $server;?>assets/img/textures/sucess-bg-1.svg">
                            <div class="sucess-block__icon">
                                <img src="<?php echo $server;?>assets/img/icons/sucess-icon-1.svg" alt="sucess icon 1">
                            </div>
                            <div class="sucess-block__number">
                                <span>80</span> Million SQFT
                                <sup>Over</sup>
                            </div>
                            <p class="sucess-block__text">of Industrial space delivered.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="sucess-block--style1" data-bg-src="<?php echo $server;?>assets/img/textures/sucess-bg-1.svg">
                            <div class="sucess-block__icon">
                                <img src="<?php echo $server;?>assets/img/icons/sucess-icon-2.svg" alt="sucess icon 1">
                            </div>
                            <div class="sucess-block__number">
                                <span>8,000</span> multi-room
                                <sup>Over</sup>
                            </div>
                            <p class="sucess-block__text">of Industrial space delivered.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="sucess-block--style1" data-bg-src="<?php echo $server;?>assets/img/textures/sucess-bg-1.svg">
                            <div class="sucess-block__icon">
                                <img src="<?php echo $server;?>assets/img/icons/sucess-icon-3.svg" alt="sucess icon 1">
                            </div>
                            <div class="sucess-block__number">
                                <span>100</span> Kilometters
                                <sup>Over</sup>
                            </div>
                            <p class="sucess-block__text">of Industrial space delivered.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==============================
            Client Area
            ==============================-->
        <section class="client--layout2 space-top space-extra-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="title-area">
                            <span class="sec-subtitle2">CLIENTS REVIEWS</span>
                            <h2 class="sec-title">TESTIMONIALS</h2>
                        </div>
                        <div class="vs-carousel vssliderClient2 row" data-dots="false" data-slide-show="1" data-lg-slide-show="1" data-md-slide-show="1" data-sm-slide-show="1" data-xs-slide-show="1" data-center-mode="true">
                            <div class="col">
                                <div class="client-block--style2">
                                    <span class="client-block__shape position-absolute top-0 end-0 z-n1">
                                    <img src="<?php echo $server;?>assets/img/icons/quote-icon.svg" alt="quote icon">
                                    </span>
                                    <p class="client-block__text">To my mind, the greatest reward for any renovation being able to experience
                                        the
                                        transformation from end. enjoy getting to see how a renovation can go to a reality and lead to an
                                        elevated
                                        mood.
                                    </p>
                                    <div class="client-block__clientInfo">
                                        <div class="client-block__avatar">
                                            <img src="<?php echo $server;?>assets/img/client/client-1-1.png" alt="client">
                                        </div>
                                        <div class="client-block__info">
                                            <h3 class="client-block__name">Thomas Marko</h3>
                                            <span class="client-block__designation">Chairman, Building Company</span>
                                            <div class="client-block__ratings">
                                                <ul>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="client-block--style2">
                                    <span class="client-block__shape position-absolute top-0 end-0 z-n1">
                                    <img src="<?php echo $server;?>assets/img/icons/quote-icon.svg" alt="quote icon">
                                    </span>
                                    <p class="client-block__text">To my mind, the greatest reward for any renovation being able to experience
                                        the
                                        transformation from end. enjoy getting to see how a renovation can go to a reality and lead to an
                                        elevated
                                        mood.
                                    </p>
                                    <div class="client-block__clientInfo">
                                        <div class="client-block__avatar">
                                            <img src="<?php echo $server;?>assets/img/client/client-1-1.png" alt="client">
                                        </div>
                                        <div class="client-block__info">
                                            <h3 class="client-block__name">Thomas Marko</h3>
                                            <span class="client-block__designation">Chairman, Building Company</span>
                                            <div class="client-block__ratings">
                                                <ul>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="client-block--style2">
                                    <span class="client-block__shape position-absolute top-0 end-0 z-n1">
                                    <img src="<?php echo $server;?>assets/img/icons/quote-icon.svg" alt="quote icon">
                                    </span>
                                    <p class="client-block__text">To my mind, the greatest reward for any renovation being able to experience
                                        the
                                        transformation from end. enjoy getting to see how a renovation can go to a reality and lead to an
                                        elevated
                                        mood.
                                    </p>
                                    <div class="client-block__clientInfo">
                                        <div class="client-block__avatar">
                                            <img src="<?php echo $server;?>assets/img/client/client-1-1.png" alt="client">
                                        </div>
                                        <div class="client-block__info">
                                            <h3 class="client-block__name">Thomas Marko</h3>
                                            <span class="client-block__designation">Chairman, Building Company</span>
                                            <div class="client-block__ratings">
                                                <ul>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 mb-30">
                            <button class="icon-btn style9" data-slick-prev=".vssliderClient2">
                                <svg width="30.002" height="7.003" viewBox="0 0 30.002 7.003">
                                    <path data-name="Rectangle 50 copy 8" d="M416.723,6229.985,413,6226.51q1.876-1.756,3.751-3.515v2.885H443v1.24H416.748V6230A.082.082,0,0,0,416.723,6229.985Z" transform="translate(-412.997 -6222.996)" />
                                </svg>
                            </button>
                            <button class="icon-btn style9" data-slick-next=".vssliderClient2">
                                <svg width="30.003" height="7.003" viewBox="0 0 30.003 7.003">
                                    <path d="M550.251,6227.12H524v-1.24h26.252V6223q1.876,1.757,3.751,3.515l-3.726,3.475a.149.149,0,0,0-.025.014Z" transform="translate(-523.999 -6222.996)" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="client-img">
                            <div class="client-img__two">
                                <img src="<?php echo $server;?>assets/img/client/testi-1-2.jpg" alt="testi 2">
                            </div>
                            <div class="client-img__one">
                                <img src="<?php echo $server;?>assets/img/client/testi-1-1.png" alt="testi 1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==============================
            Pricing
            ==============================-->
        <div class="price space-extra-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8 mx-auto">
                        <div class="title-area text-center">
                            <span class="sec-icon">
                            <img src="<?php echo $server;?>assets/img/icons/logo-icon.png" alt="icon">
                            </span>
                            <span class="sec-subtitle2">BEST PRICING PLAN</span>
                            <h2 class="sec-title">CHOOSE YOUR PLAN</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="price-block--style">
                            <div class="price-block__body">
                                <div class="price-block__header" data-bg-src="<?php echo $server;?>assets/img/textures/price-textures.svg">
                                    <span class="price-block__name">Basic Plan</span>
                                    <span class="price-block__price"><span>$150<span>.00</span></span><sub>/per monthly</sub></span>
                                    <div class="price-block__header--bottom">
                                        <span class="price-block__icon">
                                        <img src="<?php echo $server;?>assets/img/icons/price-icon-1.svg" alt="pricing icon one">
                                        </span>
                                    </div>
                                </div>
                                <div class="price-block__content">
                                    <ul>
                                        <li>500+ Sq Metres</li>
                                        <li>Swimming Pool Included</li>
                                        <li>Up to 10 Rooms</li>
                                        <li>Best Premium Materials</li>
                                        <li>Floor Plan Design</li>
                                    </ul>
                                    <a href="price.html" class="vs-btn style2" tabindex="0">
                                    <span class="vs-btn__bar"></span>
                                    PURCHASE NOW
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="price-block--style">
                            <div class="price-block__body">
                                <div class="price-block__header" data-bg-src="<?php echo $server;?>assets/img/textures/price-textures.svg">
                                    <span class="price-block__name">Basic Plan</span>
                                    <span class="price-block__price"><span>$230<span>.00</span></span><sub>/per monthly</sub></span>
                                    <div class="price-block__header--bottom">
                                        <span class="price-block__icon">
                                        <img src="<?php echo $server;?>assets/img/icons/price-icon-2.svg" alt="pricing icon one">
                                        </span>
                                    </div>
                                </div>
                                <div class="price-block__content">
                                    <ul>
                                        <li>500+ Sq Metres</li>
                                        <li>Swimming Pool Included</li>
                                        <li>Up to 10 Rooms</li>
                                        <li>Best Premium Materials</li>
                                        <li>Floor Plan Design</li>
                                    </ul>
                                    <a href="price.html" class="vs-btn style2" tabindex="0">
                                    <span class="vs-btn__bar"></span>
                                    PURCHASE NOW
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="price-block--style">
                            <div class="price-block__body">
                                <div class="price-block__header" data-bg-src="<?php echo $server;?>assets/img/textures/price-textures.svg">
                                    <span class="price-block__name">Basic Plan</span>
                                    <span class="price-block__price"><span>$320<span>.00</span></span><sub>/per monthly</sub></span>
                                    <div class="price-block__header--bottom">
                                        <span class="price-block__icon">
                                        <img src="<?php echo $server;?>assets/img/icons/price-icon-3.svg" alt="pricing icon one">
                                        </span>
                                    </div>
                                </div>
                                <div class="price-block__content">
                                    <ul>
                                        <li>500+ Sq Metres</li>
                                        <li>Swimming Pool Included</li>
                                        <li>Up to 10 Rooms</li>
                                        <li>Best Premium Materials</li>
                                        <li>Floor Plan Design</li>
                                    </ul>
                                    <a href="price.html" class="vs-btn style2" tabindex="0">
                                    <span class="vs-btn__bar"></span>
                                    PURCHASE NOW
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--==============================
            Request Quote Form
            ==============================-->
        <div class="quote--layout1 z-index-common overflow-hidden" data-bg-src="<?php echo $server;?>assets/img/bg/bg-1.jpg">
            <div class="quote__shape position-absolute start-0 top-0 bottom-0 z-index-n1">
                <svg width="929" height="771.999" viewBox="0 0 929 771.999">
                    <path id="Rectangle_523_copy" data-name="Rectangle 523 copy" d="M0,7286H636.73L929,8058,0,8056Z" transform="translate(0 -7286)" fill="#fc6601" />
                </svg>
            </div>
            <div class="quote__img position-absolute bottom-0">
                <img src="<?php echo $server;?>assets/img/quote/quote-img-1.png" alt="quote-img-1">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <form action="https://html.vecurosoft.com/consik/demo/mail.php" class="form--style2 z-index-common" data-bg-src="<?php echo $server;?>assets/img/textures/quote-textures.svg">
                            <div class="position-absolute end-0 bottom-0">
                                <svg width="464.008" height="109" viewBox="0 0 464.008 109">
                                    <g transform="translate(-628.996 -7868)">
                                        <path d="M720.131,7896.7l62.8,24.918-123.266,35.4-22.9,5.87Z" fill="#f0f0f0" />
                                        <path id="Rectangle_2_copy" data-name="Rectangle 2 copy" d="M991.469,7868,1093,7976.163,700.318,7977,629,7975.375Z" fill="#f0f0f0" />
                                    </g>
                                </svg>
                            </div>
                            <span class="sec-subtitle">GET IN TOUCH</span>
                            <h2 class="sec-title mb-1">REQUEST A QUOTE</h2>
                            <p class="sec-text">To get the cost estimation of your house please select from the following:</p>
                            <div class="row gx-20">
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" placeholder="Complete Name">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" placeholder="Email Address">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="tel" class="form-control" placeholder="Phone No">
                                </div>
                                <div class="col-12 form-group">
                                    <select name="area" id="area" class="form-select">
                                        <option value="" disabled selected>Select Service</option>
                                        <option value="area1">Roof Maintaince</option>
                                        <option value="area2">Roof Maintaince</option>
                                        <option value="area3">Roof Maintaince</option>
                                        <option value="area4">Roof Maintaince</option>
                                        <option value="area5">Roof Maintaince</option>
                                    </select>
                                </div>
                                <div class="col-12 form-group">
                                    <a href="contact.html" class="vs-btn" tabindex="0">
                                    <span class="vs-btn__bar"></span>
                                    SUBMIT NOW
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--==============================
            Blog Area
            ==============================-->
        <section class="blog--layout1 space-top z-index-common">
            <div class="container">
                <div class="space-extra-bottom">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8 mx-auto">
                            <div class="title-area text-center">
                                <span class="sec-icon">
                                <img src="<?php echo $server;?>assets/img/icons/logo-icon.png" alt="icon">
                                </span>
                                <span class="sec-subtitle2">UPDATES AND NEWS</span>
                                <h2 class="sec-title">RECENT ARTICLES</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center ">
                        <div class="col-lg-4 col-md-6">
                            <div class="vs-blog blog-style5" data-bg-src="<?php echo $server;?>assets/img/blog/blog-s-2-1.jpg">
                                <div class="blog-shape">
                                    <img src="<?php echo $server;?>assets/img/textures/texture-1.png" alt="texture">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-header">
                                        <span class="blog-date">12 JANUARY 2024</span>
                                        <h2 class="blog-title"><a href="blog-details.html">Rest of us Avoid Common
                                            Issues to get stuck</a>
                                        </h2>
                                        <p class="blog-text">Lorem ipsum dolor sit amet, coaliq Aenean sollicitudi, lo bi We reossibl dolor sit
                                            ctor.
                                        </p>
                                    </div>
                                    <div class="blog-footer">
                                        <div class="blog-meta">
                                            <a class="blog-meta__link" href="blog.html">by <span class="blog-meta__highlight">Jakki
                                            James</span></a>
                                        </div>
                                        <a href="blog-details.html" class="link-btn">
                                        <i class="fal fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="blog-content overlay">
                                    <div class="blog-header">
                                        <span class="blog-date">25 FEBRUARY 2024</span>
                                        <h2 class="blog-title"><a href="blog-details.html">Rest of us Avoid Common
                                            Issues to get stuck</a>
                                        </h2>
                                    </div>
                                    <div class="blog-footer">
                                        <div class="blog-meta">
                                            <a class="blog-meta__link" href="blog.html">by <span class="blog-meta__highlight">Jakki
                                            James</span></a>
                                        </div>
                                        <a href="blog-details.html" class="link-btn">
                                        <i class="fal fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="vs-blog blog-style5" data-bg-src="<?php echo $server;?>assets/img/blog/blog-s-2-1.jpg">
                                <div class="blog-shape">
                                    <img src="<?php echo $server;?>assets/img/textures/texture-1.png" alt="texture">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-header">
                                        <span class="blog-date">28 MARCH 2023</span>
                                        <h2 class="blog-title"><a href="blog-details.html">Rest of us Avoid Common
                                            Issues to get stuck</a>
                                        </h2>
                                        <p class="blog-text">Lorem ipsum dolor sit amet, coaliq Aenean sollicitudi, lo bi We reossibl dolor sit
                                            ctor.
                                        </p>
                                    </div>
                                    <div class="blog-footer">
                                        <div class="blog-meta">
                                            <a class="blog-meta__link" href="blog.html">by <span class="blog-meta__highlight">Jakki
                                            James</span></a>
                                        </div>
                                        <a href="blog-details.html" class="link-btn">
                                        <i class="fal fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="blog-content overlay">
                                    <div class="blog-header">
                                        <span class="blog-date">27 FEBRUARY 2023</span>
                                        <h2 class="blog-title"><a href="blog-details.html">Rest of us Avoid Common
                                            Issues to get stuck</a>
                                        </h2>
                                    </div>
                                    <div class="blog-footer">
                                        <div class="blog-meta">
                                            <a class="blog-meta__link" href="blog.html">by <span class="blog-meta__highlight">Jakki
                                            James</span></a>
                                        </div>
                                        <a href="blog-details.html" class="link-btn">
                                        <i class="fal fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="vs-blog blog-style5" data-bg-src="<?php echo $server;?>assets/img/blog/blog-s-2-1.jpg">
                                <div class="blog-shape">
                                    <img src="<?php echo $server;?>assets/img/textures/texture-1.png" alt="texture">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-header">
                                        <span class="blog-date">21 DECEMBER 2023</span>
                                        <h2 class="blog-title"><a href="blog-details.html">Rest of us Avoid Common
                                            Issues to get stuck</a>
                                        </h2>
                                        <p class="blog-text">Lorem ipsum dolor sit amet, coaliq Aenean sollicitudi, lo bi We reossibl dolor sit
                                            ctor.
                                        </p>
                                    </div>
                                    <div class="blog-footer">
                                        <div class="blog-meta">
                                            <a class="blog-meta__link" href="blog.html">by <span class="blog-meta__highlight">Jakki
                                            James</span></a>
                                        </div>
                                        <a href="blog-details.html" class="link-btn">
                                        <i class="fal fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="blog-content overlay">
                                    <div class="blog-header">
                                        <span class="blog-date">12 DECEMBER 2024</span>
                                        <h2 class="blog-title"><a href="blog-details.html">Rest of us Avoid Common
                                            Issues to get stuck</a>
                                        </h2>
                                    </div>
                                    <div class="blog-footer">
                                        <div class="blog-meta">
                                            <a class="blog-meta__link" href="blog.html">by <span class="blog-meta__highlight">Jakki
                                            James</span></a>
                                        </div>
                                        <a href="blog-details.html" class="link-btn">
                                        <i class="fal fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-button pt-5 d-flex justify-content-center text-center">
                        <a href="blog.html" class="vs-btn style2" tabindex="0">
                        <span class="vs-btn__bar"></span>
                        VIEW ALL NEWS
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <div class="info-section position-relative">
            <div class="info-section__shape">
                <div class="info-section__shape__block info-section__shape__left">
                    <span class="info-section__shape__sqr"></span>
                    <span class="info-section__shape__sqr"></span>
                    <span class="info-section__shape__sqr"></span>
                    <span class="info-section__shape__sqr"></span>
                </div>
                <div class="info-section__shape__block info-section__shape__right">
                    <span class="info-section__shape__sqr"></span>
                    <span class="info-section__shape__sqr"></span>
                    <span class="info-section__shape__sqr"></span>
                    <span class="info-section__shape__sqr"></span>
                </div>
            </div>
            <div class="container">
                <div class="row gx-0">
                    <div class="col-md-4">
                        <div class="footer-info">
                            <div class="footer-info_icon">
                                <i>
                                <img src="<?php echo $server;?>assets/img/icons/phone-info.svg" alt="phone-info">
                                </i>
                            </div>
                            <div class="media-body">
                                <span class="footer-info_label">Phone No:</span>
                                <div class="footer-info_link">
                                    <a href="tel:+254982156213">+254 (98) 2156 213</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-info">
                            <div class="footer-info_icon">
                                <i>
                                <img src="<?php echo $server;?>assets/img/icons/open-mail-info.svg" alt="open-email-info">
                                </i>
                            </div>
                            <div class="media-body">
                                <span class="footer-info_label">Email Address:</span>
                                <div class="footer-info_link">
                                    <a href="tel:+254982156213">username@domain.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-info">
                            <div class="footer-info_icon">
                                <i>
                                <img src="<?php echo $server;?>assets/img/icons/location-info.svg" alt="location info">
                                </i>
                            </div>
                            <div class="media-body">
                                <div class="footer-info_link">
                                    380 St Kilda Road, Jackson
                                    New Store, United State
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--==============================
            Footer Area
            ==============================-->
        <footer class="footer-wrapper footer-layout3" data-bg-src="<?php echo $server;?>assets/img/footer/footer-bg.jpg">
            <div class="footer-layout3__overlay"></div>
            <div class="widget-area">
                <div class="container">
                    <div class="row justify-content-center justify-content-lg-between">
                        <div class="col-md-12 col-lg-4 col-xl-4">
                            <div class="widget footer-widget">
                                <div class="widget__logo">
                                    <img src="<?php echo $server;?>assets/images/logo_white_text.png" alt="logo">
                                </div>
                                <div class="vs-widget-about">
                                    <p class="footer-text">Lorem ipsum dolor sit amet, conse auctor
                                        aliquet Aenesollicitudi, lobibendum auctor.
                                        lobiben aliquet. Lorem ipsum dolor sit ame
                                        aliquet Aenesollicitudi, lobibendum auctor.
                                        lobiben aliquet. 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 col-xl-4">
                            <div class="widget widget_nav_menu footer-widget">
                                <h3 class="widget_title">JOIN NEWSLETTER</h3>
                                <div class="vs-widget-about">
                                    <p class="vs-widget-about__text">Subscribe and get latest news.</p>
                                    <div class="widget__submit position-relative">
                                        <input class="wp-block--submit__input" placeholder="Enter your email address...." type="search" name="s">
                                        <button type="button" class="vs-btn style11">
                                        <i class="fas fa-arrow-right"></i>
                                        </button>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <input id="footer-checkbox" class="widget__submit--checkbox" type="checkbox">
                                        <label class="widget__submit--label" for="footer-checkbox">I agree that data will be
                                        saved for the purpose of making contact</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 col-xl-4">
                            <div class="widget footer-widget">
                                <h3 class="widget_title">FOLLOW US</h3>
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-behance"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <p class="copyright-text text-center text-lg-start">© 2024 Consik. All Rights Reserved By <a href="https://themeforest.net/user/vecuro_themes">Vecuro</a></p>
                        </div>
                        <div class="col-lg-6">
                            <div class="widget widget_nav_menu footer-widget">
                                <div class="menu-all-pages-container">
                                    <ul class="menu justify-content-center justify-content-lg-end">
                                        <li><a href="contact.html">PRIVACY</a></li>
                                        <li><a href="faq.html">TERMS & CONDITION</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>
        <!--********************************
            Code End  Here 
            ******************************** -->
        <!--==============================
            All Js File
            ============================== -->
        <!-- Jquery -->
        <script src="<?php echo $server;?>assets/js/vendor/jquery-3.6.0.min.js"></script>
        <!-- Slick Slider -->
        <!-- <script src="<?php echo $server;?>assets/js/app.min.js"></script> -->
        <script src="<?php echo $server;?>assets/js/slick.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo $server;?>assets/js/bootstrap.min.js"></script>
        <!-- WOW.js Animation -->
        <script src="<?php echo $server;?>assets/js/wow.min.js"></script>
        <!-- Magnific Popup -->
        <script src="<?php echo $server;?>assets/js/jquery.magnific-popup.min.js"></script>
        <!-- Isotope Filter -->
        <script src="<?php echo $server;?>assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="<?php echo $server;?>assets/js/isotope.pkgd.min.js"></script>
        <!-- Select 2 -->
        <script src="<?php echo $server;?>assets/js/select2.min.js"></script>
        <!-- Main Js File -->
        <script src="<?php echo $server;?>assets/js/main.js"></script>
    </body>
</html>