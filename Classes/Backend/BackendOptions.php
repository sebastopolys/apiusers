<?php

declare(strict_types=1);

namespace App\Backend;

/**
* Class BackendOptions
*
* @package App\Backend
*
* called from: BackendRender.php | ValidateEndpoint.php
**/

class BackendOptions
{

    public $option = null;

    public function __construct(){
        if($this->option == null) {
            $this->option = get_option('apiusers_settings');           
            if (empty($this->option)) {
                $this->option['apiusers_text_field_0'] = 'apiusers';
                $this->option['apiusers_radio_field_1'] = 'theme';
                $this->option['apiusers_checkbox_field_2'] = '1';
                update_option('apiusers_settings', $this->option);
            }
        }
        return $this->option;
    }
}
