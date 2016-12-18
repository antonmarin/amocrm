<?php

use amocrm\Connection\Connection;

class ConnectionTest extends PHPUnit_Framework_TestCase
{
    public function testHttpClientInjection()
    {
        $httpClient = $this
            ->getMockBuilder('\amocrm\Connection\HttpClientInterface')
            ->getMock();
        $connection = new Connection('subdomain', 'email@email.com', 'apiKey', $httpClient);
        $this->assertInstanceOf('\amocrm\Connection\Connection', $connection);
    }

    /**
     * Http клиент может быть внедрен только через интерфейс HttpClientInterface
     * @expectedException PHPUnit_Framework_Error
     */
    public function testHttpClientInjectionOnlyHttpClient()
    {
        /** @noinspection PhpParamsInspection */
        new Connection('subdomain', 'email@email.com', 'apiKey', []);
    }

    public function testSendRequestShouldBePassedToHttpClient()
    {
        $httpClient = $this
            ->getMockBuilder('\amocrm\Connection\HttpClientInterface')
            ->setMethods(['sendRequest'])
            ->getMock();
        $httpClient
            ->expects($this->once())
            ->method('sendRequest');
        $connection = new Connection('subdomain', 'email@email.com', 'apiKey', $httpClient);
        $connection->sendRequest(Connection::METHOD_GET, 'some_url_here');
    }

    public function testSendRequestShouldAddCRMUrl()
    {
        $httpClient = $this
            ->getMockBuilder('\amocrm\Connection\HttpClientInterface')
            ->setMethods(['sendRequest'])
            ->getMock();
        $httpClient
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo('GET'), $this->equalTo('https://subdomain.amocrm.ru/private/api/v2/json/some_url_here'));
        $connection = new Connection('subdomain', 'email@email.com', 'apiKey', $httpClient);
        $connection->sendRequest(Connection::METHOD_GET, 'some_url_here');
    }
}