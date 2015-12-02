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
 * Базовый класс
 *
 * Отвечает за соединение с AmoCrm: Авторизация и отравка запросов
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
}