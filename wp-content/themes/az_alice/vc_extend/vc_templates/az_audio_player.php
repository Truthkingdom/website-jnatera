<?php
$output = $audio_link = $el_class = $responsive_lg = $responsive_md = $responsive_sm = $responsive_xs = '';
extract( shortcode_atts( array(
	'audio_link' 	=> '',
	'el_class' 	 	=> '',
	'responsive_lg'	=> '',
    'responsive_md' => '',
    'responsive_sm' => '',
    'responsive_xs' => ''
), $atts ) );

$el_class = $this->getExtraClass( $el_class );

// Get Uniq Id
$uniq_self = uniqid();

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'audio-player-builder'.$el_class, $this->settings['base']);
$class = setClass(array($css_class, $responsive_lg, $responsive_md, $responsive_sm, $responsive_xs));

$output .= '
<div'.$class.'>
<div class="audio-container">
	<div id="audio-'.$uniq_self.'">
		<audio style="width:100%; height:30px;" class="audio-js audio-shortcode" controls="control" preload src="'.esc_url($audio_link).'" data-volume="50"></audio>
	</div>
</div>
</div>'.$this->endBlockComment('az_audio_player');

echo $output;

?>