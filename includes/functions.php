<?php
    /*Function to check the EXACT BROWSER by checking for the platform, then checking possible user agents.
    The version number of the browser is matched exactly */

     function getBrowser()
    { 
        $u_agent = $_SERVER['HTTP_USER_AGENT'];

        //Initialising the browsername and platform name as 'Unknown' 
        $bname = 'Unknown'; 
        $platform = 'Unknown';

        //Initialising the version number with nothing
        $version= "";

        //First get the platforms out of Linux, Macintosh or Windows
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        }

        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }

        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }
        
        // Get the name of the useragent seperately
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) { 
            $bname = 'Internet Explorer'; 
            $ub = "MSIE"; 
        }

        elseif(preg_match('/Firefox/i',$u_agent)) { 
            $bname = 'Mozilla Firefox'; 
            $ub = "Firefox"; 
        }

        elseif(preg_match('/Chrome/i',$u_agent)) { 
            $bname = 'Google Chrome'; 
            $ub = "Chrome"; 
        } 

        elseif(preg_match('/Safari/i',$u_agent)) { 
            $bname = 'Apple Safari'; 
            $ub = "Safari"; 
        } 

        elseif(preg_match('/Opera/i',$u_agent)) { 
            $bname = 'Opera'; 
            $ub = "Opera"; 
        } 

        elseif(preg_match('/Netscape/i',$u_agent)) { 
            $bname = 'Netscape'; 
            $ub = "Netscape"; 
        } 
        
        // Finally obtain correct version number by regular expression
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        
        // We have no matching number just continue
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            
        }
        
        // Checking how many matches we have 
        $i = count($matches['browser']);

        if ($i != 1) {
            //Checking if version is before or after the name
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
        
        // Checking if we have a number
        if ( $version==null || $version=="") {
                $version="?";
        }
        
        return array(
            'userAgent' => $u_agent,
            'name'      => $bname,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'   => $pattern
        );
    } 

    // Finally trying 
    $ua = getBrowser();
    $browser =  $ua['name'];

    function page_title($page_title) {
             return $page_title; 
    }
?>