<?php

/**
 * This file is part of MetaModels/attribute_translatedtext.
 *
 * (c) 2012-2017 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    MetaModels
 * @subpackage AttributeTranslatedText
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2012-2017 The MetaModels team.
 * @license    https://github.com/MetaModels/attribute_text/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

namespace MetaModels\AttributeTranslatedTextBundle\Test;

use MetaModels\AttributeTranslatedTextBundle\Attribute\AttributeTypeFactory;
use MetaModels\AttributeTranslatedTextBundle\Attribute\TranslatedText;
use PHPUnit\Framework\TestCase;

/**
 * This class tests if the deprecated autoloader works.
 *
 * @package MetaModels\AttributeTranslatedTextBundle\Test
 */
class DeprecatedAutoloaderTest extends TestCase
{
    /**
     * TranslatedTextes of old classes to the new one.
     *
     * @var array
     */
    private static $classes = [
        'MetaModels\Attribute\TranslatedText\TranslatedText'       => TranslatedText::class,
        'MetaModels\Attribute\TranslatedText\AttributeTypeFactory' => AttributeTypeFactory::class
    ];

    /**
     * Provide the alias class map.
     *
     * @return array
     */
    public function provideAliasClassMap()
    {
        $values = [];

        foreach (static::$classes as $translatedText => $class) {
            $values[] = [$translatedText, $class];
        }

        return $values;
    }

    /**
     * Test if the deprecated classes are aliased to the new one.
     *
     * @param string $oldClass Old class name.
     * @param string $newClass New class name.
     *
     * @dataProvider provideAliasClassMap
     */
    public function testDeprecatedClassesAreAliased($oldClass, $newClass)
    {
        $this->assertTrue(class_exists($oldClass), sprintf('Class TranslatedTExt "%s" is not found.', $oldClass));

        $oldClassReflection = new \ReflectionClass($oldClass);
        $newClassReflection = new \ReflectionClass($newClass);

        $this->assertSame($newClassReflection->getFileName(), $oldClassReflection->getFileName());
    }
}
