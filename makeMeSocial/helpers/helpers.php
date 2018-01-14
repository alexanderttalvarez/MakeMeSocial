<?php

/**
 * @return string The plugin path
 */
function makeMeSocialPath() {
    return plugin_dir_path( __DIR__ );
}

/**
 * @return string The plugin url
 */
function makeMeSocialUrl() {
    return plugin_dir_url( __DIR__ );
}

/**
 * @param string the subfolder and the image name
 * @return string The image url
 */
function mms_get_image( $asset_url ) {
    return makeMeSocialUrl() . "assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . $asset_url;
}

/**
 * It loads a component, and allows us to send parameters in an array
 * 
 * @param $component - Folder where it's possible to find the component and the php file without extension. For example "IconsList/IconsList".
 * @param $componentType - Either "backoffice" or "frontend". Default "frontend"
 * @param $params (optional) - An array with the params we want to send to this component. The array keys will be used for creating a variable with that name inside the component.
 */
function mms_get_component( $component, $componentType = 'frontend', $params = [] ) {
    // We extract all the params in the array to variables for easily handling them
    extract( $params ); 

    // We load the component
    include( makeMeSocialPath() . "resources" . DIRECTORY_SEPARATOR . "components" . DIRECTORY_SEPARATOR . $componentType . DIRECTORY_SEPARATOR . $component . ".php" );
}