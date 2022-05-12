<?php

declare(strict_types=1);

namespace App\Backend;

/**
* Class BackendRender
*
* @package App\Backend
*
* extended from: BackendDashboard.php
**/

class BackendRender{

    private $option = null;

    /*
    *  Get backend options
    */
    private function backOps(){
        if($this->option == null){
            $obj = new BackendOptions();
            $this->option = $obj->option;
        }
        return $this->option;
    }

     /*
    * Adds sub title to settings Section
    */
    public function apiusersSettingsSectionCallback()
    {
        echo wp_kses_post('<p class="warn-message"><i>
        *Some options might not work properly with untested themes</i></p>');
    }

    /*
    * Custom endpoint field
    */
    public function apiusersTextFieldRender()
    {   
        ?>
        <input type='text' name='apiusers_settings[apiusers_text_field_0]' 
        value='<?php echo esc_attr($this->backOps()['apiusers_text_field_0']); ?>'>
        <?php
    }

    /*
    * View field
    */
    public function apiUsersRadioRender()
    {         
        ?>
        <input id='radiotheme' type='radio' name='apiusers_settings[apiusers_radio_field_1]'
        <?php
        if ( $this->backOps()['apiusers_radio_field_1'] === 'theme') {
            ?> checked<?php
        }
        ?>
        value='theme'>
        <label for="radiotheme">Theme</label>
        <input id='radioraw' type='radio' name='apiusers_settings[apiusers_radio_field_1]'
        <?php if ( $this->backOps()['apiusers_radio_field_1'] === 'raw') {
            ?> checked<?php
        }
        ?>
        value='raw'>
        <label for='radioraw'>Raw</label>
        <?php
    }

    /*
    * Credits field
    */
    public function apiusersCheckboxRender()
    {
        if (empty($this->backOps())) {
            $this->backOps()['apiusers_checkbox_field_2'] = '';
        }
        ?>
        <input type='checkbox' name='apiusers_settings[apiusers_checkbox_field_2]' <?php
        if (isset($this->backOps()['apiusers_checkbox_field_2'])) {
            ?>checked  <?php
        } ?>value = "1" 
        >
        <?php
    }

     /*
    * Custom Endpoint string REGEX validation
    */
    public function callbackvalidation(array $input): array
    {
        $output = [];
        if (isset($input['apiusers_text_field_0'])) {
            $output['apiusers_text_field_0'] =
            preg_replace('/\s+/', '_', $input['apiusers_text_field_0']);
            $output['apiusers_text_field_0'] =
            preg_replace('/[^_A-Za-z0-9]/ ', '', $output['apiusers_text_field_0']);
            if ($output['apiusers_text_field_0'] === '') {
                $output['apiusers_text_field_0'] =
                $this->backOps()['apiusers_text_field_0'];
            }
            $output['apiusers_radio_field_1'] = $input['apiusers_radio_field_1'];
            $output['apiusers_checkbox_field_2'] = $input['apiusers_checkbox_field_2'];
            return apply_filters('callbackvalidation', $output, $input);
        }
    }
}
