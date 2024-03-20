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

register_nav_menus( array(
	'main' => 'Menu Principal',
	'footer' => 'Bas de page',
) );

?>