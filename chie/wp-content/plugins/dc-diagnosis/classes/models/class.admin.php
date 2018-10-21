<?php
/**
 * Name       : DC Diagnosis Admin
 * Description: 管理画面クラス
 */
class DC_Diagnosis_Admin {
	/**
	 * save post
	 * @param int $post_id
	 */
	public function save_post( $post_id ) {
		if ( !( isset( $_POST['post_type'] ) && $_POST['post_type'] === DCD_Config::NAME ) )
			return $post_id;
		if ( !isset( $_POST[DCD_Config::NAME . '_nonce'] ) )
			return $post_id;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		if ( !wp_verify_nonce( $_POST[DCD_Config::NAME . '_nonce'], DCD_Config::NAME ) )
			return $post_id;
		if ( !current_user_can( DCD_Config::CAPABILITY ) )
			return $post_id;

		$data = $_POST[DCD_Config::NAME];
 
		// 2018/08/25 一旦、機能OFF $data['description'] = stripslashes( $_POST['dcd_description'] );

		$data['caution']        = stripslashes( $_POST['dcd_caution'] );
		// 2018/08/25 一旦、機能OFF $data['caution_detail'] = stripslashes( $_POST['dcd_caution_detail'] );

		$data['type_description'][1] = stripslashes( $_POST['dcd_type_description_1'] );
		$data['type_description'][2] = stripslashes( $_POST['dcd_type_description_2'] );
		$data['type_description'][3] = stripslashes( $_POST['dcd_type_description_3'] );
		$data['type_description'][4] = stripslashes( $_POST['dcd_type_description_4'] );

		if ( strip_tags( $_POST['dcd_graph_description_gender'] ) ) {
			$data['graph_description_gender'] = stripslashes( $_POST['dcd_graph_description_gender'] );
		}
		if ( strip_tags( $_POST['dcd_graph_description_age'] ) ) {
			$data['graph_description_age']    = stripslashes( $_POST['dcd_graph_description_age'] );
		}
		if ( strip_tags( $_POST['dcd_graph_description_number'] ) ) {
			$data['graph_description_number'] = stripslashes( $_POST['dcd_graph_description_number'] );
		}

		if ( strip_tags( $_POST['dcd_graph_description_national'] ) ) {
			$data['graph_description_national'] = stripslashes( $_POST['dcd_graph_description_national'] );
		}

		global $wpdb;
		global $post;


		//リビジョンは残さない
		if ($post->ID != $post_id) return;

		$wpdb->update(
			$wpdb->posts,
			array( 'post_status' => 'publish' ),
			array( 'ID' => $post_id ),
			array( '%s' ),
			array( '%d' )
		);

		// マスターテーブル保存するデータを配列にする
		$set_diagnosis_arr = array(
			'post_id'             => $post_id,
			'title'               => $_POST['post_title'],
			'theme'               => $data['theme'],
			'color_class'         => $data['color_class'],
			'opponent'            => $data['opponent'],
			'image_url'           => $data['image_url'],
			// 2018/08/25 一旦、機能OFF 'description'         => $data['description'],
			'caution'             => $data['caution'],
			// 2018/08/25 一旦、機能OFF 'caution_detail_flg'  => $data['caution_detail_flg'] ? 1 : 0,
			// 2018/08/25 一旦、機能OFF 'caution_detail'      => $data['caution_detail'],
			'author'              => $post->post_author,
			'scale_high'          => $data['scale_high'],
			'scale_low'           => $data['scale_low'],
			'graph_description_gender' => $data['graph_description_gender'],
			'graph_description_age'    => $data['graph_description_age'],
			'graph_description_number' => $data['graph_description_number'],
			'national_survey_flg'  => $data['national_survey_flg'] ? 1 : 0,
			'graph_description_national' => $data['graph_description_national'],
		);

		// 新規の場合はinsert、編集の場合はupdate
		if ( $data['id'] ) {
			$wpdb->update( DCD_Config::DBDATA . 'diagnosis', $set_diagnosis_arr, array( 'id' => $data['id'] ) );
		} else {
			$set_diagnosis_arr['created_at'] = date("Y-m-d H:i:s"); 
			$wpdb->insert( DCD_Config::DBDATA . 'diagnosis', $set_diagnosis_arr );
			$data['id'] = $wpdb->insert_id;
		}
		$wpdb->show_errors();

		// 質問の保存
		// 質問を一旦、全削除
		$wpdb->delete( DCD_Config::DBDATA . 'question', array( 'diagnosis_id' => $data['id'] ) );
		$qno = 1;
		for( $i = 1; $i <= DCD_Config::QUESTION_NUM; $i++) {
			if ( $data[question_text][$i] != '' && 
			     $data[question_point1][$i] != '' && 
			     $data[question_point2][$i] != '' && 
			     $data[question_point3][$i] != '' && 
			     $data[question_point4][$i] != '' && 
			     $data[question_point5][$i] != '' ) {

				// 質問テーブルへinsert
				$set_question_arr = array(
					'diagnosis_id'    => $data['id'],
					'question_number' => $qno,
					'question_text'   => $data['question_text'][$i],
					'question1_point' => $data['question_point1'][$i],
					'question2_point' => $data['question_point2'][$i],
					'question3_point' => $data['question_point3'][$i],
					'question4_point' => $data['question_point4'][$i],
					'question5_point' => $data['question_point5'][$i],
					'created_at'      => date("Y-m-d H:i:s")
				);
				$wpdb->insert( DCD_Config::DBDATA . 'question', $set_question_arr );

				$qno++;
			}
		}

		// タイプの保存
		// タイプを一旦、全削除
		$wpdb->delete( DCD_Config::DBDATA . 'type', array( 'diagnosis_id' => $data['id'] ) );
		$tno = 1;
		for( $i = 1; $i <= DCD_Config::TYPE_NUM; $i++) {
			if ( $data[type_min][$i] != '' && 
			     $data[type_max][$i] != '' && 
			     $data[type_title][$i] != '' && 
			     $data[type_description][$i] != '' ) {

				// タイプテーブルへinsert
				$set_type_arr = array(
					'diagnosis_id'     => $data['id'],
					'type_number'      => $tno,
					'type_min'         => $data['type_min'][$i],
					'type_max'         => $data['type_max'][$i],
					'type_title'       => $data['type_title'][$i],
					'type_description' => $data['type_description'][$i],
					'created_at'       => date("Y-m-d H:i:s")
				);
				$wpdb->insert( DCD_Config::DBDATA . 'type', $set_type_arr );

				$tno++;
			}
		}
	}
}
?>
