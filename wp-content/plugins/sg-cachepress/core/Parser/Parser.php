<?php
namespace SiteGround_Optimizer\Parser;

use SiteGround_Optimizer\Minifier\Minifier;
use SiteGround_Optimizer\Options\Options;
use SiteGround_Optimizer\Combinator\Css_Combinator;
use SiteGround_Optimizer\Combinator\Js_Combinator;
use SiteGround_Optimizer\Combinator\Fonts_Optimizer;
use SiteGround_Optimizer\DNS\Prefetch;
use SiteGround_Optimizer\Ssl\Ssl;

/**
 * Parser functions and main initialization class.
 */
class Parser {

	/**
	 * Run the parser.
	 *
	 * @since  5.5.2
	 *
	 * @param  string $html The page html.
	 *
	 * @return string $html The modified html.
	 */
	public function run( $html ) {
		// Replace unsecure links if the option is enabled.
		if ( Options::is_enabled( 'siteground_optimizer_fix_insecure_content' ) ) {
			$html = Ssl::get_instance()->replace_insecure_links( $html );
		}

		// Do not run optimizations for amp.
		if (
			$this->is_amp_enabled( $html ) ||
			$this->is_xml( $html ) ||
			is_feed() ||
			\is_user_logged_in()
		) {
			return $html;
		}

		$html = $this->optimize_for_visitors( $html );

		return $html;
	}

	/**
	 * Check if specific frontend optimization should be used for visitors.
	 *
	 * @since  5.9.7
	 *
	 * @param  string $html The page html.
	 *
	 * @return string $html The modified html.
	 */
	public function optimize_for_visitors( $html ) {

		if ( Options::is_enabled( 'siteground_optimizer_combine_css' ) ) {
			$html = Css_Combinator::get_instance()->run( $html );
		}

		if ( Options::is_enabled( 'siteground_optimizer_combine_javascript' ) ) {
			$html = Js_Combinator::get_instance()->run( $html );
		}

		if ( Options::is_enabled( 'siteground_optimizer_optimize_web_fonts' ) ) {
			$html = Fonts_Optimizer::get_instance()->run( $html );
		}
		$html = Prefetch::get_instance()->run( $html );

		if ( Options::is_enabled( 'siteground_optimizer_optimize_html' ) ) {
			$html = Minifier::get_instance()->run( $html );
		}

		return $html;
	}

	/**
	 * AMP Atribute check. Runs a check if AMP option is enabled
	 *
	 * @since 5.5.8
	 *
	 * @param string $html The page html.
	 *
	 * @return bool $run_amp_check Wheter the page is loaded via AMP.
	 */
	public function is_amp_enabled( $html ) {
		// Get the first 200 chars of the file to make the preg_match check faster.
		$is_amp = substr( $html, 0, 200 );
		// Cheks if the document is containing the amp tag.
		$run_amp_check = preg_match( '/<html[^>]+(amp|⚡)[^>]*>/', $is_amp );

		return $run_amp_check;
	}

	/**
	 * Check if the provided html is a xml.
	 *
	 * @since  5.7.13
	 *
	 * @param  string $html The page html.
	 *
	 * @return bool $run_xml_check Wheter the page xml sitemap.
	 */
	public function is_xml( $html ) {
		// Get the first 200 chars of the file to make the preg_match check faster.
		$is_xml = substr( $html, 0, 200 );

		$run_xml_check = preg_match( '/<\?xml version="/', $is_xml );

		return $run_xml_check;
	}

	/**
	 * Start buffer.
	 *
	 * @since  5.5.0
	 */
	public function start_bufffer() {
		ob_start( array( $this, 'run' ) );
	}

	/**
	 * End the buffer.
	 *
	 * @since  5.5.0
	 */
	public function end_buffer() {
		if ( ob_get_length() ) {
			ob_end_flush();
		}
	}
}
