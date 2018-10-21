<?php
/**
 * Name       : DC Diagnosis Main Controller
 * Description: フロントエンド
 */
class DC_Diagnosis_Main_Controller extends DC_Diagnosis_Controller {

	/**
	 * 診断ID
	 */
	protected $diagnosis_id;


	/**
	 * initialize
	 */
	public function initialize() {
		add_action( 'wp_head', array( $this, 'add_ajaxurl'), 1 );
		add_action( 'wp_enqueue_scripts', array( $this, 'main_enqueue_scripts' ) );
	}

	/**
	 * 診断IDを取得する
	 */
	public function get_diagnosis_id( $args ) {
		extract( shortcode_atts( array(
			'id' => ''
		), $args ) );

		$this->diagnosis_id = $id;
	}

	/**
	 * 質問を出力する
	 */
	public function question( $args ) {

		$this->get_diagnosis_id( $args );

		if ( ! $this->diagnosis_id ) {
			return;
		}

		global $wpdb;

		$did = $this->diagnosis_id;
		$content = "";

		$overview = $wpdb->get_row( 'SELECT * FROM ' . DCD_Config::DBDATA . 'diagnosis WHERE id = ' . $did );

		$questions = $wpdb->get_results( 'SELECT * FROM ' . DCD_Config::DBDATA . 'question WHERE diagnosis_id = ' . $did . ' order by question_number' );

		$types = $wpdb->get_results( 'SELECT * FROM ' . DCD_Config::DBDATA . 'type WHERE diagnosis_id = ' . $did . ' order by type_number' );

		$min_max = $wpdb->get_row( 'SELECT MAX(type_max) as max_point, MIN(type_min) as min_point FROM dcd_type where diagnosis_id = ' . $did );


		if ( empty( $overview ) || empty( $questions ) ) {
			return;
		}

		if ( $overview->opponent == 1 ) {
			$target = "あいて" ;
		}
		else {
			$target = "あなた" ;
		}

		ob_start();

		// 冒頭部分
		$this->assign( 'did', $did );
		$this->assign( 'serial', $_GET['dcds'] );
		$this->assign( 'title', $overview->title );
		$this->assign( 'theme', $overview->theme );
		$this->assign( 'color_class', $overview->color_class );
		$this->assign( 'image_url', $overview->image_url );
		$this->assign( 'description', $overview->description );
		$this->render( 'main/header' );

		// 質問部分
		foreach( $questions as $question ) {
			$this->assign( 'question_number', $question->question_number );
			$this->assign( 'question_text',   $question->question_text );
			$this->assign( 'question1_point', $question->question1_point );
			$this->assign( 'question2_point', $question->question2_point );
			$this->assign( 'question3_point', $question->question3_point );
			$this->assign( 'question4_point', $question->question4_point );
			$this->assign( 'question5_point', $question->question5_point );
			$this->render( 'main/question' );
		}

		// 生年月日、性別、注意事項、ボタン
		$this->assign( 'caution', $overview->caution );
		$this->assign( 'caution_detail_flg', $overview->caution_detail_flg );
		$this->assign( 'caution_detail', $overview->caution_detail );

		// 全国調査
		$this->assign( 'national_survey_flg', $overview->national_survey_flg );

		// 診断の対象
		$this->assign( 'target', $target );

		$this->render( 'main/option' );

		// フォーム終了
		$this->render( 'main/form_end' );

		// 結果
		foreach( $types as $type ) {
			$this->assign( 'type' . $type->type_number . '_title', $type->type_title );
			$this->assign( 'type' . $type->type_number . '_description', $type->type_description );
		}
		if ( ! $overview->scale_high ) {
			$overview->scale_high = '高い';
		}
		if ( ! $overview->scale_low ) {
			$overview->scale_low = '低い';
		}
		$overview->scale_high .= '(MAX ' . $min_max->max_point . ')';
		$overview->scale_low  .= '(MIN ' . $min_max->min_point . ')';
		$this->assign( 'scale_high', $overview->scale_high );
		$this->assign( 'scale_low', $overview->scale_low );

		$this->assign( 'graph_description_gender', $overview->graph_description_gender );
		$this->assign( 'graph_description_age', $overview->graph_description_age );
		$this->assign( 'graph_description_number', $overview->graph_description_number );

		// 全国調査
		$national = $wpdb->get_row( 'SELECT summary_data FROM ' . DCD_Config::DBDATA . 'summary2 WHERE summary_key = "national" and diagnosis_id = ' . $did );
		$national_male = $wpdb->get_row( 'SELECT summary_data FROM ' . DCD_Config::DBDATA . 'summary2 WHERE summary_key = "national_male" and diagnosis_id = ' . $did );
		$national_female = $wpdb->get_row( 'SELECT summary_data FROM ' . DCD_Config::DBDATA . 'summary2 WHERE summary_key = "national_female" and diagnosis_id = ' . $did );

		$this->assign( 'national_survey_flg', $overview->national_survey_flg );
		$this->assign( 'graph_description_national', $overview->graph_description_national );

		$this->assign( 'national_survey_data', json_decode( $national->summary_data ) );
		$this->assign( 'national_survey_data_male', json_decode( $national_male->summary_data ) );
		$this->assign( 'national_survey_data_female', json_decode( $national_female->summary_data ) );

		// 診断の対象
		$this->assign( 'target', $target );

		$this->render( 'main/result' );

		// footer
		$this->render( 'main/footer' );

		$content .= ob_get_contents();

		ob_end_clean();

		return $content;
	}

	/**
	 * admin-ajaxのurlを出力しておく
	 */
	public function add_ajaxurl() {
		echo "<script>";
		echo "var ajaxurl = '" . admin_url( 'admin-ajax.php') . "';";
		echo "</script>\n";
	}

	/**
	 * main_enqueue_scripts
	 */
	public function main_enqueue_scripts() {
		$url = plugins_url( DCD_Config::NAME );
		wp_enqueue_style( DCD_Config::NAME . '-main', $url . '/css/main.css' );
		wp_enqueue_style( DCD_Config::NAME . '-color', $url . '/css/color.css' );
		wp_enqueue_style( DCD_Config::NAME . '-modal', $url . '/css/modal/modal.css' );
		wp_enqueue_script( DCD_Config::NAME . '-main', $url . '/js/main.js', array( 'jquery' ), false, true );
		wp_enqueue_script( DCD_Config::NAME . '-clipboard', '//cdn.jsdelivr.net/clipboard.js/1.5.13/clipboard.min.js', array( 'jquery' ), false, true );
		//wp_enqueue_script( DCD_Config::NAME . '-chart', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js', array( 'jquery' ), false, true );
	}
}
?>
