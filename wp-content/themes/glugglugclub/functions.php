<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('page_banner', 2000, 835, true);  //page banner
    add_image_size('step1_question',620, 310,true); //question 1 step banner
    add_image_size('wine_bottles_carousel',325,225,true);//step 2 carousel
    add_image_size('step3_image',560,730, true); //step3 image
    add_image_size('profile_picture', 95,95,true); //profilepicture
    add_image_size('box_upcoming',85,135,true); //my-subscriptions.php page
    add_image_size('review_image',50,50,true); //reviewer featured image
    add_image_size('product_thumbnail', 750,750,true);//product page square image

    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');

}


//add_theme_support( 'wc-product-gallery-zoom' );
//add_theme_support( 'wc-product-gallery-lightbox' );
//add_theme_support( 'wc-product-gallery-slider' );

add_theme_support( 'wc-product-gallery-zoom' );
//add_theme_support( 'wc-product-gallery-lightbox' );
//add_theme_support( 'wc-product-gallery-slider' );

add_filter( 'jpeg_quality', create_function( '', 'return 100;' ) );


/*------------------------------------*\
    Functions
\*------------------------------------*/

function my_custom_login() {
echo ' <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet"> <link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/includes/css/login-styles.css" />';
}
add_action('login_head', 'my_custom_login');



function html5blank_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}



// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if (!is_admin()) {

        wp_deregister_script('jquery'); // Deregister WordPress jQuery
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '1.9.1'); // Google CDN jQuery
        wp_enqueue_script('jquery'); // Enqueue it!

        wp_register_script('conditionizr', 'https://cdnjs.cloudflare.com/ajax/libs/conditionizr.js/4.0.0/conditionizr.js', array(), '4.0.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js', array(), '2.6.2'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('slickmin', get_template_directory_uri() . '/includes/js/slick.min.js', array(), ''); // Modernizr
        wp_enqueue_script('slickmin'); // Enqueue it!

        wp_register_script('remodalmin', get_template_directory_uri() . '/includes/js/remodal.min.js', array(), ''); // Modernizr
        wp_enqueue_script('remodalmin'); // Enqueue it!

        wp_register_script('stickymin', get_template_directory_uri() . '/includes/js/sticky.min.js', array(), ''); // Modernizr
        wp_enqueue_script('stickymin'); // Enqueue it!

        wp_register_script('wowmin', get_template_directory_uri() . '/includes/js/wow.js', array(), ''); // Modernizr
        wp_enqueue_script('wowmin'); // Enqueue it!

        wp_register_script('acfmaps','https://maps.googleapis.com/maps/api/js?key=AIzaSyCP8QtJBO3Xb02EzRy8BJAJYmTYk6jNMPs', array(), ''); // Modernizr
        wp_enqueue_script('acfmaps'); // Enqueue it!

        wp_register_script('cookieconsentjs','//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js', array(), ''); // Modernizr
        wp_enqueue_script('cookieconsentjs'); // Enqueue it!

        wp_register_script('animsitionsjs', get_template_directory_uri() .'/includes/js/animsition.min.js'); 
        wp_enqueue_script('animsitionsjs');

        wp_register_script('scrolltofixed', get_template_directory_uri() .'/includes/js/scrolltofixed.min.js'); 
        wp_enqueue_script('scrolltofixed');

        wp_register_script('niceselect', get_template_directory_uri() .'/includes/js/niceselect.min.js'); 
        wp_enqueue_script('niceselect');

        wp_register_script('arrive', get_template_directory_uri() .'/includes/js/arrive.min.js'); 
        wp_enqueue_script('arrive');

        wp_register_script('fdslider', get_template_directory_uri() .'/includes/js/fd-slider.min.js'); 
        wp_enqueue_script('fdslider');

        wp_register_script('gauge', get_template_directory_uri() .'/includes/js/gauge.min.js'); 
        wp_enqueue_script('gauge');

        wp_register_script('backDetect', get_template_directory_uri() .'/includes/js/backDetect.min.js'); 
        wp_enqueue_script('backDetect');

        wp_enqueue_script( 'password-strength-meter' );
        wp_enqueue_script( 'password-strength-meter-mediator', get_template_directory_uri() . '/includes/js/password-strength-meter-mediator.js', array('password-strength-meter'));  

        wp_localize_script('password-strength-meter-mediator', 'wc_password_strength_meter_params', array
        (
            'min_password_strength' => apply_filters('woocommerce_min_password_strength', 3),
            'i18n_password_error'   => esc_attr__('Please enter a stronger password.', 'woocommerce'),
            'i18n_password_hint'    => esc_attr(wp_get_password_hint()),
        ));

        wp_register_script('main', get_template_directory_uri() . '/includes/js/main.js', array(), ''); // Modernizr
        wp_enqueue_script('main'); // Enqueue it!

        wp_localize_script('main', 'wpajax', array
        (
            "url" => admin_url('admin-ajax.php')
        ));

    }
}


// Load HTML5 Blank styles
function html5blank_styles()
{

    wp_register_style('proximanova-typekit', 'https://use.typekit.net/zvp6vvs.css', array(),'1.0','all');
    wp_enqueue_style('proximanova-typekit');

    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!

    wp_register_style('bootstrap', get_template_directory_uri() . '/includes/css/bootstrap.css', array(), '', 'all');
    wp_enqueue_style('bootstrap'); // Enqueue it!

    wp_register_style('slick', get_template_directory_uri() . '/includes/css/slick.css', array(), '', 'all');
    wp_enqueue_style('slick'); // Enqueue it!

    wp_register_style('remodal', get_template_directory_uri() . '/includes/css/remodal.css', array(), '', 'all');
    wp_enqueue_style('remodal'); // Enqueue it!

    wp_register_style('remodal-default-theme', get_template_directory_uri() . '/includes/css/remodal-default-theme.css', array(), '', 'all');
    wp_enqueue_style('remodal-default-theme'); // Enqueue it!

    wp_register_style('csswow', get_template_directory_uri() . '/includes/css/csswow.css', array(), '', 'all');
    wp_enqueue_style('csswow'); // Enqueue it!

       wp_register_style('fd-slider', get_template_directory_uri() . '/includes/css/fd-slider.min.css', array(), '', 'all');
    wp_enqueue_style('fd-slider'); // Enqueue it!

    wp_register_style('animsitionscss', get_template_directory_uri() . '/includes/css/animsition.min.css');
    wp_enqueue_style('animsitionscss'); 

     wp_register_style('niceselect', get_template_directory_uri() . '/includes/css/nice-select.min.css');
    wp_enqueue_style('niceselect'); 

    wp_register_style('wp-styles', get_template_directory_uri() . '/includes/css/wp-styles.less', array(), '', 'all');
    wp_enqueue_style('wp-styles'); // Enqueue it!

    wp_register_style('fontawesome-min', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), '', 'all');
    wp_enqueue_style('fontawesome-min'); // Enqueue it!



    wp_register_style('cookieconsent', '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css', array(), '', 'all');
    wp_enqueue_style('cookieconsent'); // Enqueue it!


    
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'header-menu-secondary' => __('Secondary Header Menu', 'html5blank'), 
        'footer-menu-1' => __('First Footer Menu', 'html5blank'), 
        'footer-menu-2' => __('Second Footer Menu', 'html5blank'), 
        'footer-menu-3' => __('Third Footer Menu', 'html5blank'),
        'winelist-menu' => __('Club Winelist Menu', 'html5blank') 
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Shop Categories Sidebar', 'html5blank'),
        'description' => __('DO NOT MODIFY. Brings back all woocommerce categories for club winelist page', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="page-items-navigation-heading">',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Filters', 'html5blank'),
        'description' => __('DO NOT MODIFY. Returns all woocommerce filters', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

     // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('News', 'html5blank'),
        'description' => __('News sidebar', 'html5blank'),
        'id' => 'news',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}


// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
    </div>
<?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
    <br />
<?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
        <?php
            printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
        ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php }

/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
//add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
//add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Generate SiteMap

function GenerateSitemap($params = array()) {
    // default parameters
    extract(shortcode_atts(array(
        'title' => '<h1>Find the page you are after</h1>',
        'id' => 'sitemap',
        'depth' => 2
    ), $params));
    // create sitemap
    $sitemap = wp_list_pages("title_li=&depth=$depth&sort_column=menu_order&echo=0");
    if ($sitemap != '') {
        $sitemap =
            ($title == '' ? '' : "<p>$title</p>") .
            '<ul' . ($id == '' ? '' : " id=\"$id\"") . ">$sitemap</ul>";
    }
    return $sitemap;
}
add_shortcode('sitemap', 'GenerateSitemap');

function show_subpages(){

    global $post;
    $subpages = wp_list_pages( array(
        'echo'=>0,
        'title_li'=>'',
        'depth'=>3,
        'child_of'=> ( $post->post_parent == 0 ? $post->ID : $post->post_parent)
    ));

   


    if ( !empty($subpages) ) {

        echo '<nav class="page-items-navigation"><span class="page-items-navigation-heading">'; 
    if ( 0 == $post->post_parent ) {
    $pagetitle = the_title();
    } else {
   $parents = get_post_ancestors( $post->ID );
   echo $pagetitle = apply_filters( "the_title", get_the_title( end ( $parents ) ) );
    }; 
    echo '<i class="toggle-subnav hidden-md hidden-lg pull-right fa fa-bars"></i></span><ul>';
        echo $subpages;
        echo '</ul></nav>';
    } else {

    }
}



function has_woocommerce_subscription($the_user_id, $the_product_id, $the_status) {
    $current_user = wp_get_current_user();
    if (empty($the_user_id)) {
        $the_user_id = $current_user->ID;
    }
    if (WC_Subscriptions_Manager::user_has_subscription( $the_user_id, $the_product_id, $the_status)) {
        return true;
    }
}


function my_acf_init() {
    
    acf_update_setting('google_api_key', 'AIzaSyBQiQQcBwP7pB4cXY47ta6-xYMSOiJwVXQ');
}

add_action('acf/init', 'my_acf_init');



