<?php
get_header();

if (have_posts()) : ?>
	<main class="archive-main">
		<?php while (have_posts()) : the_post(); ?>

			<article>
				<a href="<?php the_permalink(); ?>">
					<?php the_title('<h2>', '</h2>') ?>
				</a>
			</article>

		<?php endwhile; ?>
	</main>
<?php endif;
get_footer();