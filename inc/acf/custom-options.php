<?php
//ini_set('display_errors', 1);
/**
 * Theme Options
 */
use StoutLogic\AcfBuilder\FieldsBuilder;	
$options_builder = new FieldsBuilder( 'custom-options' );
$options_builder

	// Languages
	->addTab('Languages', ['placement' => 'left','wrapper' => ['width' => 5]])
	->addTrueFalse('language_flags', ['label' => 'Show Flags','required' => 0,'default_value' => 1,'ui' => 1])
	->addTrueFalse('language_names', ['label' => 'Show Names','required' => 0,'default_value' => 0,'ui' => 1])
	->addTrueFalse('language_dropdowns', ['label' => 'Show Dropdown','required' => 0,'default_value' => 0,'ui' => 1])

	// WooCommerce
	->addTab('WooCommerce', ['placement' => 'left','wrapper' => ['width' => 5]])
	->addText('shop_title')
	->addText('acf_single_price_info', ['label' => 'Single Price Information'])
	->addTrueFalse('wishlist', ['label' => 'Show Wishlist','required' => 0,'default_value' => 0,'ui' => 1])

	// Testimonials
	->addTab('Testimonials', ['placement' => 'left','wrapper' => ['width' => 5]])
	->addRepeater('testimonials_list', ['layout' => 'block', 'label' => 'Testimonial item', 'wrapper' => ['width' => 100]])
		->addText('testimonial_text', ['layout' => 'block', 'label' => 'Text', 'wrapper' => ['width' => 40]])
		->addText('testimonial_name', ['layout' => 'block', 'label' => 'Name', 'wrapper' => ['width' => 20]])
		->addText('testimonial_role', ['layout' => 'block', 'label' => 'Role', 'wrapper' => ['width' => 20]])
		->addImage('testimonial_image', ['return_format' => 'id', 'wrapper' => ['width' => 20], 'label' => 'Image'])
	->endRepeater()	

	// Sectors & Countries
	->addTab('Sectors & Countries', ['placement' => 'left','wrapper' => ['width' => 5]])
	->addRepeater('sectors_list', ['label' => 'Sectors List ( All Forms )'])
		->addText('sectors_list_form')
	->endRepeater()
	->addRepeater('countries_list', ['label' => 'Countries List ( All Forms )'])
		->addText('countries_list_form')
	->endRepeater()

	// Contact (Google Map, Phone, Email)
	->addTab('Contact', ['placement' => 'left', 'label' => 'Contact Info','wrapper' => ['width' => 5]])
	->addText('map_url', ['layout' => 'block', 'label' => 'Embed URL', 'instructions' => 'Use Share => Embed a map <a href="https://www.google.com/maps/" target="_blank">Find adress</a>', 'wrapper' => ['width' => 25]])
	->addText('map_url_place', ['layout' => 'block', 'label' => 'Embed URL', 'instructions' => 'Use Place URL <a href="https://www.google.com/maps/" target="_blank">Find adress</a>', 'wrapper' => ['width' => 25]])
	->addNumber('map_zoom', ['label' => 'Zoom','instructions' => 'Google Map Zoom (0 - 21)','required' => 0,'default_value' => '15','min' => '0','max' => '21','step' => '1', 'wrapper' => ['width' => 25]])
	->addNumber('map_height', ['label' => 'Map height','instructions' => '200-1200px / width:100%','required' => 0,'default_value' => '450','min' => '200','max' => '1200','step' => '50', 'wrapper' => ['width' => 25]])
	->addText('map_address', ['layout' => 'block', 'label' => 'Full adress (*if need below Map Frame)','instructions' => 'To show map Contact Us page or other place - use ready WP Map pattern', 'wrapper' => ['width' => 100]])
	->addEmail('email', ['label' => 'E-mail', 'wrapper' => ['width' => 100]])
	->addText('tel', ['label' => 'Phone'])
	->addUrl('soc_fb', ['layout' => 'block', 'label' => 'Facebook', 'default_value' => 'https://facebook.com', 'wrapper' => ['width' => 20]])
	->addUrl('soc_in', ['layout' => 'block', 'label' => 'Instagram', 'default_value' => 'https://instagram.com', 'wrapper' => ['width' => 20]])
	->addUrl('soc_ln', ['layout' => 'block', 'label' => 'Linkedin', 'default_value' => 'https://linkedin.com', 'wrapper' => ['width' => 20]])
	->addUrl('soc_tw', ['layout' => 'block', 'label' => 'Twitter', 'default_value' => 'https://twitter.com', 'wrapper' => ['width' => 20]])
	->addUrl('soc_yt', ['layout' => 'block', 'label' => 'Youtube', 'default_value' => 'https://youtube.com', 'wrapper' => ['width' => 20]])

	// Theme Variables
	->addTab('Theme Settings', ['placement' => 'left','wrapper' => ['width' => 5]])
	->addRange('grid_size', ['label' => 'Grid Size px','required' => 0,'default_value' => '1360','min' => '320','max' => '2000','step' => '', 'wrapper' => ['width' => 50]])
	->addNumber('img_border', ['label' => 'Img Global Radius px','required' => 0,'default_value' => '0','min' => '0','max' => '1000','step' => '', 'wrapper' => ['width' => 50]])
	->addNumber('body_size_s', ['label' => 'Small Font px','required' => 0,'default_value' => '11','min' => '10','max' => '30','step' => '', 'wrapper' => ['width' => 25]])
	->addNumber('body_size_m', ['label' => 'Medium Font px','required' => 0,'default_value' => '16','min' => '10','max' => '60','step' => '', 'wrapper' => ['width' => 25]])
	->addNumber('body_size_l', ['label' => 'Large Font px','required' => 0,'default_value' => '24','min' => '10','max' => '90','step' => '', 'wrapper' => ['width' => 25]])
	->addNumber('body_size_xl', ['label' => 'XLarge Font px','required' => 0,'default_value' => '36','min' => '10','max' => '120','step' => '', 'wrapper' => ['width' => 25]])
	
	->addRepeater('gradient_list', ['layout' => 'block', 'label' => 'Simple Linear Gradient', 'wrapper' => ['width' => 100]])
		->addText('gradient_name', ['layout' => 'block', 'label' => 'Gradient name', 'wrapper' => ['width' => 75]])
		->addSelect('gradient_dir', ['label' => 'Select Field','choices' => ['to top','to top right','to right top','to right','to bottom right','to right bottom','to bottom','to bottom left','to left bottom','to left','to left top','to top left'],'default_value' => ['to left'],'wrapper' => ['width' => 25]])
		->addColorPicker('gradient_col_base', ['layout' => 'block', 'label' => 'Colour base code', 'wrapper' => ['width' => 25]])
		->addRepeater('colour_gradient_list', ['layout' => 'block', 'label' => 'Add Color Gradient', 'wrapper' => ['width' => 50]])
			->addColorPicker('gradient_col', ['layout' => 'block', 'label' => 'Colour extra code', 'wrapper' => ['width' => 50]])
			->addNumber('gradient_deg', ['label' => 'Angle deg','required' => 0,'default_value' => '0','min' => '0','max' => '360','step' => '', 'wrapper' => ['width' => 50]])
		->endRepeater()
		->addNumber('gradient_deg_base', ['label' => 'Angle deg base','required' => 0,'default_value' => '0','min' => '0','max' => '360','step' => '', 'wrapper' => ['width' => 25]])
	->endRepeater()
	
	->addRepeater('color_list', ['layout' => 'block', 'label' => 'Theme Base Colours', 'wrapper' => ['width' => 50]])
		->addText('col_name', ['layout' => 'block', 'label' => 'Colour name', 'wrapper' => ['width' => 60]])
		->addColorPicker('col_code', ['layout' => 'block', 'label' => 'Colour code', 'wrapper' => ['width' => 40]])
	->endRepeater()

	->addRepeater('duotone_list', ['layout' => 'block', 'label' => 'Theme Duotone Colours', 'wrapper' => ['width' => 50]])
		->addText('duo_name', ['layout' => 'block', 'label' => 'Colour Duotone name', 'wrapper' => ['width' => 40]])
		->addColorPicker('duo_code_1', ['layout' => 'block', 'label' => 'Colour Duotone 1 code', 'wrapper' => ['width' => 30]])
		->addColorPicker('duo_code_2', ['layout' => 'block', 'label' => 'Colour Duotone 2 code', 'wrapper' => ['width' => 30]])
	->endRepeater()
	
	// Swiper Slider
	->addTab('Swiper Slider', ['placement' => 'left','wrapper' => ['width' => 5]])
	->addRepeater('swiper_list', ['layout' => 'block', 'label' => 'Swiper Slider list', 'wrapper' => ['width' => 100]])
		->addColorPicker('swiper_col', ['layout' => 'block', 'label' => 'Button Colour / Arr&Pagin', 'wrapper' => ['width' => 20]])
		->addColorPicker('swiper_hov_col', ['layout' => 'block', 'label' => 'Button Hover Col', 'wrapper' => ['width' => 20]])
		->addNumber('swiper_items', ['label' => 'Visible Items','required' => 0,'default_value' => '4','min' => '2','max' => '20','step' => '1', 'wrapper' => ['width' => 20]])
		->addNumber('swiper_items_tab', ['label' => 'Visible Tab Items','required' => 0,'default_value' => '2','min' => '1','max' => '10','step' => '1', 'wrapper' => ['width' => 20]])
		->addNumber('swiper_items_mob', ['label' => 'Visible Mob Items','required' => 0,'default_value' => '1','min' => '1','max' => '10','step' => '1', 'wrapper' => ['width' => 20]])
		->addText('swiper_parent', ['layout' => 'block', 'label' => 'Parent Item','default_value' => '#news_loop.swiper ul.wp-block-query', 'wrapper' => ['width' => 33]])
		->addText('swiper_child', ['layout' => 'block', 'label' => 'Child Items','default_value' => '#news_loop.swiper ul.wp-block-query li.post', 'wrapper' => ['width' => 33]])
	->endRepeater()

	// Scss Compiler
	->addTab('SCSS Theme custom style', ['placement' => 'left','wrapper' => ['width' => 5]])
	->addTextarea('scss_block', ['label' => 'SCSS Cmpiler to dist minify','wrapper' => ['width'=>100]])

	// Meta Header & Footer
	->addTab('Header & Footer', ['placement' => 'left','wrapper' => ['width' => 5]])
	->addTextarea('meta_header', ['label' => 'Meta Header','wrapper' => ['width'=>100]])
	->addTextarea('sc_footer', ['label' => 'Scripts Footer','wrapper' => ['width'=>100]])

	// Contact Forms
	->addTab('Contact Forms', ['label' => 'Contact Forms','placement' => 'left'])
	->addRepeater('form_field_list', ['layout' => 'block', 'label' => 'Form Settings', 'wrapper' => ['width' => 100]])
		->addText('form_title', ['layout' => 'block', 'wrapper' => ['width' => 15], 'label' => 'Form Title (*optional)'])
		->addText('form_to_emails', ['layout' => 'block', 'wrapper' => ['width' => 20], 'label' => 'Recipient emails (*admin added)'])
		->addText('form_submit_txt', ['layout' => 'block', 'wrapper' => ['width' => 16], 'label' => 'Submit Btn Text','default_value' => 'Submit'])
		->addText('form_short', ['layout' => 'block', 'wrapper' => ['width' => 17], 'label' => 'Shortcode (*uniq [acf-form_**] **lang)','default_value' => 'form_contact_en'])
		->addText('form_lang', ['layout' => 'block', 'wrapper' => ['width' => 17], 'label' => 'ID/Lang (*uniq)','default_value' => 'en'])
		->addTrueFalse('form_steps', ['label' => 'Steps (*max 2)','required' => 0,'default_value' => '0','ui' => 1,'wrapper' => ['width' => 15]])
		// Form Fields
		->addTab('Form Fields', ['label' => 'Form Fields'])
		->addTrueFalse('full_name', ['label' => 'Full Name','required' => 0,'default_value' => 1,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addTrueFalse('first_name', ['label' => 'First Name','required' => 0,'default_value' => 0,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addTrueFalse('last_name', ['label' => 'Last Name','required' => 0,'default_value' => 0,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addTrueFalse('email', ['label' => 'Email','' => 1,'default_value' => 1,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addTrueFalse('phone', ['label' => 'Phone','required' => 0,'default_value' => 1,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addTrueFalse('subject', ['label' => 'Subject','required' => 0,'default_value' => 0,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addTrueFalse('company', ['label' => 'Company','required' => 0,'default_value' => 0,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addTrueFalse('country', ['label' => 'Country','required' => 0,'default_value' => 0,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addTrueFalse('sectors', ['label' => 'Sectors','required' => 0,'default_value' => 0,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addTrueFalse('date', ['label' => 'Date','required' => 0,'default_value' => 0,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addTrueFalse('time', ['label' => 'Time','required' => 0,'default_value' => 0,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addTrueFalse('url', ['label' => 'Url','required' => 0,'default_value' => 0,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addTrueFalse('range', ['label' => 'Range','required' => 0,'default_value' => 0,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addTrueFalse('located', ['label' => 'Located','required' => 0,'default_value' => 0,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addTrueFalse('message', ['label' => 'Message (*step2)','' => 1,'default_value' => 1,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addTrueFalse('agree', ['label' => 'Agree','required' => 0,'default_value' => 1,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addTrueFalse('file_upload', ['label' => 'File Upload','required' => 0,'default_value' => '0','ui' => 1,'wrapper' => ['width' => 16.5]])
		->addNumber('file_max', ['label' => 'Max Kb','default_value' => 0,'wrapper' => ['width' => 16.5]])
		->addText('file_formats', ['label' => 'Formats','default_value' => 'jpg,jpeg,png,pdf,doc,docx','wrapper' => ['width' => 16.5]])		
		
		// Form Field Placeholders
		->addTab('Form Placeholders', ['label' => 'Form Placeholders'])
		->addText('full_name_placeholder', ['label' => 'Full Name ','default_value' => 'Your Full Name','wrapper' => ['width' => 16.5]])
		->addText('first_name_placeholder', ['label' => 'First Name','default_value' => 'Your First Name','wrapper' => ['width' => 16.5]])
		->addText('last_name_placeholder', ['label' => 'Last Name','default_value' => 'Your Last Name','wrapper' => ['width' => 16.5]])
		->addText('email_placeholder', ['label' => 'Email','default_value' => 'info@company.com','wrapper' => ['width' => 16.5]])
		->addText('phone_placeholder', ['label' => 'Phone','default_value' => '+447950000000','wrapper' => ['width' => 16.5]])
		->addText('subject_placeholder', ['label' => 'Subject','default_value' => 'Your Subject','wrapper' => ['width' => 16.5]])
		->addText('company_placeholder', ['label' => 'Company','default_value' => 'Company','wrapper' => ['width' => 16.5]])
		// ->addText('country_placeholder', ['label' => 'Country','default_value' => 'Select Country','wrapper' => ['width' => 16.5]])
		// ->addText('sectors_placeholder', ['label' => 'Sectors','default_value' => 'Select Sector','wrapper' => ['width' => 16.5]])
		->addText('message_placeholder', ['label' => 'Message','default_value' => 'Your Message','wrapper' => ['width' => 16.5]])
		->addText('file_placeholder', ['label' => 'Files','default_value' => 'Files Upload','wrapper' => ['width' => 16.5]])
		->addText('date_placeholder', ['label' => 'Date','default_value' => 'DD/MM/YYYY','wrapper' => ['width' => 16.5]])
		->addText('time_placeholder', ['label' => 'Time','default_value' => '00:00','wrapper' => ['width' => 16.5]])
		->addText('url_placeholder', ['label' => 'Your Website','default_value' => 'https://yourwebsite.com','wrapper' => ['width' => 16.5]])
		->addText('range_placeholder', ['label' => 'Budget','default_value' => 'Min/Max','wrapper' => ['width' => 16.5]])
		// Form Field Labels
		->addTab('Form Labels', ['label' => 'Form Labels'])
		->addTrueFalse('form_label', ['label' => 'Show Labels','required' => 0,'default_value' => 1,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addTrueFalse('white_label', ['label' => 'White Labels','required' => 0,'default_value' => 0,'ui' => 1,'wrapper' => ['width' => 16.5]])
		->addText('full_name_label', ['label' => 'Full Name ','default_value' => 'Full Name:','wrapper' => ['width' => 16.5]])
		->addText('first_name_label', ['label' => 'First Name','default_value' => 'First Name:','wrapper' => ['width' => 16.5]])
		->addText('last_name_label', ['label' => 'Last Name','default_value' => 'Last Name:','wrapper' => ['width' => 16.5]])
		->addText('email_label', ['label' => 'Email','default_value' => 'Email:','wrapper' => ['width' => 16.5]])
		->addText('phone_label', ['label' => 'Phone','default_value' => 'Phone:','wrapper' => ['width' => 16.5]])
		->addText('subject_label', ['label' => 'Subject','default_value' => 'Subject:','wrapper' => ['width' => 16.5]])
		->addText('company_label', ['label' => 'Company','default_value' => 'Company:','wrapper' => ['width' => 16.5]])
		->addText('country_label', ['label' => 'Country','default_value' => 'Country:','wrapper' => ['width' => 16.5]])
		->addText('sectors_label', ['label' => 'Sectors','default_value' => 'Sector:','wrapper' => ['width' => 16.5]])
		->addText('message_label', ['label' => 'Message','default_value' => 'Message:','wrapper' => ['width' => 16.5]])
		->addText('file_label', ['label' => 'Files','default_value' => 'Files:','wrapper' => ['width' => 16.5]])
		->addText('date_label', ['label' => 'Date','default_value' => 'Date:','wrapper' => ['width' => 16.5]])
		->addText('time_label', ['label' => 'Time','default_value' => 'Time:','wrapper' => ['width' => 16.5]])
		->addText('url_label', ['label' => 'Your Website','default_value' => 'Your Website:','wrapper' => ['width' => 16.5]])
		->addText('range_label', ['label' => 'Budget','default_value' => 'Budget £ or €:','wrapper' => ['width' => 16.5]])
		->addText('accept_label', ['label' => 'Accept txt','default_value' => 'By sending your message you agree to','wrapper' => ['width' => 16.5]])
		->addText('agree_label', ['label' => 'Agree','default_value' => 'Agree','wrapper' => ['width' => 16.5]])
		->addText('located_label', ['label' => 'Located','default_value' => 'Are you located in UK or EU?','wrapper' => ['width' => 16.5]])
		// Form Replay Text
		->addTab('Form Replay Text', ['label' => 'Form Replay Text'])
		->addWysiwyg('form_recived_txt', ['layout' => 'block', 'wrapper' => ['width' => 100], 'label' => 'Form Replay Text (for customer)','default_value' => 'Hi, <br><br>Thank you for your message. One of our team will be in touch with you shortly. We endeavour to answer all enquiries within 24 hours on business days.<br><br>Kind regards,<br>Sales Team'])
		// Form Error Messages
		->addTab('Messages', ['label' => 'Messages'])
		->addText('msg_successfully', ['label' => 'Message was sent successfully','default_value' => 'Thank you for your message. It has been sent.','wrapper' => ['width' => 100]])
		->addText('msg_fill', ['label' => 'Fill out this field','default_value' => 'Please fill out this field.','wrapper' => ['width' => 100]])
		->addText('msg_accept', ['label' => 'You must accept the terms and conditions before sending your message.','wrapper' => ['width' => 100]])
		->addText('msg_min', ['label' => 'This field has a too short input.','wrapper' => ['width' => 100]])
		->addText('msg_max', ['label' => 'This field has a too long input.','wrapper' => ['width' => 100]])
		// hCaptcha || ReCaptcha
		->addTab('Protection')
		->addTrueFalse('hcaptcha', ['label' => 'hCAPTCHA','required' => 0,'default_value' => 0,'ui' => 1,'wrapper' => ['width' => 100]])
			->addText('hcaptcha_site_key', ['label' => 'hCAPTCHA Site Key','wrapper' => ['width'=>50]])
			->conditional('hcaptcha', '==', '1')
			->addText('hcaptcha_secret_key', ['label' => 'hCAPTCHA Secret Key','wrapper' => ['width'=>50]])
			->conditional('hcaptcha', '==', '1')
		->addTrueFalse('recaptcha', ['label' => 'reCAPTCHA','required' => 0,'default_value' => 0,'ui' => 1,'wrapper' => ['width' => 100]])
			->addText('recaptcha_site_key', ['label' => 'reCAPTCHA Site Key','wrapper' => ['width'=>50]])
			->conditional('recaptcha', '==', '1')
			->addText('recaptcha_secret_key', ['label' => 'reCAPTCHA Secret Key','wrapper' => ['width'=>50]])
			->conditional('recaptcha', '==', '1')
	->endRepeater()

	// Extra SEO Filter options for generater URl's
	->addTab('SEO Filter Options', ['label' => 'SEO','placement' => 'left'])
	->addRepeater('dp_seo_list', ['layout' => 'block', 'label' => 'SEO DP custom Meta & H1 / Desc', 'wrapper' => ['width' => 100]])
		->addText('dp_seo_url', ['layout' => 'block', 'wrapper' => ['width' => 33.3], 'label' => 'DP SEO URL'])
		->addText('dp_meta_title', ['layout' => 'block', 'wrapper' => ['width' => 33.3], 'label' => 'DP SEO Meta Title'])
		->addText('dp_seo_title', ['layout' => 'block', 'wrapper' => ['width' => 33.3], 'label' => 'DP SEO H1 Title'])
		->addWysiwyg('dp_seo_desc', ['layout' => 'block', 'wrapper' => ['width' => 100], 'label' => 'DP SEO Description '])
	->endRepeater()

	// Load More Anything options
	->addTab('Load More Item', ['placement' => 'top','wrapper' => ['width' => 5]])
	->addRepeater('loadmore_list', ['layout' => 'block', 'label' => 'Load More Item', 'wrapper' => ['width' => 100]])
		->addText('loadmore_id', ['layout' => 'block', 'label' => 'ID short:[load_more_shop]','default_value' => 'blog', 'wrapper' => ['width' => 20]])
		->addColorPicker('loadmore_col', ['layout' => 'block', 'label' => 'Button Colour', 'wrapper' => ['width' => 20]])
		->addColorPicker('loadmore_hov_col', ['layout' => 'block', 'label' => 'Button Hover Col', 'wrapper' => ['width' => 20]])
		->addNumber('loadmore_items', ['label' => 'Visible Items','required' => 0,'default_value' => '9','min' => '2','max' => '20','step' => '1', 'wrapper' => ['width' => 20]])
		->addNumber('loadmore_items_load', ['label' => 'Load Items','required' => 0,'default_value' => '2','min' => '1','max' => '10','step' => '1', 'wrapper' => ['width' => 20]])
		->addText('loadmore_parent', ['layout' => 'block', 'label' => 'Parent Item','default_value' => '#news_loop ul.wp-block-query', 'wrapper' => ['width' => 25]])
		->addText('loadmore_child', ['layout' => 'block', 'label' => 'Child Items','default_value' => '#news_loop ul.wp-block-query li.post', 'wrapper' => ['width' => 25]])
		->addText('loadmore_class', ['layout' => 'block', 'label' => 'Button class','default_value' => 'btn btn-primary', 'wrapper' => ['width' => 25]])
		->addText('loadmore_name', ['layout' => 'block', 'label' => 'Button text','default_value' => 'Load More', 'wrapper' => ['width' => 25]])
	->endRepeater()

->setLocation('options_page', '==', 'acf-options');

add_action('acf/init', function() use ($options_builder) {
	acf_add_local_field_group( $options_builder->build() );
	//print_r($options_builder->build());             
});