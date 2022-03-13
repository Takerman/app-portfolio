<?php
namespace SG_Security\Activator;

use SG_Security\Activity_Log\Activity_Log_Helper;
use SG_Security\Htaccess_Service\Directory_Service;
use SG_Security\Htaccess_Service\Headers_Service;
use SG_Security\Htaccess_Service\Xmlrpc_Service;
use SG_Security\Install_Service\Install_Service;

/**
 * Class managing plugin activation.
 */
class Activator {

	/**
	 * Run on plugin activation.
	 *
	 * @since 1.0.0
	 */
	public function activate() {
		Activity_Log_Helper::create_log_tables();

		// Check if system folder protection is enabled.
		if ( 1 === intval( get_option( 'sg_security_lock_system_folders', 0 ) ) ) {
			// Enable the existing rules on activation.
			$directory_service = new Directory_Service();
			$directory_service->toggle_rules( 1 );
		}

		// Check if we need to enable the xss protection.
		if ( 1 === intval( get_option( 'sg_security_xss_protection', 0 ) ) ) {
			$headers_service = new Headers_Service();

			// Set the path and enable the rule.
			$headers_service->set_htaccess_path();
			$headers_service->enable();
		}

		// Check if we need to enable the xml-rpc.
		if ( 1 === intval( get_option( 'sg_security_disable_xml_rpc', 0 ) ) ) {
			$xml_rpc_service = new Xmlrpc_Service();

			// Enable the rule.
			$xml_rpc_service->toggle_rules( 1 );
		}

		$install_service = new Install_Service();
		$install_service->install();
	}
}
