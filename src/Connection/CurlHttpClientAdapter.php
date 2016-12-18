<?php

namespace amocrm\Connection;

class CurlHttpClientAdapter implements HttpClientInterface
{

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
                $url .= '?' . http_build_query($params);
                break;
            default:
                throw new \LogicException('Unexpected method');
                break;
        }
        curl_setopt($curl, CURLOPT_URL, $url);
        $result = curl_exec($curl);

        $code      = (int)curl_getinfo($curl, CURLINFO_HTTP_CODE);
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
            if (isset($errors[$code])) {
                $curlError = $errors[$code];
            }
            throw new \RuntimeException($curlError, $code);
        }

        return $result;
    }
}