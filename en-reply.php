<?php
// belongs to cmail extension version 1.3.1 for YELLOW, https://github.com/bsnosi/yellow-extension-cmail
// YELLOW Copyright ©2013-now Datenstrom, http://datenstrom.se
// This file may be used and distributed under the terms of the public license.
// ***************************************************************
// SEE README.MD FOR SETUP REQUIREMENTS
// ***************************************************************

	$mailadress = "addressee@domain.tld";
	$subject = "Sent from domain.tld: " . $_GET["more"];
	$body = "from address: " .$_SERVER['HTTP_REFERER'] ."\r\n\r\n";
	$body .= "Please leave subject and \"from address\" (parameters for spam filter),\r\notherwise your message will end in the spam folder. That would be a pity.\r\n\r\nYour Request:";

// nothing to do below

      $output = "Location: mailto:" . $mailadress;
	$output .= "?subject=" . rawurlencode($subject);
	$output .= "&body=". rawurlencode($body);
      header($output);
    exit;
?>