jQuery( function( $ ) {
	/*
	 * テキストボックス内とチェックボックスでエンターキーでサブミットしないようにする
	 */
	$("input[type=text]").keypress(function (e) {
		if (e.which === 13) {
			return false;
		}
	});
	$("input[type=checkbox]").keypress(function (e) {
		if (e.which === 13) {
			return false;
		}
	});


	$('#publish').click( function() {
		$(".dcd_validation_error").hide();
		$(".dcd_validation_error").text('');

		// ビジュアルエディタの値をテキストエリアへ
		/* 2018/08/25 一旦、機能OFF
		var description_ifr = $('#dcd_description_ifr').contents();
		if ( $('#dcd_description').css('display') == 'none') {
			$('#dcd_description').val(description_ifr.find('body').html());
		}
		*/
		var caution_ifr = $('#dcd_caution_ifr').contents();
		if ( $('#dcd_caution').css('display') == 'none') {
			$('#dcd_caution').val(caution_ifr.find('body').html());
		}
		/* 2018/08/25 一旦、機能OFF
		var caution_detail_ifr = $('#dcd_caution_detail_ifr').contents();
		if ( $('#dcd_caution_detail').css('display') == 'none') {
			$('#dcd_caution_detail').val(caution_detail_ifr.find('body').html());
		}
		*/
		var type_description_1_ifr = $('#dcd_type_description_1_ifr').contents();
		if ( $('#dcd_type_description_1').css('display') == 'none') {
			$('#dcd_type_description_1').val(type_description_1_ifr.find('body').html());
		}

		var type_description_2_ifr = $('#dcd_type_description_2_ifr').contents();
		if ( $('#dcd_type_description_2').css('display') == 'none') {
			$('#dcd_type_description_2').val(type_description_2_ifr.find('body').html());
		}

		var type_description_3_ifr = $('#dcd_type_description_3_ifr').contents();
		if ( $('#dcd_type_description_3').css('display') == 'none') {
			$('#dcd_type_description_3').val(type_description_3_ifr.find('body').html());
		}

		var type_description_4_ifr = $('#dcd_type_description_4_ifr').contents();
		if ( $('#dcd_type_description_4').css('display') == 'none') {
			$('#dcd_type_description_4').val(type_description_4_ifr.find('body').html());
		}

		var graph_description_gender_ifr = $('#dcd_graph_description_gender_ifr').contents();
		if ( $('#dcd_graph_description_gender').css('display') == 'none') {
			$('#dcd_graph_description_gender').val(graph_description_gender_ifr.find('body').html());
		}

		var graph_description_age_ifr = $('#dcd_graph_description_age_ifr').contents();
		if ( $('#dcd_graph_description_age').css('display') == 'none') {
			$('#dcd_graph_description_age').val(graph_description_age_ifr.find('body').html());
		}

		var graph_description_number_ifr = $('#dcd_graph_description_number_ifr').contents();
		if ( $('#dcd_graph_description_number').css('display') == 'none') {
			$('#dcd_graph_description_number').val(graph_description_number_ifr.find('body').html());
		}

		var graph_description_national_ifr = $('#dcd_graph_description_national_ifr').contents();
		if ( $('#dcd_graph_description_national').css('display') == 'none') {
			$('#dcd_graph_description_national').val(graph_description_national_ifr.find('body').html());
		}

		var form_data = $('#post').serializeArray();
		var data = {
			action: 'dcd_admin_validation',
			form_data: $.param( form_data ),
		}
		$.post( ajaxurl, data, function( res ) {
			if ( res.status == 'true' ) {
				$('#post').submit();
			}
			else {
				$.each( res, function( i, e ) {
					$(".e_" + i).text( e );
					$(".e_" + i).show();
				});
				alert( "エラーになっている項目を確認してください。" );
			}
		} );

		return false;
	} );

	/*
	 * メディアアップローダー関連
	 */
	const $url    = $('#dcd-media-url');
	const $image  = $('#dcd-media-image');
	const $select = $('#dcd-media-select');
	const $clear  = $('#dcd-media-clear');
	let uploader;

	$select.on('click', function (e) {
		e.preventDefault()

		if(uploader) {
			uploader.open()
			return
		}

		// メディアアップローダーのインスタンス
		uploader = wp.media({
			title: '看板画像を選択',

			library: {
				type: 'image'
			},

			button: {
				text: '画像を選択'
			},

			multiple: false
		})

		uploader.on('select', function () {
			const images = uploader.state().get('selection')

			// dataに選択した画像の情報が入ってる
			images.each(function (data) {
				const url = data.attributes.url
				$url.val(url)
				$image.attr('src', url)
			})
		})

		uploader.open()

	})

	$clear.on('click', function () {
		$url.val('')
		$image.attr('src', '')
	})

} );
