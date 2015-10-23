<?php
$options_alice = get_option('alice'); 

// Left Side Bg Color/Bg Image
$bg_slogan_visibility = $bg_slogan_class = $bg_solid_color_output = $bg_overlay_mask = $bg_background_image = '';

// Slogan Class
if ( $options_alice['left_side_slogan_visibility'] == 'show' ){
    $bg_slogan_visibility = 'slogan-enabled';
} else {
    $bg_slogan_visibility = 'slogan-disabled';
}

$bg_slogan_menu = (!empty($options_alice['left_side_header_menu'])) ? $options_alice['left_side_header_menu'] : 'solid_color';

if ($bg_slogan_menu == 'solid_color') {
    $bg_slogan_class = 'bg-solid-color-slogan';

    if (!empty($options_alice['left_side_background_color'])) { 
        $bg_solid_color_output = ' style="background-color: '.$options_alice['left_side_background_color'].';"';
    }
}
else if ($bg_slogan_menu == 'bg_image') {
    $bg_img_position = $bg_img_repeat = '';
    $check_img_position = $options_alice['left_side_background_image_position'];
    $check_img_repeat = $options_alice['left_side_background_image_repeat'];

    // Background Position
    if ( $check_img_position == 'left_top') {
        $bg_img_position = 'left top';
    } else if ( $check_img_position == 'left_center') {
        $bg_img_position = 'left center';
    } else if ( $check_img_position == 'left_bottom') {
        $bg_img_position = 'left bottom';
    } else if ( $check_img_position == 'right_top') {
        $bg_img_position = 'right top';
    } else if ( $check_img_position == 'right_center') {
        $bg_img_position = 'right center';
    } else if ( $check_img_position == 'right_bottom') {
        $bg_img_position = 'right bottom';
    } else if ( $check_img_position == 'center_top') {
        $bg_img_position = 'center top';
    } else if ( $check_img_position == 'center_bottom') {
        $bg_img_position = 'center bottom';
    } else {
        $bg_img_position = 'center center';
    }

    // Background Repeat
    if ( $check_img_repeat == 'no_repeat') {
        $bg_img_repeat = 'background-repeat: no-repeat;';
    } else if ( $check_img_repeat == 'repeat') {
        $bg_img_repeat = 'background-repeat: repeat;';
    } else if ( $check_img_repeat == 'repeat_x') {
        $bg_img_repeat = 'background-repeat: repeat-x;';
    } else if ( $check_img_repeat == 'repeat_y') {
        $bg_img_repeat = 'background-repeat: repeat-y;';
    } else {
        $bg_img_repeat = 'background-repeat: no-repeat; background-size: cover;';
    }

    $rgba_value = Redux_Helpers::hex2rgba(''.$options_alice['left_side_overaly_mask_color']['color'].'', ''.$options_alice['left_side_overaly_mask_color']['alpha'].'');

    $bg_slogan_class = 'bg-image-slogan';
    $bg_overlay_mask = '<span class="bg-image-slogan-mask" style="background-color: '.$rgba_value.';"></span>';
    $bg_background_image = ' style="background-image: url('.$options_alice['left_side_background_image']['url'].'); background-position:'.$bg_img_position.'; '.$bg_img_repeat.'"';
}

// Slogan Text Color
$slogant_text_color = (!empty($options_alice['left_side_header_slogan_text_color'])) ? ' style="color: '.$options_alice['left_side_header_slogan_text_color'].';"' : '';
?>

