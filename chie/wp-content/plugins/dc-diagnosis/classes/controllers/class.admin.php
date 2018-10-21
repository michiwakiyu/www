<?php
/**
 * Name       : DC Diagnosis Admin Controller
 */
class DC_Diagnosis_Admin_Controller extends DC_Diagnosis_Controller {

	/**
	 * 診断ID
	 */
	protected $diagnosis_id;

	/**
	 * __construct
	 * @param array $validation_rules
	 */
	public function __construct() {
	}

	/**
	 * initialize
	 */
	public function initialize() {
		$Admin = new DC_Diagnosis_Admin();
		//add_filter( 'gettext'              , array( $this , 'gettext', 10, 3 ) );
		add_action( 'wp_print_scripts'       , function(){wp_deregister_script('autosave');} );
		add_action( 'add_meta_boxes'       , array( $this , 'add_meta_boxes' ) );
		add_action( 'admin_enqueue_scripts', array( $this , 'admin_enqueue_scripts' ) );
		add_action( 'save_post'            , array( $Admin, 'save_post' ) );
	}

	/**
	 * 文言を変更する
	 */
	public function gettext( $translated, $text, $domain ) {
		$translates = array(
			'default' => array(
				// 変更前の文言 => 変更後の文言
				'投稿を公開しました。<a href="%s">投稿を表示する</a>' => '診断を作成しました。',
				'投稿を更新しました。<a href="%s">投稿を表示する</a>' => '診断を更新しました。'
			)
		);

		if ( isset( $translates[$domain][$translated] ) ) {
			$translated = $translates[$domain][$translated];
		}
 
		return $translated;
	}

	/**
	 * カスタムフィールドを出力する
	 */
	public function add_meta_boxes() {

		//タイトルの上に診断IDとショートコードを表示する
		add_action( 'edit_form_top', function() {
			global $wpdb;
			global $post;

			$overview = $wpdb->get_row( 'SELECT * FROM ' . DCD_Config::DBDATA . 'diagnosis WHERE post_id = ' . $post->ID );

			$this->assign( 'id', $overview->id );
			$this->render( 'admin/shortcode' );
		}, 1);

		//タイトルのエラーを表示する要素を追加する
		add_action( 'edit_form_before_permalink', function() {
			$this->render( 'admin/title_error' );
		}, 1);

		//診断内容
		add_meta_box(
			DCD_Config::NAME . '_overview',
			'概要',
			array( $this, 'overview' ),
			DCD_Config::NAME, 'normal'
		);

		// 質問
		for ($i = 1; $i <= DCD_Config::QUESTION_NUM; $i++) {
			add_meta_box(
				DCD_Config::NAME . '_question' . $i,
				'質問' . $i,
				array( $this, 'question' ),
				DCD_Config::NAME,
				'normal',
				'default',
				$i
			);
		}

		//診断オプション
		add_meta_box(
			DCD_Config::NAME . '_option',
			'診断オプション',
			array( $this, 'option' ),
			DCD_Config::NAME, 'normal'
		);

		// タイプ
		for ($i = 1; $i <= DCD_Config::TYPE_NUM; $i++) {
			add_meta_box(
				DCD_Config::NAME . '_type' . $i,
				'タイプ' . $i,
				array( $this, 'type' ),
				DCD_Config::NAME,
				'normal',
				'default',
				$i
			);
		}
	}

	/**
	 * 診断内容設定
	 */
	public function overview() {
		global $wpdb;
		global $post;

		if ( $post->ID ) {
			$overview = $wpdb->get_row( 'SELECT * FROM ' . DCD_Config::DBDATA . 'diagnosis WHERE post_id = ' . $post->ID );

			$this->diagnosis_id = $overview->id;

			$this->assign( 'id', $overview->id );
			$this->assign( 'theme', $overview->theme );
			$this->assign( 'color_class', $overview->color_class );
			$this->assign( 'opponent', $overview->opponent );
			$this->assign( 'image_url', $overview->image_url );
			// 2018/08/25 一旦、機能OFF $this->assign( 'description', $overview->description );
		}
		$this->render( 'admin/overview' );
	}

	/**
	 * 質問設定
	 */
	public function question( $p, $a ) {
		global $wpdb;

		$qno = $a['args'];

		if ( $this->diagnosis_id ) {
			$question = $wpdb->get_row( 'SELECT * FROM ' . DCD_Config::DBDATA . 'question WHERE diagnosis_id = ' . $this->diagnosis_id . ' and question_number = ' . $qno );

			$this->assign( 'question_text', $question->question_text );
			$this->assign( 'question_point1', $question->question1_point );
			$this->assign( 'question_point2', $question->question2_point );
			$this->assign( 'question_point3', $question->question3_point );
			$this->assign( 'question_point4', $question->question4_point );
			$this->assign( 'question_point5', $question->question5_point );
		}
		$this->assign( 'qno', $qno );
		$this->render( 'admin/question' );
	}

	/**
	 * 診断オプション
	 */
	public function option() {
		global $wpdb;
		global $post;

		if ( $this->diagnosis_id ) {
			$option = $wpdb->get_row( 'SELECT caution, caution_detail_flg, caution_detail, scale_high, scale_low, graph_description_gender, graph_description_age, graph_description_number, national_survey_flg, graph_description_national FROM ' . DCD_Config::DBDATA . 'diagnosis WHERE id = ' . $this->diagnosis_id );

			$this->assign( 'caution', $option->caution );
			// 2018/08/25 一旦、機能OFF $this->assign( 'caution_detail_flg', $option->caution_detail_flg );
			// 2018/08/25 一旦、機能OFF $this->assign( 'caution_detail', $option->caution_detail );

			$this->assign( 'scale_high', $option->scale_high );
			$this->assign( 'scale_low', $option->scale_low );

			$this->assign( 'graph_description_gender', $option->graph_description_gender );
			$this->assign( 'graph_description_age', $option->graph_description_age );
			$this->assign( 'graph_description_number', $option->graph_description_number );

			$this->assign( 'national_survey_flg', $option->national_survey_flg );
			$this->assign( 'graph_description_national', $option->graph_description_national );
		}
		$this->render( 'admin/option' );
	}

	/**
	 * タイプ設定
	 */
	public function type( $p, $a ) {
		global $wpdb;

		$qno = $a['args'];
		if ( $this->diagnosis_id ) {
			$type = $wpdb->get_row( 'SELECT * FROM ' . DCD_Config::DBDATA . 'type WHERE diagnosis_id = ' . $this->diagnosis_id . ' and type_number = ' . $qno );

			$this->assign( 'type_min', $type->type_min );
			$this->assign( 'type_max', $type->type_max );
			$this->assign( 'type_title', $type->type_title );
			$this->assign( 'type_description', $type->type_description );
		}
		$this->assign( 'qno', $qno );
		$this->render( 'admin/type' );
	}

	/**
	 * get_option
	 * フォームの設定データを返す
	 * @param string $key 設定データのキー
	 * @return mixed 設定データ
	 */
	protected function get_option( $key ) {
		return;
	}

	/**
	 * admin_enqueue_scripts
	 */
	public function admin_enqueue_scripts() {
		$url = plugins_url( DCD_Config::NAME );
		wp_enqueue_style( DCD_Config::NAME . '-admin', $url . '/css/admin.css' );
		wp_enqueue_script( DCD_Config::NAME, $url . '/js/admin.js', array( 'jquery' ), false, true );
	}

}
?>
