<!DOCTYPE html>
<html lang=<?php language_attributes(); ?>> <!-- Définit automatiquement la langue -->
<head>
    <meta charset="<?php bloginfo('charset'); ?>"> <!-- Permet de définir l'encodage du site -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>> <!-- Permet d’obtenir des noms de classe CSS en fonction de la page visitée -->

    <?php wp_body_open(); ?>
        <header id="header">
            <div class="logo">
                <a href="http://nathaliemota.local"><img class="logo-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-2.png" alt="Logo"></a>
                <?php 
					// Affichage du menu main déclaré dans functions.php
					wp_nav_menu(array('theme_location' => 'main')); 
				?>             
            </div>
            
        </header>
    
