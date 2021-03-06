<?php
namespace Famelo\PDF\ViewHelpers\Fpdi;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Famelo.Pdf".            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * @api
 */
class TextViewHelper extends AbstractViewHelper {

	
	/**
	 * NOTE: This property has been introduced via code migration to ensure backwards-compatibility.
	 * @see AbstractViewHelper::isOutputEscapingEnabled()
	 * @var boolean
	 */
	protected $escapeOutput = FALSE;

	/**
	 * Constructor
	 *
	 * @api
	 */
	public function __construct() {
		$this->registerArgument('font', 'string', 'font name', FALSE);
		$this->registerArgument('font-size', 'integer', 'font size', FALSE);
		$this->registerArgument('font-weight', 'string', 'font weight', FALSE);
		$this->registerArgument('color', 'string', 'font color', FALSE);
		$this->registerArgument('x', 'string', 'x position', FALSE);
		$this->registerArgument('y', 'string', 'y position', FALSE);
	}

	/**
	 * This tag will not be rendered at all.
	 *
	 * @return void
	 * @api
	 */
	public function render() {
		$texts = array();
		if ($this->viewHelperVariableContainer->exists('Famelo\Pdf\ViewHelpers\Fpdi\TextViewHelper', 'texts')) {
			$texts = $this->viewHelperVariableContainer->get('Famelo\Pdf\ViewHelpers\Fpdi\TextViewHelper', 'texts');
		}
		$text = $this->arguments;
		$text['content'] = $this->renderChildren();
		$texts[] = $text;
		$this->viewHelperVariableContainer->addOrUpdate('Famelo\Pdf\ViewHelpers\Fpdi\TextViewHelper', 'texts', $texts);
	}
}
