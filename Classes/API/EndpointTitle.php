<?php
namespace App\API;
class EndpointTitle{
     function pageTitle(){
        add_filter( 'document_title_parts', array($this,'wpdocs_theme_name_wp_title'));

    }

    function wpdocs_theme_name_wp_title($title_parts){
     $vall= new ValidateEndpoint();
     $vall->validate_the_endpoint();
        if( $vall->_is_endpoint==TRUE){
            global $wp;     
            $title_parts['title'] = 'Api Users Endpoint';       
            return $title_parts; 
        }
        else{
           
            return $title_parts; 
        }
        
    }
}