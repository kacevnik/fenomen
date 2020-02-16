<?php
/*
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fenomen
 */

    $paged = get_query_var('paged') ?: 1;

    get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="container">
                <div class="mb-5 d-flex justify-content-between align-items-center">
                    <h1 class="font-weight-bold">Турниры Феномен</h1>
                    <div class="sorting_data">
                        <span class="mr-3">Выбирете дату:</span>
                        <input class="mr-3" type="text"><input class="mr-3" type="text">
                    </div>
                </div>
                <div class="row mb-4">
                <?php
                    while ( have_posts() ) :
                        the_post();
                        ?>
                            <div class="col-md-6 col-lg-4 mb-4">
                                <article id="post-<?php the_ID(); ?>" class="d-flex h-100">
                                    <a href="<?php the_permalink(); ?>" class="post-list-item d-block position-relative w-100">
                                    <?php the_post_thumbnail( '274x140', array( 'class' => 'w-100 mb-3' ) ); ?>
                                        <div class="post-list-item-title mb-3 color-blue font-weight-bold text-center"><?php the_title(); ?></div>
                                        <?php $eventDate = get_field( 'event_date' ); ?>
                                        <div class="text-center mb-3">
                                            <span class="event_date"><?= wp_date( 'j F, Время: H:i', strtotime( $eventDate ) ); ?></span>
                                        </div>
                                        <?php if ( (bool)get_field( 'event_location' ) ) { ?>
                                        <div class="d-flex event_location">
                                            <div class="icon mr-2"><img src="<?= get_template_directory_uri() . '/img/event_marker.svg' ?>" alt=""></div>
                                            <div class="div"><?= get_field( 'event_location' ); ?></div>
                                        </div>
                                        <?php } ?>
                                    </a>
                                </article><!-- #post-<?php the_ID(); ?> -->
                            </div>
                        <?php

                    endwhile; // End of the loop.

                ?>
                </div>
                <?php if ( pagination() ) { ?>
                    <div class="row mb-5">
                        <div class="pagination justify-content-center w-100">
                            <?php echo pagination(); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
