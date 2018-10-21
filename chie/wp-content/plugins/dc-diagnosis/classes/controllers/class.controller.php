<?php
/**
 * Name       : DC Diagnosis Controller
 */
class DC_Diagnosis_Controller {

	/**
	 * assign したデータを保持する配列
	 * @var array
	 */
	protected $assign_data = array();

	/**
	 * 任意のデータを assign
	 *
	 * @param string $key
	 * @param mixed $value
	 */
	protected function assign( $key, $value ) {
		$this->assign_data[$key] = $value;
	}

	/**
	 * テンプレートを読み込んで表示
	 *
	 * @param string $template ディレクトリ名/ファイル名（拡張子無し）
	 */
	protected function render( $template ) {
		extract( $this->assign_data );
		$template_dir  = plugin_dir_path( __FILE__ ) . '../../templates/';
		$template_path = $template_dir . $template . '.php';
		if ( file_exists( $template_path ) ) {
			include( $template_path );
			$this->assign_data = array();
		}
	}
}
?>
