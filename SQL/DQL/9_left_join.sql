--Выполните в psql запрос, который выбирает из таблицы goods все названия товаров, для которых не существует категории в таблице categories.

-- BEGIN (write your solution here)
SELECT W1.name
 FROM goods W1 LEFT JOIN categories W2 on W1.category_id=W2.id
 WHERE W2.id is null;
-- END
