<?php

/**
 * The main plugin file definition
 * This file isn't instatiated directly, it acts as a shared parent for other classes
 * @link    http://midwestfamilymarketing.com
 * @since   1.0.0
 * @package wp_query_engine
 */

namespace WPCL\QueryEngine\Common;

class Plugin {

	/**
	 * Plugin Name
	 * @since 1.0.0
	 * @access protected
	 * @var (string) $name : The unique identifier for this plugin
	 */
	protected static $name = 'wpcl_query_engine';

	/**
	 * Plugin Version
	 * @since 1.0.0
	 * @access protected
	 * @var (string) $version : The version number of the plugin, used to version scripts / styles
	 */
	protected static $version = '1.0.0';

	/**
	 * Plugin Path
	 * @since 1.0.0
	 * @access protected
	 * @var (string) $path : The path to the plugins location on the server, is inherited by child classes
	 */
	protected static $path;

	/**
	 * Plugin URL
	 * @since 1.0.0
	 * @access protected
	 * @var (string) $url : The URL path to the location on the web, accessible by a browser
	 */
	protected static $url;

	/**
	 * Plugin Slug
	 * @since 1.0.0
	 * @access protected
	 * @var (string) $slug : Basename of the plugin, needed for Wordpress to set transients, and udpates
	 */
	protected static $slug;

	/**
	 * Plugin Options
	 * @since 1.0.0
	 * @access protected
	 * @var (array) $settings : The array that holds plugin options
	 */
	protected $loader;

	/**
	 * Registers our plugin with WordPress.
	 */
	public static function register() {
		// Get called class
		$className = get_called_class();
		// Instantiate class
		$class = new $className();
		// Create API manager
		$class->loader = \WPCL\QueryEngine\Loader::get_instance();
		// Register stuff
		$class->loader->register( $class );
		// Return instance
		return $class;
	}

	/**
	 * Constructor
	 * @since 1.0.0
	 * @access protected
	 */
	protected function __construct() {
		self::$path = plugin_dir_path( WPCL_QUERY_ENGINE_PLUGIN );
		self::$url  = plugin_dir_url( WPCL_QUERY_ENGINE_PLUGIN );
		self::$slug = plugin_basename( WPCL_QUERY_ENGINE_PLUGIN );
	}

	/**
	 * Helper function to use relative URLs
	 * @since 1.0.0
	 * @access protected
	 */
	public static function url( $url = '' ) {
		return self::$url . ltrim( $url, '/' );
	}

	/**
	 * Helper function to use relative paths
	 * @since 1.0.0
	 * @access protected
	 */
	public static function path( $path = '' ) {
		return self::$path . ltrim( $path, '/' );
	}

	/**
	 * Helper function to print debugging statements to the window
	 * @since 1.0.0
	 * @access protected
	 */
	public static function expose( $expression ) {
		echo '<pre class="expose">';
		print_r( $expression );
		echo '</pre>';
	}

} // end class