<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class API_SM_Themes_MENU {

	private $api_sm_themes_key;

	// Load admin menu
	public function __construct() {
		$this->api_sm_themes_key = APISM()->api_sm_themes_key;
		add_action( 'admin_menu', array( $this, 'add_menu' ) );
		add_action( 'admin_init', array( $this, 'load_settings' ) );
	}

	// Add option page menu
	public function add_menu() {
		$page = add_theme_page( __( 'Theme Activation', 'simpleshift-pro' ), __( 'Theme Activation', 'simpleshift-pro' ),
						'manage_options', APISM()->apism_activation_tab_key, array( $this, 'config_page')
		);
		add_action( 'admin_print_styles-' . $page, array( $this, 'css_scripts' ) );
	}

	// Draw option page
	public function config_page() {
		
		?>
		<div class='wrap'>
			<h2><?php echo APISM()->my_theme->get( 'Name' ); ?> <?php _e( ' - API License Key Management', 'simpleshift-pro' ); ?></h2>
			<form action='options.php' method='post'>
					<div class="main">
						<?php
							settings_fields( APISM()->apism_data_key );
							do_settings_sections( APISM()->apism_activation_tab_key );
							submit_button( __( 'Save Changes', 'simpleshift-pro' ) );
						?>
					</div>
			</form>
		</div>
		<?php
	}

	// Register settings
	public function load_settings() {

		register_setting( APISM()->apism_data_key, APISM()->apism_data_key, array( $this, 'validate_options' ) );

		// API Key
		add_settings_section( APISM()->apism_api_key, __( 'API License Activation', 'simpleshift-pro' ), array( $this, 'apism_key_text' ), APISM()->apism_activation_tab_key );
		add_settings_field( APISM()->apism_api_key, __( 'Order/API Key', 'simpleshift-pro' ), array( $this, 'apism_key_field' ), APISM()->apism_activation_tab_key, APISM()->apism_api_key );
		add_settings_field( APISM()->apism_activation_email, __( 'API Email', 'simpleshift-pro' ), array( $this, 'apism_email_field' ), APISM()->apism_activation_tab_key, APISM()->apism_api_key );

	}

	// Provides text for api key section
	public function apism_key_text() {
		$my_theme = wp_get_theme(get_template());
		if ( get_option( 'api_sm_themes_active' ) != 'Activated' ) {
			echo '
			<div style="padding:20px;border:1px solid black;">
				<p>Thank you for choosing the ' . APISM()->apism_product_id . ' Theme. To activate this license please copy your API Key and API Email from the Account tab of the <a href="'.APISM()->login_url.'">Membership Dashboard here.</a></p>
			</div>';
		} else {
			echo '
			<div style="padding:20px;border:1px solid green;">
				<p>Your API License Key is active.</p>
			</div>';
		}
		if ((get_option( 'api_sm_themes_active' ) != 'Activated' ) && (APISM()->apism_options[APISM()->apism_api_key] !='')) {
			echo '
			<div style="margin-top:30px;padding:20px;border:1px solid red;">
				<p>It looks like this license has been canceled or has expired.</p>
				<p>We would like to offer you a special membership opportunity that will provide you access to all of our themes, support, and updates, for only $9/month. Please email us with the subject line "Special Renewal Offer" at: <a href="mailto:'.APISM()->sales_contact.'">'.APISM()->sales_contact.'</a></p>
			</div>';
		}
	}

	// Outputs API License text field
	public function apism_key_field() {
		echo "<input id='api_key' name='" . APISM()->apism_data_key . "[" . APISM()->apism_api_key ."]' size='25' type='text' value='" . APISM()->apism_options[APISM()->apism_api_key] . "' />";
	}

	// Outputs API License email text field
	public function apism_email_field() {
		echo "<input id='activation_email' name='" . APISM()->apism_data_key . "[" . APISM()->apism_activation_email ."]' size='25' type='text' value='" . APISM()->apism_options[APISM()->apism_activation_email] . "' />";
	}

	// Sanitizes and validates all input and output for Dashboard
	public function validate_options( $input ) {

		// Load existing options, validate, and update with changes from input before returning
		$options = APISM()->apism_options;
		$options[APISM()->apism_api_key] = trim( $input[APISM()->apism_api_key] );
		$options[APISM()->apism_activation_email] = trim( $input[APISM()->apism_activation_email] );

		/**
		  * Activation
		  */
		  
		$api_email = trim( $input[APISM()->apism_activation_email] );
		$api_key = trim( $input[APISM()->apism_api_key] );
		$activation_status = get_option( APISM()->apism_activated_key );
		$current_api_key = APISM()->apism_options[APISM()->apism_api_key];


		$args = array(
			'email' 		=> $api_email,
			'licence_key' 	=> $api_key,
			);


		$activate_results = json_decode( $this->api_sm_themes_key->activate( $args ), true );

		if ( $activate_results['activated'] === true ) {
			add_settings_error( 'activate_text', 'activate_msg', __( 'Theme activated. ', 'simpleshift-pro' ), 'updated' );
			update_option( APISM()->apism_activated_key, 'Activated' );
			update_option( APISM()->apism_activated_date, '' );
		}

		if ( $activate_results == false ) {
			add_settings_error( 'api_key_check_text', 'api_key_check_error', __( 'Connection failed to the License Key API server. Try again later.', 'simpleshift-pro' ), 'error' );
			$options[APISM()->apism_api_key] = '';
			$options[APISM()->apism_activation_email] = '';
			update_option( APISM()->apism_activated_key, 'Deactivated' );
			update_option( APISM()->apism_activated_date, '' );
		}

		if ( isset( $activate_results['code'] ) ) {
					add_settings_error( 'code_text', 'code_error', "{$activate_results['error']}", 'error' );
					$options[APISM()->apism_activation_email] = '';
					$options[APISM()->apism_api_key] = '';
					update_option( APISM()->apism_activated_key, 'Deactivated' );
					update_option( APISM()->apism_activated_date, '' );
		} // End Activation

		return $options;
	}


	// Loads admin style sheets
	public function css_scripts() {
		wp_register_style( APISM()->apism_data_key . '-css', APISM()->theme_url() . 'api/assets/css/admin-settings.css', array(), APISM()->version, 'all');
		wp_enqueue_style( APISM()->apism_data_key . '-css' );
	}

}

new API_SM_Themes_MENU();
