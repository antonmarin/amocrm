<?php

namespace amocrmTest\unit;

use amocrm\Mapper;
use amocrmTest\unit\Mock\Mapper\ObjectWithPrivateProperties;

class MapperTest extends \PHPUnit_Framework_TestCase
{
    /** @var Mapper */
    private $mapper;

    protected function setUp()
    {
        $this->mapper = new Mapper();
    }

    /**
     * Должен уметь заполнять приватные свойства
     */
    public function testShouldFillPrivateValues()
    {
        $entity = new ObjectWithPrivateProperties();
        $values = [
            'property' => 123,
        ];
        $this->mapper->fillEntity($entity, $values);
        $object = new \ReflectionObject($entity);
        $property = $object->getProperty('property');
        $this->assertTrue($property->isPrivate());
        $property->setAccessible(true);
        $this->assertEquals($values['property'], $property->getValue($entity));
        $this->assertTrue($property->isPrivate());
    }

    /**
     * Свойства написанные в camelCase должны заполняться из значений under_score
     */
    public function testShouldFillCamelCasePropertiesFromUnderscore()
    {
        $entity = new ObjectWithPrivateProperties();
        $values = [
            'property_camel_case' => 123,
        ];
        $this->mapper->fillEntity($entity, $values);
        $object = new \ReflectionObject($entity);
        $property = $object->getProperty('propertyCamelCase');
        $this->assertTrue($property->isPrivate());
        $property->setAccessible(true);
        $this->assertEquals($values['property_camel_case'], $property->getValue($entity));
        $this->assertTrue($property->isPrivate());
    }
}
