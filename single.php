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
</div>

<?php get_footer()?>