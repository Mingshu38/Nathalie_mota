<?php get_header(); ?>
<?php get_template_part('templates_part/hero-header') ?>
<main class="main">
<!-- Section filtres de recherche --> 

<!-- Section Publications --> 
<div class="container-home">
    <?php 
        // Publications personnalisées 
        $args_home_posts = array(
            'post_type' => 'photo',  // Type de publication 
            'posts_per_page' => 8, // Nombre de publications affichées par page
            'order_by' => 'date', // Tri par date des publications 
            'order'=> 'DESC', // Tri de la plus récente à la plus ancienne 
        );
        $custom_home_query = new WP_Query($args_home_posts);
        // Boucle pour parcourir les publications personnalisées 
			if($custom_home_query  -> have_posts()) : while ($custom_home_query  -> have_posts()) : $custom_home_query -> the_post();
    ?>
    <div class="home-photo">
		<?php get_template_part('/templates_part/photo-single'); ?>
	</div>
    <?php endwhile ?>
    
    <?php wp_reset_postdata();  // Pour s'assurer que le $post global a été restauré ?> 
    <?php endif ?>

</div>

</main>

<?php get_footer(); ?> 