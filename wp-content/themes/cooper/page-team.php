<?php
/*
Template Name: Page Team
*/
?>
<?php get_header(); ?>

<section class="section-team circle-grey circle-grey_left" data-aos="fade">
	<div class="container">
		<div class="section-header section-team-header" data-aos="fade-up">
			<div class="section-header__toptitle"><?php the_field( 'team_top_title' ); ?></div>
			<h1 class="section-header__title"><?php the_field( 'team_title' ); ?></h1>
			<div class="section-header__subtitle"><?php the_field( 'team_subtitle' ); ?></div>
			<div class="divided" data-dots="<?php the_field( 'team_dots' ); ?>"></div>
		</div>
		<?php if ( have_rows( 'team' ) ) : ?>
		<div class="team">
			<?php while ( have_rows( 'team' ) ) : the_row(); ?>
			<div class="team-item" data-aos="fade-up">
				<div class="team-item-desc">
					<div class="section-header">
						<div class="section-header__toptitle"><?php the_sub_field( 'team_position' ); ?></div>
						<h2 class="section-header__title"><?php the_sub_field( 'team_name' ); ?></h2>
					</div>
					<div class="team-item__text"><?php the_sub_field( 'team_text' ); ?></div>
					<?php $team_video = get_sub_field( 'team_video' ); ?>

				</div>
				<?php if ( $team_video ) : ?>
				<div class="team-item-video">
					<?php if ( get_sub_field( 'team_image' ) ) : ?>
					<video controls poster="<?php the_sub_field( 'team_image' ); ?>">
						<source src="<?php echo esc_url( $team_video['url'] ); ?>"
							type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
					</video>
					<?php endif ?>
				</div>
				<?php else : ?>
				<?php if ( get_sub_field( 'team_image' ) ) : ?>
				<div class="team-item-pict">
					<div class="team-item-pict__wrap" style="background-image: url(<?php the_sub_field( 'team_image' ); ?>);">
					</div>
				</div>
				<?php endif ?>
				<?php endif; ?>
			</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</section>

<?php get_footer('team'); ?>
