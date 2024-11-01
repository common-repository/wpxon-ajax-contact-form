<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link      http://wpxon.com/
 * @since      1.0.2
 *
 * @package    Ajax_Contact_Form
 * @subpackage Ajax_Contact_Form/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ajax_Contact_Form
 * @subpackage Ajax_Contact_Form/admin
 * @author     Wpxon <wpxon7@gmail.com>
 */
class Ajax_Contact_Form_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.2
	 * @access   private
	 * @var      string    $ajax_contact_form    The ID of this plugin.
	 */
	private $ajax_contact_form;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.2
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;


	/**
	 * The settings api of this plugin.
	 *
	 * @since    1.0.2
	 * @access   private
	 * @var 	$settings_api	The settings api of this plugin
	 */
	private $settings_api;

	/**
	 * The plugin plugin_base_file of the plugin.
	 *
	 * @since    1.0.2
	 * @access   protected
	 * @var      string plugin_base_file The plugin plugin_base_file of this plugin.
	 */
	protected $plugin_base_file;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.2
	 * @param      string    $ajax_contact_form       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $ajax_contact_form, $version ) {

		$this->ajax_contact_form = $ajax_contact_form;
		$this->version = $version;

        $this->settings_api = new Ajax_Contact_Form_Settings_API($this->ajax_contact_form, $this->version); 

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.2
	 */
	public function enqueue_styles() { 

		wp_enqueue_style( $this->ajax_contact_form, plugin_dir_url( __FILE__ ) . 'css/style.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.2
	 */
	public function enqueue_scripts() {
 
		wp_enqueue_script( $this->ajax_contact_form, plugin_dir_url( __FILE__ ) . 'js/main.js', array( 'jquery' ), $this->version, false );

	}

   

}
