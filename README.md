# Библиотека для работы с AmoCrm
Главная задача библиотеки - максимальная приближенность к официальной документации.
Метод, описанный в официальной документации как:
`contacts/list`
реализован в библиотеке как:
`$amocrm->getContacts()->getList();`

## Пример использования
$amocrm = new \amocrm\AmoCrm($subdomain, $email, $key);
$list = $amocrm->getLeads()->getList();