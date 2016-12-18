<?php

namespace amocrm\Account;

class Account
{
    private $id;
    private $name;
    private $subdomain;
    private $currency;
    private $paidFrom;
    private $paidTill;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
