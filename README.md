# Yellow Extension Cmail 

## ⚠ Changed behaviour of parameters! 

Read setup information carefully before update.

### V 1.3.0 (Requires YELLOW 0.8.4 or higher)

Creates a standardized email with reference to the page from which it was sent and hides the email address from email grabbers.

## The Idea Behind

Annoyed by the SPAM flood in your mailbox, you can use a special email address with keywords in the subject for filtering. Spammers can hardly take this into account, so it is easy to filter unwanted mail to this address. This extension sets the standard.

## How do I Install This?

1. Download and install [Datenstrom Yellow CMS](https://github.com/datenstrom/yellow/).
2. Download [Cmail extension](https://github.com/BsNoSi/yellow-extension-cmail/archive/master.zip ).  If you are using Safari, right click and select 'Download file as'.
3. Copy the `yellow-extension-cmail-master.zip` into the `system/plugins` folder.

To uninstall simply delete the [extension files](update.ini).

### Setup

You have to configure the plugin to your needs. After install open `{media-dir}/reply.php` and edit the header entries:

```php+HTML
$mailadress = "Insert target e-mail adress between the quotation marks";
$subject = "Insert the identifier for SPAM filterin between the quotation marks" . $_GET["more"];
$body = "from page: " .$_SERVER['HTTP_REFERER'] ."\n\n";
$body .= "Please leave subject and \"from address\" (parameters for spam filter), otherwise your message will end in the spam folder. That would be a pity. \n\n\Your request:";
```

- To achieve line feeds in the body area, type `\n`, if you need quotation marks type `\"` 
- Change the given texts according to your preferences, but only between the quotation marks.
- Depending to your needs set the parameters for different language files. If additional languages are needed, duplicate an existing file with respective extender for the new language and set it up.

> If you need only one language or have a preferred standard, you may remove the language selector from the file name. Then you can omit language identifier (see below).

## How do I use cmail extension?

Create a `[cmail  "subject" "linktext" "linktitle" "language"  ]` shortcut.

The following arguments are available

**subject**, *optional* (not really…)  : appended to the subject of the e-mail. If empty, the standard replacement `Send an e-mail!` is used.

**linktext**, *optional* :  The text holding the link shown on the page. If empty filled with subject.

**linktitle**, *optional* : The popup title of the link on hover. If empty filled with subject.

**language**, *optional* : Only needed in multilingual environments. Predefined identifiers are `en`,`de`,`fr` 

## Examples

Minimum: `[cmail]` leads to 

~~~.HTML
<a href="/media/reply.php?more=Send%20an%20e-mail%21" title="Send an e-mail!">Send an e-mail!</a>
~~~

Subject: `[cmail "Contact me"]` leads to

~~~.HTML
<a href="/media/reply.php?more=Contact%20me" title="Contact me">Contact me</a>
~~~

Complete standard: `[cmail "Order" "Place your order!" "Opens your e-mail client"]` leads to

~~~.HTML
<a href="/media/reply.php?more=Order" title="Opens your e-mail client">Place your order!</a>
~~~

Different language: [cmail "Bestellung" ""Senden Sie ihre Bestellung" "Öffnet Ihr E-Mail-Programm" de]

~~~.HTML
<a href="/media/de-reply.php?more=Bestellung" title="Öffnet Ihr E-Mail-Programm">Senden Sie ihre Bestellung</a>
~~~

The "complete standard" opens a prefilled e-mail in the standard e-mail client with this content:

```
to: 
mail@domain.tld
subject: 
preccessor subject additional subject
Body:
From page: https//:www.domain.tld/page_where_the_e-mail_was_sent_from 

Please leave subject and "From page" (parameters for spam filter), 
otherwise your message will end in the spam folder. That would be a pity. 

Your request:
```

### History

2019-04-24, v1.2: Initial Release, creating a readable »mailto« link.

2019-12-18, v.1.3: New strategy for hiding readable »mailto« link.

## Developer

[Norbert Simon](https://nosi.de)
