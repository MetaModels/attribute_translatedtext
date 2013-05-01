<?php

/**
 * The MetaModels extension allows the creation of multiple collections of custom items,
 * each with its own unique set of selectable attributes, with attribute extendability.
 * The Front-End modules allow you to build powerful listing and filtering of the
 * data in each collection.
 *
 * PHP version 5
 * @package     MetaModels
 * @subpackage  AttributeTranslatedText
 * @author      Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @copyright   The MetaModels team.
 * @license     LGPL.
 * @filesource
 */

/**
 * This is the MetaModelAttribute class for handling translated text fields.
 *
 * @package	   MetaModels
 * @subpackage AttributeTranslatedText
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 */
class MetaModelAttributeTranslatedText extends MetaModelAttributeTranslatedReference
{
	public function getAttributeSettingNames()
	{
		return array_merge(parent::getAttributeSettingNames(), array(
			'isunique',
			'flag',
			'searchable',
			'filterable',
			'sortable',
			'decodeEntities',
			'mandatory',
			'decodeEntities',
			'trailingSlash',
			'spaceToUnderscore'
		));
	}

	protected function getValueTable()
	{
		return 'tl_metamodel_translatedtext';
	}

	public function getFieldDefinition($arrOverrides = array())
	{
		$arrFieldDef=parent::getFieldDefinition($arrOverrides);
		$arrFieldDef['inputType'] = 'text';
		return $arrFieldDef;
	}
	
	/**
	 * Sorts the given array list by field value in the given direction.
	 *
	 * This base implementation does a plain SQL sort by native value as defined by MySQL.
	 *
	 * @param int[]  $arrIds       A list of Ids from the MetaModel table.
	 *
	 * @param string $strDirection The direction for sorting. either 'ASC' or 'DESC', as in plain SQL.
	 *
	 * @return int[] The sorted integer array.
	 */
	public function sortIds($arrIds, $strDirection)
	{
		// Get ids.
		return Database::getInstance()
				->prepare(sprintf('SELECT item_id
					FROM tl_metamodel_translatedtext 
					WHERE item_id IN(%1$s)
					AND att_id = ?
					AND langcode = "%2$s"
					ORDER BY value' , 
					implode(", ", $arrIds), // 1
					$this->getMetaModel()->getActiveLanguage(), // 2
				    $strDirection // 3
				))
				->execute($this->get('id'))
				->fetchEach('item_id');
	}
}