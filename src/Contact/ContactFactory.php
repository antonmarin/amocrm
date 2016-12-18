<?php


namespace amocrm\Contact;


class ContactFactory implements ContactFactoryInterface
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
                break;
            case 'company':
                break;
            default:
                throw new \InvalidArgumentException('Type '.$params['type']. ' is not implemented');
                break;
        }
    }
}