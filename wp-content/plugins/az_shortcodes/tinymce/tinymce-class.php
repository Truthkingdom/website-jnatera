<?php

// Enqueue Scripts
function enqueue_generator_scripts(){

	wp_enqueue_style('tinymce', plugin_dir_url( __FILE__ ) . 'shortcode_generator/css/tinymce.css'); 
	
	wp_enqueue_style('magnific', plugin_dir_url( __FILE__ ) . 'shortcode_generator/css/magnific-popup.css'); 
	wp_enqueue_script('magnific', plugin_dir_url( __FILE__ ) . 'shortcode_generator/js/magnific-popup.js','jquery','0.9.7 ', TRUE);
	
	wp_enqueue_script('shortcode-generator-popup', plugin_dir_url( __FILE__ ) . 'shortcode_generator/js/popup.js','jquery','0.9.7 ', TRUE);
	wp_enqueue_script('shortcode-generator', plugin_dir_url( __FILE__ ) . 'az.tinymce.js','jquery','0.9.7 ', TRUE);
	
}

add_action('admin_enqueue_scripts','enqueue_generator_scripts');

add_action('admin_footer','content_display');

function content_display(){
// Shotcodes Definitions

// Blank Divider
$az_shortcodes['az_blank_divider_sh'] = array( 
	'type'  => 'regular', 
	'title'	=> __('Blank Divider', 'textdomain' ),
	'attr'	=> array(
		'height_value' => array(
			'type'	=> 'text',
			'title'	=> __('Height Value', 'textdomain'),
			'desc'	=> __('Height Value in pixel. Enter only number value.', 'textdomain')
		),
		'class'	=>	array(
			'type'	=> 'text',
			'title'	=> __('Extra Class Name', 'textdomain'),
			'desc'	=> __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css/js file.', 'textdomain')
		)
	)
);

// Tooltip
$az_shortcodes['az_tooltip'] = array( 
	'type'  => 'checkbox', 
	'title' => __('Tooltip', 'textdomain'), 
	'attr'  => array(
		'mode' => array(
			'type'  => 'radio', 
			'title' => __('Position', 'textdomain'),
			'desc'  => __('Select the position of the tooltip.', 'textdomain'), 
			'opt'   => array(
				'top'    => 'Top',
				'left'   => 'Left',
				'right'  => 'Right',
				'bottom' => 'Bottom'
			)
		),
		'text' => array(
			'type'  => 'text', 
			'title' => __('Text', 'textdomain'),
			'desc'  => __('This text appear inside the tooltip.', 'textdomain')
		)
	) 
);

// Highlight
$az_shortcodes['az_highlight'] = array( 
	'type'  => 'checkbox', 
	'title' => __('Highlight', 'textdomain'), 
	'attr'  => array(
		'mode' => array(
			'type'  => 'radio', 
			'title' => __('Mode', 'textdomain'), 
			'opt'   => array(
				'color-text'     => 'Color Text',
				'highlight-text' => 'Highlight Text'
			)
		)
	) 
);

// Dropcap
$az_shortcodes['az_dropcap'] = array( 
	'type'  => 'checkbox', 
	'title' => __('Dropcap', 'textdomain'), 
	'attr'  => array(
		'mode' => array(
			'type'  => 'radio', 
			'title' => __('Mode', 'textdomain'), 
			'opt'   => array(
				'dropcap-normal' => 'Dropcap Normal',
				'dropcap-color'  => 'Dropcap Color'
			)
		)
	) 
);

// Social Profiles
$az_shortcodes['az_social_profiles'] = array(
	'type'  => 'regular',
	'title'	=>	__('Social Profiles', 'textdomain'),
	'attr'	=>	array(

		'az_500px_url' => array(
			'type'  => 'text', 
			'title' => __('500px URL', 'textdomain'), 
			'desc'  => __('Please enter in your 500PX URL.', 'textdomain')
		),

		'az_behance_url' => array(
			'type'  => 'text', 
			'title' => __('Behance URL', 'textdomain'), 
			'desc'  => __('Please enter in your Behance URL.', 'textdomain')
		),

		'az_bebo_url' => array(
			'type'  => 'text', 
			'title' => __('Bebo URL', 'textdomain'), 
			'desc'  => __('Please enter in your Bebo URL.', 'textdomain')
		),

		'az_blogger_url' => array(
			'type'  => 'text', 
			'title' => __('Blogger URL', 'textdomain'), 
			'desc'  => __('Please enter in your Blogger URL.', 'textdomain')
		),

		'az_deviant_art_url' => array(
			'type'  => 'text', 
			'title' => __('Deviant Art URL', 'textdomain'), 
			'desc'  => __('Please enter in your Deviant Art URL.', 'textdomain')
		),

		'az_digg_url' => array(
			'type'  => 'text', 
			'title' => __('Digg URL', 'textdomain'), 
			'desc'  => __('Please enter in your Digg URL.', 'textdomain')
		),

		'az_dribbble_url' => array(
			'type'  => 'text', 
			'title' => __('Dribbble URL', 'textdomain'), 
			'desc'  => __('Please enter in your Dribbble URL.', 'textdomain')
		),

		'az_email_url' => array(
			'type'  => 'text', 
			'title' => __('Email URL', 'textdomain'), 
			'desc'  => __('Please enter in your Email URL. Example: mailto:someone@example.com', 'textdomain')
		),

		'az_envato_url' => array(
			'type'  => 'text', 
			'title' => __('Envato URL', 'textdomain'), 
			'desc'  => __('Please enter in your Envato URL.', 'textdomain')
		),

		'az_evernote_url' => array(
			'type'  => 'text', 
			'title' => __('Evernote URL', 'textdomain'), 
			'desc'  => __('Please enter in your Evernote URL.', 'textdomain')
		),

		'az_facebook_url' => array(
			'type'  => 'text', 
			'title' => __('Facebook URL', 'textdomain'), 
			'desc'  => __('Please enter in your Facebook URL.', 'textdomain')
		),

		'az_flickr_url' => array(
			'type'  => 'text', 
			'title' => __('Flickr URL', 'textdomain'), 
			'desc'  => __('Please enter in your Flickr URL.', 'textdomain')
		),

		'az_forrst_url' => array(
			'type'  => 'text', 
			'title' => __('Forrst URL', 'textdomain'), 
			'desc'  => __('Please enter in your Forrst URL.', 'textdomain')
		),

		'az_github_url' => array(
			'type'  => 'text', 
			'title' => __('Github URL', 'textdomain'), 
			'desc'  => __('Please enter in your Github URL.', 'textdomain')
		),

		'az_google_plus_url' => array(
			'type'  => 'text', 
			'title' => __('Google Plus URL', 'textdomain'), 
			'desc'  => __('Please enter in your Google Plus URL.', 'textdomain')
		),

		'az_grooveshark_url' => array(
			'type'  => 'text', 
			'title' => __('Grooveshark URL', 'textdomain'), 
			'desc'  => __('Please enter in your Grooveshark URL.', 'textdomain')
		),

		'az_instagram_url' => array(
			'type'  => 'text', 
			'title' => __('Instagram URL', 'textdomain'), 
			'desc'  => __('Please enter in your Instagram URL.', 'textdomain')
		),

		'az_last_fm_url' => array(
			'type'  => 'text', 
			'title' => __('Last FM URL', 'textdomain'), 
			'desc'  => __('Please enter in your Last FM URL.', 'textdomain')
		),

		'az_linkedin_url' => array(
			'type'  => 'text', 
			'title' => __('Linked-In URL', 'textdomain'), 
			'desc'  => __('Please enter in your Linked-In URL.', 'textdomain')
		),

		'az_pinterest_url' => array(
			'type'  => 'text', 
			'title' => __('Pinterest URL', 'textdomain'), 
			'desc'  => __('Please enter in your Pinterest URL.', 'textdomain')
		),

		'az_quora_url' => array(
			'type'  => 'text', 
			'title' => __('Quora URL', 'textdomain'), 
			'desc'  => __('Please enter in your Quora URL.', 'textdomain')
		),

		'az_skype_url' => array(
			'type'  => 'text', 
			'title' => __('Skype URL', 'textdomain'), 
			'desc'  => __('Please enter in your Skype URL. Example: skype:username?call', 'textdomain')
		),

		'az_soundcloud_url' => array(
			'type'  => 'text', 
			'title' => __('Soundcloud URL', 'textdomain'), 
			'desc'  => __('Please enter in your Soundcloud URL.', 'textdomain')
		),

		'az_stumbleupon_url' => array(
			'type'  => 'text', 
			'title' => __('Stumbleupon URL', 'textdomain'), 
			'desc'  => __('Please enter in your Stumbleupon URL.', 'textdomain')
		),

		'az_tumblr_url' => array(
			'type'  => 'text', 
			'title' => __('Tumblr URL', 'textdomain'), 
			'desc'  => __('Please enter in your Tumblr URL.', 'textdomain')
		),

		'az_twitter_url' => array(
			'type'  => 'text', 
			'title' => __('Twitter URL', 'textdomain'), 
			'desc'  => __('Please enter in your Twitter URL.', 'textdomain')
		),

		'az_viddler_url' => array(
			'type'  => 'text', 
			'title' => __('Viddler URL', 'textdomain'), 
			'desc'  => __('Please enter in your Viddler URL.', 'textdomain')
		),

		'az_vimeo_url' => array(
			'type'  => 'text', 
			'title' => __('Vimeo URL', 'textdomain'), 
			'desc'  => __('Please enter in your Vimeo URL.', 'textdomain')
		),

		'az_virb_url' => array(
			'type'  => 'text', 
			'title' => __('Virb URL', 'textdomain'), 
			'desc'  => __('Please enter in your Virb URL.', 'textdomain')
		),

		'az_wordpress_url' => array(
			'type'  => 'text', 
			'title' => __('Wordpress URL', 'textdomain'), 
			'desc'  => __('Please enter in your Wordpress URL.', 'textdomain')
		),

		'az_xing_url' => array(
			'type'  => 'text', 
			'title' => __('Xing URL', 'textdomain'), 
			'desc'  => __('Please enter in your Xing URL.', 'textdomain')
		),

		'az_yahoo_url' => array(
			'type'  => 'text', 
			'title' => __('Yahoo URL', 'textdomain'), 
			'desc'  => __('Please enter in your Yahoo URL.', 'textdomain')
		),

		'az_yelp_url' => array(
			'type'  => 'text', 
			'title' => __('Yelp URL', 'textdomain'), 
			'desc'  => __('Please enter in your Yelp URL.', 'textdomain')
		),

		'az_youtube_url' => array(
			'type'  => 'text', 
			'title' => __('Youtube URL', 'textdomain'), 
			'desc'  => __('Please enter in your Youtube URL.', 'textdomain')
		),

		'az_zerply_url' => array(
			'type'  => 'text', 
			'title' => __('Zerply URL', 'textdomain'), 
			'desc'  => __('Please enter in your Zerply URL.', 'textdomain')
		),

		'class'	=>	array(
			'type'	=> 'text',
			'title'	=> __('Extra Class name', 'textdomain'),
			'desc'	=> __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css/js file.', 'textdomain')
		)

	)
);

// Shortcode Output HTML
		$html_options = null;
		
		$shortcode_html = '
		
		<div id="az-sh-heading">
		
		<div id="shortcode-generator" class="mfp-hide mfp-with-anim">
		    					
			<div class="shortcode-content">
				<div id="az-sc-header">
					<div class="label"><strong>AZ Shortcodes</strong></div>			
					<div class="content">
					<select id="az-shortcodes">
				    <option value="0" selected="selected">'. __("Choose your Shortcode...", 'textdomain') .'</option>';
					
					foreach( $az_shortcodes as $shortcode => $options ){
						
						if(strpos($shortcode,'header') !== false) {
							$shortcode_html .= '<optgroup label="'.$options['title'].'">';
						}
						else {
							$shortcode_html .= '<option value="'.$shortcode.'">'.$options['title'].'</option>';
							$html_options .= '<div class="shortcode-options" id="options-'.$shortcode.'" data-name="'.$shortcode.'" data-type="'.$options['type'].'">';
							
							if( !empty($options['attr']) ){
								 foreach( $options['attr'] as $name => $attr_option ){
									$html_options .= az_option_element( $name, $attr_option, $options['type'], $shortcode );
								 }
							}
			
							$html_options .= '</div>'; 
						}
						
					} 
			
			$shortcode_html .= '</select></div></div></div>'; 	
		
	
		 echo $shortcode_html . '<div class="sh-container">' . $html_options; ?>
			
			<div id="shortcode-content">
				
				<div class="label"><label id="option-label" for="shortcode-content"><?php echo __( 'Content: ', 'textdomain' ); ?> </label></div>
				<div class="content"><textarea id="shortcode_content"></textarea></div>
			
			    <div class="hr"></div>
			    
			</div>
		
			<code class="shortcode_storage"><span id="shortcode-storage-o" style=""></span><span id="shortcode-storage-d"></span><span id="shortcode-storage-c" style=""></span></code>
			<a class="btn" id="add-shortcode"><?php echo __( 'Add Shortcode', 'textdomain' ); ?></a>
			</div><!--sh-container-->
		</div>

	</div>

	<?php	

}

