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

?>

<div class="single">
	<div class="detail">
		<h2><?php echo the_title() ?></h2>
		<p class="detail-photo">Référence : <span><?php echo $refPhoto ?></span></p>
		<p class="detail-photo">Catégorie : <span><?php echo $categoryPhoto ?></span></p>
		<p class="detail-photo">Format : <span><?php echo $formatPhoto ?></span></p>
		<p class="detail-photo">Type : <span><?php echo $typePhoto ?></span></p>
		<p class="detail-photo">Année : <span><?php echo $datePhoto ?></span></p>
	</div>
	<div class="single-photo">
		<img class="picture" src="<?php echo get_the_post_thumbnail_url(); ?>"alt="photo" >
	</div>
	<div class="contact-single">
		<p>Cette photo vous intéresse ?</p>
		<button class="button-single">Contact</button>
	</div>
</div>


<?php get_footer(); ?>