// Register Custom Post Type
function customer_reviews() {

    $labels = array(
        'name'                  => _x( 'Customer Reviews', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Customer Review', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Customer Reviews', 'text_domain' ),
        'name_admin_bar'        => __( 'Customer Reviews', 'text_domain' ),
        'archives'              => __( 'Archives', 'text_domain' ),
        'attributes'            => __( 'Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Customer Reviews', 'text_domain' ),
        'add_new_item'          => __( 'Add New Customer Reviews', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Customer Review', 'text_domain' ),
        'description'           => __( 'Customer Reviews', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor','thumbnail' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-nametag',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => false,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'rewrite'               => false,
        'capability_type'       => 'page',
    );
    register_post_type( 'customer-reviews', $args );

}
add_action( 'init', 'customer_reviews', 0 );

//SUBSCRIPTION BOXES

add_action('admin_menu', 'subscriptionbox_adminmenu');
 
function subscriptionbox_adminmenu(){
        add_menu_page( 'Subscription Boxes', 'Subscription Box', 'manage_options', 'subscription-box', 'subscriptionbox_init' );
}
 

function subscriptionbox_init(){

?>


    <style>
    .rowholder {
        margin:0 -15px;
    }
    .col-left{
        float:left;
        width:67%;
        padding:0 15px;
    }
    .col-right {
        float:left;
        width:33%;
        padding:0 15px;
    }

    .col-left,
    .col-right {
        box-sizing: border-box;
    }

    .col-left .inner,
    .col-right .inner {
        background:white;
        padding:15px;
    }

    

table {
  background-color: transparent;
}
caption {
  padding-top: 8px;
  padding-bottom: 8px;
  color: #777777;
  text-align: left;
}
th {
  text-align: left;
}
.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 20px;
}
.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td {
  padding: 8px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 1px solid #ddd;
}
.table > thead > tr > th {
  vertical-align: bottom;
  border-bottom: 2px solid #ddd;
}
.table > caption + thead > tr:first-child > th,
.table > colgroup + thead > tr:first-child > th,
.table > thead:first-child > tr:first-child > th,
.table > caption + thead > tr:first-child > td,
.table > colgroup + thead > tr:first-child > td,
.table > thead:first-child > tr:first-child > td {
  border-top: 0;
}
.table > tbody + tbody {
  border-top: 2px solid #ddd;
}
.table .table {
  background-color: #fff;
}

.table-bordered {
  border: 1px solid #ddd;
}
.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
  border: 1px solid #ddd;
}

    </style>
    <div class="wrap">
    <h1>Subscription Boxes</h1>
     <?php
            ##STAGE1OFBOXES - RENDER THE PAGE WITH INFORMATION.    
            //this is our admin page, do stuff here.
            if(isset($_POST['go'])){
                echo '<div class="rowholder"><div class="col-left"><div class="inner">';
            triggerSubscriptionBoxChange();
            echo ' Completed - All active subscriptions have now been updated.<br/>';
            echo '</div></div></div>';
            }
            else {
            }
            ?>  
    <div class="rowholder">
    <form id="submitsubscriptionbox" action="" method="post" class="col-left"> 
        <div class="inner">
            <h3>Subscription Box Generator</h3>
            <p>Below is a list of all of the products. Please tick which ones you want to "feature". When you are ready please then click the button below to update every customers active subscriptions.</p>
            <table class="table table-bordered">
            <thead>
                <th>Wine Name</th>
                <th>SKU</th>
                <th>Wine Profile</th>
                <th>Red or White</th>
                <th>Current Stock Level</th>
                <th>Feature</th>
            </thead>

            <tbody>

            <?php
            global $post;
            $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 999999
                        );
                    $loop = new WP_Query( $args );
                    if ( $loop->have_posts() ) {
                        while ( $loop->have_posts() ) : $loop->the_post();?>
                        <?php $productData = new WC_Product($post->ID);?>
                         <tr>
                            <td><?php the_title();?></td>
                            <td><?php echo $productData->get_sku();?></td>
                            <td><?php the_field('wine_profile');?></td>
                            <td><?php the_field('red_or_white');?></td>
                            <td><?php echo $productData->get_stock_quantity();?></td>
                            <td><input value="<?php echo $post->ID;?>" <?php if(get_field('featured')): echo 'checked'; endif;?> type="checkbox" name="subBox[]"/></td>
                         </tr>   
                    <?php    endwhile;
                    } else {
                        echo __( 'No products found' );
                    }
                    wp_reset_postdata();
            ?>

            </tbody>
           
            </table>
            <p><strong>Clicking this button will amend EVERY ACTIVE SUBSCRIPTION. This process can take awhile so it is best to leave this running until the page has finished.</strong></p>
            <hr/>
          
            <button type="submit" name="go" style="width:100%;" class="button button-primary button-large">Create new Subscription Boxes for ALL Customers</button>

        </div>
         
    </form>
    <?php
  
    // count how many active subscriptions there are.

     $allsubscriptions = get_posts( array(
        'posts_per_page' => -1,
        'post_type'   => 'shop_subscription', // Subscription post type
        'post_status' => array('wc-active','wc-on-hold')
        )); 

     $asubscriptions = get_posts( array(
        'posts_per_page' => -1,
        'post_type'   => 'shop_subscription',
        'post_status' => 'wc-active'
        )); 

     $isubscriptions = get_posts( array(
        'posts_per_page' => -1,
        'post_type'   => 'shop_subscription', // Subscription post type
        'post_status' => 'wc-on-hold'
        ));

      $msubscriptions = get_posts( array(
        'posts_per_page' => -1,
        'post_type'   => 'shop_subscription', // Subscription post type
        'post_status' => 'wc-active', 
        'meta_key'      => 'customer_changed',
        'meta_value'    => 1
        ));


   // var_dump($allsubscriptions);
     $totalSubs = 0;
     foreach($allsubscriptions as $subsa):
        $totalSubs++;
    endforeach;


    //This is how many are changable
    $activeSubs = 0;
     foreach($asubscriptions as $subsb):
        $activeSubs++;
    endforeach;

    $inactiveSubs = 0;
     foreach($isubscriptions as $subsc):
        $inactiveSubs++;
    endforeach;

     $modifiedSubs = 0;
     foreach($msubscriptions as $subsm):
        $modifiedSubs++;
    endforeach;


    ?>

    <div class="col-right">
    <div class="inner">
    <h3>Subscription Information</h3>
    <p>Active Subscriptions: <strong><?php echo $activeSubs;?></strong> that will be affected</p>
    <p>Customer Modifed Subscriptions (these will NOT be affected): <strong><?php echo $modifiedSubs;?></strong></p>
    <p>Of Active ones, Paused Subscriptions: <strong><?php echo $inactiveSubs;?></strong> that will be affected</p>
    <hr/>
    <p>Total Subscriptions: <strong><?php echo $totalSubs - $modifiedSubs;?></strong> that will be affected</p>
    <hr/>
    <p>You need to make sure that at least <strong>4</strong> of each wine profile for each wine type(red/white) is selected as featured, a minimum of <strong>24</strong> wines in total need to be featured to create every permutation available of wine selection (light vs medium vs heavy X red[qty] vs white[qty]).</p>
    <?php /**
    <hr/>
    <p><strong>PLEASE BE AWARE OF YOUR STOCK LEVELS AND HOW MANY IT WILL DEDUCT FROM STOCK UPON GENERATING THIS MONTHS BOX.</strong></p>
    **/?>
    </div>

    <div class="inner" style="margin-top:15px;">
    <h3>Order Cut off</h3>
    <p>You have specified your cut off date is the <strong>15th</strong> of each month.</p>
    <p>Therefor, you should be modifying this page on the <strong>1st</strong> of each month.</p>
    <hr/>

    <h3>Block ALL NEW ORDERS</h3>
    <p><strong>NOTE: This will mean that you can not accept ANY new orders, which is no new customers signing up, no gift cards etc).</strong></p>
       <?php

        if(isset($_POST['blockCheckoutAbility'])){
                changeCheckoutAbility();
            }
	     	if(get_field('block_checkout','option') == TRUE):
	        	$checkoutvalue = 'Enable Checkout for ANY new customer ';
	    	else:
	      		$checkoutvalue = 'Disable Checkout for ANY new customer';
	   	 	endif;
	   	 	$test = get_field('block_checkout','option');
	   	 	//var_dump($test);

	   	 
    	?>

    <form id="blockCheckout" action="" method="post">
        <button type="submit" name="blockCheckoutAbility" style="width:100%;" class="button button-primary button-large"><?php echo $checkoutvalue;?></button>
    </form>



    <h3>Block Customers from Order Amendments</h3>
    <?php

     //this is our admin page, do stuff here.
    if(isset($_POST['updateBoxAbility'])){
        changeBoxPermisions();
    }
    else {

    }
     if(get_field('are_customers_able_to_update_their_order','option') == TRUE):
        $statusvalue = 'Disable Customers updating their Box';
        //$secondstatus = 'able';
    else:
    	$statusvalue = 'Enable Customers to update their Box';
    	// $secondstatus = 'unable';
    endif;

    $test2 = get_field('are_customers_able_to_update_their_order','option');
    //var_dump($test2);

    ##STAGE1OFBOXES - RENDER THE PAGE WITH INFORMATION.    
   
   
    ?> 
    
    <form id="submitsubscriptionbox" action="" method="post">
        <button type="submit" name="updateBoxAbility" style="width:100%;" class="button button-primary button-large"><?php echo $statusvalue;?></button>
    </form>



    

    </div>

    </div>



    </div>


    </div>

    <?php 

}

function updateWineChoice() {
    //if(isset($_POST['newwinechoice'])):
        $ws_selection = $_POST['ggc_step2'];
        $current_userid = get_current_user_id();
        $user_ID = 'user_'.$current_userid;
        update_field('wine_selection',$ws_selection,$user_ID);
    //endif;
}
add_action( 'wp_ajax_nopriv_updateWineChoice',  'updateWineChoice' );
add_action( 'wp_ajax_updateWineChoice','updateWineChoice' );



function skipMonth() {
    // get user
    $current_userid = get_current_user_id();
    $currentSubs = wcs_get_users_subscriptions($current_userid);

    foreach($currentSubs as $currentSub):
        $currentSub->update_status( 'on-hold' );
        //add 2 days on so we have a 2 day window of payments for other subs
        $day            = '17';
        $currentMonth   = date('m');
        $currentYear    = date('Y');

        $thisMonthBox = strtotime($currentYear.'-'.$currentMonth.'-'.$day);
        //this will get the current months box date. i.e 15/{currentmonth}/{currentyear}.

        $nextMonthBox = date("Y-m-d", strtotime("+1 month", $thisMonthBox));

        update_field('has_user_skipped',1,'user_'.$current_userid);
        update_field('when_to_start_again',$nextMonthBox,'user_'.$current_userid);
    endforeach;
}
add_action( 'wp_ajax_nopriv_skipMonth',  'skipMonth' );
add_action( 'wp_ajax_skipMonth','skipMonth' );


function my_activation(){
    if (!wp_next_scheduled( 'reactiveSub' ) ) {
        wp_schedule_event( time(), 'daily', 'reactiveSub' );
    }
}
add_action( 'reactiveSub', 'reactive_user_sub' );

