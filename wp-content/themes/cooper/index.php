<?php get_header(); ?>

<section class="section-main" data-aos="fade-in">
	<div class="container">
		<?php if ( have_rows( 'slider', 'option' ) ) : ?>
		<div class="main">
			<div class="main-desc" data-aos="fade-left">
				<h1 class="main-desc__title main-desc__title_front"><?php the_field( 'main_title', 'option' ); ?><span
						class="main-desc__title main-desc__title_back" data-aos="fade-in" data-aos-delay="30"></span></h1>
				<div class="main-desc__subtitle" data-aos="fade-left" data-aos="fade-in" data-aos-delay="100">
					<?php the_field( 'main_text', 'option' ); ?></div>
			</div>
			<div class="main-slider swiper">
				<div class="swiper-wrapper">
					<?php while ( have_rows( 'slider', 'option' ) ) : the_row(); ?>
					<div class="swiper-slide">
						<div class=" main-slide swiper-lazy" data-background="<?php the_sub_field( 'slider_image' ); ?>">
							<div class=" main-slide__status"><?php the_sub_field( 'slider_status' ); ?></div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
				<div class="swiper-side-prev"></div>
				<div class="swiper-side-next"></div>
			</div>
			<div class="main-bottom" data-aos="fade-right">
				<div class="main-bottom-slider swiper">
					<div class="swiper-wrapper">
						<?php while ( have_rows( 'slider', 'option' ) ) : the_row(); ?>
						<div class="swiper-slide">
							<div class="main-bottom-info">
								<?php the_sub_field( 'slider_description' ); ?>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
				<div class="main-bottom-nav">
					<div class="main-bottom-count">
						<div class="main-bottom-fraction swiper-pagination"></div>
						<div class="main-bottom-pagination swiper-pagination"></div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>

<section class="section-maindesc circle-grey circle-grey_right" data-aos="fade">
	<div class="container">
		<div class="maindesc" data-aos="fade-up">
			<div class="maindesc__toptitle"><?php the_field( 'main_desc_top_title', 'option' ); ?></div>
			<h2 class="maindesc__maintitle"><?php the_field( 'main_desc_title', 'option' ); ?></h2>
			<div class="maindesc__subtitle"><?php the_field( 'main_dec_bottom_title', 'option' ); ?></div>
			<div class="maindesc__text"><?php the_field( 'main_desc_text', 'option' ); ?></div>
		</div>
	</div>
</section>

