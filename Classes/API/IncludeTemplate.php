<?php

declare(strict_types=1);

namespace App\API;

class IncludeTemplate
{
    public function start()
    {
            add_filter('template_include', [$this, 'loadTemplate']);
            add_action('wp_enqueue_scripts', [$this, 'includeCSSScript']);
            $rey = new Prevent404();
            $rey->replace404Page();
    }

    public function loadTemplate(string $template): string
    {
            $roy = new EndpointTitle();
            $roy->pageTitle();
            $template = PLDIR . '/Templates/ApiUsersTemplate.php';
            return $template;
    }

    public function includeCSSScript()
    {
        wp_register_style('apiusers-style', dirname(plugin_dir_url(__DIR__))
        . '/scripts/apiusers-style.css', [], '1.0');
        wp_enqueue_style('apiusers-style');
    }
}
