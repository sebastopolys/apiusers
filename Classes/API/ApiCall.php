<?php

declare(strict_types=1);

namespace App\API;

/**
* Class ApiCall
*
* @package App\API
*
* Called from: AJAXApiCall->sendContent()
**/

class ApiCall
{
    /*
    * API request to the provided URL: $apiEndpoint
    *
    * Returns Api response: $resp
    */
    public function callApi(?int $id): string
    {
        $apiEndpoint = 'https://jsonplaceholder.typicode.com/users/' . $id;
        $headers = [
          'Content-type: application/json',
          'X-CMC_PRO_API_KEY: ' . $apiEndpoint,
        ];
        $curl = curl_init();
        $options = [CURLOPT_URL => $apiEndpoint,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_RETURNTRANSFER => 1, ];
        curl_setopt_array($curl, $options);
        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }
}
