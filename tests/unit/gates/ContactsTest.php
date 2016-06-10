<?php

/**
 * Тестируем шлюз контактов
 *
 * @package antonmarin\amocrm
 */
class ContactsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var amocrm\gates\Contacts
     */
    protected $gate;

    protected function setUp()
    {
        $this->gate = $this->getMockBuilder('\amocrm\gates\Contacts')
            ->disableOriginalConstructor()
            ->setMethods(null)
            ->getMock();
    }

    public function testSet(){
        // todo implement
    }

    public function testGetList(){

        $contacts = $this->gate->getList();
        $this->assertNotNull($contacts);
        foreach($contacts as $contact){
            $this->assertInstanceOf('\amocrm\gates\Contacts', $contact);
        }
    }

    public function testGetLinks(){
        // todo implement
    }
}
