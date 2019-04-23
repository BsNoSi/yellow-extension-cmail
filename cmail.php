<?php
// cmail Plugin for YElLOW Copyright (c)2018 NoSi.de
// YELLOW Copyright (c) 2013-2017 Datenstrom, http://datenstrom.se
// This file may be used and distributed under the terms of the public license.
// ***************************************************************
// EDIT THE SETUP FOR E-MAIL IN EVERY TXT-FILE BELONGING TO CMAIL!
// ***************************************************************

class YellowCmail {
    const VERSION = "1.1.0";
    const TYPE = "feature";
    public $yellow;         //access to API

    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
	   
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="cmail") {
            list($subject, $m_link) = $this->yellow->toolbox->getTextArgs($text);
            $subject = $subject ? $subject : $yellow->page->base . $_SERVER['REQUEST_URI'];
			// modify to "mailto" compatible strings
			$r_in =  array("%",   "/n",  " ",   "/",   "!",   "#",   "*",   "<",   ">",   "?",   "&");
			$r_out = array("%25", "%0A", "%20", "%2F", "%21", "%23", "%2A", "%3C", "%3E", "%3F", "%26");
			
			$subject = str_replace($r_in,$r_out,$this->yellow->text->get("cmail_subtitle") ." ". $subject);
			$output = " <a href=mailto:" . $this->yellow->text->get("cmail_adress") . "?subject=" . $subject;
			$output .= "&body=Backlink:%20" . $this->yellow->text->get("cmail_site") . $yellow->page->base . $_SERVER['REQUEST_URI'];
			$output .= str_replace($r_in, $r_out,$this->yellow->text->getHtml("cmail_body")) . ">";
			$output .= htmlspecialchars($m_link ? : $this->yellow->text->getHtml("cmail_link")) . "</a> ";
        }
	
        return $output;
    }
   // Handle page extra data
    public function onParsePageExtra($page, $name) {
        return $this->onParseContentShortcut($page, $name, "", "block");
		
    }	
}
