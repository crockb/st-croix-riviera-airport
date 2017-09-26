<?php


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class API_SM_Themes_Status {

	private $api_sm_themes_key;

	public function __construct() {
		$this->api_sm_themes_key = APISM()->api_sm_themes_key;
		add_action( 'admin_init', array( $this, 'update_status_info' ) );
		add_action( 'admin_init', array( $this, 'check_update_status' ) );
	}

	// run status checks
	public function update_status_info() {	
		if (get_option( 'api_sm_themes_active' ) == 'Activated') {
			if ( time() > (get_option( 'api_sm_themes_active_date' )+172800) ) { 
				$status_email=APISM()->apism_options[APISM()->apism_activation_email];
				$status_key=APISM()->apism_options[APISM()->apism_api_key];
				$status_version_current=APISM()->version;
				$status_product_current=APISM()->theme_text_domain;
			
				$args = array(
					'email' 		=> $status_email,
					'licence_key' 	=> $status_key,
					'version'		=> $status_version_current,
					'product'		=> $status_product_current,
				);

				$status_results = json_decode( $this->api_sm_themes_key->status( $args ), true );
				
				if ( $status_results['activated'] === true ) {
					if (($status_results['access'] == true) && ($status_results['update'] == true)) {
						update_option( APISM()->apism_update_status, 'Update' );
					} else {
						update_option( APISM()->apism_update_status, 'Current' );
					}
					update_option( APISM()->apism_update_version, $status_results['currentversion'] );
					update_option( APISM()->apism_activated_date, $status_results['timestamp'] );
				}
				
				if ( $status_results == false ) {
					add_action( 'admin_notices', array( $this, 'no_access_to_api' ) );
					update_option( APISM()->apism_activated_date, time() );
				}
				
				if ( isset( $status_results['code'] ) ) {
					update_option( APISM()->apism_activated_key, 'Deactivated' );
					update_option( APISM()->apism_activated_date, $status_results['timestamp']  );
				} // End Activation
			} // end date check
		}
	}
	
	// update notice
	public function check_update_status() {	
		if (get_option( 'api_sm_themes_active' ) == 'Activated') {
			if (get_option( 'apism_update_version_cache' ) == '') {
				update_option( APISM()->apism_update_version_cache, APISM()->version );
			}
			if (get_option( 'apism_update_version_cache' ) != APISM()->version) {
				update_option( APISM()->apism_update_status, 'Current' );
				update_option( APISM()->apism_update_version_cache, APISM()->version );
			}
			if (get_option( 'apism_update_version' ) != APISM()->version ) {
				update_option( APISM()->apism_update_status, 'Update' );
			}
			if (get_option( 'apism_update_status' ) == 'Update') {
				add_action( 'admin_notices', array( $this, 'theme_update_req' ) );
			}
		}
	}

	public function theme_update_req() {
		$my_theme = wp_get_theme(get_template());
		?>
		<div class="error sm-api-error">
			<p><?php printf( '<span class="dashicons dashicons-star-filled" style="color:#dc3232;"></span>&nbsp;&nbsp; There is new version of the ' . APISM()->apism_product_id . ' Theme. Please log into your <a href="'. APISM()->login_url .'">Member Account</a> to download this important security and feature update.'); ?></p>
		</div>
		<?php
	}


	public function no_access_to_api() {
		$my_theme = wp_get_theme(get_template());
		?>
		<div class="error sm-api-error">
			<p><?php printf( __( '<span class="dashicons dashicons-warning" style="color:#dc3232;"></span>&nbsp;&nbsp; <b>Warning!</b> You are not currently able to access the API. This may be due to our an outage on our end or lack of connectivity via your hosting environment.', 'simpleshift-pro' ) ); ?></p>
		</div>
		<?php
	}
	
	
	
}

new API_SM_Themes_Status();