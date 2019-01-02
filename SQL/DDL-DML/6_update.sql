/*

solution.sql

    Увеличьте прайс в два раза для записи с именем nissan.
    Установите имя в bmw для записи с id равным 10.
    Запишите запросы в файл solution.sql.

DROP TABLE IF EXISTS "cars";

CREATE TABLE cars (
    id integer PRIMARY KEY,
    name character varying UNIQUE NOT NULL,
    price numeric
);

INSERT INTO cars VALUES (1, 'nissan', 1.12);
INSERT INTO cars (id, name) VALUES (10, 'kia');

*/


-- BEGIN (write your solution here)
UPDATE cars SET price=price*2 WHERE name = 'nissan';
UPDATE cars SET name='bmw' WHERE id=10;
-- END

