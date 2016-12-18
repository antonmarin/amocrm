<?php

namespace amocrm;

/**
 * Маппер массива в объект
 *
 * Заполняет объект из массива данных, полученных в ответе
 * @todo нужно добавить интерфейс и добавить инъекцию
 * @package amocrm
 */
class Mapper
{
    /**
     * Заполнить сущность данными
     *
     * @param mixed $entity Сущность, которую нужно заполнить
     * @param array $data данные, которыми нужно заполнить сущность. Ключи - имена свойств, значения - значения
     */
    public function fillEntity($entity, array $data)
    {
        $object = new \ReflectionObject($entity);
        foreach ($data as $key => $value) {
            $propertyName = $this->createPropertyName($key);
            if ( ! $object->hasProperty($propertyName)) {
                continue;
            }
            $property = $object->getProperty($propertyName);
            $property->setAccessible(true);
            $property->setValue($entity, $value);
        }
    }

    /**
     * Сформировать имя свойства, которое нужно заполнить из ключа входного массива
     *
     * @param string $property Имя свойства. Скорее всего under_score
     *
     * @return string Имя свойства объекта. CamelCase
     */
    private function createPropertyName($property)
    {
        return lcfirst(str_replace(" ", "", ucwords(strtr($property, "_-", "  "))));
    }
}
