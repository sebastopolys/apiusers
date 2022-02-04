<?php

namespace App\API;

class prevent404{

    function replace_404_page(){
        add_filter('template_redirect',[$this,'my_404_override'] );
    }


    function my_404_override() {
        global $wp_query;
        $vall= new ValidateEndpoint();
        if( $vall->validateTheEndpoint() == true){
     
            status_header( 200 );
            $wp_query->is_404=false;
        }

    }
}
