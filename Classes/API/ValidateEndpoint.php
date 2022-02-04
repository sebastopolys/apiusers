<?php

declare(strict_types=1);

namespace App\API;

class ValidateEndpoint
{
    public function validateTheEndpoint()
    {
        if (isset($_SERVER['HTTPS']) &&
        ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
        isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
        $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
        $protocol = 'https://';
        } else {
        $protocol = 'http://';
        }
      
       
        if( $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']==get_site_url() . '/testapi')
        {
                return true;
        }
    }
}
