
			$().ready(function() {
				
				// validate signup form on keyup and submit
				
				$("#form01").validate({
					rules: {

						namae: {
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
						question: {
							required: true
						}						
						
					},
					messages: {

						namae: {
							required: "<div style='color: #ff0000'>※必須項目です</div>"
						},
						phone: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
						age: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},							
						email: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
							email: "<div style='color: #ff0000'>※メールアドレスの形式が違うようです</div>"
						},
						question: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},							
						
					},
					
					errorPlacement: function(error,element){
    				// (入力フィールドの)name+’_err’のidをもつlabelに出力
    				error.insertAfter($('#'+ element.attr('name') + '_err'));
   					}
					
				});

				
				
				
				
			});
