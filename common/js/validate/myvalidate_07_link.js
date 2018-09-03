
			$().ready(function() {
				
				// validate signup form on keyup and submit
				
				$("#form01").validate({
					rules: {

						url: {
							required: true
						},
						sitename: {
							required: true
						},
						keitai: {
							required: true
						},
						gyoshu: {
							required: true
						},
						about: {
							required: true
						},
						url2: {
							required: true
						},
						email: {
							required: true,
							email: true
						}				
					},
					messages: {

						url: {
							required: "<div style='color: #ff0000'>※必須項目です</div>"
						},
						sitename: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
						keitai: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
						gyoshu: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
						about: {
							required: "<div style='color: #ff0000'>※必須項目です</div>",
						},
						url2: {
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
