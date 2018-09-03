
			$().ready(function() {
				
				// validate signup form on keyup and submit
				
				$("#form01").validate({
					rules: {

						namae1: {
							required: true
						},
						namae2: {
							required: true
						},		
						phone1: {
							required: true
						},
						phone2: {
							required: true
						},	
						email: {
							required: true,
							email: true
						},
						question1: {
							required: true
						},
						question2: {
						}				
					},
					messages: {

						namae1: {
							required: "<div style='color: #ff0000'>※必須項目です</div>"
						},
						namae2: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
						phone1: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},	
						phone2: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},				
						email: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
							email: "<div style='color: #ff0000'>※メールアドレスの形式が違うようです</div>"
						},
						question1: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						}							
						
					},
					
					errorPlacement: function(error,element){
    				// (入力フィールドの)name+’_err’のidをもつlabelに出力
    				error.insertAfter($('#'+ element.attr('name') + '_err'));
   					}
					
				});

				
				
				
				
			});
