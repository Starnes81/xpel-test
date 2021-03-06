<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              test
 * @since             1.0.0
 * @package           Xpel_plugin
 *
 * @wordpress-plugin
 * Plugin Name:       xpel plug in
 * Plugin URI:        test
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            test
 * Author URI:        test
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       xpel_plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-xpel_plugin-activator.php
 */
function activate_xpel_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-xpel_plugin-activator.php';
	Xpel_plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-xpel_plugin-deactivator.php
 */
function deactivate_xpel_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-xpel_plugin-deactivator.php';
	Xpel_plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_xpel_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_xpel_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-xpel_plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_xpel_plugin() {

	$plugin = new Xpel_plugin();
	$plugin->run();

}
run_xpel_plugin();

//function to call the form
function search_bar ($atts) {
	// lets create the form update action to your site http://www.example.com/xpel.php
	return '<form id="xpelData" name="xpelForm" action="http://xpel.blackonair.com/xpel.php" method="post">
			 <input id="xpelSearchValue" type="text" name="xpelInput">
			 <input type="submit" value="Submit">
			 </form>
			 <div id="xpelResults"></div>';
}
add_shortcode('xpel_search','search_bar'); // place shortcode in content area of a page [xpel_search]

// load plug in script
function xpel_script_files() {
    wp_enqueue_script( 'xpel_js', plugin_dir_url( __FILE__ ) . 'js/xpel.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'xpel_script_files' );