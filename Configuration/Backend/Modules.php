<?php

return [
	'dummy' => [
		'configuration' => [
			'showInWorkspaces' => true,
			'navFrameRoute' => 'modules/web/pagetree',
			'icon' => 'EXT:dummy_module/Resources/Public/Icons/moduleIcon.svg',
			'labels' => [
				'module' => 'LLL:EXT:dummy_module/locallang_mod.xml:moduleName',
				'summary' => 'LLL:EXT:dummy_module/locallang_mod.xml:summary',
				'description' => 'LLL:EXT:dummy_module/locallang_mod.xml:description',
			]
		],
		'subModules' => [
			'huselPusel' => [
				'configuration' => [
					'roles' => [
						'sender',
					],
					'showInWorkspaces' => true,
					'inheritNavFrame' => true, //arguably, we could assume "true" as default so you need to switch it OFF
					'icon' => 'EXT:somewhereELse/Resources/Public/Icons/moduleIcon.svg',
					'labels' => [
						'module' => 'LLL:EXT:someotherext/locallang_mod.xml:moduleName',
						'summary' => 'LLL:EXT:someotherext/locallang_mod.xml:summary',
						'description' => 'LLL:EXT:someotherext/locallang_mod.xml:description',
					],
					'routes' => [
						'index' => \Mattes\DummyModule\Modules\OneController::class . '::indexAction',
						'second' => \Mattes\DummyModule\Modules\OneController::class . '::secondAction',
					]
				],
				'subMenuPosition' => 'left', // could be "top", in which case it'd create a tabbed module
				'subModules' => [
					'neatHu' => [
						'configuration' => [
							'roles' => [
								'sender',
							],
							'showInWorkspaces' => true,
							'inheritNavFrame' => true,
							'moduleRoute' => 'modules/web/page',
							'icon' => 'EXT:somewhereELse/Resources/Public/Icons/moduleIcon.svg',
							'labels' => [
								'module' => 'LLL:EXT:someotherext/locallang_mod.xml:moduleName',
								'summary' => 'LLL:EXT:someotherext/locallang_mod.xml:summary',
								'description' => 'LLL:EXT:someotherext/locallang_mod.xml:description',
							]
						],
					],
				]
			]
		]
	],
	'web' => [
		'subModules' => [
			'myExtendedModule' => [
				'configuration' => [
					'roles' => [
						'sender',
					],
					'showInWorkspaces' => true,
					'inheritNavFrame' => true, //arguably, we could assume "true" as default so you need to switch it OFF
					'icon' => 'EXT:dummy_module/Resources/Public/Icons/onemodule.svg',
					'labels' => [
						'module' => 'LLL:EXT:dummy_module/Resources/Private/Language/locallang.xlf:moduleName',
						'summary' => 'LLL:EXT:dummy_module/Resources/Private/Language/locallang.xlf:moduleSummary',
						'description' => 'LLL:EXT:dummy_module/Resources/Private/Language/locallang.xlf:moduleDescription',
					],
					'routes' => [
						'index' => \Mattes\DummyModule\Modules\OneController::class . '::indexAction',
						'second' => \Mattes\DummyModule\Modules\OneController::class . '::secondAction',
					]
				],
				'subMenuPosition' => 'left', // could be "top", in which case it'd create a tabbed module
				'subModules' => [
					'subSubModule' => [
						'configuration' => [
							'roles' => [
								'sender',
							],
							'showInWorkspaces' => true,
							'inheritNavFrame' => true,
							'moduleRoute' => 'modules/web/page',
							'icon' => 'EXT:dummy_module/Resources/Public/Icons/othermodule.svg',
							'labels' => [
								'module' => 'LLL:EXT:dummy_module/Resources/Private/Language/locallang.xlf:subModuleName',
								'summary' => 'LLL:EXT:dummy_module/Resources/Private/Language/locallang.xlf:subModuleSummary',
								'description' => 'LLL:EXT:dummy_module/Resources/Private/Language/locallang.xlf:SubModuleDescription',
							],
							'routes' => [
								'index' => \Mattes\DummyModule\Modules\OtherController::class . '::indexAction',
								'second' => \Mattes\DummyModule\Modules\OtherController::class . '::secondAction',
							]
						],
					],
				]
			]
		]
	]
];