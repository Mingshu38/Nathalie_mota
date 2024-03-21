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
</footer>
</div>
</body>
</html>