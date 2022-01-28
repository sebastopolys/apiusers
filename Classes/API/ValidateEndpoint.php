<?php
namespace App\API;

class ValidateEndpoint{
    public $_is_endpoint=NULL;
    function validate_the_endpoint(){
        global $wp;
        if(home_url( $wp->request )==get_site_url().'/testapi'){
            if($this->_is_endpoint==NULL)
            $this->_is_endpoint=TRUE;
        }     
        else{
            if($this->_is_endpoint!==NULL)
            $this->_is_endpoint=NULL;
        }      
    return $this->_is_endpoint;
    }
}
