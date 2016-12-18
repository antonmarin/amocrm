<?php

use amocrm\entities\Account;

class AccountTest extends PHPUnit_Framework_TestCase
{
    public function testShouldBeAbleToCreateEmptyModel()
    {
        $model = new Account();
        $this->assertInstanceOf('amocrm\entities\Account', $model);
    }
}
