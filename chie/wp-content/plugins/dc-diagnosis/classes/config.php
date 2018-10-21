<?php
/**
 * Name       : DCD Config
 * Description: 設定ファイル
 */
class DCD_Config {

	/**
	 * プラグイン識別子
	 */
	const NAME = 'dc-diagnosis';

	/**
	 * ネームスペース
	 */
	const DOMAIN = 'dc-diagnosis';

	/**
	 * DBに保存する問い合わせデータの post_type名 の接頭辞
	 */
	const DBDATA = 'dcd_';

	/**
	 * 権限
	 */
	const CAPABILITY = 'edit_pages';

	/**
	 * テキストボックスのmaxlength
	 */
	const TEXT_MAXLENGTH = 100;

	/**
	 * テキストエリアのmaxlength
	 */
	const TEXTAREA_MAXLENGTH = 20000;

	/**
	 * 設定できる質問の数
	 */
	const QUESTION_NUM = 8;

	/**
	 * 設定できるタイプの数
	 */
	const TYPE_NUM = 4;
}
?>
