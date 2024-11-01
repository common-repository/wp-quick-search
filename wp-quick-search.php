<?php
/**
 * Plugin Name: WP Quick Search
 * Plugin URI: http://learn24bd.com/portfolio/wp-quick-search
 * Description: WP Quick Search is lightweight angular js base searching plugins. You can use this plugins for you site for live and extremely fast search.
 * Version: 1.0
 * Author: Harun
 * Author URI: http://learn24bd.com
 * License:GPL2
 */


include 'inc/shortcode.php';
include 'wqs-api-search.php';

define('WQS_API_URL',site_url().'/wqs-api');
/// Register Script
function wqs_load_scripts()
{
    wp_enqueue_script('jquery');
    wp_register_style('wqs_style', plugins_url('css/style.css', __FILE__));
    wp_register_script('wqs_angular', plugins_url('js/angular.min.js', __FILE__));
    wp_register_script('wqs_angular_animate', plugins_url('js/angular-animate.min.js', __FILE__));
    wp_register_script('wqs_label_better', plugins_url('js/jquery.label_better.min.js', __FILE__));
    wp_register_script('wqs_functions', plugins_url('js/functions.js', __FILE__));

    wp_enqueue_style('wqs_style');
    wp_enqueue_script('wqs_angular');
    wp_enqueue_script('wqs_angular_animate');
    wp_enqueue_script('wqs_label_better');
    wp_enqueue_script('wqs_functions');
}
// Hook into the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'wqs_load_scripts');





