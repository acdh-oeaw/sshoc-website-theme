<?php

function arcadia_form_system_theme_settings_alter(&$form, $form_state) {

  	
	$form['settings'] = array(     
		'#type' => 'vertical_tabs',  
		'#title' => t('arcadia Settings'),
		'#prefix' => '<h2><small>' . t('Theme Settings') . '</small></h2>',
		'#weight' => 2,           
		'#collapsible' => TRUE,      
		'#collapsed' => FALSE,       
	);

		
	/************************/
	/*** General Settings ***/
	/************************/

	$form['settings']['general'] = array(
		'#type' => 'fieldset',
		'#title' => t('General settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);

	$form['settings']['general']['top_header_message'] = array(
		'#type'          => 'textfield',
		'#title'         => t('Top header message'),
		'#default_value' => theme_get_setting('top_header_message'),
		'#description'   => t("Insert text for top header region."),
	);
	
	$form['settings']['general']['header_number_phone'] = array(
		'#type'          => 'textfield',
		'#title'         => t('Number Phone in header'),
		'#default_value' => theme_get_setting('header_number_phone'),
		'#description'   => t("Insert number phone."),
	);
	
	$form['settings']['general']['header_email'] = array(
		'#type'          => 'textfield',
		'#title'         => t('E-Mail in header'),
		'#default_value' => theme_get_setting('header_email'),
		'#description'   => t("Insert e-mail address."),
	);
	
	$form['settings']['general']['google_analytics_code'] = array(
		'#type'          => 'textarea',
		'#title'         => t('Code for Google Analitycs'),
		'#default_value' => theme_get_setting('google_analytics_code'),
		'#description'   => t("Insert Code for Google Analitycs."),
	);
	
	$form['settings']['about'] = array(
		'#type' => 'fieldset',
		'#title' => t('About message settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	
	$form['settings']['about']['view_about_area'] = array(
		'#type' => 'checkbox',
		'#title' => t('Display About Area'),
		'#default_value' => theme_get_setting('view_about_area'),
		'#description' => t('Show About area from the homepage.'),
	);
	
	$form['settings']['about']['about_title'] = array(
		'#type'          => 'textfield',
		'#title'         => t('About Title'),
		'#default_value' => theme_get_setting('about_title'),
		'#description'   => t("Insert about title."),
	);
	
	$form['settings']['about']['about_text'] = array(
		'#type'          => 'textarea',
		'#title'         => t('About Text'),
		'#default_value' => theme_get_setting('about_text'),
		'#description'   => t("Insert text for about."),
	);
	
	$form['settings']['about']['view_message_text'] = array(
		'#type' => 'checkbox',
		'#title' => t('Display Message'),
		'#default_value' => theme_get_setting('view_message_text'),
		'#description' => t('Show message area from the homepage.'),
	);
	
	$form['settings']['about']['message_text_hp'] = array(
		'#type'          => 'textarea',
		'#title'         => t('Message Text in Home Page'),
		'#default_value' => theme_get_setting('message_text_hp'),
		'#description'   => t("Insert text for message."),
	);
	
	
	$form['settings']['social'] = array(
		'#type' => 'fieldset',
		'#title' => t('Social settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	
	$form['settings']['footer'] = array(
		'#type' => 'fieldset',
		'#title' => t('Footer settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	
	$form['settings']['footer']['text_footer_left'] = array(
		'#type'          => 'textfield',
		'#title'         => t('Text footer left'),
		'#default_value' => theme_get_setting('text_footer_left'),
		'#description'   => t("Insert left text"),
	);	
	$form['settings']['footer']['text_footer_right'] = array(
		'#type'          => 'textfield',
		'#title'         => t('Text footer right'),
		'#default_value' => theme_get_setting('text_footer_right'),
		'#description'   => t("Insert right text."),
	);
	
	$form['settings']['footer']['text_footer'] = array(
		'#type'          => 'textarea',
		'#title'         => t('Text footer'),
		'#default_value' => theme_get_setting('text_footer'),
		'#description'   => t("Insert text footer."),
	);
	
	$form['settings']['footer']['footer_text_column_one'] = array(
		'#type'          => 'textarea',
		'#title'         => t('Text footer column one'),
		'#default_value' => theme_get_setting('footer_text_column_one'),
		'#description'   => t("Insert text footer."),
	);
	
	$form['settings']['footer']['footer_text_column_two'] = array(
		'#type'          => 'textarea',
		'#title'         => t('Text footer column two'),
		'#default_value' => theme_get_setting('footer_text_column_two'),
		'#description'   => t("Insert text footer."),
	);

	$form['settings']['footer']['footer_text_column_three'] = array(
		'#type'          => 'textarea',
		'#title'         => t('Text footer column three'),
		'#default_value' => theme_get_setting('footer_text_column_three'),
		'#description'   => t("Insert text footer."),
	);	
	
	$form['settings']['footer']['footer_text_column_four'] = array(
		'#type'          => 'textarea',
		'#title'         => t('Text footer column four'),
		'#default_value' => theme_get_setting('footer_text_column_four'),
		'#description'   => t("Insert text footer."),
	);		
	
	$form['settings']['footer']['footer_logo'] = array(
		'#title' => t('Logo footer'),
		'#type' => 'managed_file',
		'#description' => t('The uploaded image will be displayed on this page using the image style choosen below.'),
		'#default_value' => variable_get('footer_logo', ''),
		'#upload_location' => 'public://footer_logo/',
	);	
	
	$form['settings']['social']['url_facebook'] = array(
		'#type'          => 'textfield',
		'#title'         => t('URL Facebook'),
		'#default_value' => theme_get_setting('url_facebook'),
		'#description'   => t("Insert url."),
	);	
	$form['settings']['social']['url_twitter'] = array(
		'#type'          => 'textfield',
		'#title'         => t('URL Twitter'),
		'#default_value' => theme_get_setting('url_twitter'),
		'#description'   => t("Insert url."),
	);
	$form['settings']['social']['url_linkedin'] = array(
		'#type'          => 'textfield',
		'#title'         => t('URL Linkedin'),
		'#default_value' => theme_get_setting('url_linkedin'),
		'#description'   => t("Insert url."),
	);	
	
	$form['settings']['social']['url_google'] = array(
		'#type'          => 'textfield',
		'#title'         => t('URL Google+'),
		'#default_value' => theme_get_setting('url_google'),
		'#description'   => t("Insert url."),
	);
	
	$form['settings']['social']['url_youtube'] = array(
		'#type'          => 'textfield',
		'#title'         => t('URL Youtube'),
		'#default_value' => theme_get_setting('url_youtube'),
		'#description'   => t("Insert url."),
	);
	


	// Add a Services Area.	
	$form['settings']['services'] = array(
		'#type' => 'fieldset',
		'#title' => t('Services Area Settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	
	
	$form['settings']['services']['view_services_area'] = array(
		'#type' => 'checkbox',
		'#title' => t('Display Services Area'),
		'#default_value' => theme_get_setting('view_services_area'),
		'#description' => t('Show services area from the homepage.'),
	);

	$form['settings']['services']['services_title_block'] = array(
		'#type'          => 'textfield',
		'#title'         => t('Block title'),
		'#default_value' => theme_get_setting('services_title_block'),
		'#description'   => t("Insert title for this block."),
	);

	$form['settings']['services']['services_background'] = array(
		'#type'     => 'managed_file',
		'#title'    => t('Background image'),
		'#description' => t('The uploaded image will be displayed on background area.'),
		'#upload_location' => file_default_scheme() . '://theme/backgrounds/',
		'#default_value' => theme_get_setting('services_background'), 
		'#upload_validators' => array('file_validate_extensions' => array('gif png jpg jpeg'),),
	);
	
	$form['settings']['services']['show_readmore'] = array(
	    '#type' => 'checkbox',
	    '#title' => t('Show read more link'),
	    '#default_value' => theme_get_setting('show_readmore')
	);

	// Add a News Area.	
	$form['settings']['news'] = array(
		'#type' => 'fieldset',
		'#title' => t('News Area Settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	
	$form['settings']['news']['view_news_area'] = array(
		'#type' => 'checkbox',
		'#title' => t('Display News Area'),
		'#default_value' => theme_get_setting('view_news_area'),
		'#description' => t('Show news area from the homepage.'),
	);

	$form['settings']['news']['news_title_block'] = array(
		'#type'          => 'textfield',
		'#title'         => t('Block title'),
		'#default_value' => theme_get_setting('news_title_block'),
		'#description'   => t("Insert title for this block."),
	);

	// Add a Partners Area.	
	$form['settings']['partners'] = array(
		'#type' => 'fieldset',
		'#title' => t('Partners Area Settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	
	$form['settings']['partners']['view_partners_area'] = array(
		'#type' => 'checkbox',
		'#title' => t('Display Partners Area'),
		'#default_value' => theme_get_setting('view_partners_area'),
		'#description' => t('Show partners area from the homepage.'),
	);

	

	// Add a Testimonials Area.	
	$form['settings']['testimonials'] = array(
		'#type' => 'fieldset',
		'#title' => t('Testimonials Area Settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	

	$form['settings']['testimonials']['view_testimonial_area'] = array(
		'#type' => 'checkbox',
		'#title' => t('Display Testimonial Area'),
		'#default_value' => theme_get_setting('view_testimonial_area'),
		'#description' => t('Show testimonial area from the homepage.'),
	);
	
	$form['settings']['testimonials']['view_testimonial_photo'] = array(
		'#type' => 'checkbox',
		'#title' => t('Display Photo'),
		'#default_value' => theme_get_setting('view_testimonial_photo'),
		'#description' => t('Show testimonial photo in Block.'),
	);
}