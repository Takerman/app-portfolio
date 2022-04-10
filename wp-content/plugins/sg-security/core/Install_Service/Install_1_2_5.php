<?php
namespace SG_Security\Install_Service;

use SG_Security\Install_Service\Install;
use SG_Security\Options_Service\Options_Service;
use SG_Security\Htaccess_Service\Hsts_Service;

/**
 * The instalation package version class.
 */
class Install_1_2_5 extends Install {

	/**
	 * The default install version. Overridden by the installation packages.
	 *
	 * @since 1.2.5
	 *
	 * @access protected
	 *
	 * @var string $version The install version.
	 */
	protected static $version = '1.2.5';

	/**
	 * Run the install procedure.
	 *
	 * @since 1.2.5
	 */
	public function install() {
		$this->remove_hsts_settings();
	}

	/**
	 * Remove the hsts settings.
	 *
	 * @since  1.2.5
	 */
	public function remove_hsts_settings() {
		// Initialize HSTS instance.
		$hsts_service = new Hsts_Service();

		// Toggle the hsts off.
		$hsts_service->toggle_rules( 0 );

		// Toggle off the option as well.
		Options_Service::change_option( 'hsts_protection', 0 );
	}
}
