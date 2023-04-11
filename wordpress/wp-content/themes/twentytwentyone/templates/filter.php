<main class="movie__content">
	<h1><?= the_title() ?></h1>
	<form action="" method="POST" id="filter">
		<?php
		$genres = get_terms([
			'taxonomy'  => 'movie_genre',
			'orderby'   => 'name',
		]);
		if($genres): ?>
			<select name="genres_filter" id="genres_filter">
				<option value="">All genres</option>
				<?php foreach ($genres as $genre): ?>
					<option value="<?= $genre->term_id ?>"><?= $genre->name ?></option>
				<?php endforeach; ?>
			</select>
		<?php endif; ?>
	</form>
<?php if (have_posts()):
	while(have_posts()): the_post();
		$movieFields = get_fields(get_the_ID());
		$movieTaxonomies = get_the_taxonomies(get_the_ID());?>
		<div class="movie">
			<h5><a href="<?= get_permalink() ?>"><?= the_title() ?></a></h5>
			<p class="description"><?= 'Description: ' . the_content() ?></p>
			<p class="cost"><?= 'Cost: ' . $movieFields['cost'] . ' $'?></p>
			<p class="creation-date"><?= 'Creation date: ' . $movieFields['creation_date']?></p>
			<p class="country"><?= $movieTaxonomies['movie_country'] ?></p>
			<p class="genre"><?= $movieTaxonomies['movie_genre'] ?></p>
			<p class="Actors"><?= $movieTaxonomies['movie_actor'] ?></p>
		</div>
	<?php endwhile;
endif;?>
</main>
