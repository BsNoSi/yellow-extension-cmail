<?php
// cmail extension for YELLOW, https://github.com/bsnosi/yellow-extension-cmail
// Copyright ©2018-now Norbert Simon, https://nosi.de for
// YELLOW Copyright ©2013-now Datenstrom, http://datenstrom.se
// This file may be used and distributed under the terms of the public license.
// requires YELLOW 0.8.4 or higher
// ***************************************************************
// SEE README.MD FOR SETUP REQUIREMENTS
// ***************************************************************

class YellowCmail {
    const VERSION = "1.3.0";
    const TYPE = "feature";
    //access to API
    public $yellow;         
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="cmail") {
            list($subject, $link, $title, $lng) = $this->yellow->toolbox->getTextArgs($text);
            $subject = $subject ? $subject : "Send an e-mail!";
		$link = $link ? $link : $subject;
		$title = $title ? $title : $subject;
		$lng = $lng ? $lng . "-" : "" ;
		$r_in =  array("%",   "/n",  " ",   "/",   "!",   "#",   "*",   "<",   ">",   "?",   "&");
		$r_out = array("%25", "%0A", "%20", "%2F", "%21", "%23", "%2A", "%3C", "%3E", "%3F", "%26");
				
		$subject = str_replace($r_in,$r_out,$subject);
		$output = " <a href=\"/" . $this->yellow->system->get("mediaDir"). $lng . "reply.php?more=" . $subject;
		$output .= "\" title=\"" . $title . "\">";
		$output .= htmlspecialchars($link) . "</a> ";
        }
        return $output;
    }
}	
?>