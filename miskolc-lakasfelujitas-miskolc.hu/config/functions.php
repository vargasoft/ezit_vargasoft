<?php

include "connect.php";

// Ellenőrizze, hogy a felhasználó által megadott IP-cím IPv4-e
function validateIPv4($ip) {
    return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
}

// Függvény az irányítószám és település név lekérésére adott IP-cím alapján
function getZipCodeAndCity($ip) {
    // Ellenőrizzük, hogy az IP-cím érvényes IPv4-es cím-e
    if (validateIPv4($ip)) {
        // Az API URL-je az adott IP-címhez tartozó információk lekéréséhez
        $api_url = "http://ip-api.com/json/{$ip}";

        // Lekérjük az API-tól az adatokat
        $json_response = file_get_contents($api_url);

        // Ellenőrizzük, hogy a válasz nem üres
        if (!empty($json_response)) {
            // JSON választ dekódoljuk asszociatív tömbbe
            $data = json_decode($json_response, true);

            // Ha van irányítószám és település neve az adatok között, visszaadjuk őket
            if (isset($data['zip']) && isset($data['city'])) {
                $zip_code = $data['zip'];
                $city_name = $data['city'];
                
                return array($zip_code, $city_name);
            } else {
                return array(null, null);
            }
        } else {
            return array(null, null);
        }
    } else {
        return array(null, null);
    }
}

function Qassim_Random_File($folder_path = null){
 
    if( !empty($folder_path) ){ // if the folder path is not empty
        $files_array = scandir($folder_path);
        $count = count($files_array);
 
        if( $count > 2 ){ // if has files in the folder
            $minus = $count - 1;
            $random = rand(2, $minus);
            $random_file = $files_array[$random]; // random file, result will be for example: image.png
            $file_link = $folder_path . "/" . $random_file; // file link, result will be for example: your-folder-path/image.png
            return '<a href="'.$file_link.'" target="_blank" title="'.$random_file.'"><img src="'.$file_link.'" alt="'.$random_file.'"></a>';
        }
 
        else{
            return "The folder is empty!";
        }
    }
 
    else{
        return "Please enter folder path!";
    }
 
}

