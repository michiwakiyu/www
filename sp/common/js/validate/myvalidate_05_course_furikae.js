
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
						age: {
							required: true
						},
						email: {
							required: true,
							email: true
						},
						date_absence: {
							required: true
						},
						date_join: {
							required: true
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
						address: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},	
						age: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},							
						email: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
							email: "<div style='color: #ff0000'>※メールアドレスの形式が違うようです</div>"
						},	
						date_absence: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
						date_join: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},					},
					
					errorPlacement: function(error,element){
    				// (入力フィールドの)name+’_err’のidをもつlabelに出力
    				error.insertAfter($('#'+ element.attr('name') + '_err'));
   					}
					
				});

				
				
				
				
			});
