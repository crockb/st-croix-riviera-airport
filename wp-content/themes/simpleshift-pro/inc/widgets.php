<?php


// #################################################
// About Row Content Widget
// #################################################

class simpleshift_about_content_widget extends WP_Widget {
    
    // Register widget
    function __construct() {
        parent::__construct(
          'simpleshift-about-content-widget', // Base ID
          __('Simpleshift - About Content Widget', 'simpleshift-pro'), // Name
          array( 'description' => __('Display about content boxes on the frontpage', 'simpleshift-pro'))  // Description
        );
    }
    
    // Create output function
    public function widget($args, $instance) {
		echo $args['before_widget'];
		?>
	        <a href="<?php if ( ! empty( $instance['url'] ) ) { echo esc_url($instance['url']); } else {echo "#";} ?>">
	        	<i class="fa <?php if ( ! empty( $instance['faclass'] ) ) { echo esc_attr($instance['faclass']); } ?>"></i>
	            <?php if ( ! empty( $instance['title'] ) ) { 
	                echo $args['before_title'] . esc_html($instance['title']) . $args['after_title']; 
	            } ?>
	        	<p>
	                <?php if ( ! empty( $instance['description'] ) ) { 
	                    echo esc_html($instance['description']); 
	                } ?>
	        	</p>
	        </a>
		<?php
		echo $args['after_widget'];
    }  
    
    // Create widget form
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Title', 'simpleshift-pro');
		$url = ! empty( $instance['url'] ) ? $instance['url'] : __( '#', 'simpleshift-pro');
		$description = ! empty( $instance['description'] ) ? $instance['description'] : __( 'Description text.', 'simpleshift-pro');
		$faclass = ! empty( $instance['faclass'] ) ? $instance['faclass'] : __( 'fa-star', 'simpleshift-pro');
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'URL:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'faclass' ); ?>"><?php _e( 'FontAwesome Class:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'faclass' ); ?>" name="<?php echo $this->get_field_name( 'faclass' ); ?>" type="text" value="<?php echo esc_attr( $faclass ); ?>">
		</p>
		<?php 
	}
    
    // Save stuff
    public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? $new_instance['description'] : '';
        $instance['faclass'] = ( ! empty( $new_instance['faclass'] ) ) ? $new_instance['faclass'] : '';	
		return $instance;
	}
        
}

// Register about row content widget
function register_simpleshift_about_content_widget() {
    register_widget( 'simpleshift_about_content_widget' );
}
add_action( 'widgets_init', 'register_simpleshift_about_content_widget' );



// #################################################
// Featured Row Content Widget
// #################################################

class simpleshift_featured_content_widget extends WP_Widget {
    
    // Register widget
    function __construct() {
        parent::__construct(
          'simpleshift-featured-content-widget', // Base ID
          'Simpleshift - Featured Content Widget', // Name
          array( 'description' => __('Display about content boxes on the frontpage', 'simpleshift-pro'))  // Description
        );
    }
    
    // Create output function
    public function widget($args, $instance) {
		echo $args['before_widget'];
		?>
            <div class="frontpage_featured_item">
                <i class="fa <?php if ( ! empty( $instance['faclass'] ) ) { echo esc_attr($instance['faclass']); } ?>"></i>
                <?php if ( ! empty( $instance['title'] ) && empty($instance['link']) ) { 
                    echo $args['before_title'] . esc_html($instance['title']) . $args['after_title']; 
                } else if ( ! empty( $instance['title'] ) && !empty($instance['link']) ) {  
                    echo '<a href="'. esc_url($instance['link']) . '">' . $args['before_title'] . esc_html($instance['title']) . $args['after_title'] . '</a>'; 
                }?>
                <?php if ( ! empty( $instance['description'] ) ) { 
                    echo esc_html($instance['description']); 
                } ?>
            </div>
		<?php
		echo $args['after_widget'];
    }  
    
    // Create widget form
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Title', 'simpleshift-pro');
		$description = ! empty( $instance['description'] ) ? $instance['description'] : __( 'Description text.', 'simpleshift-pro');
		$faclass = ! empty( $instance['faclass'] ) ? $instance['faclass'] : __( 'fa-star', 'simpleshift-pro');
        $link = ! empty( $instance['link'] ) ? $instance['link'] : __( 'Absolute Link/URL', 'simpleshift-pro');
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'faclass' ); ?>"><?php _e( 'FontAwesome Class:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'faclass' ); ?>" name="<?php echo $this->get_field_name( 'faclass' ); ?>" type="text" value="<?php echo esc_attr( $faclass ); ?>">
		</p>
        <p>
		<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Link:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>">
		</p>
		<?php 
	}
    
    // Save stuff
    public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? $new_instance['description'] : '';
        $instance['faclass'] = ( ! empty( $new_instance['faclass'] ) ) ? $new_instance['faclass'] : '';	
        $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';
		return $instance;
	}
        
}

