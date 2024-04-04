<!DOCTYPE html>
<html lang=<?php language_attributes(); ?>> <!-- Définit automatiquement la langue -->
<head>
    <meta charset="<?php bloginfo('charset'); ?>"> <!-- Permet de définir l'encodage du site -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>> <!-- Permet d’obtenir des noms de classe CSS en fonction de la page visitée -->

<?php wp_body_open(); ?>
    <div class="container">
        <header id="header" class="header">
            <div class="logo">
                <a href="http://nathaliemota.local"><img class="logo-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-2.png" alt="Logo"></a>           
            </div>
            <nav id="nav-menu">
                <?php 
				// Affichage du menu main déclaré dans functions.php
					wp_nav_menu(array(
                        'theme_location' => 'main',
                        'container' =>'ul',  // Pour éviter d'avoir une div autour
                        'menu_class' =>'header-menu'
                    ));
				?> 
                <button class="modal-btn">contact</button>
            </nav>
         
        </header>
        <?php get_template_part('templates_part/hero-header') ?>

