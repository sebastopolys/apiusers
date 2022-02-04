<?php

declare(strict_types=1);

namespace App\API;

class AJAXApiCall
{
    public function runAjax()
    {
        add_action('wp_enqueue_scripts', [$this, 'loadScripts']);
        add_action('wp_ajax_nopriv_dcms_ajax_readmore', [$this, 'sendContent']);
        add_action('wp_ajax_dcms_ajax_readmore', [$this, 'sendContent']);
      
        
    }

    public function loadScripts()
    {
        wp_register_script('rest-ajax', dirname(plugin_dir_url(__DIR__))
        . '/scripts/script.js', ['jquery'], '1', true);
        wp_enqueue_script('rest-ajax');
        wp_localize_script('rest-ajax', 'dcms_vars', ['ajaxurl' => admin_url('admin-ajax.php')]);
    }

    public function sendContent()
    {
        if (isset($_POST['id_post'])) {
            $idPost = absint($_POST['id_post']);
        }
        $res = new ApiCall();
        $resp = json_decode($res->callApi($idPost));
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
