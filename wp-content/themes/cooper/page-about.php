<?php
/*
Template Name: Page About
*/
?>
<?php get_header(); ?>

<section class="section-innermain" data-aos="fade-in">
	<div class="container">
		<div class="innermain">
			<div class="innermain-wrap" style="background-image: url(<?php the_field( 'about_image' ); ?>)">
				<div class="innermain-desc">
					<h1 class="innermain-desc__title innermain-desc__title_front">
						<span><?php the_field( 'about_title_one' ); ?></span>
						<?php the_field( 'about_title_two' ); ?><div class="innermain-desc__title innermain-desc__title_back">
						</div>
					</h1>
					<h2 class="innermain-desc__subtitle innermain-desc__subtitle_front"><?php the_field( 'about_subtitle' ); ?>
						<div class="innermain-desc__subtitle innermain-desc__subtitle_back"></div>
					</h2>
				</div>
			</div>
			<div class="innermain-bottom">
				<div class="innermain-bottom__info"><?php the_field( 'about_desc' ); ?></div>
			</div>
		</div>
	</div>
</section>

<?php if ( have_rows( 'advantage' ) ) : ?>
<section class="section-about circle-grey circle-grey_left" data-aos="fade">
	<div class="container">
		<div class="about">
			<?php while ( have_rows( 'advantage' ) ) : the_row(); ?>
			<div class="about-item">
				<div class="section-header" data-aos="fade-up">
					<div class="section-header__toptitle"><?php the_sub_field( 'advantage_top_title' ); ?></div>
					<h2 class="section-header__title"><?php the_sub_field( 'advantage_title' ); ?></h2>
				</div>
				<div class="about-item-wrap" data-aos="fade-up">
					<div class="about-item-desc circle-grey">
						<div class="about-item__arrows">
							<img src="<?php bloginfo('template_url') ?>/images/dist/arrow.svg" alt="">
							<img src="<?php bloginfo('template_url') ?>/images/dist/arrow.svg" alt="">
							<img src="<?php bloginfo('template_url') ?>/images/dist/arrow.svg" alt="">
						</div>
						<div class="about-item__text"><?php the_sub_field( 'advantage_item_text' ); ?></div>
						<div class="about-item__icon">
							<?php $advantage_icon = get_sub_field( 'advantage_icon' ); ?>
							<?php if ( $advantage_icon ) : ?>
							<img src="<?php echo esc_url( $advantage_icon['url'] ); ?>"
								alt="<?php echo esc_attr( $advantage_icon['alt'] ); ?>" />
							<?php endif; ?>
						</div>
					</div>
					<div class="about-item__pict circle-blue" data-aos="fade">
						<?php $advantage_item_image = get_sub_field( 'advantage_item_image' ); ?>
						<img src="<?php echo esc_url( $advantage_item_image['url'] ); ?>"
							alt="<?php echo esc_attr( $advantage_item_image['alt'] ); ?>" />
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<section class="section-getcontact circle-blue circle-blue_big circle-grey circle-grey_right" data-aos="fade">
	<div class="container">
		<div class="section-header" data-aos="fade-up">
			<div class="section-header__toptitle"><?php the_field( 'get_contact_toptitle' ); ?></div>
			<h2 class="section-header__title"><?php the_field( 'get_contact_title' ); ?></h2>
		</div>
		<div class="getcontact" data-aos="fade-up">
			<div class="getcontact-desc">
				<div class="getcontact__text"><?php the_field( 'get_contact_text' ); ?></div>
				<?php $get_contact_btn_link = get_field( 'get_contact_btn_link' ); ?>
				<?php if ( $get_contact_btn_link ) : ?>
				<a href="<?php echo esc_url( $get_contact_btn_link); ?>"
					class="getcontact__btn btn btn_size-2"><?php the_field( 'get_contact_btn_title' ); ?></a>
				<?php endif; ?>
			</div>
			<div class="getcontact-pict">
				<?php $get_contact_image = get_field( 'get_contact_image' ); ?>
				<?php if ( $get_contact_image ) : ?>
				<img src="<?php echo esc_url( $get_contact_image['url'] ); ?>"
					alt="<?php echo esc_attr( $get_contact_image['alt'] ); ?>" />
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer('about'); ?>
