<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://se7encoders.com
 * @since      1.0.0
 *
 * @package    Ieee_Ulab
 * @subpackage Ieee_Ulab/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ieee_Ulab
 * @subpackage Ieee_Ulab/includes
 * @author     Shakil Shareef <shakil.cse19@gmail.com>
 */
class Ieee_Ulab_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ieee-ulab',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
