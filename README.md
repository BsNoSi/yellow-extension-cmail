# Yellow Extension Cmail 

### V 1.2.0

Cmail creates a standard e-mail with backlink to the page from where it is opened.

## The Idea Behind

I needed a simple replacement for a contact form to avoid unencrypted transfer of data with a form.

## How do I Install This?

1. Download and install [Datenstrom Yellow CMS](https://github.com/datenstrom/yellow/).
2. Download [Cmail extension](https://github.com/BsNoSi/yellow-extension-cmail/archive/master.zip ).  If you are using Safari, right click and select 'Download file as'.
3. Copy the `yellow-extension-cmail-master.zip` into the `system/plugins` folder.
 
To uninstall simply delete the [extension files](update.ini).

**Note**: It may be more comfortable to unzip the translation/configuration fies locally for configuration (s. "Setup") and copy it then manually into the`system/extensions` folder.

### Setup

You have to configure the plugin to your needs. Open EACH translation file belonging to cmail and configure at least the `cmail_adress`, `cmail_site`, the others optional to your needs.

```
cmail_adress: The destination adress (name@domain.tld)
cmail_site: The current site root (https://www.domain.tld)
cmail_subtitle: A precessor for the subject (Mail from domain.tld:)
cmail_body: /nLeave this link as information in the text, please!/n/nYour request:
cmai_link: Inquiry by e-mail

```

**Notes:** 

- Where necessary the encoding is translated to *mailto*-specific values. `/n` is translated to a line-feed.
- The `m_subtilte` can be used for filtering mails to dedicated folders in your e-mail client.
- `m_body` is directly appended to the backlink which is the first entry of the e-mail body.
- You may use a dedicated e-mail adress for these contacts and if the `m_subtitle` part is missing it is a good indicator for a grabbed e-mail sent by a spammer.
- You may configure different targets depending to the required language.
- Missing languages can be created by adding a file with compatible content and repective language extention (e.e. "fr" for French)

## How do I use cmail plugin?

Create a `[cmail  "subject" "linktext"]` shortcut.

The following arguments are available

**subject** optionally *appended* to the `cmail_subtitle` text. If empty the current page is appended. 

**linktext** is optional, if missing the `cmail_link` text is used.

## Examples

Minimum: `[cmail]`

Using all options: `[cmail "Sample Text" "Text for Link"]`

The last exapmle results in this HTML code:

```
<a href=mailto:pages@nosi.de?subject=Buoa.de:%20Sample%20Text&body=Backlink:%20https://buoa.de/edit/%0ALeave%20this%20link%20as%20information%20in%20the%20text,%20please%21%0A%0AYour%20request:>Text for Link</a>
```

The last example opens a new prefilled e-mail from the homepage with this content:

```
to: mail@domain.tld
subject: preccessor subject: Sample Text
Body:

Backlink: https//:www.domain.tld/ 
Leave this link as information in the text, please!

Your Request:
```

## Developer

[Norbert Simon](https://nosi.de)
