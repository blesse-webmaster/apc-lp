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
    'ご相談内容' => ['required' => false, 'maxlength' => 50],
    '郵便番号' => ['required' => false, 'maxlength' => 8, 'pattern' => '/^\d{3}-\d{4}$/'],
    '姓' => ['required' => true, 'maxlength' => 20],
    '名' => ['required' => true, 'maxlength' => 20],
    'メールマガジン' => ['required' => false, 'maxlength' => 20],
    '電話番号' => ['required' => true, 'maxlength' => 20, 'pattern' => '/^\d{2,5}-\d{1,4}-\d{4}$/'],
    'メールアドレス' => ['required' => true, 'maxlength' => 100, 'pattern' => '/^[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[A-Za-z]{2,}$/u'],
    'プライバシーポリシー同意' => ['required' => true, 'maxlength' => 20]
];

//確認画面 1=確認画面あり 0=確認画面なし
$confirm = 0;

//フォーム名
$form_name = "お問い合わせフォーム";

//管理者のメールアドレス（送信先）
$admin_mail = "info@bless-e.com";

//送信元（差出人）メールアドレス（ドメインで利用しているメール）
$from = "admin@apc-housing.co.jp";

//送信元（差出人）名
$from_name = "APCハウジング株式会社";

// メールタイトル（件名）管理者宛
$subject_admin = "【サービス名】お問い合わせがありました";

// メールタイトル（件名）ユーザー宛
$subject = "【サービス名】お問い合わせありがとうございます";

// ドメイン
$Referer_check_domain = "apc-housing.co.jp";

// 送信完了後に表示するページURL（基本設定ではpage-thanks.phpが用意されている。デザインは固定ページかpage-thanks.phpを修正する）
$thanksPage = home_url() . '/lp/thanks';

//管理者宛ての文言
$admin_body = <<< TEXT

LP（URL）のフォームよりお問い合わせがありました。
下記内容をご確認ください。

----------------------------------------

　ご相談内容：{{ご相談内容}}
　郵便番号：{{郵便番号}}
　お名前：{{姓}} {{名}}
　電話番号：{{電話番号}}
　メールアドレス：{{メールアドレス}}
　メールマガジン：{{メールマガジン}}

----------------------------------------

本お問い合わせはLPのフォームより送信されています。

TEXT;

//自動返信メールの冒頭の文言 ※日本語部分のみ変更可
$remail_text = <<< TEXT

この度は、お問い合わせをいただき
誠にありがとうございます。

以下の内容にてお問い合わせを受け付けいたしました。

----------------------------------------

■ご入力内容

　ご相談内容：{{ご相談内容}}
　郵便番号：{{郵便番号}}
　お名前：{{姓}} {{名}}
　電話番号：{{電話番号}}
　メールアドレス：{{メールアドレス}}
　メールマガジン：{{メールマガジン}}

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
APCハウジング株式会社
〒299-0111　千葉県市原市姉崎1188-3-2
千葉支社 　0120-541-353
仙台支社 　0120-792-157
営業時間　10:00～18:00
──────────────────────

FOOTER;

$mail_host       = 'sv14435.xserver.jp';       // サーバーのホスト名 サーバー情報に記載されている
$mail_username   = 'info@wep-bls.com';     // ユーザー名　サーバー情報に記載されている
$mail_password   = 'blesse1192';     // パスワード　サーバー情報に記載されている
$mail_secure     = 'tls';               // 暗号化方式（tls または ssl）エックスサーバーはこのままでよい
$mail_port       = 587;                 // 使用するポート（通常 587）エックスサーバーはこのままでよい

// ---------------------------　設定　ここまで------------------------------------

// フォームの処理を行うファイルを読み込む
require_once get_theme_file_path() . '/form-function.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?php wp_head(); ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>太陽光発電</title>
    <meta name="description" content="太陽光発電のお悩み、お困りごと、何でもご相談ください。エーピーシーメンテナンスが責任をもって対応いたします！">

    <link rel="stylesheet" type="text/css" href="<?php echo get_theme_file_uri(); ?>/lp_assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_theme_file_uri(); ?>/lp_assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_theme_file_uri(); ?>/lp_assets/css/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_theme_file_uri(); ?>/lp_assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_theme_file_uri(); ?>/lp_assets/css/add.css">
    <link rel="icon" href="<?php echo get_theme_file_uri(); ?>/lp_assets/img/favicon.ico" sizes="32x32">
    <link rel="icon" href="<?php echo get_theme_file_uri(); ?>/lp_assets/img/icon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="<?php echo get_theme_file_uri(); ?>/lp_assets/img/apple-touch-icon.png">

