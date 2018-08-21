<?php
// cmail Plugin for YElLOW 
// Copyright (c) 2018ff NoSi.de
// This file may be used and distributed under the terms of the MIT license.
// EDIT THE SETUP FOR E-MAIL!

class YellowCmail {
    const VERSION = "1.0";
    public $yellow;         //access to API

    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle page content parsing of custom block
    public function onParseContentBlock($page, $name, $text, $shortcut) {
        $output = null;
        if ($name=="cmail" && $shortcut) {
            list($subject, $m_link) = $this->yellow->toolbox->getTextArgs($text);
            if (empty($subject)) $subject = $_SERVER['REQUEST_URI'];	
			
// Setup for e-mail
			$m_adress = "mail@domain.tld";
			$m_site  = "https//:www.domain.tld";
			$m_subtitle = "preccessor subject: ";
			$m_body = " (Please do not remove)\n\nHello!\n\n[Your Text]";
			if (empty($m_link)) $m_link = "contact";
// End setup
 
      $subject = $m_subtitle . $subject;


			// modify to "mailto" compatible strings
			$r_in = array("%", "\n", " ", "/", "!", "#",  "*", "<", ">", "?", "&");
			$r_out = array("%25", "%0A", "%20", " %2F", "%21", "%23",  "%2A", "%3C", "%3E", "%3F", "%26");
			
			$subject = str_replace($r_in, $r_out, $subject);
			$m_body = str_replace($r_in, $r_out, $m_body);

			$output = " <a href=mailto:" . $m_adress . "?subject=" . $subject;
			$output .= "&body=Backlink:%20" . $m_site . $yellow->page->base . $_SERVER['REQUEST_URI'];
			$output .= $m_body . ">";
			$output .= htmlspecialchars($m_link) . "</a> ";
        }
        return $output;
    }

    // Handle page extra HTML data
    public function onExtra($name) {
        return $this->onParseContentBlock($this->yellow->page, $name, "", true);
    }
}

$yellow->plugins->register("cmail", "YellowCmail", YellowCmail::VERSION);