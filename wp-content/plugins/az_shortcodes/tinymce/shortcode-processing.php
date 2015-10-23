<?php

/*-----------------------------------------------------------------------------------*/
/*	Elements
/*-----------------------------------------------------------------------------------*/

// Blank Divider
function az_blank_divider_sh($atts, $content = null) {  
    extract(shortcode_atts(array(
    	"height_value" => '', 
    	"class" => ''
    ), $atts));
	
	if(!empty($class)) { $class = ' '.esc_attr($class); }
	
	$height_value = ' style="height: '.esc_attr($height_value).'px;"';
	
	return '<div class="blank_divider'.$class.'"'.$height_value.'></div>';
}
add_shortcode('az_blank_divider_sh', 'az_blank_divider_sh');

// Tootltip
function az_tooltip($atts, $content = null) {  
    extract(shortcode_atts(array(
    	"mode" => 'top', 
    	"text" => 'Tooltip'
    ), $atts));
	
	switch ($mode) {

		case 'top' :
			$tooltip_mode = '<a data-toggle="tooltip" data-placement="top" title="'.esc_html($text).'">'. do_shortcode($content) .'</a>';
			break;

		case 'left' :
			$tooltip_mode = '<a data-toggle="tooltip" data-placement="left" title="'.esc_html($text).'">'. do_shortcode($content) .'</a>';
			break;

		case 'right' :
			$tooltip_mode = '<a data-toggle="tooltip" data-placement="right" title="'.esc_html($text).'">'. do_shortcode($content) .'</a>';
			break;

		case 'bottom' :
			$tooltip_mode = '<a data-toggle="tooltip" data-placement="bottom" title="'.esc_html($text).'">'. do_shortcode($content) .'</a>';
			break;

	}

    return $tooltip_mode;
}
add_shortcode('az_tooltip', 'az_tooltip');

// Highlights
function az_highlight($atts, $content = null) {  
    extract(shortcode_atts(array(
    	"mode" => 'color-text'
    ), $atts));
	
	switch ($mode) {

		case 'color-text' :
			$highlight_mode = '<span class="highlight-normal-text">'. do_shortcode($content) .'</span>';
			break;

		case 'highlight-text' :
			$highlight_mode = '<span class="highlight-color-text">'. do_shortcode($content) .'</span>';
			break;

	}

    return $highlight_mode;
}
add_shortcode('az_highlight', 'az_highlight');

// DropCaps
function az_dropcap($atts, $content = null) {  
    extract(shortcode_atts(array(
    	"mode" => 'dropcap-normal'
    ), $atts));
	
	switch ($mode) {

		case 'dropcap-normal' :
			$dropcap_mode = '<span class="dropcap">'. do_shortcode($content) .'</span>';
			break;

		case 'dropcap-color' :
			$dropcap_mode = '<span class="dropcap-color">'. do_shortcode($content) .'</span>';
			break;

	}
	
    return $dropcap_mode;
}
add_shortcode('az_dropcap', 'az_dropcap');

