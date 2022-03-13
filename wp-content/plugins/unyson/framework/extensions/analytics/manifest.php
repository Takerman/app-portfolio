<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest['name']        = __( 'Analytics', 'fw' );
$manifest['description'] = __( 'Enables the possibility to add the Google Analytics tracking code that will let you get all the analytics about visitors, page views and more.', 'fw' );
$manifest['version'] = '1.0.1';
$manifest['display'] = true;
$manifest['standalone'] = true;

$manifest['github_update'] = 'ThemeFuse/Unyson-Analytics-Extension';

$manifest['github_repo'] = 'https://github.com/ThemeFuse/Unyson-Analytics-Extension';
$manifest['uri'] = 'http://manual.unyson.io/en/latest/extension/introduction.html#content';
$manifest['author'] = 'ThemeFuse';
$manifest['author_uri'] = 'http://themefuse.com/';
