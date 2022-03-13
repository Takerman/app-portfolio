<?php
namespace SG_Security\Install_Service;

use SG_Security\Install_Service\Install;
use SG_Security\Options_Service\Options_Service;
/**
 * The instalation package version class.
 */
class Install_1_2_3 extends Install {

	/**
	 * The default install version. Overridden by the installation packages.
	 *
	 * @since 1.2.3
	 *
	 * @access protected
	 *
	 * @var string $version The install version.
	 */
	protected static $version = '1.2.3';

	/**
	 * Run the install procedure.
	 *
	 * @since 1.2.3
	 */
	public function install() {
		if ( Options_Service::is_enabled( 'sg2fa' ) ) {
			// Schedule event to force logout.
			wp_schedule_single_event( time() + 1800, 'sgs_force_logout' );
		}
	}
}
