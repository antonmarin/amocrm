<?php

namespace amocrm\Connection;

/**
 * Http клиент для отправки запроса
 * @package amocrm
 */
interface HttpClientInterface
{
    public function sendRequest($method, $url, $params = null);
}