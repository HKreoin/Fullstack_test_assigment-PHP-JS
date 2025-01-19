# Фуллстек тестовое задание

## Ответ по 1-му заданию

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

### [Запущенный проект на хостинге](http://n987235h.beget.tech)

Либо запуск локально

```
make run
```
