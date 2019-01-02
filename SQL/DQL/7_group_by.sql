--Выполните в psql запрос который выбирает из таблицы goods названия категорий и количество товаров в этой категории. Выбираться должны только те группы у которых больше одного товара.

-- BEGIN (write your solution here)
SELECT category, count(id) FROM goods GROUP BY category HAVING count(id)>1;
-- END
