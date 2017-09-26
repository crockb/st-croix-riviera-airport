<?php if (is_front_page() && !is_paged())  { ?>
    <?php  $section_bg=simpleshift_pro_get_option('fp-banner-background-image');
    if (!empty($section_bg['url'])) {
        $simpleshift_parallax="data-parallax='scroll' data-image-src='" . esc_url($section_bg['url']) . "' style='background: transparent;background: rgba(0, 0, 0, 0.2);'";
        $parallax_active="parallax_active";
    } ?>
    <?php if (simpleshift_pro_get_option('fp-banner-toggle') == '1') { ?>
        <section class="ssbanner frontpage-banner <?php if(isset($parallax_active)){echo $parallax_active;} ?>" <?php if(isset($simpleshift_parallax)){echo $simpleshift_parallax;} ?>>
            <div class="container">
                <div class="banner-wrap" data-sr='wait 0.4s, scale up 25%'>
                    <?php if (simpleshift_pro_get_option('fp-banner-title') != '') { ?>
                        <div class="banner-title titlefamily"><?php echo esc_html(simpleshift_pro_get_option('fp-banner-title')); ?></div>
                    <?php } ?>
                    <?php if (simpleshift_pro_get_option('fp-banner-sub-title') != '') { ?>
                        <div class="banner-sub-title titlefamily"><?php echo esc_html(simpleshift_pro_get_option('fp-banner-sub-title')); ?></div>
                    <?php } ?>
                    <?php if (simpleshift_pro_get_option('fp-banner-button-url') != '') { ?>
                        <div class="banner-link-button"><a class="btn-simpleshift" href="<?php echo esc_url(simpleshift_pro_get_option('fp-banner-button-url')); ?>"><?php echo esc_html(simpleshift_pro_get_option('fp-banner-button-text')); ?></a></div>
                    <?php } ?>
                </div>      
            </div>    
        </section>  
    <?php } else if (simpleshift_pro_get_option('fp-banner-toggle') == '3') { ?>
        <section class="ssbanner frontpage-banner <?php if(isset($parallax_active)){echo $parallax_active;} ?>" <?php if(isset($simpleshift_parallax)){echo $simpleshift_parallax;} ?>>
            <div class="container">
                <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php if (simpleshift_pro_get_option('fp-slide1-title')!='') { ?><li data-target="#myCarousel" data-slide-to="0" class="active"></li><?php } ?>
                        <?php if (simpleshift_pro_get_option('fp-slide2-title')!='') { ?><li data-target="#myCarousel" data-slide-to="1"></li><?php } ?>
                        <?php if (simpleshift_pro_get_option('fp-slide3-title')!='') { ?><li data-target="#myCarousel" data-slide-to="2"></li><?php } ?>
                        <?php if (simpleshift_pro_get_option('fp-slide4-title')!='') { ?><li data-target="#myCarousel" data-slide-to="3"></li><?php } ?>
                        <?php if (simpleshift_pro_get_option('fp-slide5-title')!='') { ?><li data-target="#myCarousel" data-slide-to="4"></li><?php } ?>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <?php if (simpleshift_pro_get_option('fp-slide1-title')!='') { ?>
                            <div class="item active">
                                <div class="banner-wrap" data-sr='wait 0.4s, scale up 25%'>
                                    <?php if (simpleshift_pro_get_option('fp-slide1-title') != '') { ?>
                                        <div class="banner-title titlefamily"><?php echo esc_html(simpleshift_pro_get_option('fp-slide1-title')); ?></div>
                                    <?php } ?>
                                    <?php if (simpleshift_pro_get_option('fp-slide1-sub-title') != '') { ?>
                                        <div class="banner-sub-title titlefamily"><?php echo esc_html(simpleshift_pro_get_option('fp-slide1-sub-title')); ?></div>
                                    <?php } ?>
                                    <?php if (simpleshift_pro_get_option('fp-slide1-button-url') != '') { ?>
                                        <div class="banner-link-button"><a class="btn-simpleshift" href="<?php echo esc_url(simpleshift_pro_get_option('fp-slide1-button-url')); ?>"><?php echo esc_html(simpleshift_pro_get_option('fp-slide1-button-text')); ?></a></div>
                                    <?php } ?>
                                </div>  
                            </div> 
                        <?php } ?>
                        <?php if (simpleshift_pro_get_option('fp-slide2-title')!='') { ?>
                            <div class="item">
                                <div class="banner-wrap">
                                    <?php if (simpleshift_pro_get_option('fp-slide2-title') != '') { ?>
                                        <div class="banner-title titlefamily"><?php echo esc_html(simpleshift_pro_get_option('fp-slide2-title')); ?></div>
                                    <?php } ?>
                                    <?php if (simpleshift_pro_get_option('fp-slide2-sub-title') != '') { ?>
                                        <div class="banner-sub-title titlefamily"><?php echo esc_html(simpleshift_pro_get_option('fp-slide2-sub-title')); ?></div>
                                    <?php } ?>
                                    <?php if (simpleshift_pro_get_option('fp-slide2-button-url') != '') { ?>
                                        <div class="banner-link-button"><a class="btn-simpleshift" href="<?php echo esc_url(simpleshift_pro_get_option('fp-slide2-button-url')); ?>"><?php echo esc_html(simpleshift_pro_get_option('fp-slide2-button-text')); ?></a></div>
                                    <?php } ?>
                                </div>  
                            </div> 
                        <?php } ?>
                        <?php if (simpleshift_pro_get_option('fp-slide3-title')!='') { ?>
                            <div class="item">
                                <div class="banner-wrap">
                                    <?php if (simpleshift_pro_get_option('fp-slide3-title') != '') { ?>
                                        <div class="banner-title titlefamily"><?php echo esc_html(simpleshift_pro_get_option('fp-slide3-title')); ?></div>
                                    <?php } ?>
                                    <?php if (simpleshift_pro_get_option('fp-slide3-sub-title') != '') { ?>
                                        <div class="banner-sub-title titlefamily"><?php echo esc_html(simpleshift_pro_get_option('fp-slide3-sub-title')); ?></div>
                                    <?php } ?>
                                    <?php if (simpleshift_pro_get_option('fp-slide3-button-url') != '') { ?>
                                        <div class="banner-link-button"><a class="btn-simpleshift" href="<?php echo esc_url(simpleshift_pro_get_option('fp-slide3-button-url')); ?>"><?php echo esc_html(simpleshift_pro_get_option('fp-slide3-button-text')); ?></a></div>
                                    <?php } ?>
                                </div>  
                            </div> 
                        <?php } ?>
                        <?php if (simpleshift_pro_get_option('fp-slide4-title')!='') { ?>
                            <div class="item">
                                <div class="banner-wrap">
                                    <?php if (simpleshift_pro_get_option('fp-slide4-title') != '') { ?>
                                        <div class="banner-title titlefamily"><?php echo esc_html(simpleshift_pro_get_option('fp-slide4-title')); ?></div>
                                    <?php } ?>
                                    <?php if (simpleshift_pro_get_option('fp-slide4-sub-title') != '') { ?>
                                        <div class="banner-sub-title titlefamily"><?php echo esc_html(simpleshift_pro_get_option('fp-slide4-sub-title')); ?></div>
                                    <?php } ?>
                                    <?php if (simpleshift_pro_get_option('fp-slide4-button-url') != '') { ?>
                                        <div class="banner-link-button"><a class="btn-simpleshift" href="<?php echo esc_url(simpleshift_pro_get_option('fp-slide4-button-url')); ?>"><?php echo esc_html(simpleshift_pro_get_option('fp-slide4-button-text')); ?></a></div>
                                    <?php } ?>
                                </div>  
                            </div> 
                        <?php } ?>
                        <?php if (simpleshift_pro_get_option('fp-slide5-title')!='') { ?>
                            <div class="item">
                                <div class="banner-wrap">
                                    <?php if (simpleshift_pro_get_option('fp-slide5-title') != '') { ?>
                                        <div class="banner-title titlefamily"><?php echo esc_html(simpleshift_pro_get_option('fp-slide5-title')); ?></div>
                                    <?php } ?>
                                    <?php if (simpleshift_pro_get_option('fp-slide5-sub-title') != '') { ?>
                                        <div class="banner-sub-title titlefamily"><?php echo esc_html(simpleshift_pro_get_option('fp-slide5-sub-title')); ?></div>
                                    <?php } ?>
                                    <?php if (simpleshift_pro_get_option('fp-slide5-button-url') != '') { ?>
                                        <div class="banner-link-button"><a class="btn-simpleshift" href="<?php echo esc_url(simpleshift_pro_get_option('fp-slide5-button-url')); ?>"><?php echo esc_html(simpleshift_pro_get_option('fp-slide5-button-text')); ?></a></div>
                                    <?php } ?>
                                </div>  
                            </div> 
                        <?php } ?>
                    </div>
                </div>   
            </div>    
        </section> 
    <?php } else { ?>     
        <section class="ssbanner frontpage-banner parallax_active" data-parallax='scroll' data-image-src='<?php echo get_template_directory_uri(); ?>/assets/images/preview/road.jpg' style='background: transparent;background: rgba(0, 0, 0, 0.2);'>
            <div class="container">
                <div class="banner-wrap" data-sr='wait 0.9s, scale up 25%'>
                    <div class="banner-title"><?php _e('SimpleShift One Page Theme', 'simpleshift-pro'); ?></div>
                    <div class="banner-sub-title"><?php _e('A business Wordpress theme for the business mogul in you.', 'simpleshift-pro'); ?></div>
                    <div class="banner-link-button"><a class="btn-simpleshift" href="http://themeshift.com/wordpress-themes/simpleshift/"><?php _e('Learn More', 'simpleshift-pro'); ?></a></div>
                </div>    
            </div>    
        </section> 
    <?php } ?> 
<?php } else { ?> 
    <?php  
        if ( has_post_thumbnail() ) {
            $section_bg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
            if (!empty($section_bg[0])) {
                $simpleshift_parallax="data-parallax='scroll' data-image-src='" . $section_bg[0] . "' style='background: rgba(0, 0, 0, 0.2);'";
                $parallax_active="parallax_active";
            }
        } else {
            $section_bg=simpleshift_pro_get_option('sub-banner-background-image');
            if (!empty($section_bg['url'])) {
                $simpleshift_parallax="data-parallax='scroll' data-image-src='" . $section_bg['url'] . "' style='background: rgba(0, 0, 0, 0.2);'";
                $parallax_active="parallax_active";
            }
        } 
    ?>
    <?php if (simpleshift_pro_get_option('sub-banner-toggle') == '1') { ?>
        <section class="ssbanner subpage-banner <?php if(isset($parallax_active)){echo $parallax_active;} ?>"  <?php if(isset($simpleshift_parallax)){echo $simpleshift_parallax;} ?>>
            <div class="container">
                <div class="banner-wrap" data-sr='wait 0.4s, scale up 25%'>
                    <h1 class="banner-title titlefamily"><?php get_template_part( 'parts/title'); ?></h1>
                </div>
            </div>
        </section>
    <?php } else { ?>
        <section class="ssbanner subpage-banner parallax_active" data-parallax='scroll' data-image-src='<?php echo get_template_directory_uri(); ?>/assets/images/preview/road.jpg' style='background: transparent;background: rgba(0, 0, 0, 0.2);'>
            <div class="container">
                <div class="banner-wrap" data-sr='wait 0.9s, scale up 25%'>
                    <h1 class="banner-title titlefamily"><?php get_template_part( 'parts/title'); ?></h1>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>