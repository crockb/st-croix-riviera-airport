<?php $section_bg=simpleshift_pro_get_option('fp-featured-background-image');
if (!empty($section_bg['url'])) {
    $simpleshift_pro_parallax="data-parallax='scroll' data-image-src='" . esc_url($section_bg['url']) . "' style='background: transparent;padding:220px 0 200px;background: rgba(0, 0, 0, 0.3);'";
    $parallax_active="parallax_active";
} 
if (simpleshift_pro_get_option('featured-toggle') == "1") { ?>
    <section id="<?php if (simpleshift_pro_get_option('fp-featured-slug')=='') {echo "featured";} else {echo esc_attr(simpleshift_pro_get_option('fp-featured-slug'));} ?>" class="frontpage-featured frontpage-row <?php if(isset($parallax_active)){echo $parallax_active;} ?>" <?php if(isset($simpleshift_pro_parallax)){echo $simpleshift_pro_parallax;} ?>>
        <div class="container">
            <div class="row frontpage_featured row-centered">
                <?php if ( is_active_sidebar( 'frontpage-featured-left' ) ) { ?>
                	<div class="col-sm-4 col-centered featured">
                		<?php dynamic_sidebar( 'frontpage-featured-left' ); ?>
                	</div>
                <?php } ?>
                <?php if ( is_active_sidebar( 'frontpage-featured-center' ) ) { ?>
                	<div class="col-sm-4 col-centered featured">
                		<?php dynamic_sidebar( 'frontpage-featured-center' ); ?>
                	</div>
                <?php } ?>
                <?php if ( is_active_sidebar( 'frontpage-featured-right' ) ) { ?>
                	<div class="col-sm-4 col-centered featured">
                		<?php dynamic_sidebar( 'frontpage-featured-right' ); ?>
                	</div>
                <?php } ?> 
            </div>
        </div> 
    </section>
<?php } else if (simpleshift_pro_get_option('featured-toggle') == "3") { 
    // Do nothing here
} else { ?>
    <section id="<?php if (simpleshift_pro_get_option('fp-featured-slug')=='') {echo "featured";} else {echo esc_attr(simpleshift_pro_get_option('fp-featured-slug'));} ?>" class="frontpage-featured frontpage-row preview">
        <div class="container">
            <div class="row frontpage_featured row-centered">
                <div class="col-sm-4 col-centered featured">
                    <div class="frontpage_featured_item">
                        <i class="fa fa-heart"></i>
                        <h4><?php _e('Sample Page', 'simpleshift-pro'); ?></h4>
                        <?php _e('This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes).', 'simpleshift-pro'); ?>
                    </div>
                    <div class="frontpage_featured_item">
                        <i class="fa fa-paper-plane"></i>
                        <h4><?php _e('Sample Page', 'simpleshift-pro'); ?></h4>
                        <?php _e('This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes).', 'simpleshift-pro'); ?>
                    </div>
                </div>    
                <div class="col-sm-4 col-centered featured">
                    <div class="frontpage_featured_item">
                        <i class="fa fa-paper-plane"></i>
                        <h4><?php _e('Sample Page', 'simpleshift-pro'); ?></h4>
                        <?php _e('This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes).', 'simpleshift-pro'); ?>
                    </div>
                    <div class="frontpage_featured_item">
                        <i class="fa fa-bolt"></i>
                        <h4><?php _e('Sample Page', 'simpleshift-pro'); ?></h4>
                        <?php _e('This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes).', 'simpleshift-pro'); ?>
                    </div>
                </div>  
                <div class="col-sm-4 col-centered featured">
                    <div class="frontpage_featured_item">
                        <i class="fa fa-bolt"></i>
                        <h4><?php _e('Sample Page', 'simpleshift-pro'); ?></h4>
                        <?php _e('This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes).', 'simpleshift-pro'); ?>
                    </div>
                    <div class="frontpage_featured_item">
                        <i class="fa fa-heart"></i>
                        <h4><?php _e('Sample Page', 'simpleshift-pro'); ?></h4>
                        <?php _e('This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes).', 'simpleshift-pro'); ?>
                    </div>
                </div>  
            </div>
        </div> 
    </section>
<?php } ?>