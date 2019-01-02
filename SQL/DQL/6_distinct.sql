-- Выполните в psql запрос который выбирает из таблицы goods все уникальные названия товаров, у которых категория cars;

-- BEGIN (write your solution here)
SELECT DISTINCT name FROM goods WHERE category='cars';
-- END
