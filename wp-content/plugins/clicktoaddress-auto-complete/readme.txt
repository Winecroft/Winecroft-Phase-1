=== ClickToAddress Auto-Complete ===
Contributors: craftyclicks
Donate link: https://craftyclicks.co.uk/
Tags: address, addresses, autocomplete, checkout, data, fill, find, finder, form, global, lookup, postcode, search, uk, validation, verification, woocommerce
Requires at least: 4.6
Tested up to: 4.7.2
Stable tag: 1.1.5
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This plugin adds global address auto-complete functionality to the address forms on the front-end in WooCommerce.

== Description ==

This plugin provides address auto-complete functionality on address forms on the front-end in WooCommerce.

It provides international data for 240+ countries.

The checkout experience becomes faster and easier as a customer no longer has to type out their full address. The smart predictive search helps speed up form filling and boosts usability. Every address is verified at the point of entry. Problems due to incorrect or badly typed address data are drastically reduced.

= Customer Satisfaction & Conversions =
Easier and faster checkout saves your customers' time, improves conversions and builds loyalty.

= Data Quality =
User input is validated in real time and your customer database is populated with fully verified addresses. Fewer missed deliveries.

= Getting Started =
In order to use this service, you will need to sign up for an account. You will then receive an access token which will give you access to our service. You need to insert this access token in the configuration options. We offer 30 free searches for testing purposes, but in order to use this plugin on a live site, you must have a paid account with us.

= Automatic Updates =
Our service is split into 3 parts:

1. API server that delivers the data
2. a JS library that can retrieve the data, and generate a basic UI, regardless of platform
3. a WooCommerce specific JS file. (located in clicktoaddress-auto-complete/js)

The JS library is located on our CDN to make sure that you will automatically receive any updates. If there's an update to the API and changes to the JS library are required in order for the plugin to function correctly, you will not have to worry about updating it yourself.

== Installation ==

1. Unpack the zip file and copy the clicktoaddress-auto-complete folder to your WordPress installation’s wp-content/plugins folder.
2. On the admin panel, go to Plugins / Installed Plugins, and activate the ClickToAddress Auto-Complete Integration.
3. From the admin panel, go to WooCommerce / Settings / Integration and click on the ClickToAddress Auto-Complete tab. Here you can insert your access token, which is needed to use this plugin on a live site. To get an access token, you will need to sign up for an account with us, and we will email you an access token. On this page you will also find configuration options, which are explained below in the Configuration section. When you have finished, click 'Save changes'.
4. You can test the plugin without an access token using our free test postcodes: AA11AA, AA11AB, AA11AD and AA11AE. If all is OK so far and you haven't got an account with us yet, register at www.craftyclicks.co.uk. You will get an email with your access token. Remember that you need a paid up account to go live on a public facing website (the trial only gives you up to 30 clicks of live address searches).
5. (optional) Any suggestions for improvements to the module? Let us know at support@craftyclicks.co.uk.

== Configuration ==

* Search Layout: You can change whether the search interface is displayed below the search field or surrounds the search field.
* Hide Address Fields: There is an option to hide address fields until a search result is selected. This means that a customer has to use the address search box to enter an address and the accuracy of addresses that are captured is improved.

== Frequently Asked Questions ==

= Do you offer support? =
Yes, we do offer support during normal business hours. If you run into any issues, let us know and we will be happy help.

= Is this really completely free? =
The extension is free to download and try, but to use it on a live site you will need a paid account with us.

= Do I need to sign up for an account to try it? =
You’ll need a trial account to test. You can easily sign up for a free trial account.

== Changelog ==

= 1.1.5 =
* Fix: Missing county field related dropdown issue.

= 1.1.2 =
* New config options allowing you to enable address lookup only on certain forms.

= 1.1.0 =
* Added address lookup to admin panel address forms.
* Enhanced hide fields feature.
* The county field is no longer revealed if it does not exist for the selected country.
* Option to have address search in address line 1.
* Available countries in the search interface now match the enabled countries in WooCommerce. Also options for locking the selected country in the search interface to the selected country in the dropdown, and setting the default country by IP address.
* Minor text changes.

= 1.0.9 =
* Added additional configuration options to the admin panel.

= 1.0.5 =
* Improved compatibility with our UK Postcode Lookup extension.

= 1.0.4 =
* Added a button for manual address entry when fields are hidden.

= 1.0.3 =
* New option added for hiding the address fields then displaying them when a result is selected or when an error occurs.

= 1.0.1 =
* New option added for the search interface layout (below or surrounding the search box).
