<?php
// ---------------------------　設定　------------------------------------

/* フォームの入力項目（必須項目のチェックや形式のチェックなど）
* 'required' => true の場合は必須項目であるため、空の場合はエラーになるようにする
* 'required' => false の場合は必須項目ではないため、空でもエラーにならないようにする
* 'pattern' => '/正規表現/' の場合は、入力値が正規表現にマッチするかどうかをチェックする
* 'maxlength' => 数字 の場合は、入力値の最大文字数を指定する（例: 'maxlength' => 20 の場合は、20文字まで入力可能）
* maxlengthはセキュリティ上必ず設定してください。
*/
$fields = [
    '物件種別' => ['required' => false, 'maxlength' => 50],
    '郵便番号' => ['required' => false, 'maxlength' => 8, 'pattern' => '/^\d{3}-\d{4}$/'],
    '都道府県' => ['required' => false, 'maxlength' => 10],
    '市区町村' => ['required' => false, 'maxlength' => 50],
    '町名' => ['required' => false, 'maxlength' => 50],
    '丁目番地' => ['required' => false, 'maxlength' => 50],
    '専有面積' => ['required' => false, 'maxlength' => 10, 'pattern' => '/^\d+(\.\d+)?$/'],
    '部屋数' => ['required' => false, 'maxlength' => 10],
    '間取りタイプ' => ['required' => false, 'maxlength' => 10],
    'お名前' => ['required' => true, 'maxlength' => 20],
    '電話番号' => ['required' => true, 'maxlength' => 20, 'pattern' => '/^\d{2,5}-\d{1,4}-\d{4}$/'],
    'メールアドレス' => ['required' => true, 'maxlength' => 100, 'pattern' => '/^[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[A-Za-z]{2,}$/u'],
    'プライバシーポリシー同意' => ['required' => true, 'maxlength' => 20]
];

//フォーム名
$form_name = "お問い合わせフォーム";

//管理者のメールアドレス（送信先）
$admin_mail = "info@bless-e.com";

//送信元（差出人）メールアドレス（ドメインで利用しているメール）
$from = "admin@bless-e.com";

//送信元（差出人）名
$from_name = "株式会社〇〇〇〇〇";

// メールタイトル（件名）管理者宛
$subject_admin = "【サービス名】お問い合わせがありました";

// メールタイトル（件名）ユーザー宛
$subject = "【サービス名】お問い合わせありがとうございます";

// ドメイン
$Referer_check_domain = "nishiowari-fudousan-total-support.com";

// 送信完了後に表示するページURL（基本設定ではpage-thanks.phpが用意されている。デザインは固定ページかpage-thanks.phpを修正する）
$thanksPage = home_url() . '/thanks';

//管理者宛ての文言
$admin_body = <<< TEXT

LP（URL）の査定フォームよりお問い合わせがありました。
下記内容をご確認ください。

----------------------------------------
■物件情報
　物件種別：{{物件種別}}
　郵便番号：{{郵便番号}}
　住所：{{都道府県}}{{市区町村}}{{町名}}{{丁目番地}}
　専有面積：{{専有面積}}
　間取り：{{間取りタイプ}}

■お客様情報
　お名前：{{お名前}}
　電話番号：{{電話番号}}
　メールアドレス：{{メールアドレス}}

----------------------------------------

本お問い合わせはLPの査定フォームより送信されています。

TEXT;

//自動返信メールの冒頭の文言 ※日本語部分のみ変更可
$remail_text = <<< TEXT

この度は、不動産査定のご依頼をいただき
誠にありがとうございます。

以下の内容にてお問い合わせを受け付けいたしました。

----------------------------------------
■ご入力内容

物件種別：{{物件種別}}
郵便番号：{{郵便番号}}
住所：{{都道府県}}{{市区町村}}{{町名}}{{丁目番地}}
専有面積：{{専有面積}}
間取り：{{間取りタイプ}}

お名前：{{お名前}}
電話番号：{{電話番号}}
メールアドレス：{{メールアドレス}}
----------------------------------------

内容を確認のうえ、担当者より
改めてご連絡させていただきます。

通常1～2営業日以内にご連絡いたしますので、
今しばらくお待ちください。

なお、数日経っても連絡がない場合は
メールが正常に届いていない可能性がございます。
その際はお手数ですが下記までご連絡ください。

TEXT;

//署名（フッター）
$mailSignature = <<< FOOTER

──────────────────────
株式会社〇〇〇〇〇
〒000-0000 東京都〇〇〇〇〇〇〇10-2 
営業時間： 10：00～18：00
定休日： 毎週　水曜日
TEL 00-0000-0000
URL: https://xxxxxx.com/
──────────────────────

FOOTER;

$mail_host       = 'sv14435.xserver.jp';       // サーバーのホスト名 サーバー情報に記載されている
$mail_username   = 'info@wep-bls.com';     // ユーザー名　サーバー情報に記載されている
$mail_password   = 'blesse1192';     // パスワード　サーバー情報に記載されている
$mail_secure     = 'tls';               // 暗号化方式（tls または ssl）エックスサーバーはこのままでよい
$mail_port       = 587;                 // 使用するポート（通常 587）エックスサーバーはこのままでよい

