<?php

namespace amocrm;

/**
 * Сущность
 *
 * @package antonmarin\amocrm
 */
abstract class Entity
{
    /**
     * Сущность создается на базе ответа AmoCrm API с информацией о сущности
     *
     * @param $array array ответ AmoCrm API
     */
    public function __construct($array)
    {
        $this->setAttributes($array);
    }

    /**
     * Установить аттрибуты
     * @param $values array Массив, где ключи - имя аттрибута
     */
    public function setAttributes($values){
        if (is_array($values)) {
            foreach ($values as $name => $value) {
                if(method_exists($this,'set'.ucfirst($name))){
                    call_user_func([$this,'set'.ucfirst($name)]);
                }
                if(isset($this->$name)){
                    $this->$name = $value;
                }
            }
        }
    }
}