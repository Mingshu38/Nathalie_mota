<div class="lightbox">
    <div class="lightbox-content">
        <img src="" alt="" class="lightbox-image">
        <div class="lightbox-elements">
            <p class="lightbox-category"><?php echo get_the_term_list(get_the_ID(), 'categorie'); ?></p>
            <p class="lightbox-reference"><?php echo get_field('reference', get_the_ID()); ?></p>
        </div>
    </div>
    <div class="navigations">
        <span class="prev-span">
            <img src="<?php get_the_template_directory_uri() .'/assets/img/left-arrow.png' ?>" alt="flèche image précédente" class="lightbox-previous">
            Précédente
        </span>
        <span class="next-span">
            <img src="<?php get_the_template_directory_uri() .'/assets/img/right-arrow.png' ?>" alt="Flèche image suivante" class="lightbox-next">
            Suivante
        </span>
    </div>
</div>