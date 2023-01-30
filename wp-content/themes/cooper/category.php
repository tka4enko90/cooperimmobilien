<?php get_header(); ?>

<section class="section-faq circle-blue circle-blue_big circle-grey circle-grey_right" data-aos="fade">
	<div class="container">
		<div class="section-header" data-aos="fade-up">
			<h1 class="section-header__title"><?php the_field( 'faq_title', 'option' ); ?></h1>
		</div>
		<?php if ( have_rows( 'faq', 'option' ) ) : ?>
		<div class="faq">
			<div class="faq-items">
				<?php while ( have_rows( 'faq', 'option' ) ) : the_row(); ?>
				<div class="faq-item" data-aos="fade-up">
					<div class="faq-item__title"><?php the_sub_field( 'faq_item_title' ); ?></div>
					<div class="faq-item__desc"><?php the_sub_field( 'faq_item_text' ); ?></div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
