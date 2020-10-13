# Yellow Extension Cmail 

Read setup information carefully before install/update.

### V 1.6.0

> Tested with Yellow 0.815

Creates a standardized email with reference to the page from which it was sent and hides the email address from email grabbers.

## The Idea Behind

Annoyed by the SPAM flood in your mailbox, you can use a special email address with keywords in the subject for filtering. Spammers can hardly take this into account, so it is easy to filter unwanted mail to this address. This extension sets the (adjustable) standard.

## Install

1. Download and install [Datenstrom Yellow CMS](https://github.com/datenstrom/yellow/).
2. Download [Cmail extension](https://github.com/BsNoSi/yellow-extension-cmail/archive/master.zip ).  If you are using Safari, right click and select 'Download file as'.
3. Copy the `yellow-extension-cmail-master.zip` into the `system/plugins` folder.

To uninstall simply delete the [extension files](extension.ini).

### Cleanup older versions

1. Previous versions installed »cmail…«-files into "media" folder. These files are obsolete. Please delete them.
2. Previous versions installed the translation in a single "cmail.txt" file. Please detlet it.

## Setup

You have to configure the plugin to your needs. After install open the `system/extensions/cmail-[lng].txt` files and edit the entries with »domain.tld« as placeholder for your website / e-mail adress.

You may alter the texts to your needs. Linefeeds in e-mail text are created with »\n«. For text of the information page you may use `<br/>`.

Note: Linefeeds in body  may be removed  by some e-mail clients using only plain text.

Delete unnecessary languages or add required by copying/translating an existing language block and setting the respective language identifier.


## Usage

You can simply put »[cmail]« into your text to create a standard text and e-mail data. For more sophisticated use, you can add *optional* parameters:

`[cmail  "subject" "linktext" "linktitle" "language"  ]`

**subject**: appended to the subject title of the e-mail. If empty, the given standard from `cmail.txt` is used. You can change this entry to your needs.

**linktext**:  The *link text* shown on the page. If empty filled with subject.

**linktitle**: The popup title of the link on hover. If empty filled with subject.

**language**: Only needed to force a specific language. Available identifiers are `en`,`de`,`fr`.  If additional languages are needed, add suitable translation files. 

**Anyway you need a translation appropriate to the language setup in `system.ini` of Datenstrom Yellow.** 

> The defined language of `system.ini` is used by default.

To highlight e-mail links, add a style `.cmail` to your stylesheet, possibly something like this:

~~~.css
.cmail:before {content: "\002709\00202F"; color:#FF6633;}
~~~

This would display e-mail links like this  »[<span style="color:#FF6633">&#x2709;&#x202F;</span>The Link-text](#_)«. (should have a leading envelope symbol)

## Result

The "complete standard" opens a prefilled e-mail in the standard e-mail client with this content:

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

### History

2020-10-13, v.1.6.0: Simplification of language handling. Opens an information page now to give feedback for things happening. 

2020-01-25, v.1.5.0: Redesign of concept. Now aligns to YELLOW CMS strategy without additional php files.

2020-01-23, v 1.3.3: Subfolder in »media« for cmail php files

2019-12-29, v 1.3.2: Class added

2019-12-27, v 1.3.1: Standardised parameter encoding, shown standard text and used reply defined by website language (default) or given language identifier.

2019-12-18, v.1.3: New strategy for hiding readable »mailto« link by using header-location.

2019-04-24, v1.2: Initial Release, creating a readable »mailto« link.

## Developer

[Norbert Simon](https://nosi.de)
