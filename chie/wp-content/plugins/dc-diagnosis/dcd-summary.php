<?php
require_once( "../../../wp-load.php" );

global $wpdb;
$male = 1;
$female = 2;

//本プログラム実行の１日前
$last_date = date( "Y-m-d", strtotime("-1 day") );

//テストの場合は当日分まで集計
if ( $_GET['m'] == 'test' ) {
	$last_date = date( "Y-m-d" );
}

//男女別グラフ用
$sql_gender = str_replace(
	array( '_last_date_' ),
	array( $last_date ),
	'
	SELECT  
		diagnosis_id, gender, count(*) as count, avg(total_point) as average 
	FROM
		dcd_result 
	WHERE 
		created_at <= "_last_date_ 23:59:59" AND gender is not null 
	GROUP BY 
		diagnosis_id, gender 
	ORDER BY 
		diagnosis_id asc, gender asc
	'
);
//var_dump($sql_gender);
$results_gender = $wpdb->get_results( $sql_gender, ARRAY_A );

//年代別グラフ用
$sql_age = str_replace(
	array( '_last_date_' ),
	array( $last_date ),
	'
	SELECT  
		diagnosis_id, SUBSTRING(birth, 1, 3) as age, count(*) as count, avg(total_point) as average 
	FROM
		dcd_result 
	WHERE 
		created_at <= "_last_date_ 23:59:59" AND birth is not null 
	GROUP BY 
		diagnosis_id, age 
	ORDER BY 
		diagnosis_id asc, age asc
	'
);
//var_dump($sql_age);
$results_age = $wpdb->get_results( $sql_age, ARRAY_A );

//人数群グラフ用
$sql_number = str_replace(
	array( '_last_date_' ),
	array( $last_date ),
	'
	SELECT 
		t.diagnosis_id, t.type_number, t.type_title, type_count.count 
	FROM 
		dcd_type as t

		LEFT JOIN (
	        	SELECT  
					r.diagnosis_id, r.type, count(*) as count 
				FROM
					dcd_result r, dcd_type t 
				WHERE 
					r.created_at <= "_last_date_ 23:59:59"  AND r.type = t.type_number AND r.diagnosis_id = t.diagnosis_id 
				GROUP BY 
					r.diagnosis_id, t.type_number 
				ORDER BY 
					r.diagnosis_id asc, r.type asc
	    ) as type_count 
	ON 
		t.diagnosis_id = type_count.diagnosis_id AND t.type_number = type_count.type 
	ORDER BY 
		t.diagnosis_id, t.type_number
	'
);
//var_dump($sql_number);
$results_number = $wpdb->get_results( $sql_number, ARRAY_A );


// 全国調査用
$sql_national = str_replace(
	array( '_last_date_' ),
	array( $last_date ),
	'
	SELECT  
		diagnosis_id, pref, avg(total_point) as ave, count(*) as cnt 
	FROM
		dcd_result 
	WHERE 
		created_at <= "_last_date_ 23:59:59" AND pref is not null 
	GROUP BY 
		diagnosis_id, pref 
	ORDER BY 
		diagnosis_id asc, ave desc
	'
);
//var_dump($sql_national);
$results_national = $wpdb->get_results( $sql_national, ARRAY_A );

// 全国調査用（男性）
$sql_national_male = str_replace(
	array( '_last_date_' ),
	array( $last_date ),
	'
	SELECT  
		diagnosis_id, pref, avg(total_point) as ave, count(*) as cnt 
	FROM
		dcd_result 
	WHERE 
		created_at <= "_last_date_ 23:59:59" AND pref is not null AND gender = 1 
	GROUP BY 
		diagnosis_id, pref 
	ORDER BY 
		diagnosis_id asc, ave desc
	'
);
//var_dump($sql_national_male);
$results_national_male = $wpdb->get_results( $sql_national_male, ARRAY_A );

// 全国調査用（女性）
$sql_national_female = str_replace(
	array( '_last_date_' ),
	array( $last_date ),
	'
	SELECT  
		diagnosis_id, pref, avg(total_point) as ave, count(*) as cnt 
	FROM
		dcd_result 
	WHERE 
		created_at <= "_last_date_ 23:59:59" AND pref is not null AND gender = 2 
	GROUP BY 
		diagnosis_id, pref 
	ORDER BY 
		diagnosis_id asc, ave desc
	'
);
//var_dump($sql_national_female);
$results_national_female = $wpdb->get_results( $sql_national_female, ARRAY_A );

