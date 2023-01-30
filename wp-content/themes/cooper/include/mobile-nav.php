<div class="overlay"></div>

<div class="mobile-nav hide">
	<div class="mobile-nav__close"></div>
	<div class="mobile-nav__logo">
		<?php $logo_header = get_field( 'logo_header', 'option' ); ?>
		<img src="<?php echo esc_url( $logo_header['url'] ); ?>" alt="<?php echo esc_attr( $logo_header['alt'] ); ?>">
	</div>
	<div class="mobile-nav-nav">
		<?php wp_nav_menu(array(
			'theme_location'=>'mobile_menu',
			'container' => ' ',
			'menu_class' => 'mobile-nav-menu',
			'depth' => 1
			));
		?>
	</div>
	<div class="mobile-nav-contact">
		<a href="tel:<?php echo str_replace(array(" ","(",")","-"), "", get_field('phone', 'option')); ?>"
			class="mobile-nav__phone"><?php the_field( 'phone', 'option' ); ?></a>
		<a href="mailto:<?php the_field( 'email', 'option' ); ?>"
			class="mobile-nav__mail"><?php the_field( 'email', 'option' ); ?></a>
		<div class="mobile-nav-social" data-aos="fade-left">
			<a href="<?php the_field( 'facebook', 'option' ); ?>" class="mobile-nav-social__item" target="_blank">
				<img src="<?php bloginfo('template_url') ?>/images/dist/fb.svg" alt="">
			</a>
			<a href="<?php the_field( 'instagram', 'option' ); ?>" class="mobile-nav-social__item" target="_blank">
				<img src="<?php bloginfo('template_url') ?>/images/dist/inst.svg" alt="">
			</a>
			<a href="mailto:<?php the_field( 'email' ); ?>" class="mobile-nav-social__item" target="_blank">
				<img src="<?php bloginfo('template_url') ?>/images/dist/mail.svg" alt="">
			</a>
		</div>
	</div>
</div>
