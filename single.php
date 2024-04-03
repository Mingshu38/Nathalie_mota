<?php
/**
 * Template Name: Single Photo
 * Template Post Type: post, page, product
 */

get_header() ?>
<!-- Variable pour le détail des photos --> 
<?php 
	$refPhoto = get_field("reference"); // retourne la valeur de champ
	$post = get_the_ID(); //  Récupère l'ID de l'élément dans la boucle Wordpress
	$category = get_the_terms( $post, "categorie"); // Récupère les termes de la taxonomie qui sont attachés au poste
	$categoryPhoto = $category [0]-> name; // Appelle le nom de catégorie
	$typePhoto = get_field ("type");
	$format = get_the_terms ($post , "format");
	$formatPhoto = $format [0]-> name;
	$datePhoto = get_the_date("Y"); // Récupère l'année du poste
	$url = get_permalink();
// Variables flèches précédente et suivante 
	$nextPost = get_next_post();
	$previousPost = get_previous_post();
// Variable pour récupérer l'ID 
	$id = get_the_ID();	

?>
<div class="single-page">
	<div class="single">
		<div class="detail">
			<div class="details-photos">
				<h2><?php echo the_title() ?></h2>
				<p class="detail-photo">Référence : <span><?php echo $refPhoto ?></span></p>
				<p class="detail-photo">Catégorie : <span><?php echo $categoryPhoto ?></span></p>
				<p class="detail-photo">Format : <span><?php echo $formatPhoto ?></span></p>
				<p class="detail-photo">Type : <span><?php echo $typePhoto ?></span></p>
				<p class="detail-photo">Année : <span><?php echo $datePhoto ?></span></p>
			</div>
		</div>
		<div class="single-photo">
			<img class="picture" src="<?php echo get_the_post_thumbnail_url(); ?>"alt="photo" >
		</div>
	
	</div>
	<div class="contact-single">
		<div class="contact-button">
			<p>Cette photo vous intéresse ?</p>
			<button class="button-single btn-contact" data-reference="<?= $refPhoto ?>">Contact</button>
		</div>
		<!-- Mini slider sélection des images --> 
		<div class="mini-slider">
			<?php 
			// Pour récupérer les publications de type "photo"
			$args = array(
				'post_type' => 'photo', // poste de type photo
				'posts_per_page' => -1, // Pour voir tous les posts
				'order' => 'ASC', // En ordre croissant 
			);
			?>
			<div class="arrows">

			<div class="thumbnail"></div>

			<?php if($previousPost): ?>				
				<a href="<?= get_permalink($previousPost -> ID); ?>" class="previous-thumbnail-link" data-image="<?= get_the_post_thumbnail_url($previousPost->ID, 'thumbnail'); ?>">
					<img class="arrow" src="<?= get_template_directory_uri() .'/assets/img/arrow-left.png';?>" alt="image flèche précédante">
				</a>
			<?php endif; ?>
			<?php if($nextPost): ?>
				<a href="<?= get_permalink($nextPost ->ID)?>" class="next-thumbnail-link"  data-image="<?= get_the_post_thumbnail_url($nextPost->ID, 'thumbnail'); ?>">
					<img class="arrow" src="<?php echo get_template_directory_uri() .'/assets/img/arrow-right.png';?>" alt="image flèche suivante">
				</a>
			
			<?php endif; ?>
				
			</div>			
		</div>
	</div>
	<!-- Section Photos apparentées -->
	<div class="related-photos">
		<h3>Vous aimerez aussi</h3>
		<div class="photo-container">
			<?php 
			// Récupération de la catégorie du single post 
			foreach(get_the_terms(get_the_ID(), 'categorie') as $category){
				$postCategory = $category ->name; // Nom de la taxonomie du poste actuel 
			}
			// Récupère 2 photos de manière aléatoire de même catégorie que la photo actuelle 
			$relatedPhoto= array(
				'post_type' => 'photo',
				'posts_per_page' => 2,
				'orderby' =>'rand', // par ordre aléatoire 
				'post__not_in' =>array($id), // pour ne pas afficher la photo actuelle
				'tax_query' => array(   // Utilise les paramètres de taxonomie
				array(
					'taxonomy' => 'categorie', // Nom de la taxonomie
					'field' => 'slug', // Qu'on récupère par son Slug
					'terms' => $postCategory,
				),
				),
			);
			$my_query = new WP_Query($relatedPhoto);
			if($my_query -> have_posts()) : while ($my_query -> have_posts()) : $my_query -> the_post();
			?>
			<div class="container-photo">
				<?php get_template_part('/templates_part/photo-single'); ?>
			</div>
			<?php endwhile;
			else : 
				echo "Aucune autre photo dans cette catégorie ";
			
			endif;

			wp_reset_postdata(); // Pour s'assurer que le $post global a été restauré 
			
			?>
		</div>

	</div>
</div>

<?php get_footer()?>