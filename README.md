# Fullstack_test_assigment-PHP-JS

## Тестовое задание часть 1

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
    cr.repair_type AS work_name,
    cr.cost AS work_cost
FROM cars c
JOIN car_brands cb
    ON c.brand_id = cb.id
JOIN car_repairs cr
    ON c.id = cr.car_id
    WHERE (c.end_date IS NULL)
    AND cr.cost > 1000;
```

## Тестовое задание часть 2

### Запуск проекта по адресу localhost:3000

```
make run
```

### Запуск бэкенда

```
make run-backend
```

### Запуск фронтенда

```
make run-frontend
```
