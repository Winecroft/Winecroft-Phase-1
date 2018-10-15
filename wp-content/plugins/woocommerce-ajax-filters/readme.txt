=== Advanced AJAX Product Filters ===
Plugin Name: Advanced AJAX Product Filters
Contributors: dholovnia, berocket
Donate link: http://berocket.com/product/woocommerce-ajax-products-filter
Tags: filters, product filters, ajax product filters, ajax filter, ajax filter widget, color filter, size filter, product onsale filter, product preview, product category filter, product reset filter, product sort by filter, stock filter, product tag filter, price range filter, price box filter, advanced product filters, woocommerce filters, woocommerce product filters, woocommerce products filter, woocommerce ajax product filters, widget, plugin, woocommerce item filters, filters plugin, ajax filters plugin, filter woocommerce products, filter woocommerce products plugin, wc filters, wc filters products, wc products filters, wc ajax products filters, wc product filters, wc advanced product filters, woocommerce layered nav, woocommerce layered navigation, ajax filtered nav, ajax filtered navigation, price filter, ajax price filter, woocommerce product sorting, sidebar filter, sidebar ajax filter, taxonomy filter, category filter, attribute filter, attributes filter, woocommerce product sort, ajax products filter plugin for woocommerce, rocket, berocket, berocket woocommerce ajax products filter
Requires at least: 4.0
Tested up to: 4.9
Stable tag: 1.2.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WooCommerce AJAX Product Filters - Advanced product filtering ability for your WooCommerce shop. Add unlimited filters with one widget.

== Description ==

WooCommerce AJAX Product Filters - Advanced product filtering ability for your WooCommerce shop. Add unlimited filters with one widget.

