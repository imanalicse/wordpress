<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

if ( empty( $atts['image'] ) ) {
	return;
}

$image = '';
if(is_array($atts['image']) && isset($atts['image']['attachment_id']) && $atts['image']['attachment_id'] != ''){
    $thum = wp_get_attachment_image_src( $atts['image']['attachment_id'], 'full' );
    $image = $thum[0];
}

$heading = '';
if($atts['heading'] != '')
{
    $heading = $atts['heading'];
}

$consulting = array();
if(!empty($atts['consulting'])){
    $consulting = $atts['consulting'];
}


?>
<div class="row">
    <div class="col-lg-5 col-sm-6 noPaddingRight">
        <div class="divImg zindex">
            <img src="<?php echo esc_url($image); ?>" alt="">
        </div>
    </div>
    <div class="col-lg-7 col-sm-6">
        <div class="ab_fatures">
            <?php if($heading != ''): ?>
            <div class="sectionTitle">
                <h2><?php echo esc_html($heading); ?></h2>
            </div>
            <?php endif; ?>
            <?php if(is_array($consulting) && count($consulting) > 0): ?>
                <?php foreach($consulting as $con): ?>
                    <?php
                        $margin_top = '';
                        if($con['margin_top'] != ''){
                            $margin_top = 'margin-top: '.$con['margin_top'].'px; ';
                        }
                        $margin_bottom = '';
                        if($con['margin_bottom'] != ''){
                            $margin_bottom = 'margin-bottom: '.$con['margin_bottom'].'px; ';
                        }
                        
                        $atts['title_link'] = '#';
                        if($con['title_link'] != ''){
                            $title_link = $con['title_link'];
                        }
                    ?>
                    <div data-wow-delay="300ms" data-wow-duration="700ms" class="ab_singleCont wow fadeInUp" style="<?php echo esc_attr($margin_top . $margin_bottom); ?>">
                        <?php if($con['icon'] != ''): ?>
                            <i class="<?php echo esc_attr($con['icon']); ?>"></i>
                        <?php endif; ?>
                            <h2><a href="<?php echo esc_attr($title_link); ?>"><?php echo esc_html($con['title']); ?></a></h2>
                            <p><?php echo strip_tags($con['content']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>