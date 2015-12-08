<?php

namespace amocrm\gates;

use amocrm\entities\Account;
use amocrm\Gate;

/**
 * Шлюз аккаунтов
 *
 * @link https://developers.amocrm.ru/rest_api/#account
 * @package antonmarin\amocrm
 */
class Accounts extends Gate
{
    /**
     * Получить данные по аккаунту
     *
     * @see https://developers.amocrm.ru/rest_api/accounts_current.php
     * @return Account
     */
    public function getCurrent()
    {
        $result = $this->getCrm()->sendRequest('GET', $this->getUrl());
        return new Account($result['account']);
    }

    /**
     * @inheritdoc
     */
    protected function getUrl()
    {
        return 'accounts/current';
    }

}