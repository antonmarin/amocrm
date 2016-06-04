<?php

/**
 * Тестируем шлюз контактов
 *
 * @package antonmarin\amocrm
 */
class ContactsTest extends PHPUnit_Framework_TestCase
{
    public function testSet(){

    }

    public function testGetList(){
        $gate = $this->getMockBuilder('\amocrm\gates\Contacts')
            ->disableOriginalConstructor()
            ->getMock();
        $contacts = $gate->getList();
        $this->assertNotNull($contacts);
        foreach($contacts as $contact){
            $this->assertInstanceOf('\amocrm\gates\Contacts', $contact);
        }
    }

    public function testGetLinks(){

    }
}
