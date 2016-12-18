<?php

namespace amocrmTest\unit\Mock\Mapper;

class ObjectWithPrivateProperties
{
    private $property;
    private $propertyCamelCase;

    /**
     * @return mixed
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @param mixed $property
     */
    public function setProperty($property)
    {
        $this->property = $property;
    }

    /**
     * @return mixed
     */
    public function getPropertyCamelCase()
    {
        return $this->propertyCamelCase;
    }

    /**
     * @param mixed $propertyCamelCase
     */
    public function setPropertyCamelCase($propertyCamelCase)
    {
        $this->propertyCamelCase = $propertyCamelCase;
    }
}