// Register about row content widget
function register_simpleshift_featured_content_widget() {
    register_widget( 'simpleshift_featured_content_widget' );
}
add_action( 'widgets_init', 'register_simpleshift_featured_content_widget' );




// #################################################
// Team Row Content Widget
// #################################################

class simpleshift_team_content_widget extends WP_Widget {
    
    // Register widget
    function __construct() {
        parent::__construct(
          'simpleshift-team-content-widget', // Base ID
          'Simpleshift - Team Content Widget', // Name
          array( 'description' => __('Display team content boxes on the frontpage', 'simpleshift-pro')) // Description
        );
    }
    
    // Create output function
    public function widget($args, $instance) {
		echo $args['before_widget'];
		?>
            <img class="img-responsive img-circle center-block" src="<?php if ( ! empty( $instance['imgurl184sq'] ) ) { echo $instance['imgurl184sq']; } ?>" />
            <h4 class="team-item-title">
                <?php if ( ! empty( $instance['name'] ) ) { 
                    echo esc_html($instance['name']); 
                } ?>            	
            </h4>
            <h5 class="team-item-sub-title">
                <?php if ( ! empty( $instance['title'] ) ) { 
                    echo esc_html($instance['title']); 
                } ?> 
            </h5>
            <p class="team-social-icons">
            	<?php if (!empty( $instance['social1']) && !empty( $instance['faclass1'])) { ?>
            		<a href="<?php echo esc_url($instance['social1']); ?>"><i class="fa <?php echo esc_html($instance['faclass1']); ?>"></i></a>
            	<?php } ?>
            	<?php if (!empty( $instance['social2']) && !empty( $instance['faclass2'])) { ?>
            		<a href="<?php echo esc_url($instance['social2']); ?>"><i class="fa <?php echo esc_html($instance['faclass2']); ?>"></i></a>
            	<?php } ?>
            	<?php if (!empty( $instance['social3']) && !empty( $instance['faclass3'])) { ?>
            		<a href="<?php echo esc_url($instance['social3']); ?>"><i class="fa <?php echo esc_html($instance['faclass3']); ?>"></i></a>
            	<?php } ?>
            </p>  
		<?php
		echo $args['after_widget'];
    }  
    
    // Create widget form
	public function form( $instance ) {
		$imgurl184sq = ! empty( $instance['imgurl184sq'] ) ? $instance['imgurl184sq'] : __( '', 'simpleshift-pro');
		$name = ! empty( $instance['name'] ) ? $instance['name'] : __( '', 'simpleshift-pro');
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( '', 'simpleshift-pro');
		$social1 = ! empty( $instance['social1'] ) ? $instance['social1'] : __( '', 'simpleshift-pro');
		$faclass1 = ! empty( $instance['faclass1'] ) ? $instance['faclass1'] : __( '', 'simpleshift-pro');
		$social2 = ! empty( $instance['social2'] ) ? $instance['social2'] : __( '', 'simpleshift-pro');
		$faclass2 = ! empty( $instance['faclass2'] ) ? $instance['faclass2'] : __( '', 'simpleshift-pro');
		$social3 = ! empty( $instance['social3'] ) ? $instance['social3'] : __( '', 'simpleshift-pro');
		$faclass3 = ! empty( $instance['faclass3'] ) ? $instance['faclass3'] : __( '', 'simpleshift-pro');
		
		
		
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'imgurl184sq' ); ?>"><?php _e( 'Headshot Image (184x184px):', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'imgurl184sq' ); ?>" name="<?php echo $this->get_field_name( 'imgurl184sq' ); ?>" type="text" value="<?php echo esc_attr( $imgurl184sq ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Name:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'social1' ); ?>"><?php _e( 'Social Media Link #1:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'social1' ); ?>" name="<?php echo $this->get_field_name( 'social1' ); ?>" type="text" value="<?php echo esc_attr( $social1 ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'faclass1' ); ?>"><?php _e( 'FontAwesome Class #1:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'faclass1' ); ?>" name="<?php echo $this->get_field_name( 'faclass1' ); ?>" type="text" value="<?php echo esc_attr( $faclass1 ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'social2' ); ?>"><?php _e( 'Social Media Link #2:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'social2' ); ?>" name="<?php echo $this->get_field_name( 'social2' ); ?>" type="text" value="<?php echo esc_attr( $social2 ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'faclass2' ); ?>"><?php _e( 'FontAwesome Class #2:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'faclass2' ); ?>" name="<?php echo $this->get_field_name( 'faclass2' ); ?>" type="text" value="<?php echo esc_attr( $faclass2 ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'social3' ); ?>"><?php _e( 'Social Media Link #3:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'social3' ); ?>" name="<?php echo $this->get_field_name( 'social3' ); ?>" type="text" value="<?php echo esc_attr( $social3 ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'faclass3' ); ?>"><?php _e( 'FontAwesome Class #3:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'faclass3' ); ?>" name="<?php echo $this->get_field_name( 'faclass3' ); ?>" type="text" value="<?php echo esc_attr( $faclass3 ); ?>">
		</p>


		
		<?php 
	}
    