// summaryテーブルをtruncate
$wpdb->query( "TRUNCATE TABLE dcd_summary" );
$wpdb->query( "TRUNCATE TABLE dcd_summary2" );

// summaryへinsert
$current_did = $results_gender[0]['diagnosis_id'];
$data = array();
$i = 1;
foreach ( $results_gender as $key => $result ) {

	if ( $current_did != $result['diagnosis_id'] ) {
		insert_summary_data( 'gender', $current_did, $data, $last_date );
		$current_did = $result['diagnosis_id'];
		$data = array();
	}
	$data[$result['gender']] = array( 'num' => $result['count'], 'ave' => round( $result['average'], 2 ) );

	if ( count( $results_gender ) == $i ) {
		insert_summary_data( 'gender', $current_did, $data, $last_date );
	}

	$i++;
}

$current_did = $results_age[0]['diagnosis_id'];
$data = array();
$i = 1;
foreach ( $results_age as $key => $result ) {

	if ( $current_did != $result['diagnosis_id'] ) {
		insert_summary_data( 'age', $current_did, $data, $last_date );
		$current_did = $result['diagnosis_id'];
		$data = array();
	}
	$data[$result['age']] = array( 'num' => $result['count'], 'ave' => round( $result['average'], 2 ) );

	if ( count( $results_age ) == $i ) {
		insert_summary_data( 'age', $current_did, $data, $last_date );
	}

	$i++;
}

$current_did = $results_number[0]['diagnosis_id'];
$data = array();
$i = 1;
foreach ( $results_number as $key => $result ) {

	if ( $current_did != $result['diagnosis_id'] ) {
		insert_summary_data( 'number', $current_did, $data, $last_date );
		$current_did = $result['diagnosis_id'];
		$data = array();
	}
	$data[$result['type_number']] = array( 'title' => $result['type_title'], 'num' => is_null( $result['count'] ) ? 0 : $result['count'] );

	if ( count( $results_number ) == $i ) {
		insert_summary_data( 'number', $current_did, $data, $last_date );
	}

	$i++;
}

//全国調査
insert_national_rank( $results_national, 'national' );
insert_national_rank( $results_national_male, 'national_male' );
insert_national_rank( $results_national_female, 'national_female' );

function insert_national_rank( $results, $summary_key ) {

	$current_did = $results[0]['diagnosis_id'];
	$i = 1;
	$loop_cnt = 1;
	$current_rank = 1;
	$before_ave = 0;
	$data = array();

	foreach( $results as $key => $result ) {

		if ( $current_did != $result['diagnosis_id'] ) {
			insert_summary_data( $summary_key, $current_did, $data, $last_date );
			$current_did = $result['diagnosis_id'];

			$i = 1;
			$current_rank = 0;
			$before_ave = 0;
			$data = array();
		}

		if ( $current_rank == 0 ) {
			$result['rank'] = $i;
			$current_rank = $i;
		}
		else {
			if ( $result['ave'] == $before_ave ) {
				$result['rank'] = $current_rank;
			}
			else {
				$result['rank'] = $i;
				$current_rank = $i;
			}
		}
		array_push( $data, array( $result['rank'], $result['pref'], $result['ave'], $result['cnt'] ) );

		$before_ave = $result['ave'];

		if ( count( $results ) == $loop_cnt ) {
			insert_summary_data( $summary_key, $current_did, $data, $last_date );
		}

		$i++;
		$loop_cnt++;
	}
}

function insert_summary_data( $key, $did, $data, $last_date ) {
	global $wpdb;

	$wpdb->insert(
		'dcd_summary2',
		array(
			'diagnosis_id'       => $did,
			'summary_key'        => $key,
			'summary_data'       => json_encode( $data ),
			'last_date'          => $last_date,
			'created_at'         => date( 'Y-m-d H:i:s' ),
		),
		array(
			'%d',
			'%s',
			'%s',
			'%s',
			'%s',
		)
	);
}
?>
