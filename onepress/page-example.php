<?php
/*
Template Name:page-example　施工事例ページ用テンプレート
 */

get_header();

/*$layout = onepress_get_layout();//--固定ページのみno-sidebarにしたいため 2021/07 ADD*/ 
$layout ='no-sidebar';


/**
 * @since 2.0.0
 * @see onepress_display_page_title
 */
do_action( 'onepress_page_before_content' );
?>
	<div id="content" class="site-content">
        <?php onepress_breadcrumb(); ?>
		<div id="content-inside" class="container <?php echo esc_attr( $layout ); ?>">

		<div id="topImgBlock" class="topImgBlock">

			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/examplesHead.jpg" alt="施工事例とお客様の声 みらい住電株式会社"/>

		</div>	<!--id="topImgBlock"-->
			
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

					<section id="sec2Block" class="sec2Block">
					<div class="contentInnerBlock">

						<?php get_template_part( 'template-parts/content', 'page' ); ?>

						<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>
					
					</div>
					</section>

					<?php endwhile; // End of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->

            <?php if ( $layout != 'no-sidebar' ) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>

		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>