function reactive_user_sub() {

    $blogusers = get_users();
    $now = new DateTime();
    foreach($blogusers as $user):
        $userid = $user->ID;
        $date = NULL;
        if(get_field('has_user_skipped','user_'.$userid) == 1):
            $date = get_field('when_to_start_again','user_'.$userid);
            $date = new DateTime($date);
            if($now >= $date):

                $currentSubs = wcs_get_users_subscriptions($userid);
                foreach($currentSubs as $currentSub):
                    $currentSub->update_status('active');
                endforeach;
                // the date has past and we can now change their sub back to active.
                update_field('has_user_skipped',0,'user_'.$userid);
                update_field('when_to_start_again','','user_'.$userid);
            else:
                // do nothing as date is not in the past.
            endif;
        endif;
    endforeach; 
    $headers = array('Content-Type: text/html; charset=UTF-8');
    wp_mail( 'russellf@creativesteam.co.uk', 'wp_cron', 'reactive_user_sub complete', $headers );
}

function _mime_content_type($filename) {
    $result = new finfo();

    if (is_resource($result) === true) {
        return $result->file($filename, FILEINFO_MIME_TYPE);
    }

    return false;
}


add_action( 'wp_ajax_nopriv_updatePicture',  'updatePicture' );
add_action( 'wp_ajax_updatePicture','updatePicture' );


function changeBoxPermisions() {

    $checkfirst = get_field('are_customers_able_to_update_their_order', 'option');
    if($checkfirst == 0):
        update_field('are_customers_able_to_update_their_order', 1,'option');
    elseif($checkfirst == 1):
        update_field('are_customers_able_to_update_their_order', 0,'option');
    endif;
   // echo 'Succesfully changed!';

}

function changeCheckoutAbility() {

    $checkfirst = get_field('block_checkout', 'option');
    if($checkfirst == FALSE):
        update_field('block_checkout', 1,'option');
    elseif($checkfirst == TRUE):
        update_field('block_checkout', 0,'option');
    endif;
    //echo 'Succesfully changed!';

}


function triggerSubscriptionBoxChange() {

/**
TODO

LOOP THROUGH PRODS

LOOP THROUGH ONES WHICH ARE NOW FEATURED

IF IDS MATCH THAT ARE FEATURED THEN UPDATE AS 1

IF NOT THEN UPDATE THE REST AS 0

*/
$productIDsToAdd = $_POST['subBox'];



global $post;
$args = array(
'post_type' => 'product',
'posts_per_page' => 999999
);
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) {
while ( $loop->have_posts() ) : $loop->the_post();
$theID = $post->ID;

if(in_array($theID, $productIDsToAdd)) {
    update_field('featured',1,$theID);
}

else {
    update_field('featured',0,$theID);
}
 
endwhile;
} else {

}
wp_reset_postdata();


      ##STAGE 2 OF SUBSCRIPTIONBOX AND MOVE INTO FUNCTION BELOW

            //ok this gets submitted of pressing the submit button

            // first we loop through all subscriptions, that are active, no point going through inactive ones.

            $subscriptions = get_posts( array(
            'numberposts' => -1,
            'post_type'   => 'shop_subscription', // Subscription post type
            'post_status' => array('wc-active','wc-on-hold'), // Active subscription
            'orderby' => 'post_date', // ordered by date
            'order' => 'ASC',
            'date_query' => array( // Start & end date
                array(
                    'after'     => $from_date,
                    'before'    => $to_date,
                    'inclusive' => true,
                ),
            ),
            ));

            //now we go through each of these subscriptions, and remove the products, and then add ones based on the selection from the previous form.
            foreach($subscriptions as $subscription):
                $order_id = $subscription->ID;
                // we need to only update subscriptions that do not have the modified flag. This means that if a customer HAS modified the sub in any way at all, then we do not touch it.
                if(get_field('customer_changed',$order_id) != 1):
                //$order_id = 30;
                

                //1. remove all products in this shop_subscription
                wc_get_order($order_id)->remove_order_items();
                $order = wc_get_order($order_id);

                //@TODO Profile
                //2.find out what type of customer they are.
                $subscr_meta_data = get_post_meta($subscription->ID);
                $customer_id = $subscr_meta_data['_customer_user'][0];

                //$customerProfile = get_field('customer_taste_profile_value','user_'.$customer_id);   

                //5. Add products to each order now from the array with their price.
                $wineprofile = get_field('customer_taste_profile_value','user_'.$customer_id);
                $wineprofile = strtok($wineprofile['label'], " ");
                $wineprofile = strtolower($wineprofile);

                // cool, so we now work out how many of each wine type they want. so we want an integer from 1-4 based on the value its coming from

                $wineamounts = get_field('wine_selection', 'user_'.$customer_id);
                $redwines = mb_substr($wineamounts, 0, 1);
                $whitewines = mb_substr($wineamounts,-2,1);



            if($redwines != 0):
                $productsRed = get_posts( array(
                'numberposts' => $redwines,
                'post_type'   => 'product', // Subscription post type
                'post_status' => 'active', // Active subscription
                'post__in' => $productIDsToAdd,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key'     => 'featured',
                        'value'   => '1',
                        'compare' => 'LIKE',
                    ),
                    array(
                        'key' => '_stock_status',
                        'value' => 'instock'
                    ),
                    array(
                        'key'     => 'wine_profile',
                        'value'   => $wineprofile,
                        'compare' => 'LIKE',
                    ),

                    array(
                        'key'     => 'red_or_white',
                        'value'   => 'red',
                        'compare' => 'LIKE',
                    ),
                ),

                ));


             foreach ($productsRed as $productRedAdd):
                   
                    $product = new WC_Product($productRedAdd);
                    $qty = 1;
                    $productPrice = WC_Subscriptions_Product::get_price_string( $product );
                    wc_get_order($order_id)->add_product($product, $qty, array(
                                    'totals' => array(
                                        'subtotal'     => $product->get_price(),
                                        'subtotal_tax' => $tax,
                                        'total'        => $product->get_price(),
                                        'tax'          => $tax,
                                        'tax_data'     => array( 'subtotal' => array(1=>$tax), 'total' => array(1=>$tax) )
                                    )
                    ));
                endforeach;

            endif;

            if($whitewines != 0):
                $productsWhite = get_posts( array(
                'numberposts' => $whitewines,
                'post_type'   => 'product', // Subscription post type
                'post_status' => 'active', // Active subscription
                'post__in' => $productIDsToAdd,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key'     => 'featured',
                        'value'   => '1',
                        'compare' => 'LIKE',
                    ),
                    array(
                        'key' => '_stock_status',
                        'value' => 'instock'
                    ),
                    array(
                        'key'     => 'wine_profile',
                        'value'   => $wineprofile,
                        'compare' => 'LIKE',
                    ),

                    array(
                        'key'     => 'red_or_white',
                        'value'   => 'white',
                        'compare' => 'LIKE',
                    ),
                ),

                ));

                 foreach($productsWhite as $productWhiteAdd):

                        $product = new WC_Product($productWhiteAdd);
                        $qty = 1;
                        $productPrice = WC_Subscriptions_Product::get_price_string( $product );
                        wc_get_order($order_id)->add_product($product, $qty, array(
                                        'totals' => array(
                                            'subtotal'     => $product->get_price(),
                                            'subtotal_tax' => $tax,
                                            'total'        => $product->get_price(),
                                            'tax'          => $tax,
                                            'tax_data'     => array( 'subtotal' => array(1=>$tax), 'total' => array(1=>$tax) )
                                        )
                        ));
                    endforeach;

            endif;




            $order->calculate_totals();
            $order->save();

            //TODO - SEND EMAIL TO ALL SUBSCRIPTIONS WITH GENERIC EMAIL OF "IT HAS BEEN UPDATED"
            // we now reset all orders flags of manually update to 0

            endif;
            update_field('customer_changed', 0,$order_id);
        endforeach;     



        echo 'Success!';    
  
}


function getUserActiveSubscriptionDate($userID = NULL)
{
    $user = $userID ? get_user($userID) : wp_get_current_user();

    $earliest = 0;

    if(has_woocommerce_subscription('', '', '') and has_woocommerce_subscription('', '', 'active'))
    {
        $subscriptions = get_posts(array
        (
            'numberposts' => -1,
            'post_type'   => 'shop_subscription',
            'post_status' => 'wc-active',
            'meta_key'    => '_customer_user',
            'meta_value'  => $user->ID
        ));

        foreach($subscriptions as $activesubscription)
        {
            $orderdate = wc_get_order($activesubscription->ID);
            $orderdate = strtotime($orderdate->schedule_next_payment);

            if($earliest == 0 or ($orderdate >= time() and $orderdate < $earliest))
            {
                $earliest = $orderdate;
            }
        }
    }

    return $earliest;
}

function getUserActiveSubscriptionStatus($userID=null) {


$current_user = wp_get_current_user();



//first we check if there are any subs at all for user

if (has_woocommerce_subscription('','','')):

    // so we think they have a sub, lets see if its active

    if (has_woocommerce_subscription('','','active')):
        $subscriptions = get_posts( array(
                'numberposts' => -1,
                'post_type'   => 'shop_subscription', // Subscription post type
                'post_status' => 'wc-active', // Active subscription
                'meta_key'    => '_customer_user',
                'meta_value'  => $current_user->ID
                ));
        
        $totalCount = count($subscriptions);

        foreach($subscriptions as $activesubscription):

            $order_id = $activesubscription->ID;
           //  var_dump(wc_get_order($order_id));
            $orderdate = wc_get_order($order_id);
            //get the next payment date
            $nextpayment = $orderdate->schedule_next_payment;
            //remove time from payment date
            $now = time(); // or your date as well
            $your_date = strtotime($nextpayment);
            $datediff = $your_date - $now;


        //@TODO ECHO STATUS OF CREATE YOUR FIRST BOX IF NOTHING AVAILABLE.
        
        if($totalCount <= 1):
            $deliverystatus = 'Your first box is on its way';

        elseif($datediff == 0):
            $deliverystatus = 'Your next payment will come out today.';
        else:
            $deliverystatus = 'Your next wine box is due for <br/> payment in '. floor($datediff / (60 * 60 * 24)).' days';
        endif;

          
        endforeach;


        return '  <p class="heading">'. $deliverystatus.'</p>';

    else:

        return '<p class="heading"> It looks like your current subscripton is not active, no order will be processed until you re-activate.</p>'; 

    endif;

else: 


    return '<p class="heading"> It looks like you have not got an active subscription yet. <br/> Please complete your registration process to start your first subscription!</p>';

endif;

}



function  getCurrentUserId() {
    $currentid =  get_current_user_id();
    return 'user_'.$currentid;
}

function getCurrentSubscriptionProductAmount($productID){
   $currentid =  get_current_user_id();
    //first we get the users subscriptions
    $subscriptions = get_posts( array(
            'numberposts' => -1,
            'post_type'   => 'shop_subscription', // Subscription post type
            'post_status' => 'wc-active', // Active subscription
            'meta_key'    => '_customer_user',
            'meta_value'  => $currentid
    ));

//var_dump($subscriptions);
foreach($subscriptions as $currentsubscription):

    $order_id = $currentsubscription->ID;

    $order = wc_get_order($order_id);

    foreach ($order->get_items() as $item_id => $item_obj):
        $itemid = $item_obj->get_product_id();
        if($productID == $itemid):
            echo $item_obj->get_quantity();
        endif;
    endforeach;

endforeach;

}

