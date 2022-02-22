<?php

declare(strict_types=1);

namespace App\API;

/*
* Class EndpointTitle
*
* @package App\API
*
* called from: IncludeTemplate->loadTemplate()
*/

class EndpointTitle
{
    /*
    * Edits the page Title of browser for default one: 'Api Users Endpoint'
    */
    public function pageTitle()
    {
        add_filter('document_title_parts', [$this, 'endPointCallback']);
    }

    public function endPointCallback(array $titleParts): array
    {
        $titleParts['title'] = 'Api Users Endpoint';
        return $titleParts;
    }
}
