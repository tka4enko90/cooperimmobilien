<?php
/*
Template Name: Page Form
*/
?>
<?php get_header(); ?>

<section class="section-form circle-grey circle-grey_left" data-aos="fade">
	<div class="container">
		<div class="contacts circle-blue">
			<div class="contacts-header" data-aos="fade-up">
				<h1 class="contacts-header__toptitle"><?php the_field( 'form_top_title' ); ?></h1>
				<h2 class="contacts-header__title"><?php the_field( 'form_title' ); ?></h2>
				<div class="contacts-header__desc"><?php the_field( 'form_desc' ); ?></div>
			</div>
			<div class="contacts-form" data-aos="fade-up">
				<?php echo do_shortcode('[contact-form-7 id="380" title="Cooper. Page Form" html_class="use-floating-validation-tip"]');?>
			</div>
			<div class="contacts-items" data-aos="fade-up">
				<div class="contacts-items-row">
					<div class="contacts-item">
						<div class="contacts-item__icon"><img src="<?php bloginfo('template_url') ?>/images/dist/phone.svg" alt="">
						</div>
						<div class="contacts-item-main">
							<a href="tel:<?php echo str_replace(array(" ","(",")","-"), "", get_field('phone', 'option')); ?>"
								class="contacts-item__link"><?php the_field( 'phone', 'option' ); ?></a>
							<div class="contacts-item__desc"><?php the_field( 'phone-desc', 'option' ); ?></div>
						</div>
					</div>
					<div class="contacts-item">
						<div class="contacts-item__icon"><img src="<?php bloginfo('template_url') ?>/images/dist/email.svg" alt="">
						</div>
						<div class="contacts-item-main">
							<a href="mailto:<?php the_field( 'email', 'option' ); ?>"
								class="contacts-item__link"><?php the_field( 'email', 'option' ); ?></a>
							<div class="contacts-item__desc"><?php the_field( 'email-desc', 'option' ); ?></div>
						</div>
					</div>
				</div>
				<div class="contacts-items__desc"><?php the_field( 'contact-time', 'option' ); ?></div>
			</div>
		</div>
	</div>
</section>

<?php get_footer('form'); ?>
