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
 * This is the MetaModelAttribute class for handling text fields.
 * 
 * @package	   MetaModels
 * @subpackage AttributeText
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 */
class MetaModelAttributeTranslatedText extends MetaModelAttributeComplex
{

	public static function getAttributeSettingNames()
	{
		return array_merge(parent::getAttributeSettingNames(), array(
			'parentCheckbox',
			'titleField',
			'width50',
			'insertBreak',
			'sortingField',
			'filteredField',
			'searchableField',
			'mandatory',
			'defValue',
			'uniqueItem',
			'formatPrePost',
			'format',
			'editGroups'
		));
	}
//tl_metamodel_translatedtext

	public function getFieldDefinition()
	{
		$arrLanguages = array();
		$arrFieldDef['inputType'] = 'text';
/*
		foreach((array)$this->getMetaModel()->getAvailableLanguages() as $strLangCode)
		{
			$arrLanguages[$strLangCode] = $GLOBALS['TL_LANG']['LNG'][$strLangCode];
		}
		$arrFieldDef=parent::getFieldDefinition();
		$arrFieldDef['inputType'] = 'multiColumnWizard';
		$arrFieldDef['eval']['minCount'] = count($arrLanguages);
		$arrFieldDef['eval']['maxCount'] = count($arrLanguages);
		$arrFieldDef['eval']['columnFields'] = array
		(
			'langcode' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_metamodel_translatedtext']['langcode'],
				'exclude'               => true,
				'inputType'             => 'select',
				'options'               => $arrLanguages,
				'eval' 			=> array(
					'valign' => 'top',
					'style' => 'width:250px',
					'includeBlankOption'=>true,
					'chosen'=>true
				)
			),
			'value' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_metamodel_translatedtext']['value'],
				'exclude'               => true,
				'inputType'             => 'text',
				'eval' 			=> array('style' => 'width:250px;height:60px;')
			),
		);
*/
		return $arrFieldDef;
	}

	public function parseValue($arrRowData, $strOutputFormat = 'html')
	{
		$arrResult = parent::parseValue($arrRowData, $strOutputFormat);
		$arrResult['html'] = $arrRowData[$this->getColName()]['value'];
		return $arrResult;
	}



	public function getDataFor($arrIds)
	{
		$objDB = Database::getInstance();
		$objValue = $objDB->prepare('SELECT * FROM tl_metamodel_translatedtext WHERE att_id=? AND langcode=? AND item_id IN (' . implode(',', $arrIds) . ')')
				->execute($this->get('id'), $this->getMetaModel()->getActiveLanguage());
		$arrReturn = array();
		while ($objValue->next())
		{
			$arrReturn[$objValue->item_id] = $objValue->row();
		}
		return $arrReturn;
	}

	public function setDataFor($arrValues)
	{
		// store to database.
	}
}

?>