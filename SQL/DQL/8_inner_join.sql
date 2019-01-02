--Выполните в psql запрос который выбирает из таблиц goods и categories две записи состоящие из названия товаров (name) и имени категории (as category_name), у которых price больше 2 и товары отсортированы по имени в обратном порядке. Выберите не более двух записей;

-- BEGIN (write your solution here)
SELECT goods.name, categories.name AS category_name 
FROM goods INNER JOIN categories ON category_id=categories.id
WHERE  price > 2 ORDER BY goods.name DESC LIMIT 2;
-- END
