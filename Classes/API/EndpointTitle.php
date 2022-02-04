<?php

declare(strict_types=1);

namespace App\API;

class EndpointTitle
{
    public function pageTitle()
    {
        add_filter('document_title_parts', [$this, 'endPointCallback']);
    }

    public function endPointCallback($titleParts)
    {
       
            global $wp;
            $titleParts['title'] = 'Api Users Endpoint';    
        return $titleParts;
    }
}
