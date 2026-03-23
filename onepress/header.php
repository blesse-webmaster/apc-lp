<?php
/**
 * The header for the OnePress theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OnePress
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!--google font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho&display=swap" rel="stylesheet">
<!--link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300&display=swap" rel="stylesheet"--> 


<?php wp_head(); ?>

<meta property="og:title" content="<?php bloginfo('name');?> | <?php bloginfo('description');?>?001" />
<meta property="og:image" content="https://apc-housing.co.jp/wordpress/wp-content/uploads/2025/06/APCH_logo_mark.jpg" />
<meta property="og:description" content="<?php bloginfo('description');?>" />
<meta property="og:site_name" content="<?php bloginfo('name');?>" />

<!--usr css-->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/common.css?<?php echo date('Ymd-Hi'); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/home.css?<?php echo date('Ymd-Hi'); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/glance.css?<?php echo date('Ymd-Hi'); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/contact.css?<?php echo date('Ymd-Hi'); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/swiper.css?<?php echo date('Ymd-Hi'); ?>">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/swiperTxtFull.css?<?php echo date('Ymd-Hi'); ?>">

<!--favicon-->
<link rel="shortcut icon" href="https://apc-housing.co.jp/wordpress/wp-content/uploads/2025/06/APCH_logo_mark.jpg">
<link rel="apple-touch-icon" href="https://apc-housing.co.jp/wordpress/wp-content/uploads/2025/06/APCH_logo_mark.jpg">

</head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>
<?php do_action( 'onepress_before_site_start' ); ?>
<div id="page" class="hfeed site">

	<div class="headContactBlock">
		<div class="notes marginBottom8">
			<p><?php bloginfo('description');?></p>
		</div>
		<div>
			<ul class="headContactUl">
			<li class="flex_center">
				<ul class="headLeftUl">
				<li><p class="headTitleTxt"><a href="/"><?php bloginfo('name');?></a></p></li>
				</ul>
			</li>
			<li>
				<ul class="headRightUl">
				<li><p><a href="/">ホーム</a></p></li>
				<!-- 2021/06/21 Add Start -->
				<li><p><a href="/new-info">NEWS</a></p></li>
				<!-- 2021/06/21 Add End -->
				<li><p><a href="/glance">会社概要</a></p></li>
				<!-- 2021/05/30 Add Start -->
				<li><p><a href="/examples">施工事例とお客様の声</a></p></li>
				<!-- 2021/05/30 Add End -->
				<li><p><a class="headEmailTxt" href="/contact">お問い合わせ</a></p></li>
					<li><a href="tel:0120-541-353">千葉支社 <img src="https://apc-housing.co.jp/wordpress/wp-content/uploads/2025/06/chiba_tel_br.png" alt="お問い合わせ先電話番号 千葉支社" style="max-width: 180px;"></a>
						<br><a href="tel:0120-792-157">仙台支社 <img src="https://apc-housing.co.jp/wordpress/wp-content/uploads/2025/06/sendai_tel_br.png" alt="お問い合わせ先電話番号 仙台支社" style="max-width: 180px;"></a></li>
				</ul>
				<!--↓↓wordPressのメニュー↓↓-->
				<!--?php wp_nav_menu( array( 'menu' => 'メインメニュー' ) ); ?-->
			</li>
			</ul>
		</div>
	</div>
	<?php
	/**
	 * @since 2.0.0
	 */
	/*onepress_header();*/
	?>
