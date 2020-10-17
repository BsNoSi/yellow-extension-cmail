# Yellow Extension Cmail 

Version 1.6.1

> Tested with core version 0.8.23

## Application

Creates a standardized email with reference to the page from which it was sent and hides the email address from email grabbers.

**Read setup information carefully before install/update.**

## Install

1. Download and install [Datenstrom Yellow CMS](https://github.com/datenstrom/yellow/).
2. Download [Cmail extension](https://github.com/BsNoSi/yellow-extension-cmail/archive/master.zip ).  If you are using Safari, right click and select 'Download file as'.
3. Copy the `yellow-extension-cmail-master.zip` into the `system/plugins` folder.

To uninstall simply delete the [extension files](extension.ini).

### Cleanup older versions

Previous versions installed »cmail…«-files into "media" folder. These files are obsolete. Please delete them.

## Setup

Annoyed by the SPAM flood in your mailbox, you can use a special email address with keywords in the subject for filtering your mailbox. Spammers can hardly take this into account, so it is easy to filter unwanted mail to this address. This extension sets the adjustable standard.

You have to configure the extension to your needs. After install open the `system/extensions/cmail.txt` files and edit all entries with »domain.tld« (placeholder for your website / e-mail adress).

You may alter the texts to your needs. Linefeeds in e-mail text are created with »\n«. For text of the information page you have to use `<br/>`. You have to place the whole text in one line.

Note: Linefeeds in e-mail body  may be ignored  by some e-mail clients using only plain text.


## Usage

You can simply put »[cmail]« into your text to create a standard text and e-mail data. For more sophisticated use, you can add *optional* parameters:

`[cmail  "subject" "linktext" "linktitle" "language"  ]`

| Parameter | Function |
| :---: | :--- |
| subject | Content is appended to the preset subject title of the e-mail which is used always.You can change this entry of `cmail.txt` to your needs. |
| linktext | The *link text* shown on the page. If empty filled with `subject`. |
| linktitle | The popup title of the link on hover. If empty filled with `subject`. |
| language | If empty the preset language of `system.ini`is used. You can force a language by using the available identifiers `en`,`de`,`fr` (and more, if you add them) from `cmail.txt`. |

The generated output is enclosed by a class `cmail`. If you want to mark e-mail links, add a style `.cmail` to your stylesheet, possibly something like this:

~~~.css
.cmail:before {content: "\002709\00202F"; color:#FF6633;}
~~~

This would display e-mail links like this  »[<span style="color:#FF6633">&#x2709;&#x202F;</span>The Link-text](#_)« : A linked text precceeded by an envelope symbol.

This link creates a standardised e-mail that is opened in the standard e-mail client with this content:

```
to: 
mail@domain.tld
subject: 
preccessor subject additional subject
Body:
From page: https//:www.domain.tld/page_where_the_e-mail_was_sent_from 

Please leave the subject and "from page": Your enquiry will reliably slip through the spam filter.

Your enquiry:
```

Additionally, there is a page opened with a description what (should) happen now and why. The used e-mail address is completely hidden because it is opened directly without revealing it anywhere in page sources that might be scanned by e-mail grabbers.

### History

2020-10-17: API changes applied, translations again collected in single file (current standard).

2020-10-13, v.1.6.0: Simplification of language handling. Opens an information page now to give feedback for things happening. 

2020-01-25, v.1.5.0: Redesign of concept. Now aligns to YELLOW CMS strategy without additional php files.

2020-01-23, v 1.3.3: Subfolder in »media« for cmail php files

2019-12-29, v 1.3.2: Class added

2019-12-27, v 1.3.1: Standardised parameter encoding, shown standard text and used reply defined by website language (default) or given language identifier.

2019-12-18, v.1.3: New strategy for hiding readable »mailto« link by using header-location.

2019-04-24, v1.2: Initial Release, creating a readable »mailto« link.

## Developer

[Norbert Simon](https://nosi.de)
