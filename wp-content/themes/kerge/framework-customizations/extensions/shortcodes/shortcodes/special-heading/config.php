<?php if (!defined('FW')) die('Forbidden');

$cfg = array();

$cfg['page_builder'] = array(
	'title'         => __('Special Heading', 'kerge'),
	'description'   => __('Add a Special Heading', 'kerge'),
	'tab'           => __('Content Elements', 'kerge'),
    'title_template' => '{{- title }}: {{- o.description }}',
);