function get_domain_base_infos($domain) {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `domains` WHERE `domain`='{$domain}'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_domain_detail_infos($domain, $site) {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `sites_config` WHERE `domain`='{$domain}' AND `site`='{$site}'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}


function getOS($user_agent = null)
{
    if(!isset($user_agent) && isset($_SERVER['HTTP_USER_AGENT'])) {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
    }

    // https://stackoverflow.com/questions/18070154/get-operating-system-info-with-php
    $os_array = [
        'windows nt 10'                              =>  'Windows 10',
        'windows nt 6.3'                             =>  'Windows 8.1',
        'windows nt 6.2'                             =>  'Windows 8',
        'windows nt 6.1|windows nt 7.0'              =>  'Windows 7',
        'windows nt 6.0'                             =>  'Windows Vista',
        'windows nt 5.2'                             =>  'Windows Server 2003/XP x64',
        'windows nt 5.1'                             =>  'Windows XP',
        'windows xp'                                 =>  'Windows XP',
        'windows nt 5.0|windows nt5.1|windows 2000'  =>  'Windows 2000',
        'windows me'                                 =>  'Windows ME',
        'windows nt 4.0|winnt4.0'                    =>  'Windows NT',
        'windows ce'                                 =>  'Windows CE',
        'windows 98|win98'                           =>  'Windows 98',
        'windows 95|win95'                           =>  'Windows 95',
        'win16'                                      =>  'Windows 3.11',
        'mac os x 10.1[^0-9]'                        =>  'Mac OS X Puma',
        'macintosh|mac os x'                         =>  'Mac OS X',
        'mac_powerpc'                                =>  'Mac OS 9',
        'linux'                                      =>  'Linux',
        'ubuntu'                                     =>  'Linux - Ubuntu',
        'iphone'                                     =>  'iPhone',
        'ipod'                                       =>  'iPod',
        'ipad'                                       =>  'iPad',
        'android'                                    =>  'Android',
        'blackberry'                                 =>  'BlackBerry',
        'webos'                                      =>  'Mobile',

        '(media center pc).([0-9]{1,2}\.[0-9]{1,2})'=>'Windows Media Center',
        '(win)([0-9]{1,2}\.[0-9x]{1,2})'=>'Windows',
        '(win)([0-9]{2})'=>'Windows',
        '(windows)([0-9x]{2})'=>'Windows',

        // Doesn't seem like these are necessary...not totally sure though..
        //'(winnt)([0-9]{1,2}\.[0-9]{1,2}){0,1}'=>'Windows NT',
        //'(windows nt)(([0-9]{1,2}\.[0-9]{1,2}){0,1})'=>'Windows NT', // fix by bg

        'Win 9x 4.90'=>'Windows ME',
        '(windows)([0-9]{1,2}\.[0-9]{1,2})'=>'Windows',
        'win32'=>'Windows',
        '(java)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,2})'=>'Java',
        '(Solaris)([0-9]{1,2}\.[0-9x]{1,2}){0,1}'=>'Solaris',
        'dos x86'=>'DOS',
        'Mac OS X'=>'Mac OS X',
        'Mac_PowerPC'=>'Macintosh PowerPC',
        '(mac|Macintosh)'=>'Mac OS',
        '(sunos)([0-9]{1,2}\.[0-9]{1,2}){0,1}'=>'SunOS',
        '(beos)([0-9]{1,2}\.[0-9]{1,2}){0,1}'=>'BeOS',
        '(risc os)([0-9]{1,2}\.[0-9]{1,2})'=>'RISC OS',
        'unix'=>'Unix',
        'os/2'=>'OS/2',
        'freebsd'=>'FreeBSD',
        'openbsd'=>'OpenBSD',
        'netbsd'=>'NetBSD',
        'irix'=>'IRIX',
        'plan9'=>'Plan9',
        'osf'=>'OSF',
        'aix'=>'AIX',
        'GNU Hurd'=>'GNU Hurd',
        '(fedora)'=>'Linux - Fedora',
        '(kubuntu)'=>'Linux - Kubuntu',
        '(ubuntu)'=>'Linux - Ubuntu',
        '(debian)'=>'Linux - Debian',
        '(CentOS)'=>'Linux - CentOS',
        '(Mandriva).([0-9]{1,3}(\.[0-9]{1,3})?(\.[0-9]{1,3})?)'=>'Linux - Mandriva',
        '(SUSE).([0-9]{1,3}(\.[0-9]{1,3})?(\.[0-9]{1,3})?)'=>'Linux - SUSE',
        '(Dropline)'=>'Linux - Slackware (Dropline GNOME)',
        '(ASPLinux)'=>'Linux - ASPLinux',
        '(Red Hat)'=>'Linux - Red Hat',
        // Loads of Linux machines will be detected as unix.
        // Actually, all of the linux machines I've checked have the 'X11' in the User Agent.
        //'X11'=>'Unix',
        '(linux)'=>'Linux',
        '(amigaos)([0-9]{1,2}\.[0-9]{1,2})'=>'AmigaOS',
        'amiga-aweb'=>'AmigaOS',
        'amiga'=>'Amiga',
        'AvantGo'=>'PalmOS',
        //'(Linux)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3}(rel\.[0-9]{1,2}){0,1}-([0-9]{1,2}) i([0-9]{1})86){1}'=>'Linux',
        //'(Linux)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3}(rel\.[0-9]{1,2}){0,1} i([0-9]{1}86)){1}'=>'Linux',
        //'(Linux)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3}(rel\.[0-9]{1,2}){0,1})'=>'Linux',
        '[0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3})'=>'Linux',
        '(webtv)/([0-9]{1,2}\.[0-9]{1,2})'=>'WebTV',
        'Dreamcast'=>'Dreamcast OS',
        'GetRight'=>'Windows',
        'go!zilla'=>'Windows',
        'gozilla'=>'Windows',
        'gulliver'=>'Windows',
        'ia archiver'=>'Windows',
        'NetPositive'=>'Windows',
        'mass downloader'=>'Windows',
        'microsoft'=>'Windows',
        'offline explorer'=>'Windows',
        'teleport'=>'Windows',
        'web downloader'=>'Windows',
        'webcapture'=>'Windows',
        'webcollage'=>'Windows',
        'webcopier'=>'Windows',
        'webstripper'=>'Windows',
        'webzip'=>'Windows',
        'wget'=>'Windows',
        'Java'=>'Unknown',
        'flashget'=>'Windows',

        // delete next line if the script show not the right OS
        //'(PHP)/([0-9]{1,2}.[0-9]{1,2})'=>'PHP',
        'MS FrontPage'=>'Windows',
        '(msproxy)/([0-9]{1,2}.[0-9]{1,2})'=>'Windows',
        '(msie)([0-9]{1,2}.[0-9]{1,2})'=>'Windows',
        'libwww-perl'=>'Unix',
        'UP.Browser'=>'Windows CE',
        'NetAnts'=>'Windows',
    ];

    // https://github.com/ahmad-sa3d/php-useragent/blob/master/core/user_agent.php
    $arch_regex = '/\b(x86_64|x86-64|Win64|WOW64|x64|ia64|amd64|ppc64|sparc64|IRIX64)\b/ix';
    $arch = preg_match($arch_regex, $user_agent) ? '64' : '32';

    foreach ($os_array as $regex => $value) {
        if (preg_match('{\b('.$regex.')\b}i', $user_agent)) {
            return $value.' x'.$arch;
        }
    }

    return 'Unknown';
}

function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}

