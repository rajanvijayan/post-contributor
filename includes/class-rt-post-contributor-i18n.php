<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://rajanvijayan.com
 * @since      1.0.0
 *
 * @package    Rt_Post_Contributor
 * @subpackage Rt_Post_Contributor/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Rt_Post_Contributor
 * @subpackage Rt_Post_Contributor/includes
 * @author     Rajan Vijayan <rajanit2000@gmail.com>
 */
class Rt_Post_Contributor_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'rt-post-contributor',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
