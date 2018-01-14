<?php
/*
Plugin Name: MakeMeSocial
Description: Do you want to set your social networks in an easy way? You came to the right place.
Version: 1.0.0
Author: Alexander Torres
Author URI: http://www.alexandertt.com
*/

require "vendor/autoload.php";

use MakeMeSocial\WidgetCreation\WidgetCreation;

class bootStrap {

    function __construct() {
        
        $widgetCreation = new WidgetCreation();

        // Loading backoffice scripts and styles
        add_action( 'admin_enqueue_scripts', [ $this, 'backofficeScriptsStyles' ] );

        // Loading frontend scripts and styles
        add_action( 'wp_enqueue_scripts', [ $this, 'frontendScriptsStyles' ] );

    }

    /**
     * It loads the scripts and styles for the backoffice
     */
    public function backofficeScriptsStyles() {

        wp_enqueue_style( 'mms_backoffice', makeMeSocialUrl() . 'assets/css/backoffice.css', array(), filemtime(makeMeSocialPath() . 'assets/css/backoffice.css') );
        wp_enqueue_script( 'mms_backoffice', makeMeSocialUrl() . 'assets/js/backoffice.js', array('jquery'), filemtime(makeMeSocialPath() . 'assets/js/backoffice.js'), true );

        // Setting up data for AJAX
        wp_localize_script( 'mms_backoffice', 'MMS', array(

			// URL to wp-admin/admin-ajax.php to process the request
            'ajaxurl' => admin_url( 'admin-ajax.php' ),

            // generate a nonce with a unique ID "myajax-post-comment-nonce"
            // so that you can check it later when an AJAX request is sent
            'security' => wp_create_nonce( 'mms-social' )

        ));
    }

    /**
     * It loads the scripts and styles for the frontend
     */
    public function frontendScriptsStyles() {

        wp_enqueue_style( 'mms_frontend', makeMeSocialUrl() . 'assets/css/frontend.css', array(), filemtime(makeMeSocialPath() . 'assets/css/frontend.css') );

    }

}

$makeMeSocial = new bootStrap();