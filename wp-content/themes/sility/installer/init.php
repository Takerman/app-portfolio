<?php
/**
 * Version 0.0.2
 */

require_once(  dirname( __FILE__ ) .'/importer/radium-importer.php' ); //load admin theme data importer

class Radium_Theme_Demo_Data_Importer extends Radium_Theme_Importer {

    /**
     * Holds a copy of the object for easy reference.
     *
     * @since 0.0.1
     *
     * @var object
     */
    private static $instance;
    
    /**
     * Set the key to be used to store theme options
     *
     * @since 0.0.2
     *
     * @var object
     */
    public $theme_option_name = 'Avendor'; //set theme options name here
		
	public $theme_options_file_name = 'theme_options.txt';
	
	public $widgets_file_name 		=  'widgets.json';
	
	public $content_demo_file_name  =  'content.xml';
	
	/**
	 * Holds a copy of the widget settings 
	 *
	 * @since 0.0.2
	 *
	 * @var object
	 */
	public $widget_import_results;
	
    /**
     * Constructor. Hooks all interactions to initialize the class.
     *
     * @since 0.0.1
     */
    public function __construct() {
    
		$this->demo_files_path = dirname(__FILE__) . '/demo-files/';

        self::$instance = $this;
		parent::__construct();

    }
	
	/**
	 * Add menus
	 *
	 * @since 0.0.1
	 */
	 
	public function set_demo_menus(){ 
		$locations = get_theme_mod( 'nav_menu_locations' ); // registered menu locations in theme
		$menus = wp_get_nav_menus(); // registered menus
		
		if($menus) {
			//print_r($menus);
			foreach($menus as $menu) { // assign menus to theme locations
				if( $menu->name == 'Main Menu' ) {
					$locations['primary_nav'] = $menu->term_id;
				} else if( $menu->name == 'Footer navigation' ) {
					$locations['footer_nav'] = $menu->term_id;
				} else if( $menu->name == 'Top' ) {
					$locations['top_navigation'] = $menu->term_id;
				}
			}
		}
		 
		set_theme_mod('nav_menu_locations', $locations); // set menus to locations 
		
	} 

}

new Radium_Theme_Demo_Data_Importer;