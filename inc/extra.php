<?php

// from xjuice7@gmail.com to = gmail.com

function domaine($email){

	$parts = explode('@',$email);

    $domaine = $parts[1];

    return $domaine;
}


// from xjuice7@gmail.com to = xjuice7


function user_bb($email){

	 $parts = explode('@',$email);

     $user = $parts[0];

     return $user;

}

// from xjuice7@gmail.com to = gmail


function ltd_($email){

	 $parts = explode('.',$email);

     $ltd = $parts[0];

     return $ltd;


}


function check_cnx($host,$port){
 
    $f = fsockopen($host, $port) ;

if ($f !== false) {
	
    $res = fread($f, 1024) ;

    if (strlen($res) > 0 && strpos($res, '220') === 0) {

       return "1" ;

    }

    else {

    	return '0';
        
    }
}

}