<?php

declare(strict_types=1);

namespace App\Backend;

/**
* Class BackendOptions
*
* @package App\Backend
*
* called from: BackendDashboard.php
**/

class BackendOptions
{

    public $option = null;

    public function __construct(){
        if($this->option == null):
            $this->option = get_option('apiusers_settings');
        endif;
        return $this->option;
    }
}