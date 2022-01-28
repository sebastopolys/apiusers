<?php
namespace App\API;
class ApiCall 
{
   public $response = NULL;

    function apiCall()
    {  
    
       $api_endpoint = 'https://jsonplaceholder.typicode.com/users';     
       $headers = [
          'Content-type: application/json',        
          'X-CMC_PRO_API_KEY: '.$api_endpoint
        ];     
        $curl = curl_init(); 
        $options = array(CURLOPT_URL => $api_endpoint,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_RETURNTRANSFER => 1
                );        
        curl_setopt_array($curl, $options);           
        $resp = curl_exec($curl);      
        curl_close($curl);       
        if($this->response==NULL){
          $this->response = $resp;
          return $this->response;
        } 
      
        
    }
}
