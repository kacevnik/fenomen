<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fenomen
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( (bool)get_post_meta( $post->ID, 'main_tittle', true ) ) { ?>
		<section id="intro">
			<div class="container">
				<div class="intro_bg">
					<div class="row">
						<div class="col-md-8 mb-2 mb-md-5">
							<h1 class="color-white"><?php echo get_post_meta( $post->ID, 'main_tittle', true ); ?></h1>
						</div>
					</div>
					<div class="row">
						<div class="intro_small_title color-white col-12 mb-3 mt-3 mt-mf-5"><?php echo get_post_meta( $post->ID, 'intro_sub_title', true ); ?></div>
						<?php for ( $i = 1; $i <=3; $i++ ) { ?>
						<div class="col-md-4 mb-4 mb-md-0">
							<?php if ( (bool)get_post_meta( $post->ID, 'intro_prog_name_' . $i, true ) ) { ?>
							<div class="intro_item text-center">
								<img src="<?= wp_get_attachment_image_url( get_post_meta( $post->ID, 'intro_prog_img_' . $i, true ) ); ?>" alt="" class="intro_item_img mb-3">
								<div class="intro_item_content">
									<div class="h4"><?php echo get_post_meta( $post->ID, 'intro_prog_name_' . $i, true ); ?></div>
									<p class="mb-4"><?php echo get_post_meta( $post->ID, 'intro_prog_desc_' . $i, true ); ?></p>
								</div>
								<a href="<?php echo get_post_meta( $post->ID, 'intro_prog_link_' . $i, true ); ?>" class="btn btn-primary intro_item_btn">Подробнее о программе</a>
							</div>
							<?php } ?>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>
		<?php } ?>

		<section id="main_form" class="form">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h3 class="text-center">
						Запишитесь на <span class="color-blue">бесплатное</span> пробное занятие прямо сейчас
						</h3>
						<div class="sub_title text-center col-md-10 offset-md-1 mb-5">
						Введите свой номер телефона, наш специалист свяжется с Вами, расскажет о преимуществах школы, ответит на все вопросы и запишет вашего ребенка на бесплатное занятие в удобное для Вас время
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<input type="text" placeholder="Ваше имя">
					</div>
					<div class="col-md-3">
						<input type="text" placeholder="Номер телефона">
					</div>
					<div class="col-md-3">
						<input type="text" placeholder="Удобная дата занятия">
					</div>
					<div class="col-md-3">
						<button class="btn btn-primary btn-yellow w-100">Записаться на занятие</button>
					</div>
				</div>
			</div>
		</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
