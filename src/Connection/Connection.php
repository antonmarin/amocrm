<?php

namespace amocrm\Connection;

class Connection implements ConnectionInterface
{
    const URL = 'https://%s.amocrm.ru/private/api/v2/json/';
    const AUTH_URL = 'https://%s.amocrm.ru/private/api/auth.php?type=json';

    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';

    protected $subdomain;
    protected $email;
    protected $key;
    protected $httpClient;
    protected $sessionId;

    /**
     * @param $subdomain string Субдомен вашего аккаунта {subdomain}.amocrm.ru
     * @param $email string Email аккаунта к которому выполнить подключение
     * @param $key string API ключ. Можно найти в настройках AmoCrm, в разделе API
     * @param null|HttpClientInterface $httpClient Http клиент при помощи которого совершается запрос
     */
    public function __construct($subdomain, $email, $key, HttpClientInterface $httpClient)
    {
        $this->subdomain  = $subdomain;
        $this->email      = $email;
        $this->key        = $key;
        $this->httpClient = $httpClient;
    }

    public function sendRequest($method, $url, $params = null)
    {
        $response = $this->getHttpClient()->sendRequest($method, $this->getUrl() . $url, $params);

        return ! empty($response['response'])
            ? $response['response']
            : null;
    }

    /**
     * Http клиент
     * @return HttpClientInterface
     */
    private function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * Адрес API
     *
     * @return string
     */
    private function getUrl()
    {
        return sprintf(self::URL, $this->subdomain);
    }
}
