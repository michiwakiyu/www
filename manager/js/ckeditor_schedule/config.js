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
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] }, //�\�[�X
		{ name: 'tools' }, //�g��
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
	
	
	
	//�ȉ�http://turedure.yukimizake.net/javascript9.html�l���Q�l
	config.width = '700px'; //����
	config.height = '900px'; //����
	//config.uiColor = '#AADC6E';
	
	//�ȉ�http://www.pro-s.co.jp/engineerblog/wordpress/post_4290.html�l���Q�l
	// �X�y���`�F�b�N�@�\OFF
	config.scayt_autoStartup = false;
	// �����^�O�����������I�iMT�^�O�̏ꍇ�����̏�������OK�j
	config.protectedSource.push(/<[\$\/]?����[\s\S]*?>\n?/g);
	// Enter���������ۂɒi���^�O��}��
	config.enterMode = CKEDITOR.ENTER_P;
	// Shift+Enter���������ۂɉ��s�^�O��}��
	config.shiftEnterMode = CKEDITOR.ENTER_BR;
	// �ҏW�̈��CSS�t�@�C����ǂݍ��݂����i�����j
	//config.contentsCss = ['../../../common/css/base.css', '../../../common/css/content.css', './contents.css'];	
	// �ҏW�̈��class���w�肵����
	config.bodyClass = '';
	// �ҏW�̈��id���w�肵����
	config.bodyId  = '';
};
