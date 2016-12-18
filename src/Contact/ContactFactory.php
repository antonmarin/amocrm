<?php

namespace amocrm\Contact;

class ContactFactory
{
    /**
     * Создать модель контакта
     *
     * @param array $params
     *
     * @return ContactInterface
     */
    public function create($params)
    {
        if (empty($params['type'])) {
            throw new \BadMethodCallException('Type is not set');
        }
        switch ($params['type']) {
            case 'contact':
                return new Contact();
                break;
            case 'company':
                return new Company();
                break;
            default:
                throw new \InvalidArgumentException('Type '.$params['type']. ' is not implemented');
                break;
        }
    }
}