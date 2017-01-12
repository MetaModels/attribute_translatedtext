<?php

/**
 * This file is part of MetaModels/attribute_translatedtext.
 *
 * (c) 2012-2016 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * The MetaModels extension allows the creation of multiple collections of custom items,
 * each with its own unique set of selectable attributes, with attribute extendability.
 * The Front-End modules allow you to build powerful listing and filtering of the
 * data in each collection.
 *
 * @package     MetaModels
 * @subpackage  AttributeTranslatedText
 * @author      Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author      Andreas Isaak <info@andreas-isaak.de>
 * @author      Christopher Boelter <christopher@boelter.eu>
 * @author      Sven Baumann <baumann.sv@gmail.com>
 * @copyright   2012-2016 The MetaModels team.
 * @license     https://github.com/MetaModels/attribute_translatedtext/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

/**
 * Table tl_metamodel_attribute
 */

/**
 * Add palette configuration.
 */
$GLOBALS['TL_DCA']['tl_metamodel_attribute']['metapalettes']['translatedtext extends _complexattribute_'] = array();

/**
 * Add data provider.
 */
$GLOBALS['TL_DCA']['tl_metamodel_attribute']['dca_config']['data_provider']['tl_metamodel_translatedtext'] = array
(
    'source' => 'tl_metamodel_translatedtext'
);

/**
 * Add child condition.
 */
$GLOBALS['TL_DCA']['tl_metamodel_attribute']['dca_config']['childCondition'][] = array
(
    'from'   => 'tl_metamodel_attribute',
    'to'     => 'tl_metamodel_translatedtext',
    'setOn'  => array
    (
        array
        (
            'to_field'   => 'att_id',
            'from_field' => 'id',
        ),
    ),
    'filter' => array
    (
        array
        (
            'local'     => 'att_id',
            'remote'    => 'id',
            'operation' => '=',
        ),
    )
);