// ---------------------------　設定　ここまで------------------------------------
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>太陽光発電</title>
    <meta name="description" content="太陽光発電のお悩み、お困りごと、何でもご相談ください。エーピーシーメンテナンスが責任をもって対応いたします！">

    <link rel="stylesheet" type="text/css" href="./lp_assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./lp_assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="./lp_assets/css/base.css">
    <link rel="stylesheet" type="text/css" href="./lp_assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="./lp_assets/css/add.css">
    <link rel="icon" href="./lp_assets/img/favicon.ico" sizes="32x32">
    <link rel="icon" href="./lp_assets/img/icon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="./lp_assets/img/apple-touch-icon.png">

</head>

<body>
    <!-- ヘッダここから -->
    <header>
        <!-- <div class="d-flex justify-content-end">
      <span class="m-0 f10px">【PR】</span>
      <h1 class="m-0 me-2 f12px"><span class="site_name">[比較メディアサイト名]</span> | キャッチフレーズ</h1>
    </div> -->
        <div class="position-fixed w-100 header-nav" style="z-index:1000;">
            <nav class="navbar navbar-expand-lg navbar-light py-0">
                <div class="container-fluid" style="--bs-gutter-x: 0;">
                    <div class="w-100">
                        <div class="text-end">
                            <button class="btn-hamburger navbar-toggler border-0 rounded-0 py-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="btn-hamburger-icon navbar-toggler-icon"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse justify-content-between align-items-center pt-3 pb-2 mx-3 mx-xxl-5 px-2 " id="navbarNavDropdown">
                            <a class="nav-link fw-bold fs-6 py-2 text-black d-none d-lg-block text-shadow_white site_name" aria-current="page" href="/">
                                <picture>
                                    <source type="image/webp" srcset="./lp_assets/img/top-logo.webp">
                                    <img src="./lp_assets/img/top-logo.png" loading="lazy" alt="エーピーシーグループ" height="60" width="230" class="img-fluid">
                                </picture>
                            </a>
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item text-center mb-3 mb-lg-0 d-block d-lg-none">
                                    <a class="nav-link fw-bold fs-6 py-2 text-black site_name" aria-current="page" href="/">
                                        <picture>
                                            <source type="image/webp" srcset="./lp_assets/img/top-logo.webp">
                                            <img src="./lp_assets/img/top-logo.png" loading="lazy" alt="エーピーシーグループ" height="60" width="280" class="img-fluid">
                                        </picture>
                                    </a>
                                </li>
                                <li class="nav-item text-center mb-3 mb-lg-0 pb-3">
                                    <div class="nav-link fw-bolder lh-sm py-0 text-shadow_white" href="tel:01200002222">
                                        <span class="f12px">営業時間 10:00～18:00</span><br>
                                        千葉支社
                                        <picture>
                                            <source type="image/webp" srcset="./lp_assets/img/icon-tel.webp">
                                            <img src="./lp_assets/img/icon-tel.png" loading="lazy" alt="電話" height="20" width="20" class="img-fluid">
                                        </picture>
                                        0120-541-353<br>

                                        仙台支社
                                        <picture>
                                            <source type="image/webp" srcset="./lp_assets/img/icon-tel.webp">
                                            <img src="./lp_assets/img/icon-tel.png" loading="lazy" alt="電話" height="20" width="20" class="img-fluid">
                                        </picture>
                                        0120-792-157
                                    </div>
                                </li>
                                <li class="nav-item text-center mb-3 mb-lg-0">
                                    <a class="nav-link fw-bolder lh-sm py-0 text-shadow_white" href="#section04">
                                        <picture>
                                            <source type="image/webp" srcset="./lp_assets/img/top-btn.webp">
                                            <img src="./lp_assets/img/top-btn.png" loading="lazy" alt="無料でお問い合わせはこちら" height="66" width="200" class="img-fluid hover-float">
                                        </picture>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- ヘッダここまで -->

    <!-- 戻るボタン -->
    <div class="position-sticky z-99  end-0 top-60">
        <a class="position-absolute end-0" href="#">
            <picture>
                <source type="image/webp" srcset="./lp_assets/img/t_btn_top.webp">
                <img src="./lp_assets/img/t_btn_top.png" loading="lazy" alt="戻るボタン" height="70" width="70" class="img-fluid">
            </picture>
        </a>
    </div>

    <!-- @フローティングバナー ここから -->
    <!-- フローティングバナー -->
    <!-- <div class="position-fixed end-0 bottom-0 z-999">
    <button id="closeButton" class="banner-close position-absolute fw-bold z-99">×</button>
    <a class="myImage" href="" target="_blank">
      <picture class="d-none d-lg-block">
        <source type="image/webp" srcset="./lp_assets/img/floting_banner.webp">
        <img class="img-fluid banner-icon myImage" src="./lp_assets/img/floting_banner.png" alt="公式HPで詳しく見る" loading="lazy" width="400" height="310">
      </picture>
      <picture class="d-block d-lg-none">
        <source type="image/webp" srcset="./lp_assets/img/floting_banner.webp">
        <img class="img-fluid banner-icon myImage" src="./lp_assets/img/floting_banner.png" alt="公式HPで詳しく見る" loading="lazy" width="400" height="310">
      </picture>
    </a>
  </div> -->
    <!-- @フローティングバナー ここまで -->

    <main class="container-fluid p-0">


        <!-- @コンテンツエリア ここから -->
        <!-- ファーストビュー -->
        <div class="bg-fv position-relative">
            <div class="container">
                <div class="row py-4 py-lg-5">
                    <!-- 左側:メインタイトル画像 -->
                    <div class="col-12 col-md-8 mt-4 mt-lg-5 justify-content-start mt-50-100">
                        <!-- 参考ににしたバナー画像 -->
                        <picture class="mb-0">
                            <source type="image/webp" srcset="./lp_assets/img/t_fv_title.webp">
                            <img src="./lp_assets/img/t_fv_title.png" loading="lazy" alt="埼玉県で太陽光発電 失敗しない 業者選び のコツを 徹底解説" class="img-fluid" width="600" height="400">
                        </picture>
                        <picture class="mb-4">
                            <source type="image/webp" srcset="./lp_assets/img/t_fv_lead.webp">
                            <img src="./lp_assets/img/t_fv_lead.png" loading="lazy" alt="太陽光発電のお悩み、何でもご相談ください。エーピーシーハウジングが責任をもって対応いたします！" class="img-fluid" width="600" height="400">
                        </picture>
                        <!-- <div class="text-lg-center text-shadow-white mt-3 mt-lg-0">
              <p class="mb-0 text-shadow-white">太陽光発電のお悩み、お困りごと、<br class="d-block d-lg-none">何でもご相談ください。</p>
              <p class="text-shadow-white">エーピーシーハウジングが責任をもって<br class="d-block d-lg-none">対応いたします！</p>
            </div> -->
                    </div>

                </div>
            </div>

        </div>

        <section id="section01" class="section01 py-5">
            <div class="section01-inner container position-relative">
                <h2 class="section01-heading text-center fs-3 lh-base first-label-wrap">
                    <span class="first-label">まずは</span>
                    <span class="fs-1 border-bottom-block-3">相談したい方</span>から、<br class="d-block d-lg-none">
                    <span class="fs-1 border-bottom-block-3">見積もりが欲しい方</span>まで<br>
                    <span class="fs-1 border-bottom-block-3">太陽光発電を既に<br class="d-block d-lg-none">設置済みの方</span>も<br>
                    <span class="fs-1">お気軽にご相談ください</span>
                </h2>
                <div class="row align-items-center mb-4 mb-lg-5">
                    <div class="col-12 col-lg-5 mb-4 mb-lg-0">
                        <picture>
                            <source type="image/webp" srcset="./lp_assets/img/section-01-01.webp">
                            <img src="./lp_assets/img/section-01-01.png" alt="相談したい方から見積もりが欲しい方まで" class="img-fluid section01-image" loading="lazy">
                        </picture>
                    </div>
                    <div class="col-12 col-lg-7 bg-white py-4 px-2 p-lg-4 opacity-90">
                        <ul class="section01-checklist">
                            <li>太陽光を設置したが、点検やメンテナンスをしたことがない</li>
                            <li>エラー表示や不具合が出たことがある</li>
                            <li>設置して何年も経つが、このままで大丈夫か不安</li>
                            <li>新築・リフォームで太陽光を検討している</li>
                            <li>自宅に設置できるか分からない</li>
                            <li>費用や工事内容の目安だけ知りたい</li>
                            <li>他社で設置した太陽光でも相談できるか知りたい</li>
                            <li>見積もりを取る前に一度話を聞いてみたい</li>
                        </ul>
                    </div>
                </div>
                <div class="section02-content d-flex justify-content-center">
                    <a href="#section04" class="hover-float">
                        <picture>
                            <source type="image/webp" srcset="./lp_assets/img/section-02-03.webp">
                            <img src="./lp_assets/img/section-02-03.png" alt="無料で相談できます！" class="img-fluid section01-image" loading="lazy" width="700" height="130">
                        </picture>
                    </a>
                </div>
            </div>
        </section>

        <section id="section03" class="p-2 bg_blue">
            <div class="container p-4 px-lg-4 py-lg-5">
                <div class="text-center mb-4 section03-title">
                    <picture class="title-deco left d-none d-lg-block">
                        <source srcset="./lp_assets/img/section-03-01.webp" type="image/webp">
                        <img src="./lp_assets/img/section-03-01.png" alt="斜めの装飾" width="20" height="20">
                    </picture>
                    <h2 class="white fs-2 fw-bold title-main">
                        簡単<span class="fs-1 yellow">1</span><span class="fs-4 yellow">分</span>で入力完了
                        <span class="title-ex">！</span><br class="d-block d-lg-none">
                        お気軽にどうぞ
                    </h2>
                    <picture class="title-deco right d-none d-lg-block">
                        <source srcset="./lp_assets/img/section-03-02.webp" type="image/webp">
                        <img src="./lp_assets/img/section-03-02.png" alt="斜めの装飾" class="img-fluid" width="20" height="20">
                    </picture>
                </div>
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <picture>
                                    <source type="image/webp" srcset="./lp_assets/img/section-03-03.webp">
                                    <img src="./lp_assets/img/section-03-03.png" alt="メール" class="img-fluid" loading="lazy" width="120" height="120">
                                </picture>
                            </div>
                            <div class="col-9 mb-4 mb-lg-0">
                                <p class="fs-6 white mb-3 mb-lg-0">上記に当てはまらない内容でも<br class="d-none d-lg-block">お気軽にご相談ください</p>
                                <small class="white f12px">無理な営業や、いきなりの契約案内は<br class="d-block d-lg-none">行っていません。</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <a href="https://line.me/R/ti/p/@811awnmg" target="_blank" class="hover-float">
                            <picture>
                                <source type="image/webp" srcset="./lp_assets/img/section-03-05.webp">
                                <img src="./lp_assets/img/ssection-03-05.png" alt="LINEからのお問い合わせはこちら" class="img-fluid section01-image" loading="lazy" width="380" height="100">
                            </picture>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="section04" class="section04 py-5">
            <div class="container section04-wrapper">
                <div class="section04-header text-center mb-4 mb-lg-5">
                    <h2 class="section04-title">お問い合わせ</h2>
                    <p class="section04-subtitle">お急ぎの方は以下のフォームより<br class="d-block d-lg-none">お問い合わせください。<br><span class="text-danger">※「*」は必須項目です。</span></p>
                </div>

                <form class="section04-form form-responsive" action="#" method="post">
                    <div class="section04-row">
                        <div class="section04-label">ご相談内容</div>
                        <div class="section04-input section04-radio-group">
                            <label><input type="radio" name="purpose" value="inspection" checked> 点検・メンテナンスのご相談</label>
                            <label><input type="radio" name="purpose" value="installation"> 設置・工事のご相談</label>
                            <label><input type="radio" name="purpose" value="other"> その他のお問い合わせ</label>
                        </div>
                    </div>

                    <div class="section04-row">
                        <div class="section04-label">郵便番号</div>
                        <div class="section04-input">
                            <input type="text" name="zipcode" class="form-control" placeholder="例）000-0000" maxlength="8">
                        </div>
                    </div>

                    <div class="section04-row">
                        <div class="section04-label">お名前 <span class="text-danger">*</span></div>
                        <div class="section04-input section04-flex">
                            <input type="text" name="lastname" class="form-control" placeholder="例）山田" required>
                            <input type="text" name="firstname" class="form-control" placeholder="例）太郎" required>
                        </div>
                    </div>

                    <div class="section04-row">
                        <div class="section04-label">電話番号 <span class="text-danger">*</span></div>
                        <div class="section04-input">
                            <input type="tel" name="phone" class="form-control" placeholder="例）090-1111-2233" required>
                        </div>
                    </div>

                    <div class="section04-row">
                        <div class="section04-label">メールアドレス <span class="text-danger">*</span></div>
                        <div class="section04-input">
                            <input type="email" name="email" class="form-control" placeholder="例）info@example.com" required>
                        </div>
                    </div>

                    <div class="section04-checkboxes mt-4 mt-lg-5 mb-4">
                        <label><input type="checkbox" name="agree" required> 個人情報保護方針に同意します。</label>
                        <label><input type="checkbox" name="newsletter"> メールマガジンを受信する</label>
                    </div>

                    <p class="section04-alert">送信前に内容を確認してください。</p>

                    <div class="text-center">
                        <button type="submit" class="btn section04-submit">送信する</button>
                    </div>
                </form>
            </div>
        </section>

        <!-- @コンテンツエリア ここまで -->

    </main>
    <!-- コンテンツここまで -->

    <!-- フッタここから -->
    <footer class="p-0 bg_blue">
        <div class="container">
            <div class="pt-4 pt-lg-4 border-bottom-white-1px">
                <div class="row mb-lg-2">
                    <div class="col-12 col-lg-5">
                        <div class="border-bottom-white-1px">
                            <a class="nav-link fw-bold fs-6 py-2" aria-current="page" href="/">
                                <!-- <picture>
                              <source type="image/webp" srcset="./lp_assets/img/top-logo.webp">
                              <img src="./lp_assets/img/top-logo.png" loading="lazy" alt="エーピーシーグループ" height="40" width="130" class="img-fluid">
                            </picture> -->
                                <span class="white">　APCハウジング株式会社</span>
                            </a>
                        </div>
                        <ul class="nav d-flex flex-column mt-3">
                            <li class="nav-item mb-3 mb-lg-0 pb-3">
                                <div class="nav-link fw-bolder lh-sm py-0 white">
                                    〒299-0111　千葉県市原市姉崎1188-3-2<br>
                                    千葉支社
                                    <!-- <picture>
                                <source type="image/webp" srcset="./lp_assets/img/icon-tel.webp">
                                <img src="./lp_assets/img/icon-tel.png" loading="lazy" alt="電話" height="20" width="20" class="img-fluid">
                              </picture> -->
                                    　0120-541-353<br>

                                    仙台支社
                                    <!-- <picture>
                                <source type="image/webp" srcset="./lp_assets/img/icon-tel.webp">
                                <img src="./lp_assets/img/icon-tel.png" loading="lazy" alt="電話" height="20" width="20" class="img-fluid">
                              </picture>  -->
                                    　0120-792-157
                                    <br>
                                    <p>営業時間　10:00～18:00</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-3">
            <div class="container">
                <div class="d-flex flex-column flex-lg-row justify-content-lg-between py-4">
                    <ul class="nav">
                        <li class="nav-item mb-2 me-3"><a href="https://www.apc-maintenance.com/privacy" target="_blank" class="nav-link p-0 white">プライバシーポリシー</a></li>
                        <li class="nav-item mb-2 me-3"><a href="https://apc-housing.co.jp/glance/" target="_blank" class="nav-link p-0 white">会社概要</a></li>
                    </ul>
                    <p class="small white">&copy; Copyright APCハウジング株式会社 All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- フッタここまで -->

    <!-- <footer class="p-0 bg-blue" id="footer">
    <div class="container py-4 text-center">
      <p class="text-white small mb-0">© <span class="site_name">[比較メディアサイト名]</span></p>
    </div>
  </footer> -->

    <script src="./lp_assets/js/jquery.min.js"></script>
    <script>
        // 内部リンククリック時にハンバーガーメニューを閉じる
        $(function() {
            $('a[href^="#"]').on('click', function() {
                // スクロール処理
                var adjust = -80;
                var speed = 200;
                var href = $(this).attr("href");
                var target = $(href == "#" || href == "" ? 'html' : href);
                var position = target.offset().top + adjust;
                $('body,html').animate({
                    scrollTop: position
                }, speed, 'swing');

                // ハンバーガーメニューが開いている場合は閉じる
                if ($('.navbar-collapse').hasClass('show')) {
                    $('.navbar-toggler').trigger('click');
                }
                return false; // ページ遷移を防ぐ
            });
        });
        // ヘッダー背景変更
        $(function() {
            $(window).on('scroll', function() {
                if ($('.header-nav').height() < $(this).scrollTop()) {
                    $('.header-nav').addClass('change-color');
                } else {
                    $('.header-nav').removeClass('change-color');
                }
            });
        });
        // ハンバーガーメニュークリック時にメニューを閉じる
        const ham = $('.btn-hamburger');
        const nav = $('#navbarNavDropdown');
        ham.on('click', function() { //ハンバーガーメニューをクリックしたら
            ham.toggleClass('active'); // ハンバーガーメニューにactiveクラスを付け外し
            nav.toggleClass('active'); // ナビゲーションメニューにactiveクラスを付け外し
            $('.header-nav').toggleClass('bg-white-on'); // 変更: 背景色専用クラスを付与
        });
        $('.nav-item').not('.dropdown').on('click', function(event) {
            ham.trigger('click');
        });

        // ドロップダウンメニュー以外をクリックしたらメニューが閉じる
        $(document).ready(function() {
            $(document).click(function(event) {
                var clickover = $(event.target);
                var _opened = $(".navbar-collapse").hasClass("show");
                if (_opened === true && !clickover.closest(".navbar").length) {
                    $(".navbar-toggler").click();
                }
            });
        });

        //   フローティングバナー
        $(function() {
            $(document).ready(function() {
                $('.banner-close').click(function() {
                    $(this).parent().hide();
                });
            });
        });

        window.onload = init();

        function init() {
            const accordion_items = document.querySelectorAll(".accordion_title");
            for (var i = 0; i < accordion_items.length; i++) {
                accordion_items[i].addEventListener("click", function() {
                    this.nextElementSibling.classList.toggle("show");
                    this.classList.toggle("active");
                    if (this.classList.contains("active")) {
                        this.nextElementSibling.style.height =
                            // 40は余白分
                            this.nextElementSibling.children[0].clientHeight + 40 + "px";
                    } else {
                        this.nextElementSibling.style.height = 0;
                    }
                });
            }
        }
    </script>

    <script async src="./lp_assets/js/bootstrap.bundle.min.js"></script>
    <script src="./setting.js"></script>

