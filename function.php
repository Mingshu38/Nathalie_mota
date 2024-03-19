<?php
// Style personnalisé du thème 
function nathalie_mota_theme_enqueue(){
    wp_enqueue_style('nathalie-mota-style', get_stylesheet_uri(), '/style.css', array(), '1.0');
    filemtime(get_stylesheet_directory() . '/css/theme.css');
}
add_action('wp_enqueue_scripts','nathalie-mota-theme_enqueue');
// Gestion du menu 
function my_menu_register(){
    register_nav_menu('main_menu',__('Menu principal'));
    register_nav_menu('footer_menu',__('Menu footer'));
}
add_action('init','my_menu_register');
?>