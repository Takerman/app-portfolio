<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Extension_Social_Facebook extends FW_Extension {

	private $access_token_name = 'access_token';

	private $access_token;

	/**
	 * @internal
	 */
	public function _init() {
		$this->add_actions();
		$this->add_filters();
	}

	private function add_actions() {
		add_action( 'fw_extension_settings_form_saved:'. $this->get_parent()->get_name(), array(
				$this,
				'_action_fw_ext_social_facebook_save_options'
			), 10 );
	}

	private function add_filters() {
		add_filter( 'fw_ext_social_tabs', array( $this, '_filter_fw_ext_social_tabs' ) );
	}

	/**
	 * @param $options_before_save
	 */
	public function _action_fw_ext_social_facebook_save_options( $options_before_save ) {
		$parent = $this->get_parent()->get_name();
		$response = wp_remote_get(
			add_query_arg(
				array(
					'grant_type'    => 'client_credentials',
					'client_id'     => fw_get_db_ext_settings_option( $parent, 'facebook-app-id' ),
					'client_secret' => fw_get_db_ext_settings_option( $parent, 'facebook-app-secret' )
				), 'https://graph.facebook.com/oauth/access_token' ) );
		$body = json_decode( wp_remote_retrieve_body( $response ), true );

		if ( isset( $body['access_token'] ) ) {
			fw_set_db_extension_data( $this->get_name(), $this->access_token_name, $body['access_token'] );
		} else {
			fw_set_db_extension_data( $this->get_name(), $this->access_token_name, false );
		}
	}

	/**
	 * Insert options from /options/tabs.php
	 *
	 * @param $tabs
	 *
	 * @internal
	 * @return array
	 */
	public function _filter_fw_ext_social_tabs( $tabs ) {
		$facebook_tab = array(
			'facebook-tab' => array(
				'title'   => __( 'Facebook', 'fw' ),
				'type'    => 'tab',
				'options' => array(
					'general-settings' => array(
						'title'   => __( 'API Settings', 'fw' ),
						'type'    => 'box',
						'options' => array(
							'facebook-app-id'     => array(
								'type'  => 'text',
								'value' => '',
								'label' => __( 'App ID/API Key:', 'fw' ),
								'desc'  => __( 'Enter Facebook App ID / API Key.', 'fw' ),
							),
							'facebook-app-secret' => array(
								'type'  => 'text',
								'value' => '',
								'label' => __( 'App Secret:', 'fw' ),
								'desc'  => __( 'Enter Facebook App Secret.', 'fw' ),
							),
							apply_filters( 'fw_ext_social_facebook_general_box_options', array() )
						)
					),
					apply_filters( 'fw_ext_social_facebook_boxes_options', array() )
				),
			)
		);

		return array_merge( $tabs, $facebook_tab );
	}

	/**
	 * Accessing Facebook Graph API
	 *
	 * @param string $method
	 * @param $node
	 * @param $args
	 * @param bool $token
	 * @param string $version
	 * @param string $graph_url
	 *
	 * @return string
	 */
	public function graph_api_explorer( $method = 'GET', $node, $args, $token = false, $version = 'v2.2', $graph_url = 'https://graph.facebook.com' ) {

		if ( ! $token ) {
			$token = $this->get_access_token();
		}

		$args = array_merge( (array) $args, array( 'access_token' => $token ) );

		$req_url = $graph_url . '/' . $version . '/' . $node;

		$req_url = ( $method === 'GET' ) ? add_query_arg( $args, $req_url ) : $req_url;

		$response = wp_remote_request( $req_url, array(
				'method'    => $method,
				'sslverify' => false,
				'body'      => ( $method !== 'GET' ) ? $args : null
			)
		);

		return wp_remote_retrieve_body( $response );
	}

	/**
	 * Return Access Token generated from App ID and App Secret, that you can use to display the posts from any public Facebook page or open group.
	 * @return mixed|null
	 */
	public function get_access_token() {
		if ( $this->access_token === null ) {
			$this->access_token = fw_get_db_extension_data( $this->get_name(), $this->access_token_name );
		}

		return $this->access_token;
	}
}