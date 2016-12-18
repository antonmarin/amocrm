<?php
namespace amocrm\Contact;

interface ContactFactoryInterface
{
    /**
     * Создать модель контакта
     *
     * @param array $params
     *
     * @return ContactInterface
     */
    public function create($params);
}