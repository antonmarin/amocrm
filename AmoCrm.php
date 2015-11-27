<?php

namespace amocrm;

/**
 * Базовый класс
 *
 * Отвечает за соединение с AmoCrm
 * Usage:
 * <pre>
 * $amocrm = new AmoCrm($subdomain, $email, $key);
 * </pre>
 * @package antonmarin\AmoCrm
 */
class AmoCrm
{
    protected $subdomain;
    protected $email;
    protected $key;

    /**
     * @param $subdomain string Субдомен вашего аккаунта {subdomain}.amocrm.ru
     * @param $email string Email аккаунта к которому выполнить подключение
     * @param $key string API ключ. Можно найти в настройках AmoCrm, в разделе API
     */
    function __construct($subdomain, $email, $key)
    {
        $this->subdomain = $subdomain;
        $this->email = $email;
        $this->key = $key;
    }

}