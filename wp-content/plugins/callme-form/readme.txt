=== Call.me form ===
Contributors: sadovnikov
Tags: contact form, ajax, contacts, widget, shortcode
Requires at least: 3.0
Tested up to: 3.0
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A very simple plugin which allows users to leave their phone numbers so that you could call tham back later

== Description ==

This plugin contains a form where users can leave their telephone whether they want you to call them back. This plugin could be useful for e-commerce. A form can be added through widget or through shortcode [callme]
As anyone uses the form you will be notified by email, which looks like:

>New call order  

>Telephone: +12345678909  

>Name: Serge  

>Suitable time: not specified  

>The request was sent from Product page: My Woo Product ( url: http://example.com/?id=3 )  


The plugin is customable: you can change form labels, turn off some form inputs, change an email which is used for notifying or turn of styling and apply your own styles.
 

== Installation ==


1. Upload the ZIP content to `/wp-content/plugins/` directory or install plugin using dashboard
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add a Call.me widget to your theme sidebar in Appearance -> Widgets menu or create a custom page and place a shotcode [callme] there


== Screenshots ==

1. The widget
2. Plugin settings page
3. Using shortcode to display form on a custom page

== Changelog ==

= 1.1 =
* Added AJAX
* Notification now contains a name and url of the page which the request was sent from
* Fixed some issues

= 1.0 =
initial release


== Upgrade Notice ==
= 1.1 =
Fixed some issues, added AJAX. Sending a page name and url which the request was sent from
