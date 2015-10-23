<?php
$output = $height_value = $el_class = $responsive_lg = $responsive_md = $responsive_sm = $responsive_xs = '';
extract(shortcode_atts(array(
	'height_value' 	=> '',
    'el_class' 		=> '',
    'responsive_lg'	=> '',
    'responsive_md' => '',
    'responsive_sm' => '',
    'responsive_xs' => ''
), $atts));

$el_class = $this->getExtraClass($el_class);

$height_value = ' style="height: '.esc_attr($height_value).'px;"';

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'blank-divider'.$el_class, $this->settings['base']);
$class = setClass(array($css_class, $responsive_lg, $responsive_md, $responsive_sm, $responsive_xs));

$output .= '
	<div'.$class.''.$height_value.'></div>'.$this->endBlockComment('az_blank_divider')."\n";

echo $output;
?>