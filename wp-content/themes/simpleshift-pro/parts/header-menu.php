<?php 
$simpleshift_text_logo = trim(simpleshift_pro_get_option('logo'));
$simpleshift_image_logo = simpleshift_pro_get_option('image-logo');
?>
<nav id="menu_row" class="navbar navbar-default inbanner <?php if (!empty($simpleshift_image_logo['url'])){ echo "hasimglogo"; } ?>" role="navigation">
    <div class="container">
        <div class="navbar-header">

		
            <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <?php if (empty($simpleshift_image_logo['url'])){
                    if (!empty($simpleshift_text_logo)) { echo esc_html($simpleshift_text_logo); } else { echo get_bloginfo( 'name' ); }
                } else { ?>
                    <img src="<?php echo esc_url($simpleshift_image_logo['url']); ?>" class="image-logo" alt="<?php echo get_bloginfo( 'name' ); ?>" />
                <?php } ?>
            </a>
        </div>
        
        
        <?php if (simpleshift_pro_get_option('social-toggle') == "1") { ?>
        <p id="social_buttons" class="text-right">
            <?php
            $social_type = array("fa-facebook" => "simpleshift_facebook_url", "fa-linkedin" => "simpleshift_linkedin_url", "fa-twitter" => "simpleshift_twitter_url", "fa-google" => "simpleshift_google_plus_url", "fa-vimeo" => "simpleshift_vimeo_url", "fa-flickr" => "simpleshift_flickr_url", "fa-wordpress" => "simpleshift_wpcom_url", "fa-pinterest-p" => "simpleshift_pinterest_url", "fa-instagram" => "simpleshift_instagram_url", "fa-tumblr" => "simpleshift_tumblr_url", "fa-envelope" => "simpleshift_mail_url");
            foreach ($social_type as $key => $id) {
                $$id = trim(simpleshift_pro_get_option($id));
                $mailto = ($key == 'fa-envelope') ? 'mailto:' : '';
                $id = $$id;
                if (!empty($id)) {
                ?>
                    <a href="<?php echo $mailto; ?><?php echo $id; ?>"><i class="fa <?php echo $key; ?> fa-social-ss"></i></a>
                <?php
                }
            }
            if (simpleshift_pro_get_option('simpleshift_hide_rss_icon') == 0) {
            ?>
                <a href="<?php echo get_bloginfo('rss2_url'); ?>"><i class="fa fa-rss fa-social-ss"></i></a>
            <?php
            }
            ?>
        </p>
        <?php } else if (simpleshift_pro_get_option('social-toggle') == "3") { ?>

        <?php } else { ?>
            <p id="social_buttons" class="text-right">
                <a href="#"><i class="fa fa-facebook fa-social-ss"></i></a>
                <a href="q"><i class="fa fa-linkedin fa-social-ss"></i></a>
                <a href="#"><i class="fa fa-twitter fa-social-ss"></i></a>
            </p>
        <?php } ?>
        

        <?php
            wp_nav_menu( array(
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker()
            ));
        ?>
        

        
    </div>
</nav>

  