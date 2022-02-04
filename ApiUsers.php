<?php

/**
 * @link              https://sebastopolys.com/
 * @since             0.0.1
 * @package          Api Users
 * Plugin Name:       Api Users
 * Plugin URI:        https://sebastopolys.com/
 * Description:       Get users from provided API and show them on frontend
 * Version:           0.0.1
 * Author:            Sebas Rossi
 * Text Domain:       ApiUsers
 */

declare(strict_types=1);

require 'config.php';
require 'vendor/autoload.php';



use App\API\ValidateEndpoint;
use App\API\AJAXApiCall;
use App\API\IncludeTemplate;


class ApiUsers 
{
   
    
    public function runIt()
    {     
        if(ValidateEndpoint::validateTheEndpoint()==true){
            $front = new IncludeTemplate();
            $front->start();
        }
            $loadAjax = new AJAXApiCall();
            $loadAjax->runAjax();
       
    }
 
}

    $start = new ApiUsers();
    $start->runIt();


   





  

          
    

