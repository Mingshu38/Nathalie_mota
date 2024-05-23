<?php

// Script et style personnalisé du thème 
function nathalie_mota_theme_enqueue(){
    wp_enqueue_style('nathalie-mota', get_stylesheet_uri());
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('responsive-style', get_template_directory_uri() . '/assets/css/responsive.css');
    wp_enqueue_style('fonts-style', get_template_directory_uri() . '/assets/css/font-face.css');
    wp_enqueue_style('lightbox-style', get_template_directory_uri() . '/assets/css/lightbox.css');
    wp_enqueue_script('script' , get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, true );
    wp_localize_script('script', 'data', ['ajax_url' => admin_url( 'admin-ajax.php' )]);
}
add_action('wp_enqueue_scripts','nathalie_mota_theme_enqueue');

// Gestion du menu 

// créer un lien pour la gestion des menus dans l'administration et activation d'un menu pour le header et d'un menu pour le footer.
function register_my_menu(){
    register_nav_menu('main', "Menu principal");
    register_nav_menu('footer', "Menu pied de page");
 }
 add_action('after_setup_theme', 'register_my_menu');

/** Requêtes AJAX */
/** Pagination infinie des photos  */
function load_photos(){
    $category = [];
    $format = [];
    $taxQuery = [];   
    $page = (isset($_GET['page']) && $_GET['page'] !== 'null') ? $_GET['page'] : 1; 
    $sort = (isset($_GET['sort']) && $_GET['sort'] !== 'null') ? $_GET['sort'] : 'DESC'; 
    // La fonction isset()vérifie la variable catégorie dans l'URL , si la variable existe dans l'URL $_GET prend la valeur de la variable 
    if(isset($_GET['category']) && $_GET['category'] !== 'null' && $_GET['category'] !== 'ALL'){
        $category = array(
            'taxonomy' => 'categorie', // Nom de la taxonomie
            'field' => 'slug', // Qu'on récupère par son Slug
            'terms' => $_GET['category']
        );
        // Retourne les éléments 
        array_push($taxQuery, $category);
    }

    if(isset($_GET['format']) && $_GET['format'] !== 'null' && $_GET['format'] !== 'ALL'){
        $format = array(
            'taxonomy' => 'format', // Nom de la taxonomie
            'field' => 'slug', // Qu'on récupère par son Slug
            'terms' => $_GET['format'],
        );
        array_push($taxQuery, $format);
    }
    
    $query = new WP_Query([
        'post_type' => 'photo', // Sélectionne le type de post
        'posts_per_page' => 8, // Nombre de post à afficher par page
        'order' => $sort, // par ordre aléatoire 
        "paged" => intval($page),
        'tax_query' => $taxQuery,
    ]);

    // Verifie si il y a des publications disponibles 
    if($query  -> have_posts()){
        while ($query  -> have_posts()) {
            $query -> the_post();            
            echo get_template_part('/templates_part/photo-single');
        }
    }
}

add_action( 'wp_ajax_load_photos', 'load_photos' );
add_action( 'wp_ajax_nopriv_load_photos', 'load_photos' );

function load_lightbox(){
    $ids = $_GET['ids'] ? explode(',', $_GET['ids']) : [];
    foreach($ids as $id){
        echo get_template_part('/templates_part/lightbox-single', null, ['id' => $id]);
    }
};

add_action('wp_ajax_load_lightbox' , 'load_lightbox');
add_action('wp_ajax_nopriv_load_lightbox' , 'load_lightbox');



?>