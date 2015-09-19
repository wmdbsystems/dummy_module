<?php

if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

if (TYPO3_MODE == 'BE') {

	TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
		'web',
		'txdummy',
		'bottom',
		'',
		[
			'name' => 'web_txdummy',
			'access' => 'user,group',
			'routeTarget' => \Mattes\DummyModule\Modules\OneController::class . '::processRequest',
			'workspaces' => 'online',
			'labels' => array(
				'll_ref' => 'LLL:EXT:dummy_module/Resources/Private/Language/locallang.xlf',
				'tabs_images' => [
					'tab' => 'EXT:dummy_module/Resources/Public/Icons/onemodule.svg'
				],
			),
		]
	);
}