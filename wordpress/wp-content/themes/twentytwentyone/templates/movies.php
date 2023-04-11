<?php

/**
 * Template Name: Movies
 * Template Post Type: post
 */

$movies = query_posts([
	'post_type' => 'movies',
	'orderby' => ['title' => 'ASC'],
	'posts_per_page' => -1
]);

get_header(); ?>
<main class="movie__content">
	<h1><?= the_title() ?></h1>
	<?php foreach ($movies as $movie):
		$movieFields = get_fields($movie->ID);
		$movieTaxonomies = get_the_taxonomies($movie->ID);?>
			<div class="movie">
				<h5><a href="<?= $movie->guid ?>"><?= $movie->post_title ?></a></h5>
				<p class="description"><?= 'Description: ' . $movie->post_content ?></p>
				<p class="cost"><?= 'Cost: ' . $movieFields['cost'] . ' $'?></p>
				<p class="creation-date"><?= 'Creation date: ' . $movieFields['creation_date']?></p>
				<p class="country"><?= $movieTaxonomies['movie_country'] ?></p>
				<p class="genre"><?= $movieTaxonomies['movie_genre'] ?></p>
				<p class="Actors"><?= $movieTaxonomies['movie_actor'] ?></p>
			</div>
	<?php endforeach;?>
</main>
<?php get_footer();