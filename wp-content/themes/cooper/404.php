<?php
/*
Template Name: Page 404
*/
?>
<?php get_header(); ?>

<section class="section-error">
	<div class="container">
		<div class="error">
			<?php
				$my_lang = pll_current_language();
				$home_url = pll_home_url();
				if ( $my_lang == 'en' ) {
					echo '<div class="error__title">404</div>',
					'<div class="error__desc">',
						'<p>Page not found.</p>',
			'<p>Try starting from the <a href="'.$home_url.'">home page</a></p>',
		'</div>';
		} else if ( $my_lang == 'de' ) {
		echo '<div class="error__title">404</div>',
		'<div class="error__desc">',
			'<p>Seite nicht gefunden.</p>',
			'<p>Versuchen sie, von der <a href="'.$home_url.'">startseite aus zu beginnen</a></p>',
			'</div>';
		} else {
		echo '<div class="error__title">404</div>',
		'<div class="error__desc">',
			'<p>Page not found.</p>',
			'<p>Try starting from the <a href="'.$home_url.'">home page</a></p>',
			'</div>';
		}
		?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
