<?php

/**
 * This class is the responsible for the creation of the widget front-end and back-end
 */

namespace MakeMeSocial\WidgetCreation;
 
class WidgetCreation extends \WP_Widget {

    function __construct() {

        add_action( 'widgets_init', [ $this, 'mms_load_widget' ] );

        parent::__construct(
        
            // Base ID of your widget
            'mms_widget',
            
            // Widget name will appear in UI
            __('MakeMeSocial', 'mms'),
            
            // Widget description
            array( 'description' => __( 'Add here all your Social Networks', 'mms' ), )

        );

        // AJAX Handlers backend
		add_action( 'wp_ajax_addSocialNetwork', [ $this, 'addSocialNetwork' ] );
		add_action( 'wp_ajax_nopriv_addSocialNetwork', [ $this, 'addSocialNetwork' ] );

    }

    // Register and load the widget
    function mms_load_widget() {
        register_widget( new WidgetCreation );
    }
        
    // Creating widget front-end 
    public function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', $instance['title'] );
        
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
      
        // Printing Social Networks
        if( !empty( $instance['social_networks'] ) ) {
            mms_get_component( 'IconsList/IconsList', 'frontend', [
                'social_networks' => $instance['social_networks']
            ]);
        }
        
        echo $args['after_widget'];

    }
            
    // Widget Backend 
    public function form( $instance ) {

        if ( isset( $instance['title'] ) ) {
            $title = $instance['title'];
        }
        else {
            $title = __( 'My Social Networks', 'mms' );
        }

        $social_networks = [];
        if( isset( $instance['social_networks'] ) ) {
            $social_networks = $instance['social_networks'];
        }

        // Widget admin form
        mms_get_component( "WidgetOptions/WidgetOptions", "backoffice", [
            'title_field_id'   => $this->get_field_id( 'title' ),
            'title_field_name' => $this->get_field_name( 'title' ),
            'title_value'      => $title,
            'sn_field_id'      => $this->get_field_id( 'social_networks' ),
            'sn_field_name'    => $this->get_field_name( 'social_networks' ),
            'sn_values'        => $social_networks
        ] );

    }
        
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['social_networks'] = ( ! empty( $new_instance['social_networks'] ) ) ? $new_instance['social_networks'] : [];
        return $instance;
    }

    public function addSocialNetwork() {
        check_ajax_referer( 'mms-social', 'security' );

        mms_get_component( "WidgetOptions/SocialNetworkTableRow", "backoffice", [
            'sn_field_name' => $_POST['sn_field_name'],
            'sn_field_id'   => $_POST['sn_field_id'],
            'sn_value'      => null,
            'array_number'  => $_POST['last_index']
        ] );

        die();
    }

}