function write_log() {
    // Ellenőrizzük, hogy a szükséges SESSION változók léteznek-e
    if(isset($_SESSION['full_url'], $_SESSION['ip'], $_SESSION['city_name'], $_SESSION['browser_name'], $_SESSION['os'])) {
        
        // Városok listája, amelyek esetén nem akarunk insert műveletet végezni
        $excluded_cities = array(
            "Nuremberg",
            "Cupertino",
            "Mountain View",
            "Englewood Cliffs",
            "Boydton",
            "Strasbourg",
            "Paterson",
            "Falkenstein",
            "Paris",
            "Berlin",
            "Ashburn",
            "Portland"
        );

        // Ha a város neve Budapest, akkor módosítjuk Miskolc-ra
        if ($_SESSION['city_name'] === "Budapest") {
            $_SESSION['city_name'] = "Miskolc";
        }

        // Ellenőrizzük, hogy a város nem szerepel-e a kizárt városok között
        if (!in_array($_SESSION['city_name'], $excluded_cities)) {

            // Kapcsolat beállítása az adatbázissal
            $conn = $GLOBALS['conn'];
            $conn->query("SET NAMES 'utf8'");
            
            // SQL Injection elleni védelem: prepared statement-ek használata
            $stmt = mysqli_prepare($conn, "INSERT INTO `visitors`(`site`, `ip`, `city`, `browser`, `os`) VALUES (?, ?, ?, ?, ?)");

            // Ellenőrizzük a prepared statement sikerességét
            if ($stmt) {
                // Bindelek paramétereket a prepared statement-hez és végrehajtjuk azt
                mysqli_stmt_bind_param($stmt, "sssss", $_SESSION['full_url'], $_SESSION['ip'], $_SESSION['city_name'], $_SESSION['browser_name'], $_SESSION['os']);
                $success = mysqli_stmt_execute($stmt);

                // Ellenőrizzük a végrehajtás sikerességét
                if($success) {
                    // Sikeres mentés
                    return true;
                } else {
                    // Sikertelen mentés
                    return false;
                }
            } else {
                // Prepared statement létrehozása sikertelen
                return false;
            }
        } else {
            // Kizárt város esetén nem hajtunk végre insert műveletet
            return false;
        }
    } else {
        // Hiányzó SESSION változók
        return false;
    }
}


function get_arak_simple() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT service, MIN(CAST(REPLACE(REPLACE(ar, '-tól', ''), '-', '') AS UNSIGNED)) AS min_ar FROM arak GROUP BY service ORDER BY min_ar ASC;"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_arak() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `arak`"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function replace_spec_chars($text) {
	$mit = array("á","é","í","ő","ö","ó","ü","ű","ú","Ö","Ü","Ó","Ő","Ú","É","Á","Ű"," ", ":");
	$mire = array("a","e","i","o","o","o","u","u","u","O","U","O","O","U","E","A","U","-", "");

	return str_replace($mit, $mire, $text);
}

