<?php
/*
Template Name:contact
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

	<h1>お問い合わせ</h1>

	<div id="content-inside" class="container <?php echo esc_attr( $layout ); ?>">

		<div id="primary" class="content-area contentBlock">

			<div id="sec1Block" class="sec1Block"><div class="contentInnerBlock bgWhite">

				<h2 class="h2Blue">お電話から</h2>
				<div class="lineBlock shortWitdth">
					<p>お電話でもお問い合わせを承っております。<br/>
					お気軽にご相談ください。</p>
				</div>
				<div class="sec1TellBlock lineBlock frmBrown shortWitdth">
					<p class="marginBottom32 contact_tel">
						<span class="flex_center"><span class="txt_wrap">千葉支店</span><a href="tel:0120-541-353"><img src="https://apc-housing.co.jp/wordpress/wp-content/uploads/2025/06/chiba_tel_br.png" alt="お問い合わせ先電話番号 千葉支店"></a></span>
						<span class="flex_center"><span class="txt_wrap">仙台支店</span><a href="tel:0120-792-157"><img src="https://apc-housing.co.jp/wordpress/wp-content/uploads/2025/06/sendai_tel_br.png" alt="お問い合わせ先電話番号 仙台支店"></a></span>
					</p>
					<p>営業時間内受付 10:00～18:00<br/>
					定休日：土・日・祝</p>
				</div>

			</div></div>	<!--id="sec1Block"-->

			<div id="sec2Block" class="sec2Block"><div class="contentInnerBlock">

				<h2 class="h2Blue">お問い合わせフォームから</h2>
				<div class="lineBlock shortWitdth">
					<p>こちらのフォームからお問い合わせを承っております。<br/>
					夜間、定休日などでもお気軽にこちらからお問合せ下さい。<br/>
					※営業時間中のご返信になります。</p>
				</div>
				<div class="lineBlock shortWitdth">
					<?php echo do_shortcode( '[contact-form-7 id="25" title="ContactUser"]' ); ?>
				</div>
				<div class="lineBlock shortWitdth">
					<p>送信ボタンで入力したメッセージが送られます。<br/>
					下記の「個人情報保護方針について」に同意の上、ご送信下さい。</p>
					<div class="privacyBlock">
						<p>個人情報保護方針</p>
						<p>APCハウジング 株式会社(以下、当社といいます。)における個人情報の収集、利用目的、管理等についてお知らせいたします。<br/>
						個人情報保護法を遵守して、お客様の個人情報を正確かつ機密に取り扱うこと、並びに不正アクセス、紛失、破壊、改ざん、漏えい等から個人情報を保護することは、当社の重要な責務であると認識しております。<br/>
						当社は以下の点を遵守してお客様の個人情報を取り扱って参りますので、内容をご確認いただき、個人情報の取り扱いについてご同意いただきますようよろしくお願い申し上げます。</p>
						<p>＜個人情報の取り扱いに関する同意内容＞</p>

						<p>■ここで言う個人情報について<br/>
						ここで言う個人情報とはお問合せ・資料請求時にお知らせいただいたお客様の氏名、生年月日、住所、電話番号、メールアドレス等の情報をさします。</p>

						<p>■個人情報の収集・利用目的について<br/>
						お問合せの場合はそれに回答するため、資料請求の場合は資料をお届けするために使用するほか、お客様に各種ご案内をさせていただくために利用いたします。個人情報の提供はあくまで任意ですが、お知らせいただけない情報がある場合、お問い合わせや資料お届けにお答えできない場合がございます。</p>

						<p>■個人情報の管理について<br/>
						従業員に対しては法令・社内規定を遵守し秘密保持に十分な注意を払って個人情報を取り扱うよう教育と監査を実施します。個人情報を管理するにあたっては、不正アクセス、紛失、改ざん、破壊、漏えい等に対して組織的、技術的な安全対策を講じます。お客様の同意なしに個人情報を第三者へ開示することはありませんが、法令に基づき要請された場合や生命・健康・財産などの重大な利益を保護するために不可欠な場合は、この限りではないことをご了承ください。</p>

						<p>■個人情報の委託について<br/>
						個人情報の管理や試験処理等のためにお客様の個人情報の取り扱いを外部企業に委託することがあります。その場合は委託先が個人情報保護に関し十分な対策が取られていることを確認した上で行うものとします。</p>

						<p>■個人情報の開示・訂正・削除について<br/>
						当社はお客様の個人情報に関し、お客様本人から開示を求められたときはその内容を開示します。また、お客様から個人情報に関する修正・削除の要求があった場合、弊社の定める基準を満たしていることを条件として、すみやかに修正・削除をいたします。</p>
					</div>
				</div>

			</div></div>	<!--id="sec2Block"-->

		</div><!-- class="content-area contentBlock" -->

            <?php if ( $layout != 'no-sidebar' ) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>

	</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>
