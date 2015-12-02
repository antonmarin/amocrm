<?php

namespace amocrm\gates;

/**
 * Базовый класс шлюза для работы с сущностью
 *
 * Шлюз реализует интерфейс, определенный в {@link https://developers.amocrm.ru/rest_api/ API}
 * @package antonmarin\AmoCrm
 */
abstract class Gate
{
    /**
     * @var \amocrm\AmoCrm Объект ЦРМ, через который выполняются все запросы
     */
    protected $crm;

    /**
     * Без объекта ЦРМ ничего работать не будет, поэтому передаем его в конструктор
     *
     * @param $crm \amocrm\AmoCrm
     */
    public function __constructor($crm){
        $this->crm = $crm;
    }

    /**
     * Адрес шлюза
     *
     * @return string
     * @example accounts/current
     */
    abstract protected function getUri();
}