<?php

use amocrm\AmoCrm;
use phpunit\framework\TestCase;

/**
 * Тест основного класса
 */
class AmoCrmTest extends TestCase
{
    /**
     * @var \amocrm\AmoCrm
     */
    protected $crm;

    protected function setUp()
    {
        $this->crm = $this->createMock('\amocrm\AmoCrm');
    }

    /**
     * new AmoCrm($subdomain, $email, $key)
     */
    public function testConstructor()
    {
        $amoCrm = new AmoCrm('subdomain', 'email@email.com', 'apiKey');
        $this->assertInstanceOf('\amocrm\AmoCrm', $amoCrm);
    }

    public function testConstructionShouldThrowExceptionIfAnyParamIsAbsent()
    {

    }

    public function testGetAccounts()
    {
        $this->assertInstanceOf('\amocrm\gates\Accounts', $this->crm->getAccounts());
    }

    public function testGetContacts()
    {
        $this->assertInstanceOf('\amocrm\gates\Contacts', $this->crm->getContacts());
    }

    public function testGetLeads()
    {
        $this->assertInstanceOf('\amocrm\gates\Leads', $this->crm->getLeads());
    }

    public function testGetCompany()
    {
        $this->assertInstanceOf('\amocrm\gates\Company', $this->crm->getCompany());
    }

    public function testGetTasks()
    {
        $this->assertInstanceOf('\amocrm\gates\Tasks', $this->crm->getTasks());
    }

    public function testGetNotes()
    {
        $this->assertInstanceOf('\amocrm\gates\Notes', $this->crm->getNotes());
    }

    public function testGetFields()
    {
        $this->assertInstanceOf('\amocrm\gates\Fields', $this->crm->getFields());
    }

    public function testGetCalls()
    {
        $this->assertInstanceOf('\amocrm\gates\Calls', $this->crm->getCalls());
    }

    /**
     * При получении ошибки 429 - нужно секунду подождать
     */
    public function testTimeoutOn429()
    {
        // todo implement
    }
}