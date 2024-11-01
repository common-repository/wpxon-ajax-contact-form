<?php
/** 
 * Plugin Name:       WPxon Ajax Contact Form
 * Plugin URI:        http://wpxon.com/ajcf
 * Description:       Ajax contact form is a simple and clean deisnged contact form.
 * Version:           1.0.5
 * Author:            WPxon
 * Author URI:        http://wpxon.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ajax-contact-form
 * Domain Path:       /languages
 *
 * @link              http://wpxon.com/
 * @since             1.0.2
 * @package           Ajax_Contact_Form
 */
 
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Currently plugin version.  
 */
define( 'AJAX_CONTACT_FORM_VERSION', '1.0.5' ); 
define( 'AJAX_CONTACT_FORM_PLUGIN', plugin_basename( __FILE__ ) );  
define( 'AJAX_CONTACT_FORM', dirname( AJAX_CONTACT_FORM_PLUGIN ) );           
define( 'AJAX_CONTACT_FORM_DIR', WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) );      
define( 'AJAX_CONTACT_FORM_STORE_URL', 'http://wpxon.com/' );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ajax-contact-form-activator.php
 */
function activate_ajax_contact_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ajax-contact-form-activator.php';
	Ajax_Contact_Form_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ajax-contact-form-deactivator.php
 */
function deactivate_ajax_contact_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ajax-contact-form-deactivator.php';
	Ajax_Contact_Form_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ajax_contact_form' );
register_deactivation_hook( __FILE__, 'deactivate_ajax_contact_form' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ajax-contact-form.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.2
 */
function run_ajax_contact_form() {

	$plugin = new Ajax_Contact_Form();
	$plugin->run();

}
run_ajax_contact_form();

 