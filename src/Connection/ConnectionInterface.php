<?php


namespace amocrm\Connection;

/**
 * AmoCRM Connection
 *
 * Отвечает за соединение с AmoCrm (Авторизация и формирование запросов)
 * Usage:
 * <pre>
 * $amocrm = new Connection($subdomain, $email, $key);
 * $accountsRepository = new AccountRepository($amocrm);
 * $account = $accountsRepository->getCurrent();
 * </pre>
 *
 * В качестве http клиента можно использовать приложенный адаптер Curl
 * или другой клиент реализующий HttpClientInterface
 * <pre>
 * $amocrm = new Connection($subdomain, $email, $key, $httpClient);
 * </pre>
 */
interface ConnectionInterface
{
    /**
     * Отправить запрос к AmoCrm
     *
     * @param $method string GET/POST
     * @param $url string относительный адрес ресурса
     * @param $params array данные, передаваемые в запросе
     *
     * @return null|array массив-ответ от CRM
     */
    public function sendRequest($method, $url, $params = null);
}
