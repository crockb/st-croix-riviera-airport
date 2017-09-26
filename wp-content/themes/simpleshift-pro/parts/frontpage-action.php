<?php 
$section_bg=simpleshift_pro_get_option('fp-action1-background-image');
if (!empty($section_bg['url'])) {
    $simpleshift_pro_parallax="data-parallax='scroll' data-image-src='" . esc_url($section_bg['url']) . "' style='background: transparent;padding:220px 0 200px;background: rgba(0, 0, 0, 0.3);'";
    $parallax_active="parallax_active";
} 
if (simpleshift_pro_get_option('fp-action1-toggle') == "1") { ?>
    <section id="<?php if (simpleshift_pro_get_option('fp-action1-slug')=='') {echo "action1";} else {echo esc_attr(simpleshift_pro_get_option('fp-action1-slug'));} ?>" class="frontpage-action1 frontpage-row <?php if(isset($parallax_active)){echo $parallax_active;} ?>" <?php if(isset($simpleshift_pro_parallax)){echo $simpleshift_pro_parallax;} ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (simpleshift_pro_get_option('fp-action1-title') != '') { ?>
                        <div class="action1-title h1"><?php echo esc_html(simpleshift_pro_get_option('fp-action1-title')); ?></div>
                    <?php } ?>
                    <?php if (simpleshift_pro_get_option('fp-action1-sub-title') != '') { ?>
                        <div class="action1-sub-title h4"><?php echo esc_html(simpleshift_pro_get_option('fp-action1-sub-title')); ?></div>
                    <?php } ?>
                    <?php if ((simpleshift_pro_get_option('fp-action1-button-text') != '') && (simpleshift_pro_get_option('fp-action1-button-url') != '')) { ?>
                        <div class="action1-link-button"><a class="btn-simpleshift-ghost" href="<?php echo esc_url(simpleshift_pro_get_option('fp-action1-button-url')); ?>"><?php echo esc_html(simpleshift_pro_get_option('fp-action1-button-text')); ?></a></div>
                    <?php } ?>
                </div> 
            </div>    
        </div>    
    </section> 
    <?php
} else if (simpleshift_pro_get_option('fp-action1-toggle') == "3") {
    // Don't do anything
} else {
?>
    <section id="<?php if (simpleshift_pro_get_option('fp-action1-slug')=='') {echo "action1";} else {echo esc_attr(simpleshift_pro_get_option('fp-action1-slug'));} ?>" class="frontpage-action1 frontpage-row preview">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="action1-title h1"><?php _e('Call To Action', 'simpleshift-pro'); ?></div>
                    <div class="action1-sub-title h4"><?php _e('Convince me why I should take this action.', 'simpleshift-pro'); ?></div>
                    <div class="action1-link-button"><a class="btn-simpleshift-ghost" href="#"><?php _e('Go For It!', 'simpleshift-pro'); ?></a></div>
                </div> 
            </div>    
        </div>   
    </section> 
<?php
}    
?>