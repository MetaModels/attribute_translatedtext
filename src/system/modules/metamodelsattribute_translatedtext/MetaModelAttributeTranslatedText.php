<?php
/**
 * The MetaModels extension allows the creation of multiple collections of custom items,
 * each with its own unique set of selectable attributes, with attribute extendability.
 * The Front-End modules allow you to build powerful listing and filtering of the
 * data in each collection.
 *
 * PHP version 5
 * @package	   MetaModels
 * @subpackage AttributeText
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @copyright  CyberSpectrum
 * @license    private
 * @filesource
 */
if (!defined('TL_ROOT'))
{
	die('You cannot access this file directly!');
}

/**
 * This is the MetaModelAttribute class for handling translated text fields.
 *
 * @package	   MetaModels
 * @subpackage AttributeText
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 */
class MetaModelAttributeTranslatedText
extends MetaModelAttributeTranslatedReference
{
	protected function getValueTable()
	{
		return 'tl_metamodel_translatedtext';
	}

	public function getFieldDefinition()
	{
		$arrFieldDef=parent::getFieldDefinition();
		$arrFieldDef['inputType'] = 'text';
		return $arrFieldDef;
	}
}

?>