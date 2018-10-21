<?php
/**
 * Name       : DCD Functions
 * Description: 関数
 */

class DCD_Functions {
	/**
	 * 引数で渡された変数が存在し、かつ数値であるなら true
	 *
	 * @param string $value 参照渡し
	 * @return bool
	 */
	public static function is_numeric( &$value ) {
		if ( isset( $value ) && preg_match( '/^\d+$/', $value ) ) {
			return true;
		}
		return false;
	}
}
?>
