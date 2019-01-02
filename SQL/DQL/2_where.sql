--Выполните в psql запрос который выбирает из таблицы goods все названия товаров, у которых категория products и цена от 3 до 5;

-- BEGIN (write your solution here)
SELECT name FROM goods WHERE  category='products' AND price between 3 AND 5;
-- END