add_action( 'wp_ajax_nopriv_changeProductAmount',  'changeProductAmount' );
add_action( 'wp_ajax_changeProductAmount','changeProductAmount' );
function changeProductAmount(){
if ( ! defined( 'WOOCOMMERCE_CART' ) ) {
    define( 'WOOCOMMERCE_CART', true );
}



  if ( isset($_POST['product_amount']) && isset($_POST['product_id']) ) {
        $user_id      =  get_current_user_id();

        // The new number to append to the order
        $valueAmount    = intval( $_POST['product_amount'] ); 
        //$valueAmount = 3;

        // The product ID we are adding.
        $productID   = intval( $_POST['product_id'] ); 
        //$productID      = 24;

        // Get the users current subscription and we add X amount to their order of this item.
        $subscriptions = get_posts( array(
            'numberposts' => 1,
            'post_type'   => 'shop_subscription', // Subscription post type
            'post_status' => 'wc-active', // Active subscription
            'meta_key'    => '_customer_user',
            'meta_value'  => $user_id
        )); 
        $theSubId = NULL;
        foreach( $subscriptions as $subscription ){
            $order = wc_get_order( $subscription->ID );
            $theSubId = $subscription->ID;
            break; // Stop the loop
        }

        // Lets remove the product first completely and add the new value. 
        // This allows us to use the same function for subtract 1 from the total and adding 1 to the total


        // this is our amount of line items before doing anything.
        $currentTotal = 0;
        foreach($order->get_items() as $item):
            $currentTotal++;
        endforeach;

        $potentialAmount = 0;
        foreach( $order->get_items() as $item_id => $item ){
                if( $item->get_product_id() == $productID )
                    if($valueAmount == '0'):
                        $potentialAmount = 1;
                    endif;
        }
        

        if($currentTotal - $potentialAmount <  4):
            //echo 'You can not have less than 4 line items in your subscription box';
            echo '0';
        else:


            foreach( $order->get_items() as $item_id => $item ){
                if( $item->get_product_id() == $productID )
                    wc_delete_order_item( $item_id );
            }
            if($valueAmount != 0):
                // Get an instance of the WC_Product
                $product = wc_get_product( $productID ); // <= You don't need any $args (optional)
                // Add The product to the order
                $order->add_product( $product, $valueAmount );

                $order->calculate_totals();
                $order->save();
            endif;
            //echo 'You have successfully amended your subscription box';
            echo '1';
            // we need to now add a flag if the order has been amended manually by the customer or not.
            update_field('customer_changed', 1,$theSubId);
        endif;
    } 




    die(); // Alway at the end (to avoid server error 500)


    /*V1
    global $woocommerce;

    $currentid      =  get_current_user_id();

    $valueAmount    = (int)$_POST['product_amount']; //this will be the new number to append to the order
    //$valueAmount = 3;

    $productID   = (int)$_POST['product_id']; // this is the product ID we are adding.
    //$productID      = 24;

    //so now we get the users current subscription and we add X amount to their order of this item.
    $subscriptions = get_posts( array(
    'numberposts' => 1,
    'post_type'   => 'shop_subscription', // Subscription post type
    'post_status' => 'wc-active', // Active subscription
    'meta_key'    => '_customer_user',
    'meta_value'  => $currentid
    )); 

    foreach ($subscriptions as $subscription):

        $order_id = $subscription->ID;

        $order = new WC_Order($order_id);

        $orderitems = $order->get_items();

    endforeach;
        // lets remove the product first completely and add the new value. This allows us to use the same function for subtract 1 from the total and adding 1 to the total

        // we also want to check if the user has 4 or more products in their subscription. If they don't then they can't remove it. They have to leave it in their/add a new one then remove it, OR cancel/put on hold their subscription.


        $count = 0;
        foreach ($orderitems as $key => $product) {
            $count++;
            // if there are 15 $item[number] in this foreach, I want get the value : 15
        }

        if($count - 1 >= 4):
            echo 'You can not do that';
            echo 'count is:'.$count .'<br/>';
            //continue
        else:



        foreach ($orderitems as $key => $product):
            $prodid = $product->get_product_id();
            if($prodid == $productID):
                wc_delete_order_item($key);
            endif;
        endforeach;
        
        if($valueAmount !== 0):


            $product2 = new WC_Product($productID);
            $order->add_product($product2, $valueAmount, array(
                    'totals' => array(
                        'subtotal'     => wc_get_price_excluding_tax( $product2, array( 'qty' => $valueAmount ) ),
                        'subtotal_tax' => $tax,
                        'total'        => wc_get_price_excluding_tax( $product2, array( 'qty' => $valueAmount ) ),
                        'tax'          => $tax,
                        'tax_data'     => array( 'subtotal' => array(1=>$tax), 'total' => array(1=>$tax) ),
                        'quantity'     => $valueAmount
                    )
            ));
        endif;
        //@RF TODO. This does recalculate correctly but when subscription is actually renewed, it then is.
        $order->calculate_totals();
        $order->save();
        echo 'successfully changed';
        echo 'count is:'.$count.'<Br/>';
        endif;

        */
}

function emailcheck(){

    $email = $_POST['user_email'];
    // do check
    if ( email_exists($email) ) {
        echo 'yes';
    }
    else {
       echo 'no';
    }
    exit();

}
add_action( 'wp_ajax_nopriv_emailcheck',  'emailcheck' );
add_action( 'wp_ajax_emailcheck','emailcheck' );
//SIGNUPPROFESS
//STEP1

function ggc_step1() {
    //first we get all the values of our radio button questions
    $q1_answer = (int)$_POST['ggc_q1'];
    $q2_answer = (int)$_POST['ggc_q2'];
    $q3_answer = (int)$_POST['ggc_q3'];
    $q4_1_answer = $_POST['ggc_q4_1'];
    $q4_2_answer = $_POST['ggc_q4_2'];

    $q5_1_answer =(int)$_POST['ggc_q5_1'];
    $q5_2_answer =(int)$_POST['ggc_q5_2'];
    $q5_3_answer =(int)$_POST['ggc_q5_3'];
    $q5_4_answer =(int)$_POST['ggc_q5_4'];
    $q5_5_answer =(int)$_POST['ggc_q5_5'];
    $q5_6_answer =(int)$_POST['ggc_q5_6']; 
    $q5_7_answer =(int)$_POST['ggc_q5_7'];
 
    //this calculates the score of Q1-3 and based on the number we then know their profile and what to set it to.
    $profilecalc = $q1_answer + $q2_answer + $q3_answer;

    //we'll store the answer to q4_1 & q4_2 as a comma list which we can explode into an array when retrieving it/setting it against their profile. use magic hash to seperate
    $fruits = $q4_1_answer.'_'.$q4_2_answer;

    $rating = $q5_1_answer.'_'.$q5_2_answer.'_'.$q5_3_answer.'_'.$q5_4_answer.'_'.$q5_5_answer.'_'.$q5_6_answer.'_'.$q5_7_answer;
    setcookie('ggc_step1_q1', $q1_answer, time() + (86400 * 21), '/');
    setcookie('ggc_step1_q2', $q2_answer, time() + (86400 * 21), '/');
    setcookie('ggc_step1_q3', $q3_answer, time() + (86400 * 21), '/');
    setcookie('ggc_step1_q4_1', $q4_1_answer , time() + (86400 * 21), '/');
    setcookie('ggc_step1_q4_2', $q4_2_answer , time() + (86400 * 21), '/');
    setcookie('ggc_step1_value', $profilecalc, time() + (86400 * 21), '/');
    setcookie('ggc_step1_fruits_value', $fruits, time() + (86400 * 21), '/');
    setcookie('ggc_step1_flavours_value',$rating, time() + (86400 * 21), '/');

}
add_action( 'wp_ajax_nopriv_ggc_step1',  'ggc_step1' );
add_action( 'wp_ajax_ggc_step1','ggc_step1' );


//RETAKE TEST, DUPE OF STEP1 BUT INSTANT SAVE

function ggc_step1_retake() {

    // get current user details
    $current_userid = get_current_user_id();
    $user_ID = 'user_'.$current_userid;


    //first we get all the values of our radio button questions
    $q1_answer = (int)$_POST['ggc_q1'];
    $q2_answer = (int)$_POST['ggc_q2'];
    $q3_answer = (int)$_POST['ggc_q3'];
    $q4_1_answer = $_POST['ggc_q4_1'];
    $q4_2_answer = $_POST['ggc_q4_2'];

    $q5_1_answer =(int)$_POST['ggc_q5_1'];
    $q5_2_answer =(int)$_POST['ggc_q5_2'];
    $q5_3_answer =(int)$_POST['ggc_q5_3'];
    $q5_4_answer =(int)$_POST['ggc_q5_4'];
    $q5_5_answer =(int)$_POST['ggc_q5_5'];
    $q5_6_answer =(int)$_POST['ggc_q5_6']; 
    $q5_7_answer =(int)$_POST['ggc_q5_7'];
 
    //this calculates the score of Q1-3 and based on the number we then know their profile and what to set it to.
    $profilecalc = $q1_answer + $q2_answer + $q3_answer;

    //we'll store the answer to q4_1 & q4_2 as a comma list which we can explode into an array when retrieving it/setting it against their profile. use magic hash to seperate
    $fruits = $q4_1_answer.'_'.$q4_2_answer;

    $rating = $q5_1_answer.'_'.$q5_2_answer.'_'.$q5_3_answer.'_'.$q5_4_answer.'_'.$q5_5_answer.'_'.$q5_6_answer.'_'.$q5_7_answer;

    // now we save the answers to the users profile

    //save Q1-3
    update_field('customer_taste_profile_value', $profilecalc,$user_ID);

    update_field('favourite_hot_drink',$q1_answer,$user_ID);
    update_field('whats_your_take_on_salt',$q2_answer,$user_ID);
    update_field('where_do_you_stand_on_artificial_sweeteners_in_soft_drinks',$q3_answer,$user_ID);
    update_field('ice_cream_scoop_1',$q4_1_answer,$user_ID);
    update_field('ice_cream_scoop_2',$q4_2_answer,$user_ID);

    //save Q4
    $fruits = explode('_', $fruits);
    update_field('ice_cream_scoop_1',$fruits[0],$user_ID);
    update_field('ice_cream_scoop_2',$fruits[1],$user_ID);

    //save Q5
    $flavours = explode('_', $rating);
    update_field('peppers',$flavours[0],$user_ID);
    update_field('dry_toast',$flavours[1],$user_ID);
    update_field('vanilla',$flavours[2],$user_ID);
    update_field('butter',$flavours[3],$user_ID);
    update_field('marmalade',$flavours[4],$user_ID);
    update_field('mushrooms',$flavours[5],$user_ID);
    update_field('smokey_bacon_crisps',$flavours[6],$user_ID); 

}
add_action( 'wp_ajax_nopriv_ggc_step1_retake',  'ggc_step1_retake' );
add_action( 'wp_ajax_ggc_step1_retake','ggc_step1_retake' );

