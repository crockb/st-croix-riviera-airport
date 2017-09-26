<?php
  

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }



    // #################################################
    // This is your option name where all the Redux data is stored.
    // #################################################

    $opt_name = "simpleshift_options";



    // #################################################
    // Reg js spicifiv to the customizer
    // #################################################

    function simpleshift_pro_customizer_scripts() {

        wp_register_script( 'customizer_scripts', get_template_directory_uri() . '/js/customizer.js', array("jquery"), '', true  );
        wp_enqueue_script( 'customizer_scripts' );

    }
    add_action( 'customize_controls_enqueue_scripts', 'simpleshift_pro_customizer_scripts' );
    
    
    function simpleshift_pro_customizer_styles() { ?>
    	<style type="text/css">
    	    .customizer-header-button.simpleshift-lite-hide{display:none!important;}
            .button-simpleshift{background: #e92c6a!important; border-color:#e92c6a!important; -webkit-box-shadow: 0 1px 0 #e92c6a!important; box-shadow: 0 1px 0 #e92c6a!important; color: #fff!important; text-decoration: none!important; text-shadow: 0 -1px 1px #e92c6a,1px 0 1px #e92c6a,0 1px 1px #e92c6a,-1px 0 1px #e92c6a!important;width: 80%!important; margin: 5px auto 5px auto!important; display: block!important; text-align: center!important;margin-top:15px!important;margin-bottom:15px!important;}
            .button-simpleshift-secondary{width: 80%!important;margin: 5px auto 5px auto!important; display: block!important; text-align: center!important;margin-top:15px!important;margin-bottom:15px!important;}
    	</style>
    <?php }
    add_action( 'customize_controls_print_styles', 'simpleshift_pro_customizer_styles', 20 );
    
    
    
    // #################################################
    // Duplicate and import any free theme options we can
    // #################################################
    
    $lite_mod=get_option( 'theme_mods_simpleshift' );
    $pro_mod=get_option( 'theme_mods_simpleshift-pro' );
    if ($lite_mod) {
        if (!isset( $pro_mod['simpleshift_options'] )) {
            $new_mod=array('simpleshift_options-mods'=>$lite_mod);
            add_option( 'theme_mods_simpleshift-pro', $new_mod, '', 'yes');
        } 
    }
    

    // #################################################
    // Get Option Helper
    // #################################################

    
    function simpleshift_pro_get_option($optionID, $default_data = false) {
        global $simpleshift_options;

        $options = $simpleshift_options;
        if (isset($options[$optionID])) {
            return $options[$optionID];
        } else {
            return NULL;
        }
    }
    
                    


    // #################################################
    // SET ARGUMENTS
    // #################################################

    $theme = wp_get_theme(); 

    $args = array(
        'opt_name' => 'simpleshift_options',
        'page_title' => 'Simple Business Theme Options',
        'update_notice' => TRUE,
        'intro_text' => '',
        'footer_text' => '',
        'admin_bar' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => 'Simple Business Theme Options',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'customizer' => TRUE,
        'default_mark' => '*',
        'dev_mode' => FALSE,
        'hints' => array(
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => FALSE,
        'show_import_export' => TRUE,
        'database' => 'theme_mods',
        'transient_time' => '3600',
        'network_sites' => TRUE,
        'customizer_only' => TRUE,
        'use_cdn' => FALSE,
    );

    Redux::setArgs( $opt_name, $args );



    // #################################################
    // Sections
    // #################################################
    
    
        Redux::setSection( $opt_name, array(
        'title'            => __( 'User guide', 'simpleshift-pro'),
        'id'               => 'userguide_settings',
        'desc'             => __( '', 'simpleshift-pro'),
        'customizer_width' => '450px',
        'fields'     => array(
            array(
                'id'       => 'userguide',
                'type'     => 'raw',
                'title'    => __( '', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => __( 'This theme was designed to be very easy to set up but just in case we\'ve created a userguide to assist: ', 'simpleshift-pro' ) . '<a href="https://docs.google.com/document/d/1c4osv1lX2t2Ta3blacYVz7n3q0BLYLWaoi6yMW8ILKo/" target="_blank" class="button button-simpleshift-secondary">View User Guide</a>',
            ),
        )
        ) );
 
        
        Redux::setSection( $opt_name, array(
        'title'            => __( 'General', 'simpleshift-pro'),
        'id'               => 'general_settings',
        'desc'             => __( '', 'simpleshift-pro'),
        'customizer_width' => '450px',
        'fields'     => array(
           array(
                'id'       => 'logo',
                'type'     => 'text',
                'title'    => __('Text Logo', 'simpleshift-pro'),
                'subtitle' => __('', 'simpleshift-pro'),
                'desc'     => __('', 'simpleshift-pro'),
                'default'  => get_bloginfo( 'name' )
            ),
            array(
                'id'       => 'image-logo',
                'type'     => 'media', 
                'url'      => true,
                'title'    => __('Image Logo', 'simpleshift-pro'),
                'desc'     => __('Will override the text logo.', 'simpleshift-pro'),
                'subtitle' => __('', 'simpleshift-pro'),
                'default'  => array(
                    'url'=>''
                ),
            ),
            array(
                'id'       => 'copyright',
                'type'     => 'text',
                'title'    => __('Copyright Text', 'simpleshift-pro'),
                'subtitle' => __('', 'simpleshift-pro'),
                'desc'     => __('', 'simpleshift-pro'),
                'default'  => get_bloginfo( 'name' )
            ),
            array(
                'id'       => 'home-slug',
                'type'     => 'text',
                'title'    => __( 'Top of Homepage Navigation Menu ID', 'simpleshift-pro'),
                'subtitle' => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default shown in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://mysite.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://mysite.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => 'home',
            ),
            array(
                'id'       => 'space34453',
                'type'     => 'raw',
                'title'    => __( '', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '<br><br>',
            ),
        )
        ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Typography, Color & Design', 'simpleshift-pro'),
        'id'               => 'typography-styles',
        'desc'             => __( '', 'simpleshift-pro'),
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'opt-typography-body-styles',
                'type'     => 'typography',
                'output'   => 'body',
                'title'    => __( 'Body Font', 'simpleshift-pro'),
                'subtitle' => __( 'Specify the body font properties.', 'simpleshift-pro'),
                'google'   => true,
                'text-align'  => false,
                'line-height' => false,
                'font-style'  => false,
                'default'  => array(
                    'color'       => '#555555',
                    'font-size'   => '14px',
                    'font-family' => 'Lato',
                    'font-weight' => '300', 
                ),
            ),
            array(
                'id'       => 'opt-link-color',
                'type'     => 'link_color',
                'title'    => __('Links Color Option', 'simpleshift-pro'),
                'subtitle' => __('', 'simpleshift-pro'),
                'desc'     => __('', 'simpleshift-pro'),
                'default'  => array(
                    'regular'  => '#555555',
                    'hover'    => '#3a3a3a',
                    'active'   => '#555555',
                    'visited'  => '#555555',
                ),
                'output'    => array('a'),
            ),
            array(
                'id'       => 'opt-typography-title-styles',
                'type'     => 'typography',
                'output'   => 'h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, .titlefamily',
                'title'    => __( 'Titles Font', 'simpleshift-pro'),
                'subtitle' => __( 'Specify the font family for all the titles across the website.', 'simpleshift-pro'),
                'google'   => true,
                'text-align'  => false,
                'line-height' => false,
                'font-style'  => false,
                'color'       => false,
                'font-size'   => false,
                'font-weight' => false,
                'default'  => array(
                    'font-family' => 'Lato' 
                ),
            ),
            array(
                'id'       => 'opt-typography-menu-styles',
                'type'     => 'typography',
                'output'   => '#menu_row a',
                'title'    => __( 'Menu Font', 'simpleshift-pro'),
                'subtitle' => __( 'Specify the font family for menu.', 'simpleshift-pro'),
                'google'   => true,
                'text-align'  => false,
                'line-height' => false,
                'font-style'  => false,
                'color'       => false,
                'font-size'   => false,
                'font-weight' => false,
                'default'  => array(
                    'font-family' => 'Lato' 
                ),
            ),
            array(
                'id'       => 'opt-typography-logo-styles',
                'type'     => 'typography',
                'output'   => '#menu_row.navbar-default .navbar-brand, #menu_row.navbar-default .navbar-brand:hover',
                'title'    => __( 'Logo Font', 'simpleshift-pro'),
                'subtitle' => __( 'Specify the font family for logo.', 'simpleshift-pro'),
                'google'   => true,
                'text-align'  => false,
                'line-height' => false,
                'font-style'  => false,
                'color'       => false,
                'font-size'   => false,
                'font-weight' => false,
                'default'  => array(
                    'font-family' => 'Lato' 
                ),
            ),
            array(
                'id'        => 'accent-color-rgba',
                'type'      => 'color_rgba',
                'title'     => 'Theme Accent Color',
                'subtitle'  => 'Set the color and alfa channel for the main accent color around the website. This color will display when you hover over buttons and other small details around the theme.',
                'desc'      => '',
                'output'    => array('background-color' => '.btn-simpleshift,a.btn-simpleshift,.btn-simpleshift-ghost,a.btn-simpleshift-ghost,.dropdown-menu li:hover a,.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus,.frontpage-about .item a:hover i,.frontpage-team .team-social-icons a:hover i,.frontpage-social .inline-center-wrapper div a i','border-color' => '.btn-simpleshift,a.btn-simpleshift,.tax_tags,.frontpage-team .team-social-icons a:hover i','color' => '.btn-simpleshift:hover,a.btn-simpleshift:hover,.btn-simpleshift-ghost:hover,a.btn-simpleshift-ghost:hover,.single_post_nav a,.frontpage_featured_item i,.frontpage-about .item i,.frontpage-team .team-social-icons a i,.frontpage-social .inline-center-wrapper div a:hover i'),
                'compiler'  => false,
                'default'   => array(
                    'color'     => '#d65050',
                    'alpha'     => '1'
                ),
            ),
            array(
                'id'       => 'parallax-active-title-color',
                'type'     => 'typography',
                'output'   => '.frontpage-row.parallax_active .h1,.frontpage-row.parallax_active .h4',
                'title'    => __( 'Parallax Active Title Color', 'simpleshift-pro'),
                'subtitle' => __( 'Pick a text color for the titles in rows that have the parallax background turned on.', 'simpleshift-pro'),
                'google'   => true,
                'text-align'  => false,
                'line-height' => false,
                'font-style'  => false,
                'font-size'   => false,
                'font-family' => false,
                'font-weight' => false,
                'default'  => array(
                    'color'       => '#ffffff' 
                ),
            ),
            
            array(
                'id'       => 'banner-title-color',
                'type'     => 'color',
                'output'   => array(
                    'border-color' => '.banner-wrap',
                    'color' => '.frontpage-banner .banner-title,.subpage-banner .banner-title,.frontpage-banner .banner-sub-title',
                ),
                'title'    => __('Banner Text Color', 'simpleshift-pro'), 
                'subtitle' => __('Pick a text color for the titles in banner row.', 'simpleshift-pro'),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
            
        )
    ) ); 


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header Social Media', 'simpleshift-pro'),
        'id'               => 'social',
        'desc'             => __( '', 'simpleshift-pro'),
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'social-toggle',
                'type'     => 'button_set',
                'title'    => __( 'Social Icons Status', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'options'  => array(
                    '1' => 'Show',
                    '2' => 'Demo',
                    '3' => 'Hide'
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'simpleshift_facebook_url',
                'type'     => 'text',
                'title'    => __( 'Facebook URL', 'simpleshift-pro'),
                'subtitle' => __( 'Your Facebook page URL.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'simpleshift_linkedin_url',
                'type'     => 'text',
                'title'    => __( 'LinkedIn URL', 'simpleshift-pro'),
                'subtitle' => __( 'Your LinkedIn page URL.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'simpleshift_twitter_url',
                'type'     => 'text',
                'title'    => __( 'Twitter Feed URL', 'simpleshift-pro'),
                'subtitle' => __( 'Your Twitter page URL.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'simpleshift_google_plus_url',
                'type'     => 'text',
                'title'    => __( 'Google+ URL', 'simpleshift-pro'),
                'subtitle' => __( 'Your Google+ page URL.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'simpleshift_vimeo_url',
                'type'     => 'text',
                'title'    => __( 'Vimeo URL', 'simpleshift-pro'),
                'subtitle' => __( 'Your Vimeo page URL.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'simpleshift_flickr_url',
                'type'     => 'text',
                'title'    => __( 'Flickr URL', 'simpleshift-pro'),
                'subtitle' => __( 'Your Flickr page URL.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'simpleshift_wpcom_url',
                'type'     => 'text',
                'title'    => __( 'WordPress.com URL', 'simpleshift-pro'),
                'subtitle' => __( 'Your WordPress.com page URL.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'simpleshift_pinterest_url',
                'type'     => 'text',
                'title'    => __( 'Pinterest URL', 'simpleshift-pro'),
                'subtitle' => __( 'Your Pinterest page URL.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'simpleshift_instagram_url',
                'type'     => 'text',
                'title'    => __( 'Instagram URL', 'simpleshift-pro'),
                'subtitle' => __( 'Your Instagram page URL.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'simpleshift_tumblr_url',
                'type'     => 'text',
                'title'    => __( 'Tumblr URL', 'simpleshift-pro'),
                'subtitle' => __( 'Your Tumblr page URL.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'simpleshift_mail_url',
                'type'     => 'text',
                'title'    => __( 'Email Address', 'simpleshift-pro'),
                'subtitle' => __( 'Your email address.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'simpleshift_hide_rss_icon',
                'type'     => 'checkbox',
                'title'    => __( 'Hide RSS Icon', 'simpleshift-pro'),
                'subtitle' => __( 'Choose to show or hide the rss icon in the header of your website.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '0'// 1 = on | 0 = off
            ),
        )
    ) );
    

    
    
    
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Banner', 'simpleshift-pro'),
        'id'               => 'fp-banner',
        'desc'             => __( '', 'simpleshift-pro'),
        'customizer_width' => '450px'
        ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Frontpage Banner - General', 'simpleshift-pro'),
        'id'               => 'banner-select',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => '',
        'fields'           => array(
            array(
                'id'       => 'fp-banner-toggle',
                'type'     => 'button_set',
                'title'    => __( 'Frontpage Banner Status', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'options'  => array(
                    '1' => 'Banner',
                    '2' => 'Demo',
                    '3' => 'Slideshow'
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'fp-banner-background-color',
                'type'     => 'color',
                'output'   => array(
                    'background-color' => '.frontpage-banner'
                ),
                'title'    => __('Row Background Color', 'simpleshift-pro'), 
                'subtitle' => __('Pick a background color for the row.', 'simpleshift-pro'),
                'default'  => '#ea940d',
                'validate' => 'color',
            ),
            array(
                'id'       => 'fp-banner-background-image',
                'type'     => 'media',
                'output'   => array( '.frontpage-banner' ),
                'title'    => __( 'Parallax Row Background', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
            ),
        )
    ) );


Redux::setSection( $opt_name, 
    array(
        'title'            => __( 'Frontpage Static Banner', 'simpleshift-pro'),
        'id'               => 'banner-options',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => '',
        'fields'           => array(
            
            array(
                'id'       => 'fp-banner-title',
                'type'     => 'text',
                'title'    => __( 'Banner - Main Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the big text in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-banner-sub-title',
                'type'     => 'text',
                'title'    => __( 'Banner - Sub Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the smaller text in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-banner-button-text',
                'type'     => 'text',
                'title'    => __( 'Banner - Button Text', 'simpleshift-pro'),
                'subtitle' => __( 'This is the button in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-banner-button-url',
                'type'     => 'text',
                'title'    => __( 'Banner - Button Destination URL', 'simpleshift-pro'),
                'subtitle' => __( 'This is the button link destination in the banner.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'space2',
                'type'     => 'raw',
                'title'    => __( '', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '<br><br>',
            ),
        )
    ) 
);



Redux::setSection( $opt_name, 
    array(
        'title'            => __( 'Frontpage Slideshow', 'simpleshift-pro'),
        'id'               => 'slideshow-options',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => '',
        'fields'           => array(
            array(
                'id'       => 'fp-slide1-title',
                'type'     => 'text',
                'title'    => __( 'Slide 1 - Main Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the big text in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-slide1-sub-title',
                'type'     => 'text',
                'title'    => __( 'Slide 1 - Sub Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the smaller text in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-slide1-button-text',
                'type'     => 'text',
                'title'    => __( 'Slide 1 - Button Text', 'simpleshift-pro'),
                'subtitle' => __( 'This is the button in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-slide1-button-url',
                'type'     => 'text',
                'title'    => __( 'Slide 1 - Button Destination URL', 'simpleshift-pro'),
                'subtitle' => __( 'This is the button link destination in the banner.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'   => 'slide1-divide',
                'type' => 'divide'
            ),
            array(
                'id'       => 'fp-slide2-title',
                'type'     => 'text',
                'title'    => __( 'Slide 2 - Main Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the big text in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-slide2-sub-title',
                'type'     => 'text',
                'title'    => __( 'Slide 2 - Sub Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the smaller text in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-slide2-button-text',
                'type'     => 'text',
                'title'    => __( 'Slide 2 - Button Text', 'simpleshift-pro'),
                'subtitle' => __( 'This is the button in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-slide2-button-url',
                'type'     => 'text',
                'title'    => __( 'Slide 2 - Button Destination URL', 'simpleshift-pro'),
                'subtitle' => __( 'This is the button link destination in the banner.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'   => 'slide2-divide',
                'type' => 'divide'
            ),
            array(
                'id'       => 'fp-slide3-title',
                'type'     => 'text',
                'title'    => __( 'Slide 3 - Main Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the big text in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-slide3-sub-title',
                'type'     => 'text',
                'title'    => __( 'Slide 3 - Sub Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the smaller text in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-slide3-button-text',
                'type'     => 'text',
                'title'    => __( 'Slide 3 - Button Text', 'simpleshift-pro'),
                'subtitle' => __( 'This is the button in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-slide3-button-url',
                'type'     => 'text',
                'title'    => __( 'Slide 3 - Button Destination URL', 'simpleshift-pro'),
                'subtitle' => __( 'This is the button link destination in the banner.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'   => 'slide3-divide',
                'type' => 'divide'
            ),
            array(
                'id'       => 'fp-slide4-title',
                'type'     => 'text',
                'title'    => __( 'Slide 4 - Main Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the big text in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-slide4-sub-title',
                'type'     => 'text',
                'title'    => __( 'Slide 4 - Sub Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the smaller text in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-slide4-button-text',
                'type'     => 'text',
                'title'    => __( 'Slide 4 - Button Text', 'simpleshift-pro'),
                'subtitle' => __( 'This is the button in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-slide4-button-url',
                'type'     => 'text',
                'title'    => __( 'Slide 4 - Button Destination URL', 'simpleshift-pro'),
                'subtitle' => __( 'This is the button link destination in the banner.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'   => 'slide4-divide',
                'type' => 'divide'
            ),
            array(
                'id'       => 'fp-slide5-title',
                'type'     => 'text',
                'title'    => __( 'Slide 5 - Main Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the big text in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-slide5-sub-title',
                'type'     => 'text',
                'title'    => __( 'Slide 5 - Sub Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the smaller text in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-slide5-button-text',
                'type'     => 'text',
                'title'    => __( 'Slide 5 - Button Text', 'simpleshift-pro'),
                'subtitle' => __( 'This is the button in the banner. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-slide5-button-url',
                'type'     => 'text',
                'title'    => __( 'Slide 5 - Button Destination URL', 'simpleshift-pro'),
                'subtitle' => __( 'This is the button link destination in the banner.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'space3',
                'type'     => 'raw',
                'title'    => __( '', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '<br><br>',
            ),
            array(
                'id'       => 'space3',
                'type'     => 'raw',
                'title'    => __( '', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '<br><br>',
            ),
        )
    ) 
);


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Subpage Banner - General', 'simpleshift-pro'),
        'id'               => 'sub-banner-select',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => '',
        'fields'           => array(
            array(
                'id'       => 'sub-banner-toggle',
                'type'     => 'button_set',
                'title'    => __( 'Frontpage Banner Status', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'options'  => array(
                    '1' => 'Show',
                    '2' => 'Demo'
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'sub-banner-background-color',
                'type'     => 'color',
                'output'   => array(
                    'background-color' => '.subpage-banner'
                ),
                'title'    => __('Row Background Color', 'simpleshift-pro'), 
                'subtitle' => __('Pick a background color for the row.', 'simpleshift-pro'),
                'default'  => '#ea940d',
                'validate' => 'color',
            ),
            array(
                'id'       => 'sub-banner-background-image',
                'type'     => 'media',
                'title'    => __( 'Parallax Row Background', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
            ),
        )
    ) );
    

    



    Redux::setSection( $opt_name, array(
        'title'            => __( 'Frontpage Row Order', 'simpleshift-pro'),
        'id'               => 'fp-row-order',
        'desc'             => __( '', 'simpleshift-pro'),
        'customizer_width' => '450px',
        'fields'     => array(
            array(
                'id'       => 'frontpage-layout',
                'type'     => 'sortable',
                'title'    => 'Frontpage Row Stacking Order',
                'subtitle' => 'Drag and drop the frontpage sections into the order you would like them to display. If you have any difficulty saving this setting, please try editing one of the titles in the fields below. This should activate the save function.',
                'compiler' => 'true',
                'mode'     => 'text',
                'options'  => array(
                        'featured'     => 'Featured Content',
                        'action' => 'Call to Action #1',
                        'about'   => 'About Us',
                        'test'   => 'Testimonials',
                        'team'   => 'Team',
                        'news'   => 'News/Posts',
                        'action2'   => 'Call to Action #2',
                        'social'   => 'Social Media',
                        'contact'   => 'Contact Form'
                    
                ),
            )
        )
        ) );






Redux::setSection( $opt_name, 
    array(
        'title'            => __( 'Frontpage Featured Section', 'simpleshift-pro'),
        'id'               => 'fp-featured',
        'desc'             => __( '', 'simpleshift-pro'),
        'customizer_width' => '450px',
        'fields'           => array(
                        array(
                'id'       => 'featured-toggle',
                'type'     => 'button_set',
                'title'    => __( 'Featured Page Section Status', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'options'  => array(
                    '1' => 'Show',
                    '2' => 'Demo',
                    '3' => 'Hide'
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'fp-featured-background-color',
                'type'     => 'color',
                'output'   => array(
                    'background-color' => '.frontpage-featured'
                ),
                'title'    => __('Row Background Color', 'simpleshift-pro'), 
                'subtitle' => __('Pick a background color for the row.', 'simpleshift-pro'),
                'default'  => '#FFFFFF',
                'validate' => 'color',
            ),
            array(
                'id'       => 'fp-featured-background-image',
                'type'     => 'media',
                'output'   => array( '.frontpage-featured' ),
                'title'    => __( 'Parallax Row Background', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'default'   => array( ),
            ),
            array(
                'id'       => 'featured-widget-note',
                'type'     => 'raw',
                'title'    => __( 'Populate Featured Content', 'simpleshift-pro'),
                'subtitle' => __( 'To populate the featured content section, you will need to add featured content widgets to the Frontpage Featured widget areas. Go to the Widgets section under Apperance in the left sidebar.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '<br><br>',
            ),
            array(
                'id'       => 'fp-featured-slug',
                'type'     => 'text',
                'title'    => __( 'Navigation Menu ID', 'simpleshift-pro'),
                'subtitle' => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://mysite.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://mysite.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => 'featured',
            ),
            array(
                'id'       => 'space4',
                'type'     => 'raw',
                'title'    => __( '', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '<br><br>',
            )
        )
    )
);



Redux::setSection( $opt_name, 
    array(
        'title'            => __( 'Frontpage Action Row #1', 'simpleshift-pro'),
        'id'               => 'fp-action1',
        'desc'             => __( '', 'simpleshift-pro'),
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'fp-action1-toggle',
                'type'     => 'button_set',
                'title'    => __( 'Frontpage Action Row Status', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'options'  => array(
                    '1' => 'Show',
                    '2' => 'Demo',
                    '3' => 'Hide'
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'fp-action1-background-color',
                'type'     => 'color',
                'output'   => array(
                    'background-color' => '.frontpage-action1'
                ),
                'title'    => __('Row Background Color', 'simpleshift-pro'), 
                'subtitle' => __('Pick a background color for the row.', 'simpleshift-pro'),
                'default'  => '#d65050',
                'validate' => 'color',
            ),
            array(
                'id'       => 'fp-action1-background-image',
                'type'     => 'media',
                'output'   => array( '.frontpage-action1' ),
                'title'    => __( 'Parallax Row Background', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
            ),
            array(
                'id'       => 'fp-action1-title',
                'type'     => 'text',
                'title'    => __( 'Action Row #1 - Main Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the big text in the Action Row #1 section. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-action1-sub-title',
                'type'     => 'text',
                'title'    => __( 'Action Row #1 - Sub Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the smaller text in the Action Row #1 section. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-action1-button-text',
                'type'     => 'text',
                'title'    => __( 'Action Row #1 - Button Text', 'simpleshift-pro'),
                'subtitle' => __( 'This is the text in the button. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-action1-button-url',
                'type'     => 'text',
                'title'    => __( 'Action Row #1 - Button URL', 'simpleshift-pro'),
                'subtitle' => __( 'This is link destination for the button. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-action1-slug',
                'type'     => 'text',
                'title'    => __( 'Navigation Menu ID', 'simpleshift-pro'),
                'subtitle' => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://mysite.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://mysite.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box. ', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => 'action1',
            ),
            array(
                'id'       => 'space',
                'type'     => 'raw',
                'title'    => __( '', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '<br><br>',
            )
        )
    )
);   






Redux::setSection( $opt_name, 
    array(
        'title'            => __( 'Frontpage About Section', 'simpleshift-pro'),
        'id'               => 'fp-about',
        'desc'             => __( '', 'simpleshift-pro'),
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'fp-about-toggle',
                'type'     => 'button_set',
                'title'    => __( 'About Status', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'options'  => array(
                    '1' => 'Show',
                    '2' => 'Demo',
                    '3' => 'Hide'
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'fp-about-background-color',
                'type'     => 'color',
                'output'   => array(
                    'background-color' => '.frontpage-about'
                ),
                'title'    => __('Row Background Color', 'simpleshift-pro'), 
                'subtitle' => __('Pick a background color for the row.', 'simpleshift-pro'),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id'       => 'fp-about-background-image',
                'type'     => 'media',
                'output'   => array( '.frontpage-about' ),
                'title'    => __( 'Parallax Row Background', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
            ),
            array(
                'id'       => 'fp-about-title',
                'type'     => 'text',
                'title'    => __( 'About - Main Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the big text in the about section. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-about-sub-title',
                'type'     => 'text',
                'title'    => __( 'About - Sub Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the smaller text in the about section. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-about-description',
                'type'     => 'text',
                'title'    => __( 'About - Description', 'simpleshift-pro'),
                'subtitle' => __( 'This is the smallest text in the about section. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'about-widget-note',
                'type'     => 'raw',
                'title'    => __( 'Populate About Content', 'simpleshift-pro'),
                'subtitle' => __( 'To populate the About content section, you will need to add About content widgets to the Frontpage About widget areas. Go to the Widgets section under Apperance in the left sidebar.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '<br><br>',
            ),
            array(
                'id'       => 'fp-about-slug',
                'type'     => 'text',
                'title'    => __( 'Navigation Menu ID', 'simpleshift-pro'),
                'subtitle' => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://mysite.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://mysite.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => 'about',
            ),
            array(
                'id'       => 'space6',
                'type'     => 'raw',
                'title'    => __( '', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '<br><br>',
            ),
        )
    )
);



    Redux::setSection( $opt_name, array(
        'title'            => __( 'Frontpage Testimonial Section', 'simpleshift-pro'),
        'id'               => 'fp-test',
        'desc'             => __( '', 'simpleshift-pro'),
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'fp-test-toggle',
                'type'     => 'button_set',
                'title'    => __( 'Frontpage Testimonial Status', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'options'  => array(
                    '1' => 'Show',
                    '2' => 'Demo',
                    '3' => 'Hide'
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'fp-test-background-color',
                'type'     => 'color',
                'output'   => array(
                    'background-color' => '.frontpage-test'
                ),
                'title'    => __('Row Background Color', 'simpleshift-pro'), 
                'subtitle' => __('Pick a background color for the row.', 'simpleshift-pro'),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id'       => 'fp-test-background-image',
                'type'     => 'media',
                'output'   => array( '.frontpage-test' ),
                'title'    => __( 'Parallax Row Background', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
            ),
            array(
                'id'       => 'fp-test-title',
                'type'     => 'text',
                'title'    => __( 'Testimonial - Main Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the big text in the testimonial section. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-test-description',
                'type'     => 'textarea',
                'title'    => __( 'Testimonial', 'simpleshift-pro'),
                'subtitle' => __( 'This is the main body of the testimonial section. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-test-tag',
                'type'     => 'text',
                'title'    => __( 'Testimonial - Name', 'simpleshift-pro'),
                'subtitle' => __( 'This is the name under the testimonial section. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-test-tag-url',
                'type'     => 'text',
                'title'    => __( 'Testimonial - Website Link', 'simpleshift-pro'),
                'subtitle' => __( 'This is the link applied to the name above.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
                        array(
                'id'       => 'fp-test-slug',
                'type'     => 'text',
                'title'    => __( 'Navigation Menu ID', 'simpleshift-pro'),
                'subtitle' => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://mysite.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://mysite.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box. ', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => 'test',
            ),
        )
    ) );







Redux::setSection( $opt_name, 
    array(
        'title'            => __( 'Frontpage Team Section', 'simpleshift-pro'),
        'id'               => 'fp-team',
        'desc'             => __( '', 'simpleshift-pro'),
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'fp-team-toggle',
                'type'     => 'button_set',
                'title'    => __( 'Team Section Status', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'options'  => array(
                    '1' => 'Show',
                    '2' => 'Demo',
                    '3' => 'Hide'
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'fp-team-background-color',
                'type'     => 'color',
                'output'   => array(
                    'background-color' => '.frontpage-team'
                ),
                'title'    => __('Row Background Color', 'simpleshift-pro'), 
                'subtitle' => __('Pick a background color for the row.', 'simpleshift-pro'),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id'       => 'fp-team-background-image',
                'type'     => 'media',
                'output'   => array( '.frontpage-team' ),
                'title'    => __( 'Parallax Row Background', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
            ),
            array(
                'id'       => 'fp-team-title',
                'type'     => 'text',
                'title'    => __( 'Team - Main Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the big text in the featured section. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-team-sub-title',
                'type'     => 'text',
                'title'    => __( 'Team - Sub Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the smaller text in the featured section. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'team-widget-note',
                'type'     => 'raw',
                'title'    => __( 'Populate Team Content', 'simpleshift-pro'),
                'subtitle' => __( 'To populate the Team section, you will need to add Team member widgets to the Team Member widget areas.  Go to the Widgets section under Apperance in the left sidebar.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '<br><br>',
            ),
            array(
                'id'       => 'fp-team-slug',
                'type'     => 'text',
                'title'    => __( 'Navigation Menu ID', 'simpleshift-pro'),
                'subtitle' => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://mysite.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://mysite.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => 'team',
            ),
            array(
                'id'       => 'space8',
                'type'     => 'raw',
                'title'    => __( '', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '<br><br>',
            ),
        )
    )
);


Redux::setSection( $opt_name, 
    array(
        'title'            => __( 'Frontpage Action Row #2', 'simpleshift-pro'),
        'id'               => 'fp-action2',
        'desc'             => __( '', 'simpleshift-pro'),
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'fp-action2-toggle',
                'type'     => 'button_set',
                'title'    => __( 'Frontpage Action Row Status', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'options'  => array(
                    '1' => 'Show',
                    '2' => 'Demo',
                    '3' => 'Hide'
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'fp-action2-background-color',
                'type'     => 'color',
                'output'   => array(
                    'background-color' => '.frontpage-action2'
                ),
                'title'    => __('Row Background Color', 'simpleshift-pro'), 
                'subtitle' => __('Pick a background color for the row.', 'simpleshift-pro'),
                'default'  => '#4c5152',
                'validate' => 'color',
            ),
            array(
                'id'       => 'fp-action2-background-image',
                'type'     => 'media',
                'output'   => array( '.frontpage-action2' ),
                'title'    => __( 'Parallax Row Background', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
            ),
            array(
                'id'       => 'fp-action2-title',
                'type'     => 'text',
                'title'    => __( 'Action Row #2 - Main Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the big text in the Action Row #2 section. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-action2-button-text',
                'type'     => 'text',
                'title'    => __( 'Action Row #2 - Button Text', 'simpleshift-pro'),
                'subtitle' => __( 'This is the text in the button. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-action2-button-url',
                'type'     => 'text',
                'title'    => __( 'Action Row #2 - Button URL', 'simpleshift-pro'),
                'subtitle' => __( 'This is link destination for the button. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-action2-slug',
                'type'     => 'text',
                'title'    => __( 'Navigation Menu ID', 'simpleshift-pro'),
                'subtitle' => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://mysite.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://mysite.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => 'action2',
            ),
            array(
                'id'       => 'space7',
                'type'     => 'raw',
                'title'    => __( '', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '<br><br>',
            ),
        )
    )
);

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Frontpage Social Media Section', 'simpleshift-pro'),
        'id'               => 'fp-social',
        'desc'             => __( '', 'simpleshift-pro'),
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'fp-social-toggle',
                'type'     => 'button_set',
                'title'    => __( 'Social Row Status', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'options'  => array(
                    '1' => 'Show',
                    '2' => 'Demo',
                    '3' => 'Hide'
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'fp-social-background-color',
                'type'     => 'color',
                'output'   => array(
                    'background-color' => '.frontpage-social'
                ),
                'title'    => __('Row Background Color', 'simpleshift-pro'), 
                'subtitle' => __('Pick a background color for the row.', 'simpleshift-pro'),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id'       => 'fp-social-background-image',
                'type'     => 'media',
                'output'   => array( '.frontpage-social' ),
                'title'    => __( 'Parallax Row Background', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
            ),
            array(
                'id'       => 'social-widget-note',
                'type'     => 'raw',
                'title'    => __( 'Populate Social Media Section Content', 'simpleshift-pro'),
                'subtitle' => __( 'To populate the Social Media section, you will need to add Social Meida widgets to the Social Media widget areas.  Go to the Widgets section under Apperance in the left sidebar.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '<br><br>',
            ),
            array(
                'id'       => 'fp-social-slug',
                'type'     => 'text',
                'title'    => __( 'Navigation Menu ID', 'simpleshift-pro'),
                'subtitle' => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://mysite.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://mysite.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => 'social',
            ),
            array(
                'id'       => 'space9',
                'type'     => 'raw',
                'title'    => __( '', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '<br><br>',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Frontpage News Section', 'simpleshift-pro'),
        'id'               => 'fp-news',
        'desc'             => __( '', 'simpleshift-pro'),
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'fp-news-toggle',
                'type'     => 'button_set',
                'title'    => __( 'News Row Status', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'options'  => array(
                    '1' => 'Show',
                    '2' => 'Hide'
                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'fp-news-background-color',
                'type'     => 'color',
                'output'   => array(
                    'background-color' => '.frontpage-news'
                ),
                'title'    => __('Row Background Color', 'simpleshift-pro'), 
                'subtitle' => __('Pick a background color for the row.', 'simpleshift-pro'),
                'default'  => '#e7e7e7',
                'validate' => 'color',
            ),
            array(
                'id'       => 'fp-news-background-image',
                'type'     => 'media',
                'output'   => array( '.frontpage-news' ),
                'title'    => __( 'Parallax Row Background', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
            ),
            array(
                'id'       => 'news-note',
                'type'     => 'raw',
                'title'    => __( 'About News Section', 'simpleshift-pro'),
                'subtitle' => __( 'You can use this section as either a feed that displays your latest blog posts (the # of posts specified in Settings > Reading > #2), or a page. If you want the Blog to be a separate page completely go to Settings > Reading and make sure Frontpage displays... A static page... and select the HOME page (and create a HOME page if you have not already). Then, create a BLOG page and set the BLOG page as the Posts page option in Settings > Reading. If you do not want the blog to be displayed separately, then set Frontpage displays... Your latest posts.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '',
            ),
            array(
                'id'       => 'fp-news-title',
                'type'     => 'text',
                'title'    => __( 'News - Main Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the big text in the news section. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-news-sub-title',
                'type'     => 'text',
                'title'    => __( 'News - Sub Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the smaller text in the news section. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-news-slug',
                'type'     => 'text',
                'title'    => __( 'Navigation Menu ID', 'simpleshift-pro'),
                'subtitle' => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://mysite.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://mysite.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => 'news',
            ),
            array(
                'id'       => 'fp-news-thumbs-toggle',
                'type'     => 'button_set',
                'title'    => __( 'Example Images Status', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'options'  => array(
                    '1' => 'Show',
                    '2' => 'Hide'
                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'space10',
                'type'     => 'raw',
                'title'    => __( '', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '<br><br>',
            ),
        )
    ) );




    Redux::setSection( $opt_name, array(
        'title'            => __( 'Frontpage Contact Section', 'simpleshift-pro'),
        'id'               => 'fp-contact',
        'desc'             => __( '', 'simpleshift-pro'),
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'contact-toggle',
                'type'     => 'button_set',
                'title'    => __( 'Contact Row Status', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'options'  => array(
                    '1' => 'Show',
                    '2' => 'Demo',
                    '3' => 'Hide'
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'fp-contact-background-color',
                'type'     => 'color',
                'output'   => array(
                    'background-color' => '.frontpage-contact'
                ),
                'title'    => __('Row Background Color', 'simpleshift-pro'), 
                'subtitle' => __('Pick a background color for the row.', 'simpleshift-pro'),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id'       => 'fp-contact-background-image',
                'type'     => 'media',
                'output'   => array( '.frontpage-contact' ),
                'title'    => __( 'Parallax Row Background', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
            ),
            array(
                'id'       => 'fp-contact-title',
                'type'     => 'text',
                'title'    => __( 'Contact - Main Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the big text in the contact section. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'fp-contact-sub-title',
                'type'     => 'text',
                'title'    => __( 'Contact - Sub Title', 'simpleshift-pro'),
                'subtitle' => __( 'This is the smaller text in the contact section. Leave blank to hide.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'contact-mailto',
                'type'     => 'text',
                'title'    => __( 'Mailto Email', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'contact-mailfrom',
                'type'     => 'text',
                'title'    => __( 'Mailfrom Email', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'contact-recaptcha-sitekey',
                'type'     => 'text',
                'title'    => __( 'Recaptcha API Site Key', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( 'Create a recaptcha site-key here: https://www.google.com/recaptcha/ and enter it into this field to activate the recaptcha on the contact form.', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'space11',
                'type'     => 'raw',
                'title'    => __( '', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '<br><br>',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Blog Settings', 'simpleshift-pro'),
        'id'               => 'blog-settings',
        'desc'             => __( '', 'simpleshift-pro'),
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'simpleshift_blog_sidebar_position',
                'type'     => 'button_set',
                'title'    => __( 'Blog Sidebar Position', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'options'  => array(
                    'right' => 'Right',
                    'left' => 'Left'
                ),
                'default'  => 'left'
            ),
            array(
                'id'       => 'space11sdgf',
                'type'     => 'raw',
                'title'    => __( '', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'content'  => '<br><br>',
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Custom CSS', 'simpleshift-pro'),
        'id'               => 'custom-css',
        'desc'             => __( '', 'simpleshift-pro'),
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'custom-css-primary',
                'type'     => 'textarea',
                'title'    => __( 'Custom CSS General', 'simpleshift-pro'),
                'subtitle' => __( 'Use this field to customize the look of your website with Custom CSS.', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'custom-css-768px',
                'type'     => 'textarea',
                'title'    => __( 'Custom CSS - Less Than 768px', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'custom-css-768px-991px',
                'type'     => 'textarea',
                'title'    => __( 'Custom CSS - More Than 768px But Less Than 991px', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'custom-css-992px-1200px',
                'type'     => 'textarea',
                'title'    => __( 'Custom CSS - More Than 992px But Less Than 1200px', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            ),
            array(
                'id'       => 'custom-css-1200px',
                'type'     => 'textarea',
                'title'    => __( 'Custom CSS - More Than 1200px', 'simpleshift-pro'),
                'subtitle' => __( '', 'simpleshift-pro'),
                'desc'     => __( '', 'simpleshift-pro'),
                'default'  => '',
            )
        )
    ) ); 




/* * *************************************************************************************************** */
// Pages
/* * *************************************************************************************************** */

function simpleshift_pro_pages_arr() {

    $pages = array();
    $get_pages = get_pages('sort_column=post_parent,menu_order');
    foreach ($get_pages as $page) {
        $pages[$page->ID] = $page->post_title;
    }
    return $pages;
}
function simpleshift_pro_random_page(){
    $get_pages = get_pages();
    if(!empty($get_pages)) {
        shuffle($get_pages);
        $page = $get_pages[0]->ID;
    } else {
        $page = "";
    }
    return $page;

}

function simpleshift_pro_fontawesome() {

    $i = array("fa-heart" => __('Heart', 'simpleshift-pro'),
        "fa-bomb" => __('Bomb', 'simpleshift-pro'),
        "fa-paper-plane" => __('Paper Plane', 'simpleshift-pro'),
        "fa-wordpress" => __('WordPress', 'simpleshift-pro'),
        "fa-arrow-right" => __('Arrow Right', 'simpleshift-pro'),
        "fa-arrow-left" => __('Arrow Left', 'simpleshift-pro'),
        "fa-bolt" => __('Bolt', 'simpleshift-pro'),
        "fa-cloud" => __('Cloud', 'simpleshift-pro'),
        "fa-coffee" => __('Coffee', 'simpleshift-pro'),
        "fa-bullseye" => __('Bullseye', 'simpleshift-pro'),
        "fa-key" => __('Key', 'simpleshift-pro')        
        );
    return $i;
}