<?php
// belongs to cmail extension for YELLOW, https://github.com/bsnosi/yellow-extension-cmail
// YELLOW Copyright ©2013-now Datenstrom, http://datenstrom.se
// This file may be used and distributed under the terms of the public license.
// ***************************************************************
// SEE README.MD FOR SETUP REQUIREMENTS
// ***************************************************************

	$mailadress = "name@domain.tld";
	$subject = "Kontaktaufnahme domain.tld: " . $_GET["more"];
	$body = "von Adresse: " .$_SERVER['HTTP_REFERER'] ."\n\n";
	$body .= "Bitte Betreff und „von Adresse“ stehen lassen (Parameter für Spam-Filter),\nsonst endet Ihre Nachricht im Spam-Ordner. Das wäre sehr schade.\n\nIhre Anfrage:";

// nothing to do below

	$r_in =  array("%",   "\n",  " ",   "/",   "!",   "#",   "*",   "<",   ">",   "?",   "&");
	$r_out = array("%25", "%0A", "%20", "%2F", "%21", "%23", "%2A", "%3C", "%3E", "%3F", "%26");

      $output = "Location: mailto:" . $mailadress;
	$output .= "?subject=" . str_replace($r_in,$r_out,$subject);
	$output .= "&body=". str_replace($r_in,$r_out,$body);
	
	echo $output;

    header($output);
    exit;
?>