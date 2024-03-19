<!DOCTYPE html>
<html lang=<?php language_attributes(); ?>> <!-- Définit automatiquement la langue -->
<head>
    <meta charset="<?php bloginfo('charset'); ?>"> <!-- Permet de définir l'encodage du site -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>> <!-- Permet d’obtenir des noms de classe CSS en fonction de la page visitée -->

    <?php wp_body_open(); ?>
        <header class="header">
            <div>
                <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-2.png" alt="Logo" alt="">
            </div>
            <nav>
                <?php
                 // Affichage du menu main déclaré dans function.php
                 wp_nav_menu(array('theme_location' => 'main_menu'));
                 ?>
            </nav>  
        </header>
    
</body>
</html>