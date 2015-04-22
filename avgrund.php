<?php
/*
Plugin Name: Avgrund
Version: 0.1
Description: A wrapper around the Avgrund jQuery plugin
Author: Jack Henahan
Author URI: https://github.com/jhenahan
Plugin URI: https://github.com/avgrund-wp
Text Domain: avgrund
Domain Path: /languages
*/


function Avgrund( $atts, $content )
{
    static $id = 0;

    $attrs = shortcode_atts(
        array(
            'text' => 'Put content here',
            'width' => 380,
            'height' => 280,
            'showClose' => 'false',
            'showCloseText' => '',
            'closeByEscape' => 'true',
            'closeByDocument' => 'true',
            'holderClass' => '',
            'overlayClass' => '',
            'enableStackAnimation' => 'false',
            'onBlurContainer' => '',
            'openOnEvent' => 'true',
            'setEvent' => 'click',
            'onLoad' => '',
            'onUnload' => '',
            'template' => $content ), $atts
    );

    $id++;

    $display_text = $attrs[ 'text' ];

    $json_params = wp_json_encode( $attrs );
    $output      = <<<OUTPUT
<div class="avgrund"
     id="avgrund-{$id}"
     data-avgrund='{$json_params}'>
     {$display_text}
    </div>
OUTPUT;

    wp_localize_script( 'avgrund-wp', 'avgrundParams', $params );

    return $output;
}

add_shortcode( 'avgrund', 'Avgrund' );

function AvgrundScripts()
{
    wp_enqueue_script( 'jquery' );
    wp_enqueue_style(
        'avgrund-css', plugin_dir_url( __FILE__ ) . 'css/avgrund.css'
    );
    wp_enqueue_script(
        'avgrund', plugin_dir_url( __FILE__ ) . 'js/jquery.avgrund.js',
        array( 'jquery' ), '', TRUE
    );
    wp_enqueue_script(
        'avgrund-wp', plugin_dir_url( __FILE__ ) . 'js/avgrund-wp.js', array(
        'jquery',
        'avgrund' ), '', TRUE
    );
}

add_action( 'wp_enqueue_scripts', 'AvgrundScripts' );