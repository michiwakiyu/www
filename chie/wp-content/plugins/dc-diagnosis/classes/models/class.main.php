<?php
/**
 * Name       : DC Diagnosis main
 * Description: メインクラス
 */
class DC_Diagnosis_Main {
	/**
	 * save result
	 */
	public function save_post() {
		global $wpdb;

		parse_str( $_POST['form_data'], $data );

		// ポイントの和
		$total_point = array_sum( $data['dcd-question'] );

		// タイプを取得する
		$type = $wpdb->get_row( 'SELECT type_number FROM ' . DCD_Config::DBDATA . 'type WHERE diagnosis_id = ' . $data['did'] . ' and type_min <= ' . $total_point . ' and type_max >= ' . $total_point );

		// 診断結果テーブルに保存するデータを配列にする
		$set_result_arr = array(
			'diagnosis_id' => $data['did'],
			'answer'       => json_encode( $data['dcd-question'] ),
			'total_point'  => $total_point,
			'type'         => $type->type_number,
			'created_at'   => date("Y-m-d H:i:s")
		);
		// 誕生日
		// 年だけ使用するように変更 2018/02/06
		if ( $data['birth_year'] ) {
			$set_result_arr['birth'] = sprintf( "%d-01-01", $data['birth_year'] );
		}

		// 性別
		if ( $data['gender'] ) {
			$set_result_arr['gender'] = $data['gender'];
		}

		// 都道府県
		if ( $data['pref'] ) {
			$set_result_arr['pref'] = $data['pref'];
		}

		// シリアル
		$set_result_arr['serial'] = md5( uniqid( mt_rand(), true ) );

		// post_id
		$set_result_arr['post_id'] = $data['post_id'];

		$wpdb->insert( DCD_Config::DBDATA . 'result', $set_result_arr );
		$id = $wpdb->insert_id;
		return array( $id, $type->type_number, $set_result_arr['serial'] );
	}

	/**
	 * is_summary
	 * 集計データは存在するのか？
	 */
	public function is_summary( $did ) {
		global $wpdb;

		$result = $wpdb->get_row( 'SELECT count(*) as count FROM dcd_summary2 WHERE diagnosis_id = ' . $did );

		if ( $result->count > 0 ) {
			return true;
		}
		return false;
	}

	/**
	 * get_summary
	 */
	public function get_summary( $did, $key ) {
		global $wpdb;
		$result = $wpdb->get_row( 'SELECT summary_data FROM dcd_summary2 where diagnosis_id = ' . $did . ' and summary_key = "' . $key . '"' );

		return json_decode( $result->summary_data );
	}

	/**
	 * get_max_point
	 */
	public function get_max_point( $did ) {
		global $wpdb;
		//$result = $wpdb->get_row( 'SELECT SUM(question5_point) as max_point FROM dcd_question where diagnosis_id = ' . $did );
		$result = $wpdb->get_row( 'SELECT MAX(type_max) as max_point FROM dcd_type where diagnosis_id = ' . $did );

		return $result->max_point;
	}

	/**
	 * get_min_point
	 */
	public function get_min_point( $did ) {
		global $wpdb;
		//$result = $wpdb->get_row( 'SELECT SUM(question1_point) as min_point FROM dcd_question where diagnosis_id = ' . $did );
		$result = $wpdb->get_row( 'SELECT MIN(type_min) as min_point FROM dcd_type where diagnosis_id = ' . $did );

		return $result->min_point;
	}
}
?>
