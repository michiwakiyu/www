<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'directcommu_young');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'directcommu_main');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'JASMF3uBdNpjFJWe');

/** MySQL のホスト名 */
define('DB_HOST', 'mysql5014.xserver.jp');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '4n,dUkw4DJ(57/7J/*=k*`9<!QvGmD2]0dg%iOHd[J?P$gn/|<uZ)ex3RgYS2[|m');
define('SECURE_AUTH_KEY',  'Lq)FN,z+QLx(Dq~W^;-<C5hm]4yvL1~{_Q5a|HP&va|Md-dcfB<0<DnX1{-vcX,)');
define('LOGGED_IN_KEY',    'K1h1pL.iT+u=2KoY_*l2gM2.%dp]OlR.DA$??EIknXz8T8ecI&=bF[}hR=il`rTV');
define('NONCE_KEY',        'FQQmiYnS U*7fep%?_OnSt-yJI)#h1M6u,Y8w;j@Wsxg :MHIKW7E&DVvES)~AB(');
define('AUTH_SALT',        'Z:=]T0|p+n^gfs%i<6hw{blVnGCV_zBYZxsg7W=_6$ajdywQUEv>1f>mscw6J<NU');
define('SECURE_AUTH_SALT', '=Pd<}3ALVDz^YiP@/hj3)^`XABobRl-626p8ReW6eto(J;I;YDT.b/D-#i*_,Z*}');
define('LOGGED_IN_SALT',   'PNf+3&)U*PG_D=N%oxf0yFcD,O*Tm;s< /YB3IYbig|9;pB]_pas%ZLpb06dXt#!');
define('NONCE_SALT',       'gl]6|c2VQAZeIRs):]Cm<Qt$9)n=&;32q22IOiA_~^:AGtn+5:A4{EB:+~yjH/$:');

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
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
