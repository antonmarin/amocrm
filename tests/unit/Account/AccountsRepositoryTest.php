<?php

use amocrm\Account\AccountsRepository;

/**
 * Тестируем репозиторий accounts
 *
 * @package amocrm\Account
 * @coversDefaultClass amocrm\Account\AccountsRepository
 */
class AccountsRepositoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * Возвращаемые модели должны быть заполнены
     *
     * @covers ::getCurrent
     */
    public function testGetCurrentShouldFillModel()
    {
        $accountParams = [
            'id' => '2747182',
            'name' => 'CompanyName',
            'subdomain' => 'nnm',
            'currency' => 'UAH',
            'paid_from' => 1356984000,
            'paid_till' => 1517342400,
            'timezone' => 'Europe/Moscow',
            'date_pattern' => 'd.m.Y H:i',
            'language' => 'ru',
            'users' => [
                [
                    'id' => '52169',
                    'name' => 'John',
                    'last_name' => 'Thomas',
                    'login' => 'John@amocrm.com',
                    'rights_lead_add' => 'A',
                    'rights_lead_view' => 'A',
                    'rights_lead_edit' => 'A',
                    'rights_lead_delete' => 'A',
                    'rights_lead_export' => 'D',
                    'rights_contact_add' => 'A',
                    'rights_contact_view' => 'A',
                    'rights_contact_edit' => 'A',
                    'rights_contact_delete' => 'A',
                    'rights_contact_export' => 'D',
                ],
            ],
            'leads_statuses' => [
                [
                    'name' => 'Initial contact',
                    'id' => '2747196',
                    'color' => '#99CCFF',
                    'editable' => 'Y'
                ],
            ],
            'custom_fields' => [
                'contacts' => [
                    [
                        'id' => 116294,
                        'name' => 'Phone',
                        'code' => 'PHONE',
                        'multiple' => 'Y',
                        'type_id' => 8,
                        'enums' => [
                            'FAX',
                            'MOB',
                            'HOME',
                            'OTHER',
                            'WORK',
                            'WORKDD',
                        ],
                    ],
                ],
                'leads' => [
                    [
                        'id' => 484604,
                        'name' => 'textfield',
                        'code' => null,
                        'multiple' => 'N',
                        'type_id' => 1,
                    ],
                ],
            ],
            'note_types' => [
                [
                    'id' => 1,
                    'name' => '',
                    'code' => 'DEAL_CREATED',
                    'editable' => 'N',
                ],
            ],
            'task_types' => [
                [
                    'id' => 1,
                    'name' => 'Call',
                    'code' => 'CALL',
                ],
            ],
            'server_time' => time(),
        ];

        /** @var \amocrm\Connection\ConnectionInterface $connection */
        $connection = $this->getMockBuilder('\amocrm\Connection\ConnectionInterface')
                    ->disableOriginalConstructor()
                    ->getMock();
        $connection->method('sendRequest')
            ->willReturn(['account' => $accountParams, 'server_time' => time()]);

        $accounts = new AccountsRepository($connection);
        $account  = $accounts->getCurrent();

        $this->assertInstanceOf('\amocrm\Account\Account', $accounts->getCurrent());
        $this->assertEquals($accountParams['id'], $account->getId());
        $this->assertEquals($accountParams['name'], $account->getName());
        $this->assertEquals($accountParams['subdomain'], $account->getSubdomain());
        $this->markTestIncomplete('еще не вcе свойства протестированы');
    }
}
