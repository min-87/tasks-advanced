-- Выполните в psql запрос который выбирает из таблицы goods все названия товаров, которые находятся в опубликованных категориях (state имеет значение published);

-- BEGIN (write your solution here)
SELECT name FROM goods 
WHERE category_id IN 
(SELECT id FROM categories WHERE state='published');
-- END
