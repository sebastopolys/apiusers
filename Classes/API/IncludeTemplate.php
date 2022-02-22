<?php

declare(strict_types=1);

namespace App\API;

/**
* Class IncludeTemplate
*
* @package App\API
*
* called from: apiUsersInit->runIt()
**/

class IncludeTemplate
{
    /*
    * hooks for printing custom template and load CSS
    * Runs prevent404 class
    */

    public function start()
    {
            add_filter('template_include', [$this, 'loadTemplate']);
            add_action('wp_enqueue_scripts', [$this, 'includeCSSScript']);
            $rey = new Prevent404();
            $rey->replace404Page();
    }

    /*
    * Edit page browser title loads custom template from path
    */

    public function loadTemplate(string $template): string
    {
            $roy = new EndpointTitle();
            $roy->pageTitle();
            $template = PLDIR . '/Templates/ApiUsersTemplate.php';
            return $template;
    }

    /*
    * Enqueue CSS file to be applied on users table
    */
    public function includeCSSScript()
    {
        wp_register_style('apiusers-style', dirname(plugin_dir_url(__DIR__))
        . '/scripts/apiusers-style.css', [], '1.0');
        wp_enqueue_style('apiusers-style');
    }
}
