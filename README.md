Библиотека для работы с AmoCrm
==============================
Главная задача библиотеки - максимальная приближенность к официальной документации.
Метод, описанный в официальной документации как:
`contacts/list`
реализован в библиотеке как:
`$amocrm->getContacts()->getList();`

[![Build Status](https://travis-ci.org/antonmarin/amocrm.svg?branch=master)](https://travis-ci.org/antonmarin/amocrm)
[![Dependency Status](https://www.versioneye.com/php/antonmarin:amocrm/dev-master/badge)](https://www.versioneye.com/php/antonmarin:amocrm/dev-master)
[![Latest Stable Version](https://poser.pugx.org/antonmarin/amocrm/v/stable)](https://packagist.org/packages/antonmarin/amocrm)

[![Code Climate](https://codeclimate.com/github/antonmarin/amocrm/badges/gpa.svg)](https://codeclimate.com/github/antonmarin/amocrm)
[![Issue Count](https://codeclimate.com/github/antonmarin/amocrm/badges/issue_count.svg)](https://codeclimate.com/github/antonmarin/amocrm)
[![Test Coverage](https://codeclimate.com/github/antonmarin/amocrm/badges/coverage.svg)](https://codeclimate.com/github/antonmarin/amocrm/coverage)

[![Latest Unstable Version](https://poser.pugx.org/antonmarin/amocrm/v/unstable)](https://packagist.org/packages/antonmarin/amocrm)
[![Total Downloads](https://poser.pugx.org/antonmarin/amocrm/downloads)](https://packagist.org/packages/antonmarin/amocrm)
[![Reference Status](https://www.versioneye.com/php/antonmarin:amocrm/reference_badge.svg)](https://www.versioneye.com/php/antonmarin:amocrm/references)
[![License](https://poser.pugx.org/antonmarin/amocrm/license)](https://packagist.org/packages/antonmarin/amocrm)

Пример использования
--------------------
```
$amocrm = new \amocrm\AmoCrm($subdomain, $email, $key);
$list = $amocrm->getLeads()->getList();
```

Архитектура
-----------
- CRM. Класс \amocrm\AmoCrm. Занимается авторизацией и отправкой запросов. 
- Шлюзы. Наследники \amocrm\gates\Gate. Шлюзы для работы с сущностями AmoCrm. 
Реализуют интерфейс API, указанный на [сайте](https://developers.amocrm.ru/rest_api/).
- Модели. Наследники \amocrm\entities\Entity. Внутренние сущности. Упрощают работу. 
Возвращаются шлюзами.
