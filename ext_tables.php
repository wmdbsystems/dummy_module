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
			'routeTarget' => \Mattes\DummyModule\Modules\OneController::class . '::mainAction',
			'workspaces' => 'online',
			'labels' => array(
				'll_ref' => 'Dummy',
				'tabs_images' => [
//					'tab' => 'EXT:direct_mail/Resources/Public/Icons/ext-direct-mail.svg'
				],
			),
		]
	);
}