<?php 
$section_bg=simpleshift_pro_get_option('fp-news-background-image');
if (!empty($section_bg['url'])) {
    $simpleshift_pro_parallax="data-parallax='scroll' data-image-src='" . esc_url($section_bg['url']) . "' style='background: transparent;padding:220px 0 200px;background: rgba(0, 0, 0, 0.3);'";
    $parallax_active="parallax_active";
} 
if ((simpleshift_pro_get_option('fp-news-toggle') == '1') || (simpleshift_pro_get_option('fp-news-toggle') == '')) { ?>
    <?php if ( get_option( 'show_on_front' ) == 'page' ) { ?>
        <section id="<?php if (simpleshift_pro_get_option('fp-news-slug')=='') {echo "news";} else {echo esc_attr(simpleshift_pro_get_option('fp-news-slug'));} ?>" class="frontpage-news frontpage-row <?php if(isset($parallax_active)){echo $parallax_active;} ?>" <?php if(isset($simpleshift_pro_parallax)){echo $simpleshift_pro_parallax;} ?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (simpleshift_pro_get_option('fp-news-title') != '') { ?>
                            <div class="news-title h1"><?php echo esc_html(simpleshift_pro_get_option('fp-news-title')); ?></div>
                        <?php } ?>
                        <?php if (simpleshift_pro_get_option('fp-news-sub-title') != '') { ?>
                            <div class="news-sub-title h4"><?php echo esc_html(simpleshift_pro_get_option('fp-news-sub-title')); ?></div>
                        <?php } ?>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } else { ?>
        <section id="<?php if (simpleshift_pro_get_option('fp-news-slug')=='') {echo "news";} else {echo esc_attr(simpleshift_pro_get_option('fp-news-slug'));} ?>" class="frontpage-news frontpage-row <?php if(isset($parallax_active)){echo $parallax_active;} ?>" <?php if(isset($simpleshift_pro_parallax)){echo $simpleshift_pro_parallax;} ?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (simpleshift_pro_get_option('fp-news-title') != '') { ?>
                            <div class="news-title h1"><?php echo esc_html(simpleshift_pro_get_option('fp-news-title')); ?></div>
                        <?php } else { ?>
                            <div class="news-title h1"><?php _e('Latest Articles', 'simpleshift-pro'); ?></div>
                        <?php } ?>
                        <?php if (simpleshift_pro_get_option('fp-news-sub-title') != '') { ?>
                            <div class="news-sub-title h4"><?php echo esc_html(simpleshift_pro_get_option('fp-news-sub-title')); ?></div>
                        <?php } else { ?>
                            <div class="news-sub-title h4"><?php _e('Get up to date with the latest news from our newsroom.', 'simpleshift-pro'); ?></div>
                        <?php } ?>
                        <?php get_template_part( 'parts/content', 'blog'); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } else if (simpleshift_pro_get_option('fp-news-toggle') == '2') {
    // Don't do anything
}  ?>