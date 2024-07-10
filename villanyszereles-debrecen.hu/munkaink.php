<?php
session_start();
//print_r($_POST);
include('config/connect.php');
require_once('config/functions.php');


$get_domain_base_infos = get_domain_base_infos($_SERVER['SERVER_NAME']);
foreach($get_domain_base_infos as $get_domain_base_infos) {
	
	$server = 'https://'.$get_domain_base_infos['domain'].'/';
	$telefon = $get_domain_base_infos['telefon'];
	$email = $get_domain_base_infos['email'];
	$company = $get_domain_base_infos['company'];
	$company_address = $get_domain_base_infos['company_address'];
	$owner =  $get_domain_base_infos['owner'];
	$facebook =  $get_domain_base_infos['facebook'];
	$google_tag =  $get_domain_base_infos['google_tag'];
	$google_analytics =  $get_domain_base_infos['google_analytics'];
	$google_site_verification =  $get_domain_base_infos['google-site-verification'];
	
	
}

$get_domain_detail_infos = get_domain_detail_infos($_SERVER['SERVER_NAME'], str_replace("/", "", $_SERVER["SCRIPT_NAME"]));
foreach($get_domain_detail_infos as $get_domain_detail_infos) {
	
	$oldal_title = $get_domain_detail_infos['site_title'];
	$site_description = $get_domain_detail_infos['site_description'];
	$site_keywords = $get_domain_detail_infos['site_keywords'];
	$site_h1 = $get_domain_detail_infos['site_h1'];
	
	
}





//print_r($_SESSION);

if (ISSET($_POST['contactForm'])){
	$szolgaltatasok = implode (", ", $_POST['product']).' szigetelés';
}

//write visitors_log
$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];

//oldal
$site_name = 'Kezdőoldal';
$_SESSION['site_name'] = $site_name;
$_SESSION['domain'] = $_SERVER['SERVER_NAME'];
$_SESSION['ip'] = $ip;

//böngésző
$ua=getBrowser();
$_SESSION['browser'] = $ua['name'];


// OP rendszert
$_SESSION['os'] = getOS();

// Település ha nem robot
if (!preg_match('/bot|crawl|curl|dataprovider|search|get|spider|find|java|majesticsEO|google|yahoo|teoma|contaxe|yandex|libwww-perl|facebookexternalhit/i', $_SERVER['HTTP_USER_AGENT'])) {
	
	
	// 1 próbálkozás
	$proba_1 = file_get_contents('https://www.iplocate.io/api/lookup/'.$ip.'');
	$proba_1 = json_decode($proba_1);
	$city = $proba_1->city;
	$country = $proba_1->country_code;
	
	if (!EMPTY($city)){
		$_SESSION['city'] = $city;
		$_SESSION['visitor_country'] = $country;
	}else{
		// Próba 2
		$proba_3 = file_get_contents('http://ip-api.com/json/'.$ip.'');
		$proba_3 = json_decode($proba_3);
		$city = $proba_3->city;
		$country = $proba_3->countryCode;
		$_SESSION['city'] = $city;
		$_SESSION['visitor_country'] = $country;
		
	}
}

// Asztali gép vs mobil

$useragent = $_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))

{ 
	$_SESSION['visitor_typ'] = 'mobil';
}
else{
	$_SESSION['visitor_typ'] = 'asztali gép';
}

// datum
$_SESSION['visitor_datum'] = date('Y-m-d H:i:s');


//print_r($_SESSION);
if ($_SESSION['visitor_country']=='HU' && !preg_match('/bot|crawl|curl|dataprovider|search|get|spider|find|java|majesticsEO|google|yahoo|teoma|contaxe|yandex|libwww-perl|facebookexternalhit/i', $_SERVER['HTTP_USER_AGENT'])) {
write_log();
}
				 
				 
?>

