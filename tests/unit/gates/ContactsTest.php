<?php
use amocrm\gates\Contacts;

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

	public function testSet()
	{
		// todo implement
	}

	public function testGetListShouldReturnModels()
	{
        $crm = $this->getMockBuilder('\amocrm\AmoCrm')
                    ->disableOriginalConstructor()
                    ->getMock();
        $crm->method('sendRequest')
            ->willReturn(['contacts' => []]);

        $gate = new Contacts($crm);
		$contacts = $gate->getList();
		$this->assertNotNull($contacts);
		foreach ($contacts as $contact) {
			$this->assertInstanceOf('\amocrm\entities\Contact', $contact);
		}
	}

	public function testGetLinks()
	{
		// todo implement
	}
}
