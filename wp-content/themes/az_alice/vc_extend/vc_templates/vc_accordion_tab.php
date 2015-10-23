<?php
$output = $title = $collapsible = '';

extract(shortcode_atts(array(
	'title' 		=> __('Section', AZ_THEME_NAME ),
	'collapsible'   => '',
), $atts));

$accordion_id = uniqid();

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'panel panel-default', $this->settings['base'], $atts ); 
$class = setClass(array($css_class));

// Collapse Accordion
$collapse = null;
if ($collapsible==true) {
    $collapse = ' in';
} else {
    $collapse = '';
}

$content_output = ($content=='' || $content==' ') ? __('Empty section. Edit page to add content here.', AZ_THEME_NAME ) : wpb_js_remove_wpautop($content);

$output .= '
<div'.$class.'>
	<div class="panel-heading" role="tab" id="'.sanitize_title($title).'">
		<h4 class="panel-title">
	    	<a data-toggle="collapse" href="#az-acc-'.$accordion_id.'-'.sanitize_title($title).'" aria-expanded="true" aria-controls="az-acc'.$accordion_id.'-'.sanitize_title($title).'">'.$title.'</a>
	  	</h4>
	</div>
	<div id="az-acc-'.$accordion_id.'-'.sanitize_title($title).'" class="panel-collapse collapse'.$collapse.'" role="tabpanel" aria-labelledby="'.sanitize_title($title).'">
		<div class="panel-body">
			'.$content_output.'
		</div>
	</div>
</div>'.$this->endBlockComment('.panel-default');

echo $output;