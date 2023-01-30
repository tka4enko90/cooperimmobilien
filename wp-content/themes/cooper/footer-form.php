</div>

<?php include(TEMPLATEPATH . '/include/social.php'); ?>

<div class="arrow-top"></div>

<footer class="footer footer_form circle-grey" data-aos="fade-in">
	<div class="container">
		<div class="footer-row">
			<?php wp_nav_menu(array(
				'theme_location'=>'fmenu_desktop',
				'container' => ' ',
				'menu_class' => 'footer-nav',
				'depth' => 1
				));
			?>
			<?php wp_nav_menu(array(
				'theme_location'=>'fmenu_mobile',
				'container' => ' ',
				'menu_class' => 'footer-nav footer-nav_mob',
				'depth' => 1
				));
			?>
			<div class="footer-social">
				<a href="<?php the_field( 'facebook', 'option' ); ?>" class="footer-social__item" target="_blank">
					<img src="<?php bloginfo('template_url') ?>/images/dist/fb.svg" alt="">
				</a>
				<a href="<?php the_field( 'instagram', 'option' ); ?>" class="footer-social__item" target="_blank">
					<img src="<?php bloginfo('template_url') ?>/images/dist/inst.svg" alt="">
				</a>
				<a href="mailto:<?php the_field( 'email' ); ?>" class="footer-social__item" target="_blank">
					<img src="<?php bloginfo('template_url') ?>/images/dist/mail.svg" alt="">
				</a>
			</div>
			<div class="footer-logos">
				<div class="footer-logo footer-logo_two">
					<?php $logo_footer = get_field( 'logo_footer_2', 'option' ); ?>
					<img src="<?php echo esc_url( $logo_footer['url'] ); ?>" alt="<?php echo esc_attr( $logo_footer['alt'] ); ?>">
				</div>
				<a href="<?php echo pll_home_url(); ?>" class="footer-logo">
					<?php $logo_footer = get_field( 'logo_footer', 'option' ); ?>
					<img src="<?php echo esc_url( $logo_footer['url'] ); ?>" alt="<?php echo esc_attr( $logo_footer['alt'] ); ?>">
				</a>
			</div>
			<div class="footer-copyright">Copyright <?php echo date('Y'); ?>. All rights reserved.</div>
		</div>
	</div>
</footer>

<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->

<?php wp_footer(); ?>

</body>

</html>
