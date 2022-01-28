<?php

namespace App\API;

class includeTemplate{

    function start(){ 
        
        add_filter( 'template_include',array($this, 'get_custom_template') );
        $rey = new prevent404();      
        $rey->replace_404_page();
    }   

    function get_custom_template($template){
       
        $vall= new ValidateEndpoint();
        $vall->validate_the_endpoint();
           if( $vall->_is_endpoint==TRUE){
            $roy = new EndpointTitle();
            $roy->pageTitle();    
            
            $template =PLDIR.'/Templates/ApiUsersTemplate.php';
            return $template;
        }
        else{
            return $template;
        }
     
    }
    
}