</head>

<body>
    <!-- ヘッダここから -->
    <header>
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
                                    <source type="image/webp" srcset="<?php echo get_theme_file_uri(); ?>/lp_assets/img/top-logo.webp">
                                    <img src="<?php echo get_theme_file_uri(); ?>/lp_assets/img/top-logo.png" loading="lazy" alt="エーピーシーグループ" height="60" width="230" class="img-fluid">
                                </picture>
                            </a>
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item text-center mb-3 mb-lg-0 d-block d-lg-none">
                                    <a class="nav-link fw-bold fs-6 py-2 text-black site_name" aria-current="page" href="/">
                                        <picture>
                                            <source type="image/webp" srcset="<?php echo get_theme_file_uri(); ?>/lp_assets/img/top-logo.webp">
                                            <img src="<?php echo get_theme_file_uri(); ?>/lp_assets/img/top-logo.png" loading="lazy" alt="エーピーシーグループ" height="60" width="280" class="img-fluid">
                                        </picture>
                                    </a>
                                </li>
                                <li class="nav-item text-center mb-3 mb-lg-0 pb-3">
                                    <div class="nav-link fw-bolder lh-sm py-0 text-shadow_white" href="tel:01200002222">
                                        <span class="f12px">営業時間 10:00～18:00</span><br>
                                        千葉支社
                                        <picture>
                                            <source type="image/webp" srcset="<?php echo get_theme_file_uri(); ?>/lp_assets/img/icon-tel.webp">
                                            <img src="<?php echo get_theme_file_uri(); ?>/lp_assets/img/icon-tel.png" loading="lazy" alt="電話" height="20" width="20" class="img-fluid">
                                        </picture>
                                        0120-541-353<br>

                                        仙台支社
                                        <picture>
                                            <source type="image/webp" srcset="<?php echo get_theme_file_uri(); ?>/lp_assets/img/icon-tel.webp">
                                            <img src="<?php echo get_theme_file_uri(); ?>/lp_assets/img/icon-tel.png" loading="lazy" alt="電話" height="20" width="20" class="img-fluid">
                                        </picture>
                                        0120-792-157
                                    </div>
                                </li>
                                <li class="nav-item text-center mb-3 mb-lg-0">
                                    <a class="nav-link fw-bolder lh-sm py-0 text-shadow_white" href="#section04">
                                        <picture>
                                            <source type="image/webp" srcset="<?php echo get_theme_file_uri(); ?>/lp_assets/img/top-btn.webp">
                                            <img src="<?php echo get_theme_file_uri(); ?>/lp_assets/img/top-btn.png" loading="lazy" alt="無料でお問い合わせはこちら" height="66" width="200" class="img-fluid hover-float">
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
    <!--
    <div class="position-sticky z-99  end-0 top-60">
        <a class="position-absolute end-0" href="#">
            <picture>
                <source type="image/webp" srcset="<?php echo get_theme_file_uri(); ?>/lp_assets/img/t_btn_top.webp">
                <img src="<?php echo get_theme_file_uri(); ?>/lp_assets/img/t_btn_top.png" loading="lazy" alt="戻るボタン" height="70" width="70" class="img-fluid">
            </picture>
        </a>
    </div>
