<?php
/*
Plugin Name: Shortcodes Lib
Plugin URI: https://github.com/eniris/shortcodes-lib
Description: A free shortcodes plugin, based to shortcoder-insert-tool and symple-shortcodes plugins
Author: Benoit S.
Version: 1.2
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

//*
// github plugin updater
// https://github.com/jkudish/WordPress-GitHub-Plugin-Updater
//add_action( 'init', 'github_plugin_updater_test_init' );
//function github_plugin_updater_test_init() {

	include_once( $plugin_dir_path . '/updater.php' );

	define( 'WP_GITHUB_FORCE_UPDATE', true );

	if ( is_admin() ) { // note the use of is_admin() to double check that this is happening in the admin

		$config = array(
			'slug' => plugin_basename( __FILE__ ), // this is the slug of your plugin
			'proper_folder_name' => 'shortcodes-lib', // this is the name of the folder your plugin lives in
			'api_url' => 'https://api.github.com/repos/eniris/shortcodes-lib', // the github API url of your github repo
			'raw_url' => 'https://raw.github.com/eniris/shortcodes-lib/master', // the github raw url of your github repo
			'github_url' => 'https://github.com/eniris/shortcodes-lib', // the github url of your github repo
			'zip_url' => 'https://github.com/eniris/shortcodes-lib/archive/master.zip', // the zip url of the github repo
			'sslverify' => true, // wether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
			'requires' => '3.0', // which version of WordPress does your plugin require?
			'tested' => '3.5.2', // which version of WordPress is your plugin tested up to?
			'readme' => 'README.md', // which file to use as the readme for the version number
			'access_token' => '', // Access private repositories by authorizing under Appearance > Github Updates when this example plugin is installed
		);

		new WP_GitHub_Updater( $config );

	}

//}
//*/
?>