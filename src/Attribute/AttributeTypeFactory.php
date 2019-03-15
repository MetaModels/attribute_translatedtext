<?php

/**
 * This file is part of MetaModels/attribute_translatedtext.
 *
 * (c) 2012-2019 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    MetaModels/attribute_translatedtext
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Sven Baumann <baumann.sv@gmail.com>
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2012-2019 The MetaModels team.
 * @license    https://github.com/MetaModels/attribute_translatedtext/blob/master/LICENSE LGPL-3.0-or-later
 * @filesource
 */

namespace MetaModels\AttributeTranslatedTextBundle\Attribute;

use Doctrine\DBAL\Connection;
use MetaModels\Attribute\AbstractAttributeTypeFactory;

/**
 * Attribute type factory for translated tags attributes.
 */
class AttributeTypeFactory extends AbstractAttributeTypeFactory
{
    /**
     * Databse connection.
     *
     * @var Connection
     */
    private $connection;

    /**
     * Construct the factory.
     *
     * @param Connection $connection Database connection.
     */
    public function __construct(Connection $connection)
    {
        parent::__construct();

        $this->connection = $connection;
        $this->typeName   = 'translatedtext';
        $this->typeIcon   = 'bundles/metamodelsattributetranslatedtext/text.png';
        $this->typeClass  = TranslatedText::class;
    }

    /**
     * {@inheritdoc}
     */
    public function createInstance($information, $metaModel)
    {
        return new $this->typeClass($metaModel, $information, $this->connection);
    }
}
