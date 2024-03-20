<?php
// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

// Style personnalisé du thème 
function nathalie_mota_theme_enqueue(){
    wp_enqueue_syle('nathalie-mota', get_stylesheet_uri());
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.css');
    filemtime(get_stylesheet_directory() . '/css/theme.css');
}
add_action('wp_enqueue_scripts','nathalie-mota-theme_enqueue');
// Gestion du menu 

// créer un lien pour la gestion des menus dans l'administration et activation d'un menu pour le header et d'un menu pour le footer.
function register_my_menu(){
    register_nav_menu('main', "Menu principal");
    register_nav_menu('footer', "Menu pied de page");
 }
 add_action('after_setup_theme', 'register_my_menu');

?>