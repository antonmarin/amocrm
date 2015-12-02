<?php

namespace amocrm\tests;

use amocrm\AmoCrm;

/**
 * Тест основного класса
 */
class AmoCrmTest extends \Codeception\TestCase\Test
{
    /**
     * new AmoCrm($subdomain, $email, $key)
     */
    public function testConstructor(){
        $amoCrm = new AmoCrm('subdomain', 'email@email.com', 'apikey');
        $this->assertInstanceOf('\amocrm\AmoCrm', $amoCrm);
    }

    public function testGetAccounts(){
        $amoCrm = new AmoCrm('subdomain', 'email@email.com', 'apikey');
        $this->assertInstanceOf('\amocrm\gates\Accounts',$amoCrm->getAccounts());
    }

    public function testGetContacts(){
        $amoCrm = new AmoCrm('subdomain', 'email@email.com', 'apikey');
        $this->assertInstanceOf('\amocrm\gates\Contacts',$amoCrm->getContacts());
    }

    public function testGetLeads(){
        $amoCrm = new AmoCrm('subdomain', 'email@email.com', 'apikey');
        $this->assertInstanceOf('\amocrm\gates\Leads',$amoCrm->getLeads());
    }

    public function testGetCompany(){
        $amoCrm = new AmoCrm('subdomain', 'email@email.com', 'apikey');
        $this->assertInstanceOf('\amocrm\gates\Company',$amoCrm->getCompany());
    }

    public function testGetTasks(){
        $amoCrm = new AmoCrm('subdomain', 'email@email.com', 'apikey');
        $this->assertInstanceOf('\amocrm\gates\Tasks',$amoCrm->getTasks());
    }

    public function testGetNotes(){
        $amoCrm = new AmoCrm('subdomain', 'email@email.com', 'apikey');
        $this->assertInstanceOf('\amocrm\gates\Notes',$amoCrm->getNotes());
    }

    public function testGetFields(){
        $amoCrm = new AmoCrm('subdomain', 'email@email.com', 'apikey');
        $this->assertInstanceOf('\amocrm\gates\Fields',$amoCrm->getFields());
    }

    public function testGetCalls(){
        $amoCrm = new AmoCrm('subdomain', 'email@email.com', 'apikey');
        $this->assertInstanceOf('\amocrm\gates\Calls',$amoCrm->getCalls());
    }

    /**
     * При получении ошибки 429 - нужно секунду подождать
     */
    public function testTimeoutOn429(){
        // todo implement
    }
}