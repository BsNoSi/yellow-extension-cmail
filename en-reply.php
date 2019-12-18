<?php
// belongs to cmail extension for YELLOW, https://github.com/bsnosi/yellow-extension-cmail
// YELLOW Copyright ©2013-now Datenstrom, http://datenstrom.se
// This file may be used and distributed under the terms of the public license.
// ***************************************************************
// SEE README.MD FOR SETUP REQUIREMENTS
// ***************************************************************

	$mailadress = "addressee@domain.tld";
	$subject = "Sent from domain.tld: " . $_GET["more"];
	$body = "from address: " .$_SERVER['HTTP_REFERER'] ."\n\n";
	$body .= "Please leave subject and \"from address\" (parameters for spam filter),\notherwise your message will end in the spam folder. That would be a pity.\n\nYour Request:";

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