-->
    <main class="container-fluid p-0">

        <!-- ファーストビュー -->
        <div class="bg-fv position-relative">
            <div class="container">
                <div class="row py-4 py-lg-5">
                    <!-- 左側:メインタイトル画像 -->
                    <div class="col-12 col-md-8 mt-4 mt-lg-5 justify-content-start mt-50-100">
                        <!-- 参考ににしたバナー画像 -->
                        <picture class="mb-0">
                            <source type="image/webp" srcset="<?php echo get_theme_file_uri(); ?>/lp_assets/img/t_fv_title.webp">
                            <img src="<?php echo get_theme_file_uri(); ?>/lp_assets/img/t_fv_title.png" loading="lazy" alt="埼玉県で太陽光発電 失敗しない 業者選び のコツを 徹底解説" class="img-fluid" width="600" height="400">
                        </picture>
                        <picture class="mb-4">
                            <source type="image/webp" srcset="<?php echo get_theme_file_uri(); ?>/lp_assets/img/t_fv_lead.webp">
                            <img src="<?php echo get_theme_file_uri(); ?>/lp_assets/img/t_fv_lead.png" loading="lazy" alt="太陽光発電のお悩み、何でもご相談ください。エーピーシーハウジングが責任をもって対応いたします！" class="img-fluid" width="600" height="400">
                        </picture>
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
                            <source type="image/webp" srcset="<?php echo get_theme_file_uri(); ?>/lp_assets/img/section-01-01.webp">
                            <img src="<?php echo get_theme_file_uri(); ?>/lp_assets/img/section-01-01.png" alt="相談したい方から見積もりが欲しい方まで" class="img-fluid section01-image" loading="lazy">
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
                            <source type="image/webp" srcset="<?php echo get_theme_file_uri(); ?>/lp_assets/img/section-02-03.webp">
                            <img src="<?php echo get_theme_file_uri(); ?>/lp_assets/img/section-02-03.png" alt="無料で相談できます！" class="img-fluid section01-image" loading="lazy" width="700" height="130">
                        </picture>
                    </a>
                </div>
            </div>
        </section>

        <section id="section03" class="p-2 bg_blue">
            <div class="container p-4 px-lg-4 py-lg-5">
                <div class="text-center mb-4 section03-title">
                    <picture class="title-deco left d-none d-lg-block">
                        <source srcset="<?php echo get_theme_file_uri(); ?>/lp_assets/img/section-03-01.webp" type="image/webp">
                        <img src="<?php echo get_theme_file_uri(); ?>/lp_assets/img/section-03-01.png" alt="斜めの装飾" width="20" height="20">
                    </picture>
                    <h2 class="white fs-2 fw-bold title-main">
                        簡単<span class="fs-1 yellow">1</span><span class="fs-4 yellow">分</span>で入力完了
                        <span class="title-ex">！</span><br class="d-block d-lg-none">
                        お気軽にどうぞ
                    </h2>
                    <picture class="title-deco right d-none d-lg-block">
                        <source srcset="<?php echo get_theme_file_uri(); ?>/lp_assets/img/section-03-02.webp" type="image/webp">
                        <img src="<?php echo get_theme_file_uri(); ?>/lp_assets/img/section-03-02.png" alt="斜めの装飾" class="img-fluid" width="20" height="20">
                    </picture>
                </div>
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <picture>
                                    <source type="image/webp" srcset="<?php echo get_theme_file_uri(); ?>/lp_assets/img/section-03-03.webp">
                                    <img src="<?php echo get_theme_file_uri(); ?>/lp_assets/img/section-03-03.png" alt="メール" class="img-fluid" loading="lazy" width="120" height="120">
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
                                <source type="image/webp" srcset="<?php echo get_theme_file_uri(); ?>/lp_assets/img/section-03-05.webp">
                                <img src="<?php echo get_theme_file_uri(); ?>/lp_assets/img/ssection-03-05.png" alt="LINEからのお問い合わせはこちら" class="img-fluid section01-image" loading="lazy" width="380" height="100">
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

                <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="post" id="mailform" class="section04-form form-responsive">

                    <!-- 以下入力画面 -->
                    <?php if ($confirm === 1) : ?>
                        <input type="hidden" name="mode" value="confirm_form" id="mode">
                    <?php else: ?>
                        <input type="hidden" name="mode" value="send_mail" id="mode">
                    <?php endif; ?>

                    <div class="section04-row">
                        <div class="section04-label">ご相談内容</div>
                        <div class="section04-input section04-radio-group">
                            <label><input name="ご相談内容" type="radio" value="点検・メンテナンスのご相談" checked> 点検・メンテナンスのご相談</label>
                            <label><input name="ご相談内容" type="radio" value="設置・工事のご相談"> 設置・工事のご相談</label>
                            <label><input name="ご相談内容" type="radio" value="その他のお問い合わせ"> その他のお問い合わせ</label>
                        </div>
                    </div>

                    <div class="section04-row">
                        <div class="section04-label">郵便番号</div>
                        <div class="section04-input">
                            <input type="text" name="郵便番号" class="form-control" placeholder="例）000-0000" maxlength="8">
                        </div>
                    </div>

                    <div class="section04-row">
                        <div class="section04-label">お名前 <span class="text-danger">*</span></div>
                        <div class="section04-input section04-flex">
                            <input type="text" name="姓" class="form-control" placeholder="例）山田" required>
                            <input type="text" name="名" class="form-control" placeholder="例）太郎" required>
                        </div>
                    </div>

                    <div class="section04-row">
                        <div class="section04-label">電話番号 <span class="text-danger">*</span></div>
                        <div class="section04-input">
                            <input type="tel" name="電話番号" class="form-control tel" placeholder="例）090-1111-2233" required>
                        </div>
                    </div>

                    <div class="section04-row">
                        <div class="section04-label">メールアドレス <span class="text-danger">*</span></div>
                        <div class="section04-input">
                            <input type="email" name="メールアドレス" class="form-control" placeholder="例）info@example.com" required>
                        </div>
                    </div>

                    <div class="section04-checkboxes mt-4 mt-lg-5 mb-4">
                        <label><input type="checkbox" name="agree" required> 個人情報保護方針に同意します。</label>
                        <input type="hidden" name="メールマガジン" value="メールマガジンを受信しない">
                        <label><input type="checkbox" name="メールマガジン" value="メールマガジンを受信する"> メールマガジンを受信する</label>
                    </div>

                    <p class="section04-alert">送信前に内容を確認してください。</p>

                    <!-- CSRF対策 -->
                    <?php wp_nonce_field('action_input', 'nonce_field_input'); ?>

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
                              <source type="image/webp" srcset="<?php echo get_theme_file_uri(); ?>/lp_assets/img/top-logo.webp">
                              <img src="<?php echo get_theme_file_uri(); ?>/lp_assets/img/top-logo.png" loading="lazy" alt="エーピーシーグループ" height="40" width="130" class="img-fluid">
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
                                <source type="image/webp" srcset="<?php echo get_theme_file_uri(); ?>/lp_assets/img/icon-tel.webp">
                                <img src="<?php echo get_theme_file_uri(); ?>/lp_assets/img/icon-tel.png" loading="lazy" alt="電話" height="20" width="20" class="img-fluid">
                              </picture> -->
                                    　0120-541-353<br>

                                    仙台支社
                                    <!-- <picture>
                                <source type="image/webp" srcset="<?php echo get_theme_file_uri(); ?>/lp_assets/img/icon-tel.webp">
                                <img src="<?php echo get_theme_file_uri(); ?>/lp_assets/img/icon-tel.png" loading="lazy" alt="電話" height="20" width="20" class="img-fluid">
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

    <script src="//unpkg.com/libphonenumber-js@1.11.4/bundle/libphonenumber-max.js"></script>
    <script src="//yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    <script src="<?php echo get_theme_file_uri(); ?>/lp_assets/js/jquery.min.js"></script>
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

        // 電話番号のバリデーションと整形
        window.addEventListener("load", function() {
            const inputTel = document.getElementsByClassName('tel'); //＝電話番号の入力欄
            if (!inputTel.length) { // 修正①: HTMLCollectionは常にtruthyなので .length で判定
                return false;
            }
            //電話番号の入力欄から離れたら発動
            Array.from(inputTel).forEach(function(input) {

                // リアルタイムハイフン挿入（入力中）
                input.addEventListener('input', function() {
                    const cursorEnd = input.selectionEnd;
                    const before = input.value.slice(0, cursorEnd).replace(/\D/g, '').length;

                    // 全角数字を半角に変換し数字のみ抽出
                    const digits = input.value
                        .replace(/[０-９]/g, function(s) {
                            return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
                        })
                        .replace(/\D/g, '');
                    if (!digits) {
                        input.value = '';
                        return;
                    }

                    // AsYouTypeで1文字ずつ入力してハイフン付き番号を生成
                    const formatter = new libphonenumber.AsYouType('JP');
                    let formatted = '';
                    for (let i = 0; i < digits.length; i++) {
                        formatted = formatter.input(digits[i]);
                    }
                    input.value = formatted;

                    // カーソル位置を復元（ハイフン分のズレを補正）
                    let digitCount = 0,
                        newCursor = 0;
                    for (let i = 0; i < formatted.length; i++) {
                        if (/\d/.test(formatted[i])) digitCount++;
                        if (digitCount >= before) {
                            newCursor = i + 1;
                            break;
                        }
                    }
                    input.setSelectionRange(newCursor, newCursor);
                });

                // blur時のバリデーション
                input.addEventListener('blur', () => {
                    const value = input.value;
                    if (!value) return;
                    const isValid = libphonenumber.isValidPhoneNumber(value, 'JP');
                    if (!isValid) {
                        console.log('ERROR: 正しい電話番号を入力してください');
                    }
                });
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

    <?php wp_footer(); ?>
</body>

</html>