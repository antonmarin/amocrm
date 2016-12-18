<?php
use amocrm\Contact\ContactsRepository;

/**
 * Тестируем шлюз контактов
 *
 * @package antonmarin\amocrm
 */
class ContactsRepositoryTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var \amocrm\Contact\ContactsRepository
	 */
	protected $gate;

	public function testSet()
	{
		// todo implement
	}

	public function testGetListShouldReturnModels()
	{
        $connection = $this->getMockBuilder('\amocrm\Connection\ConnectionInterface')
                    ->disableOriginalConstructor()
                    ->getMock();
        $connection->method('sendRequest')
            ->willReturn(['contacts' => []]);

        $gate = new ContactsRepository($connection);
		$contacts = $gate->getList();
		$this->assertNotNull($contacts);
		foreach ($contacts as $contact) {
			$this->assertInstanceOf('\amocrm\Contact\Contact', $contact);
		}
	}

	public function testGetLinks()
	{
		// todo implement
	}
}
