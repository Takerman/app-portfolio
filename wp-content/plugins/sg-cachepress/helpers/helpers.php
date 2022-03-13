<?php
/**
 * Public function to purge cache.
 *
 * @since  5.0.0
 *
 * @param  string|bool $url The URL.
 *
 * @return bool True if the cache is deleted, false otherwise.
 */
function sg_cachepress_purge_cache( $url = false ) {
	// Bail if Dynamic cache is disabled.
	if ( 1 !== get_option( 'siteground_optimizer_enable_cache', 0 ) ) {
		return;
	}

	global $siteground_optimizer_loader;

	$url = empty( $url ) ? get_home_url( '/' ) : $url;

	do_action( 'siteground_optimizer_flush_cache', $url );

	return $siteground_optimizer_loader->supercacher->purge_cache_request( $url );
}

/**
 * Public function to purge the entire cache.
 *
 * @since  5.7.14
 */
function sg_cachepress_purge_everything() {
	global $siteground_optimizer_loader;

	// Purge Dynamic cache if enabled.
	if ( 1 === get_option( 'siteground_optimizer_enable_cache', 0 ) ) {
		$siteground_optimizer_loader->supercacher->purge_cache();
	}

	// Purge Memcached if enabled.
	if ( 1 === get_option( 'siteground_optimizer_enable_memcached', 0 ) ) {
		$siteground_optimizer_loader->supercacher->flush_memcache();
	}

	$siteground_optimizer_loader->supercacher->delete_assets();
}
