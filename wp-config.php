<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、MySQL、テーブル接頭辞、秘密鍵、ABSPATH の設定を含みます。
 * より詳しい情報は {@link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 * wp-config.php の編集} を参照してください。MySQL の設定情報はホスティング先より入手できます。
 *
 * このファイルはインストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さず、このファイルを "wp-config.php" という名前でコピーして直接編集し値を
 * 入力してもかまいません。
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'zl_wp_7843H5n210');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'zl_wp_7843H5n210');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', ')WJG#873f>_!');

/** MySQL のホスト名 */
define('DB_HOST', '127.0.0.1:3606');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8mb4');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'mvbZtK2OBxSw5fn6MdgRHrlueJhka9YoqID74TWAEL3UGNp1');
define('SECURE_AUTH_KEY',  'hK4FA5O6Spe2yuPz8caf7sIUbgDiWtQE3xqTCXvnGmRYorMk');
define('LOGGED_IN_KEY',    'q8dWQIVos7yAi6hc2C9XSHPM1TYJ5pUZ3GtrmBDegkKFRfOx');
define('NONCE_KEY',        'HyhXstbElgzK5YSpmQOLDrxA7oaWJfZUuGiIN6CBM28FqcTV');
define('AUTH_SALT',        'p93d57XDKj8hZznwQfg2qulGHvBSR4MAtLFkVoy1eNWExCIm');
define('SECURE_AUTH_SALT', 'lmIbhPA2RYHyNCQL3cd8OMgFujETxJre6i54G1UtwXKfpasD');
define('LOGGED_IN_SALT',   'DJM2i65GNnRuHcemQ3zjPOULSvkAh1YVs9FXtBI4faxgoKry');
define('NONCE_SALT',       '9NJs6YezSfwx7VXO5ghjP4DoWBrRE2Mc8unTLkbqdm1aAQil');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
