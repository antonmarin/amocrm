<?php

namespace amocrm\Account;

use amocrm\Repository;

class AccountsRepository extends Repository implements AccountsRepositoryInterface
{
    public function getCurrent()
    {
        $result = $this->getConnection()->sendRequest('GET', 'accounts/current');
        $account = new Account();
        $this->getMapper()->fillEntity($account, $result['account']);
        return $account;
    }
}
