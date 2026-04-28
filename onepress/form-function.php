<?php
global $wpdb;

// PHPMailer クラスと Exception クラスを名前空間付きで使用宣言
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// * get_option キー一覧
$blsform_formname = get_option('blsform_formname');
$blsform_domain = get_option('blsform_domain');
$blsform_from_email = get_option('blsform_from_email');
$blsform_from_name = get_option('blsform_from_name');
$blsform_completion_page_url = get_option('blsform_completion_page_url');
$blsform_confirm_screen = get_option('blsform_confirm_screen');
$blsform_admin_email = get_option('blsform_admin_email');
$blsform_admin_email_subject = get_option('blsform_admin_email_subject');
$blsform_admin_email_body = get_option('blsform_admin_email_body');
$blsform_user_email_subject = get_option('blsform_user_email_subject');
$blsform_user_email_body = get_option('blsform_user_email_body');
$blsform_user_email_footer = get_option('blsform_user_email_footer');
$blsform_server_host = get_option('blsform_server_host');
$blsform_server_user = get_option('blsform_server_user');
$blsform_server_password = get_option('blsform_server_password');
$blsform_server_encryption = get_option('blsform_server_encryption');
$blsform_server_port = get_option('blsform_server_port');

// キャッシュ制御ヘッダーを送信して、ブラウザにキャッシュさせないようにする
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

//CSRF対策：nonceの検証
if (!empty($_POST)) {
    if (!isset($_POST['nonce_field_input']) || ! wp_verify_nonce($_POST['nonce_field_input'], 'action_input')) {
        header('Location: ' . home_url());
        exit;
    }
}

$mode = isset($_POST['mode']) ? $_POST['mode'] : '';
if ($mode === 'send_mail') {

    // WordPress に同梱されている PHPMailer 関連のファイルを読み込む
    require_once ABSPATH . WPINC . '/PHPMailer/PHPMailer.php';
    require_once ABSPATH . WPINC . '/PHPMailer/Exception.php';
    require_once ABSPATH . WPINC . '/PHPMailer/SMTP.php';

    // PHPMailer インスタンスを作成（例外を有効にして初期化）
    $mail = new PHPMailer(true);

    // 入力されたメールアドレスをサニタイズ
    //    $to = sanitize_email('info@bless-e.com');

    if (isset($_POST['mode'])) :
        foreach ($fields as $key => $value):
            $blsform_user_email_body = str_replace('{{' . $key . '}}', esc_attr($_POST[$key]), $blsform_user_email_body);
        endforeach;
    endif;

    $message = $blsform_user_email_body;
    //    $message .= $body;
    $message .= "\n\n".$blsform_user_email_footer;
    $message .= "\n\n送信日時: " . current_time('Y-m-d H:i:s');

    if (isset($_POST['mode'])) :
        foreach ($fields as $key => $value):
            $blsform_admin_email_body = str_replace('{{' . $key . '}}', esc_attr($_POST[$key]), $blsform_admin_email_body);
        endforeach;
    endif;
    $blsform_admin_email_body .= "\n\n".$blsform_user_email_footer;
    $blsform_admin_email_body .= "\n\n送信日時: " . current_time('Y-m-d H:i:s');

    // SMTP 経由でメールを送信する設定
    $mail->isMail();                              // SMTP を使用しない（PHP の mail() 関数を使用）
    /*
    $mail->isSMTP();                              // SMTP を使用
    $mail->Host       = $blsform_server_host;       // SMTP サーバーのホスト名
    $mail->SMTPAuth   = true;                     // SMTP 認証を有効化
    $mail->Username   = $blsform_server_user;     // SMTP ユーザー名
    $mail->Password   = $blsform_server_password;     // SMTP パスワード
    $mail->SMTPSecure = $blsform_server_encryption;                    // 暗号化方式（tls または ssl）
    $mail->Port       = $blsform_server_port;                      // 使用するポート（通常 587）
    */

    // 文字化け対策: PHPMailer に文字コードと適切なエンコーディングを明示
    $mail->CharSet  = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->isHTML(false);

    try {

        // 送信者情報を設定
        $mail->setFrom($blsform_from_email, $blsform_from_name);

        // 宛先アドレスを追加
        $mail->addAddress($blsform_admin_email);

        // 件名と本文を設定
        $mail->Subject = $blsform_admin_email_subject;
        $mail->Body    = $blsform_admin_email_body;

        // 管理者へメール送信を実行
        $mail->send();

        $table = $wpdb->prefix . 'bls_form_logs';
        $data = [
            'form' => $blsform_formname,
            'mail_date' => current_time('mysql'),
            'mail_date_gmt' => current_time('mysql', 1),
            'mail_body' => $blsform_admin_email_body,
            'mail_subject' => $blsform_admin_email_subject,
            'to_email' => $blsform_admin_email
        ];
        $format = ['%s', '%s', '%s', '%s', '%s'];
        $wpdb->insert($table, $data, $format);

        // ユーザーへメール送信を実行
        $mail->clearAddresses(); // 既存の宛先をクリア
        $mail->addAddress($_POST['メールアドレス']); // ユーザーのメールアドレスを宛先に追加
        $mail->Subject = $blsform_user_email_subject; // ユーザー宛の件名を設定
        $mail->Body = $message; // ユーザー宛の本文を設定
        $mail->send();

        $data = [
            'form' => $blsform_formname,
            'mail_date' => current_time('mysql'),
            'mail_date_gmt' => current_time('mysql', 1),
            'mail_body' => $message,
            'mail_subject' => $blsform_user_email_subject,
            'to_email' => $_POST['メールアドレス']
        ];
        $wpdb->insert($table, $data, $format);

        header('Location: ' . $blsform_completion_page_url);
        exit;
    } catch (Exception $e) {
        // エラーハンドリング
        echo "メールの送信に失敗しました。エラー: {$mail->ErrorInfo}";
        exit;
    }

    exit;
}

// フォームの入力値を検証
$validation_errors = [];

if ($mode === 'confirm_form') {
    foreach ($fields as $key => $value) {
        if ($value['required'] && empty($_POST[$key])) {
            $validation_errors[$key][] = "エラー: {$key} は必須項目です。";
        }
        if (!empty($_POST[$key]) && isset($value['pattern']) && !preg_match($value['pattern'], $_POST[$key])) {
            $validation_errors[$key][] = "エラー: {$key} の形式が正しくありません。";
        }
        if (!empty($_POST[$key]) && isset($value['maxlength']) && mb_strlen($_POST[$key]) > $value['maxlength']) {
            $validation_errors[$key][] = "エラー: {$key} は最大 {$value['maxlength']} 文字まで入力可能です。";
        }
    }
}

// ビューの切り替え
$view = 'input';
if (!empty($validation_errors)) {
    $view = 'input';
    //    echo 1;
} elseif ($mode === 'input_form') {
    $view = 'input';
    //    echo 2;
} elseif ($mode === 'confirm_form' && $blsform_confirm_screen === 1) {
    $view = 'confirm';
    //    echo 3;
} else {
    $view = 'input';
    //    echo 4;
}
