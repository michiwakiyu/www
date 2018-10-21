<?php
/**
 * Plugin Name: ダイレクトコミュニケーション診断ソフト
 * Plugin URI: 
 * Description: #74 - 簡易性格診断　全国調査 対応Ver
 * Version: 1.2
 * Author: あとぷら
 * Author URI: 
 * Text Domain: dc-diagnosis
 * License: GPL2
 */
include_once( plugin_dir_path( __FILE__ ) . 'classes/functions.php' );
include_once( plugin_dir_path( __FILE__ ) . 'classes/config.php' );

class DC_Diagnosis {

	/**
	 * __construct
 	 */
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'load_initialize_files' ), 9 );
		add_action( 'plugins_loaded', array( $this, 'initialize' ), 11 );
		// 有効化した時の処理
		register_activation_hook( __FILE__, array( __CLASS__, 'activation' ) );

		// アンインストールした時の処理
		register_activation_hook( __FILE__, array( __CLASS__, 'uninstall' ) );

	}

	/**
	 * initializeに必要なファイルをロード
	 */
	public function load_initialize_files() {
		$plugin_dir_path = plugin_dir_path( __FILE__ );
		include_once( $plugin_dir_path . 'classes/controllers/class.controller.php' );
		include_once( $plugin_dir_path . 'classes/controllers/class.admin.php' );
		include_once( $plugin_dir_path . 'classes/controllers/class.main.php' );
		include_once( $plugin_dir_path . 'classes/models/class.admin.php' );
		include_once( $plugin_dir_path . 'classes/models/class.main.php' );
	}

	/**
	 * initialize
	 */
	public function initialize() {
		add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ), 11 );
		add_action( 'init', array( $this, 'register_post_type' ) );
		add_filter( 'manage_edit-' . DCD_Config::NAME . '_columns', array( $this, 'manage_posts_columns' ) );
		//add_action( 'manage_posts_columns', 'add_column', 10, 2 );
	}

	/**
	 * 一覧に追加した項目を表示する
	 */
	public function add_column( $column_name, $post_id ) {
		if ( $column_name == 'd_author' ) {
			$post = get_post( $post_id );
			if ( $post ) {
				$author = get_userdata($post->post_author);
				echo $author->name;
			}
		}
	}

	/**
	 * 一覧の項目追加
	 */
	public function manage_posts_columns( $columns ) {
		$columns['author'] = '作成者';
		$columns = array(
			'title' => 'タイトル',
			'author' => '作成者',
			'date' => '日時',
		);
		return $columns;
	}

	/**
	 * 管理画面の初期化、フロント画面の初期化
	 */
	public function after_setup_theme() {
		if ( current_user_can( DCD_Config::CAPABILITY ) && is_admin() ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
			add_action( 'current_screen'       , array( $this, 'current_screen' ) );
			add_action( 'wp_ajax_dcd_admin_validation', array( $this, 'admin_validation' ) );
		} elseif ( ! is_admin() ) {
			$Controller = new DC_Diagnosis_Main_Controller();
			$Controller->initialize();
			add_shortcode( 'shindan', array( $Controller, 'question' ) );
		}
		add_action( 'wp_ajax_dcd_main_do', array( $this, 'dcd_main_do' ) );
		add_action( 'wp_ajax_nopriv_dcd_main_do', array( $this, 'dcd_main_do' ) );

		add_action( 'wp_ajax_dcd_main_get_result', array( $this, 'dcd_main_get_result' ) );
		add_action( 'wp_ajax_nopriv_dcd_main_get_result', array( $this, 'dcd_main_get_result' ) );
	}

	/**
	 * 共通CSSの読み込み
	 */
	public function admin_enqueue_scripts() {
		$url = plugins_url( DCD_Config::NAME );
		wp_enqueue_style( DCD_Config::NAME . '-admin-common', $url . '/css/admin-common.css' );
	}

	/**
	 * 各画面のコントローラーの呼び出し
	 *
	 * @param WP_Screen $screen
	 */
	public function current_screen( $screen ) {
		if ( $screen->id === DCD_Config::NAME ) {
			$Controller = new DC_Diagnosis_Admin_Controller();
			$Controller->initialize();
		}
	}

	/**
	 * 管理画面のカスタム投稿タイプの設定
	 */
	public function register_post_type() {
		if ( !current_user_can( DCD_Config::CAPABILITY ) && is_admin() ) {
			return;
		}

		// 診断の設問設定を管理する投稿タイプ
		register_post_type( DCD_Config::NAME, array(
			'label'    => 'ダイコミュ診断',
			'labels'   => array(
				'add_new_item'       => __( '新規診断を作成する', 'dc-diagnosis' ),
				'edit_item'          => __( '診断を編集する', 'dc-diagnosis' ),
				'new_item'           => __( 'New Form', 'dc-diagnosis' ),
				'view_item'          => __( 'View Form', 'dc-diagnosis' ),
				'search_items'       => __( '診断を検索', 'dc-diagnosis' ),
				'not_found'          => __( 'No Forms found', 'dc-diagnosis' ),
				'not_found_in_trash' => __( 'No Forms found in Trash', 'dc-diagnosis' ),
			),
			'capability_type' => 'page',
			'public'          => false,
			'show_ui'         => true,
			'supports'         => array( 'title' ),
		) );
	}

	/**
	 * 有効化した時の処理
	 */
	public static function activation() {
		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();

		// マスターテーブル
		$sql_diagnosis = "CREATE TABLE IF NOT EXISTS dcd_diagnosis (
			id bigint(20) NOT NULL AUTO_INCREMENT,
			post_id bigint(20) NOT NULL,
			title varchar(100) NOT NULL,
			theme varchar(100) NOT NULL,
			// 2018/08/25 一旦、機能OFF description text NOT NULL,
			caution text NOT NULL,
			// 2018/08/25 一旦、機能OFF caution_detail_flg smallint(6) NOT NULL DEFAULT '0',
			// 2018/08/25 一旦、機能OFF caution_detail text,
			scale_high varchar(100),
			scale_low varchar(100),
			graph_description_gender text,
			graph_description_age text,
			graph_description_number text,
			national_survey_flg smallint(6) NOT NULL DEFAULT '0',
			graph_description_national text,
			author bigint(20) NOT NULL,
			created_at datetime NOT NULL,
			updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			UNIQUE KEY id (id)
		) {$charset_collate};";

		// 設問テーブル
		$sql_question = "CREATE TABLE IF NOT EXISTS dcd_question (
			id bigint(20) NOT NULL AUTO_INCREMENT,
			diagnosis_id bigint(20) NOT NULL,
			question_number int(11) NOT NULL,
			question_text varchar(100) NOT NULL,
			question1_point int(11) NOT NULL,
			question2_point int(11) NOT NULL,
			question3_point int(11) NOT NULL,
			question4_point int(11) NOT NULL,
			question5_point int(11) NOT NULL,
			created_at datetime NOT NULL,
			updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			UNIQUE KEY id (id)
		) {$charset_collate};";

		// 結果テーブル
		$sql_result = "CREATE TABLE IF NOT EXISTS dcd_result (
			id bigint(20) NOT NULL AUTO_INCREMENT,
			diagnosis_id bigint(20) NOT NULL,
			post_id bigint(20) NOT NULL,
			answer varchar(100) NOT NULL,
			total_point int(11) NOT NULL,
			type int(11) NOT NULL,
			birth date DEFAULT NULL,
			gender smallint(6) DEFAULT NULL,
			pref varchar(100)  DEFAULT NULL,
			serial varchar(100) NOT NULL,
			created_at datetime NOT NULL,
			updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			UNIQUE KEY id (id)
		) {$charset_collate};";

		// タイプテーブル
		$sql_type = "CREATE TABLE IF NOT EXISTS dcd_type (
			id bigint(20) NOT NULL AUTO_INCREMENT,
			diagnosis_id bigint(20) NOT NULL,
			type_number int(11) NOT NULL,
			type_min int(11) NOT NULL,
			type_max int(11) NOT NULL,
			type_title varchar(100) NOT NULL,
			type_description text NOT NULL,
			created_at datetime NOT NULL,
			updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			UNIQUE KEY id (id)
		) {$charset_collate};";

		// 集計テーブル
		$sql_summary = "CREATE TABLE IF NOT EXISTS dcd_summary (
			id bigint(20) NOT NULL AUTO_INCREMENT,
			diagnosis_id bigint(20) NOT NULL,
			total_person bigint(20) DEFAULT NULL,
			total_point bigint(20) DEFAULT NULL,
			total_person_man bigint(20) DEFAULT NULL,
			total_point_man bigint(20) DEFAULT NULL,
			total_person_woman bigint(20) DEFAULT NULL,
			total_point_woman bigint(20) DEFAULT NULL,
			last_date date DEFAULT NULL,
			created_at datetime NOT NULL,
			updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			UNIQUE KEY id (id)
		) {$charset_collate};";

		// 集計テーブル2 201802追加
		$sql_summary2 = "CREATE TABLE IF NOT EXISTS dcd_summary2 (
			id bigint(20) NOT NULL AUTO_INCREMENT,
			diagnosis_id bigint(20) NOT NULL,
			summary_key varchar(100) NOT NULL,
			summary_data text NOT NULL,
			last_date date DEFAULT NULL,
			created_at datetime NOT NULL,
			updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			UNIQUE KEY id (id)
		) {$charset_collate};";


		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql_diagnosis );
		dbDelta( $sql_question );
		dbDelta( $sql_result );
		dbDelta( $sql_type );
		dbDelta( $sql_summary );
		dbDelta( $sql_summary2 );
	}

	/**
	 * アンインストールした時の処理
	 */
	public static function uninstall() {
	}

	/**
	 * 管理画面バリデーション
	 */
	public function admin_validation() {
		$res = array();

		parse_str( $_POST['form_data'], $data );

		// タイトルのチェック
		if( $data['post_title'] == '' ) {
			$res['dc_diagnosis_title'] = 'タイトルを入力して下さい。';
		}
		if( mb_strlen( $data['post_title'] ) > DCD_Config::TEXT_MAXLENGTH ) {
			$res['dc_diagnosis_title'] = 'タイトルは' . DCD_Config::TEXT_MAXLENGTH . '文字以内で入力して下さい。';
		}

		$data['dc-diagnosis']['description'] = $data[DCD_Config::NAME.'_description'];

		$tmp_data = $data['dc-diagnosis'];
		// 2018/08/25 一旦、機能OFF $tmp_data['description'] = $data['dcd_description'];
		$tmp_data['caution'] = $data['dcd_caution'];
		// 2018/08/25 一旦、機能OFF $tmp_data['caution_detail'] = $data['dcd_caution_detail'];
		$tmp_data['type_description'][1] = $data['dcd_type_description_1'];
		$tmp_data['type_description'][2] = $data['dcd_type_description_2'];
		$tmp_data['type_description'][3] = $data['dcd_type_description_3'];
		$tmp_data['type_description'][4] = $data['dcd_type_description_4'];
		$tmp_data['graph_description_gender'] = $data['dcd_graph_description_gender'];
		$tmp_data['graph_description_age'] = $data['dcd_graph_description_age'];
		$tmp_data['graph_description_number'] = $data['dcd_graph_description_number'];

		$data = $tmp_data;

		// 診断内容のチェック
		if( $data['theme'] == '' ) {
			$res['dc_diagnosis_theme'] = '診断内容を入力して下さい。';
		}
		if( mb_strlen( $data['theme'] ) > DCD_Config::TEXT_MAXLENGTH ) {
			$res['dc_diagnosis_theme'] = '診断内容は' . DCD_Config::TEXT_MAXLENGTH . '文字以内で入力して下さい。';
		}

		/* 2018/08/25 一旦、機能OFF 
		// 冒頭説明分のチェック
		if( strip_tags( $data['description'] ) == '' ) {
			$res['dc_diagnosis_description'] = '冒頭説明文を入力して下さい。';
		}
		if( mb_strlen( $data['description'] ) > DCD_Config::TEXTAREA_MAXLENGTH ) {
			$res['dc_diagnosis_description'] = '冒頭説明文は' . DCD_Config::TEXTAREA_MAXLENGTH . '文字以内で入力して下さい。';
		}
		*/

		// 質問のチェック
		for ( $i = 1; $i <= DCD_Config::QUESTION_NUM; $i++ ) {
			$qt  = $data['question_text'][$i];
			$qp1 = $data['question_point1'][$i];
			$qp2 = $data['question_point2'][$i];
			$qp3 = $data['question_point3'][$i];
			$qp4 = $data['question_point4'][$i];
			$qp5 = $data['question_point5'][$i];

			// 質問2以降は全て未入力の場合はチェックなし
			if ( $i > 1 && $qt == '' && $qp1 == '' && $qp2 == '' && $qp3 == '' && $qp4 == '' && $qp5 == '' ) {
				continue;
			}

			// 設定する場合は全て必須
			if ( $qt == '' || $qp1 == '' || $qp2 == '' || $qp3 == '' || $qp4 == '' || $qp5 == '' ) {
				if ( $i > 1 ) {
					$res['dc_diagnosis_question' . $i] = '設定する場合は';
				}
				$res['dc_diagnosis_question' . $i] .= '全ての項目を入力して下さい。';
			}
			else {
				if( mb_strlen( $qt ) > DCD_Config::TEXT_MAXLENGTH ) {
					$res['dc_diagnosis_question' . $i . '_text'] = '質問は' . DCD_Config::TEXT_MAXLENGTH . '文字以内で入力して下さい。';
				}
				if ( ! DCD_Functions::is_numeric( $qp1 ) ||
				     ! DCD_Functions::is_numeric( $qp2 ) ||
				     ! DCD_Functions::is_numeric( $qp3 ) ||
				     ! DCD_Functions::is_numeric( $qp4 ) ||
				     ! DCD_Functions::is_numeric( $qp5 ) ) {
					$res['dc_diagnosis_question' . $i . '_point'] = 'ポイントは数値（半角）を入力して下さい。';
				}
			}
		}

		// 診断についての注意事項
		if( strip_tags( $data['caution'] ) == '' ) {
			$res['dc_diagnosis_caution'] = '診断についての注意事項を入力して下さい。';
		}
		if( mb_strlen( $data['caution'] ) > DCD_Config::TEXTAREA_MAXLENGTH ) {
			$res['dc_diagnosis_caution'] = '診断についての注意事項は' . DCD_Config::TEXTAREA_MAXLENGTH . '文字以内で入力して下さい。';
		}

		/* 2018/08/25 一旦、機能OFF 
		// 「詳しくはこちらで解説しています」の説明文
		if ( $data['caution_detail_flg'] == 1 ) {
			if( strip_tags( $data['caution_detail'] ) == '' ) {
				$res['dc_diagnosis_caution_detail'] = '「詳しくはこちらで解説しています」の説明文を入力して下さい。';
			}
		}
		if( mb_strlen( $data['caution_detail'] ) > DCD_Config::TEXTAREA_MAXLENGTH ) {
			$res['dc_diagnosis_caution_detail'] = '「詳しくはこちらで解説しています」の説明文は' . DCD_Config::TEXTAREA_MAXLENGTH . '文字以内で入力して下さい。';
		}
		*/

		// 尺度の基準
		if( mb_strlen( $data['scale_high'] ) > DCD_Config::TEXT_MAXLENGTH ) {
			$res['dc_diagnosis_scale_high'] = '文言は' . DCD_Config::TEXT_MAXLENGTH . '文字以内で入力して下さい。';
		}
		if( mb_strlen( $data['scale_low'] ) > DCD_Config::TEXT_MAXLENGTH ) {
			$res['dc_diagnosis_scale_low'] = '文言は' . DCD_Config::TEXT_MAXLENGTH . '文字以内で入力して下さい。';
		}

		// グラフの概説
		if( mb_strlen( $data['graph_description_gender'] ) > DCD_Config::TEXTAREA_MAXLENGTH ) {
			$res['dc_diagnosis_graph_description_gender'] = '各グラフの概説は' . DCD_Config::TEXTAREA_MAXLENGTH . '文字以内で入力して下さい。';
		}
		if( mb_strlen( $data['graph_description_age'] ) > DCD_Config::TEXTAREA_MAXLENGTH ) {
			$res['dc_diagnosis_graph_description_age'] = '各グラフの概説は' . DCD_Config::TEXTAREA_MAXLENGTH . '文字以内で入力して下さい。';
		}
		if( mb_strlen( $data['graph_description_number'] ) > DCD_Config::TEXTAREA_MAXLENGTH ) {
			$res['dc_diagnosis_graph_description_number'] = '各グラフの概説は' . DCD_Config::TEXTAREA_MAXLENGTH . '文字以内で入力して下さい。';
		}

		// 全国調査の解説
		if( mb_strlen( $data['graph_description_national'] ) > DCD_Config::TEXTAREA_MAXLENGTH ) {
			$res['dc_diagnosis_graph_description_national'] = '全国調査の解説は' . DCD_Config::TEXTAREA_MAXLENGTH . '文字以内で入力して下さい。';
		}

		
		// タイプのチェック
		for ( $i = 1; $i <= DCD_Config::TYPE_NUM; $i++ ) {
			$t_min         = $data['type_min'][$i];
			$t_max         = $data['type_max'][$i];
			$t_title       = $data['type_title'][$i];
			$t_description = $data['type_description'][$i];

			// 質問2以降は全て未入力の場合はチェックなし
			if ( $i > 1 && $t_min == '' && $t_max == '' && $t_title == '' && strip_tags( $t_description ) == '' ) {
				continue;
			}

			// 設定する場合は全て必須
			if ( $t_min == '' || $t_max == '' || $t_title == '' || strip_tags( $t_description ) == '' ) {
				if ( $i > 1 ) {
					$res['dc_diagnosis_type' . $i] = '設定する場合は';
				}
				$res['dc_diagnosis_type' . $i] .= '全ての項目を入力して下さい。';
			}
			else {
				if ( ! DCD_Functions::is_numeric( $t_min ) ||
				     ! DCD_Functions::is_numeric( $t_max ) ) {
					$res['dc_diagnosis_type' . $i . '_point'] = 'ポイントの範囲は数値（半角）を入力して下さい。';
				}
				if( mb_strlen( $t_title ) > DCD_Config::TEXT_MAXLENGTH ) {
					$res['dc_diagnosis_type' . $i . '_title'] = '見出しは' . DCD_Config::TEXT_MAXLENGTH . '文字以内で入力して下さい。';
				}
				if( mb_strlen( $t_description ) > DCD_Config::TEXTAREA_MAXLENGTH ) {
					$res['dc_diagnosis_type' . $i . '_description'] = '解説は' . DCD_Config::TEXTAREA_MAXLENGTH . '文字以内で入力して下さい。';
				}
			}
		}

		if( empty( $res ) ) {
			$res['status'] = 'true';
		} else {
			$res['status'] = 'false';
		}

		// 結果をJSON形式で出力
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($res);
		exit();
	}

	/**
	 * 診断の実行
	 */
	public function dcd_main_do() {

		$res = array();

		parse_str( $_POST['form_data'], $data );

		// nonceチェック
		if ( !wp_verify_nonce( $data[DCD_Config::NAME . '_nonce'], DCD_Config::NAME ) ) {
			$res['error_msg'] = '予期せぬエラーが発生しました';
		}

		// ラヂオボタンの値のチェック
		if ( empty( $res ) ) {
			foreach ( $data['dcd-question'] as $num => $value ) {
				if ( ! DCD_Functions::is_numeric( $value ) ) {
					$res['error_msg'] = '予期せぬエラーが発生しました';
					break;
				}
			}
		}

		// 誕生日のチェック
		if ( empty( $res ) ) {
			if ( ! DCD_Functions::is_numeric( $data['birth_year'] ) ) {
				$res['error_msg'] = '予期せぬエラーが発生しました';
			}
		}

		// 性別のチェック
		if ( empty( $res ) ) {
			if ( $data['gender'] != '' && $data['gender'] != 1 && $data['gender'] != 2 ) {
				$res['error_msg'] = '予期せぬエラーが発生しました';
			}
		}

		// 結果の保存
		if ( empty( $res ) ) {
			$Main = new DC_Diagnosis_Main();
			list( $id, $type, $serial ) = $Main -> save_post();

			$res['status'] = 'true';
			$res['type'] = $type;
			$res['url'] = get_permalink( $data['post_id'] ) . '?dcds=' . $serial;
			$res['gender'] = $data['gender'];
			$res['birth_year'] = $data['birth_year'];
			$res['pref'] = $data['pref'];
		} else {
			$res['status'] = 'false';
		}

		$res['current_year'] = date('Y');

		// 合計ポイント
		$res['total_point'] = array_sum( $data['dcd-question'] );

		// 集計データがあれば取得
		if ( $Main->is_summary( $data['did'] ) ) {

			$res['max_point'] = $Main -> get_max_point( $data['did'] );
			$res['min_point'] = $Main -> get_min_point( $data['did'] );

			// 男女比較
			$res['summary_gender'] = $Main -> get_summary( $data['did'], 'gender' );

			// 年代別
			$res['summary_age'] = $Main -> get_summary( $data['did'], 'age' );

			// 人数群
			$res['summary_number'] = $Main -> get_summary( $data['did'], 'number' );
		}

		// 結果をJSON形式で出力
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($res);
		exit();
	}

	/**
	 * シリアルからデータを取得する
	 */
	public function dcd_main_get_result() {

		$res = array();

		parse_str( $_POST['form_data'], $data );

		// nonceチェック
		if ( $data['serial'] == '' || ! wp_verify_nonce( $data[DCD_Config::NAME . '_nonce'], DCD_Config::NAME ) ) {
			exit();
		}

		global $wpdb;

		$result = $wpdb->get_row( 'SELECT * FROM ' . DCD_Config::DBDATA . 'result WHERE diagnosis_id = ' . $data['did'] . ' AND serial = "' . $data['serial'] . '"' );

		if ( empty( $result ) ) {
			exit();
		}

		$res['status'] = 'true';
		$res['type'] = $result -> type;
		$res['url'] = get_permalink( $result -> post_id ) . '?dcds=' . $result -> serial;
		$res['gender'] = $result -> gender;
		$res['birth_year'] = substr($result -> birth, 0, 4);
		$res['current_year'] = date('Y');
		$res['pref'] = $result -> pref;

		$Main = new DC_Diagnosis_Main();

		// 合計ポイント
		$res['total_point'] = $result -> total_point;

		// 集計データがあれば取得
		if ( $Main->is_summary( $result->diagnosis_id ) ) {

			// この診断で最高に獲得できるポイント
			$res['max_point'] = $Main -> get_max_point( $data['did'] );
			// この診断で獲得できる最低ポイント
			$res['min_point'] = $Main -> get_min_point( $data['did'] );

			// 男女比較
			$res['summary_gender'] = $Main -> get_summary( $data['did'], 'gender' );

			// 年代別
			$res['summary_age'] = $Main -> get_summary( $data['did'], 'age' );

			// 人数群
			$res['summary_number'] = $Main -> get_summary( $data['did'], 'number' );
		}

		// 結果をJSON形式で出力
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode( $res );
		exit();
	}

	/**
	 *  チャート表示用データ
	 */
	public function get_chart_data( $did, $your_point, $your_gender ) {
		global $wpdb;
		$res = array();

		$min_max = $wpdb->get_row( 'SELECT MIN(total_point) as min, MAX(total_point) as max FROM `dcd_summary` WHERE diagnosis_id = ' . $did );

		$labels = range( $your_point < $min_max->min ? $your_point : $min_max->min, $your_point > $min_max->max ? $your_point : $min_max->max );

		$results = $wpdb->get_results( 'SELECT total_point, total_person, total_person_man, total_point_man, total_person_woman, total_point_woman FROM dcd_summary WHERE diagnosis_id = ' . $did . ' ORDER BY total_point ASC', OBJECT_K );

		$total  = array();
		$you    = array();
		$man = array();
		$woman = array();
		foreach ( $labels as $point ) {
			if ( $your_point == (int)$point ) {
				array_push( $total, $results[$point]->total_person + 1 );
				array_push( $you, $results[$point]->total_person + 1 );
				array_push( $man, $results[$point]->total_person_man + 1 );
				array_push( $woman, $results[$point]->total_person_woman + 1 );
			}
			else {
				array_push( $total, $results[$point]->total_person * 1 );
				array_push( $you, NULL );
				array_push( $man, $results[$point]->total_person_man * 1 );
				array_push( $woman, $results[$point]->total_person_woman * 1 );
			}
		}

		if ( $your_gender == 1 ) {
			$gender_label = "男性";
			$gender_color = "157,210,246";
			$gender = $man;
		}
		else if ( $your_gender == 2 ) {
			$gender_label = "女性";
			$gender_color = "255,109,141";
			$gender = $woman;
		}


		$res['type'] = 'line';

		$res['data']['labels'] = $labels;

		$res['data']['datasets'][] = array(
			'label'            => 'あなた',
			'fill'             => false,
			'backgroundColor'  => 'rgba(252,101,133,0.4)',
			'borderColor'      => 'rgba(252,10,133,1)',
			'pointRadius'      => 15,
			'pointHoverRadius' => 10,
			'data'             => $you,
		);
		if ( ! empty( $gender ) ) {
			$res['data']['datasets'][] = array(
				'label'            => $gender_label,
				'backgroundColor'  => 'rgba(' . $gender_color . ',0.5)',
				'borderColor'      => 'rgba(' . $gender_color . ',1)',
				'data'             => $gender,
				'fill'             => true,
				'lineTension'      => 0,
			);
		}
		$res['data']['datasets'][] = array(
			'label'            => '総合',
			'backgroundColor'  => 'rgba(255,205,85,0.5)',
			'borderColor'      => 'rgba(255,205,85,1)',
			'data'             => $total,
			'fill'             => true,
			'lineTension'      => 0,
		);

		return $res;
	}
}
$DC_Diagnosis = new DC_Diagnosis();
?>
