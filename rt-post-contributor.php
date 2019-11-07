<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://rajanvijayan.com
 * @since             1.0.0
 * @package           Rt_Post_Contributor
 *
 * @wordpress-plugin
 * Plugin Name:       RT Post Contributor
 * Plugin URI:        https://rajanvijayan.com/contributor
 * Description:       Create a post with more than one author.
 * Version:           1.0.0
 * Author:            Rajan Vijayan
 * Author URI:        https://rajanvijayan.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rt-post-contributor
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'RT_POST_CONTRIBUTOR_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-rt-post-contributor-activator.php
 */
function activate_rt_post_contributor() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rt-post-contributor-activator.php';
	Rt_Post_Contributor_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-rt-post-contributor-deactivator.php
 */
function deactivate_rt_post_contributor() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rt-post-contributor-deactivator.php';
	Rt_Post_Contributor_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_rt_post_contributor' );
register_deactivation_hook( __FILE__, 'deactivate_rt_post_contributor' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-rt-post-contributor.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_rt_post_contributor() {

	$plugin = new Rt_Post_Contributor();
	$plugin->run();

}
run_rt_post_contributor();
