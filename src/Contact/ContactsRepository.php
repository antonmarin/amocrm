<?php

namespace amocrm\Contact;

use amocrm\Connection\ConnectionInterface;
use amocrm\Repository;

/**
 * Шлюз контактов
 *
 * @link https://developers.amocrm.ru/rest_api/#contact
 * @package antonmarin\amocrm
 */
class ContactsRepository extends Repository
{
    protected $factory;

    public function __construct(ConnectionInterface $connection)
    {
        parent::__construct($connection);
        $this->factory = new ContactFactory();
    }

    /**
     * Добавление и обновление контактов
     *
     * @param $contacts ContactInterface[]
     *
     * @link https://developers.amocrm.ru/rest_api/contacts_set.php
     */
    public function set($contacts)
    {
        // TODO implement
    }

    /**
     * Список контактов
     *
     * @param $params array массив параметров. Допустимые значения:<br/>
     * <ul>
     * <li>
     * if-modified-since (изменено с) - Mon, 22 Jul 2013 10:35:00.
     * Данные нужно передавать в формате D, d M Y H:i:s через HTTP-заголовок
     * </li>
     * <li>limit_rows - Кол-во выбираемых строк (системное ограничение 500)</li>
     * <li>limit_offset - Оффсет выборки (с какой строки выбирать)
     *  (Работает, только при условии, что limit_rows тоже указан)</li>
     * <li>
     * id - Выбрать элемент с заданным ID
     * (Если указан этот параметр, все остальные игнорируются)
     * (Можно передавать в виде массива состоящий из нескольких ID)
     * </li>
     * <li>
     * query - Искомый элемент, по текстовому запросу
     * Осуществляет поиск по полям: почта, телефон и любым иным полям.
     * Не осуществляет поиск по заметкам и задачам
     * </li>
     * <li>
     * responsible_user_id - фильтр поиска по ответственному пользователю.
     * Можно передавать в виде массива.
     * </li>
     * <li>type - Тип контакта: contact(по-умолчанию), company или all</li>
     * </ul>
     *
     * @link https://developers.amocrm.ru/rest_api/contacts_list.php
     * @return ContactInterface[]
     */
    public function getList($params = [])
    {
        $result   = $this->getConnection()->sendRequest('GET', 'contacts/list', $params);
        $contacts = [];
        foreach ($result['contacts'] as $contact) {
            $contacts[] = $this->factory->create($contact);
        }

        return $contacts;
    }

    /**
     * Получить связанные сделки
     *
     * Позволяет получить
     *
     * @param $params array массив параметров. Допустимые значения:<br/>
     * <ul>
     * <li>contacts_link / deals_link - Массив id соответственно контактов или сделок
     * Используется для получения id сделок, связанных с переданным списком id контактов (и наоборот)</li>
     * <li>limit_rows - Кол-во выбираемых строк (системное ограничение 500)</li>
     * <li>
     * limit_offset - Оффсет выборки (с какой строки выбирать)
     * Работает, только при условии, что limit_rows тоже указан
     * </li>
     * </ul>
     *
     * @link https://developers.amocrm.ru/rest_api/contacts_links.php
     */
    public function getLinks($params = [])
    {
        // todo implement
    }
}