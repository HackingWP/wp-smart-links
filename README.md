WP Smart Links
==============

Use smart linking in your posts to avoid 404s, ease your pain when changing hosts, etc.

## Installation

1. Download [zip](https://github.com/HackingWP/wp-smart-links/archive/master.zip) and upload to your `wp-content/plugins` or install via `wp-admin` Plugins interface;
1. Activate

## Docs

### Change permalinks returned via XHR when using post editor

Before using the plugin every post/page is linked as `http://your.domain.com/full/path/to/page-or-post`
which could cost you a visitor who followed a broken link. Without this plugin you would need to hand edit every post, even on other than your host to properly link to your new link or use [301](http://css-tricks.com/snippets/htaccess/301-redirects/) to permanently redirect any request to old URI.

This plugin replaces full links with universal links that always resolve to their full path:

- `/?p=123` for posts
- `/?page_id=123` for pages

### Images and media

Media links are stripped from the host which is not perfect but helps with moving WP site from one host to another at least. When moving the uploads folder or moving WP install to a subdirectory, SQL replace would be still required.

---

Enjoy!

[@martin_adamko](http://twitter.com/martin_adamko)
