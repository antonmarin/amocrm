<?php

use amocrm\gates\Accounts;

/**
 * Тестируем шлюз accounts
 *
 * @package antonmarin\amocrm
 */
class AccountsTest extends PHPUnit_Framework_TestCase
{
    /**
     * Шлюз должен возвращать модели
     */
    public function testGetCurrentShouldReturnModel()
    {
        /** @var \amocrm\AmoCrm $crm */
        $crm = $this->getMockBuilder('\amocrm\AmoCrm')
            ->disableOriginalConstructor()
            ->getMock();
        $crm->method('sendRequest')
            ->willReturn(['account' => []]);

        $accounts = new Accounts($crm);
        $this->assertInstanceOf('\amocrm\entities\Account', $accounts->getCurrent());
    }

    /**
     * Возвращаемые модели должны быть заполнены
     *
     * @depends testGetCurrentShouldReturnModel
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
            'server_time' => time(),
        ];
        /** @var \amocrm\AmoCrm $crm */
        $crm = $this->getMockBuilder('\amocrm\AmoCrm')
                    ->disableOriginalConstructor()
                    ->getMock();
        $crm->method('sendRequest')
            ->willReturn(['account' => $accountParams, 'server_time' => time()]);

        $accounts = new Accounts($crm);
        $account  = $accounts->getCurrent();
        $refObject = new ReflectionObject($account);
        foreach ($refObject->getProperties() as $property) {
            $property->setAccessible(true);
            $propertyName = strtolower(preg_replace('~(?<=\\w)([A-Z])~', '_$1', $property->name));
            $this->assertEquals($accountParams[$propertyName], $property->getValue($account));
        }

    }
}