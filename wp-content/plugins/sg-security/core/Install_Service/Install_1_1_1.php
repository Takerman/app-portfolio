<?php
namespace SG_Security\Install_Service;

use SG_Security\Sg_2fa\Sg_2fa;
use SG_Security\Options_Service\Options_Service;

/**
 * The instalation package version class.
 */
class Install_1_1_1 extends Install {

	/**
	 * The default install version. Overridden by the installation packages.
	 *
	 * @since 1.1.1
	 *
	 * @access protected
	 *
	 * @var string $version The install version.
	 */
	protected static $version = '1.1.1';

	/**
	 * Run the install procedure.
	 *
	 * @since 1.1.1
	 */
	public function install() {
		$sg_2fa = new Sg_2fa();

		// Bail if the 2FA option is not enabled.
		if ( ! Options_Service::is_enabled( 'sg2fa' ) ) {
			return;
		}

		$users = get_users( array(
			'role__in'   => $sg_2fa->roles,
			'fields'     => array( 'ID' ),
			'meta_query' => array(
				array(
					'key'      => 'sg_security_2fa_secret',
					'compare'  => 'EXISTS',
				),
			),
		) );

		foreach ( $users as $user ) {
			$sg_2fa->generate_user_qr( $user->ID );
		}
	}
}
