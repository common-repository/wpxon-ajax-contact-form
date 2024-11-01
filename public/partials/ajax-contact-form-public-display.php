<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link      	http://wpxon.com/
 * @since      1.0.2
 *
 * @package    Ajax_Contact_Form
 * @subpackage Ajax_Contact_Form/public/partials
 */
?> 
<?php //echo $atts['style']; ?>

 <div id="container">

      <!-- Start Page Header -->
      <?php if(!empty($sett_val['sec_title'])): ?>
        <div class="page-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h1><?php echo esc_html($sett_val['sec_title']); ?></h1>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <!-- End Page Header -->        
      
      <!-- Start Content Section -->
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-md-9">
              <h2 class="big-title"><?php echo esc_html($sett_val['form_title']); ?></h2>   

            <!-- Start Contact Form -->
            <form role="form" id="contactForm" class="contact-form" data-toggle="validator" class="shake">
              <div class="form-group">
                <div class="controls">
                  <input type="text" id="name" class="form-control" placeholder="Name" required data-error="Please enter your name">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="controls">
                  <input type="email" class="email form-control" id="email" placeholder="Email" required data-error="Please enter your email">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="controls">
                  <input type="text" id="msg_subject" class="form-control" placeholder="Subject" required data-error="Please enter your message subject">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="controls">
                  <textarea id="message" rows="7" placeholder="Massage" class="form-control" required data-error="Write your message"></textarea>
                  <div class="help-block with-errors"></div>
                </div>  
              </div>

              <button type="submit" id="submit" class="btn btn-success"></i> Send Message</button>
              <div id="msgSubmit" class="h3 text-center hidden"></div> 
              <div class="clearfix"></div>   

            </form>     
            <!-- End Contact Form -->

            </div>
            <div class="col-md-3">
              <h2 class="big-title"><?php echo esc_html($sett_val['info_title']); ?></h2>   
              <div class="information">    
                <div class="contact-datails">
                  <?php $info_content = $sett_val['info_content']; 

                    if(preg_match("/\|/", $info_content)){
                      $info_content = explode('|', $info_content);
                    } 
                  ?>
                  <?php if(is_array($info_content)): ?>
                      <?php foreach ($info_content as $key => $value) {
                          echo '<p>';
                          echo wp_kses_post($value); 
                          echo '</p>'; 
                      } ?>
                  <?php else:
                        echo '<p>';
                        echo wp_kses_post($info_content); 
                        echo '</p>';  
                  endif; ?>   
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Content Section  -->
      
    </div>