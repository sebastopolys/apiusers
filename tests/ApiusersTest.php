<?php

use App\API\ValidateEndpoint;
use App\API\ApiCall;
use App\API\AJAXApiCall;
use App\Backend\BackendDashboard;

class ApiusersTest extends WP_UnitTestCase
{

   

    function test_validate_class(){
    /* 
    *  TEsts the default endpoint url is true
    */
        $this->go_to( '/apiusers' );    
        $this->assertTrue(ValidateEndpoint::validateTheEndpoint());


    }

    /*
    * Tests that ApiCall class returns a json string fro a given user id (2)
    */

    function test_ApiCall_class_user(){
        $userApi = new ApiCall();
        $result = $userApi->callApi(2);
        $this->assertIsString($result);
    }

     /*
    * Tests that ApiCall class returns a json string for all users (NULL)
    */

    function test_ApiCall_class_users(){
        $userApi = new ApiCall();
        $result = $userApi->callApi(NULL);
        $this->assertIsString($result);
    }
    
   /* function test_backenddashboard_class(){
       // $backend = new BackendDashboard();
       // $result = $backend->callbackvalidation();
       // $this->assertIsArray($result);

    }*/

    function test_backendoptions(){
        $backend = new BackendDashboard();
        $backend->apiusersSettingsInit();
        $this->assertTrue($options);
    }


}