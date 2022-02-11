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

namespace ApiUsers;

require 'config.php';
require 'vendor/autoload.php';

use App\API\ApiUsersInit;

$start = new ApiUsersInit();
$start->runIt();