function ggc_updateQ4_5() {

    // get current user details
    $current_userid = get_current_user_id();
    $user_ID = 'user_'.$current_userid;


    //first we get all the values of our radio button questions

    $q4_1_answer = $_POST['ggc_q4_1'];
    $q4_2_answer = $_POST['ggc_q4_2'];

    $q5_1_answer =(int)$_POST['ggc_q5_1'];
    $q5_2_answer =(int)$_POST['ggc_q5_2'];
    $q5_3_answer =(int)$_POST['ggc_q5_3'];
    $q5_4_answer =(int)$_POST['ggc_q5_4'];
    $q5_5_answer =(int)$_POST['ggc_q5_5'];
    $q5_6_answer =(int)$_POST['ggc_q5_6']; 
    $q5_7_answer =(int)$_POST['ggc_q5_7'];
 

    //we'll store the answer to q4_1 & q4_2 as a comma list which we can explode into an array when retrieving it/setting it against their profile. use magic hash to seperate
    $fruits = $q4_1_answer.'_'.$q4_2_answer;

    // now we save the answers to the users profile

    //save Q1-3


    
    update_field('ice_cream_scoop_1',$q4_1_answer,$user_ID);
    update_field('ice_cream_scoop_2',$q4_2_answer,$user_ID);

    //save Q5
    $flavours = explode('_', $rating);
    update_field('peppers',$q5_1_answer,$user_ID);
    update_field('dry_toast',$q5_2_answer,$user_ID);
    update_field('vanilla',$q5_3_answer,$user_ID);
    update_field('butter',$q5_4_answer,$user_ID);
    update_field('marmalade',$q5_5_answer,$user_ID);
    update_field('mushrooms',$q5_6_answer,$user_ID);
    update_field('smokey_bacon_crisps',$q5_7_answer,$user_ID); 

}
add_action( 'wp_ajax_nopriv_ggc_updateQ4_5',  'ggc_updateQ4_5' );
add_action( 'wp_ajax_ggc_updateQ4_5','ggc_updateQ4_5' );


//STEP2

function ggc_step2() {

    //first we store the value from their selection choice
    $winechoice = $_POST['ggc_step2'];

    // now we store that choice as a cookie that we can retrieve after registering and assign it to them for the first time
    setcookie('ggc_step2_value',$winechoice,time() + (86400 * 21), '/');

}
add_action( 'wp_ajax_nopriv_ggc_step2',  'ggc_step2' );
add_action( 'wp_ajax_ggc_step2','ggc_step2' );


//STEP3
//STEP3 IS SIMPLY REGISTERING, WE STORE THE INFORMATION WHEN THEY ARE REGISTED/LOAD NEXT PAGE


//STEP 4, PART 1.
function ggc_step4InstantSave() {

if(is_page_template( 'step-4.php' )):

    $current_userid = get_current_user_id();
    $user_ID = 'user_'.$current_userid;

    // save data for profile based on S1, Q1,2,3

        if(isset($_COOKIE['ggc_step1_value'])): 
            $bodied_score = $_COOKIE['ggc_step1_value'];
            update_field('customer_taste_profile_value', $bodied_score,$user_ID);
        else: 
        
        endif;
  
    //@TODO, SAVE ANSWERS SET FROM STEP1 AS THE ANSWERS INDIVIDUALLY

    // save data for S1, Q4

    if(isset($_COOKIE['ggc_step1_flavours_value'])): 

        $fruits_score = $_COOKIE['ggc_step1_flavours_value'];

        $fruits = explode('_', $fruits_score);


        update_field('favourite_hot_drink',$_COOKIE['ggc_step1_q1'],$user_ID);
        update_field('whats_your_take_on_salt',$_COOKIE['ggc_step1_q2'],$user_ID);
        update_field('where_do_you_stand_on_artificial_sweeteners_in_soft_drinks',$_COOKIE['ggc_step1_q3'],$user_ID);



        update_field('ice_cream_scoop_1',$fruits[0],$user_ID);
        update_field('ice_cream_scoop_2',$fruits[1],$user_ID);
    else:

    endif;

    // save data for S1, Q5
    if(isset($_COOKIE['ggc_step1_flavours_value'])): 
        $flavour_score = $_COOKIE['ggc_step1_flavours_value'];
        
        $flavours = explode('_', $flavour_score);
        
        update_field('peppers',$flavours[0],$user_ID);
        update_field('dry_toast',$flavours[1],$user_ID);
        update_field('vanilla',$flavours[2],$user_ID);
        update_field('butter',$flavours[3],$user_ID);
        update_field('marmalade',$flavours[4],$user_ID);
        update_field('mushrooms',$flavours[5],$user_ID);
        update_field('smokey_bacon_crisps',$flavours[6],$user_ID); 

    else: 
    
    endif;

    //save data from S2,Q1 (wine types vs amount)
    if(isset($_COOKIE['ggc_step2_value'])): 
        $ws_selection = $_COOKIE['ggc_step2_value'];
        update_field('wine_selection',$ws_selection,$user_ID);
    else:

    endif;

    //we now wipe the cookies as we have already saved them and don't need them anymore
    unset($_COOKIE['ggc_step1_flavours_value']);
    setcookie('ggc_step1_flavours_value', '', time() - ( 15 * 60 ) );

    unset($_COOKIE['ggc_step1_fruits_value']);
    setcookie('ggc_step1_fruits_value', '', time() - ( 15 * 60 ) );

    unset($_COOKIE['ggc_step1_value']);
    setcookie('ggc_step1_value', '', time() - ( 15 * 60 ) );

    unset($_COOKIE['ggc_step2_value']);
    setcookie('ggc_step2_value', '', time() - ( 15 * 60 ) );

    // ok so now we have their values saved initially, we can add some products to the basket based on whats featured currently. 
    //This means that if they leave the page, that it will 
    //@TODO MAKE SURE COOKIE EXPIRES AFTER 3 DAYS SO THAT THEY DON'T CHECK OUT 1MONTH LATER WITH OLD DATA.

    // so now we add products to cart based on the:
    // 1) wine selection (1R3W e.g)
    // 2) profile of user
    // 3) what is featured

    // so lets clear the users cart first 
    if (is_user_logged_in() ):

        // Get current user ID
        $user_id = get_current_user_id();

        // so first lets clear the basket so we can have current/uptodate sub-box data.
        WC()->cart->empty_cart();

        //ok so now lets get the users profile rating as either light, medium, full
        $wineprofile = get_field('customer_taste_profile_value',$user_ID);
        $wineprofile = strtok($wineprofile['label'], " ");
        $wineprofile = strtolower($wineprofile);

        // cool, so we now work out how many of each wine type they want. so we want an integer from 1-4 based on the value its coming from

        $wineamounts = get_field('wine_selection', $user_ID);
        $redwines1 = mb_substr($wineamounts, 0, 1);
        $whitewines1 = mb_substr($wineamounts,-2,1);
       // echo 'red='.$redwines .'<br/>';
       // echo 'white='.$whitewines;

        // great so we now know the current users profile, and how many red wines and how many white wines to add to their basket.
        // so lets run 2 seperate queries that we can loop through and add based on a) how many of that type of product, b)matches their profile


        

        if($whitewines1 != 0):
            $productsWhite = get_posts( array(
            'posts_per_page' => $whitewines1,
            'post_type'   => 'product', // Subscription post type
            'post_status' => 'publish', // Active subscription
        
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key'     => 'featured',
                    'value'   => '1',
                    'compare' => 'LIKE',
                ),
                array(
                    'key'     => 'wine_profile',
                    'value'   => $wineprofile,
                    'compare' => 'LIKE',
                ),

                array(
                    'key'     => 'red_or_white',
                    'value'   => 'white',
                    'compare' => 'LIKE',
                ),
            )

            ));

            foreach($productsWhite as $whitewine):
            //var_dump($whitewine);
                WC()->cart->add_to_cart($whitewine->ID);
            endforeach;
            wp_reset_postdata();
        endif;

        // super we now have 2 arrays which will have how many red wine products that match their profile and how many white wine products that match their profile in conjunction with how many of that type they want.

        // lets loop through them and add them to the basket. 
        
        // @TODO Maybe count the total of the 2 arrays to make sure we don't add a crazy amount?
        if($redwines1 != 0):

        $productsRed = get_posts( array(
        'posts_per_page' => $redwines1,
        'post_type'   => 'product', // Subscription post type
        'post_status' => 'publish', // Active subscription
    
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key'     => 'featured',
                'value'   => '1',
                'compare' => 'LIKE',
            ),
            array(
                'key'     => 'wine_profile',
                'value'   => $wineprofile,
                'compare' => 'LIKE',
            ),

            array(
                'key'     => 'red_or_white',
                'value'   => 'red',
                'compare' => 'LIKE',
            ),
        )

        ));
        foreach ($productsRed as $redwine):
            //var_dump($redwine);
            WC()->cart->add_to_cart($redwine->ID);
        endforeach;
         wp_reset_postdata();

    endif;



        

        // done! we have, based on their initial profile setup, added the products to their basket.

        // We should do the same thing for when they update as well as the profile may change/may have different products for ggc_step4.

    endif;

endif;
    
}

//STEP4
// so this step assumes that they have changed something from the initial profile build/cart add, so this is an optional step that is triggered if they override their score. We will update their score, clear the cart contents, re-add products, and then direct them to the checkout

