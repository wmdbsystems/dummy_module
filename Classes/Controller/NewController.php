<?php
namespace Mattes\DummyModule\Controller;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Backend\Template\Components\ButtonBar;
use TYPO3\CMS\Core\Imaging\Icon;

/**
 * Class NewController
 *
 * @package Mattes\DummyModule\Controller
 */
class NewController extends \TYPO3\CMS\Extbase\Mvc\Controller\BackendActionController {

	/**
	 * Sets up the module with navigation and such
	 *
	 * @return void
	 */
	protected function initializeAction() {
		$this->makeButtons();
		$this->makeControllerMenu();
		$this->makeActionMenu();
		$this->makeParameterMenu();
	}

	public function indexAction() {

	}

	/**
	 * @param string $message
	 */
	public function secondItemAction($message = NULL) {
		$this->view->assign('message', $message);
	}

	/**
	 * Sets up the module with buttons
	 *
	 * @return void
	 */
	protected function makeButtons() {
		$buttonBar = $this->moduleTemplate->getDocHeaderComponent()->getButtonBar();

		$csh = $buttonBar->makeFullyRenderedButton()->setHtmlSource(
			BackendUtility::cshItem('xMOD_csh_corebe', 'TCEforms')
		);
		$buttonBar->addButton($csh);

		$saveButton = $buttonBar->makeInputButton()
			->setName('save')
			->setValue('1')
			->setIcon($this->iconFactory->getIcon('actions-document-save', Icon::SIZE_SMALL))
			->setTitle('Save');

		$saveAndCloseButton = $buttonBar->makeInputButton()
			->setName('save_and_close')
			->setValue('1')
			->setTitle('Save and close')
			->setIcon($this->iconFactory->getIcon('actions-document-save-close', Icon::SIZE_SMALL));

		$saveAndShowPageButton = $buttonBar->makeInputButton()
			->setName('save_and_show')
			->setValue('1')
			->setTitle('Save and show')
			->setIcon($this->iconFactory->getIcon('actions-document-save-view', Icon::SIZE_SMALL));

		$deleteButton = $buttonBar->makeLinkButton()
			->setHref('#')
			->setTitle('Delete item')
			->setIcon($this->iconFactory->getIcon('actions-edit-delete', Icon::SIZE_SMALL));

		$moveButton = $buttonBar->makeLinkButton()
			->setHref('#')
			->setTitle('Move element')
			->setIcon($this->iconFactory->getIcon('actions-page-move', Icon::SIZE_SMALL));

		$editPageButton = $buttonBar->makeLinkButton()
			->setHref('#')
			->setTitle('Edit properties')
			->setIcon($this->iconFactory->getIcon('actions-page-open', Icon::SIZE_SMALL));

		$splitButtonElement = $buttonBar->makeSplitButton()
			->addItem($saveButton)
			->addItem($saveAndCloseButton)
			->addItem($saveAndShowPageButton);

		$buttonBar->addButton($editPageButton, ButtonBar::BUTTON_POSITION_LEFT, 1)
			->addButton($moveButton, ButtonBar::BUTTON_POSITION_LEFT, 1)
			->addButton($splitButtonElement, ButtonBar::BUTTON_POSITION_LEFT, 2)
			->addButton($deleteButton, ButtonBar::BUTTON_POSITION_LEFT, 3)
			->addButton($editPageButton, ButtonBar::BUTTON_POSITION_RIGHT, 1)
			->addButton($moveButton, ButtonBar::BUTTON_POSITION_RIGHT, 1)
			->addButton($deleteButton, ButtonBar::BUTTON_POSITION_RIGHT, 2)
			->addButton($splitButtonElement, ButtonBar::BUTTON_POSITION_RIGHT, 3);

	}

	/**
	 * Creates a menu of TabsMenu
	 *
	 * @return void
	 *
	 * @throws \InvalidArgumentException In case of invalid menuItems
	 */
	protected function makeControllerMenu() {
		$menuRegistry = $this->moduleTemplate->getDocHeaderComponent()->getMenuRegistry();
		$menu = $menuRegistry->makeMenu()->setIdentifier('ControllerMenu')->setLabel('MenuLabel 1');

		$item1 = $menu
			->makeMenuItem()
			->setHref('#')
			->setTitle('Params');
		$menu->addMenuItem($item1);

		$item2 = $menu
			->makeMenuItem()
			->setHref('#')
			->setTitle('Ctrl + Act + Params')
			->setActive(TRUE);
		$menu->addMenuItem($item2);

		$item3 = $menu
			->makeMenuItem()
			->setHref('#')
			->setTitle('Ctrl + Act');
		$menu->addMenuItem($item3);
		$menuRegistry->addMenu($menu);
	}

	/**
	 * Creates a menu of PillsMenu
	 *
	 * @return void
	 *
	 * @throws \InvalidArgumentException In case of invalid menuItems
	 */
	protected function makeActionMenu() {
		$menuRegistry = $this->moduleTemplate->getDocHeaderComponent()->getMenuRegistry();
		$menu = $menuRegistry->makeMenu()->setIdentifier('ActionMenu')->setLabel('MenuLabel 2');

		$item1 = $menu
			->makeMenuItem()
			->setHref($this->uriBuilder->uriFor('index'))
			->setTitle('Action Item 1')
			->setActive($this->actionMethodName === 'indexAction');
		$menu->addMenuItem($item1);

		$item2 = $menu
			->makeMenuItem()
			->setHref($this->uriBuilder->uriFor('secondItem', array('message' => 'Hello World')))
			->setTitle('Action Item 2')
			->setActive($this->actionMethodName === 'secondItemAction');
		$menu->addMenuItem($item2);
		$menuRegistry->addMenu($menu);
	}

	/**
	 * Creates a menu of SelectBoxJumpMenu
	 *
	 * @return void
	 *
	 * @throws \InvalidArgumentException In case of invalid menuItems
	 */
	protected function makeParameterMenu() {
		$menuRegistry = $this->moduleTemplate->getDocHeaderComponent()->getMenuRegistry();
		$menu = $menuRegistry->makeMenu()->setIdentifier('parameterMenu')->setLabel('Select an option');

		$item1 = $menu
			->makeMenuItem()
			->setHref('#')
			->setTitle('Parameter Item 1');
		$menu->addMenuItem($item1);

		$item2 = $menu
			->makeMenuItem()
			->setHref('#')
			->setTitle('Parameter Item 2')
			->setActive(TRUE);
		$menu->addMenuItem($item2);
		$menuRegistry->addMenu($menu);
	}

}