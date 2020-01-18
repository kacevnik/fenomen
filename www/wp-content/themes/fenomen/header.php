<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fenomen
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="color-white position-fixed w-100">
		<div class="top_header py-3">
			<div class="container container-big">
				<div class="row align-items-center">
					<div class="col-md-3">
						<div class="select_city">
							<div class="select_city_title">
								Выберите город:
							</div>
							<span class="select_city_move cursor-pointer color arrow-down font-weight-bold hover_amime">Новосибирск, м. Заельцовская</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="select_city_map_header d-flex align-items-center">
							<div class="select_city_map_header-marker mr-3">
								<img src="<?= get_template_directory_uri() . '/img/marker_header.svg' ?>" alt="Смотреть на карте">
							</div>
							<div class="select_city_map_header-text">
								<p>Адрес школы: <span class="color cursor-pointer font-weight-bold select_city_map_header-link hover_amime">Смотреть на карте</span></p>
								<p>м. Заельцовская, 2-ая Союза Молодежи 32, оф. 268</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-right">
						<button class="btn_header_phone btn btn-prymery hover_amime font-weight-bold">Записаться на бесплатный урок</button>
					</div>
					<div class="col-md-2">
						<div class="header_phone_number font-weight-bold text-right">
							<?php echo get_option( 'options_header_fenomen_phone' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom_header py-2">
			<div class="container container-big">
				<div class="row">
					<div class="col-12 d-flex align-items-center">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo inline-block mr-5" rel="home">
							<img src="<?= get_template_directory_uri() . '/img/logo.svg' ?>" alt="<?php bloginfo( 'name' ); ?>">
						</a>
						<nav id="site-navigation" class="flex-grow-1">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'main-menu',
								'menu_id'        => 'primary-menu',
								'fallback_cb'    => '',
								'menu_class'     => 'fenomen_main_menu list-unstyled m-0 d-flex justify-content-between'
							) );
						?>
						</nav>
						<?php do_action( 'fenomen_action_after_main_nav' ); ?>
					</div>
				</div>
			</div>
		</div>


		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'fenomen' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<section id="intro">
		<div class="container">
			<div class="row">

			</div>
		</div>
	</section>

	<div id="content" class="site-content">
