<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/jrdevelopr
 * @since             1.0.0
 * @package           Webmaillite
 *
 * @wordpress-plugin
 * Plugin Name:       Webmail Lite
 * Plugin URI:        https://github.com/jrdevelopr/webmaillite
 * Description:       Email and correspond with your customers right inside the dashboard of WordPress using Webmail Lite.
 * Version:           1.0.0
 * Author:            Jr Developr
 * Author URI:        https://github.com/jrdevelopr
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       webmaillite
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
define( 'WEBMAILLITE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-webmaillite-activator.php
 */
function activate_webmaillite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-webmaillite-activator.php';
	Webmaillite_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-webmaillite-deactivator.php
 */
function deactivate_webmaillite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-webmaillite-deactivator.php';
	Webmaillite_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_webmaillite' );
register_deactivation_hook( __FILE__, 'deactivate_webmaillite' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-webmaillite.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_webmaillite() {

	$plugin = new Webmaillite();
	$plugin->run();

}
run_webmaillite();


// Add Page Link to Admin Dashboard

function webmaillite_menu() {
		add_menu_page(
			__( 'Webmail Lite', 'my-textdomain' ),
			__( 'Webmail Lite', 'my-textdomain' ),
			'edit_posts',
			'webmaillite',
			'webmaillite_contents',
			'dashicons-email-alt2',
			3
		);
	}

	add_action( 'admin_menu', 'webmaillite_menu' );


	function webmaillite_contents() {
		?>
		<h2>This is just a demo image of how the final product is expected to look - remove for production</h2>
<div>
	<img  style="width: 1000px;" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/webmail.png'; ?>">
</div>


		<?php
	}
