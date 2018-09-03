
			$().ready(function() {

				// validate signup form on keyup and submit

				$("#form01").validate({
					rules: {

						namae: {
							required: true
						},
						furigana: {
							required: true
						},
						phone: {
							required: true
						},
						zip001: {
							required: true
						},
						zip002: {
							required: true
						},
						address: {
							required: true
						},
						age: {
							required: true
						},
						notes: {
							required: true
						},
						email: {
							required: true,
							email: true
						}
					},
					messages: {

						namae: {
							required: "<div style='color: #ff0000'>※必須項目です</div>"
						},
						furigana: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
						phone: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
						zip001: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
						zip002: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
						address: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
						age: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
						notes: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
						email: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
							email: "<div style='color: #ff0000'>※メールアドレスの形式が違うようです</div>"
						}
					},

					errorPlacement: function(error,element){
    				// (入力フィールドの)name+’_err’のidをもつlabelに出力
    				error.insertAfter($('#'+ element.attr('name') + '_err'));
   					}

				});





			});