<section class="section-mainworks circle-blue circle-blue_big circle-grey circle-grey_left" data-aos="fade">
	<div class="container">
		<div class="section-header" data-aos="fade-up">
			<h2 class="section-header__title" data-aos="fade-left"><?php the_field( 'works_title', 'option' ); ?></h2>
			<div class="section-header__subtitle" data-aos="fade-left" data-aos-delay="100">
				<?php the_field( 'works_subtitle', 'option' ); ?></div>
			<div class="section-header__desc" data-aos="fade-left" data-aos-delay="200">
				<?php the_field( 'works_desc', 'option' ); ?></div>
		</div>
		<div class="mainworks">
			<?php if ( have_rows( 'works', 'option' ) ) : $i = 0; ?>
			<?php while ( have_rows( 'works', 'option' ) ) : the_row(); $i++; ?>
			<div class="mainworks-row">
				<div class="mainworks-item" data-aos="fade-up">
					<div class="mainworks-item__num"><?php echo $i; ?></div>
					<div class="mainworks-item-desc">
						<h3 class="mainworks-item__title"><?php the_sub_field( 'works_item_title' ); ?></h3>
						<div class="mainworks-item__text"><?php the_sub_field( 'works_item_text' ); ?></div>
						<div class="mainworks-item__icon">
							<?php $works_item_icon = get_sub_field( 'works_item_icon' ); ?>
							<img src="<?php echo esc_url( $works_item_icon['url'] ); ?>"
								alt="<?php echo esc_attr( $works_item_icon['alt'] ); ?>" />
						</div>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="section-mainnumbers circle-grey circle-grey_right" data-aos="fade">
	<div class="container">
		<div class="section-header section-header_center">
			<h2 class="section-header__title" data-aos="fade-left"><?php the_field( 'numbers_title', 'option' ); ?></h2>
		</div>
		<div class="mainnumbers">
			<div class="mainnumbers-center">
				<div class="mainnumbers-item mainnumbers-item_size-one" data-aos="fade-right">
					<div class="mainnumbers-item__count"><?php the_field( 'count_1', 'option' ); ?></div>
					<div class="mainnumbers-item__desc"><?php the_field( 'count_text_1', 'option' ); ?></div>
				</div>
				<div class="mainnumbers-item mainnumbers-item_size-two" data-aos="fade-in">
					<div class="mainnumbers-item__count"><?php the_field( 'count_2', 'option' ); ?></div>
					<div class="mainnumbers-item__desc"><?php the_field( 'count_text_2', 'option' ); ?></div>
				</div>
				<div class="mainnumbers-item mainnumbers-item_size-three" data-aos="fade-left">
					<div class="mainnumbers-item__count"><?php the_field( 'count_3', 'option' ); ?></div>
					<div class="mainnumbers-item__desc"><?php the_field( 'count_text_3', 'option' ); ?></div>
				</div>
				<div class="mainnumbers-item mainnumbers-item_size-four" data-aos="fade-up">
					<div class="mainnumbers-item__count"><?php the_field( 'count_4', 'option' ); ?></div>
					<div class="mainnumbers-item__desc"><?php the_field( 'count_text_4', 'option' ); ?></div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section-advantage">
	<div class="container">
		<div class="section-header">
			<h2 class="section-header__title" data-aos="fade-left"><?php the_field( 'why_title', 'option' ); ?></h2>
			<div class="section-header__subtitle" data-aos="fade-left" data-aos-delay="100">
				<?php the_field( 'why_subtitle', 'option' ); ?></div>
			<div class="section-header__desc" data-aos="fade-left" data-aos-delay="200">
				<?php the_field( 'why_desc', 'option' ); ?></div>
		</div>
		<div class="advantage">
			<?php if ( have_rows( 'why', 'option' ) ) : ?>
			<?php while ( have_rows( 'why', 'option' ) ) : the_row(); ?>
			<div class="advantage-item" data-aos="fade">
				<div class="advantage-item__desc" data-aos="fade-up"><?php the_sub_field( 'why_item_text' ); ?></div>
				<?php if ( get_sub_field( 'iframe_or_image' ) == 'iframe' ) : ?>
				<div class="advantage-item__iframe" data-aos="fade-up" data-aos-delay="150">
					<?php the_sub_field( 'why_item_iframe' ); ?>
				</div>
				<?php elseif ( get_sub_field( 'iframe_or_image' ) == 'image' ) : ?>
				<div class="advantage-item__pict" data-aos="fade-up" data-aos-delay="150">
					<?php $why_item_images = get_sub_field( 'why_item_images' ); ?>
					<?php if ( $why_item_images ) : ?>
					<img class="lozad" data-src="<?php echo esc_url( $why_item_images['url'] ); ?>"
						alt="<?php echo esc_attr( $why_item_images['alt'] ); ?>" />
					<?php endif; ?>
				</div>
				<?php elseif ( get_sub_field( 'iframe_or_image' ) == 'doubleImg' ) : ?>
				<div class="advantage-item-twopict" data-aos="fade-up" data-aos-delay="150">
					<div class="advantage-item-twopict__item">
						<?php $why_top_image = get_sub_field( 'why_top_image' ); ?>
						<?php if ( $why_top_image ) : ?>
						<img class="lozad" data-src="<?php echo esc_url( $why_top_image['url'] ); ?>"
							alt="<?php echo esc_attr( $why_top_image['alt'] ); ?>" />
						<?php endif; ?>
						<div class="advantage-item-twopict__desc"><?php the_sub_field( 'why_top_image_text' ); ?></div>
					</div>
					<div class="advantage-item-twopict__item">
						<?php $why_bottom_image = get_sub_field( 'why_bottom_image' ); ?>
						<?php if ( $why_bottom_image ) : ?>
						<img class="lozad" data-src="<?php echo esc_url( $why_bottom_image['url'] ); ?>"
							alt="<?php echo esc_attr( $why_bottom_image['alt'] ); ?>" />
						<?php endif; ?>
						<div class="advantage-item-twopict__desc"><?php the_sub_field( 'why_bottom_image_text' ); ?></div>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="section-maindesc">
	<div class="container">
		<div class="maindesc maindesc_icon-top" data-aos="fade-up">
			<div class="maindesc__toptitle"><?php the_field( 'links_maintitle_1', 'option' ); ?></div>
			<?php $links_link_1 = get_field( 'links_link_1', 'option' ); ?>
			<a href="<?php echo esc_url( $links_link_1); ?>"
				class="maindesc__maintitle maindesc__link"><?php the_field( 'links_title_1', 'option' ); ?></a>
		</div>
	</div>
