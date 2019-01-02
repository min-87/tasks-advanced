--Создайте таблицу cars. Сделайте поле id типа SERIAL, текстовое поле name и поле price со значением по умолчанию равным 1.22.

DROP TABLE IF EXISTS "cars";

-- BEGIN (write your solution here)
CREATE TABLE cars (
id SERIAL PRIMARY KEY,
name character varying,
price numeric DEFAULT 1.22
);
-- END

INSERT INTO cars (name) VALUES ('first') , ('second');
