<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest['name']        = __( 'Social', 'fw' );
$manifest['description'] = __( 'Use this extension to configure all your social related APIs. Other extensions will use the Social extension to connect to your social accounts.', 'fw' );
$manifest['version'] = '1.0.7';
$manifest['display'] = true;
$manifest['standalone'] = true;
$manifest['github_update'] = 'ThemeFuse/Unyson-Social-Extension';

$manifest['github_repo'] = 'https://github.com/ThemeFuse/Unyson-Social-Extension';
$manifest['uri'] = 'http://manual.unyson.io/en/latest/extension/social/index.html#content';
$manifest['author'] = 'ThemeFuse';
$manifest['author_uri'] = 'http://themefuse.com/';