function az_option_element( $name, $attr_option, $type, $shortcode ){
	
	$option_element = null;
	
	(isset($attr_option['desc']) && !empty($attr_option['desc'])) ? $desc = '<p class="description">'.$attr_option['desc'].'</p>' : $desc = '';
		
	switch( $attr_option['type'] ){
		
	case 'radio':
	    
		$option_element .= '<div class="label"><strong>'.$attr_option['title'].': </strong></div><div class="content">';
	    foreach( $attr_option['opt'] as $val => $title ){
	    
		(isset($attr_option['def']) && !empty($attr_option['def'])) ? $def = $attr_option['def'] : $def = '';
		
		 $option_element .= '
			<label for="shortcode-option-'.$shortcode.'-'.$name.'-'.$val.'">'.$title.'</label>
		    <input class="attr" type="radio" data-attrname="'.$name.'" name="'.$shortcode.'-'.$name.'" value="'.$val.'" id="shortcode-option-'.$shortcode.'-'.$name.'-'.$val.'"'. ( $val == $def ? ' checked="checked"':'').'>';
	    }
		
		$option_element .= $desc . '</div>';
		
	    break;
		
	case 'checkbox':
		
		$option_element .= '<div class="label"><label for="' . $name . '"><strong>' . $attr_option['title'] . ': </strong></label></div><div class="content"> <input type="checkbox" class="' . $name . '" id="' . $name . '" />'. $desc. '</div> ';
		
		break;	
	
	case 'select':
		
		$option_element .= '
		<div class="label"><label for="'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		
		<div class="content"><select id="'.$name.'" class="az-select">';
			$values = $attr_option['values'];
			foreach( $values as $value ){
		    	$option_element .= '<option value="'.$value.'">'.$value.'</option>';
			}
		$option_element .= '</select>' . $desc . '</div>';
		
		break;
	
	case 'select_slider':
		
		$option_element .= '
		<div class="label"><label for="'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		
		<div class="content"><select id="'.$name.'" class="az-select">';
			$values = $attr_option['options'];
			foreach( $values as $k => $v ){
		    	$option_element .= '<option value="'.$v.'">'.$k.'</option>';
			}
		$option_element .= '</select>' . $desc . '</div>';
		
		break;
		
	case 'icons':
		
		$option_element .= '

		<div class="icon-option">';
			$values = $attr_option['values'];
			foreach( $values as $value ){
		    	$option_element .= '<i class="'.$value.'"></i>';
			}
		$option_element .= $desc . '</div>';
		
		break;
		
	case 'custom':
 
		if( $name == 'accordions' ){
			$option_element .= '
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>'.__('Accordion Title: ', 'textdomain').'</strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>'.__('Accordion Content: ', 'textdomain').'</strong></label></div>
					<div class="content"><textarea class="shortcode-dynamic-item-text" type="text" name=""></textarea></div>
				</div>
			</div>
			<a href="#" class="btn orange remove-list-item">'.__('Remove Accordion', 'textdomain' ). '</a> <a href="#" class="btn orange add-list-item">'.__('Add Accordion', 'textdomain' ).'</a>';
			
		}
		
		if( $name == 'toggles' ){
			$option_element .= '
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>'.__('Toggle Title: ', 'textdomain').'</strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>'.__('Toggle Content: ', 'textdomain').'</strong></label></div>
					<div class="content"><textarea class="shortcode-dynamic-item-text" type="text" name=""></textarea></div>
				</div>
			</div>
			<a href="#" class="btn orange remove-list-item">'.__('Remove Toggle', 'textdomain' ). '</a> <a href="#" class="btn orange add-list-item">'.__('Add Toggle', 'textdomain' ).'</a>';
			
		}
		
		if( $name == 'tabs' ){
			$option_element .= '
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>'.__('Tab Title: ', 'textdomain').'</strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>'.__('Tab Content: ', 'textdomain').'</strong></label></div>
					<div class="content"><textarea class="shortcode-dynamic-item-text" type="text" name=""></textarea></div>
				</div>
			</div>
			<a href="#" class="btn orange remove-list-item">'.__('Remove Tab', 'textdomain' ). '</a> <a href="#" class="btn orange add-list-item">'.__('Add Tab', 'textdomain' ).'</a>';
			
		}

		if( $name == 'testimonials' ){
			$option_element .= '
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>'.__('Testimonial Image: ', 'textdomain').'</strong></label></div>
					<div class="content">
						<input type="hidden" id="options-item"  />
			        	<img class="redux-opts-screenshot" id="redux-opts-screenshot-" src="" style="margin-left: 2px;" />
			        	<a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);" class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', 'textdomain') . '</a>
			        	<a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none; margin: 4px 0 4px 2px;">' . __('Remove Upload', 'textdomain') . '</a>
					</div>

					<div class="label"><label><strong>'.__('Testimonial Title: ', 'textdomain').'</strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>'.__('Testimonial Content: ', 'textdomain').'</strong></label></div>
					<div class="content"><textarea class="shortcode-dynamic-item-text" type="text" name=""></textarea></div>
				</div>
			</div>
			<a href="#" class="btn orange remove-list-item">'.__('Remove Testimonial', 'textdomain' ). '</a> <a href="#" class="btn orange add-list-item">'.__('Add Testimonial', 'textdomain' ).'</a>';
			
		}
		
		elseif( $name == 'image'){
			$option_element .= '
				<div class="shortcode-dynamic-item-pop" id="options-item" data-name="image-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="image_url" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);" class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', 'textdomain') . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', 'textdomain') . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}

		elseif( $name == 'image_popup'){
			$option_element .= '
				<div class="shortcode-dynamic-item-pop" id="options-item" data-name="image-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="image_popup_url" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);" class="redux-opts-upload button-secondary" style="margin: 7px 0 8px 0;" rel-id="">' . __('Upload', 'textdomain') . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', 'textdomain') . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}
		
		/*
		elseif( $name == 'webm_url'){
			$option_element .= '
				<div class="shortcode-dynamic-item" id="options-item" data-name="file-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="webm_url" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);" class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', 'textdomain') . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', 'textdomain') . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}

		elseif( $name == 'mp4_url'){
			$option_element .= '
				<div class="shortcode-dynamic-item" id="options-item" data-name="file-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="mp4_url" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);" class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', 'textdomain') . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', 'textdomain') . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}
		
		elseif( $name == 'ogv_url'){
			$option_element .= '
				<div class="shortcode-dynamic-item" id="options-item" data-name="file-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="ogv_url" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);" class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', 'textdomain') . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', 'textdomain') . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}
		
		elseif( $name == 'mp3_url'){
			$option_element .= '
				<div class="shortcode-dynamic-item" id="options-item" data-name="file-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="mp3_url" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);" class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', 'textdomain') . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', 'textdomain') . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}*/
		
		elseif( $type == 'checkbox' ){
			$option_element .= '<div class="label"><label for="' . $name . '"><strong>' . $attr_option['title'] . ': </strong></label></div><div class="content"><input type="checkbox" class="' . $name . '" id="' . $name . '" />' . $desc . '</div> ';
		}

		elseif( $name == 'color' ){
	        $option_element .= '<div class="label"><label><strong>'. $attr_option['title'] . '</strong></label></div>
			  	 				<div class="content" style="margin-top: 6px;"><input type="text" value="" class="popup-colorpicker" style="width: 70px; margin-right: 5px;" data-default-color=""/></div>';	
		} 
		
		
		break;

	case 'textarea':
		$option_element .= '
		<div class="label"><label for="shortcode-option-'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		<div class="content"><textarea data-attrname="'.$name.'"></textarea> ' . $desc . '</div>';
		break;
			
	case 'text':
	default:
	    $option_element .= '
		<div class="label"><label for="shortcode-option-'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		<div class="content"><input class="attr" type="text" data-attrname="'.$name.'" value="" />' . $desc . '</div>';
	    break;

    }
	
	
	$option_element .= '<div class="clear"></div>';
    
    return $option_element;
}

?>