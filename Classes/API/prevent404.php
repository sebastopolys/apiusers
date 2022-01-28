<?php

namespace App\API;

class prevent404{

    function replace_404_page(){
        add_filter('template_redirect', array($this,'my_404_override' ));
    }


    function my_404_override() {
        global $wp_query;
        $vall= new ValidateEndpoint();
        $vall->validate_the_endpoint();
           if( $vall->_is_endpoint==TRUE){
     
            status_header( 200 );
            $wp_query->is_404=false;
        }

    }
}
