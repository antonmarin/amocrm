<?php

namespace amocrm\Account;

use DateTime;
use DateTimeZone;

/**
 * Формат даты:
 * D	Текстовое представление дня недели, 3 символа
 * d	День месяца, 2 цифры с ведущим нулём
 * M	Сокращенное наименование месяца, 3 символа
 * m	Порядковый номер месяца с ведущим нулём
 * Y	Порядковый номер года, 4 цифры
 * H	Часы в 24-часовом формате с ведущим нулём
 * i	Минуты с ведущим нулём
 * s	Секунды с ведущим нулём
 *
 * @package amocrm\Account
 */
class Account
{
    private $id;
    private $name;
    private $subdomain;
    private $currency;
    private $paidFrom;
    private $paidTill;
    private $timezone;
    private $datePattern;
    private $language;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSubdomain()
    {
        return $this->subdomain;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return DateTime
     */
    public function getPaidFrom()
    {
        return $this->paidFrom;
    }

    /**
     * @return DateTime
     */
    public function getPaidTill()
    {
        return $this->paidTill;
    }

    /**
     * @return DateTimeZone
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @return string
     */
    public function getDatePattern()
    {
        return $this->datePattern;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
