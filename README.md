<h2>Тестовое задание</h2>

<h3>Необходимо реализовать REST API интерфейс для работы с сущностью «оборудование».</h3>
 
Роут:

1 GET:/api/equipment

2 GET:/api/equipment/{id}

3 POST:/api/equipment

4 PUT:/api/equipment/{id}

5 DELETE:/api/equipment/{id}

6 GET:/api/equipment-type

Действие:

1 Вывод пагинированного списка оборудования с возможностью поиска путем указания query параметров советующим ключам объекта, либо указанием параметра q
2 Запрос данных по id
3 Создание новой(ых) записи(ей) 
4 Редактирование записи по id 
5 Удаление записи (мягкое удаление)
6 Вывод пагинированного списка оборудования с возможностью поиска путем указания query параметров советующим ключам объекта, либо указанием параметра q

Для хранения информации об оборудовании в базе данных используется 2 таблицы (использовать MySQL и работу с миграциями):
1. «Тип оборудования» поля: ID, наименование типа, маска серийного номера.
2. «Оборудование» поля: ID, id типа оборудования, серийный номер (уникальное поле в связке с типом оборудования), примечание/комментарий.

Обязательные требования:

1. использование фреймворка Laravel v.8+.
2. использование Form Request Validation для всех методов создания и обновления
3. все ответы API должны использовать API Resources & Resource Collections
