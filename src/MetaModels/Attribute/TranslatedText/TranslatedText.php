<?php

/**
 * This file is part of MetaModels/attribute_translatedtext.
 *
 * (c) 2012-2018 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * The MetaModels extension allows the creation of multiple collections of custom items,
 * each with its own unique set of selectable attributes, with attribute extendability.
 * The Front-End modules allow you to build powerful listing and filtering of the
 * data in each collection.
 *
 * @package    MetaModels
 * @subpackage AttributeTranslatedText
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Andreas Isaak <info@andreas-isaak.de>
 * @author     Christopher Boelter <christopher@boelter.eu>
 * @author     David Maack <maack@men-at-work.de>
 * @author     Stefan Heimes <stefan_heimes@hotmail.com>
 * @author     Sven Baumann <baumann.sv@gmail.com>
 * @author     Ingolf Steinhardt <info@e-spin.de>
 * @copyright  2012-2018 The MetaModels team.
 * @license    https://github.com/MetaModels/attribute_translatedtext/blob/master/LICENSE LGPL-3.0-or-later
 * @filesource
 */

namespace MetaModels\Attribute\TranslatedText;

use MetaModels\Attribute\TranslatedReference;

/**
 * This is the MetaModelAttribute class for handling translated text fields.
 *
 * @package    MetaModels
 * @subpackage AttributeTranslatedText
 */
class TranslatedText extends TranslatedReference
{
    /**
     * {@inheritdoc}
     */
    public function getAttributeSettingNames()
    {
        return array_merge(parent::getAttributeSettingNames(), array(
            'isunique',
            'searchable',
            'filterable',
            'decodeEntities',
            'mandatory',
            'decodeEntities',
            'trailingSlash',
            'spaceToUnderscore'
        ));
    }

    /**
     * {@inheritdoc}
     */
    protected function getValueTable()
    {
        return 'tl_metamodel_translatedtext';
    }

    /**
     * {@inheritdoc}
     */
    public function getFieldDefinition($arrOverrides = array())
    {
        $arrFieldDef              = parent::getFieldDefinition($arrOverrides);
        $arrFieldDef['inputType'] = 'text';

        if ($arrOverrides['rgxp']) {
            $arrFieldDef['eval']['rgxp'] = $arrOverrides['rgxp'];
        }

        return $arrFieldDef;
    }
}