function get_all_city_sitemap() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_city.cit_population>'5000'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_gyik() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `gyik` WHERE `status` = '1';"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_gyik_by_cat($cat) {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `gyik` WHERE `category`='".$cat."' AND `status` = '1';"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_services() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `services` WHERE `typ`='karpit' AND `status`='1' ORDER BY `service` ASC"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_service_by_link($link) {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `services` WHERE `link`='".$link."' "); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_service_by_id($id) {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `services` WHERE `id`='".$id."'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_projects_cat() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(project_cat) FROM `projects` WHERE project_status = 1 ORDER BY project_cat ASC;"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_projects_by_id($id) {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `projects` WHERE id = '".$id."' AND project_status = '1'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_projects_by_cat($cat) {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `projects` WHERE project_cat = '".$cat."' AND project_status = '1'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_projects() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `projects` WHERE project_status = 1 ORDER BY project_image DESC;"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_megye() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT `cty_name`, `cty_id` FROM `wsh_co_county`"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}




function get_all_varos_by_megye($megye) {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT `varos`, `varos_ex` FROM `telepulesek` WHERE `megye`= '".$megye."' ORDER BY `varos` ASC"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_varos_by_city_name($city) {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `telepulesek` WHERE `varos_ex`= '".$city."' LIMIT 0,1"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(`varos`) FROM `telepulesek` ORDER BY `varos` ASC"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_cityname_by_city($city) {
    $info = array();
    mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
    $query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT `varos_ex`, `varos` FROM `telepulesek` WHERE `varos_ex`='" . mysqli_real_escape_string($GLOBALS['conn'], $city) . "';");

    if ($query_result) {
        while ($row = mysqli_fetch_assoc($query_result)) {
            $info[] = $row;
        }
    }

    return $info;
}

function get_all_gallery3() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `gallery` ORDER BY RAND() LIMIT 3"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_gallery() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `munkaink` WHERE `domain`='palatetoszigetelese.hu'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_gallery_by_id($id) {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `munkaink` WHERE `id`='{$id}'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_blog() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `osziblog` WHERE `blog_status`='1' ORDER BY `blog_date` DESC"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}


function get_blog_by_id($blog_id) {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `osziblog` WHERE `id`='".$blog_id."';"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}



function get_all_city_bacs_limit() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `telepulesek`  WHERE `megye`='Bács-Kiskun' ORDER BY RAND() LIMIT 0,20"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_bacs() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Bács-Kiskun'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_by_megye_name($megye_name) {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='{$megye_name}' ORDER BY wsh_co_city.cit_population DESC"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_baranya() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Baranya'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_bekes() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Békés'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_bors() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Borsod-Abaúj-Zemplén'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_csongrad() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Csongrád'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_fejer() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Fejér'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_gyor() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Győr-Moson-Sopron'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_hajdu() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Hajdú-Bihar'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_heves() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Heves'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_jasz() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Jász-Nagykun-Szolnok'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_komarom() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Komárom-Esztergom'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_nograd() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Nógrád'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_pest() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Pest'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_somogy() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Somogy'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_szabolcs() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Szabolcs-Szatmár-Bereg'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_tolna() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Tolna'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_vas() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Vas'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_veszprem() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Veszprém'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_zala() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT DISTINCT(wsh_co_city.cit_name) as 'varos', wsh_co_county.cty_name FROM `wsh_co_city` INNER JOIN `wsh_co_county` ON (wsh_co_county.cty_code = wsh_co_city.cit_cty_code) WHERE wsh_co_county.cty_name='Zala'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_images_by_cat($cat) {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `images` WHERE `category` = '".$cat."' AND `status`='1'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_images() {
	$list = array();
	mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
	$query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `images` WHERE `status`='1'"); 
	if ($query_result) {
		while ($row=mysqli_fetch_assoc($query_result)) {
		array_push($list, $row);
		}
	}
	return $list;
}

function get_all_city_in_borsod() {
    $info = array();
    mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
    $query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `telepulesek` WHERE `megye_ex` in ('Borsod-Abauj-Zemplen', 'Szabolcs-Szatmar-Bereg', 'Hajdu-Bihar')ORDER BY `varos` ASC;");
    if ($query_result) {
        while ($row = mysqli_fetch_assoc($query_result)) {
            $info[] = $row;
        }
    }

    return $info;
}

function stat_daily_visitors() {
    $info = array();
    mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
    $query_result = mysqli_query($GLOBALS['conn'], "SELECT DATE(visitors.`date`) AS visit_date, COUNT(*) AS daily_visitors FROM visitors INNER JOIN telepulesek ON visitors.city = telepulesek.varos WHERE DATE(visitors.`date`) BETWEEN DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND CURDATE() GROUP BY visit_date ORDER BY visit_date DESC;");
    if ($query_result) {
        while ($row = mysqli_fetch_assoc($query_result)) {
            $info[] = $row;
        }
    }

    return $info;
}

