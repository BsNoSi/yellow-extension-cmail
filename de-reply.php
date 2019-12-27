<?php
// belongs to cmail extension version 1.3.1 for YELLOW, https://github.com/bsnosi/yellow-extension-cmail
// YELLOW Copyright ©2013-now Datenstrom, http://datenstrom.se
// This file may be used and distributed under the terms of the public license.
// ***************************************************************
// SEE README.MD FOR SETUP REQUIREMENTS
// ***************************************************************

	$mailadress = "name@domain.tld";
	$subject = "Kontaktaufnahme domain.tld: " . $_GET["more"];
	$body = "von Adresse: " .$_SERVER['HTTP_REFERER'] ."\r\n\r\n";
	$body .= "Bitte Betreff und „von Adresse“ stehen lassen (Parameter für Spam-Filter),\r\nsonst endet Ihre Nachricht im Spam-Ordner. Das wäre sehr schade.\r\n\r\nIhre Anfrage:";

// nothing to do below

      $output = "Location: mailto:" . $mailadress;
	$output .= "?subject=" . rawurlencode($subject);
	$output .= "&body=". rawurlencode($body);
	 header($output);
    exit;
?>