<?php
// Style personnalisé du thème 
function nathalie_mota_theme_enqueue(){
    wp_enqueue_syle('nathalie-mota', get_stylesheet_uri());
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.css');
    filemtime(get_stylesheet_directory() . '/css/theme.css');
}
add_action('wp_enqueue_scripts','nathalie-mota-theme_enqueue');
// Gestion du menu 
// Enregistrement - Menu Principal
function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );

?>