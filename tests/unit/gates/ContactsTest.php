<?php


namespace amocrm\tests\unit\gates;

use Codeception\TestCase\Test;
use Codeception\Util\Stub;

/**
 * Тестируем шлюз контактов
 *
 * @package antonmarin\amocrm
 */
class ContactsTest extends Test
{
    public function testSet(){

    }

    public function testGetList(){
        $gate = Stub::make('\amocrm\gates\Contacts');
        $contacts = $gate->getList();
        $this->assertNotNull($contacts);
        foreach($contacts as $contact){
            $this->assertInstanceOf('\amocrm\gates\Contacts', $contact);
        }
    }

    public function testGetLinks(){

    }
}
