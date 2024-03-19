<?php
// Style personnalisé du thème 
function nathalie_mota_theme_enqueue(){
    wp_enqueue_style('nathalie-mota-style', get_stylesheet_uri(),array(), '1.0');
}
add_action('wp_enqueue_script','nathalie-mota-theme_enqueue');
// Gestion du menu 
function my_menu(){
    register_nav_menu('main_menu',__('Menu principal'));
    register_nav_menu('footer_menu',__('Menu footer'));
}
add_action('init','my_menu');
?>