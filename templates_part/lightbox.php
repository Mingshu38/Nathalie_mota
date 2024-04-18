<?php
    $reference = get_field('reference');
    $category = get_the_terms(get_the_ID(), 'categorie');
    $id = get_the_ID();
    $url = get_permalink();
?>

<div class="lightbox">
    <div class="fullscreen-photo">
        <div class="arrow-left">
            <img src="<?php echo get_the_template_directory_uri(); ?> /assets/img/arrow-left.png" alt="flèche précédente ">
        </div>
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="" class="lightbox-photo">
        <div class="arrow-right">
            <img src="<?php echo get_the_template_directory_uri(); ?> /assets/img/arrow-right.png" alt="">
        </div>
        <div>
            <h5 class="lightbox-reference"><?php echo get_field('reference') ?></h5>
            <h5 class="lightbox-category"><?php echo get_the_terms(get_the_ID() , 'categorie')[0]->name  ?></h5>
        </div>
    </div>
    <img src="<?php echo get_template_directory_uri() ?> /assets/img/close.png" alt="" class="close-lightbox">
</div>