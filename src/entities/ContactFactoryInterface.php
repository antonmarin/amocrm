<?php
namespace amocrm\entities;

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