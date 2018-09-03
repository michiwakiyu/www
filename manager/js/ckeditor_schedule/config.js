/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		//{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		//{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] }, //ソース
		{ name: 'tools' }, //拡大
		'/',		
		{ name: 'forms' },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'others' },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		//{ name: 'about' }
	];

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Se the most common block elements.
	config.format_tags = 'p;h2;h3;h4;h5;h6;pre;div';

	// Make dialogs simpler.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	//Langage
	config.language = 'ja';
	
	
	
	//以下http://turedure.yukimizake.net/javascript9.html様より参考
	config.width = '700px'; //横幅
	config.height = '900px'; //高さ
	//config.uiColor = '#AADC6E';
	
	//以下http://www.pro-s.co.jp/engineerblog/wordpress/post_4290.html様より参考
	// スペルチェック機能OFF
	config.scayt_autoStartup = false;
	// ○○タグを書きたい！（MTタグの場合もこの書き方でOK）
	config.protectedSource.push(/<[\$\/]?○○[\s\S]*?>\n?/g);
	// Enterを押した際に段落タグを挿入
	config.enterMode = CKEDITOR.ENTER_P;
	// Shift+Enterを押した際に改行タグを挿入
	config.shiftEnterMode = CKEDITOR.ENTER_BR;
	// 編集領域にCSSファイルを読み込みたい（複数）
	//config.contentsCss = ['../../../common/css/base.css', '../../../common/css/content.css', './contents.css'];	
	// 編集領域にclassを指定したい
	config.bodyClass = '';
	// 編集領域にidを指定したい
	config.bodyId  = '';
};
