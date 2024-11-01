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
class Ajax_Contact_Form_Admin_Options {

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
 

    public function admin_menu() { 
        add_menu_page( 
            __('Ajax Contact Form', 'ajax-contact-form'),  // page title
            __('Ajax Contact Form', 'ajax-contact-form' ),  // menu title
            'manage_options', 
            'wpxon_acf', 
            array($this, 'admin_about'),   
            'dashicons-email', // icon
            75 // priority
        ); 

        add_submenu_page(
            'wpxon_acf', 
            __('Settings', 'ajax-contact-form'),  // page title
            __('Settings', 'ajax-contact-form' ),  // menu title
            'manage_options',  // page permission
            'wpxon_acfs',  // page slug
            array($this, 'admin_settings') 
        );  

    }
    
    public function admin_settings() { 

        include('ajax-contact-form-admin-settings.php');
    }

    public function admin_about() { 

        include('ajax-contact-form-admin-about.php');
    }


    public function settings_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    public function get_settings_sections() {
        $sections = array(
            array(
                'id'    => 'ajcf_style_one',
                'title' => __( 'General', 'ajax-contact-form' )
            ), 
            array(
                'id'    => 'ajcf_style_two',
                'title' => __( 'Form (Mail)', 'ajax-contact-form' )
            ) 
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    public function get_settings_fields() {
        $settings_fields = array(
            'ajcf_style_one' => array( 
                array(
                    'name'              => 't1_sec_title',
                    'label'             => __( 'Section Title', 'ajax-contact-form' ),
                    'desc'              => __( 'Write section title here.', 'ajax-contact-form' ),
                    'placeholder'       => __( 'AJAX Contact Form ( Simple & clean designed ).', 'ajax-contact-form' ),
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),   
                array(
                    'name'              => 't1_form_title',
                    'label'             => __( 'Form Title', 'ajax-contact-form' ),
                    'desc'              => __( 'Write form title here.', 'ajax-contact-form' ),
                    'placeholder'       => __( 'Contact Form', 'ajax-contact-form' ),
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),     
                array(
                    'name'              => 't1_form_width',
                    'label'             => __( 'Form Width', 'ajax-contact-form' ),
                    'desc'              => __( 'Insert column value here. Ex: 1 to 12 (bootstrap column)', 'ajax-contact-form' ),
                    'placeholder'       => __( '9', 'ajax-contact-form' ),
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),    
                array(
                    'name'    => 't1_from_bgc',
                    'label'   => __( 'Form  Button BG Color', 'ajax-contact-form' ),
                    'desc'    => __( 'Pick a color for button background.', 'ajax-contact-form' ),
                    'type'    => 'color',
                    'default' => '#5cb85c'
                ),     
                array(
                    'name'    => 't1_from_bdrc',
                    'label'   => __( 'Form  Button Border Color', 'ajax-contact-form' ),
                    'desc'    => __( 'Pick a color for button border.', 'ajax-contact-form' ),
                    'type'    => 'color',
                    'default' => '#4cae4c'
                ),  
                array(
                    'name'              => 't1_info_on',
                    'label'             => __( 'Info Display', 'ajax-contact-form' ),
                    'desc'              => __( 'Pick a color for review content.', 'ajax-contact-form' ),
                    'type'              => 'select',
                    'default'           => '0',
                    'options'           => array(
                                            '1'=> __('Enabled','ajax-contact-form'),
                                            '0'=> __('Disabled','ajax-contact-form')
                                        )
                ),  
                array(
                    'name'              => 't1_info_title',
                    'label'             => __( 'Info Title', 'ajax-contact-form' ),
                    'desc'              => __( 'Write info title here.', 'ajax-contact-form' ),
                    'placeholder'       => __( 'Contact Info', 'ajax-contact-form' ),
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),     
                array(
                    'name'              => 't1_info_width',
                    'label'             => __( 'Info Width', 'ajax-contact-form' ),
                    'desc'              => __( 'Insert column value here. Ex: 1 to 12 (bootstrap column)', 'ajax-contact-form' ),
                    'placeholder'       => __( '3', 'ajax-contact-form' ),
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),      
                array(
                    'name'              => 't1_info_content',
                    'label'             => __( 'Info Content', 'ajax-contact-form' ),
                    'desc'              => __( 'Write address here. Use ( | ) pipe for new paragraph.', 'ajax-contact-form' ),
                    'placeholder'       => __( '', 'ajax-contact-form' ),
                    'type'              => 'textarea',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                )   
            ), 
            'ajcf_style_two' => array( 
                array(
                    'name'              => 't2_mail_sub',
                    'label'             => __( 'Mail Subject', 'ajax-contact-form' ),
                    'desc'              => __( 'Write mail subject here.', 'ajax-contact-form' ),
                    'placeholder'       => __( 'Email Subject Title.', 'ajax-contact-form' ),
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
                array(
                    'name'              => 't2_mail_to',
                    'label'             => __( 'Mail To', 'ajax-contact-form' ),
                    'desc'              => __( 'Write recieved mail here.', 'ajax-contact-form' ),
                    'placeholder'       => __( '', 'ajax-contact-form' ),
                    'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),   
            )  
        );

        return $settings_fields;
    }
 
 


}
