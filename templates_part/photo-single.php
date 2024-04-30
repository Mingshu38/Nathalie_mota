<div class="photo-single" data-id=<?= the_ID(); ?>>
    <img src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php the_title_attribute();?>" class="photo">
    <div class="hover-photo">
        <img src="<?php echo get_template_directory_uri() .'/assets/img/icon_fullscreen.png' ?>" alt="icone fullscreen" class="icon-fullscreen">
        <a href="<?php echo get_permalink() ?>"><img src="<?php echo get_template_directory_uri() .'/assets/img/icon_eye.png' ?>" alt="icone eye" class="icon-eye"></a>
        <h3 class="hover-photo-ref"><?php echo get_field('reference'); ?></h3>
        <h3 class="hover-photo-cat"><?php echo get_the_terms(get_the_ID(), 'categorie') [0] ->name ?></h3>
    </div>
</div>