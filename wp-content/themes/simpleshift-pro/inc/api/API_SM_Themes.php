<?php

if ( get_option( 'api_sm_themes_active' ) != 'Activated' ) {
	add_action( 'admin_notices', 'API_SM_Themes::api_sm_themes_inactive_notice' );
}

if (FOUNDRY == "nt") {
	define("APIURL", "https://nimbusthemes.com/");
	define("LOGINURL", "https://www.nimbusthemes.com/my-account/");
	define("SALESCONTACT", "sales@nimbusthemes.com");
} else {
	define("APIURL", "https://themeshift.com/");
	define("LOGINURL", "https://themeshift.com/my-account/");
	define("SALESCONTACT", "sales@themeshift.com");
}

class API_SM_Themes {
	

	public $api_url = APIURL; 
	public $login_url = LOGINURL; 
	public $sales_contact = SALESCONTACT; 
	public $theme_url;
	public $version;
	public $theme_text_domain;
	public $my_theme;
	public $apism_data_key;
	public $apism_api_key;
	public $apism_activation_email;
	public $apism_theme_version;
	public $apism_theme_text_domain;
	public $apism_product_id_key;
	public $apism_instance_key;
	public $apism_activated_key;
	public $apism_activated_date;
	public $apism_update_status;
	public $apism_activation_tab_key;
	public $apism_settings_title;
	public $apism_menu_tab_activation_title;
	public $apism_menu_tab_deactivation_title;
	public $apism_options;
	public $apism_product_id;
	public $apism_instance_id;
	public $apism_domain;
	public $apism_software_version;
	public $apism_update_version;
	public $apism_update_version_cache;
	public $api_sm_themes_key;
    protected static $_instance = null;
    
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
        	self::$_instance = new self();
        }

        return self::$_instance;
    }

	public function __clone() {}

	public function __wakeup() {}

	public function __construct() {

		if ( is_admin() ) {

			add_action( 'admin_notices', array( $this, 'check_external_blocking' ) );
			$this->my_theme 							= wp_get_theme(get_template()); 
			$this->version 								= $this->my_theme->get( 'Version' );
			$this->theme_text_domain 					= $this->my_theme->get( 'TextDomain' );
			$this->apism_data_key 						= 'api_manager_' . $this->my_theme->get( 'TextDomain' );
			$this->apism_api_key 						= 'api_key';
			$this->apism_activation_email 				= 'activation_email';
			$this->apism_theme_version					= 'apism_theme_version';
			$this->apism_theme_text_domain				= 'apism_theme_text_domain';
			$this->apism_instance_key 					= $this->my_theme->get( 'TextDomain' ) . '_api_manager_instance';
			$this->apism_activated_key 					= 'api_sm_themes_active';
			$this->apism_activated_date					= 'api_sm_themes_active_date';
			$this->apism_update_status 					= 'apism_update_status';
			$this->apism_update_version					= 'apism_update_version';
			$this->apism_update_version_cache			= 'apism_update_version_cache';
			$this->apism_activation_tab_key 			= $this->my_theme->get( 'TextDomain' ) . '_api_manager_dashboard';
			$this->apism_settings_title 				= $this->my_theme->get( 'Name' ) . ' - API License Key Management';
			$this->apism_menu_tab_activation_title 		= __( 'License Activation', 'simpleshift-pro' );
			$this->apism_options 						= get_option( $this->apism_data_key );
			$this->apism_product_id 					= trim( $this->my_theme->get( 'Name' ) ); 
			

			// Performs activations, deactivations, status checks of API License Keys
			require_once( 'classes/class-key-api.php' );
			$this->api_sm_themes_key = new API_SM_Themes_Key();

			// Admin menu with the license key and license email form
			require_once( 'admin/class-api-menu.php' );
			$options = get_option( $this->apism_data_key );
			
			// status check
			require_once( 'classes/class-status-api.php' );

		}

	}
	

	public function theme_url() {
		if ( isset( $this->theme_url ) ) {
			return $this->theme_url;
		}
		return $this->theme_url = get_stylesheet_directory_uri() . '/';
	}
	
	
    /**
     * Displays an inactive notice when the software is inactive.
     */
	public static function api_sm_themes_inactive_notice() {
		if ( !is_super_admin() ) { return; } 
		$my_theme = wp_get_theme(get_template());
		?>
		<div id="message" class="error sm-api-error">
			<p><?php printf( __( '<span class="dashicons dashicons-warning" style="color:#dc3232;"></span>&nbsp;&nbsp; The ', 'simpleshift-pro' ) . $my_theme->get( 'Name' ) . __( ' Theme API License Key has not been activated for this website. %sClick here%s to activate the API License Key.', 'simpleshift-pro' ), '<a href="' . esc_url( admin_url( 'themes.php?page=' . $my_theme->get( 'TextDomain' )  . '_api_manager_dashboard' ) ) . '">', '</a>' ); ?></p>
		</div>
		<?php
	}
	

	/**
	 * Check for external blocking contstant
	 */
	public function check_external_blocking() {
		// show notice if external requests are blocked through the WP_HTTP_BLOCK_EXTERNAL constant
		if( defined( 'WP_HTTP_BLOCK_EXTERNAL' ) && WP_HTTP_BLOCK_EXTERNAL === true ) {
			// check if our API endpoint is in the allowed hosts
			$host = parse_url( $this->api_url, PHP_URL_HOST );
			if( ! defined( 'WP_ACCESSIBLE_HOSTS' ) || stristr( WP_ACCESSIBLE_HOSTS, $host ) === false ) {
				?>
				<div class="error sm-api-error">
					<p><?php printf( __( '<span class="dashicons dashicons-warning" style="color:#dc3232;"></span>&nbsp;&nbsp; You are blocking external requests which means you will not be able to register this theme.', 'simpleshift-pro' ) ); ?></p>
				</div>
				<?php
			}
		}
	}
	

} // End of class

function APISM() {
    return API_SM_Themes::instance();
}

// Initialize the class instance only once
APISM();