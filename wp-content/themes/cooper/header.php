<!DOCTYPE html>
<html lang="ru">

  <head>

    <meta charset="utf-8">
    <link rel="preconnect" href="//app.usercentrics.eu">
    <link rel="preconnect" href="//api.usercentrics.eu">
    <link rel="preconnect" href="//privacy-proxy.usercentrics.eu">
    <link rel="preload" href="//app.usercentrics.eu/browser-ui/latest/loader.js" as="script">
    <link rel="preload" href="//privacy-proxy.usercentrics.eu/latest/uc-block.bundle.js" as="script">
    <script id="usercentrics-cmp" data-settings-id="ul0u6dX8O" src="https://app.usercentrics.eu/browser-ui/latest/loader.js" data-tcf-enabled @if ($cmpDraft) data-version="preview" @endif></script>
    <script type="application/javascript" src="https://privacy-proxy.usercentrics.eu/latest/uc-block.bundle.js"></script>
    <link rel="icon" href="<?php bloginfo('template_url') ?>/images/favicon/favicon.ico">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>

	<!-- Google Tag Manager -->
	<script type="text/plain" data-usercentrics="Google Tag Manager">
		(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-W4CJ3QD');
	 </script>
<!-- End Google Tag Manager -->  
  </head>

  <body>

    <?php include (TEMPLATEPATH . '/include/mobile-nav.php'); ?>

    <header class="header">
      <div class="container" data-aos="fade-in">
        <div class="header-main">
			 <a href="<?php echo pll_home_url(); ?>" class="header-logo">
            <?php $logo_header = get_field( 'logo_header', 'option' ); ?>
            <img src="<?php echo esc_url( $logo_header['url'] ); ?>"
              alt="<?php echo esc_attr( $logo_header['alt'] ); ?>">
          </a>
          <div class="header-left">
            <?php wp_nav_menu(array(
							'theme_location'=>'hmenu_left',
							'container' => ' ',
							'menu_class' => 'header-menu',
							'depth' => 1
							));
						?>
          </div>
         
          <div class="header-count"><b><?php the_field( 'clients_count', 'option' ); ?></b>
            <?php the_field( 'clients_title', 'option' ); ?></div>
          <div class="header-rigth">
            <?php wp_nav_menu(array(
							'theme_location'=>'hmenu_right',
							'container' => ' ',
							'menu_class' => 'header-menu',
							'depth' => 1
							));
						?>
            <?php if( get_field( 'link_btn_1', 'option' ) || get_field( 'link_btn_2', 'option' )): ?>
            <div class="header-btns">
              <?php if( get_field( 'link_btn_1', 'option' )): ?>
              <a href="<?php the_field( 'link_btn_1', 'option' ); ?>" data-fancybox data-type="iframe"
                data-preload="false" class="header-btns__btn"><?php the_field( 'title_btn_1', 'option' ); ?></a>
              <?php endif; ?>
              <?php if( get_field( 'link_btn_2', 'option' )): ?>
              <a href="<?php the_field( 'link_btn_2', 'option' ); ?>" data-fancybox data-type="iframe"
                data-preload="false" class="header-btns__btn"><?php the_field( 'title_btn_2', 'option' ); ?></a>
              <?php endif; ?>
            </div>
            <?php endif; ?>
            <div class="header-burger menu-button">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <?php $args = array(
							'dropdown'=> 1,
							'display_names_as' => 'slug',
							'show_names' => 1,
							'hide_if_no_translation' => 0,
							'hide_current' => 0,
							'raw' => 0); ?>
            <div class="header-lang"><?php pll_the_languages($args); ?></div>
          </div>
        </div>
      </div>
    </header>

    <div class="wrapper">
