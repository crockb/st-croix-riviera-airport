<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php wp_title('', true); ?></title>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php 
        wp_head();
        ?>        
    </head>
    <body <?php body_class(); ?> id="<?php if (simpleshift_pro_get_option('home-slug')=='') {echo "home";} else {echo esc_attr(simpleshift_pro_get_option('home-slug'));} ?>">
        <header>
            <div class="container">
                <?php  
                get_template_part( 'parts/header', 'menu');
                ?>
            </div>
        </header>
        <?php get_template_part( 'parts/header','banner'); ?>