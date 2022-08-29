<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https//showrav.com
 * @since             1.0.0
 * @package           Ninja_Table_Custom_Slug_Filter
 *
 * @wordpress-plugin
 * Plugin Name:       Ninja Table Custom Slug Filter
 * Plugin URI:        https://github.com/khmahfuzhasan/Ninja-Table-Custom-slug-Filter
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Khandaker Mahfuz Hasan
 * Author URI:        https//showrav.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ninja-table-custom-slug-filter
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
define( 'NINJA_TABLE_CUSTOM_SLUG_FILTER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ninja-table-custom-slug-filter-activator.php
 */
function activate_ninja_table_custom_slug_filter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ninja-table-custom-slug-filter-activator.php';
	Ninja_Table_Custom_Slug_Filter_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ninja-table-custom-slug-filter-deactivator.php
 */
function deactivate_ninja_table_custom_slug_filter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ninja-table-custom-slug-filter-deactivator.php';
	Ninja_Table_Custom_Slug_Filter_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ninja_table_custom_slug_filter' );
register_deactivation_hook( __FILE__, 'deactivate_ninja_table_custom_slug_filter' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ninja-table-custom-slug-filter.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

// Start Ninja Table Custom Slug Filter
add_filter('ninja_table_js_config', function ($config, $filter) {


	if (!empty($config['shortCodeData']['get_filter'])) {
		$filter_var = $config['shortCodeData']['get_filter'];
		if('basename' === $filter_var){
			$filter = basename($_SERVER['REQUEST_URI']);
		}
		if (isset($_GET[$filter_var])) {
			$filter = sanitize_text_field($_GET[$filter_var]);
		}
		if (isset($_GET['column'])) {
			$config['settings']['filter_column'] = explode(',', $_GET['column']);
		}
	}
	$filter = apply_filters('ninja_parse_placeholder', $filter);
	$config['default_filter'] = $filter;
	if (isset($config['shortCodeData']['stackable']) && $config['shortCodeData']['stackable']) {
		$config['settings']['stackable'] = $config['shortCodeData']['stackable'];
		$devices = $config['shortCodeData']['stack_devices'];
		$devices = explode(',', $devices);
		$config['settings']['stacks_devices'] = $devices;
	}

	return $config;
}, 90, 2);


function run_ninja_table_custom_slug_filter() {

	$plugin = new Ninja_Table_Custom_Slug_Filter();
	$plugin->run();

}
run_ninja_table_custom_slug_filter();
