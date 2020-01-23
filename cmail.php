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
    const VERSION = "1.3.3";
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
		$lng = empty($lng) ? $this->yellow->text->get("language") : $lng;
		$subject = $subject ? $subject : $this->yellow->text->getText("cmail_std", $lng); 
		$link = $link ? $link : $subject;
		$title = $title ? $title : $subject;
		$lng = $lng ? $lng . "-" : "" ;
		$subject = rawurlencode($subject);
		$output = " <a class=\"cmail\" href=\"/" . $this->yellow->system->get("mediaDir")."cmail/". $lng . "reply.php?more=" . $subject;
		$output .= "\" title=\"" . $title . "\">";
		$output .= htmlspecialchars($link) . "</a> ";
        }
        return $output;
    }
}	
?>
