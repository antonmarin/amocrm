<?php

namespace amocrm;

/**
 * Базовый класс шлюза для работы с сущностью
 *
 * Шлюз реализует интерфейс, определенный в {@link https://developers.amocrm.ru/rest_api/ API}
 * @todo переделать на репозитории для упрощения взаимодействия
 * @package antonmarin\amocrm
 */
abstract class Gate
{
    /** @var \amocrm\AmoCrm Объект ЦРМ, через который выполняются все запросы */
    protected $crm;

    /**
     * @todo нужно уменьшить связанность
     * @var \amocrm\Mapper Мэппер, который преобразует ответ в модель
     */
    protected $mapper;

    /**
     * Без объекта ЦРМ ничего работать не будет, поэтому передаем его в конструктор
     *
     * @param $crm \amocrm\AmoCrm
     */
    public function __construct($crm)
    {
        $this->crm    = $crm;
        $this->mapper = new Mapper();
    }

    /**
     * @return AmoCrm
     */
    protected function getCrm()
    {
        return $this->crm;
    }

    /**
     * Адрес шлюза
     *
     * @return string
     * @example accounts/current
     */
    abstract protected function getUrl();
}