<!-- Modale -->
<button id="myBtn">Open Modal</button>
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">x</span>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/contact-header.png">
        <?php echo do_shortcode('[contact-form-7 id="2824b31" title="Contact form 1"]'); ?>
    </div>

</div>