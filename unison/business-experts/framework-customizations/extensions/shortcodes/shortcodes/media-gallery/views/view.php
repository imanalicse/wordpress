<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

$gall_image = array();
if(!empty($atts['gall_image'])){
    $gall_image = $atts['gall_image'];
}

$margin_top = '';
if($atts['margin_top'] != ''){
    $margin_top = 'margin-top: '.$atts['margin_top'].'px; ';
}

$margin_bottom = '';
if($atts['margin_bottom'] != ''){
    $margin_bottom = 'margin-bottom: '.$atts['margin_bottom'].'px; ';
}

?>
<?php if(is_array($gall_image) && count($gall_image) > 0): ?>
<div class="relatedPost" style="<?php echo esc_attr($margin_bottom . $margin_top); ?>">
    <div class="row">
        <?php 
            foreach($gall_image as $gal) 
            {
                $imgs = wp_get_attachment_image_src($gal['attachment_id'], 'martin_gallery');
                $full = wp_get_attachment_image_src($gal['attachment_id'], 'full');
                $image = $imgs[0];
                if($image != '')
                {
                    ?>
                    <div class="col-sm-4">
                        <div class="singleFolio relaPro">
                            <img src="<?php echo esc_url($image); ?>" alt="">
                            <div class="folioHover text-center">
                                <div class="fhovercon relHover">
                                    <a href="<?php echo esc_url($full[0]) ?>" class="popup"><span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        ?>
    </div>
</div>
<?php endif; ?>