
			$().ready(function() {
				// validate the comment form when it is submitted
				$("#commentForm").validate();
				
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
						address: {
							required: true
						},
						age: {
							required: true
						},
						sex: {
							required: true
						},
						email: {
							required: true,
							email: true
						},
						first_join: {
							required: true,
						},
                        date_join: {
							required: true,
						},
                        agreement: {
							required: true,
						},
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
						address: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},	
						age: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
						sex: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
						email: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
							email: "<div style='color: #ff0000'>※メールアドレスの形式が違うようです</div>"
						},
						first_join: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
                        date_join: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
                        agreement: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
					},
					
					errorPlacement: function(error,element){
    				// (入力フィールドの)name+’_err’のidをもつlabelに出力
    				error.insertAfter($('#'+ element.attr('name') + '_err'));
   					}
					
				});

				
				
				
				
			});
