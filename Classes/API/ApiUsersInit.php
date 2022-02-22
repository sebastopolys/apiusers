<?php

declare(strict_types=1);

namespace App\API;

/**
* Class ApiUsersInit
*
* @package App\API
*
* Called from: ApiUsers.php
**/

class ApiUsersInit
{
    /*
    * Includes template and loads Ajax if endpoint validation is true
    */
    public function runIt()
    {
        if (ValidateEndpoint::validateTheEndpoint() === true) {
            $front = new IncludeTemplate();
            $front->start();
        }
            $loadAjax = new AJAXApiCall();
            $loadAjax->runAjax();
    }
}
