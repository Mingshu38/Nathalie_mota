<footer class="footer">
        <nav class="menu-footer">
		<?php 
			// Affichage du menu footer déclaré dans functions.php
			wp_nav_menu(array(
				'theme_location' => 'footer',
				'container' =>'ul',  // Pour éviter d'avoir une div autour
                'menu_class' =>'footer-menu'
			)); 
		?>
		<p class="droits-reserves">Tous droits réservés</p>
		</nav>

		<!-- Insertion de la modale de contact -->
		<div class="modal">
			<div class="modal-overlay"></div>
			<div class="modal-container">
				<span id="close" class="close">x</span>
                	<img src="<?php echo get_template_directory_uri(); ?>/assets/img/contact-header.png">
                	<?php echo do_shortcode('[contact-form-7 id="2824b31" title="Modale Contact"]'); ?>
				</div>
			</div>
</footer>
</div>
</body>
</html>