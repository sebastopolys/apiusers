<?php

declare(strict_types=1);

namespace App\API;

/**
* Class AJAXApiCall
*
* @package App\API
*
* Called from: ApiUsersInit->runIt()
**/

class AJAXApiCall
{
    public function runAjax()
    {
        add_action('wp_enqueue_scripts', [$this, 'loadScripts']);
        add_action('wp_ajax_nopriv_apiuser_popup', [$this, 'sendContent']);
        add_action('wp_ajax_apiuser_popup', [$this, 'sendContent']);
    }

    /*
    * Loads Ajax JS file and prints localize script
    */
    public function loadScripts()
    {
        wp_register_script('rest-ajax', dirname(plugin_dir_url(__DIR__))
        . '/scripts/script.js', ['jquery'], '1', true);
        wp_enqueue_script('rest-ajax');
        wp_localize_script('rest-ajax', 'api_var', [
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('ajax-nonce'), ]);
    }

    /*
    * Trigger API call class and echoes the response
    */
    public function sendContent()
    {
        if (!empty($_POST['nonce'])) {
            $nonce = sanitize_text_field(wp_unslash($_POST['nonce']));
        }
        if (
            !empty(wp_verify_nonce($nonce, 'ajax-nonce'))
            && isset($_POST['id_post'])
        ) {
            $idPost = sanitize_text_field(wp_unslash($_POST['id_post']));
        }
        $res = new ApiCall();
        $resp = json_decode($res->callApi(intval($idPost)));
        echo '<div><p><a href="#" id="close_popup">x</a></p></div><div><ul>
        <li>Id:' . esc_html($resp->id) . ' </li>
        <li>Name:' . esc_html($resp->name) . ' </li>
        <li>Username:' . esc_html($resp->username) . '</li>
        <li>Email:' . esc_html($resp->email) . '</li>
        <li>Address:' . esc_html($resp->address->suite) . ' - '
        . esc_html($resp->address->street) . ' - ' . esc_html($resp->address->city) . '</li>
        <li>Phone: ' . esc_html($resp->phone) . '</li>
        <li>Website: ' . esc_html($resp->website) . '</li>
        <li>Company: ' . esc_html($resp->company->name) . '</li>
        <ul></div>';
        wp_die();
    }
}
