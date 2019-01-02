--Выполните в psql запрос, который выбирает из таблицы products поля name и new_price. new_price вычисляется по формуле price + 1;

-- BEGIN (write your solution here)
SELECT name, (price+1) AS new_price FROM products;
-- END


