<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link      http://wpxon.com/
 * @since      1.0.2
 *
 * @package    Ajax_Contact_Form
 * @subpackage Ajax_Contact_Form/admin/partials
 */
  
 ?>

<div class="wrap"> 
    <h2><?php esc_html_e('Ajax Contact Form Info:', 'ajax-contact-form'); ?></h2>
    <div id="poststuff"> 
        <div id="post-body" class="metabox-holder  columns-2"> 
            <p><?php esc_html_e('Ajax Contact Form doesn’t store submitted messages anywhere. Therefore, you may lose important ','ajax-contact-form'); ?> <br>  
             <?php esc_html_e('messages forever if your mail server has issues or you make a mistake in mail configuration.','ajax-contact-form'); ?></p> 
             <hr> 
        	<div id="post-body-content">  
                <div class="inside"> 
                    <p>There are two ways to use <b><i>shortcode</i></b> to display at the frontend.</p>
                    <p>In posts or pages editor:</p>
                    <code> [ajax_contact_form]</code> 
                    <p>In php file:</p>
                    <code> &lt;?php echo do_shortcode('[ajax_contact_form]') ?&gt;
                    </code> 
                </div>  
	        </div>  
            <div id="postbox-container-1" class="postbox-container">
                <div class="meta-box-sortables">
                    <div class="postbox">
                        <h3>Support </h3> 
                        <hr>
                        <div class="inside">
                            <p>Plugin : <b>Ajax Contact Form</b> - v<?php echo $this->version; ?> </p>
                            <p>Author : wpxon</p>
                            <p>Email : <a href="mailto:wpxon7@gmail.com" target="_blank">wpxon7@gmail.com</a></p> 
                            <p>Website : <a href="http://wpxon.com" target="_blank">http://wpxon.com</a></p>
                        </div>
                    </div> 
                </div> 
            </div> 
        </div>    
    </div>   
</div>  