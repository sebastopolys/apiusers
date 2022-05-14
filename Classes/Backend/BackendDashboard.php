<?php

declare(strict_types=1);

namespace App\Backend;

/**
* Class BackendDashboard
*
* @package App\Backend
*
* called from: ApiUsers.php
**/

class BackendDashboard extends BackendRender
{
    
    /*
    * Initialize with hooks
    */
    public function backHooks()
    {
        $menu = new BackendMenu();
        $menu->runMenuHook();        
        add_action('admin_init', [$this, 'apiusersSettingsInit']);
    }       
   
    /*
    * Add WP API settings on Settings page
    */
    public function apiusersSettingsInit()
    {     
        register_setting('pluginPage', 'apiusers_settings',[$this,'callbackValidation']);

        add_settings_section(
            'apiusers_pluginPage_section',
            __('Api Users Backend Options', 'apiusers'),
            [$this, 'apiusersSettingsSectionCallback'],
            'pluginPage'
        );

        add_settings_field(
            'apiusers_text_field_0',
            __('Customize Endpoint', 'apiusers'),
            [$this, 'apiusersTextFieldRender'],
            'pluginPage',
            'apiusers_pluginPage_section'
        );

        add_settings_field(
            'apiusers_radio_field_1',
            __('View', 'apiusers'),
            [$this, 'apiUsersRadioRender'],
            'pluginPage',
            'apiusers_pluginPage_section'
        );
        add_settings_field(
            'apiusers_checkbox_field_2',
            esc_attr__('Footer', 'apiusers'),
            [$this, 'apiusersCheckboxRender'],
            'pluginPage',
            'apiusers_pluginPage_section'
        );
        add_settings_field(
            'apiusers_text_field_2',
            esc_attr__('Footer text', 'apiusers'),
            [$this, 'apiusersFooterRender'],
            'pluginPage',
            'apiusers_pluginPage_section'
        );
    }
}
