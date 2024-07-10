<?php
    include("config/connect.php");
    require_once("config/functions.php");
    
    
    
    echo '
	<?xml version="1.0" encoding="UTF-8"?>
	<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
    
      <loc>https://cserepes-lemez.hu.hu/</loc>
    
      <priority>1.0</priority>
    
      <changefreq>monthly</changefreq>
    
    </url>
    <url>
    
      <loc>https://cserepes-lemez.hu.hu/szolgaltatasok/</loc>
    
      <priority>0.9</priority>
    
      <changefreq>monthly</changefreq>
    
    </url>
    <url>
    
      <loc>https://cserepes-lemez.hu.hu/blog-bejegyzesek/</loc>
    
      <priority>0.9</priority>
    
      <changefreq>monthly</changefreq>
    
    </url>
    <url>
    
      <loc>https://cserepes-lemez.hu.hu/kapcsolat/</loc>
    
      <priority>0.9</priority>
    
      <changefreq>monthly</changefreq>
    
    </url>
    <url>
    
      <loc>https://www.cserepes-lemez.hu/szolgaltatasok/cserepeslemezes-tetofedes/</loc>
    
      <priority>0.9</priority>
    
      <changefreq>monthly</changefreq>
    
    </url>
    <url>
    
      <loc>https://www.cserepes-lemez.hu/szolgaltatasok/tetofelujitas-cserepeslemezzel/</loc>
    
      <priority>0.9</priority>
    
      <changefreq>monthly</changefreq>
    
    </url>
	<url>
    
      <loc>https://www.cserepes-lemez.hu/szolgaltatasok/lemezteto-keszites/</loc>
    
      <priority>0.9</priority>
    
      <changefreq>monthly</changefreq>
    
    </url>
	<url>
    
      <loc>https://www.cserepes-lemez.hu/szolgaltatasok/lemezteto-felrakasa/</loc>
    
      <priority>0.9</priority>
    
      <changefreq>monthly</changefreq>
    
    </url>
	<url>
    
      <loc>https://www.cserepes-lemez.hu/szolgaltatasok/korcolt-lemezes-tetofedes/</loc>
    
      <priority>0.9</priority>
    
      <changefreq>monthly</changefreq>
    
    </url>
	
	<url>
    
      <loc>https://www.cserepes-lemez.hu/szolgaltatasok/korcolt-lemezes-tetofedes/</loc>
    
      <priority>0.9</priority>
    
      <changefreq>monthly</changefreq>
    
    </url>
	
    <url>
    
      <loc>https://www.cserepes-lemez.hu/szolgaltatasok/trapezlemezes-tetofedes/</loc>
    
      <priority>0.8</priority>
    
      <changefreq>monthly</changefreq>
    
    </url>
    
    
    ';
    
    $get_all_blog = get_all_blog();
    foreach($get_all_blog as $blog) {
    	echo '
     <url>
    
      <loc>https://cserepes-lemez.hu.hu/blog-bejegyzesek/'.$blog['id'].'/'.urlencode($blog['blog_title']).'/</loc>
    
      <priority>0.7</priority>
    
      <changefreq>monthly</changefreq>
    
    </url>';
    
    }
    
    $get_all_megye = get_all_megye();
    foreach($get_all_megye as $megye) {
    	$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
    	foreach($get_all_city_by_megye as $city) {
    		 echo '
    		 <url>
    
    		  <loc>https://www.cserepes-lemez.hu/szolgaltatasok/cserepeslemezes-tetofedes/'.replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos_ex']).'/</loc>
    
    		  <priority>0.7</priority>
    
    		  <changefreq>monthly</changefreq>
    
    		</url>';
    	}
    }
	
	$get_all_megye = get_all_megye();
    foreach($get_all_megye as $megye) {
    	$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
    	foreach($get_all_city_by_megye as $city) {
    		 echo '
    		 <url>
    
    		  <loc>https://www.cserepes-lemez.hu/szolgaltatasok/tetofelujitas-cserepeslemezzel/'.replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos_ex']).'/</loc>
    
    		  <priority>0.7</priority>
    
    		  <changefreq>monthly</changefreq>
    
    		</url>';
    	}
    }
	
	$get_all_megye = get_all_megye();
    foreach($get_all_megye as $megye) {
    	$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
    	foreach($get_all_city_by_megye as $city) {
    		 echo '
    		 <url>
    
    		  <loc>https://www.cserepes-lemez.hu/szolgaltatasok/lemezteto-keszites/'.replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos_ex']).'/</loc>
    
    		  <priority>0.7</priority>
    
    		  <changefreq>monthly</changefreq>
    
    		</url>';
    	}
    }
	
	$get_all_megye = get_all_megye();
    foreach($get_all_megye as $megye) {
    	$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
    	foreach($get_all_city_by_megye as $city) {
    		 echo '
    		 <url>
    
    		  <loc>https://www.cserepes-lemez.hu/szolgaltatasok/lemezteto-felrakasa/'.replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos_ex']).'/</loc>
    
    		  <priority>0.7</priority>
    
    		  <changefreq>monthly</changefreq>
    
    		</url>';
    	}
    }
	
	$get_all_megye = get_all_megye();
    foreach($get_all_megye as $megye) {
    	$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
    	foreach($get_all_city_by_megye as $city) {
    		 echo '
    		 <url>
    
    		  <loc>https://www.cserepes-lemez.hu/szolgaltatasok/korcolt-lemezes-tetofedes/'.replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos_ex']).'/</loc>
    
    		  <priority>0.7</priority>
    
    		  <changefreq>monthly</changefreq>
    
    		</url>';
    	}
    }
	
	$get_all_megye = get_all_megye();
    foreach($get_all_megye as $megye) {
    	$get_all_city_by_megye = get_all_city_by_megye($megye['megye']);
    	foreach($get_all_city_by_megye as $city) {
    		 echo '
    		 <url>
    
    		  <loc>https://www.cserepes-lemez.hu/szolgaltatasok/trapezlemezes-tetofedes/'.replace_spec_chars($megye['megye']).'-megye/'.replace_spec_chars($city['varos_ex']).'/</loc>
    
    		  <priority>0.7</priority>
    
    		  <changefreq>monthly</changefreq>
    
    		</url>';
    	}
    }
    
    
    echo '</urlset>';
    
    ?>
