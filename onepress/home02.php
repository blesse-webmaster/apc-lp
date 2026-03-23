<?php
/*
Template Name:home.ver2
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

			<!-- 2021/06 スライダー改修 Start -->
			<div class="swiper-container">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper">
					<!-- Slides -->
					<div class="swiper-slide" style="
						background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/topImg01.jpg');
						background-repeat: no-repeat;
						background-size: contain;
						background-position: top center;">
						<span class="s-fade-text">笑顔の絶えない みらい を</span>
					</div>
					<div class="swiper-slide" style="
						background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/topImg02.jpg');
						background-repeat: no-repeat;
						background-size: contain;
						background-position: top center;">
						<span class="s-fade-text">安心・安全な生活空間をお届けします</span>
					</div>
					<div class="swiper-slide" style="
						background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/topImg03.jpg');
						background-repeat: no-repeat;
						background-size: contain;
						background-position: top center;">
						<span class="s-fade-text">みなさまの暮らしによりそい<br>おうちに帰りたくなるサービスを提供</span>
					</div>
					<div class="swiper-slide" style="
						background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/topImg04.jpg');
						background-repeat: no-repeat;
						background-size: contain;
						background-position: top center;">
						<span class="s-fade-text">ずっと長いお付き合いに<br>　　　　　　　　　　APCハウジング</span>
					</div>
				</div>
				<!-- If we need pagination -->
				<div class="swiper-pagination"></div>
			
				<!-- If we need navigation buttons -->
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
			<!-- 2021/06 スライダー改修 End -->
			
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'page' ); ?>

						<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>

					<?php endwhile; // End of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->

            <?php if ( $layout != 'no-sidebar' ) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>

		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>

<!--call script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
<!--script src="<?php echo get_template_directory_uri(); ?>/assets/js/swiper.js"></script-->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/slideTxt.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/foot.js"></script>
