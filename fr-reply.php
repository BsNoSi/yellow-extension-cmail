<?php
// belongs to cmail extension version 1.3.1 for YELLOW, https://github.com/bsnosi/yellow-extension-cmail
// YELLOW Copyright ©2013-now Datenstrom, http://datenstrom.se
// This file may be used and distributed under the terms of the public license.
// ***************************************************************
// SEE README.MD FOR SETUP REQUIREMENTS
// ***************************************************************

	$mailadress = "adresse@domain.tld";
	$subject = "Envoyé par domain.tld: " . $_GET["more"];
	$body = "de l'adresse : " .$_SERVER['HTTP_REFERER'] ."\r\n\r\n";
	$body .= "Veuillez laisser sujet et \"de l'adresse\" (paramètres pour le filtre anti-spam),\r\nsinon votre message finira dans le dossier spam. Ce serait dommage.\r\n\r\nVotre demande :";

// nothing to do below

      $output = "Location: mailto:" . $mailadress;
	$output .= "?subject=" . rawurlencode($subject);
	$output .= "&body=". rawurlencode($body);
	header($output);
    exit;
?>