<?php

/**
 * @link              https://sebastopolys.com/
 * @since             0.0.1
 * @package          Api Users
 * Plugin Name:       Api Users
 * Plugin URI:        https://sebastopolys.com/
 * Description:       Get users from provided API and show them on frontend
 * Version:           0.0.1
 * Author:            Sebas Rossi
 * Text Domain:       apiusers
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    die('-1');
}

error_reporting(-1);
require 'vendor/autoload.php';
require 'config.php';

use App\API\includeTemplate;



class Main{

    function runIt(){
 
        $front = new includeTemplate();
        $front->start();
    }
}
$start = new Main();
$start->runIt();











 /********************************************************************
 *                                                                    *
 *                       E N D    M A I N    C L A S S                *  
 *                                                                    *  
 * *******************************************************************/