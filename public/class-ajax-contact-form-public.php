<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link      
 * @since      1.0.2
 *
 * @package    Ajax_Contact_Form
 * @subpackage Ajax_Contact_Form/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ajax_Contact_Form
 * @subpackage Ajax_Contact_Form/public
 * @author     Wpxon <wpxon7@gmail.com>
 */
class Ajax_Contact_Form_Public {

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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.2
	 * @param      string    $ajax_contact_form       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $ajax_contact_form, $version ) {

		$this->ajax_contact_form = $ajax_contact_form;
		$this->version = $version;

		$this->settings_api = new Ajax_Contact_Form_Settings_API($this->ajax_contact_form, $this->version); 

	}
 
	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.2
	 */
	public function enqueue_styles() {

		wp_enqueue_style( 'ajcf-bootstrap', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'ajcf-animate', plugin_dir_url( __FILE__ ) . 'css/animate.css', array(), $this->version, 'all' ); 
		wp_enqueue_style( 'ajcf-style', plugin_dir_url( __FILE__ ) . 'css/style.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.2
	 */
	public function enqueue_scripts() {
 
		wp_enqueue_script( 'ajcf-form-validator', plugin_dir_url( __FILE__ ) . 'js/form-validator.min.js', array('jquery'), $this->version, true );
		wp_enqueue_script( 'ajcf-contact-form', plugin_dir_url( __FILE__ ) . 'js/contact-form-script.js', array('ajcf-form-validator'), $this->version, true );
		wp_enqueue_script( 'ajcf-main', plugin_dir_url( __FILE__ ) . 'js/main.js', array('ajcf-contact-form'), $this->version, true );
		// Localize the script with new data
		wp_localize_script( 'ajcf-contact-form', 'ajcf', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	}



	// boooking form
	function ajcf_sentemail() {
	   
		$errorMSG = "";

		// NAME
		if (empty($_POST["name"])) {
		    $errorMSG = "Name is required ";
		} else {
		    $name = $_POST["name"];
		}

		// EMAIL
		if (empty($_POST["email"])) {
		    $errorMSG .= "Email is required ";
		} else {
		    $email = $_POST["email"];
		}

		// MSG SUBJECT
		if (empty($_POST["msg_subject"])) {
		    $errorMSG .= "Subject is required ";
		} else {
		    $msg_subject = $_POST["msg_subject"];
		}


		// MESSAGE
		if (empty($_POST["message"])) {
		    $errorMSG .= "Message is required ";
		} else {
		    $message = $_POST["message"];
		}

		$sett_val = $this->settings_value();

		$EmailTo = ($sett_val['mail_to']) ? $sett_val['mail_to'] : 'wpxon7@gmail.com';
		$Subject = ($sett_val['mail_sub']) ? $sett_val['mail_sub'] : 'New Email Received';

		// prepare email body text
		$Body = "";
		$Body .= "Name: ";
		$Body .= $name;
		$Body .= "\n";
		$Body .= "Email: ";
		$Body .= $email;
		$Body .= "\n";
		$Body .= "Subject: ";
		$Body .= $msg_subject;
		$Body .= "\n";
		$Body .= "Message: ";
		$Body .= $message;
		$Body .= "\n";

		// send email
		$success = wp_mail($EmailTo, $Subject, $Body, "From:".$email);

		// redirect to success page
		if ($success && $errorMSG == ""){
		   $results = "success";
		}else{
		    if($errorMSG == ""){
		        $results = "Something went wrong :(";
		    } else {
		        $results = $errorMSG;
		    }
		}
 
	    // Return the String
	    die($results);
	} 

	/**
	 * Frontend Shortcode
	 *
	 * @since    1.0.2
	 */
	public function ajax_contact_form_frontend($atts,$content = null) {
		$sett_val = $this->settings_value();
		$atts = shortcode_atts(array(
		    'style' =>'one',  
		), $atts); 
		ob_start(); 

		include('partials/ajax-contact-form-public-display.php');
		?> 
		<?php 
		return ob_get_clean();
	}

	/**
	 * Settings value
	 *
	 * @since    1.0.2
	 */
    public function settings_value(){  
		$sec_title = $this->settings_api->get_option('t1_sec_title','ajcf_style_one',''); 
		$form_title = $this->settings_api->get_option('t1_form_title','ajcf_style_one',''); 
		$form_width = $this->settings_api->get_option('t1_form_width','ajcf_style_one',''); 
		$from_bgc = $this->settings_api->get_option('t1_from_bgc','ajcf_style_one',''); 
		$from_bdrc = $this->settings_api->get_option('t1_from_bdrc','ajcf_style_one',''); 
		$info_on = $this->settings_api->get_option('t1_info_on','ajcf_style_one',''); 
		$info_title = $this->settings_api->get_option('t1_info_title','ajcf_style_one',''); 
		$info_width = $this->settings_api->get_option('t1_info_width','ajcf_style_one',''); 
		$info_content = $this->settings_api->get_option('t1_info_content','ajcf_style_one',''); 

		$mail_sub = $this->settings_api->get_option('t2_mail_sub','ajcf_style_two',''); 
		$mail_to = $this->settings_api->get_option('t2_mail_to','ajcf_style_two',''); 
		$val =  array('sec_title'=>$sec_title,'form_title'=>$form_title,'form_width'=>$form_width,'from_bgc'=>$from_bgc,'from_bdrc'=>$from_bdrc,'info_on'=>$info_on,'info_title'=>$info_title,'info_width'=>$info_width,'info_content'=>$info_content,'mail_sub'=>$mail_sub,'mail_to'=>$mail_to); 
		return $val;
    } 
}
