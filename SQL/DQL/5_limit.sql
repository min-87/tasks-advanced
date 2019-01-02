-- Выполните в psql запрос который выбирает из таблицы goods название самого дешевого товара;

-- BEGIN (write your solution here)
SELECT name FROM goods ORDER BY price ASC LIMIT 1;
-- END
