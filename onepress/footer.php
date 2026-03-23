<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OnePress
 */

$hide_footer = false;
$page_id     = get_the_ID();

if ( is_page() ) {
	$hide_footer = get_post_meta( $page_id, '_hide_footer', true );
}

if ( onepress_is_wc_active() ) {
	if ( is_shop() ) {
		$page_id     = wc_get_page_id( 'shop' );
		$hide_footer = get_post_meta( $page_id, '_hide_footer', true );
	}
}

if ( ! $hide_footer ) {
	?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div id="footMaimBlock" class="footMaimBlock">
			<ul class="footColumnUl">
			<li class="w40">
				<p class="fontL fontBold marginBottom8"><img src="https://apc-housing.co.jp/wordpress/wp-content/uploads/2025/06/ba93559db4763e1db3e1e309e967e6f0-scaled.png" alt="APCハウジングロゴ" class="footLogoImg">　APCハウジング 株式会社</p>
				<a href="tel:0120-541-353" class="flex_center gap10">千葉支社 <img src="https://apc-housing.co.jp/wordpress/wp-content/uploads/2025/06/chiba_tel_wt.png" alt="お問い合わせ先電話番号 千葉支社0120-541-353"></a>
				<a href="tel:0120-792-157" class="flex_center gap10">仙台支社 <img src="https://apc-housing.co.jp/wordpress/wp-content/uploads/2025/06/sendai_tel_wt.png" alt="お問い合わせ先電話番号 仙台支社0120-792-157"></a>
				<p>営業時間:10:00～18:00</p>
				<p>休業日:土・日・祝</p>
				<p><a href="/contact" class="flex_center"><span class="material-icons">email</span>お問い合わせ</a></p>

			</li>
			<li class="w50">
				<div class="footSitemapBlock">
					<h3>サイトマップ</h3>
					<ul class="footSitemapUl"><li><a href="<?php echo home_url() ?>">トップ</a></li><li><a href="/glance">会社概要</a></li><!-- 2021/05/30 Add Start --><li><a href="/examples">施工事例とお客様の声</a></li><!-- 2021/05/30 Add End --></ul>
				</div>
			</li>
<!--
			<li class="w20">
				<div class="footSitemapBlock">
					<h3>対応エリア</h3>
					<p>宮城県・福島県・山形県・岩手県・青森県・秋田県</p>
				</div>
			</li>
-->
			</ul>


		</div>


		<!--?php
		/**
		 * @since 2.0.0
		 * @see onepress_footer_widgets
		 * @see onepress_footer_connect
		 */
		do_action( 'onepress_before_site_info' );
		$onepress_btt_disable = sanitize_text_field( get_theme_mod( 'onepress_btt_disable' ) );

		?-->

		<div class="site-info">
			<div class="container">
				<?php if ( $onepress_btt_disable != '1' ) : ?>
					<div class="btt">
						<a class="back-to-top" href="#page" title="<?php echo esc_attr__( 'Back To Top', 'onepress' ); ?>"><i class="fa fa-angle-double-up wow flash" data-wow-duration="2s"></i></a>
					</div>
				<?php endif; ?>				
				<?php
				/**
				 * hooked onepress_footer_site_info
				 *
				 * @see onepress_footer_site_info
					onepress付きの著作権↓
				 */
				/*do_action( 'onepress_footer_site_info' );*/
				?>

				<p>Copyright &#0169; 2021 APCハウジング 株式会社</p>

			</div>
		</div>
		<!-- .site-info -->

	</footer><!-- #colophon -->
	<?php
}
/**
 * Hooked: onepress_site_footer
 *
 * @see onepress_site_footer
 */
do_action( 'onepress_site_end' );
?>
</div><!-- #page -->

<?php do_action( 'onepress_after_site_end' ); ?>

<?php wp_footer(); ?>

<?php if ( ! is_page( 'contact' ) ) : ?>
<!-- 追従バナー -->
<div id="sticky-banner" style="
	position: fixed;
	bottom: 0;
	left: 0;
	width: 100%;
	z-index: 9999;
	text-align: right;
	background: transparent;
	padding: 0 60px 15px 0;
	pointer-events: none;
	transition: transform 0.3s ease;
">
	<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="display:inline-block;max-width:100%;pointer-events:auto;">
		<img
			src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/link_banner_pc.jpg' ); ?>"
			alt="APCハウジングにご相談ください"
			class="sticky-banner-pc"
			style="max-width:420px;width:100%;height:auto;display:block;border-radius:8px;box-shadow:0 2px 12px rgba(0,0,0,0.2);"
		/>
		<img
			src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/link_banner_sp.jpg' ); ?>"
			alt="APCハウジングにご相談ください"
			class="sticky-banner-sp"
			style="max-width:100%;width:100%;height:auto;display:none;"
		/>
	</a>
	<button id="sticky-banner-close" aria-label="バナーを閉じる" style="
		position: absolute;
		bottom: calc(100% - 5px);
		right: 15px;
		pointer-events: auto;
		width: 28px;
		height: 28px;
		border-radius: 50%;
		border: 1px solid #ccc;
		background: #fff;
		color: #666;
		font-size: 16px;
		line-height: 1;
		cursor: pointer;
		box-shadow: 0 1px 4px rgba(0,0,0,0.1);
		display: flex;
		align-items: center;
		justify-content: center;
	">✕</button>
</div>
<style>
	@media (max-width: 768px) {
		.sticky-banner-pc { display: none !important; }
		.sticky-banner-sp { display: block !important; }
		#sticky-banner { padding: 5px 0; pointer-events: auto; text-align: center; }
		.grecaptcha-badge { display: none !important; }
	}
	/* フッターとの重なり防止 */
	body { padding-bottom: 60px; }
	@media (max-width: 768px) {
		body { padding-bottom: 80px; }
	}
</style>
<script>
(function() {
	var closeBtn = document.getElementById('sticky-banner-close');
	var banner = document.getElementById('sticky-banner');
	if (closeBtn && banner) {
		closeBtn.addEventListener('click', function() {
			banner.style.transform = 'translateY(100%)';
			document.body.style.paddingBottom = '0';
		});
	}
})();
</script>
<?php endif; ?>

</body>
</html>
