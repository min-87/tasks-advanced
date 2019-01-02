--Выполните в psql запрос, который выбирает из таблицы goods все названия товаров из категории cars, отсортированных по уменьшению цены.

-- BEGIN (write your solution here)
SELECT name FROM goods WHERE category='cars' ORDER BY price DESC;
-- END
