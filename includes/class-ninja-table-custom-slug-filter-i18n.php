<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https//showrav.com
 * @since      1.0.0
 *
 * @package    Ninja_Table_Custom_Slug_Filter
 * @subpackage Ninja_Table_Custom_Slug_Filter/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ninja_Table_Custom_Slug_Filter
 * @subpackage Ninja_Table_Custom_Slug_Filter/includes
 * @author     Khandaker Mahfuz Hasan <khandakermahfuzhasan@gmail.com>
 */
class Ninja_Table_Custom_Slug_Filter_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ninja-table-custom-slug-filter',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