function ggc_step4() {

//lets check the user first - don't want to wipe everyones basket

    if (is_user_logged_in() ):

        $current_userid = get_current_user_id();
        $user_ID = 'user_'.$current_userid;

        $newprofilerating = $_POST['tasteprofile_final'];
        update_field('customer_taste_profile_value', $newprofilerating,$user_ID);
        setcookie('ggc_step1_value', $newprofilerating, time() + (86400 * 21), '/');
        //so now we have updated the user field, we should get a new list of products incase it has changed to a new bracket. But lets empty their cart first.

        WC()->cart->empty_cart();


        //ok so now lets get the users profile rating as either light, medium, full
        $wineprofile = get_field('customer_taste_profile_value',$user_ID);
        $wineprofile = strtok($wineprofile['label'], " ");
        $wineprofile = strtolower($wineprofile);

        // cool, so we now work out how many of each wine type they want. so we want an integer from 1-4 based on the value its coming from

        $wineamounts = get_field('wine_selection', $user_ID);
        $redwines = mb_substr($wineamounts, 0, 1);
        $whitewines = mb_substr($wineamounts,-2,1);
       // echo 'red='.$redwines .'<br/>';
       // echo 'white='.$whitewines;

        // great so we now know the current users profile, and how many red wines and how many white wines to add to their basket.
        // so lets run 2 seperate queries that we can loop through and add based on a) how many of that type of product, b)matches their profile
        if($redwines != 0):
        $productsRed = get_posts( array(
        'posts_per_page' => $redwines,
        'post_type'   => 'product', // Subscription post type
        'post_status' => 'publish', // Active subscription
    
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key'     => 'featured',
                'value'   => '1',
                'compare' => 'LIKE',
            ),
            array(
                'key'     => 'wine_profile',
                'value'   => $wineprofile,
                'compare' => 'LIKE',
            ),

            array(
                'key'     => 'red_or_white',
                'value'   => 'red',
                'compare' => 'LIKE',
            ),
        )

        ));

         // lets loop through them and add them to the basket. 
        
        // @TODO Maybe count the total of the 2 arrays to make sure we don't add a crazy amount?

        foreach ($productsRed as $redwine):
            //var_dump($redwine);
            WC()->cart->add_to_cart($redwine->ID);
        endforeach;
        wp_reset_postdata();
        

        endif;

        
        //setcookie('russwhite', $whitewines, time() + (86400 * 21), '/');

        if($whitewines !=0):
        $productsWhite = get_posts( array(
        'posts_per_page' => $whitewines,
        'post_type'   => 'product', // Subscription post type
        'post_status' => 'publish', // Active subscription
    
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key'     => 'featured',
                'value'   => '1',
                'compare' => 'LIKE',
            ),
            array(
                'key'     => 'wine_profile',
                'value'   => $wineprofile,
                'compare' => 'LIKE',
            ),

            array(
                'key'     => 'red_or_white',
                'value'   => 'white',
                'compare' => 'LIKE',
            ),
        )

        ));
         foreach($productsWhite as $whitewine):
            //var_dump($whitewine);
            WC()->cart->add_to_cart($whitewine->ID,1);
        endforeach;
        wp_reset_postdata();
         

    endif;
    

        // super we now have 2 arrays which will have how many red wine products that match their profile and how many white wine products that match their profile in conjunction with how many of that type they want.

       

       

        // done! we have now updated their basket to reflect their changes. We should now redirect them to the Checkout.

    endif;


}
add_action( 'wp_ajax_nopriv_ggc_step4',  'ggc_step4' );
add_action( 'wp_ajax_ggc_step4','ggc_step4' );




function updateTasteProfile() {
//we simply update the users profile so the next box adheres to it.
    if (is_user_logged_in() ):

        $current_userid = get_current_user_id();
        $user_ID = 'user_'.$current_userid;

        $newprofilerating = $_POST['tasteprofile_final'];
        update_field('customer_taste_profile_value', $newprofilerating,$user_ID);
        echo 'Succesfully updated your taste profile.';
    endif;

}
add_action( 'wp_ajax_nopriv_updateTasteProfile',  'updateTasteProfile' );
add_action( 'wp_ajax_updateTasteProfile','updateTasteProfile' );






add_filter( 'woocommerce_checkout_fields' , 'remove_checkoutfields' );
 
function remove_checkoutfields( $fields ) {
unset($fields['billing']['billing_company']);
unset($fields['order']['order_comments']);
return $fields;
}


remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );




remove_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price', 10, 0);
add_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_price',7,0);

//get current wine profile

function productWineProfile($productID) {
    $wineprofile = get_field('wine_profile',$productID);
    return $wineprofile;
}

function tasteMatchProfile($productID) {
    if (is_user_logged_in() ):

        $current_userid = get_current_user_id();
        $user_ID = 'user_'.$current_userid;

        $wineprofile = get_field('customer_taste_profile_value',$user_ID);
        $wineprofile = strtok($wineprofile['label'], " ");
        $wineprofile = strtolower($wineprofile);
        $productprofile = get_field('wine_profile',$productID);
        $productType = get_field('red_or_white', $productID);
    
        $winePreference = get_field('wine_selection', $user_ID);
        if($winePreference == '0R4W'):

            if(($productType == 'white') AND ($wineprofile == $productprofile)):
                $html = '<span class="badge tastematch">Taste Match</span>';
                return $html;
            endif;

        elseif($winePreference == '4R0W'):

            if(($productType == 'red') AND ($wineprofile == $productprofile)):
                $html = '<span class="badge tastematch">Taste Match</span>';
                return $html;
            endif;

        else:

                
                if ($wineprofile == $productprofile):

                    $html = '<span class="badge tastematch">Taste Match</span>';
                    return $html;

                else:
                    return '';
                endif;

        endif; 


    else:
        return '';
    endif;
}



function monthlyPickBadge($productID) {
     $monthly = get_field('featured',$productID);
     if($monthly) {
        $html ='<span class="badge monthlypick">Monthly Pick</span>';
        return $html;
     }
     else {
        return '';
     }
}


function mailchimpStatus( $email, $status, $list_id, $api_key, $merge_fields = array('FNAME' => '','LNAME' => '') ){
    //so we hook into mailchimps api and use curl to to treat the request correctly and give us the stuff we want in our functions below.
    $data = array(
        'apikey'        => $api_key,
         'email_address' => $email,
        'status'        => $status,
        'merge_fields'  => $merge_fields
    );
    $mch_api = curl_init(); // initialize cURL connection
 
    curl_setopt($mch_api, CURLOPT_URL, 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5(strtolower($data['email_address'])));
    curl_setopt($mch_api, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.base64_encode( 'user:'.$api_key )));
    curl_setopt($mch_api, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
    curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true); // return the API response
    curl_setopt($mch_api, CURLOPT_CUSTOMREQUEST, 'PUT'); // method PUT
    curl_setopt($mch_api, CURLOPT_TIMEOUT, 10);
    curl_setopt($mch_api, CURLOPT_POST, true);
    curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($mch_api, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
 
    $result = curl_exec($mch_api);
    return $result;
}


function mailchimpSubscribe(){
    // so here we pass the list_id from our form and make the user subscribe to that list
    $list_id = $_POST['list_id'];
    $api_key = 'bbe1a1390ebb09c46511f5598c0505f5-us17';
    $result = json_decode( mailchimpStatus($_POST['email'], 'subscribed', $list_id, $api_key, array('FNAME' => $_POST['fname'],'LNAME' => $_POST['lname']) ) );
     print_r( $result ); 
    if( $result->status == 400 ){
        foreach( $result->errors as $error ) {
            //echo '<p>Error: ' . $error->message . '</p>';
            echo '0';
        }
    } elseif( $result->status == 'subscribed' ){
        $result->merge_fields->FNAME;
        echo '1';
    }
    else {
       // echo 'hi';
    }
    // $result['id'] - Subscription ID
    // $result['ip_opt'] - Subscriber IP address
    die;
}
 
add_action('wp_ajax_mailchimpsubscribe','mailchimpSubscribe');
add_action('wp_ajax_nopriv_mailchimpsubscribe','mailchimpSubscribe');

function mailchimpUnsubscribe(){
    // so here we pass the list_id and then actually unsub the user from the sub list.

    $list_id = $_POST['list_id'];
    $api_key = 'bbe1a1390ebb09c46511f5598c0505f5-us17';
    $result = json_decode( mailchimpStatus($_POST['email'], 'unsubscribed', $list_id, $api_key, array('FNAME' => $_POST['fname'],'LNAME' => $_POST['lname']) ) );
    // print_r( $result ); 

    if( $result->status == 400 ){
        foreach( $result->errors as $error ) {
            echo '<p>Error: ' . $error->message . '</p>';
            //echo '0';
        }
    } elseif( $result->status == 'unsubscribed' ){
        $result->merge_fields->FNAME;
        echo '2';
    }
    // $result['id'] - Subscription ID
    // $result['ip_opt'] - Subscriber IP address
    die;
}

add_action('wp_ajax_mailchimpunsubscribe','mailchimpUnsubscribe');
add_action('wp_ajax_nopriv_mailchimpunsubscribe','mailchimpUnsubscribe');


function checkMailChimp($userEmail,$list_id) {
// so here we simply return a value of either unsubscribed, or subscribed and in our template we can determine what form to show based on the value here.
$api_key = 'bbe1a1390ebb09c46511f5598c0505f5-us17';
$result = json_decode( mailchimpStatus($userEmail, 'subscribed', $list_id, $api_key, array('FNAME' => $_POST['fname'],'LNAME' => $_POST['lname']) ) );

return $result->status;

}


function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );
    unset($tabs['reviews']);
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );


function get_attachment_id( $url ) {
    $attachment_id = 0;
    $dir = wp_upload_dir();
    if ( false !== strpos( $url, $dir['baseurl'] . '/' ) ) { // Is URL in uploads directory?
        $file = basename( $url );
        $query_args = array(
            'post_type'   => 'attachment',
            'post_status' => 'inherit',
            'fields'      => 'ids',
            'meta_query'  => array(
                array(
                    'value'   => $file,
                    'compare' => 'LIKE',
                    'key'     => '_wp_attachment_metadata',
                ),
            )
        );
        $query = new WP_Query( $query_args );
        if ( $query->have_posts() ) {
            foreach ( $query->posts as $post_id ) {
                $meta = wp_get_attachment_metadata( $post_id );
                $original_file       = basename( $meta['file'] );
                $cropped_image_files = wp_list_pluck( $meta['sizes'], 'file' );
                if ( $original_file === $file || in_array( $file, $cropped_image_files ) ) {
                    $attachment_id = $post_id;
                    break;
                }
            }
        }
    }
    return $attachment_id;
}



function getProfilePicture() {
    $userid = get_current_user_id();

    $fbProfileCheck = get_user_meta($userid,'fb_profile_picture')[0];

    $pictureFallback = get_field('user_profile_image','user_'.$userid);


    if(!empty($fbProfileCheck)):
        return '<img src="'.$fbProfileCheck.'"/>';
    elseif(!empty($pictureFallback)):
        $imageid = get_attachment_id($pictureFallback);
        $imagearray = wp_get_attachment_image_src($imageid,'profile_picture');
        return '<img src="'.$imagearray[0].'"/>';
       // return '<img src="'.$pictureFallback.'"/>';
    else:
        return '<img src="'. get_template_directory_uri().'/includes/img/fallback.jpg"/>';
    endif;
}



remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

remove_action( 'woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash', 10, 0);
add_action('woocommerce_single_product_summary','woocommerce_show_product_sale_flash',2,0);

remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_price', 10, 0);
add_action('woocommerce_single_product_summary','woocommerce_template_single_price',19,0);

remove_action('woocommerce_output_product_data_tabs','woocommerce_after_single_product_summary',10,0);
remove_action('woocommerce_output_related_products','woocommerce_after_single_product_summary',20,0);

//remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );



