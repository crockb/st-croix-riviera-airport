<?php

/* **************************************************************************************************** */
// Setup Theme
/* **************************************************************************************************** */

add_action('after_setup_theme', 'simpleshift_pro_setup');

if (!function_exists('simpleshift_pro_setup')):

    function simpleshift_pro_setup() {


       // Localization

        $lang_local = get_template_directory() . '/lang';
        load_theme_textdomain('simpleshift-pro', $lang_local);

        // Register Thumbnail Sizes

        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1170, 9999, true);
        add_image_size('simpleshift_pro_750_500', 750, 500, true);


        // Load feed links

        add_theme_support('automatic-feed-links');

        // Support Custom Background

        $simpleshift_pro_custom_background_defaults = array(
            'default-color' => 'eeedec'
        );
        add_theme_support( 'custom-background', $simpleshift_pro_custom_background_defaults );

        // Register Menus

        register_nav_menu('primary', __('Primary Menu', 'simpleshift-pro'));
        
        // Support title tag
        
        add_theme_support( "title-tag" );
        
        // Support WooCommerce
        
        add_theme_support( 'woocommerce' );
        
        // Set Content Width
        
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1170;
        }
    }

endif;




/* **************************************************************************************************** */
// Load API
/* **************************************************************************************************** */

define("FOUNDRY", "ts"); // nt, ts

// Set debug for API to false by default
if (trim(get_option( 'api_sm_themes_debug' )) == '') {
	update_option( 'api_sm_themes_debug', 'false' );
}

// Set API to true by default
if (trim(get_option( 'api_sm_themes' )) == '') {
	update_option( 'api_sm_themes', 'true' );
}

// Run API
if (trim(get_option( 'api_sm_themes' )) == 'true') {
    require get_template_directory() . '/inc/api/API_SM_Themes.php';
}


/* **************************************************************************************************** */
// Load Admin Panel
/* **************************************************************************************************** */


require_once(get_template_directory() . '/inc/admin/admin-init.php');
require_once(get_template_directory() . '/inc/pro/class-customize.php');


/* **************************************************************************************************** */
// Load Meta Boxes
/* **************************************************************************************************** */


require_once(get_template_directory() . '/inc/meta_boxes.php');


// #################################################
// Custom Widgets
// #################################################
 
require_once(get_template_directory() . '/inc/widgets.php');


// #################################################
// Custom NavWalker
// #################################################
 
require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');




/* **************************************************************************************************** */
// Clear Helper/s
/* **************************************************************************************************** */

function simpleshift_pro_clear($ht = "0") {
echo "<div class='clear' style='height:" . $ht . "px;'></div>";
}



/* **************************************************************************************************** */
// Modify Search Form
/* **************************************************************************************************** */

function simpleshift_pro_modify_search_form($form) {
    $form = '<form method="get" id="searchform" action="' . home_url() . '/" >';
    if (is_search()) {
        $form .='<input type="text" value="' . esc_attr(apply_filters('the_search_query', get_search_query())) . '" name="s" id="s" />';
    } else {
        $form .='<input type="text" value="Search" name="s" id="s"  onfocus="if(this.value==this.defaultValue)this.value=\'\';" onblur="if(this.value==\'\')this.value=this.defaultValue;"/>';
    }
    $form .= '<input type="image" id="searchsubmit" src="' . get_stylesheet_directory_uri() . '/assets/assets/images/search_icon.png" />
            </form>';
    return $form;
}
add_filter('get_search_form', 'simpleshift_pro_modify_search_form');


/* **************************************************************************************************** */
// Override gallery style
/* **************************************************************************************************** */

add_filter( 'use_default_gallery_style', '__return_false' );




/* **************************************************************************************************** */
// More Tag
/* **************************************************************************************************** */

function simpleshift_pro_wrap_more_tag($link){
return "<p class='more_tag_wrap'>$link</p>";
}
add_filter('the_content_more_link', 'simpleshift_pro_wrap_more_tag');


/* **************************************************************************************************** */
// Register Sidebars
/* **************************************************************************************************** */

add_action('widgets_init', 'simpleshift_pro_register_sidebars');