    // Save stuff
    public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['imgurl184sq'] = ( ! empty( $new_instance['imgurl184sq'] ) ) ? $new_instance['imgurl184sq'] : '';
		$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? $new_instance['name'] : '';
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? $new_instance['title'] : '';
		$instance['social1'] = ( ! empty( $new_instance['social1'] ) ) ? $new_instance['social1'] : '';
		$instance['faclass1'] = ( ! empty( $new_instance['faclass1'] ) ) ? $new_instance['faclass1'] : '';
		$instance['social2'] = ( ! empty( $new_instance['social2'] ) ) ? $new_instance['social2'] : '';
		$instance['faclass2'] = ( ! empty( $new_instance['faclass2'] ) ) ? $new_instance['faclass2'] : '';
		$instance['social3'] = ( ! empty( $new_instance['social3'] ) ) ? $new_instance['social3'] : '';
		$instance['faclass3'] = ( ! empty( $new_instance['faclass3'] ) ) ? $new_instance['faclass3'] : '';
		return $instance;
	}
        
}

// Register widget
function register_simpleshift_team_content_widget() {
    register_widget( 'simpleshift_team_content_widget' );
}
add_action( 'widgets_init', 'register_simpleshift_team_content_widget' );



// #################################################
// Social Media Row Content Widget
// #################################################

class simpleshift_social_content_widget extends WP_Widget {
    
    // Register widget
    function __construct() {
        parent::__construct(
          'simpleshift-social-content-widget', // Base ID
          'Simpleshift - Social Media Content Widget', // Name
          array( 'description' => __('Display social content boxes on the frontpage', 'simpleshift-pro'))  // Description
        );
    }
    
    // Create output function
    public function widget($args, $instance) {
		echo $args['before_widget'];
		?>
			<div data-sr="wait 0.2s, scale up 25%">
	            <a href="<?php if ( ! empty( $instance['url'] ) ) { echo esc_url($instance['url']); } ?>">
	            	<i class="fa <?php if ( ! empty( $instance['faclass'] ) ) { echo esc_attr($instance['faclass']); } ?>"></i><br>
	            	<span class="social-item-title h5">
		                <?php if ( ! empty( $instance['title'] ) ) { 
		                    echo esc_html($instance['title']); 
		                } ?> 	
	            	</span><br>
	            	<span class="social-item-sub-title h5">
		                <?php if ( ! empty( $instance['sub-title'] ) ) { 
		                    echo esc_html($instance['sub-title']); 
		                } ?>
	            	</span>
	            </a>  
            </div>
		<?php
		echo $args['after_widget'];
    }  
    
    // Create widget form
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'simpleshift-pro');
		$sub_title = ! empty( $instance['sub-title'] ) ? $instance['sub-title'] : __( '', 'simpleshift-pro');
		$faclass = ! empty( $instance['faclass'] ) ? $instance['faclass'] : __( 'fa-star', 'simpleshift-pro');
		$url = ! empty( $instance['url'] ) ? $instance['url'] : __( '', 'simpleshift-pro');
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'sub-title' ); ?>"><?php _e( 'Sub-title:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'sub-title' ); ?>" name="<?php echo $this->get_field_name( 'sub-title' ); ?>" type="text" value="<?php echo esc_attr( $sub_title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'faclass' ); ?>"><?php _e( 'FontAwesome Class:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'faclass' ); ?>" name="<?php echo $this->get_field_name( 'faclass' ); ?>" type="text" value="<?php echo esc_attr( $faclass ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'URL:', 'simpleshift-pro'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
		</p>
		<?php 
	}
    
    // Save stuff
    public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['sub-title'] = ( ! empty( $new_instance['sub-title'] ) ) ? $new_instance['sub-title'] : '';
        $instance['faclass'] = ( ! empty( $new_instance['faclass'] ) ) ? $new_instance['faclass'] : '';	
	    $instance['url'] = ( ! empty( $new_instance['url'] ) ) ? $new_instance['url'] : '';
		return $instance;
	}
        
}

// Register widget
function register_simpleshift_social_content_widget() {
    register_widget( 'simpleshift_social_content_widget' );
}
add_action( 'widgets_init', 'register_simpleshift_social_content_widget' );