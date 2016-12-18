<?php
namespace amocrm\Account;


/**
 * Шлюз аккаунтов
 *
 * @link https://developers.amocrm.ru/rest_api/#account
 */
interface AccountsRepositoryInterface
{
    /**
     * Получить данные по аккаунту
     *
     * @see https://developers.amocrm.ru/rest_api/accounts_current.php
     * @return Account
     */
    public function getCurrent();
}