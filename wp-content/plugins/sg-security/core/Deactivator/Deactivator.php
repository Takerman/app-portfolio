<?php
namespace SG_Security\Deactivator;

use SG_Security\Htaccess_Service\Directory_Service;
use SG_Security\Htaccess_Service\Headers_Service;
use SG_Security\Htaccess_Service\Xmlrpc_Service;

/**
 * Class that manages plugin deactivation.
 */
class Deactivator {

	/**
	 * Run on plugin deactivation.
	 *
	 * @since 1.0.0
	 */
	public function deactivate() {
		// Disable any existing rules for directory hardening.
		$directory_service = new Directory_Service();
		$directory_service->toggle_rules( 0 );

		// Disable any headers we add.
		$headers_service = new Headers_Service();
		$headers_service->set_htaccess_path();
		$headers_service->disable();

		// Disable the XML-RPC rules.
		$xml_rpc_service = new Xmlrpc_Service();
		$xml_rpc_service->toggle_rules( 0 );
	}
}