function stat_group_today() {
    $info = array();
    mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
    $query_result = mysqli_query($GLOBALS['conn'], "SELECT DATE(visitors.`date`) AS date, visitors.`site`, COUNT(*) AS daily_visitors FROM visitors INNER JOIN telepulesek ON visitors.city = telepulesek.varos WHERE DATE(visitors.`date`) = CURDATE() GROUP BY visitors.`site` ORDER BY daily_visitors DESC;");
    if ($query_result) {
        while ($row = mysqli_fetch_assoc($query_result)) {
            $info[] = $row;
        }
    }

    return $info;
}
function stat_group_by_service() {
    $info = array();
    mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
    $query_result = mysqli_query($GLOBALS['conn'], "SELECT DATE(visitors.`date`) AS date, visitors.`site`, 
CASE
    WHEN visitors.`site` LIKE '%allergen-mentesites%' THEN 'Allergén-mentesítés'
    WHEN visitors.`site` LIKE '%autokarpit-tisztitas%' THEN 'Autókárpit tisztítás'
    WHEN visitors.`site` LIKE '%babakocsi-karpittisztitas%' THEN 'Babakocsi tisztítás'
    WHEN visitors.`site` LIKE '%butorkarpit-tisztitas%' THEN 'Bútorkárpit tisztítás'
    WHEN visitors.`site` LIKE '%parna-karpittisztitas%' THEN 'Díszpárna tisztítás'
    WHEN visitors.`site` LIKE '%fejtamla-karpittisztitas%' THEN 'Fejtámla tisztítás'
    WHEN visitors.`site` LIKE '%folteltavolitas%' THEN 'Folteltávolítás'
    WHEN visitors.`site` LIKE '%franciaagy-karpittisztitas%' THEN 'Franciágy tisztítás'
    WHEN visitors.`site` LIKE '%fuggonytisztitas%' THEN 'Függönytisztítás'
    WHEN visitors.`site` LIKE '%futoszonyeg-karpittisztitas%' THEN 'Futószőnyeg tisztítás'
    WHEN visitors.`site` LIKE '%gyerek-autos-ules-karpittisztitas%' THEN 'Gyerek autós ülés tisztítás'
	WHEN visitors.`site` LIKE '%irodai-szek-karpittisztitas%' THEN 'Irodai szék tisztítás'
	WHEN visitors.`site` LIKE '%kanape-karpittisztitas%' THEN 'Kanapé tisztítás'
	WHEN visitors.`site` LIKE '%konyhai-szek-karpittisztitas%' THEN 'Konyhaszék tisztítás'
	WHEN visitors.`site` LIKE '%matractisztitas%' THEN 'Matractisztítás'
	WHEN visitors.`site` LIKE '%puff-karpittisztitas%' THEN 'Puff tisztítás'
	WHEN visitors.`site` LIKE '%sarokulo-karpittisztitas%' THEN 'Sarokülő tisztítás'
	WHEN visitors.`site` LIKE '%szonyegtisztitas%' THEN 'Szőnyegtisztítás'
	WHEN visitors.`site` LIKE '%takaro-karpittisztitas%' THEN 'Takaró tisztítás'

    ELSE visitors.`site`
END AS service_name, 
COUNT(*) AS daily_visitors 
FROM visitors 
INNER JOIN telepulesek ON visitors.city = telepulesek.varos 
WHERE DATE(visitors.`date`) = CURDATE() 
AND visitors.`site` LIKE '%https://www.karpittisztitas-miskolc.hu/szolgaltatasok/%' 
GROUP BY service_name 
ORDER BY daily_visitors DESC;");
    if ($query_result) {
        while ($row = mysqli_fetch_assoc($query_result)) {
            $info[] = $row;
        }
    }

    return $info;
}

function stat_group_by_site() {
    $info = array();
    mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
    $query_result = mysqli_query($GLOBALS['conn'], "SELECT 
    DATE(visitors.`date`) AS date, 
    visitors.`site`, 
    CASE
        WHEN visitors.`site` = 'https://www.karpittisztitas-miskolc.hu/' THEN 'Kezdőoldal'
        WHEN visitors.`site` LIKE 'https://www.karpittisztitas-miskolc.hu/?%' THEN 'Kezdőoldal'
        WHEN visitors.`site` LIKE '%szolgaltatasok%' THEN 'Szolgáltatások'
        WHEN visitors.`site` LIKE '%munkaink%' THEN 'Munkáink'
        WHEN visitors.`site` LIKE '%karpittisztitas-arak%' THEN 'Árak'
        WHEN visitors.`site` LIKE '%kapcsolat%' THEN 'Kapcsolat'
        ELSE visitors.`site`
    END AS page_name, 
    COUNT(*) AS daily_visitors 
FROM 
    visitors 
INNER JOIN 
    telepulesek ON visitors.city = telepulesek.varos 
WHERE 
    DATE(visitors.`date`) = CURDATE() 
    AND visitors.`site` LIKE '%https://www.karpittisztitas-miskolc.hu/%' 
GROUP BY 
    page_name 
ORDER BY 
    daily_visitors DESC;");
    if ($query_result) {
        while ($row = mysqli_fetch_assoc($query_result)) {
            $info[] = $row;
        }
    }

    return $info;
}

function stat_count_fb() {
    $info = array();
    mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
    $query_result = mysqli_query($GLOBALS['conn'], "SELECT 
    DATE(visitors.`date`) AS visit_date, 
    COUNT(*) AS hirdetes 
FROM 
    visitors 
WHERE 
    DATE(visitors.`date`) BETWEEN DATE_SUB(CURDATE(), INTERVAL 9 DAY) AND CURDATE() 
    AND visitors.`site` LIKE '%fbclid%' 
GROUP BY 
    visit_date 
ORDER BY 
    visit_date DESC;");
    if ($query_result) {
        while ($row = mysqli_fetch_assoc($query_result)) {
            $info[] = $row;
        }
    }

    return $info;
}


function stat_count_arajanlat() {
    $info = array();
    mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
    $query_result = mysqli_query($GLOBALS['conn'], "SELECT 
    DATE(visitors.`date`) AS visit_date, 
    COUNT(*) AS hirdetes 
FROM 
    visitors 
WHERE 
    DATE(visitors.`date`) BETWEEN DATE_SUB(CURDATE(), INTERVAL 9 DAY) AND CURDATE() 
    AND visitors.`site` LIKE '%success%' 
GROUP BY 
    visit_date 
ORDER BY 
    visit_date DESC;");
    if ($query_result) {
        while ($row = mysqli_fetch_assoc($query_result)) {
            $info[] = $row;
        }
    }

    return $info;
}

function stat_count_hirdetes() {
    $info = array();
    mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
    $query_result = mysqli_query($GLOBALS['conn'], "SELECT 
    DATE(visitors.`date`) AS visit_date, 
    COUNT(*) AS hirdetes 
FROM 
    visitors 
WHERE 
    DATE(visitors.`date`) BETWEEN DATE_SUB(CURDATE(), INTERVAL 9 DAY) AND CURDATE() 
    AND visitors.`site` LIKE '%gad_source%' 
GROUP BY 
    visit_date 
ORDER BY 
    visit_date DESC;");
    if ($query_result) {
        while ($row = mysqli_fetch_assoc($query_result)) {
            $info[] = $row;
        }
    }

    return $info;
}

function stat_by_city() {
    $info = array();
    mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
    $query_result = mysqli_query($GLOBALS['conn'], "SELECT DATE(visitors.`date`) AS visit_date, telepulesek.`varos` AS city, COUNT(visitors.`city`) AS city_count FROM telepulesek INNER JOIN visitors ON telepulesek.`varos` = visitors.`city` WHERE DATE(visitors.`date`) BETWEEN DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND CURDATE() GROUP BY visit_date, telepulesek.`varos` ORDER BY visit_date DESC, city_count DESC;	");
    if ($query_result) {
        while ($row = mysqli_fetch_assoc($query_result)) {
            $info[] = $row;
        }
    }

    return $info;
}

function replaceemail($text) {-
    $ex = "/([a-zA-Z0-9._+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})/";
    preg_match_all($ex, $text, $url);
    foreach($url[0] as $k=>$v) $text = str_replace($url[0][$k], '<a href="mailto:'.$url[0][$k].'" target="_blank" rel="nofollow">'.$url[0][$k].'</a>', $text);
    return $text;
}

function print_elements(){
	echo '';
}

function print_h(){
	echo '';
	
	
}

function print_f(){
	echo '
	    ';
	
	
}

function get_arajanlat_details_by_id($id) {
    $info = array();
    mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
    $query_result = mysqli_query($GLOBALS['conn'], "SELECT * FROM `arajanlatkeresek` WHERE `id`='{$id}';");
    if ($query_result) {
        while ($row = mysqli_fetch_assoc($query_result)) {
            $info[] = $row;
        }
    }

    return $info;
}

function record_ajanlatkeres($conn, $offerid, $typ, $nev, $email, $telefonszam, $cim, $szolgaltatas, $message) {
    // Kapcsolat beállítása az adatbázissal
    $conn->query("SET NAMES 'utf8mb4'"); // Karakterkódolás beállítása

    // SQL Injection elleni védelem: prepared statement-ek használata
    $stmt = $conn->prepare("INSERT INTO arajanlatkeresek (offer_id, typ, nev, email, telefonszam, cim, szolgaltatas, uzenet) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Ellenőrizzük a prepared statement sikerességét
    if ($stmt) {
        // Paraméterek beállítása
        $typ = 'Árajánlatkérés';

        // Paraméterek kötése a prepared statement-hez
        $stmt->bind_param("ssssssss", $offerid, $typ, $nev, $email, $telefonszam, $cim, $szolgaltatas, $message);

        // Végrehajtjuk a prepared statement-et
        if ($stmt->execute()) {
           // echo "Sikeresen rögzítve az adatok.";
        } else {
           // echo "Hiba történt az adatok rögzítése közben: " . $stmt->error;
        }

        // Lezárjuk a prepared statement-et
        $stmt->close();
    } else {
       // echo "Hiba történt a prepared statement előkészítése közben: " . $conn->error;
    }
}

function record_visszahivas($conn, $nev, $telefonszam) {
    // Kapcsolat beállítása az adatbázissal
    $conn->query("SET NAMES 'utf8mb4'"); // Karakterkódolás beállítása

    // SQL Injection elleni védelem: prepared statement-ek használata
    $stmt = $conn->prepare("INSERT INTO arajanlatkeresek (typ, nev, telefonszam) VALUES (?, ?, ?)");

    // Ellenőrizzük a prepared statement sikerességét
    if ($stmt) {
        // Típus beállítása
        $typ = 'Visszahívási kérelem';

        // Paraméterek kötése a prepared statement-hez
        $stmt->bind_param("sss", $typ, $nev, $telefonszam);

        // Végrehajtjuk a prepared statement-et
        if ($stmt->execute()) {
           // echo "Sikeresen rögzítve az adatok.";
        } else {
           // echo "Hiba történt az adatok rögzítése közben: " . $stmt->error;
        }

        // Lezárjuk a prepared statement-et
        $stmt->close();
    } else {
       // echo "Hiba történt a prepared statement előkészítése közben: " . $conn->error;
    }
}

function updateArajanlatStatus($conn, $id, $executionDate, $status) {
    $conn->query("SET NAMES 'utf8mb4'"); // Karakterkódolás beállítása

    // Kapcsolat ellenőrzése
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query az adat frissítéséhez
    $status_check_sql = "SELECT status FROM arajanlatkeresek WHERE id = $id";
    $result = $conn->query($status_check_sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_status = $row["status"];
        
        // Ha a status már 2 vagy 0, ne végezzünk műveletet
        if ($current_status == 2 || $current_status == 0) {
            // Már elutasította a korábbi árajánlatot
            if ($current_status == 0) {
                $message = "Már elutasította a korábbi árajánlatot";
            } 
            // Már elfogadta az árajánlatot. Türelmét kérjük amíg kollégáink feldolgozzák kérését.
            else {
                $message = "Már elfogadta az árajánlatot. Türelmét kérjük amíg kollégáink feldolgozzák kérését.";
            }
            $_SESSION['message'] = $message;
        } else {
            // Ellenőrizze az executionDate értékét
            if (!empty($executionDate) && strtotime($executionDate) !== false) {
                // Query az adat frissítéséhez
                $sql = "UPDATE arajanlatkeresek SET status = $status, customer_date = '$executionDate' WHERE id = $id";
                if ($conn->query($sql) === TRUE) {
                    echo "Siker";
                } else {
                    echo "Hiba történt a frissítés közben: " . $conn->error;
                }
            } else {
                echo "Érvénytelen executionDate érték";
            }
        }
    } else {
        echo "Nincs ilyen id-jű rekord az adatbázisban";
    }

    // Kapcsolat bezárása
    $conn->close();
}



?>