</body>

</html>

<?php
get_header();

// フォームの処理を行うファイルを読み込む
require_once get_theme_file_path() . '/form-function.php';
?>

<!-- コンテンツここから -->
<?php the_content(); ?>
<!-- コンテンツここまで -->

<!-- 以下フォーム -->

<form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="post" id="mailform" class="h-adr">

    <?php if ($view === 'input') : ?>
        <!-- 以下入力画面 -->
        <input type="hidden" name="mode" value="confirm_form" id="mode">
        <input type="hidden" class="p-country-name" value="Japan">

        <!-- 物件種別 -->
        <div class="row align-items-center form-row-custom">
            <div class="col-md-4 form-label-cell">
                <label class="col-form-label">物件種別</label>
            </div>
            <div class="col-md-8">
                <select name="物件種別" class="form-select mt-3 form-short py-2 border-0" aria-label="物件種別を選択">
                    <option value="" selected>物件種別を選択</option>
                    <option value="一戸建て">一戸建て</option>
                    <option value="マンション">マンション</option>
                    <option value="土地">土地</option>
                    <option value="その他">その他</option>
                </select>
                <div id="物件種別-error" class="red"></div>
            </div>
        </div>

        <!-- 郵便番号 -->
        <div class="row align-items-center form-row-custom">
            <div class="col-md-4 form-label-cell">
                <label class="col-form-label">ご売却物件の郵便番号</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="郵便番号" class="form-control mt-3 form-short py-2 border-0 color-gray p-postal-code" placeholder="例）000-0000">
                <div id="郵便番号-error" class="red"></div>
            </div>
        </div>

        <!-- ご住所 -->
        <div class="row align-items-start form-row-custom">
            <div class="col-md-4 form-label-cell">
                <label class="col-form-label">ご売却物件のご住所</label>
            </div>
            <div class="col-md-8 form-address-group mt-3">
                <select name="都道府県" class="form-select mb-2 form-short py-2 border-0 p-region" aria-label="都道府県">
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都">東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県" selected>愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                </select>
                <div id="都道府県-error" class="red"></div>

                <input type="text" name="市区町村" class="form-control w-80 py-2 border-0 color-gray p-locality" placeholder="市区町村">
                <div id="市区町村-error" class="red"></div>

                <input type="text" name="町名" class="form-control w-80 py-2 border-0 color-gray p-street-address" placeholder="町名">
                <div id="町名-error" class="red"></div>

                <input type="text" name="丁目番地" class="form-control w-80 py-2 border-0 color-gray p-extended-address" placeholder="丁目・番地">
                <div id="丁目番地-error" class="red"></div>

            </div>
        </div>

        <!-- 専有面積 -->
        <div class="row align-items-center form-row-custom">
            <div class="col-md-4 form-label-cell">
                <label class="col-form-label">専有面積（㎡）</label>
            </div>
            <div class="col-md-8">
                <input type="number" name="専有面積" class="form-control w-80 py-2 mt-3 border-0 color-gray" placeholder="例）20㎡">
                <div id="専有面積-error" class="red"></div>
            </div>
        </div>

        <!-- 間取り（部屋数・タイプ） -->
        <div class="row align-items-center form-row-custom">
            <div class="col-md-4 form-label-cell">
                <label class="col-form-label">間取り（部屋数・タイプ）</label>
            </div>
            <div class="col-md-8 d-flex gap-2 form-madori">
                <select name="部屋数" class="form-select me-2 mt-3 mb-3 py-2 form-short form-short-top">
                    <option value="" selected>部屋数を選択</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5以上">5以上</option>
                </select>
                <select name="間取りタイプ" class="form-select mt-3 mb-3 py-2 form-short form-short-bottom">
                    <option value="" selected>間取りタイプを選択</option>
                    <option value="1R">1R</option>
                    <option value="1K">1K</option>
                    <option value="1LDK">1LDK</option>
                    <option value="2LDK">2LDK</option>
                    <option value="その他">その他</option>
                </select>
                <div id="部屋数-error" class="red"></div>
                <div id="間取りタイプ-error" class="red"></div>

            </div>
        </div>

        <!-- お名前 -->
        <div class="row align-items-center form-row-custom">
            <div class="col-md-4 form-label-cell">
                <label class="col-form-label">お名前</label>
                <span class="required-badge">必須</span>
            </div>
            <div class="col-md-8">
                <input type="text" required name="お名前" class="form-control mt-3 py-2 w-80 color-gray" placeholder="例）山田 太郎">
                <div id="お名前-error" class="red"></div>
            </div>
        </div>

        <!-- 電話番号 -->
        <div class="row align-items-center form-row-custom">
            <div class="col-md-4 form-label-cell">
                <label class="col-form-label">電話番号</label>
                <span class="required-badge">必須</span>
            </div>
            <div class="col-md-8">
                <input id="tel" type="tel" required name="電話番号" class="form-control mt-3 py-2 w-80 color-gray" placeholder="例）090-1111-2233">
                <div id="電話番号-error" class="red"></div>
            </div>
        </div>

        <!-- メールアドレス -->
        <div class="row align-items-center form-row-custom mb-5">
            <div class="col-md-4 form-label-cell">
                <label class="col-form-label">メールアドレス</label>
                <span class="required-badge">必須</span>
            </div>
            <div class="col-md-8">
                <input type="email" required name="メールアドレス" class="form-control mt-3 py-2 w-80 color-gray" placeholder="例）info@example.com">
                <div id="メールアドレス-error" class="red"></div>
            </div>
        </div>

        <!-- プライバシー同意 -->
        <div class="privacy-row">
            <input name="プライバシーポリシー同意" type="hidden" value="同意しない">
            <input required name="プライバシーポリシー同意" class="form-check-input me-2 border-secondary" type="checkbox" value="同意する" id="privacyCheck">
            <label class="form-check-label" for="privacyCheck"><a href="https://www.inazawa-fudosan.com/privacy/" target="_blank" rel="nofollow">個人情報の取扱い</a>に同意します。</label>
            <div id="プライバシーポリシー同意-error" class="red"></div>
        </div>

        <!-- 送信ボタン -->
        <div class="text-center">
            <p class="fw-bold color-red text-send">ボタンを押すと内容が送信されます。<br class="d-lg-none">送信前に内容に間違いがないか<br class="d-block d-md-none">ご確認ください。</p>
            <button type="submit" class="btn-orange text-white fw-bold w-50 rounded py-4 px-2 fs-2 border-0">
                確認する
                <span class="arrow">
                    <picture>
                        <source type="image/webp" srcset="<?php echo get_theme_file_uri(); ?>/assets/img/y_icon_yazirushi.webp">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/img/y_icon_yazirushi.png" alt="矢印" height="20" width="20">
                    </picture>
                </span>
            </button>
        </div>

        <!-- CSRF対策 -->
        <?php wp_nonce_field('action_input', 'nonce_field_input'); ?>

    <?php endif; ?>

    <?php if ($view === 'confirm') : ?>
        <!-- 以下確認画面 -->

        <!-- 物件種別 -->
        <div class="row align-items-center form-row-custom">
            <div class="col-md-4 form-label-cell">
                <label class="col-form-label">物件種別</label>
            </div>
            <div class="col-md-8 p-4 d-flex align-items-center h-100">
                <p class="m-0"><?php echo $_POST['物件種別']; ?></p>
            </div>
        </div>

        <!-- 郵便番号 -->
        <div class="row align-items-center form-row-custom">
            <div class="col-md-4 form-label-cell">
                <label class="col-form-label">ご売却物件の郵便番号</label>
            </div>
            <div class="col-md-8 p-4 d-flex align-items-center h-100">
                <p class="m-0"><?php echo $_POST['郵便番号']; ?></p>
            </div>
        </div>

        <!-- ご住所 -->
        <div class="row align-items-start form-row-custom">
            <div class="col-md-4 form-label-cell">
                <label class="col-form-label">ご売却物件のご住所</label>
            </div>
            <div class="col-md-8 p-4 d-flex align-items-center h-100">
                <p class="m-0"><?php echo $_POST['都道府県']; ?> <?php echo $_POST['市区町村']; ?> <?php echo $_POST['町名']; ?> <?php echo $_POST['丁目番地']; ?></p>
            </div>
        </div>

        <!-- 専有面積 -->
        <div class="row align-items-center form-row-custom">
            <div class="col-md-4 form-label-cell">
                <label class="col-form-label">専有面積（㎡）</label>
            </div>
            <div class="col-md-8 p-4 d-flex align-items-center h-100">
                <p class="m-0"><?php echo $_POST['専有面積']; ?></p>
            </div>
        </div>

        <!-- 間取り（部屋数・タイプ） -->
        <div class="row align-items-center form-row-custom">
            <div class="col-md-4 form-label-cell">
                <label class="col-form-label">間取り（部屋数・タイプ）</label>
            </div>
            <div class="col-md-8 p-4 d-flex align-items-center h-100">
                <p class="m-0">部屋数：<?php echo $_POST['部屋数']; ?>部屋 / 間取り：<?php echo $_POST['間取りタイプ']; ?></p>
            </div>
        </div>

        <!-- お名前 -->
        <div class="row align-items-center form-row-custom">
            <div class="col-md-4 form-label-cell">
                <label class="col-form-label">お名前</label>
                <span class="required-badge">必須</span>
            </div>
            <div class="col-md-8 p-4 d-flex align-items-center h-100 pt-3">
                <p class="m-0"><?php echo $_POST['お名前']; ?></p>
            </div>
        </div>

        <!-- 電話番号 -->
        <div class="row align-items-center form-row-custom">
            <div class="col-md-4 form-label-cell">
                <label class="col-form-label">電話番号</label>
                <span class="required-badge">必須</span>
            </div>
            <div class="col-md-8 p-4 d-flex align-items-center h-100">
                <p class="m-0"><?php echo $_POST['電話番号']; ?></p>
            </div>
        </div>

        <!-- メールアドレス -->
        <div class="row align-items-center form-row-custom mb-5">
            <div class="col-md-4 form-label-cell">
                <label class="col-form-label">メールアドレス</label>
                <span class="required-badge">必須</span>
            </div>
            <div class="col-md-8 p-4 d-flex align-items-center h-100">
                <p class="m-0"><?php echo $_POST['メールアドレス']; ?></p>
            </div>
        </div>

        <!-- プライバシー同意 -->
        <div class=" privacy-row">
            <p class="p-0">プライバシーポリシー同意：<?php echo $_POST['プライバシーポリシー同意']; ?></p>
        </div>

        <!-- 送信ボタン -->
        <div class="text-center">
            <p class="fw-bold color-red text-send">ボタンを押すと内容が送信されます。<br class="d-lg-none">送信前に内容に間違いがないか<br class="d-block d-md-none">ご確認ください。</p>
            <button onclick="update()" type="button" class="btn-gray text-white fw-bold w-30 rounded py-4 px-2 fs-2 border-0 me-3 mb-3">
                変更する
            </button>

            <button onclick="sendmail()" type="button" class="btn-orange text-white fw-bold w-30 rounded py-4 px-2 fs-2 border-0">
                送信する
                <span class="arrow">
                    <picture>
                        <source type="image/webp" srcset="<?php echo get_theme_file_uri(); ?>/assets/img/y_icon_yazirushi.webp">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/img/y_icon_yazirushi.png" alt="矢印" height="20" width="20">
                    </picture>
                </span>
            </button>

        </div>

        <?php if (isset($_POST['mode'])) : ?>
            <?php foreach ($_POST as $key => $value): ?>
                <input type="hidden" name="<?php echo esc_attr($key); ?>" value="<?php echo esc_attr($value); ?>">
            <?php endforeach; ?>
        <?php endif; ?>
        <input type="hidden" name="mode" value="confirm_form" id="mode">

    <?php endif; ?>

