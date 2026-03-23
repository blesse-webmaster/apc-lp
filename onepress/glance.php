<?php
/*
Template Name:glance
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

			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/glanceHead2.jpg" alt="会社概要 みらい住電株式会社"/>

		</div>	<!--id="topImgBlock"-->

		<div id="primary" class="content-area contentBlock">

<!--
			<section id="sec1Block" class="sec1Block"><div class="contentInnerBlock">
				<h2 class="h2Blue">対応エリア</h2>

				<div class="lineBlock flex_column shortWitdth">
					<figure class="w50">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/glanceMap.png?001" alt="対応エリア地図"></a>
						<figcaption class="notes">対応エリア地図</figcaption>
					</figure>
					<div class="w50">
						<div class="eriaListBlock">
							<ul>
							<li><span class="material-icons">place</span>宮城県</li>
							<li><span class="material-icons">place</span>福島県</li>
							<li><span class="material-icons">place</span>山形県</li>
							<li><span class="material-icons">place</span>岩手県</li>
							<li><span class="material-icons">place</span>青森県</li>
							<li><span class="material-icons">place</span>秋田県</li>
							</ul>
						</div>
					</div>
				</div>

			</div></section>	--><!--id="sec1Block"-->

			<section id="sec2Block" class="sec2Block"><div class="contentInnerBlock">

				<h2 class="h2Blue">会社概要</h2>
				<div class="lineBlock shortWitdth">
					<table class="glaceTbl">
					<tr>
						<th>商号</th><td>APCハウジング株式会社</td>
					</tr>
					<tr>
						<th>代表取締役</th><td>大村　淳</td>
					</tr>
					<tr>
						<th>創業年月日</th><td>平成31年4月25日</td>
					</tr>
					<tr>
						<th>設立年月日</th><td>平成31年4月25日</td>
					</tr>
					<tr>
						<th>資本金</th><td>46,000,000円</td>
					</tr>
					<tr>
						<th>業務内容</th><td>住宅リフォーム全般、太陽光発電システムの販売・施工、蓄電システムの販売・施工、省エネ機器の販売・施工</td>
					</tr>
					<tr>
						<th>営業時間</th><td>10:00-18:00</td>
					</tr>
					<tr>
						<th>休業日</th><td>土・日・祝</td>
					</tr>
					<tr>
						<th>APCハウジング株式会社本社</th>
						<td>■所在地<br>　〒299-0111　千葉県市原市姉崎1188-3-2
						<br>■TEL<br>　0436-26-7554
						</td>
					</tr>
					<tr>
						<th>千葉支社</th>
						<td>■所在地<br>　〒277-0832　千葉県柏市北柏3-1-8　染谷ビル5F-C号室
						<br>■TEL<br>　050-5526-1046
						<br>■FAX<br>　04-7167-7130
						<br>■フリーダイヤル<br>　0120-541-353
						</td>
					</tr>
					<tr>
						<th>東京支社</th>
						<td>■所在地<br>　〒133-0056　東京都江戸川区南小岩8-17-4　ラメール吉崎1F
						</td>
					</tr>
					<tr>
					    <th>仙台支社</th>
						<td>■所在地<br>　〒989-3204　宮城県仙台市青葉区南吉成3-16-7　恵泉ビル2F
						<br>■TEL<br>　022-725-7158
						<br>■FAX<br>　022-725-7159
						<br>■フリーダイヤル<br>　0120-792-157
					</tr>
					<tr>
					<th>対応エリア</th><td>青森、秋田、岩手、山形、宮城、福島
						<br>栃木、茨城、群馬、埼玉、東京、千葉、神奈川、山梨</td>
					</tr>				
					<tr>
						<th>ホームページ</th><td>https://apc-housing.co.jp/</td>
					</tr>						
					</table>
				</div>

			</div></section>	<!--id="sec2Block"-->

			<section id="sec3Block" class="sec3Block"><div class="contentInnerBlock bgWhite">

				<h2 class="h2Blue">本社マップ</h2>
				<div class="lineBlock alignCenter">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3248.7646274304034!2d140.05188111133856!3d35.48536697253698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60229ea5db0e3121%3A0x7076fc63f7fe6004!2z77yI5qCq77yJ44Ko44O844OU44O844K344O844Oh44Oz44OG44OK44Oz44K5!5e0!3m2!1sja!2sjp!4v1749107196906!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				</div>

				<h2 class="h2Blue">千葉支社マップ</h2>
				<div class="lineBlock alignCenter">
					<iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3232.9528266851207!2d139.98614731130635!3d35.87467287241082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60189d106da6baa1%3A0x7a66732afd3d1f73!2z44CSMjc3LTA4MzIg5Y2D6JGJ55yM5p-P5biC5YyX5p-P77yT5LiB55uu77yR4oiS77yYIOafk-iwt-ODk-ODqyA1Zixj!5e0!3m2!1sja!2sjp!4v1751107057893!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				</div>

				<h2 class="h2Blue">仙台支社マップ</h2>
				<div class="lineBlock alignCenter">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3131.5932502995906!2d140.81719561142003!3d38.288920671743085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f8a29f42cc2119b%3A0x5f7cece016d44131!2z44CSOTg5LTMyMDQg5a6u5Z-O55yM5LuZ5Y-w5biC6Z2S6JGJ5Yy65Y2X5ZCJ5oiQ77yT5LiB55uu77yR77yWIOaBteazieODk-ODqyAyZg!5e0!3m2!1sja!2sjp!4v1751107114175!5m2!1sja!2sjp"  width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				</div>
				
			</div></section>	<!--id="sec3Block"-->


		</div><!--class="content-area contentBlock" -->

            <?php if ( $layout != 'no-sidebar' ) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>

	</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>