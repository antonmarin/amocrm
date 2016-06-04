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
        //$gate = Stub::make('\amocrm\gates\Contacts');
        $contacts = $gate->getList();
        $this->assertNotNull($contacts);
        foreach($contacts as $contact){
            $this->assertInstanceOf('\amocrm\gates\Contacts', $contact);
        }
    }

    public function testGetLinks(){

    }
}