<div id="my-menu" class="<?php echo esc_attr($bg_slogan_visibility); ?>">
    <?php if ( $options_alice['left_side_slogan_visibility'] == 'show' ){ ?>
    <!-- Start Slogan Panel -->
    <div class="bg-slogan-menu <?php echo esc_attr($bg_slogan_class); ?>"<?php echo !empty( $bg_solid_color_output ) ? $bg_solid_color_output : ''; ?><?php echo !empty( $bg_background_image ) ? $bg_background_image : ''; ?>>
        <?php echo !empty( $bg_overlay_mask ) ? $bg_overlay_mask : ''; ?>
        <div class="bg-slogan-content">
            <?php
            if ( !empty($options_alice['left_side_header_slogan_logo']['url'])) { ?>
            <a class="slogan-logo" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                <img class="standard" src="<?php echo esc_url($options_alice['left_side_header_slogan_logo']['url']); ?>" width="<?php echo esc_attr($options_alice['left_side_header_slogan_logo']['width']); ?>" height="<?php echo esc_attr($options_alice['left_side_header_slogan_logo']['height']); ?>" alt="<?php bloginfo('name'); ?>" />
            </a>   
            <?php } ?>
            <?php
            if ( !empty($options_alice['left_side_header_slogan_text'])) { 
                $slogan_text_output = $options_alice['left_side_header_slogan_text'];
                $allowed_tags = array(
                    'br' => array(),
                    'strong' => array()
                ); 
            ?>
            <h3 class="slogan-text"<?php echo !empty( $slogant_text_color ) ? $slogant_text_color : ''; ?>><?php echo wp_kses($slogan_text_output, $allowed_tags); ?></h3>
            <?php } ?>
        </div>
    </div>
    <!-- End Slogan Panel -->
    <?php } ?>

    <!-- Start Menu Panel -->
    <nav class="mm-panel">
        <?php if ( has_nav_menu( 'primary_menu' ) ) {

            wp_nav_menu( array(
                'container' => false,
                'menu_class' => 'sf-menu',
                'echo' => true,
                'before' => '',
                'after' => '',
                'link_before' => '',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li class="selector"></li><li class="current-selector"></li></ul>',
                'link_after' => '',
                'depth' => 2,
                'theme_location' => 'primary_menu',
                'walker' => new az_Nav_Walker()
                )
            );

        } else {

            echo '<ul class="sf-menu"><li><a href="#">'. __('No menu assigned!', AZ_THEME_NAME ) . '</a></li></ul>';

        } ?>

    </nav>
    <!-- End Menu Panel -->

    <!-- Start Close Menu -->
    <a class="menu-trigger-close">
        <div class="bars">
            <i class="bar top"></i>
            <i class="bar bottom"></i>
        </div>
    </a>
    <!-- End Close Menu -->

    <?php get_template_part('framework/core/header/az-header-optional-menu'); ?>

    <?php if( !empty($options_alice['header_social_link']) && $options_alice['header_social_link'] == 1) { ?>
    <!-- Start Credits Social -->
    <div class="credits-social">
        <ul class="menu-nav-social">
            <?php if ( !empty($options_alice['500px-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['500px-url']); ?>" target="_blank"><i class="font-icon-social-500px"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['behance-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['behance-url']); ?>" target="_blank"><i class="font-icon-social-behance"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['bebo-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['bebo-url']); ?>" target="_blank"><i class="font-icon-social-bebo"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['blogger-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['blogger-url']); ?>" target="_blank"><i class="font-icon-social-blogger"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['deviant-art-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['deviant-art-url']); ?>" target="_blank"><i class="font-icon-social-deviant-art"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['digg-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['digg-url']); ?>" target="_blank"><i class="font-icon-social-digg"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['dribbble-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['dribbble-url']); ?>" target="_blank"><i class="font-icon-social-dribbble"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['email-url']) ) : ?>
            <li><a href="<?php echo esc_attr($options_alice['email-url']); ?>" target="_blank"><i class="font-icon-social-email"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['envato-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['envato-url']); ?>" target="_blank"><i class="font-icon-social-envato"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['evernote-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['evernote-url']); ?>" target="_blank"><i class="font-icon-social-evernote"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['facebook-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['facebook-url']); ?>" target="_blank"><i class="font-icon-social-facebook"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['flickr-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['flickr-url']); ?>" target="_blank"><i class="font-icon-social-flickr"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['forrst-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['forrst-url']); ?>" target="_blank"><i class="font-icon-social-forrst"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['github-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['github-url']); ?>" target="_blank"><i class="font-icon-social-github"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['google-plus-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['google-plus-url']); ?>" target="_blank"><i class="font-icon-social-google-plus"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['grooveshark-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['grooveshark-url']); ?>" target="_blank"><i class="font-icon-social-grooveshark"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['instagram-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['instagram-url']); ?>" target="_blank"><i class="font-icon-social-instagram"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['last-fm-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['last-fm-url']); ?>" target="_blank"><i class="font-icon-social-last-fm"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['linkedin-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['linkedin-url']); ?>" target="_blank"><i class="font-icon-social-linkedin"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['paypal-url']) ) : ?>
            <li><a href="<?php echo esc_attr($options_alice['paypal-url']); ?>" target="_blank"><i class="font-icon-social-paypal"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['pinterest-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['pinterest-url']); ?>" target="_blank"><i class="font-icon-social-pinterest"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['quora-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['quora-url']); ?>" target="_blank"><i class="font-icon-social-quora"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['skype-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['skype-url']); ?>" target="_blank"><i class="font-icon-social-skype"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['soundcloud-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['soundcloud-url']); ?>" target="_blank"><i class="font-icon-social-soundcloud"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['stumbleupon-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['stumbleupon-url']); ?>" target="_blank"><i class="font-icon-social-stumbleupon"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['tumblr-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['tumblr-url']); ?>" target="_blank"><i class="font-icon-social-tumblr"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['twitter-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['twitter-url']); ?>" target="_blank"><i class="font-icon-social-twitter"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['viddler-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['viddler-url']); ?>" target="_blank"><i class="font-icon-social-viddler"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['vimeo-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['vimeo-url']); ?>" target="_blank"><i class="font-icon-social-vimeo"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['virb-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['virb-url']); ?>" target="_blank"><i class="font-icon-social-virb"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['wordpress-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['wordpress-url']); ?>" target="_blank"><i class="font-icon-social-wordpress"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['xing-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['xing-url']); ?>" target="_blank"><i class="font-icon-social-xing"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['yahoo-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['yahoo-url']); ?>" target="_blank"><i class="font-icon-social-yahoo"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['yelp-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['yelp-url']); ?>" target="_blank"><i class="font-icon-social-yelp"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['youtube-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['youtube-url']); ?>" target="_blank"><i class="font-icon-social-youtube"></i></a></li>
            <?php endif; ?>
            <?php if ( !empty($options_alice['zerply-url']) ) : ?>
            <li><a href="<?php echo esc_url($options_alice['zerply-url']); ?>" target="_blank"><i class="font-icon-social-zerply"></i></a></li>
            <?php endif; ?>
        </ul>
    </div>
    <!-- End Credits Social -->
    <?php } ?>

</div>