<!DOCTYPE html>
<html lang="hu-HU">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-14EFZJ16GY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-14EFZJ16GY');
</script>
        <meta charset="UTF-8">
		<meta name="robots" content="index, follow">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="xmlrpc.php">
        <link rel="icon" href="https://villanyszereles-debrecen.hu/wp-content/uploads/sites/6/2017/09/favicon.png" type="image/x-icon"/>
        <link rel="shortcut icon" href="https://villanyszereles-debrecen.hu/wp-content/uploads/sites/6/2017/09/favicon.png" type="image/x-icon"/>
        <title><?php echo $oldal_title;?></title>
		<meta name="description" content="<?php echo $site_description;?>">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A600%7CRoboto%3A100%2C100i%2C300%2C300i%2C400%2C400i%2C500%2C500i%2C700%2C700i%2C900%2C900i%7CRoboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto%20Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;subset=latin%2Ccyrillic-ext%2Clatin-ext%2Ccyrillic%2Cgreek-ext%2Cgreek%2Cvietnamese&amp;display=swap" />
        <link rel="stylesheet" href="<?php echo $server;?>wp-content/cache/min/6/5b94a088adb54c3bb587a71196542b3d.css" data-minify="1" />
       
		<!-- Magnific Popup core CSS file -->
		<link rel="stylesheet" href="https://villanyszereles-debrecen.hu/assets/magnific-popup.css">

		<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

		<!-- Magnific Popup core JS file -->
		<script src="https://villanyszereles-debrecen.hu/assets/jquery.magnific-popup.js"></script>




	   <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
        <link rel="canonical" href="https://villanyszereles-debrecen.hu/munkaink/" />
        <meta property="og:locale" content="hu_HU" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?php echo $oldal_title;?>" />
        <meta property="og:description" content="<?php echo $site_description;?>" />
        <meta property="og:url" content="index.php" />
        <meta property="og:site_name" content="<?php echo $oldal_title;?>" />
        <meta property="article:modified_time" content="2020-12-12T05:41:41+00:00" />
		<meta property="og:image" content="https://vargasoft.hu/admin/blog_images/villanyszereles-debrecen.hu/upload_villanyszereles-debrecen.hu_inbound6716873974775561984.jpg" />
        <meta property="og:image" content="https://vargasoft.hu/admin/blog_images/villanyszereles-debrecen.hu/upload_villanyszereles-debrecen.hu_20191210_131724.jpg" />
		
		<meta name="dc.language" CONTENT="HU">
		<meta name="dc.source" CONTENT="<?php echo $server;?>">
		<meta name="dc.title" CONTENT="<?php echo $oldal_title;?>">
		<meta name="dc.keywords" CONTENT="<?php echo $site_keywords;?>">
		<meta name="dc.description" CONTENT="<?php echo $site_description;?>">
        
  
        <link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
        
        <style type="text/css">img.wp-smiley,img.emoji{display:inline!important;border:none!important;box-shadow:none!important;height:1em!important;width:1em!important;margin:0 .07em!important;vertical-align:-0.1em!important;background:none!important;padding:0!important}</style>
        <link rel='stylesheet' id='woocommerce-smallscreen-css' href='<?php echo $server;?>wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen287d.css?ver=4.8.0' type='text/css' media='only screen and (max-width: 768px)' />
        <style id='woocommerce-inline-inline-css' type='text/css'>.woocommerce form .form-row .required{visibility:visible}</style>
        <style id='style-2-inline-css' type='text/css'>body,.modal-content{font-family:Roboto;font-weight:400;font-size:16px;line-height:27px;color:#7b7b7b}h1,h2,h3,h4,h5,h6{font-family:Roboto}.loader .bolt{border-bottom:55px solid #f47629}.loader .one .other,.loader .three .other{border-top:55px solid #f47629}.loader .two{border-bottom:55px solid #FEFEFE;transform:translateY(-7px);animation:orangeb 0.7s linear infinite}.loader .two .other{border-top:55px solid #FEFEFE;animation:oranget 0.7s linear infinite}@-webkit-keyframes orangeb{to{border-bottom-color:#f47629}}@keyframes orangeb{to{border-bottom-color:#f47629}}@keyframes oranget{to{border-top-color:#f47629}}@-webkit-keyframes oranget{to{border-top-color:#f47629}}dl dd a,a{color:#252936}h1,h2,h3,h4,h5,h6,h1 a,h2 a,h3 a,h4 a,h5 a,h6 a,header .phone .number,.news-preview-link:hover{color:#252936}h1 b,h2 b,.marker-list>li:after,.contact-box [class*='icon-'],.testimonials-box-title:after,.bulb-block .bulb-block-title b,.page-footer .contact-list li b,.color-txt{color:#f47629}.tags-list li a,.tagcloud>a{color:#333;border:1px solid#f47629}@media (max-width:479px){.news-preview{border-top:4px solid#f47629}}.news-preview-text{border-top:4px solid#f47629}.counter-box.counted .decor{background-color:#f47629}.tags-list li a:hover{color:#f47629;background-color:#f47629}.skew-wrapper .straight .title,.block.bg-dark p,.block.bg-dark h1,.block.bg-dark h2,.block.bg-dark h3,.testimonials h2,.testimonials-item .testimonials-text,.testimonials-item .testimonials-username{color:#fff}header.page-,''header{background-color:#fff}header .phone .number .icon,.marker-list>li:after,.icn-list li [class*='icon'],.column-right .side-block ul li:after,.address-block .icon{color:#f47629}body,p,.text-icon-title,.text-icon-text{color:#7b7b7b}.social-links ul li a{color:#d0d0d0}header .social-links ul li a:hover{color:#f47629}@media (min-width:768px){#slidemenu{background-color:#252936}.page-header.is-sticky{background:#252936}.navbar-nav>li>a{color:#bfc3d0}.navbar-nav>li>a:hover,.navbar-nav>li>a:focus,.navbar-nav li.current-menu-item a{color:#fff}.electric-btn:hover{color:#fff}.dropdown-menu{background-color:#fff}.navbar-nav .dropdown .dropdown-menu li>a{color:#333}.navbar-nav .dropdown .dropdown-menu li>a:hover{color:#f47629}}.nivo-caption{color:#fff}.theme-default .nivo-directionNav a{color:#fff}@media (max-width:767px){.service-23-mobile .slick-dots li.slick-active button:after{background:#f47629}}.work-categories-slide .slick-dots li.slick-active button:after,.slick-dots li.slick-active button:after,.slick-dots li.slick-active button:hover:after{background:#f47629}.blog-post .post-quote p:after,.blog-post .post-quote p:before,.testimonials-carousel.slick-slider:before,.testimonials-carousel.slick-slider:after,.slick-dots li.slick-active button:after,.slick-dots li.slick-active button:hover:after,.block .testimonials .slick-dots li.slick-active button:after,.block .testimonials .slick-dots li.slick-active button:hover:after{color:#f47629}.work-categories-slide .slick-dots li.slick-active button:after,.block .testimonials .slick-dots li.slick-active button:after,.block .testimonials .slick-dots li.slick-active button:hover:after,.slick-dots li.slick-active button:after,.slick-dots li.slick-active button:hover:after,.block .counter-carousel .slick-dots li.slick-active button::after{background-color:#f47629}.btn,.search-submit,.request-form h4,.blog-post .post-date,.comment-form .form-submit .submit,.post-date a,.maintenence-free .btn-invert:hover,.big-button .services-btn-full .btn-invert,.tagcloud>a:hover,.bg-dark .btn.btn-invert:hover{background-color:#f47629;color:#fff}.services-btn-full .btn-invert{background-color:#f47629;border:1px solid #f47629}.services-btn-full .btn-invert:hover i{color:#f47629}.btn:hover,.btn.active,.btn:active,.btn.focus,.btn:focus,.btn-invert .icon{background-color:#fff;color:#252936}.maintenence-free .btn-invert{background-color:#fff;color:#000}.btn:hover .icon,.btn.active .icon,.btn:active .icon,.btn.focus .icon,.btn:focus .icon,.text-icon-icon span .icon,.news-preview-link,.text-icon-sm-icon span .icon,.maintenence-free .btn-invert i{color:#f47629}.text-icon:hover .icon{color:#fff}.text-icon-icon .icon-hover,.text-icon:hover .icon-hover,.text-icon-sm-icon .icon-hover{background-color:#f47629;background:-webkit-gradient(linear,left top,left bottom,from(#f47629),to(#f47629));background:-webkit-linear-gradient(top,#f47629,#f47629);background:-moz-linear-gradient(top,#f47629,#f47629);background:-ms-linear-gradient(top,#f47629,#f47629);background:-o-linear-gradient(top,#f47629,#f47629)}.btn-border{border:1px solid#f47629}.price-table>tbody>tr.table-header{background-color:#f47629!important}.price-table>tbody>tr:nth-of-type(odd){background-color:#eeeef3}.price-table>tbody>tr:nth-of-type(even){background-color:#f4f4f5}.page-footer{background-color:#252936;color:#fff}.page-footer .footer-top{background-color:#f47629}.page-footer .copyright,.page-footer .copyright p,.page-footer .social-links ul li a{color:#9c9fa9}.back-to-top a{background-color:#f47629;color:#fff}.back-to-top a:hover{background-color:#fff;color:#f47629}.woocommerce .product-categories>li:after,.prd-sm-info h3 a:hover,.prd-info h3:hover,.tabs.wc-tabs li.active a,.header-cart:hover a.icon,.header-cart.opened a.icon{color:#f47629!important}.header-cart .badge,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.wc-tabs>li>a::after{background-color:#f47629}.btn.btn-invert.add_to_cart_button,.btn.btn-invert.product_type_simple,.header-right-bottom .btn,.woocommerce button.btn,.wc-proceed-to-checkout .btn,.btn.btn-invert.btn-lg.product-block-add-to-cart,.apply-coupon.btn.btn-invert,#commentform #submit{background-color:#f47629;color:#fff}.btn.btn-invert.add_to_cart_button,.btn.btn-invert.product_type_simple{border:1px solid#f47629}.btn.btn-invert.add_to_cart_button:hover,.btn.btn-invert.product_type_simple:hover{border:1px solid#f47629}.btn.btn-invert.add_to_cart_button:hover,.btn.btn-invert.product_type_simple:hover,.header-cart-dropdown .buttons .btn:hover,.woocommerce button.btn:hover,.wc-proceed-to-checkout .btn:hover,.btn.btn-invert.btn-lg.product-block-add-to-cart:hover,#commentform #submit:hover{background-color:#fff;color:#000}.faq-red-head a span:hover,.electrician-toggle .vc_toggle_title:hover>h4,.faq-red-head .vc_tta-panel.vc_active a span{color:#f47629}.faq-red-head .vc_tta-panel.vc_active a i::before{border-color:#f47629!important}.gallery__item .hover{color:#fff}.gallery__item .hover{background-color:rgba(244,118,41,.8)}.category-image h1,.service-btn:not(.collapsed),.service-btn:hover{color:#fff;background-color:#f47629}.coupon-text-2,.coupon-text-4 b{color:#f47629}.pagination .nav-links span.page-numbers.current,.pagination .nav-links .page-numbers:hover,.woocommerce-pagination .page-numbers .page-numbers.current,.woocommerce-pagination .page-numbers .page-numbers:hover{color:#ffffff!important;border:1px solid #f47629!important;background-color:#f47629!important}.filters-by-category ul li a:hover,.filters-by-category ul li a.selected{border-color:#f47629}#header{background-color:#fff}.h-info01 .tt-item [class^="icon-"]{color:#f47629}.h-info02 .tt-item a{color:#f47629}@media (min-width:1025px){.tt-obj-cart .tt-obj__btn .tt-obj__badge{background-color:#f47629}}.tt-obj-cart.active .tt-obj__btn{color:#f47629}@media (min-width:1025px){#tt-nav>ul>li.current_page_item>a{color:#f47629}}.order-form .order-form__title{background-color:#f47629}.section-title .section-title__01{color:#f47629}.tt-list01 li:before{color:#f47629}.tt-slideinfo .tt-item__btn a{background-color:#f47629}.tt-slideinfo .tt-item__btn a::after{background:#f47629}.tt-box02 .tt-box02__title a:hover{color:#f47629}.tt-box02:hover .tt-box02__img:before{color:#f47629}.tt-link:hover{color:#f47629}.tt-link [class^="icon-"]{color:#f47629}.tt-base-color{color:#f47629}.tt-box01 .tt-box01__title:before{background-color:#f47629}#filter-nav ul li.active a{color:#f47629}#filter-nav ul li>a:hover{color:#f47629}.tt-box03 .tt-box03__extra{background-color:#f47629}.tt-box03 .item .tt-item__img:before{color:#f47629}.tt-layout02 .tt-layout02__icon{color:#f47629}.tt-layout02 .tt-layout02__list li:before{color:#f47629}.modal-layout-dafault .form-group .form-group__icon{color:#f47629}.tt-video{background-color:#f47629;border-color:#f47629}.tt-video::after{background:#f47629}.tt-news-list .tt-item .tt-item__title:before{background-color:#f47629}.tt-news-list .tt-item .tt-item__title a:hover{color:#f47629}.tt-news-obj .tt-news-obj__title a:hover{color:#f47629}.tt-news-obj .tt-news-obj__title:before{background-color:#f47629}.f-form{background-color:#f47629}.tt-btn.btn__color02 [class^="icon-"]{color:#f47629}.f-nav li:before{color:#f47629}.f-nav li a:hover{color:#f47629}.f-info-icon li [class^=icon]{color:#f47629}.f-social li a:hover{color:#f47629}.tt-back-to-top:before{background-color:#f47629}.tt-info-value .tt-col-title .tt-title__01{color:#f47629}.tt-box04 .tt-box04__figure{background-color:#f47629}.tt-services-promo .tt-wrapper .tt-col-icon{color:#f47629}.tt-box05:hover .tt-box05__title .tt-text-01{color:#f47629}.tt-info address a{color:#f47629}#tt-pageContent .tt-obj .tt-obj__title a:hover{color:#f47629}.tt-back-to-top:hover{color:#f47629;border-color:#f47629;background-color:#f47629}.tt-coupons .tt-right-top .tt-title__02{color:#f47629}.tt-table01 table thead{background-color:#f47629}.blockquote03:before{background-color:#f47629}.blog-obj .blog-obj__title a:hover{color:#f47629}.blog-obj .blog-obj__data a:hover{color:#f47629}.tt-pagination ul li a:hover{color:#f47629}.tt-img-link:hover .tt-text{color:#f47629}.tt-img-link .tt-icon{background-color:#f47629}.custom-select select:focus{border-color:#f47629}.tt-product .tt-product__title a:hover{color:#f47629}.tt-product .tt-btn-addtocart:hover{color:#f47629}.tt-product .tt-btn-addtocart .tt-icon{color:#f47629}.woocommerce .star-rating span::before{color:#f47629}.nav-categories li a:hover{color:#f47629}.nav-categories li a:before{color:#f47629}.tt-aside-search02 input:focus{border-color:#f47629}td#today{background:#f47629}.tt-list02 li a:hover{background-color:#f47629}.tt-recent-obj .recent-obj__title:before{background-color:#f47629}.tt-recent-obj .recent-obj__title a:hover{color:#f47629}.tt-faq .tt-item__title:hover{color:#f47629}.tt-contact .tt-icon{color:#f47629}@media (min-width:1025px){#tt-nav>ul>li>a:hover{color:#f47629}#tt-nav>ul>li ul li a:hover{color:#f47629}.tt-obj-cart .tt-obj__btn:hover{color:#f47629}}.holder-top-mobile .h-topbox__content .tt-item .tt-item__icon{color:#f47629}@media (max-width:1024.98px){.tt-obj-cart .tt-obj__btn .tt-obj__badge{background-color:#f47629}}.tt-social li a:hover{color:#f47629}.personal-info__img::before{color:#f47629}.submenu-aside .tt-item.tt-item__open .tt-item__title{background-color:#f47629}.submenu-aside .tt-item .tt-item__title:before{background-color:#f47629}.submenu-aside ul li:before{color:#f47629}.submenu-aside ul li a:hover{color:#f47629}.submenu-aside .tt-item .tt-item__title:hover{color:#f47629}.box-aside-info li [class^="icon-"]{color:#f47629}.blockquote01:before{background-color:#f47629}.blockquote02:before{color:#f47629}.nav-tabs li a:hover,.nav-tabs li a.active{color:#f47629}.header-right-bottom .btn,.woocommerce button.btn,.wc-proceed-to-checkout .btn{border-color:#f47629}#commentform #submit:hover{border-color:#f47629}a:hover{color:#f47629}.tt-btn:hover [class^="icon-"]{color:#f47629}.tt-btn.btn__color01{background-color:#f47629;color:#fff}.tt-btn:hover{color:#f47629;border-color:#f47629;background-color:#fff}.modal .modal-body .close:hover{color:#f47629}.tt-comments-layout .tt-item div[class^="tt-comments-level-"] .tt-content .tt-btn-default{background-color:#f47629;border-color:#f47629}.tt-comments-layout .tt-item div[class^="tt-comments-level-"] .tt-content .tt-comments-title .username{color:#f47629}.breadcrumb-area p#breadcrumbs a:hover{color:#f47629}.tt-cart-list .tt-item__remove:hover{color:#f47629}</style>
        <script type='text/javascript' src='<?php echo $server;?>wp-includes/js/jquery/jquery.min9d52.js?ver=3.5.1' id='jquery-core-js'></script> 
		<script type='text/javascript' src='<?php echo $server;?>wp-includes/js/jquery/jquery-migrate.mind617.js?ver=3.3.2' id='jquery-migrate-js'></script> 
		 
		 <!--[if lt IE 9]>
        <script type='text/javascript' src='<?php echo $server;?>/wp-content/themes/electrician/js/html5shiv.min.js?ver=5.6' id='electrician-html5shiv-js'></script>
        <![endif]--> <!--[if lt IE 9]>
        <script type='text/javascript' src='<?php echo $server;?>/wp-content/themes/electrician/js/respond.min.js?ver=5.6' id='electrician-respond-js'></script>
        <![endif]-->
        
        <meta name="generator" content="VargaSoft" />
        <meta name="generator" content="VargaSoft" />
        <link rel='shortlink' href='index.php' />
        <script>if ( top !== self && ['iPad', 'iPhone', 'iPod'].indexOf(navigator.platform) >= 0 ) top.location.replace( self.location.href )</script> 
        <meta name="framework" content="Redux 4.1.24" />
        <noscript>
            <style>.woocommerce-product-gallery{opacity:1!important}</style>
        </noscript>
        <style type="text/css" id="wp-custom-css">.tt-logo-list .tt-item:not(:first-child){padding-left:0}</style>
		
		
		<script type="application/ld+json"> {
		"@context" : "http://schema.org",
		"@type" : "Electrician",
		"image": [
		"https://vargasoft.hu/admin/blog_images/villanyszereles-debrecen.hu/upload_villanyszereles-debrecen.hu_inbound6716873974775561984.jpg",
		"https://vargasoft.hu/admin/blog_images/villanyszereles-debrecen.hu/upload_villanyszereles-debrecen.hu_20191210_131724.jpg",
		"https://vargasoft.hu/admin/blog_images/villanyszereles-debrecen.hu/upload_villanyszereles-debrecen.hu_20190428_165511.jpg",
		"https://vargasoft.hu/admin/blog_images/villanyszereles-debrecen.hu/upload_villanyszereles-debrecen.hu_20181012_154423.jpg",
		"https://vargasoft.hu/admin/blog_images/villanyszereles-debrecen.hu/upload_villanyszereles-debrecen.hu_inbound6524055536647543050.jpg"
		],
		"address" : {
		"@type": "PostalAddress",
		"addressLocality": "Debrecen",
		"addressRegion": "Hajdú-Bihar",
		"postalCode": "4031",
		"streetAddress": "Bezerédj u. 34." },
		"telephone" : "+36 30 642-2215",
		"name":"Villanyszerelés Debrecen, HutiVill",
		"url":"https://villanyszereles-debrecen.hu/",
		"email":"info@villanyszereles-debrecen.hu",
		"aggregateRating":{
		"@type":"AggregateRating",
		"ratingValue":"5",
		"reviewCount":"24"},
		"priceRange":"3"
		} </script>
		
		<script type="application/ld+json">
		{
		"@context": "http://schema.org",
		"@type": "BreadcrumbList",
		"itemListElement":
		[
		{
		"@type": "ListItem",
		"position": 1,
		"item":
		{
		"@id": "https://villanyszereles-debrecen.hu/",
		"name": "Villanyszerelés Debrecenben"
		}
		},
		{
		"@type": "ListItem",
		"position": 2,
		"item":
		{
		"@id": "https://villanyszereles-debrecen.hu/araink/",
		"name": "ÁRAK"
		}
		},
		{
		"@type": "ListItem",
		"position": 3,
		"item":
		{
		"@id": "https://villanyszereles-debrecen.hu/kapcsolat/",
		"name": "Tel:+36 30 642-2215"
		}
		},
		{
		"@type": "ListItem",
		"position": 4,
		"item":
		{
		"@id": "https://villanyszereles-debrecen.hu/rapid-szolgaltatasok/",
		"name": "RAPID Szolgáltatás"
		}
		},
		{
		"@type": "ListItem",
		"position": 5,
		"item":
		{
		"@id": "https://villanyszereles-debrecen.hu/kapcsolat/",
		"name": "Ajánlatkérés"
		}
		}
		]
		}
		</script>
		<script type="application/ld+json">
			{
			  "@context" : "https://schema.org",
			  "@type" : "Organization",
			  "name" : "Villanyszerelés Debrecen, HutiVill",
			  "url" : "https://villanyszereles-debrecen.hu/",
			  "sameAs" : [
				"https://www.facebook.com/hutivill"
			  ]
			}
		</script>
		<script type="application/ld+json">
			{
			 "@context": "http://schema.org", 
			 "@type": "OfferCatalog",
			 "name": "Villanyszereles Debrecen",
			 "itemListElement": 
				[
				
						
						 { 
						 "@type" : "ListItem",
						 "name" : "Új áramkörök kiépítése",
						 "Description" : "Akár kisebb átalakításoknál új áramkörök (dugaljak, kapcsolók, lámpakiállások) kiépítése.",
						 "url" : "https://villanyszereles-debrecen.hu/szolgaltatasok/"
						},
						
						
						
						 { 
						 "@type" : "ListItem",
						 "name" : "Panelek, kapcsolótáblák",
						 "Description" : "Biztosítéktábla csere, fi-relé beépítés, kötések felülvizsgálata, szabványosítása.",
						 "url" : "https://villanyszereles-debrecen.hu/szolgaltatasok/"
						},
						
						
						
						 { 
						 "@type" : "ListItem",
						 "name" : "Lámpák, kapcsolók, dugaljak ",
						 "Description" : "Új lámpák fölhelyezése, sérült, meghibásodott kapcsolók és dugaljak cseréje.",
						 "url" : "https://villanyszereles-debrecen.hu/szolgaltatasok/"
						},
						
						
						
						 { 
						 "@type" : "ListItem",
						 "name" : "Mérőhely telepítése vagy áthelyezése",
						 "Description" : "Mérőhely telepítése vagy áthelyezése, teljesítménybővítés, vagy vezérelt áram, éjszakai áram kiépítése EON ügyintézéssel.",
						 "url" : "https://villanyszereles-debrecen.hu/szolgaltatasok/"
						},
						
						
						
						 { 
						 "@type" : "ListItem",
						 "name" : "Erős és gyengeáramú hálózatok",
						 "Description" : "Erős és gyengeáramú hálózatok kivitelezése.",
						 "url" : "https://villanyszereles-debrecen.hu/szolgaltatasok/"
						},
						
						
						
						 { 
						 "@type" : "ListItem",
						 "name" : "Klímák, főzőlapok, szaunák",
						 "Description" : "Klímáknak, főzőlapoknak, szaunáknak tápkábel kiépítés.",
						 "url" : "https://villanyszereles-debrecen.hu/szolgaltatasok/"
						},
						
						
						
						 { 
						 "@type" : "ListItem",
						 "name" : "Elektromos nagyfogyasztók beüzemelése",
						 "Description" : "Elektromos nagyfogyasztók szakszerű beüzemelése garanciával (elektromos vízmelegítő, villanytűzhely, főzőlap, elektromos sütő).",
						 "url" : "https://villanyszereles-debrecen.hu/szolgaltatasok/"
						},
						
						
						
						 { 
						 "@type" : "ListItem",
						 "name" : "Panellakások  elektromos felújítása",
						 "Description" : "Panellakások  elektromos felújítása(részleges vagy teljes), átvezetékelése,  kapcsolók, dugaljak  komplett cseréje.",
						 "url" : "https://villanyszereles-debrecen.hu/szolgaltatasok/"
						}
						
										]
			}
		</script>
		<script type="text/javascript">
			$(document).ready(function() {

			$('.image-popup-vertical-fit').magnificPopup({
				type: 'image',
				closeOnContentClick: true,
				mainClass: 'mfp-img-mobile',		
				image: {
					verticalFit: true
				}
				
			});

			

		});
		
		
		</script>
		
    </head>
    <body class="home page-template page-template-elementor_header_footer page page-id-1426 wp-embed-responsive theme-electrician woocommerce-no-js index elementor-default elementor-template-full-width elementor-kit-1706 elementor-page elementor-page-1426">
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-G-XX2RNTE4LY', 'auto');
	  ga('send', 'pageview');

	</script>
        <div id="loader-wrapper" class="loader-on">
            <div id="loader">
                <div class="loader">
                    <div class="bolt one">
                        <div class="other"></div>
                    </div>
                    <div class="bolt two">
                        <div class="other"></div>
                    </div>
                    <div class="bolt three">
                        <div class="other"></div>
                    </div>
                    Pillanat...
                </div>
            </div>
        </div>
        <nav class="panel-menu" id="mobile-menu">
            <ul></ul>
            <div class="mm-navbtn-names">
                <div class="mm-closebtn">Bezár</div>
                <div class="mm-backbtn">Vissza</div>
            </div>
        </nav>
        <header id="tt-header">
            <div class="holder-top-mobile d-block d-md-none">
                <div class="h-topbox__content">
                    <div class="tt-item">
                        <div class="tt-item__icon"><span class="icon-map-marker"></span></div>
                        <div class="tt-item__text">
                            <address><?php echo $company.', '.$company_address;?></address>
                        </div>
                    </div>
                    <div class="tt-item">
                        <div class="tt-item__icon"><span class="icon-482948"></span></div>
                        <div class="tt-item__text"><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></div>
                    </div>
                    <div class="tt-item">
                        <div class="tt-item__icon"><span class="icon-telephone"></span></div>
                        <div class="tt-item__text">
                            <address><a href="tel:<?php echo $telefon;?>"><?php echo $telefon;?></a></address>
                        </div>
                    </div>
                    <div class="tt-item">
                        <div class="tt-item__icon"><span class="icon-clock-circular-outline-1"></span></div>
                        <div class="tt-item__text">Hétfő - Szombat 07:00 - 17:00</div>
                    </div>
                </div>
                <a href="#" class="h-topbox__btn" id="js-toggle-h-holder"> <i class="tt-arrow down"></i> </a>
            </div>
			<?php 
			if (isset($_POST["ajanlatkeres"]) && !empty($_POST["email"])) {

				echo"<div class='alert alert-success' style='background-color: #23A455;text-align: center;font-size: 25px;font-weight: 300;color:#ffffff'>Kedves ".$_POST["name"]."! Köszönjük, hogy igénybe vette ingyenes online árajánlatkérőnket. Kollégáink a kérését megvizsgálják és elérhetőségei egyikén felveszik Önnel a kapcsolatot.</div>";

					//print_r($_POST);

				

					echo '<iframe name="myframe" src="https://villanyszereles-debrecen.hu//config/arajanlat.php?email='.$_POST['email'].'&name='.$_POST['name'].'&phone='.$_POST['phone'].'&message='.$_POST['message'].'&address='.$_POST['address'].'&services='.$_POST['services'].'&date='.$_POST['date'].'"style="width:0;height:0;border:0; border:none;"></iframe>';

				

			}
			if (isset($_POST["fullnames"]) && !empty($_POST["email"])) {

				echo"<div class='alert alert-success' style='background-color: #23A455;text-align: center;font-size: 25px;font-weight: 300;color:#ffffff'>Kedves ".$_POST["fullnames"]."! Köszönjük, hogy kérdésével megtisztelt bennünket. Kollégáink a kérését megvizsgálják és elérhetőségei egyikén felveszik Önnel a kapcsolatot.</div>";

					//print_r($_POST);

				

					echo '<iframe name="myframe" src="https://villanyszereles-debrecen.hu//config/kapcsolat.php?email='.$_POST['email'].'&name='.$_POST['fullnames'].'&phone='.$_POST['phone'].'&message='.$_POST['message'].'"style="width:0;height:0;border:0; border:none;"></iframe>';

				

			}
			if (isset($_POST["phonenumber"]) && !empty($_POST["phonenumber"])) {

				echo"<div class='alert alert-success' style='background-color: #23A455;text-align: center;font-size: 25px;font-weight: 300;color:#ffffff'>Visszahívási igényét elküldük. Kollégánk hamarosan felkeresi Önt!</div>";

					//print_r($_POST);

				

					echo '<iframe name="myframe" src="https://villanyszereles-debrecen.hu//config/visszahivas.php?phone='.$_POST['phonenumber'].'"style="width:0;height:0;border:0; border:none;"></iframe>';

				

			}
			?>
            <div class="holder-top-desktop d-none d-md-block">
                <div class="container container-lg-fluid">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <div class="h-info01">
                                <div class="tt-item">
                                    <address><span class="icon-map-marker"></span> <?php echo $company.', '.$company_address;?></address>
                                </div>
                                <div class="tt-item"><span class="icon-clock-circular-outline-1"></span>Hétfő - Szombat 07:00 - 17:00</div>
                            </div>
                        </div>
                        <div class="col-auto ml-auto">
                            <div class="tt-obj">
                                <div class="h-info02">
                                    <div class="tt-item">
                                        <address> <a href="tel:<?php echo $telefon;?>"><span class="icon-telephone"></span><?php echo $telefon;?></a> </address>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
			
            <div id="js-init-sticky" style="max-height:0px;">
                <div class="tt-holder-wrapper">
                    <div class="container container-lg-fluid">
                        <div class="tt-holder">
                            <div class="tt-col-logo"> 
								<a href="<?php echo $server;?>" class="tt-logo tt-logo-alignment">
									<span class="tt-icon">
										<img src="<?php echo $server;?>wp-content/uploads/sites/6/2020/07/logo.png" alt="<?php echo $oldal_title;?>">
									</span>
									<?php echo $site_h1;?>
								</a>
							</div>
                            <div class="tt-col-objects tt-col-wide text-center">
                                <nav id="tt-nav">
                                    <ul id="menu-primary-menu" class="nav navbar-nav">
                                        <li id="nav-menu-item-1459" class="main-menu-item menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-home">
											<a href="<?php echo $server;?>" class="menu-link main-menu-link"><span class="electric-btn"><span class="text">Villanyszerelés Debrecen</span></span></a>
										</li>
										<li id="nav-menu-item-773" class="main-menu-item menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page">
											<a href="<?php echo $server;?>rapid-szolgaltatas/" class="menu-link main-menu-link"><span class="electric-btn"><span class="text" style="color:#ca0707">Rapid szolgáltatás</span></span></a>
										</li>
                                        <li id="nav-menu-item-773" class="main-menu-item menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page">
											<a href="<?php echo $server;?>szolgaltatasok/" class="menu-link main-menu-link"><span class="electric-btn"><span class="text">További szolgáltatásaink</span></span></a>
										</li>
                                        <li id="nav-menu-item-1505" class="main-menu-item menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-1426 current_page_item">
											<a href="<?php echo $server;?>munkaink/" class="menu-link main-menu-link"><span class="electric-btn"><span class="text">Referencia munkáink</span></span></a>
										</li>
										<li id="nav-menu-item-1505" class="main-menu-item menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page">
											<a href="<?php echo $server;?>fontos-tudnivalok/" class="menu-link main-menu-link"><span class="electric-btn"><span class="text">Fontos tudnivalók</span></span></a>
										</li>
										<li id="nav-menu-item-1505" class="main-menu-item menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page">
											<a href="<?php echo $server;?>araink/" class="menu-link main-menu-link"><span class="electric-btn"><span class="text">Árak</span></span></a>
										</li>
                                        <li id="nav-menu-item-123" class="main-menu-item menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page">
											<a href="<?php echo $server;?>kapcsolat/" class="menu-link main-menu-link"><span class="electric-btn"><span class="text">Kapcsolat</span></span></a>
										</li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="tt-col-objects">
                               
                                <div class="tt-col__item d-block d-lg-none"> <a href="#" id="tt-menu-toggle" class="icon-545705"></a></div>
                                <div class="tt-col__item d-none d-lg-block"> <a href="#" class="tt-btn btn__color01" data-toggle="modal" data-target="#modalMakeAppointment"><span class="icon-lightning"></span>Ajánlatkérés</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div id="tt-pageContent">
        <div data-elementor-type="wp-page" data-elementor-id="1426" class="elementor elementor-1426" data-elementor-settings="[]">
            <div class="elementor-inner">
                <div class="elementor-section-wrap">
                   
				    <section class="elementor-section elementor-top-section elementor-element elementor-element-091ab54 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="091ab54" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-row">
                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-23f47d8" data-id="23f47d8" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-13dd638 elementor-widget elementor-widget-electrician_project" data-id="13dd638" data-element_type="widget" data-widget_type="electrician_project.default">
                                                <div class="elementor-widget-container">
                                                    <div class="section-indent">
                                                        <div class="container container-md-fluid">
                                                            <div class="section-title max-width-01">
                                                                <div class="section-title__02"><h1 style="font-size: 36px;"><?php echo $site_h1;?> - Villanyszerelés Debrecen - HutiVill</h1></div>
                                                            </div>
															<div class="section-title__03"> Az alábbi referencia munkák kivétel nélkül saját munkáink során készített képeket tartalmaznak. Újítsa Ön is fel otthonát a HutiVill segít ebben Önnek.</div>
															
															<div id="filter-nav">
																<ul>
																	<li class="active"><a class="gallery-navitem" href="filter-all">Összes</a></li>
																	<?php
																		$get_filter_images = get_filter_images();
																		foreach($get_filter_images as $get_filter_images) {
																		
																	?>
																		<li> <a class="gallery-navitem" href="<?php echo $get_filter_images['image_cat_id']?>"><?php echo $get_filter_images['cat_name']?></a></li>
																	<?php } ?>
																</ul>
															</div>
															
                                                            <div id="filter-layout" class="row justify-content-center gallery-innerlayout-wrapper js-wrapper-gallery">
															<?php
																$get_all_gallery = get_all_gallery();
																foreach($get_all_gallery as $get_all_gallery) {
																
															?>
                                                                <div class="col-8 col-md-4 show filter-all <?php echo $get_all_gallery['image_cat_id']?>">
                                                                    <a href="https://vargasoft.hu/admin/blog_images/villanyszereles-debrecen.hu/<?php echo $get_all_gallery['large']?>" class="tt-gallery">
                                                                        <div class="gallery__icon"></div>
                                                                        <img width="222" height="222" src="https://vargasoft.hu/admin/blog_images/villanyszereles-debrecen.hu/<?php echo $get_all_gallery['small']?>" class="attachment-full size-full" alt="Villanyszerelés Debrecen" loading="lazy" srcset="https://vargasoft.hu/admin/blog_images/villanyszereles-debrecen.hu/<?php echo $get_all_gallery['small']?> 222w, https://vargasoft.hu/admin/blog_images/villanyszereles-debrecen.hu/<?php echo $get_all_gallery['small']?> 150w, https://vargasoft.hu/admin/blog_images/villanyszereles-debrecen.hu/<?php echo $get_all_gallery['small']?> 100w" sizes="(max-width: 222px) 100vw, 222px" /> 
                                                                    </a>
                                                                </div>
															<?php } ?>
                                                                <div class="col-12 text-center tt-top-more" id="js-more-include"> 
																	<a class="tt-btn btn__color01" data-toggle="modal" data-target="#modalMakeAppointment" href="#">
																		<span class="icon-lightning"></span>Kérjen online árajánlatot
																	</a>
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
                   
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-593fd3f elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="593fd3f" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-row">
                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-498094f" data-id="498094f" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-f6eaebc elementor-widget elementor-widget-electrician_services_slider" data-id="f6eaebc" data-element_type="widget" data-widget_type="electrician_services_slider.default">
                                                <div class="elementor-widget-container">
                                                    <div class="section-indent">
                                                        <div class="container container-lg-fluid container__p-r">
                                                            <div class="section-marker section-marker_b-l"> <img width="125" height="125" src="<?php echo $server;?>wp-content/uploads/sites/6/2020/07/bg_marker02.png" class="attachment-full size-full" alt="<?php echo $site_h1;?>" loading="lazy" srcset="<?php echo $server;?>wp-content/uploads/sites/6/2020/07/bg_marker02.png 125w, <?php echo $server;?>wp-content/uploads/sites/6/2020/07/bg_marker02-100x100.png 100w" sizes="(max-width: 125px) 100vw, 125px" /></div>
                                                            <div class="section-title max-width-01 section-title_indent-02">
                                                                <div class="section-title__01">24 órás villanyszerelői szolgáltatások - <?php echo $site_h1;?></div>
                                                                <div class="section-title__02"><?php echo $company;?> - Teljeskörű villanyszerelési szolgáltatások</div>
                                                            </div>
                                                            <div class="tt-box02_wrapper row slick-type01 slick-slider slick-dotted" data-slick='{ "slidesToShow": 3, "autoplaySpeed": 4500, "slidesToScroll": 2, "responsive": [ { "breakpoint": 750, "settings": { "slidesToShow": 2 } }, { "breakpoint": 546, "settings": { "slidesToShow": 1, "slidesToScroll": 1 } } ] }' >
                                                                 <?php 
																	$get_all_services = get_all_services();
																	foreach($get_all_services as $get_all_services) {
																?>
																<div class="col-md-4">
                                                                    <div class="tt-box02">
                                                                        <a href="<?php echo $server;?>szolgaltatasok/" class="tt-box02__img">
                                                                            <div class="tt-bg-dark"> <img width="142" height="175" src="https://vargasoft.hu/admin/services_images/villanyszereles-debrecen.hu/<?php echo $get_all_services['image'];?>" class="tt-img-main" alt="<?php echo $oldal_title.', '.$get_all_services['title'];?>" loading="lazy" /></div>
                                                                            <img src="<?php echo $server;?>wp-content/plugins/electricity-core/assets/images/mask-img01.png" class="tt-img-mask" loading="lazy" alt="<?php echo $oldal_title.', '.$get_all_services['title'];?>"> 
                                                                        </a>
                                                                        <h2 class="tt-box02__title"><a href="<?php echo $server;?>szolgaltatasok/"><?php echo $get_all_services['title'];?></a></h2>
                                                                        <p><?php echo $get_all_services['short_details'];?></p>
                                                                        <div class="tt-row-btn"> <a href="<?php echo $server;?>szolgaltatasok/" class="tt-link">További információk<span class="icon-arrowhead-pointing-to-the-right-1"></span></a></div>
                                                                    </div>
                                                                </div>
																<?php } ?>
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
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-3be6208 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="3be6208" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-row">
                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6cdf553" data-id="6cdf553" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-910edb8 elementor-widget elementor-widget-ele_banner_1" data-id="910edb8" data-element_type="widget" data-widget_type="ele_banner_1.default">
                                                <div class="elementor-widget-container">
                                                    <div class="section-indent">
                                                        <div class="tt-box01 js-init-bg lazyload" data-bg="<?php echo $server;?>wp-content/uploads/sites/6/2020/07/box01-bg-desktop.jpg">
                                                            <div class="container">
                                                                <div class="tt-box01__holder">
                                                                    <div class="tt-box01__description">
                                                                        <h4 class="tt-box01__title"> Vegye igénybe <span class="tt-base-color">villanyszerelési </span><br> szolgáltatásainkat!</h4>
                                                                        <p>
																			Precíz, tisztességes munkavégzés.
																			Elvégzett villanyszerelési munkáinkra garanciát vállalunk.
																			A munkavégzés előre megbeszélt időtartományához tartjuk magunkat( feltéve ha közben nincsenek plusz igények). Tehát ha beírtuk, hogy május 4-én reggel 8-kor kezdünk, akkor ott leszünk.


																			Ha esetleg lekapcsolás szükséges a tevékenységünkhöz, arról előre tájékoztatjuk. Pl: de. 11-től du. 2-ig nem lesz áram a lakásban. (így INTERNET és WIFI sem!!!)


																			A munkaterületet, lakást tisztán, rendben adjuk át magunk után.


																			A munkafolyamatok során keletkezett szemetet, törmeléket, hulladékokat, ha szükséges elszállítjuk.
																		</p>
                                                                        </p>
                                                                        <div class="tt-row-btn"> 
																			<a class="tt-btn btn__color01" href="tel:<?php echo $telefon;?>">
																				<span class="icon-telephone"></span>Hívjon telefonon
																			</a> 
																			<a class="tt-btn btn__color02" data-toggle="modal" data-target="#modalMakeAppointment" href="#">
																				<span class="icon-lightning"></span>Kérjen online árajánlatot</a>
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
                            </div>
                        </div>
                    </section>
					<div class="section-indent">
						<div class="container container-lg-fluid">
							<div class="section-title max-width-01">
								<div class="section-title__01">HutiVill, Villanyszerelés Debrecen</div>
								<div class="section-title__02">Néhány érv mellettünk</div>
								<div class="section-title__03"></div>
							</div>
							<div class="row tt-services-promo__list justify-content-center">
								<div class="col-sm-6 col-lg-4 tt-item">
									<div class="tt-services-promo">
										<div class="tt-value tt-value__indent">1</div>
										<div class="tt-wrapper">
											<div class="tt-col-icon icon-hours"></div>
											<div class="tt-col-layout">
												<div class="tt-title"> Rapid szolgáltatás</div>
												<p> Hibafeltárás-azonnali javítás. Ez alatt a kisebb (1-3 órán belül elvégezhető), sürgős javítási munkálatokat értjük. További részleteket <a href="https://villanyszereles-debrecen.hu/rapid-szolgaltatas/">itt</a> olvashat.</p>
											</div>
										</div>
										<div class="tt-bg-marker"></div>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 tt-item">
									<div class="tt-services-promo">
										<div class="tt-value tt-value__indent">2</div>
										<div class="tt-wrapper">
											<div class="tt-col-icon icon-tool2"></div>
											<div class="tt-col-layout">
												<div class="tt-title"> Ingyenes online árajánlatkérés</div>
												<p> Minden kötelezettség nélkül kérjen online árajánlatot az elvégezendő munkákról. Kollégáink a lehető leggyorsabban válaszolnak minden megkeresésre!</p>
											</div>
										</div>
										<div class="tt-bg-marker"></div>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 tt-item">
									<div class="tt-services-promo">
										<div class="tt-value tt-value__indent">3</div>
										<div class="tt-wrapper">
											<div class="tt-col-icon icon-price-tag"></div>
											<div class="tt-col-layout">
												<div class="tt-title"> Pénztárcabarát megoldások</div>
												<p> Nem mi vagyunk a legolcsóbbak, de hozzáállásunk és szakértelmünk vitathatatlan. Számunkra az ügyfél elégedettsége a legfontosabb.</p>
											</div>
										</div>
										<div class="tt-bg-marker"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="section-indent">
						<div class="container container-lg-fluid">
							<div class="section-title max-width-01">
								<div class="section-title__01">Villanyszerelés Debrecen, HutiVill</div>
								<div class="section-title__02">Villanyszerelés Debrecen és környékén</div>
								<div class="section-title__03"></div>
								<div class="section-title__03">Kattintson a térképen a településre vagy válassza azt ki a listából és ellenőrizze, hogy az adott településen villanyszerelői szolgáltatásainkat igénybe tudja-e venni.</div>
								<img src="<?php echo $server.'img/';?>93415.png" usemap="#image-map">
									
									<map name="image-map">
										<area target="_parent" alt="Villanyszerelés Debrecen, HutiVill" title="Villanyszerelés Debrecen, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Debrecen" coords="195,214,269,235" shape="rect">
										<area target="_parent" alt="Villanyszerelés Hortobágy, HutiVill" title="Villanyszerelés Hortobágy, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Hortob%C3%A1gy" coords="105,180,147,193" shape="rect">
										<area target="_parent" alt="Villanyszerelés Polgár, HutiVill" title="Villanyszerelés Polgár, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Polg%C3%A1r" coords="113,49,145,59" shape="rect">
										<area target="_parent" alt="Villanyszerelés Görbeháza, HutiVill" title="Villanyszerelés Görbeháza, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/G%C3%B6rbeh%C3%A1za" coords="136,60,177,69" shape="rect">
										<area target="_parent" alt="Villanyszerelés Hajdúnánás, HutiVill" title="Villanyszerelés Hajdúnánás, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Hajd%C3%BAn%C3%A1n%C3%A1s" coords="177,69,214,79" shape="rect">
										<area target="_parent" alt="Villanyszerelés Hajdúböszörmény, HutiVill" title="Villanyszerelés Hajdúböszörmény, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Hajd%C3%BAb%C3%B6sz%C3%B6rm%C3%A9ny" coords="203,125,283,142" shape="rect">
										<area target="_parent" alt="Villanyszerelés Hajdúhadház, HutiVill" title="Villanyszerelés Hajdúhadház, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Hajd%C3%BAhadh%C3%A1z" coords="289,135,329,144" shape="rect">
										<area target="_parent" alt="Villanyszerelés Újszentmargita, HutiVill" title="Villanyszerelés Újszentmargita, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/%C3%9Ajszentmargita" coords="153,116,94,125" shape="rect">
										<area target="_parent" alt="Villanyszerelés Tiszacsege, HutiVill" title="Villanyszerelés Tiszacsege, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Tiszacsege" coords="65,123,103,136" shape="rect">
										<area target="_parent" alt="Villanyszerelés Egyek, HutiVill" title="Villanyszerelés Egyek, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Egyek" coords="10,165,58,185" shape="rect">
										<area target="_parent" alt="Villanyszerelés Balmazújváros, HutiVill" title="Villanyszerelés Balmazújváros, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Balmaz%C3%BAjv%C3%A1ros" coords="121,158,186,179" shape="rect">
										<area target="_parent" alt="Villanyszerelés Józsa, HutiVill" title="Villanyszerelés Józsa, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/J%C3%B3zsa" coords="235,175,277,192" shape="rect">
										<area target="_parent" alt="Villanyszerelés Bocskaikert, HutiVill" title="Villanyszerelés Bocskaikert, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Bocskaikert" coords="325,185,281,197" shape="rect">
										<area target="_parent" alt="Villanyszerelés Hajdúsámson, HutiVill" title="Villanyszerelés Hajdúsámson, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Hajd%C3%BAs%C3%A1mson" coords="308,167,363,184" shape="rect">
										<area target="_parent" alt="Villanyszerelés Nyíracsád, HutiVill" title="Villanyszerelés Nyíracsád, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Ny%C3%ADracs%C3%A1d" coords="359,159,397,168" shape="rect">
										<area target="_parent" alt="Villanyszerelés Nyírmártonfalva, HutiVill" title="Villanyszerelés Nyírmártonfalva, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Ny%C3%ADrm%C3%A1rtonfalva" coords="330,186,391,201" shape="rect">
										<area target="_parent" alt="Villanyszerelés Debrecen-Haláp, HutiVill" title="Villanyszerelés Debrecen-Haláp, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Debrecen-Hal%C3%A1p" coords="334,205,358,219" shape="rect">
										<area target="_parent" alt="Villanyszerelés Vámospércs, HutiVill" title="Villanyszerelés Vámospércs, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/V%C3%A1mosp%C3%A9rcs" coords="401,222,354,232" shape="rect">
										<area target="_parent" alt="Villanyszerelés Debrecen-Bánk, HutiVill" title="Villanyszerelés Debrecen-Bánk, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Debrecen-B%C3%A1nk" coords="326,234,299,252" shape="rect">
										<area target="_parent" alt="Villanyszerelés Újléta, HutiVill" title="Villanyszerelés Újléta, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/%C3%9Ajl%C3%A9ta" coords="349,239,379,252" shape="rect">
										<area target="_parent" alt="Villanyszerelés Bagamér, HutiVill" title="Villanyszerelés Bagamér, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Bagam%C3%A9r" coords="406,243,381,263" shape="rect">
										<area target="_parent" alt="Villanyszerelés Ebes, HutiVill" title="Villanyszerelés Ebes, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Ebes" coords="233,240,216,256" shape="rect">
										<area target="_parent" alt="Villanyszerelés Hajdúszoboszló, HutiVill" title="Villanyszerelés Hajdúszoboszló, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Hajd%C3%BAszoboszl%C3%B3" coords="136,237,210,269" shape="rect">
										<area target="_parent" alt="Villanyszerelés Nádudvar, HutiVill" title="Villanyszerelés Nádudvar, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/N%C3%A1dudvar" coords="98,265,160,280" shape="rect">
										<area target="_parent" alt="Villanyszerelés Mikepércs, HutiVill" title="Villanyszerelés Mikepércs, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Mikep%C3%A9rcs" coords="315,255,267,267" shape="rect">
										<area target="_parent" alt="Villanyszerelés Hajdúszovát, HutiVill" title="Villanyszerelés Hajdúszovát, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Hajd%C3%BAszov%C3%A1t" coords="257,274,214,290" shape="rect">
										<area target="_parent" alt="Villanyszerelés Kaba, HutiVill" title="Villanyszerelés Kaba, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Kaba" coords="174,294,145,313" shape="rect">
										<area target="_parent" alt="Villanyszerelés Püspökladány, HutiVill" title="Villanyszerelés Püspökladány, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/P%C3%BCsp%C3%B6klad%C3%A1ny" coords="75,299,111,330" shape="rect">
										<area target="_parent" alt="Villanyszerelés Báránd, HutiVill" title="Villanyszerelés Báránd, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/B%C3%A1r%C3%A1nd" coords="146,323,113,341" shape="rect">
										<area target="_parent" alt="Villanyszerelés Tetétlen, HutiVill" title="Villanyszerelés Tetétlen, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Tet%C3%A9tlen" coords="152,315,195,328" shape="rect">
										<area target="_parent" alt="Villanyszerelés Földes, HutiVill" title="Villanyszerelés Földes, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/F%C3%B6ldes" coords="214,328,178,347" shape="rect">
										<area target="_parent" alt="Villanyszerelés Sárrétudvari, HutiVill" title="Villanyszerelés Sárrétudvari, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/S%C3%A1rr%C3%A9tudvari" coords="113,352,173,367" shape="rect">
										<area target="_parent" alt="Villanyszerelés Sáp, HutiVill" title="Villanyszerelés Sáp, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/S%C3%A1p" coords="197,351,176,360" shape="rect">
										<area target="_parent" alt="Villanyszerelés Szerep, HutiVill" title="Villanyszerelés Szerep, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Szerep" coords="87,361,112,379" shape="rect">
										<area target="_parent" alt="Villanyszerelés Biharnagybajom, HutiVill" title="Villanyszerelés Biharnagybajom, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Biharnagybajom" coords="116,368,151,381" shape="rect">
										<area target="_parent" alt="Villanyszerelés Nagyrábé, HutiVill" title="Villanyszerelés Nagyrábé, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Nagyr%C3%A1b%C3%A9" coords="156,379,188,393" shape="rect">
										<area target="_parent" alt="Villanyszerelés Bakonszeg, HutiVill" title="Villanyszerelés Bakonszeg, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Bakonszeg" coords="192,376,224,392" shape="rect">
										<area target="_parent" alt="Villanyszerelés Bihartorda, HutiVill" title="Villanyszerelés Bihartorda, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Bihartorda" coords="176,364,211,375" shape="rect">
										<area target="_parent" alt="Villanyszerelés Sáránd, HutiVill" title="Villanyszerelés Sáránd, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/S%C3%A1r%C3%A1nd" coords="269,272,296,281" shape="rect">
										<area target="_parent" alt="Villanyszerelés Hajdúbagos, HutiVill" title="Villanyszerelés Hajdúbagos, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Hajd%C3%BAbagos" coords="260,286,305,297" shape="rect">
										<area target="_parent" alt="Villanyszerelés Derecske, HutiVill" title="Villanyszerelés Derecske, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Derecske" coords="241,299,289,313" shape="rect">
										<area target="_parent" alt="Villanyszerelés Monostorpályi, HutiVill" title="Villanyszerelés Monostorpályi, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Monostorp%C3%A1lyi" coords="308,270,363,277" shape="rect">
										<area target="_parent" alt="Villanyszerelés Kokad, HutiVill" title="Villanyszerelés Kokad, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Kokad" coords="368,271,385,282" shape="rect">
										<area target="_parent" alt="Villanyszerelés Álmosd, HutiVill" title="Villanyszerelés Álmosd, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/%C3%81lmosd" coords="401,267,387,277" shape="rect">
										<area target="_parent" alt="Villanyszerelés Hosszúpályi, HutiVill" title="Villanyszerelés Hosszúpályi, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Hossz%C3%BAp%C3%A1lyi" coords="350,285,307,296" shape="rect">
										<area target="_parent" alt="Villanyszerelés Létavértes, HutiVill" title="Villanyszerelés Létavértes, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/L%C3%A9tav%C3%A9rtes" coords="369,298,322,313" shape="rect">
										<area target="_parent" alt="Villanyszerelés Konyár, HutiVill" title="Villanyszerelés Konyár, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Kony%C3%A1r" coords="294,315,273,337" shape="rect">
										<area target="_parent" alt="Villanyszerelés Tépe, HutiVill" title="Villanyszerelés Tépe, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/T%C3%A9pe" coords="244,317,268,329" shape="rect">
										<area target="_parent" alt="Villanyszerelés Pocsaj, HutiVill" title="Villanyszerelés Pocsaj, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Pocsaj" coords="329,326,353,339" shape="rect">
										<area target="_parent" alt="Villanyszerelés Esztár, HutiVill" title="Villanyszerelés Esztár, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Eszt%C3%A1r" coords="302,330,326,343" shape="rect">
										<area target="_parent" alt="Villanyszerelés Kismarja, HutiVill" title="Villanyszerelés Kismarja, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Kismarja" coords="327,346,345,360" shape="rect">
										<area target="_parent" alt="Villanyszerelés Hencida, HutiVill" title="Villanyszerelés Hencida, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Hencida" coords="290,348,324,359" shape="rect">
										<area target="_parent" alt="Villanyszerelés Gáborján, HutiVill" title="Villanyszerelés Gáborján, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/G%C3%A1borj%C3%A1n" coords="255,350,285,359" shape="rect">
										<area target="_parent" alt="Villanyszerelés Berettyóújfalu, HutiVill" title="Villanyszerelés Berettyóújfalu, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Beretty%C3%B3%C3%BAjfalu" coords="213,353,250,377" shape="rect">
										<area target="_parent" alt="Villanyszerelés Szentpéterszeg, HutiVill" title="Villanyszerelés Szentpéterszeg, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Szentp%C3%A9terszeg" coords="303,365,253,374" shape="rect">
										<area target="_parent" alt="Villanyszerelés Mezőpeterd, HutiVill" title="Villanyszerelés Mezőpeterd, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Mez%C5%91peterd" coords="261,386,303,402" shape="rect">
										<area target="_parent" alt="Villanyszerelés Bojt, HutiVill" title="Villanyszerelés Bojt, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Bojt" coords="309,379,330,392" shape="rect">
										<area target="_parent" alt="Villanyszerelés Bedő, HutiVill" title="Villanyszerelés Bedő, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Bed%C5%91" coords="311,395,335,404" shape="rect">
										<area target="_parent" alt="Villanyszerelés Bedő, HutiVill" title="Villanyszerelés Bedő, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Zs%C3%A1ka" coords="189,402,211,413" shape="rect">
										<area target="_parent" alt="Villanyszerelés Darvas, HutiVill" title="Villanyszerelés Darvas, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Darvas" coords="167,415,197,427" shape="rect">
										<area target="_parent" alt="Villanyszerelés Furta, HutiVill" title="Villanyszerelés Furta, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Furta" coords="240,411,213,427" shape="rect">
										<area target="_parent" alt="Villanyszerelés Told, HutiVill" title="Villanyszerelés Told, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Told" coords="283,415,261,428" shape="rect">
										<area target="_parent" alt="Villanyszerelés Vekerd, HutiVill" title="Villanyszerelés Vekerd, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Vekerd" coords="180,432,214,446" shape="rect">
										<area target="_parent" alt="Villanyszerelés Mezősas, HutiVill" title="Villanyszerelés Mezősas, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Mez%C5%91sas" coords="255,429,222,440" shape="rect">
										<area target="_parent" alt="Villanyszerelés Ártánd, HutiVill" title="Villanyszerelés Ártánd, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/%C3%81rt%C3%A1nd" coords="297,417,324,430" shape="rect">
										<area target="_parent" alt="Villanyszerelés Biharkeresztes, HutiVill" title="Villanyszerelés Biharkeresztes, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Biharkeresztes" coords="295,406,331,415" shape="rect">
										<area target="_parent" alt="Villanyszerelés Berekböszörmény, HutiVill" title="Villanyszerelés Berekböszörmény, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Berekb%C3%B6sz%C3%B6rm%C3%A9ny" coords="298,442,238,454" shape="rect">
										<area target="_parent" alt="Villanyszerelés Csökmő, HutiVill" title="Villanyszerelés Csökmő, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Cs%C3%B6km%C5%91" coords="153,459,188,472" shape="rect">
										<area target="_parent" alt="Villanyszerelés Újiráz, HutiVill" title="Villanyszerelés Újiráz, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/%C3%9Ajir%C3%A1z" coords="175,476,203,492" shape="rect">
										<area target="_parent" alt="Villanyszerelés Magyarhomorog, HutiVill" title="Villanyszerelés Magyarhomorog, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Magyarhomorog" coords="192,457,255,473" shape="rect">
										<area target="_parent" alt="Villanyszerelés Komádi, HutiVill" title="Villanyszerelés Komádi, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Kom%C3%A1di" coords="213,475,243,488" shape="rect">
										<area target="_parent" alt="Villanyszerelés Hajdúdorog, HutiVill" title="Villanyszerelés Hajdúdorog, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Hajd%C3%BAdorog" coords="219,62,244,81" shape="rect">
										<area target="_parent" alt="Villanyszerelés Nyíradony, HutiVill" title="Villanyszerelés Nyíradony, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Ny%C3%ADradony" coords="355,125,389,145" shape="rect">
										<area target="_parent" alt="Villanyszerelés Földes, HutiVill" title="Villanyszerelés Földes, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/F%C3%B6ldes" coords="406,183,433,193" shape="rect">
										<area target="_parent" alt="Villanyszerelés Nyírábrány, HutiVill" title="Villanyszerelés Nyírábrány, HutiVill" href="https://villanyszereles-debrecen.hu/villanyszereles/Ny%C3%ADr%C3%A1br%C3%A1ny" coords="" shape="rect">
									</map>
									<br />
									<?php
											$get_all_city = get_all_city();
											foreach($get_all_city as $get_all_city) {
												echo '<span><a href="https://villanyszereles-debrecen.hu/villanyszereles/'.$get_all_city['name'].'">Villanyszerelés '.$get_all_city['name'].'</a></span>, ';
											}
											
										?>
							</div>
							
						</div>
					</div>
				</div>
            </div>
        </div>
		
        <footer id="tt-footer">
            <div class="footer-wrapper">
                <div class="container container-lg-fluid container-lg__no-gutters">
                    <div role="form" class="wpcf7" id="wpcf7-f2336-o2" lang="en-US" dir="ltr">
                        <div class="screen-reader-response">
                            <p role="status" aria-live="polite" aria-atomic="true"></p>
                            <ul></ul>
                        </div>
                       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="wpcf7-form init">
                            
                            <div class="f-form">
                                <div class="f-form__label">Kérjen visszahívást!</div>
                                <div class="f-form__input">
									<span class="wpcf7-form-control-wrap your-email">
										<input type="text" name="phonenumber" id="phonenumber" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" aria-required="true" aria-invalid="false" placeholder="Adja meg telefonszámát!" required />
									</span>
								</div>
                                <div class="f-form__btn">
									<button class="tt-btn btn__color02 wpcf7-form-control wpcf7-submit" type="submit">
										<span class="icon-482948 tt-icon-left"></span> Telefonszám elküldése
									</button>
								</div>
                            </div>
                            <div class="wpcf7-response-output" aria-hidden="true"></div>
                        </form>
                    </div>
                </div>
                <div class="container container-lg-fluid container-lg__no-gutters">
                    <div class="f-holder row no-gutters">
                        <div class="col-xl-7">
                            <div class="additional-strut">
                                <div class="row">
                                    <div class="col-xl-5">
                                        <div class="f-logo"> <a href="https://villanyszereles-debrecen.hu/" class="f-logo"><span class="tt-icon"><img src="https://villanyszereles-debrecen.hu/wp-content/themes/electrician/images/logo-dark.png" alt="logo"></span><span class="tt-text" style="font-size: 20px;">Villanyszerelés Debrecen</span></a></div>
                                    </div>
                                    <div class="col-xl-7">
                                        <div class="f-info-text"> <?php echo $oldal_title;?> - Precíz, tisztességes munkavégzés.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-5">
                                    <div id="custom_html-2" class="widget_text footer-widget widget_custom_html">
                                        <div class="textwidget custom-html-widget">
                                            <nav class="f-nav" id="f-nav">
                                                 <ul>
                                                    <li class="active"><a href="https://villanyszereles-debrecen.hu/">Kezdőlap</a></li>
                                                    <li><a href="https://villanyszereles-debrecen.hu/rapid-szolgaltatas/">Rapid szolgáltatás</a></li>
                                                    <li><a href="https://villanyszereles-debrecen.hu/szolgaltatasok/">Szolgáltatások</a></li>
                                                    <li><a href="https://villanyszereles-debrecen.hu/munkaink/">Munkáink</a></li>
                                                    <li><a data-toggle="modal" data-target="#modalMakeAppointment" href="#">Árajánlatkérés</a></li>
                                                    <li><a href="https://villanyszereles-debrecen.hu/kapcsolat/">Kapcsolat</a></li>
                                                   
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-7">
                                    <div id="custom_html-3" class="widget_text footer-widget2 widget_custom_html">
                                        <div class="textwidget custom-html-widget">
                                            <ul class="f-info-icon">
                                                <li><span class="icon-map-marker"></span> <?php echo $company.', '.$company_address;?></li>
                                                <li><span class="icon-clock-circular-outline-1"></span> Hétfő - Szombat 07:00 - 17:00</li>
                                                <li><a href="tel:<?php echo $telefon;?>"><span class="icon-telephone"></span> <?php echo $telefon;?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="footer_map-2" class="footer-widget3 widget_footer_map">
                        <div id="map-img">
							<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1ptGxfNRDssXFiQpeJQYGhO46phEuV64q" width="640" height="280"></iframe>
						</div>
                    </div>
                    <div class="f-copyright row no-gutters">
                        <div class="col-sm-auto"> © 2021 <a href="https://vargasoft.hu" style="color: #f47629;"><?php echo $company;?></a>. Minden jog fenntartva.</div>
                        <div class="col-sm-auto ml-sm-auto">
                            <p>Created by <a href="https://vargasoft.hu" target="_blank" style="color: #f47629;">VargaSoft | Web.Design.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a href="#" id="js-backtotop" class="tt-back-to-top"> <i class="icon-lightning"></i> </a>
        <div class="modal fade" id="modalMakeAppointment" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content ">
                    <div class="modal-body form-default modal-layout-dafault">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon-860796"></span></button>
                        <div role="form" class="wpcf7" id="wpcf7-f2322-o3" lang="en-US" dir="ltr">
                            <div class="screen-reader-response">
                                <p role="status" aria-live="polite" aria-atomic="true"></p>
                                <ul></ul>
                            </div>
                           
                               
                                <div class="modal-titleblock">
                                    <div class="modal-title"><h3>Kérjen online árajánlatot!</h3></div>
                                </div>
                                <div class="form-modal">
								 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="wpcf7-form init">
                                    <div class="form-group"><span class="wpcf7-form-control-wrap your-name">
										<input type="text" name="name" id="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Teljes neve" /></span>
									</div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group"><span class="wpcf7-form-control-wrap your-email">
												<input type="email" name="email" id="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" aria-required="true" aria-invalid="false" placeholder="Email címe" /></span>
											</div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><span class="wpcf7-form-control-wrap your-phone">
												<input type="text" name="phone" id="phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Telefonszáma" /></span>
											</div>
                                        </div>
                                    </div>
                                    <div class="form-group"><span class="wpcf7-form-control-wrap your-address">
										<input type="text" name="address" id="address" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Címe (irányítószám, település, közterület neve, hsz.)" /></span>
									</div>
                                    <div class="form-group">
                                        <div class="custom-select">
                                            <span class="wpcf7-form-control-wrap service">
                                                 <select name="services" id="services" class="wpcf7-form-control wpcf7-select tt-select" aria-invalid="false" aria-required="true">
                                                    <option value="Service">Válassza ki a kívánt szolgáltatást!</option>
													<?php 
														$get_all_services = get_all_services();
														foreach($get_all_services as $get_all_services) {
													?>
														<option value="<?php echo $get_all_services['title'];?>"><?php echo $get_all_services['title'];?></option>
													<?php } ?>
													
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span class="wpcf7-form-control-wrap date">
											<input type="text" name="date" id="date" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required js_datepicker-1 form-control" aria-required="true" aria-invalid="false" aria-required="true" placeholder="Kivitelezés kívánt dátuma" />
										</span>
										<script type="text/javascript">
												$(function() {  
													$("#date").datepicker({
														dateFormat: 'yyyy-mm-dd',
														changeMonth: true,
														changeYear: true,
														constrainInput: false
													});
												});
									   </script>
		
                                        <div class="form-group__icon icon-747993"></div>
                                    </div>
                                    <div class="form-group">
										<span class="wpcf7-form-control-wrap your-message">
											<textarea name="message" id="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea form-control" aria-invalid="false" placeholder="Megadhat további részleteket, információkat az elvégezendő munkáról." aria-required="true"></textarea>
										</span>
									</div>
                                    <div><button type="submit" id="ajanlatkeres" name="ajanlatkeres" class="wpcf7-form-control wpcf7-submit tt-btn btn__color01"><span class="icon-lightning"></span>Küldés</button></div>
                                </div>
                                <div class="wpcf7-response-output" aria-hidden="true"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">(function () {
            var c = document.body.className;
            c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
            document.body.className = c;
            })()
        </script> 
         <script type='text/javascript' src='https://villanyszereles-debrecen.hu/wp-content/themes/electrician/js/custom9704.js?ver=1608866451' id='electrician-custom-js'></script> 
		 <script type='text/javascript' src='wp-includes/js/dist/vendor/moment.min7716.js?ver=2.26.0' id='moment-js'></script> 
		 <script type='text/javascript' id='moment-js-after'>moment.updateLocale( 'en_US', {"months":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthsShort":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"weekdays":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"weekdaysShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"week":{"dow":1},"longDateFormat":{"LT":"g:i a","LTS":null,"L":null,"LL":"F j, Y","LLL":"F j, Y g:i a","LLLL":null}} );</script> 
		 <script type='text/javascript' src='https://villanyszereles-debrecen.hu/wp-content/themes/electrician/js/plugins/bootstrap-datetimepicker.min044c.js?ver=201202124' id='bootstrap-datetimepicker-js'></script> 
		 <script type='text/javascript' src='https://villanyszereles-debrecen.hu/wp-content/themes/electrician/js/bundle9704.js?ver=1608866451' id='electrician-bundle-js'></script> 
		 <script type='text/javascript' src='wp-includes/js/jquery/ui/core.min35d0.js?ver=1.12.1' id='jquery-ui-core-js'></script> 
		 <script type='text/javascript' src='wp-includes/js/jquery/ui/controlgroup.min35d0.js?ver=1.12.1' id='jquery-ui-controlgroup-js'></script> 
		 <script type='text/javascript' src='wp-includes/js/jquery/ui/checkboxradio.min35d0.js?ver=1.12.1' id='jquery-ui-checkboxradio-js'></script> 
		 <script type='text/javascript' src='wp-includes/js/jquery/ui/button.min35d0.js?ver=1.12.1' id='jquery-ui-button-js'></script> 
		 <script type='text/javascript' src='wp-includes/js/jquery/ui/spinner.min35d0.js?ver=1.12.1' id='jquery-ui-spinner-js'></script> 
		 <script type='text/javascript' src='https://villanyszereles-debrecen.hu/wp-content/plugins/elementor/assets/js/frontend-modules.minc3cf.js?ver=3.0.15' id='elementor-frontend-modules-js'></script> 
		 <script type='text/javascript' src='https://villanyszereles-debrecen.hu/wp-content/plugins/elementor/assets/lib/dialog/dialog.mina288.js?ver=4.8.1' id='elementor-dialog-js'></script> 
		 <script type='text/javascript' src='https://villanyszereles-debrecen.hu/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min05da.js?ver=4.0.2' id='elementor-waypoints-js'></script> 
		 <script type='text/javascript' src='https://villanyszereles-debrecen.hu/wp-content/plugins/elementor/assets/lib/swiper/swiper.min48f5.js?ver=5.3.6' id='swiper-js'></script> 
		 <script type='text/javascript' src='https://villanyszereles-debrecen.hu/wp-content/plugins/elementor/assets/lib/share-link/share-link.minc3cf.js?ver=3.0.15' id='share-link-js'></script> 
		 <script type='text/javascript' id='elementor-frontend-js-before'>var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"version":"3.0.15","is_static":false,"legacyMode":{"elementWrappers":true},"urls":{"assets":"https:\/\/villanyszereles-debrecen.hu\/electrician-v2\/demo3\/wp-content\/plugins\/elementor\/assets\/"},"settings":{"page":[],"editorPreferences":[]},"kit":{"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":1426,"title":"Home%20-%20Electrician%20Demo%2003","excerpt":"","featuredImage":false}};</script> 
		 <script type='text/javascript' src='https://villanyszereles-debrecen.hu/wp-content/plugins/elementor/assets/js/frontend.minc3cf.js?ver=3.0.15' id='elementor-frontend-js'></script> 
    </body>
</html>
