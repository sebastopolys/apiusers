<?php

declare(strict_types=1);

namespace App\Backend;

/**
* Class BackendMenu
*
* @package App\Backend
*
* called from: BackendDashboard.php
**/

class BackendMenu{

    /*
    *
    */
    public function runMenuHook(){
        add_action('admin_menu', [$this, 'apiusersAdminMenu']);
    }

    /*
    * 
    */
    public function apiusersAdminMenu()
    {
        add_menu_page(
            __('Api Users', 'apiusers'),
            __('Api Users', 'apiusers'),
            'manage_options',
            'apiusers',
            [$this, 'apiusersMainCallback']
        );
        add_submenu_page(
            'apiusers',
            'Api Users settings',
            'Settings',
            'manage_options',
            'settings',
            [$this, 'apiusersOptionsPage']
        );
    }

     /*
    * Prints the Welcome page
    */
    public function apiusersMainCallback()
    {
        echo wp_kses_post(file_get_contents(dirname(plugin_dir_path(__DIR__)) . '/Templates/welcomepage.html'));
    }

    /*
    * Prints de backend options form
    */
    public function apiusersOptionsPage()
    {
        ?>
        <form action="options.php" method="post">
        <?php settings_fields('pluginPage');
            do_settings_sections('pluginPage');
            submit_button();
        ?></form><?php
    }
}