function simpleshift_pro_register_sidebars() {

    register_sidebar(array(
        'name' => __('Default Page Sidebar', 'simpleshift-pro'),
        'id' => 'sidebar_pages',
        'description' => __('Widgets in this area will be displayed in the sidebar on the pages.', 'simpleshift-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Default Blog Sidebar', 'simpleshift-pro'),
        'id' => 'sidebar_blog',
        'description' => __('Widgets in this area will be displayed in the sidebar on the blog and posts.', 'simpleshift-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));
    
    // frontpage - featured - left
    register_sidebar(array(
        'id' => 'frontpage-featured-left',
        'name' => __('Frontpage Featured Left', 'simpleshift-pro'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));

    // frontpage - featured - center
    register_sidebar(array(
        'id' => 'frontpage-featured-center',
        'name' => __('Frontpage Featured Center', 'simpleshift-pro'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
    
    // frontpage - featured - right
    register_sidebar(array(
        'id' => 'frontpage-featured-right',
        'name' => __('Frontpage Featured Right', 'simpleshift-pro'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));

       // frontpage - about
    register_sidebar(array(
        'id' => 'frontpage-about',
        'name' => __('Frontpage About', 'simpleshift-pro'),
        'before_widget' => '<div class="col-sm-3 col-centered item">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
    
    // frontpage - team - left
    register_sidebar(array(
        'id' => 'frontpage-team-left',
        'name' => __('Frontpage Team Left', 'simpleshift-pro'),
        'before_widget' => '<div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="team-item-title">',
        'after_title' => '</h4>'
    ));

    // frontpage - team - center left
    register_sidebar(array(
        'id' => 'frontpage-team-center-left',
        'name' => __('Frontpage Team Center Left', 'simpleshift-pro'),
        'before_widget' => '<div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="team-item-title">',
        'after_title' => '</h4>'
    ));
    
    // frontpage - team - center right
    register_sidebar(array(
        'id' => 'frontpage-team-center-right',
        'name' => __('Frontpage Team Center Right', 'simpleshift-pro'),
        'before_widget' => '<div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="team-item-title">',
        'after_title' => '</h4>'
    ));
    
    // frontpage - team - right
    register_sidebar(array(
        'id' => 'frontpage-team-right',
        'name' => __('Frontpage Team Right', 'simpleshift-pro'),
        'before_widget' => '<div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="team-item-title">',
        'after_title' => '</h4>'
    ));   
    
    // frontpage - social
    register_sidebar(array(
        'id' => 'frontpage-social-media',
        'name' => __('Frontpage Social Media', 'simpleshift-pro'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));

    // create 50 alternate sidebar widget areas for use on post and pages
    $i = 1;
    while ($i <= 50) {
        register_sidebar(array(
            'name' => __('Alternate Sidebar #', 'simpleshift-pro') . $i,
            'id' => 'sidebar_' . $i,
            'description' => __('Widgets in this area will be displayed in the sidebar for any posts or pages that are tagged with sidebar', 'simpleshift-pro') . $i . '.',
            'before_widget' => '<div class="%1$s" class="widget %2$s widget sidebar_widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget_title">',
            'after_title' => '</h3>'
        ));
        $i++;
    }
}




/* **************************************************************************************************** */
// Excerpt Modifications
/* **************************************************************************************************** */

// Excerpt Length

add_filter('excerpt_length', 'simpleshift_pro_excerpt_length');

function simpleshift_pro_excerpt_length($length) {
    return 30;
}

// Excerpt More

add_filter('excerpt_more', 'simpleshift_pro_excerpt_more');

function simpleshift_pro_excerpt_more($more) {
    return '';
}

// Add to pages

add_action('init', 'simpleshift_pro_add_excerpts_to_pages');

function simpleshift_pro_add_excerpts_to_pages() {
    add_post_type_support('page', 'excerpt');
}


function simpleshift_pro_get_the_excerpt_by_id($post_id) {
  global $post;
  $save_post = $post;
  $post = get_post($post_id);
  $output = get_the_excerpt();
  $post = $save_post;
  return $output;
}

/* **************************************************************************************************** */
// Enable Threaded Comments
/* **************************************************************************************************** */

add_action('wp_enqueue_scripts', 'simpleshift_pro_threaded_comments');

function simpleshift_pro_threaded_comments() {
    if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
        wp_enqueue_script('comment-reply');
    }
}

/* **************************************************************************************************** */
// Modify Comments Output
/* **************************************************************************************************** */

if (!function_exists('simpleshift_pro_comment')){
    function simpleshift_pro_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        ?>
        <li <?php comment_class(); ?> id="li_comment_<?php comment_ID() ?>">
            <div id="comment_<?php comment_ID(); ?>" class="comment_wrap clearfix">
                <?php echo get_avatar($comment, $size = '75'); ?>
                <div class="comment_content">
                    <p class="left"><strong><?php comment_author_link(); ?></strong><br />
                    <?php echo(get_comment_date()) ?> <?php edit_comment_link(__('(Edit)', 'simpleshift-pro'), '  ', '') ?></p>
                    <p class="right"><?php comment_reply_link(array_merge($args, array('reply_text' => __('Leave a Reply', 'simpleshift-pro'), 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
                    <div class="clear"></div>
                    <?php
                    if ($comment->comment_approved == '0') {
                    ?>
                        <em><?php _e('Your comment is awaiting moderation.', 'simpleshift-pro') ?></em>
                    <?php
                    }
                    ?>
                    <?php comment_text() ?>
                </div>
                <div class="clear"></div>
            </div>
    <?php
    }
}


/* **************************************************************************************************** */
// Modify Ping Output
/* **************************************************************************************************** */

if (!function_exists('simpleshift_pro_ping')){
    function simpleshift_pro_ping($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        ?>
        <li id="comment_<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?>
    <?php
    }
}


/* **************************************************************************************************** */
// Modify Comment Text Fields
/* **************************************************************************************************** */

add_filter('comment_form_default_fields', 'simpleshift_pro_comment_fields');

if (!function_exists('simpleshift_pro_comment_fields')){
    function simpleshift_pro_comment_fields($fields) {

        $commenter = wp_get_current_commenter();
        $req = get_option('require_name_email');
        $aria_req = ( $req ? " aria-required='true'" : '' );

        $fields['author'] = '<div class="row"><div class="col-md-4 comment_fields"><p class="comment-form-author">' . '<label for="author">' . __('Name', 'simpleshift-pro') . '</label> ' . ( $req ? '<span class="required">*</span><br />' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>';
        $fields['email'] = '<p class="comment-form-email"><label for="email">' . __('Email', 'simpleshift-pro') . '</label> ' . ( $req ? '<span class="required">*</span><br />' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p>';
        $fields['url'] = '<p class="comment-form-url"><label for="url">' . __('Website', 'simpleshift-pro') . '</label><br />' . '<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p></div> ';

        return $fields;
    }
}


/* **************************************************************************************************** */
// Modify Avatar Classes
/* **************************************************************************************************** */

add_filter('get_avatar','simpleshift_pro_avatar_class');

if (!function_exists('simpleshift_pro_avatar_class')){
    function simpleshift_pro_avatar_class($class) {
        $class = str_replace("class='avatar", "class='avatar img-responsive", $class) ;
        return $class;
    }
}


/* **************************************************************************************************** */
// Add Image Classes ##Look for way to apply to exsisting
/* **************************************************************************************************** */

function simpleshift_pro_add_image_class($class){
    $class .= ' img-responsive';
    return $class;
}
add_filter('get_image_tag_class','simpleshift_pro_add_image_class');


/* **************************************************************************************************** */
// Load Public Scripts
/* **************************************************************************************************** */

add_action('wp_enqueue_scripts', 'simpleshift_pro_public_scripts');

function simpleshift_pro_public_scripts() {

    if (!is_admin()) {
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.0.0');
        wp_enqueue_script('waypoints',get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js','','3.1.1',true);
        wp_enqueue_script('scrollreveal',get_template_directory_uri() . '/assets/js/scrollReveal.min.js','','2.3.2',true);
        wp_enqueue_script('easing',get_template_directory_uri() . '/assets/js/jquery.easing.min.js','','1.3',true);
        wp_enqueue_script('waypoints-sticky',get_template_directory_uri() . '/assets/js/sticky.min.js','','3.1.1',true);
        wp_enqueue_script('nicescroll',get_template_directory_uri() . '/assets/js/jquery.nicescroll.min.js','','3.6.8',true);
        wp_enqueue_script('parallax',get_template_directory_uri() . '/assets/js/parallax.min.js','','3.1.1',true);
        wp_enqueue_script('simpleshift_public',get_template_directory_uri() . '/assets/js/public.js','','1.0.0',true);
        wp_enqueue_script('simpleshift_public','https://www.google.com/recaptcha/api.js','','1.0.0',false);
    }
}

/* **************************************************************************************************** */
// Load Public Scripts in Conditional
/* **************************************************************************************************** */

add_action('wp_head', 'simpleshift_pro_public_scripts_conditional');

function simpleshift_pro_public_scripts_conditional() { ?>
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5shiv.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/respond.min.js"></script>
    <![endif]-->
    <?php if ( simpleshift_pro_get_option('contact-recaptcha-sitekey') ) { echo "<script src='https://www.google.com/recaptcha/api.js'></script>"; }
}


/* **************************************************************************************************** */
// Load Custom Styles
/* **************************************************************************************************** */

add_action('wp_head', 'simpleshift_pro_custom_media_queries');

if (!function_exists('simpleshift_pro_custom_media_queries')){
    function simpleshift_pro_custom_media_queries() {
        echo "<style>";
        echo esc_html(simpleshift_pro_get_option('custom-css-primary')); 
        echo "@media (min-width: 1200px) {" . esc_html(simpleshift_pro_get_option('custom-css-1200px')) . "}";
        echo "@media (min-width: 992px) and (max-width: 1200px) {" . esc_html(simpleshift_pro_get_option('custom-css-992px-1200px')) . "}";
        echo "@media (min-width: 768px) and (max-width: 991px) {" . esc_html(simpleshift_pro_get_option('custom-css-768px-991px')) . "}";
        echo "@media (max-width: 767px) {" . esc_html(simpleshift_pro_get_option('custom-css-768px')) . "}";
        echo "</style>";
    }
}

/* **************************************************************************************************** */
// Load Public CSS
/* **************************************************************************************************** */


add_action('wp_enqueue_scripts', 'simpleshift_pro_public_styles');

function simpleshift_pro_public_styles() {

    if (!is_admin()) {

        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0', 'all');
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '1.0', 'all');
        wp_enqueue_style( 'raleway', '//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,700', array(), '1.0', 'all');
        wp_enqueue_style( 'lato', '//fonts.googleapis.com/css?family=Lato:400,100,300,700,100italic,300italic,400italic', array(), '1.0', 'all');
        wp_enqueue_style( 'simpleshift-style', get_bloginfo( 'stylesheet_url' ), false, get_bloginfo('version') );

    }
}


/* **************************************************************************************************** */
// Scrollto in footer
/* **************************************************************************************************** */

add_action('wp_footer', 'simpleshift_pro_contact_js', 99);

function simpleshift_pro_contact_js() {
    global $post;
    if(isset($_POST['submitted'])) {
        if (simpleshift_pro_get_option('fp-contact-slug')=='') {$scrolltoform="contact";} else {$scrolltoform=simpleshift_pro_get_option('fp-contact-slug');}
        ?>
    	<script>
    	    var offset = jQuery("#<?php echo $scrolltoform; ?>").height();
            jQuery('html, body').stop().animate({
                scrollTop: jQuery("#<?php echo $scrolltoform; ?>").offset().top + offset
            }, 1000, 'easeInOutQuad');
        </script>
    <?php }
}


/* **************************************************************************************************** */
// WooCommerce Support
/* **************************************************************************************************** */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'simpleshift_pro_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'simpleshift_pro_wrapper_end', 10);

function simpleshift_pro_wrapper_start() {
  echo '<div class="container"><div class="content row"><div class="col-xs-12 content-column">';
}

function simpleshift_pro_wrapper_end() {
  echo '</div></div></div>';
}