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

class BackendDashboard
{
    /*
    * Initialize with hooks
    */
    public function backHooks()
    {

        add_action('admin_menu', [$this, 'apiusersAdminMenu']);
        add_action('admin_init', [$this, 'apiusersSettingsInit']);
    }

    /*
    * Adds WP dashboard menu & submenu tab
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
    * Add WP API settings on Settings page
    */
    public function apiusersSettingsInit()
    {
        $options = get_option('apiusers_settings');
        if (empty($options)) {
            $options['apiusers_text_field_0'] = 'apiusers';
            $options['apiusers_radio_field_1'] = 'theme';
            $options['apiusers_checkbox_field_2'] = '1';
            update_option('apiusers_settings', $options);
        }

        register_setting('pluginPage', 'apiusers_settings', [$this, 'callbackValidation']);

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
            esc_attr__('Credits', 'apiusers'),
            [$this, 'apiusersCheckboxRender'],
            'pluginPage',
            'apiusers_pluginPage_section'
        );
    }

    /*
    * Prints the WP API settings form
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
        $options = get_option('apiusers_settings');
        ?>
        <input type='text' name='apiusers_settings[apiusers_text_field_0]' 
        value='<?php echo esc_attr($options['apiusers_text_field_0']); ?>'>
        <?php
    }

    /*
    * View field
    */
    public function apiUsersRadioRender()
    {
        $options = get_option('apiusers_settings');
        ?>
        <input id='radiotheme' type='radio' name='apiusers_settings[apiusers_radio_field_1]'
        <?php
        if ( $options['apiusers_radio_field_1'] === 'theme') {
            ?> checked<?php
        }
        ?>
        value='theme'>
        <label for="radiotheme">Theme</label>
        <input id='radioraw' type='radio' name='apiusers_settings[apiusers_radio_field_1]'
        <?php if ( $options['apiusers_radio_field_1'] === 'raw') {
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
        if (!empty(get_option('apiusers_settings'))) {
            $options = get_option('apiusers_settings');
        }
        if (empty(get_option('apiusers_settings'))) {
            $options['apiusers_checkbox_field_2'] = '';
        }
        ?>
        <input type='checkbox' name='apiusers_settings[apiusers_checkbox_field_2]' <?php
        if (isset($options['apiusers_checkbox_field_2'])) {
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
                get_option('apiusers_settings')['apiusers_text_field_0'];
            }
            $output['apiusers_radio_field_1'] = $input['apiusers_radio_field_1'];
            $output['apiusers_checkbox_field_2'] = $input['apiusers_checkbox_field_2'];
            return apply_filters('callbackvalidation', $output, $input);
        }
    }
}
