<?php

if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

if (TYPO3_MODE === 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {
	// Regular SOBE Module
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

	// Extbase Module (old, using DocHeader via Fluid)
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'Mattes.DummyModule',
		'web',
		'old',
		'bottom',
		array(
			'Old' => 'index',
		),
		array(
			'access' => 'admin',
			'icon' => 'EXT:dummy_module/Resources/Public/Icons/onemodule.svg',
			'labels' => 'LLL:EXT:dummy_module/Resources/Private/Language/locallang_mod_old.xlf',
		)
	);

	// Extbase Module (old, using DocHeader via Fluid)
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'Mattes.DummyModule',
		'web',
		'new',
		'bottom',
		array(
			'New' => 'index, secondItem',
		),
		array(
			'access' => 'admin',
			'icon' => 'EXT:dummy_module/Resources/Public/Icons/onemodule.svg',
			'labels' => 'LLL:EXT:dummy_module/Resources/Private/Language/locallang_mod_new.xlf',
		)
	);
}

// Register backend modules, but not in frontend or within upgrade wizards
if (TYPO3_MODE === 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {

}
