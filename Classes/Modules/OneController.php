<?php
namespace Mattes\DummyModule\Modules;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Backend\Template\Components\ButtonBar;
use TYPO3\CMS\Backend\Template\ModuleTemplate;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Imaging\IconFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class OneController {

	/**
	 * @var ModuleTemplate
	 */
	protected $moduleTemplate;

	/**
	 * @var IconFactory
	 */
	protected $iconFactory;

	/**
	 * @var int
	 */
	protected $id = 1;

	/**
	 * Class Constructor
	 */
	public function __construct() {
		$this->moduleTemplate = GeneralUtility::makeInstance(ModuleTemplate::class);
		$this->iconFactory = GeneralUtility::makeInstance(IconFactory::class);
		$this->setUpModule();
	}

	/**
	 * Injects the request object for the current request or subrequest
	 *
	 * @param ServerRequestInterface $request the current request
	 * @param ResponseInterface $response
	 * @return ResponseInterface the response with the content
	 */
	public function mainAction(ServerRequestInterface $request, ResponseInterface $response) {
		$this->main();
		$response->getBody()->write($this->moduleTemplate->renderContent());
		return $response;
	}

	/**
	 * Injects the request object for the current request or subrequest
	 *
	 * @param ServerRequestInterface $request the current request
	 * @param ResponseInterface $response
	 * @return ResponseInterface the response with the content
	 */
	public function secondAction(ServerRequestInterface $request, ResponseInterface $response) {
		$this->second();
		$response->getBody()->write($this->moduleTemplate->renderContent());
		return $response;
	}

	protected function second() {
		$this->moduleTemplate->setContent('I am the Result of the SecondAction');
	}

	protected function main() {
		$this->moduleTemplate->setContent('I am the Result of the MainAction');

	}

	protected function setUpModule() {
		$this->makeButtons();
		$this->makeControllerMenu();
		$this->makeActionMenu();
		$this->makeParameterMenu();
	}

	protected function makeButtons() {
		$buttonBar = $this->moduleTemplate->getDocHeaderComponent()->getButtonBar();

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

	protected function makeControllerMenu() {
		$menuRegistry = $this->moduleTemplate->getDocHeaderComponent()->getModuleMenuRegistry();
		$menu = $menuRegistry->makeMenu()->setIdentifier('ControllerMenu')->setType('TabsMenu');

		$item1 = $menu
			->makeMenuItem()
			->setController('')
			->setAction('')
			->setParameters(
				[
					'id' => $this->id,
					'someThing' => 'different'
				]
			)
			->setTitle('Controller Item 1');
		$menu->addMenuItem($item1);

		$item2 = $menu
			->makeMenuItem()
			->setController('')
			->setAction('')
			->setParameters(
				[
					'id' => $this->id,
					'someThing' => 'different'
				]
			)
			->setTitle('Controller Item 2')
			->setActive(TRUE);
		$menu->addMenuItem($item2);
		$menuRegistry->addMenu($menu);
	}

	protected function makeActionMenu() {
		$menuRegistry = $this->moduleTemplate->getDocHeaderComponent()->getModuleMenuRegistry();
		$menu = $menuRegistry->makeMenu()->setIdentifier('ActionMenu')->setType('PillsMenu');

		$item1 = $menu
			->makeMenuItem()
			->setAction('')
			->setParameters(
				[
					'id' => $this->id,
					'someThing' => 'different'
				]
			)
			->setTitle('Action Item 1');;
		$menu->addMenuItem($item1);

		$item2 = $menu
			->makeMenuItem()
			->setController('')
			->setAction('')
			->setParameters(
				[
					'id' => $this->id,
					'someThing' => 'different'
				]
			)
			->setTitle('Action Item 2')
			->setActive(TRUE);
		$menu->addMenuItem($item2);
		$menuRegistry->addMenu($menu);
	}

	protected function makeParameterMenu() {
		$menuRegistry = $this->moduleTemplate->getDocHeaderComponent()->getModuleMenuRegistry();
		$menu = $menuRegistry->makeMenu()->setIdentifier('parameterMenu')->setLabel('Select an option');

		$item1 = $menu
			->makeMenuItem()
			->setParameters(
				[
					'id' => $this->id,
					'someThing' => 'different'
				]
			)
			->setTitle('Parameter Item 1');
		$menu->addMenuItem($item1);

		$item2 = $menu
			->makeMenuItem()
			->setController('')
			->setAction('')
			->setParameters(
				[
					'id' => $this->id,
					'someThing' => 'different'
				]
			)
			->setTitle('Parameter Item 2')
			->setActive(TRUE);
		$menu->addMenuItem($item2);
		$menuRegistry->addMenu($menu);
	}
}