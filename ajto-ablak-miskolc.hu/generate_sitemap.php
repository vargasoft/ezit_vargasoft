<?php
include('config/connect.php');
require_once('config/functions.php');
$server = 'https://www.miskolc-ablak.hu/';
$get_1_3_blog = get_1_3_blog();
$get_all_city = get_all_city_in_borsod();
 echo '

<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

<url>
  <loc>https://www.miskolc-ablak.hu/</loc>
  <lastmod>2024-01-23T18:53:01+00:00</lastmod>
  <priority>1.00</priority>
</url>
<url>
  <loc>https://www.miskolc-ablak.hu/munkaink/</loc>
  <lastmod>2024-01-23T18:53:01+00:00</lastmod>
  <priority>0.9</priority>
</url>
<url>
  <loc>https://www.miskolc-ablak.hu/blog-bejegyzesek/</loc>
  <lastmod>2024-01-23T18:53:01+00:00</lastmod>
  <priority>0.9</priority>
</url>
<url>
  <loc>https://www.miskolc-ablak.hu/kapcsolat/</loc>
  <lastmod>2024-01-23T18:53:01+00:00</lastmod>
  <priority>0.9</priority>
</url>
<url>
  <loc>https://www.miskolc-ablak.hu/szolgaltatasok/1/muanyag-ablak-beepites/</loc>
  <lastmod>2024-01-23T18:53:01+00:00</lastmod>
  <priority>0.9</priority>
</url>
<url>
  <loc>https://www.miskolc-ablak.hu/szolgaltatasok/1/miskolc-muanyag-ablak-beepites/</loc>
  <lastmod>2024-01-23T18:53:01+00:00</lastmod>
  <priority>0.9</priority>
</url>
<url>
  <loc>https://www.miskolc-ablak.hu/szolgaltatasok/2/bejarati-ajto-beepites/</loc>
  <lastmod>2024-01-23T18:53:01+00:00</lastmod>
  <priority>0.9</priority>
</url>
<url>
  <loc>https://www.miskolc-ablak.hu/szolgaltatasok/3/belteri-ajto-beepites/</loc>
  <lastmod>2024-01-23T18:53:01+00:00</lastmod>
  <priority>0.9</priority>
</url>
<url>
  <loc>https://www.miskolc-ablak.hu/szolgaltatasok/4/redony-beepites/</loc>
  <lastmod>2024-01-23T18:53:01+00:00</lastmod>
  <priority>0.9</priority>
</url>
<url>
  <loc>https://www.miskolc-ablak.hu/szolgaltatasok/5/szunyoghalo-beepites/</loc>
  <lastmod>2024-01-23T18:53:01+00:00</lastmod>
  <priority>0.9</priority>
</url>
<url>
  <loc>https://www.miskolc-ablak.hu/szolgaltatasok/6/erkely-felujitas/</loc>
  <lastmod>2024-01-23T18:53:01+00:00</lastmod>
  <priority>0.9</priority>
</url>
<url>
  <loc>https://www.miskolc-ablak.hu/szolgaltatasok/7/pergola-epites/</loc>
  <lastmod>2024-01-23T18:53:01+00:00</lastmod>
  <priority>0.9</priority>
</url>
'; 
foreach($get_1_3_blog as $blog){
	echo '
  <url>
    <loc>https://www.miskolc-ablak.hu/blog-bejegyzesek/'.$blog['id'].'/'.urlencode($blog['blog_title']).'</loc>
    <lastmod>'.$blog['blog_date'].'</lastmod>
    <priority>0.80</priority>
  </url>
';
}

foreach($get_all_city as $city){
	echo '
  <url>
    <loc>https://www.miskolc-ablak.hu/szolgaltatasok/1/muanyag-ablak-beepites/'.$city['varos_ex'].'/</loc>
    <lastmod>2024-04-11T18:53:01+00:00</lastmod>
    <priority>0.80</priority>
  </url>
';
}

foreach($get_all_city as $city){
	echo '
  <url>
    <loc>https://www.miskolc-ablak.hu/szolgaltatasok/2/bejarati-ajto-beepites/'.$city['varos_ex'].'/</loc>
    <lastmod>2024-04-11T18:53:01+00:00</lastmod>
    <priority>0.80</priority>
  </url>
';
}

foreach($get_all_city as $city){
	echo '
  <url>
    <loc>https://www.miskolc-ablak.hu/szolgaltatasok/3/belteri-ajto-beepites/'.$city['varos_ex'].'/</loc>
    <lastmod>2024-04-11T18:53:01+00:00</lastmod>
    <priority>0.80</priority>
  </url>
';
}

foreach($get_all_city as $city){
	echo '
  <url>
    <loc>https://www.miskolc-ablak.hu/szolgaltatasok/4/redony-beepites/'.$city['varos_ex'].'/</loc>
    <lastmod>2024-04-11T18:53:01+00:00</lastmod>
    <priority>0.80</priority>
  </url>
';
}

foreach($get_all_city as $city){
	echo '
  <url>
    <loc>https://www.miskolc-ablak.hu/szolgaltatasok/5/szunyoghalo-beepites/'.$city['varos_ex'].'/</loc>
    <lastmod>2024-04-11T18:53:01+00:00</lastmod>
    <priority>0.80</priority>
  </url>
';
}

foreach($get_all_city as $city){
	echo '
  <url>
    <loc>https://www.miskolc-ablak.hu/szolgaltatasok/6/erkely-felujitas/'.$city['varos_ex'].'/</loc>
    <lastmod>2024-04-11T18:53:01+00:00</lastmod>
    <priority>0.80</priority>
  </url>
';
}

foreach($get_all_city as $city){
	echo '
  <url>
    <loc>https://www.miskolc-ablak.hu/szolgaltatasok/7/pergola-epites/'.$city['varos_ex'].'/</loc>
    <lastmod>2024-04-11T18:53:01+00:00</lastmod>
    <priority>0.80</priority>
  </url>
';
}



echo '

</urlset>';

?>