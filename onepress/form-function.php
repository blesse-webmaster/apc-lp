<?php
global $wpdb;

// PHPMailer クラスと Exception クラスを名前空間付きで使用宣言
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
            $remail_text = str_replace('{{' . $key . '}}', esc_attr($_POST[$key]), $remail_text);
        endforeach;
    endif;

    $message = $remail_text;
    //    $message .= $body;
    $message .= $mailSignature;
    $message .= "\n\n送信日時: " . current_time('Y-m-d H:i:s');

    if (isset($_POST['mode'])) :
        foreach ($fields as $key => $value):
            $admin_body = str_replace('{{' . $key . '}}', esc_attr($_POST[$key]), $admin_body);
        endforeach;
    endif;
    $admin_body .= $mailSignature;
    $admin_body .= "\n\n送信日時: " . current_time('Y-m-d H:i:s');

    // SMTP 経由でメールを送信する設定
    $mail->isMail();                              // SMTP を使用しない（PHP の mail() 関数を使用）
    /*
    $mail->isSMTP();                              // SMTP を使用
    $mail->Host       = $mail_host;       // SMTP サーバーのホスト名
    $mail->SMTPAuth   = true;                     // SMTP 認証を有効化
    $mail->Username   = $mail_username;     // SMTP ユーザー名
    $mail->Password   = $mail_password;     // SMTP パスワード
    $mail->SMTPSecure = $mail_secure;                    // 暗号化方式（tls または ssl）
    $mail->Port       = $mail_port;                      // 使用するポート（通常 587）
    */

    // 文字化け対策: PHPMailer に文字コードと適切なエンコーディングを明示
    $mail->CharSet  = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->isHTML(false);

    try {

        // 送信者情報を設定
        $mail->setFrom($from, $from_name);

        // 宛先アドレスを追加
        $mail->addAddress($admin_mail);

        // 件名と本文を設定
        $mail->Subject = $subject_admin;
        $mail->Body    = $admin_body;

        // 管理者へメール送信を実行
        $mail->send();

        $table = $wpdb->prefix . 'bls_form_logs';
        $data = [
            'form' => $form_name,
            'mail_date' => current_time('mysql'),
            'mail_date_gmt' => current_time('mysql', 1),
            'mail_body' => $admin_body,
            'mail_subject' => $subject_admin,
            'to_email' => $admin_mail
        ];
        $format = ['%s', '%s', '%s', '%s', '%s'];
        $wpdb->insert($table, $data, $format);

        // ユーザーへメール送信を実行
        $mail->clearAddresses(); // 既存の宛先をクリア
        $mail->addAddress($_POST['メールアドレス']); // ユーザーのメールアドレスを宛先に追加
        $mail->Subject = $subject; // ユーザー宛の件名を設定
        $mail->Body = $message; // ユーザー宛の本文を設定
        $mail->send();

        $data = [
            'form' => $form_name,
            'mail_date' => current_time('mysql'),
            'mail_date_gmt' => current_time('mysql', 1),
            'mail_body' => $message,
            'mail_subject' => $subject,
            'to_email' => $_POST['メールアドレス']
        ];
        $wpdb->insert($table, $data, $format);

        header('Location: ' . $thanksPage);
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
} elseif ($mode === 'confirm_form' && $confirm === 1) {
    $view = 'confirm';
    //    echo 3;
} else {
    $view = 'input';
    //    echo 4;
}