</section>

<section class="section-mainabout circle-blue circle-blue_big" data-aos="fade">
	<div class="container">
		<div class="section-header">
			<h2 class="section-header__title" data-aos="fade-left"><?php the_field( 'main_about_title', 'option' ); ?></h2>
			<div class="section-header__subtitle" data-aos="fade-left"><?php the_field( 'main_about_subtitle', 'option' ); ?>
			</div>
		</div>
		<div class="mainabout">
			<?php if ( have_rows( 'about_blocks', 'option' ) ) : ?>
			<?php while ( have_rows( 'about_blocks', 'option' ) ) : the_row(); ?>
			<div class="mainabout-item">
				<div class="mainabout-item__desc" data-aos="fade-up"><?php the_sub_field( 'about_text' ); ?></div>
				<div class="mainabout-item__pict" data-aos="fade-up" data-aos-delay="100">
					<?php $about_images = get_sub_field( 'about_images' ); ?>
					<img class="lozad" data-src="<?php echo esc_url( $about_images['url'] ); ?>"
						alt="<?php echo esc_attr( $about_images['alt'] ); ?>" />
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="section-maindesc section-maindesc_bottom">
	<div class="container">
		<div class="maindesc maindesc_icon-top maindesc_icon-top" data-aos="fade-up">
			<div class="maindesc__toptitle"><?php the_field( 'links_maintitle_2', 'option' ); ?></div>
			<?php $links_link_2 = get_field( 'links_link_2', 'option' ); ?>
			<a href="<?php echo esc_url( $links_link_2); ?>"
				class="maindesc__maintitle maindesc__link"><?php the_field( 'links_title_2', 'option' ); ?></a>
		</div>
	</div>
</section>

<section class="section-faq circle-blue circle-blue_big circle-grey circle-grey_right" data-aos="fade">
	<div class="container">
		<div class="section-header" data-aos="fade-up">
			<h2 class="section-header__title"><?php the_field( 'faq_title', 'option' ); ?></h2>
		</div>
		<?php
		$i = -1;
		$number = 4;
		?>
		<?php if ( have_rows( 'faq', 'option' ) ) : $i; ?>
		<div class="faq">
			<div class="faq-items">
				<?php while ( have_rows( 'faq', 'option' ) ) : the_row(); $i++; ?>
				<?php if ($i == $number) break; ?>
				<div class="faq-item" data-aos="fade-up">
					<div class="faq-item__title"><?php the_sub_field( 'faq_item_title' ); ?></div>
					<div class="faq-item__desc"><?php the_sub_field( 'faq_item_text' ); ?></div>
				</div>
				<?php endwhile; ?>
			</div>
			<a href="<?php echo get_category_link(pll_get_term(53)); ?>"
				class="faq__btn btn"><?php the_field( 'faq_btn_title', 'option' ); ?></a>
		</div>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
