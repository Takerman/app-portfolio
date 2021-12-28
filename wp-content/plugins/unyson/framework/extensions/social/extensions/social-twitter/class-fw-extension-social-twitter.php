<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Extension_Social_Twitter extends FW_Extension {

	/**
	 * @internal
	 */
	public function _init() {
		$this->add_filters();
	}

	private function add_filters() {
		add_filter( 'fw_ext_social_tabs', array( $this, '_filter_fw_ext_social_tabs' ) );
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
		$twitter_tab = array(
			'twitter-tab' => array(
				'title'   => __( 'Twitter', 'fw' ),
				'type'    => 'tab',
				'options' => array(
					'general-box' => array(
						'title'   => __( 'API Settings', 'fw' ),
						'type'    => 'box',
						'options' => array(
							'twitter-consumer-key'        => array(
								'type'  => 'text',
								'value' => '',
								'label' => __( 'Consumer Key', 'fw' ),
								'desc'  => __( 'Enter Twitter Consumer Key.', 'fw' ),
							),
							'twitter-consumer-secret'     => array(
								'type'  => 'text',
								'value' => '',
								'label' => __( 'Consumer Secret', 'fw' ),
								'desc'  => __( 'Enter Twitter App Secret.', 'fw' ),
							),
							'twitter-access-token'        => array(
								'type'  => 'text',
								'value' => '',
								'label' => __( 'Access Token', 'fw' ),
								'desc'  => __( 'Enter Twitter Access Token.', 'fw' ),
							),
							'twitter-access-token-secret' => array(
								'type'  => 'text',
								'value' => '',
								'label' => __( 'Access Token Secret', 'fw' ),
								'desc'  => __( 'Enter Twitter Access Token Secret.', 'fw' ),
							),
							apply_filters( 'fw_ext_social_twitter_general_box_options', array() )
						)
					),
					apply_filters( 'fw_ext_social_twitter_boxes_options', array() )
				),
			)
		);

		return array_merge( $tabs, $twitter_tab );
	}

	/**
	 * Returns a instance of TwitterOAuth (see: https://github.com/abraham/twitteroauth), based on keys inserted into the page Social
	 * @return TwitterOAuth
	 */
	public function get_connection() {
		require_once $this->get_declared_path() . '/includes/twitteroauth.php';
		$parent = $this->get_parent()->get_name();

		return new TwitterOAuth( fw_get_db_ext_settings_option( $parent, 'twitter-consumer-key' ), fw_get_db_ext_settings_option( $parent, 'twitter-consumer-secret' ), fw_get_db_ext_settings_option( $parent, 'twitter-access-token' ), fw_get_db_ext_settings_option( $parent, 'twitter-access-token-secret' ) );
	}
}
