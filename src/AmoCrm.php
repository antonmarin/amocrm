<?php

namespace amocrm;

use amocrm\gates\Accounts;
use amocrm\gates\Calls;
use amocrm\gates\Company;
use amocrm\gates\Contacts;
use amocrm\gates\Fields;
use amocrm\gates\Leads;
use amocrm\gates\Notes;
use amocrm\gates\Tasks;

/**
 * Компонент
 *
 * Отвечает за соединение с AmoCrm (Авторизация и отравка запросов) и получение шлюзов сущностей
 * Usage:
 * <pre>
 * $amocrm = new AmoCrm($subdomain, $email, $key);
 * </pre>
 * @package antonmarin\amocrm
 */
class AmoCrm
{
    const URL = 'https://%s.amocrm.ru/private/api/v2/json/';
    const AUTH_URL = 'https://%s.amocrm.ru/private/api/auth.php?type=json';

    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';

    protected $subdomain;
    protected $email;
    protected $key;
    protected $sessionId;

    /**
     * @param $subdomain string Субдомен вашего аккаунта {subdomain}.amocrm.ru
     * @param $email string Email аккаунта к которому выполнить подключение
     * @param $key string API ключ. Можно найти в настройках AmoCrm, в разделе API
     */
    public function __construct($subdomain, $email, $key)
    {
        $this->subdomain = $subdomain;
        $this->email = $email;
        $this->key = $key;
    }

    public function getAccounts(){
        return new Accounts($this);
    }

    public function getContacts()
    {
        return new Contacts($this);
    }

    public function getLeads()
    {
        return new Leads($this);
    }

    public function getCompany()
    {
        return new Company($this);
    }

    public function getTasks()
    {
        return new Tasks($this);
    }

    public function getNotes()
    {
        return new Notes($this);
    }

    public function getFields()
    {
        return new Fields($this);
    }

    public function getCalls()
    {
        return new Calls($this);
    }

    /**
     * Отправить запрос к AmoCrm
     *
     * @param $method string GET/POST
     * @param $url string относительный адрес ресурса
     * @param $params array данные, передаваемые в запросе
     *
     * @return null|array массив-ответ от CRM
     */
    public function sendRequest($method, $url, $params = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');

        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_COOKIEFILE, __DIR__ . '/amoCrmCookie.txt');
        curl_setopt($curl, CURLOPT_COOKIEJAR, __DIR__ . '/amoCrmCookie.txt');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        switch ($method) {
            case self::METHOD_POST:
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                break;
            case self::METHOD_GET:
                $url .= '?'.http_build_query($params);
                break;
            default:
                throw new \LogicException('Unexpected method');
                break;
        }
        curl_setopt($curl, CURLOPT_URL, $this->getUrl() . '/' . $url);
        $result = curl_exec($curl);

        $code      = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $curlError = curl_error($curl);
        curl_close($curl);

        $errors = array(
            301 => 'Moved permanently',
            400 => 'Bad request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not found',
            500 => 'Internal server error',
            502 => 'Bad gateway',
            503 => 'Service unavailable'
        );

        if ($code != 200 && $code != 204) {
            if (isset( $errors[$code] )) {
                $curlError = $errors[$code];
            }
            throw new \RuntimeException($curlError, $code);
        }

        $Response = json_decode($result, true);

        return $Response['response'];
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