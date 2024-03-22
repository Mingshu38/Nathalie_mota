<!-- Bouton CONTACT -->
<button id="button-contact">CONTACT</button>
<!-- Modale -->
<div id="myModal" class="modal">
    <div class="modal-contact">
        <div class="modal-header">
            <span id="close" class="close">x</span>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/contact-header.png">
        </div>
        <div class="modal-content">
            <?php echo do_shortcode('[contact-form-7 id="2824b31" title="Modale Contact"]'); ?>
        </div>
    </div>
</div>