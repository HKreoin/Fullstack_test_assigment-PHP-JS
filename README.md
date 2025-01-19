# Фуллстек тестовое задание

[Запущенный проект](http://n987235h.beget.tech)

## Задание №1 (создание БД автосервиса и запросов)

**Описание БД:**

_Данные можно придумать или найти в интернете._

Должны быть следующие основные таблицы:

1. Таблица марок автомобилей. (Например, Audi, BMW, Volvo, Lada)

2. Таблица моделей автомобилей, которая включает в себя:

   1. Модель автомобиля (например BMW X3)
   2. Даты начала и окончания производства
   3. Тип кузова (хэтчбек, легковой, джип)
   4. Изображение модели (ссылка на файл)

3. Таблица стоимости работ для автомобилей. Должна включать:

   1. Наименование работ
   2. Время выполнения работ
   3. Стоимость

   Например: замена тормозных колодок передних, 500 рублей, 0.5 часа

**Нужно составить запросы:**

1. _Запрос 1:_  
   Вывести список автомобилей, снятых с производства на сентябрь 2018 года. В формате Марка, Модель, Дата снятия с производства.

2. _Запрос 2:_  
   Вывести список автомобилей и работ, которые не сняты с производства на текущий момент, где стоимость выше 1000 рублей. В формате Марка, Модель, Наименование работ, Стоимость работ.

**Результат:**  
Нужно предоставить SQL бэкап данных и созданные запросы \- чтобы мы могли все проверить.

## Задание №2 (PHP \+ JS)

На PHP с использованием PDO напишите класс, чтобы вывести следующие данные на странице:

1. Результаты для запросов из предыдущего задания.
2. Вывести автомобили из предыдущего задания, сортируя по типам кузова.

**Результат:**  
Нужно предоставить исходники, чтобы мы могли все проверить.

**Доп. условия:**

- Использовать фреймворки нельзя.
- Если хотите сделать красивый вывод таблицы, рекомендуем использовать бутстрап.
- Вынесите данные для подключения к БД в отдельный файл, например config.php

## Ответ по 1-му заданию

Инициализация БД в файле database/init.sql

Запрос №1:

```
SELECT
    cb.name AS brand_name,
    c.model,
    c.end_date
FROM cars c
JOIN car_brands cb
    ON c.brand_id = cb.id
    WHERE c.end_date IS NOT NULL
    AND c.end_date < '2018-09-01';
```

Запрос №2:

```
SELECT
    cb.name AS brand_name,
    c.model,
    cr.repair_type,
    cr.cost AS repair_cost
FROM cars c
JOIN car_brands cb
    ON c.brand_id = cb.id
JOIN car_repairs cr
    ON c.id = cr.car_id
    WHERE (c.end_date IS NULL)
    AND cr.cost > 1000;
```

## Ответ по 2-му заданию

### Запуск проекта по адресу localhost:8081

```
make run
```
