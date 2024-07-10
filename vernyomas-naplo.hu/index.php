<?php 
    session_start();
    
    include('config/connect.php');
    require_once('config/functions.php');
    
    ?>
<!DOCTYPE html>
<html lang="hu" >
    <head>
        <title>Adminisztrációs oldal</title>
        <link rel="shortcut icon" href="assets/media/logos/favicon.ico"/>
        <!--begin::Fonts(mandatory for all pages)-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
        <!--end::Fonts-->
        <!--begin::Vendor Stylesheets(used for this page only)-->
        <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/custom/vis-timeline/vis-timeline.bundle.css" rel="stylesheet" type="text/css"/>
        <!--end::Vendor Stylesheets-->
        <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
        <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
        <!--end::Global Stylesheets Bundle-->
        <!--begin::Google tag-->
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body  id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-toolbar-enabled="true"  class="app-default" >
        <!--begin::Theme mode setup on page load-->
        <script>
            var defaultThemeMode = "light";
            var themeMode;
            
            if ( document.documentElement ) {
            	if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
            		themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            	} else {
            		if ( localStorage.getItem("data-bs-theme") !== null ) {
            			themeMode = localStorage.getItem("data-bs-theme");
            		} else {
            			themeMode = defaultThemeMode;
            		}			
            	}
            
            	if (themeMode === "system") {
            		themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            	}
            
            	document.documentElement.setAttribute("data-bs-theme", themeMode);
            }            
        </script>

        <!--End::Google Tag Manager (noscript) -->
        <!--begin::App-->
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
            <!--begin::Page-->
            <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">
                <!--begin::Header-->
                <div id="kt_app_header" class="app-header" style="background-color: #247cff;" data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}">
                    <!--begin::Header container-->
                    <div class="app-container  container-xxl d-flex align-items-stretch justify-content-between " id="kt_app_header_container">
                        <!--begin::Header mobile toggle-->
                        <div class="d-flex align-items-center d-lg-none ms-n3 me-2" title="Show sidebar menu">
                            <div class="btn btn-icon btn-color-gray-600 btn-active-color-primary w-35px h-35px" id="kt_app_header_menu_toggle">
                                <i class="ki-outline ki-abstract-14 fs-2"></i>	
                            </div>
                        </div>
                        <!--end::Header mobile toggle-->
                        <!--begin::Logo-->
                        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
                            <a href="">
                            <img alt="Logo" src="https://vargasoft.hu/images/VargaSoft_Logo_v02.png" class="h-60px d-lg-none"/>
                            <img alt="Logo" src="https://vargasoft.hu/images/VargaSoft_Logo_v02.png" class="h-60px d-none d-lg-inline app-sidebar-logo-default theme-light-show"/>
                            <img alt="Logo" src="https://vargasoft.hu/images/VargaSoft_Logo_v02.png" class="h-60px d-none d-lg-inline app-sidebar-logo-default theme-dark-show"/>
                            </a>
                        </div>
                        <!--end::Logo-->
                        <!--begin::Header wrapper-->
                        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
                            <!--begin::Menu wrapper-->
                            <div 
                                class="app-header-menu app-header-mobile-drawer align-items-stretch"
                                data-kt-drawer="true"
                                data-kt-drawer-name="app-header-menu"
                                data-kt-drawer-activate="{default: true, lg: false}"
                                data-kt-drawer-overlay="true"
                                data-kt-drawer-width="250px"
                                data-kt-drawer-direction="start"
                                data-kt-drawer-toggle="#kt_app_header_menu_toggle"
                                data-kt-swapper="true"
                                data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                                data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}"
                                style="background-color: #247cff;">
                                <!--begin::Menu-->
                                <div 
                                    class=" menu  
                                    menu-rounded 
                                    menu-active-bg 
                                    menu-state-primary 
                                    menu-column 
                                    menu-lg-row 
                                    menu-title-grey-700 
                                    menu-icon-grey-500 
                                    menu-arrow-grey-500 
                                    menu-bullet-grey-500 
                                    my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0
                                    "         
                                    id="kt_app_header_menu"
                                    data-kt-menu="true"
                                    >
                                    <!--begin:Menu item-->
                                    <div  data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" data-kt-menu-offset="-50,0"  class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2" >
                                        <!--begin:Menu link-->
										<span class="menu-link"><span  class="menu-title" style="color:white;text-transform:uppercase">Blog bejegyzések</span><span  class="menu-arrow d-lg-none"></span></span><!--end:Menu link--><!--begin:Menu sub-->
                                    </div>
									<div  data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" data-kt-menu-offset="-50,0"  class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2" >
                                        <!--begin:Menu link-->
										<span class="menu-link"><span  class="menu-title" style="color:white;text-transform:uppercase">További modulok</span><span  class="menu-arrow d-lg-none"></span></span><!--end:Menu link--><!--begin:Menu sub-->
                                    </div>
									<!--
									<div  data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" data-kt-menu-offset="-50,0"  class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2" >
										<span class="menu-link"><span  class="menu-title" style="color:white;text-transform:uppercase">Blog bejegyzések</span><span  class="menu-arrow d-lg-none"></span></span>
                                    </div>
                                    <div  data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" data-kt-menu-offset="-50,0"  class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2" >
										<span class="menu-link"><span  class="menu-title" style="color:white;text-transform:uppercase">Galéria / Referencia munkáink</span><span  class="menu-arrow d-lg-none"></span></span>
                                    </div>
                                    <!--end:Menu item-->    
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Menu wrapper-->
                            <!--begin::Navbar-->
                            <div class="app-navbar flex-shrink-0">
                                <!--begin::Search-->    
                                <div class="d-flex align-items-center align-items-stretch mx-4">
                                      
                                </div>
                                
                                <!--end::Chat-->
                                <!--begin::User menu-->
                                <div class="app-navbar-item ms-3 ms-lg-5" id="kt_header_user_menu_toggle">
                                    <!--begin::Menu wrapper-->
                                    <div class="cursor-pointer symbol symbol-35px symbol-md-45px"
                                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" 
                                        data-kt-menu-attach="parent" 
                                        data-kt-menu-placement="bottom-end">
                                        <img class="symbol symbol-circle symbol-35px symbol-md-45px" src="assets/images/vr.png" alt="user"/>             
                                    </div>
                                    <!--begin::User account menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content d-flex align-items-center px-3">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-50px me-5">
                                                    <img alt="Logo" src="assets/images/vr.png"/>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Username-->
                                                <div class="d-flex flex-column">
                                                    <div class="fw-bold d-flex align-items-center fs-5">
                                                       Varga Richard              
														<span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                                                    </div>
                                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                                    info@vargasoft.hu              
													</a>
                                                </div>
                                                <!--end::Username-->
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="#" class="menu-link px-5">
												Fiókom
                                            </a>
                                        </div>
                                        
                                        <div class="menu-item px-5">
                                            <a href="#" class="menu-link px-5">
												Kijelentkezés
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::User account menu-->
                                    <!--end::Menu wrapper-->
                                </div>
                                <!--end::User menu-->
                                <!--begin::Header menu toggle-->
                                <!--end::Header menu toggle-->
                            </div>
                            <!--end::Navbar-->	
                        </div>
                        <!--end::Header wrapper-->            
                    </div>
                    <!--end::Header container-->
                </div>
                <!--end::Header-->        
                <!--begin::Wrapper-->
                <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
                    <!--begin::Toolbar-->
                    <div id="kt_app_toolbar" class="app-toolbar  py-6 ">
                        <!--begin::Toolbar container-->
                        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex align-items-start ">
                            <!--begin::Toolbar container-->
                            
                            <!--end::Toolbar container--->        
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar-->            
                    <!--begin::Wrapper container-->
                    <div class="app-container  container-xxl ">
                        <!--begin::Main-->
                        <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                            <!--begin::Content wrapper-->
                            <div class="d-flex flex-column flex-column-fluid">
                                <!--begin::Content-->
                                <div id="kt_app_content" class="app-content " >
                                    <!--begin::Row-->
                                    <div class="row gy-5 g-xl-10">
                                        <!--begin::Col-->
                                        <div class="col-xl-4 mb-xl-10">
                                            <!--begin::Engage widget 3-->
                                            <div class="card bg-primary h-md-100" data-bs-theme="light">
                                                <!--begin::Body-->
                                                <div class="card-body d-flex flex-column pt-13 pb-14">
                                                    <!--begin::Heading-->
                                                    <div class="m-0">
                                                        <!--begin::Title-->
                                                        <h1 class="fw-semibold text-white text-center lh-lg mb-9">           
                                                            Menedzseld weboldalad<br />              
															<span class="fw-bolder"> Könnyen és egyszerűen</span>
                                                        </h1>
                                                        <!--end::Title-->  
                                                        <!--begin::Illustration-->
                                                        <div 
                                                            class="flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-center card-rounded-bottom h-200px mh-200px my-5 mb-lg-12" 
                                                            style="background-image:url('assets/media/svg/illustrations/easy/5.svg')">
                                                        </div>
                                                        <!--end::Illustration-->
                                                    </div>
                                                    <!--end::Heading-->
                                                    <!--begin::Links-->
                                                    <div class="text-center">
                                                        <!--begin::Link-->
                                                        <a class="btn btn-sm bg-white btn-color-gray-800 me-2"  data-bs-target="#kt_modal_bidding" data-bs-toggle="modal" >
															Elérhető modulok       
														</a>
                                                        
                                                    </div>
                                                    <!--end::Links-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Engage widget 3--> 
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-xl-8 mb-5 mb-xl-10">
                                            <!--begin::Chart widget 32-->
                                            <div class="card card-flush h-xl-100">
                                                <!--begin::Header-->
                                                <div class="card-header pt-7">
                                                    <!--begin::Title-->
                                                    <h3 class="card-title align-items-start flex-column">			
                                                        <span class="card-label fw-bold text-gray-800">Blog bejegyzések</span>
                                                        <span class="text-gray-500 mt-1 fw-semibold fs-6">Összes blog bejegyzés</span>
                                                    </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Toolbar-->
                                                    <div class="card-toolbar">   
                                                        <a href="" class="btn btn-sm btn-light">Új bejegyzés létrehozása</a>             
                                                    </div>
                                                    <!--end::Toolbar-->
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Body-->
                                                <div class="card-body">
                                                    
                                                    <!--end::Nav-->
                                                    <!--begin::Tab Content-->
                                                    <div class="tab-content">
                                                        <!--begin::Tap pane-->
                                                        <div class="tab-pane fade active show" id="kt_stats_widget_6_tab_1">
                                                            <!--begin::Table container-->
                                                            <div class="table-responsive">
                                                                <!--begin::Table-->
                                                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                                    <!--begin::Table head-->
                                                                    <thead>
                                                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                                            <th class="p-0 w-200px w-xxl-450px"></th>
                                                                            <th class="p-0 min-w-150px"></th>
                                                                            <th class="p-0 min-w-150px"></th>
                                                                            <th class="p-0 min-w-190px"></th>
                                                                            <th class="p-0 w-50px"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <!--end::Table head-->
                                                                    <!--begin::Table body-->
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="d-flex align-items-center">
                                                                                    <div class="symbol symbol-40px me-3">                                                   
                                                                                        <img src="assets/media/avatars/300-1.jpg" class="" alt=""/>                                                    
                                                                                    </div>
                                                                                    <div class="d-flex justify-content-start flex-column">
                                                                                        <a href="#" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">Brooklyn Simmons</a>
                                                                                        <span class="text-muted fw-semibold d-block fs-7">Zuid Area</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="text-gray-800 fw-bold d-block mb-1 fs-6">1,240</span>
                                                                                <span class="fw-semibold text-gray-500 d-block">Deliveries</span>
                                                                            </td>
                                                                            <td>
                                                                                <a href="#" class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6">$5,400</a>
                                                                                <span class="text-muted fw-semibold d-block fs-7">Earnings</span>
                                                                            </td>
                                                                            <td>
                                                                                <div class="rating">
                                                                                    <div class="rating-label checked">
                                                                                        <i class="ki-solid ki-star fs-6"></i>                                                    
                                                                                    </div>
                                                                                    <div class="rating-label checked">
                                                                                        <i class="ki-solid ki-star fs-6"></i>                                                    
                                                                                    </div>
                                                                                    <div class="rating-label checked">
                                                                                        <i class="ki-solid ki-star fs-6"></i>                                                    
                                                                                    </div>
                                                                                    <div class="rating-label checked">
                                                                                        <i class="ki-solid ki-star fs-6"></i>                                                    
                                                                                    </div>
                                                                                    <div class="rating-label checked">
                                                                                        <i class="ki-solid ki-star fs-6"></i>                                                    
                                                                                    </div>
                                                                                </div>
                                                                                <span class="text-muted fw-semibold d-block fs-7 mt-1">Rating</span>
                                                                            </td>
                                                                            <td class="text-end">
                                                                                <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                                                <i class="ki-outline ki-black-right fs-2 text-gray-500"></i>                                            </a>
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>
                                                                    <!--end::Table body-->
                                                                </table>
                                                            </div>
                                                            <!--end::Table-->
                                                        </div>
                                                        <!--end::Tap pane-->
                                                        <!--begin::Tap pane-->
                                                       
                                                        <!--end::Tap pane-->
                                                    </div>
                                                    <!--end::Tab Content-->        
                                                </div>
                                                <!--end: Card Body-->
                                            </div>
                                            <!--end::Chart widget 32-->    
                                        </div>
                                        <!--end::Col-->      
                                    </div>
                                    <!--end::Row--> 
                                    <!--begin::Row-->
                                    <div class="row gy-5 g-xl-10">
                                        <!--begin::Col-->
                                        <div class="col-xl-4 mb-xl-10">
                                            <!--begin::List widget 16-->
                                            <div class="card card-flush h-xl-100">
                                                <!--begin::Header-->
                                                <div class="card-header pt-7">
                                                    <!--begin::Title-->
                                                    <h3 class="card-title align-items-start flex-column">
                                                        <span class="card-label fw-bold text-gray-800">Interakciók</span>
                                                        <span class="text-gray-500 mt-1 fw-semibold fs-6">56 interakció (utolsó 30 nap)</span>
                                                    </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Toolbar-->
                                                    <div class="card-toolbar">   
                                                        <a href="#" class="btn btn-sm btn-light" data-bs-toggle='tooltip' data-bs-dismiss='click' data-bs-custom-class="tooltip-inverse" title="Delivery App is coming soon">Összes</a>             
                                                    </div>
                                                    <!--end::Toolbar-->
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Body-->
                                                <div class="card-body pt-4 px-0">
                                                    <!--begin::Nav-->             
                                                    <ul class="nav nav-pills nav-pills-custom item position-relative mx-9 mb-9">
                                                        <!--begin::Item--> 
                                                        <li class="nav-item col-4 mx-0 p-0">
                                                            <!--begin::Link--> 
                                                            <a class="nav-link active d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#">
                                                                <!--begin::Subtitle-->
                                                                <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">
                                                                Árajánlatok
                                                                </span> 
                                                                <!--end::Subtitle-->
                                                                <!--begin::Bullet-->
                                                                <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                                                                <!--end::Bullet-->
                                                            </a>
                                                            <!--end::Link-->                
                                                        </li>
                                                        <!--end::Item--> 
                                                        <!--begin::Item--> 
                                                        <li class="nav-item col-4 mx-0 px-0">
                                                            <!--begin::Link--> 
                                                            <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_2">
                                                                <!--begin::Subtitle-->
                                                                <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">
                                                                Hívások
                                                                </span> 
                                                                <!--end::Subtitle-->
                                                                <!--begin::Bullet-->
                                                                <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                                                                <!--end::Bullet-->
                                                            </a>
                                                            <!--end::Link-->                
                                                        </li>
                                                        <!--end::Item-->    
                                                        <!--begin::Item--> 
                                                        <li class="nav-item col-4 mx-0 px-0">
                                                            <!--begin::Link--> 
                                                            <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_3">
                                                                <!--begin::Subtitle-->
                                                                <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">
                                                                Kapcsolat  
                                                                </span> 
                                                                <!--end::Subtitle-->
                                                                <!--begin::Bullet-->
                                                                <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                                                                <!--end::Bullet-->
                                                            </a>
                                                            <!--end::Link-->                
                                                        </li>
                                                        <!--end::Item--> 
                                                        <!--begin::Bullet-->
                                                        <span class="position-absolute z-index-1 bottom-0 w-100 h-4px bg-light rounded"></span>
                                                        <!--end::Bullet-->
                                                    </ul>
                                                    <!--end::Nav-->
                                                    <!--begin::Tab Content-->
                                                    <div class="tab-content px-9 hover-scroll-overlay-y pe-7 me-3 mb-2" style="height: 454px">
                                                        <!--begin::Tap pane-->
                                                        <div class="tab-pane fade show active" id="kt_list_widget_16_tab_1">
                                                            <!--begin::Item-->
                                                            <?php 
																// Véletlenszerű magyar név generálása
																function generateRandomName() {
																	$firstNames = ['János', 'Mária', 'Péter', 'Katalin', 'Gábor', 'Anna'];
																	$lastNames = ['Nagy', 'Kovács', 'Kiss', 'Szabó', 'Tóth', 'Horváth'];
																	$firstName = $firstNames[array_rand($firstNames)];
																	$lastName = $lastNames[array_rand($lastNames)];
																	return $firstName . ' ' . $lastName;
																}

																// Véletlenszerű magyar cím generálása
																function generateRandomAddress() {
																	$streets = ['Kossuth Lajos utca', 'Petőfi Sándor utca', 'Ady Endre utca', 'Bartók Béla út', 'Széchenyi István út'];
																	$cities = ['Budapest', 'Debrecen', 'Szeged', 'Pécs', 'Győr'];
																	$street = $streets[array_rand($streets)];
																	$city = $cities[array_rand($cities)];
																	$number = rand(1, 100);
																	return $city . ', ' . $street . ' ' . $number . '.';
																}

																// Generáljunk 10 blokkot
																for ($i = 0; $i < 10; $i++) {
																	$name = generateRandomName();
																	$address = generateRandomAddress();
																?>
																	<div class="m-0">
																		<!--begin::Timeline-->
																		<div class="timeline timeline-border-dashed">
																			<!--begin::Timeline item-->
																			<div class="timeline-item pb-5">
																				<!--begin::Timeline line-->
																				<div class="timeline-line"></div>
																				<!--end::Timeline line-->
																				<!--begin::Timeline icon-->
																				<div class="timeline-icon">
																					<i class="ki-outline ki-cd fs-2 text-info"></i>                                   
																				</div>
																				<!--end::Timeline icon-->
																				<!--begin::Timeline content-->
																				<div class="timeline-content m-0">
																					<!--begin::Label-->
																					<span class="fs-8 fw-bolder text-info text-uppercase">Árajánlatkérés</span>
																					<!--begin::Label-->                                        
																					<!--begin::Title-->
																					<a href="#" class="fs-6 text-gray-800 fw-bold d-block text-hover-primary"><?php echo $name; ?></a>
																					<!--end::Title-->   
																					<!--begin::Title-->
																					<span class="fw-semibold text-gray-500"><?php echo $address; ?></span>
																					<!--end::Title-->    
																				</div>
																				<!--end::Timeline content-->                                  
																			</div>
																			<!--end::Timeline item-->  
																			<!--begin::Timeline item-->

																			<!--end::Timeline item--> 
																		</div>
																		<!--end::Timeline-->
																	</div>
																	<!--end::Item-->    
																	<!--begin::Separator-->
																	<div class="separator separator-dashed mt-5 mb-4"></div>
																<?php 
																}
																?>
                                                            
                                                            <!--end::Item-->    
                                                        </div>
                                                        <!--end::Tap pane-->                               
                                                        <!--begin::Tap pane-->
                                                        <div class="tab-pane fade " id="kt_list_widget_16_tab_2">
                                                            <?php 
															// Véletlenszerű magyar nevek generálása
															function generateRandomHungarianName() {
																$firstNames = ['János', 'Mária', 'Péter', 'Katalin', 'Gábor', 'Anna'];
																$lastNames = ['Nagy', 'Kovács', 'Kiss', 'Szabó', 'Tóth', 'Horváth'];
																$firstName = $firstNames[array_rand($firstNames)];
																$lastName = $lastNames[array_rand($lastNames)];
																return $lastName . ' ' . $firstName;
															}

															// Véletlenszerű magyar telefonszám generálása
															function generateRandomPhoneNumber() {
																$phoneNumber = '06';
																for ($i = 0; $i < 7; $i++) {
																	$phoneNumber .= rand(0, 9);
																}
																return $phoneNumber;
															}

															// Generáljunk 10 bejegyzést
															for ($i = 0; $i < 10; $i++) {
																$name = generateRandomHungarianName();
																$phoneNumber = generateRandomPhoneNumber();
															?>
																<div class="m-0">
																	<!--begin::Timeline-->
																	<div class="timeline timeline-border-dashed">
																		<!--begin::Timeline item-->
																		<div class="timeline-item pb-5">
																			<!--begin::Timeline line-->
																			<div class="timeline-line"></div>
																			<!--end::Timeline line-->
																			<!--begin::Timeline icon-->
																			<div class="timeline-icon">
																				<i class="ki-outline ki-cd fs-2 text-success"></i>                                   
																			</div>
																			<!--end::Timeline icon-->
																			<!--begin::Timeline content-->
																			<div class="timeline-content m-0">
																				<!--begin::Label-->
																				<span class="fs-8 fw-bolder text-success text-uppercase">Visszahívás</span>
																				<!--begin::Label-->                                        
																				<!--begin::Title-->
																				<a href="#" class="fs-6 text-gray-800 fw-bold d-block text-hover-primary"><?php echo $name; ?></a>
																				<!--end::Title-->   
																				<!--begin::Title-->
																				<span class="fw-semibold text-gray-500"><?php echo $phoneNumber; ?></span>
																				<!--end::Title-->    
																			</div>
																			<!--end::Timeline content-->                                  
																		</div>
																		<!--end::Timeline item-->  
																		<!--begin::Timeline item-->

																		<!--end::Timeline item--> 
																	</div>
																	<!--end::Timeline-->
																</div>
																<!--end::Item-->    
																<!--begin::Separator-->
																<div class="separator separator-dashed mt-5 mb-4"></div>
															<?php 
															}
															?>
                                                            <!--end::Item-->    
                                                        </div>
                                                        <!--end::Tap pane-->                               
                                                        <!--begin::Tap pane-->
                                                        <div class="tab-pane fade " id="kt_list_widget_16_tab_3">
                                                            <!--begin::Item-->
                                                            <div class="m-0">
                                                                <!--begin::Timeline-->
                                                                <div class="timeline timeline-border-dashed">
                                                                    <!--begin::Timeline item-->
                                                                    <div class="timeline-item pb-5">
                                                                        <!--begin::Timeline line-->
                                                                        <div class="timeline-line"></div>
                                                                        <!--end::Timeline line-->
                                                                        <!--begin::Timeline icon-->
                                                                        <div class="timeline-icon">
                                                                            <i class="ki-outline ki-cd fs-2 text-dark"></i>                                   
                                                                        </div>
                                                                        <!--end::Timeline icon-->
                                                                        <!--begin::Timeline content-->
                                                                        <div class="timeline-content m-0">
                                                                            <!--begin::Label-->
                                                                            <span class="fs-8 fw-bolder text-dark text-uppercase">Kapcsolat</span>
                                                                            <!--begin::Label-->                                        
                                                                            <!--begin::Title-->
                                                                            <a href="#" class="fs-6 text-dark-800 fw-bold d-block text-hover-primary">Albert Sándor</a>
                                                                            <!--end::Title-->   
                                                                            <!--begin::Title-->
                                                                            <span class="fw-semibold text-dark-500">Miskolc, AVasalja utca 23.</span>
                                                                            <!--end::Title-->    
                                                                        </div>
                                                                        <!--end::Timeline content-->                                  
                                                                    </div>
                                                                    <!--end::Timeline item-->  
                                                                    <!--begin::Timeline item-->
                                                                    
                                                                    <!--end::Timeline item--> 
                                                                </div>
                                                                <!--end::Timeline-->
                                                            </div>
                                                            <!--end::Item-->    
                                                            <div class="separator separator-dashed mt-5 mb-4"></div>
                                                            <!--end::Item-->    
                                                        </div>
                                                        <!--end::Tap pane-->                               
                                                    </div>
                                                    <!--end::Tab Content-->        
                                                </div>
                                                <!--end: Card Body-->
                                            </div>
                                            <!--end::List widget 16-->     
                                        </div>
                                        <!--end::Col-->      
                                        <!--begin::Col-->
                                        <div class="col-xl-8 mb-5 mb-xl-10">
                                            <!--begin::Chart widget 32-->
                                            <div class="card card-flush h-xl-100">
                                                <!--begin::Header-->
                                                <div class="card-header pt-7">
                                                    <!--begin::Title-->
                                                    <h3 class="card-title align-items-start flex-column">			
                                                        <span class="card-label fw-bold text-gray-800">Weboldal beállítások</span>
                                                        <span class="text-gray-500 mt-1 fw-semibold fs-6">Általános beállítások</span>
                                                    </h3>
                                                    <!--end::Title-->
                                                    <!--begin::Toolbar-->
                                                    <div class="card-toolbar">   
                                                        <a href="" class="btn btn-sm btn-light">Új oldal készítése</a>             
                                                        <a href="" class="btn btn-sm btn-light">.htaccess szerkesztése</a>             
                                                        <a href="" class="btn btn-sm btn-light">Oldaltérkép kezelése</a>             
                                                    </div>
                                                    <!--end::Toolbar-->
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Body-->
                                                <div class="card-body">
                                                    
                                                    <!--end::Nav-->
                                                    <!--begin::Tab Content-->
                                                    <div class="tab-content">
                                                        <!--begin::Tap pane-->
                                                        <div class="tab-pane fade active show" id="kt_stats_widget_6_tab_1">
                                                            <!--begin::Table container-->
                                                            <div class="table-responsive">
                                                                <!--begin::Table-->
                                                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                                    <!--begin::Table head-->
                                                                    <thead>
                                                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                                            <th class="p-0 w-200px w-xxl-450px"></th>
                                                                            <th class="p-0 min-w-150px"></th>
                                                                            <th class="p-0 min-w-150px"></th>
                                                                            
                                                                            <th class="p-0 w-50px"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <!--end::Table head-->
                                                                    <!--begin::Table body-->
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="d-flex align-items-center">
                                                                                    
                                                                                    <div class="d-flex justify-content-start flex-column">
                                                                                        <a href="#" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">Kezdőoldal</a>
                                                                                        <span class="text-muted fw-semibold d-block fs-7">index.php</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="text-gray-800 fw-bold d-block mb-1 fs-6">Title</span>
                                                                                <span class="fw-semibold text-gray-500 d-block"><span class="badge badge-danger">Premium</span></span>
                                                                            </td>
                                                                            <td>
                                                                                <a href="#" class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6">Description</a>
                                                                                <span class="text-muted fw-semibold d-block fs-7"><span class="badge badge-danger">Premium</span></span>
                                                                            </td>
                                                                            
                                                                            <td class="text-end">
                                                                                <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
																					<i class="ki-outline ki-black-right fs-2 text-gray-500"></i>                                            
																				</a>
                                                                            </td>
                                                                        </tr>
																		<tr>
                                                                            <td>
                                                                                <div class="d-flex align-items-center">
                                                                                    
                                                                                    <div class="d-flex justify-content-start flex-column">
                                                                                        <a href="#" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">Szolgáltatások</a>
                                                                                        <span class="text-muted fw-semibold d-block fs-7">services.php</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="text-gray-800 fw-bold d-block mb-1 fs-6">Title</span>
                                                                                <span class="fw-semibold text-gray-500 d-block"><span class="badge badge-danger">Premium</span></span>
                                                                            </td>
                                                                            <td>
                                                                                <a href="#" class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6">Description</a>
                                                                                <span class="text-muted fw-semibold d-block fs-7"><span class="badge badge-danger">Premium</span></span>
                                                                            </td>
                                                                            
                                                                            <td class="text-end">
                                                                                <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                                                <i class="ki-outline ki-black-right fs-2 text-gray-500"></i>                                            </a>
                                                                            </td>
                                                                        </tr>
																		<tr>
                                                                            <td>
                                                                                <div class="d-flex align-items-center">
                                                                                    
                                                                                    <div class="d-flex justify-content-start flex-column">
                                                                                        <a href="#" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">Referencia munkáink</a>
                                                                                        <span class="text-muted fw-semibold d-block fs-7">works.php</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="text-gray-800 fw-bold d-block mb-1 fs-6">Title</span>
                                                                                <span class="fw-semibold text-gray-500 d-block"><span class="badge badge-danger">Premium</span></span>
                                                                            </td>
                                                                            <td>
                                                                                <a href="#" class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6">Description</a>
                                                                                <span class="text-muted fw-semibold d-block fs-7"><span class="badge badge-danger">Premium</span></span>
                                                                            </td>
                                                                            
                                                                            <td class="text-end">
                                                                                <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                                                <i class="ki-outline ki-black-right fs-2 text-gray-500"></i>                                            </a>
                                                                            </td>
                                                                        </tr>
																		<tr>
                                                                            <td>
                                                                                <div class="d-flex align-items-center">
                                                                                    
                                                                                    <div class="d-flex justify-content-start flex-column">
                                                                                        <a href="#" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">Blog bejegyzések</a>
                                                                                        <span class="text-muted fw-semibold d-block fs-7">blogs.php</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="text-gray-800 fw-bold d-block mb-1 fs-6">Title</span>
                                                                                <span class="fw-semibold text-gray-500 d-block"><span class="badge badge-danger">Premium</span></span>
                                                                            </td>
                                                                            <td>
                                                                                <a href="#" class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6">Description</a>
                                                                                <span class="text-muted fw-semibold d-block fs-7"><span class="badge badge-danger">Premium</span></span>
                                                                            </td>
                                                                            
                                                                            <td class="text-end">
                                                                                <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                                                <i class="ki-outline ki-black-right fs-2 text-gray-500"></i>                                            </a>
                                                                            </td>
                                                                        </tr>
																		<tr>
                                                                            <td>
                                                                                <div class="d-flex align-items-center">
                                                                                    
                                                                                    <div class="d-flex justify-content-start flex-column">
                                                                                        <a href="#" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">Kapcsolat</a>
                                                                                        <span class="text-muted fw-semibold d-block fs-7">contact.php</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="text-gray-800 fw-bold d-block mb-1 fs-6">Title</span>
                                                                                <span class="fw-semibold text-gray-500 d-block"><span class="badge badge-danger">Premium</span></span>
                                                                            </td>
                                                                            <td>
                                                                                <a href="#" class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6">Description</a>
                                                                                <span class="text-muted fw-semibold d-block fs-7"><span class="badge badge-danger">Premium</span></span>
                                                                            </td>
                                                                            
                                                                            <td class="text-end">
                                                                                <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                                                <i class="ki-outline ki-black-right fs-2 text-gray-500"></i>                                            </a>
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>
                                                                    <!--end::Table body-->
                                                                </table>
                                                            </div>
                                                            <!--end::Table-->
                                                        </div>
                                                        <!--end::Tap pane-->
                                                        <!--begin::Tap pane-->
                                                       
                                                        <!--end::Tap pane-->
                                                    </div>
                                                    <!--end::Tab Content-->        
                                                </div>
                                                <!--end: Card Body-->
                                            </div>
                                            <!--end::Chart widget 32-->    
                                        </div>
                                        <!--end::Col-->      
                                    </div>
                                    <!--end::Row--> 

                                    <!--end::Row--> 

                                    <!--end::Row--> 
                                </div>
                                <!--end::Content-->	
                            </div>
                            <!--end::Content wrapper-->
                            <!--begin::Footer-->
                            <div id="kt_app_footer" class="app-footer  d-flex flex-column flex-md-row align-items-center flex-center flex-md-stack py-2 py-lg-4 " >
                                <!--begin::Copyright-->
                                <div class="text-gray-900 order-2 order-md-1">
                                    <span class="text-muted fw-semibold me-1"><?php echo date('Y');?>&copy;</span>
                                    <a href="https://vargasoft.hu/" target="_blank" class="text-gray-800 text-hover-primary">VargaSoft</a>
                                </div>
                                <!--end::Copyright-->
                                <!--begin::Menu-->
                                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                    <li class="menu-item"><a href="https://keenthemes.com/" target="_blank" class="menu-link px-2">Blog bejegyzések kezelése</a></li>
                                    <li class="menu-item"><a href="https://devs.keenthemes.com/" target="_blank" class="menu-link px-2">Online árajánlatkészítése</a></li>
                                    <li class="menu-item"><a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Termékek és szolgáltatások menedzselése</a></li>
                                </ul>
                                <!--end::Menu-->    
                            </div>
                            <!--end::Footer-->                            
                        </div>
                        <!--end:::Main-->
                    </div>
                    <!--end::Wrapper container-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::App-->

        <!--end::Chat drawer--> 
        <!--end::Drawers-->
        <!--begin::Engage-->

        <!--end::Modal - Sitemap-->				<!--end::Engage modals-->
        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <i class="ki-outline ki-arrow-up"></i>
        </div>
        <!--end::Scrolltop-->

        <!--begin::Javascript-->
        <script>
            var hostUrl = "assets/index.html";        
        </script>
        <!--begin::Global Javascript Bundle(mandatory for all pages)-->
        <script src="assets/plugins/global/plugins.bundle.js"></script>
        <script src="assets/js/scripts.bundle.js"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Vendors Javascript(used for this page only)-->
        <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
        <script src="assets/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>
        <script src="cdn.amcharts.com/lib/5/index.js"></script>
        <script src="cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="cdn.amcharts.com/lib/5/percent.js"></script>
        <script src="cdn.amcharts.com/lib/5/radar.js"></script>
        <script src="cdn.amcharts.com/lib/5/themes/Animated.js"></script>
        <!--end::Vendors Javascript-->
        <!--begin::Custom Javascript(used for this page only)-->
        <script src="assets/js/widgets.bundle.js"></script>
        <script src="assets/js/custom/widgets.js"></script>
        <script src="assets/js/custom/apps/chat/chat.js"></script>
        <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
        <script src="assets/js/custom/utilities/modals/bidding.js"></script>
        <script src="assets/js/custom/utilities/modals/users-search.js"></script>
        <!--end::Custom Javascript-->
        <!--end::Javascript-->
    </body>
    <!--end::Body-->
    <!-- Mirrored from preview.keenthemes.com/metronic8/demo30/dashboards/delivery.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Feb 2024 12:48:38 GMT -->
</html>