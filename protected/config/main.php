<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

//bootstrap
//Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Stock Opname',

	// preloading 'log' component
	'preload'=>array('log'),
//	'theme' =>'bootstrap',
	

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.fpdf.*',
		'application.vendors.mpdf.*',
		'application.modules.rights.*',
		'application.modules.rights.components.*',

	),

	'modules'=>array(
		// 'generatorPaths'=>array(
		// 	'bootstrap.gii',
		// 	),
		// uncomment the following to enable the Gii tool
		// 'generatorPaths'=>array(
		// 	'bootstrap.gii',
		// ),
		'gii'=>array(
			
		'class'=>'system.gii.GiiModule',
		'password'=>'000',
		// If removed, Gii defaults to localhost only. Edit carefully to taste.
		'ipFilters'=>array('127.0.0.1','::1'),
		
		),
		'rights'=>array(
			'install'=>true, // Whether to enable installer. (Ubah jadi false kalau sudah selesai install)
		  ),
		),

	// application components
	'components'=>array(

		'ePdf' => array(
			'class'         => 'ext.yii-pdf.EYiiPdf',
			'params'        => array(
				'mpdf'     => array(
					'librarySourcePath' => 'application.vendors.mpdf.*',
					'constants'         => array(
						'_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
					),
					'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
					/*'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
						'mode'              => '', //  This parameter specifies the mode of the new document.
						'format'            => 'A4', // format A4, A5, ...
						'default_font_size' => 0, // Sets the default document font size in points (pt)
						'default_font'      => '', // Sets the default font-family for the new document.
						'mgl'               => 15, // margin_left. Sets the page margins for the new document.
						'mgr'               => 15, // margin_right
						'mgt'               => 16, // margin_top
						'mgb'               => 16, // margin_bottom
						'mgh'               => 9, // margin_header
						'mgf'               => 9, // margin_footer
						'orientation'       => 'P', // landscape or portrait orientation
					)*/
				),
				'HTML2PDF' => array(
					'librarySourcePath' => 'application.vendors.html2pdf.*',
					'classFile'         => 'html2pdf.php', // For adding to Yii::$classMap
					/*'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
						'orientation' => 'P', // landscape or portrait orientation
						'format'      => 'A4', // format A4, A5, ...
						'language'    => 'en', // language: fr, en, it ...
						'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
						'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
						'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
					)*/
				)
			),
		),


		'user'=>array(
			// enable cookie-based authentication
			// 'class'=>'RWebUser', // Allows super users access implicitly.
			 'allowAutoLogin'=>true,
			'class'=>'WebUser',


		),

		'authManager'=>array(
			'class'=>'RDbAuthManager',
			'connectionID'=>'db',
			'defaultRoles'=>array('Authenticated', 'Guest'),
		 ),
		// 'session' => array (
		// 	'class' => 'system.web.CDbHttpSession',
		// 	'connectionID' => 'db',
		// 	'sessionTableName' => 'tbl_pencatatan',
		// ),

		//bootstrap
		// 'bootstrap'=>array(
		// 	'class'=>'bootstrap.components.Bootstrap',
		// 	),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=kp1',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