= BeRocket Promotions: =
[-60% discount for the Premium Load More Products - ONLY $10!](http://berocket.com/product/woocommerce-load-more-products)

= Features: =

* AJAX Filters, Pagination and Sorting!
* Unlimited Filters
* Multiple User Interface Elements
* Great support for custom/premium themes
* SEO Friendly Urls ( with HTML5 PushState )
* Filter Visibility By Product Category And Globals.
* Accessible through shortcode
* Filter box height limit with scroll themes
* Working great with custom widget area
* Drag and Drop Filter Building
* And More...

= Additional Features in Paid Plugin: =

* Filter by Attribute, Tag, Custom Taxonomy, Color, Image, Sale status, Sub-categories and Availability( in stock | out of stock | any )
* Nice URLs for SEO Friendly URLs
* Customize filters look through admin
* Option to re-count products amount in values when some value selected
* Tag Cloud for Tag filter
* Description can be added for the attributes
* Slider can use strings as a value
* Filters can be collapsed by clicking on title, option to collapse filter on start
* Price Filter Custom Min and Max values
* Price as checkbox with min and max values
* Add custom CSS on admin settings page
* Show icons before/after widget title and/or before/after values
* Option to upload "Loading..." gif image and set label after/before/above/under it
* Scroll top position can be controlled by the admin
* Option to hide on mobile devices
* Enhancements of the free features
* Shortcode Builder for Easy Shortcode Creation
* Show amount of products before update with "Update button" widget
* Optimization to Handle up to 5 000 Products Total
* Option to Set Values for the Price Slider Manually
* Selected Filters Area
* Reset button and Search box widget
* Cache for Widgets
* Filters Visibility by Pages
* Display only selected attribute values or hide selected attribute values


= Plugin Links: =
[Paid Plugin](http://berocket.com/product/woocommerce-ajax-products-filter)
[Demo](http://woocommerce-products-filter.berocket.com/shop/)
[Demo Description](http://woocommerce-products-filter.berocket.com/)

= Wanna try admin side? =
[Admin Demo](http://berocket.com/product/woocommerce-ajax-products-filter#try-admin) - Get access to this plugin's admin and try it from inside. Change things and watch how they work.

= Premium plugin video =
[youtube https://youtu.be/8gaMj-IxUj0]
[youtube https://youtu.be/KMjHgOA-4gM]
[youtube https://youtu.be/yo0vx5kSlLU]
*we don't have video with free plugin right now but we are working on it*

= Compatibility with WooCommerce plugins =
Advanced AJAX Product Filters has been tested and compatibility is certain with the following WooCommerce plugins that you can add to your site:

* [**Advanced Product Labels for WooCommerce**](https://wordpress.org/plugins/advanced-product-labels-for-woocommerce/)
* [**Load More Products for WooCommerce**](https://wordpress.org/plugins/load-more-products-for-woocommerce/)
* [**Brands for WooCommerce**](https://wordpress.org/plugins/brands-for-woocommerce/)
* [**Grid/List View for WooCommerce**](https://wordpress.org/plugins/gridlist-view-for-woocommerce/)
* [**Product Preview for WooCommerce**](https://wordpress.org/plugins/product-preview-for-woocommerce/)
* [**Products Compare for WooCommerce**](https://wordpress.org/plugins/products-compare-for-woocommerce/)
* [**Wishlist and Waitlist for WooCommerce**](https://wordpress.org/plugins/wish-wait-list-for-woocommerce/)

Nevertheless, it could be compatible with many other WooCommerce plugins that have not been tested yet. If you want to inform us about compatibility with other plugins, please, [email to us](http://berocket.com/contact).


= Shortcode: =
* In editor `[br_filters attribute=price type=slider title="Price Filter"]`
* In PHP `do_shortcode('[br_filters attribute=price type=slider title="Price Filter"]');`

= Shortcode Options: =
* `attribute`(required) - product attribute, eg price or length. Don't forget that woocommerce adding pa_ suffix for created attributes.
 So if you create new attribute `jump` its name is `pa_jump`
* `type`(required) - checkbox, radio, slider or select
* `operator` - OR or AND
* `title` - whatever you want to see as title. Can be empty
* `product_cat` - parent category id
* `cat_propagation` - should we propagate this filter to child categories? set 1 to turn this on
* `height` - max filter box height. When height is met scroll will be added
* `scroll_theme` - pretty clear name, scroll theme. Will be used if height is set and real height of box is more


= Advanced Settings (Widget area): =

* Product Category - if you want to pin your filter to category of the product this is good place to do it.
 Eg. You selling Phones and Cases for them. If user choose Category "Phones" filter "Have Wi-Fi" will appear
 but if user will choose "Cases" it will not be there as Admin set that "Have Wi-Fi" filter will be visible only on
 "Phones" category.
* Filter Box Height - if your filter have too much options it is nice to limit height of the filter to not prolong
 the page too much. Scroll will appear.
* Scroll theme - if "Filter Box Height" is set and box length is more than "Filter Box Height" scroll appear and
 how it looks depends on the theme you choose.


= Advanced Settings (Plugin Settings): =
* Plugin settings can be found in admin area, WooCommerce -> Product Filters
* "No Products" message - Text that will be shown if no products found
* "No Products" class - Add class and use it to style "No Products" box
* Products selector - Selector for tag that is holding products
* Sorting control - Take control over WooCommerce's sorting selectbox
* SEO friendly urls - url will be changed when filter is selected/changed
* Turn all filters off - If you want to hide filters without losing current configuration just turn them off



== Installation ==

= Step 1: =
* First you need to add attributes to the products ( WooCommerce plugin should be installed and activated already )
* Go to Admin area -> Products -> Attributes and add attributes your products will have, add them all
* Click attribute's name where type is select and add values to it. Predefine product options
* Go to your products and add attributes to each of them

= Step 2: =
* Install and activate plugin
* First of all go to Admin area -> WooCommerce -> Product Filter and check what global options you can manage
* After that go to Admin area -> Appearance -> Widgets
* In Available Widgets ( left side of the screen ) find AJAX Product Filters
* Drag it to Sidebar you choose
* Enter title, choose attribute that will be used for filtering products, choose filter type,
 choose operator( whether product should have all selected values (AND) or one of them (OR) ),
* Click save and go to your shop to check how it work.
* That's it =)


== Frequently Asked Questions ==

= Is it compatible with all WordPress themes? =
Compatibility with all themes is impossible, because they are too many, but generally if themes are developed according to WordPress and WooCommerce guidelines, BeRocket plugins are compatible with them.

= How can I get support if my WooCommerce plugin is not working? =
If you have problems with our plugins or something is not working as it should, first follow this preliminary steps:

* Test the plugin with a WordPress default theme, to be sure that the error is not caused by the theme you are currently using.
* Deactivate all plugins you are using and check if the problem is still occurring.
* Ensure that your plugin version, your theme version and your WordPress and WooCommerce version (if required) are updated and that the problem you are experiencing has not already been solved in a later plugin update.

If none of the previous listed actions helps you solve the problem, then, submit a ticket in the forum and describe your problem accurately, specify WordPress and WooCommerce versions you are using and any other information that might help us solve your problem as quickly as possible. Thanks!


= How can I get more features for my WooCommerce plugin? =
You can get more features with the premium version of Advanced AJAX Product Filters, available on [BeRocket page](http://berocket.com/product/woocommerce-ajax-products-filter). Here you can read more about the premium features of the plugin and make it give it its best shot!


= How can I try the full-featured plugin? =
You can try this plugin's admin side [here](http://berocket.com/product/woocommerce-ajax-products-filter#try-admin). Configure plugin the way you need to check the results.

---

== Screenshots ==
1. General settings
2. JavaScript settings
3. Widget

---

== Changelog ==

= 1.2.4 =
* Upgrade - WordPress 4.9 compatibility

= 1.2.3 =
* Upgrade - more useful subscribe
* Fix - updater fix

= 1.2.2 =
* Upgrade - Font Awesome
* Upgrade - New admin notices

= 1.2.1 =
* Upgrade - Option to subscribe
* Upgrade - Better advertisement

= 1.2.0 =
* Premium Feature - best support for the themes moved from premium version of the plugin. If you have any issues ith theme update and set Template ajax load fix to jQuery
* Enhancement - No Products message
* Enhancement - No Products class
* Enhancement - Count Results holder
* Enhancement - Pagination holder
* Fix - no errors if terms found
* Fix - remove notices

= 1.1.8.1 =
* Fix - WooCommerce 3.0.1 issues
* Fix - Premium plugin link on settings page.

= 1.1.8 =
* Fix - Better compatibility with WPML

= 1.1.7 =
* Fix - Remove notices on PHP 7 and newer
* Fix - Fix fo Currency Exchange plugin
* Fix - Styles for admin panel
* Fix - Remove sliders from all filters

= 1.1.7 =
* Fix - Remove notices on PHP 7 and newer
* Fix - Fix fo Currency Exchange plugin
* Fix - Styles for admin panel
* Fix - Remove sliders from all filters

= 1.1.6 =
* Fix - Price for currency exchange
* Fix - Optimization for price widget
* Fix - Custom JavaScript errors

= 1.1.5 =
* Fix - Shortcode doesn't work
* Fix - Optimization for price filters
* Fix - Filters work incorrect on search page
* Fix - Some strings is not translated with WPML
* Fix - Optimization for hiding attribute values without products

= 1.1.4 =
* Enhancement - Russian translation
* Fix - Translation
* Fix - Network activation
* Fix - Displaying of filter with price
* Fix - Get normal min/max prices for filter with price
* Fix - Widgets displays incorrect with some themes
* Fix - Not filtering with some plugins
* Fix - Scrollbar displays incorrect with some themes

= 1.1.3 =
* Enhancement - load only products from last AJAX request
* Enhancement - Uses HTML for widgets from theme
* Enhancement/Fix - Attributes page support
* Fix - Hash links didn't works with plugin
* Fix - Widgets don't display on page with latest version of WooCommerce
* Fix - Remove PHP errors

= 1.1.0.7 =
* Enhancement - Option to hide selected values and/or without products. Add at the bottom button to show them
* Enhancement - Filters are using product variations now
* Enhancement - translation( WPML ) support
* Enhancement/Fix - radio-box had issues and there was no chance to remove selection
* Fix - Pagination has issues with link building
* Fix - Jump to first page wasn't working correctly and jump each time even when user want to change page

= 1.1.0.6 =
* Enhancement - Scroll to the top
* Enhancement/Fix - Hash for old browsers added for better support
* Enhancement/Fix - Sort by default WooCommerce value
* Fix - out-of-stock filter working correctly

= 1.1.0.5 =
* Enhancement - Option to add text before and after price input fields
* Enhancement - Jump to first page when filter changed
* Fix - Now only used values must be shown, not all
* Fix - Products are limited by category we are in
* Fix - Products amount on the first page is correct now

= 1.1.0.4 =
* Minor fix

= 1.1.0.3 =
* Enhancement - Custom CSS class can be added per widget/filter
* Enhancement - Update button. If added products will be updated only when user click Update button
* Enhancement - Radio-box can be unselected by clicking it again
* Enhancement/Fix - Urls are shortened using better structure to save filters. `~` symbol is not used now
* Fix - issue with shortened tags for shortcode.
* Fix - on widgets page widget now has subcategories(hierarchy)
* Fix - all categories are visible, not only that have products inside(popular)
* Minor fixes

= 1.1.0.2 =
* Fix - another js issue that stops plugin from work
* Fix - order by name, name_numeric and attribute ID wasn't working

= 1.1.0.1 =
* Fix - js issue that stops plugin from work

= 1.1.0 =
* Enhancement - Show all values - on plugin settings page you can enable option to show all values no matter if they are used or not
* Enhancement - Values order - you can set values order when editing attribute. You can set how to order (by id, name or custom). If
you set to order `by custom` you can drag&amp;drop values up and down and set your own order.
* Small fixes

= 1.0.4.5 =
* Enhancement - values order added. Now order of values can be controlled through attribute options
* Enhancement/Fix - Better support for for category pages
* Other small fixes

= 1.0.4.4 =
* Enhancement - adding callback for before_update, on_update, after_update events.
* Other small fixes

= 1.0.4.3 =
* Enhancement - shortcode added
* Critical/Fix - If slider match none its values wasn't counted
* Enhancement/Fix - Changing attribute data location from url to action-element, providing more flexibility for template
* Enhancement/Templating - Using full products loop instead of including product content template
* Fix - Pagination with SEO url issue

= 1.0.4.2 =
* Enhancement/Fix - Better support for SEO urls with permalinks on/off
* Fix - Critical bug that was returning incorrect products.

= 1.0.4.1 =
* Enhancement - Adding AJAX for pagination.
* Enhancement - Adding PushState for pagination.
* Enhancement/Fix - Pagination wasn't updating when filters used.
* Enhancement/Fix - Text with amount of results (Eg "Showing all 2 results") wasn't updating after filters applied
* Enhancement/Fix - When choosing Slider in admin Operator became hidden
* Fix - All sliders except price wasn't working with SEO url
* Fix - When changing attribute to/from price in admin all filters jumping
* Fix - After filter applied all products was showed. Even those with Draft status.

= 1.0.4 =
* Enhancement - SEO friendly urls with possibility for users to share/bookmark their search. Will be shortened in future
* Enhancement - Option added to turn SEO friendly urls on/off. Off by default as this is first version of this feature
* Enhancement - Option to turn filters on/off globally
* Enhancement - Option to take control over (default) sorting function, make it AJAXy and work with filters
* Fix - Sorting remain correct after using filters. Sorting wasn't counted before
* Fix - If there are 2 or more sliders they are not working correctly.
* Fix - Values in slider was converted to float even when value ia not a price.
* Fix - If there are 2 or more values for attribute it was not validated when used in slider.

= 1.0.3.6 =
* Fix - Removed actions that provide warning messages
* Enhancement - Actions and filters inside plugin

= 1.0.3.3 =
* Enhancement/Fix - Showing products and options now depending on woocommerce_hide_out_of_stock_items option
* Enhancement/Fix - If not enough data available( quantity of options < 2 ) filters will not be shown.
* Fix - If in category, only products/options from this category will be shown

= 1.0.3.2 =
* Fix - wrong path was committed in previous version that killed plugin

= 1.0.3 =
* Enhancement - CSS and JavaScript files minimized
* Enhancement - Settings page added
* Enhancement - "No Products" message and it's class can be changed through admin
* Enhancement - Option added that can enable control over sorting( if visible )
* Enhancement - User can select several categories instead of one. Now you don't need to create several same filters
  for different categories.
* Enhancement - Added option "include subcats?". if selected filter will be shown in selected categories and their
  subcategories
* Fix - Adding support to themes that require product div to have "product" class
* Fix - Slider in categories wasn't initialized
* Fix - Subcategories wasn't working. Only Main categories were showing filters
* Templating - return woocommerce/theme default structure for product
* Templating - html parts moved to separate files in templates folder. You can overwrite them by creating folder
  "woocommerce-filters" and file with same name as in plugin templates folder.

= 1.0.2 =
* Fix - better support for older PHP versions

= 1.0.1 =
* First public version
