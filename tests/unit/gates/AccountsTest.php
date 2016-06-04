<?php

use amocrm\gates\Accounts;

/**
 * Тестируем шлюз accounts
 *
 * @package antonmarin\amocrm
 */
class AccountsTest extends PHPUnit_Framework_TestCase
{
    public function testGetCurrent()
    {
        /** @var \amocrm\AmoCrm $crm */
        $crm = $this->getMockBuilder('\amocrm\AmoCrm')
            ->disableOriginalConstructor()
            ->getMock();
        $crm->method('sendRequest')
            ->willReturn(['account' => [], 'server_time' => time()]);

        $accounts = new Accounts($crm);
        $this->assertInstanceOf('\amocrm\entities\Account', $accounts->getCurrent());
    }
}