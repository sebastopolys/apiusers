<?php

declare(strict_types=1);

namespace App\API;

class Prevent404
{
    public function replace404Page()
    {
        add_filter('template_redirect', [$this, 'my404Override']);
    }

    public function my404Override(string $template): string
    {
        global $wp_query;       
        if (ValidateEndpoint::validateTheEndpoint() === true) {
            status_header(200);
            $wp_query->is_404 = false;
        }
        return $template;
    }
}
