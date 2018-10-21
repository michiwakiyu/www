jQuery( function( $ ) {
	$("input[type=radio]").keypress(function (e) {
		if (e.which === 13) {
			return false;
		}
	});

	$('#do_diagnosis').click( function() {
		$(".dcd-result").hide();
		$(".accordion").prop('checked', false);

		var form_data = $('#dcd-form').serializeArray();
		var data = {
			action: 'dcd_main_do',
			form_data: $.param( form_data ),
		}
		$.post( ajaxurl, data, function( res ) {
			if ( res.status == 'true' ) {
				show_summary( res );
				return false;
			}
			else {
				alert(res.error_msg);
				return false;
			}
		} );
		return false;
	} );

	$(window).load( function() {
		var form_data = $('#dcd-form').serializeArray();
		var data = {
			action: 'dcd_main_get_result',
			form_data: $.param( form_data ),
		}
		$.post( ajaxurl, data, function( res ) {
			if ( res.status == 'true' ) {
				show_summary( res );
				return false;
			}
		} );
		return false;
	});

	$('#clear_diagnosis').click( function() {
		$(".dcd-result").hide();
		$(".accordion").prop('checked', false);
		$("[id^=p3_]").prop('checked', true);
		$("[name^=birth_]").val("0");
		$("[name=gender]").prop('checked', false);
		$("[name=pref]").val("");
		$("[id=comp_gender]").prop('checked', true);
		$("html,body").animate({scrollTop:$('.dcd-wrap').offset().top});
	});

	var chart;
	function show_chart( res ) {
		var ctx = document.getElementById("dcd-bunpu-chart").getContext("2d");
		if ( chart ) {
			chart.destroy();
		}

		res.config.options = {
			responsive: true,
			tooltips: {
				mode: 'index',
				intersect: false,
			},
			hover: {
				mode: 'nearest',
				intersect: true,
			},
			scales: {
				xAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: '得点'
					},
				}],
				yAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: '人数'
					},
					ticks: {
					}
				}]
			}
		};
		chart = new Chart(ctx, res.config);
	}

	function show_summary ( res ) {
		var ratio;
		var padding;
		var pos;
		var top_url;

		top_url = res.url.replace(/\?.*/, '');
		$("#type" + res.type + "_bar").prop('checked', 'true');
        $(".dcd-result-url .url").html( res.url + '<span class="copy_btn" data-clipboard-text="' + res.url + '">URLをコピー</span><span class="copy_result"></span>' );
        $(".dcd-result-url .top_url").html( top_url + '<span class="copy_btn" data-clipboard-text="' + top_url + '">URLをコピー</span><span class="copy_result"></span>' );

console.log(res);
		// あなたのラインのポイント
		$(".y-coordinate.you span").text('(' + res.total_point + ')');

		//男女別比較
		if ( res.summary_gender ) {
			$("#comp_gender_content .summary_graph_wrap").css("visibility", "visible");

			if ( res.summary_gender['1'] ) {
				$("#comp_gender_content .item.male .text").text('平均' + res.summary_gender['1']['ave']);
				$("#comp_gender_content .item.male .x-coordinate").html('男性<br>' + res.summary_gender['1']['num'] + '人');

				ratio = 1 - ( res.summary_gender['1']['ave'] / res.max_point );
				//padding = ($("#comp_gender_content .item.male .bar").innerHeight() * ratio) - $("#comp_gender_content .bar .text").innerHeight();
				padding = ($("#comp_gender_content .item.male .bar").innerHeight() - $("#comp_gender_content .bar .text").innerHeight()) * ratio;
				$("#comp_gender_content .item.male .bar").css("padding-top", padding + "px");
			}
			else {
				$("#comp_gender_content .item.male .bar .color").height(0);
			}
			if ( res.summary_gender['2'] ) {
				$("#comp_gender_content .item.female .text").text('平均' + res.summary_gender['2']['ave']);
				$("#comp_gender_content .item.female .x-coordinate").html('女性<br>' + res.summary_gender['2']['num'] + '人');

				ratio = 1 - ( res.summary_gender['2']['ave'] / res.max_point );
				//padding = ($("#comp_gender_content .item.female .bar").innerHeight() * ratio) - $("#comp_gender_content .bar .text").innerHeight();
				padding = ($("#comp_gender_content .item.female .bar").innerHeight() - $("#comp_gender_content .bar .text").innerHeight()) * ratio;
				$("#comp_gender_content .item.female .bar").css("padding-top", padding + "px");
			}
			else {
				$("#comp_gender_content .item.female .bar .color").height(0);
			}

			//男女別「あなたのライン」
			ratio = 1 - ( res.total_point / res.max_point );
			//pos = ($("#comp_gender_content .item.male .bar").innerHeight() * ratio) - $("#comp_gender_content .y-coordinate.you").innerHeight();
			pos = ($("#comp_gender_content .item.male .bar").innerHeight() - $("#comp_gender_content .y-coordinate.you").innerHeight()) * ratio;
			pos =  pos.toFixed();
			$("#comp_gender_content .y-coordinate.you").css("top", pos + "px");
		}
		else {
			$("#comp_gender_content .summary_graph_wrap").css("visibility", "hidden");
		}

		// 年代別グラフ
		if( res.summary_age ) {
			$("#comp_age_content .summary_graph_wrap").css("visibility", "visible");

			$("#comp_age_content .summary_graph").empty();
			var min_age = Math.floor( (res.current_year - 80) / 10 ) * 10;
			var max_age = Math.floor( (res.current_year - 10) / 10 ) * 10;
	
	
			for( var i = min_age; i <= max_age; i+=10 ) {
				var ave = 0;
				var num = 0;
				var text = "";
				var padding = "";

				if( res.summary_age[Math.floor( i / 10 )] ) {
					num = res.summary_age[Math.floor( i / 10 )]['num'];
			 		ave = res.summary_age[Math.floor( i / 10 )]['ave'];
					text ='平均' + ave;

					ratio = 1 - ( ave / res.max_point );
					padding = (parseInt($(".summary_graph .bar").css("height")) - parseInt($(".summary_graph .bar .text").css("height"))) * ratio;
				}
				item  = '<div class="item item_' + i +'">';
				if( num > 0 ) {
					item += '<div class="bar" style="padding-top:' + padding + 'px">';
				}
				else {
					item += '<div class="bar" style="visibility: hidden;">';
				}
				item += '<div class="text">' + text + '</div>';
				item += '<div class="color"></div>';
				item += '</div>';
				item += '<div class="x-coordinate">' + i + '年<br>' + num + '人</div>';
				item += '</div>';
	
				var append = $("#comp_age_content .summary_graph").append(item);
			}
			$("#comp_age_content .summary_graph .item").css("width", 100 / 8 + "%");
			$('#comp_age_content .summary_graph .item_' + Math.floor( res.birth_year / 10 ) * 10 + ' .color').addClass('belong');
	
			//年代別「あなたのライン」
			ratio = 1 - ( res.total_point / res.max_point );
			pos = (parseInt($(".summary_graph .bar").css("height")) - parseInt($(".summary_graph .bar .text").css("height"))) * ratio;
			pos =  pos.toFixed();
			$("#comp_age_content .y-coordinate.you").css("top", pos + "px");
		}
		else {
			$("#comp_age_content .summary_graph_wrap").css("visibility", "hidden");
		}


		// 人数群グラフ
		var summary_number_flag = false;
		$.each( res.summary_number, function(index, value) {
			if ( value.num > 0 ) {
				summary_number_flag = true;
				return false;
			}
		} );
		if( summary_number_flag ) {
			$("#comp_number_content .summary_graph_wrap").css("visibility", "visible");

			$("#comp_number_content .summary_graph").empty();

			var key_count = Object.keys(res.summary_number).length;
			var key_width = 100 / key_count ;

			$("#comp_number_content .y-coordinate.belong").css("width", key_width + "%");

			if( key_count ) {
				var item;
				var max = 0;
				$.each( res.summary_number, function(index, value) {
					if( parseInt( value.num ) > max ) {
						max = value.num;
					}
				});
	
				// barの高さの75%を最高の高さとする
				var ratio = (parseInt($(".summary_graph .bar").css("height")) * 0.75) / max ;
	
				var i = 0;
				$.each( res.summary_number, function(index, value) {
					var padding = parseInt($(".summary_graph .bar").css("height")) - parseInt($(".summary_graph .bar .text").css("height")) - (ratio * value.num );
					item  = '<div class="item">';
					item += '<div class="bar" style="padding-top:' + padding + 'px">';
					item += '<div class="text">' + value.num + '人</div>';
					if( res.type == index ) {
						item += '<div class="color belong"></div>';
						$("#comp_number_content .y-coordinate.belong").css("left", key_width * i + "%");
					}
					else {
						item += '<div class="color"></div>';
					}
					item += '</div>';
					item += '<div class="x-coordinate">' + value.title + '</div>';
					item += '</div>';
	
					var append = $("#comp_number_content .summary_graph").append(item);
					i++;
				});
			}
	
			$("#comp_number_content .summary_graph .item").css("width", key_width + "%");
		}
		else {
			$("#comp_number_content .summary_graph_wrap").css("visibility", "hidden");
		}

		// 全国比較
		$('tr').removeClass("match");
		$('tr[pref-name="' + res.pref + '"]').addClass("match");
		

		$(".dcd-result").show();
		$("html,body").animate({scrollTop:$('.dcd-result').offset().top});
	}

	var clipboard = new Clipboard('.copy_btn');//clipboardで使う要素を指定
	clipboard.on('success', function(e) {
		$("[id=copy-result-text]").text('コピーしました');
		$("[id=copy-result]").prop('checked', true);
	});
	clipboard.on('error', function(e) {
		$("[id=copy-result-text]").text('コピーできませんでした');
		$("[id=copy-result]").prop('checked', true);
	});

} );
