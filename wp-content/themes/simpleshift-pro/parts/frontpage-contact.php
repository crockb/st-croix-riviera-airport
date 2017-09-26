<?php 
$section_bg=simpleshift_pro_get_option('fp-contact-background-image');
if (!empty($section_bg['url'])) {
    $simpleshift_pro_parallax="data-parallax='scroll' data-image-src='" . esc_url($section_bg['url']) . "' style='background: transparent;padding:100px 0 100px;background: rgba(0, 0, 0, 0.3);'";
    $parallax_active="parallax_active";
} 
if (simpleshift_pro_get_option('contact-toggle') == '1') { ?>
    <section id="<?php if (simpleshift_pro_get_option('fp-contact-slug')=='') {echo "contact";} else {echo esc_attr(simpleshift_pro_get_option('fp-contact-slug'));} ?>" class="frontpage-contact frontpage-row <?php if(isset($parallax_active)){echo $parallax_active;} ?>" <?php if(isset($simpleshift_pro_parallax)){echo $simpleshift_pro_parallax;} ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (simpleshift_pro_get_option('fp-contact-title') != '') { ?>
                        <div class="contact-title h1"><?php echo esc_html(simpleshift_pro_get_option('fp-contact-title')); ?></div>
                    <?php } ?>
                    <?php if (simpleshift_pro_get_option('fp-contact-sub-title') != '') { ?>
                        <div class="contact-sub-title h4"><?php echo esc_html(simpleshift_pro_get_option('fp-contact-sub-title')); ?></div>
                    <?php } ?>
                    <?php 
                    if(isset($_POST['submitted'])) { 
                        if(isset($_POST['myname']) && isset($_POST['email'])) {
                            if((trim($_POST['myname']) != "" ) && (trim($_POST['email']) != "" )) { ?>
                                <p class="bg-success"><?php _e('Thanks for contacting us!', 'simpleshift-pro'); ?></p>
                            <?php } else { ?>
                                <p class="bg-danger"><?php _e('Please enter your name and email address.', 'simpleshift-pro'); ?></p>
                            <?php 
                            }
                        }
                    }
                    if(isset($_POST['submitted'])) {
                        $simpleshift_contact_recipient_email = esc_html(simpleshift_pro_get_option('contact-mailto'));
                        $simpleshift_contact_sender_email = esc_html(simpleshift_pro_get_option('contact-mailfrom'));
                        if($simpleshift_contact_recipient_email != '' && $simpleshift_contact_sender_email != '') {
                            extract($_POST);
                            $blog_name = esc_html(get_bloginfo('name'));
                            $message = "Name: $myname
                                        Email: $email
                                        Website: $website
                                        Comments: $comments
                            ";
                            $headers = 'From: '.$blog_name.' <'.$simpleshift_contact_sender_email.'>' . "\r\n";
                            wp_mail($simpleshift_contact_recipient_email, 'Contact Form', esc_html($message), $headers);
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                             <form class="contact-form" name="contact-form" method="post">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group"><input data-sr="wait 0.3s, enter left and move 50px after 1s" type="text" id="myname" name="myname" placeholder="Name*" class="form-control input-lg" /></div>
                                        <div class="form-group"><input data-sr="wait 0.3s, enter left and move 50px after 1s" type="text" id="email" name="email" placeholder="Email*" class="form-control input-lg" /></div>
                                        <div class="form-group"><input data-sr="wait 0.3s, enter left and move 50px after 1s" type="text" id="website" name="website" placeholder="Phone Number" class="form-control input-lg" /></div>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea data-sr="wait 0.3s, enter right and move 50px after 1s" class="form-control" rows="6" cols="" name="comments" placeholder="Comments"></textarea>
                                    </div>
                                </div>
                                <br />
                                <div class="text-center">
                                    <input type="hidden" name="scrolltoform" value="<?php if (simpleshift_pro_get_option('fp-contact-slug')=='') {echo "contact";} else {echo esc_attr(simpleshift_pro_get_option('fp-contact-slug'));} ?>">
                                    <input type="hidden" name="submitted" id="submitted" value="true" />
                                    <?php if (simpleshift_pro_get_option('contact-recaptcha-sitekey')) { ?><div class="g-recaptcha" data-sitekey="<?php echo esc_html(simpleshift_pro_get_option('contact-recaptcha-sitekey')); ?>"></div><?php } ?>
                                    <input data-sr="wait 0.3s, enter right and move 50px after 1s" type="submit" name="submit_button" id="submit_button" value="Submit" class="contact-submit btn-simpleshift" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>    
        </div>    
    </section> 
<?php } else if (simpleshift_pro_get_option('contact-toggle') == '3') {
    // Don't do anything
} else { ?>  
    <section id="<?php if (simpleshift_pro_get_option('fp-contact-slug')=='') {echo "contact";} else {echo esc_attr(simpleshift_pro_get_option('fp-contact-slug'));} ?>" class="frontpage-contact frontpage-row preview" data-parallax='scroll' data-image-src='<?php echo get_template_directory_uri(); ?>/assets/images/preview/boat.jpg' style='background: transparent;background: rgba(0, 0, 0, 0.2);'>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-title h1">Contact Us</div>
                    <div class="contact-sub-title h4">Let us know what you are thinking.</div>
                    <?php 
                    if(isset($_POST['submitted'])) { 
                        if(isset($_POST['myname']) && isset($_POST['email'])) {
                            if((trim($_POST['myname']) != "" ) && (trim($_POST['email']) != "" )) { ?>
                                <p class="bg-success"><?php _e('Thanks for contacting us!', 'simpleshift-pro'); ?></p>
                            <?php } else { ?>
                                <p class="bg-danger"><?php _e('Please enter your name and email address.', 'simpleshift-pro'); ?></p>
                            <?php 
                            }
                        }
                    }
                    if(isset($_POST['submitted'])) {
                        // Don't do anything because this is a demo form
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                             <form class="contact-form" name="contact-form" method="post">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group"><input data-sr="wait 0.3s, enter left and move 50px after 1s" type="text" id="myname" name="myname" placeholder="Name*" class="form-control input-lg" /></div>
                                        <div class="form-group"><input data-sr="wait 0.3s, enter left and move 50px after 1s" type="text" id="email" name="email" placeholder="Email*" class="form-control input-lg" /></div>
                                        <div class="form-group"><input data-sr="wait 0.3s, enter left and move 50px after 1s" type="text" id="website" name="website" placeholder="Phone Number" class="form-control input-lg" /></div>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea data-sr="wait 0.3s, enter right and move 50px after 1s" class="form-control" rows="6" cols="" placeholder="Comments"></textarea>
                                    </div>
                                </div>
                                <br />
                                <div class="text-center">
                                    <input type="hidden" name="scrolltoform" value="<?php if (simpleshift_pro_get_option('fp-contact-slug')=='') {echo "contact";} else {echo esc_attr(simpleshift_pro_get_option('fp-contact-slug'));} ?>">
                                    <input type="hidden" name="submitted" id="submitted" value="true" />
                                    <input data-sr="wait 0.3s, enter right and move 50px after 1s" type="submit" name="submit_button" id="submit_button" value="Submit" class="contact-submit btn-simpleshift" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>    
        </div>    
    </section> 
<?php } ?> 