<?php

namespace amocrm\gates;

/**
 * Шлюз аккаунтов
 *
 * @link https://developers.amocrm.ru/rest_api/#account
 * @package antonmarin\AmoCrm
 */
class Accounts extends Gate
{
    /**
     * @inheritdoc
     */
    protected function getUri()
    {
        return 'accounts/current';
    }

}