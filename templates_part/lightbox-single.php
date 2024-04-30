<?php $id = $args['id']; ?>

<div class="lightbox-single">
    <img src="<?php echo get_the_post_thumbnail_url($id, 'full'); ?>" alt="" class="lightbox-photo">
    <div class="photo-infos">
        <h5 class="lightbox-reference"><?php echo get_field('reference', $id) ?></h5>
        <h5 class="lightbox-category"><?php echo get_the_terms($id, 'categorie')[0]->name  ?></h5>
    </div>
</div>