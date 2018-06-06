<?php
function webalive_fb_share_count( $post_id ) {
    $default_count = 30;
    $cache_key = 'webalive' . $post_id;
    $access_token = '108065795969606|e20edf232aad3fcd9a9242388a01bbb8';
    $count = get_transient( $cache_key ); // try to get value from Wordpress cache

    // if no value in the cache
    if ( $count === false ) {
        $response = wp_remote_get('https://graph.facebook.com/v2.7/?id=' . urlencode( get_permalink( $post_id ) ) . '&access_token=' . $access_token );
        $body = json_decode( $response['body'] );

        $count = intval( $body->share->share_count );
    }

    if( $count <= $default_count ) {
        return $default_count;
    }else {
        return $count = $count + $default_count;
    }

    return $count;
}