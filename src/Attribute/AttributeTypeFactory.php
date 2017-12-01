<?php

/**
 * This file is part of MetaModels/attribute_translatedtext.
 *
 * (c) 2012-2017 The MetaModels team.
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
 * @author     Sven Baumann <baumann.sv@gmail.com>
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2012-2017 The MetaModels team.
 * @license    https://github.com/MetaModels/attribute_translatedtext/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

namespace MetaModels\AttributeTranslatedTextBundle\Attribute;

use MetaModels\Attribute\AbstractAttributeTypeFactory;

/**
 * Attribute type factory for translated tags attributes.
 */
class AttributeTypeFactory extends AbstractAttributeTypeFactory
{
    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        var_dump('dsf');
        parent::__construct();
        $this->typeName  = 'translatedtext';
        $this->typeIcon  = 'bundles/metamodelsattributetranslatedtext/text.png';
        $this->typeClass = 'MetaModels\Attribute\TranslatedText\TranslatedText';
    }
}
