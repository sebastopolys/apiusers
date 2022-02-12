<?php

declare(strict_types=1);

namespace App\API;

class ValidateEndpoint
{
    public static function validateTheEndpoint(): bool
    {
        
        if(empty(get_option('apiusers_settings'))){           
            $options['apiusers_text_field_0'] = 'apiusers';             
        } else {           
            $options = get_option('apiusers_settings');            
        }
        if (
            isset($_SERVER['HTTPS']) === 'on' || isset($_SERVER['HTTPS']) === 1
            || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https'
        ) {
            $protocol = 'https://';
        }
        if (!isset($protocol)) {
            $protocol = 'http://';
        }
        if (!empty($_SERVER['HTTP_HOST']) && !empty($_SERVER['REQUEST_URI'])) {
            $httpHost = sanitize_text_field(wp_unslash($_SERVER['HTTP_HOST']));
            $httpUri = sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI']));
            if (
                $protocol . $httpHost . $httpUri === get_site_url()
                . '/' . $options['apiusers_text_field_0']
            ) {
                    return true;
            }
        }
            return false;
    }
}
