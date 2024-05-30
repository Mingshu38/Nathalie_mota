<?php 
$argsHero = array(
    'post_type' => 'photo',
    'posts_per_page' => 1,
    'orderby' =>'rand',
);

$myQuery = new WP_Query($argsHero);
if($myQuery->have_posts()) :
    while($myQuery->have_posts()): $myQuery->the_post(); ?>
    <div class="hero-header">
        <img src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php the_title_attribute();?>" class="hero-image">
        <h1>Photographe Event </h1>
    </div>
    <?php 
        endwhile;
    endif;
    wp_reset_postdata();
    ?>