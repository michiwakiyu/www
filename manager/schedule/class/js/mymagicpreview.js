			$(function () {
				// Example 1
				$('form.example textarea').magicpreview('mp_');
				$('form.example input').magicpreview('mp_');

				// Example 2
				$('form.photopreview :text').magicpreview('p_');
				$('form.photopreview :checkbox').magicpreview('p_');
				$('form.photopreview textarea').magicpreview('p_');
				$('form.photopreview select').magicpreview('p_');

				$('form.photopreview :radio').magicpreview('p_', {
					'formatValue': function (value) {
						return value + '/5';
					}
				});
				$('form.photopreview select').magicpreview('img_', {
					'child': 'img',
					'change': 'src',
					'formatValue': function (value) { 
						return 'images/' + value + '.jpg'
					}
				});
			});
