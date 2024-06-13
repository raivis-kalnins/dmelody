<?php 
//ini_set('display_errors', 1);
//var_dump(get_fields('options'));
/**
 * Add short code form loop [acf-form]
 */
$formItems = get_fields('options')['form_field_list'];

if ( !empty($formItems) ) :

	foreach( $formItems as $formItem ) :

		// Variables and set to empty values
		$full_name = $first_name = $last_name = $email =  $phone =  $subject = $company = $country =  $sectors =  $url =  $message =  $located  = $file =  $agree = '';
		$full_nameErr = $first_nameErr = $last_nameErr = $emailErr =  $phoneErr =  $subjectErr = $companyErr =  $countryErr =  $sectorsErr = $dateErr = $timeErr =  $urlErr =  $messageErr =  $fileErr =  $rangeErr = $locatedErr = $locatedErrInfo = $agreeErr = '';
		$full_name_tomail = $first_name_tomail = $last_name_tomail = $email_tomail = $phone_tomail = $subject_tomail = $company_tomail = $country_tomail = $sectors_tomail = $date_tomail = $time_tomail = $url_tomail = $range_tomail = $located_tomail = $message_tomail = $file_tomail = $agree_tomail = '';
		$captcha_class = $captcha_class ?? '';
		$response_txt = $response_txt ?? '';

		// Form attributes
		$current_url = home_url($_SERVER['REQUEST_URI']); //var_dump($current_url);
		$site_url = site_url();
		$formLang = $formItem['form_lang'] ?? '';
		$form_title = $formItem['form_title'] ?? '';
		$form_to_emails = $formItem['form_to_emails'] ?? '';
		$form_short = $formItem['form_short'] ?? '';
		$form_steps = $formItem['form_steps'] ?? '';
		$file_max = $formItem['file_max'] ?? '';
		$file_formats = $formItem['file_formats'] ?? '';
		$form_recived_txt = $formItem['form_recived_txt'] ?? '';
		$submit = $formItem['form_submit_txt'] ?? '';		

		// Security: reCAPTCHA Configuration - go to Google and get the below keys http://www.google.com/recaptcha/admin
		$recaptcha = $formItem['recaptcha'] ?? '';
		$recaptcha_site_key = $formItem['recaptcha_site_key'] ?? '';
		$recaptcha_secret_key = $formItem['recaptcha_secret_key'] ?? '';
		$sitekay = '';
		$captcha_script = '';
		
		// Security: hCAPTCHA Configuration - https://dashboard.hcaptcha.com/login
		$hcaptcha = $formItem['hcaptcha'] ?? '';
		$hcaptcha_site_key = $formItem['hcaptcha_site_key'] ?? '';
		$hcaptcha_secret_key = $formItem['hcaptcha_secret_key'] ?? '';

		// Placeholders
		$full_name_pl = $formItem['full_name_placeholder'] ?? '';
		$first_name_pl = $formItem['first_name_placeholder'] ?? '';
		$last_name_pl = $formItem['last_name_placeholder'] ?? '';
		$email_pl = $formItem['email_placeholder'] ?? '';
		$phone_pl = $formItem['phone_placeholder'] ?? '';
		$subject_pl = $formItem['subject_placeholder'] ?? '';
		$company_pl = $formItem['company_placeholder'] ?? '';
		//$country_pl = $formItem['country_placeholder'] ?? '';
		//$sectors_pl = $formItem['sectors_placeholder'] ?? '';
		$message_pl = $formItem['message_placeholder'] ?? '';
		$file_pl = $formItem['file_placeholder'] ?? '';
		$date_pl = $formItem['date_placeholder'] ?? '';
		$time_pl = $formItem['time_placeholder'] ?? '';
		$url_pl = $formItem['url_placeholder'] ?? '';
		$range_pl = $formItem['range_placeholder'] ?? '';

		// Labels
		$labels = $formItem['form_label'] ?? '';
		$labels_white = $formItem['white_label'] ?? '';

		$label_full_name = $formItem['full_name_label'] ?? '';
		$label_first_name = $formItem['first_name_label'] ?? '';
		$label_last_name = $formItem['last_name_label'] ?? '';
		$label_email = $formItem['email_label'] ?? '';
		$label_phone = $formItem['phone_label'] ?? '';
		$label_subject = $formItem['subject_label'] ?? '';
		$label_company = $formItem['company_label'] ?? '';
		$label_country = $formItem['country_label'] ?? '';
		$label_sectors = $formItem['sectors_label'] ?? '';
		$label_message = $formItem['message_label'] ?? '';
		$label_file = $formItem['file_label'] ?? '';
		$label_date = $formItem['date_label'] ?? '';
		$label_time = $formItem['time_label'] ?? '';
		$label_url = $formItem['url_label'] ?? '';
		$label_range = $formItem['range_label'] ?? '';
		$label_agree = $formItem['agree_label'] ?? '';
		$label_accept = $formItem['accept_label'] ?? '';
		$label_located = $formItem['located_label'] ?? '';

		$full_name_label = $first_name_label = $last_name_label = $email_label = $phone_label = $subject_label = $company_label = $country_label = $sectors_label = $message_label = $file_label = $date_label = $time_label = $url_label = $range_label = $located_label = '';

		if ( $labels == "true" ) {

			if ( $labels_white == "true" ) {
				$white_label =	' style="color:white"';
			}

			$full_name_label = '<span class="label"'.$white_label.'>'.$label_full_name.'</span>';
			$first_name_label = '<span class="label"'.$white_label.'>'.$label_first_name.'</span>';
			$last_name_label = '<span class="label"'.$white_label.'>'.$label_last_name.'</span>';
			$email_label = '<span class="label"'.$white_label.'>'.$label_email.'</span>';
			$phone_label = '<span class="label"'.$white_label.'>'.$label_phone.'</span>';
			$subject_label = '<span class="label"'.$white_label.'>'.$label_subject.'</span>';
			$company_label = '<span class="label"'.$white_label.'>'.$label_company.'</span>';
			$country_label = '<span class="label"'.$white_label.'>'.$label_country.'</span>';
			$sectors_label = '<span class="label"'.$white_label.'>'.$label_sectors.'</span>';
			$message_label = '<span class="label"'.$white_label.'>'.$label_message.'</span>';
			$file_label = '<span class="label"'.$white_label.'>'.$label_file.'</span>';
			$date_label = '<span class="label"'.$white_label.'>'.$label_date.'</span>';
			$time_label = '<span class="label"'.$white_label.'>'.$label_time.'</span>';
			$url_label = '<span class="label"'.$white_label.'>'.$label_url.'</span>';
			$range_label = '<span class="label"'.$white_label.'>'.$label_file.'</span>';
			$located_label = '<span class="label"'.$white_label.'>'.$label_located.'</span>';
		}

		//== FORM FIELDS ==//

		// full_name
		$full_name = $formItem['full_name'] ?? '';
		$full_name_field = $full_name_field ?? '';
		if ( $full_name == 'true' ) {
			$get_full_name = isset($_GET['full_name']) ? $_GET['full_name']: '';
			$full_name_field = '<div class="col-lg-6">'.$full_name_label.'<input type="text" name="full_name" placeholder="'.$full_name_pl.'" title="full-name" class="required" aria-required="true" required value="'.$get_full_name.'" autocomplete="name" /></div>';
		}
		
		// first_name
		$first_name = $formItem['first_name'] ?? '';
		$first_name_field = $first_name_field ?? '';
		if ( $first_name == 'true' ) {
			$get_first_name = isset($_GET['first_name']) ? $_GET['first_name']: '';
			$first_name_field = '<div class="col-lg-6">'.$first_name_label.'<input type="text" name="first_name" placeholder="'.$first_name_pl.'" title="first-name" class="required" aria-required="true" required value="'.$get_first_name.'" autocomplete="name" /></div>';
		}
		
		// last_name
		$last_name = $formItem['last_name'] ?? '';
		$last_name_field = $last_name_field ?? '';
		if ( $last_name == 'true' ) {
			$get_last_name = isset($_GET['last_name']) ? $_GET['last_name']: '';
			$last_name_field = '<div class="col-lg-6">'.$last_name_label.'<input type="text" name="last_name" placeholder="'.$last_name_pl.'" title="last-name" class="required" aria-required="true" required value="'.$get_last_name.'" autocomplete="name" /></div>'; 
		}
		
		// email
		$email = $formItem['email'] ?? '';
		$email_field = $email_field ?? '';
		if ( $email == 'true' ) {
			$get_email = isset($_GET['email']) ? $_GET['email']: '';
			$email_field = '<div class="col-lg-6">'.$email_label.'<input type="email" name="email" placeholder="'.$email_pl.'" title="email" class="required" aria-required="true" required value="'.$get_email.'" autocomplete="email" /></div>';
		}
		
		// phone
		$phone = $formItem['phone'] ?? '';
		$phone_field = $phone_field ?? '';
		if ( $phone == 'true' ) {
			$get_phone = isset($_GET['phone']) ? $_GET['phone']: '';
			$phone_field = '<div class="col-lg-6">'.$phone_label.'<input type="tel" name="phone" placeholder="'.$phone_pl.'" title="phone" class="required" aria-required="true" required value="'.$get_phone.'" onkeydown="return isNumber(event); validate(event,"char","190","187",".errorMessage", 0);" autocomplete="phone" /></div>'; 
		}
		// subject
		$subject = $formItem['subject'] ?? '';
		$subject_field = $subject_field ?? '';
		if ( $subject == 'true' ) {
			$get_subject = isset($_GET['subject']) ? $_GET['subject']: '';
			$subject_field = '<div class="col-lg-6">'.$subject_label.'<input type="text" name="subject" placeholder="'.$subject_pl.'" title="subject" class="required" aria-required="true" required value="'.$get_subject.'" autocomplete="subject" /></div>'; 
		}
		
		// company
		$company = $formItem['company'] ?? '';
		$company_field = $company_field ?? '';
		if ( $company == 'true' ) {
			$get_company = isset($_GET['company']) ? $_GET['company']: '';
			$company_field = '<div class="col-lg-6">'.$company_label.'<input type="text" name="company" placeholder="'.$company_pl.'" title="company" class="required" aria-required="true" required value="'.$get_company.'" autocomplete="company" /></div>'; 
		}
		
		// country
		$country_select = $formItem['country'] ?? '';
		$country_field = $country_field ?? '';
		if ( $country_select == 'true' ) {
			$get_country = isset($_GET['country']) ? $_GET['country']: '';
			$countries = get_fields('options')['countries_list'];
			//var_dump($countries);
			$countries_options = 	'';
			foreach( $countries as $country ) { 
				$countries_options .='<option value="'.$country['countries_list_form'].'">'.$country['countries_list_form'].'</option>'; 
			}
			$countries_options .= '';
			$country_field = '<div class="col-lg-6">'.$country_label.'<select name="country" value="'.$get_country.'" autocomplete="country">'.$countries_options.'</select></div>';
			//var_dump($get_country);
		}
		
		// sectors
		$sectors_select = $formItem['sectors'] ?? '';
		$sectors_field = $sectors_field ?? '';
		if ( $sectors_select == 'true' ) {
			$get_sectors = isset($_GET['sectors']) ? $_GET['sectors']: '';
			$sectors_list = get_fields('options')['sectors_list'];
			$sectors_list = $sectors_list ?? '';
			$sectors_options = 	'';
			if (is_array($sectors_list) || is_object($sectors_list)) {
				foreach( $sectors_list as $sector ) { 
					$sectors_options .='<option value="'.$sector['sectors_list_form'].'">'.$sector['sectors_list_form'].'</option>'; 
				}
			}
			$sectors_options .= '';
			$sectors_field = '<div class="col-lg-6">'.$sectors_label.'<select name="sectors" value="'.$get_sectors.'" autocomplete="sector">'.$sectors_options.'</select></div>';
			//var_dump($sectors_field);
		}
		
		// date
		$date = $formItem['date'] ?? '';
		$date_field = $date_field ?? '';
		if ( $date == 'true' ) {
			$date_val = '';
			$date_field = '<div class="col-lg-6">'.$date_label.'<input type="date" name="date" placeholder="'.$date_pl.'" title="date" class="required" value="'.$date_val.'" autocomplete="off" /></div>'; 
		}
		
		// time
		$time = $formItem['time'] ?? '';
		$time_field = $time_field ?? '';
		if ( $time == 'true' ) {
			$get_time = isset($_GET['time']) ? $_GET['time']: '';
			$time_field = '<div class="col-lg-6">'.$time_label.'<input type="time" name="time" placeholder="'.$time_pl.'" title="time" class="required" aria-required="true" required value="'.$get_time.'" autocomplete="off" /></div>'; 
		}
		
		// url
		$url = $formItem['url'] ?? '';
		$url_field = $url_field ?? '';
		if ( $url == 'true' ) {
			$get_url = isset($_GET['url']) ? $_GET['url']: '';
			$url_field = '<div class="col-lg-6">'.$url_label.'<input type="url" name="url" placeholder="'.$url_pl.'" title="url" class="required" aria-required="true" required value="'.$get_url.'" autocomplete="url" /></div>'; 
		}
		
		// range
		$range = $formItem['range'] ?? '';
		$range_field = $range_field ?? '';
		if ( $range == 'true' ) {
			$range_field = '<div class="col-lg-6"><div style="width:100%">'.$range_label.' <sub>* '.$range_pl.'</sub></div><span class="field range-slider"><span class="range-slider__from">0</span><input type="range" name="range" min="0" max="5000" step="50" title="range" class="required range-slider__range" value="0" /><span class="range-slider__value">5000</span></span></div>'; 
		}

		// located
		$located = $formItem['located'] ?? '';
		$located_field = $located_field ?? '';
		if ( $located == 'true' ) {
			$get_located = isset($_GET['located']) ? $_GET['located']: '';
			$located_field = '<div class="col-lg-6">'.$located_label.'<div class="row acf-radio"><div class="col-4"><div class="acf-radio--btn"><input type="radio" name="located" value="yes" checked /></div><span>Yes</span></div><div class="col-4"><div class="acf-radio--btn"><input type="radio" name="located" value="no" /></div><span>No</span></div><div class="col-4"><div class="acf-radio--btn acf-radio--btn_disabled"><input type="radio" name="located" value="any" disabled /></div><span>Any</span></div></div></div>'; 
		}
		
		// message
		$message = $formItem['message'] ?? '';
		$message_field = $message_field ?? '';
		if ( $message == 'true' ) {
			$get_message = isset($_GET['message']) ? $_GET['message']: '';
			$message_field = '<div class="col-12">'.$message_label.'<br><textarea cols="20" rows="5" name="message" placeholder="'.$message_pl.'" title="message" class="required acf-textarea" aria-required="true" required value="'.$get_message.'" autocomplete="message"></textarea></div>'; 
		}
		
		// file
		$file = $formItem['file_upload'] ?? '';
		$files_field = $file_field ?? '';
		if ( $file == 'true' ) {
			$get_files = isset($_GET['file']) ? $_GET['file']: '';
			$files_field = '<div class="col-12">'.$file_label.'<fieldset class="field" id="filedrag"><input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" autocomplete="off" /><input type="file" name="file" placeholder="'.$file_pl.'" title="file" class="required" aria-required="true" required value="'.$get_files.'" id="fileselect" name="fileselect[]" data-maxlength="4" multiple accept=".doc,.docx,.xlsx,.xls,.pdf,.png,.jpg" autocomplete="off" />🎯 Drop files here!</fieldset><div id="messages"></div><ul data-bind="foreach: filesUploaded"><li><p><i class="fa" data-bind="css: icon"></i>File information: name: <strong data-bind="text: name"></strong> type: <strong data-bind="text: type"></strong> size: <strong data-bind="text: size"></strong> bytes</p></li></ul><script src="//cdnjs.cloudflare.com/ajax/libs/knockout/3.5.1/knockout-latest.js?ver=6.4.2" id="js_knockout-js"></script><script>var ViewModel=function(){var e = ko.observableArray([]);function t(e){var t,n=this;t=e,n.name=t.name,n.type=t.type,n.size=t.size,n.icon=function(e){switch(e){case"text/plain":return"fa-file-text-o";case"application/pdf":return"fa-file-pdf-o";case"application/vnd.openxmlformats-officedocument.wordprocessingml.document":return"fa-file-word-o";default:return"fa-file-o"}}(t.type)}return{filesUploaded:e,addFileToList:function(n){e.push(new t(n))}}},vm=new ViewModel;function $id(e){return document.getElementById(e)}function Output(e){var t=$id("messages");t.innerHTML=e+t.innerHTML}function Init(){var e=$id("fileselect"),t=$id("filedrag");$id("submitbutton");e.addEventListener("change",FileSelectHandler,!1),(new XMLHttpRequest).upload&&(t.addEventListener("dragover",FileDragHover,!1),t.addEventListener("dragleave",FileDragHover,!1),t.addEventListener("drop",FileSelectHandler,!1))}function FileDragHover(e){e.stopPropagation(),e.preventDefault(),e.target.className="dragover"==e.type?"hover":""}function FileSelectHandler(e){FileDragHover(e);for(var t,n=e.target.files||e.dataTransfer.files,i=0;t=n[i];i++)vm.addFileToList(t)}function ParseFile(e){Output("<p>File information: <strong>"+e.name+"</strong> type: <strong>"+e.type+"</strong> size: <strong>"+e.size+"</strong> bytes</p>")} ko.applyBindings(vm),window.File&&window.FileList&&window.FileReader&&Init();</script></div>'; }
		
		// agree 
		$agree = $formItem['agree'] ?? '';
		$agree_field = $agree_field ?? '';
		if ( $agree == 'true' ) {
			$agree_field = '<div class="col-12"><span class="acf-checkbox"><div class="acf-checkbox-item"><input type="checkbox" name="agree" title="Agree Policy" class="required" value="0" /><em></em><span class="acf-checkbox-item-label acf-checkbox-item-label--accept">'.$label_accept.' <a href="'.$site_url.'/privacy-policy/" target="_blank">Privacy Policy</a></span></div></span></div><div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>'; 
		}

		if ( $recaptcha == 'true' ) {
			$captcha_script = '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
			$sitekay = $recaptcha_site_key;
			$seckey = 'https://www.google.com/recaptcha/api/siteverify?secret='.$recaptcha_secret_key;
			$response = isset( $_POST['g-recaptcha-response'] ) && !empty( $_POST['g-recaptcha-response']);
			$captcha_class = 'g-recaptcha';
		}

		if ( $hcaptcha == 'true' ) {
			$sitekay = $hcaptcha_site_key;
			$captcha_script = '<script src="https://js.hcaptcha.com/1/api.js" async defer></script>';			
			$seckey = 'https://www.google.com/recaptcha/api/siteverify?secret='.$hcaptcha_secret_key;
			$response = isset( $_POST['h-captcha-response'] ) && !empty( $_POST['h-captcha-response']);
			$captcha_class = 'h-captcha';
		}

		$form = '';
		$mailSent = '';
		$valid = '';

		if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			
			// Fields Validation Messages IF False *also JS custom extra validation & fields protection ./src/js/partials/_form-validation.js
			$msg_successfully = $formItem['msg_successfully'] ?? '';
			$msg_accept = $formItem['msg_accept'] ?? '';
			$msg_min = $formItem['msg_min'] ?? '';
			$msg_max = $formItem['msg_max'] ?? '';
		
			// full_name valid
			if ( $full_name == 'true' ) {
				$full_name_post = stripslashes($_POST['full_name'] ?? '');
				if( empty($full_name_post) || strlen($full_name_post) < 4 || !preg_match("/^[a-zA-Z-' ]*$/", $full_name_post ) ) {
					$full_nameErr = '<em class="acf-form-error">Invalid Full Name: : We want full names with more than 3 letters and white space allowed!</em>';
				} else {
					$full_nameErr = '';
				}
			}

			// first_name valid
			if ( $first_name == 'true' ) {
				$first_name_post = stripslashes($_POST['first_name'] ?? '');
				if( empty($first_name_post) || strlen($first_name_post) < 4 || !preg_match("/^[a-zA-Z]*$/",$first_name_post) ) {
					$first_nameErr = '<em class="acf-form-error">Invalid First Name: : We want first names with more than 3 letters and white space not allowed!</em>';
				} else {
					$first_nameErr = '';
				}
			}

			// last_name valid
			if ( $last_name == 'true' ) {
				$last_name_post = stripslashes($_POST['last_name'] ?? '');
				if( empty($last_name_post) || strlen($last_name_post) < 4 || !preg_match("/^[a-zA-Z]*$/",$last_name_post) ) {
					$last_nameErr = '<em class="acf-form-error">Invalid Last Name: : We want last names with more than 3 letters and white space not allowed!</em>';
				} else {
					$last_nameErr = '';
				}
			}

			// email valid
			if ( $email == 'true' ) {
				$email_post = stripslashes($_POST['email'] ?? '');
				if( empty($email_post) || strlen($email_post) < 7 || !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email_post) ) {
					$emailErr = '<em class="acf-form-error">Invalid E-mail: Type a valid e-mail please.</em>';
					$email = stripslashes($_POST['email'] ?? '');
				} else {
					$emailErr = '';
				}
			}

			// phone valid
			if ( $phone == 'true' ) {
				$phone_post = stripslashes($_POST['phone'] ?? '');
				if( empty($phone_post) || strlen($phone_post) < 7 || !preg_match("/^[\+0-9\-\(\)\s]*$/",$phone_post) ) {
					$phoneErr = '<em class="acf-form-error">Invalid Phone: We want phone with more than 9 numbers!</em>';
					$phone = stripslashes($_POST['phone'] ?? '');
				} else {
					$phoneErr = '';
				}
			}

			// subject valid
			if ( $subject == 'true' ) {
				$subject_post = stripslashes($_POST['subject'] ?? '');
				if( empty($subject_post) || strlen($subject_post) < 4 || !preg_match("/^[a-zA-Z-' ]*$/",$subject_post) ) {
					$subjectErr = '<em class="acf-form-error">Invalid Subject: : We want subject with more than 3 letters and white space allowed!</em>';
				} else {
					$subjectErr = '';
				}
			}

			// company valid
			if ( $company == 'true' ) {
				$company_post = stripslashes($_POST['company'] ?? '');
				if( empty($company_post) || strlen($company_post) < 4 || !preg_match("/^[a-zA-Z-' ]*$/", $company_post ) ) {
					$companyErr = '<em class="acf-form-error">Invalid Company Name: : We want company names with more than 3 letters and white space allowed!</em>';
				} else {
					$companyErr = '';
				}
			}

			// country valid
			if ( $country_select == 'true' ) {
				$country_post = $_POST['country'] ?? '';
				if( empty($country_post) || $country_post == 'Select Country' ) {
					$countryErr = '<p></p><em class="acf-form-error">Invalid Selected: Please choose a Country!</em>';
				} else {
					$countryErr = '';
				}
			}

			// sectors valid
			if ( $sectors_select == 'true' ) {
				$sectors_post = $_POST['sectors'] ?? '';
				if( empty($sectors_post) || $sectors_post == 'Select Sector' ) {
					$sectorsErr = '<p></p><em class="acf-form-error">Invalid Selected: Please choose a Sector!</em>';
				} else {
					$sectorsErr = '';
				}
			}

			// date valid
			if ( $date == 'true' ) {
				if( empty( str_replace( array("0", "-", ":", " "), "", $_POST['date'] ?? '') ) ) {
					$dateErr = '<em class="acf-form-error">Invalid date: Please enter valid date!</em>';
				} else {
					$dateErr = '';
					$date_post_str = str_replace( '-"', '/', $_POST['date'] ); 
					$date_formated = date( 'd/m/Y', strtotime( $date_post_str ) );
					//var_dump( $_POST['date'] );
				}
			}

			// time valid
			if ( $time == 'true' ) {
				if( empty( $_POST['time'] ?? '') ) {
					$timeErr = '<em class="acf-form-error">Invalid time: Please enter valid time!</em>';
				} else {
					$timeErr = '';
					//var_dump( $_POST['time'] );
				}
			}

			// url valid
			if ( $url == 'true' ) {
				$url_post = stripslashes($_POST['url'] ?? '');
				if( empty($url_post) || !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url_post ) ) {
					$urlErr = '<em class="acf-form-error">Invalid URL: Please enter valid URL!</em>';
				} else {
					$urlErr = '';
				}
			}

			// range valid
			if ( $range == 'true' ) {
				$range_post = isset($_POST['range']) ? (int) $_POST['range'] : -1;
				if( $range_post >= 0 && $range_post <= 500 ) {
					$rangeErr = '<em class="acf-form-error" style="padding-left:30px;margin-top:5px">Invalid range: Please enter valid range from 50!</em>';
				} else {
					$rangeErr = '';
				}
				//var_dump($range_post);
			}

			// located valid
			if ( $located == 'true' ) {
				if( $_POST['located'] == 'no' ) {
					$locatedErrInfo = '<em class="acf-form-error" style="color:green">Price can be changed: Please type description about your location!</em>';
					$locatedErr = ''; // Not error just additional information
				} else {
					$locatedErr = '';
				}
			}

			// message valid
			if ( $message == 'true' ) {
				$message_post = stripslashes($_POST['message'] ?? '');
				if( empty($message_post) || strlen($message_post) < 10 ) {
					$messageErr = '<em class="acf-form-error">Ivalid message: Type a message with at least with 10 letters!</em>';
				} else {
					$messageErr = '';
				}
			}

			// file valid
			// $fileErr = 'Invalid File Upload: Please upload 1 or more valid file!';
			// function validateFile($file_valid) { $file_valid = stripslashes($_REQUEST['file']); if( strlen($file_valid) < 1 ) return false; else return true; }

			// agree valid
			if ( $agree == 'true' ) {
				if( isset($_POST['agree']) == '0' ) {
					$agreeErr = '<em class="acf-form-error">Invalid Acceptance: Please check Agree with Form Cookie Policy!</em>';				
				} else {
					$agreeErr = '';	
				}
				//var_dump(isset($_POST['agree']));
			}

			if( /* $response && */ $full_nameErr == '' && $first_nameErr == '' && $last_nameErr == '' && $emailErr == '' &&  $phoneErr == '' &&  $subjectErr == '' && $companyErr == '' &&  $countryErr == '' &&  $sectorsErr == '' && $dateErr == '' && $timeErr == '' &&  $urlErr == '' &&  $locatedErr == '' &&  $messageErr == '' &&  $fileErr == '' &&  $rangeErr == '' && $agreeErr == '') {

				$ip = $_SERVER['REMOTE_ADDR'];
				$toEmail = stripslashes($form_to_emails);
				$customerEmail = $email_post;
				$mailHeaders = 'MIME-Version: 1.0'.'\r\n';
				$mailHeaders = 'Content-type: text/html; charset=utf-8'.'\r\n';
				$mailHeadersCompany = 'From '.$formLang.': ' .$full_name_post. ' <' .$email_post. '>';
				$mailHeadersUser = 'From: WP Contact Form <' .$toEmail. '>';
		
				// To mail fields
				if ( $full_name == 'true' ) { $full_name_tomail = '<tr><td>'.$full_name_label.'</td><td>'.$_POST['full_name'].'</td></tr>'; }
				if ( $first_name == 'true' ) { $first_name_tomail = '<tr><td>'.$first_name_label.'</td><td>'.$_POST['first_name'].'</td></tr>'; }
				if ( $last_name == 'true' ) { $last_name_tomail = '<tr><td>'.$last_name_label.'</td><td>'.$_POST['last_name'].'</td></tr>'; }
				if ( $email == 'true' ) { $email_tomail = '<tr><td>'.$email_label.'</td><td>'.$_POST['email'].'</td></tr>'; }
				if ( $phone == 'true' ) { $phone_tomail = '<tr><td>'.$phone_label.'</td><td>'.$_POST['phone'].'</td></tr>'; }
				if ( $subject == 'true' ) { $subject_tomail = '<tr><td>'.$subject_label.'</td><td>'.$_POST['subject'].'</td></tr>'; }
				if ( $company == 'true' ) { $company_tomail = '<tr><td>'.$company_label.'</td><td>'.$_POST['company'].'</td></tr>'; }
				if ( $country_select == 'true' ) { $country_tomail = '<tr><td>'.$country_label.'</td><td>'.$_POST['country'].'</td></tr>'; }
				if ( $sectors_select == 'true' ) { $sectors_tomail = '<tr><td>'.$sectors_label.'</td><td>'.$_POST['sectors'].'</td></tr>'; }
				if ( $date == 'true' ) { $date_tomail = '<tr><td>'.$date_label.'</td><td>'.$date_formated.'</td></tr>'; }
				if ( $time == 'true' ) { $time_tomail = '<tr><td>'.$time_label.'</td><td>'.$_POST['time'].'</td></tr>'; }
				if ( $url == 'true' ) { $url_tomail = '<tr><td>'.$url_label.'</td><td>'.$_POST['url'].'</td></tr>'; }
				if ( $range == 'true' ) { $range_tomail = '<tr><td>'.$range_label.'</td><td>'.$_POST['range'].'</td></tr>'; }
				if ( $message == 'true' ) { $message_tomail = '<tr><td>'.$message_label.'</td><td>'.$_POST['message'].'</td></tr>'; }
				if ( $located == 'true' ) { $located_tomail = '<tr><td>'.$located_label.'</td><td>'.$_POST['located'].'</td></tr>'; }
				if ( $file == 'true' ) { $file_tomail = '<tr><td>'.$file_label.'</td><td>'.$_POST['file'].'</td></tr>'; }
				if ( $agree == 'true' ) { $agree_tomail = '<tr><td><span class="label">Accepted: </span></td><td>Yes</td></tr>'; }
		
				// Mail body
				$mailBody = '<table>'
								.$full_name_tomail
								.$first_name_tomail
								.$last_name_tomail
								.$email_tomail
								.$phone_tomail
								.$subject_tomail
								.$company_tomail
								.$country_tomail
								.$sectors_tomail
								.$date_tomail
								.$time_tomail
								.$url_tomail
								.$range_tomail
								.$located_tomail
								.$message_tomail
								.$file_tomail
								.$agree_tomail
							.'</table>
							<style>table tr {border:#999 solid 1px} table tr:nth-child(odd){background-color:#f0f0f0} table tr td {padding:10px;font-size:20px;color:#000}table tr td span{color:#000!important}</style>
							<hr>
							<p>From IP: ' .$ip. ' From URL: '.$current_url.'</p>';
				$mailMessage = $form_recived_txt;
				$mailSent = '<p class="acf-form-sent">'.$msg_successfully.'</p>';

				// Send Email without reCAPTCHA or hCAPTCHA
				// if ( isset($_POST['submit-acf-form_'.$formLang]) ) {
				// 	mail( $toEmail, "Contact Form '.$formLang.'", $mailBody, $mailHeaders.$mailHeadersCompany );
				// 	mail( $customerEmail, "Thanks for Contact Us", $mailMessage, $mailHeaders.$mailHeadersUser );
				// }

				// Security (reCAPTCHA or hCAPTCHA) & POST if all fields valid
				if ( $recaptcha == 'true' ) {					

					if( isset( $_POST['g-recaptcha-response'] ) && !empty( $_POST['g-recaptcha-response']) ) {
		
						$verifyResponse = file_get_contents( $seckey.'&response='.$_POST['g-recaptcha-response'] );
						$response = json_decode( $verifyResponse );
			
						if( $response->success ) {

							$response_txt = '';

							// Send Email
							if ( isset($_POST['submit-acf-form_'.$formLang]) ) {
								mail( $toEmail, "Contact Form '.$formLang.'", $mailBody, $mailHeaders.$mailHeadersCompany );
								mail( $customerEmail, "Thanks for Contact Us", $mailMessage, $mailHeaders.$mailHeadersUser );
							}
			
						} else {
							$response_txt = 'Robot verification failed, please try again.';
						}
					}
				}

				if ( $hcaptcha == 'true' ) {
					//var_dump($_POST['h-captcha-response']);
					if( isset( $_POST['h-captcha-response'] ) && !empty( $_POST['h-captcha-response']) ) {
		
						$verifyResponse = file_get_contents('https://hcaptcha.com/siteverify?secret='.$hcaptcha_secret_key.'&response='.$_POST['h-captcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR']);
						$response = json_decode( $verifyResponse );
			
						if( $response->success ) {

							$response_txt = '';

							// Send Email
							if ( isset($_POST['submit-acf-form_'.$formLang]) ) {
								mail( $toEmail, "Contact Form '.$formLang.'", $mailBody, $mailHeaders.$mailHeadersCompany );
								mail( $customerEmail, "Thanks for Contact Us", $mailMessage, $mailHeaders.$mailHeadersUser );
							}
			
						} else {							
							$response_txt = 'Robot verification failed, please try again.';
						}
					}
				}
		
			} else {
				$mailSent = '<p>Unable to send email!</p>';
			}
		}

		$loop =  $loop ?? '';
		$loop =		
			'<form id="acf-form_'.$formLang.'" class="acf-form_form" action="#acf-form-sent-'.$formLang.'" method="post" novalidate>
				<div class="h2">'.$form_title.'</div>
				<div class="row form-step-1">'.
					$first_name_field.$first_nameErr.
					$last_name_field.$last_nameErr.
					$full_name_field.$full_nameErr.
					$email_field.$emailErr.
					$phone_field.$phoneErr.
					$subject_field.$subjectErr.
					$company_field.$companyErr.
					$country_field.$countryErr.
					$sectors_field.$sectorsErr.
					$date_field.$dateErr.
					$time_field.$timeErr.
					$url_field.$urlErr.
					$range_field.$rangeErr.
					$located_field.$locatedErrInfo.'
				</div>
				<div class="row form-step-2">'.
					$message_field.$messageErr.
					$files_field.$fileErr.
					$agree_field.'<p></p>'.$agreeErr.'
					<div class="col-12">
						<div class="'.$captcha_class.'" data-sitekey="'.$sitekay.'"></div>
						<button type="submit" name="submit-acf-form_'.$formLang.'" id="send-message" class="btn acf-form_form--submit" style="clear:both;">'.$submit.'</button><br><br>'.$valid.'
					</div>
				</div>
			</form>'.$mailSent.$response_txt.$captcha_script;

			$eachformLang = '<div class="short-component acf-form acf-form-'.$formLang.'">'.$loop.'</div>'; // print_r($eachformLang);

			add_shortcode( 'acf-form_'.$formLang, function() use ($eachformLang) {
				return $eachformLang;
			});

	endforeach;

endif;