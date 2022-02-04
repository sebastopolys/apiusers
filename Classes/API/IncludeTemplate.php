<?php

namespace App\API;

class IncludeTemplate
{
    public function start()
    {
    
            add_filter('template_include', [$this, 'get_custom_template']);
            add_action('wp_enqueue_scripts', [$this, 'wpdocs_theme_name_scripts']);
            $rey = new prevent404();
            $rey->replace_404_page();
  
       
    }

 

    public function get_custom_template($template)
    {      
            $roy = new EndpointTitle();
            $roy->pageTitle();
            $template = PLDIR . '/Templates/ApiUsersTemplate.php';           
            return $template;   
               
    }

    public function wpdocs_theme_name_scripts()
    {
        wp_register_style('apiusers-style', dirname(plugin_dir_url(__DIR__)) . '/scripts/apiusers-style.css');
        wp_enqueue_style('apiusers-style');
    }
}
