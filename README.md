# Библиотека для работы с AmoCrm
Главная задача библиотеки - максимальная приближенность к официальной документации.
Метод, описанный в официальной документации как:
`contacts/list`
реализован в библиотеке как:
`$amocrm->getContacts()->getList();`

## Пример использования
$amocrm = new \amocrm\AmoCrm($subdomain, $email, $key);
$list = $amocrm->getLeads()->getList();

## Архитектура
1. CRM. Класс \amocrm\AmoCrm. Занимается авторизацией и отправкой запросов. 
1. Шлюзы. Наследники \amocrm\gates\Gate. Шлюзы для работы с сущностями AmoCrm. 
Реализуют интерфейс API, указанный на [сайте](https://developers.amocrm.ru/rest_api/).
1. Модели. Наследники \amocrm\entities\Entity. Внутренние сущности. Упрощают работу.