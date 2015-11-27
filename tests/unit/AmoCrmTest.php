<?php

namespace amocrm\tests;

/**
 * Тест основного класса
 */
class AmoCrmTest extends \Codeception\TestCase\Test
{
    /**
     * new AmoCrm($subdomain, $email, $key)
     */
    public function testConstructor(){
        $amoCrm = new \amocrm\AmoCrm('subdomain', 'email@email.com', 'apikey');
        $this->assertInstanceOf('\amocrm\AmoCrm', $amoCrm);
    }

    /**
     * https://subdomain.amocrm.ru.
     */
    public function testGetHost(){

    }

    /**
     * Авторизация
     */
    public function testAuth(){

    }

    /**
     * При получении ошибки 429 - нужно секунду подождать
     */
    public function testTimeoutOn429(){

    }
}