<?php if (!defined('FW')) die( 'Forbidden' ); ?>
<?php
/*
 * the `.fw-tabs-container` div also supports
 * a `tabs-justified` class, that strethes the tabs
 * to the width of the whole container
 */

$facebook = '';
if($atts['facebook'] != '')
{
    $facebook = $atts['facebook'];
}

$twitter = '';
if($atts['twitter'] != '')
{
    $twitter = $atts['twitter'];
}

$google_plus = '';
if($atts['google_plus'] != '')
{
    $google_plus = $atts['google_plus'];
}

$instagram = '';
if($atts['instagram'] != '')
{
    $instagram = $atts['instagram'];
}

$dribbble = '';
if($atts['dribbble'] != '')
{
    $dribbble = $atts['dribbble'];
}

$youtube = '';
if($atts['youtube'] != '')
{
    $youtube = $atts['youtube'];
}

$rss = '';
if($atts['rss'] != '')
{
    $rss = $atts['rss'];
}

$behance = '';
if($atts['behance'] != '')
{
    $behance = $atts['behance'];
}

$linkedin = '';
if($atts['linkedin'] != '')
{
    $linkedin = $atts['linkedin'];
}

$pinterest = '';
if($atts['pinterest'] != '')
{
    $pinterest = $atts['pinterest'];
}

?>

<div class="socialsec">
        <?php if($facebook != ''): ?>
        <div class="col-sm-2 col-xs-6 noPaddingLeft noPaddingRight border-right">
            <a href="<?php echo esc_url($facebook); ?>" class="fac"><i class="fa fa-facebook"></i>facebook</a>
        </div>
        <?php endif; ?>
        <?php if($twitter != ''): ?>
        <div class="col-sm-2 col-xs-6 noPaddingLeft noPaddingRight border-right">
            <a href="<?php echo esc_url($twitter); ?>" class="twi"><i class="fa fa-twitter"></i>twitter</a>
        </div>
        <?php endif; ?>
        <?php if($google_plus != ''): ?>
        <div class="col-sm-2 col-xs-6 noPaddingLeft noPaddingRight border-right">
            <a href="<?php echo esc_url($google_plus); ?>" class="goo"><i class="fa fa-google-plus"></i>google</a>
        </div>
        <?php endif; ?>
        <?php if($pinterest != ''): ?>
        <div class="col-sm-2 col-xs-6 noPaddingLeft noPaddingRight border-right">
            <a href="<?php echo esc_url($pinterest); ?>" class="pin"><i class="fa fa-pinterest"></i>pinterest</a>
        </div>
        <?php endif; ?>
        <?php if($instagram != ''): ?>
        <div class="col-sm-2 col-xs-6 noPaddingLeft noPaddingRight border-right">
            <a href="<?php echo esc_url($instagram); ?>" class="ins"><i class="fa fa-instagram"></i>instagram</a>
        </div>
        <?php endif; ?>
        <?php if($dribbble != ''): ?>
        <div class="col-sm-2 col-xs-6 noPaddingLeft noPaddingRight border-right">
            <a href="<?php echo esc_url($dribbble); ?>" class="dri"><i class="fa fa-dribbble"></i>dribbble</a>
        </div>
        <?php endif; ?>
        <?php if($youtube != ''): ?>
        <div class="col-sm-2 col-xs-6 noPaddingLeft noPaddingRight border-right">
            <a href="<?php echo esc_url($youtube); ?>" class="you"><i class="fa fa-youtube"></i>youtube</a>
        </div>
        <?php endif; ?>
        <?php if($rss != ''): ?>
        <div class="col-sm-2 col-xs-6 noPaddingLeft noPaddingRight border-right">
            <a href="<?php echo esc_url($rss); ?>" class="rss"><i class="fa fa-rss"></i>rss</a>
        </div>
        <?php endif; ?>
        <?php if($behance != ''): ?>
        <div class="col-sm-2 col-xs-6 noPaddingLeft noPaddingRight border-right">
            <a href="<?php echo esc_url($behance); ?>" class="beh"><i class="fa fa-behance"></i>behance</a>
        </div>
        <?php endif; ?>
        <?php if($linkedin != ''): ?>
        <div class="col-sm-2 col-xs-6 noPaddingLeft noPaddingRight border-right">
            <a href="<?php echo esc_url($linkedin); ?>" class="lin"><i class="fa fa-linkedin"></i>linkedin</a>
        </div>
        <?php endif; ?>
</div>