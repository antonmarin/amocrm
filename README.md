Библиотека для работы с AmoCrm
==============================

Главная задача библиотеки - максимальная приближенность к официальной документации.
Метод, описанный в официальной документации как:
`contacts/list`
реализован в библиотеке как:
`$contactsRepository->getList();`

[![Build Status](https://travis-ci.org/antonmarin/amocrm.svg?branch=master)](https://travis-ci.org/antonmarin/amocrm)
[![Dependency Status](https://www.versioneye.com/php/antonmarin:amocrm/dev-master/badge)](https://www.versioneye.com/php/antonmarin:amocrm/dev-master)
[![Latest Stable Version](https://poser.pugx.org/antonmarin/amocrm/v/stable)](https://packagist.org/packages/antonmarin/amocrm)
[![License](https://poser.pugx.org/antonmarin/amocrm/license)](https://packagist.org/packages/antonmarin/amocrm)

[![Code Climate](https://codeclimate.com/github/antonmarin/amocrm/badges/gpa.svg)](https://codeclimate.com/github/antonmarin/amocrm)
[![Issue Count](https://codeclimate.com/github/antonmarin/amocrm/badges/issue_count.svg)](https://codeclimate.com/github/antonmarin/amocrm)
[![Test Coverage](https://codeclimate.com/github/antonmarin/amocrm/badges/coverage.svg)](https://codeclimate.com/github/antonmarin/amocrm/coverage)
[![Total Downloads](https://poser.pugx.org/antonmarin/amocrm/downloads)](https://packagist.org/packages/antonmarin/amocrm)
[![Reference Status](https://www.versioneye.com/php/antonmarin:amocrm/reference_badge.svg)](https://www.versioneye.com/php/antonmarin:amocrm/references)

Пример использования
--------------------

```
$connection = new \amocrm\Connection\Connection($subdomain, $email, $key);
$list = (new LeadRepository($connection))->getList();
```

Архитектура
-----------

#### Подключение

Класс \amocrm\Connection\Connection. Занимается авторизацией и формированием запросов.
```
$conneciton = new Connection($domain, $email, $key)
```

#### Репозитории

Наследники \amocrm\Repository. Классы для работы с AmoCRM как с хранилищем.
Реализуют интерфейс API, указанный на [сайте](https://developers.amocrm.ru/rest_api/).
```
$accounts = new AccountsRepository($connection);
```

#### Модели

Например \amocrm\Account\Account. Внутренние сущности. 
Упрощают работу. Возвращаются репозиториями.
```
$account = (new AccountsRepository($connection))->getCurrent();
```