add_filter( 'body_class', 'taste_profile_bodyclass' );
function taste_profile_bodyclass( $classes ) {
    if ( is_page_template( 'taste-profile.php' ) ) {
        $classes[] = 'woocommerce-account';
    }
    return $classes;
}



/*
add_action('update_user_metadata', 'my_auto_login', 10, 4);

function my_auto_login( $metaid, $userid, $key, $value ) {
    // We only care about the password nag event. Ignore anything else.
    if ( 'default_password_nag' !== $key  && true !== $value) {
        return;
    }

    // Set the current user variables, and give him a cookie. 
    wp_set_current_user( $userid );
    wp_set_auth_cookie( $userid );
}
*/

add_action( 'user_register', 'setownpassword', 10, 99 );

function setownpassword( $user_id ) {
    if ( isset( $_POST['user_password'] ) )
    wp_set_password( $_POST['user_password'], $user_id );
}
function log_me_the_in( $user_id ) {
    wp_set_current_user( $user_id );
    wp_set_auth_cookie( $user_id );
    //wp_redirect( home_url( '/some-ending-page/' ) );
    //exit(); 
}
add_action( 'user_register', 'log_me_the_in' );

add_action('wp_ajax_user_get_billing_address_fields', 'user_get_billing_address_fields');
add_action('wp_ajax_nopriv_user_get_billing_address_fields', 'user_get_billing_address_fields');

function user_get_billing_address_fields()
{
    global $current_user;

    if($current_user->ID)
    {
        $billing_first_name  = get_user_meta($current_user->ID, 'billing_first_name', true);
        $billing_last_name   = get_user_meta($current_user->ID, 'billing_last_name', true);
        $billing_company     = get_user_meta($current_user->ID, 'billing_company', true);
        $billing_address_1   = get_user_meta($current_user->ID, 'billing_address_1', true);
        $billing_address_2   = get_user_meta($current_user->ID, 'billing_address_2', true);
        $billing_city        = get_user_meta($current_user->ID, 'billing_city', true);
        $billing_state       = get_user_meta($current_user->ID, 'billing_state', true);
        $billing_postcode    = get_user_meta($current_user->ID, 'billing_postcode', true);
        $billing_country     = get_user_meta($current_user->ID, 'billing_country', true);
        $billing_email       = get_user_meta($current_user->ID, 'billing_email', true);
        $billing_phone       = get_user_meta($current_user->ID, 'billing_phone', true);

        echo json_encode(array
        (
            "first_name" => $billing_first_name,
            "last_name"  => $billing_last_name,
            "company"    => $billing_company,
            "address_1"  => $billing_address_1,
            "address_2"  => $billing_address_2,
            "city"       => $billing_city,
            "state"      => $billing_state,
            "postcode"   => $billing_postcode,
            "country"    => $billing_country,
            "email"      => $billing_email,
            "phone"      => $billing_phone,
        ));
    }

    wp_die();
}

add_action('woocommerce_customer_save_address', function($user_id = 0, $address = 'billing')
{
    if(!$user_id)
    {
        $user_id = get_current_user_id();
    }

    if($user_id)
    {
        if($address == 'billing')
        {
            $same_as_billing_address = get_user_meta($user_id, 'same_as_billing_address', true);

            if($same_as_billing_address)
            {
                if(isset($_POST['billing_first_name']))
                {
                    update_user_meta($user_id, 'shipping_first_name', $_POST['billing_first_name']);
                }

                if(isset($_POST['billing_last_name']))
                {
                    update_user_meta($user_id, 'shipping_last_name', $_POST['billing_last_name']);
                }

                if(isset($_POST['billing_company']))
                {
                    update_user_meta($user_id, 'shipping_company', $_POST['billing_company']);
                }

                if(isset($_POST['billing_address_1']))
                {
                    update_user_meta($user_id, 'shipping_address_1', $_POST['billing_address_1']);
                }

                if(isset($_POST['billing_address_2']))
                {
                    update_user_meta($user_id, 'shipping_address_2', $_POST['billing_address_2']);
                }

                if(isset($_POST['billing_city']))
                {
                    update_user_meta($user_id, 'shipping_city', $_POST['billing_city']);
                }

                if(isset($_POST['billing_state']))
                {
                    update_user_meta($user_id, 'shipping_state', $_POST['billing_state']);
                }

                if(isset($_POST['billing_postcode']))
                {
                    update_user_meta($user_id, 'shipping_postcode', $_POST['billing_postcode']);
                }

                if(isset($_POST['billing_country']))
                {
                    update_user_meta($user_id, 'shipping_country', $_POST['billing_country']);
                }

                if(isset($_POST['billing_method']))
                {
                    update_user_meta($user_id, 'shipping_method', $_POST['billing_method']);
                }

                if(isset($_POST['billing_phone']))
                {
                    update_user_meta($user_id, 'shipping_phone', $_POST['billing_phone']);
                }
            }

            if(isset($_POST['date_of_birth']))
            {
                update_user_meta($user_id, 'date_of_birth', $_POST['date_of_birth']);
            }
        }
        else if($address == 'shipping')
        {
            $same_as_billing_address = isset($_POST['same_as_billing_address']) ? '' : '1';

            update_user_meta($user_id, 'same_as_billing_address', $same_as_billing_address);

            if($same_as_billing_address)
            {
                $billing_first_name  = get_user_meta($user_id, 'billing_first_name', true);
                $billing_last_name   = get_user_meta($user_id, 'billing_last_name', true);
                $billing_company     = get_user_meta($user_id, 'billing_company', true);
                $billing_address_1   = get_user_meta($user_id, 'billing_address_1', true);
                $billing_address_2   = get_user_meta($user_id, 'billing_address_2', true);
                $billing_city        = get_user_meta($user_id, 'billing_city', true);
                $billing_state       = get_user_meta($user_id, 'billing_state', true);
                $billing_postcode    = get_user_meta($user_id, 'billing_postcode', true);
                $billing_country     = get_user_meta($user_id, 'billing_country', true);
                $billing_email       = get_user_meta($user_id, 'billing_email', true);
                $billing_phone       = get_user_meta($user_id, 'billing_phone', true);

                update_user_meta($user_id, 'shipping_first_name', $billing_first_name);
                update_user_meta($user_id, 'shipping_last_name', $billing_last_name);
                update_user_meta($user_id, 'shipping_company', $billing_company);
                update_user_meta($user_id, 'shipping_address_1', $billing_address_1);
                update_user_meta($user_id, 'shipping_address_2', $billing_address_2);
                update_user_meta($user_id, 'shipping_city', $billing_city);
                update_user_meta($user_id, 'shipping_state', $billing_state);
                update_user_meta($user_id, 'shipping_postcode', $billing_postcode);
                update_user_meta($user_id, 'shipping_country', $billing_country);
                update_user_meta($user_id, 'shipping_method', $billing_method);
                update_user_meta($user_id, 'shipping_phone', $billing_phone);
            }
        }
    }
}, 20, 2);

add_action('woocommerce_save_account_details', function($user_id = 0)
{
    if(!$user_id)
    {
        $user_id = get_current_user_id();
    }

    if($user_id)
    {
        if(isset($_POST['date_of_birth']))
        {
            update_user_meta($user_id, 'date_of_birth', $_POST['date_of_birth']);
        }

        if(isset($_POST['account_first_name']) and !trim(get_user_meta($user_id, 'billing_first_name', true)))
        {
            update_user_meta($user_id, 'billing_first_name', $_POST['account_first_name']);
        }

        if(isset($_POST['account_last_name']) and !trim(get_user_meta($user_id, 'billing_last_name', true)))
        {
            update_user_meta($user_id, 'billing_last_name', $_POST['account_last_name']);
        }
    }
}, 20, 1);


/*
add_action( 'woocommerce_subscription_status_pending-cancel', 'handsome_bearded_guy_cancel_subscription', 10, 1 );

function handsome_bearded_guy_cancel_subscription( $subscription ) {
    $subscription->update_status( 'cancelled', 'Moved from "pending cancellation" to "cancelled" by my custom function' );
}

*/
/*
function my_hide_shipping_when_free_is_available( $rates ) {
    $free = array();
    foreach ( $rates as $rate_id => $rate ) {
        if ( 'free_shipping' === $rate->method_id ) {
            $free[ $rate_id ] = $rate;
            break;
        }
    }
    return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );
*/


function freeCouponForFirstOrder($user = NULL)
{
    if(!$user)
    {
        global $current_user;

        $user = $current_user;
    }
    else if(!($user instanceof WP_User))
    {
        $user = get_user_by(is_string($user) ? 'login' : 'id', $user);
    }

    if(!$user or !$user->ID)
    {
        return false;
    }

    global $wpdb;

    // Get all customer orders
    $count = $wpdb->get_var("SELECT COUNT(post_id) FROM {$wpdb->postmeta} WHERE meta_key = '_customer_user' AND meta_value = {$user->ID} AND post_id IN (SELECT ID FROM {$wpdb->posts} WHERE post_type = 'shop_order')");

    // return "true" when customer has already one order
    if($count > 0)
    {
        return true;
    }

    return false;
}



if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page('Global Data');
    
}


add_action( 'woocommerce_after_order_notes', 'orderinstructions' );

function orderinstructions( $checkout ) {

    echo '<div id="orderinstructions">';

    woocommerce_form_field( 'order_instructions', array(
        'type'          => 'textarea',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Delivery Instructions'),
        'placeholder'   => __('Enter any delivery instructions'),
        ), $checkout->get_value( 'order_instructions' ));

    echo '</div>';

}
add_action( 'woocommerce_checkout_update_order_meta', 'orderinstructions_update_meta' );

function orderinstructions_update_meta( $order_id ) {
    if ( ! empty( $_POST['order_instructions'] ) ) {
        update_post_meta( $order_id, 'Delivery Instructions', sanitize_text_field( $_POST['order_instructions'] ) );
    }
}

add_action( 'woocommerce_admin_order_data_after_billing_address', 'orderinstructions_showadmin', 10, 1 );

function orderinstructions_showadmin($order){
    echo '<p><strong>'.__('Delivery Instructions').':</strong> ' . get_post_meta( $order->id, 'Delivery Instructions', true ) . '</p>';
}

add_filter('woocommerce_email_order_meta_keys', 'my_custom_order_meta_keys');

function my_custom_order_meta_keys( $keys ) {
     $keys[] = 'Delivery Instructions'; // This will look for a custom field called 'Tracking Code' and add it to emails
     return $keys;
}


