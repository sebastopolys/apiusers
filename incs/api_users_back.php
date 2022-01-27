<?php

class main_back{

    public function testhooks(){

        add_action('admin_menu',array($this,'admin_menu'));	

    }
    public function admin_menu(){
        add_menu_page(
            __( TXTDOM, 'smartlink' ),
            __(TXTDOM,'smartlink' ),
            'manage_options','smartlink_admin',
          //  array($this,'smartlink_admin_callback'),
         //   IMGPATH.'/smartlink-dinamic-urls/assets/smartlink-icon.png'
                   );

       	
    }


    public function rest_api(){

        

    }




}
