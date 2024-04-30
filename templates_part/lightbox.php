<?php
    $reference = get_field('reference');
    $category = get_the_terms(get_the_ID(), 'categorie');
    $id = get_the_ID();
    $url = get_permalink();
?>

<div class="lightbox">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/close.png" alt="" class="close-lightbox">
    <div class="arrow-left lightbox-arrow">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-left.png" alt="flèche précédente ">
    </div>
    <div class="arrow-right lightbox-arrow">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-right.png" alt="">
    </div>        
    <div class="fullscreen-photo">        
        <div class="lightbox-container">            
            <div class="lightbox-content">
                <!-- Dynamic content here! -->
            </div>
        </div>
    </div>
</div>