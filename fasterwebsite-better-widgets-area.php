<?php
/*
Plugin Name: Better Widgets Area
Plugin URI: https://fasterwebsite.com/
Description: Display widget ID along with widget title in Admin → Widgets area.
Author: Maciej Klepaczewski
Author URI: https://fasterwebsite.com/
Version: 0.1
*/

add_action('widgets_admin_page', function() {
    global $wp_registered_widgets;

    /**
     * Make sure the plugin is displayed only in admin area and during a call to widgets.php
     */
    if(!is_admin()) {
        return;
    }

    $screen = get_current_screen();
    if($screen === null || $screen->id !== 'widgets') {
        return;
    }

    foreach($wp_registered_widgets as &$widget) {
        $widget['name'] .= " (#{$widget['id']})";
    }
});
