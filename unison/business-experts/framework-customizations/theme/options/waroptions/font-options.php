<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$apikey = 'AIzaSyC5JyW8pRJQP64cyWc-sbpeRNX_uicH7C0';
$google_api_url = 'https://www.googleapis.com/webfonts/v1/webfonts?key='.$apikey;
$response = wp_remote_retrieve_body( wp_remote_get($google_api_url, array('sslverify' => false )));

if( is_wp_error( $response ) ) {
    $gFonts = array();
} else {
    $json_fonts = json_decode($response,  true);
    if(isset($json_fonts['items']))
    {
        $gFonts = $json_fonts['items'];
    }
    else
    {
        $gFonts = array();
    }
}
$myfonts = array();
$myfonts2 = array();
$myfonts3 = array();
$myfonts[''] = 'None of Them';
$myfonts2[''] = 'None of Them';
$myfonts3[''] = 'None of Them';
if(is_array($gFonts)):
    foreach($gFonts as $font)
    {
        $myfonts[$font['family']] = $font['family'];
        $myfonts2[$font['family']] = $font['family'];
        $myfonts3[$font['family']] = $font['family'];
    }
endif;

$options = array(
	'font' => array(
		'title'   => esc_html__( 'Font Settings', 'martin' ),
		'type'    => 'tab',
		'options' => array(
			'font-box' => array(
				'title'   => esc_html__( 'Font Settings', 'martin' ),
				'type'    => 'box',
				'options' => array(
				    'base_font'              => array(
                                            'label'   => esc_html__( 'Base Font', 'martin' ),
                                            'type'    => 'short-select',
                                            'value'   => '',
                                            'desc'    => esc_html__( 'Select your base font. Default font is Lato', 'martin' ),
                                            'choices' => $myfonts
                                    ),
				    'sub_fonts'              => array(
                                            'label'   => esc_html__( 'Secondary Font', 'martin' ),
                                            'type'    => 'short-select',
                                            'value'   => '',
                                            'desc'    => esc_html__( 'Select your Secondary font. Its used for some heading content, subtitle, menu etc. Default font is Roboto Slab.', 'martin' ),
                                            'choices' => $myfonts3
                                    ),
				    'section_fonts'              => array(
                                            'label'   => esc_html__( 'Special Font', 'martin' ),
                                            'type'    => 'short-select',
                                            'value'   => '',
                                            'desc'    => esc_html__( 'Select your special fonts. Default font is Raleway.', 'martin' ),
                                            'choices' => $myfonts2
                                    ),
				)
			),
		)
	)
);