<?php


namespace amocrm\entities;


class ContactFactory implements ContactFactoryInterface
{
    /**
     * @inheritdoc
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