<?php if (!defined('FW')) { die('Forbidden');}

$options = array(
    'col_resonsive' => array(
        'label'   => esc_html__('Responsive Column', 'martin'),
        'desc'    => esc_html__('Select columon for responsiveness in Small (Tab 768px - 980px) device.', 'martin'),
        'type'    => 'select',
        'choices' => array(
                'col-sm-12'   => esc_html__('None', 'martin'),
                'col-sm-1'   => esc_html__('Col-Sm-1', 'martin'),
                'col-sm-2'   => esc_html__('Col-Sm-2', 'martin'),
                'col-sm-3'   => esc_html__('Col-Sm-3', 'martin'),
                'col-sm-4'   => esc_html__('Col-Sm-4', 'martin'),
                'col-sm-5'   => esc_html__('Col-Sm-5', 'martin'),
                'col-sm-6'   => esc_html__('Col-Sm-6', 'martin'),
                'col-sm-7'   => esc_html__('Col-Sm-7', 'martin'),
                'col-sm-8'   => esc_html__('Col-Sm-8', 'martin'),
                'col-sm-9'   => esc_html__('Col-Sm-9', 'martin'),
                'col-sm-10'   => esc_html__('Col-Sm-10', 'martin'),
                'col-sm-11'   => esc_html__('Col-Sm-11', 'martin'),
                'col-sm-12'   => esc_html__('Col-Sm-12', 'martin'),
        )
    ),
    'col_resonsive2' => array(
        'label'   => esc_html__('Responsive Column', 'martin'),
        'desc'    => esc_html__('Select columon for responsiveness in Medium (Desktop 990px - 1024px) device.', 'martin'),
        'type'    => 'select',
        'choices' => array(
                'col-md-12'   => esc_html__('None', 'martin'),
                'col-md-1'   => esc_html__('Col-md-1', 'martin'),
                'col-md-2'   => esc_html__('Col-md-2', 'martin'),
                'col-md-3'   => esc_html__('Col-md-3', 'martin'),
                'col-md-4'   => esc_html__('Col-md-4', 'martin'),
                'col-md-5'   => esc_html__('Col-md-5', 'martin'),
                'col-md-6'   => esc_html__('Col-md-6', 'martin'),
                'col-md-7'   => esc_html__('Col-md-7', 'martin'),
                'col-md-8'   => esc_html__('Col-md-8', 'martin'),
                'col-md-9'   => esc_html__('Col-md-9', 'martin'),
                'col-md-10'   => esc_html__('Col-md-10', 'martin'),
                'col-md-11'   => esc_html__('Col-md-11', 'martin'),
                'col-md-12'   => esc_html__('Col-md-12', 'martin'),
        )
    ),
    'col_offset' => array(
        'label'   => esc_html__('Column Offset', 'martin'),
        'desc'    => esc_html__('Select Column Offset.', 'martin'),
        'type'    => 'select',
        'choices' => array(
                ''   => esc_html__('None', 'martin'),
                'col-lg-offset-1'   => esc_html__('Col-Lg-Offset-1', 'martin'),
                'col-lg-offset-2'   => esc_html__('Col-Lg-Offset-2', 'martin'),
                'col-lg-offset-3'   => esc_html__('Col-Lg-Offset-3', 'martin'),
                'col-lg-offset-4'   => esc_html__('Col-Lg-Offset-4', 'martin'),
                'col-lg-offset-5'   => esc_html__('Col-Lg-Offset-5', 'martin'),
                'col-md-offset-1'   => esc_html__('Col-Md-Offset-1', 'martin'),
                'col-md-offset-2'   => esc_html__('Col-Md-Offset-2', 'martin'),
                'col-md-offset-3'   => esc_html__('Col-Md-Offset-3', 'martin'),
                'col-md-offset-4'   => esc_html__('Col-Md-Offset-4', 'martin'),
                'col-md-offset-5'   => esc_html__('Col-Md-Offset-5', 'martin'),
                'col-sm-offset-1'   => esc_html__('Col-Sm-Offset-1', 'martin'),
                'col-sm-offset-2'   => esc_html__('Col-Sm-Offset-2', 'martin'),
                'col-sm-offset-3'   => esc_html__('Col-Sm-Offset-3', 'martin'),
                'col-sm-offset-4'   => esc_html__('Col-Sm-Offset-4', 'martin'),
                'col-sm-offset-5'   => esc_html__('Col-Sm-Offset-5', 'martin'),
        )
    ),
    'col_pull' => array(
        'label'   => esc_html__('Column Pull', 'martin'),
        'desc'    => esc_html__('Pull your column left to right.', 'martin'),
        'type'    => 'select',
        'choices' => array(
                'pull-left'   => esc_html__('Pull Left', 'martin'),
                'pull-right'   => esc_html__('Pull Right', 'martin'),
        )
    ),
    'col_background_image' => array(
            'label'   => esc_html__('Background Full Image', 'martin'),
            'desc'    => esc_html__('Please select the background image', 'martin'),
            'type'    => 'upload',
    ),
    'col_background_repeat'              => array(
            'label'   => esc_html__( 'Background Repeat', 'martin' ),
            'type'    => 'short-select',
            'value'   => 'no-repeat',
            'desc'    => esc_html__( 'Select Background size.', 'martin' ),
            'choices' => array(
                    'no-repeat' => 'No Repeat',
                    'repeat' => 'Repeat'
            ),
    ),
    'col_background_size'              => array(
            'label'   => esc_html__( 'Background Size', 'martin' ),
            'type'    => 'short-select',
            'value'   => '',
            'desc'    => esc_html__( 'Select Background size.', 'martin' ),
            'choices' => array(
                    '' => 'Auto',
                    'cover' => 'Cover',
                    '100% 100%' => '100% 100%'
            ),
    ),
    'col_background_position'              => array(
            'label'   => esc_html__( 'Background Position', 'martin' ),
            'type'    => 'short-select',
            'value'   => '',
            'desc'    => esc_html__( 'Select Background Position.', 'martin' ),
            'choices' => array(
                    '' => 'None',
                    'left top' => 'left top',
                    'left center' => 'left center',
                    'left bottom' => 'left bottom',
                    'right top' => 'right top',
                    'right center' => 'right center',
                    'right bottom' => 'right bottom',
                    'center top' => 'center top',
                    'center center' => 'center center',
                    'center bottom' => 'center bottom'
            ),
    ),
    'col_background_attachment'              => array(
            'label'   => esc_html__( 'Background Attachment', 'martin' ),
            'type'    => 'short-select',
            'value'   => 'scroll',
            'desc'    => esc_html__( 'Select Background Attachment.', 'martin' ),
            'choices' => array(
                    'scroll' => 'Scroll',
                    'fixed' => 'Fixed'
            ),
    ),
    'col_is_overlay'                    => array(
            'label'        => esc_html__( 'Is Overlay?', 'martin' ),
            'type'         => 'switch',
            'right-choice' => array(
                    'value' => '1',
                    'label' => esc_html__( 'Yes', 'martin' )
            ),
            'left-choice'  => array(
                    'value' => '2',
                    'label' => esc_html__( 'No', 'martin' )
            ),
            'value'        => '2',
            'desc'         => esc_html__( 'Do you want to show an overlay? Please turn it to Yes.', 'martin' ),
    ),
    'col_overlay_color' => array(
            'label' => esc_html__( 'Overlay RGBA Color', 'martin' ),
            'type'  => 'rgba-color-picker',
            'value' => '',
            'desc'  => esc_html__( 'Select your overlay RGBA color.', 'martin' ),
    ),
    'background_color' => array(
        'label' => esc_html__('Background Color', 'martin'),
        'desc'  => esc_html__('Please select the background color. Default color is white.', 'martin'),
        'type'  => 'color-picker',
        'value' => ''
    ),
    'text_color' => array(
        'label' => esc_html__('Text Color', 'martin'),
        'desc'  => esc_html__('Please select the texxt color. Default color is #272727.', 'martin'),
        'type'  => 'color-picker',
        'value' => ''
    ),
    'col_animation' => array(
        'label'   => esc_html__('Animation', 'martin'),
        'desc'    => esc_html__('Select animation.', 'martin'),
        'type'    => 'select',
        'choices' => array(
                'none'   => esc_html__('None', 'martin'),
                'fadeIn'   => esc_html__('Fade In', 'martin'),
                'fadeInUp'   => esc_html__('Fade In Up', 'martin'),
                'fadeInDown' => esc_html__('Fade In Down', 'martin'),
                'fadeInRight' => esc_html__('Fade In Right', 'martin'),
                'fadeInLeft' => esc_html__('Fade In Left', 'martin'),
                'bounceIn' => esc_html__('Bounce In', 'martin'),
                'bounceInLeft' => esc_html__('Bounce In Left', 'martin'),
                'bounceInRight' => esc_html__('Bounce In Right', 'martin'),
                'bounceInUp' => esc_html__('Bounce In Up', 'martin'),
                'bounceInDown' => esc_html__('Bounce In Down', 'martin'),
                'zoomIn' => esc_html__('Zoom In', 'martin'),
                'zoomInDown' => esc_html__('Zoom In Dwon', 'martin'),
                'zoomInUp' => esc_html__('Zoom In Up', 'martin')
        )
    ),
    'animation_delay' => array(
        'label' => esc_html__('Animation Delay', 'martin'),
        'desc'  => esc_html__('Insert your animation delay. Default Delay amount is 300ms.', 'martin'),
        'type'  => 'text',
    ),
    'text_align'              => array(
            'label'   => esc_html__( 'Title Alignment', 'martin' ),
            'type'    => 'short-select',
            'value'   => 'left',
            'desc'    => esc_html__( 'Select your section title & sub Title alignment.', 'martin' ),
            'choices' => array(
                    'left' => 'Left Align',
                    'center' => 'Center Align',
                    'right' => 'Right Align'
            )
    ),
    
    'padding_top' => array(
        'label' => esc_html__('Padding Top', 'martin'),
        'desc'  => esc_html__('Insert your column padding top. Default Padding 0. Don\'t need to wirite px.', 'martin'),
        'type'  => 'text',
    ),
    'padding_left' => array(
        'label' => esc_html__('Padding Left', 'martin'),
        'desc'  => esc_html__('Insert your column padding left. Default Padding 15px. Don\'t need to wirite px.', 'martin'),
        'type'  => 'text',
    ),
    'padding_right' => array(
        'label' => esc_html__('Padding Right', 'martin'),
        'desc'  => esc_html__('Insert your column padding right. Default Padding 15px. Don\'t need to wirite px.', 'martin'),
        'type'  => 'text',
    ),
    
    'padding_bottom' => array(
        'label' => esc_html__('Padding Bottom', 'martin'),
        'desc'  => esc_html__('Insert your column padding bottom. Default Padding 0. Don\'t need to wirite px.', 'martin'),
        'type'  => 'text',
    ),
    'border_left' => array(
        'label' => esc_html__('Border Left', 'martin'),
        'desc'  => esc_html__('Insert border left if you want. e.g. "1px solid #CCCCCC"', 'martin'),
        'type'  => 'text',
    ),
    'border_top' => array(
        'label' => esc_html__('Border Top', 'martin'),
        'desc'  => esc_html__('Insert border top if you want. e.g. "1px solid #CCCCCC"', 'martin'),
        'type'  => 'text',
    ),
    'border_right' => array(
        'label' => esc_html__('Border Right', 'martin'),
        'desc'  => esc_html__('Insert border right if you want. e.g. "1px solid #CCCCCC"', 'martin'),
        'type'  => 'text',
    ),
    'border_bottom' => array(
        'label' => esc_html__('Border Bottom', 'martin'),
        'desc'  => esc_html__('Insert border bottom if you want. e.g. "1px solid #CCCCCC"', 'martin'),
        'type'  => 'text',
    ),
    'custom_class' => array(
        'label' => esc_html__('Custom Class', 'martin'),
        'desc'  => esc_html__('Insert class for custom css.', 'martin'),
        'type'  => 'text',
    ),
);