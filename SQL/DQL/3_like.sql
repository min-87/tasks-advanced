--Выполните в psql запрос который выбирает из таблицы products все имена, которые начинаются с but;

-- BEGIN (write your solution here)
SELECT name FROM products WHERE name LIKE 'but%';
-- END
