<?php

get_header(); ?>

<main class="main-page">
	<div class="container-page">
    <?php
    
    while ( have_posts() ) : the_post();

        the_content();

    endwhile; ?>
	</div>
</main>

<?php

get_footer();
?>
