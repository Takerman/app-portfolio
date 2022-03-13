<?php
namespace SG_Security\Htaccess_Service;

/**
 * Class managing the HSTS Header related htaccess rules.
 */
class Hsts_Service extends Abstract_Htaccess_Service {

	/**
	 * The path to the htaccess template.
	 *
	 * @var string
	 */
	public $template = 'hsts-headers.tpl';

	/**
	 * Regular expressions to check if the rules are enabled.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @var array Regular expressions to check if the rules are enabled.
	 */
	public $rules = array(
		'enabled'     => '/\#\s+SGS HSTS Header Service/si',
		'disabled'    => '/\#\s+SGS\s+HSTS\s+Header\s+Service(.+?)\#\s+SGS\s+HSTS\s+Header\s+Service\s+END(\n)?/ims',
		'disable_all' => '/\#\s+SGS\s+HSTS\s+Header\s+Service\s+<IfModule mod_headers\.c>()\s+<\/IfModule>\s+\#\s+SGS\s+HSTS\s+Header\s+Service\s+END(\n)?/ims',
	);
}
