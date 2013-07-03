<?php
/*
Plugin Name: Shortcodes Lib
Plugin URI: http://www.wordpress.com/plugin
Description: A free shortcodes plugin, based to shortcoder-insert-tool and symple-shortcodes plugins
Author: Benoit S.
Version: 1.1
*/

// 
$plugin_dir_path = dirname(__FILE__);
define('PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_DIR_URL', plugin_dir_url(__FILE__));

// Include functions
require_once( $plugin_dir_path . '/includes/shortcode-editor-select.php' ); // Add selector to post/page editor
require_once( $plugin_dir_path . '/includes/scripts.php' ); // Adds plugin JS and CSS
require_once( $plugin_dir_path . '/includes/shortcode-functions.php'); // Main shortcode functions

// load languages files
load_plugin_textdomain( 'shortcodes_lib' , false , dirname( plugin_basename( __FILE__ ) ) . '/languages/');



add_action( 'init', 'github_plugin_updater_test_init' );
function github_plugin_updater_test_init() {

	include_once( $plugin_dir_path . '/updater.php');

	define( 'WP_GITHUB_FORCE_UPDATE', true );

	if ( is_admin() ) { // note the use of is_admin() to double check that this is happening in the admin

		$config = array(
			'slug' => plugin_basename( __FILE__ ),
			'proper_folder_name' => 'github-updater',
			'api_url' => 'https://api.github.com/repos/eniris/WordPress-GitHub-Plugin-Updater',
			'raw_url' => 'https://raw.github.com/eniris/WordPress-GitHub-Plugin-Updater/master',
			'github_url' => 'https://github.com/eniris/wordpress/tree/master/plugins/shortcodes-lib',
			'zip_url' => 'https://github.com/eniris/WordPress-GitHub-Plugin-Updater/archive/master.zip',
			'sslverify' => true,
			'requires' => '3.0',
			'tested' => '3.3',
			'readme' => 'README.md',
			'access_token' => '',
		);

		new WP_GitHub_Updater( $config );

	}

}

?>
