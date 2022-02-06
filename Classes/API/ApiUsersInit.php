<?php

declare(strict_types=1);

namespace App\API;

class ApiUsersInit
{
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
