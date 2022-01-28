<?php
namespace App\BackOps;
class BackOps{
    function printit()
    {
        add_action('wp_footer', array($this,'printat'));
    
    }
    function printat(){
        echo "PRINT THIS ";
    }
}

/*
*
*    BACKEND OPTIONS
*
    1_ edit endpoint
    2_ Show link 
    3_ display raw
    4_ Pagination
    5_ Color pallettes
    6_ Display Additional data
    7_ Display Additional data on popups
    8_ Show Credits
*
*
*
*
*/