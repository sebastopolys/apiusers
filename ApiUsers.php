<?php

/**
 * @link              https://sebastopolys.com/
 * @since             0.0.2
 * @package           Api Users
 * Plugin Name:       Api Users
 * Plugin URI:        https://sebastopolys.com/
 * Description:       Get users from provided API and show them on frontend
 * Version:           0.0.2
 * Author:            Sebas Rossi
 * Text Domain:       apiusers
 */

declare(strict_types=1);

namespace ApiUsers;

require 'config.php';

use App\API\ApiUsersInit;
use App\Backend\BackendDashboard;

if (!class_exists(ApiUsersInit::class) 
    && is_readable(__DIR__.'/vendor/autoload.php')) {        
        require_once __DIR__.'/vendor/autoload.php';
}

if (is_admin()) {
    $startBack = new BackendDashboard();
    $startBack->backHooks();
}
$start = new ApiUsersInit();
$start->runIt();