// Social Profiles
function az_social_profiles($atts, $content = null){
	extract(shortcode_atts(array(
		"az_500px_url" 		 => '',
		"az_behance_url" 	 => '',
		"az_bebo_url" 		 => '',
		"az_blogger_url" 	 => '',
		"az_deviant_art_url" => '',
		"az_digg_url" 		 => '',
		"az_dribbble_url" 	 => '',
		"az_email_url" 		 => '',
		"az_envato_url" 	 => '',
		"az_evernote_url" 	 => '',
		"az_facebook_url" 	 => '',
		"az_flickr_url" 	 => '',
		"az_forrst_url" 	 => '',
		"az_github_url" 	 => '',
		"az_google_plus_url" => '',
		"az_grooveshark_url" => '',
		"az_instagram_url" 	 => '',
		"az_last_fm_url" 	 => '',
		"az_linkedin_url" 	 => '',
		"az_pinterest_url" 	 => '',
		"az_quora_url" 		 => '',
		"az_skype_url" 		 => '',
		"az_soundcloud_url"  => '',
		"az_stumbleupon_url" => '',
		"az_tumblr_url" 	 => '',
		"az_twitter_url" 	 => '',
		"az_viddler_url" 	 => '',
		"az_vimeo_url" 	 	 => '',
		"az_virb_url" 		 => '',
		"az_wordpress_url" 	 => '',
		"az_xing_url" 		 => '',
		"az_yahoo_url" 	 	 => '',
		"az_yelp_url" 		 => '',
		"az_youtube_url" 	 => '',
		"az_zerply_url" 	 => '',
		"class" 			 => ''
	), $atts));
	
	if(!empty($class)) { $class = ' '.esc_attr($class); }
	
	$output = '';

	if(!empty($az_500px_url)) { $output .= '<li><a href="'.esc_url($az_500px_url).'" target="_blank"><i class="font-icon-social-500px"></i></a></li>'."\n"; }
	if(!empty($az_behance_url)) { $output .= '<li><a href="'.esc_url($az_behance_url).'" target="_blank"><i class="font-icon-social-behance"></i></a></li>'."\n"; }
	if(!empty($az_bebo_url)) { $output .= '<li><a href="'.esc_url($az_bebo_url).'" target="_blank"><i class="font-icon-social-bebo"></i></a></li>'."\n"; }
	if(!empty($az_blogger_url)) { $output .= '<li><a href="'.esc_url($az_blogger_url).'" target="_blank"><i class="font-icon-social-blogger"></i></a></li>'."\n"; }
	if(!empty($az_deviant_art_url)) { $output .= '<li><a href="'.esc_url($az_deviant_art_url).'" target="_blank"><i class="font-icon-social-deviant-art"></i></a></li>'."\n"; }
	if(!empty($az_digg_url)) { $output .= '<li><a href="'.esc_url($az_digg_url).'" target="_blank"><i class="font-icon-social-digg"></i></a></li>'."\n"; }
	if(!empty($az_dribbble_url)) { $output .= '<li><a href="'.esc_url($az_dribbble_url).'" target="_blank"><i class="font-icon-social-dribbble"></i></a></li>'."\n"; }
	if(!empty($az_email_url)) { $output .= '<li><a href="'.esc_attr($az_email_url).'" target="_blank"><i class="font-icon-social-email"></i></a></li>'."\n"; }
	if(!empty($az_envato_url)) { $output .= '<li><a href="'.esc_url($az_envato_url).'" target="_blank"><i class="font-icon-social-envato"></i></a></li>'."\n"; }
	if(!empty($az_evernote_url)) { $output .= '<li><a href="'.esc_url($az_evernote_url).'" target="_blank"><i class="font-icon-social-evernote"></i></a></li>'."\n"; }
	if(!empty($az_facebook_url)) { $output .= '<li><a href="'.esc_url($az_facebook_url).'" target="_blank"><i class="font-icon-social-facebook"></i></a></li>'."\n"; }
	if(!empty($az_flickr_url)) { $output .= '<li><a href="'.esc_url($az_flickr_url).'" target="_blank"><i class="font-icon-social-flickr"></i></a></li>'."\n"; }
	if(!empty($az_forrst_url)) { $output .= '<li><a href="'.esc_url($az_forrst_url).'" target="_blank"><i class="font-icon-social-forrst"></i></a></li>'."\n"; }
	if(!empty($az_github_url)) { $output .= '<li><a href="'.esc_url($az_github_url).'" target="_blank"><i class="font-icon-social-github"></i></a></li>'."\n"; }
	if(!empty($az_google_plus_url)) { $output .= '<li><a href="'.esc_url($az_google_plus_url).'" target="_blank"><i class="font-icon-social-google-plus"></i></a></li>'."\n"; }
	if(!empty($az_grooveshark_url)) { $output .= '<li><a href="'.esc_url($az_grooveshark_url).'" target="_blank"><i class="font-icon-social-grooveshark"></i></a></li>'."\n"; }
	if(!empty($az_instagram_url)) { $output .= '<li><a href="'.esc_url($az_instagram_url).'" target="_blank"><i class="font-icon-social-instagram"></i></a></li>'."\n"; }
	if(!empty($az_last_fm_url)) { $output .= '<li><a href="'.esc_url($az_last_fm_url).'" target="_blank"><i class="font-icon-social-last-fm"></i></a></li>'."\n"; }
	if(!empty($az_linkedin_url)) { $output .= '<li><a href="'.esc_url($az_linkedin_url).'" target="_blank"><i class="font-icon-social-linkedin"></i></a></li>'."\n"; }
	if(!empty($az_pinterest_url)) { $output .= '<li><a href="'.esc_url($az_pinterest_url).'" target="_blank"><i class="font-icon-social-pinterest"></i></a></li>'."\n"; }
	if(!empty($az_quora_url)) { $output .= '<li><a href="'.esc_url($az_quora_url).'" target="_blank"><i class="font-icon-social-quora"></i></a></li>'."\n"; }
	if(!empty($az_skype_url)) { $output .= '<li><a href="'.esc_attr($az_skype_url).'" target="_blank"><i class="font-icon-social-skype"></i></a></li>'."\n"; }
	if(!empty($az_soundcloud_url)) { $output .= '<li><a href="'.esc_url($az_soundcloud_url).'" target="_blank"><i class="font-icon-social-soundcloud"></i></a></li>'."\n"; }
	if(!empty($az_stumbleupon_url)) { $output .= '<li><a href="'.esc_url($az_stumbleupon_url).'" target="_blank"><i class="font-icon-social-stumbleupon"></i></a></li>'."\n"; }
	if(!empty($az_tumblr_url)) { $output .= '<li><a href="'.esc_url($az_tumblr_url).'" target="_blank"><i class="font-icon-social-tumblr"></i></a></li>'."\n"; }
	if(!empty($az_twitter_url)) { $output .= '<li><a href="'.esc_url($az_twitter_url).'" target="_blank"><i class="font-icon-social-twitter"></i></a></li>'."\n"; }
	if(!empty($az_viddler_url)) { $output .= '<li><a href="'.esc_url($az_viddler_url).'" target="_blank"><i class="font-icon-social-viddler"></i></a></li>'."\n"; }
	if(!empty($az_vimeo_url)) { $output .= '<li><a href="'.esc_url($az_vimeo_url).'" target="_blank"><i class="font-icon-social-vimeo"></i></a></li>'."\n"; }
	if(!empty($az_virb_url)) { $output .= '<li><a href="'.esc_url($az_virb_url).'" target="_blank"><i class="font-icon-social-virb"></i></a></li>'."\n"; }
	if(!empty($az_wordpress_url)) { $output .= '<li><a href="'.esc_url($az_wordpress_url).'" target="_blank"><i class="font-icon-social-wordpress"></i></a></li>'."\n"; }
	if(!empty($az_xing_url)) { $output .= '<li><a href="'.esc_url($az_xing_url).'" target="_blank"><i class="font-icon-social-xing"></i></a></li>'."\n"; }
	if(!empty($az_yahoo_url)) { $output .= '<li><a href="'.esc_url($az_yahoo_url).'" target="_blank"><i class="font-icon-social-yahoo"></i></a></li>'."\n"; }
	if(!empty($az_yelp_url)) { $output .= '<li><a href="'.esc_url($az_yelp_url).'" target="_blank"><i class="font-icon-social-yelp"></i></a></li>'."\n"; }
	if(!empty($az_youtube_url)) { $output .= '<li><a href="'.esc_url($az_youtube_url).'" target="_blank"><i class="font-icon-social-youtube"></i></a></li>'."\n"; }
	if(!empty($az_zerply_url)) { $output .= '<li><a href="'.esc_url($az_zerply_url).'" target="_blank"><i class="font-icon-social-zerply"></i></a></li>'."\n"; }
	
	return '
	<div class="az-social-profiles'.$class.'">
		<ul class="az-social-profiles-link">
		'.$output.'
		</ul>
	</div>';
}
add_shortcode('az_social_profiles', 'az_social_profiles');

?>