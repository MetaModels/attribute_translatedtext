<?php

/**
 * This file is part of MetaModels/attribute_translatedtext.
 *
 * (c) 2012-2022 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    MetaModels/attribute_translatedtext
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Ingolf Steinhardt <info@e-spin.de>
 * @copyright  2012-2022 The MetaModels team.
 * @license    https://github.com/MetaModels/attribute_translatedtext/blob/master/LICENSE LGPL-3.0-or-later
 * @filesource
 */

namespace MetaModels\AttributeTranslatedTextBundle\Test\DependencyInjection;

use MetaModels\AttributeTranslatedTextBundle\Attribute\AttributeTypeFactory;
use MetaModels\AttributeTranslatedTextBundle\DependencyInjection\MetaModelsAttributeTranslatedTextExtension;
use MetaModels\AttributeTranslatedTextBundle\EventListener\RgXpOptionsListener;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

/**
 * This test case test the extension.
 *
 * @covers \MetaModels\AttributeTranslatedTextBundle\DependencyInjection\MetaModelsAttributeTranslatedTextExtension
 */
class MetaModelsAttributeTranslatedTextExtensionTest extends TestCase
{
    /**
     * Test that extension can be instantiated.
     *
     * @return void
     */
    public function testInstantiation()
    {
        $extension = new MetaModelsAttributeTranslatedTextExtension();

        $this->assertInstanceOf(MetaModelsAttributeTranslatedTextExtension::class, $extension);
        $this->assertInstanceOf(ExtensionInterface::class, $extension);
    }

    /**
     * Test that the services are loaded.
     *
     * @return void
     */
    public function testFactoryIsRegistered()
    {
        $container = $this->getMockBuilder(ContainerBuilder::class)->getMock();

        $container
            ->expects($this->exactly(2))
            ->method('setDefinition')
            ->withConsecutive(
                ['metamodels.attribute_translatedtext.factory',
                $this->callback(
                    function ($value) {
                        /** @var Definition $value */
                        $this->assertInstanceOf(Definition::class, $value);
                        $this->assertEquals(AttributeTypeFactory::class, $value->getClass());
                        $this->assertCount(1, $value->getTag('metamodels.attribute_factory'));

                        return true;
                    }
                )],
                [RgXpOptionsListener::class,
                $this->callback(
                    function ($value) {
                        /** @var Definition $value */
                        $this->assertInstanceOf(Definition::class, $value);
                        $this->assertCount(1, $tags = $value->getTag('kernel.event_listener'));
                        $this->assertCount(2, $tags[0]);
                        $this->assertSame('dc-general.view.contao2backend.get-property-options', $tags[0]['event']);
                        $this->assertSame('getRgxpOptions', $tags[0]['method']);

                        return true;
                    }
                )]
            );

        $extension = new MetaModelsAttributeTranslatedTextExtension();
        $extension->load([], $container);
    }
}
