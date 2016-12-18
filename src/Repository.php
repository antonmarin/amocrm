<?php

namespace amocrm;

use amocrm\Connection\ConnectionInterface;

/**
 * Базовый класс репозитория для работы с сущностью
 *
 * Реализует интерфейс, определенный в {@link https://developers.amocrm.ru/rest_api/ API}
 */
abstract class Repository
{
    /** @var ConnectionInterface Объект ЦРМ, через который выполняются все запросы */
    protected $connection;

    protected $mapper;

    /**
     * @param $connection ConnectionInterface Подключение к AmoCRM
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Получить подключение к AmoCRM
     *
     * @return ConnectionInterface
     */
    protected function getConnection()
    {
        return $this->connection;
    }

    /**
     * Получить мэппер для сборки результата запроса в модель
     *
     * Для использования специализированного мэппера нужно переопределить метод
     * @return ArrayMapper
     */
    protected function getMapper()
    {
        if (empty($this->mapper)) {
            $this->mapper = new ArrayMapper();
        }

        return $this->mapper;
    }
}
