<?php

use amocrm\Account\Account;

/**
 * @package amocrm\Account
 * @coversDefaultClass amocrm\Account\Account
 */
class AccountTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers ::getName
     */
    public function testGetName()
    {
        $model = new Account();
        $refObject = new ReflectionObject($model);
        $property = $refObject->getProperty('name');
        $property->setAccessible(true);
        $property->setValue($model, 'some_name');
        $this->assertEquals('some_name', $model->getName());
    }

    public function testGetId()
    {
        $model = new Account();
        $refObject = new ReflectionObject($model);
        $property = $refObject->getProperty('id');
        $property->setAccessible(true);
        $property->setValue($model, 123);
        $this->assertEquals(123, $model->getId());
    }

    /**
     * Test disabled
     * @dataProvider propertyProvider
     * @covers ::<public>
     * @param string $propertyName
     * @param mixed $value
     */
    public function setProperty($propertyName, $value)
    {
        $model = new Account();
        $methodName = 'set' . str_replace(" ", "", ucwords(strtr($propertyName, "_-", "  ")));
        $model->$methodName($value);

        $refObject = new ReflectionObject($model);
        $property = $refObject->getProperty($propertyName);
        $property->setAccessible(true);
        $this->assertEquals($value, $property->getValue($model));
    }

    /**
     * @dataProvider propertyProvider
     * @covers ::<public>
     * @param string $propertyName
     * @param mixed $value
     */
    public function testGetProperty($propertyName, $value)
    {
        $model = new Account();
        $methodName = 'get' . str_replace(" ", "", ucwords(strtr($propertyName, "_-", "  ")));
        $refObject = new ReflectionObject($model);
        $property = $refObject->getProperty($propertyName);
        $property->setAccessible(true);
        $property->setValue($model, $value);
        $this->assertEquals($value, $model->$methodName());
    }

    /**
     * Провайдер для тестирования геттеров
     * @return array [имя_свойства, значение]
     */
    public function propertyProvider()
    {
        return [
            ['name', 'some_name'],
            ['subdomain', 'some_domain'],
            ['currency', 'UAH'],
            ['paidFrom', new DateTime()],
            ['paidTill', new DateTime()],
            ['timezone', new DateTimeZone('Europe/Moscow')],
            ['datePattern', 'd.m.Y H:i'],
            ['language', 'ru'],
        ];
    }
}