// Register Custom Taxonomy
function flavour_characteristics() {

    $labels = array(
        'name'                       => _x( 'Flavour Characteristics', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Flavour Characteristic', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Flavour Characteristics', 'text_domain' ),
        'all_items'                  => __( 'All Characteristics', 'text_domain' ),
        'parent_item'                => __( 'Parent Characteristic', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Characteristic:', 'text_domain' ),
        'new_item_name'              => __( 'New Characteristic', 'text_domain' ),
        'add_new_item'               => __( 'Add New Characteristic', 'text_domain' ),
        'edit_item'                  => __( 'Edit Characteristic', 'text_domain' ),
        'update_item'                => __( 'Update Characteristic', 'text_domain' ),
        'view_item'                  => __( 'View Characteristic', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Items', 'text_domain' ),
        'search_items'               => __( 'Search Items', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No items', 'text_domain' ),
        'items_list'                 => __( 'Items list', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => false,
        'rewrite'                    => false,
        'show_in_rest'               => false,
    );
    register_taxonomy( 'characteristics', array( 'product' ), $args );

}
add_action( 'init', 'flavour_characteristics', 0 );

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_filter( 'woocommerce_billing_fields', 'wc_npr_filter_phone', 10, 1 );

function wc_npr_filter_phone( $address_fields ) {
$address_fields['billing_phone']['required'] = true;
return $address_fields;
}
add_filter( 'woocommerce_shipping_fields', 'wc_npr_filter_phone_s', 10, 1 );

function wc_npr_filter_phone_s( $address_fields ) {
$address_fields['shipping_phone']['required'] = true;
return $address_fields;
}

add_filter( 'woocommerce_cart_shipping_method_full_label', 'remove_shipping_label', 10, 2 );

function remove_shipping_label( $label, $method ) {
    $new_label = preg_replace( '/^.+:/', '', $label );

    return $new_label;
}

/**
 * Change the subscription thank you message after purchase
 *
 * @param  int $order_id
 * @return string
 */
function custom_subscription_thank_you( $order_id) {

}
add_filter( 'woocommerce_subscriptions_thank_you_message', 'custom_subscription_thank_you');

function checkCustomersSub() {

}

/*
add_filter( 'woocommerce_get_catalog_ordering_args','custom_query_sort_args' );
function custom_query_sort_args() {
                    
        // Sort by and order
        $current_order = ( isset( $_SESSION['orderby'] ) ) ? $_SESSION['orderby'] : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
                            
        switch ( $current_order ) {
            case 'wine-sort-white' :
                $orderby = 'meta_value';
                $order = 'desc';
                $meta_key = '_wine-style';
            break;
            case 'price' :
                $orderby = 'meta_value_num';
                $order = 'asc';
                $meta_key = '_price';
            break;
            case 'title' :
                $orderby = 'meta_value';
                $order = 'asc';
                $meta_key = '_woocommerce_product_short_title';
            break;
            default :
                $orderby = 'menu_order title';
                $order = 'asc';
                $meta_key = '';         
            break;
        }
        
        $args = array();
                
        $args['orderby']        = $orderby;
        $args['order']          = $order;
                    
        if ($meta_key) :
            $args['meta_key'] = $meta_key;
        endif;
                    
        return $args;
}
*/
add_action( 'wp_login_failed', 'my_front_end_login_fail' );  // hook failed login

function my_front_end_login_fail( $username ) {
   $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
   // if there's a valid referrer, and it's not the default log-in screen
   if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
      wp_redirect( $referrer . '?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
      exit;
   }
}

add_action('wp_login', function($user_login, $user)
{
    if(!$user)
    {
        $user = get_user_by('login', $user_login);
    }

    if($user->ID)
    {
        if(freeCouponForFirstOrder($user))
        {
            wp_redirect(site_url('/my-account/orders/'));
        }
        else
        {
            wp_redirect(site_url('/checkout/'));
        }

        exit;
    }
}, 200, 2);


// Redirect Registration Page
function my_registration_page_redirect()
{
 global $pagenow;
 
 if ( ( strtolower($pagenow) == 'wp-login.php') && ( strtolower( $_GET['action']) == 'register' ) ) {
 wp_redirect( home_url('/getting-started/step-3?y=0#register'));
 }
}
 
add_filter( 'init', 'my_registration_page_redirect' );



add_filter('gettext', 'custom_strings_translation', 20, 3);

function custom_strings_translation( $translated_text, $text, $domain ) {

  switch ( $translated_text ) {
    case 'Deliver to a different address?' : 
      $translated_text =  __( 'Same as billing address', '__x__' ); 
      break;
  }

  return $translated_text;

}


function skyverge_add_postmeta_ordering_args( $sort_args ) {
        
    $orderby_value = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
    switch( $orderby_value ) {
    
        case 'wine_profile_order':
            $sort_args['orderby'] = 'meta_value_num';
            // We use meta_value_num here because points are a number and we want to sort in numerical order
            $sort_args['order'] = 'asc';
            $sort_args['meta_key'] = 'wine_profile_order';
            break;
           case 'wine_profile_order_desc':
            $sort_args['orderby'] = 'meta_value_num';
            // We use meta_value_num here because points are a number and we want to sort in numerical order
            $sort_args['order'] = 'desc';
            $sort_args['meta_key'] = 'wine_profile_order';
            break;

        
    }
    
    return $sort_args;
}
add_filter( 'woocommerce_get_catalog_ordering_args', 'skyverge_add_postmeta_ordering_args' );
// Add these new sorting arguments to the sortby options on the frontend
function skyverge_add_new_postmeta_orderby( $sortby ) {
    
    // Adjust the text as desired

    $sortby['wine_profile_order'] = __( 'Sort By Profile (Light - Full/White - Red)', 'woocommerce' );
    $sortby['wine_profile_order_desc'] = __( 'Sort By Profile (Light - Full/Red - White)', 'woocommerce' );
    return $sortby;
}
add_filter( 'woocommerce_default_catalog_orderby_options', 'skyverge_add_new_postmeta_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'skyverge_add_new_postmeta_orderby' );

add_filter('woocommerce_default_catalog_orderby', 'modify_woocommerce_default_catalog_orderby');

function modify_woocommerce_default_catalog_orderby( $orderby ) {
    if( empty( $orderby ) ) {
        return 'wine_profile_order';
    }

    return $orderby;
}

add_filter('woocommerce_coupon_is_valid', function($valid = true, $coupon = NULL, $wc_discounts = NULL)
{
    if($coupon)
    {
        $coupon_code                 = $coupon->get_code();
        $free_coupon_for_first_order = freeCouponForFirstOrder();

        if(preg_match("/^raf-/i", $coupon_code) and !$free_coupon_for_first_order)
        {
            $valid = false;

            add_filter('woocommerce_coupon_error', function($error)
            {
                $error = __('You must place your first order before you can use this coupon.');

                return $error;
            }, 10);
        }
        else
        {
            $first_order_coupon      = get_field('first_order_coupon', 'option');
            $first_order_coupon_code = wc_get_coupon_code_by_id($first_order_coupon);

            if($first_order_coupon_code and ($coupon_code == $first_order_coupon_code) and (!is_user_logged_in() or $free_coupon_for_first_order))
            {
                $valid = false;
            }
        }
    }

    return $valid;
});

add_filter('woocommerce_countries_shipping_countries', 'wc_custom_sort_countries_uk_to_top');
add_filter('woocommerce_countries_allowed_countries', 'wc_custom_sort_countries_uk_to_top');

function wc_custom_sort_countries_uk_to_top($countries)
{
    if(isset($countries['GB']))
    {
        $gb = $countries['GB'];

        unset($countries['GB']);

        $countries = array('GB' => $gb) + $countries;
    }

    return $countries;
}


add_filter('woocommerce_account_menu_items', function($order)
{
    $order = array
    (
        "taste-profile"   => "Taste Profile",
        "dashboard"       => "Account Details",
        "orders"          => "Order History",
        "refer-a-friend"  => "Refer a Friend",
        "customer-logout" => "Logout",
    );

    return $order;
});

add_action('template_redirect', function()
{
    if(is_page(get_option('woocommerce_cart_page_id')) and WC()->cart->is_empty())
    {
        wp_redirect(site_url('/getting-started/step-1/'));

        exit;
    }
});

add_action('validate_password_reset', function($errors, $user)
{
    if(!is_wp_error($user))
    {
        $key = get_user_meta($user->ID, 'registration_confirmation_password_key', true);

        if($key)
        {
            global $current_user, $wpdb;

            if($current_user->ID)
            {
                if($current_user->ID != $user->ID)
                {
                    wp_destroy_current_session();
                    wp_clear_auth_cookie();

                    $current_user->ID = 0;
                }
            }

            if(!$current_user->ID)
            {
                wp_set_current_user($user->ID);
                wp_set_auth_cookie($user->ID);
            }

            delete_user_meta($user->ID, 'registration_confirmation_password_key');

            $wpdb->query("UPDATE {$wpdb->users} SET user_activation_key = '' WHERE ID = {$user->ID}");

            if(freeCouponForFirstOrder() !== false)
            {
                wp_redirect(site_url('/my-account'));
            }
            else
            {
                wp_redirect(site_url('/checkout'));
            }
        }
    }
}, 10, 2);

add_action('retrieve_password_key', function($user_login, $key)
{
    $user = get_user_by('login', $user_login);

    if($user)
    {
        update_user_meta($user->ID, 'registration_confirmation_password_key', $key);
    }
}, 10, 2);

add_filter('wp_new_user_notification_email', function($wp_new_user_notification_email, $user, $blogname)
{
    $subject = trim(get_field('registration_confirmation_email_subject', 'options'));

    if($subject)
    {
        $wp_new_user_notification_email['subject'] = $subject;
    }

    $message = trim(apply_filters('the_content', get_field('registration_confirmation_email_html', 'options')));

    if($message)
    {
        $key = get_user_meta($user->ID, 'registration_confirmation_password_key', true);

        $message = preg_replace(array
        (
            "/\[user([_ -])?name\]/i",
            "/\[site([_ -])?url\]/i",
            "/\[password([_ -])?url\]/i",
        ), array
        (
            $user->user_login,
            site_url('/'),
            network_site_url('wp-login.php?action=rp&key=' . $key . '&login=' . rawurlencode($user->user_login), 'login'),
        ), $message);

        $wp_new_user_notification_email['message'] = $message;
    }

    if(is_array($wp_new_user_notification_email['headers']))
    {
        $wp_new_user_notification_email['headers'] = implode("\r\n", $wp_new_user_notification_email['headers']);
    }

    $wp_new_user_notification_email['headers'] .= 'Content-Type: text/html; charset=UTF-8';

    return $wp_new_user_notification_email;
}, 10, 3);

add_filter('wp_mail_from', function($from)
{
    if(stristr($from, 'wordpress'))
    {
        $from = 'no-reply@' . preg_replace("/^https?:\/\/(www\.)?(.*?)\/(.*)?$/i", "$2", site_url('/'));
    }

    return $from;
});

add_filter('wp_mail_from_name', function($from)
{
    if(stristr($from, 'wordpress'))
    {
        $from = get_bloginfo('name');
    }

    return $from;
});
