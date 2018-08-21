# Yellow Plugin Cmail 

### V 1.0

Cmail creates a standard mail with backlink to the page from where it is opened.

## The Idea Behind

I neede a simple replacement for a contact form to avoid unencrypted transfer of data with a form.

## How do I Install This?

1. Download and install [Datenstrom Yellow CMS](https://github.com/datenstrom/yellow/).
2. Download [Cmail plugin](https://github.com/BsNoSi/yellow-plugin-cmail/archive/master.zip ).  If you are using Safari, right click and select 'Download file as'.
3. Copy the `yellow-plugin-cmail-master.zip` into the `system/plugins` folder.
 
To uninstall simply delete the [plugin files](update.ini).

**Note**: It may be more comfortable to unzip `cmail.php` locally for configuration (s. "Setup") and copy it then manually into the`system/plugins` folder.

### Setup

You have to configure the plugin to your needs. Search in the plugin for this part and fill in your data.

```
// Setup for e-mail
			$m_adress = "mail@sit.tld";
			$m_site  = "https//:www.domain.tld";
			$m_subtitle = "Startertext Subject: ";
			$m_body = " (Please do not remove)\n\nHello!\n\n[Your Text]";
			if (empty($m_link)) $m_link = "contact";
// End setup
```

**Note:** Where necessary the encoding is translated to *mailto*-specific values. `\n` is translated to a line-feed.


## How do I use cmail plugin?

Creata a `[cmail  "subject" "linktext"]` shortcut.

The following arguments are available

**subject** Is the text *appended* to the `m_subtitle` text.

**linktext** is optional, if missing the `m_link` content is used.

## Example

Based on the data above:

```

[cmail "Sample Text"]

```

results in this html code: 

```
<a href=mailto:mail@domain.tld?subject=preccessor%20subject:%20Sample%20Text&body=Backlink:%20https//:www.domain.tld/edit/%20(Please%20do%20not%20remove)%0A%0AHello%21%0A%0A[Your%20Text]>contact</a>
```

This opens a new prefilled e-mail from the homepage with this content:

```
to: mail@domain.tld
subject: preccessor subject: Sample Text
Body:

Backlink: https//:www.domain.tld/ (Please do not remove)

Hello!

[Your Text]

```


## Developer

[Norbert Simon](https://nosi.de)
