<?php 
$section_bg=simpleshift_pro_get_option('fp-team-background-image');
if (!empty($section_bg['url'])) {
    $simpleshift_pro_parallax="data-parallax='scroll' data-image-src='" . esc_url($section_bg['url']) . "' style='background: transparent;padding:220px 0 200px;background: rgba(0, 0, 0, 0.3);'";
    $parallax_active="parallax_active";
} 
if (simpleshift_pro_get_option('fp-team-toggle') == '1') { ?>
    <section id="<?php if (simpleshift_pro_get_option('fp-team-slug')=='') {echo "team";} else {echo esc_attr(simpleshift_pro_get_option('fp-team-slug'));} ?>" class="frontpage-team frontpage-row <?php if(isset($parallax_active)){echo $parallax_active;} ?>" <?php if(isset($simpleshift_pro_parallax)){echo $simpleshift_pro_parallax;} ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="team-title h1"><?php echo esc_html(simpleshift_pro_get_option('fp-team-title')); ?></div>
                    <div class="team-sub-title h4"><?php echo esc_html(simpleshift_pro_get_option('fp-team-sub-title')); ?></div>
                    <div class="row row-centered">
                        <?php if ( is_active_sidebar( 'frontpage-team-left' ) ) { ?>
                        	<div class="col-sm-3 col-centered">
                        		<?php dynamic_sidebar( 'frontpage-team-left' ); ?>
                        	</div>
                        <?php } ?>
                        <?php if ( is_active_sidebar( 'frontpage-team-center-left' ) ) { ?>
                        	<div class="col-sm-3 col-centered">
                        		<?php dynamic_sidebar( 'frontpage-team-center-left' ); ?>
                        	</div>
                        <?php } ?>
                        <?php if ( is_active_sidebar( 'frontpage-team-center-right' ) ) { ?>
                        	<div class="col-sm-3 col-centered">
                        		<?php dynamic_sidebar( 'frontpage-team-center-right' ); ?>
                        	</div>
                        <?php } ?>
                        <?php if ( is_active_sidebar( 'frontpage-team-right' ) ) { ?>
                        	<div class="col-sm-3 col-centered">
                        		<?php dynamic_sidebar( 'frontpage-team-right' ); ?>
                        	</div>
                        <?php } ?>
                    </div>
                </div> 
            </div>    
        </div>    
    </section> 
<?php } else if (simpleshift_pro_get_option('fp-team-toggle') == '3') {
    // Don't do anything
} else { ?>  
    <section id="<?php if (simpleshift_pro_get_option('fp-team-slug')=='') {echo "team";} else {echo esc_attr(simpleshift_pro_get_option('fp-team-slug'));} ?>" class="frontpage-team frontpage-row preview">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="team-title h1"><?php _e('Meet the Team', 'simpleshift-pro'); ?></div>
                    <div class="team-sub-title h4"><?php _e('Showcase the great people behind your company.', 'simpleshift-pro'); ?></div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">
                                <img class="img-responsive img-circle center-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/preview/184x184-6.jpg" />
                                <h4 class="team-item-title"><?php _e('Sally Brown', 'simpleshift-pro'); ?></h4>
                                <h5 class="team-item-sub-title"><?php _e('CEO and Chair Woman', 'simpleshift-pro'); ?></h5>
                                <p class="team-social-icons"><a href="#"><i class="fa fa-youtube"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-facebook"></i></a></p>
                            </div>
                        </div> 
                       <div class="col-sm-3">
                            <div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">
                                <img class="img-responsive img-circle center-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/preview/184x184-1.jpg" />
                                <h4 class="team-item-title"><?php _e('John Smith', 'simpleshift-pro'); ?></h4>
                                <h5 class="team-item-sub-title"><?php _e('CFO and Mascot', 'simpleshift-pro'); ?></h5>
                                <p class="team-social-icons"><a href="#"><i class="fa fa-youtube"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-facebook"></i></a></p>
                            </div>
                        </div>     
                        <div class="col-sm-3">
                            <div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">
                                <img class="img-responsive img-circle center-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/preview/184x184-2.jpg" />
                                <h4 class="team-item-title"><?php _e('Emma Kline', 'simpleshift-pro'); ?></h4>
                                <h5 class="team-item-sub-title"><?php _e('Vice President', 'simpleshift-pro'); ?></h5>
                                <p class="team-social-icons"><a href="#"><i class="fa fa-youtube"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-facebook"></i></a></p>
                            </div>
                        </div> 
                        <div class="col-sm-3">
                            <div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">
                                <img class="img-responsive img-circle center-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/preview/184x184-3.jpg" />
                                <h4 class="team-item-title"><?php _e('Thomas Baggins', 'simpleshift-pro'); ?></h4>
                                <h5 class="team-item-sub-title"><?php _e('Project Manager', 'simpleshift-pro'); ?></h5>
                                <p class="team-social-icons"><a href="#"><i class="fa fa-youtube"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-facebook"></i></a></p>
                            </div>
                        </div> 
                    </div>    
                </div> 
            </div>    
        </div>     
    </section> 
<?php } ?>