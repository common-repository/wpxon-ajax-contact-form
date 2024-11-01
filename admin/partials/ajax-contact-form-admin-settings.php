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
    <h2><?php esc_html_e('Ajax Contact Form Settings', 'ajax-contact-form'); ?></h2>
    <div id="poststuff"> 
        <div id="post-body" class="metabox-holder">  
        	<div id="post-body-content"> 
	            <div class="inside">
	                <?php $this->settings_api->show_navigation();?>
	                <?php $this->settings_api->show_forms();?> 
	            </div>   
	        </div>  
        </div>    
    </div>   
</div>  