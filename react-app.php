<?php
/**
 * Plugin Name: react-app
 * Plugin URI: a url
 * Description: A react application
 * Version: 0.1
 * Text Domain: react-app
 * Author: Fernando
 * Author URI: https://fernandocgomez.com
 */

// First register resources with init 
function react_app_init() {
    $path = "/front-end/build/static";
    if(getenv('WP_ENV')=="development") {
        $path = "/front-end/build/static";
    }
    wp_register_script("react_app_js", plugins_url($path."/js/main.js", __FILE__), array(), "1.0", false);
    wp_register_style("react_app_css", plugins_url($path."/css/main.css", __FILE__), array(), "1.0", "all");
}

add_action( 'init', 'react_app_init' );

// Function for the short code that call React app
function react_app() {
    wp_enqueue_script("react_app_js", '1.0', true);
    wp_enqueue_style("react_app_css");
    return "<div id=\"react_app\"></div>";
}

// add_shortcode( string $tag, callable $callback )
add_shortcode('react_app', 'react_app');