<?php
/**
 * Template Name: Template Post
 */

 get_hheader();
 ?>

 <main class="template-post">
    <?php
    if(have_posts()): // Vérifie si il y a des articles à afficher
        while(have_posts()): // Boucle : tourne tant qu'il y a des articles à afficher
            the_post();
    ?>
    <div>
        <?php the_content(); // Affiche le contenu de l'article ?>
    </div>
    <?php
    endwhile;
    endif; // Fin de la boucle 
    ?>
 </main>
 <?php
 get_footer();