<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class API_SM_Themes_Key {

	public function create_software_api_url( $args ) {

		$api_url = add_query_arg( 'wc-api', 'sm-themes-api', APISM()->api_url );

		return $api_url . '&' . http_build_query( $args );
	}

	public function activate( $args ) {

		$defaults = array(
			'request' 			=> 'activation',
			'source'			=> get_site_url(),
			);

		$args = wp_parse_args( $defaults, $args );

		$target_url = esc_url_raw( $this->create_software_api_url( $args ) );
	
		$request = wp_remote_get( $target_url );

		if( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) != 200 ) {
			
			return false;
		}

		$response = wp_remote_retrieve_body( $request );

		return $response;
	}



	/**
	 * Checks if the software is activated or deactivated
	 * @param  array $args
	 * @return array
	 */
	public function status( $args ) {

		$defaults = array(
			'request' 			=> 'status',
			'source'			=> get_site_url(),
			);

		$args = wp_parse_args( $defaults, $args );

		$target_url = esc_url_raw( $this->create_software_api_url( $args ) );

		$request = wp_remote_get( $target_url );

		if( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) != 200 ) {
			return false;
		}

		$response = wp_remote_retrieve_body( $request );

		return $response;
	}

}

