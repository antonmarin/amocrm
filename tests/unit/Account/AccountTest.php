<?php

use amocrm\Account\Account;

/**
 * @package amocrm\Account
 */
class AccountTest extends PHPUnit_Framework_TestCase
{
    public function testShouldBeAbleToCreateEmptyModel()
    {
        $model = new Account();
        $this->assertInstanceOf('amocrm\Account\Account', $model);
    }
}
