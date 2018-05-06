<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/*options process*/

$options = array(
    'latitude'   => array(
        'label'   => esc_html__('Location Latitude', 'martin'),
        'desc'    => esc_html__('Insert your location latifude.', 'martin'),
        'type'    => 'text'
    ), 
    'longitude'   => array(
        'label'   => esc_html__('Location Longitude', 'martin'),
        'desc'    => esc_html__('Insert your location longitude', 'martin'),
        'type'    => 'text'
    ),
    'markers'   => array(
        'label'   => esc_html__('Map Marker', 'martin'),
        'desc'    => esc_html__('Upload your map marker. Map marker shold be smallar image.', 'martin'),
        'type'  => 'upload',
    ),
    'height' => array(
            'label' => esc_html__('Map Height', 'martin'),
            'desc'  => esc_html__('Insert your map height. Default height is 835px. Don\'t need to insert "px".', 'martin'),
            'type'  => 'text',
            'value' => ''
    ),
    
    
);