<?php get_header(); ?>
<?php get_template_part('templates_part/hero-header') ?>
<main class="main">
<!-- Section filtres de recherche --> 
<div class="filters-container">
    <div class="container">
        <div class="filters">
            <div class="category-format">
                <div class="filter">
                    <!-- Filtre Catégorie --> 
                    <label for="category"></label>
                    <select name="category-filter" id="category-filter">
                        <option value="ALL">CATÉGORIE</option>
                        <?php
                        $photo_categories = get_terms('categorie');
                        foreach ($photo_categories as $category) {
                            echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="filter">
                    <!-- Filtre Formats --> 
                    <label for="format"></label>
                    <select name="format-filter" id="format-filter">
                        <option value="ALL">FORMAT</option>
                        <?php
                        $photo_formats = get_terms('format');
                        foreach ($photo_formats as $format) {
                            echo '<option value="' . $format->slug . '">' . $format->name . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="sort">
                <div class="filter">
                    <!-- Filtre Trier par date -->
                    <label for="date-sort"></label>
                    <select name="date-sort" id="date-sort">
                        <option value="DESC"> TRIER PAR </option>
                        <option value="DESC"<?php if($order === "desc"): ?>selected<?php endif;?> >À partir des plus récentes </option>
                        <option value="ASC"<?php if($order === "asc"): ?>selected<?php endif;?> >À partir des plus anciennes </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    
    
    
</div>
<!-- Section Publications --> 
<div class="gallery-container">
    <div class="container">
        <div class="gallery">
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
        <?php get_template_part('/templates_part/photo-single'); ?>
        <?php endwhile ?>
        
        <?php wp_reset_postdata();  // Pour s'assurer que le $post global a été restauré ?> 
        <?php endif ?>


        </div>

    </div>
    
</div>
<div class="button-load">
    <button class="load-more"> Charger plus </button>
</div>



</main>

<?php get_footer(); ?> 