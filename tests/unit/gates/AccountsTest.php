<?php

namespace amocrm\tests\unit\gates;

use amocrm\gates\Accounts;
use Codeception\TestCase\Test;
use Codeception\Util\Stub;

/**
 * Тестируем шлюз accounts
 *
 * @package antonmarin\amocrm
 */
class AccountsTest extends Test
{
    public function testGetCurrent()
    {
        /** @var \amocrm\AmoCrm $crm */
        $crm = Stub::make(
            '\amocrm\AmoCrm',
            ['sendRequest' => ['account' => [], 'server_time' => time()]]
        );
        $accounts = new Accounts($crm);
        $this->assertInstanceOf('\amocrm\entities\Account', $accounts->getCurrent());
    }
}