</form>


</div>
</div>
</section>

<!--コンテンツエリアここまで-->


</main>
<!-- コンテンツここまで -->

<script src="//cdnjs.cloudflare.com/ajax/libs/libphonenumber-js/1.1.10/libphonenumber-js.min.js"></script>
<script src="//yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
<script>
    <?php if (isset($_POST['mode'])) : ?>
        window.location.href = '#mailform';
    <?php endif; ?>

    <?php if ($view === 'input') : ?>
        <?php foreach ($_POST as $key => $value): ?>
            <?php if ($key !== 'mode'): ?>
                document.getElementsByName('<?php echo esc_attr($key); ?>')[0].value = '<?php echo esc_attr($value); ?>';
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if (!empty($validation_errors)): ?>
            <?php foreach ($validation_errors as $key => $errors): ?>
                <?php foreach ($errors as $error): ?>
                    document.getElementById('<?php echo esc_attr($key); ?>-error').innerText = '<?php echo esc_attr($error); ?>';
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>

    function update() {
        document.getElementById('mode').value = 'input_form';
        document.getElementById('mailform').submit();
    }

    function sendmail() {
        document.getElementById('mode').value = 'send_mail';
        document.getElementById('mailform').submit();
    }

    // 電話番号のバリデーションと整形
    window.addEventListener("load", function() {
        const inputTel = document.getElementById('tel'); //＝電話番号の入力欄
        if (!inputTel) {
            return false;
        }
        //電話番号の入力欄から離れたら発動
        inputTel.addEventListener('blur', () => {
            // バリデーション関数
            let validateTelNeo = function(value) {
                return /^[0０]/.test(value) && libphonenumber.isValidNumber(value, 'JP');
            }

            // 整形関数
            let formatTel = function(value) {
                return new libphonenumber.AsYouType('JP').input(value);
            }

            const postdata = inputTel.value; //入力した電話番号を取得
            //入力した内容がバリデーションに引っかかったときはエラー
            if (!validateTelNeo(postdata)) {
                console.log('ERROR')
                return
            }
            let formattedTel = formatTel(postdata); //入力した電話番号を整形
            console.log(formattedTel);
            inputTel.value = formattedTel; //整形した電話番号を入力欄に返す
        });
    });

    // 郵便番号の自動ハイフン挿入
    document.addEventListener('DOMContentLoaded', function() {

        // 郵便番号にハイフンを自動挿入する
        function insertStr(input) {
            return input.slice(0, 3) + '-' + input.slice(3);
        }

        const postalInput = document.getElementsByClassName('p-postal-code')[0] ||
            document.querySelector('input[name="郵便番号"]');

        if (!postalInput) {
            return;
        }

        // 入力時に郵便番号に自動でハイフンを付ける
        postalInput.addEventListener('keyup', function(e) {
            const input = postalInput.value;

            // 削除キーではハイフン追加処理を行わない（8:Backspace, 46:Delete）
            const key = e.keyCode || e.charCode;
            if (key === 8 || key === 46) {
                return;
            }

            // 3桁目に値が入ったら発動
            if (input.length === 3) {
                postalInput.value = insertStr(input);
            }
        });

        // フォーカスが外れた際、4桁目がハイフンかをチェックして不足時に挿入
        postalInput.addEventListener('blur', function() {
            const input = postalInput.value;

            if (input.length >= 3 && input.substr(3, 1) !== '-') {
                postalInput.value = insertStr(input);
            }
        });
    });
</script>

<?php
get_footer();
