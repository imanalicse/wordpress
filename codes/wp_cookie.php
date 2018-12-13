<?php

function wa_setcookie( $name, $value, $expire = 0, $secure = false ) {

    if ( ! headers_sent() ) {
        if(isset($_COOKIE[$name])){
            wa_deletecookie($name);
        }
        if(is_array($value)) {
            $value = http_build_query($value);
        }

        if(empty($expire)) {
            $expire = time() + MONTH_IN_SECONDS;
        }
        setcookie( $name, $value, $expire, COOKIEPATH ? COOKIEPATH : '/', COOKIE_DOMAIN, $secure);
    }else{
        wa_log("{$name} cookie cannot be set: headers already sent by");
    }
}

function wa_getcookie($name){
    if(isset($_COOKIE[$name])) {
        $return_cookie = $_COOKIE[$name];
        $pos = strpos($return_cookie, '=');
        if($pos){
            parse_str($return_cookie, $return_cookie);
        }
        return $return_cookie;
    }else{
        return '';
    }
}

function wa_deletecookie($name){
    if(isset($_COOKIE[$name])){
        unset($_COOKIE[$name]);
        setcookie($name, '', time() - 3600, COOKIEPATH ? COOKIEPATH : '/', COOKIE_DOMAIN);
    }
}