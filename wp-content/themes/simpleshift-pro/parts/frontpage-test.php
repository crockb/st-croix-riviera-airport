<?php 
$section_bg=simpleshift_pro_get_option('fp-test-background-image');
if (!empty($section_bg['url'])) {
    $simpleshift_pro_parallax="data-parallax='scroll' data-image-src='" . esc_url($section_bg['url']) . "' style='background: transparent;padding:220px 0 200px;background: rgba(0, 0, 0, 0.3);'";
    $parallax_active="parallax_active";
} 
if (simpleshift_pro_get_option('fp-test-toggle') == '1') { ?>
    <?php $fp_test_slug = simpleshift_pro_get_option('fp-test-slug'); ?>
     <section id="<?php if (simpleshift_pro_get_option('fp-test-slug')=='') {echo "test";} else {echo esc_attr(simpleshift_pro_get_option('fp-test-slug'));} ?>" class="frontpage-row frontpage-test <?php if(isset($parallax_active)){echo $parallax_active;} ?>" <?php if(isset($simpleshift_pro_parallax)){echo $simpleshift_pro_parallax;} ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-10 col-md-push-1"  data-sr="wait 0.3s, enter right and move 50px after 1s">
                            <h3 class="test-title"><?php echo esc_html(simpleshift_pro_get_option('fp-test-title')); ?></h3>
                            <div class="test-desc"><?php echo esc_html(simpleshift_pro_get_option('fp-test-description')); ?></div>
                            <?php if (simpleshift_pro_get_option('fp-test-tag') != '') { ?>
                                <?php if (simpleshift_pro_get_option('fp-test-tag-url') != '') {
                                    $before_tag='<a href="'.esc_url(simpleshift_pro_get_option('fp-test-tag-url')).'">';
                                    $after_tag='</a>';
                                }else{ $before_tag=''; $after_tag=''; } ?>
                                <div class="test-tag">~ <?php echo $before_tag; ?><?php echo esc_html(simpleshift_pro_get_option('fp-test-tag')); ?><?php echo $after_tag; ?></div>
                            <?php } ?>
                        </div> 
                    </div>    
                </div> 
            </div>    
        </div>    
    </section> 
<?php } else if (simpleshift_pro_get_option('fp-test-toggle') == '3') {
    // Don't do anything
} else { ?>  
    <section id="<?php if (simpleshift_pro_get_option('fp-test-slug')=='') {echo "test";} else {echo esc_attr(simpleshift_pro_get_option('fp-test-slug'));} ?>" class="frontpage-row frontpage-test preview" data-parallax='scroll' data-image-src='<?php echo get_template_directory_uri(); ?>/assets/images/preview/hills.jpg' style='background: transparent;background: rgba(0, 0, 0, 0.6);'>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-10 col-md-push-1"  data-sr="wait 0.3s, enter right and move 50px after 1s">
                            <h3 class="test-title"><?php _e('This is the theme of my dreams!', 'simpleshift-pro'); ?></h3>
                            <div class="test-desc"><?php _e('"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi."', 'simpleshift-pro'); ?></div>
                            <div class="test-tag">~ <a href="#"><?php _e('Lucy McFallon', 'simpleshift-pro'); ?></a></div>
                        </div> 
                    </div>    
                </div> 
            </div>    
        </div>    
    </section> 
<?php } ?> 
